<?php $title = 'this is markup: Compose Yourself'; ?>
<?php include('includes/html_header.php'); ?>
    <div class="container sub">
        <?php include('includes/header.php'); ?>
        <div class="main" role="main">
            <div class="article">
                <h2>Compose Yourself</h2>
                <small>posted on <time datetime="2013-10-16" pubdate>16th October 2013</time></small>

                <blockquote>
                    &ldquo;The secret to building large apps is never build large apps. Break your applications into small pieces. Then, assemble those testable, bite-sized pieces into your big application&rdquo;
                </blockquote>

                <p>This quote by <a href="https://twitter.com/justinbmeyer">Justin Meyer</a> is used on a lot of articles about modular JavaScript applications, but I'd be surprised to see it when looking at articles about CSS. It makes a simple point that when combined with <a href="http://bem.info/">BEM methodology</a> can really help when architecting CSS on large and small scale projects.</p>

                <h3>The problem</h3>
                <p>I have an element in my template designs that exists on two templates however on one template it has columns floated to the left and on another template it has columns floated to the right. In the past, I may have accomplished this by doing something like the following (ignore the fact that .col should be more generic than this).</p>

<pre class="prettyprint linenums">.my-element .col {
    float: left;
}

.my-template-name .my-element .col {
    float: right;
}</pre>

                <p>The result of this, what I would consider hacky, fix is that we've increased the specificity of the styles for our modified layout. On top of this we have <a href="http://en.wikipedia.org/wiki/Coupling_(computer_programming)">coupled</a> our element to the template. This element can now only look like this on one template. If the client comes back and requests the element to look like this on another template we can't achieve this by only editing our HTML despite the CSS (kind of) being written already. There's a better way of doing it.</p>

                <h3>The better way (maybe)</h3>
                <p>BEM forces us to think of elements in our site as "Blocks". Elements that sit inside this "Block" are "Elements". Another concept it introduces is "Modifiers". None of this is new to anyone who has read about BEM. However it is the concept of modifiers that allows us to improve upon how we modify, what I will now refer to as, our Components. The BEM Way to do this would be (I'm not using an Element for my column due to it being so generic):</p>

<pre class="prettyprint linenums">.my-component .col {
    float: left;
}

.my-component--flipped .col {
    float: right;
}</pre>

                <p>What's the difference? No change in specificity. No coupling to our template. We can now reuse this component on any page we want. We can now change the class name on the body of our template without having to update our CSS. We'll no doubt remove the class all together. This is better.</p>

                <h3>Organising our Components</h3>
                <p>I built an application using BEM recently and I was impressed, but one thing I failed to decide on was how to organise my components. Recently I've been involved in a few projects following this idea of components and here is what we have come up with at Kaldor.</p>

                <p><strong>styles/components/_component.sass</strong> This is a partial Sass file that contains all of the styles for a component. This is the only CSS file that a components name should be referenced in (this is currently a dream rather than reality). We're creating an encapsulated component that does not depend on any other components, although admittedly they will usually depend on our <a href="https://github.com/kaldor/pugpig-boilerplate">Pugpig Boilerplate</a> but this is included in all of our projects. These component files look like so:</p>

<pre class="prettyprint linenums">/**
 * COMPONENTS
 * Component Name
 * Description of the component
 */

$name: component-name

.#{$name}
  // block styles

.#{$name}--modifier
  // modifier styles

.#{$name}__element
  // element styles</pre>

                <p>We generate these files using our <a href="https://github.com/kaldor/generator-pugpig">Yeoman Generator</a> and they are automatically appended to the list of components imported by _components.sass (details below). The file names the component and then uses string interpolation to reference the component name throughout the file. This may be overkill as we could simply use the component name and then if we change it's name we could use find and replace, but as with creating variables for colours (we could find and replace these too) I far prefer this. If anything it reinforces the concept that all selectors within this component file must be within the components name space. This string interpolation technique is only temporary due to the <a href="http://youtu.be/-ZJeOJGazgE?t=27m19s">@at-root directive that Sass 3.3.0 introduces</a> specifically for doing this. Personally I can't wait but this works for now.</p>

                <p>Some further points to make about these components: They must be 100% width and fluid so we put them in any parent container in any of our templates. They must not reference any HTML tags in their selectors as this would result in unnecessary coupling to the HTML. Component elements must not be modified but rather use the block modifier to modify it's appearance.</p>

                <p><strong>_components.sass</strong> This is a partial Sass file that has one purpose. It includes all "global" components. A global component is one which needs to be available to all templates. This becomes important when working with a site that has a vast number of components as it allows us to minimise the CSS each template's CSS file contains. Not every template will require all components but we have the ability to provide them with the ability very quickly and with minimal risk.</p>

                <p><strong>_global.sass</strong> This is a partial Sass file that all templates will import. It looks like this:</p>

<pre class="prettyprint linenums">/**
 * GLOBAL
 */

/* VARIABLES */

$prefixes: -moz -ms -o -webkit

/* VENDOR */

@import compass
@import normalize

/* PUGPIG BOILERPLATE */

@import boilerplate/mixins
@import boilerplate/placeholders
@import boilerplate/functions
@import boilerplate/reset

/* PROJECT SPECIFIC */

@import typography
@import theme
@import base
@import layout
@import components</pre>

                <p>Each template then has it's own CSS file that by default looks like this:</p>

<pre class="prettyprint linenums">/**
 * TEMPLATE NAME
 */

@import global</pre>

                <p>It is here that we can give access to any more components that are required specifically within this template.</p>

                <h3>What has this achieved?</h3>
                <p>The decision to approach components in this way has been to achieve the following:</p>

                <ol>
                    <li>Components that are like lego. We've encapsulated the styles and as everything is styled within a Block, we can simply move these around in our HTML without any negative consequences. No more parent elements causing our component to appear differently in different contexts unless we modify it to do so.</li>
                    <li>All templates can theoretically display any component in any of it's modified states. No longer are components coupled to their templates.</li>
                    <li>Our CSS is far more structured. Before this, element styles would be scattered between various CSS files making things hard to modify reliably. If you're asked to modify the Latest News component you know that you will find the styles within _latest-news.sass. Much better.</li>
                    <li>Each component can be built in isolation. Ignoring base styles, which our boilerplate should provide, developers can all work on different parts of the template without interfering with each other. No leaking styles causing unexpected issues.</li>
                    <li>Easy to construct Style Guide. We work Style Guide first. All components are built within a document that once complete will have examples of all of our components in their full width state and all modifiers. Due to the points above this is very simple for multiple people to work on at the same time.</li>
                </ol>

                <h3>Any downsides?</h3>
                <p>I love working like this. With that gushing review out of the way I want to look at a possible downside. At least, a possible downside when thinking about using this approach in the long term. Take this quote by Nicolas Gallagher:</p>

                <blockquote>
                    &ldquo;The class name <strong>news</strong> doesn’t tell you anything that is not already obvious from the content. It gives you no information about the architectural structure of the component, and it cannot be used with content that isn’t “news”. Tying your class name semantics tightly to the nature of the content has already reduced the ability of your architecture to scale or be easily put to use by other developers.&rdquo;
                </blockquote>

                <p>And this tweet by Harry Roberts (<a href="https://twitter.com/csswizardry/status/387185564619137025">Full conversation)</a>:</p>

                <blockquote class="twitter-tweet"><p><a href="https://twitter.com/Beardyco">@Beardyco</a> Hard to explain on twitter… Just write classes to communicate the CSS’ role rather than the HTML’s—e.g. .ui-list not .product-list</p>&mdash; Harry Roberts (@csswizardry) <a href="https://twitter.com/csswizardry/statuses/387185564619137025">October 7, 2013</a></blockquote>
                <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>

                <p>My concern is that right now, we're not doing this I understand the idea but part of me wants to simply extend these more generic classes into my components to maintain the way of working we're becoming acustomed too. I'm pointing this out as a potential downside because I have a feeling that given time I may come around but right now it feels too abstract.</p>

                <h3>Thanks &hearts;</h3>
                <p>Many thanks to <a href="https://twitter.com/necolas">Nicolas Gallagher</a>, <a href="https://twitter.com/csswizardry">Harry Roberts</a>, <a href="https://twitter.com/stubbornella">Nicole Sullivan</a>, <a href="https://twitter.com/andyhume">Andy Hume</a> and <a href="https://twitter.com/snookca">Jonathan Snook</a>. Even though I know none of them personally they have hugely influenced this post without knowing it as well as how I've been writing CSS lately due to their fantastic Books, Talks and blog posts.</p>

                <p><a href="/">Back to all posts</a></p>
                
            </div>
            
            <?php include('includes/comments.php'); ?>
            
        </div>
<?php include('includes/footer.php'); ?>
    </div>
<?php include('includes/scripts.php'); ?>
</body>
</html>