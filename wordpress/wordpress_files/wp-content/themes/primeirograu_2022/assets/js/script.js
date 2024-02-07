jQuery(function($){
    $('#control-nav').change(function(){
        
        if ($(this).is(':checked')) {
            $('body').css({display:'block',position:'relative',left:'46vh'});
            $('.control-nav').css({display:'none'});
            $('.control-nav-close').css({position:'fixed', display:'block'});

        } else {
            $('body').css({display:'block',position:'relative',left:'0%'});
            $('.control-nav').css({display:'block'});
            $('.control-nav-close').css({display:'none'});
        }

        if ($(window).width() < 768) {
            if($(this).is(':checked')) {                                                                 
                $('body').css({display:'block',position:'relative',left:'51vh'});
                
            } else {
                $('body').css({left:'0%'});
            }

        } 
        if ($(window).width() < 576) {
            if($(this).is(':checked')) {                                                                 
                $('body').css({display:'block',position:'relative',left:'0%'});
                
            } else {
                $('body').css({display:'block',position:'relative',left:'0%'});
            }
        } 
    });

    if ($(window).width() < 576) {
            
        $('.links-topo li').remove().insertAfter($("#menu-menu-principal li:last-child"));

    }; 

    $(document).on('keydown', function(event) {
        if (event.key == "Escape") {
            $('#control-nav').prop('checked', false);
            $('body').css({display:'block',position:'relative',left:'0%'});
            $('.control-nav').css({display:'block'});
            $('.control-nav-close').css({display:'none'});
        }
    });

    // $('nav').click(function(){
    //     $('#control-nav').prop('checked', false);
    //     $('body').css({display:'block',position:'relative',left:'0%'});
    //     $('.control-nav').css({display:'block'});
    //     $('.control-nav-close').css({display:'none'});
    // });

    window.onload = function(){

        $('.pushy-interno .menu-item-has-children').children().each(function(){
            $(this).removeAttr("href");
        });
        $('.links-topo .menu-item-has-children').children().each(function(){
            $(this).removeAttr("href");
        });

        $('.slider-indicators button:first').each(function(){
            $(this).addClass("active");
        });

        $('.links-extra span:last').each(function(){
            $(this).css({display:'none'});
        });

        $('.links-topo .menu-item-has-children > a:first-child').each(function(){
            $(this).append("<span class='seta'>&#9660</span>");
        });
        $('.pushy-interno .menu-item-has-children > a:first-child').each(function(){
            $(this).append("<span class='seta1'>&#9660</span>");
        });

    }; 

 $('#misha_loadmore').click(function(){
 
		$.ajax({
			url : misha_loadmore_params.ajaxurl, // AJAX handler
			data : {
				'action': 'loadmorebutton', // the parameter for admin-ajax.php
				'query': misha_loadmore_params.posts, // loop parameters passed by wp_localize_script()
				'page' : misha_loadmore_params.current_page // current page
			},
			type : 'POST',
			beforeSend : function ( xhr ) {
				$('#misha_loadmore').text('Por Favor Aguarde...'); // some type of preloader
			},
			success : function( posts ){
				if( posts ) {
                    if(posts && posts.trim().length == 0){
                        $('#misha_loadmore').hide();
                        return
                    }
					$('#misha_loadmore').text( 'Ver mais notícias' );
                    if(misha_loadmore_params.current_page == 1){
					 $('#misha_posts_wrap .outras-noticias').html( posts ); // insert new posts
                    }else{
                        $('#misha_posts_wrap .outras-noticias').append( posts ); // add new posts
                    }
					misha_loadmore_params.current_page++;
				} else {
					$('#misha_loadmore').hide(); // if no data, HIDE the button as well
				}
			}
		});
		return false;
	});
    

});

