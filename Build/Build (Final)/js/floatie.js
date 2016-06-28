
/***********************************************
* Link Floatie script- © Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

var floattext=new Array()
floattext[0]='- <a href="http://www.javascriptkit.com/cutpastejava.shtml">Free JavaScripts</a><br>- <a href="http://www.javascriptkit.com/javaindex.shtml">JavaScript Tutorials</a><br>- <a href="http://www.javascriptkit.com/dhtmltutors/index.shtml">DHTML/ CSS Tutorials</a><br>- <a href="http://www.javascriptkit.com/jsref/">JavaScript Reference</a><br><div align="right"><a href="javascript:hidefloatie()">Hide Box</a></div>'
floattext[1]='Some other floatie text'

var floatiewidth="250px" //default width of floatie in px
var floatieheight="185px" //default height of floatie in px. Set to "" to let floatie content dictate height.
var floatiebgcolor="lightyellow" //default bgcolor of floatie
var fadespeed=70 //speed of fade (5 or above). Smaller=faster.

var baseopacity=0
function slowhigh(which2){
imgobj=which2
browserdetect=which2.filters? "ie" : typeof which2.style.MozOpacity=="string"? "mozilla" : ""
instantset(baseopacity)
highlighting=setInterval("gradualfade(imgobj)",fadespeed)
}

function instantset(degree){
cleartimer()
if (browserdetect=="mozilla")
imgobj.style.MozOpacity=degree/100
else if (browserdetect=="ie")
imgobj.filters.alpha.opacity=degree
}

function cleartimer(){
if (window.highlighting) clearInterval(highlighting)
}

function gradualfade(cur2){
if (browserdetect=="mozilla" && cur2.style.MozOpacity<1)
cur2.style.MozOpacity=Math.min(parseFloat(cur2.style.MozOpacity)+0.1, 0.99)
else if (browserdetect=="ie" && cur2.filters.alpha.opacity<100)
cur2.filters.alpha.opacity+=10
else if (window.highlighting)
clearInterval(highlighting)
}

function ietruebody(){
return (document.compatMode && document.compatMode!="BackCompat")? document.documentElement : document.body
}

function paramexists(what){
return(typeof what!="undefined" && what!="")
}

function showfloatie(thetext, e, optbgColor, optWidth, optHeight){
var dsocx=(window.pageXOffset)? pageXOffset: ietruebody().scrollLeft;
var dsocy=(window.pageYOffset)? pageYOffset : ietruebody().scrollTop;
var floatobj=document.getElementById("dhtmlfloatie")
floatobj.style.left="-900px"
floatobj.style.display="block"
floatobj.style.backgroundColor=paramexists(optbgColor)? optbgColor : floatiebgcolor
floatobj.style.width=paramexists(optWidth)? optWidth+"px" : floatiewidth
floatobj.style.height=paramexists(optHeight)? optHeight+"px" : floatieheight!=""? floatieheight : ""
floatobj.innerHTML=thetext
var floatWidth=floatobj.offsetWidth>0? floatobj.offsetWidth : floatobj.style.width
var floatHeight=floatobj.offsetHeight>0? floatobj.offsetHeight : floatobj.style.width
var winWidth=document.all&&!window.opera? ietruebody().clientWidth : window.innerWidth-20
var winHeight=document.all&&!window.opera? ietruebody().clientHeight : window.innerHeight
e=window.event? window.event : e
floatobj.style.left=dsocx+winWidth-floatWidth-5+"px"
if (e.clientX>winWidth-floatWidth && e.clientY+20>winHeight-floatHeight)
floatobj.style.top=dsocy+5+"px"
else
floatobj.style.top=dsocy+winHeight-floatHeight-5+"px"
slowhigh(floatobj)
}

function hidefloatie(){
var floatobj=document.getElementById("dhtmlfloatie")
floatobj.style.display="none"
}
