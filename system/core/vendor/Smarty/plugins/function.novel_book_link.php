<?php
/**
 * 取得小说地址
 *
 * Example:
 * {novel_book_link id=1}
 *
 *
 * @param array $params
 * @param Smarty $smarty
 * @return string
 *
 * @author pizigou <pizigou@yeah.net>
 */
function smarty_function_novel_book_link($params, &$smarty){
    if(empty($params['id'])){
        return "";
    }

    $c = $smarty->tpl_vars['this']->value;

    $id = intval($params['id']);

    return $c->createUrl('book/view', array('id' => $id));

}