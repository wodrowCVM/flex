<?php

namespace common\widgets;


/**
 * 树状列表类
 * @package yii\helpers
 * 用法 TreeList::getNews(传入数据)-> (csList|arList)方法
 */

class TreeList {

    protected static $news = null;
    protected static $data = [];

    //前缀样式
    public $left   = "&nbsp;";
    public $center = " │ &nbsp;&nbsp;&nbsp;";
    public $right  = " ├─ &nbsp;";

    protected function __construct(){
    }

    /**
     *
     * @param $data
     * @return null|TreeList
     */
    public static function getNews($data){
        if(self::$news === null){
            self::$news = new self();
        }
        self::$data = $data;
        return self::$news;
    }

    /**
     * 样式数据  无线级的数据必须为数组传进来
     * @param $pd ,父级id,默认0从顶级开始，$lv为$pd下对应的层级数
     * @return array 排好序列的二维数组
     */
    public function csList($pd=0,$lv=0){
        $data = [];
        foreach (self::$data as $c){
            if ($c['parentid'] == $pd){
                $c['lv']     = $lv;
                if ($c['lv']>0){
                    if ($c['lv'] -1 >0){
                        $c['prefix'] = $this->left.str_repeat($this->center,$c['lv']-1).$this->right;
                    }else{
                        $c['prefix'] = $this->left.$this->right;
                    }
                }else{
                    $c['prefix'] = "";
                }
                $data[]  = $c;
                $data = array_merge($data,$this->csList($c['id'],$lv+1));
            }
        }
        return $data;
    }

    /**
     * 纯数据 传进来的无线菜单数据可以是数组也可是对象
     * @param  $pd ,父ID,默认从顶级开始， 节点开始的话，传入该节点的id作为
     * @return  array 返回排好顺序的数据
     */
    public  function arList($pd=0){
        $data = [];
        foreach (self::$data as $c){
            if ($c['parentid'] == $pd){
                $data[]  = $c;
                $data = array_merge($data,$this->arList($c['id']));
            }
        }
        return $data;
    }

    public function clear()
    {
        self::$data = [];
    }
}