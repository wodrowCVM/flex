<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 3/23/16
 * Time: 4:36 PM
 */

namespace common\tools;


class Tools
{
    /**
     * 调试输出|调试模式下
     * @param  mixed $test 调试变量
     * @param  int $style 模式
     * @param  int $stop 是否停止
     * @return void       浏览器输出
     * @author wodrow <wodrow451611cv@gmail.com | 1173957281@qq.com>
     */
    public static function _vp($test,$stop=0,$style=0)
    {
        $outDir = \Yii::getAlias('@runtime');
        switch ($style) {
            case 0:
                echo "<pre>";
                echo "<br><hr>";
                var_dump($test);
                echo "</pre>";
                break;

            case 1:
                echo "<pre>";
                echo "<br><hr>";
                var_dump($test);
                echo "<hr/>";
                for($i=0;$i<100;$i++){
                    echo $i."<hr/>";
                }
                echo "</pre>";
                break;

            case 2:
                file_put_contents($outDir . '/OUT.md', "\r" . var_export($test, true));
                break;

            case 3:
                file_put_contents($outDir . '/OUT.md', "\r\r" . var_export($test, true), FILE_APPEND);
                break;
        }
        if ($stop!=0) {
            exit("<hr/>");
        }
    }

    /**
     * 浏览器友好的变量输出
     * @param mixed $var 变量
     * @param boolean $echo 是否输出 默认为True 如果为false 则返回输出字符串
     * @param string $label 标签 默认为空
     * @param boolean $strict 是否严谨 默认为true
     * @return void|string
     */
    public static function dump($var, $echo=true, $label=null, $strict=true) {
        $label = ($label === null) ? '' : rtrim($label) . ' ';
        if (!$strict) {
            if (ini_get('html_errors')) {
                $output = print_r($var, true);
                $output = '<pre>' . $label . htmlspecialchars($output, ENT_QUOTES) . '</pre>';
            } else {
                $output = $label . print_r($var, true);
            }
        } else {
            ob_start();
            var_dump($var);
            $output = ob_get_clean();
            if (!extension_loaded('xdebug')) {
                $output = preg_replace('/\]\=\>\n(\s+)/m', '] => ', $output);
                $output = '<pre>' . $label . htmlspecialchars($output, ENT_QUOTES) . '</pre>';
            }
        }
        if ($echo) {
            echo($output);
            return null;
        }else
            return $output;
    }

    /**
     * 生成随机二维数组
     * @param $l 长度
     * @return array
     */
    public static function get_rand_arr($l){
        $x = [];
        for($i=0;$i<$l;$i++){
            $x[$i]['rand'] = rand(1000,9999);
        }
        return $x;
    }

    /**
     * 系统加密方法
     * @param string $data 要加密的字符串
     * @param string $key  加密密钥
     * @param int $expire  过期时间 单位 秒
     * @return string
     * @author 麦当苗儿 <zuojiazi@vip.qq.com>
     */
    public static function think_encrypt($data, $key = '', $expire = 0) {
        $key  = md5(empty($key) ? 'wodrow' : $key);
        $data = base64_encode($data);
        $x    = 0;
        $len  = strlen($data);
        $l    = strlen($key);
        $char = '';

        for ($i = 0; $i < $len; $i++) {
            if ($x == $l) $x = 0;
            $char .= substr($key, $x, 1);
            $x++;
        }

        $str = sprintf('%010d', $expire ? $expire + time():0);

        for ($i = 0; $i < $len; $i++) {
            $str .= chr(ord(substr($data, $i, 1)) + (ord(substr($char, $i, 1)))%256);
        }
        return str_replace(array('+','/','='),array('-','_',''),base64_encode($str));
    }

