/*pre loader progress bar start*/
    /*if(jQuery('.pre-loader-bar').length > 0){
         document.onreadystatechange = function(e){
            if(document.readyState=="interactive")
            {
                var all = document.getElementsByTagName("*");
                for (var i=0, max=all.length; i < max; i++)
                {
                    set_ele(all[i]);
                }
            }
        }
        function check_element(ele)
        {
            var all = document.getElementsByTagName("*");
            var totalele=all.length;
            var per_inc=100/totalele;
            var percentage_val = jQuery('#percent_val');
             if(jQuery(ele).on()){
                var prog_width=per_inc+Number(document.getElementById("progress_width").value);
                var round_val = Math.round(prog_width);
                document.getElementById("progress_width").value=prog_width;


                jQuery(".progres").animate({width:round_val+"%"},10,function(){
                    percentage_val.text(round_val + '%');
                    percentage_val.css('width', (round_val + '%'));

                    if(document.getElementById("progres").style.width=="100%"){
                       jQuery('.layer').fadeOut();
                       jQuery('#pre_loader_bar').css('width', '0%');
                    }
                });
            }
            else
            {
                set_ele(ele);
            }
        }
        function set_ele(set_element)
        {
            check_element(set_element);
        }
    }*/
/*end*/

/*
 * Functions
 */
/*----Responsive breakpoints check--start----------*/
var _windowWidth = window.innerWidth || jQuery(window).width();
var _view = 0;
if (_windowWidth < 401) _view = 1;
else if (_windowWidth >= 401 && _windowWidth < 501) _view = 2;
else if (_windowWidth >= 501 && _windowWidth < 768) _view = 3;
else if (_windowWidth >= 768 && _windowWidth < 991) _view = 4;
else if (_windowWidth >= 991 && _windowWidth < 1200) _view = 5;
else _view = 6;
/*----Responsive breakpoints check--ends----------*/

/*----GENERIC FUNCTION TO KEEP CONTENT HEIGHT SAME ON ALL SIBLINGS----STARTS ---*/
function genericSetHeightForAllSiblings(allItems, newWindowView, autoBreakPoint){
    var highestItem;
    for(i=0; i<allItems.length; i++){
        highestItem = 0;
        for(j=0; j<allItems[i].length;j++){
            if(newWindowView > autoBreakPoint){
                allItems[i].each(function(){
                    jQuery(this).css('min-height','auto');
                    var thisHeight = jQuery(this).height();
                    if(thisHeight > highestItem)
                        highestItem = thisHeight;
                });
                allItems[i].each(function(){
                    jQuery(this).css('min-height',highestItem);
                });
            }
            else{
                allItems[i].each(function(){
                    jQuery(this).css('min-height','auto');
                });
            }
        }
    }
}
/*----GENERIC FUNCTION TO KEEP CONTENT HEIGHT SAME ON ALL SIBLINGS----ENDS ---*/

/*---saving news-- Start----*/
function value_features_content_height(newWindowView){
    var container = jQuery('.our-value-features-container').find('.feature-wrap'),
        allItems = [];
    if(container.length > 0){
        allItems.push(container.find('h4'));
        allItems.push(container.find('h4 + p'));
        genericSetHeightForAllSiblings(allItems, newWindowView, 3);
    }
}
/*---saving news-- End----*/

/*---saving news-- Start----*/
function research_and_development_content_height(newWindowView){
    var container = jQuery('.posts-wrapper, .after-search'),
        allItems = [];
    if(container.length > 0){
        allItems.push(container.find('h3'));
        genericSetHeightForAllSiblings(allItems, newWindowView, 0);
    }
}
/*---saving news-- End----*/

