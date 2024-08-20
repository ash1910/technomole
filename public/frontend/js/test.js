/*
 * Bones Scripts File
 * Author: Eddie Machado
 *
 * This file should contain any js scripts you want to add to the site.
 * Instead of calling it in the header or throwing it inside wp_head()
 * this file will be called automatically in the footer so as not to
 * slow the page load.
 *
 * There are a lot of example functions and tools in here. If you don't
 * need any of it, just remove it. They are meant to be helpers and are
 * not required. It's your world baby, you can do whatever you want.
*/

/*
 * Get Viewport Dimensions
 * returns object with viewport dimensions to match css in width and height properties
 * ( source: http://andylangton.co.uk/blog/development/get-viewport-size-width-and-height-javascript )
*/
function updateViewportDimensions() {
    var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName('body')[0],x=w.innerWidth||e.clientWidth||g.clientWidth,y=w.innerHeight||e.clientHeight||g.clientHeight;
    return { width:x,height:y };
}
// setting the viewport width
var viewport = updateViewportDimensions();


/*
 * Throttle Resize-triggered Events
 * Wrap your actions in this function to throttle the frequency of firing them off, for better performance, esp. on mobile.
 * ( source: http://stackoverflow.com/questions/2854407/javascript-jquery-window-resize-how-to-fire-after-the-resize-is-completed )
*/
var waitForFinalEvent = (function () {
    var timers = {};
    return function (callback, ms, uniqueId) {
        if (!uniqueId) { uniqueId = "Don't call this twice without a uniqueId"; }
        if (timers[uniqueId]) { clearTimeout (timers[uniqueId]); }
        timers[uniqueId] = setTimeout(callback, ms);
    };
})();

// how long to wait before deciding the resize has stopped, in ms. Around 50-100 should work ok.
var timeToWaitForLast = 100;


/*
 * Here's an example so you can see how we're using the above function
 *
 * This is commented out so it won't work, but you can copy it and
 * remove the comments.
 *
 *
 *
 * If we want to only do it on a certain page, we can setup checks so we do it
 * as efficient as possible.
 *
 * if( typeof is_home === "undefined" ) var is_home = $('body').hasClass('home');
 *
 * This once checks to see if you're on the home page based on the body class
 * We can then use that check to perform actions on the home page only
 *
 * When the window is resized, we perform this function
 * $(window).resize(function () {
 *
 *    // if we're on the home page, we wait the set amount (in function above) then fire the function
 *    if( is_home ) { waitForFinalEvent( function() {
 *
 *  // update the viewport, in case the window size has changed
 *  viewport = updateViewportDimensions();
 *
 *      // if we're above or equal to 768 fire this off
 *      if( viewport.width >= 768 ) {
 *        console.log('On home page and window sized to 768 width or more.');
 *      } else {
 *        // otherwise, let's do this instead
 *        console.log('Not on home page, or window sized to less than 768.');
 *      }
 *
 *    }, timeToWaitForLast, "your-function-identifier-string"); }
 * });
 *
 * Pretty cool huh? You can create functions like this to conditionally load
 * content and other stuff dependent on the viewport.
 * Remember that mobile devices and javascript aren't the best of friends.
 * Keep it light and always make sure the larger viewports are doing the heavy lifting.
 *
*/

/*
 * We're going to swap out the gravatars.
 * In the functions.php file, you can see we're not loading the gravatar
 * images on mobile to save bandwidth. Once we hit an acceptable viewport
 * then we can swap out those images since they are located in a data attribute.
*/
function loadGravatars() {
  // set the viewport using the function above
  viewport = updateViewportDimensions();
  // if the viewport is tablet or larger, we load in the gravatars
  if (viewport.width >= 768) {
  jQuery('.comment img[data-gravatar]').each(function(){
    jQuery(this).attr('src',jQuery(this).attr('data-gravatar'));
  });
    }
} // end function

function lineclip(container, height){
    while (container.clientHeight > height) {
        container.textContent = container.textContent.replace(/\W*\s(\S)*$/, '...');
    }
}

var isPageLoad = false;

/*
 * Put all your regular jQuery in here.
*/
jQuery(window).load(function(){
    if (jQuery('body').hasClass('page-template-homepage')) {
        if (jQuery(window).width() > 960) {
            jQuery("header.header").sticky({topSpacing:0}); 
        }
    }
});

