<?php

class SystemController extends Controller
{
    protected function menus()
    {
        return array(
            'system',
        );
    }

	/**
//	 * Lists all models.
//	 */
//	public function actionIndex()
//	{
//		$criteria=new CDbCriteria();
////        $criteria->addCondition('status=:stauts');
////        $criteria->params[':status'] = Yii::app()->params['status']['ischecked'];
//
//        if(!empty($_GET['SystemBaseConfig']['title']))
//            $criteria->addSearchCondition('title',$_GET['SystemBaseConfig']['title']);
//
//        if(!empty($_GET['SystemBaseConfig']['author']))
//            $criteria->addSearchCondition('author',$_GET['SystemBaseConfig']['author']);
//
//    	if(!empty($_GET['SystemBaseConfig']['cid'])){
//    		$categoryList=array();
//    		$categoryList[] = $_GET['SystemBaseConfig']['cid'];
//			Category::model()->getAllCategoryIds($categoryList,Category::model()->findAll(), $_GET['SystemBaseConfig']['cid']);
//		    $criteria->addInCondition('cid',$categoryList);
//    	}
//
//        if(isset($_GET['SystemBaseConfig']['recommendlevel'])){
//            $criteria->compare('recommendlevel', $_GET['SystemBaseConfig']['recommendlevel']);
//        }
//
//        $criteria->addNotInCondition('status', array(Yii::app()->params['status']['isdelete']));
//
//		$dataProvider=new CActiveDataProvider('SystemBaseConfig',array(
//			'criteria'=>$criteria,
//			'pagination'=>array(
//        		'pageSize'=>Yii::app()->params['girdpagesize'],
//    		),
//            'sort'=>array(
//                'defaultOrder'=>array(
//                    'id' => CSort::SORT_DESC,
//                ),
//                'attributes'=>array(
//                    'id',
//                    'createtime',
//                ),
//            ),
//		));
//		$this->render('index',array(
//			'dataProvider'=>$dataProvider,
//			'categorys'=> Category::model()->showAllSelectCategory(Category::SHOW_ALLCATGORY),
//            'model' => SystemBaseConfig::model(),
//		));
//	}

	public function actionBase()
	{
        $cacheCategory =  'system';
		$model = new SystemBaseConfig();

		if(isset($_POST['SystemBaseConfig']))
		{
			$model->attributes = $_POST['SystemBaseConfig'];

            if(!$model->validate()){
				Yii::app()->user->setFlash('actionInfo',Yii::app()->params['actionInfo']['saveFail']);
				$this->refresh();
			} else {
                Yii::app()->settings->set(get_class($model), $model, $cacheCategory);
                Yii::app()->settings->deleteCache($cacheCategory);
                Yii::app()->user->setFlash('actionInfo',Yii::app()->params['actionInfo']['saveSuccess']);
                $this->refresh();
            }
		} else {
//            foreach ($model->attributes as $k => $v) {
//                $model->$k = Yii::app()->settings->get($k, $cacheCategory);
//            }
            $m = Yii::app()->settings->get(get_class($model), $cacheCategory);
            if ($m) {
                $model = $m;
            }
        }
		$this->render('baseconfig',array(
			'model'=> $model,
//			'categorys'=>Category::model()->showAllSelectCategory(),
		));
	}

    public function actionRewrite()
    {
        $cacheCategory =  'system';
        $model = new SystemRewriteConfig();

        if(isset($_POST['SystemRewriteConfig']))
        {
            $model->attributes = $_POST['SystemRewriteConfig'];

            if(!$model->validate()){
                Yii::app()->user->setFlash('actionInfo',Yii::app()->params['actionInfo']['saveFail']);
                $this->refresh();
            } else {
//                foreach ($model->attributes as $k => $v) {
//                    Yii::app()->settings->set($k, $v, $cacheCategory);
//                }

                Yii::app()->settings->set(get_class($model), $model, $cacheCategory);
                Yii::app()->settings->deleteCache($cacheCategory);
                Yii::app()->user->setFlash('actionInfo',Yii::app()->params['actionInfo']['saveSuccess']);
                $this->refresh();
            }
        } else {
//            foreach ($model->attributes as $k => $v) {
//                $model->$k = Yii::app()->settings->get($k, $cacheCategory);
//            }
            $m = Yii::app()->settings->get(get_class($model), $cacheCategory);
            if ($m) {
                $model = $m;
            }
        }
        $this->render('rewriteconfig',array(
            'model'=> $model,
//			'categorys'=>Category::model()->showAllSelectCategory(),
        ));
    }

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=SystemRewriteConfig::model()->findByPk((int)$id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
}
