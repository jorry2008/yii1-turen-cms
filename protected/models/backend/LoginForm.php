<?php
/**
 * 
 * @author xia.q
 *
 */
class LoginForm extends CFormModel
{
	public $email;
	public $password;
	public $rememberMe;
	public $verifyCode;

	private $_identity;//身份验证

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('email, password, verifyCode', 'required'),
			array('email', 'email'),
			// rememberMe needs to be a boolean
			array('rememberMe', 'boolean'),
			// password needs to be authenticated
			array('password', 'authenticate'),
			// allowEmpty
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'rememberMe'=>Yii::t('loginForm', 'Remember Me'),
		);
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		$this->_identity = new TUserIdentity($this->email,$this->password);
		if(!$this->_identity->authenticate()) {
			$this->addError('password',Yii::t('loginForm', Yii::t('LoginForm', 'Incorrect emial or password.')));
		}
	}

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
		if($this->_identity === null) {
			$this->_identity = new TUserIdentity($this->email,$this->password);
			$this->_identity->authenticate();
		}
		
		if($this->_identity->errorCode === TUserIdentity::ERROR_NONE) {
			$duration = $this->rememberMe ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		} else
			return false;
	}
}
