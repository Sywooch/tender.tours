<?php

namespace frontend\models;

use Yii;
use \yii\db\ActiveRecord;
use \yii\web\IdentityInterface;
use \yii\behaviors\TimestampBehavior;


class Agent extends ActiveRecord //implements IdentityInterface
{
    
    public static function tableName()
    {
        return '{{%agent}}';
    } 
    
    public function rules()
    {
        return [
            [['COMPANY', 'FADDRESS', 'JADDRESS', 'EDRPOU', 'EDRPOUSCAN', 'PHONE'], 'required'],
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