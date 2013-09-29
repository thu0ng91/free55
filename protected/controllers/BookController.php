<?php
/**
 * Class BookController
 *
 * @author pizigou <pizigou@yeah.net>
 */
class BookController extends Controller
{
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
//        $criteria=new CDbCriteria(array(
//            'order' => 'createtime desc',
//        ));
//
//        $criteria->compare('status', Yii::app()->params['status']['ischecked']);
//        $criteria->compare('recommendlevel', 1);
//
//        $recommendDataProvider = new CActiveDataProvider('Book',array(
//            'criteria'=> $criteria,
//            'pagination'=>array(
//                'pageSize'=>Yii::app()->params['girdpagesize'],
//            ),
//        ));

        $m = Book::model();
		$this->render('index', array(
            'recommendDataProvider'=>  $m->getRecommendDataProvider(),
            'newestDataProvider' => $m->getNewestDataProvider(),
            'lastUpdateDataProvider' => $m->getLastUpdateDataProvider(100),
        ));
	}

    /**
     * 小说详情
     */
    public function actionView($id)
    {
        $book = Book::model()->findByPk($id);
        if (!$book) {
            return new CHttpException(404);
        }

        // 更新小说统计信息
        $book->updateStats();

        $this->render('detail', array(
            'book' => $book,
        ));
    }
}