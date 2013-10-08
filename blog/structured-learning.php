<?php $title = 'this is markup: Structured Learning'; ?>
<?php include('../includes/html_header.php'); ?>
    <div class="container sub">
        <?php include('../includes/header.php'); ?>
        <div class="main" role="main">
            <div class="article">
                <h2>Structured Learning</h2>
                <small>posted on <time datetime="2012-08-17" pubdate>17th August 2012</time></small>
                <p>One of the things I both &hearts; and hate about the Web Development industry is that it is constantly moving at a rapid pace. What was a best practise only a year ago may be something to avoid and the best tool or technology for a task may be completely different. This can be a challenge to keep up with. Personally, I believe the day I stop learning, will be the day I look for a new career so I'm taking a bit of time to make a list of subjects I would like to become more knowledgable in. It is too easy to become sidetracked by new emerging technologies, so this list will become the basis of my extra curricular learning over the next few months.</p>

                <h3>Sass</h3>
                <p>I'm currently using <a href="http://lesscss.org/">LESS</a> in my projects however I see a lot of people I respect and admire using <a href="http://sass-lang.com/">Sass</a> so I would like to see what the fuss is about. One of the great things about CSS Preprocessors is that they spit out valid CSS so if I did want to move to Sass, even for a current project, it would still be possible.</p>

                <h3>CoffeeScript</h3>
                <p>I love writing JavaScript however during my adventures into Ruby I have  been impressed by the syntax and <a href="http://coffeescript.org/">CoffeeScript</a> reminds me of this which could be a good thing. Again, like with CSS Preprocessors, I will end up with a JavaScript file should CoffeeScript turn out to be a dead end further down the line.</p>

                <h3>Backbone</h3>
                <p>Backbone is something that I have toyed with on a small project and have completed a <a href="http://www.codeschool.com/courses/anatomy-of-backbonejs">Code School course (Anatomy of Backbone.js)</a> on. For a <abbr title="Single Page Applications">SPA</abbr> I can really see how it might help. I've got a personal project on the go with <a href="http://carlydenhamdesign.co.uk">Carly Denham Design</a> which is a good fit for Backbone so I may take that as my opportunity to dive in properly. I could easily have a paragraph below about Ember, Knockout, Angular and so on, but for now I think Backbone is a good starting point.</p>

                <h3>Build Tools</h3>
                <p>Through my use of require.js on a very large build and using its fantastic <a href="http://requirejs.org/docs/optimization.html">optimizer</a> I have really seen the benefit of automating tasks that I would do by hand on a smaller project (concatentation, minification etc.) and I would like to explore this area of development a bit further. <a href="https://github.com/cowboy/grunt">Grunt</a> looks like the perfect starting point and I am incredibly excited for <a href="http://addyosmani.com/blog/improved-developer-tooling-and-yeoman/">Yeoman</a> when it is made available to the general public.</p>

                <h3>CSS 3d Transforms</h3>
                <p>Not a huge amount to say here. I've played with 2d transforms and the obvious next step is the 3d aspect. I haven't got much opportunity to use this in my day to day work so I imagine a little tech demo might be my output for this one.</p>

                <p>Plenty to be learning then!</p>
            
                <p><a href="<?php echo ROOT; ?>blog/">Back to all posts</a></p>
                
            </div>
            
            <?php include('../includes/comments.php'); ?>
            
        </div>
<?php include('../includes/footer.php'); ?>
    </div>
<?php include('../includes/scripts.php'); ?>
</body>
</html>