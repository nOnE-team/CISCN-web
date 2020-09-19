<?php
session_start();
if(!isset($_SESSION['user'])){
    Header('Location: ./index.php');
    exit;
}
include_once('user.php');
$user = unserialize($_SESSION['user']);
$name=$user->getName()[0].$user->getName()[1].$user->getName()[2]."*";
$phone=$user->getPhone()[0]."*********".$user->getPhone()[10];
$cardid=$user->getCardid()[0]."****************".$user->getCardid()[17];
$level=$user->getLevel();
$pic=$user->getPic();
?>
<html lang="zh-CN">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <style>html{-webkit-user-select:none;user-select:none;-webkit-touch-callout:none;height:100%;width:100%}wx-icon i{font:normal normal normal 14px/1 weui}[class*=" wx-icon-"]:before,[class^=wx-icon-]:before{margin:0}.wx-icon-success{color:#09bb07}.wx-icon-success:before{content:"\EA06"}.wx-icon-info{color:#10aeff}.wx-icon-info:before{content:"\EA03"}.wx-icon-warn{color:#f76260}.wx-icon-warn:before{content:"\EA0B"}.wx-icon-waiting{color:#10aeff}.wx-icon-waiting:before{content:"\EA09"}.wx-icon-safe_success{color:#09bb07}.wx-icon-safe_success:before{content:"\EA04"}.wx-icon-safe_warn{color:#ffbe00}.wx-icon-safe_warn:before{content:"\EA05"}.wx-icon-success_circle{color:#09bb07}.wx-icon-success_circle:before{content:"\EA07"}.wx-icon-success_no_circle{color:#09bb07}.wx-icon-success_no_circle:before{content:"\EA08"}.wx-icon-waiting_circle{color:#10aeff}.wx-icon-waiting_circle:before{content:"\EA0A"}.wx-icon-circle{color:#c9c9c9}.wx-icon-circle:before{content:"\EA01"}.wx-icon-download{color:#09bb07}.wx-icon-download:before{content:"\EA02"}.wx-icon-info_circle{color:#09bb07}.wx-icon-info_circle:before{content:"\EA0C"}.wx-icon-cancel{color:#f43530}.wx-icon-cancel:before{content:"\EA0D"}.wx-icon-search{color:#b2b2b2}.wx-icon-search:before{content:"\EA0E"}.wx-icon-clear{color:#b2b2b2}.wx-icon-clear:before{content:"\EA0F"}[class*=" wx-icon-"]:before,[class^=wx-icon-]:before{box-sizing:border-box}wx-image{width:320px;height:240px;display:inline-block;overflow:hidden}wx-image[hidden]{display:none}wx-image>div{width:100%;height:100%}wx-image>div>img{width:100%}wx-image>img{-webkit-touch-callout:none;-webkit-user-select:none;-moz-user-select:none;display:block}wx-image.wx-image-will-change{will-change:transform}.input-placeholder,.input-placeholder-dark{color:gray}wx-input{cursor:auto;display:block;height:1.4rem;text-overflow:clip;overflow:hidden;white-space:nowrap;font-family:UICTFontTextStyleBody;min-height:1.4rem}wx-swiper{display:block;height:150px}wx-swiper[hidden]{display:none}wx-swiper .wx-swiper-wrapper{overflow:hidden;position:relative;width:100%;height:100%;-webkit-transform:translateZ(0);transform:translateZ(0)}wx-swiper .wx-swiper-slides{position:absolute;left:0;top:0;right:0;bottom:0}wx-swiper .wx-swiper-slide-frame{position:absolute;left:0;top:0;width:100%;height:100%;will-change:transform}wx-swiper .wx-swiper-dots{position:absolute;font-size:0}wx-swiper .wx-swiper-dots-horizontal{left:50%;bottom:10px;text-align:center;white-space:nowrap;-webkit-transform:translate(-50%,0);transform:translate(-50%,0)}wx-swiper .wx-swiper-dots-vertical .wx-swiper-dot:last-child{margin-bottom:0}wx-swiper .wx-swiper-dot{display:inline-block;width:8px;height:8px;transition-property:background-color;transition-timing-function:ease;background:rgba(0,0,0,.3);border-radius:50%}wx-swiper .wx-swiper-dot-active{background-color:#000}wx-swiper-item{display:block;overflow:hidden;will-change:transform}wx-swiper-item[hidden]{display:none}wx-slider{margin:10px 18px;padding:0;display:block}wx-slider[hidden]{display:none}wx-slider .wx-slider-wrapper{display:-webkit-flex;display:flex;-webkit-align-items:center;align-items:center;min-height:16px}wx-slider .wx-slider-tap-area{-webkit-flex:1;flex:1;padding:8px 0}wx-slider .wx-slider-handle-wrapper{position:relative;z-index:0;height:2px;border-radius:5px;background-color:#e9e9e9;cursor:pointer;transition:background-color .3s ease;-webkit-tap-highlight-color:transparent}wx-slider .wx-slider-track{height:100%;border-radius:6px;background-color:#1aad19;transition:background-color .3s ease}wx-slider .wx-slider-handle,wx-slider .wx-slider-thumb{position:absolute;left:50%;top:50%;cursor:pointer;border-radius:50%;transition:border-color .3s ease}wx-slider .wx-slider-handle{width:28px;height:28px;margin-top:-14px;margin-left:-14px;background-color:transparent;z-index:3}wx-slider .wx-slider-thumb{z-index:2;box-shadow:0 0 4px rgba(0,0,0,.2)}wx-slider .wx-slider-step{position:absolute;width:100%;height:2px;background:0 0;z-index:1}wx-slider .wx-slider-value{color:#888;font-size:14px;margin-left:1em;text-align:center}wx-slider .wx-slider-disabled .wx-slider-track{background-color:#ccc}wx-slider .wx-slider-disabled .wx-slider-thumb{background-color:#fff;border-color:#ccc}*{margin:0}wx-switch{-webkit-tap-highlight-color:transparent;display:inline-block;cursor:pointer}wx-switch[hidden]{display:none}wx-switch .wx-switch-wrapper{display:-webkit-inline-flex;display:inline-flex;-webkit-align-items:center;align-items:center;vertical-align:middle}wx-video .wx-video-bottom-progress>.wx-video-progress>.wx-video-ball>.wx-video-inner,wx-video .wx-video-progress-container>.wx-video-progress>.wx-video-ball>.wx-video-inner{width:100%;height:100%;background-color:#fff;border-radius:50%}wx-video .wx-video-bottom-progress{position:absolute;left:0;bottom:0;width:100%}wx-video .wx-video-progress-panel{position:absolute;top:50%;left:50%;margin-top:-18px;font-size:16px;background-color:rgba(0,0,0,.4);height:36px;line-height:36px;color:#fff;text-align:center;border-radius:2px;padding:0 10px;-webkit-transform:translate(-50%,0);transform:translate(-50%,0);white-space:nowrap}wx-video .wx-video-danmu{position:absolute;top:0;left:0;bottom:0;width:100%;margin-bottom:60px;pointer-events:none;z-index:3;will-change:transform;transition:opacity .2s ease}wx-video .wx-video-danmu>.wx-video-danmu-item{position:absolute;line-height:20px;color:#fff;white-space:nowrap}wx-video .wx-video-cover .wx-video-cover-duration{margin-top:3px;color:#fff;font-size:16px;line-height:1}wx-video .wx-video-slot{position:absolute;top:0;left:0;width:100%;height:100%;overflow:hidden;pointer-events:none;z-index:5}wx-video .wx-video-slot *{pointer-events:auto}wx-video .wx-native-video-slot *{pointer-events:auto}wx-video .wx-video-loading>.wx-video-loading-ring{border-radius:50%;border:6px solid rgba(0,0,0,.2);width:24px;height:24px}wx-video .wx-dev-video-slot{position:absolute;top:0;width:100%;height:100%;overflow:hidden;pointer-events:none;z-index:1}wx-video .wx-dev-video-slot *{pointer-events:auto}@-webkit-keyframes wx-video-loading{from{-webkit-transform:rotate(0);transform:rotate(0)}to{-webkit-transform:rotate(360deg);transform:rotate(360deg)}}@keyframes wx-video-loading{from{-webkit-transform:rotate(0);transform:rotate(0)}to{-webkit-transform:rotate(360deg);transform:rotate(360deg)}}wx-view{display:block}wx-view[hidden]{display:none}.navigator-hover{background-color:rgba(0,0,0,.1);opacity:.7}wx-navigator{height:auto;width:auto;display:block}wx-navigator[hidden]{display:none}.functional-page-navigator-hover{background-color:rgba(0,0,0,.1);opacity:.7}wx-functional-page-navigator{height:auto;width:auto;display:block}wx-functional-page-navigator[hidden]{display:none}wx-action-sheet-cancel{background-color:#fff;font-size:18px}wx-button{position:relative;display:block;margin-left:auto;margin-right:auto;padding-left:14px;padding-right:14px;box-sizing:border-box;font-size:18px;text-align:center;text-decoration:none;line-height:2.55555556;border-radius:5px;-webkit-tap-highlight-color:transparent;overflow:hidden;cursor:pointer;color:#000;background-color:#f8f8f8}wx-button[hidden]{display:none!important}wx-button:after{content:" ";width:200%;height:200%;position:absolute;top:0;left:0;border:1px solid rgba(0,0,0,.2);-webkit-transform:scale(.5);transform:scale(.5);-webkit-transform-origin:0 0;transform-origin:0 0;box-sizing:border-box;border-radius:10px}wx-button[native]{padding-left:0;padding-right:0}wx-button[native] .wx-button-cover-view-wrapper{border:inherit;border-color:inherit;border-radius:inherit;background-color:inherit}wx-button[native] .wx-button-cover-view-inner{padding-left:14px;padding-right:14px}wx-button wx-cover-view{line-height:inherit;white-space:inherit}wx-button[type=default]{color:#000;background-color:#f8f8f8}wx-button[type=primary]{color:#fff;background-color:#1aad19}wx-button[type=warn]{color:#fff;background-color:#e64340}wx-button[disabled]{color:rgba(255,255,255,.6)}wx-button[disabled]:not([type]),wx-button[disabled][type=default]{color:rgba(0,0,0,.3);background-color:#f7f7f7}wx-button[disabled][type=primary]{background-color:#9ed99d}wx-button[disabled][type=warn]{background-color:#ec8b89}wx-button[type=primary][plain]{color:#1aad19;border:1px solid #1aad19;background-color:transparent}wx-button[type=primary][plain][disabled]{color:rgba(0,0,0,.2);border-color:rgba(0,0,0,.2)}wx-button[type=primary][plain]:after{border-width:0}wx-button[type=default][plain]{color:#353535;border:1px solid #353535;background-color:transparent}wx-button[type=default][plain][disabled]{color:rgba(0,0,0,.2);border-color:rgba(0,0,0,.2)}wx-button[type=default][plain]:after{border-width:0}wx-button[plain]{color:#353535;border:1px solid #353535;background-color:transparent}wx-button[plain][disabled]{color:rgba(0,0,0,.2);border-color:rgba(0,0,0,.2)}wx-button[plain]:after{border-width:0}wx-button[plain][native] .wx-button-cover-view-inner{padding:0}wx-button[type=warn][plain]{color:#e64340;border:1px solid #e64340;background-color:transparent}wx-button[type=warn][plain][disabled]{color:rgba(0,0,0,.2);border-color:rgba(0,0,0,.2)}wx-button[type=warn][plain]:after{border-width:0}wx-button[size=mini]{display:inline-block;line-height:2.3;font-size:13px;padding:0 1.34em}wx-button[size=mini][native]{padding:0}wx-button[size=mini][native] .wx-button-cover-view-inner{padding:0 1.34em}wx-button[loading]:before{content:" ";display:inline-block;width:18px;height:18px;vertical-align:middle;-webkit-animation:wx-button-loading-animate 1s steps(12,end) infinite;animation:wx-button-loading-animate 1s steps(12,end) infinite;background:transparent url(data:image/svg+xml;base64,PHN2ZyBjbGFzcz0iciIgd2lkdGg9JzEyMHB4JyBoZWlnaHQ9JzEyMHB4JyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxMDAgMTAwIj4KICAgIDxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxMDAiIGhlaWdodD0iMTAwIiBmaWxsPSJub25lIiBjbGFzcz0iYmsiPjwvcmVjdD4KICAgIDxyZWN0IHg9JzQ2LjUnIHk9JzQwJyB3aWR0aD0nNycgaGVpZ2h0PScyMCcgcng9JzUnIHJ5PSc1JyBmaWxsPScjRTlFOUU5JwogICAgICAgICAgdHJhbnNmb3JtPSdyb3RhdGUoMCA1MCA1MCkgdHJhbnNsYXRlKDAgLTMwKSc+CiAgICA8L3JlY3Q+CiAgICA8cmVjdCB4PSc0Ni41JyB5PSc0MCcgd2lkdGg9JzcnIGhlaWdodD0nMjAnIHJ4PSc1JyByeT0nNScgZmlsbD0nIzk4OTY5NycKICAgICAgICAgIHRyYW5zZm9ybT0ncm90YXRlKDMwIDUwIDUwKSB0cmFuc2xhdGUoMCAtMzApJz4KICAgICAgICAgICAgICAgICByZXBlYXRDb3VudD0naW5kZWZpbml0ZScvPgogICAgPC9yZWN0PgogICAgPHJlY3QgeD0nNDYuNScgeT0nNDAnIHdpZHRoPSc3JyBoZWlnaHQ9JzIwJyByeD0nNScgcnk9JzUnIGZpbGw9JyM5Qjk5OUEnCiAgICAgICAgICB0cmFuc2Zvcm09J3JvdGF0ZSg2MCA1MCA1MCkgdHJhbnNsYXRlKDAgLTMwKSc+CiAgICAgICAgICAgICAgICAgcmVwZWF0Q291bnQ9J2luZGVmaW5pdGUnLz4KICAgIDwvcmVjdD4KICAgIDxyZWN0IHg9JzQ2LjUnIHk9JzQwJyB3aWR0aD0nNycgaGVpZ2h0PScyMCcgcng9JzUnIHJ5PSc1JyBmaWxsPScjQTNBMUEyJwogICAgICAgICAgdHJhbnNmb3JtPSdyb3RhdGUoOTAgNTAgNTApIHRyYW5zbGF0ZSgwIC0zMCknPgogICAgPC9yZWN0PgogICAgPHJlY3QgeD0nNDYuNScgeT0nNDAnIHdpZHRoPSc3JyBoZWlnaHQ9JzIwJyByeD0nNScgcnk9JzUnIGZpbGw9JyNBQkE5QUEnCiAgICAgICAgICB0cmFuc2Zvcm09J3JvdGF0ZSgxMjAgNTAgNTApIHRyYW5zbGF0ZSgwIC0zMCknPgogICAgPC9yZWN0PgogICAgPHJlY3QgeD0nNDYuNScgeT0nNDAnIHdpZHRoPSc3JyBoZWlnaHQ9JzIwJyByeD0nNScgcnk9JzUnIGZpbGw9JyNCMkIyQjInCiAgICAgICAgICB0cmFuc2Zvcm09J3JvdGF0ZSgxNTAgNTAgNTApIHRyYW5zbGF0ZSgwIC0zMCknPgogICAgPC9yZWN0PgogICAgPHJlY3QgeD0nNDYuNScgeT0nNDAnIHdpZHRoPSc3JyBoZWlnaHQ9JzIwJyByeD0nNScgcnk9JzUnIGZpbGw9JyNCQUI4QjknCiAgICAgICAgICB0cmFuc2Zvcm09J3JvdGF0ZSgxODAgNTAgNTApIHRyYW5zbGF0ZSgwIC0zMCknPgogICAgPC9yZWN0PgogICAgPHJlY3QgeD0nNDYuNScgeT0nNDAnIHdpZHRoPSc3JyBoZWlnaHQ9JzIwJyByeD0nNScgcnk9JzUnIGZpbGw9JyNDMkMwQzEnCiAgICAgICAgICB0cmFuc2Zvcm09J3JvdGF0ZSgyMTAgNTAgNTApIHRyYW5zbGF0ZSgwIC0zMCknPgogICAgPC9yZWN0PgogICAgPHJlY3QgeD0nNDYuNScgeT0nNDAnIHdpZHRoPSc3JyBoZWlnaHQ9JzIwJyByeD0nNScgcnk9JzUnIGZpbGw9JyNDQkNCQ0InCiAgICAgICAgICB0cmFuc2Zvcm09J3JvdGF0ZSgyNDAgNTAgNTApIHRyYW5zbGF0ZSgwIC0zMCknPgogICAgPC9yZWN0PgogICAgPHJlY3QgeD0nNDYuNScgeT0nNDAnIHdpZHRoPSc3JyBoZWlnaHQ9JzIwJyByeD0nNScgcnk9JzUnIGZpbGw9JyNEMkQyRDInCiAgICAgICAgICB0cmFuc2Zvcm09J3JvdGF0ZSgyNzAgNTAgNTApIHRyYW5zbGF0ZSgwIC0zMCknPgogICAgPC9yZWN0PgogICAgPHJlY3QgeD0nNDYuNScgeT0nNDAnIHdpZHRoPSc3JyBoZWlnaHQ9JzIwJyByeD0nNScgcnk9JzUnIGZpbGw9JyNEQURBREEnCiAgICAgICAgICB0cmFuc2Zvcm09J3JvdGF0ZSgzMDAgNTAgNTApIHRyYW5zbGF0ZSgwIC0zMCknPgogICAgPC9yZWN0PgogICAgPHJlY3QgeD0nNDYuNScgeT0nNDAnIHdpZHRoPSc3JyBoZWlnaHQ9JzIwJyByeD0nNScgcnk9JzUnIGZpbGw9JyNFMkUyRTInCiAgICAgICAgICB0cmFuc2Zvcm09J3JvdGF0ZSgzMzAgNTAgNTApIHRyYW5zbGF0ZSgwIC0zMCknPgogICAgPC9yZWN0Pgo8L3N2Zz4=) no-repeat;background-size:100%}wx-button[loading][type=primary]{color:rgba(255,255,255,.6);background-color:#179b16}wx-button[loading][type=primary][plain]{color:#1aad19;background-color:transparent}wx-button[loading][type=default]{color:rgba(0,0,0,.6);background-color:#dedede}wx-button[loading][type=default][plain]{color:#353535;background-color:transparent}wx-button[loading][type=warn]{color:rgba(255,255,255,.6);background-color:#ce3c39}wx-button[loading][type=warn][plain]{color:#e64340;background-color:transparent}wx-button[loading][native]:before{content:none}@-webkit-keyframes wx-button-loading-animate{0%{-webkit-transform:rotate3d(0,0,1,0deg);transform:rotate3d(0,0,1,0deg)}100%{-webkit-transform:rotate3d(0,0,1,360deg);transform:rotate3d(0,0,1,360deg)}}@keyframes wx-button-loading-animate{0%{-webkit-transform:rotate3d(0,0,1,0deg);transform:rotate3d(0,0,1,0deg)}100%{-webkit-transform:rotate3d(0,0,1,360deg);transform:rotate3d(0,0,1,360deg)}}</style>
    <style type="text/css" wxss:path="./pages/jxzq/cha-xun-jie-guo/index.wxss">body{ box-sizing: border-box; }
    .scan-img{ width: 100%; height: 100%; }
    .timt{ text-align: center; }
    .timt1{ text-align: center; line-height: 19px; }
    .mine{ width: 100%; height: 100%; overflow-x:hidden; background: #f1f1f1; position: relative; box-sizing: border-box; }
    wx-view.g-footer-index--g-footer{ background: #f1f1f1; }
    .wrap1{ box-sizing: border-box; padding:0 19px; z-index:999; position:relative; top:0; left: 0; width:100%; height: 100% }
    .tit-box{ display: -webkit-flex; display: flex; -webkit-justify-content: space-between; justify-content: space-between; position: relative; box-sizing: border-box; margin-top:11px; }
    .xcx-img{ width: 35px; height: 35px; border-radius: 50%; overflow: hidden; }
    .img{ width: 30px; height: 30px; }
    .card{ width: 164px; height: 164px; box-sizing: border-box; margin-left: 33px; margin-top: 19px; }
    .success-text{ font-family: PingFangSC-Medium; font-size: 20px; letter-spacing: 0; line-height: 48px; z-index: 100; }
    .border1{ margin-top: 4px; width:100%; height: 1px; background: #E5E5E5; margin: 19px 0; }
    .success-photo{ width: 48px; height: 48px; z-index: 1000; margin-right: 19px; position: relative; }
    .tit-lx{ display: -webkit-flex; display: flex; }
    .tit1{ font-family: PingFangSC-Regular; font-size: 15px; color: #666666; letter-spacing: 0; }
    .mao{ line-height: 15px; color: #9c9c9c; margin-left: 4px; }
    .footer{ box-sizing: border-box; padding: 0 19px; margin-top: 19px; }
    .footer wx-button{ border-radius: 7px; }
    .foot{ font-family: PingFangSC-Regular; font-size: 12px; line-height: 42px; color: #BBBBBB; letter-spacing: 0; text-align: center; }
    .btn2{ width: 92%; position: absolute; bottom: 0; left: 14px; }
    .success{ display: -webkit-flex; display: flex; -webkit-justify-content: center; justify-content: center; box-sizing: border-box; padding:9px 0; font-family: PingFangSC-Medium; font-size: 42px; color: #FF2E3D; letter-spacing: 0; line-height: 58px; }
    .box2{ background: #fff; border-radius: 7px; margin-top:19px; width: 321px; height: 196px; position: relative; box-sizing:border-box; padding: 26px 0; }
    .card1{ position: absolute; top:50%; left: 50%; margin-top: -50%; margin-left: -50% }
    .text-font{ position: absolute; bottom: 9%; left: 26%; font-family: PingFangSC-Regular; font-size: 13px; color: #9C9C9C; letter-spacing: 0; text-align: center; line-height: 15px; }
    .ditu{ width: 100%; height: 220px; position: absolute; top: 0; right:0; }
    .ditu1{ width: 100%; height: 86px; position: absolute; top: 0; right:0; }
    .box { background: #fff; border-radius: 7px; margin-top:19px; width: 321px; box-sizing: border-box; padding:9px 19px 9px 19px; }
    .tit,.tit-center{ font-family: PingFangSC-Regular; font-size: 15px; color: #666666; letter-spacing: 0; line-height: 32px; display: -webkit-flex; display: flex; }
    .tit2{ font-family: PingFangSC-Semibold; font-size: 17px; color: #666; letter-spacing: 0; line-height: 32px; }
    .tit-center{ color: #1F90FB ; margin-left: 4px; }
    .img-tou{ width: 100%; height: 100%; position: absolute; top: -1px; left: 86px; margin-left: -87px; padding: 1px; border-radius: 7px; }
    .img-tou1{ width: 62px; height: 62px; border-radius: 50%; position: absolute; bottom: 0; right: 0; z-index: 50; }
    .status-box{ text-align: center; margin-top: 15px; position: relative; }
    .img-status{ width:132px; height:34px; }
    .touxiang{ width: 206px; height: 206px; box-sizing: border-box; margin-top: 10px; position: relative; margin-left: 38px; }
    .img-status1{ width:157px; height:36px; }
    .time-box{ width: 181px; height: 47px; position: absolute; bottom: -4%; left: 50%; margin-left: -90px; text-align: center; display: -webkit-flex; display: flex; -webkit-justify-content: center; justify-content: center; }
    .time{ display: -webkit-flex; display: flex; }
    .time-fen-bg{ width: 35px; height: 35px; background: rgba(255,255,255,0.30); opacity: 1; border-radius: 7px; text-align: center; box-sizing: border-box; padding: 4px 9px; margin: 0 1px; position: relative; }
    .time-fen{ width: 26px; height: 25px; line-height: 25px; background-image: linear-gradient(180deg, #D2C7BB 0%, #B2B2B2 12%, #D2D0D0 31%, #EEEEEE 49%, #D7D3D4 62%, #B3B3B3 77%, #BAB2B2 89%, #E1DAD2 100%); border-radius: 1px; font-family: PingFangSC-Semibold; font-size: 14px; color: #5E4E4E; letter-spacing: 0; text-align: center; position: absolute; top: 5px; left: 4px; z-index: 999; }
    .dian{ width: 2px; height: 35px; position: relative; }
    .border{ width: 2px; height: 2px; border-radius: 50%; background: #D8D8D8; position: absolute; }
    .border1{ top: 50%; margin-top: -2px; }
    .border2{ top: 50%; margin-top: 2px; }
    .zysx-box{ text-align: center; line-height: 19px; word-break: break-all; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp:2; overflow: hidden; text-overflow:ellipsis; }
    .title-tit{ font-size: 17px; line-height: 28px; }
    .title-tit1{ font-size:13px; color:#cfcfd0; margin: 14px 0; }
    .hide{ display: block; }
    .show{ height: 76px; }
    .zyxx-tit{ display: -webkit-flex; display: flex; margin: 9px 0; }
    .left{ color: #999999; font-size: 23px; margin-right: 4px; }
    .right1{ font-family: PingFangSC-Regular; font-size: 13px; color: #999999; letter-spacing: 0; }
    .right{ font-family: PingFangSC-Regular; font-size: 13px; color: #999999; letter-spacing: 0; display: -webkit-box; overflow: hidden; text-overflow: ellipsis; word-wrap: break-word; white-space: normal !important; -webkit-line-clamp: 2; -webkit-box-orient: vertical; }
    .cha{ font-family: PingFangSC-Regular; font-size: 13px; color: #1F90FB; letter-spacing: 0; margin-top: 9px; margin-left: 7px; }
    .dtt{ height: 115px; text-align: center; margin: 19px 0; position: relative; }
    .lx { width: 64px; font-family: PingFangSC-Regular; font-size: 15px; color: #9c9c9c; letter-spacing: 0; line-height: 15px; text-align: justify; }
    .lx::after{ width: 100%; display: inline-block; content: ''; }
    .mc { font-family: PingFangSC-Regular; font-size: 15px; color: #333; letter-spacing: 0; line-height: 15px; }
    .mc1{ font-family: PingFangSC-Regular; font-size: 15px; color: #F52736; letter-spacing: 0; line-height: 15px; }
    .cen{ box-sizing: border-box; padding: 20rxp 0; line-height: 27px; display: -webkit-flex; display: flex; -webkit-justify-content: space-between; justify-content: space-between; }
    wx-button{ font-size: 16px; color: #FFFFFF; letter-spacing: 0; text-align: center; line-height: 46px; margin-top: 19px; background: #0D8CE6; border-radius: 4px; height: 46px; }
    .top{ background: rgba(0,0,0,0.50); position: fixed; z-index: 999; width: 100%; top:0; left: 0; display:-webkit-flex; display:flex; -webkit-align-items: center; align-items: center; -webkit-justify-content: center; justify-content: center; }
    .center{ width: 230px; height: 228px; background: #fff; border-radius: 7px; position: relative; }
    .center1{ width: 268px; background: #fff; border-radius: 7px; position: relative; }
    .btn1{ padding: 0 19px; margin-top: 15px; height: 47px; font-size: 17px; color: #0D8CE6; line-height: 47px; text-align: center; }
    .btn{ height:47px; font-size:17px; color:#0D8CE6; line-height:47px; text-align:center; position:absolute; bottom:0; left:0; width:100%; }
    .info{ width: 268px; position: absolute; top: 57%; left: 50%; margin-left:-140px; text-align: center; }
    .tt1{ font-family: PingFangSC-Medium; font-size: 17px; color: #000000; text-align: center; }
    .title1{ font-family: PingFangSC-Regular; font-size: 14px; color: #585858; text-align: center; line-height: 36px; }
    .fslv{ width: 18px; height: 18px; margin: 0 9px; position: absolute; top:23%; right:30px; }
    .img-tou3{ width: 100%; height: 100%; }
    .box1{ margin-top: 19px; }
    .img-flsm{ width: 100%; height: 100%; z-index: 1000; position: relative; }
    .erweima{ width: 45px; height: 35px; margin-right:-19px; }
    .tit-flsm{ padding:19px 0 15px 0; line-height: 24px; font-size: 17px; text-align: center; }
    .tit-wenan{ text-indent: 2em; line-height: 21px; font-size: 14px; color:#585858; padding: 0 19px; }
    .tt{ text-indent: 2em; line-height: 21px; font-size: 14px; color:#585858; padding: 0 19px; }
    .img-touxiang{ width: 181px; height: 181px; position: absolute; border-radius: 3px; top: 13px; left: 12px; }
    .text{ position: absolute; bottom: 0; width:100%; text-align: center; height: 33px; line-height: 33px; color: #fff; background:#CCCCCC; border-radius: 0 0 16px 16px; }
    .img-git{ width: 100%; height: 100%; }
    .bxo{ width: 57px; height: 57px; position: absolute; bottom:0px; left:40px; z-index: 100; }
    .dial{ width:48px; height:48px; margin:0 auto; position: absolute; border-radius: 50%; overflow: hidden; background-color:#666666; background-image: url("./images/beijing.jpg"); background-size:120% 120%; background-position:center; box-sizing: border-box; z-index: 100; }
    .bigdiv{ width:48px; height:48px; margin:0 auto; position: absolute; border-radius: 50%; overflow: hidden; z-index: 100; }
    .bigdiv>wx-div{ position: absolute; left:28px; border-radius: 9px; z-index: 100; }
    .bigdiv1{ -webkit-animation: moves 60s steps(60) infinite; animation: moves 60s steps(60) infinite; z-index: 100; }
    .bigdiv1 .secondHand{ width:1px; height:19px; background-color: #000; top:4px; left:23px; z-index: 100; }
    .bigdiv2{ -webkit-animation: moves 3600s steps(3600) infinite; animation: moves 3600s steps(3600) infinite; }
    .bigdiv2 .minuteHand{ width:1px; height:15px; background-color: #000; top:8px; left:23px; z-index: 100; }
    .bigdiv3{ -webkit-animation: moves 216000s steps(216000) infinite; animation: moves 216000s steps(216000) infinite; }
    .bigdiv3 .hourHand{ width:1px; height:9px; background-color: #000; top:14px; left:22px; border-radius: 9px; z-index: 100; }
    .bigdiv .center{ width:1px; height:1px; left:50%; top: 50%; margin-top: -1px; margin-left: -1px; background-color: black; z-index: 100; }
    @-webkit-keyframes moves{ from{ -webkit-transform: rotateZ(0deg); transform: rotateZ(0deg); }
        to{ -webkit-transform: rotateZ(360deg); transform: rotateZ(360deg); }
    }@keyframes moves{ from{ -webkit-transform: rotateZ(0deg); transform: rotateZ(0deg); }
         to{ -webkit-transform: rotateZ(360deg); transform: rotateZ(360deg); }
     }.top12 { background: rgba(0, 0, 0, 0.50); position: fixed; z-index: 9999; width: 100%; top: 0; left: 0; display: -webkit-flex; display: flex; -webkit-align-items: center; align-items: center; -webkit-justify-content: center; justify-content: center; }
    .btna1{ height: 47px; font-size: 17px; color: #0d8ce6; line-height: 47px; border-top: 1px solid #e5e5e5; text-align: center; display: -webkit-flex; display: flex; -webkit-align-items: center; align-items: center; -webkit-justify-content: center; justify-content: center; }
    .tuichu1{ width: 50%; font-family: PingFangSC-Regular; font-size: 17px; color: #000; text-align: center; }
    .tuichu11{ width: 50%; margin-top: 0px; font-family: PingFangSC-Medium; font-size: 17px; color: #0D8CE6; text-align: center; border: none; background-color: transparent; outline: none; font-weight: normal; border-left: 1px solid #e5e5e5; }
    .tit12 { padding: 19px 0 15px 0; line-height: 24px; font-size: 17px; text-align: center; }
    .tt12 { text-indent: 2em; line-height: 21px; font-size: 14px; color: #585858; padding: 0 19px; text-align: justify; }
    .center12{ width: 268px; background: #fff; border-radius: 7px; position: relative;}
    </style>
    <script src="./statics/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#break").click(function () {
                $(location).attr('href', 'index.php');
            });
        });
    </script>
</head>
<body is="pages/jxzq/cha-xun-jie-guo/index" style="background: #f0f0f0;">
<div style="margin: 0 auto;width: 360px;background-size: 100% 100%;background-repeat: no-repeat;background-image: url("./images/wodebj.png");">
<wx-view class="mine" >
    <wx-image class="ditu1" src="./images/wodebj.png" role="img">
        <div style="background-size: 100% 100%; background-repeat: no-repeat; background-image: url(&quot;./images/wodebj.png&quot;);"></div>
        <span></span>
    </wx-image>
    <wx-view class="wrap1">
        <wx-view class="box" style="height:687-48px;">
            <wx-view class="tit-box">
                <wx-view class="xcx-img">
                    <wx-image class="img-flsm" src="./images/logo.png" role="img">
                        <div style="background-size: 100% 100%; background-repeat: no-repeat; background-image: url(&quot;./images/logo.png&quot;);"></div>
                        <span></span>
                    </wx-image>
                </wx-view>
                <wx-view class="tit1">
                    <wx-view class="timt">
                        <?php echo date('Y年m月d日'); ?>
                    </wx-view>
                    <wx-view class="timt1">
                        <?php echo date('h:i:s') ?>
                    </wx-view>
                </wx-view>
                <wx-view class="erweima">
                    <wx-image class="img-flsm" src="./images/erweima.png" role="img">
                        <div style="background-size: 100% 100%; background-repeat: no-repeat; background-image: url(&quot;./images/erweima.png&quot;);"></div>
                        <span></span>
                    </wx-image>
                </wx-view>
            </wx-view>
            <wx-view class="touxiang">
                <wx-image class="img-git" src="./images/security/3_E37ED4v2.gif" role="img">
                    <div style="background-size: 100% 100%; background-repeat: no-repeat; background-image: url(&quot;./images/security/3_E37ED4v2.gif&quot;);"></div>
                    <span></span>
                </wx-image>
                <wx-view class="img-touxiang">
                    <wx-image class="img-tou" mode="aspectFill"  role="img">
                        <div style="background-size: cover; background-position: center center; background-repeat: no-repeat; background-image: url(<?php echo $pic; ?>);"></div>
                        <span></span>
                    </wx-image>
                </wx-view>
            </wx-view>
            <wx-view class="status-box">
                <wx-image class="img-status1" role="img">
                    <div style="background-size: 100% 100%; background-repeat: no-repeat; background-image: url(&quot;./images/<?php echo $level; ?>.png&quot;);"></div>
                    <span></span>
                </wx-image>
                <wx-view class="fslv">
                    <wx-image class="img-flsm" src="./images/yuanzhu.png" role="img">
                        <div style="background-size: 100% 100%; background-repeat: no-repeat; background-image: url(&quot;./images/yuanzhu.png&quot;);"></div>
                        <span></span>
                    </wx-image>
                </wx-view>
            </wx-view>
            <wx-view class="box1">
                <wx-view class="cen">
                    <wx-view class="tit-lx">
                        <wx-view class="lx">
                            姓名
                        </wx-view>
                        <wx-text class="mao">
                            <span style="display:none;">:</span>
                            <span>:</span>
                        </wx-text>
                    </wx-view>
                    <wx-view class="mc">
                        <?php echo $name; ?>
                    </wx-view>
                </wx-view>
                <wx-view class="cen">
                    <wx-view class="tit-lx">
                        <wx-view class="lx">
                            身份证号
                        </wx-view>
                        <wx-text class="mao">
                            <span style="display:none;">:</span>
                            <span>:</span>
                        </wx-text>
                    </wx-view>
                    <wx-view class="mc">
                        <?php echo $cardid; ?>
                    </wx-view>
                </wx-view>
                <wx-view class="cen">
                    <wx-view class="tit-lx">
                        <wx-view class="lx">
                            查询时间
                        </wx-view>
                        <wx-text class="mao">
                            <span style="display:none;">:</span>
                            <span>:</span>
                        </wx-text>
                    </wx-view>
                    <wx-view class="mc">
                        <?php echo date('m-d h:i') ?>
                    </wx-view>
                </wx-view>
                <wx-view class="cen">
                    <wx-view class="tit-lx">
                        <wx-view class="lx">
                            失效时间
                        </wx-view>
                        <wx-text class="mao">
                            <span style="display:none;">:</span>
                            <span>:</span>
                        </wx-text>
                    </wx-view>
                    <wx-view class="mc1">
                        <?php echo date('m-d') ?> 24:00
                    </wx-view>
                </wx-view>
            </wx-view>
        </wx-view>
    </wx-view>
    <wx-view class="footer">
        <wx-button role="button" aria-disabled="false" id="break">
            返回首页
        </wx-button>
    </wx-view>
    <wx-view class="foot">
        北京市大数据中心
    </wx-view>
</wx-view>
</body>
</html>