jQuery(document).ready(function($) {

    // if ($('.nav.top-nav.nav__JS li.donate-link .sub-menu > li').length >= 5) {
    //     //.css('left', '-128px !important');
    //     $('.nav.top-nav.nav__JS li.donate-link .sub-menu').css('left', '-128px !important');
    // };

    // $("#sf_form_salesforce_w2l_lead_2 input[name='first_name']").keyup(function () { 
    //     console.log($(this).val());
    //     $("#sf_form_salesforce_w2l_lead_2 input[name='company']").val($(this).val());
    // });
    // $("#sf_form_salesforce_w2l_lead_2 input[name='last_name']").keyup(function () { 
    //     console.log($(this).val());
    //     $("#sf_form_salesforce_w2l_lead_2 input[name='company']")[0].value += $(this).val();
    //     //var thisVal = $("#sf_form_salesforce_w2l_lead_2 input[name='company']").val();
    //     //$("#sf_form_salesforce_w2l_lead_2 input[name='company']").val(thisVal + $(this).val());
    // });

    $('form[id*="sf_form_salesforce_w2l_lead_"] input[name="company"]').parent().hide();
    function on_submit_function(evt) {
        //evt.preventDefault(); //The form wouln't be submitted Yet.
        
        //jQuery("#sf_form_salesforce_w2l_lead_2 input[name='company']").attr('name', 'Company');
        var firstName = $(this).find($('form[id*="sf_form_salesforce_w2l_lead_"] input[name="first_name"]')).val();
        var lastName = $(this).find($('form[id*="sf_form_salesforce_w2l_lead_"] input[name="last_name"]')).val();

        if ($(this).find($('form[id*="sf_form_salesforce_w2l_lead_"] input[name="company"]')).length) {
            $(this).find($('form[id*="sf_form_salesforce_w2l_lead_"] input[name="company"]') ).val(firstName + " " + lastName);
        };
        // var data = $('form[id*="sf_form_salesforce_w2l_lead_"] :input').serializeArray();
        var data = $(this).find(':input').serializeArray();

        //console.log(data);
        //return false;

        // $(this).off('submit', on_submit_function); //It will remove this handle and will submit the form again if it's all ok.
        // $(this).submit();
    }

    jQuery('form[id*="sf_form_salesforce_w2l_lead_"]').on('submit', on_submit_function);

    // if(window.location.href.indexOf("sf_form_salesforce_w2l_lead_2") > -1) {
    //     var msg = $('.salesforce_w2l_lead').find('.success_message').text();
    //     $('#thankyou').find('#myModalLabel').html(msg);
    //     if (msg) {
    //         $('#thankyou').modal('show');            
    //     };
    // }
    if ($('body').hasClass('page-template-page-latest')) {
        jQuery('.related-lead-story').on('click', function() {
            window.location = jQuery(this).attr("data-href");
        })
    }

    jQuery(window).load(function(){
        var x = document.querySelectorAll(".what-we-do_content .bgr-here div p"); 
        for(var i = 0; i < x.length; i++) {
          lineclip(x[i], 265);
        }
    })

  /*
   * Let's fire off the gravatar function
   * You can remove this if you don't need it
  */
  //loadGravatars();


    jQuery('.single-carousel').css('margin-left', (jQuery('body').width() - jQuery('.single-carousel li').width()) / 2 + 'px'); // to align it properly
    jQuery(window).on('resize', function(){
            jQuery('.single-carousel').css('margin-left', (jQuery('body').width() - jQuery('.single-carousel li').width()) / 2 + 'px'); // to align it properly same thing upper
    })

    if ($('nav.pagination').length != 0) {
        if($('nav.pagination li:first-child').find('span.current').length != 0) {
            $('nav.pagination li:first-child').addClass('no-float');
        }
        if($('nav.pagination li:last-child').find('span.current').length != 0) {
            $('nav.pagination li:last-child').addClass('no-float');
        }     
    };

    if ($('#lang_sel ul li a.lang_sel_sel').length > 0) {
        var classes = $('#lang_sel ul li a.lang_sel_sel').attr('class').split(' ');
        var clases_2 = classes[1].split('-');
        $('#lang_sel ul li a.lang_sel_sel').html(clases_2[1]);
    };

    if ($('.lang_sel_sel').length) {
        $(".header").on("click", ".lang_sel_sel", function(e) {
            e.preventDefault();
        })
    }

    // for(var i=0; i<classes.length; i++){
    //   console.log(classes[i]);
    //   console.log(classes[i].split('-'));
    // }
    // $('.upper-nav').on('click', '#lang_sel ul li a.lang_sel_sel', function(event) {
    //     event.preventDefault();
    //     $(this).parent().addClass('active');
    // });

    if ($('body').hasClass('single-post')) {
        if ($(window).width() < 960) {
            var mySidebar = $('.entry-content .entry-content-sidebar');
            $('.entry-content .entry-content-sidebar').remove();
            $('section.entry-content').append(mySidebar);
        }
    };

    if ($('body').hasClass('page-template-page-latest')) {
        $('.related-lead-story .image-wrapper').imagefill(); 
    }
    if ($('body').hasClass('page-template-page-key-issues-campaign')) {
        $('.related-lead-story .image-wrapper').imagefill(); 
    }
    if ($('body').hasClass('page-template-page-campaigns-listing')) {
        $('.related-lead-story .image-wrapper').imagefill(); 
    }
    if ($('body').hasClass('page-template-page-news-analysis')) {
        $('.related-lead-story .image-wrapper').imagefill(); 
    }
    if ($('body').hasClass('page-template-page-people')) {
        //$('.people-item .people-item-image').imagefill();
        $('.people-select__JS').on('change', function() {
            $('html, body').animate({
                scrollTop: $("#"+$(this).val()).offset().top
            }, 1000);
        });
    }

    if ($('body').hasClass('page-template-page-take-action')) {
        $('.related-lead-story .image-wrapper').imagefill(); 
    }
    

    if ($('body').hasClass('single-post')) {
        if (viewport.width >= 768) {
            $(".campaign-nav").sticky({topSpacing:0});
        }
        
        $('.campaign-nav').on('click', '.nav-link', function(event) {
            event.preventDefault();
            var parent = $(this).closest('.sticky-wrapper');
            var target = $(this).attr('href');;
            if( target.length ) {
                event.preventDefault();
                if (parent.hasClass('is-sticky')) {
                    $('html, body').animate({
                        scrollTop: $(target).offset().top - 99                    
                    }, 1000);
                } else {
                    $('html, body').animate({
                        scrollTop: $(target).offset().top - 125
                    }, 1000);
                }
            }
        });

    };

  var htmlLoader = '<div class="loader">Loading...</div>';
  var oldHTML = '';

    jQuery('.homepage-video').on('click', '.show-video-js', function(event) {
        event.preventDefault();
        var H = jQuery('.homepage-video').height();

        oldHTML = jQuery('.homepage-video .row').html();

        jQuery('.homepage-video').css('min-height', H);
        //jQuery('.homepage-video div, .hero-img').hide('fast');
        jQuery('.homepage-video .row').html('<div class="loader-wrapper">' + htmlLoader + '</div>');
        jQuery('.homepage-video .row').append('<iframe class="hide-me" width="560" height="' + H + '" src="https://www.youtube.com/embed/AOdds7u834w?autoplay=1" frameborder="0" allowfullscreen></iframe>');
        setTimeout(function() {
          jQuery('.loader-wrapper').remove();
          jQuery('.homepage-video iframe').fadeIn('fast');
          jQuery('.hide-video-js').show('fast');
        }, 1000);
    });

    jQuery('.homepage-video').on('click', '.hide-video-js', function(event) {
        event.preventDefault();
        jQuery('.homepage-video .row').html(oldHTML);
        jQuery('.hide-video-js').hide('fast');
    });


    jQuery('.header-search').on('click', '.search-submit', function(event) {
        show_search(event);
    });

    function show_search(param) {
        var searchThis = jQuery('.header-search .search-submit'),
            searchInput = searchThis.next('.search-input'),
            searchInputW = searchThis.next('.search-input').width();
        if( searchInputW == 0 ) {
            param.preventDefault();
            searchInput.animate({width: "190px"});
            searchInput.focus();
            jQuery('.searchform').addClass('opened');
        };
        if ( searchInput.val() == '' ) {
            param.preventDefault();
        };
    }

    $('.blockquote-wrapper').on('click', '.share-icon', function(event) {
        event.preventDefault();
        $(this).closest('.blockquote-wrapper').find('.share_overlay').show();
    });

    jQuery(document).mouseup(function(e) {
        if( jQuery('.header-search .search-input').is(':visible') )
        {
            if ( !jQuery('.header-search .search-submit').is(e.target) && !jQuery('.header-search .search-input').is(e.target) && !jQuery('.header-search .searchform').is(e.target) ) 
            {
                jQuery('.header-search .search-input').animate({
                    width: "-190px"
                }, 300,
                function() {
                    jQuery('.searchform').removeClass('opened');
                });
            };
        };
        if ( jQuery('.blockquote-wrapper .share_overlay').is(':visible') ) {
            if ( !jQuery('.blockquote-wrapper .share_overlay').is(e.target) ) {
                jQuery('.blockquote-wrapper .share_overlay').hide();
            }
        };
    });

    $('.freedom_article__JS').on('click', '.more-link', function(event) {
        event.preventDefault();
        if (!$('.freedom-content__JS').is(':visible')) {
            $('.what-we-do_content').slideUp();
            $('.what-article__JS .more-link').removeClass('active');
            setTimeout(function() {
                $('.freedom-content__JS').slideDown();
                $('.freedom_article__JS .more-link').addClass('active');
                if ($(window).width() < 767){
                    $("html, body").animate({ scrollTop: $('.freedom-content__JS').offset().top }, "slow");
                }
            }, 400);
        };        
    });
    $('.freedom_article__JS').on('click', '.more-link.active', function(event) {
        event.preventDefault();
        $(this).removeClass('active');
        $('.freedom-content__JS').slideUp();        
    });

    $('.economic_article__JS').on('click', '.more-link', function(event) {
        event.preventDefault();
        if (!$('.economic-content__JS').is(':visible')) {
            $('.what-we-do_content').slideUp();
            $('.what-article__JS .more-link').removeClass('active');
            setTimeout(function() {
                $('.economic-content__JS').slideDown();
                $('.economic_article__JS .more-link').addClass('active');
                if ($(window).width() < 767){
                    $("html, body").animate({ scrollTop: $('.economic_article__JS').offset().top + 100 }, "slow");
                }
            }, 400);
        };        
    });
    $('.economic_article__JS').on('click', '.more-link.active', function(event) {
        event.preventDefault();
        $(this).removeClass('active');
        $('.economic-content__JS').slideUp();    
    });

    $('.health_article__JS').on('click', '.more-link', function(event) {
        event.preventDefault();
        if (!$('.health-content__JS').is(':visible')) {
            $('.what-we-do_content').slideUp();
            $('.what-article__JS .more-link').removeClass('active');
            setTimeout(function() {
                $('.health-content__JS').slideDown();
                $('.health_article__JS .more-link').addClass('active');
                if ($(window).width() < 767){
                    $("html, body").animate({ scrollTop: $('.health_article__JS').offset().top }, "slow");
                }
            }, 400);
        };        
    });
    $('.health_article__JS').on('click', '.more-link.active', function(event) {
        event.preventDefault();
        $(this).removeClass('active');
        $('.health-content__JS').slideUp();
    });

    $('.join-section.grantmaking').on('click', '.show-grantmaking__JS', function(event) {
        event.preventDefault();
        var theContent = $(this).closest('.featured-wrapper').find('.voice .text-wrapper-active');
        $(this).addClass('active');
        theContent.show();
    });

    $('.text-wrapper-active').on('click', '.close-grant__JS', function(event) {
        event.preventDefault();
        $(this).closest('.text-wrapper-active').hide();
        $('.show-grantmaking__JS').removeClass('active');
    });
    
    $('.join-section.voice').on('click', '.more-link__JS', function(event) {
        event.preventDefault();
        var theParent = $(this).closest('.featured-wrapper'),
            theContent = theParent.find('.grantmaking .text-wrapper-active'),
            theTriangle = theParent.parent().find('.bottom-arrow-wrapper');
        $('.more-link__JS').addClass('active');
        theContent.show();

    });

    $('.text-wrapper-active').on('click', '.close-voice__JS', function(event) {
        event.preventDefault();
        var theParent = $(this).closest('.featured-wrapper'),
            theTriangle = theParent.parent().find('.bottom-arrow-wrapper');
        $(this).closest('.text-wrapper-active').hide();
        $('.more-link__JS').removeClass('active');
        theTriangle.addClass('right-side');
    });

    $( ".section-donation .section-content li").each(function(){
        $(this).find(".span-block" ).wrapAll( "<div class='section-content-wrapper' />");
        var itemSize = $(this).find('.span-block').size()-2;
        $(this).find('.span-block:eq(' + itemSize + ')').addClass('second-last');
    })
    $('.donate .section-billing ul.billing-list li.notStacked .span-block').each(function(){
        $(this).prepend($(this).find('input'));
    })
    $('.donate .span-block select').selectpicker();
    $('#donate-outro').insertAfter('section.donate > .container:first-child');
    $('section.donate #donate-outro .form_rail_info')
        .wrapAll( "<div class='container' />")
        .wrapAll( "<div class='row' />");

    if ($(window).width() < 960){
    }
    
    $('.mobile-navigation .toggle-menu').click(function(){
        $(this).next('.mobile-menu-container').toggleClass('openmenu');
    })

    $('.mobile-navigation').on('click', '.toggle-menu', function(event) {
        event.preventDefault();
        $('.mobile-menu-container').toggle("slide", { direction: "right" }, 500);
    });

    $('.mobile-language-selector #lang_sel > ul > li')
        .mouseover(function(e){
            e.preventDefault();
            $(this).find('> ul').show();
        })
        .mouseout(function(e){
            e.preventDefault();
            $(this).find('> ul').hide();
        })
    $('.mobile-menu-container .mobile-li-here').on('click', 'li > a', function(e) {
        /* Act on the event */
        e.preventDefault();
        $(this).next('ul').toggle("slide", { direction: "right" }, 500);
    });
    $('.mobile-menu-container .top-nav > li.menu-item-has-children > a, .mobile-menu-container .second-nav > li.menu-item-has-children > a').click(function(e){
        e.preventDefault();
        $(this).next('ul').toggle("slide", { direction: "right" }, 500);
    })

    $('.backMenu').on('click', function(){
        $(this).parent().toggle("slide", { direction: "right" }, 500);
    })

}); /* end of as page load scripts */

