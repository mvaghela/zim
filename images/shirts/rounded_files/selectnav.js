window.selectnav=function(){return function(q,r){var a,h=function(b){var c;b||(b=window.event);b.target?c=b.target:b.srcElement&&(c=b.srcElement);3===c.nodeType&&(c=c.parentNode);c.value&&(window.location.href=c.value)},k=function(b){b=b.nodeName.toLowerCase();return"ul"===b||"ol"===b},l=function(b){for(var c=1;document.getElementById("selectnav"+c);c++);return b?"selectnav"+c:"selectnav"+(c-1)},n=function(b){g++;var c=b.children.length,a="",d="",f=g-1;if(c){if(f){for(;f--;)d+=s;d+=" "}for(f=0;f<
c;f++){var e=b.children[f].children[0];if("undefined"!==typeof e){var h=e.innerText||e.textContent,i="";j&&(i=-1!==e.className.search(j)||-1!==e.parentElement.className.search(j)?m:"");t&&!i&&(i=e.href===document.URL?m:"");"nonav"!=b.children[f].getAttribute("rel")&&(a+='<option value="'+e.href+'" '+i+">"+d+h+"</option>",u&&(e=b.children[f].children[1])&&k(e)&&(a+=n(e)))}}1===g&&p&&(a='<option value="">'+p+"</option>"+a);1===g&&(a='<select class="selectnav" id="'+l(!0)+'">'+a+"</select>");g--;return a}};
if((a=document.getElementById(q))&&k(a)){document.documentElement.className+=" js";var d=r||{},j=d.activeclass||"active",t="boolean"===typeof d.autoselect?d.autoselect:!0,u="boolean"===typeof d.nested?d.nested:!0,s=d.indent||"\u2192",p=d.label||"- Navigation -",g=0,m=" selected ";a.insertAdjacentHTML("afterend",n(a));a=document.getElementById(l());a.addEventListener&&a.addEventListener("change",h);a.attachEvent&&a.attachEvent("onchange",h)}}}();