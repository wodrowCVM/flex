/**
 * Created by wodrow on 2017/2/24.
 */
$(function () {
    $("#categorys_and_ads").find("ol li").hover(function () {
        var x = $(this).index();
        x = -x*100;
        x = x+"%";
        $(this).find(".category_2").css({
            'top':x,
        })
    });
})