<?php

class UserController extends Controller
{
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$criteria=new CDbCriteria(array(
        	'order'=>'id desc',
    	));
		if(!empty($_GET['cid']))
		    $criteria->addCondition('roleid',$_GET['cid']);
    	if(!empty($_GET['title']))
    		$criteria->addSearchCondition('username',$_GET['title']);
		$dataProvider=new CActiveDataProvider('User',array(
			'criteria'=>$criteria,
			'pagination'=>array(
        		'pageSize'=>Yii::app()->params['girdpagesize'],
    		),	
		));
		$categorys=array(0=>Category::SHOW_ALLCATGORY);
		foreach(Yii::app()->params['role'] as $k=>$v)
			$categorys[$k]=$v;
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'categorys'=>$categorys,
		));
	}

	public function actionCreate()
	{
		$model=new User;
		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];					
			if($model->save()){
				Yii::app()->user->setFlash('actionInfo',Yii::app()->params['actionInfo']['saveSuccess']);
				$this->refresh();
			}else if($model->validate()){
				Yii::app()->user->setFlash('actionInfo',Yii::app()->params['actionInfo']['saveFail']);
				$this->refresh();
			}
		}
		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		if(!empty($_POST['User']))
		{
			if($model->password===$_POST['User']['password'])
				$model->attributes=$_POST['User'];
			else {
				$model->attributes=$_POST['User'];
				$model->password=md5($_POST['User']['password']);
			}
			if($model->save()){
				Yii::app()->user->setFlash('actionInfo',Yii::app()->params['actionInfo']['updateSuccess']);
				$this->redirect(array('index','menupanel'=>$_GET['menupanel']));
			}else if($model->validate()){
				Yii::app()->user->setFlash('actionInfo',Yii::app()->params['actionInfo']['updateFail']);
				$this->redirect(array('index','menupanel'=>$_GET['menupanel']));
			}
		}
		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk((int)$id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
}
