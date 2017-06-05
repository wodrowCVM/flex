# flex (飞飞社区)
飞飞社区

##demo

[http://frontend.flex.wodrow.cc/](http://frontend.flex.wodrow.cc/)
[http://backend.flex.wodrow.cc/](http://backend.flex.wodrow.cc/)

## 安装方式

git clone https://github.com/wodrowCVM/flex/tree/v0.9.9

composer update -vv

导入数据 `flex/data/flex.sql`,导入之前修改`flex.sql`里的视图连接'user'@'%'

配置数据库和域名
实例
`common/ConfigDataLocal.php`

```php
namespace common\config;
class ConfigDataLocal
{
    public static $super = 'test';
}
```

`common/params-local.php`

```php
$params = [
    'frontend_url'=>'http://frontend.flex.wodrow.cc/', //对应frontend/web    
    'backend_url'=>'http://backend.flex.wodrow.cc/', //对应backend/web
];
return $params;
```
