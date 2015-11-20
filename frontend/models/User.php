<?php

namespace frontend\models;

use Yii;
use \yii\db\ActiveRecord;
use \yii\web\IdentityInterface;
use \yii\behaviors\TimestampBehavior;


class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DISABLED = 0;
    const STATUS_ACTIVE = 10;
    
    const TYPE_ADMIN = 1;
    const TYPE_TOURIST = 5;
    const TYPE_AGENT = 10;
    
    
    public static function tableName()
    {
        return '{{%user}}';
    }
    
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }    
    
    public function rules()
    {
        return [
            ['CREATED_AT', 'default', 'value' => date('Y-m-d H-i-s')],
            ['STATUS', 'default', 'value' => self::STATUS_ACTIVE],
            ['STATUS', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DISABLED]],
            ['TYPE', 'in', 'range' => [self::TYPE_TOURIST, self::TYPE_AGENT]],
        ];
    }

    public static function findIdentity($id)
    {
        return static::findOne(['ID' => $id, 'STATUS' => self::STATUS_ACTIVE]);
    }

    public static function findByUsername($username)
    {
        return static::findOne(['USERNAME' => $username, 'STATUS' => self::STATUS_ACTIVE]);
    }

    public function getId()
    {
        return $this->getPrimaryKey();
    }
    
    public function validatePassword($password)
    {
        return md5($password) === $this->PASSWORD_HASH;
        //return Yii::$app->security->validatePassword($password, $this->PASSWORD_HASH);
    }
    
    /*
    public function setPassword($password)
    {
        $this->PASSWORD_HASH = md5($password);
        //$this->PASSWORD_HASH = Yii::$app->security->generatePasswordHash($password);
    }
    */
    public function setPassword()
    {
        $password = ''; // сгенерировать пароль [A-Za-z0-9-_] 8 символов
        $this->PASSWORD_HASH = md5($password);
    }
    
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }
    
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }
    
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }
    
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

}