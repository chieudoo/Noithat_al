$(document).ready(function(){

	$('ul.nav.navbar-nav.navbar-right li').hover(function(){
		$(this).find('ul').slideDown(500,'easeInOutQuad','easeOutBounce');
	},function(){
		$(this).find('ul').hide();
	});
	$('ul.nav.navbar-nav.navbar-right li ul li').find('ul').css({
		left : '100%',
		top : '0%'
	});

	// $('.menu-left ul li').hover(function(){
	// 	$(this).find('ul').slideDown(500,'easeInOutQuad');
	// },function(){
	// 	$(this).find('ul').slideUp(500,'easeInOutQuad');
	// });

	// $(window).resize(function() {
	// 	var h=$(window).height();
	// 	console.log(h);
	// });

	// if($('nav.navbar.navbar-default.navbar-fixed-top').offset().top > 140){
	// 	$('nav.navbar.navbar-default.navbar-fixed-top').addClass('navbar-scroll-min');
	// }

	// $(window).resize(function(event) {
	// 	var h=$(window).height();
	// 	$('.banner').css('height',h);
	// });
	// $(window).scroll(function(){
	// 	var h=$('nav.navbar.navbar-default.navbar-fixed-top').offset().top;// vi tri cua navbar
	// 	console.log(h);
	// 	if(h > 140){
	// 		$('nav.navbar.navbar-default.navbar-fixed-top').addClass('navbar-scroll-min');
	// 	}else{
	// 		$('nav.navbar.navbar-default.navbar-fixed-top').removeClass('navbar-scroll-min');
	// 	}
	// });

	// $('.contro').click(function(){
	// 	$('body').animate({scrollTop:$('.about').offset().top},2000,"easeInOutQuad");//cuon toi vi tri cua class about
	// 	return false;
	// });

	
});