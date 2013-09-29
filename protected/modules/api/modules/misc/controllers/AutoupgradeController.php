<?php
/**
 * 手机端接口
 * @author gxc <gxc@smg.sh.cn>
 */
class AutoupgradeController extends ApiController
{
    /**
     * 获取最新版本
     */
	public function actionIndex()
	{
        $data = array();
        // 取头图
        $updateLog = Autoupgrade::model()->find(array(
            'order' => '`id` desc'
        ));
        
        if (!$updateLog) {
            $this->jsonOutputAndEnd(false);
        }
        
        $data['version'] = $updateLog->version;
        $data['description'] = $updateLog->description;
        $data['url'] = $updateLog->url;
        
        $this->jsonOutputAndEnd(true, $data);
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