// window.setInterval()  一直执行
// window.setTimeout() 定时执行一次

// 绑定轮播循环

var loop_num = 0;
window.setInterval(function () {
	loop_num++;
	if (loop_num > 3) {
		loop_num = 1;
	}
	document.getElementById('loop_view').style.backgroundImage = 'url(src/img/loop_' + loop_num + '.jpg)';
}, 4000);