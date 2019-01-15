var foo = require('./_modules/foo.js');
var bar = require('./_modules/bar.js');

console.log(foo.foo(5));
console.log(bar.bar(5));
const joe = () => console.log('babel transpile working');

joe();
