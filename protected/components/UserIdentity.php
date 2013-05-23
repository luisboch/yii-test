<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {

    /**
     *
     * @var Usuario
     */
    private $usuario;

    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    public function authenticate() {
        
        $user = Usuario::model()->login($this->username, $this->password);
        if($user === null){
            $this->errorCode = self::ERROR_UNKNOWN_IDENTITY;
        } else {
            $this->usuario = $user;
            $this->errorCode = self::ERROR_NONE;
        }
        return !$this->errorCode;
    }
    
    public function getUsuario() {
        return $this->usuario;
    }
}