<?php
/**
 * 手机端接口
 * @author gxc <gxc@smg.sh.cn>
 */
class MobileController extends ApiController
{
    /**
     * 首页API
     */
	public function actionIndex()
	{
        $data = array();
        // 取头图
        $list = Headline::model()->findAll(array(
            'limit' => 10,
            'order' => '`id` desc'
        ));
        $data['headline'] = $this->fmtDataCommon($list);
        unset($list);
        
        // 取往期视频
        $list = Video::model()->findAll(array(
            'limit' => 10,
            'order' => '`id` desc'
        ));
        $data['videolist'] = $this->fmtDataCommon($list, 'cbFmtVideoData');
        unset($list);        
        
        // 取直播
        $list = Live::model()->findAll(array(
            'limit' => 1,
            'order' => '`id` desc'
        ));
        $data['live'] = $this->fmtDataCommon($list, 'cbFmtLiveData');
        unset($list);        
        
        $this->jsonOutputAndEnd(true, $data);
	}
    
    
    /**
     * 视频列表
     */
    public function actionVideoList()
    {
        $page = intval($_GET['page']);
        $pagenum = intval($_GET['pagenum']);
        
        if (!$page) {
            $page = 1;
        }
        if (!$pagenum) {
            $pagenum = 10;
        }
        $data = array();
        // 取往期视频
        $list = Video::model()->findAll(array(
            'limit' => $pagenum,
            'offset' => ($page - 1) * $pagenum,
            'order' => '`id` desc',
            'condition' => 'status=:status',
            'params' => array(
                ':status' => Yii::app()->params['status']['ischecked'],
            )
        ));
        $data['videolist'] = $this->fmtDataCommon($list, 'cbFmtVideoData');
        unset($list);  
        $this->jsonOutputAndEnd(true, $data);
    }
    
    /**
     * 视频详细页
     */
    public function actionVideoDetail()
    { 
        $id = intval($_GET['id']);
        
        $video = Video::model()->findByPk($id);
        //var_dump($video);exit;
        if (!$video) {
            $this->jsonOutputAndEnd(false);
        }
        $videoPrev = Video::model()->find(array(
            'condition' => ' id<:id',
            'order' => '`id` desc',
            'params' => array (
                ':id' => $id,
            )
        ));
        $videoNext = Video::model()->find(array(
            'condition' => ' id>:id',
            'order' => '`id` asc',
            'params' => array (
                ':id' => $id,
            )
        ));
        
        //var_dump($videoNext->id);exit;
        
        $item = array();
        $data = $this->cbFmtVideoData($item, $video);
        $data['title'] = $video->title;
        $data['prev'] = $data['next'] = 0;
        $data['piclist'] = $this->getRelationImageArray($video);
        if ($videoPrev) {
            $data['prev'] = $videoPrev->id;
        }
        
        if ($videoNext) {
            $data['next'] = $videoNext->id;
        }
        
        $this->jsonOutputAndEnd(true, $data);
    }
    
    /**
     * 视频评论列表
     */
    public function actionVideoCommentList()
    {
        $page = intval($_GET['page']);
        $pagenum = intval($_GET['pagenum']);
        $id = intval($_GET['id']);
        
        if (!$page) {
            $page = 1;
        }
        if (!$pagenum) {
            $pagenum = 10;
        }
        $data = array();
        // 取视频评论
        $list = VideoComment::model()->findAll(array(
            'limit' => $pagenum,
            'offset' => ($page - 1) * $pagenum,
            'order' => '`createtime` desc',
            'condition' => ' videoid=:vodeoid',
            'params' => array(
                ':vodeoid' => $id
            )
        ));
        if (empty($list)) {
            $this->jsonOutputAndEnd(false);
        }
        $data['commentlist'] = $this->fmtCommentCommon($list, 'cbFmtCommentData');
        unset($list);
        $this->jsonOutputAndEnd(true, $data);        
    }
    
