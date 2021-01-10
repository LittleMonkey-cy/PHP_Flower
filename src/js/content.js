// 加载图片展示区的动效 js
var pl = document.getElementsByClassName('pics_left');
var pr = document.getElementsByClassName('pics_right');
var ps = document.getElementsByClassName('pics_single');

function pic_change(obj) {
	for (var i = 0; i < obj.length; i++) {
		obj[i].onmouseover = function () {
			this.style.opacity = '0.5';
		}
		obj[i].onmouseout = function () {
			this.style.opacity = '1';
		}
	}
}
pic_change(pl);
pic_change(pr);
pic_change(ps);