    /**
     * 系统解密方法
     * @param  string $data 要解密的字符串 （必须是think_encrypt方法加密的字符串）
     * @param  string $key  加密密钥
     * @return string
     * @author 麦当苗儿 <zuojiazi@vip.qq.com>
     */
    public static function think_decrypt($data, $key = ''){
        $key    = md5(empty($key) ? 'wodrow' : $key);
        $data   = str_replace(array('-','_'),array('+','/'),$data);
        $mod4   = strlen($data) % 4;
        if ($mod4) {
            $data .= substr('====', $mod4);
        }
        $data   = base64_decode($data);
        $expire = substr($data,0,10);
        $data   = substr($data,10);

        if($expire > 0 && $expire < time()) {
            return '';
        }
        $x      = 0;
        $len    = strlen($data);
        $l      = strlen($key);
        $char   = $str = '';

        for ($i = 0; $i < $len; $i++) {
            if ($x == $l) $x = 0;
            $char .= substr($key, $x, 1);
            $x++;
        }

        for ($i = 0; $i < $len; $i++) {
            if (ord(substr($data, $i, 1))<ord(substr($char, $i, 1))) {
                $str .= chr((ord(substr($data, $i, 1)) + 256) - ord(substr($char, $i, 1)));
            }else{
                $str .= chr(ord(substr($data, $i, 1)) - ord(substr($char, $i, 1)));
            }
        }
        return base64_decode($str);
    }

    /**
     * 数据签名认证
     * @param  array  $data 被认证的数据
     * @return string       签名
     * @author 麦当苗儿 <zuojiazi@vip.qq.com>
     */
    public static function data_auth_sign($data) {
        //数据类型检测
        if(!is_array($data)){
            $data = (array)$data;
        }
        ksort($data); //排序
        $code = http_build_query($data); //url编码并生成query字符串
        $sign = sha1($code); //生成签名
        return $sign;
    }

    /**
     * 格式化字节大小
     * @param  number $size      字节数
     * @param  string $delimiter 数字和单位分隔符
     * @return string            格式化后的带单位的大小
     * @author 麦当苗儿 <zuojiazi@vip.qq.com>
     */
    public static function format_bytes($size, $delimiter = '') {
        $units = array('B', 'KB', 'MB', 'GB', 'TB', 'PB');
        for ($i = 0; $size >= 1024 && $i < 5; $i++) $size /= 1024;
        return round($size, 2) . $delimiter . $units[$i];
    }

    /**
     * 把返回的数据集转换成Tree
     * @param array $list 要转换的数据集
     * @param string $pid parent标记字段
     * @param string $level level标记字段
     * @return array
     * @author 麦当苗儿 <zuojiazi@vip.qq.com>
     */
    public static function list2tree($list, $pk='id', $pid = 'pid', $child = '_child', $root = 0) {
        // 创建Tree
        $tree = [];
        if(is_array($list)) {
            // 创建基于主键的数组引用
            $refer = [];
            foreach ($list as $key => $data) {
                $refer[$data[$pk]] =& $list[$key];
            }
            foreach ($list as $key => $data) {
                // 判断是否存在parent
                $parentId =  $data[$pid];
                if ($root == $parentId) {
                    $tree[] =& $list[$key];
                }else{
                    if (isset($refer[$parentId])) {
                        $parent =& $refer[$parentId];
                        $parent[$child][] =& $list[$key];
                    }
                }
            }
        }
        return $tree;
    }

    /**
     * 将list2tree的树还原成列表
     * @param  array $tree  原来的树
     * @param  string $child 孩子节点的键
     * @param  string $order 排序显示的键，一般是主键 升序排列
     * @param  array  $list  过渡用的中间数组，
     * @return array        返回排过序的列表数组
     * @author yangweijie <yangweijiester@gmail.com>
     */
    public static function tree2list($tree, $child = '_child', $order='id', &$list = []){
        if(is_array($tree)) {
            $refer = [];
            foreach ($tree as $key => $value) {
                $reffer = $value;
                if(isset($reffer[$child])){
                    unset($reffer[$child]);
                    self::tree2list($value[$child], $child, $order, $list);
                }
                $list[] = $reffer;
            }
            $list = self::list_sort_by($list, $order, $sortby='asc');
        }
        return $list;
    }

