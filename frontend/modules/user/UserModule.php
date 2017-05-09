<?php

namespace frontend\modules\user;

/**
 * user module definition class
 */
class UserModule extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'frontend\modules\user\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

    public $layout= "@frontend/modules/user/views/layouts/ly1";
//    public $layoutPath = "@frontend/modules/user/layout/ly1";
}
