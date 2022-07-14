            var toggler=document.getElementById("navToggler");
            var nav=document.getElementById("navToggle");
            toggler.onclick=function(){
                if(nav.style.display=="block")
                    nav.style.display="none";
                else
                    nav.style.display="block";
            }