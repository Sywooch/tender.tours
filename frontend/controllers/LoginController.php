<?php

namespace frontend\controllers;

use Yii;
use frontend\models\LoginForm;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class LoginController extends Controller {

    public function beforeAction() {
        if ($this->action->id == 'index') {
            Yii::$app->controller->enableCsrfValidation = false;
        }
        return true;
    }

    public function actionIndex() {
        
        if (!Yii::$app->user->isGuest  || !Yii::$app->request->isAjax) {
            return $this->goHome();
        }
        
        $model = new LoginForm();
        $model->load(['LoginForm' => Yii::$app->request->post()]);
        
        if (Yii::$app->request->isPost && $model->login()) {
            return $this->goBack();
        }
        
        return $this->renderPartial('_login', [
                    'model' => $model,
        ]);
    }

    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

}
