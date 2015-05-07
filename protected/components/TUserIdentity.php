<?php
/**
 * 
 * @author xia.q
 * 身份验证：密码
 *
 */
class TUserIdentity extends CUserIdentity
{
	private $_id;
	public $email;
	public $password;
	
	public function __construct($email,$password)
	{
		$this->email=$email;
		$this->password=$password;
	}

	/**
	 * Authenticates a user.
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$user = User::model()->find('LOWER(email)=?',array(strtolower($this->email)));
		if($user === null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if(!$user->validatePassword($this->password))
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else {
			$this->_id=$user->id;
			$this->email=$user->email;
			$this->errorCode=self::ERROR_NONE;
		}
		return $this->errorCode==self::ERROR_NONE;
	}

	/**
	 * @return integer the ID of the user record
	 */
	public function getId()
	{
		return $this->_id;
	}
}