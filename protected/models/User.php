<?php

/**
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table '{{user}}':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $realname
 * @property integer $roleid
 * @property string $telephone
 * @property string $qq
 * @property string $email
 * @property string $address
 * @property integer $create_time
 * @property integer $lastlogin_time
 * @property integer $status
 * @property integer $login_hits
 */
class User extends BaseModel
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return User the static model class
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
		return '{{user}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, roleid','required'),
			array('username','unique'),
			array('roleid, create_time, lastlogin_time, status, login_hits', 'numerical', 'integerOnly'=>true),
			array('username, password, realname, telephone, qq, email', 'length', 'max'=>32),
			array('address', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, realname, roleid, telephone, qq, email, address, create_time, lastlogin_time, status, login_hits', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'username' => '用户名',
			'password' => '密码',
			'realname' => '真实姓名',
			'roleid' => '用户角色',
			'telephone' => '手机',
			'qq' => 'QQ',
			'email' => '电子邮件',
			'address' => '地址',
			'create_time' => '注册时间',
			'lastlogin_time' => '最近登录时间',
			'status' => '状态',
			'login_hits' => '登录次数',
		);
	}

	protected function beforeSave()
	{
		if(parent::beforeSave())
		{
			if($this->isNewRecord)
			{
				$this->create_time=$this->lastlogin_time=time();
				$this->status=Yii::app()->params['status']['ischecked'];
				$this->login_hits=0;
				$this->password=md5($this->password);
			}
			return true;
		}
		else
			return false;
	}
}