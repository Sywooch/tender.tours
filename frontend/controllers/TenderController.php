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
    
    public function actionAdd() {
        $model = new TenderRegForm();
        $model->load(['TenderRegForm' => Yii::$app->request->post()]);
        
        if (Yii::$app->request->post('fromMain') == 1)
        
        return $this->render('tourist-tender', ['model' => $model]);
        
        $this->renderPartial('tourist-tender');
        $model = new TenderRegConfForm();
        if (Yii::$app->request->isPost &&
                $model->load(['TenderRegConfForm' => Yii::$app->request->post()]) &&
                $model->validate()) {
            $tender = new Tender();
            $tender->HEADER = Yii::$app->request->post('header');
            $tender->CITY = Yii::$app->request->post('city');
            $tender->TRANSPORT = Yii::$app->request->post('transport');
            $tender->FEED = Yii::$app->request->post('feed');
            $tender->COUNTRY = $tendersession->COUNTRY;
            $tender->DATE_FORWARD = $tendersession->DATE_FORWARD;
            $tender->DATE_BACK = $tendersession->DATE_BACK;
            $tender->BUDGET = $tendersession->BUDGET;
            $tender->STARS = $tendersession->STARS;
            $tender->PEOPLE_SUM = $tendersession->PEOPLE_SUM;


            $user = new User();
            $user->USERNAME = $model->email;
            $user->NAME = $model->name;
            $user->EMAIL = $model->email;
            $user->generatePassword();
            $user->generateRegistrationToken();
            $user->TYPE = User::TYPE_TOURIST;
            if ($user->validate() && $tender->validate()) {
                $transaction = Yii::$app->db->beginTransaction();
                try {
                    if (!$user->save() && !$tender->save()) {
                        throw new \yii\db\Exception('Ошибка записи пользователя в БД');
                    }
                    $body = $this->renderPartial('_email', [
                        'model' => $model,
                        'password' => $user->getRawPassword(),
                        'registrationToken' => $user->REGISTRATION_TOKEN
                    ]);
                    if (!$this->sendEmail($model->email, $body)) {
                        throw new \yii\base\Exception('Не удалось отправить письмо');
                    }
                    $transaction->commit();
                    $this->registrateTourist(User::findByRegistrationToken($id));
                } catch (\yii\base\Exception $e) {
                    $transaction->rollBack();
                    $model->addError('_error', 'Ошибка регистрации! Повторите попытку позже.');
                }
            }
        }
        return $this->render('tourist_cabinet');
    }
}
