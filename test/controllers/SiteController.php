<?php
namespace test\controllers;

use common\config\ConfigDataLocal;
use common\tools\Tools;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use test\models\PasswordResetRequestForm;
use test\models\ResetPasswordForm;
use test\models\SignupForm;
use test\models\ContactForm;

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
    public function actionIndex(){
        if(\Yii::$app->wechat->isWechat && !\Yii::$app->wechat->isAuthorized()) {
            return \Yii::$app->wechat->authorizeRequired()->send();
        }
    }

    /**
     * Displays homepage2.
     *
     * @return mixed
     */
    public function actionIndex2()
    {
        ///获得参数 signature nonce token timestamp echostr
        $nonce     = $_GET['nonce'];
        $token     = 'wodrow';
        $timestamp = $_GET['timestamp'];
        $echostr   = $_GET['echostr'];
        $signature = $_GET['signature'];
        //形成数组，然后按字典序排序
        $array = array();
        $array = array($nonce, $timestamp, $token);
        sort($array);
        //拼接成字符串,sha1加密 ，然后与signature进行校验
        $str = sha1( implode( $array ) );
        if( $str == $signature && $echostr ){
            //第一次接入weixin api接口的时候
            echo  $echostr;
            exit;
        }else{

            //1.获取到微信推送过来post数据（xml格式）
            $postArr = $GLOBALS['HTTP_RAW_POST_DATA'];
            //2.处理消息类型，并设置回复类型和内容
            /*<xml>
    <ToUserName><![CDATA[toUser]]></ToUserName>
    <FromUserName><![CDATA[FromUser]]></FromUserName>
    <CreateTime>123456789</CreateTime>
    <MsgType><![CDATA[event]]></MsgType>
    <Event><![CDATA[subscribe]]></Event>
    </xml>*/
            $postObj = simplexml_load_string( $postArr );
            //$postObj->ToUserName = '';
            //$postObj->FromUserName = '';
            //$postObj->CreateTime = '';
            //$postObj->MsgType = '';
            //$postObj->Event = '';
            // gh_e79a177814ed
            //判断该数据包是否是订阅的事件推送
            if( strtolower( $postObj->MsgType) == 'event'){
                //如果是关注 subscribe 事件
                if( strtolower($postObj->Event == 'subscribe') ){
                    //回复用户消息(纯文本格式)
                    $toUser   = $postObj->FromUserName;
                    $fromUser = $postObj->ToUserName;
                    $time     = time();
                    $msgType  =  'text';
                    $content  = '欢迎关注我们的微信公众账号'.$postObj->FromUserName.'-'.$postObj->ToUserName;
                    $template = "<xml>
                                <ToUserName><![CDATA[%s]]></ToUserName>
                                <FromUserName><![CDATA[%s]]></FromUserName>
                                <CreateTime>%s</CreateTime>
                                <MsgType><![CDATA[%s]]></MsgType>
                                <Content><![CDATA[%s]]></Content>
                                </xml>";
                    $info     = sprintf($template, $toUser, $fromUser, $time, $msgType, $content);
                    echo $info;
                    /*<xml>
                    <ToUserName><![CDATA[toUser]]></ToUserName>
                    <FromUserName><![CDATA[fromUser]]></FromUserName>
                    <CreateTime>12345678</CreateTime>
                    <MsgType><![CDATA[text]]></MsgType>
                    <Content><![CDATA[你好]]></Content>
                    </xml>*/


                }
            }

        }
    }

    /**
     * Displays homepage1.
     *
     * @return mixed
     */
    public function actionIndex1()
    {
        /*Tools::_vp(Yii::$app->request->get(),0,2);
        Tools::_vp(Yii::$app->request->post(),0,3);
        Tools::_vp(Yii::$app->wechat,0,3);
        Tools::_vp(\Yii::$app->wechat->isWechat,0,3);
        Tools::_vp(!\Yii::$app->wechat->isAuthorized(),0,3);
        Tools::_vp(\Yii::$app->wechat->authorizeRequired()->send(),0,3);
        if(\Yii::$app->wechat->isWechat && !\Yii::$app->wechat->isAuthorized()) {
            return \Yii::$app->wechat->authorizeRequired()->send();
        }*/
        /*$options = Yii::$app->params['WECHAT'];
        $app = new \EasyWeChat\Foundation\Application($options);
        $response = $app->server->serve();
// 将响应输出
//        $response->send();
        Tools::_vp(Yii::$app->request->get(),0,2);
        Tools::_vp(Yii::$app->request->post(),0,3);
        Tools::_vp($response,0,3);
        return $response;*/
        $options = Yii::$app->params['WECHAT'];

        $app = new \EasyWeChat\Foundation\Application($options);

        $server = $app->server;

        $server->setMessageHandler(function() {
            return "?? 您好！欢迎关注 overtrue!";
        });

        return $server->serve();
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
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
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
        } catch (InvalidParamException $e) {
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
}