    /**
     * 对查询结果集进行排序
     * @access public
     * @param array $list 查询结果
     * @param string $field 排序的字段名
     * @param array $sortby 排序类型
     * asc正向排序 desc逆向排序 nat自然排序
     * @return array
     */
    public static function list_sort_by($list, $field, $sortby = 'asc')
    {
        if (is_array($list)) {
            $refer = $resultSet = array();
            foreach ($list as $i => $data)
                $refer[$i] = &$data[$field];
            switch ($sortby) {
                case 'asc': // 正向排序
                    asort($refer);
                    break;
                case 'desc':// 逆向排序
                    arsort($refer);
                    break;
                case 'nat': // 自然排序
                    natcasesort($refer);
                    break;
            }
            foreach ($refer as $key => $val)
                $resultSet[] = &$list[$key];
            return $resultSet;
        }
        return false;
    }

    /**
     * 获取节点所有父级元素
     * @param array $list 数据
     * @param int $node_id 节点id
     * @param int $pk 主键
     * @param int $pid 外键
     * @param int $root 根节点
     * @return array 父节点
     * @author wodrow <wodrow451611cv@gmail.com | 1173957281@qq.com>
     */
    public static function get_list_parents($list,$node_id,$pk='id',$pid='pid',$root=0)
    {
        $i = $root;
        while($node_id!=$root){
            foreach ($list as $k => $v){
                if ($v[$pk]==$node_id){
                    $node_to_root[$i++] = $k;
                    $node_id = $v[$pid];
                }
            }
        }
        $i = $i-1;
        for($i;$i>=$root;$i--){
            $root_to_node[] = $node_to_root[$i];
            $parent_list[] = $list[$node_to_root[$i]];
        }
        return $parent_list;
    }

    /**
     * 获取节点排序
     * @param array $tree 数据
     * @param int $node_id 节点id
     * @param int $start 起始值
     * @param string $sort_name 排序字段下标
     * @param array $p
     * @return array 带节点排序的数据
     * @author wodrow <wodrow451611cv@gmail.com | 1173957281@qq.com>
     */
    public static function get_tree_node_sort($tree,$start=0,$sort_name='_node_sort',&$p=[]){
        $start++;
        foreach ($tree as $k => $v) {
            $p[$k] = $v;
            $p[$k][$sort_name] = $start-1;
            if ($v['_child']) {
                self::get_tree_node_sort($v['_child'],$start,$sort_name,$p[$k]['_child']);
            }
        }
        return $p;
    }

    /**
     * 获取list数组单个字段值
     * @param array $list 数组
     * @param int $key 索引键
     * @param int $search 索引值
     * @param int $field 查询键
     * @return int|string 查询值
     * @author wodrow <wodrow451611cv@gmail.com | 1173957281@qq.com>
     */
    public static function get_list_field($list,$key,$search,$field){
        foreach ($list as $k => $v){
            if($v[$key]==$search){
                return $v[$field];
            }
        }
    }

    /**
     * 字符串转换为数组，主要用于把分隔符调整到第二个参数
     * @param  string $str  要分割的字符串
     * @param  string $glue 分割符
     * @return array
     * @author 麦当苗儿 <zuojiazi@vip.qq.com>
     */
    public static function str2arr($str, $glue = ','){
        return explode($glue, $str);
    }

    /**
     * 数组转换为字符串，主要用于把分隔符调整到第二个参数
     * @param  array  $arr  要连接的数组
     * @param  string $glue 分割符
     * @return string
     * @author 麦当苗儿 <zuojiazi@vip.qq.com>
     */
    public static function arr2str($arr, $glue = ','){
        return implode($glue, $arr);
    }

    /**
     * 生成目录
     * @access public
     * @param string $path 目录位置与名称
     * @return void
     * @author wodrow <wodrow451611cv@gmail.com | 1173957281@qq.com>
     */
    public static function createDir($path)
    {
        return is_dir($path) or (self::createDir(dirname($path)) and mkdir($path, 0777));
    }