    /**
     *  发布视频评论
     */
    public function actionVideoPostComment()
    {
        $videoid = intval($_POST['id']);
        $comment = $_POST['comment'];
        $nickname = strip_tags($_POST['nickname']);
        $avatar = strip_tags($_POST['avatar']);
        
        $ip = $_SERVER['REMOTE_ADDR'];
        
        if (!$videoid || !$comment) {
            $this->jsonOutputAndEnd(false);
        }
        
        $comment = strip_tags($comment);
        
        $video = Video::model()->findByPk($videoid);
        
        if (!$video) {
            $this->jsonOutputAndEnd(false);
        }
        // 保存评论 
        $vc = new VideoComment;
        $vc->videoid = $videoid;
        $vc->comment = $comment;
        $vc->nickname = $nickname;
        $vc->ip = $ip;
        $vc->avatar = $avatar;
        $vc->save();
        
        // 修改评论数
        $video->commentnum += 1;
        $video->save();     
        
        $this->jsonOutputAndEnd(true);
    }
    
    /**
     * 视频赞一下
     */
    public function actionVideoLike()
    {
        $videoid = intval($_POST['id']);
        if (!$videoid) {
            $this->jsonOutputAndEnd(false);
        }
        
        $video = Video::model()->findByPk($videoid);
        if (!$video) {
            $this->jsonOutputAndEnd(false);
        } 
        
        $video->likenum += 1;
        $video->save();
        
        $this->jsonOutputAndEnd(true);
    }
    
    
    /**
     *  学校列表
     */
    public function actionSchoolList()
    {
        $page = intval($_GET['page']);
        $pagenum = intval($_GET['pagenum']);
        
        if (!$page) {
            $page = 1;
        }
        if (!$pagenum) {
            $pagenum = 10;
        }
        $data = array();
        // 取学校列表
        $list = School::model()->findAll(array(
            'limit' => $pagenum,
            'offset' => ($page - 1) * $pagenum,
            'order' => '`id` desc',
            'condition' => 'status=:status',
            'params' => array(
                ':status' => Yii::app()->params['status']['ischecked'],
            )            
        ));
        //var_dump($list);exit;
        $data['schoollist'] = $this->fmtDataCommon($list, 'cbFmtSchoolData');
        unset($list);  
        
        $this->jsonOutputAndEnd(true, $data);        
    }
    
    /**
     * 学校详情
     */
    public function actionSchoolDetail()
    {
        $id = intval($_GET['id']);
        
        $school = School::model()->findByPk($id);
        //var_dump($video);exit;
        if (!$school) {
            $this->jsonOutputAndEnd(false);
        }
        $prev = School::model()->find(array(
            'condition' => ' id<:id',
            'order' => '`id` desc',
            'params' => array (
                ':id' => $id,
            )
        ));
        $next = School::model()->find(array(
            'condition' => ' id>:id',
            'order' => '`id` asc',
            'params' => array (
                ':id' => $id,
            )
        ));
        
        //var_dump($videoNext->id);exit;
        
        $item = array();
        $data = $this->cbFmtSchoolData($item, $school);
        $data['name'] = $school->title;
        $data['piclist'] = $this->getRelationImageArray($school);
        $data['prev'] = $data['next'] = 0;
        $data['feature'] = $school->feature;
        $data['teacher'] = $school->teacher;
        $data['evaluate'] = $school->evaluate;
        if ($prev) {
            $data['prev'] = $prev->id;
        }
        
        if ($next) {
            $data['next'] = $next->id;
        }
        
        $this->jsonOutputAndEnd(true, $data);        
    }
    
    /**
     * 学校评论列表
     */
    public function actionSchoolCommentList()
    {
        $page = intval($_GET['page']);
        $pagenum = intval($_GET['pagenum']);
        $id = intval($_GET['id']);
        
        if (!$page) {
            $page = 1;
        }
        if (!$pagenum) {
            $pagenum = 10;
        }
        $data = array();
        // 取学校评论
        $list = SchoolComment::model()->findAll(array(
            'limit' => $pagenum,
            'offset' => ($page - 1) * $pagenum,
            'order' => '`id` desc',
            'condition' => ' schoolid=:schoolid',
            'params' => array(
                ':schoolid' => $id
            )
        ));
        if (empty($list)) {
            $this->jsonOutputAndEnd(false);
        }
        $data['commentlist'] = $this->fmtCommentCommon($list, 'cbFmtCommentData');
        unset($list);
        $this->jsonOutputAndEnd(true, $data);        
    }    
    
