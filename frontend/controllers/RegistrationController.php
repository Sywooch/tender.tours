<?php

namespace frontend\controllers;

use Yii;
use frontend\models\RegistrationForm;
use frontend\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;


/**
 * RegistrationController implements the CRUD actions for RegistrationForm model.
 */
class RegistrationController extends Controller {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['agent', 'tourist', 'tender'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    
                ],
            ],
        ];
    }

    
    // 5. 
    // 5-1. Вьюшки для экшенов
    public function actionAgent() {
        $model = new RegistrationForm();
        
        if (Yii::$app->getRequest()->isGet) {
            return $this->render('agent', [
                'model' => $model,
            ]);
        }

        if ($model->load(['RegForm' => Yii::$app->request->post()])
                && $model->register()) {
            return $this->goBack();
        }
        return $this->render('agent', [
            'model' => $model
        ]);
    }

    // 6. Экшен для туриста
    // 6-1. Вьюшки для экшенов
    public function actionTourist() {
        $model = new RegistrationForm();
        
        if (Yii::$app->getRequest()->isGet) {
            return $this->render('tourist', [
                'model' => $model,
            ]);
        }

        if ($model->load(['RegForm' => Yii::$app->request->post()])
                && $model->register()) {
            return $this->goBack();
        }
        return $this->render('tourist', [
            'model' => $model
        ]);
    }
    
    // 7. Экшен для тенееаа
    // 7-1. Вьюшки для экшенов
    public function actionTender() {
        $model = new RegistrationForm();
        
        if (Yii::$app->getRequest()->isGet) {
            return $this->render('tender', [
                'model' => $model,
            ]);
        }

        if ($model->load(['RegForm' => Yii::$app->request->post()])
                && $model->register()) {
            return $this->goBack();
        }
        return $this->render('tender', [
            'model' => $model
        ]);
    }
}
