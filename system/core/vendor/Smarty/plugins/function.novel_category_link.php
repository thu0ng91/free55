<?php
/**
 * 获取分类地址
 *
 * Example:
 * {novel_category_link id="test"}
 *
 * @param array $params
 * @param Smarty $smarty
 * @return string
 *
 * @author pizigou <pizigou@yeah.net>
 */
function smarty_function_novel_category_link($params, &$smarty){
    if(empty($params['id'])){
        return "";
    }

    $c = $smarty->tpl_vars['this']->value;

    $id = intval($params['id']);

    $criteria = new CDbCriteria();
    $criteria->compare("id", $id);


    $m = Category::model()->find($criteria);
    if (!$m) return "";

    return $c->createUrl('category/index', array('title' => $m->shorttitle));

}