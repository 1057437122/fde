<?php
#
?>
<div class="clr"></div>
</div><!--main-->
<div class="h_left" style="height:92px;"></div>
<div class="footer">
	<div class="link">
		 <div><span><a href="www.baidu.com">百度</a></span></div>
	</div><!--link-->
	<div class="police">
		<div class="cominfo">版权所有 山东东阿阿胶股份有限公司版权所有 鲁ICP备05035033号</div>
		<div class="">Copyright 2008 donggeejiao.com All Rights Reserved 站长统计站长统计</div>
	</div><!--police -->
</div><!--footer-->
<div class="h_right" style="height:92px;"></div>
</div><!--page-->
</body>
</html>
<?php if(is_home() || is_front_page()){ //if is index show the slider ?>
	
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/slides.jquery.js"></script>
<?php }elseif(is_single()){?>

	<script type="text/javascript" src="<?php bloginfo('template_directory');?>/js/zoom.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory');?>/js/common.js"></script>
<?php 
} 
?>