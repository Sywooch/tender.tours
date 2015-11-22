<?php

namespace frontend\models;

use Yii;
use \yii\db\ActiveRecord;
use \yii\web\IdentityInterface;
use \yii\behaviors\TimestampBehavior;


class Tourist extends ActiveRecord //implements IdentityInterface
{
    
    public static function tableName()
    {
        return '{{%tourist}}';
    }
    
    public function behaviors()
    {
        return [
            
        ];
    }    
    
    // 1. ЗАПОЛНИТЬ
    public function rules()
    {
        return [      
            // Логин и пароль - обязательные поля
            [['USER_ID', 'NAME', 'PHONE'], 'required'],
            // Длина имени должна быть в пределах от 5 до 50 символов
            [['NAME'], 'string', 'min' => 3, 'max' => 50],
            // Логин должен соответствовать шаблону
            //[['NAME'], 'match', 'pattern' => '/^[A-z][\w]
            [['PHONE'], 'string', 'max' => 20],
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
}