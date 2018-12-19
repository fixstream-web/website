(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);throw new Error("Cannot find module '"+o+"'")}var f=n[o]={exports:{}};t[o][0].call(f.exports,function(e){var n=t[o][1][e];return s(n?n:e)},f,f.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
var foo = require('./modules/foo.js');
var bar = require('./modules/bar.js');

console.log(foo.foo(5));
console.log(bar.bar(5));
},{"./modules/bar.js":2,"./modules/foo.js":3}],2:[function(require,module,exports){
var bar = function(number) {
  return number * 2;
}

module.exports = {
  bar: bar
}
},{}],3:[function(require,module,exports){
var foo = function(number) {
  return number * 2;
}

module.exports = {
  foo: foo
}
},{}]},{},[1])