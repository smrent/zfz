window.onload=function () {
    var tab_bar = document.getElementById("tab-bar");
    var tab_btns = tab_bar.children;
    var max_height=0;
    for (var i = 0; i < tab_btns.length; i++) {
        tab_btns[i].onclick = tabClick;
        var id=tab_btns[i].getAttribute("data-content");
        console.log(id);
        var content=document.getElementById(id);

        var display = content.style.display;
        var position = content.style.position;
        var opacity = content.style.opacity;
        //设置新属性
        content.style.display = "block";
        content.style.position = "absolute";
        content.style.opacity=0;
        //由于元素已经参与渲染，所以可以获取到尺寸
        console.log(content.offsetHeight);
        if(max_height<content.offsetHeight){
            max_height=content.offsetHeight;
        }
        //还原被修改的属性
        content.style.display = display;
        content.style.position = position;
        content.style.opacity = opacity;
    }
    console.log("max",max_height);

    for (i = 0; i < tab_btns.length; i++) {
        id=tab_btns[i].getAttribute("data-content");
        content=document.getElementById(id);

        content.style.height=max_height+"px";
        console.log(content.style.height);

    }


};
function tabClick() {
    var this_class = this.className;
    if (this_class !== "tab-btn active") {
        var nowActive = document.getElementsByClassName("active")[0];
        nowActive.className = "tab-btn";//  取消激活状态
        var nowActiveContentId=nowActive.getAttribute("data-content");//隐藏当前内容
        var nowActiveContent=document.getElementById(nowActiveContentId);
        nowActiveContent.style.display="none";

        this.className = "tab-btn active";//设置当前选项为激活状态
        var showId = this.getAttribute("data-content"); //显示当前内容
        var showContent = document.getElementById(showId);
        showContent.style.display="inline-block";



    }
    return false;
}