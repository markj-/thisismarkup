<?php $title = 'this is markup: Web cam, Y U backwards?'; ?>
<?php include('../includes/html_header.php'); ?>
    <div class="container sub">
        <?php include('../includes/header.php'); ?>
        <div class="main" role="main">
            <div class="article">
                <h2>Web cam, Y U backwards?</h2>
                <small>posted on <time datetime="2012-05-03" pubdate>3rd May 2012</time></small>
                <p>Recently I've been messing around with getUserMedia. Put simply, it's a JavaScript API that allows you to get audio and video from a users microphone or web cam. To use it today, you need getUserMedia to be enabled in your browser. This means either an install of <a href="http://snapshot.opera.com/labs/camera/">Opera Labs</a> or <a href="https://sites.google.com/site/webrtc/running-the-demos">Google Chrome with MediaStream enabled</a></p>
                
                <p>So, I've got it enabled and I'm looking at making something. I settle on building a web based version of Photobooth (I didn't say it would be original). Immediately I notice a problem. My web cam stream is backwards when compared with Photobooth's stream.</p>
                
                <h3>So how do we fix it?</h3>
                
                <p>As with most Web Development problems, the answer is only a Google away. I quickly found this <a href="http://html5demos.com/gum-canvas">example of getUserMedia with canvas based effects</a> by <a href="http://twitter.com/rem">Remy Sharp</a> and it seems he does not have the same issue. The solution is CSS3 transforms.</p>
                
                <p>We simply apply the following transformation to our video element and magically it now displays the web cam stream in the same manner as Photobooth. <a href="<?php echo ROOT; ?>demos/get-user-media-reverse-stream">See an example of the fix in action</a>.</p>
            
<pre class="prettyprint linenums">video {
    -webkit-transform: rotateY(180deg) rotate3d(1, 0, 0, 0deg);
    -o-transform: rotateY(180deg) rotate3d(1, 0, 0, 0deg);
    -moz-transform: rotateY(180deg) rotate3d(1, 0, 0, 0deg);
    -ms-transform: rotateY(180deg) rotate3d(1, 0, 0, 0deg);
    transform: rotateY(180deg) rotate3d(1, 0, 0, 0deg);
}</pre>

                <p><a href="<?php echo ROOT; ?>blog/">Back to all posts</a></p>
                
            </div>
            
            <?php include('../includes/comments.php'); ?>
            
        </div>
<?php include('../includes/footer.php'); ?>
    </div>
<?php include('../includes/scripts.php'); ?>
</body>
</html>