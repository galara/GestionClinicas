<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {

    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    
    public $userType = '';
    
    public function authenticate() {
//        echo $this->userType . $this->username . $this->password;
//        Yii::app()->end();  
        if ($this->userType == 'profesional') {
            
            $medicos = Profesionales::model()->findByPk($this->username);
            
            if (is_null($medicos)) {
                $this->errorCode = self::ERROR_PASSWORD_INVALID;
            } elseif ($medicos->pass != $this->password) {
                $this->errorCode = self::ERROR_PASSWORD_INVALID;
            } else {
                $this->setState('perfil', 'profesional');
                $this->setState('name', $medicos->nombre_1 . ' ' . $medicos->apellido_paterno);
                $this->setState('rut', $this->username);
                $this->errorCode = self::ERROR_NONE;
            }
            return !$this->errorCode;
        }
        
        if ($this->userType == 'administrativo') {
           
            $usuarios = Usuarios::model()->findByPk($this->username);

            if (is_null($usuarios)) {
                $this->errorCode = self::ERROR_PASSWORD_INVALID;
            } elseif ($usuarios->pass != $this->password) {
                $this->errorCode = self::ERROR_PASSWORD_INVALID;
            } else {
                $this->setState('perfil', 'usuario');
                $this->setState('name', $usuarios->nombre_1 . ' ' . $usuarios->apellido_paterno);
                $this->setState('rut', $this->username);
                $this->errorCode = self::ERROR_NONE;
            }
            return !$this->errorCode;
        }
        
        
    }

}
