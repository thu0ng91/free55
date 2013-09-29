<?php
/**
 * 手机端教委通知接口
 * @author gxc <gxc@smg.sh.cn>
 */
class EdunotificationController extends ApiController
{
    /**
     * 获取教育局通知
     */
	public function actionIndex()
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
        // 取教委通知
        $list = EduNotification::model()->findAll(array(
            'limit' => $pagenum,
            'offset' => ($page - 1),
            'order' => '`createtime` desc',
            'condition' => ' status=:status',
            'params' => array(
                ':status' => Yii::app()->params['status']['ischecked'],
            )
        ));
        $data['noticelist'] = $this->fmtDataCommon($list, 'cbFmtNoticeData');
        unset($list);  
        $this->jsonOutputAndEnd(true, $data);
	}
    
 
    /**
     * 教委通知数据格式化回调
     * @param type $item
     * @param type $model
     * @return type
     */
    protected function cbFmtNoticeData($item, $model)
    {
        //$item['piclist'] = $this->getRelationImageArray($model);
        $item['content'] = $model->content;
        $item['publishtime'] = $model->createtime;
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
                //'playurl' => isset($v->linkurl) ? $v->linkurl : '', //$v->linkurl
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