<?php
/**
 * 取得章节地址
 *
 * Example:
 * {novel_chapter_link id=1}
 *
 *
 * @param array $params
 * @param Smarty $smarty
 * @return string
 *
 * @author pizigou <pizigou@yeah.net>
 */
function smarty_function_novel_chapter_link($params, &$smarty){
    if(empty($params['id'])){
        return "";
    }

    $c = $smarty->tpl_vars['this']->value;

    $id = intval($params['id']);

    return $c->createUrl('article/view', array('id' => $id));

}