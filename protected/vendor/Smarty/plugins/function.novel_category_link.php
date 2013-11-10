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

    return $c->createUrl('category/index', array('id' => $id));

}