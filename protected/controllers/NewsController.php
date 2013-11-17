<?php
/**
 * Class NewsController
 *
 * @author pizigou <pizigou@yeah.net>
 */
class NewsController extends FWFrontController
{
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
        $criteria=new CDbCriteria(array(
            'order' => 'createtime desc',
        ));

        $category = null;
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            if ($id > 0) {
                $criteria->compare("cid", $id);

                $category = NewsCategory::model()->findByPk($id);
            }
        }

        $criteria->compare('status', Yii::app()->params['status']['ischecked']);

        $count = News::model()->count($criteria);
        $pages = new CPagination($count);

        // results per page
        $pages->pageSize = Yii::app()->params['pagesize']['news'];
        $pages->applyLimit($criteria);

        $list = News::model()->findAll($criteria);

        $page = $this->widget('CLinkPager', array(
            'pages' => $pages,
        ), true);

		$this->render('index', array(
            'list' => $list,
            'page' => $page,
            'category' => $category,
        ));
	}

    /**
     * 小说详情
     */
    public function actionView($id)
    {
        $news = News::model()->findByPk($id);
        if (!$news) {
            return new CHttpException(404);
        }

        $this->render('detail', array(
            'news' => $news,
        ));
    }

}