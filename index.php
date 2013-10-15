<?php $title = 'this is markup: Some stuff I wrote'; ?>
<?php include('includes/html_header.php'); ?>
    <div class="container">
        <?php include('includes/header.php'); ?>
        <div class="main blog" role="main">
            <ul>
                <li><a href="one-year-on">One Year On</a><small>posted on <time datetime="2013-10-15" pubdate>15th October 2013</time></small></li>
                <li><a href="stay-dry-with-the-parent-selector-in-less-and-sass">Stay dry with the parent selector in LESS and Sass</a><small>posted on <time datetime="2012-09-21" pubdate>21st September 2012</time></small></li>
                <li><a href="sass-post-tutorial-impressions">Sass - Post tutorial impressions and LESS comparison</a><small>posted on <time datetime="2012-09-01" pubdate>1st September 2012</time></small></li>
                <li><a href="structured-learning">Structured Learning</a><small>posted on <time datetime="2012-08-17" pubdate>17th August 2012</time></small></li>
                <li><a href="setting-up-jasmine-with-requirejs">Setting up Jasmine with requirejs</a><small>posted on <time datetime="2012-05-07" pubdate>7th May 2012</time></small></li>
                <li><a href="web-cam-y-u-backwards">Web cam, Y U backwards?</a><small>posted on <time datetime="2012-05-03" pubdate>3rd May 2012</time></small></li>
            </ul>
        </div>
<?php include('includes/footer.php'); ?>
    </div>
<?php include('includes/scripts.php'); ?>
</body>
</html>