    /**
     * 发布学校评论
     */
    public function actionSchoolPostComment()
    {
        $schoolid = intval($_POST['id']);
        $comment = $_POST['comment'];
        $nickname = strip_tags($_POST['nickname']);
        $avatar = strip_tags($_POST['avatar']);
        
        $ip = $_SERVER['REMOTE_ADDR'];
        
        if (!$schoolid || !$comment) {
            $this->jsonOutputAndEnd(false);
        }
        
        $comment = strip_tags($comment);
        
        $school = School::model()->findByPk($schoolid);
        
        if (!$school) {
            $this->jsonOutputAndEnd(false);
        }
        // 保存评论 
        $sc = new SchoolComment;
        $sc->schoolid = $schoolid;
        $sc->comment = $comment;
        $sc->nickname = $nickname;
        $sc->ip = $ip;
        $sc->avatar = $avatar;
        $sc->save();
        
        // 修改评论数
        $school->commentnum += 1;
        $school->save();
        
        $this->jsonOutputAndEnd(true);
    } 
    
    /**
     * 学校赞一下
     */
    public function actionSchoolLike()
    {
        $schoolid = intval($_POST['id']);
        if (!$schoolid) {
            $this->jsonOutputAndEnd(false);
        }
        
        $school = School::model()->findByPk($schoolid);
        if (!$school) {
            $this->jsonOutputAndEnd(false);
        } 
        
        $school->likenum += 1;
        $school->save();
        
        $this->jsonOutputAndEnd(true);
    }  
    
    /**
     *  发布直播评论
     */
    public function actionLivePostComment()
    {
        $liveid = intval($_POST['id']);
        $comment = $_POST['comment'];
        $nickname = strip_tags($_POST['nickname']);
        $avatar = strip_tags($_POST['avatar']);
        
        $ip = $_SERVER['REMOTE_ADDR'];
        
        if (!$liveid || !$comment) {
            $this->jsonOutputAndEnd(false);
        }
        
        $comment = strip_tags($comment);
        
        $live = Live::model()->findByPk($liveid);
        
        if (!$live) {
            $this->jsonOutputAndEnd(false);
        }
        // 保存评论 
        $hc = new LiveComment;
        $hc->liveid = $liveid;
        $hc->comment = $comment;
        $hc->nickname = $nickname;
        $hc->ip = $ip;
        $hc->avatar = $avatar;
        $hc->save();
        
        // 修改评论数
        $live->commentnum += 1;
        $live->save();     
        
        $this->jsonOutputAndEnd(true);
    }
    
    /**
     * 直播评论列表
     */
    public function actionLiveCommentList()
    {
        $page = intval($_GET['page']);
        $pagenum = intval($_GET['pagenum']);
        $id = intval($_GET['id']);
        
        if (!$page) {
            $page = 1;
        }
        if (!$pagenum) {
            $pagenum = 10;
        }
        $data = array();
        // 取直播评论
        $list = LiveComment::model()->findAll(array(
            'limit' => $pagenum,
            'offset' => ($page - 1) * $pagenum,
            'order' => '`id` desc',
            'condition' => ' Liveid=:vodeoid',
            'params' => array(
                ':liveid' => $id
            )
        ));
        if (empty($list)) {
            $this->jsonOutputAndEnd(false);
        }
        $data['commentlist'] = $this->fmtCommentCommon($list, 'cbFmtCommentData');
        unset($list);
        $this->jsonOutputAndEnd(true, $data);        
    }
    
    
    /**
     *  学校数据格式化回调
     * @param type $item
     * @param type $model
     */
    protected function cbFmtSchoolData($item, $model)
    {
        $item['name'] = $item['title'];
        unset($item['title'], $item['playurl']);
        $item['id'] = $model->id;
        //$item['playurl'] = $model->videourl;
        //$item['piclist'] = $this->getRelationImageArray($model);
        $item['summary'] = $model->summary;
        $item['likenum'] = intval($model->likenum);
        $item['commentnum'] = intval($model->commentnum);
        $item['publishtime'] = $model->createtime; 
        // 位置
        $item['region'] = Yii::app()->params[$model->region];
        $item['addr'] = $model->addr;
        $item['lg'] = $model->lg;
        $item['lt'] = $model->lt;
        
        // 属性
        $item['zip'] = $model->zip;
        $item['tel'] = $model->tel;
        $item['fax'] = $model->fax;
        $item['headmaster'] = $model->headmaster;
        $item['clerk'] = $model->clerk;
        $item['age'] = $model->age;
        $item['stage'] = $model->stage;
        $item['property'] = $model->property;
        $item['type'] = $model->type;
        
        return $item;
    }
    
