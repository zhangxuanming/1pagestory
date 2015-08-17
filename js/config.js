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
            "perfect":{"from":501,"to":5000,"text":"主角光环护体","stamp":"stamp_1.png"},
            "good":{"from":201,"to":500,"text":"反拐小英雄","stamp":"stamp_3.png"},
            "normal":{"from":1,"to":200,"text":"别被拐了，会很惨的","stamp":"stamp_3.png"},
            "bad":{"from":0,"to":0,"text":"千秋一场睡佛梦","stamp":"stamp_2.png"},
            "terrible":{"from":-500,"to":-1,"text":"邪魔外道，文明之耻。","stamp":"stamp_2.png"},
            "else":{"from":-5000,"to":-501,"text":"杀生为护生，邪道红莲！","stamp":"stamp_2.png"}
        }
    };
    return me;
}());