    /**
     * 获取当前页面完整URL地址
     */
    public static function get_url() {
        $sys_protocal = isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://';
        $php_self = $_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
        $path_info = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
        $relate_url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : $php_self.(isset($_SERVER['QUERY_STRING']) ? '?'.$_SERVER['QUERY_STRING'] : $path_info);
        return $sys_protocal.(isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '').$relate_url;
    }

    /**
     * 根据时间戳返回星期几
     * @param string $time 时间戳
     * @return 星期几
     */
    public static function weekday($time)
    {
        if(is_numeric($time))
        {
            $weekday = array('星期日','星期一','星期二','星期三','星期四','星期五','星期六');
            return $weekday[date('w', $time)];
        }
        return false;
    }

    /**
     * 获取二维数组的一个键的值的和
     * @param $arr [[]]
     * @param $k
     * @return int amount
     */
    public static function get_arr_k_amount($arr, $k)
    {
        $x = 0;
        foreach ($arr as $key => $v) {
            $x += $v[$k];
        }
        return $x;
    }

    /**
     * 修改权限
     * @param $path
     * @param $filemode
     * @return bool
     */
    public static function chmodr($path, $filemode)
    {
        if (!is_dir($path))
            return chmod($path, $filemode);
        $dh = opendir($path);
        while (($file = readdir($dh)) !== false) {
            if ($file != '.' && $file != '..') {
                $fullpath = $path . '/' . $file;
                if (is_link($fullpath))
                    return FALSE;
                elseif (!is_dir($fullpath) && !chmod($fullpath, $filemode))
                    return FALSE;
                elseif (!self::chmodr($fullpath, $filemode))
                    return FALSE;
            }
        }
        closedir($dh);
        if (chmod($path, $filemode))
            return TRUE;
        else
            return FALSE;
    }

    /**
     * 从数组中删除空白的元素（包括只有空白字符的元素）
     *
     * 用法：
     * @code php
     * $arr = array('', 'test', '   ');
     * ArrayHelper::removeEmpty($arr);
     *
     * dump($arr);
     *   // 输出结果中将只有 'test'
     * @endcode
     *
     * @param array $arr 要处理的数组
     * @param boolean $trim 是否对数组元素调用 trim 函数
     */
    public static function removeEmpty(& $arr, $trim = TRUE)
    {
        foreach ($arr as $key => $value) {
            if (is_array($value)) {
                self::removeEmpty($arr[$key]);
            } else {
                $value = trim($value);
                if ($value == '') {
                    unset($arr[$key]);
                } elseif ($trim) {
                    $arr[$key] = $value;
                }
            }
        }
    }

    /**
     * 从一个二维数组中返回指定键的所有值
     *
     * 用法：
     * @code php
     * $rows = array(
     *     array('id' => 1, 'value' => '1-1'),
     *     array('id' => 2, 'value' => '2-1'),
     * );
     * $values = ArrayHelper::getCols($rows, 'value');
     *
     * dump($values);
     *   // 输出结果为
     *   // array(
     *   //   '1-1',
     *   //   '2-1',
     *   // )
     * @endcode
     *
     * @param array $arr 数据源
     * @param string $col 要查询的键
     *
     * @return array 包含指定键所有值的数组
     */
    public static function getCols($arr, $col, $add_quotation_marks = false)
    {
        $ret = array();
        foreach ($arr as $row) {
            if (isset($row[$col])) {
                if ($add_quotation_marks && is_string($row[$col])) {
                    $ret[] = "'" . $row[$col] . "'";
                } else {
                    $ret[] = $row[$col];
                }
            }
        }
        return $ret;
    }