    /**
     * 直播数据格式化回调
     * @param type $item
     * @param type $model
     * @return type
     */
    protected function cbFmtLiveData($item, $model)
    {
        //$item['playurl'] = $model->videourl;
        //$item['piclist'] = $this->getRelationImageArray($model);
        $item['repeat'] = $model->repeat;
        $item['starttime'] = $model->starttime;
        $item['endtime'] = $model->endtime;
        $item['currenttime'] = time();
        
        // php 5.3.x 调用时传递引用被弃用
        return $item;
    }
    
    /**
     * 格式化评论数据
     * @param type $item
     * @param type $model
     */
    protected function cbFmtCommentData($item, $model)
    {
        
        $item['id'] = $model->id;
        $item['comment'] = $model->comment;
        $item['nickname'] = $model->nickname;
        $item['publishtime'] = $model->createtime;
        $item['avatar'] = $model->avatar;
        
        return $item;
    }
    
    /**
     * 视频数据格式化回调
     * @param type $item
     * @param type $model
     * @return type
     */
    protected function cbFmtVideoData($item, $model)
    {
        $item['id'] = $model->id;
        $item['playurl'] = $model->videourl;
        $item['tag'] = $model->tag;
        //$item['piclist'] = $this->getRelationImageArray($model);
        $item['content'] = $model->content;
        $item['likenum'] = intval($model->likenum);
        $item['commentnum'] = intval($model->commentnum);
        $item['publishtime'] = $model->createtime;
        
        //echo "aaaa" . '<br />';
        //var_dump($item);
        // php 5.3.x 调用时传递引用被弃用
        return $item;
    }    

    /**
     * 通用格式化函数
     * @param type $list
     * @param type $cb
     * @return type
     */
    protected function fmtDataCommon($list, $cb = null)
    {
        $data = array();
        foreach ($list as $v) {
            $item = array(
                'title' => isset($v->title) ? $v->title : '' ,
                'playurl' => isset($v->linkurl) ? $v->linkurl : '', //$v->linkurl
                'piclist' => $this->getRelationImageArray($v),
            );
            //$item['piclist'] = $this->getRelationImageArray($v);
            if (method_exists($this, $cb)) {
                //$cb($item, $v);
                $item = call_user_func_array(array($this, $cb), array($item, $v));
                //call_user_method_array($cb, $this, array($item, $v));
            }
            $data[] = $item;
        }
        
        return $data;
    }
	
	/**
	 * 评论数据接口
	 * @param type $list
	 * @param type $cb
	 * @return type
	 */
	protected function fmtCommentCommon($list, $cb = null)
	{
        $data = array();
        foreach ($list as $v) {
            $item = array(
//                'title' => isset($v->title) ? $v->title : '' ,
//                'playurl' => isset($v->linkurl) ? $v->linkurl : '', //$v->linkurl
//                'piclist' => $this->getRelationImageArray($v),
            );
            //$item['piclist'] = $this->getRelationImageArray($v);
            if (method_exists($this, $cb)) {
                //$cb($item, $v);
                $item = call_user_func_array(array($this, $cb), array($item, $v));
                //call_user_method_array($cb, $this, array($item, $v));
            }
            $data[] = $item;
        }
        
        return $data;		
	}


	protected function getRelationImageArray($model)
    {
        $d = array();
        $images = $model->galleryBehavior->getGalleryPhotos();
        foreach ($images as $v) {
            //echo $v->id . '<br />';
            $d[] = GalleryPhoto::getPhotoUrl($v);
        }
        return $d;
    }
}