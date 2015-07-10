(function( $ ) {
  $.fn.keepRatio = function(which) {
      var $this = $(this);
      var w = $("#sequence").width();
      var h = $("#sequence").height();
      var ratio = w/h;
      $(window).resize(function() {
          switch(which) {
              case 'width':
                  var nh = $this.width() / ratio;
                  $this.css('height', nh + 'px');
                  break;
              case 'height':
                  var nw = $this.height() * ratio;
                  $this.css('width', nw + 'px');
                  break;
          }
      });
  
  }
})( jQuery );      
    
jQuery(document).ready(function($){
    $('#sequence').keepRatio('width');
    $('#sequence-theme').keepRatio('width');
});
	
jQuery(document).ready(function($) {


var $container = $('.masonry-container');
$container.imagesLoaded( function () {
  $container.masonry({
    columnWidth: '.item',
    itemSelector: '.item'
  });   
});

	
	/*============================================
	ScrollTo Links
	==============================================*/
	$('a.scrollto').click(function(e){
		$('html,body').scrollTo(this.hash, this.hash, {gap:{y:-80},animation:  {easing: 'easeInOutCubic', duration: 1600}});
		e.preventDefault();

		if ($('.navbar-collapse').hasClass('in')){
			$('.navbar-collapse').removeClass('in').addClass('collapse');
		}
	});
	
	
	/*============================================
	Filter Projects
	==============================================*/
	$('#filter-works a').click(function(e){
		e.preventDefault();

		$('#filter-works li').removeClass('active');
		$(this).parent('li').addClass('active');

		var category = $(this).attr('data-filter');

		$('.project-item').each(function(){
			if (category=='*'){
				$(this).removeClass('filtered').removeClass('selected');
				return;
			}
			else if($(this).is(category)){
				$(this).removeClass('filtered').addClass('selected');
			}
			else{
				$(this).removeClass('selected').addClass('filtered');
			}

		});

	});
	
	
	/*Colorbox*/
	$(".enlarge").colorbox({ maxWidth:"85%", maxHeight:"85%"});
	$(".colorbox").colorbox({maxWidth:"85%", maxHeight:"85%"});
	$(".colorbox-video").colorbox({iframe:true,  innerWidth:1200, innerHeight:675,maxWidth:"85%", maxHeight:"85%"});
	
	$('.news-media.gallery').each(function(i){
		$(this).find(".colorbox").colorbox({rel:'group'+i,maxWidth:"85%", maxHeight:"85%"});
	});
	
	/*============================================
	Tooltips
	==============================================*/
	$("[data-toggle='tooltip']").tooltip({container: 'body'});
	
	/*============================================
	Social Share
	==============================================*/	
	if($(".social-media").length){

		var shareTitle = $(".social-media").data('title') ? $(".social-media").data('title') : $('.page-title').text();
		
		$('.social-media').socialLikes({
			counters: false,
			title: shareTitle
		});
	}
	
	/*============================================
	Placeholder Detection
	==============================================*/
	if (!Modernizr.input.placeholder) {
		$('#contact-form').addClass('no-placeholder');
	}
	
	/*============================================
	Responsive Submenu
	==============================================*/
	$('.submenu').children('a').click(function(e){
    
		var $submenu = $(this).siblings('ul');

		if($(window).width()<768){
			e.preventDefault();
			
			if($submenu.is('.open')){
				$submenu.removeClass('open').slideUp();
			}else{
				$submenu.addClass('open').slideDown();
			}
			
		}

	});

	/*============================================
	Scrolling Animations
	==============================================*/
	$('.scrollimation').waypoint(function(){
		$(this).toggleClass('in');
	},{offset:'80%'});





	
	$('.projects-container.scrollimation').waypoint(function(){
		var i = 1,
		delay = [];
		$(this).find('.project-thumb').each(function(i){
			i++;
			var elem = $(this);
			delay[i] = setTimeout(function(){
				elem.addClass('in');
			},200*i);
		})
	},{offset:'70%'});
	
	$('.iphones-wrapper.scrollimation').waypoint(function(){
		$(this).find('.iphone-landscape-frame').addClass('in');
	},{offset:'60%'});
	
	/*============================================
	Resize Functions
	==============================================*/
	$(window).resize(function(){
		scrollSpyRefresh();
		waypointsRefresh();
	});
	/*============================================
	Refresh scrollSpy function
	==============================================*/
	function scrollSpyRefresh(){
		setTimeout(function(){
			$('body').scrollspy('refresh');
		},1000);
	}

	/*============================================
	Refresh waypoints function
	==============================================*/
	function waypointsRefresh(){
		setTimeout(function(){
			$.waypoints('refresh');
		},1000);
	}

	/*============================================
	Load Post
	==============================================*/
	$('.ajax-blog .read-more').click(function(e){
		e.preventDefault();
		
		var $this = $(this),
			postLink = $(this).attr('href');
		
		if($this.is('.loading')){
			return false;
		}
		
		$this.animate({opacity:0},200,function(){
			$this.addClass('loading').text('Loading');
			$this.animate({opacity:1},200);
		});
		
		$.get(postLink, function(data){
		
			var postContent = $(data).find('.post-content, .post-footer'),
				$thePost = 	$this.parents('.col-sm-10');
			
			$thePost.append('<div class="ajax-content" style="display:none;"></div>');
			$thePost.find('.ajax-content').html(postContent);
			$thePost.find('.ajax-content .post-excerpt, .ajax-content .posts-nav').remove();
			
			var shareTitle = $thePost.find(".social-media").data('title') ? $thePost.find(".social-media").data('title') : $thePost.find('.post-title').text();
			
			$thePost.find('.social-media').socialLikes({
				counters: false,
				title: shareTitle,
				url: postLink
			});
			
			setTimeout(function(){
				$thePost.find('.ajax-content').slideDown(500);
				
				$thePost.parents('.post').addClass('loaded');
				$this.parents('footer').animate({'height':0,'opacity':0},500,function(){$(this).remove()});
			},500);
		
		});
		
	});
	
});	