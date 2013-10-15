<?php $title = 'this is markup: One Year On'; ?>
<?php include('includes/html_header.php'); ?>
    <div class="container sub">
        <?php include('includes/header.php'); ?>
        <div class="main" role="main">
            <div class="article">
                <h2>One Year On</h2>
                <small>posted on <time datetime="2013-10-15" pubdate>8th October 2013</time></small>

                <p>What a difference a year makes. A year ago I was working from my flat in East London for my previous employer (<a href="http://bluebit.co.uk">Bluebit</a>) and was eagerly awaiting my first day of my new job at <a href="http://kaldorgroup.com">Kaldor Group</a>. I had expectations about what I would be doing but the real scope of the job was hard to see initially. This was a company mainly working with CSS, a "language" that I had been tiring of. Despite this, a few weeks into my new role I knew I would enjoy this new chapter of my career. This is an attempt to document what I've been up to lately that has made the past year so rewarding.</p>

                <h3>Learning to write scalable, maintainable CSS</h3>
                <p>We've all been there. A blank CSS file with endless possibilities. A few weeks pass. The endless possibilities have turned into endless pain trying to maintain the spaghetti that has unintentially been written. My first project at Kaldor Group taught me to adopt a 'components' mentality where each component is built seperately using BEM style naming conventions and templates can then be composed from these small pieces. Lego is easy. It's a shame that it took this  project to teach me this lesson but it is now beginning to form the basis of how we build projects so on the plus side the lesson has been learnt and shared with the team.</p>

                <h3>Getting to grips with Backbone</h3>
                <p>I recently built a large application using Backbone and it has been a huge eye opener. The concept of decoupled components that communicate via messaging was key here and my recent watching of <a href="http://www.backbonerails.com/">the excellent screencasts at BackboneRails</a> has firmly cemented that this is a brilliant approach to building small components that can, as with CSS components, be composed into a larger application. I'm a composition fan boy right now. The BackboneRails screencasts also demonstrated the power of Marionette which is something I have recently introduced to my Backbone development. Having a 'controller' feels so natural now and I'm not sure I will go back to vanilla Backbone. In the future I'll probably experiment with other frameworks but Backbone has served me well and with Marionette on top it feels pretty great to use.</p>

                <h3>Speaking at <a href="http://www.frontendlondon.co.uk/">Front End London</a></h3>
                <p>If someone told me that I would give a talk about our work flow at Kaldor in front of 50 talented Front-end Developers earlier this year I would have laughed them out of the room. I've never been one for public speaking so it sounded absurd but through a series of fortunate events it happened and it was such an amazing thing to be able to do. I had only attended the event once before speaking but was impressed at the quality of the talks and loved the atmosphere. Friendly, inspiring and intelligent. I love this event and if there is ever an opportunity to speak again I will clutch at it with both hands.</p>

                <h3>Speaking at Front End London One Day</h3>
                <p>If the idea of speaking in front of 50 people initially scared me then the idea of adding another 150 people would have been too much to handle at the beginning of the year. However September found <a href="https://twitter.com/clare_lisbeth">Clare</a> and I updating our talk with the new additions to our work flow and began preparing to do exactly this. The One Day event had the same amazing atmosphere and high quality of talks that everyone has come to expect. Being able to be part of this event was an honour. Speaking to people who saw the talk afterwards was a highlight because despite the advances we've made to our work flow we know that we have lots to learn and many areas that we could improve. We're a young team and hopefully this is just the beginning.</p>

                <h3>Attending more meet ups</h3>
                <p>Meet ups were a foreign thing to me a year ago. I'd been back in London for about 3 months after a 7 year stint in Southampton and the scene there was, at least from what I could see, non existent. I know that <a href="http://www.sotoncreatives.co.uk/">Soton Creatives</a> is a thing now but when compare to the vast array of choice London provides I'm not hugely surprised it took moving here to get involved. I've not been to many yet, mainly Front End London and the excellent <a href="http://12devs.co.uk/">12 Devs</a> but it's top of my priorities list to make it to more events, meet more people and hopefully get really geeky in the pub. I'm getting there and I can't wait to embrace this further.</p>

                <h3>Introducing best practices</h3>
                <p>Best practices are not the most enthralling topic. Best practices are however incredibly important. A lack of documented best practices when I started at Kaldor Group inspired me to make this my personal mission. Styleguides were introduced for HTML, CSS and JS, anti patterns were documented and slowly the team have begun to adopt these in their day to day work. Like everyone, everyone sane at least, we're aiming for our work to look like one person has written it. It's hard work coming back to your own work half a year later let alone a project that is the work of a developer that left the company soon after, possibly because of the atrocities they committed whilst working on the project. If it at least looks like your work you may have a fighting chance of updating it properly rather than hacking it to pieces.</p>

                <p>I've realised that best practices are something that get talked about a lot but to ensure they're adopted is hard work. Code reviews need to happen, the team need to believe in them and they need to be constantly iterated on. It's this final part that still needs work in our team but identifying this is at least the beginning of the solution.</p>

                <h3>Introducing front end testing processes</h3>
                <p>Along with the aforementioned best practices, testing was something that I've pushed and pushed to be adopted in our day to day work. I've always been an advocate for Unit Testing and TDD despite having not practiced it a huge amount (perhaps a dangerous way to be) but I feel it has obvious value. I'm still in the middle of this as I'm still learning what to test rather than how to test but it's ongoing and I'm starting to get a clearer understanding of how best to approach unit testing JavaScript. Hopefully in a year I'll be writing about how this is something I have achieved since I wrote this post.</p>

                <p>So we're not quite there with Unit Testing. Something that we are there with however is Functional Testing. I love Functional Testing and would encourage anyone building applications with JavaScript to take a look at <a href="http://casperjs.org/">CasperJS</a> and see the value it could bring to your testing. I find functional testing a lot simpler than Unit Testing due to it being obvious what to test and the tests take very little time to write which is a bonus particularly when trying to convince other team members to write them as well.</p>

                <h3>Teaching JavaScript</h3>
                <p>I won't write a huge amount here but the gist of things is that Kaldor have been kind enough to allow me to teach a group of developers how to write JavaScript and I'm quickly discovering that I love (LOVE) teaching people. I imagine I will blog about this at some point as it has been a great experience so far and we're only 4 weeks in.</p>

                <p><a href="/">Back to all posts</a></p>
                
            </div>
            
            <?php include('includes/comments.php'); ?>
            
        </div>
<?php include('includes/footer.php'); ?>
    </div>
<?php include('includes/scripts.php'); ?>
</body>
</html>