    /**
     * 将一个二维数组转换为 HashMap，并返回结果
     *
     * 用法1：
     * @code php
     * $rows = array(
     *     array('id' => 1, 'value' => '1-1'),
     *     array('id' => 2, 'value' => '2-1'),
     * );
     * $hashmap = ArrayHelper::toHashmap($rows, 'id', 'value');
     *
     * dump($hashmap);
     *   // 输出结果为
     *   // array(
     *   //   1 => '1-1',
     *   //   2 => '2-1',
     *   // )
     * @endcode
     *
     * 如果省略 $valueField 参数，则转换结果每一项为包含该项所有数据的数组。
     *
     * 用法2：
     * @code php
     * $rows = array(
     *     array('id' => 1, 'value' => '1-1'),
     *     array('id' => 2, 'value' => '2-1'),
     * );
     * $hashmap = ArrayHelper::toHashmap($rows, 'id');
     *
     * dump($hashmap);
     *   // 输出结果为
     *   // array(
     *   //   1 => array('id' => 1, 'value' => '1-1'),
     *   //   2 => array('id' => 2, 'value' => '2-1'),
     *   // )
     * @endcode
     *
     * @param array $arr 数据源
     * @param string $keyField 按照什么键的值进行转换
     * @param string $valueField 对应的键值
     *
     * @return array 转换后的 HashMap 样式数组
     */
    public static function toHashmap($arr, $keyField, $valueField = NULL)
    {
        $ret = array();
        if ($valueField) {
            foreach ($arr as $row) {
                $ret[$row[$keyField]] = $row[$valueField];
            }
        } else {
            foreach ($arr as $row) {
                $ret[$row[$keyField]] = $row;
            }
        }
        return $ret;
    }

    /**
     * 将一个二维数组按照指定字段的值分组
     *
     * 用法：
     * @endcode
     *
     * @param array $arr 数据源
     * @param string $keyField 作为分组依据的键名
     *
     * @return array 分组后的结果
     */
    public static function groupBy($arr, $keyField)
    {
        $ret = array();
        foreach ($arr as $row) {
            $key = $row[$keyField];
            $ret[$key][] = $row;
        }
        return $ret;
    }

    /**
     * 将一个平面的二维数组按照指定的字段转换为树状结构
     *
     *
     * 如果要获得任意节点为根的子树，可以使用 $refs 参数：
     * @code php
     * $refs = null;
     * $tree = ArrayHelper::tree($rows, 'id', 'parent', 'nodes', $refs);
     *
     * // 输出 id 为 3 的节点及其所有子节点
     * $id = 3;
     * dump($refs[$id]);
     * @endcode
     *
     * @param array $arr 数据源
     * @param string $keyNodeId 节点ID字段名
     * @param string $keyParentId 节点父ID字段名
     * @param string $keyChildrens 保存子节点的字段名
     * @param boolean $refs 是否在返回结果中包含节点引用
     *
     * return array 树形结构的数组
     */
    public static function toTree($arr, $keyNodeId, $keyParentId = 'parent_id', $keyChildrens = 'childrens', & $refs = NULL)
    {
        $refs = array();
        foreach ($arr as $offset => $row) {
            $arr[$offset][$keyChildrens] = array();
            $refs[$row[$keyNodeId]] =& $arr[$offset];
        }

        $tree = array();
        foreach ($arr as $offset => $row) {
            $parentId = $row[$keyParentId];
            if ($parentId) {
                if (!isset($refs[$parentId])) {
                    $tree[] =& $arr[$offset];
                    continue;
                }
                $parent =& $refs[$parentId];
                $parent[$keyChildrens][] =& $arr[$offset];
            } else {
                $tree[] =& $arr[$offset];
            }
        }
        return $tree;
    }

    /**
     * 将树形数组展开为平面的数组
     *
     * 这个方法是 tree() 方法的逆向操作。
     *
     * @param array $tree 树形数组
     * @param string $keyChildrens 包含子节点的键名
     *
     * @return array 展开后的数组
     */
    public static function treeToArray($tree, $keyChildrens = 'childrens')
    {
        $ret = array();
        if (isset($tree[$keyChildrens]) && is_array($tree[$keyChildrens])) {
            foreach ($tree[$keyChildrens] as $child) {
                $ret = array_merge($ret, self::treeToArray($child, $keyChildrens));
            }
            unset($ret[$keyChildrens]);
            $ret[] = $tree;
        } else {
            $ret[] = $tree;
        }
        return $ret;
    }

