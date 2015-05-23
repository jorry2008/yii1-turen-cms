/* 
 * Documentation specific JS script
 */
$(function(){
    var slideToTop = $("<div />");
    slideToTop.html('<i class="fa fa-chevron-up"></i>').css({
        position: 'fixed',
        bottom: '20px',
        right: '25px',
        width: '40px',
        height: '40px',
        color: '#eee',
        'font-size': '',
        'line-height': '40px',
        'text-align': 'center',
        'background-color': '#222d32',
        cursor: 'pointer',
        'border-radius': '5px',
        'z-index': '99999',
        opacity: '.7',
        'display': 'none'
    }).on('mouseenter', function(){
        $(this).css('opacity', '1');
    }).on('mouseout', function(){
        $(this).css('opacity', '.7');
    }).click(function(){
        $('body,html').animate({
            scrollTop: 0
        }, 500);
		return false;
    });
	
    $('.wrapper').append(slideToTop);
    $(window).scroll(function(){
        if ($(window).scrollTop() >= 150) {
            if (!$(slideToTop).is(':visible')) {
                $(slideToTop).fadeIn(500);
            }
        } else {
            $(slideToTop).fadeOut(500);
        }
    });
	
	/*
    $(".sidebar-menu li a").click(function(){
		console.debug('abc');
        var $this = $(this);
        var target = $this.attr("href");
        if (typeof target === 'string') {
            $("body").animate({
                scrollTop: ($(target).offset().top) + "px"
            }, 500);
        }
    });
    */
});
