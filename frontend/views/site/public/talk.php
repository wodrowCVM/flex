<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-10
 * Time: 下午2:58
 */
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h2 class="panel-title"><i class="fa fa-commenting-o"></i> 大家正在说 <i class="fa fa-ellipsis-h"></i></h2>
        <span class="pull-right"><a class="btn btn-xs" href="/feed">更多»</a></span>
    </div>
    <div class="panel-body">

        <form id="w0" action="/" method="post">
            <input type="hidden" name="_csrf" value="bm10MWpBbmo9Jh9mBwcADj8sE3gnBggLFhU5XAklMSkoDzwCEC0gMg==">
            <div class="form-group input-group field-feed-content required">
                <textarea id="feed-content" class="form-control" name="Feed[content]" placeholder="我想说..."
                          aria-required="true"></textarea><span class="input-group-btn"><button type="submit"
                                                                                                class="btn btn-success">发布</button></span>
            </div>
        </form>
        <div class="feed">
            <div class="nano has-scrollbar">
                <ul id="w1" class="media-list nano-content" tabindex="0" style="right: -15px;">
                    <?php
                    $x = [0,1,2,3,4,5,6,7];
                    ?>
                    <?php foreach($x as $k => $v): ?>
                        <li class="med  ia" data-key="22310">
                            <div class="media-left">
                                <a href="/user/41735" rel="author">
                                    <?=\dmstr\helpers\Html::img("/site/avatar?text=11&rule=%7B+%22background%22%3A%7B+%22r%22%3A200%2C+%22g%22%3A200%2C+%22b%22%3A200+%7D+%2C+%22color%22%3A%7B+%22r%22%3A0%2C+%22g%22%3A0%2C+%22b%22%3A0+%7D%7D", ['class'=>"media-object"]) ?>
                                </a>
                            </div>
                            <div class="media-body">
                                <div class="media-content"><a href="/user/41735" rel="author">暮澜寒冬</a>: 我一直在你身旁，从未走远</div>
                                <div class="media-action"><span class="time">7分钟前</span><span class="pull-right"><a
                                            href="/feed/22310"><i class="fa fa-comment-o"></i> 0</a> <a class="vote up"
                                                                                                        href="javascript:void(0);"
                                                                                                        title=""
                                                                                                        data-type="feed"
                                                                                                        data-id="22310"
                                                                                                        data-toggle="tooltip"
                                                                                                        data-original-title="顶"><i
                                                class="fa fa-thumbs-o-up"></i> 1</a></span></div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                    <ul class="pagination">
                        <li class="prev disabled"><span>«</span></li>
                        <li class="active"><a href="/index?page=1" data-page="0">1</a></li>
                        <li><a href="/index?page=2" data-page="1">2</a></li>
                        <li><a href="/index?page=3" data-page="2">3</a></li>
                        <li><a href="/index?page=4" data-page="3">4</a></li>
                        <li><a href="/index?page=5" data-page="4">5</a></li>
                        <li><a href="/index?page=6" data-page="5">6</a></li>
                        <li><a href="/index?page=7" data-page="6">7</a></li>
                        <li><a href="/index?page=8" data-page="7">8</a></li>
                        <li><a href="/index?page=9" data-page="8">9</a></li>
                        <li><a href="/index?page=10" data-page="9">10</a></li>
                        <li class="next"><a href="/index?page=2" data-page="1">»</a></li>
                    </ul>
                </ul>
                <div class="nano-pane">
                    <div class="nano-slider" style="height: 56px; transform: translate(0px, 0px);"></div>
                </div>
            </div>
        </div>
    </div>
</div>
