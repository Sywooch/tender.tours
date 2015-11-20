<?php

namespace frontend\controllers;

use Yii;
use frontend\models\LoginForm;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\User;

class LoginController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
             'access' => [
              'class' => AccessControl::className(),
              'only' => ['logout', 'signup'],
              'rules' => [
              [
              'actions' => ['signup'],
              'allow' => true,
              'roles' => ['?'],
              ],
              [
              'actions' => ['logout'],
              'allow' => true,
              'roles' => ['@'],
              ],
              ],
              ], 
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'index' => ['post'],
                ],
            ],
        ];
    }

    public function beforeAction() {
        if ($this->action->id == 'index') {
            Yii::$app->controller->enableCsrfValidation = false;
        }
        return true;
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex() {
        
        if (!Yii::$app->user->isGuest || Yii::$app->getRequest()->isGet) {
            return $this->goHome();
        }

        $model = new LoginForm();
        $model->setAttributes(['username' => 'test@test.ru', 'password' => '1']);
        //$model->load(Yii::$app->getRequest()->post());
        //$model->load(\Yii::$app->request->post());
        $model->login();
        //print_r($model);
        //echo '333333333333333';
        //print_r($model->login());       
        
        
        //$model = new LoginForm();
        if ($model->validate()) {
            //echo '333333333333333';
            return $this->goHome();
        } else {  
            $errors = $model->errors;
            return $errors;
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

}
