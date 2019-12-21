var swiper = new Swiper('.swiper-container', {
	pagination: '.swiper-pagination',
	nextButton: '.swiper-button-next',
	prevButton: '.swiper-button-prev',
	paginationClickable: true,
	spaceBetween: 30,
	centeredSlides: true,
	autoplay: 2500,
	autoplayDisableOnInteraction: false
});
 
window.onscroll=function(){
	var t=document.documentElement.scrollTop||document.body.scrollTop;
	var hezi1=document.getElementsByClassName("donghua1")[0];
	var hezi2=document.getElementsByClassName("donghua2")[0];
	var hezi3=document.getElementsByClassName("donghua3")[0];
	var hezi4=document.getElementsByClassName("donghua4")[0];
	
	
	if(t>200){
		hezi1.style.animation="donghua1 2s";
		hezi2.style.animation="donghua1 2s";
		hezi2.style.animationDelay=".2s";
		hezi3.style.animation="donghua1 2s";
		hezi3.style.animationDelay=".4s";
		hezi4.style.animation="donghua1 2s";
		hezi4.style.animationDelay=".6s";
	}
	var odiv1=document.getElementsByClassName("dahe1img")[0];
	var odiv2=document.getElementsByClassName("neirong_x_img")[0];
	var tupian1=odiv1.firstElementChild;
	var tupian2=odiv2.firstElementChild;
	if(t>800){
		tupian1.style.animation="donghua2 .5s";
		tupian2.style.animation="donghua2 .5s";
		tupian2.style.animationDelay=".3s"
	}
	
}


//导航栏 


















