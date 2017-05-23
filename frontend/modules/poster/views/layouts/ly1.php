<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-23
 * Time: 下午6:04
 */

\frontend\assets\poster\Poster::register($this);
?>

<?php $this->beginContent('@frontend/views/layouts/main.php'); ?>
<?=$content ?>
<?php $this->endContent(); ?>
