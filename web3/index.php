<?php

    session_start();
    if($_GET['logout']==='true'){
        session_destroy();
        Header('Location: ./index.php');
        exit;
    }
    if($_POST['sjh']){
        include_once('login.php');
    }
    include_once("user.php");
    $name='请登录';
    if($_SESSION['user']) {
        $user = unserialize($_SESSION['user']);
        $name=$user->getName();
    }
?>
<html lang="zh-CN">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <style>html{-webkit-user-select:none;user-select:none;-webkit-touch-callout:none;height:100%;width:100%}wx-icon i{font:normal normal normal 14px/1 weui}[class*=" wx-icon-"]:before,[class^=wx-icon-]:before{margin:0}.wx-icon-success{color:#09bb07}.wx-icon-success:before{content:"\EA06"}.wx-icon-info{color:#10aeff}.wx-icon-info:before{content:"\EA03"}.wx-icon-warn{color:#f76260}.wx-icon-warn:before{content:"\EA0B"}.wx-icon-waiting{color:#10aeff}.wx-icon-waiting:before{content:"\EA09"}.wx-icon-safe_success{color:#09bb07}.wx-icon-safe_success:before{content:"\EA04"}.wx-icon-safe_warn{color:#ffbe00}.wx-icon-safe_warn:before{content:"\EA05"}.wx-icon-success_circle{color:#09bb07}.wx-icon-success_circle:before{content:"\EA07"}.wx-icon-success_no_circle{color:#09bb07}.wx-icon-success_no_circle:before{content:"\EA08"}.wx-icon-waiting_circle{color:#10aeff}.wx-icon-waiting_circle:before{content:"\EA0A"}.wx-icon-circle{color:#c9c9c9}.wx-icon-circle:before{content:"\EA01"}.wx-icon-download{color:#09bb07}.wx-icon-download:before{content:"\EA02"}.wx-icon-info_circle{color:#09bb07}.wx-icon-info_circle:before{content:"\EA0C"}.wx-icon-cancel{color:#f43530}.wx-icon-cancel:before{content:"\EA0D"}.wx-icon-search{color:#b2b2b2}.wx-icon-search:before{content:"\EA0E"}.wx-icon-clear{color:#b2b2b2}.wx-icon-clear:before{content:"\EA0F"}[class*=" wx-icon-"]:before,[class^=wx-icon-]:before{box-sizing:border-box}wx-image{width:320px;height:240px;display:inline-block;overflow:hidden}wx-image[hidden]{display:none}wx-image>div{width:100%;height:100%}wx-image>div>img{width:100%}wx-image>img{-webkit-touch-callout:none;-webkit-user-select:none;-moz-user-select:none;display:block}wx-image.wx-image-will-change{will-change:transform}.input-placeholder,.input-placeholder-dark{color:gray}wx-input{cursor:auto;display:block;height:1.4rem;text-overflow:clip;overflow:hidden;white-space:nowrap;font-family:UICTFontTextStyleBody;min-height:1.4rem}wx-swiper{display:block;height:150px}wx-swiper[hidden]{display:none}wx-swiper .wx-swiper-wrapper{overflow:hidden;position:relative;width:100%;height:100%;-webkit-transform:translateZ(0);transform:translateZ(0)}wx-swiper .wx-swiper-slides{position:absolute;left:0;top:0;right:0;bottom:0}wx-swiper .wx-swiper-slide-frame{position:absolute;left:0;top:0;width:100%;height:100%;will-change:transform}wx-swiper .wx-swiper-dots{position:absolute;font-size:0}wx-swiper .wx-swiper-dots-horizontal{left:50%;bottom:10px;text-align:center;white-space:nowrap;-webkit-transform:translate(-50%,0);transform:translate(-50%,0)}wx-swiper .wx-swiper-dots-vertical .wx-swiper-dot:last-child{margin-bottom:0}wx-swiper .wx-swiper-dot{display:inline-block;width:8px;height:8px;transition-property:background-color;transition-timing-function:ease;background:rgba(0,0,0,.3);border-radius:50%}wx-swiper .wx-swiper-dot-active{background-color:#000}wx-swiper-item{display:block;overflow:hidden;will-change:transform}wx-swiper-item[hidden]{display:none}wx-slider{margin:10px 18px;padding:0;display:block}wx-slider[hidden]{display:none}wx-slider .wx-slider-wrapper{display:-webkit-flex;display:flex;-webkit-align-items:center;align-items:center;min-height:16px}wx-slider .wx-slider-tap-area{-webkit-flex:1;flex:1;padding:8px 0}wx-slider .wx-slider-handle-wrapper{position:relative;z-index:0;height:2px;border-radius:5px;background-color:#e9e9e9;cursor:pointer;transition:background-color .3s ease;-webkit-tap-highlight-color:transparent}wx-slider .wx-slider-track{height:100%;border-radius:6px;background-color:#1aad19;transition:background-color .3s ease}wx-slider .wx-slider-handle,wx-slider .wx-slider-thumb{position:absolute;left:50%;top:50%;cursor:pointer;border-radius:50%;transition:border-color .3s ease}wx-slider .wx-slider-handle{width:28px;height:28px;margin-top:-14px;margin-left:-14px;background-color:transparent;z-index:3}wx-slider .wx-slider-thumb{z-index:2;box-shadow:0 0 4px rgba(0,0,0,.2)}wx-slider .wx-slider-step{position:absolute;width:100%;height:2px;background:0 0;z-index:1}wx-slider .wx-slider-value{color:#888;font-size:14px;margin-left:1em;text-align:center}wx-slider .wx-slider-disabled .wx-slider-track{background-color:#ccc}wx-slider .wx-slider-disabled .wx-slider-thumb{background-color:#fff;border-color:#ccc}*{margin:0}wx-switch{-webkit-tap-highlight-color:transparent;display:inline-block;cursor:pointer}wx-switch[hidden]{display:none}wx-switch .wx-switch-wrapper{display:-webkit-inline-flex;display:inline-flex;-webkit-align-items:center;align-items:center;vertical-align:middle}wx-video .wx-video-bottom-progress>.wx-video-progress>.wx-video-ball>.wx-video-inner,wx-video .wx-video-progress-container>.wx-video-progress>.wx-video-ball>.wx-video-inner{width:100%;height:100%;background-color:#fff;border-radius:50%}wx-video .wx-video-bottom-progress{position:absolute;left:0;bottom:0;width:100%}wx-video .wx-video-progress-panel{position:absolute;top:50%;left:50%;margin-top:-18px;font-size:16px;background-color:rgba(0,0,0,.4);height:36px;line-height:36px;color:#fff;text-align:center;border-radius:2px;padding:0 10px;-webkit-transform:translate(-50%,0);transform:translate(-50%,0);white-space:nowrap}wx-video .wx-video-danmu{position:absolute;top:0;left:0;bottom:0;width:100%;margin-bottom:60px;pointer-events:none;z-index:3;will-change:transform;transition:opacity .2s ease}wx-video .wx-video-danmu>.wx-video-danmu-item{position:absolute;line-height:20px;color:#fff;white-space:nowrap}wx-video .wx-video-cover .wx-video-cover-duration{margin-top:3px;color:#fff;font-size:16px;line-height:1}wx-video .wx-video-slot{position:absolute;top:0;left:0;width:100%;height:100%;overflow:hidden;pointer-events:none;z-index:5}wx-video .wx-video-slot *{pointer-events:auto}wx-video .wx-native-video-slot *{pointer-events:auto}wx-video .wx-video-loading>.wx-video-loading-ring{border-radius:50%;border:6px solid rgba(0,0,0,.2);width:24px;height:24px}wx-video .wx-dev-video-slot{position:absolute;top:0;width:100%;height:100%;overflow:hidden;pointer-events:none;z-index:1}wx-video .wx-dev-video-slot *{pointer-events:auto}@-webkit-keyframes wx-video-loading{from{-webkit-transform:rotate(0);transform:rotate(0)}to{-webkit-transform:rotate(360deg);transform:rotate(360deg)}}@keyframes wx-video-loading{from{-webkit-transform:rotate(0);transform:rotate(0)}to{-webkit-transform:rotate(360deg);transform:rotate(360deg)}}wx-view{display:block}wx-view[hidden]{display:none}.navigator-hover{background-color:rgba(0,0,0,.1);opacity:.7}wx-navigator{height:auto;width:auto;display:block}wx-navigator[hidden]{display:none}.functional-page-navigator-hover{background-color:rgba(0,0,0,.1);opacity:.7}wx-functional-page-navigator{height:auto;width:auto;display:block}wx-functional-page-navigator[hidden]{display:none}wx-action-sheet-cancel{background-color:#fff;font-size:18px}</style>
  <style type="text/css" wxss:path="./pages/stat/index.wxss">.g-footer { width: 321px; padding: 28px 19px; }
  .g-footer--fixed { position: absolute; bottom: 0; }
  .g-footer__content { width: 321px; }
  .g-footer__content__text { font-family: "PingFangSC-Regular"; font-size: 12px; line-height: 17px; color: #bbbec4; text-align: center; }
  body { background: #f5f5f5; height: 367px; }
  .view-title{ font-family: PingFangSC-Medium; font-size: 17px; color: #FFFFFF; letter-spacing: 0; text-indent: 19px; line-height: 43px; }
  wx-view.g-footer-index--g-footer { position: absolute; bottom: 0px; }
  .back-view { position: relative; opacity: 1; transition: all 0.3s; }
  .show { opacity: 0; }
  .back-image { width: 100%; position: fixed;top: 0;left: 0;z-index: -1; }
  .grzx { width: calc(100% - 38px); margin: 80px auto 0; background: #fff; box-shadow: 0 4px 9px 0 rgba(0, 0, 0, 0.05); border-radius: 7px; padding: 19px; box-sizing: border-box; display: -webkit-flex; display: flex; position: relative; z-index: 100; overflow: hidden; }
  .footer { text-align: center; }
  .mine-profile-avatar { width: 38px; height: 38px; border-radius: 50%; margin-right: 14px; overflow: hidden; }
  .mine-profile-nickname { font-family: PingFangSC-Medium; font-size: 20px; color: #333333; letter-spacing: 0; font-weight: bold; line-height: 38px; }
  .grzx-right { position: absolute; right: 19px; line-height: 38px; font-family: PingFangSC-Regular; font-size: 14px; color: #1f90fb; letter-spacing: 0; }
  .syjt { width: 7px; height: 12px; position: absolute; right: 19px; top: 32px; }
  .syjt1 { position: absolute; right: 0; top: 0; left: 0; bottom: 0; margin:auto; width: 14px !important; height: 16px !important; opacity: 0.6; }
  .banner { width: calc(100% - 38px); margin: 19px auto 0; background: #fff; box-shadow: 0 4px 9px 0 rgba(0, 0, 0, 0.05); border-radius: 7px; overflow: hidden; position: relative; z-index: 100; }
  .banner-title { width: 100%; font-family: PingFangSC-Medium; font-size: 20px; color: #000; letter-spacing: 0; line-height: 1; margin-top: 23px; text-indent: 19px; margin-bottom: 12px; }
  .banner-time { font-family: PingFangSC-Regular; font-size: 12px; color: #999; letter-spacing: 0; margin-bottom: 24px; line-height: 1; text-indent: 23px; }
  .banner-con { width: 100%; display: -webkit-flex; display: flex; -webkit-justify-content: center; justify-content: center; padding: 0 9px; box-sizing: border-box; }
  .banner-con-item { -webkit-flex: 1; flex: 1; }
  .banner-con-num { font-family: PingFangSC-Semibold; font-size: 20px; color: #ea411f; letter-spacing: 0; text-align: center; margin-bottom: 13px; }
  .banner-con-name { font-family: PingFangSC-Regular; font-size: 12px; color: #666; letter-spacing: 0; text-align: center; margin-bottom: 22px; }
  .con { width: calc(100% - 38px); margin: 15px auto 0; background: #fff; box-shadow: 0 4px 9px 0 rgba(0, 0, 0, 0.05); border-radius: 7px; overflow: hidden; position: relative; z-index: 100; padding: 0 17px; box-sizing: border-box; }
  .access-box { display: -webkit-flex; display: flex; background: #fff; padding: 15px 0; }
  .access-box--hover { background: #deedff; box-shadow: 0 5px 8px 0 rgba(66, 147, 244, 0.30); }
  .access-box .img { width: 45px; height: 45px; margin-right: 10px; }
  .imgs{ position: absolute; right: 0; width: 38px; height: 38px; display: -webkit-flex; display: flex; -webkit-align-items: center; align-items: center; bottom: 0; }
  .access-box .img wx-image { width: 45px; height: 45px; }
  .access-box .right-content .title { font-size: 20px; color: #333; line-height: 13px; margin-top: 8px; }
  .right-content1{ font-size: 20px; color: #333333; font-weight: bold; line-height: 45px; }
  .access-box .right-content .desc { font-weight: bold; opacity: 0.7; font-size: 12px; color: #666; line-height: 17px; margin-top: 12px; }
  .border { border-top: 1px solid #f0f0f0; }
  .bottom { width: calc(100% - 38px); background: #fff; padding: 19px 9px 21px; margin: 19px auto 0; display: -webkit-flex; display: flex; -webkit-justify-content: center; justify-content: center; box-sizing: border-box; }
  .bottom-item { -webkit-flex: 1; flex: 1; }
  .image { width: 100%; display: -webkit-flex; display: flex; -webkit-justify-content: center; justify-content: center; }
  .image wx-image { width: 38px; height: 38px; }
  .tetx { font-family: PingFangSC-Medium; font-size: 13px; color: #333; text-align: center; margin-top: 19px; }
  .top { background: rgba(0, 0, 0, 0.50); position: fixed; z-index: 100; width: 100%; top: 0; left: 0; display: -webkit-flex; display: flex; -webkit-align-items: center; align-items: center; -webkit-justify-content: center; justify-content: center; }
  .center { width: 268px; background: #fff; border-radius: 7px; }
  .box { position: relative; }
  .tit { padding: 19px 0 15px 0; line-height: 24px; font-size: 17px; text-align: center; }
  .tt { line-height: 21px; font-size: 14px; color: #585858; padding: 0 19px; text-align: justify; word-break: break-all; text-indent: 19px; }
  .tt1 { text-indent: 2em; }
  .btn { padding: 0 19px; margin-top: 15px; height: 47px; font-size: 17px; color: #0d8ce6; line-height: 47px; border-top: 1px solid #e5e5e5; text-align: center; }
  .btn1{ padding: 0 19px; margin-top: 15px; height: 47px; font-size: 17px; color: #0d8ce6; line-height: 47px; border-top: 1px solid #e5e5e5; text-align: center; display: -webkit-flex; display: flex; -webkit-justify-content: center; justify-content: center; }
  .left{ width: 50%; background: none; border: none; color: #0d8ce6; font-weight: normal; border-right: 1px solid #e5e5e5; }
  .right{ width: 50%; background: none; border: none; color: #0d8ce6; font-weight: normal; }
  .text { padding:0 48px; margin-top: 30px; width:100%; font-family: PingFangSC-Regular; font-size: 12px; color: #999; letter-spacing: 0; text-align:left; }
  .btna{ height: 47px; font-size: 17px; color: #0d8ce6; line-height: 47px; border-top: 1px solid #e5e5e5; text-align: center; display: -webkit-flex; display: flex; -webkit-align-items: center; align-items: center; -webkit-justify-content: center; justify-content: center; }
  .btna1{ height: 47px; font-size: 17px; color: #0d8ce6; line-height: 47px; border-top: 1px solid #e5e5e5; text-align: center; display: -webkit-flex; display: flex; -webkit-align-items: center; align-items: center; }
  .showHeSuan{ width: 50%; display: -webkit-flex; display: flex; -webkit-justify-content: center; justify-content: center; }
  .tuichu{ width: 50%; font-family: PingFangSC-Regular; font-size: 17px; color: #999999; text-align: center; border-right: 1px solid #e5e5e5; }
  .tuichu1{ width: 50%; font-family: PingFangSC-Medium; font-size: 17px; color: #0D8CE6; text-align: center; border: none; background-color: transparent; outline: none; font-weight: normal; }
  .tit-note{ display: -webkit-flex; display: flex; -webkit-align-items: center; align-items: center; box-sizing: border-box; padding: 0 19px; color: #666666; }
  .border-note{ width: 9px; height: 9px; border:1px solid #f5f5f5; }
  .border-tit{ margin-left: 9px; }
  .titleImg{ position: absolute; width: 288px; height: 36px; left: 19px; top: 22px; }
  .tanhao{ width: 23px; height: 23px; position: absolute; top: 87px; }
  .texts{ display: -webkit-flex; display: flex; width: 271px; padding:0 7px; height: 48px; -webkit-align-items: center; align-items: center; position: absolute; top: 76px; left: 21px; border-radius: 7px; color: #fff; }
  .swiper_container { width: 225px; height: 48px; margin: 0 auto; }
  .swiper_item { padding-left: 4px; height: 41px; line-height: 41px; font-size: 13px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; color: #151515; }
  .laba{ display: inline-block; width: 21px; height: 20px; }
  .input{ width: 18px; height: 18px; margin-left: 3px; vertical-align: middle; }
  .tts wx-text{ display: block; text-indent: 2em; }
  .agree{ display: -webkit-flex; display: flex; margin-top: 9px; border-top: 1px solid #e5e5e5; -webkit-justify-content: space-around; justify-content: space-around; }
  .agree wx-view{ width: 50%; padding: 0 19px; height: 47px; font-size: 17px; color: #0d8ce6; line-height: 47px; text-align: center; }
  .iNow{ font-weight: normal; }
  </style>
  <style>
    .showMessage {
      padding: 5px 10px;
      border-radius: 5px;
      position: fixed;
      top: 85%;
      left: 45%;
      color: #000000;
      z-index: 10;
    }
    .shewMessage {
      padding: 5px 10px;
      border-radius: 5px;
      position: fixed;
      top: 85%;
      left: 40%;
      color: #000000;
      z-index: 10;
    }
    .showMessageSuccess {
      background-color: #00B7EE;
    }

    .showMessageError {
     background-color: #eeebeb;
    }
  </style>
  <script src="./statics/jquery.min.js"></script>
  <script>
    function showTip(tip, type) {
      var $tip = $('#tip');
      $tip.stop(true).prop('class', 'alert alert-' + type).text(tip).css('margin-left', - $tip.outerWidth() / 2).fadeIn(500).delay(2000).fadeOut(500);
    }
    function showMessage(message, type) {
      let messageJQ = $("<div class='showMessage'>" + message + "</div>");
      if (type == 0) {
        messageJQ.addClass("showMessageError");
      } else if (type == 1) {
        messageJQ.addClass("showMessageSuccess");
      }
      /**先将原始隐藏，然后添加到页面，最后以600秒的速度下拉显示出来*/
      messageJQ.hide().appendTo("body").slideDown(300);
      /**3秒之后自动删除生成的元素*/
      window.setTimeout(function () {
        messageJQ.remove();
      }, 3000);
    }
    function shewMessage(message, type) {
      let messageJQ = $("<div class='shewMessage'>" + message + "</div>");
      if (type == 0) {
        messageJQ.addClass("showMessageError");
      } else if (type == 1) {
        messageJQ.addClass("showMessageSuccess");
      }
      /**先将原始隐藏，然后添加到页面，最后以600秒的速度下拉显示出来*/
      messageJQ.hide().appendTo("body").slideDown(300);
      /**3秒之后自动删除生成的元素*/
      window.setTimeout(function () {
        messageJQ.remove();
      }, 3000);
    }
    $(document).ready(function(){
      $("#qd").click(function(){
        $("#div").remove();
      });
      $("#grzx").click(function(){
        $(location).attr('href', 'gerenzhongxin.php');
      });
      $("#con1").click(function(){
        $(location).attr('href', 'chaxunjieguo.php');
      });
      $("#con2").click(function(){
        showMessage("功能暂时关闭",0);
      });
      $("#con3").click(function(){
        showMessage("&nbsp&nbsp功能暂时关闭,<p>请前往办事处开通",0);
      });
      $("#con4").click(function(){
        $(location).attr('href', 'qr.php');/////
      });
      $("#con5").click(function(){
        shewMessage("ERROR<p>核酸监测数据中心链接失败",0);
      });

    });
  </script>
</head>
<body is="pages/stat/index" style="background: #f0f0f0;">
<div style="margin: 0 auto;width: 360px;overflow-x: hidden;height: 100vh;">
  <div style="background: url(statics/bg.webp)no-repeat ;">
<wx-view class="box" style="z-index:10;">
  <wx-view class="back-view">
    <wx-view style="width:100%;height:30px;"></wx-view>
    <wx-view class="view-title">
      北京健康宝 wwwww
    </wx-view>

    <wx-image class="tanhao" src="./../../images/tanhao.png" style="right:25px;" role="img">
      <div style="background-size: 100% 100%; background-repeat: no-repeat; background-image: url(&quot;images/tanhao.png&quot;);"></div>
      <span></span>
    </wx-image>
    <wx-view class="texts">
      <wx-image class="laba" src="./../../images/laba.svg" role="img">
        <div style="background-size: 100% 100%; background-repeat: no-repeat; background-image: url(&quot;images/laba.svg&quot;);"></div>
        <span></span>
      </wx-image>
      <wx-swiper autoplay="" circular="" class="swiper_container" interval="5000" vertical="" current="2" current-item-id="">
        <div class="wx-swiper-wrapper" role="listbox" aria-label="可竖向滚动">
          <div class="wx-swiper-slides">
            <div class="wx-swiper-slide-frame" style="width: 100%; height: 100%; transform: translate(0px, -200%) translateZ(0px);">
              <wx-swiper-item style="position: absolute; width: 100%; height: 100%; transform: translate(0px, 0%) translateZ(0px);">
                <wx-view class="swiper_item0" data-index="0" style="display:flex;align-items:center;font-size:17px;">
                  <wx-text class="message_title0" style="height:48px;line-height:48px;font-weight: bold;">
                    <span style="display:none;">关于发布第一批、第二批核酸检测电话预约服务公立医疗机构名录的通告</span>
                    <span>关于发布第一批、第二批核酸检测电话预约服务公立医疗机构名录的通告</span>
                  </wx-text>
                </wx-view>
              </wx-swiper-item>
              <wx-swiper-item style="position: absolute; width: 100%; height: 100%; transform: translate(0px, 100%) translateZ(0px);">
                <wx-view class="swiper_item1" data-index="1" style="display:flex;align-items:center;font-size:17px;">
                  <wx-text class="message_title1" style="height:48px;line-height:48px;font-weight: bold;">
                    <span style="display:none;">重要信息</span>
                    <span>重要信息</span>
                  </wx-text>
                </wx-view>
              </wx-swiper-item>
              <wx-swiper-item style="position: absolute; width: 100%; height: 100%; transform: translate(0px, 200%) translateZ(0px);">
                <wx-view class="swiper_item2" data-index="2" style="display:flex;align-items:center;font-size:17px;">
                  <wx-text class="message_title2" style="height:48px;line-height:48px;font-weight: bold;">
                    <span style="display:none;">Q：查询健康状态出现白屏怎么办？</span>
                    <span>Q：查询健康状态出现白屏怎么办？</span>
                  </wx-text>
                </wx-view>
              </wx-swiper-item>
              <wx-swiper-item style="position: absolute; width: 100%; height: 100%; transform: translate(0px, 300%) translateZ(0px);">
                <wx-view class="swiper_item3" data-index="3" style="display:flex;align-items:center;font-size:17px;">
                  <wx-text class="message_title3" style="height:48px;line-height:48px;font-weight: bold;">
                    <span style="display:none;">Q:北京健康宝3.0都增加了哪些新功能？</span>
                    <span>Q:北京健康宝3.0都增加了哪些新功能？</span>
                  </wx-text>
                </wx-view>
              </wx-swiper-item>
              <wx-swiper-item style="position: absolute; width: 100%; height: 100%; transform: translate(0px, 400%) translateZ(0px);">
                <wx-view class="swiper_item4" data-index="4" style="display:flex;align-items:center;font-size:17px;">
                  <wx-text class="message_title4" style="height:48px;line-height:48px;font-weight: bold;">
                    <span style="display:none;">Q:消息通知功能怎么用？</span>
                    <span>Q:消息通知功能怎么用？</span>
                  </wx-text>
                </wx-view>
              </wx-swiper-item>
              <wx-swiper-item style="position: absolute; width: 100%; height: 100%; transform: translate(0px, 500%) translateZ(0px);">
                <wx-view class="swiper_item5" data-index="5" style="display:flex;align-items:center;font-size:17px;">
                  <wx-text class="message_title5" style="height:48px;line-height:48px;font-weight: bold;">
                    <span style="display:none;">Q:我怎么使用北京健康宝留言互动功能？</span>
                    <span>Q:我怎么使用北京健康宝留言互动功能？</span>
                  </wx-text>
                </wx-view>
              </wx-swiper-item>
              <wx-swiper-item style="position: absolute; width: 100%; height: 100%; transform: translate(0px, 600%) translateZ(0px);">
                <wx-view class="swiper_item6" data-index="6" style="display:flex;align-items:center;font-size:17px;">
                  <wx-text class="message_title6" style="height:48px;line-height:48px;font-weight: bold;">
                    <span style="display:none;">Q:到访人信息登记簿功能怎么使用？</span>
                    <span>Q:到访人信息登记簿功能怎么使用？</span>
                  </wx-text>
                </wx-view>
              </wx-swiper-item>
              <wx-swiper-item style="position: absolute; width: 100%; height: 100%; transform: translate(0px, 700%) translateZ(0px);">
                <wx-view class="swiper_item7" data-index="7" style="display:flex;align-items:center;font-size:17px;">
                  <wx-text class="message_title7" style="height:48px;line-height:48px;font-weight: bold;">
                    <span style="display:none;">Q:本人信息扫码登记功能怎么使用？</span>
                    <span>Q:本人信息扫码登记功能怎么使用？</span>
                  </wx-text>
                </wx-view>
              </wx-swiper-item>
              <wx-swiper-item style="position: absolute; width: 100%; height: 100%; transform: translate(0px, -200%) translateZ(0px);">
                <wx-view class="swiper_item8" data-index="8" style="display:flex;align-items:center;font-size:17px;">
                  <wx-text class="message_title8" style="height:48px;line-height:48px;font-weight: bold;">
                    <span style="display:none;">Q:我可以在个人中心查看什么信息？</span>
                    <span>Q:我可以在个人中心查看什么信息？</span>
                  </wx-text>
                </wx-view>
              </wx-swiper-item>
              <wx-swiper-item style="position: absolute; width: 100%; height: 100%; transform: translate(0px, -100%) translateZ(0px);">
                <wx-view class="swiper_item9" data-index="9" style="display:flex;align-items:center;font-size:17px;">
                  <wx-text class="message_title9" style="height:48px;line-height:48px;font-weight: bold;">
                    <span style="display:none;">Q：如果对“健康宝”健康状态展示页头像照片不满意怎么办？还可以重新拍照吗？</span>
                    <span>Q：如果对“健康宝”健康状态展示页头像照片不满意怎么办？还可以重新拍照吗？</span>
                  </wx-text>
                </wx-view>
              </wx-swiper-item>
            </div>
          </div>
          <div class="wx-swiper-dots wx-swiper-dots-vertical" hidden="">
            <div data-dot-index="0" class="wx-swiper-dot"></div>
            <div data-dot-index="1" class="wx-swiper-dot"></div>
            <div data-dot-index="2" class="wx-swiper-dot wx-swiper-dot-active"></div>
            <div data-dot-index="3" class="wx-swiper-dot"></div>
            <div data-dot-index="4" class="wx-swiper-dot"></div>
            <div data-dot-index="5" class="wx-swiper-dot"></div>
            <div data-dot-index="6" class="wx-swiper-dot"></div>
            <div data-dot-index="7" class="wx-swiper-dot"></div>
            <div data-dot-index="8" class="wx-swiper-dot"></div>
            <div data-dot-index="9" class="wx-swiper-dot"></div>
          </div>
        </div>
      </wx-swiper>
    </wx-view>
  </wx-view>
  <wx-view class="grzx" id="grzx">
    <wx-image class="mine-profile-avatar" src="../../images/bjjkb.png" role="img">
      <div style="background-size: 100% 100%; background-repeat: no-repeat; background-image: url(&quot;images/bjjkb.png&quot;);"></div>
      <span></span>
    </wx-image>
    <wx-view class="mine-profile-nickname">
      <?php echo $name; ?>
    </wx-view>
    <wx-image class="syjt" mode="widthFix" src="./statics/syjt.png" role="img" style="height: 11.375px;">
      <div style="background-size: 100% 100%; background-repeat: no-repeat; background-image: url(&quot;./statics/syjt.png&quot;);"></div>
      <span></span>
    </wx-image>
  </wx-view>
  <wx-view class="con" id="con1">
    <wx-view class="access-box" data-url="/pages/jxzq/cha-xun-jie-guo/index" hover-class="access-box--hover">
      <wx-view class="img">
        <wx-image src="./statics/ztcx.png" role="img">
          <div style="background-size: 100% 100%; background-repeat: no-repeat; background-image: url(&quot;./statics/ztcx.png&quot;);"></div>
          <span></span>
        </wx-image>
      </wx-view>
      <wx-view class="right-content1">
        <wx-view class="title">
          本人健康码自查询
        </wx-view>
      </wx-view>
    </wx-view>
  </wx-view>
  <wx-view class="con" id="con2">
    <wx-view class="access-box" data-url="/pages/jxzq/zhuang-tai-cha-xun/index" hover-class="access-box--hover">
      <wx-view class="img">
        <wx-image src="./statics/trjkzt.png" role="img">
          <div style="background-size: 100% 100%; background-repeat: no-repeat; background-image: url(&quot;./statics/trjkzt.png&quot;);"></div>
          <span></span>
        </wx-image>
      </wx-view>
      <wx-view class="right-content1">
        <wx-view class="title">
          他人健康码代查询
        </wx-view>
      </wx-view>
    </wx-view>
  </wx-view>
  <wx-view class="con" id="con3">
    <wx-view class="access-box" hover-class="access-box--hover">
      <wx-view class="img">
        <wx-image src="../../images/daofangren.svg" role="img">
          <div style="background-size: 100% 100%; background-repeat: no-repeat; background-image: url(&quot;images/daofangren.svg&quot;);"></div>
          <span></span>
        </wx-image>
      </wx-view>
      <wx-view class="right-content1">
        <wx-view class="title">
          到访人信息登记簿
        </wx-view>
      </wx-view>
    </wx-view>
  </wx-view>
  <wx-view class="con" id="con4">
    <wx-view class="access-box">
      <wx-view class="img">
        <wx-image src="../../images/geren.png" role="img">
          <div style="background-size: 100% 100%; background-repeat: no-repeat; background-image: url(&quot;images/geren.png&quot;);"></div>
          <span></span>
        </wx-image>
      </wx-view>
      <wx-view class="right-content1">
        <wx-view class="title">
          本人信息扫码登记
        </wx-view>
      </wx-view>
      <wx-view class="imgs">
        <wx-image class="syjt1" mode="widthFix" src="./statics/home_saomaicon.png" role="img" style="height: 15.1351px;">
          <div style="background-size: 100% 100%; background-repeat: no-repeat; background-image: url(&quot;./statics/home_saomaicon.png&quot;);"></div>
          <span></span>
        </wx-image>
      </wx-view>
    </wx-view>
  </wx-view>
  <wx-view class="con" id="con5">
    <wx-view class="access-box">
      <wx-view class="img">
        <wx-image src="../../images/hesuan.png" role="img">
          <div style="background-size: 100% 100%; background-repeat: no-repeat; background-image: url(&quot;images/hesuan.png&quot;);"></div>
          <span></span>
        </wx-image>
      </wx-view>
      <wx-view class="right-content1">
        <wx-view class="title">
          本人核酸检测查询
        </wx-view>
      </wx-view>
    </wx-view>
  </wx-view>
  <wx-view class="g-footer component-class">
    <wx-view class="g-footer__content">
      <wx-view class="g-footer__content__text footer">
        <wx-text>
          <span style="display:none;">北京市大数据中心</span>
          <span>北京市大数据中心</span>
        </wx-text>
        <wx-image class="input" src="./../../images/input.svg" role="img">
          <div style="background-size: 100% 100%; background-repeat: no-repeat; background-image: url(&quot;images/input.svg&quot;);"></div>
          <span></span>
        </wx-image>
      </wx-view>
    </wx-view>
  </wx-view>
</wx-view>
<wx-view class="top" style="min-height:760px;<?php if(isset($_SESSION['user']))echo 'display:none;'; ?>" id="div" >
  <wx-view class="center">
    <wx-view class="tit">
      声明
    </wx-view>
    <wx-scroll-view scroll-y="" style="max-height: 282px;">
      <div class="wx-scroll-view">
        <div style="overflow: hidden auto;" class="wx-scroll-view">
          <div style="height: 100%;">
            <wx-view class="tt">
              <wx-text>
                <span style="display:none;">本“健 康宝”仅供CISCN竞赛学习使用，是仿照北京市大数据中心-北京健康宝小程序相关功能，针对国内ctf竞赛推出的一道web题目。如果您感到发热，请拨打120。小程序内显示信息纯属虚构，需要查询健康码信息请搜索官方小程序。</span>
                <span>本“健 康宝”仅供CISCN竞赛学习使用，是仿照北京市大数据中心-北京健康宝小程序相关功能，针对国内ctf竞赛推出的一道web题目。如果您感到发热，请拨打120。小程序内显示信息纯属虚构，需要查询健康码信息请搜索官方小程序。</span>
              </wx-text>
            </wx-view>
          </div>
        </div>
        <div style="display:none" class="wx-wins-scrollbar">
          <div class="wx-wins-scrollbar-bar"></div>
        </div>
      </div>
    </wx-scroll-view>
    <wx-view class="btn" id="qd">
      确定
    </wx-view>
  </wx-view>
</wx-view>
  </div></div>
</body>
</html>
