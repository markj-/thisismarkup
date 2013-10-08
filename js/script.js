/*globals jQuery,log,Modernizr,prettyPrint*/
/*jslint browser: true, devel:true */
(function ($) {
    
    "use strict";
    
    $(function () {
        
        var SITE = {};
        
        SITE.paths = (function () {
            return {
                ROOT: '/thisismarkup/'
            };
        }());
        
        SITE.Portfolio = function (el) {
            this.el = el;
            this.loadedClass = 'loaded';
            this.delay = undefined;
            this.items = el.find('.item');
            this.itemCanvases = [];
            this.overlayClass = 'overlay';
            this.imagesToLoad = this.items.length;
            this.imagesLoaded = 0;
        };
        
        SITE.Portfolio.prototype.display = function () {
            this.el.addClass(this.loadedClass);
            this.items.fadeIn();
        };
        
        SITE.Portfolio.prototype.loaded = function () {
            this.display();
            clearTimeout(this.delay);
        };
        
        SITE.Portfolio.prototype.addCanvas = function (canvas, item) {
            this.itemCanvases.push(canvas);
            item.children('a').append(canvas.canvas);
        };
        
        SITE.Portfolio.prototype.grayscale = function (c, w, h) {
            
            var imgData = c.getImageData(0, 0, w, h),
                x,
                y;
            
            for(y = 0; y < imgData.height; y+=1){
                 for(x = 0; x < imgData.width; x+=1){
                      var i = (y * 4) * imgData.width + x * 4,
                          avg = (imgData.data[i] + imgData.data[i + 1] + imgData.data[i + 2]) / 3;
                      imgData.data[i] = avg;
                      imgData.data[i + 1] = avg;
                      imgData.data[i + 2] = avg;
                 }
            }
            
            c.putImageData(imgData, 0, 0, 0, 0, imgData.width, imgData.height);
            
        };
        
        SITE.Portfolio.prototype.createCanvas = function (i, el) {
            
            var canvas = $('<canvas />'),
                c = canvas[0].getContext('2d'),
                item = $(el),
                img = item.find('img').attr('src');
            
            this.addCanvas({
                canvas: canvas,
                context: c,
                img: img
            }, item);
            
        };
        
        SITE.Portfolio.prototype.loadImage = function (i, el) {
            
            var self = this,
                img = $(new Image()),
                grayscale = this.grayscale,
                loaded = $.proxy(this.loaded, this),
                canvas;
            
            img.load(function () {
                
                canvas = el.canvas[0];
                canvas.setAttribute('width', this.width);
                canvas.setAttribute('height', this.height);
                el.context.drawImage(this, 0, 0, this.width, this.height);
                grayscale(el.context, this.width, this.height);
                
                self.imagesLoaded++;
                
                if(self.imagesLoaded === self.imagesToLoad) {
                    loaded();
                }
                
            }).attr('src', el.img);
            
        };
        
        SITE.Portfolio.prototype.hideOverlay = function (hovered) {
            $(hovered).animate({
                left: '-240px'
            }, 200);
        };
        
        SITE.Portfolio.prototype.showOverlay = function (e, clicked) {
            
            var el = $(clicked),
                overlay = el.parents('.item').find('.' + this.overlayClass),
                newPos = '0px';
                
            if(!el.parents('.' + this.overlayClass).length) {
                e.preventDefault();
            }

            overlay.animate({
                left: newPos
            }, 200);
            
        };
        
        SITE.Portfolio.prototype.toggle = function (hovered) {
            
            $(hovered).children('canvas').fadeToggle('fast');
            
        };
        
        SITE.Portfolio.prototype.bindEvents = function () {
            
            var toggle = $.proxy(this.toggle, this),
                hideOverlay = $.proxy(this.hideOverlay, this),
                showOverlay = $.proxy(this.showOverlay, this),
                links = this.items.find('a');
            
            if(Modernizr.canvas && !Modernizr.touch) {
                links.on({
                    mouseenter: function () {
                        toggle(this);
                    },
                    mouseleave: function () {
                        toggle(this);
                    }
                });
            }
            
            links.on('click', function (e) {
                showOverlay(e, this);
            });
            
            $('.' + this.overlayClass).on('mouseleave', function () {
                hideOverlay(this);
            });
        
        };
        
        SITE.Portfolio.prototype.setup = function () {
            
            if(Modernizr.canvas) {
                $.each( this.items, $.proxy(this.createCanvas, this) );
                $.each( this.itemCanvases, $.proxy(this.loadImage, this) );
            } else {
                this.loaded();
            }
            
            this.bindEvents();
        
        };
        
        SITE.Portfolio.prototype.init = function () {
            if(this.el.length) {
                this.delay = setTimeout( $.proxy(this.setup, this), 500 );
            }
        };
        
        SITE.SyntaxHighlighter = function () {
            this.el = $('.prettyprint');
            this.paths = SITE.paths;
        };
        
        SITE.SyntaxHighlighter.prototype.load = function () {
            var self = this;
            $.ajax({
                url: self.paths.ROOT + 'js/plugins/prettify.min.js',
                dataType: 'script',
                success: function () {
                   prettyPrint();
                },
                error: function () {
                    
                }
            });
        };
        
        SITE.SyntaxHighlighter.prototype.init = function () {
            if(this.el.length) {
                this.load();
            }
        };
        
        SITE.app = (function () {
            new SITE.Portfolio($('.portfolio')).init();
            new SITE.SyntaxHighlighter().init();
        }());
    
    });
    
}(jQuery));

window.log=function(){log.history=log.history||[];log.history.push(arguments);if(this.console){console.log(Array.prototype.slice.call(arguments));}};