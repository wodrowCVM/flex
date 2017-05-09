<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-9
 * Time: 上午9:54
 */

namespace common\components\rewrite;


class Nav extends \yii\bootstrap\Nav
{
    protected function isItemActive($item)
    {
        if (isset($item['url']) && is_array($item['url']) && isset($item['url'][0])) {
            $route = $item['url'][0];
            if ($route[0] !== '/' && \Yii::$app->controller) {
                $route = \Yii::$app->controller->module->getUniqueId() . '/' . $route;
            }
//            if (ltrim($route, '/'   ) !== $this->route) {
//                return false;
//            }
            $_route = ltrim($route, '/');
            if (strpos($this->route, $_route)===0){
                if($_route == $this->route){}else{
                    if (strpos($this->route,$_route."/")===0){}else{
                        return false;
                    }
                }
            }else{
                return false;
            }
            unset($item['url']['#']);
            if (count($item['url']) > 1) {
                $params = $item['url'];
                unset($params[0]);
                foreach ($params as $name => $value) {
                    if ($value !== null && (!isset($this->params[$name]) || $this->params[$name] != $value)) {
                        return false;
                    }
                }
            }

            return true;
        }

        return false;
    }
}