    /**
     * 根据指定的键对数组排序
     *
     * @endcode
     *
     * @param array $array 要排序的数组
     * @param string $keyname 排序的键
     * @param int $dir 排序方向
     *
     * @return array 排序后的数组
     */
    public static function sortByCol($array, $keyname, $dir = SORT_ASC)
    {
        return self::sortByMultiCols($array, array($keyname => $dir));
    }

    /**
     * 将一个二维数组按照多个列进行排序，类似 SQL 语句中的 ORDER BY
     *
     * 用法：
     * @code php
     * $rows = ArrayHelper::sortByMultiCols($rows, array(
     *     'parent' => SORT_ASC,
     *     'name' => SORT_DESC,
     * ));
     * @endcode
     *
     * @param array $rowset 要排序的数组
     * @param array $args 排序的键
     *
     * @return array 排序后的数组
     */
    public static function sortByMultiCols($rowset, $args)
    {
        $sortArray = array();
        $sortRule = '';
        foreach ($args as $sortField => $sortDir) {
            foreach ($rowset as $offset => $row) {
                $sortArray[$sortField][$offset] = $row[$sortField];
            }
            $sortRule .= '$sortArray[\'' . $sortField . '\'], ' . $sortDir . ', ';
        }
        if (empty($sortArray) || empty($sortRule)) {
            return $rowset;
        }
        eval('array_multisort(' . $sortRule . '$rowset);');
        return $rowset;
    }

    // 获取文件夹大小
    public static function getDirSize($dir)
    {
        $handle = opendir($dir);
        $sizeResult = 0;
        while (false!==($FolderOrFile = readdir($handle)))
        {
            if($FolderOrFile != "." && $FolderOrFile != "..")
            {
                if(is_dir("$dir/$FolderOrFile"))
                {
                    $sizeResult += self::getDirSize("$dir/$FolderOrFile");
                }
                else
                {
                    $sizeResult += filesize("$dir/$FolderOrFile");
                }
            }
        }
        closedir($handle);
        return $sizeResult;
    }

    // 单位自动转换函数
    public static function getRealSize($size)
    {
        $kb = 1024;         // Kilobyte
        $mb = 1024 * $kb;   // Megabyte
        $gb = 1024 * $mb;   // Gigabyte
        $tb = 1024 * $gb;   // Terabyte

        if($size < $kb)
        {
            return $size." B";
        }
        else if($size < $mb)
        {
            return round($size/$kb,2)." KB";
        }
        else if($size < $gb)
        {
            return round($size/$mb,2)." MB";
        }
        else if($size < $tb)
        {
            return round($size/$gb,2)." GB";
        }
        else
        {
            return round($size/$tb,2)." TB";
        }
    }

    /**
     * @path 路径，支持相对和绝对
     * @absolute 返回的文件数组，是否包含完整路径
     */
    public static function get_files($path, $absolute=1)
    {
        $files = array();
        $_path = realpath($path);
        if (!file_exists($_path)) return false;
        if (is_dir($_path)) {
            $list = scandir($_path);
            foreach ($list as $v) {
                if ($v == '.' || $v == '..') continue;
                $_paths = $_path.'/'.$v;
                if (is_dir($_paths)) {
                    //递归
                    $files = array_merge($files, self::get_files($_paths,$absolute));
                } else {
                    $files[] = $absolute>0 ? $_paths : $v;
                }
            }
        } else {
            if (!is_file($_path)) return false;
            $files[] = $_path;
        }
        return $files;
    }

