<?php $title = 'this is markup: Structured Learning'; ?>
<?php include('includes/html_header.php'); ?>
    <div class="container sub">
        <?php include('includes/header.php'); ?>
        <div class="main" role="main">
            <div class="article">
                <h2>Stay dry with the parent selector in LESS and Sass</h2>
                <small>posted on <time datetime="2012-09-21" pubdate>21st September 2012</time></small>
               	
                <p>A few nights ago the <a href="http://www.codeschool.com/">Code School</a> team launched their latest course, <a href="http://www.codeschool.com/courses/assembling-sass">Assembling Sass</a>. I learnt loads on the course however one thing that I learnt also works in LESS and as it isn't documented on the <a href="http://lesscss.org/">LESS site</a> I thought I would share the tip.</p>

                <h3>The situation</h3>

                <p>Selector nesting in LESS and Sass has allowed us to write <abbr title="Don't Repeat Yourself">DRY</abbr> CSS. Repetitive selector names as seen below should be a thing of the past:</p>

<pre class="prettyprint linenums">.nav {
	// styles
}
.nav a {
	// styles	
}
.nav a:hover {
	// styles
}</pre>

				<p>Instead we can now save our fingers some work and do the following to output the CSS above:</p>

<pre class="prettyprint linenums">.nav {
	// styles
	a {
		// styles
		&:hover {
			//styles
		}
	}
}</pre>

				<p>Notice my use of the ampersand character? This is what LESS and Sass both refer to as the parent selector. What I did not know until I completed the Sass course on Code School however was you can use it in the following way as well:</p>

<pre class="prettyprint linenums">.nav {
	.no-js & {
		// styles
	}
}</pre>

				<p>This would output the following CSS:</p>

<pre class="prettyprint linenums">.nav {
	// styles
}
.no-js .nav {
	// styles
}</pre>

				<p>It seems obvious looking at it, but what I didn't really understand was that the ampersand character is used as a variable which stores the parent selector, in this case .nav, as its value. This saves us repeating the .nav class in our CSS and also allows us to logically group our styles together. The icing on the cake is that this preprocessor feature is identical in LESS and Sass so we can use it in both our .less and .scss/.sass files.</p>

                <p><a href="/">Back to all posts</a></p>
                
            </div>
            
            <?php include('includes/comments.php'); ?>
            
        </div>
<?php include('includes/footer.php'); ?>
    </div>
<?php include('includes/scripts.php'); ?>
</body>
</html>