<?php

namespace frontend\modules\poster;

/**
 * poster module definition class
 */
class PosterModule extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'frontend\modules\poster\controllers';

    public $layout= "@frontend/modules/poster/views/layouts/ly1";

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
