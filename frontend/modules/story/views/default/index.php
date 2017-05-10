<div class="story-default-index">
    <div class="row">
        <div class="col-md-9">
            <ul class="list-group">
                <li class="list-group-item article-item">
                    <div class="home-list-title">
                        <a href="/article/53.html">从理论到实践，全方位认识DNS（实践篇）</a>
                    </div>
                    <div class="hide-overflow home-list-content">
                        在理论篇我们基本了解了DNS的整个协议原理，但是可能还会有着下面的疑问：为什么我想申请的域名都没了？DNS 域名还要备案，这是为什么啊？如何将刚申请的域名绑定到自己的网站呢？怎么才能看到那些在背后默默给我解析的域名服务器呢？他们说用一个什么文件就可以访问好多好多不存在的网站，是真的吗？可信任的域名服务器是怎么一回事，难道有些域名服务器会做坏事？怎么知道我现在用的域名服务器有没有使坏呢？……我不准备一个一个地去回答这些问题，不过相信我，读完本文，对于上面问题的答案你会有一个清晰的认识，并且可以解决其他各种各样关于 DNS 方面的问题。域名注册、绑定首先明确一点，每个人都可以去注册域名。大多数时候我们希望去注册一个顶级域名（比如selfboot.cn, google.com等），那些二级域名毕竟...                </div>
                    <div class="home-list-bottom">
                        <span class="glyphicon glyphicon-calendar"></span>&nbsp;发布日期：
                        2017-03-01                    <span class="glyphicon glyphicon-list" style="margin-left:15px;"></span>&nbsp;分类：
                        <a href="/category/other.html">其他</a>
                        <span class="glyphicon glyphicon-eye-open" style="margin-left:15px;"></span>&nbsp;热度：
                        179&nbsp;℃
                        <span class="glyphicon glyphicon-comment" style="margin-left:15px;"></span>
                        0条评论
                        <a href="/article/53.html">
                            <button type="button" class="btn btn-default btn-xs pull-right">阅读全文</button>
                        </a>
                    </div>
                </li>
                <li class="list-group-item article-item">
                    <div class="home-list-title">
                        <a href="/article/52.html">从理论到实践，全方位认识DNS（理论篇）</a>
                    </div>
                    <div class="hide-overflow home-list-content">
                        对于 DNS(Domain Name System) 大家肯定不陌生，不就是用来将一个网站的域名转换为对应的IP吗。当我们发现可以上QQ但不能浏览网页时，我们会想到可能是域名服务器挂掉了；当我们用别人提供的hosts文件浏览到一个“不存在”的网页时，我们会了解到域名解析系统的脆弱。然而关于DNS还有一大堆故事值得我们去倾听，去思考。DNS 源起要想访问网络上的一台计算机，我们必须要知道它的IP地址，但是这些地址（比如243.185.187.39）只是一串数字，没有规律，因此我们很难记住。并且如果一台计算机变更IP后，它必须通知所有的人。显然，直接使用IP地址是一个愚蠢的方案。于是人们想出了一个替代的方法，即为每一台计算机起一个名字，然后建立计算机名字到地址的一个映射关系。我们访问计算机的名字...                </div>
                    <div class="home-list-bottom">
                        <span class="glyphicon glyphicon-calendar"></span>&nbsp;发布日期：
                        2017-03-01                    <span class="glyphicon glyphicon-list" style="margin-left:15px;"></span>&nbsp;分类：
                        <a href="/category/other.html">其他</a>
                        <span class="glyphicon glyphicon-eye-open" style="margin-left:15px;"></span>&nbsp;热度：
                        147&nbsp;℃
                        <span class="glyphicon glyphicon-comment" style="margin-left:15px;"></span>
                        0条评论
                        <a href="/article/52.html">
                            <button type="button" class="btn btn-default btn-xs pull-right">阅读全文</button>
                        </a>
                    </div>
                </li>
                <li class="list-group-item article-item">
                    <div class="home-list-title">
                        <a href="/article/51.html">Docker部署笔记</a>
                    </div>
                    <div class="hide-overflow home-list-content">
                        之前不一小心把Ubuntu16.10所有软件的apt-get配置给删了，然后就把系统给重新装了一遍。想一下以后如果要再次重装系统的话，配置服务器这些有点繁琐，然后就想了下，web服务都用docker来运行。docker基础用法，看起来还挺简单的，但是在我实际的使用中，按照自己的想法去部署服务的时候还是遇到了一些书上没说的细节问题。这些细节问题，进行不下去时候，那么我先去搜索，搜索不到再去发帖，这样有时候会在一个小点上面卡主好几天。看到这里，我当然都把这些问题一一解决了。我这里的架构是Nginx+MySQL+PHP的。一开始我是想用Dockerfile文件，把它们三个全都放到一个镜像里面取，一开始的Dockerfile内容如下：FROM&nbsp;ubuntu:latest
                        RUN&nbsp;apt-get&nbsp;up...                </div>
                    <div class="home-list-bottom">
                        <span class="glyphicon glyphicon-calendar"></span>&nbsp;发布日期：
                        2017-01-21                    <span class="glyphicon glyphicon-list" style="margin-left:15px;"></span>&nbsp;分类：
                        <a href="/category/other.html">其他</a>
                        <span class="glyphicon glyphicon-eye-open" style="margin-left:15px;"></span>&nbsp;热度：
                        542&nbsp;℃
                        <span class="glyphicon glyphicon-comment" style="margin-left:15px;"></span>
                        0条评论
                        <a href="/article/51.html">
                            <button type="button" class="btn btn-default btn-xs pull-right">阅读全文</button>
                        </a>
                    </div>
                </li>
                <li class="list-group-item article-item">
                    <div class="home-list-title">
                        <a href="/article/50.html">Yii2自定义JSON格式响应</a>
                    </div>
                    <div class="hide-overflow home-list-content">
                        默认是有个JsonResponseFormatter的，但是呢，我们如果做APP的API的话，json响应的格式和内容，每个人的约定都是有差异的，不可能和yii2默认的相一致。之前通过搜索搜索到的答案是，给Response对象的EVENT_BEFORE_SEN事件注册一个处理函数，在发送结果之前再处理一下。原文链接：https://github.com/yiisoft/yii2/blob/master/docs/guide-zh-CN/rest-error-handling.md主要代码如下：return&nbsp;[
                        &nbsp;&nbsp;&nbsp;&nbsp;//&nbsp;...
                        &nbsp;&nbsp;&nbsp;&nbsp;'components'&nbsp;=&amp;gt;&nbsp;[
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'response'&nbsp;=&amp;gt;&nbsp;[
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'class'&nbsp;=&amp;gt;&nbsp;'yi...                </div>
                    <div class="home-list-bottom">
                        <span class="glyphicon glyphicon-calendar"></span>&nbsp;发布日期：
                        2016-12-15                    <span class="glyphicon glyphicon-list" style="margin-left:15px;"></span>&nbsp;分类：
                        <a href="/category/php.html">PHP</a>
                        <span class="glyphicon glyphicon-eye-open" style="margin-left:15px;"></span>&nbsp;热度：
                        240&nbsp;℃
                        <span class="glyphicon glyphicon-comment" style="margin-left:15px;"></span>
                        0条评论
                        <a href="/article/50.html">
                            <button type="button" class="btn btn-default btn-xs pull-right">阅读全文</button>
                        </a>
                    </div>
                </li>
                <li class="list-group-item article-item">
                    <div class="home-list-title">
                        <a href="/article/49.html">MySQL加锁处理分析</a>
                    </div>
                    <div class="hide-overflow home-list-content">
                        msyql遇到事务等待锁超时（error code:1205）的情况。了解下mysql锁的东西，文章是别人的。http://hedengcheng.com/?p=771顺便截个图...                </div>
                    <div class="home-list-bottom">
                        <span class="glyphicon glyphicon-calendar"></span>&nbsp;发布日期：
                        2016-09-19                    <span class="glyphicon glyphicon-list" style="margin-left:15px;"></span>&nbsp;分类：
                        <a href="/category/mysql.html">MySQL</a>
                        <span class="glyphicon glyphicon-eye-open" style="margin-left:15px;"></span>&nbsp;热度：
                        447&nbsp;℃
                        <span class="glyphicon glyphicon-comment" style="margin-left:15px;"></span>
                        1条评论
                        <a href="/article/49.html">
                            <button type="button" class="btn btn-default btn-xs pull-right">阅读全文</button>
                        </a>
                    </div>
                </li>
                <li class="list-group-item article-item">
                    <div class="home-list-title">
                        <a href="/article/48.html">MySQL5.7新增数据类型 - JSON类型</a>
                    </div>
                    <div class="hide-overflow home-list-content">
                        算是对MySQL官方文档对JSON数据类型描述的一个笔记吧！官方介绍在这里：http://dev.mysql.com/doc/refman/5.7/en/json.html。从MySQL 5.7.8开始，MySQL新增了对JSON数据结构的原生支持。JSON数据类型相对于存储JSON格式的字符串的一些优势：1、JSON列会自动验证格式的正确性，错误的JSON会报错。2、优化的存储格式。存储的JSON文档会转换成一个内部的格式，以提供对文档元素的快速访问，当需要访问JSON的某个值得时候，不需要从一个文本里面去解析出这个值。这个二进制结构允许直接查找子对象或者通过key查找嵌套的值，或者是在不需要读取整个数组的情况下查找数组索引。JSON数据类型的最大存储大小是通过系统变量max_allowe...                </div>
                    <div class="home-list-bottom">
                        <span class="glyphicon glyphicon-calendar"></span>&nbsp;发布日期：
                        2016-08-02                    <span class="glyphicon glyphicon-list" style="margin-left:15px;"></span>&nbsp;分类：
                        <a href="/category/mysql.html">MySQL</a>
                        <span class="glyphicon glyphicon-eye-open" style="margin-left:15px;"></span>&nbsp;热度：
                        586&nbsp;℃
                        <span class="glyphicon glyphicon-comment" style="margin-left:15px;"></span>
                        2条评论
                        <a href="/article/48.html">
                            <button type="button" class="btn btn-default btn-xs pull-right">阅读全文</button>
                        </a>
                    </div>
                </li>
                <li class="list-group-item article-item">
                    <div class="home-list-title">
                        <a href="/article/47.html">nginx php 502 bad gateway的情况</a>
                    </div>
                    <div class="hide-overflow home-list-content">
                        小计一笔，这里仅限是环境搭建的过程。搭了个LNMP的环境，估计很多同学最常遇到的就是502了吧？我搭了那么多次，就是502最多。我遇到的一般都出在用户的设置和目录权限的配置上面的，解决这两点一般就不会有什么问题了。配置nginx，新建了个用户组web，和用户webuser。改配置nginx.conf的user选项为user webuser。执行nginx -t报错：nginx:&nbsp;[emerg]&nbsp;getgrnam("webuser")&nbsp;failed&nbsp;in&nbsp;/etc/nginx/nginx.conf:1
                        nginx:&nbsp;configuration&nbsp;file&nbsp;/etc/nginx/nginx.conf&nbsp;test&nbsp;failed这什么意思啊？一番搜索之后好像没什么有用信息。原来是user www-dat...                </div>
                    <div class="home-list-bottom">
                        <span class="glyphicon glyphicon-calendar"></span>&nbsp;发布日期：
                        2016-07-16                    <span class="glyphicon glyphicon-list" style="margin-left:15px;"></span>&nbsp;分类：
                        <a href="/category/other.html">其他</a>
                        <span class="glyphicon glyphicon-eye-open" style="margin-left:15px;"></span>&nbsp;热度：
                        510&nbsp;℃
                        <span class="glyphicon glyphicon-comment" style="margin-left:15px;"></span>
                        0条评论
                        <a href="/article/47.html">
                            <button type="button" class="btn btn-default btn-xs pull-right">阅读全文</button>
                        </a>
                    </div>
                </li>
                <li class="list-group-item article-item">
                    <div class="home-list-title">
                        <a href="/article/46.html">迁移服务器到Linode去了</a>
                    </div>
                    <div class="hide-overflow home-list-content">
                        这服务器过期好久了，去后台看了，套餐都不见了，网站竟然还在，还能访问，惊讶。难道是忘记清理了？哈。。。还是去买了个vps来搞搞，之前用的是虚拟主机。昨晚去linode买了个最低配置的主机，新加坡节点，今天起来就搭了个环境，把网站运行起来了。感觉速度还可以啊！嘿嘿！...                </div>
                    <div class="home-list-bottom">
                        <span class="glyphicon glyphicon-calendar"></span>&nbsp;发布日期：
                        2016-07-16                    <span class="glyphicon glyphicon-list" style="margin-left:15px;"></span>&nbsp;分类：
                        <a href="/category/other.html">其他</a>
                        <span class="glyphicon glyphicon-eye-open" style="margin-left:15px;"></span>&nbsp;热度：
                        431&nbsp;℃
                        <span class="glyphicon glyphicon-comment" style="margin-left:15px;"></span>
                        2条评论
                        <a href="/article/46.html">
                            <button type="button" class="btn btn-default btn-xs pull-right">阅读全文</button>
                        </a>
                    </div>
                </li>
                <li class="list-group-item article-item">
                    <div class="home-list-title">
                        <a href="/article/45.html">MySQL 5.6 &amp; 5.7最优配置文件模板</a>
                    </div>
                    <div class="hide-overflow home-list-content">
                        原文地址：http://www.innomysql.net/article/21730.htmlInside君整理了一份最新基于MySQL 5.6和5.7的配置文件模板，基本上可以说覆盖90%的调优选项，用户只需根据自己的服务器配置稍作修改即可，如InnoDB缓冲池的大小、IO能力（innodb_buffer_pool_size，innodb_io_capacity)。特别注意，这份配置文件不用修改，可以直接运行在MySQL 5.6和5.7的版本下，这里使用了小小的技巧，具体可看配置文件。如果配置参数存在问题，也可以及时反馈Inside君，我们一起成长。触发Inside君做这件事情的原因是大部分网络上的MySQL配置文件都非常非常古老，大多都是基于MySQL 5.1的版本，这导致了绝大部分M...                </div>
                    <div class="home-list-bottom">
                        <span class="glyphicon glyphicon-calendar"></span>&nbsp;发布日期：
                        2015-12-24                    <span class="glyphicon glyphicon-list" style="margin-left:15px;"></span>&nbsp;分类：
                        <a href="/category/mysql.html">MySQL</a>
                        <span class="glyphicon glyphicon-eye-open" style="margin-left:15px;"></span>&nbsp;热度：
                        547&nbsp;℃
                        <span class="glyphicon glyphicon-comment" style="margin-left:15px;"></span>
                        0条评论
                        <a href="/article/45.html">
                            <button type="button" class="btn btn-default btn-xs pull-right">阅读全文</button>
                        </a>
                    </div>
                </li>
                <li class="list-group-item article-item">
                    <div class="home-list-title">
                        <a href="/article/44.html">线性表 - 顺序存储结构</a>
                    </div>
                    <div class="hide-overflow home-list-content">
                        线性表顺序存储结构是指在内存上用连续的存储空间来存储数据。这就导致这种结构需要在初始化的时候就申请好需要的全部空间。如下图，每一个格子代表一片内存的存储区域，如果我们初始化了一个最大5个元素的顺序存储的线性表，那么它在内存中的存储位置，可能是0,1,2,3,4，也可能只2,3,4,5,6，总之他们的内存地址是连续的。这种结构用完空间之后就没有了，申请多大的空间也不好把握，如果申请的比较大，没有存储数据的空间别的程序也不能使用，只能浪费在哪里了，所以灵活性较小。这种结构和数组很相似，所以可以用数组来实现。Go 代码实现：package&nbsp;main

                        import&nbsp;(
                        &nbsp;&nbsp;&nbsp;"fmt"
                        &nbsp;&nbsp;&nbsp;"errors"
                        &nbsp;&nbsp;&nbsp;"os"
                        )

                        //最大长度
                        const&nbsp;MAXSIZE&nbsp;=&nbsp;10

                        type&nbsp;L...                </div>
                    <div class="home-list-bottom">
                        <span class="glyphicon glyphicon-calendar"></span>&nbsp;发布日期：
                        2015-12-22                    <span class="glyphicon glyphicon-list" style="margin-left:15px;"></span>&nbsp;分类：
                        <a href="/category/basic.html">编程基础</a>
                        <span class="glyphicon glyphicon-eye-open" style="margin-left:15px;"></span>&nbsp;热度：
                        412&nbsp;℃
                        <span class="glyphicon glyphicon-comment" style="margin-left:15px;"></span>
                        0条评论
                        <a href="/article/44.html">
                            <button type="button" class="btn btn-default btn-xs pull-right">阅读全文</button>
                        </a>
                    </div>
                </li>
            </ul>
            <ul class="pagination"><li class="first disabled"><span>首页</span></li>
                <li class="prev disabled"><span>«</span></li>
                <li class="active"><a href="/index/1.html" data-page="0">1</a></li>
                <li><a href="/index/2.html" data-page="1">2</a></li>
                <li><a href="/index/3.html" data-page="2">3</a></li>
                <li><a href="/index/4.html" data-page="3">4</a></li>
                <li><a href="/index/5.html" data-page="4">5</a></li>
                <li class="next"><a href="/index/2.html" data-page="1">»</a></li>
                <li class="last"><a href="/index/5.html" data-page="4">尾页</a></li></ul>    </div>
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-star"></span>&nbsp;最新发布
                </div>
                <div class="panel-body">
                    <ul class="sidebar-ul">
                        <li class="sidebar-li"><a href="/article/53.html" title="从理论到实践，全方位认识DNS（实践篇）">从理论到实践，全方位认识DNS（实践篇）</a></li>
                        <li class="sidebar-li"><a href="/article/52.html" title="从理论到实践，全方位认识DNS（理论篇）">从理论到实践，全方位认识DNS（理论篇）</a></li>
                        <li class="sidebar-li"><a href="/article/51.html" title="Docker部署笔记">Docker部署笔记</a></li>
                        <li class="sidebar-li"><a href="/article/50.html" title="Yii2自定义JSON格式响应">Yii2自定义JSON格式响应</a></li>
                        <li class="sidebar-li"><a href="/article/49.html" title="MySQL加锁处理分析">MySQL加锁处理分析</a></li>
                    </ul>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-fire"></span>&nbsp;热门文章
                </div>
                <div class="panel-body">
                    <ul class="sidebar-ul">
                        <li class="sidebar-li"><a href="/article/9.html" title="HTML5触摸事件（多点、单点触控）">HTML5触摸事件（多点、单点触控）</a></li>
                        <li class="sidebar-li"><a href="/article/13.html" title="Yii 2.0鉴权之RBAC(Yii2.0 Authorization By RBAC)">Yii 2.0鉴权之RBAC(Yii2.0 Authorization By RBAC)</a></li>
                        <li class="sidebar-li"><a href="/article/17.html" title="Yii2.0 验证码的使用">Yii2.0 验证码的使用</a></li>
                        <li class="sidebar-li"><a href="/article/23.html" title="微信支付之APP支付">微信支付之APP支付</a></li>
                        <li class="sidebar-li"><a href="/article/11.html" title="Yii 2.0鉴权之访问控制过滤器(Yii2.0 Authorization By ACF)">Yii 2.0鉴权之访问控制过滤器(Yii2.0 Authorization By ACF)</a></li>
                    </ul>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading"><span class="glyphicon glyphicon-cloud"></span>&nbsp;标签云</div>
                <div class="panel-body">
                    <a href="/tag/103.html"><span class="label label-default label-fix">顺序存储</span></a>
                    <a href="/tag/47.html"><span class="label label-default label-fix">网页支付</span></a>
                    <a href="/tag/14.html"><span class="label label-default label-fix">多点触控</span></a>
                    <a href="/tag/52.html"><span class="label label-default label-fix">htm5文件上传</span></a>
                    <a href="/tag/101.html"><span class="label label-default label-fix">数据结构</span></a>
                    <a href="/tag/56.html"><span class="label label-default label-fix">原则</span></a>
                    <a href="/tag/46.html"><span class="label label-default label-fix">银联支付</span></a>
                    <a href="/tag/16.html"><span class="label label-default label-fix">邮件发送</span></a>
                    <a href="/tag/90.html"><span class="label label-default label-fix">分析SQL</span></a>
                    <a href="/tag/45.html"><span class="label label-default label-fix">配置</span></a>
                    <a href="/tag/79.html"><span class="label label-default label-fix">验收测试</span></a>
                    <a href="/tag/108.html"><span class="label label-default label-fix">LNMP</span></a>
                    <a href="/tag/44.html"><span class="label label-default label-fix">git</span></a>
                    <a href="/tag/74.html"><span class="label label-default label-fix">errors</span></a>
                    <a href="/tag/43.html"><span class="label label-default label-fix">APP支付</span></a>
                    <a href="/tag/42.html"><span class="label label-default label-fix">公众号支付</span></a>
                    <a href="/tag/99.html"><span class="label label-default label-fix">数据库字符集</span></a>
                    <a href="/tag/39.html"><span class="label label-default label-fix">认证</span></a>
                    <a href="/tag/9.html"><span class="label label-default label-fix">原型</span></a>
                    <a href="/tag/37.html"><span class="label label-default label-fix">存储引擎</span></a>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading"><span class="glyphicon glyphicon-link"></span>&nbsp;友情链接</div>
                <div class="panel-body home-links">
                    <a href="http://www.phpboke.com/" target="_blank">PHP博客</a>
                    <a href="http://www.xdvps.com/" target="_blank">雪帝VPS</a>
                    <a href="http://sonnewilling.com/" target="_blank">陋室</a>
                    <a href="http://blog.iwshop.com/" target="_blank">PHP博客</a>
                </div>
            </div>
        </div>
    </div>
</div>
