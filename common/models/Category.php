<?php

namespace common\models;

class Category extends \common\models\tables\Category
{
    public static function tableName()
    {
        return '{{%category}}';
    }

    public function rules()
    {
        return [
            [['root', 'lft', 'rgt', 'lvl', 'icon_type', 'active', 'selected', 'disabled', 'readonly', 'visible', 'collapsed', 'movable_u', 'movable_d', 'movable_l', 'movable_r', 'removable', 'removable_all'], 'integer'],
            [['lft', 'rgt', 'lvl', 'name'], 'required'],
            [['name'], 'string', 'max' => 60],
            [['icon'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => \Yii::t('app', 'Unique tree node identifier'),
            'root' => \Yii::t('app', 'Tree root identifier'),
            'lft' => \Yii::t('app', 'Nested set left property'),
            'rgt' => \Yii::t('app', 'Nested set right property'),
            'lvl' => \Yii::t('app', 'Nested set level / depth'),
            'name' => \Yii::t('app', 'The tree node name / label'),
            'icon' => \Yii::t('app', 'The icon to use for the node'),
            'icon_type' => \Yii::t('app', 'Icon Type: 1 = CSS Class, 2 = Raw Markup'),
            'active' => \Yii::t('app', 'Whether the node is active (will be set to false on deletion)'),
            'selected' => \Yii::t('app', 'Whether the node is selected/checked by default'),
            'disabled' => \Yii::t('app', 'Whether the node is enabled'),
            'readonly' => \Yii::t('app', 'Whether the node is read only (unlike disabled - will allow toolbar actions)'),
            'visible' => \Yii::t('app', 'Whether the node is visible'),
            'collapsed' => \Yii::t('app', 'Whether the node is collapsed by default'),
            'movable_u' => \Yii::t('app', 'Whether the node is movable one position up'),
            'movable_d' => \Yii::t('app', 'Whether the node is movable one position down'),
            'movable_l' => \Yii::t('app', 'Whether the node is movable to the left (from sibling to parent)'),
            'movable_r' => \Yii::t('app', 'Whether the node is movable to the right (from sibling to child)'),
            'removable' => \Yii::t('app', 'Whether the node is removable (any children below will be moved as siblings before deletion)'),
            'removable_all' => \Yii::t('app', 'Whether the node is removable along with descendants'),
        ];
    }

    use \kartik\tree\models\TreeTrait {
        isDisabled as parentIsDisabled; // note the alias
    }

    /**
     * @var string the classname for the TreeQuery that implements the NestedSetQueryBehavior.
     * If not set this will default to `kartik	ree\models\TreeQuery`.
     */
    public static $treeQueryClass; // change if you need to set your own TreeQuery

    /**
     * @var bool whether to HTML encode the tree node names. Defaults to `true`.
     */
    public $encodeNodeNames = true;

    /**
     * @var bool whether to HTML purify the tree node icon content before saving.
     * Defaults to `true`.
     */
    public $purifyNodeIcons = true;

    /**
     * @var array activation errors for the node
     */
    public $nodeActivationErrors = [];

    /**
     * @var array node removal errors
     */
    public $nodeRemovalErrors = [];

    /**
     * @var bool attribute to cache the `active` state before a model update. Defaults to `true`.
     */
    public $activeOrig = true;

    /**
     * Note overriding isDisabled method is slightly different when
     * using the trait. It uses the alias.
     */
    public function isDisabled()
    {
        if (\Yii::$app->user->identity->username!== 'wodrow') {
            return true;
        }
        return $this->parentIsDisabled();
    }
}
