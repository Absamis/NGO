var toggler=document.getElementById("navToggler");
var nav=document.getElementById("navToggle");
toggler.onclick=function(){
  if(nav.style.display=="block")
    nav.style.display="none";
  else
    nav.style.display="block";
}
// <script type="text/javascript">
var headss = document.querySelectorAll(".min");
for(var i = 0; i < headss.length; i++){
  if(headss[i].innerText.length > 33){
    headss[i].innerText = headss[i].innerText.substring(0, 33) + "...";
  }
}
var descr = document.querySelectorAll(".descr");
for(var i = 0; i < descr.length; i++){
  if(descr[i].innerText.length > 90){
    descr[i].innerText = descr[i].innerText.substring(0, 90) + "...";
  }
}
var heads = document.querySelectorAll(".content-head");
for(var i = 0; i < heads.length; i++){
  if(heads[i].innerText.length > 60){
    heads[i].innerText = heads[i].innerText.substring(0, 60) + "...";
  }
}