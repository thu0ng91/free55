<?php
/**
 * Class CategoryController
 *
 * @author pizigou <pizigou@yeah.net>
 */
class CategoryController extends Controller
{
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex($title)
	{

        $category = Category::model()->find(
          'shorttitle=:shorttitle and status=:status',
          array(
              ':shorttitle' => $title,
              ':status' => Yii::app()->params['status']['ischecked'],
          )
        );

        if (!$category) {
            return new CHttpException(404);
        }

        $criteria = new CDbCriteria(array(
            'order' => 'createtime desc',
        ));

        $criteria->compare('status', Yii::app()->params['status']['ischecked']);
        $criteria->compare('cid', $category->id);

//        $criteria->compare('recommendlevel', 1);

        $dataProvider = new CActiveDataProvider('Book',array(
            'criteria'=> $criteria,
            'pagination'=> array(
                'pageSize'=> Yii::app()->params['girdpagesize'],
            ),
        ));

        $book = Book::model();

        $s = BookViewStatsByDay::model();
        $w = BookViewStatsByWeek::model();
        $mn = BookViewStatsByMonth::model();

		$this->render('index', array(
            'category' => $category,
            'dataProvider' => $dataProvider,
            'recommendDataProvider' => $book->getRecommendDataProvider(2, $category->id),
            'lastUpdateDataProvider' => $book->getLastUpdateDataProvider($category->id),
            'dayDataProvider' => $s->getTopHitsDataProvider(date('Y-m-d'), $category->id, 4),
            'weekDataProvider' => $w->getTopHitsDataProvider(date('W'), $category->id, 4),
            'monthDataProvider' => $mn->getTopHitsDataProvider(date('Y-m'), $category->id, 4),
        ));
	}

}