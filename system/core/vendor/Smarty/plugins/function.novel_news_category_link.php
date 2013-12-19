<?php
/**
 * 取得新闻分类地址
 *
 * Example:
 * {novel_news_category_link id=1}
 *
 *
 * @param array $params
 * @param Smarty $smarty
 * @return string
 *
 * @author pizigou <pizigou@yeah.net>
 */
function smarty_function_novel_news_category_link($params, &$smarty){
    if(empty($params['id'])){
        return "";
    }

    $c = $smarty->tpl_vars['this']->value;

    $id = intval($params['id']);

    return $c->createUrl('news/index', array('id' => $id));

}