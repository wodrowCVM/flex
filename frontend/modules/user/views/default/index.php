    <div class="user-default-index">
        <div class="row">
            <div class="col-sm-3">
                <!--left col-->
                <?= $this->render('/public/avatar') ?>
                <?= $this->render('/public/progress') ?>
                <?= $this->render('/public/persion_info') ?>
                <?= $this->render('/public/achievement') ?>
            </div>
            <div class="col-lg-6">

                <ul id="w0" class="nav nav-tabs nav-user">
                    <li class="active"><a href="/user/30998/index">全部动态</a></li>
                    <li><a href="/user/30998/index?type=feed">说说</a></li>
                    <li><a href="/user/30998/index?type=post">文章</a></li>
                    <li><a href="/user/30998/index?type=question">问答</a></li>
                    <li><a href="/user/30998/index?type=topic">话题</a></li>
                    <li><a href="/user/30998/index?type=case">案例</a></li>
                </ul>
                <ul id="w1" class="media-list">
                    <li class="media"
                        data-key="{&quot;user_id&quot;:30998,&quot;type&quot;:&quot;follow&quot;,&quot;item_id&quot;:33900}">
                        <div class="media-left"><a href="/user/30998" rel="author"><img class="media-object"
                                                                                        src="http://www.yiichina.com/uploads/avatar/000/03/09/98_avatar_small.jpg"
                                                                                        alt="wodrow"></a></div>
                        <div class="media-body">
                            <div class="media-heading"><a href="/user/30998" rel="author">wodrow</a> 关注了<a
                                    href="/user/33900" rel="author">魏曦教你学</a></div>
                            <div class="media-content"></div>
                            <div class="media-action"><span>2小时前</span></div>
                        </div>
                    </li>
                    <li class="media"
                        data-key="{&quot;user_id&quot;:31235,&quot;type&quot;:&quot;answer&quot;,&quot;item_id&quot;:10943}">
                        <div class="media-left"><a href="/user/31235" rel="author"><img class="media-object"
                                                                                        src="http://www.yiichina.com/uploads/avatar/000/03/12/35_avatar_small.jpg"
                                                                                        alt="koko"></a></div>
                        <div class="media-body">
                            <div class="media-heading"><a href="/user/31235" rel="author">koko</a> 回答了问题 <a
                                    href="/question/2843">如何在公共布局里显示数据库的数据?</a></div>
                            <div class="media-content"><p>跟其他页面一样，直接引入模型，查询数据</p>
                                <pre><code class="hljs xml"><span class="php"><span class="hljs-meta">&lt;?php</span>
    ……
    <span class="hljs-keyword">use</span> <span class="hljs-title">backend</span>\<span
                                                class="hljs-title">models</span>\<span class="hljs-title">SiteInfo</span>;

    AppAsset::register(<span class="hljs-keyword">$this</span>);
    <span class="hljs-meta">?&gt;</span></span>
    <span class="php"><span class="hljs-meta">&lt;?php</span> <span class="hljs-keyword">$this</span>-&gt;beginPage() <span
            class="hljs-meta">?&gt;</span></span>
    <span class="php"><span class="hljs-meta">&lt;?php</span>
    <span class="hljs-comment">/* 设置页面seo信息 */</span>
    $site_info = SiteInfo::get_site_info();

        !<span class="hljs-keyword">isset</span>(<span class="hljs-keyword">$this</span>-&gt;metaTags[<span
            class="hljs-string">'keywords'</span>])&amp;&amp;<span class="hljs-keyword">isset</span>($site_info[<span
            class="hljs-string">'site_keywords'</span>])?<span class="hljs-keyword">$this</span>-&gt;registerMetaTag([<span
            class="hljs-string">'name'</span>=&gt;<span class="hljs-string">"Keywords"</span>,<span class="hljs-string">'content'</span>=&gt;$site_info[<span
            class="hljs-string">'site_keywords'</span>]],<span class="hljs-string">'keywords'</span>):<span
            class="hljs-string">""</span> ;

    <span class="hljs-meta">?&gt;</span></span>
    ……
    </code></pre>
                            </div>
                            <div class="media-action"><span>3小时前</span><span class="pull-right"><a
                                        href="/question/2843">查看</a></span></div>
                        </div>
                    </li>
                    <li class="media"
                        data-key="{&quot;user_id&quot;:31235,&quot;type&quot;:&quot;follow&quot;,&quot;item_id&quot;:40871}">
                        <div class="media-left"><a href="/user/31235" rel="author"><img class="media-object"
                                                                                        src="http://www.yiichina.com/uploads/avatar/000/03/12/35_avatar_small.jpg"
                                                                                        alt="koko"></a></div>
                        <div class="media-body">
                            <div class="media-heading"><a href="/user/31235" rel="author">koko</a> 关注了<a href="/user/40871"
                                                                                                         rel="author">Blue_Start</a>
                            </div>
                            <div class="media-content"></div>
                            <div class="media-action"><span>3小时前</span></div>
                        </div>
                    </li>
                    <li class="media"
                        data-key="{&quot;user_id&quot;:2,&quot;type&quot;:&quot;registration&quot;,&quot;item_id&quot;:136838}">
                        <div class="media-left"><a href="/user/2" rel="author"><img class="media-object"
                                                                                    src="http://www.yiichina.com/uploads/avatar/000/00/00/02_avatar_small.jpg"
                                                                                    alt="╃巡洋艦㊣"></a></div>
                        <div class="media-body">
                            <div class="media-heading"><a href="/user/2" rel="author">╃巡洋艦㊣</a> 2017-05-06 已签到</div>
                            <div class="media-content">连续签到784天，获得了20个金钱</div>
                            <div class="media-action"><span>5小时前</span></div>
                        </div>
                    </li>
                    <li class="media"
                        data-key="{&quot;user_id&quot;:30998,&quot;type&quot;:&quot;registration&quot;,&quot;item_id&quot;:136831}">
                        <div class="media-left"><a href="/user/30998" rel="author"><img class="media-object"
                                                                                        src="http://www.yiichina.com/uploads/avatar/000/03/09/98_avatar_small.jpg"
                                                                                        alt="wodrow"></a></div>
                        <div class="media-body">
                            <div class="media-heading"><a href="/user/30998" rel="author">wodrow</a> 2017-05-06 已签到</div>
                            <div class="media-content">连续签到83天，获得了20个金钱</div>
                            <div class="media-action"><span>6小时前</span></div>
                        </div>
                    </li>
                    <li class="media"
                        data-key="{&quot;user_id&quot;:29515,&quot;type&quot;:&quot;favorite&quot;,&quot;item_id&quot;:9517}">
                        <div class="media-left"><a href="/user/29515" rel="author"><img class="media-object"
                                                                                        src="http://www.yiichina.com/uploads/avatar/000/02/95/15_avatar_small.jpg"
                                                                                        alt="YiiSoEasy"></a></div>
                        <div class="media-body">
                            <div class="media-heading"><a href="/user/29515" rel="author">YiiSoEasy</a> 收藏了扩展</div>
                            <div class="media-content"><a href="/extension/1160">移动Html 5前端性能优化指南</a></div>
                            <div class="media-action"><span>6小时前</span></div>
                        </div>
                    </li>
                    <li class="media"
                        data-key="{&quot;user_id&quot;:29515,&quot;type&quot;:&quot;answer&quot;,&quot;item_id&quot;:10940}">
                        <div class="media-left"><a href="/user/29515" rel="author"><img class="media-object"
                                                                                        src="http://www.yiichina.com/uploads/avatar/000/02/95/15_avatar_small.jpg"
                                                                                        alt="YiiSoEasy"></a></div>
                        <div class="media-body">
                            <div class="media-heading"><a href="/user/29515" rel="author">YiiSoEasy</a> 回答了问题 <a
                                    href="/question/2834">sql的字段查询整型超过11位就会变成负数</a></div>
                            <div class="media-content"><p>看看save有没有重写，验证有没有影响，试试save(false)</p>
                            </div>
                            <div class="media-action"><span>7小时前</span><span class="pull-right"><a
                                        href="/question/2834">查看</a></span></div>
                        </div>
                    </li>
                    <li class="media"
                        data-key="{&quot;user_id&quot;:29515,&quot;type&quot;:&quot;answer&quot;,&quot;item_id&quot;:10939}">
                        <div class="media-left"><a href="/user/29515" rel="author"><img class="media-object"
                                                                                        src="http://www.yiichina.com/uploads/avatar/000/02/95/15_avatar_small.jpg"
                                                                                        alt="YiiSoEasy"></a></div>
                        <div class="media-body">
                            <div class="media-heading"><a href="/user/29515" rel="author">YiiSoEasy</a> 回答了问题 <a
                                    href="/question/2835">composer速度极慢的问题</a></div>
                            <div class="media-content"><p>如果是慢不是连不上，考虑你的带宽和更换镜像地址</p>
                            </div>
                            <div class="media-action"><span>7小时前</span><span class="pull-right"><a
                                        href="/question/2835">查看</a></span></div>
                        </div>
                    </li>
                    <li class="media"
                        data-key="{&quot;user_id&quot;:29515,&quot;type&quot;:&quot;feed&quot;,&quot;item_id&quot;:22171}">
                        <div class="media-left"><a href="/user/29515" rel="author"><img class="media-object"
                                                                                        src="http://www.yiichina.com/uploads/avatar/000/02/95/15_avatar_small.jpg"
                                                                                        alt="YiiSoEasy"></a></div>
                        <div class="media-body">
                            <div class="media-heading"><a href="/user/29515" rel="author">YiiSoEasy</a> 发表了说说</div>
                            <div class="media-content">滴，QQ小冰卡</div>
                            <div class="media-action"><span class="time">7小时前</span><span class="pull-right">浏览(1) | <a
                                        href="/feed/22171">回复(0)</a></span></div>
                        </div>
                    </li>
                    <li class="media"
                        data-key="{&quot;user_id&quot;:29515,&quot;type&quot;:&quot;registration&quot;,&quot;item_id&quot;:136828}">
                        <div class="media-left"><a href="/user/29515" rel="author"><img class="media-object"
                                                                                        src="http://www.yiichina.com/uploads/avatar/000/02/95/15_avatar_small.jpg"
                                                                                        alt="YiiSoEasy"></a></div>
                        <div class="media-body">
                            <div class="media-heading"><a href="/user/29515" rel="author">YiiSoEasy</a> 2017-05-06 已签到</div>
                            <div class="media-content">连续签到4天，获得了20个金钱</div>
                            <div class="media-action"><span>7小时前</span></div>
                        </div>
                    </li>
                    <ul class="pagination">
                        <li class="prev disabled"><span>«</span></li>
                        <li class="active"><a href="/user/default/index?page=1&amp;per-page=10" data-page="0">1</a></li>
                        <li><a href="/user/default/index?page=2&amp;per-page=10" data-page="1">2</a></li>
                        <li><a href="/user/default/index?page=3&amp;per-page=10" data-page="2">3</a></li>
                        <li><a href="/user/default/index?page=4&amp;per-page=10" data-page="3">4</a></li>
                        <li><a href="/user/default/index?page=5&amp;per-page=10" data-page="4">5</a></li>
                        <li><a href="/user/default/index?page=6&amp;per-page=10" data-page="5">6</a></li>
                        <li><a href="/user/default/index?page=7&amp;per-page=10" data-page="6">7</a></li>
                        <li><a href="/user/default/index?page=8&amp;per-page=10" data-page="7">8</a></li>
                        <li><a href="/user/default/index?page=9&amp;per-page=10" data-page="8">9</a></li>
                        <li><a href="/user/default/index?page=10&amp;per-page=10" data-page="9">10</a></li>
                        <li class="next"><a href="/user/default/index?page=2&amp;per-page=10" data-page="1">»</a></li>
                    </ul>
                </ul>
            </div>
            <div class="col-lg-3">

                <?= $this->render('/public/attention') ?>
                <?= $this->render('/public/fans') ?>
                <?= $this->render('/public/visitors') ?>
            </div>
        </div>
    </div>
