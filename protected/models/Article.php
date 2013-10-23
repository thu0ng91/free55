<?php

/**
 * This is the model class for table "{{article}}".
 *
 * The followings are the available columns in table '{{article}}':
 * @property integer $id
 * @property string $title
 * @property integer $cid
 * @property string $summary
 * @property string $content
 * @property string $tags
 * @property string $keywords
 * @property string $description
 * @property integer $userid
 * @property integer $createtime
 * @property integer $updatetime
 * @property string $recommend
 * @property integer $recommendlevel
 * @property integer $status
 * @property integer $hits
 */
class Article extends BaseModel
{
	public $imagefile;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Article the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{article}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('bookid,title', 'required'),
			array('imgurl','file','allowEmpty'=>true,'types'=>'jpg, gif, png','maxSize'=>1024 * 1024 * 10,'tooLarge'=>'上传图片已超过10M'),
			array('id,chapter,createtime, updatetime, recommendlevel, status, hits', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=> 100),
			array('imgurl, linkurl', 'length', 'max'=>200),
//			array('summary', 'length', 'max'=>500),
			array('tags, keywords, seotitle', 'length', 'max'=>100),
			array('content', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, content, seotitle, keywords, description, userid, createtime, updatetime, recommendlevel, status, hits', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		 return array(
            'book'=>array(self::BELONGS_TO, 'Book', 'bookid'),
        );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
            'id' => '章节编号',
            'bookid' => '所属小说',
            'chapter' => '所属分卷',
			'title' => '章节标题',
			'content' => '内容',
			'imgurl' => '封面图',
			'seotitle'=>'页面标题',
			'keywords' => '关键词',
//			'chapternum' => '实际章节号',
			'createtime' => '创建时间',
			'updatetime' => '更新时间',
//			'recommend' => '推荐类型',
			'recommendlevel' => '排序级别',
			'status' => '状态',
			'hits' => '点击数',
		);
	}
//	protected function beforeSave()
//	{
//		if(parent::beforeSave())
//		{
//			if($this->isNewRecord)
//			{
//				$this->createtime=$this->updatetime=time();
//				$this->status=Yii::app()->params['status']['ischecked'];
//				$this->hits=0;
//			}
//			else
//			{
//				$this->updatetime=time();
//			}
//			return true;
//		}
//		else
//			return false;
//	}

    /**
     * 小说章节插入前，更新章节数和字数
     * @return bool|void
     */
//    protected function beforeSave()
//    {
//        if (parent::beforeSave()) {
//            if ($this->isNewRecord) {
//                $this->book->chaptercount += 1;
//                $this->book->wordcount += mb_strlen($this->content);
//                $this->book->lastchapterid = $this->id;
//                $this->book->lastchaptertitle = $this->title;
//                $this->book->save();
//            }
//
//            return true;
//        }
//        return false;
//    }

    /**
     * 小说章节插入后，更新章节数和字数，更新最后章节编号、章节名、章节更新时间
     * @return bool|void
     */
    protected function afterSave()
    {
        if (parent::afterSave()) {
            if ($this->isNewRecord) {
                $this->book->chaptercount += 1;
                $this->book->wordcount += mb_strlen($this->content);
                $this->book->lastchapterid = $this->id;
                $this->book->lastchaptertitle = $this->title;
                $this->book->lastchaptertime = $this->createtime;
                $this->book->save();
            }

            return true;
        }

        return false;
    }

    /**
     * 删除前处理章节数、字符素
     * @return bool|void
     */
    protected function beforeDelete()
    {
        if ($this->book->chaptercount >= 1) {
            $this->book->chaptercount -= 1;
        }

        $len = mb_strlen($this->content);
        if ($this->book->wordcount >= $len) {
            $this->book->wordcount -= mb_strlen($this->content);
        }

        $this->book->save();

        return parent::beforeDelete();
    }
}