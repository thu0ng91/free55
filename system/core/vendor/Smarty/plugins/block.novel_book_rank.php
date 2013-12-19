<?php
/**
 * 获取小说排行榜
 * 
 * Example:
 *  type = day | week | month
 *  {novel_book_rank name="book_rank" type="day" cid=[1] week="43" day="2013-10-11" month="2013-4" limit=10}
 *      <li><a href='{$item->url}'>{$item->title}</a></li>
 *  {/novel_book_rank}
 * 
 * @param array                    $params   parameters
 * @param string                   $content  contents of the block
 * @param Smarty_Internal_Template $template template object
 * @param boolean                  &$repeat  repeat flag
 * @return string 
 * @author pizigou <pizigou@yeah.net>
 */
function smarty_block_novel_book_rank($params, $content, $template, &$repeat) {

    if(empty($params['name'])){
        $name = "block_novel_book_rank";
    } else {
        $name = "block_novel_book_rank_" . $params['name'];
    }

    $type = "day";
    $limit = 10;
    $cid = 0;

    if (isset($params['type'])) {
        $type = $params['type'];
    }

    if (isset($params['limit']) && is_numeric($params['limit'])) {
        $limit = intval($params['limit']);
    }

    if (isset($params['cid']) && is_array($params['cid'])) {
        $cid = $params['cid'];
    }

    $year = $month = $week = $day = "";

    if (isset($params['year'])) {
        $year = $params['year'];
    }

    if (isset($params['month'])) {
        $month = $params['month'];
    }

    if (isset($params['week'])) {
        $week = $params['week'];
    }

    if (isset($params['day'])) {
        $week = $params['day'];
    }

    $itemVarName = 'item';
    $dataVarName = $name . "_data";
    $dataIndexVarName = $name . "_data_index";
    $dataCountVarName = $name . "_data_count";

    // 第一次取得数据集
    if (is_null($content)) {

        $criteria = new CDbCriteria();

        $criteria->order = 'hits desc';
        $criteria->limit = $limit;

        if ($cid != 0) {
            $criteria->addInCondition("cid", $cid);
        }

        $list = null;
        switch ($type) {
            case 'day':
                $criteria->compare('day', $day);
                $list = BookViewStatsByDay::model()->findAll($criteria);
                break;
            case 'week':
                $criteria->compare('year', date('Y'));
                $criteria->compare('week', $week ? $week : date('W'));
                $list = BookViewStatsByWeek::model()->findAll($criteria);
                break;
            case 'month':
                $t = strtotime($month ? $month : date('Y-m'));
                $month = date('Y-m-d', $t);
                $criteria->compare('month', $month);
                $list = BookViewStatsByMonth::model()->findAll($criteria);
                break;
        }

        $count = count($list);
        if (!$list) {
            $count = 0;
        } else {
            $c = $template->tpl_vars['this']->value;

            foreach ($list as $k => $v) {
//                $list[$k]['url'] = $c->createUrl('book/view', array('id' => $v->id));
                $v->book->imgurl = H::getNovelImageUrl($v->book->imgurl);
            }
        }

        $template->assign($dataVarName, $list);
        $template->assign($dataCountVarName, $count);
        $template->assign($dataIndexVarName, 0);

    } else {
        echo $content;
    }

    $count = $template->getVariable($dataCountVarName)->value;
    $index = $template->getVariable($dataIndexVarName)->value;

    if ($count > 0 && $index < $count) {
        if (!$repeat) $repeat = true;
    } else {
        $repeat = false;
    }

    if ($repeat) { //assign variable only on open tag
        $list =  $template->getVariable($dataVarName)->value;
        if ($count < 1) {
            $template->assign($itemVarName, null);
            $repeat = false;
        } else {
            if ($index < $count) {
                $template->assign($itemVarName, $list[$index]);
                $template->clearAssign($dataIndexVarName);
                $index++;
                $template->assign($dataIndexVarName, $index);
                $repeat = true;
            } else {
                $template->assign($itemVarName, null);
                $repeat = false;
            }
        }
    }

    if (!$repeat) {
        $template->clearAssign($itemVarName);
        $template->clearAssign($dataVarName);
        $template->clearAssign($dataIndexVarName);
        $template->clearAssign($dataCountVarName);
    }
}
