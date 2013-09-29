<?php

class ArticleController extends Controller
{
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$criteria=new CDbCriteria(array(
        	'order'=>'id desc',
    	));
    	if(!empty($_GET['bid'])){
//    		$categoryList=array();
//    		$categoryList[]=$_GET['bid'];
//			Category::model()->getAllCategoryIds($categoryList,Category::model()->findAll('module='.Yii::app()->params['module']['article']),$_GET['bid']);
		    $criteria->compare('bookid', $_GET['bid']);
    	}
    	if(!empty($_GET['title']))
    		$criteria->addSearchCondition('title',$_GET['title']);

        $criteria->compare('status', Yii::app()->params['status']['ischecked']);

	    $dataProvider = new CActiveDataProvider('Article',array(
			'criteria'=> $criteria,
			'pagination'=>array(
        		'pageSize'=>Yii::app()->params['girdpagesize'],
    		),
		));


		$this->render('index',array(
			'dataProvider'=> $dataProvider,
//			'categorys'=> Category::model()->showAllSelectCategory(Yii::app()->params['module']['article'],Category::SHOW_ALLCATGORY),
		));
	}

	public function actionCreate()
	{
		$model = new Article;
		$bid = $_GET['bid'];

		if(!empty($bid))
			$model->bookid = $bid;


        $book = $this->getBookInfo($bid);

        if (!$book) {
            Yii::app()->user->setFlash('actionInfo',Yii::app()->params['actionInfo']['saveFail']);
            $this->redirect($this->createUrl('book/index'));
        }

		if(isset($_POST['Article']))
		{
			$model->attributes = $_POST['Article'];
			$upload = CUploadedFile::getInstance($model,'imagefile');
			if(!empty($upload))
			{
				$model->imgurl=Upload::createFile($upload,'article','create');
			}

			if($model->save()){
				Yii::app()->user->setFlash('actionInfo',Yii::app()->params['actionInfo']['saveSuccess']);
				$this->refresh();
			}else if($model->validate()){
				Yii::app()->user->setFlash('actionInfo',Yii::app()->params['actionInfo']['saveFail']);
				$this->refresh();
			}
		}

		$this->render('create',array(
			'model' => $model,
            'book' => $book,
//			'categorys'=>Category::model()->showAllSelectCategory(Yii::app()->params['module']['article']),
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
		if(!empty($_POST['Article']))
		{
			$model->attributes=$_POST['Article'];
			$upload=CUploadedFile::getInstance($model,'imagefile');
			if(!empty($upload))
			{
				$model->imgurl=Upload::createFile($upload,'article','update',$model->imgurl);
			}
			if($model->save()){
				Yii::app()->user->setFlash('actionInfo',Yii::app()->params['actionInfo']['updateSuccess']);
				$this->redirect(array('index','menupanel'=>$_GET['menupanel'],'bid'=>$_GET['bid'],'title'=>$_GET['title']));
			}else if($model->validate()){
				Yii::app()->user->setFlash('actionInfo',Yii::app()->params['actionInfo']['updateFail']);
				$this->redirect(array('index','menupanel'=>$_GET['menupanel'],'bid'=>$_GET['bid'],'title'=>$_GET['title']));
			}
		}
		$this->render('update',array(
			'model'=>$model,
//			'categorys'=>Category::model()->showAllSelectCategory(Yii::app()->params['module']['article']),
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Article::model()->findByPk((int)$id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

    /**
     * @param $bookId integer the ID of the book model
     */
    protected function getBookInfo($bookId)
    {
        return Book::model()->findByPk($bookId);
    }
}