/*---about safe pare of hands-- Start----*/
function safe_pare_content_height(newWindowView){
    var container = jQuery('.who-we-are'),
        allItems = [];
    if(container.length > 0){
        allItems.push(container.find('p'));
        genericSetHeightForAllSiblings(allItems, newWindowView, 0);
    }
}
/*---saving news-- End----*/
/*---saving news-- Start----*/
function service_post_type_content_height(newWindowView){
    var container = jQuery('.services-wrapper').find('.service-block'),
        allItems = [];
    if(container.length > 0){
        allItems.push(container.find('h4'));
        allItems.push(container.find('p.ser-content'));
        genericSetHeightForAllSiblings(allItems, newWindowView, 3);
    }
}
/*---saving news-- End----*/


/*active by default on load*/
function stepActiveByDefault() {
    jQuery('.steps-wrapper ul li:nth-child(3)').addClass('active');
    jQuery('.steps-description-container').find('#c3_content').addClass('shown');
}


/*active by default on load*/
function tabActiveByDefault() {
    jQuery('.tab-list ul li:nth-child(2)').addClass('active');
    jQuery('.content-wrapper .tabs-data:nth-child(2)').show();
}
/*active tab on hover*/
function listTabActiveOnHover(el) {
    var elementID = el.attr('id');
    var allItems = jQuery('.tab-list ul li');
    var allTabContents =  jQuery('.content-wrapper .tabs-data');
    
    allItems.removeClass('active');
    el.addClass('active');

    allTabContents.hide();
    jQuery('#' + elementID + '_content').show();
}

/* active steps on hover start */
function stepActiveOnHover(el) {
    var className = jQuery(el).attr('class').split(' ')[1];
    var stepLi = jQuery('.steps-wrapper ul li');
    var currentEl = jQuery(el).parent('li');

    stepLi.removeClass('active');
    currentEl.addClass('active');

    jQuery('.steps-description-container .steps-description').removeClass('shown');
    jQuery('#' + className + '_content').addClass('shown');
}
/* active steps on hover end */

function stepActiveOnClick(el){
    var allList = jQuery('.steps-wrapper ul li');
    var currentLi = el.parents('li');
    var className = currentLi.attr('class').split(' ')[0];

    allList.removeClass('active');
    currentLi.addClass('active');

    jQuery('.steps-description-container .steps-description').removeClass('shown');
    jQuery('#' + className + '_content').addClass('shown');

}

/*stop carousel*/
function stopCarousel() {
  var owl = $('#client-brands.owl-carousel');
  owl.trigger('destroy.owl.carousel');
  owl.addClass('off');
}/*end*/

/* Client brands carousel start*/
function clientCarousel() {
    var client_brands = jQuery('#client-brands');
    if (client_brands.length > 0){
        if ( jQuery(window).width() > 768 ) {
            client_brands.removeClass('without-carousel');
            client_brands.owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                responsive: {
                    0: {
                        items: 1,
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 4
                    }
                }
            })
        }else{
            client_brands.owlCarousel('destroy').addClass('without-carousel');
        }
    }
}/*end*/

/* Related project Carousel*/
function relatedProjectsCarousel() {
    var related_project = jQuery('.related-projects-wrapp');
    if (related_project.length > 0){
            related_project.owlCarousel({
                loop: false,
                margin: 10,
                nav: true,
                dots: true,
                responsive: {
                    0: {
                        items: 1,
                    },
                    768: {
                        items: 2,
                    },
                    992: {
                        items: 3
                    },
                    1000: {
                        items: 3
                    }
                }
            })
        
    }
}/*end*/

