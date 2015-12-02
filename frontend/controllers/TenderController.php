<?php
namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\RegForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Tender controller
 */
class TenderController extends Controller
{
    public $layout = 'inner';
    
    
//    public function filters() {
//        return [
//            'accessControl'
//        ];
//    }
    
//    public function accessRules()
//    {
//        return array(
//            array('allow',
//                'actions'=>array('create'),
//                'roles'=>array('createNews'),
//            ),
//        );
//    }

//    public function actions()
//    {
//        return [
//            'error' => [
//                'class' => 'yii\web\ErrorAction',
//            ],
//        ];
//    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionList(){
        $this->layout = 'inner';
        return $this->render('list');
    }
}
