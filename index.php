<!DOCTYPE html>
<html>
<head lang = "en">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="target-densitydpi=device-dpi,width=640,width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>字嗨预热啦</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap-3.3.5-dist/css/bootstrap.css" rel="stylesheet">
    <link href="css/app.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="js/juicer-min.js"></script>
    <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>

    <!--模板-->
    <script id="pageTpl" type="text/template">
        <div class="row page page${id} full zh-hidden zh-black">
            <div class="col-md-12 full" style="position: relative;">
                <br>
                <div class="row">
                    <div class="col-sm-12">
                        <img src="src/img/${img}" class="img-responsive center-block zh-blur" alt="Responsive image" >
                    </div>
                </div>
                <div class="row" style="margin-top: 1em">
                    <div class="col-sm-12 zh-txt">
                        {@each txt as item,index}
                            {@if item==""}
                                <br/>
                            {@else}
                                <p class="zh-t-white">${item}</p>
                            {@/if}
                        {@/each}
                    </div>
                </div>
                <div class="row zh-option">
                    <div class="col-md-12">
                        <button class="btn center-block btn-block zh-btn zh-showoptbtn zh-black"></button>
                    </div>
                    <div class="col-sm-12 zh-btnblock">
                        <br>
                        {@each actions as item,index}
                            <button data-from="${item.from}" data-to="${item.to}" data-score="${item.score}" class="btn btn-default btn-block zh-btn zh-sbtn">${item.txt}</button>
                        {@/each}
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </script>
</head>

<body class="zh-black" ontouchstart="">
<div class="container">
<!--	上个用户页面-->
	<div class="row page pagelastuser full zh-hidden zh-yellow">
		<br>
		<div class="col-xs-12">
			<div class="row">
				<!--徽章-->
				<div class="col-xs-12">
					<img id="lastuserbadge" class="zh-stamp center-block img-thumbnail img-circle" style="margin-top: -3px" src="./src/img/badge/stamp_3.png" />
				</div>
				<div class="col-xs-12">
					<h4 id="lastusername" style="font-weight: bold"></h4>
					<h4>在字嗨逃离深山 大冒险中</h4>
					<h4 id="lastuserdes"></h4>
				</div>
			</div>
		</div>
		<div class="col-xs-12 ps-block" style="position: fixed;bottom: 0;">
			<div class="row">
				<button data-from="0" data-to="1" class="col-xs-10 col-xs-offset-1 btn btn-default btn-lg zh-btn zh-btn-yellow zh-btnwant"
				        style="font-weight: bold;">我也要玩</button>
			</div>
		</div>
	</div>
<!--	splash页面-->
	<div class="row page pagesplash full zh-hidden">
		<div class="col-xs-12 v-center ">
			<img class="splash-logo" src="src/img/splash/bg2.png" />
		</div>
	</div>
<!--	起始页-->
    <div class="row page pagestart full zh-hidden zh-yellow">
        <div class="col-xs-12 v-center zh-story-title" style="top: 20%">
	        <h3 class="center-block text-center zh-t-white">嗨！冒险 之</h3>
            <h1 class="center-block text-center zh-t-white">逃离深山</h1>
        </div>
	    <div class="col-xs-12 ps-block" style="position: fixed;bottom: 0;">
		    <div class="row zh-name-wrap">
			    <input id="zh-name" class="" style="margin-bottom: 20px" type="text" maxlength="8" value="你叫啥？" placeholder="你叫啥？">
		    </div>
		    <div class="row">
			    <button data-from="0" data-to="1" class="col-xs-10 col-xs-offset-1 btn btn-default btn-lg zh-btn zh-btn-yellow zh-btnstart"
			            style="font-weight: bold;">开始嗨</button>
		    </div>
	    </div>
    </div>

    <!--剧情会被插入这里-->

    <!--结局页-->
    <div class="row page pageend full zh-hidden zh-yellow">
        <br>
        <div class="col-xs-12">
            <div class="row">
                <!--徽章-->
                <div class="col-xs-12">
                    <img class="zh-stamp center-block img-thumbnail img-circle" style="margin-top: -3px" src="./src/img/badge/stamp_3.png" />
                </div>
                <div class="col-xs-12">
                    <br>
                    <!--分值-->
                    <p class="text-center">根据您的战斗表现，我们觉得您的战斗力为 :
                        <span class="zh-totalscore text-center" style="font-size: 14pt"></span>
                    </p>
                    <!--结语-->
                    <h4 class="zh-summarytext text-center"></h4>
                </div>
            </div>
        </div>
        <div class="row">
            <br>
            <div class="col-xs-6 col-xs-offset-3">
                <button class="btn btn-block btn-default btn-lg zh-btn zh-restartbtn">重玩一次</button>
            </div>
        </div>
    </div>

