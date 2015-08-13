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
        <div class="row page page${id} full hidden zh-blue">
            <div class="col-md-12 full" style="position: relative;">
                <br>
                <div class="row">
                    <div class="col-sm-12">
                        <img src="src/img/${img}" class="img-responsive center-block" alt="Responsive image" >
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="text-left storytext">
                            {@each txt as item,index}
                                <p>${item}</p>
                            {@/each}
                        </h4>
                    </div>
                </div>
                <div class="row zh-option">
                    <div class="col-md-12">
                        <button class="btn center-block btn-block sb"
                                style="height: 100px;position: relative;background-color: gold;border: 1px solid rgba(255,255,255,0.5)"></button>
                    </div>
                    <div class="col-sm-12 zh-btnblock" style="background-color: rgba(0,0,0,0.6);display: none;position: fixed;bottom: 0;width: 100%">
                        <br>
                        {@each actions as item,index}
                            <div data-from="${item.from}" data-to="${item.to}" data-score="${item.score}" class="btn btn-default btn-block zh-sbtn">${item.txt}</div>
                        {@/each}
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </script>
</head>

<body>
<div class="container">
    <div class="row page page0 full zh-yellow">
        <div class="col-xs-12 v-center" style="top: 20%">
            <h1 class="center-block text-center">逃离深山</h1>
        </div>
        <div class="col-xs-6 col-xs-offset-3 v-center">
            <button data-from="0" data-to="1" class="btn btn-default btn-block btn-lg zh-sbtn" style="font-weight: bold">开始嗨</button>
        </div>
    </div>

    <!--剧情会被插入这里-->

    <!--结局页-->
    <div class="row page page-1 full zh-yellow hidden">
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
                <h4 class="center-block text-center zh-score">恭喜通关啦</h4>
                <button class="btn btn-block btn-default btn-lg zh-restartbtn">重玩一次</button>
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

    window.onload = function(){
        //配置页面在config.js
        //加载页面
        zhJumpAction.init();
        zhLoadStory.init(zhConfig.storyTpl);
        $(".zh-restartbtn").click(function(e){
            zhJumpAction.restart();
        })
    };

    var zhJumpAction = (function(){
        var me = {};
        var totalScore = 0;
        //显示跳转按钮
        var showAction = function(){
            $(document).on({
                click:function(e){
                    var ob = $(this).parent().siblings(".zh-btnblock");
                    var tl = new TimelineMax();
                    $(this).hide();
                    ob.show();
                    tl.fromTo(ob,0.5,{alpha:0,y:400},{alpha:1,y:0},-0.5);
                }
            },'.sb');
        };
        //动作调用
        var jump = function(){
            $(".container").on({
                click:function(e){
                    var t = $(this);
                    var np = $(".page"+ t.attr('data-to')); //next page
                    var cp = $('.page'+ t.attr('data-from')); //current page
                    var score = t.attr('data-score');
                        score = score?parseInt(score):0;
                    if(cp.selector==np.selector){
                        return;
                    }
                    totalScore += score;
                    if (parseInt(t.attr('data-to'))<0){
                        var summaryText = getSummary(totalScore);
                        $('.zh-totalscore').html(totalScore);
                        $('.zh-summarytext').html(summaryText.text);
                        $('.zh-stamp').attr("src","./src/img/badge/"+summaryText.img);
                    }
                    cp.hide();
                    np.removeClass('hidden');
                    np.show();
                    TweenMax.fromTo(np,1,{alpha:0,x:2000},{alpha:1,x:0,ease:Strong.easeOut});
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
                    me.text = v.text;
                    me.img = v.stamp;
                    return false;
                }
            });
            return me;
        };
        //重玩
        me.restart = function(){
            totalScore = 0;
            $(".page").hide();
            $(".page0").show();
        };
        me.init = function(){
            jump();
            showAction();
        };
        return me;
    }());

    //加载剧情
    var zhLoadStory = (function(){
        var me = {};
        var sarr = [];
        var storyObject = {};
        var tpl = $('#pageTpl').html();
        function loadStory(tpl){
            $.get(tpl,function(data){
                if(!data){
                    return false
                }
                sarr = $(data).filter("section");
                $.each(sarr,function(i,v){
                    var st = {};
                    var act = [];//actions
                    var d = $(v);
                    st.id = d.attr("id");
                    st.img = d.find("img")? d.find("img").attr("data-img"): null;
                    var _text = d.find('[data-txt=story]').find("p");
                    st.txt = {};
                    $.each(_text,function(i,v){
                        st.txt[i]=($(v).text());
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
                $(".page0").after(html);
            });
        }

        function randerPage(data){
            return juicer(tpl,data);
        }

        me.init = function(tpl) {
            loadStory(tpl);
        };
        return me
    }());
</script>
</body>
</html>