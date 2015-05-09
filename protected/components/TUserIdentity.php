<?php
/**
 * 
 * @author xia.q
 * 身份验证：密码
 * 
 * 这是一个认证持久层，一方面可以自定义验证方式
 * 另一方面，在验证成功后，可以任意的存储自己的必要用户信息到持久层。
 * 
 * //以下state内容都将进入SESSION且同步到COOKIE
 * //额外要存储的单个信息
 * getState()
 * setState()
 * clearState()
 * 
 * //批量覆盖
 * getPersistentStates()
 * setPersistentStates()
 * 
 * //是否认证通过
 * getIsAuthenticated()
 *
 */
class TUserIdentity extends CUserIdentity
{
	private $_id;//只读
	private $_name;//只读
	
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
			$this->_name=$user->user_name;//用户名
			
			//额外存储以下信息
			$this->setState('userName', $user->user_name);//用户名*
			$this->setState('nickName', $user->nick_name);//用户昵称
			$this->setState('GroupId', $user->user_group_id);//组id*
			$this->setState('isAdmin', $user->is_admin);//是否为管理员*
			$this->setState('loginTime', time());//登录时间*
			
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
	
	/**
	 * @return integer the Name of the user record
	 */
	public function getName()
	{
		return $this->_name;
	}
}