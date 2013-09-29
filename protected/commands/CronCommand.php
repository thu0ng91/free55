<?php
/**
 * 后台定时计划任务
 *
 * @author pizigou
 */
class CronCommand extends CConsoleCommand {
    
    const EDU_WEIBO_URL = 'http://interface.kankanews.com/kkapi/weibo_read/weibo_ajaxread.php?readid=2728483914';
    
    const FAMLIY_KANKANEWS_URL = 'http://interface.kankanews.com/kkapi/xmlbyclass.php?classid=5805&list=all';
    
    //const IMG_SAVE_PATH =  'uploads/gallary';
    
    /**
     * 从看看后台栏目抓取《超级家长会》数据
     */
    public function actionFetchVideoFromKankanews()
    {
        $log = Fetchlog::model()->find(array(
            'condition'=>'type=:type',
            'params'=>array(':type'=>2),
        ));
        
        $updateTime = $log->updatetime;
        
        $url = self::FAMLIY_KANKANEWS_URL;
        if ($updateTime > 1) {
            $updateTime = date('Y-m-d', $updateTime);
            $url .= '&stime=' . $updateTime;
        }
        
        $xml = simplexml_load_file($url);
        
        foreach ($xml->item as $item) {
            //var_dump($item->publishtime);exit;
            //echo $item->title . "\n";
            $galleryid = $this->createGallery();
            
            $this->createPhotoAndSave($galleryid, trim($item->imageLink), 1);
            
            $video = new Video;
            $video->cid = 1; // 减少查询。写死了，对应往期视频栏目
            $video->title = $item->title;
            $video->content = $item->comment;
            $video->videourl = trim($item->videoLink);
            $video->gallaryid = $galleryid;
            $video->createtime = strtotime($item->publishtime);
            
            $video->save();
        }
        
        // 更新一次最后更新时间
        $log->updatetime = time();
        $log->save();
        //var_dump($xml);
        
        return 0;
    }
    
    /**
     *  从看看微博接口抓取教育局微博
     */
    public function actionFetchEduWeiboFromKankanews()
    {
        //echo Yii::getPathOfAlias('webroot');exit;
        Yii::import('application.extensions.gallerymanager.models.GalleryPhoto');
        
        $log = Fetchlog::model()->find(array(
            'condition'=>'type=:type',
            'params'=>array(':type'=>1),
        ));
        
        // 获取最后更新时间
        $updateTime = 0;
        if ($log) {
            $updateTime = $log->updatetime;
        } 
        
        $pageSize = 100;
        $page = 1;
        $totalNumber = 0;
        $lastUpdateTime = 0;
        /**
         *  微博抓取过来的数据，默认是时间从先到后的顺序排序的
         */
        do {
           $url  = self::EDU_WEIBO_URL  . "&perpage=" . $pageSize . "&page=" . $page;
           
           $r = @file_get_contents($url);
           
           Yii::log($r);
           $r = json_decode($r, true);
           
           $r = $r[0];
           //var_dump($r);
           
           if (!is_array($r)) break;
           //echo "adfasf";exit;
           if (!isset($r['total_number'])) break;
           //echo "adfasf";exit;
           if ($totalNumber < 1) {
               $totalNumber = $r['total_number'];
           }

           $r = $r['statuses'];
           //$i = 0;
           //var_dump($r);
           $t = strtotime($r['0']['created_at']);
           
           if ($page == 1 && $t > $updateTime) { // 还未抓去过
               $lastUpdateTime = $t;
           }
           
           if ($t < $updateTime) { // 已经抓取过了，停止抓取
               break;
           }
            //$batchSql = 'insert into smg_app_'
           foreach ($r as $v) {
               $t = strtotime($v['created_at']);
                // 创建相册
                $galleryid = $this->createGallery();
                
                // 保存消息
                $m = new EduNotification();
                $m->content = $v['text'];
                mb_internal_encoding("UTF-8");
                $m->title = mb_substr($m->content, 0, 20);
                //if (mb_strlen($m->content) > 20) $m->title .= '...';

                $m->gallaryid = $galleryid;
                $m->createtime = $t;
                $m->status = Yii::app()->params['status']['isstop'];
                $m->save();                
               // 存在图片，下载到本地
               if (isset($v['original_pic'])) {           
                    // 保存图片到本地
                   $this->createPhotoAndSave($galleryid, trim($v['original_pic']));
                   //file_put_contents($savePath, $m)
               }
           }
           echo "loop: " . $page . "\n";
           $page++;
           // 最多采集一次
           break;
        } while(($page * $pageSize) < $totalNumber);
        
        if ($lastUpdateTime < 1) $lastUpdateTime = time();
        
        $log->updatetime = $lastUpdateTime;
        
        $log->save();
        
        echo "Fetch Completely\n";
        return 0;
        //$url = str_replace("{perpage}", $perPage, self::EDU_WEIBO_URL);
    }
    
    /**
     * 生成相册
     * @return galleryid
     */
    private function createGallery()
    {
			$gallery = new Gallery();
			$gallery->name = true;
			$gallery->description = true;
			$gallery->versions = array(
				'small' => array(
					'resize' => array(200, null),
				),
				'medium' => array(
					'resize' => array(800, null),
				)
			);
			$gallery->save();
			return $gallery->attributes['id'];
    }
    
    /**
     * 创建相片对象并返回相片对象
     * @param type $galleryid
     * @param type $fileName
     * @param type $type
     * @return type
     */
    private function createPhoto($galleryid, $fileName, $type = 0)
    {
            $photo = new GalleryPhoto();
            $photo->gallery_id = $galleryid;
            $photo->file_name = $fileName;
            $photo->type = $type;
            $photo->save(); 
            
            return $photo;
    }
    
    /**
     * 创建相片对象并保存相片
     * @param type $galleryid
     * @param type $fileName
     * @param type $type
     * @return type
     */
    private function createPhotoAndSave($galleryid, $fileName, $type = 0)
    {
            $photo = $this->createPhoto($galleryid, $fileName, $type);
            
            if ($type == 1) return $photo;
            
            $photoId = $photo->id;
            // 保存图片
            $imgBin = @file_get_contents($fileName);
            $savePath = Yii::getPathOfAlias('application') . '/../' . $photo->galleryDir . '/' . $photo->getImageDir();
            if (!is_dir($savePath)) {
                @mkdir($savePath, 0777, true);
                //@chmod($savePath, 0777);
            }
            $p = $savePath . '/' . $photoId;
            @file_put_contents($p, $imgBin);
            

            Yii::app()->image->load($p)->save($p . '.' . $photo->galleryExt);
            @chmod($p . '.' . $photo->galleryExt, 0777);
            @unlink($p);
            unset($imgBin);
            
            return $photo;
    }
}

?>
