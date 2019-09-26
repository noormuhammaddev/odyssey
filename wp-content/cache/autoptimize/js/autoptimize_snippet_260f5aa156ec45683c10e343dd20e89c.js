var _windowWidth=window.innerWidth||jQuery(window).width();var _view=0;if(_windowWidth<401)_view=1;else if(_windowWidth>=401&&_windowWidth<501)_view=2;else if(_windowWidth>=501&&_windowWidth<768)_view=3;else if(_windowWidth>=768&&_windowWidth<991)_view=4;else if(_windowWidth>=991&&_windowWidth<1200)_view=5;else _view=6;function genericSetHeightForAllSiblings(allItems,newWindowView,autoBreakPoint){var highestItem;for(i=0;i<allItems.length;i++){highestItem=0;for(j=0;j<allItems[i].length;j++){if(newWindowView>autoBreakPoint){allItems[i].each(function(){jQuery(this).css('min-height','auto');var thisHeight=jQuery(this).height();if(thisHeight>highestItem)
highestItem=thisHeight;});allItems[i].each(function(){jQuery(this).css('min-height',highestItem);});}
else{allItems[i].each(function(){jQuery(this).css('min-height','auto');});}}}}
function value_features_content_height(newWindowView){var container=jQuery('.our-value-features-container').find('.feature-wrap'),allItems=[];if(container.length>0){allItems.push(container.find('h4'));allItems.push(container.find('h4 + p'));genericSetHeightForAllSiblings(allItems,newWindowView,3);}}
function research_and_development_content_height(newWindowView){var container=jQuery('.posts-wrapper, .after-search'),allItems=[];if(container.length>0){allItems.push(container.find('h3'));genericSetHeightForAllSiblings(allItems,newWindowView,0);}}
function safe_pare_content_height(newWindowView){var container=jQuery('.who-we-are'),allItems=[];if(container.length>0){allItems.push(container.find('p'));genericSetHeightForAllSiblings(allItems,newWindowView,0);}}
function service_post_type_content_height(newWindowView){var container=jQuery('.services-wrapper').find('.service-block'),allItems=[];if(container.length>0){allItems.push(container.find('h4'));allItems.push(container.find('p.ser-content'));genericSetHeightForAllSiblings(allItems,newWindowView,3);}}
function stepActiveByDefault(){jQuery('.steps-wrapper ul li:nth-child(3)').addClass('active');jQuery('.steps-description-container').find('#c3_content').show();}
function tabActiveByDefault(){jQuery('.tab-list ul li:nth-child(2)').addClass('active');jQuery('.content-wrapper .tabs-data:nth-child(2)').show();}
function listTabActiveOnHover(el){var elementID=el.attr('id');var allItems=jQuery('.tab-list ul li');var allTabContents=jQuery('.content-wrapper .tabs-data');allItems.removeClass('active');el.addClass('active');allTabContents.hide();jQuery('#'+elementID+'_content').show();}
function stepActiveOnHover(el){var className=jQuery(el).attr('class').split(' ')[1];var stepLi=jQuery('.steps-wrapper ul li');var currentEl=jQuery(el).parent('li');stepLi.removeClass('active');currentEl.addClass('active');jQuery('.steps-description-container .steps-description').hide();jQuery('#'+className+'_content').fadeIn(1000);}
function stepActiveOnClick(el){var allList=jQuery('.steps-wrapper ul li');var currentLi=el.parents('li');var className=currentLi.attr('class').split(' ')[0];console.log(className);allList.removeClass('active');currentLi.addClass('active');jQuery('.steps-description-container .steps-description').hide();jQuery('#'+className+'_content').fadeIn(1000);}
function stopCarousel(){var owl=$('#client-brands.owl-carousel');owl.trigger('destroy.owl.carousel');owl.addClass('off');}
function clientCarousel(){var client_brands=jQuery('#client-brands');if(client_brands.length>0){if(jQuery(window).width()>768){client_brands.removeClass('without-carousel');client_brands.owlCarousel({loop:true,margin:10,nav:true,responsive:{0:{items:1,},600:{items:3},1000:{items:4}}})}else{client_brands.owlCarousel('destroy').addClass('without-carousel');}}}
function reviewsCarousel(){var reviews_slider=jQuery('#reviews-slider');if(reviews_slider.length>0){reviews_slider.owlCarousel({loop:true,margin:10,nav:true,autoplayTimeout:1000,responsive:{0:{items:1},767:{items:1,},1000:{items:1}}})}}
function featuredPost_slider(){jQuery(".blog-slider .owl-carousel").owlCarousel({items:1,loop:true,mouseDrag:true,touchDrag:true,pullDrag:false,rewind:false,autoplay:false,margin:0,nav:true,});}
function careersCarousel(){jQuery(".career-carousel .owl-carousel").owlCarousel({items:4,loop:true,mouseDrag:false,touchDrag:true,pullDrag:false,rewind:false,autoplay:false,margin:0,nav:true,stagePadding:50,responsive:{0:{items:1},767:{items:3,},1000:{items:4}}});}
function scrollODC(){if(jQuery(window).width()>767){var lastScrollTop=0;jQuery(window).scroll(function(event){var st=jQuery(this).scrollTop();var headr=jQuery('header');var toggle=headr.find('.nav-toggle');if(st>800){if(st>lastScrollTop){headr.addClass('scrolled-header');}else{headr.removeClass('scrolled-header');}}
lastScrollTop=st;});}}
function allServices(){jQuery('body').toggleClass('active-all-services');}
function serviceNavScrollTop(el){var sectionTo=el.attr('href');var allItems=jQuery('.services-nav ul li a');jQuery('html, body').animate({scrollTop:jQuery(sectionTo).offset().top-180},800);allItems.removeClass('active');el.addClass('active');}
function showAllCategories_list(el){el.toggleClass('open');jQuery('.category-list').slideToggle();}
function showCurrent_category(el){var current_ategory=el.find('.category-name').text();var show_active_cat=jQuery('#active_category');var after_search=jQuery('.after-search');var actual_posts=jQuery('.posts-wrapper.grid');show_active_cat.empty();show_active_cat.text(current_ategory);actual_posts.show();after_search.hide();jQuery('#keyword').val('');}
function hidePostsOnSearch(value){var after_search=jQuery('.after-search');var actual_posts=jQuery('.posts-wrapper.grid');if(value.length>0){actual_posts.hide();after_search.show();}
else{actual_posts.show();after_search.hide();}}
function activated_customDropdown_item(el){var selectedItem=el.text();var openedDropDown=el.parents('.dropdown');var activeItemWrap=el.parents('.custom-dropdown').find('.selected-item');var allOtherItems=openedDropDown.find('li');activeItemWrap.empty();activeItemWrap.text(selectedItem);allOtherItems.removeClass('active');el.addClass('active');var allIndustries=jQuery('#all_indus_wrapper');var relatedIndustries=el.attr('data-category');allIndustries.find('li').hide();allIndustries.find('li[data-category="'+relatedIndustries+'"]').show();allIndustries.find('li[data-category="all_categories"]').show();if(relatedIndustries=='all_categories'){allIndustries.find('li').show();}}
function reOpenNav(){jQuery('header').removeClass('scrolled-header');}
function toggleNav(){jQuery('#site-navigation').addClass('open');jQuery('#close_nav').addClass('show');jQuery('#masthead').addClass('top');jQuery('body').addClass('overflow-hidden');}
function closeNav(el){jQuery('#close_nav').removeClass('show');jQuery('#site-navigation').removeClass('open');jQuery('#masthead').removeClass('top');jQuery('body').removeClass('overflow-hidden');}
function openSearchPanel(){jQuery('.post-search-control').addClass('show');jQuery('#searchOffToggle').addClass('show');}
function closeSearchPanel(){jQuery('.post-search-control').removeClass('show');jQuery('#searchOffToggle').removeClass('show');}
function scrollToBlogSearch(s){if(jQuery(window).width()<768){var windowDoc=jQuery("html, body");var maskContainer=jQuery('.post-search-control');if(s.val().length>0){windowDoc.animate({scrollTop:1300},"slow");maskContainer.addClass('withoutMask');}else{windowDoc.animate({scrollTop:0},"slow");maskContainer.removeClass('withoutMask');}}}
function objMoveAnimation(){jQuery(window).scroll(function(e){var scrollTop=jQuery(window).scrollTop();var docHeight=jQuery(document).height();var winHeight=jQuery(window).height();var scrollPercent=(scrollTop)/(docHeight-winHeight);var scrollPercentRounded=Math.round(scrollPercent*100);jQuery('.curve-obj').css('transform','translateY('+scrollPercentRounded+'%)');});}
function applyJobFormAutoComplete(){var onlineApplyForm=jQuery('#aol_app_form');if(onlineApplyForm.length>0){onlineApplyForm.find('input').attr('autocomplete','off');}}
function appendOnlineApplyHeader(){var formContainer=jQuery('#aol_app_form');if(formContainer.length>0){var formHeader=jQuery('#before_apply').html();formContainer.append(formHeader);}}
jQuery(window).bind('scroll',function(){var allBlocks=jQuery('.service-block');var allListItem=jQuery('.all-services-list li');jQuery('.service-block').each(function(){var post=jQuery(this);var position=post.position().top-jQuery(window).scrollTop();if(position<=0){allBlocks.removeClass('selected');idName=post.attr('id');allListItem.find('a').removeClass('active');jQuery('a[href="#'+idName+'"]').addClass('active');}else{post.removeClass('selected');}});});scrollOffset=200;jQuery(window).scroll(function(){jQuery('.reveal-wrapper').each(function(){var myPosit=jQuery(window).scrollTop()+jQuery(this).position().top-jQuery(window).height()/2+jQuery(this).height()/2;if(jQuery(window).scrollTop()+jQuery(window).height()>=myPosit&&jQuery(window).scrollTop()<myPosit+jQuery(this).height()){if(!jQuery(this).hasClass('revealed')){jQuery(this).addClass('revealed');}}else if(jQuery(this).hasClass('revealed')){jQuery(this).removeClass('revealed');}});});jQuery(window).on('load',function(){AOS.refresh();});jQuery(document).ready(function($){$('.reveal-effact, .aol-archive a').on('click',function(){$('.page-reveal').addClass('active');});$('.open-page').addClass('de-activated');appendOnlineApplyHeader();$('input[name="_aol_app_upload_resume"], input[name="_aol_app_upload_cover"]').change(function(e){var fileName=e.target.files[0].name;var parentDiv=$(this).parent('.form-group');parentDiv.find('span').remove();parentDiv.append('<span>'+fileName+'</span>');});applyJobFormAutoComplete();objMoveAnimation();new WOW().init();var rellax=new Rellax('.rellax',{center:true});AOS.init({startEvent:'load',once:true});$('.post-search-control .control').on('input',function(){scrollToBlogSearch($(this));});$('#toggle').on('click',function(e){toggleNav($(this));});$('#close_nav').on('click',function(e){closeNav();});$('#searchOffToggle').on('click',function(){closeSearchPanel();});$('.search-navigator').on('click',function(){openSearchPanel();});$('.nav-toggle').on('click',function(e){reOpenNav();});$('.category-list ul li').on('click',function(){showCurrent_category($(this));});$('.show-me-strip h2').on('click',function(){showAllCategories_list($(this));});$('.post-search-control #keyword').on('input',function(){hidePostsOnSearch($(this).val());});stepActiveByDefault();$('.steps-wrapper ul li .circle').on('mouseover',function(){stepActiveOnHover($(this));});$('.steps-wrapper ul li .step').on('mouseover',function(){stepActiveOnClick($(this));});$('.dropdown ul li').on('click',function(){activated_customDropdown_item($(this));});clientCarousel();reviewsCarousel();featuredPost_slider();careersCarousel();scrollODC();tabActiveByDefault();$('.detail-header h1.entry-title, .reach-and-development .detail-header h1').on('click',function(){allServices();});$('.tab-list ul li').hover(function(){listTabActiveOnHover($(this));});$('.services-nav ul li a').click(function(){serviceNavScrollTop($(this));});$('#all_cats').find('li').on('click',function(){var indusActiveElement=$('#all_indus');indusActiveElement.empty();indusActiveElement.text('All industries');});value_features_content_height(_view);service_post_type_content_height(_view);research_and_development_content_height(_view);safe_pare_content_height(_view);});jQuery(window).on('resize',function(){var re_windowWidth=window.innerWidth||jQuery(window).width();var re_view=0;if(re_windowWidth<401)re_view=1;else if(re_windowWidth>=401&&re_windowWidth<501)re_view=2;else if(re_windowWidth>=501&&re_windowWidth<768)re_view=3;else if(re_windowWidth>=768&&re_windowWidth<991)re_view=4;else if(re_windowWidth>=991&&re_windowWidth<1200)re_view=5;else re_view=6;setTimeout(function(){value_features_content_height(re_view);service_post_type_content_height(re_view);research_and_development_content_height(re_view);safe_pare_content_height(re_view);if(_view!=re_view){_view=re_view;_windowWidth=re_windowWidth;}},250);scrollODC();clientCarousel();careersCarousel();});