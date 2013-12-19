<?php
/**
 * 获取小说列表
 * 
 * Example:
 *  {novel_book name="recommend_book" cid=[1] limit=10 order="" recommend=[1]}
 *      <li><a href='{$item->url}'>{$item->title}</a></li>
 *  {/novel_book}
 * 
 * @param array                    $params   parameters
 * @param string                   $content  contents of the block
 * @param Smarty_Internal_Template $template template object
 * @param boolean                  &$repeat  repeat flag
 * @return string 
 * @author pizigou <pizigou@yeah.net>
 */
function smarty_block_novel_book($params, $content, $template, &$repeat) {
    if(empty($params['name'])){
        $name = "block_novel_book";
    } else {
        $name = "block_novel_book_" . $params['name'];
    }

    $cid = 0;
    $limit = 10;
    $order = '';
    $recommendLevel = 0;

    if (isset($params['cid']) && is_array($params['cid'])) {
        $cid = $params['cid'];
    }

    if (isset($params['limit'])) {
        $limit = intval($params['limit']);
    }
    if (isset($params['order'])) {
        $order = $params['order'];
    }
    if (isset($params['recommend']) && is_array($params['recommend'])) {
        $recommendLevel = $params['recommend'];
    }

    $itemVarName = 'item';
    $dataVarName = $name . "_data";
    $dataIndexVarName = $name . "_data_index";
    $dataCountVarName = $name . "_data_count";

    // 第一次取得数据集
    if (is_null($content)) {

        $criteria = new CDbCriteria();
        if ($order == "") {
            $order = 'createtime desc';
        }
        $criteria->order = $order;
        $criteria->limit = $limit;

        if ($cid != 0) {
            $criteria->addInCondition("cid", $cid);
        }

        if ($recommendLevel != 0) {
            $criteria->addInCondition("recommendlevel", $recommendLevel);
        }

        $criteria->compare("status", Yii::app()->params['status']['ischecked']);

        $list = Book::model()->findAll($criteria);

        $count = count($list);
        if (!$list) {
            $count = 0;
        } else {
            $c = $template->tpl_vars['this']->value;

            foreach ($list as $k => $v) {
//                $list[$k]['url'] = $c->createUrl('book/view', array('id' => $v->id));
                $v->imgurl = H::getNovelImageUrl($v->imgurl);
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
