<?php
/**
 * 输出广告代码到页面
 *
 * Example:
 * {novel_ads_link id=1}
 *
 *
 * @param array $params
 * @param Smarty $smarty
 * @return string
 *
 * @author pizigou <pizigou@yeah.net>
 */
function smarty_function_novel_ads_link($params, &$smarty){
    if(empty($params['id'])){
        return "";
    }

    $id = intval($params['id']);

    $ads = Ads::model()->findByPk($id);

    if (!$ads) {
        return "";
    }

    // 广告未启用
    if ($ads->status != Yii::app()->params['status']["ischecked"]) {
        return "";
    }

    $code = $ads->code;
    $code = str_replace("'", "\'", $code);
    $s = "<script>document.write('" . $code . "');</script>";
    return $s;
//    return $c->createUrl('book/view', array('id' => $id));

}