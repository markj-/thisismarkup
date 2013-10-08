<?php $title = 'this is markup: Setting up Jasmine with requirejs'; ?>
<?php include('includes/html_header.php'); ?>
    <div class="container sub">
        <?php include('includes/header.php'); ?>
        <div class="main" role="main">
            <div class="article">
                <h2>Setting up Jasmine with requirejs</h2>
                <small>posted on <time datetime="2012-05-07" pubdate>7th May 2012</time></small>
                <p><a href="http://pivotal.github.com/jasmine/">Jasmine</a> is a <abbr title="Behaviour Driven Development">BDD</abbr> framework for testing your JavaScript. I've been using it recently in the redevelopment of <a href="http://www.bluebit.co.uk">Bluebit's</a> in house CMS. An issue I ran into, was how to set it up to test <a href="https://github.com/amdjs/amdjs-api/wiki/AMD">AMD Modules</a> as I am using <a href="http://requirejs.org/">requirejs</a> as my script loader for the application.</p>
                
                <h3>What's the problem?</h3>
                
                <p><a href="demos/jasmine-spec-runner/">Click here to see an example of the Jasmine Spec Runner</a>. I've changed a few paths in my demo, however this is pretty much what it looks like out of the box. My issue is that the code used in this demo (<a href="demos/jasmine-spec-runner/js/src/Player.js">Player.js</a> for example) looks like this:</p>
                
<pre class="prettyprint linenums">function Player() {};

Player.prototype.play = function(song) {
  this.currentlyPlayingSong = song;
  this.isPlaying = true;
};

// some more methods</pre>

                <p>The file Player.js can simply be included in the head of my Spec Runner. However, when using AMD Modules...</p>

<pre class="prettyprint linenums">define(function() {

  var Player = function () {};

  Player.prototype.play = function(song) {
    this.currentlyPlayingSong = song;
    this.isPlaying = true;
  };

  return Player;

});</pre>
                
<p>... this is not the case. <a href="demos/amd-module-script-tag">Click here and open your console to see what happens if I attempt to load an AMD Module in a script tag</a> (hint: Uncaught ReferenceError: define is not defined). You wouldn't do this, but rather load the module using requirejs or similar.</p>

                <h3>Our new Spec Runner</h3>
                
                <p>What we're going to do, is change the Spec Runner to use requirejs to load our tests and modules. <a href="demos/jasmine-spec-runner-amd/">Click here to see our new Spec Runner setup with requirejs</a>.</p>
                
                <p>The main points to take away from the example above, are:</p>
                
                    <ol>
                        <li>I'm specifying the js folder relative to my demo as my baseUrl. All of my dependency paths can now be specified relative to that folder.</li>
                        <li>My tests define the module it is testing as a dependency.</li>
                        <li>I define my tests as dependencies of the code that initialises the Jasmine Spec Runner. This ensures that my tests and the module they depend on have loaded before Jasmine does its thing.</li>
                    </ol>
                    
                <p>If I wanted to add more tests than the one I am currently using, I would add them like the first one, as dependencies of the Jasmine initialisation code:</p>
                
<pre class="prettyprint linenums">
require([
    'spec/ModuleSpec'
    'spec/AnotherSpec',
    'spec/OneMoreSpec'
    ...
], function () {
    // jasmine init code
});</pre>
                <p><a href="/">Back to all posts</a></p>
                
            </div>
            
            <?php include('includes/comments.php'); ?>
            
        </div>
<?php include('includes/footer.php'); ?>
    </div>
<?php include('includes/scripts.php'); ?>
</body>
</html>