jQuery('.mobile-menu-container .sub-menu, .menu-item-has-children ul').each(function(){
    jQuery(this).prepend('<li class="backMenu"><a href="javascript:void(0)"><i class="fa fa-chevron-left"></i> Back</a></li>')
})


jQuery('.banner-alert').on('click', '.more-banner__JS', function(event) {
    event.preventDefault();
    jQuery(this).closest('.banner-alert').find('.more-content-banner').slideDown();
});


jQuery(window).load(function($) {

    $ = jQuery;

    // change drop down color - sign the petition form
    $('.petition-form select').change(function(){
        if ($(this).val() == ""){
            $(this).next('.bootstrap-select').addClass('empty');
        } else {
            $(this).next('.bootstrap-select').removeClass('empty');
        }
    }).change();

    // large modal functionality
    $('#main').prepend($('.large-modal-wrapper'));
    // if ($(window).width() < 960){
    //     $('.image-outer').removeAttr('style').removeClass('styled');
    // } else {
    //     $('.image-outer').addClass('styled').height($(window).height() - $('#main > .header').height() - 80);
    // }
    $('.campaign-item-link').click(function(){
        //$('html, body').animate({scrollTop: 0}, 0);
        $("html, body").animate({ scrollTop: 0 }, "fast");
            setTimeout(function() {
                $('.sticky-wrapper').addClass('will-hide').find('.campaign-nav').hide();
                $('#main > .header').addClass('modal-visible');
            }, 300);
            $('#main').addClass('modal-opened-now');
            var pos = $(this).closest('.campaign-item').index();
            $('.large-modal-wrapper')
                .addClass('opened')
                //.fadeIn().end()
                .find('.large-modal:eq(' + pos + ')').show().siblings().hide().end()
            if ($(window).width() > 991) {
                var mainHeight = $('.large-modal-wrapper .large-modal:visible').outerHeight() + $('.header').height();
            } else {
                var mainHeight = $('.large-modal-wrapper .large-modal:visible').outerHeight() + $('.header').height() + 90;
            }
            
            if (isPageLoad){
                mainHeight = mainHeight - 14;
            }

            $('#main')
                .height(mainHeight)
                .css('overflow','hidden');
            var title = $('.large-modal-wrapper').find('.large-modal:visible').attr('id');

            var canonical = $('.large-modal-wrapper').find('.large-modal:visible').attr('data-canonical-url');
            // check if ga exists and fire analytics pageview
            if (typeof ga !== 'undefined' && $.isFunction(ga)) {
                var pageURL = $(location). attr("href");
                if (/determined/i.test(pageURL)) {
                    ga('set', 'page', '/determined/#' + title);                
                    ga('send', 'pageview');
                } else if (/defendher/i.test(pageURL)) {
                    ga('set', 'page', '/defendher/#' + title);                
                    ga('send', 'pageview');
                } else if (/disruptors/i.test(pageURL)) {
                    ga('set', 'page', '/disruptors/#' + title);                
                    ga('send', 'pageview');
                }
            } 
    });

    $('.menu-item-15931 a, .menu-item-15493 a').click(function(e){
        // console.log(window.location.pathname);
        if ( window.location.pathname == '/defendher/') {
            e.preventDefault();

            var link = $(this).attr('href');
            link = link.substr(link.indexOf("#") + 2);
            var campaignLink = $('.campaign-item a[href$="' + link + '"]');

            // console.log(campaignLink);
            //$('html, body').animate({scrollTop: 0}, 0);
            $("html, body").animate({ scrollTop: 0 }, "fast");
                setTimeout(function() {
                    $('.sticky-wrapper').addClass('will-hide').find('.campaign-nav').hide();
                    $('#main > .header').addClass('modal-visible');
                }, 300);
                $('#main').addClass('modal-opened-now');
                var pos = campaignLink.parent().index();
                
                $('.large-modal-wrapper')
                    .addClass('opened')
                    //.fadeIn().end()
                    .find('.large-modal:eq(' + pos + ')').show().siblings().hide().end()
                if ($(window).width() > 991) {
                    var mainHeight = $('.large-modal-wrapper .large-modal:visible').outerHeight() + $('.header').height();
                } else {
                    var mainHeight = $('.large-modal-wrapper .large-modal:visible').outerHeight() + $('.header').height() + 90;
                }
                
                if (isPageLoad){
                    mainHeight = mainHeight - 14;
                }

                $('#main')
                    .height(mainHeight)
                    .css('overflow','hidden');
                var title = $('.large-modal-wrapper').find('.large-modal:visible').attr('id');
                
                var canonical = $('.large-modal-wrapper').find('.large-modal:visible').attr('data-canonical-url');
            
                window.history.pushState(null, null, "/defendher/#" + title);
        }
            
    });


    // close large modal
    $('.large-modal .close-modal').click(function(){
        $('.large-modal-wrapper').removeClass('opened');
        window.location.hash = "";
        $('.sticky-wrapper').removeClass('will-hide').find('.campaign-nav').show();
        $('#main > .header').removeClass('modal-visible').removeAttr('style');
        $('#main')
            .height('auto')
            .css('overflow','visible');
        $('#main').removeClass('modal-opened-now');
    })

    // close modal when escape is pressed
    $(document).on('keyup',function(evt) {
        evt = evt || window.event;
        if (evt.keyCode == 27) {
           $('.large-modal .close-modal').click();
        }
    });

    // previous story functionality
    $('.large-modal .left-arrow').click(function(){
        var pos = $(this).closest('.large-modal').index();
        if (pos == 0){
            pos = $('#main > .large-modal-wrapper .large-modal').size() - 1
        } else if (pos == $('#main > .large-modal-wrapper .large-modal').size()){
            pos = 0;
        } else {
            pos = pos - 1;
        }
        $('.large-modal-wrapper').find('.large-modal:eq(' + pos + ')').show().siblings().hide().end()
        var title = $(this).closest('.large-modal-wrapper').find('.large-modal:visible').attr('id');
        var canonical = $(this).closest('.large-modal-wrapper').find('.large-modal:visible').attr('data-canonical-url');
        window.location.hash = title;

        // check if ga exists and fire analytics pageview
        if (typeof ga !== 'undefined' && $.isFunction(ga)) {
            var pageURL = $(location). attr("href");
            if (/determined/i.test(pageURL)) {
                ga('set', 'page', '/determined/#' + title);                
                ga('send', 'pageview');
            } else if (/defendher/i.test(pageURL)) {
                ga('set', 'page', '/defendher/#' + title);                
                ga('send', 'pageview');
            } else if (/disruptors/i.test(pageURL)) {
                ga('set', 'page', '/disruptors/#' + title);                
                ga('send', 'pageview');
            }
        } 
        
        // set height on main div
        setMainDivHeight();
    })
    
    // next story functionality
    $('.large-modal .right-arrow').click(function(){
        var pos = $(this).closest('.large-modal').index();
        if (pos == $('#main > .large-modal-wrapper .large-modal').size() - 1){
            pos = 0
        } else {
            pos = pos + 1;
        }
        $('.large-modal-wrapper').find('.large-modal:eq(' + pos + ')').show().siblings().hide().end()
        var title = $(this).closest('.large-modal-wrapper').find('.large-modal:visible').attr('id');
        var canonical = $(this).closest('.large-modal-wrapper').find('.large-modal:visible').attr('data-canonical-url');
        window.location.hash = title;

        // check if ga exists and fire analytics pageview
        if (typeof ga !== 'undefined' && $.isFunction(ga)) {
            var pageURL = $(location). attr("href");
            if (/determined/i.test(pageURL)) {
                ga('set', 'page', '/determined/#' + title);                
                ga('send', 'pageview');
            } else if (/defendher/i.test(pageURL)) {
                ga('set', 'page', '/defendher/#' + title);                
                ga('send', 'pageview');
            } else if (/disruptors/i.test(pageURL)) {
                ga('set', 'page', '/disruptors/#' + title);                
                ga('send', 'pageview');
            }
        } 

        // set height on main div
        setMainDivHeight();
    })

    var urlHash = decodeURIComponent(window.location.href.split("#")[1]);
    if (urlHash != "" && urlHash != 'undefined' && typeof urlHash != "undefined"){
        isPageLoad = true;
        $("a[href$='"+urlHash+"']").click();
    }

    if ($('body').hasClass('search-results')) {
        var urlCats = window.location.href.split("category_name=")[1];
        if (urlCats) {
            //var urlCatsSplit = urlCatsSplit.replace('#038;', '');
            var urlCatsSplit = urlCats.split('%2C');

            $.each(urlCatsSplit, function(index, val) {
                 if (val) {
                    if (val != '#038;') {
                        if (index == (urlCatsSplit.length - 2)) {
                            $('.archive-title.page-title span').append(val);
                        } else {
                           $('.archive-title.page-title span').append(val + ", "); 
                        }
                    };                    
                };
            });
        };
    };
    $('.cat-dropdown').on('change', '.event-category-switcher', function(event) {
        event.preventDefault();
        var currUrl = window.location.hostname;
        if ($(this).val()) {
            $('.dropdown-arrow').show();
            // if ($(this).val().length >= 1) {
            //     $('.dropdown-arrow').show();
            // } else {
            //     $('.dropdown-arrow').hide();
            // }
            // if ($(this).val().length == 2) {
            //     $(location).attr('href','http://'+currUrl+'/?s=&category_name='+$(this).val()[0]+','+$(this).val()[1]);
            // };
        } else {
            $('.dropdown-arrow').hide();
        }
    });
    $('.cat-dropdown').on('click', 'span.dropdown-arrow', function(event) {
        event.preventDefault();
        var currUrl = window.location.hostname;
        var myString = '';

        $("select option:selected").each(function(index, el) {
            myString += $(el).val() + "%2C";
        });
        $(location).attr('href','http://'+currUrl+'/?s=&category_name='+myString);
    });
    
   

})


