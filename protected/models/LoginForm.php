<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping  user login form data.
 * It is used by the 'login' action of 'DefaultController'.
 */
class LoginForm extends CFormModel {
    public $id;
    public $username;
    public $password;
    public $rememberMe;
    private $_identity;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
 
    public function __construct($id) {
        parent::__construct();
        $this->id = $id;
    }
    public function rules() {
        return array(
            array('username, password', 'required'),
            array('rememberMe', 'boolean'),
            array('password', 'authenticate'),
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
            'username' => Yii::t('YcmModule.ycm', '用户名'),
            'password' => Yii::t('YcmModule.ycm', '密码'),
            'rememberMe' => Yii::t('YcmModule.ycm', '记住我一个星期'),
        );
    }

    /**
     * Authenticates the password.
     * This is the 'authenticate' validator as declared in rules().
     */
    public function authenticate($attribute, $params) {
        if (!$this->hasErrors()) {
            $this->_identity = new UserIdentity($this->username, $this->password,$this->id);
            if (!$this->_identity->authenticate()) {
                $this->addError('password', Yii::t('YcmModule.ycm', '用户名或密码不正确'));
            }
        }
    }

    /**
     * Logs in the user using the given username and password in the model.
     * @return boolean whether login is successful
     */
    public function login() {
        if ($this->_identity === null) {
            $this->_identity = new UserIdentity($this->username, $this->password,$this->id);
            $this->_identity->authenticate();
        }
        if ($this->_identity->errorCode === UserIdentity::ERROR_NONE) {
            $duration = $this->rememberMe ? 3600 * 24 * 30 : 0; // 30 days
            Yii::app()->user->login($this->_identity, $duration);
            return true;
        } else {
            return false;
        }
    }

}