<?php
namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
// use common\models\Layout;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\Pagination;


/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
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
     * @inheritdoc
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
        $posts = \common\models\Post::find()
		 ->where(['status' => 1])
		 ->orderBy('id DESC')
		 ->limit(3)
		 ->all();
		// $query = \common\models\Post::find()
		// ->where(['status' => 1])
		// ->orderBy('id DESC');
		// $countQuery = clone $query;
		// $pages = new Pagination(['totalCount' => $countQuery->count()]);
		// $models = $query->offset($pages->offset)
        // ->limit($pages->limit)
        // ->all();
		
		$categories = \common\models\Category::find()
		 ->orderBy('name ASC')
		 ->all();
		 
		$sliders = \common\models\Slider::find()
		 // ->where(['status' => 1])
		 ->orderBy('foto ASC')
		 ->limit(3)
		 ->all();
		
		$warna = \common\models\Layout::find()
		 ->where(['id_layout' => 1])
		 // ->orderBy('warna ASC')
		 ->all();
		return $this->render('index', [
		 'posts' => $posts,
		 'categories' => $categories,
		 'sliders' => $sliders,
		 'warna' => $warna,
		 // 'pages'=>$pages,
		 // 'models'=>$models,
		]);
    }
	
	public function actionPostCategory($id)
	{
		$posts = \common\models\Post::find()
		->where(['status' => 1, 'category_id' => $id])
		->orderBy('id DESC')
		->limit(5)
		->all();
		
		$categories = \common\models\Category::find()
		->orderBy('name ASC')
		->all();
		
		return $this->render('postCategory', [
			'posts' => $posts,
			'categories' => $categories,
		]);
	}
	
	public function actionPostSingle($id)
	{
		$post = \common\models\Post::find()
		->where(['status' => 1, 'id' => $id])
		->one();
		
		$categories = \common\models\Category::find()
		->orderBy('name ASC')
		->all();
		
		return $this->render('postSingle', [
			'post' => $post,
			'categories' => $categories,
		]);
	}

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
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
            // if ($model->sendEmail('yuhaya.lissera@gmail.com')) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
		// $model = new ContactForm();
		// if ($model->load(Yii::$app->request->post()) && $model->validate()) {
			// Yii::$app->mail->compose()
				// ->setFrom('mas.hendrayodhi@gmail.com')
				// ->setTo($model->email)
				// ->setSubject($model->subject)
				// ->setHtmlBody($model->body)
				// ->send();
			// return $this->refresh();
			// } else {
			// return $this->render('contact', [
			// 'model' => $model,
			// ]);
		// }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionProfil()
    {
        return $this->render('profil');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
			if ($user = $model->signup()) {
				$email = \Yii::$app->mailer->compose()
				->setTo($user->email)
				->setFrom('d.flashsoft@gmail.com')
				->setSubject('Signup Confirmation')
				->setTextBody("
					Click this link ".\yii\helpers\Html::a('confirm',
					Yii::$app->urlManager->createAbsoluteUrl(
					['site/confirm','id'=>$user->id,'key'=>$user->auth_key]
					))
				)
				->send();
				
				// if (Yii::$app->getUser()->login($user)) {
					// return $this->goHome();
				// }
				if($email){
				Yii::$app->getSession()->setFlash('success','Check Your email!');
				}
				else{
				Yii::$app->getSession()->setFlash('warning','Failed, contact Admin!');
				}
				return $this->goHome();
			}
		}
				 
		return $this->render('signup', [
		'model' => $model,
		]);
            
    }
	
	public function actionConfirm($id, $key)
	{
		$user = \common\models\User::find()->where([
		'id'=>$id,
		'auth_key'=>$key,
		'status'=>0,
		])->one();
		if(!empty($user)){
			$user->status=10;
			$user->save();
			Yii::$app->getSession()->setFlash('success','Success!');
		}
		else{
			Yii::$app->getSession()->setFlash('warning','Failed!');
		}
		return $this->goHome();
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
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
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
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
