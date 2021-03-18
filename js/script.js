'use strict'

$(function(){  //アニメーションスクロールのメソッド
  $('a[href^="#"]').click(function(){
    //ヘッダの高さ
    var headerHight = 135;
    //スクロールのスピード
    var speed = 500;
    //リンク元を取得
    var href= $(this).attr("href");
    //リンク先を取得
    var target = $(href == "#" || href == "" ? 'html' : href);
    //リンク先までの距離を取得
    var position = target.offset().top - headerHight; //ヘッダの高さ分位置をずら;
    //スムーススクロール
    $("html, body").animate({scrollTop:position}, speed, "swing");
    return false;
  });
});

function showDetail(num) {
  let target = 'detail' + num;
  let detail = document.getElementById(target);
  detail.classList.toggle('none');
}