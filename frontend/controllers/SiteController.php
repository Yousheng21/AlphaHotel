<?php
namespace frontend\controllers;

use common\models\Orders;
use common\models\Restaurant;
use common\models\User;
use frontend\assets\HomeAsset;
use frontend\models\DeleteRoom;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\ReservationForm;
use frontend\models\UpdateInfoEmail;
use frontend\models\UpdateInfoUser;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use common\models\News;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
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
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'home';
        HomeAsset::register($this->getView());


        $query = News::find();
        $newsList  = $query->select(['id','name','description'])
            ->all();

//        $model = new ReservationForm();
//
//        if($model->load(Yii::$app->request->post()) && $model->validate()){
//            return $this->render('reservation',['model'=>$model]);
//        }

        $user = $_COOKIE['user']??'';
        if ($user){
                $_SESSION['user'] = $user;
            }
        return $this->render('index', [
            'newsList' => $newsList,
        ]);
    }

    public function actionNews()
    {
        $this->layout = 'home';
        HomeAsset::register($this->getView());

        $query = News::find();

        $oneNews  = $query->select(['id','name','description','long_description'])
            ->all();

        return $this->render('news', [
            'oneNews' => $oneNews,
        ]);

    }

    public function actionOrders(){
        $this->layout = 'main';


        if (Yii::$app->user->isGuest)
            $username = $_COOKIE['user']??'';
        else
            $username = Yii::$app->user->identity->username;
        $query = Orders::find();

        $orders= $query->select(['room','dateIn','dateOut','guests','price'])
            ->where(['username'=>$username])
            ->all();
        return $this->render('myOrders',['orders'=>$orders]);
    }
    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionGallery(){
        $this->layout = 'home';
        HomeAsset::register($this->getView());
        return $this->render('gallery');
    }

    public function actionRestaurant(){
        HomeAsset::register($this->getView());
        $this->layout = 'home';
        $query= Restaurant::find();

        $offers = $query->select(['id','name','description','long_description'])
            ->all();
        return $this->render('restaurant',['offers'=>$offers]
        );
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Спасибо за регистрацию.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionAccount()
    {
        $cookie = $_COOKIE['user'] ?? '';
        $model = new UpdateInfoUser();
        $model1 = new UpdateInfoEmail();
        $model2 = new DeleteRoom();
        $query = User::find();

        $query1 = Orders::find();

        if (Yii::$app->user->isGuest)
            if ($cookie)
                $username = $cookie;
            else
                $username = $_SESSION['user'] ?? '';
        else
            $username = Yii::$app->user->identity->username;

        $orders = $query1->select(['id', 'room', 'dateIn', 'dateOut', 'guests', 'price'])
            ->where(['username' => $username])
            ->all();

        $userInfo = [];
        if (!Yii::$app->user->isGuest)
            $userInfo = $query->select(['username', 'email', 'created_at', 'updated_at'])
                ->where(['id' => Yii::$app->user->identity->getId()])
                ->all();

        if ($model->load(Yii::$app->request->post()) && ($model->update(Yii::$app->user->identity->getId()) || $model1->update(Yii::$app->user->identity->getId()))) {
            Yii::$app->session->setFlash('success', 'Данные успешно обновлены!');
            return $this->goHome();
        }

        $idRoom = $_GET['id'] ?? '';

        if ($idRoom) {
            if ($model2->delete(Yii::$app->request->get('id'))) {
                Yii::$app->session->setFlash('success', 'Бронирование отменено!');
                return Yii::$app->response->redirect(['/site/account']);
            }
        }

        return $this->render('account', ['userInfo' => $userInfo, 'orders' => $orders]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }

    public function actionAccomodations(){
        return $this->render('accomodations');
    }

    public function actionPrivacy_policy(){
        return $this->render('privacy_policy');
    }

    public function actionLoyalty(){
        return $this->render('loyalty');
    }
}