/* Client brands carousel start*/
/*Fade In slider*/
jQuery(function () {
  var $owl = jQuery('#reviews-slider'),
      effect = 'fxSoftScale',
      outIndex,
      isDragged = false;

  $owl.owlCarousel({
    margin: 0,
    navSpeed: 500,
    nav: true,
    items: 1,
    animateIn: 'fake',
    animateOut: 'fake'
  });

  $owl.on('change.owl.carousel', function(event) {
    outIndex = event.item.index;
  });

  $owl.on('changed.owl.carousel', function(event) {
    var inIndex = event.item.index,
        dir = outIndex <= inIndex ? 'Next' : 'Prev';

    var animation = {
      moveIn: {
        item: jQuery('.owl-item', $owl).eq(inIndex),
        effect: effect + 'In' + dir
      },
      moveOut: {
        item: jQuery('.owl-item', $owl).eq(outIndex),
        effect: effect + 'Out' + dir
      },
      run: function (type) {
        var animationEndEvent = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',
            animationObj = this[type],
            inOut = type == 'moveIn' ? 'in' : 'out',
            animationClass = 'animated owl-animated-' + inOut + ' ' + animationObj.effect,
            $nav = $owl.find('.owl-prev, .owl-next, .owl-dot, .owl-stage');

        $nav.css('pointerEvents', 'none');

        animationObj.item.stop().addClass(animationClass).one(animationEndEvent, function () {
          // remove class at the end of the animations
          animationObj.item.removeClass(animationClass);
          $nav.css('pointerEvents', 'auto');
        });
      }
    };

    if (!isDragged){
      animation.run('moveOut');
      animation.run('moveIn');
    }
  });

  $owl.on('drag.owl.carousel', function(event) {
    isDragged = true;
  });

  $owl.on('dragged.owl.carousel', function(event) {
    isDragged = false;
  });

  /**
   * Get Animation Name from the class 'owl-carousel',
   * animation name begins with fx...
   */
  function getAnimationName(){
    var re = /fx[a-zA-Z0-9\-_]+/i,
        matches = re.exec($owl.attr('class'));

    return matches !== null ? matches[0] : matches;
  }

});
/*fadein slider end*/

function featuredPost_slider(){
    jQuery(".blog-slider .owl-carousel").owlCarousel({
        items: 1,
        loop: true,
        mouseDrag: true,
        touchDrag: true,
        pullDrag: false,
        rewind: false,
        autoplay: false,
        margin: 0,
        nav: true,

      });
}

function careersCarousel(){
    jQuery(".career-carousel .owl-carousel").owlCarousel({
        items: 4,
        loop: true,
        mouseDrag: false,
        touchDrag: true,
        pullDrag: false,
        rewind: false,
        autoplay: false,

        margin: 0,
        nav: true,
        stagePadding: 50,
        responsive: {
            0: {
                items: 1
            },
            767: {
                items: 3,
            },
            1000: {
                items: 4
            }
        }
      });
}

/*Scroll down event*/
function scrollODC(){
    if ( jQuery(window).width() > 767 ){
        var lastScrollTop = 0;
        jQuery(window).scroll(function(event){
        var st = jQuery(this).scrollTop();
        var headr = jQuery('header');
        var toggle = headr.find('.nav-toggle');
        if(st > 800){
             if (st > lastScrollTop){
                headr.addClass('scrolled-header');
            } else {
                headr.removeClass('scrolled-header');
            }
        }
            lastScrollTop = st;
        });    
    }
}

/* open all services on detail page */
function allServices(el){
    el.toggleClass('active-all-services');
    jQuery('.all-services').slideToggle();


}

/*scroll top on click services nav*/
function serviceNavScrollTop( el ){
    var sectionTo = el.attr('href');
    var allItems = jQuery('.services-nav ul li a');

    jQuery('html, body').animate({
      scrollTop: jQuery(sectionTo).offset().top - 180
    }, 800);
    allItems.removeClass('active');
    el.addClass('active');
}

//show all categories list on blog page
function showAllCategories_list( el ){
    el.toggleClass('open');
    jQuery('.category-list').slideToggle();
}

function showCurrent_category( el ){
    var current_ategory = el.find('.category-name').text();
    var show_active_cat = jQuery('#active_category');

    var after_search = jQuery('.after-search');
    var actual_posts = jQuery('.posts-wrapper.grid');

    show_active_cat.empty();
    show_active_cat.text( current_ategory );

    actual_posts.show();
    after_search.hide(); 

    jQuery('#keyword').val('');

    jQuery('#filters li').removeClass('active');
    el.addClass('active');
}

