<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class SystemBaseConfig extends CFormModel
{
	public $SiteName;

    public $SiteKeywords;

    public $SiteIntro;

    public $SiteCopyright;

    public $SiteAdminEmail;

    public $SiteAttachmentPath;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			array('SiteName', 'required'),
			array('SiteAdminEmail', 'email'),
            array('SiteName', 'length', 'max'=> 100),
            array('SiteKeywords,SiteIntro,SiteCopyright,SiteAttachmentPath', 'length', 'max'=> 255),
//			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'SiteName' => '站点名称',
			'SiteKeywords' => '站点关键字',
			'SiteIntro' => '站点简介',
			'SiteAdminEmail' => '管理员邮箱',
			'SiteCopyright' => '站点版权信息',
			'SiteAttachmentPath' => '站点附件地址',
		);
	}
}
