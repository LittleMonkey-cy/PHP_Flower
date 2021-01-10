// 分类图片栏动效
var pics = document.getElementsByClassName('class_pic');
for (var i = 0; i < pics.length; i++) {
	pics[i].onmouseover = function () {
		this.style.color = '#fff';
	};
	pics[i].onmouseout = function () {
		this.style.color = '#000';
	}
}