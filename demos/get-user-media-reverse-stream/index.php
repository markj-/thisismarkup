<?php include('../../includes/config.php'); ?>
<!DOCTYPE html>
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>getUserMedia - reverse stream example</title>
    <meta name="description" content="getUserMedia - reverse stream example">
    <meta name="author" content="Mark Jones">
    <link rel="stylesheet" href="css/style.css?v=1">
    
    <?php include('../../includes/analytics.php'); ?>

    <body>
        
        <h1>getUserMedia - reverse stream example</h1>
        <p>This example requires getUserMedia to be enabled in your browser. This means either an install of <a href="http://snapshot.opera.com/labs/camera/">Opera Labs</a> or <a href="https://sites.google.com/site/webrtc/running-the-demos">Google Chrome with MediaStream enabled</a></p>
        
        <h2>Reversed</h2>
        
        <video id="reverse" muted autoplay></video>

        <h2>Normal</h2>
        
        <video id="normal" muted autoplay></video>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo ROOT; ?>js/libs/jquery-1.7.2.min.js"><\/script>')</script>
        <script src="js/script.js?v=1"></script>
        
    </body>
</html>