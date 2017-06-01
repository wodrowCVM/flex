<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-6-1
 * Time: 下午5:35
 */
/**
 * @var $items \common\models\ItemTag
 */
?>


<?php foreach($items as $k => $v): ?>
    <?=$v->item_type ?>
<?php endforeach; ?>
