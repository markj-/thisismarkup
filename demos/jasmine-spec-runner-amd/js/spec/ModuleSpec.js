define(['src/Module'], function ( Module ) {
  
  var module;
  
  beforeEach(function () {
    module = new Module();
  });
  
  describe('Test Module', function () {
    
    it('should be able to add two numbers together', function () {
      var result = module.add(1,2);
      expect(result).toEqual(3);
    });
    
    it('should be able to subtract one number from another', function () {
      var result = module.subtract(8,2);
      expect(result).toEqual(6);
    });
    
  });
  
});