!function(r){var t={};function o(e){if(t[e])return t[e].exports;var n=t[e]={i:e,l:!1,exports:{}};return r[e].call(n.exports,n,n.exports,o),n.l=!0,n.exports}o.m=r,o.c=t,o.d=function(e,n,r){o.o(e,n)||Object.defineProperty(e,n,{enumerable:!0,get:r})},o.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},o.t=function(n,e){if(1&e&&(n=o(n)),8&e)return n;if(4&e&&"object"==typeof n&&n&&n.__esModule)return n;var r=Object.create(null);if(o.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:n}),2&e&&"string"!=typeof n)for(var t in n)o.d(r,t,function(e){return n[e]}.bind(null,t));return r},o.n=function(e){var n=e&&e.__esModule?function(){return e.default}:function(){return e};return o.d(n,"a",n),n},o.o=function(e,n){return Object.prototype.hasOwnProperty.call(e,n)},o.p="",o(o.s="./src/js/head.js")}({"./.modernizrrc":
/*!**********************!*\
  !*** ./.modernizrrc ***!
  \**********************/
/*! no static exports found */function(module,exports){eval(';(function(window){\nvar hadGlobal = \'Modernizr\' in window;\nvar oldGlobal = window.Modernizr;\n/*! modernizr 3.6.0 (Custom Build) | MIT *\n * https://modernizr.com/download/?-flexbox-forcetouch-promises-setclasses !*/\n!function(e,n,t){function r(e,n){return typeof e===n}function o(){var e,n,t,o,i,s,a;for(var l in C)if(C.hasOwnProperty(l)){if(e=[],n=C[l],n.name&&(e.push(n.name.toLowerCase()),n.options&&n.options.aliases&&n.options.aliases.length))for(t=0;t<n.options.aliases.length;t++)e.push(n.options.aliases[t].toLowerCase());for(o=r(n.fn,"function")?n.fn():n.fn,i=0;i<e.length;i++)s=e[i],a=s.split("."),1===a.length?Modernizr[a[0]]=o:(!Modernizr[a[0]]||Modernizr[a[0]]instanceof Boolean||(Modernizr[a[0]]=new Boolean(Modernizr[a[0]])),Modernizr[a[0]][a[1]]=o),x.push((o?"":"no-")+a.join("-"))}}function i(e){var n=S.className,t=Modernizr._config.classPrefix||"";if(w&&(n=n.baseVal),Modernizr._config.enableJSClass){var r=new RegExp("(^|\\\\s)"+t+"no-js(\\\\s|$)");n=n.replace(r,"$1"+t+"js$2")}Modernizr._config.enableClasses&&(n+=" "+t+e.join(" "+t),w?S.className.baseVal=n:S.className=n)}function s(){return"function"!=typeof n.createElement?n.createElement(arguments[0]):w?n.createElementNS.call(n,"http://www.w3.org/2000/svg",arguments[0]):n.createElement.apply(n,arguments)}function a(e,n){return!!~(""+e).indexOf(n)}function l(){var e=n.body;return e||(e=s(w?"svg":"body"),e.fake=!0),e}function u(e,t,r,o){var i,a,u,f,c="modernizr",p=s("div"),d=l();if(parseInt(r,10))for(;r--;)u=s("div"),u.id=o?o[r]:c+(r+1),p.appendChild(u);return i=s("style"),i.type="text/css",i.id="s"+c,(d.fake?d:p).appendChild(i),d.appendChild(p),i.styleSheet?i.styleSheet.cssText=e:i.appendChild(n.createTextNode(e)),p.id=c,d.fake&&(d.style.background="",d.style.overflow="hidden",f=S.style.overflow,S.style.overflow="hidden",S.appendChild(d)),a=t(p,e),d.fake?(d.parentNode.removeChild(d),S.style.overflow=f,S.offsetHeight):p.parentNode.removeChild(p),!!a}function f(e){return e.replace(/([A-Z])/g,function(e,n){return"-"+n.toLowerCase()}).replace(/^ms-/,"-ms-")}function c(n,t,r){var o;if("getComputedStyle"in e){o=getComputedStyle.call(e,n,t);var i=e.console;if(null!==o)r&&(o=o.getPropertyValue(r));else if(i){var s=i.error?"error":"log";i[s].call(i,"getComputedStyle returning null, its possible modernizr test results are inaccurate")}}else o=!t&&n.currentStyle&&n.currentStyle[r];return o}function p(n,r){var o=n.length;if("CSS"in e&&"supports"in e.CSS){for(;o--;)if(e.CSS.supports(f(n[o]),r))return!0;return!1}if("CSSSupportsRule"in e){for(var i=[];o--;)i.push("("+f(n[o])+":"+r+")");return i=i.join(" or "),u("@supports ("+i+") { #modernizr { position: absolute; } }",function(e){return"absolute"==c(e,null,"position")})}return t}function d(e){return e.replace(/([a-z])-([a-z])/g,function(e,n,t){return n+t.toUpperCase()}).replace(/^-/,"")}function m(e,n,o,i){function l(){f&&(delete O.style,delete O.modElem)}if(i=r(i,"undefined")?!1:i,!r(o,"undefined")){var u=p(e,o);if(!r(u,"undefined"))return u}for(var f,c,m,v,y,g=["modernizr","tspan","samp"];!O.style&&g.length;)f=!0,O.modElem=s(g.shift()),O.style=O.modElem.style;for(m=e.length,c=0;m>c;c++)if(v=e[c],y=O.style[v],a(v,"-")&&(v=d(v)),O.style[v]!==t){if(i||r(o,"undefined"))return l(),"pfx"==n?v:!0;try{O.style[v]=o}catch(h){}if(O.style[v]!=y)return l(),"pfx"==n?v:!0}return l(),!1}function v(e,n){return function(){return e.apply(n,arguments)}}function y(e,n,t){var o;for(var i in e)if(e[i]in n)return t===!1?e[i]:(o=n[e[i]],r(o,"function")?v(o,t||n):o);return!1}function g(e,n,t,o,i){var s=e.charAt(0).toUpperCase()+e.slice(1),a=(e+" "+P.join(s+" ")+s).split(" ");return r(n,"string")||r(n,"undefined")?m(a,n,o,i):(a=(e+" "+A.join(s+" ")+s).split(" "),y(a,n,t))}function h(e,n,r){return g(e,t,t,n,r)}var C=[],_={_version:"3.6.0",_config:{classPrefix:"",enableClasses:!0,enableJSClass:!0,usePrefixes:!0},_q:[],on:function(e,n){var t=this;setTimeout(function(){n(t[e])},0)},addTest:function(e,n,t){C.push({name:e,fn:n,options:t})},addAsyncTest:function(e){C.push({name:null,fn:e})}},Modernizr=function(){};Modernizr.prototype=_,Modernizr=new Modernizr;var x=[],S=n.documentElement,w="svg"===S.nodeName.toLowerCase();Modernizr.addTest("promises",function(){return"Promise"in e&&"resolve"in e.Promise&&"reject"in e.Promise&&"all"in e.Promise&&"race"in e.Promise&&function(){var n;return new e.Promise(function(e){n=e}),"function"==typeof n}()});var E=function(){function e(e,n){var o;return e?(n&&"string"!=typeof n||(n=s(n||"div")),e="on"+e,o=e in n,!o&&r&&(n.setAttribute||(n=s("div")),n.setAttribute(e,""),o="function"==typeof n[e],n[e]!==t&&(n[e]=t),n.removeAttribute(e)),o):!1}var r=!("onblur"in n.documentElement);return e}();_.hasEvent=E;var b="Moz O ms Webkit",P=_._config.usePrefixes?b.split(" "):[];_._cssomPrefixes=P;var T={elem:s("modernizr")};Modernizr._q.push(function(){delete T.elem});var O={style:T.elem.style};Modernizr._q.unshift(function(){delete O.style});var A=_._config.usePrefixes?b.toLowerCase().split(" "):[];_._domPrefixes=A,_.testAllProps=g;var N=function(n){var r,o=prefixes.length,i=e.CSSRule;if("undefined"==typeof i)return t;if(!n)return!1;if(n=n.replace(/^@/,""),r=n.replace(/-/g,"_").toUpperCase()+"_RULE",r in i)return"@"+n;for(var s=0;o>s;s++){var a=prefixes[s],l=a.toUpperCase()+"_"+r;if(l in i)return"@-"+a.toLowerCase()+"-"+n}return!1};_.atRule=N;var z=_.prefixed=function(e,n,t){return 0===e.indexOf("@")?N(e):(-1!=e.indexOf("-")&&(e=d(e)),n?g(e,n,t):g(e,"pfx"))};Modernizr.addTest("forcetouch",function(){return E(z("mouseforcewillbegin",e,!1),e)?MouseEvent.WEBKIT_FORCE_AT_MOUSE_DOWN&&MouseEvent.WEBKIT_FORCE_AT_FORCE_MOUSE_DOWN:!1}),_.testAllProps=h,Modernizr.addTest("flexbox",h("flexBasis","1px",!0)),o(),i(x),delete _.addTest,delete _.addAsyncTest;for(var R=0;R<Modernizr._q.length;R++)Modernizr._q[R]();e.Modernizr=Modernizr}(window,document);\nmodule.exports = window.Modernizr;\nif (hadGlobal) { window.Modernizr = oldGlobal; }\nelse { delete window.Modernizr; }\n})(window);\n\n//# sourceURL=webpack:///./.modernizrrc?')},"./src/js/head.js":
/*!************************!*\
  !*** ./src/js/head.js ***!
  \************************/
/*! no static exports found */function(module,exports,__webpack_require__){eval("var Modernizr = __webpack_require__(/*! modernizr */ \"./.modernizrrc\");\n\nif (Modernizr.flexbox) {\n  console.log('Test to show Modernizr is working. This site has flexbox.');\n}\n\n//# sourceURL=webpack:///./src/js/head.js?")}});