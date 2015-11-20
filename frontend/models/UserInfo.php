<?php

namespace frontend\models;

use Yii;
use \yii\db\ActiveRecord;
use \yii\web\IdentityInterface;
use \yii\behaviors\TimestampBehavior;


class User extends ActiveRecord //implements IdentityInterface
{
    
    public static function tableName()
    {
        return '{{%user_info}}';
    }
    
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }    
    
    // 1. ЗАПОЛНИТЬ
    public function rules()
    {
        return [      
            // Логин и пароль - обязательные поля
            [['USERNAME', 'EMAIL'], 'required'],
            // Длина имени должна быть в пределах от 5 до 50 символов
            [['USERNAME'], 'string', 'min' => 5, 'max' => 50],
            // Логин должен соответствовать шаблону
            [['USERNAME'], 'match', 'pattern' => '/^[A-z][\w]+$/'],
            // Логин должен быть уникальным
            [['USERNAME'], 'unique'],
            [['EMAIL'], 'string', 'max' => 100],
        ];
    }

    public static function findIdentity($id)
    {
        return static::findOne(['ID' => $id]);
    }

    public static function findByUserId($useId)
    {
        return static::findOne(['USER_ID' => $useId]);
    }

    public function getId()
    {
        return $this->getPrimaryKey();
    }
    

    /*
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }
    */
    /*
    public function getAuthKey()
    {
        return $this->auth_key;
    }
    */
    /*
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }
    */
}