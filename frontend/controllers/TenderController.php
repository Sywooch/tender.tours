<?php
namespace frontend\controllers;

use Yii;
use frontend\models\TenderForm;
use frontend\models\User;
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

    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionList(){
        $this->layout = 'inner';
        return $this->render('list');
    }
    
    public function actionAdd() {
        
    }
    
    public function actionRegistrate() {
        $model = new TenderForm();
        
        if (Yii::$app->request->isPost) {
            $model->registrate();
        }
        
        return $this->renderAjax('tender_form', [
            'model' => $model,
        ]);
    }
}