jQuery(window).on('resize', function($){
    $ = jQuery;

    // change large modal image style (full height or normal height)
    // if ($(window).width() < 960){
    //     $('.image-outer').removeAttr('style').removeClass('styled');
    // } else {
    //     $('.image-outer').addClass('styled').height($(window).height() - $('#main > .header').height() - 80);
    // }

    // resize main div if modal is open
    if ($('.large-modal-wrapper').is(':visible')){
        //setMainDivHeight();
    }
});

function setMainDivHeight(){
    $ = jQuery;
    $('#main')
        .height($('.large-modal-wrapper .large-modal:visible').outerHeight() + $('.header').height())
        .css('overflow','hidden');
}

function redirectSelection() { 
    var sel = document.getElementById('countrySelection');
    var currUrl = window.location.hostname;
    if (sel.value == 'middleeast') {
        window.location = 'http://'+currUrl+'/contact-mena';
    } else if (sel.value == 'asia') {
        window.location = 'http://'+currUrl+'/contact-ap';
    } else if (sel.value == 'europe') {
        window.location = 'http://'+currUrl+'/contact-eca';
    } else if (sel.value == 'africa') {
        window.location = 'http://'+currUrl+'/contact-africa';
    } else if (sel.value == 'americas') {
        window.location = 'http://'+currUrl+'/contact-americas'; 
    } 
}