// Search
function hidePostsOnSearch( value ){
    var after_search = jQuery('.after-search');
    var actual_posts = jQuery('.posts-wrapper.grid-wrapper');
    var category_title = jQuery('#category_title');
    var category_list = jQuery('#category_list');
    var search_keywords_wrapper = jQuery('#search_keywords_wrapper');
    var search_keywords = jQuery('#search_keywords');
    var clear_search = jQuery('#clear_search');
    var founded_results_title = jQuery('#founded_results_title');

    search_keywords.text(value);

    if(value.length > 0){
        actual_posts.hide();
        category_title.hide();
        category_list.hide();

        after_search.show();
        search_keywords_wrapper.show();
        clear_search.show();
        founded_results_title.show();
    }
    else{
        after_search.hide();  
        search_keywords_wrapper.hide();
        clear_search.hide();
        founded_results_title.hide();

        actual_posts.show();
        category_title.show();
        category_list.show();
    }
}

function clearSearch(){
    var after_search = jQuery('.after-search');
    var actual_posts = jQuery('.posts-wrapper.grid-wrapper');
    var category_title = jQuery('#category_title');
    var category_list = jQuery('#category_list');
    var search_keywords_wrapper = jQuery('#search_keywords_wrapper');
    var search_keywords = jQuery('#search_keywords');
    var clear_search = jQuery('#clear_search');
    var founded_results_title = jQuery('#founded_results_title');

    after_search.hide();
    search_keywords_wrapper.hide();
    search_keywords.hide();
    clear_search.hide();
    founded_results_title.hide();

    actual_posts.show();
    category_title.show();
    category_list.show();
    jQuery('#keyword').val('');
}

//custom dropdown active state
function activated_customDropdown_item( el ){
    var selectedItem = el.text();
    var openedDropDown = el.parents('.dropdown');
    var activeItemWrap = el.parents('.custom-dropdown').find('.selected-item');

    var allOtherItems = openedDropDown.find('li');

    activeItemWrap.empty();
    activeItemWrap.text( selectedItem );
    //openedDropDown.css('display', 'none'); 

    allOtherItems.removeClass('active');
    el.addClass('active');

    //all industries list
    var allIndustries = jQuery('#all_indus_wrapper');
    var relatedIndustries = el.attr('data-category');
    allIndustries.find('li').hide();
    allIndustries.find('li[data-category="'+relatedIndustries+'"]').show();
    allIndustries.find('li[data-category="all_categories"]').show();
    if(relatedIndustries == 'all_categories'){
        allIndustries.find('li').show();
    }
}

//reopen the topNav
function reOpenNav(){
    jQuery('header').removeClass('scrolled-header');
}

/*toggle*/
function toggleNav(){
    jQuery('#site-navigation').addClass('open');
    jQuery('#close_nav').addClass('show');
    jQuery('#masthead').addClass('top');
    jQuery('body').addClass('overflow-hidden');
}
function closeNav( el){
    jQuery('#close_nav').removeClass('show');   
    jQuery('#site-navigation').removeClass('open');
    jQuery('#masthead').removeClass('top');
    jQuery('body').removeClass('overflow-hidden');
}

/* open search panel */
function openSearchPanel(){
    jQuery('.post-search-control').addClass('show');
    jQuery('#searchOffToggle').addClass('show');
}
function closeSearchPanel(){
    jQuery('.post-search-control').removeClass('show');
    jQuery('#searchOffToggle').removeClass('show');
    jQuery('#keyword').val('');
}
function scrollToBlogSearch(s){
    if ( jQuery(window).width() < 768 ){
        var windowDoc = jQuery("html, body");
        var maskContainer = jQuery('.post-search-control');
        if(s.val().length > 0){
            windowDoc.animate({ scrollTop: 1300 }, "slow");
            maskContainer.addClass('withoutMask');
        }else{
            windowDoc.animate({ scrollTop: 0 }, "slow");
            maskContainer.removeClass('withoutMask');
        }

    }
}

