$(document).ready(function(){
	$(".container_header ul li").mouseover(function(){
		curLi=$(this);
		intervalID=setInterval(showItem,250);
	});
	function showItem(){
		$(".cur_sub").removeClass("cur_sub");
		$(".sub_con").eq($(".container_header ul li").index(curLi)).addClass("cur_sub");
		$(".container_header ul li.on").removeClass("on");
		$(".container_header ul li").eq($(".container_header ul li").index(curLi)).addClass("on");
	}
	$(".container_header ul li").mouseout(function(){ 
		clearInterval(intervalID); 
	}); 
})