equalheight = function(container){

var currentTallest = 0,
    currentRowStart = 0,
    rowDivs = new Array(),
    jQueryel,
    topPosition = 0;
    
    jQuery(container).each(function() {

        jQueryel = jQuery(this);
        jQuery(jQueryel).height('auto')
        topPostion = jQueryel.position().top;

        if (currentRowStart != topPostion) {
            for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
                rowDivs[currentDiv].height(currentTallest);
            }
            rowDivs.length = 0; // empty the array
            currentRowStart = topPostion;
            currentTallest = jQueryel.height();
            rowDivs.push(jQueryel);
        } else {
            rowDivs.push(jQueryel);
            currentTallest = (currentTallest < jQueryel.height()) ? (jQueryel.height()) : (currentTallest);
        }
        for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
            rowDivs[currentDiv].height(currentTallest);
        }

    });
}

jQuery(window).load(function() {
    if (jQuery(window).width() > 960) {
        if (jQuery('.campaign-other-campaigns').length ) {
            equalheight('.campaign-other-campaigns .related-story.col-md-4 ');
        };
        if (jQuery('.campaign-related.will-hide').length ) {
            equalheight('.campaign-related.will-hide .related-story.col-md-4 ');
        };
    };
    
});


jQuery(window).resize(function(){
    if (jQuery(window).width() > 960) {
        if (jQuery('.campaign-other-campaigns').length ) {
            equalheight('.campaign-other-campaigns .related-story.col-md-4 ');
        };
        if (jQuery('.campaign-related.will-hide').length ) {
            equalheight('.campaign-related.will-hide .related-story.col-md-4 ');
        };
    };
});

