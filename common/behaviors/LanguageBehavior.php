<?php

namespace common\behaviors;

use Yii;
use yii\web\Application;

/**
 * Class LanguageBehavior
 * @package common\behaviors
 */
class LanguageBehavior extends CommonBehavior
{
    /**
     * @var string
     */
    public $cookieName = '_language';

    /**
     * @var bool
     */
    public $enablePreferredLanguage = true;
    /**
     * @return array
     */
    public function events()
    {
        return [
            Application::EVENT_BEFORE_REQUEST => 'beforeRequest'
        ];
    }

    /**
     * Resolve application language by checking user cookies, preferred language and profile settings
     */
    public function beforeRequest()
    {
        $hasCookie = Yii::$app->getRequest()->getCookies()->has($this->cookieName);
        $forceUpdate = Yii::$app->session->hasFlash('forceUpdateLanguage');
        if ($hasCookie && !$forceUpdate)
        {
            $language = Yii::$app->getRequest()->getCookies()->getValue($this->cookieName);
        } else {
            $language = $this->resolveLanguage();
        }
        Yii::$app->language = $language;
    }

    public function resolveLanguage()
    {
        $language = Yii::$app->language;

        if (!Yii::$app->user->isGuest/* && isset(Yii::$app->user->identity->userProfile->language)*/) {
//            $language = Yii::$app->user->getIdentity()->userProfile->language;
            $language = Yii::$app->request->getPreferredLanguage($this->getAvailableLanguages());
        } elseif ($this->enablePreferredLanguage) {
            $language = Yii::$app->request->getPreferredLanguage($this->getAvailableLanguages());
        }

        return $language;
    }

    /**
     * @return array
     */
    protected function getAvailableLanguages()
    {
        return array_keys(Yii::$app->params['languages']);
    }
}