    /**
     * 对2维数组或者多维数组排序
     * @param $arrays
     * @param $sort_key
     * @param int $sort_order
     *    SORT_ASC - 默认，按升序排列。(A-Z)
     *    SORT_DESC - 按降序排列。(Z-A)
     * @param int $sort_type SORT_ASC - 默认，按升序排列。(A-Z)
     *    SORT_REGULAR - 默认。将每一项按常规顺序排列。
     *    SORT_NUMERIC - 将每一项按数字顺序排列。
     *    SORT_STRING - 将每一项按字母顺序排列
     * @return array|bool
     */
    public static function my_sort($arrays,$sort_key,$sort_order=SORT_ASC,$sort_type=SORT_NUMERIC )
    {
        if(is_array($arrays)){
            foreach ($arrays as $array){
                if(is_array($array)){
                    $key_arrays[] = $array[$sort_key];
                }else{
                    return false;
                }
            }
        }else{
            return false;
        }
        array_multisort($key_arrays,$sort_order,$sort_type,$arrays);
        return $arrays;
    }

    /**
    +-----------------------------------------------------------------------------------------
     * 删除目录及目录下所有文件或删除指定文件
    +-----------------------------------------------------------------------------------------
     * @param str $path   待删除目录路径
     * @param int $delDir 是否删除目录，1或true删除目录，0或false则只删除文件保留目录（包含子目录）
    +-----------------------------------------------------------------------------------------
     * @return bool 返回删除状态
    +-----------------------------------------------------------------------------------------
     */
    public static function delDirAndFile($path, $delDir = FALSE) {
        if (is_array($path)) {
            foreach ($path as $subPath)
                self::delDirAndFile($subPath, $delDir);
        }
        if (is_dir($path)) {
            $handle = opendir($path);
            if ($handle) {
                while (false !== ( $item = readdir($handle) )) {
                    if ($item != "." && $item != "..")
                        is_dir("$path/$item") ? self::delDirAndFile("$path/$item", $delDir) : unlink("$path/$item");
                }
                closedir($handle);
                if ($delDir)
                    return rmdir($path);
            }
        } else {
            if (file_exists($path)) {
                return unlink($path);
            } else {
                return FALSE;
            }
        }
        clearstatcache();
    }

    /**
     * 将excel转换为数组 by aibhsc
     * 需要下载phpexcel
     */
    public static function format_excel2array($filePath='',$sheet=0){
        if(empty($filePath) or !file_exists($filePath)){die('file not exists');}
        $PHPReader = new \PHPExcel_Reader_Excel2007();        //建立reader对象
        if(!$PHPReader->canRead($filePath)){
            $PHPReader = new \PHPExcel_Reader_Excel5();
            if(!$PHPReader->canRead($filePath)){
                echo 'no Excel';
                return false;
            }
        }
        $PHPExcel = $PHPReader->load($filePath);        //建立excel对象
        $currentSheet = $PHPExcel->getSheet($sheet);        //**读取excel文件中的指定工作表*/
        $allColumn = $currentSheet->getHighestColumn();        //**取得最大的列号*/
        $allRow = $currentSheet->getHighestRow();        //**取得一共有多少行*/
        $data = array();
        for($rowIndex=0;$rowIndex<=$allRow;$rowIndex++){        //循环读取每个单元格的内容。注意行从1开始，列从A开始
            for($colIndex='A';$colIndex<=$allColumn;$colIndex++){
                $addr = $colIndex.$rowIndex;
                $cell = $currentSheet->getCell($addr)->getValue();
                if($cell instanceof \PHPExcel_RichText){ //富文本转换字符串
                    $cell = $cell->__toString();
                }
                $data[$rowIndex][$colIndex] = $cell;
            }
        }
        return $data;
    }

    /**
     * 在一维数组里获取一个随机值
     * @param $arr
     * @return mixed
     */
    public static function getAnRandomValueFromArray($arr)
    {
        $total = count($arr);
        $limit = $total - 1;
        $x = rand(0, $limit);
        return $arr[$x];
    }
}