jQuery(document).ready(function($) {
    jQuery('.large-modal__JS .fb_share_JS').each(function(index, el) {
        jQuery(this).prependTo(jQuery(this).closest('.large-modal__JS').find('.addthis_toolbox'));
    });
});




//jQuery('.accordion-here').on('click', '.show-link', function(event) {
//    event.preventDefault();
//    if(jQuery(event.target).is('.active') || jQuery(event.target).parent().is('.active')) {
//        close_accordion_section();
//    } else {
//        close_accordion_section();
//        // Add active class to section title
//        jQuery(this).addClass('active');
//        // Open up the hidden content panel
//        jQuery(this).parent().next('.accordion-body').slideDown(300).addClass('open'); 
//    }
//});
//function close_accordion_section() {
//    jQuery('.accordion-here .show-link').removeClass('active');
//    jQuery('.accordion-here .show-link').parent().next('.accordion-body').slideUp(300).removeClass('open');
//}

jQuery(document).ready(function () {
    jQuery('.accordion-title').on('click', function(event){
        event.preventDefault();
        // create accordion variables
        var accordion = jQuery(this);
        var accordionContent = accordion.next('.accordion-body');
        
        // toggle accordion link open class
        accordion.toggleClass("open");
        // toggle accordion content
        accordionContent.slideToggle(250);
        
    });
});

