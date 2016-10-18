function isCanvasSupported() {
    var isInputSupported = 'placeholder' in document.createElement('input');
    var isTextareaSupported = 'placeholder' in document.createElement('textarea');
    return isInputSupported && isTextareaSupported;
}

var isMobileScreen = function() { return document.body.clientWidth < 768; };
var ww = $(window).width();
var hh = $(window).height();
var app = {
    init: function() {
        app.fullscreenHeight();
       // app.initOffcanvasMenu();
       app.customSelection();
        //app.initCarousel();

        if (isMobile.any) {
            //fastclick	      	
            var attachFastClick = Origami.fastclick;
            attachFastClick(document.body);
        }

        //remove pre-loading
        $(".heroslider").imagesLoaded(function() {
            //slider
            $('.heroslider .slider').slick({
                arrows: false,
                dots: false,
                slidesToShow: 1,
                slidesToScroll: 1,
                adaptiveHeight: true
            });
            app.hideLoading();
            $('body').removeClass('pre-loading');
        });
    },
    showLoading: function() {
        $("body").addClass('modal-open loading');
    },
    hideLoading: function() {
        $("body").removeClass('modal-open loading');
    },
    initScrollto: function() {
        $('body').on('click', '.scrollto', function(e) {
            e.preventDefault();
            app.scrollto($(this).data("scrollto"), 1000);
        });
    },
    scrollto: function(selector, timeout) {
        if (typeof(timeout) === 'undefined') {
            timeout = 500;
        }
        $('html, body').animate({
            scrollTop: $(selector).offset().top
        }, timeout);
    },
    formvalidate: function() {
        var myLanguage = {
            requiredFields: 'This field is required',
        }
        $.validate({
            language: myLanguage,
            modules: 'html5',
            validateOnBlur: false,
            form: 'form.validate',
            scrollToTopOnError: false,
            borderColorOnError: '',
            errorMessagePosition: 'element',
            validateHiddenInputs: false,
            onValidate: function($form) {},
            onError: function($form) {
                $form.find(".error:first").focus();
                $form.find(".form-error-result").show();
            },
            onSuccess: function($form) {
                $form.find(".form-error-result").hide();
                //var data = $form.serializeObject(); 
                return true;
            },
            onElementValidate: function(valid, $el, $form, errorMess) {}
        });
    },
    customSelection: function() {
        $('.selectpicker').selectpicker({
            mobile: isMobile.any
        });
    },
    fullscreenHeight: function() {
        var headerHeight = 0;
        //$("#header").outerHeight(); 
        var wndHeight = window.innerHeight + 2;
        $(".full-height").each(function() {
            var deck = $(this);
            deck.css('height', 'auto');
            deck.imagesLoaded(function() {
                var deckHeight = deck.outerHeight();
                deck.css('height', (deckHeight < wndHeight ? wndHeight : deckHeight) - headerHeight);
            });
        });
        $(".full-min-height").each(function() {
            var deck = $(this);
            deck.css('min-height', wndHeight);
        });
    },
    showHideMenu: function(){
        $('.ul_menu > li > a').click(function(){
            var obj = $(this).closest('li');
            if(obj.hasClass('hasChild')){
                obj.toggleClass("active");
                $('body').toggleClass('showsubmenu');
            }else{
                obj.parent().find('.active').removeClass('active');
                obj.addClass('active');
                $('body').addClass('showsubmenu');
            }
            app.niceScroll('#ul_menu');
            app.fixMenuMobile();
        });
        $('.ul_menu li.close-li').click(function(){
            $(this).parent().closest('li').removeClass('active');
            $('body').removeClass('showsubmenu');
        });
    },
    playListVideo: function(e){
        $( ".listhome .list-item" ).click(function( index ) {
            var e = $(this).data('video-id');
            playVideo(e);
        });
        var playVideo = function(e){
            // var t = $('<iframe class="embed-responsive-item" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen />').addClass('videoLightbox__embed').attr({
            //         src: 'https://www.youtube.com/embed/' + e + '?autoplay=1',
            //         frameborder: 0
            // }),
            
            var t = $('<iframe   webkitallowfullscreen mozallowfullscreen allowfullscreen />').addClass('videoLightbox__embed').attr({
                src: 'https://player.vimeo.com/video/' + e + '?autoplay=1&buttons.watchlater=false&buttons.like=false&buttons.share=false',
                frameborder: 0
            })
           // n = $('<button />').addClass('videoLightbox__closeButton').html('<span>Close <label>&times;</label></span>'),
            r = $('<div />').addClass('videoLightbox').append(t).appendTo('body').animate({
                opacity: 1
            }, {
                duration: 2000
            });
            n.click(function() {
                r.animate({
                    opacity: 0
                }, {
                    duration: 1000,
                    complete: function () {
                        r.remove();
                    }
                });
            });
        };
    },
    readmore:function(e){
        $( ".tr-content .btn-start" ).click(function( index ) {
            var e = $(this).data('info-project');
            playReadmore(e);

        });
        var playReadmore = function(e){
            var t = $('<p class="pph-2 detail-project">' + e + '</p>'),
            n = $('<button />').addClass('projectLightbox__closeButton').html('&times;'),
            r = $('<div />').addClass('projectBox').append(t).append(n).appendTo('.project-lightbox').animate({
                opacity: 1
            }, {
                duration: 2000
            });
            $('.tbl-projects').addClass('greenbox');
            
            if(ww < 768){
                var distance = $('.project-lightbox').offset().top - $('#header').height();
                $('html, body').animate({
                    scrollTop: distance
                }, 500);
            }
            
            n.click(function() {
                r.animate({
                    opacity: 0
                }, {
                    duration: 1000,
                    complete: function () {
                        r.remove();
                    }
                });
                $('.tbl-projects').removeClass('greenbox');
            });
        };
    },
    slideMeat: function(e){
        $('.slide_meat').slick({
          dots: false,
          infinite: false,
          speed: 300,
          slidesToShow: 1,
          slidesToScroll: 1
        });
    },
    validateContact: function(e){
        $.validate({                                
            validateOnBlur : false,
            showHelpOnFocus : false,
            addSuggestions : false,
            form : 'form.validate',         
            scrollToTopOnError : true,
            borderColorOnError: '',
            errorMessagePosition: 'element',
            validateHiddenInputs: false,    
            onValidate : function($form){                
            },
            onError: function ($form) {
                $form.find(".error:first").focus();
            },
            onSuccess: function ($form) {
                return true;
            },
            onElementValidate : function(valid, $el, $form, errorMess) {                        
            }                         
        });   
    },
    fixMenu: function(e){
        var heightSize=$(window).width();
        if(heightSize >= 768){
            var heightSize=$(window).height();
            var heightLogo = $('.up_header').height()+70;
            var heightDownLoad = 215+30;
            var heightMenu = heightSize - (heightLogo + heightDownLoad);
            //alert(heightSize + " - "+heightLogo+ " - "+heightDownLoad+" = "+heightMenu);
            $('#ul_menu').height(heightMenu);
            app.niceScroll('#ul_menu');
        }
        
    },
    fixMenuMobile: function(e){
        var mheightSize=$(window).width();
        if(mheightSize < 768){
            var mheightSize=$(window).height();
            var mheightLogo = $('.up_header').height() + $('.mobile_menu').height() +45;
            var mheightMenu = mheightSize - mheightLogo ;
            //alert(heightSize + " - "+heightLogo+ " - "+heightDownLoad+" = "+heightMenu);
            $('.mobile_menu .ul_child').height(mheightMenu);
        }
    },
    niceScroll: function(idscroll){
        var widthSize=$(window).width();
        if(widthSize > 1024){
            $(idscroll).removeClass('overshow');
            $(idscroll).niceScroll({
                cursorcolor:"#000",
                touchbehavior: false,
                autohidemode:false,
                preventmultitouchscrolling:false
            });
        }else{
            $(idscroll).addClass('overshow');
        }
        
    },
    fixVhIso:function(e){
        // Remove min-height on iOS after slideshow initialization -.videoLightbox,
            var ua = navigator.userAgent;
            var iOS = !!ua.match(/iPad/i) || !!ua.match(/iPhone/i);
            var webkit = !!ua.match(/WebKit/i);
            var iOSSafari = iOS && webkit && !ua.match(/CriOS/i);
            if(iOSSafari){
              var h = $(window).height();
              if(!!ua.match(/iPhone/i)){
                h = h - $('#header').height();
              }
              $('.videoLightbox,.wrap_video').css('height', h + 'px');
            }
    },
    fullscreenHome:function(e){
        if(ww < 768){
            var heightItemHome = $(window).height() - $('#header').height();
            //console.log(heightItemHome);
            $(' .listhome .main-item,.listhome .second-item,.listhome .third-item').css('height', heightItemHome +'px')
        } else{
            var is_safari = navigator.userAgent.indexOf("Safari") > -1;
            var is_home = ($('.listhome').length > 0);            
            if(is_safari && is_home){
                var wh = $(window).height();
                var one = wh/2;
                var two = wh/4;
                var three = wh/3;
                $('.list-item.main-item').height(one);
                $('.two-items > a').height(two);
                $('.three-items > a').height(three);
            }
        }
    },
    scrollSubFolder:function(e){
        $('.clickable').on('click', function(e) {
            e.preventDefault();
            var wi = $(window).width();
            var iframe = $('#player_ampc')[0];
            var player = $f(iframe);
            player.api('pause');
            if(wi < 768){
                var distance2 = $('.sub_folder').offset().top - $('#header').height();
                $('html, body').animate({
                    scrollTop: distance2
                }, 1000);
            }else{
                app.scrollto($(this).data("scrollto"), 1000);
            }
        });
    },
    playbgVideo:function(e){
        //if($('.listhome’).length){
            var videos = $('video');
            var maxIndex = videos.length - 1;
            var currentIndex = -1;
            var playNext = function (i) {
                console.log('Play #' + i);
                var video = videos.eq(i);
                var videoEL = videos.get(i);
                if (videoEL.readyState > 2) {
                    console.log('Ready', video);
                    videoEL.play();
                    $(video).addClass('active');
                    currentIndex = i;
                } else {
                    video.on('loadeddata', function () {
                        console.log('Loaded data', video);
                        video.get(0).play();
                        $(video).addClass('active');
                        currentIndex = i;
                    });
                }
            };

            videos.each(function (i) {
                var video = $(this);
                video.on('ended', function () {
                    console.log('Video #' + i + ' is ended');
                    video.hide();
                    if (i < maxIndex) {
                        playNext(i + 1);
                    }
                });
            });

            playNext(0);
        }
    //}
};

$(document).ready(function() {
    app.init();
    app.initScrollto();
    app.formvalidate();
    app.showHideMenu();
    app.readmore();
    app.slideMeat();
    app.validateContact();
    app.fixMenu();
    app.fixMenuMobile();
    app.fixVhIso();
    app.fullscreenHome();
    app.scrollSubFolder();
    app.playbgVideo();
    //app.winresize();
   // app.playListVideo();
   
    var resizeId;
    $(window).resize(function() {
        clearTimeout(resizeId);
        resizeId = setTimeout(function() {
           app.fixMenu();
           app.fixMenuMobile();
           app.fixVhIso();
           app.fullscreenHome();
           app.playbgVideo();
        }, 100);
    });

})

