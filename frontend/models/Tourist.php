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
    
    public function rules()
    {
        return [
            ['PHONE', 'required'],          
            ['PHONE', 'string', 'max' => 20],
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