function objMoveAnimation() {
    jQuery(window).scroll(function(e){
        var scrollTop = jQuery(window).scrollTop();
        var docHeight = jQuery(document).height();
        var winHeight = jQuery(window).height();
        var scrollPercent = (scrollTop) / (docHeight - winHeight);
        var scrollPercentRounded = Math.round(scrollPercent*100);
        jQuery('.curve-obj').css('transform', 'translateY('+scrollPercentRounded+'%)');

    });
}

/*job form autocomeplete off*/
function applyJobFormAutoComplete(){
    var onlineApplyForm = jQuery('#aol_app_form');
    if(onlineApplyForm.length > 0){
        onlineApplyForm.find('input').attr('autocomplete', 'off');    
    }
}

/*get the uploaded file name*/
function appendOnlineApplyHeader(){
    var formContainer = jQuery('#aol_app_form');
    if(formContainer.length > 0){
        var formHeader = jQuery('#before_apply').html();
        formContainer.append(formHeader);
    }
}
jQuery(window).bind('scroll', function() {
    var allBlocks = jQuery('.service-block');
    var allListItem = jQuery('.all-services-list li');
    jQuery('.service-block').each(function() {
        var post = jQuery(this);
        var position = post.position().top - jQuery(window).scrollTop();
        
        if (position <= 0) {
            allBlocks.removeClass('selected');
            idName = post.attr('id');
            allListItem.find('a').removeClass('active');
            jQuery('a[href="#'+idName+'"]').addClass('active');
        } else {
            post.removeClass('selected');
        }
    });        
});

scrollOffset = 200;

jQuery(window).scroll(function() {
  jQuery('.reveal-wrapper').each(function() {
    var myPosit = jQuery(window).scrollTop() + jQuery(this).position().top - jQuery(window).height() / 2 + jQuery(this).height() / 2;
    if (jQuery(window).scrollTop() + jQuery(window).height() >= myPosit && jQuery(window).scrollTop() < myPosit + jQuery(this).height()) {

      if (!jQuery(this).hasClass('revealed')) {
        jQuery(this).addClass('revealed');
      }
    } else if (jQuery(this).hasClass('revealed')) {

      jQuery(this).removeClass('revealed');

    }
  });
});

jQuery(window).load(function() {
    jQuery('.open-page').addClass('de-activated');
});


