<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 7/2/16
 * Time: 3:58 PM
 */

namespace common\actions;

use common\tools\Tools;
use Yii;
use yii\base\InvalidParamException;
use yii\web\Cookie;

class SetLanguageAction extends CommonAction
{
    public $languages;

    public $languageCookieName = '_language';

    public $cookieExpire;

    public $cookieDomain;

    public $callback;

    public function run($language)
    {
        if(!is_array($this->languages) || !in_array($language, $this->languages, true)){
            throw new InvalidParamException('Unacceptable language');
        }
        $cookie = new Cookie([
            'name' => $this->languageCookieName,
            'value' => $language,
            'expire' => $this->cookieExpire ?: time() + 60 * 60 * 24 * 365,
            'domain' => $this->cookieDomain ?: '',
        ]);
        Yii::$app->getResponse()->getCookies()->add($cookie);
        if ($this->callback && $this->callback instanceof \Closure) {
            $x = call_user_func_array($this->callback, [
                $this,
                $language
            ]);
            return $x;
        }
        return Yii::$app->response->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }
}