var scrollFunc = function(e) {
	e = e || window.event;
	var os = document.querySelectorAll(".situdy");
	var ui = document.querySelectorAll(".dahe1img");
	var Ofset = document.querySelectorAll(".situdy")[0].offsetHeight;
	// console.log(Ofset);
	var scH = document.documentElement.scrollTop;
	// console.log(scH);
	var scre = window.innerHeight;
	// console.log(scre);
	var scollH = scH + scre;
	if (e.wheelDelta) { //判断浏览器IE，谷歌滑轮事件
		if (e.wheelDelta > 0) { //当滑轮向上滚动时
			// console.log(scollH);
			// console.log(e.wheelDelta);
		}
		if (e.wheelDelta < 0) { //当滑轮向下滚动时
			// console.log(e.wheelDelta);
			console.log(scollH);
			for (var i = 0; i < 4; i++) {
				let cs = i;
				if (os[i].offsetTop <= scollH) {
					os[i].style.transition = "all 1.5s";
					os[cs].style.transitionDelay = cs / 4 + "s";
					os[i].style.transform = "translateY(-100px)";
					os[i].style.display = "block";
					os[i].style.opacity = "1";
				}
			}
		}
	}
}
//给页面绑定滑轮滚动事件
if (document.addEventListener) { //火狐使用DOMMouseScroll绑定
	document.addEventListener('DOMMouseScroll', scrollFunc, false);
}
//其他浏览器直接绑定滚动事件
window.onmousewheel = document.onmousewheel = scrollFunc;