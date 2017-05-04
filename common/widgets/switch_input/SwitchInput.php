<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/19
 * Time: 11:23
 */

namespace common\widgets\switch_input;


use yii\bootstrap\InputWidget;

class SwitchInput extends InputWidget {
    public function run() {
        parent::run();
        $attribute = $this->attribute;
        $value = $this->model->$attribute;
        $inputname = Html::getInputName($this->model,$attribute);
        $inputid =  Html::getInputId($this->model,$attribute);
        $content = "<div class='switch' data-on= 'success' data-off= 'warning'>";
        if($value) {
            $content .= "<input type='checkbox' id='{$inputid}' checked name='{$inputname}' value='1'/>";
        } else {
            $content .= "<input type='checkbox' id='{$inputid}' name='{$inputname}'/>";
        }
        $content .= "</div>";
        echo $content;
    }
}