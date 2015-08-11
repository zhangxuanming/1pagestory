/**
 * Created by muyuruhai on 9/08/15.
 */

zhConfig = (function(){
    var me = {};
    //模板文件
    me.storyTpl = "src/story/yure1.html";
    //总结页设定
    me.summaryText = {
        "des":"根据您的战斗表现，我们觉得您的战斗力为:",
        "scoreSummary" : {
            "perfect":{"from":22,"to":22,"text":"你是警察吧","stamp":"stamp_1.png"},
            "good":{"from":15,"to":21,"text":"不错啊，战斗力很好","stamp":"stamp_3.png"},
            "normal":{"from":10,"to":14,"text":"多多练习，不然就被卖了","stamp":"stamp_3.png"},
            "bad":{"from":1,"to":9,"text":"马上就要被拐走了","stamp":"stamp_2.png"},
            "terrible":{"from":-100,"to":0,"text":"你在山里还能上网么。。","stamp":"stamp_2.png"}
        }
    };
    return me;
}());