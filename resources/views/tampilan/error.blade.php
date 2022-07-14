<!doctype html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>404 Not Found</title>
        <meta name="description" content="Saleh Riaz - UI/UX Engineer. Designer. Computer Scientist">
        <meta name="keywords" content="ui engineer, ux, saleh, riaz, qureshi, website, softwares, salehriaz, salehriazq, computer scientist, design, visual design, saleh riaz qureshi"/>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./assets/css/main.css">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    </head>
      <header class="top-header">
    </header>
    <body class="bg-purple" oncontextmenu="return false" onmousedown="return false;">
        <div class="stars">
            <div class="central-body">
                <img class="image-404" src="./assets/img/theme/404.svg" width="300px">
                <a href="/index" class="btn-go-home">GO BACK HOME</a>
            </div>
            <div class="objects">
                <img class="object_rocket" src="./assets/img/theme/rocket.svg" width="100px">
                <div class="earth-moon">
                    <img class="object_earth" src="./assets/img/theme/earth.svg" width="100px">
                    <img class="object_moon" src="./assets/img/theme/moon.svg" width="80px">
                </div>
                <div class="box_astronaut">
                    <img class="object_astronaut" src="./assets/img/theme/astronaut.svg" width="140px">
                </div>
            </div>
            <div class="glowing_stars">
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>
            </div>
            <div>
              <div class="starsec"></div>
              <div class="starthird"></div>
              <div class="starfourth"></div>
              <div class="starfifth"></div>
            </div>
        </div>
        <script type='text/javascript'>
          shortcut={all_shortcuts:{},add:function(a,b,c){var d={type:"keydown",propagate:!1,disable_in_input:!1,target:document,keycode:!1};
          if(c)for(var e in d)"undefined"==typeof c[e]&&(c[e]=d[e]);
          else c=d;d=c.target,"string"==typeof c.target&&(d=document.getElementById(c.target)),a=a.toLowerCase(),e=function(d){d=d||window.event;
          if(c.disable_in_input){var e;d.target?e=d.target:d.srcElement&&(e=d.srcElement),3==e.nodeType&&(e=e.parentNode);
          if("INPUT"==e.tagName||"TEXTAREA"==e.tagName)return}d.keyCode?code=d.keyCode:d.which&&(code=d.which),e=String.fromCharCode(code).toLowerCase(),188==code&&(e=","),190==code&&(e=".");
          var f=a.split("+"),g=0,h={"`":"~",1:"!",2:"@",3:"#",4:"$",5:"%",6:"^",7:"&",8:"*",9:"(",0:")","-":"_","=":"+",";":":","'":'"',",":"<",".":">","/":"?","\\":"|"},
          i={esc:27,escape:27,tab:9,space:32,"return":13,enter:13,backspace:8,scrolllock:145,scroll_lock:145,scroll:145,capslock:20,caps_lock:20,caps:20,numlock:144,num_lock:144,num:144,pause:19,
          "break":19,insert:45,home:36,"delete":46,end:35,pageup:33,page_up:33,pu:33,pagedown:34,page_down:34,pd:34,left:37,up:38,right:39,down:40,f1:112,f2:113,f3:114,f4:115,f5:116,f6:117,f7:118,
          f8:119,f9:120,f10:121,f11:122,f12:123},j=!1,l=!1,m=!1,n=!1,o=!1,p=!1,q=!1,r=!1;d.ctrlKey&&(n=!0),d.shiftKey&&(l=!0),d.altKey&&(p=!0),d.metaKey&&(r=!0);
          for(var s=0;k=f[s],s<f.length;s++)"ctrl"==k||"control"==k?(g++,m=!0):"shift"==k?(g++,j=!0):"alt"==k?(g++,o=!0):"meta"==k?(g++,q=!0):1<k.length?i[k]==code&&g++:
          c.keycode?c.keycode==code&&g++:e==k?g++:h[e]&&d.shiftKey&&(e=h[e],e==k&&g++);if(g==f.length&&n==m&&l==j&&p==o&&r==q&&(b(d),!c.propagate))
          return d.cancelBubble=!0,d.returnValue=!1,d.stopPropagation&&(d.stopPropagation(),d.preventDefault()),!1},
          this.all_shortcuts[a]={callback:e,target:d,event:c.type},d.addEventListener?d.addEventListener(c.type,e,!1):d.attachEvent?d.attachEvent("on"+c.type,e):d["on"+c.type]=e},remove:
          function(a){var a=a.toLowerCase(),b=this.all_shortcuts[a];delete this.all_shortcuts[a];if(b){var a=b.event,c=b.target,b=b.callback;
          c.detachEvent?c.detachEvent("on"+a,b):c.removeEventListener?c.removeEventListener(a,b,!1):c["on"+a]=!1}}},shortcut.add("Ctrl+U",function(){top.location.href="./error"}),shortcut.add("Ctrl+Shift+i",function(){top.location.href="./error"});
      </script>

    </body>
</html>