/* Ready function */
jQuery(document).ready(function($) {

    


    /*smooth links animation on services landing page*/
    $("a.list-item").on("click", function(e) {
      e.preventDefault();
      history.pushState({}, "", this.href);
    });
    /*end*/

    if($(window).width() < 769){
        var showChar = 350;
        var ellipsestext = "...";
        var moretext = "more";
        var lesstext = "less";
        $('.review-detail').each(function() {
            var content = $(this).html();
            if(content.length > showChar) {
                var c = content.substr(0, showChar);
                var h = content.substr(showChar-1, content.length - showChar);
                var html = c + '<span class="moreelipses">'+ellipsestext+'</span>&nbsp;<span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<button class="morelink">'+moretext+'</button></span>';
                $(this).html(html);
            }
        });
        $(".morelink").click(function(){
            if($(this).hasClass("less")) {
                $(this).removeClass("less");
                $(this).html(moretext);
            } else {
                $(this).addClass("less");
                $(this).html(lesstext);
            }
            $(this).parent().prev().toggle();
            $(this).prev().toggle();
            return false;
            console.log($(this).parent().prev());
        }); 
    }

    $('#clear_search').on('click', function(){
        clearSearch();
    });

    $('.reveal-effact, .aol-archive a').on('click', function(){
        $('.page-reveal').addClass('active');
    });

    appendOnlineApplyHeader();

    $('input[name="_aol_app_upload_resume"], input[name="_aol_app_upload_cover"]').change(function(e){
        var fileName = e.target.files[0].name;
        var parentDiv = $(this).parent('.form-group');
        parentDiv.find('span').remove();

        parentDiv.append('<span>'+fileName+'</span>');
    });

    applyJobFormAutoComplete(); //apply autocomplete off on online job form's elements
    objMoveAnimation();

    if ( jQuery(window).width() > 767 ){
        var rellax = new Rellax('.rellax', {
            center: true
        });
    }
    
    $('.post-search-control .control').on('input', function(){
        scrollToBlogSearch($(this));
    });

    $('#toggle').on('click', function(e){
        toggleNav( $(this) );
    });

    $('#close_nav').on('click', function(e){
        closeNav();
    });

    $('#searchOffToggle').on('click', function(){
        closeSearchPanel();
    });

    $('.search-navigator').on('click', function(){
        openSearchPanel();    
    });

    $('.nav-toggle').on('click', function(e){
        reOpenNav();
    });

    $('.category-list ul li').on('click', function(){
        showCurrent_category( $(this) );
    });

    $('.show-me-strip h2#category_title').on('click', function(){
        showAllCategories_list( $(this) ); 
    });

    $('.post-search-control #keyword').on('input', function(){
        hidePostsOnSearch( $(this).val() );
    });

    $('.post-search-control #keyword').change(function(){
        hidePostsOnSearch( $(this).val() );
    });

    stepActiveByDefault();
    $('.steps-wrapper ul li .circle').on('mouseover', function() {
        stepActiveOnHover($(this));
    });

    $('.steps-wrapper ul li .step').on('mouseover', function() {
        stepActiveOnClick($(this));
    });

    $('.dropdown ul li').on('click', function(){
        activated_customDropdown_item( $(this) );    
    });

    clientCarousel(); //Client brands carousel

    featuredPost_slider(); //Featured post slider

    careersCarousel(); //Careers carousel

    relatedProjectsCarousel(); //Related projects carousel

    scrollODC();

    tabActiveByDefault();

    $('#service_title').on('click', function(){
        allServices($(this));
    });

    $('.detail-header h1.entry-title, .reach-and-development .detail-header h1').on('click', function(){
        allServices();
    });

    $('.tab-list ul li').hover( function() {
        listTabActiveOnHover( $(this) );
    });

    $('.services-nav ul li a').click(function() {
        serviceNavScrollTop( $(this) );
    });

    $('#all_cats').find('li').on('click', function(){
        var indusActiveElement = $('#all_indus');
        indusActiveElement.empty();
        indusActiveElement.text('All industries');
    });
    
    $('.grid-wrapper').isotope({
        // options
        itemSelector: '.element-item',
        layoutMode: 'fitRows'
      });

    $('.category-list').find('li').click(function(){
        var selector = $(this).attr('data-filter');
        $('.grid-wrapper').isotope({
            filter: selector
        });
        return false;
    });
    value_features_content_height(_view);

    service_post_type_content_height(_view);

    research_and_development_content_height(_view);

    safe_pare_content_height(_view);

});

/**
 * WINDOW RESIZE FUNCTION STARTS
 */
jQuery(window).on('resize', function () {
    var re_windowWidth = window.innerWidth || jQuery(window).width();
    var re_view = 0;
    if (re_windowWidth < 401) re_view = 1;
    else if (re_windowWidth >= 401 && re_windowWidth < 501) re_view = 2;
    else if (re_windowWidth >= 501 && re_windowWidth < 768) re_view = 3;
    else if (re_windowWidth >= 768 && re_windowWidth < 991) re_view = 4;
    else if (re_windowWidth >= 991 && re_windowWidth < 1200) re_view = 5;
    else re_view = 6;

    //little delay after resize
    setTimeout(function(){

        /*---Value Features content height----*/
        value_features_content_height(re_view);

        /*---Services posty type content content height----*/
        service_post_type_content_height(re_view);
        research_and_development_content_height(re_view);
        safe_pare_content_height(re_view);

        if (_view != re_view) {
            /** 
             * keep View and WindowWidth variables at the end of if
             */
            _view = re_view;
            _windowWidth = re_windowWidth;

        }//IF BREAKPOINT MEETS
    },250);
    //little delay after resize

    scrollODC();


    clientCarousel(); //client brands carousel
    careersCarousel(); //career carousel

});
//WINDOW RESIZE ENDS