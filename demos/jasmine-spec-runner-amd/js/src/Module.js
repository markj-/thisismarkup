define(function () {
  
  var Module = function() {};

  Module.prototype.add = function( x, y ) {
    return x + y;
  };
  
  Module.prototype.subtract = function( x, y ) {
    return x - y;
  };
  
  return Module;
  
});