</div>

<!--<script src="js/vue/vue.js"></script>-->
<script src="js/jquery-2.1.4.min.js"></script>
<!--配置页面-->
<script src="js/config.js"></script>
<script src="css/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
<script src="js/greensock-js/src/minified/TweenMax.min.js"></script>
<!--<script src="js/hammer/hammer.js"></script>-->

<script>
	var lastUser = null;
	var lastDes = null;
	var lastImg = null;
	var cUser = null;
	var cScore = null;
	//配置页面在config.js
	//加载页面
	<?php
		$name = isset($_GET["name"])?htmlspecialchars(trim($_GET["name"])):null;
		$des = isset($_GET["des"])?htmlspecialchars(trim($_GET["des"])):null;
		$img = isset($_GET["img"])?htmlspecialchars(trim($_GET["img"])):null;
		if($name && $des){
			echo "lastUser ='".$name."';"."\n";
			echo "lastDes ='".$des."';"."\n";
			echo "lastImg ='".$img."';"."\n";
		}
	?>

	//加载剧情
	var zhLoadStory = (function(){
		var me = {};
		var storyObject = {};
		var _logicModal = null;
		var _tplUrl = "";
		var tpl = $('#pageTpl').html();

		var randerPage = function(data){
			return juicer(tpl,data);
		};

		function ajaxLoadStory(){
			var storyTpl = {},
				summaryTpl = {};
			$.get(_tplUrl,function(data){
				if(!data){
					return false
				}
				var t = $(data);
				storyTpl = t.filter("#stories").find("section");
				summaryTpl = t.filter("#summary");
				templateToJson(storyTpl);

				//载入游戏逻辑modal
				_logicModal.init();
			});
		}

		var templateToJson = function(storiesBlock){
			//template to object
			$.each(storiesBlock,function(i,v){
				var st = {};
				var act = [];//actions
				var d = $(v);
				st.id = d.attr("id");
				st.img = d.find("img")? d.find("img").attr("data-img"): null;
				var _textLines = d.find('[data-txt=story]').find("p");
				st.txt = {};
				$.each(_textLines,function(i,v){
					var a = $(v).text();
					st.txt[i] = $.trim(a);
				});
				if (d.find("button")){
					$.each(d.find("button"),function(i,v){
						var btn = {};
						var adom = $(v); //action dom
						btn.from = st.id;
						btn.to = adom.attr("data-to");
						btn.score = adom.attr("data-score");
						btn.txt = adom.text();
						act.push(btn);
					})
				}
				st.actions = act;
				storyObject[i] = st;
			});

			//模板装载页面
			var html = '';
			$.each(storyObject,function(i,v){
				html += randerPage(v);
			});
			$(".pagestart").after(html);
		};

		me.init = function() {
			ajaxLoadStory();
		};
		me.setTemplate = function(tplUrl){
			_tplUrl = tplUrl;
		};
		me.setLogicModal = function(logicModal){
			_logicModal = logicModal;
		};
		return me
	}());

	//游戏逻辑
    var zhGameLogic = (function(option){
	    var _opt = {
		    "page":".page",
		    "badgeUrl":'./src/img/badge/'
	    };
	    if (option){
		    _opt = option
	    }
        var me = {};
        var totalScore = 0;
	    var _userName = "嗨客";
	    var _userScore = 0;
	    var _userDes = "";
	    var _userBadge = "";

	    var _lastUserName = null;
	    var _lastUserDes = null;

	    //绑定设定用户得分方法
	    var setUserScore = function(score){
		    _userScore = score;
	    };
	    //绑定,设定用户名方法
	    var setUserName = function(usr){
		    _userName = usr;
	    };
	    var setUserDes = function(des){
		    _userDes = des;
	    };
	    var setUserBadge = function(badge){
		    _userBadge = badge;
	    };
	    me.userName = function(){
		    return _userName;
	    };
	    me.userScore = function(){
		    return _userScore;
	    };
	    me.userDes = function(){
		    return _userDes;
	    };
	    me.userBadge = function(){
		    return _userBadge;
	    };
	    //设定上个用户名
	    me.setLastUserName = function(lusername){
		    _lastUserName = lusername;
	    };
	    //设定上个用户分数
	    me.setLastUserScore = function(luserDes){
		    _lastUserDes = luserDes;
	    };

	    //展示上个玩家页面
	    me.showLastUserResult = function(lastUser,lastDes,lastImg){
		    var $lastuserpage = $(".pagelastuser");
		    var $splashpage =  $(".pagesplash");
		    if (!lastUser || !lastDes) {
			    $splashpage.fadeIn(1000);
			    return false;
		    }
		    lastUser=decodeURIComponent(lastUser);
		    lastDes=decodeURIComponent(lastDes);
		    lastImg=_opt.badgeUrl + decodeURIComponent(lastImg);
		    var $stamp = $("#lastuserbadge");
		    TweenMax.set($stamp,{alpha:0});
		    $stamp.attr('src',lastImg);
		    $("#lastusername").html(lastUser);
		    $("#lastuserdes").html("获得: "+lastDes);
		    $lastuserpage.fadeIn(500,function(){
			    TweenMax.fromTo($stamp,2,{alpha:1,scale:3,rotationY:360},{alpha:1,scale:1,rotationY:0,ease:Elastic.easeOut});
		    });
	    };

		//字嗨splash页面逻辑
	    var showSplash = function(){
		    $(".pagesplash").click(function(e){
			    var tl = new TimelineMax();
			    tl.fromTo($(this),0.5,{alpha:1},{alpha:0,display:'none'})
				    .fromTo($(".pagestart"),1,{alpha:0},{alpha:1,display:'block'});
		    });
	    };

	    //游戏开始页面逻辑
	    var startGame = function(){
		    $(".zh-btnstart").click(function(){
			    var $page1 = $(".page1");
			    var $pageStart = $(".pagestart");
			    var tl = new TimelineMax();
			    tl.fromTo($pageStart,0,{},{display:'none'})
			        .fromTo($page1,1,{alpha:0,scale:2},{alpha:1,scale:1,ease:Strong.easeOut,display:'block'});
		    });
	    };

        //剧情页面切换动作调用
        var bind_jumpAction = function(){
            $(".container").on({
                click:function(e){
                    var t = $(this);
                    var np = $(".page"+ t.attr('data-to')); //next page
                    var cp = $('.page'+ t.attr('data-from')); //current page
                    var score = t.attr('data-score');
                        score = score ? parseInt(score) : 0;
                    if(cp.selector==np.selector){
                        return;
                    }
                    totalScore += score;
	                setUserScore(totalScore); //设定用户得分
                    if (t.attr('data-to') == "end"){
                        var summaryText = getSummary(totalScore);
	                    setSummary(summaryText);
                    }
	                var tl = new TimelineMax();
	                tl.fromTo(cp,0,{alpha:1},{alpha:0,ease:Strong.easeOut,display:'none'})
	                    .fromTo(np,1,{alpha:0,scale:1.5},{alpha:1,scale:1,ease:Strong.easeOut,display:'block'});
                }
            },".zh-sbtn");
        };

        //计算总结页和展示
        var getSummary = function(score){
            var des = null;
            var me = {};
            $.each(zhConfig.summaryText.scoreSummary,function(i,v){
                des = (score>= v.from && score<= v.to) ? v.text : null;
                if (des){
	                me.name = _userName;
                    me.text = v.text;
                    me.img = v.stamp;
	                me.score = score;
                    return false;
                }
            });
            return me;
        };

	    //设定结局页面
	    var setSummary = function(s){
		    $('.zh-totalscore').html(s.score);
		    $('.zh-summarytext').html('<span style="font-weight: bolder" ">'+s.name+'</span>' +':'+ s.text);
		    $('.zh-stamp').attr("src","./src/img/badge/"+s.img);
		    setUserDes(s.text);
		    setUserBadge(s.img);
	    };

	    //显示跳转按钮
	    var binding_showAction = function(){
		    $(document).on({
			    click:function(e){
				    var ob = $(this).parent().siblings(".zh-btnblock");
				    var _btn = ob.find(".zh-sbtn");
				    var tl = new TimelineMax();
				    var tl1 = new TimelineMax();
				    $(this).hide();
				    ob.show();
				    tl.fromTo(ob,0.5,{alpha:0,y:400},{alpha:1,y:0},-0.5);
				    tl1.staggerFromTo(_btn,1.5,{alpha:0,rotationX:360,y:-100},{alpha:1,rotationX:0,y:0,ease:Back.easeOut},0.2);
			    }
		    },'.zh-showoptbtn');
	    };

	    var binding_getUserName = function(){
		    var $nameTxt = $("#zh-name");
		    var _u = "";
		    $nameTxt.focus(function(){
			    $(this).val('');
		    });
		    $nameTxt.focusout(function(){
			    _u = $.trim($(this).val().length) > 0 ? $.trim($(this).val()) : "嗨客" ;
			    $(this).val(_u);
			    setUserName(_u);
		    });
	    };

	    me.goPage = function(pageIndex,animation){
		    var $pages = $(_opt.page);
		    var $goPage = $(_opt.page+pageIndex);
		    $pages.hide();
		    $goPage.show();
	    };

        //重玩
        me.restart = function(){
            totalScore = 0;
	        setUserScore(-1000);
            $(".page").hide();
	        $(".pagesplash").fadeIn(500);
	        $(".zh-showoptbtn").show();
	        $(".zh-btnblock").hide();
        };

        //初始化
        me.init = function(){
	        startGame();
	        showSplash();
	        bind_jumpAction();
	        binding_getUserName();
	        binding_showAction();
        };
        return me;
    }());

    $(document).ready(function(){
	    var sig = "http://dwx.wordhi.com/ticket?url="+ encodeURIComponent(window.location.href.split('#')[0]);
	    $.getJSON(sig,function(data){
		    wx.config({
			    debug: true,
			    appId: data.appID,
			    timestamp: data.timestamp,
			    nonceStr: data.nonceStr,
			    signature: data.signature,
			    jsApiList: [
				    'checkJsApi',
				    'onMenuShareTimeline',
				    'onMenuShareAppMessage',
				    'onMenuShareQQ',
				    'onMenuShareWeibo'
			    ]
		    });
	    });
	    wx.ready(function() {
		    var shareTitle = "拐卖小朋友";
		    var shareDesc = '你要逃离深山，看你啦';
		    var shareLink = 'http://wxdev.wordhi.com';
		    var shareImgUrl ='http://wxdev.wordhi.com/src/img/badge/';
		    var shareImg = 'http://wxdev.wordhi.com/src/img/badge/stamp_3.png';
            wx.checkJsApi({
                jsApiList: ['chooseImage'], // 需要检测的JS接口列表，所有JS接口列表见附录2,
                success: function(res) {
                    // 以键值对的形式返回，可用的api值true，不可用为false
                    // 如：{"checkResult":{"chooseImage":true},"errMsg":"checkJsApi:ok"}
                }
            });

		    // 分享给朋友事件绑定
		    wx.onMenuShareAppMessage({
			    title: zhGameLogic.userName(),
			    desc: zhGameLogic.userName(),
			    link: shareLink,
			    imgUrl: shareImg,
			    success:function(res){
			    },
			    trigger:function(){
				    this.title = zhGameLogic.userName();
				    this.imgUrl = shareImgUrl + zhGameLogic.userBadge();
				    this.desc = zhGameLogic.userDes();
				    alert(zhGameLogic.userName());
				    this.link = shareLink+'?name='+zhGameLogic.userName()+'&des='+zhGameLogic.userDes()+'$img='+zhGameLogic.userBadge();
			    }
		    });

		    // 分享到朋友圈
		    wx.onMenuShareTimeline({
			    title: shareTitle,
			    link: shareLink,
			    imgUrl: shareImg,
			    trigger:function(res){
				    this.title = zhGameLogic.userName();
				    this.imgUrl = shareImgUrl + zhGameLogic.userBadge();
				    alert(zhGameLogic.userName());
				    this.link = shareLink+'?name='+zhGameLogic.userName()+'&des='+zhGameLogic.userDes()+'$img='+zhGameLogic.userBadge();
			    }
		    });

		    // 分享到QQ
		    wx.onMenuShareQQ({
			    title: shareTitle,
			    desc: shareDesc,
			    link: shareLink,
			    imgUrl: shareImg
		    });

		    // 分享到微博
		    wx.onMenuShareWeibo({
			    title: shareTitle,
			    desc: shareDesc,
			    link: shareLink,
			    imgUrl: shareImg
		    });
	    });
    });

	window.onload = function(){
		zhLoadStory.setLogicModal(zhGameLogic);
		zhLoadStory.setTemplate(zhConfig.storyTpl);
		zhLoadStory.init();
		alert(lastImg);
		zhGameLogic.showLastUserResult(lastUser,lastDes,lastImg);
		$(".zh-restartbtn").click(function(e){
			zhGameLogic.restart();
		});
		$(".zh-btnwant").click(function(e){
			zhGameLogic.restart();
		})
	};
</script>
</body>
</html>