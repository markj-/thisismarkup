define(function() {
  
  var Player = function () {};
  
  Player.prototype.play = function(song) {
    this.currentlyPlayingSong = song;
    this.isPlaying = true;
  };
  
  return Player;
  
});