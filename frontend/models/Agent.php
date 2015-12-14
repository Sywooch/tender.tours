<?php

namespace frontend\models;

use \yii\db\ActiveRecord;
//use \yii\web\IdentityInterface;

class Agent extends ActiveRecord //implements IdentityInterface
{    
    public static function tableName()
    {
        return '{{%agent}}';
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