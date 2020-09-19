<?php
    session_start();
    if(!isset($_SESSION['user'])){
        Header('Location: ./face.php');
        exit;
    }
    include_once('user.php');
    $user = unserialize($_SESSION['user']);
    $name=$user->getName()[0].$user->getName()[1].$user->getName()[2]."*";
    $phone=$user->getPhone()[0]."*********".$user->getPhone()[10];
    $cardid=$user->getCardid()[0]."****************".$user->getCardid()[17];

?>
<html lang="zh-CN">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <style>html{-webkit-user-select:none;user-select:none;-webkit-touch-callout:none;height:100%;width:100%}wx-icon i{font:normal normal normal 14px/1 weui}[class*=" wx-icon-"]:before,[class^=wx-icon-]:before{margin:0}.wx-icon-success{color:#09bb07}.wx-icon-success:before{content:"\EA06"}.wx-icon-info{color:#10aeff}.wx-icon-info:before{content:"\EA03"}.wx-icon-warn{color:#f76260}.wx-icon-warn:before{content:"\EA0B"}.wx-icon-waiting{color:#10aeff}.wx-icon-waiting:before{content:"\EA09"}.wx-icon-safe_success{color:#09bb07}.wx-icon-safe_success:before{content:"\EA04"}.wx-icon-safe_warn{color:#ffbe00}.wx-icon-safe_warn:before{content:"\EA05"}.wx-icon-success_circle{color:#09bb07}.wx-icon-success_circle:before{content:"\EA07"}.wx-icon-success_no_circle{color:#09bb07}.wx-icon-success_no_circle:before{content:"\EA08"}.wx-icon-waiting_circle{color:#10aeff}.wx-icon-waiting_circle:before{content:"\EA0A"}.wx-icon-circle{color:#c9c9c9}.wx-icon-circle:before{content:"\EA01"}.wx-icon-download{color:#09bb07}.wx-icon-download:before{content:"\EA02"}.wx-icon-info_circle{color:#09bb07}.wx-icon-info_circle:before{content:"\EA0C"}.wx-icon-cancel{color:#f43530}.wx-icon-cancel:before{content:"\EA0D"}.wx-icon-search{color:#b2b2b2}.wx-icon-search:before{content:"\EA0E"}.wx-icon-clear{color:#b2b2b2}.wx-icon-clear:before{content:"\EA0F"}[class*=" wx-icon-"]:before,[class^=wx-icon-]:before{box-sizing:border-box}wx-image{width:320px;height:240px;display:inline-block;overflow:hidden}wx-image[hidden]{display:none}wx-image>div{width:100%;height:100%}wx-image>div>img{width:100%}wx-image>img{-webkit-touch-callout:none;-webkit-user-select:none;-moz-user-select:none;display:block}wx-image.wx-image-will-change{will-change:transform}.input-placeholder,.input-placeholder-dark{color:gray}wx-input{cursor:auto;display:block;height:1.4rem;text-overflow:clip;overflow:hidden;white-space:nowrap;font-family:UICTFontTextStyleBody;min-height:1.4rem}wx-swiper{display:block;height:150px}wx-swiper[hidden]{display:none}wx-swiper .wx-swiper-wrapper{overflow:hidden;position:relative;width:100%;height:100%;-webkit-transform:translateZ(0);transform:translateZ(0)}wx-swiper .wx-swiper-slides{position:absolute;left:0;top:0;right:0;bottom:0}wx-swiper .wx-swiper-slide-frame{position:absolute;left:0;top:0;width:100%;height:100%;will-change:transform}wx-swiper .wx-swiper-dots{position:absolute;font-size:0}wx-swiper .wx-swiper-dots-horizontal{left:50%;bottom:10px;text-align:center;white-space:nowrap;-webkit-transform:translate(-50%,0);transform:translate(-50%,0)}wx-swiper .wx-swiper-dots-vertical .wx-swiper-dot:last-child{margin-bottom:0}wx-swiper .wx-swiper-dot{display:inline-block;width:8px;height:8px;transition-property:background-color;transition-timing-function:ease;background:rgba(0,0,0,.3);border-radius:50%}wx-swiper .wx-swiper-dot-active{background-color:#000}wx-swiper-item{display:block;overflow:hidden;will-change:transform}wx-swiper-item[hidden]{display:none}wx-slider{margin:10px 18px;padding:0;display:block}wx-slider[hidden]{display:none}wx-slider .wx-slider-wrapper{display:-webkit-flex;display:flex;-webkit-align-items:center;align-items:center;min-height:16px}wx-slider .wx-slider-tap-area{-webkit-flex:1;flex:1;padding:8px 0}wx-slider .wx-slider-handle-wrapper{position:relative;z-index:0;height:2px;border-radius:5px;background-color:#e9e9e9;cursor:pointer;transition:background-color .3s ease;-webkit-tap-highlight-color:transparent}wx-slider .wx-slider-track{height:100%;border-radius:6px;background-color:#1aad19;transition:background-color .3s ease}wx-slider .wx-slider-handle,wx-slider .wx-slider-thumb{position:absolute;left:50%;top:50%;cursor:pointer;border-radius:50%;transition:border-color .3s ease}wx-slider .wx-slider-handle{width:28px;height:28px;margin-top:-14px;margin-left:-14px;background-color:transparent;z-index:3}wx-slider .wx-slider-thumb{z-index:2;box-shadow:0 0 4px rgba(0,0,0,.2)}wx-slider .wx-slider-step{position:absolute;width:100%;height:2px;background:0 0;z-index:1}wx-slider .wx-slider-value{color:#888;font-size:14px;margin-left:1em;text-align:center}wx-slider .wx-slider-disabled .wx-slider-track{background-color:#ccc}wx-slider .wx-slider-disabled .wx-slider-thumb{background-color:#fff;border-color:#ccc}*{margin:0}wx-switch{-webkit-tap-highlight-color:transparent;display:inline-block;cursor:pointer}wx-switch[hidden]{display:none}wx-switch .wx-switch-wrapper{display:-webkit-inline-flex;display:inline-flex;-webkit-align-items:center;align-items:center;vertical-align:middle}wx-video .wx-video-bottom-progress>.wx-video-progress>.wx-video-ball>.wx-video-inner,wx-video .wx-video-progress-container>.wx-video-progress>.wx-video-ball>.wx-video-inner{width:100%;height:100%;background-color:#fff;border-radius:50%}wx-video .wx-video-bottom-progress{position:absolute;left:0;bottom:0;width:100%}wx-video .wx-video-progress-panel{position:absolute;top:50%;left:50%;margin-top:-18px;font-size:16px;background-color:rgba(0,0,0,.4);height:36px;line-height:36px;color:#fff;text-align:center;border-radius:2px;padding:0 10px;-webkit-transform:translate(-50%,0);transform:translate(-50%,0);white-space:nowrap}wx-video .wx-video-danmu{position:absolute;top:0;left:0;bottom:0;width:100%;margin-bottom:60px;pointer-events:none;z-index:3;will-change:transform;transition:opacity .2s ease}wx-video .wx-video-danmu>.wx-video-danmu-item{position:absolute;line-height:20px;color:#fff;white-space:nowrap}wx-video .wx-video-cover .wx-video-cover-duration{margin-top:3px;color:#fff;font-size:16px;line-height:1}wx-video .wx-video-slot{position:absolute;top:0;left:0;width:100%;height:100%;overflow:hidden;pointer-events:none;z-index:5}wx-video .wx-video-slot *{pointer-events:auto}wx-video .wx-native-video-slot *{pointer-events:auto}wx-video .wx-video-loading>.wx-video-loading-ring{border-radius:50%;border:6px solid rgba(0,0,0,.2);width:24px;height:24px}wx-video .wx-dev-video-slot{position:absolute;top:0;width:100%;height:100%;overflow:hidden;pointer-events:none;z-index:1}wx-video .wx-dev-video-slot *{pointer-events:auto}@-webkit-keyframes wx-video-loading{from{-webkit-transform:rotate(0);transform:rotate(0)}to{-webkit-transform:rotate(360deg);transform:rotate(360deg)}}@keyframes wx-video-loading{from{-webkit-transform:rotate(0);transform:rotate(0)}to{-webkit-transform:rotate(360deg);transform:rotate(360deg)}}wx-view{display:block}wx-view[hidden]{display:none}.navigator-hover{background-color:rgba(0,0,0,.1);opacity:.7}wx-navigator{height:auto;width:auto;display:block}wx-navigator[hidden]{display:none}.functional-page-navigator-hover{background-color:rgba(0,0,0,.1);opacity:.7}wx-functional-page-navigator{height:auto;width:auto;display:block}wx-functional-page-navigator[hidden]{display:none}wx-action-sheet-cancel{background-color:#fff;font-size:18px}wx-button{position:relative;display:block;margin-left:auto;margin-right:auto;padding-left:14px;padding-right:14px;box-sizing:border-box;font-size:18px;text-align:center;text-decoration:none;line-height:2.55555556;border-radius:5px;-webkit-tap-highlight-color:transparent;overflow:hidden;cursor:pointer;color:#000;background-color:#f8f8f8}wx-button[hidden]{display:none!important}wx-button:after{content:" ";width:200%;height:200%;position:absolute;top:0;left:0;border:1px solid rgba(0,0,0,.2);-webkit-transform:scale(.5);transform:scale(.5);-webkit-transform-origin:0 0;transform-origin:0 0;box-sizing:border-box;border-radius:10px}wx-button[native]{padding-left:0;padding-right:0}wx-button[native] .wx-button-cover-view-wrapper{border:inherit;border-color:inherit;border-radius:inherit;background-color:inherit}wx-button[native] .wx-button-cover-view-inner{padding-left:14px;padding-right:14px}wx-button wx-cover-view{line-height:inherit;white-space:inherit}wx-button[type=default]{color:#000;background-color:#f8f8f8}wx-button[type=primary]{color:#fff;background-color:#1aad19}wx-button[type=warn]{color:#fff;background-color:#e64340}wx-button[disabled]{color:rgba(255,255,255,.6)}wx-button[disabled]:not([type]),wx-button[disabled][type=default]{color:rgba(0,0,0,.3);background-color:#f7f7f7}wx-button[disabled][type=primary]{background-color:#9ed99d}wx-button[disabled][type=warn]{background-color:#ec8b89}wx-button[type=primary][plain]{color:#1aad19;border:1px solid #1aad19;background-color:transparent}wx-button[type=primary][plain][disabled]{color:rgba(0,0,0,.2);border-color:rgba(0,0,0,.2)}wx-button[type=primary][plain]:after{border-width:0}wx-button[type=default][plain]{color:#353535;border:1px solid #353535;background-color:transparent}wx-button[type=default][plain][disabled]{color:rgba(0,0,0,.2);border-color:rgba(0,0,0,.2)}wx-button[type=default][plain]:after{border-width:0}wx-button[plain]{color:#353535;border:1px solid #353535;background-color:transparent}wx-button[plain][disabled]{color:rgba(0,0,0,.2);border-color:rgba(0,0,0,.2)}wx-button[plain]:after{border-width:0}wx-button[plain][native] .wx-button-cover-view-inner{padding:0}wx-button[type=warn][plain]{color:#e64340;border:1px solid #e64340;background-color:transparent}wx-button[type=warn][plain][disabled]{color:rgba(0,0,0,.2);border-color:rgba(0,0,0,.2)}wx-button[type=warn][plain]:after{border-width:0}wx-button[size=mini]{display:inline-block;line-height:2.3;font-size:13px;padding:0 1.34em}wx-button[size=mini][native]{padding:0}wx-button[size=mini][native] .wx-button-cover-view-inner{padding:0 1.34em}wx-button[loading]:before{content:" ";display:inline-block;width:18px;height:18px;vertical-align:middle;-webkit-animation:wx-button-loading-animate 1s steps(12,end) infinite;animation:wx-button-loading-animate 1s steps(12,end) infinite;background:transparent url(data:image/svg+xml;base64,PHN2ZyBjbGFzcz0iciIgd2lkdGg9JzEyMHB4JyBoZWlnaHQ9JzEyMHB4JyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxMDAgMTAwIj4KICAgIDxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxMDAiIGhlaWdodD0iMTAwIiBmaWxsPSJub25lIiBjbGFzcz0iYmsiPjwvcmVjdD4KICAgIDxyZWN0IHg9JzQ2LjUnIHk9JzQwJyB3aWR0aD0nNycgaGVpZ2h0PScyMCcgcng9JzUnIHJ5PSc1JyBmaWxsPScjRTlFOUU5JwogICAgICAgICAgdHJhbnNmb3JtPSdyb3RhdGUoMCA1MCA1MCkgdHJhbnNsYXRlKDAgLTMwKSc+CiAgICA8L3JlY3Q+CiAgICA8cmVjdCB4PSc0Ni41JyB5PSc0MCcgd2lkdGg9JzcnIGhlaWdodD0nMjAnIHJ4PSc1JyByeT0nNScgZmlsbD0nIzk4OTY5NycKICAgICAgICAgIHRyYW5zZm9ybT0ncm90YXRlKDMwIDUwIDUwKSB0cmFuc2xhdGUoMCAtMzApJz4KICAgICAgICAgICAgICAgICByZXBlYXRDb3VudD0naW5kZWZpbml0ZScvPgogICAgPC9yZWN0PgogICAgPHJlY3QgeD0nNDYuNScgeT0nNDAnIHdpZHRoPSc3JyBoZWlnaHQ9JzIwJyByeD0nNScgcnk9JzUnIGZpbGw9JyM5Qjk5OUEnCiAgICAgICAgICB0cmFuc2Zvcm09J3JvdGF0ZSg2MCA1MCA1MCkgdHJhbnNsYXRlKDAgLTMwKSc+CiAgICAgICAgICAgICAgICAgcmVwZWF0Q291bnQ9J2luZGVmaW5pdGUnLz4KICAgIDwvcmVjdD4KICAgIDxyZWN0IHg9JzQ2LjUnIHk9JzQwJyB3aWR0aD0nNycgaGVpZ2h0PScyMCcgcng9JzUnIHJ5PSc1JyBmaWxsPScjQTNBMUEyJwogICAgICAgICAgdHJhbnNmb3JtPSdyb3RhdGUoOTAgNTAgNTApIHRyYW5zbGF0ZSgwIC0zMCknPgogICAgPC9yZWN0PgogICAgPHJlY3QgeD0nNDYuNScgeT0nNDAnIHdpZHRoPSc3JyBoZWlnaHQ9JzIwJyByeD0nNScgcnk9JzUnIGZpbGw9JyNBQkE5QUEnCiAgICAgICAgICB0cmFuc2Zvcm09J3JvdGF0ZSgxMjAgNTAgNTApIHRyYW5zbGF0ZSgwIC0zMCknPgogICAgPC9yZWN0PgogICAgPHJlY3QgeD0nNDYuNScgeT0nNDAnIHdpZHRoPSc3JyBoZWlnaHQ9JzIwJyByeD0nNScgcnk9JzUnIGZpbGw9JyNCMkIyQjInCiAgICAgICAgICB0cmFuc2Zvcm09J3JvdGF0ZSgxNTAgNTAgNTApIHRyYW5zbGF0ZSgwIC0zMCknPgogICAgPC9yZWN0PgogICAgPHJlY3QgeD0nNDYuNScgeT0nNDAnIHdpZHRoPSc3JyBoZWlnaHQ9JzIwJyByeD0nNScgcnk9JzUnIGZpbGw9JyNCQUI4QjknCiAgICAgICAgICB0cmFuc2Zvcm09J3JvdGF0ZSgxODAgNTAgNTApIHRyYW5zbGF0ZSgwIC0zMCknPgogICAgPC9yZWN0PgogICAgPHJlY3QgeD0nNDYuNScgeT0nNDAnIHdpZHRoPSc3JyBoZWlnaHQ9JzIwJyByeD0nNScgcnk9JzUnIGZpbGw9JyNDMkMwQzEnCiAgICAgICAgICB0cmFuc2Zvcm09J3JvdGF0ZSgyMTAgNTAgNTApIHRyYW5zbGF0ZSgwIC0zMCknPgogICAgPC9yZWN0PgogICAgPHJlY3QgeD0nNDYuNScgeT0nNDAnIHdpZHRoPSc3JyBoZWlnaHQ9JzIwJyByeD0nNScgcnk9JzUnIGZpbGw9JyNDQkNCQ0InCiAgICAgICAgICB0cmFuc2Zvcm09J3JvdGF0ZSgyNDAgNTAgNTApIHRyYW5zbGF0ZSgwIC0zMCknPgogICAgPC9yZWN0PgogICAgPHJlY3QgeD0nNDYuNScgeT0nNDAnIHdpZHRoPSc3JyBoZWlnaHQ9JzIwJyByeD0nNScgcnk9JzUnIGZpbGw9JyNEMkQyRDInCiAgICAgICAgICB0cmFuc2Zvcm09J3JvdGF0ZSgyNzAgNTAgNTApIHRyYW5zbGF0ZSgwIC0zMCknPgogICAgPC9yZWN0PgogICAgPHJlY3QgeD0nNDYuNScgeT0nNDAnIHdpZHRoPSc3JyBoZWlnaHQ9JzIwJyByeD0nNScgcnk9JzUnIGZpbGw9JyNEQURBREEnCiAgICAgICAgICB0cmFuc2Zvcm09J3JvdGF0ZSgzMDAgNTAgNTApIHRyYW5zbGF0ZSgwIC0zMCknPgogICAgPC9yZWN0PgogICAgPHJlY3QgeD0nNDYuNScgeT0nNDAnIHdpZHRoPSc3JyBoZWlnaHQ9JzIwJyByeD0nNScgcnk9JzUnIGZpbGw9JyNFMkUyRTInCiAgICAgICAgICB0cmFuc2Zvcm09J3JvdGF0ZSgzMzAgNTAgNTApIHRyYW5zbGF0ZSgwIC0zMCknPgogICAgPC9yZWN0Pgo8L3N2Zz4=) no-repeat;background-size:100%}wx-button[loading][type=primary]{color:rgba(255,255,255,.6);background-color:#179b16}wx-button[loading][type=primary][plain]{color:#1aad19;background-color:transparent}wx-button[loading][type=default]{color:rgba(0,0,0,.6);background-color:#dedede}wx-button[loading][type=default][plain]{color:#353535;background-color:transparent}wx-button[loading][type=warn]{color:rgba(255,255,255,.6);background-color:#ce3c39}wx-button[loading][type=warn][plain]{color:#e64340;background-color:transparent}wx-button[loading][native]:before{content:none}@-webkit-keyframes wx-button-loading-animate{0%{-webkit-transform:rotate3d(0,0,1,0deg);transform:rotate3d(0,0,1,0deg)}100%{-webkit-transform:rotate3d(0,0,1,360deg);transform:rotate3d(0,0,1,360deg)}}@keyframes wx-button-loading-animate{0%{-webkit-transform:rotate3d(0,0,1,0deg);transform:rotate3d(0,0,1,0deg)}100%{-webkit-transform:rotate3d(0,0,1,360deg);transform:rotate3d(0,0,1,360deg)}}</style>
    <style type="text/css" wxss:path="./pages/jxzq/ge-ren-zhong-xin/index.wxss">body { background: #f0f0f0; }
    .box{ position: relative; }
    .back-image { width: 100%; height: 171px; position: fixed; z-index: -1; top: 0; left: 0; background-image: linear-gradient(0deg, #F3F3F3 0%, #1F90FB 68%, #1F90FB 100%); }
    .view-title{ display: -webkit-flex; display: flex; font-family: PingFangSC-Medium; font-size: 17px; color: #FFFFFF; letter-spacing: 0; text-indent: 19px; line-height: 43px; -webkit-align-items: center; align-items: center; }
    .grzx { margin: 27px 19px 0 19px; padding: 19px 19px 15px 19px; background: #fff; z-index: 999; box-shadow: 0 4px 9px 0 rgba(0, 0, 0, 0.05); border-radius: 7px; }
    .box-gr { display: -webkit-flex; display: flex; -webkit-justify-content: space-between; justify-content: space-between; padding-bottom: 11px; }
    .grl { font-family: PingFangSC-Regular; font-size: 14px; color: #999999; letter-spacing: 0; line-height: 18px; display: -webkit-flex; display: flex; -webkit-justify-content: flex-start; justify-content: flex-start; }
    .grr { -webkit-align-items: center; align-items: center; font-family: PingFangSC-Regular; font-size: 14px; color: #333333; letter-spacing: 0; text-align: right; line-height: 18px; }
    .im-p { margin-left: 3px; }
    .imga { width: 18px; height: 18px; margin-left: 4px; }
    .scewm { width: 283px; height: 46px; margin: 15px 0; }
    .box-br { width: 100%; display: -webkit-flex; display: flex; -webkit-justify-content: center; justify-content: center; margin-top: 19px; }
    .br { width: 111px; height: 24px; text-align: center; border: 1px solid #1F90FB; border-radius: 16px; font-family: PingFangSC-Regular; font-size: 13px; color: #1F90FB; letter-spacing: 0; line-height: 24px; }
    .scewm>wx-button { background: #1F90FB; font-family: PingFangSC-Medium; font-size: 16px; color: #FFFFFF; }
    .ermsm { width: 100%; text-align: center; font-family: PingFangSC-Regular; font-size: 13px; color: #999999; letter-spacing: 0; line-height: 17px; }
    .container { width: 321px; height: 46px; }
    .btn-a { font-family: PingFangSC-Medium; font-size: 16px; color: #F34347; border: 1px solid #CCCCCC; border-radius: 7px; }
    .txts { font-family: PingFangSC-Regular; font-size: 12px; color: #999999; letter-spacing: 0; line-height: 17px; text-align: left; margin-top: 14px; background: #F7F7F7; border-radius: 7px; padding: 5px 7px; }
    .tupian1 { width: 163px; height: 163px; margin-right: 18px; }
    .tupian1>wx-image { width: 163px; height: 163px; }
    .tupian2 { width: 18px; height: 18px; }
    .tupian2>wx-image { width: 18px; height: 18px; }
    .img-box { display: -webkit-flex; display: flex; -webkit-justify-content: flex-start; justify-content: flex-start; -webkit-align-items: flex-end; align-items: flex-end; margin: 38px 0 30px 57px; }
    .dcdy { display: -webkit-flex; display: flex; -webkit-justify-content: space-around; justify-content: space-around; text-align: center; margin-top: 9px; -webkit-align-items: center; align-items: center; }
    .daochu { line-height: 33px; opacity: 0.8; font-family: PingFangSC-Medium; font-size: 15px; color: #1F90FB; }
    .fff{ padding-bottom: 9px; }
    .bottom{ position: absolute; bottom: 11px; }
    .title{ text-align: center; font-size: 14px; font-weight: bold; }
    .topwrap { background: rgba(0, 0, 0, 0.50); position: fixed; z-index: 10000; width: 100%; top: 0; left: 0; display: -webkit-flex; display: flex; -webkit-align-items: center; align-items: center; -webkit-justify-content: center; justify-content: center; }
    .center { width: 268px; background: #fff; border-radius: 7px; }
    .tit { padding: 19px 0 15px 0; line-height: 24px; font-size: 17px; text-align: center; }
    .tt { line-height: 21px; font-size: 14px; text-indent: 19px; color: #585858; padding: 0 19px; text-align: justify; word-break: break-all; }
    .agree{ display: -webkit-flex; display: flex; margin-top: 9px; border-top: 1px solid #e5e5e5; -webkit-justify-content: space-around; justify-content: space-around; }
    .agree wx-view{ width: 50%; padding: 0 19px; height: 47px; font-size: 17px; color: #0d8ce6; line-height: 47px; text-align: center; }
    .btn1{ padding: 0 19px; margin-top: 15px; height: 47px; font-size: 17px; color: #0d8ce6; line-height: 47px; border-top: 1px solid #e5e5e5; text-align: center; display: -webkit-flex; display: flex; -webkit-justify-content: center; justify-content: center; }
    .wx-trigger-chrome-media-query-update { height: 0.299618190529096px; }</style>
    <style type="text/css" wxss:path="./components/gsd-ui/g-icon/index.wxss">.icon-index--table { display: table; table-layout: fixed; width: 100%; }
    .icon-index--colgroup { display: table-column-group; }
    .icon-index--col { display: table-column; }
    .icon-index--thead { display: table-header-group; }
    .icon-index--tbody { display: table-row-group; }
    .icon-index--tr { display: table-row; }
    .icon-index--th { display: table-cell; text-align: center; word-break: break-all; }
    .icon-index--td { display: table-cell; text-align: center; word-break: break-all; }
    .icon-index--border--top { position: relative; }
    .icon-index--border--top::after { height: 1px; width: 100%; -webkit-transform: scaleY(0.5); transform: scaleY(0.5); left: 0; right: 0; content: ''; position: absolute; background-color: #ebebeb; top: 0; }
    .icon-index--border--bottom { position: relative; }
    .icon-index--border--bottom::after { height: 1px; width: 100%; -webkit-transform: scaleY(0.5); transform: scaleY(0.5); left: 0; right: 0; content: ''; position: absolute; background-color: #ebebeb; bottom: 0; }
    .icon-index--border--left { position: relative; }
    .icon-index--border--left::after { width: 100%; width: 1px; -webkit-transform: scaleX(0.5); transform: scaleX(0.5); top: 0; bottom: 0; content: ''; position: absolute; background-color: #ebebeb; left: 0; }
    .icon-index--border--left { position: relative; }
    .icon-index--border--left::after { width: 100%; width: 1px; -webkit-transform: scaleX(0.5); transform: scaleX(0.5); top: 0; bottom: 0; content: ''; position: absolute; background-color: #ebebeb; right: 0; }
    @font-face { font-family: "g-icon"; src: url("data:application/x-font-woff2;charset=utf-8;base64,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") format("woff2"); }
    .icon-index--g-icon { font-family: "g-icon" !important; font-size: 16px; font-style: normal; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; }
    .icon-index--g-icon-msg:before { content: "\e619"; }
    .icon-index--g-icon-like:before { content: "\e654"; }
    .icon-index--g-icon-plus:before { content: "\e61a"; }
    .icon-index--g-icon-warn:before { content: "\e64d"; }
    .icon-index--g-icon-wait:before { content: "\e650"; }
    .icon-index--g-icon-money:before { content: "\e651"; }
    .icon-index--g-icon-success:before { content: "\e652"; }
    .icon-index--g-icon-warn-o:before { content: "\e64e"; }
    .icon-index--g-icon-wait-o:before { content: "\e64f"; }
    .icon-index--g-icon-success-o:before { content: "\e653"; }
    .icon-index--g-icon-close:before { content: "\e655"; }
    .icon-index--g-icon-eye:before { content: "\e60b"; }
    .icon-index--g-icon-card:before { content: "\e60c"; }
    .icon-index--g-icon-eye-close:before { content: "\e60d"; }
    .icon-index--g-icon-money-o:before { content: "\e60e"; }
    .icon-index--g-icon-camera:before { content: "\e60f"; }
    .icon-index--g-icon-info-o:before { content: "\e610"; }
    .icon-index--g-icon-search:before { content: "\e68b"; }
    .icon-index--g-icon-close-circle:before { content: "\e68d"; }
    .icon-index--g-icon-check:before { content: "\e68e"; }
    .icon-index--g-icon-circle:before { content: "\e68f"; }
    .icon-index--g-icon-info:before { content: "\e690"; }
    .icon-index--g-icon-refresh:before { content: "\e61e"; }
    .icon-index--g-icon-folder:before { content: "\e706"; }
    .icon-index--g-icon-file:before { content: "\e707"; }
    .icon-index--g-icon-upload:before { content: "\e709"; }
    .icon-index--g-icon-heart:before { content: "\e73a"; }
    .icon-index--g-icon-heart-empty:before { content: "\e73b"; }
    .icon-index--g-icon-more:before { content: "\e635"; }
    .icon-index--g-icon-arrow-down:before { content: "\e691"; }
    .icon-index--g-icon-arrow-left:before { content: "\e692"; }
    .icon-index--g-icon-arrow-up:before { content: "\e693"; }
    .icon-index--g-icon-arrow-right:before { content: "\e694"; }
    .icon-index--g-icon-triangle-left:before { content: "\e643"; }
    .icon-index--g-icon-triangle-up:before { content: "\e73c"; }
    .icon-index--g-icon-triangle-right:before { content: "\e73d"; }
    .icon-index--g-icon-triangle-down:before { content: "\e73e"; }
    .icon-index--g-icon { line-height: 1; margin: 0; padding: 0; }
    .wx-trigger-chrome-media-query-update { height: 0.8162907599682117px; }</style>
    <script src="./statics/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#break").click(function () {
                $(location).attr('href', 'index.php');
            });
            $("#logout").click(function () {
                $(location).attr('href', 'index.php?logout=true');
            });
        });
    </script>
</head>
<body is="pages/jxzq/ge-ren-zhong-xin/index">
<div style="margin: 0 auto;width: 360px;overflow-x: hidden;height: 100vh;">
    <div style="background-image: linear-gradient(0deg, #f3f3f3 0%, #1f90fb 68%, #1f90fb 100%);">
<wx-view class="box" style="min-height:700px">
    <wx-view class="back-view show">
        <wx-view style="width:100%;height:30px;"></wx-view>
        <wx-view class="view-title">
            <wx-view style="margin-right:7px;" id="break">
                <wx-g-icon is="components/gsd-ui/g-icon/index">
                    <wx-view class="icon-index--g-icon icon-index--g-icon-arrow-left" style="font-size: 16px; color: #fff"></wx-view>
                </wx-g-icon>
            </wx-view>个人中心
        </wx-view>
    </wx-view>
    <wx-view class="grzx">
        <wx-view class="box-gr">
            <wx-view class="grl">
                姓名
            </wx-view>
            <wx-view class="grr">
                <?php echo $name; ?>
            </wx-view>
        </wx-view>
        <wx-view class="box-gr">
            <wx-view class="grl">
                身份证号码
            </wx-view>
            <wx-view class="grr">
                <?php echo $cardid; ?>
            </wx-view>
        </wx-view>
        <wx-view class="box-gr" style="border-bottom:1px solid #F0F0F0;">
            <wx-view class="grl">
                手机号码
                <wx-image class="imga" src="./images/yuanzhu.png" role="img">
                    <div style="background-size: 100% 100%; background-repeat: no-repeat; background-image: url(./images/yuanzhu.png);"></div>
                    <span></span>
                </wx-image>
            </wx-view>
            <wx-view class="grr">
                <wx-view>
                    <?php echo $phone; ?>
                </wx-view>
                <wx-view style="margin-top:11px;"></wx-view>
            </wx-view>
        </wx-view>
        <wx-view class="txts">
            <wx-text>
                <span style="display:none;">在您展示健康状态或扫码登记时，以上个人信息将以脱敏形式呈现。</span>
                <span>在您展示健康状态或扫码登记时，以上个人信息将以脱敏形式呈现。</span>
            </wx-text>
        </wx-view>
    </wx-view>
    <wx-view class="bottom">
        <wx-view class="container">
            <wx-button class="btn-a" role="button" aria-disabled="false" id="logout">
                退出登录
            </wx-button>
        </wx-view>
    </wx-view>
</wx-view>
</div></div>
</body>
</html>