!function(r){var n={};function u(e){if(n[e])return n[e].exports;var t=n[e]={i:e,l:!1,exports:{}};return r[e].call(t.exports,t,t.exports,u),t.l=!0,t.exports}u.m=r,u.c=n,u.d=function(e,t,r){u.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:r})},u.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},u.t=function(t,e){if(1&e&&(t=u(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var r=Object.create(null);if(u.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var n in t)u.d(r,n,function(e){return t[e]}.bind(null,n));return r},u.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return u.d(t,"a",t),t},u.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},u.p="",u(u.s=4)}([function(e,t,r){"use strict";function n(e){return(n="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}Object.defineProperty(t,"__esModule",{value:!0}),t.default=function(e){if(!("string"==typeof e||e instanceof String)){var t;throw t=null===e?"null":"object"===(t=n(e))&&e.constructor&&e.constructor.hasOwnProperty("name")?e.constructor.name:"a ".concat(t),new TypeError("Expected string but received ".concat(t,"."))}},e.exports=t.default,e.exports.default=t.default},,function(e,t,r){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default=function(){var e=0<arguments.length&&void 0!==arguments[0]?arguments[0]:{},t=1<arguments.length?arguments[1]:void 0;for(var r in t)void 0===e[r]&&(e[r]=t[r]);return e},e.exports=t.default,e.exports.default=t.default},function(e,t,r){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default=function(e,t){if((0,m.default)(e),(t=(0,v.default)(t,g)).require_display_name||t.allow_display_name){var r=e.match(y);if(r)e=r[1];else if(t.require_display_name)return!1}var n=e.split("@"),u=n.pop(),i=n.join("@"),l=u.toLowerCase();if(t.domain_specific_validation&&("gmail.com"===l||"googlemail.com"===l)){var o=(i=i.toLowerCase()).split("+")[0];if(!(0,x.default)(o.replace(".",""),{min:6,max:30}))return!1;for(var a=o.split("."),f=0;f<a.length;f++)if(!h.test(a[f]))return!1}if(!(0,x.default)(i,{max:64})||!(0,x.default)(u,{max:254}))return!1;if(!(0,_.default)(u,{require_tld:t.require_tld})){if(!t.allow_ip_domain)return!1;if(!(0,b.default)(u)){if(!u.startsWith("[")||!u.endsWith("]"))return!1;var s=u.substr(1,u.length-2);if(0===s.length||!(0,b.default)(s))return!1}}if('"'===i[0])return i=i.slice(1,i.length-1),t.allow_utf8_local_part?w.test(i):S.test(i);for(var d=t.allow_utf8_local_part?E:F,c=i.split("."),p=0;p<c.length;p++)if(!d.test(c[p]))return!1;return!0};var m=n(r(0)),v=n(r(2)),x=n(r(6)),_=n(r(7)),b=n(r(8));function n(e){return e&&e.__esModule?e:{default:e}}var g={allow_display_name:!1,require_display_name:!1,allow_utf8_local_part:!0,require_tld:!0},y=/^[a-z\d!#\$%&'\*\+\-\/=\?\^_`{\|}~\.\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+[a-z\d!#\$%&'\*\+\-\/=\?\^_`{\|}~\,\.\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF\s]*<(.+)>$/i,F=/^[a-z\d!#\$%&'\*\+\-\/=\?\^_`{\|}~]+$/i,h=/^[a-z\d]+$/,S=/^([\s\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e]|(\\[\x01-\x09\x0b\x0c\x0d-\x7f]))*$/i,E=/^[a-z\d!#\$%&'\*\+\-\/=\?\^_`{\|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+$/i,w=/^([\s\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|(\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*$/i;e.exports=t.default,e.exports.default=t.default},function(e,t,r){"use strict";var n=r(5);document.querySelector("#companyForm").addEventListener("submit",function(e){e.preventDefault(),n.default.testFormEmails(e)})},function(e,t,r){"use strict";r.r(t);var n=r(3),u=r.n(n),i=function(e,t){if(u()(e)){return!new RegExp("@("+["gmail","yahoo","aol"].join("|")+")\\W.").test(e)||(o("bad-domain",t),!1)}return o("invalid",t),!1},l=function e(t){var r=t.target;i(r.value,r)&&(r.classList.remove("invalid"),r.nextSibling.classList.contains("error-message")&&r.nextSibling.remove(),r.previousElementSibling&&"LABEL"===r.previousElementSibling.nodeName&&r.previousElementSibling.classList.remove("invalid"),r.removeEventListener("keyup",e))},o=function(e,t){var r,n=document.createElement("span");switch(n.classList.add("error-message"),e){case"bad-domain":r="Please use a business email.";break;case"invalid":r="Enter a valid email address.";break;default:r="Unknown error."}t.nextElementSibling.classList.contains("error-message")?t.nextElementSibling.innerText=r:(n.innerText=r,t.parentNode.insertBefore(n,t.nextSibling))};t.default={isValidEmail:i,testFormEmails:function(e){e.target.querySelectorAll('[type="email"]').forEach(function(e){i(e.value,e)||(e.classList.add("invalid"),e.addEventListener("keyup",l),e.previousElementSibling&&"LABEL"===e.previousElementSibling.nodeName&&e.previousElementSibling.classList.add("invalid"))})}}},function(e,t,r){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default=function(e,t){var r,n;(0,i.default)(e),n="object"===l(t)?(r=t.min||0,t.max):(r=t,arguments[2]);var u=encodeURI(e).split(/%..|./).length-1;return r<=u&&(void 0===n||u<=n)};var n,i=(n=r(0))&&n.__esModule?n:{default:n};function l(e){return(l="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}e.exports=t.default,e.exports.default=t.default},function(e,t,r){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default=function(e,t){(0,o.default)(e),(t=(0,a.default)(t,f)).allow_trailing_dot&&"."===e[e.length-1]&&(e=e.substring(0,e.length-1));for(var r=e.split("."),n=0;n<r.length;n++)if(63<r[n].length)return!1;if(t.require_tld){var u=r.pop();if(!r.length||!/^([a-z\u00a1-\uffff]{2,}|xn[a-z0-9-]{2,})$/i.test(u))return!1;if(/[\s\u2002-\u200B\u202F\u205F\u3000\uFEFF\uDB40\uDC20]/.test(u))return!1}for(var i,l=0;l<r.length;l++){if(i=r[l],t.allow_underscores&&(i=i.replace(/_/g,"")),!/^[a-z\u00a1-\uffff0-9-]+$/i.test(i))return!1;if(/[\uff01-\uff5e]/.test(i))return!1;if("-"===i[0]||"-"===i[i.length-1])return!1}return!0};var o=n(r(0)),a=n(r(2));function n(e){return e&&e.__esModule?e:{default:e}}var f={require_tld:!0,allow_underscores:!1,allow_trailing_dot:!1};e.exports=t.default,e.exports.default=t.default},function(e,t,r){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default=function e(t){var r=1<arguments.length&&void 0!==arguments[1]?arguments[1]:"";(0,f.default)(t);r=String(r);{if(!r)return e(t,4)||e(t,6);if("4"===r){if(!s.test(t))return!1;var n=t.split(".").sort(function(e,t){return e-t});return n[3]<=255}if("6"===r){var u=t.split(":"),i=!1,l=e(u[u.length-1],4),o=l?7:8;if(u.length>o)return!1;if("::"===t)return!0;"::"===t.substr(0,2)?(u.shift(),u.shift(),i=!0):"::"===t.substr(t.length-2)&&(u.pop(),u.pop(),i=!0);for(var a=0;a<u.length;++a)if(""===u[a]&&0<a&&a<u.length-1){if(i)return!1;i=!0}else if(l&&a===u.length-1);else if(!d.test(u[a]))return!1;return i?1<=u.length:u.length===o}}return!1};var n,f=(n=r(0))&&n.__esModule?n:{default:n};var s=/^(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})$/,d=/^[0-9A-F]{1,4}$/i;e.exports=t.default,e.exports.default=t.default}]);