!function(r){var n={};function o(e){if(n[e])return n[e].exports;var t=n[e]={i:e,l:!1,exports:{}};return r[e].call(t.exports,t,t.exports,o),t.l=!0,t.exports}o.m=r,o.c=n,o.d=function(e,t,r){o.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:r})},o.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},o.t=function(t,e){if(1&e&&(t=o(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var r=Object.create(null);if(o.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var n in t)o.d(r,n,function(e){return t[e]}.bind(null,n));return r},o.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return o.d(t,"a",t),t},o.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},o.p="",o(o.s=10)}([function(e,t,r){"use strict";function n(e){return(n="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}Object.defineProperty(t,"__esModule",{value:!0}),t.default=function(e){if(!("string"==typeof e||e instanceof String)){var t;throw t=null===e?"null":"object"===(t=n(e))&&e.constructor&&e.constructor.hasOwnProperty("name")?e.constructor.name:"a ".concat(t),new TypeError("Expected string but received ".concat(t,"."))}},e.exports=t.default,e.exports.default=t.default},function(e,t,r){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default=function(){var e=0<arguments.length&&void 0!==arguments[0]?arguments[0]:{},t=1<arguments.length?arguments[1]:void 0;for(var r in t)void 0===e[r]&&(e[r]=t[r]);return e},e.exports=t.default,e.exports.default=t.default},function(e,t,r){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default=function(e,t){if((0,m.default)(e),(t=(0,v.default)(t,y)).require_display_name||t.allow_display_name){var r=e.match(h);if(r)e=r[1];else if(t.require_display_name)return!1}var n=e.split("@"),o=n.pop(),i=n.join("@"),u=o.toLowerCase();if(t.domain_specific_validation&&("gmail.com"===u||"googlemail.com"===u)){var a=(i=i.toLowerCase()).split("+")[0];if(!(0,b.default)(a.replace(".",""),{min:6,max:30}))return!1;for(var l=a.split("."),s=0;s<l.length;s++)if(!F.test(l[s]))return!1}if(!(0,b.default)(i,{max:64})||!(0,b.default)(o,{max:254}))return!1;if(!(0,g.default)(o,{require_tld:t.require_tld})){if(!t.allow_ip_domain)return!1;if(!(0,x.default)(o)){if(!o.startsWith("[")||!o.endsWith("]"))return!1;var f=o.substr(1,o.length-2);if(0===f.length||!(0,x.default)(f))return!1}}if('"'===i[0])return i=i.slice(1,i.length-1),t.allow_utf8_local_part?D.test(i):k.test(i);for(var c=t.allow_utf8_local_part?S:_,d=i.split("."),p=0;p<d.length;p++)if(!c.test(d[p]))return!1;return!0};var m=n(r(0)),v=n(r(1)),b=n(r(4)),g=n(r(5)),x=n(r(6));function n(e){return e&&e.__esModule?e:{default:e}}var y={allow_display_name:!1,require_display_name:!1,allow_utf8_local_part:!0,require_tld:!0},h=/^[a-z\d!#\$%&'\*\+\-\/=\?\^_`{\|}~\.\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+[a-z\d!#\$%&'\*\+\-\/=\?\^_`{\|}~\,\.\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF\s]*<(.+)>$/i,_=/^[a-z\d!#\$%&'\*\+\-\/=\?\^_`{\|}~]+$/i,F=/^[a-z\d]+$/,k=/^([\s\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e]|(\\[\x01-\x09\x0b\x0c\x0d-\x7f]))*$/i,S=/^[a-z\d!#\$%&'\*\+\-\/=\?\^_`{\|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+$/i,D=/^([\s\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|(\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*$/i;e.exports=t.default,e.exports.default=t.default},function(e,t,r){"use strict";r.r(t);var n=r(2),o=r.n(n),i=r(7),u=0,a=function(e,t){if(o()(e)){return!new RegExp("@("+["gmail","yahoo","aol"].join("|")+")\\W.").test(e)||(c("bad-domain",t),!1)}return c("invalid",t),!1},l=function(e,t){return!!new RegExp("^(\\+?\\d{1,2}\\s?)?\\(?\\d{3}\\)?[\\s.-]?\\d{3}[\\s.-]?\\d{4}$").test(e)||(c("bad-phone",t),!1)},s=function(e){e.target.querySelectorAll("[required]").forEach(function(e){switch(e.nodeName){case"INPUT":i.default.hasValue(e)?"email"==e.attributes.type.value?a(e.value,e):"tel"==e.attributes.type.value&&l(e.value,e):c("required",e)}})},f=function e(t){var r=t.target;switch(t.target.attributes.type.value){case"text":if(!i.default.hasValue(r))return;break;case"email":if(!a(r.value,r))return;break;case"tel":if(!l(r.value,r))return;break;default:console.log("Unknown input type")}r.classList.remove("invalid"),r.nextSibling.classList.contains("error-message")&&r.nextSibling.remove(),r.previousElementSibling&&"LABEL"===r.previousElementSibling.nodeName&&r.previousElementSibling.classList.remove("invalid"),r.removeEventListener("keyup",e)},c=function(e,t){u++;var r,n=document.createElement("span");switch(n.classList.add("error-message"),e){case"bad-domain":r="Please use a business email.";break;case"bad-phone":r="Please enter a valid phone number with area code.";break;case"invalid":r="Please enter a valid email address.";break;case"required":r="This is a required field.";break;default:r="Unknown error."}t.classList.add("invalid"),t.addEventListener("keyup",f),t.previousElementSibling&&"LABEL"===t.previousElementSibling.nodeName&&t.previousElementSibling.classList.add("invalid"),t.nextElementSibling.classList.contains("error-message")?t.nextElementSibling.innerText=r:(n.innerText=r,t.parentNode.insertBefore(n,t.nextSibling))};t.default={isValidEmail:a,isValidPhone:l,handleRequiredFields:s,listenToForms:function(){document.querySelectorAll("form").forEach(function(t){t.setAttribute("novalidate",""),t.addEventListener("submit",function(e){u=0,e.preventDefault(),s(e),0==u&&(console.log("Form is valid."),i.default.setCookies(e.target),t.submit())})})}}},function(e,t,r){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default=function(e,t){var r,n;(0,i.default)(e),n="object"===u(t)?(r=t.min||0,t.max):(r=t,arguments[2]);var o=encodeURI(e).split(/%..|./).length-1;return r<=o&&(void 0===n||o<=n)};var n,i=(n=r(0))&&n.__esModule?n:{default:n};function u(e){return(u="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}e.exports=t.default,e.exports.default=t.default},function(e,t,r){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default=function(e,t){(0,a.default)(e),(t=(0,l.default)(t,s)).allow_trailing_dot&&"."===e[e.length-1]&&(e=e.substring(0,e.length-1));for(var r=e.split("."),n=0;n<r.length;n++)if(63<r[n].length)return!1;if(t.require_tld){var o=r.pop();if(!r.length||!/^([a-z\u00a1-\uffff]{2,}|xn[a-z0-9-]{2,})$/i.test(o))return!1;if(/[\s\u2002-\u200B\u202F\u205F\u3000\uFEFF\uDB40\uDC20]/.test(o))return!1}for(var i,u=0;u<r.length;u++){if(i=r[u],t.allow_underscores&&(i=i.replace(/_/g,"")),!/^[a-z\u00a1-\uffff0-9-]+$/i.test(i))return!1;if(/[\uff01-\uff5e]/.test(i))return!1;if("-"===i[0]||"-"===i[i.length-1])return!1}return!0};var a=n(r(0)),l=n(r(1));function n(e){return e&&e.__esModule?e:{default:e}}var s={require_tld:!0,allow_underscores:!1,allow_trailing_dot:!1};e.exports=t.default,e.exports.default=t.default},function(e,t,r){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default=function e(t){var r=1<arguments.length&&void 0!==arguments[1]?arguments[1]:"";(0,s.default)(t);r=String(r);{if(!r)return e(t,4)||e(t,6);if("4"===r){if(!f.test(t))return!1;var n=t.split(".").sort(function(e,t){return e-t});return n[3]<=255}if("6"===r){var o=t.split(":"),i=!1,u=e(o[o.length-1],4),a=u?7:8;if(o.length>a)return!1;if("::"===t)return!0;"::"===t.substr(0,2)?(o.shift(),o.shift(),i=!0):"::"===t.substr(t.length-2)&&(o.pop(),o.pop(),i=!0);for(var l=0;l<o.length;++l)if(""===o[l]&&0<l&&l<o.length-1){if(i)return!1;i=!0}else if(u&&l===o.length-1);else if(!c.test(o[l]))return!1;return i?1<=o.length:o.length===a}}return!1};var n,s=(n=r(0))&&n.__esModule?n:{default:n};var f=/^(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})$/,c=/^[0-9A-F]{1,4}$/i;e.exports=t.default,e.exports.default=t.default},function(e,t,r){"use strict";r.r(t);var n={firstName:{class:"cookies-first-name",cookieID:"user-first-name",get cookie(){return i(this.cookieID)}},lastName:{class:"cookies-last-name",cookieID:"user-last-name",get cookie(){return i(this.cookieID)}},email:{class:"cookies-email",cookieID:"user-email",get cookie(){return i(this.cookieID)}},company:{class:"cookies-company",cookieID:"user-company",get cookie(){return i(this.cookieID)}},phone:{class:"cookies-phone",cookieID:"user-phone",get cookie(){return i(this.cookieID)}},jobTitle:{class:"cookies-job-title",cookieID:"user-job-title",get cookie(){return i(this.cookieID)}}},o=function(e){return""!==e.value};function i(e){for(var t=e+"=",r=document.cookie.split(";"),n=0;n<r.length;n++){for(var o=r[n];" "==o.charAt(0);)o=o.substring(1);if(0==o.indexOf(t))return o.substring(t.length,o.length)}return""}function u(e,t,r){var n=new Date;n.setTime(n.getTime()+24*r*60*60*1e3);var o="expires="+n.toUTCString();document.cookie=e+"="+t+";"+o+";path=/"}document.querySelectorAll("form").forEach(function(e){e.querySelectorAll("input").forEach(function(e){for(var t in n)e.classList.contains(n[t].class)&&(e.value=n[t].cookie)})}),t.default={setCookies:function(e){e.querySelectorAll("input").forEach(function(e){for(var t in n)e.classList.contains(n[t].class)&&o(e)&&u(n[t].cookieID,e.value,30)})},hasValue:o}},,,function(e,t,r){"use strict";r(3).default.listenToForms()}]);