jQuery('.wpcf7-list-item-label').on('click', function() {
  var corrChkbx = jQuery(this).prev('input[type="checkbox"]'),
    checkedVal = corrChkbx.prop('checked');

  corrChkbx.prop('checked', !checkedVal);
});

jQuery(document).ready(function($) {
    $ = jQuery;

    if ($('label.ebd_input').length) {
        $('label.ebd_input').each(function() {
            $(this).addClass('wpcf7-list-item');
            var text = $(this).text();
            var input = $(this).find($('input'));
            $(this).text("");
            $(this).append(input);
            $(this).append('<span class="wpcf7-list-item-label">' + text + '</span>');
        });
    }

    //Get Exising Select Options    
    $('form#sf_form_salesforce_w2l_lead_15 select').each(function(i, select){
        var $select = $(select);
        $select.find('option').each(function(j, option){
            var $option = $(option);
            // Create a radio:
            var $radio = $('<input type="radio" />');
            // Set name and value:
            $radio.attr('name', $select.attr('name')).attr('value', $option.val());
            // Set checked if the option was selected
            // if ($option.attr('selected')) $radio.attr('checked', 'checked');
            // Build text
            $text = $('<span />').addClass('wpcf7-list-item-label').text($option.text());
            // Insert a label:
            $select.before(
              $("<label />").attr('for', $select.attr('name')).addClass('ebd_input').addClass('wpcf7-list-item').prepend($radio).append($text)
            );
        });
        $select.remove();
    });
    
    $('form#sf_form_salesforce_w2l_lead_16 select').each(function(i, select){
        var $select = $(select);
        $select.find('option').each(function(j, option){
            var $option = $(option);
            // Create a radio:
            var $radio = $('<input type="radio" />');
            // Set name and value:
            $radio.attr('name', $select.attr('name')).attr('value', $option.val());
            // Set checked if the option was selected
            // if ($option.attr('selected')) $radio.attr('checked', 'checked');
            // Build text
            $text = $('<span />').addClass('wpcf7-list-item-label').text($option.text());
            // Insert a label:
            $select.before(
              $("<label />").attr('for', $select.attr('name')).addClass('ebd_input').addClass('wpcf7-list-item').prepend($radio).append($text)
            );
        });
        $select.remove();
    });
    
    $('form#sf_form_salesforce_w2l_lead_18 select').each(function(i, select){
        var $select = $(select);
        $select.find('option').each(function(j, option){
            var $option = $(option);
            // Create a radio:
            var $radio = $('<input type="radio" />');
            // Set name and value:
            $radio.attr('name', $select.attr('name')).attr('value', $option.val());
            // Set checked if the option was selected
            // if ($option.attr('selected')) $radio.attr('checked', 'checked');
            // Build text
            $text = $('<span />').addClass('wpcf7-list-item-label').text($option.text());
            // Insert a label:
            $select.before(
              $("<label />").attr('for', $select.attr('name')).addClass('ebd_input').addClass('wpcf7-list-item').prepend($radio).append($text)
            );
        });
        $select.remove();
    });

    $('.wpcf7-list-item-label').on('click', function() {
      var corrChkbx = $(this).prev('input[type="radio"]'),
        checkedVal = corrChkbx.prop('checked');

        corrChkbx.prop('checked', !checkedVal);
    });
});