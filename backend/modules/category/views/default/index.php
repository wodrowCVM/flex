<div class="category-default-index">
    <h1><?= $this->context->action->uniqueId ?></h1>
    <div class="row">
        <div class="col-lg-12">
            <?php
            use kartik\tree\TreeView;
            echo TreeView::widget([
                // single query fetch to render the tree
                'query'             => \common\models\Category::find()->addOrderBy('root, lft'),
                'headingOptions' => ['label' => 'Categories'],
                'rootOptions' => ['label'=>'<span class="text-primary">Root</span>'],
                'fontAwesome' => true,
                'isAdmin' => true,
                'displayValue' => 1,
                'iconEditSettings'=> [
                    'show' => 'list',
                    'listData' => [
                        'folder' => 'Folder',
                        'file' => 'File',
                        'mobile' => 'Phone',
                        'bell' => 'Bell',
                    ]
                ],
                'softDelete' => true,
                'cacheSettings' => ['enableCache' => true]
            ]);
            ?>
        </div>
    </div>
</div>
