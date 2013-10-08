<?php $title = 'this is markup: Sass - Post tutorial impressions and LESS comparison'; ?>
<?php include('../includes/html_header.php'); ?>
    <div class="container sub">
        <?php include('../includes/header.php'); ?>
        <div class="main" role="main">
            <div class="article">
                <h2>Sass - Post tutorial impressions and LESS comparison</h2>
                <small>posted on <time datetime="2012-09-01" pubdate>1st September 2012</time></small>
                
                <p>One of the most exciting things to happen in Front End Development recently has been the adoption of CSS Preprocessors. Using these tools we can write less CSS (or something very similar to CSS), to achieve the same (ideally better) results. This is due to features such as mixins, variables and selector nesting that help us write more maintainable code.</p>

                <p>I recently began using LESS in a few projects, however the other standout preprocessor is Sass and I feel like it is important to at least know what it is you're missing out on, so here is a comparison of the two from a post tutorial position. As such I will only be comparing the features that are covered in the tutorial, not features such as operations or color functions or the other various features each preprocessor provides.</p>

                <h3>Selector Nesting</h3>
            
                <p>At first glance, Sass and LESS seem to take an identical approach to selector nesting.</p>

<pre class="prettyprint linenums">/* LESS and Sass */
.nav {
    li {
        float: left;
    }
}</pre>

                <p>Nothing new to learn here then? Sass adds an additional feature to nesting which I am very interested by, this is the ability to nest <i>properties</i>.</p>

<pre class="prettyprint linenums">/* Sass */
.nav {
    li {
        border: {
            style: dashed;
            left: {
                width: 1px;
                color: #c00;
            }
            right: {
                width: 2px;
                color: #f3cb00;
            }
        }
    }
}</pre>
    
                <p>This allows us to avoid repeating the 'border' part of the property for long hand declarations for things like border, background, list-style etc. I don't generally use many long hand declarations, instead opting for the shorthand, however this is a nice addition to selector nesting.</p>

                <p>LESS and Sass both also allow you to nest pseudo selectors such as :hover, through the use of the &amp; character.</p>

<pre class="prettyprint linenums">/* LESS and Sass */
.nav {
    a {
        color: #fff;
        &:hover {
            font-weight: bold;
        }
    }
}</pre>

                <h3>Variables</h3>

                <p>Nothing much to say here. Variables in Sass and LESS operate in the same way but use a different character to define them, Sass opting for $ and LESS using @.</p>
    
<pre class="prettyprint linenums">/* LESS */
@brand-red: #c00;
h1 {
    color: @brand-red;
}

/* Sass */

$brand-red: #c00;
h1 {
    color: $brand-red;
}</pre>

                <h3>Interpolation</h3>

                <p>Interpo-what? For some Front End Developers this term might be a bit of a curve ball.  In simple terms, it allows you to include the value of a variable within a string or a property much like you can in a language such as Ruby or PHP (or CoffeeScript for the Preprocessor crowd). LESS does allow us to do String Interpolation but unless I have failed to RTFM, it does not allow us to use Interpolation for property names.</p>

<pre class="prettyprint linenums">/* LESS */
@base-url: "../img/";
background-image: url("@{base-url}bg.png");

/* Sass */

$base-url: "../img/";
background-image: url("#{$base-url}bg.png");

// however we can also do things like this

$side: top;

.rounded-#{$side} {
  border-#{$side}-radius: 5px;
}</pre>

            <p>This is something that I am unsure if I would ever use, but I do like the fact that it is possible. Once I've used Sass for a project and read some Sass written by other Front End Developers I may think differently.</p>

            <h3>Imports</h3>

            <p>Yet another feature that is done the same way in Sass and LESS. Good times for anyone switching between both on different projects. We do not need to state the file extension when we import the file however something to mention is that Sass has a naming convention when importing partials (files that are meant to be imported) which is to prefix the filename with an underscore e.g. _mixins.scss . This could possibly be a good pattern to follow with LESS as well to differentiate between a partial and a base stylesheet.</p>

<pre class="prettyprint linenums">/* LESS */
@import "mixins";

/* Sass */
@import "_mixins";</pre>

            <p>In both cases, any mixins or variables that are defined within the file that I am importing in the examples above are accessible in the file that imported it. Wonderful!</p>

            <h3>Mixins</h3>

            <p>Mixins allow us to define a style which we can then apply to another element without having to repeat the properties again. A common comment on mixins is that you should be using a class if you want to do this. This is something I agree with, however when mixins become useful is when you want to use arguments. </p>

<pre class="prettyprint linenums">/* LESS */
.rounded(@radius: 10px) {
    -moz-border-radius: @radius;
    border-radius: @radius;  
}

.island {
    .rounded(5px);
}

/* Sass */

@mixin rounded($radius: 10px) {
    -moz-border-radius: $radius;
    border-radius: $radius;
}

.island {
    @include rounded(5px);
}</pre>

            <p>Anyone familiar with functions in other languages will probably understand how these <i>parametric mixins</i> work. In these examples I am also demonstrating the functionality of passing a default value for the argument. In both cases I am overriding the default value of 10px with a value of 5px. To use the mixin we pass in the value that we want the radius variable to equal and it spits out the following css:</p>

<pre class="prettyprint linenums">/* CSS */
.island {
    -moz-border-radius: 5px;
    border-radius: 5px;
}</pre>

            <h3>Selector Inheritance</h3>

            <p>Something that Sass makes possible that you cannot do with LESS is for a selector to inherit <strong>all</strong> of another selectors styles. Take the following example from the Sass site:</p>

<pre class="prettyprint linenums">/* Sass */
.error {
  border: 1px #f00;
  background: #fdd;
}
.error.intrusion {
  font-size: 1.3em;
  font-weight: bold;
}

.badError {
  @extend .error;
  border-width: 3px;
}</pre>

            <p>What happens here is that all of the styles defined on .error will be applied to .badError as well. This includes the styling applied to .error when it is adjoined to .intrusion. @extend has a lot more functionality that can be read about in the <a href="http://sass-lang.com/docs/yardoc/file.SASS_REFERENCE.html#extend">Sass Reference</a>. I am keen to learn this myself so I won't attempt to explain it right now.</p>

            <h3>Conclusion</h3>

            <p>Obviously this is not an indepth comparison of these two preprocessors, however what I have learnt is that they both take a similar approach to a lot of functionality and it will not take much time to become comfortable using both of them. I've reached the conclusion that Sass is the preprocessor I should be looking at becoming more familiar with simply because it <a href="http://sass-lang.com/docs/yardoc/file.SASS_REFERENCE.html">looks very powerful</a> and offers more functionality. Due to Sass and LESS both being compiled to vanilla CSS there is no reason that I can think of to not go with Sass as my main preprocessor because opting for the option with more features does not mean including a larger file in my project like it would if I was comparing a JavaScript library.</p>

            <p><strong>Next steps?</strong> Use Sass in a personal project to gain more understanding of how it works and also take a look at <a href="http://compass-style.org/">Compass</a> as I am hearing a lot of good things about it.</p>

            <p><a href="<?php echo ROOT; ?>blog/">Back to all posts</a></p>
                
            </div>
            
            <?php include('../includes/comments.php'); ?>
            
        </div>
<?php include('../includes/footer.php'); ?>
    </div>
<?php include('../includes/scripts.php'); ?>
</body>
</html>