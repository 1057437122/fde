<?php $need_js=TRUE; ?>
<div class="products">
	<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
		
	<div class="product_title"><?php the_title(); ?></div>
	<hr>
	<?php $ret=get_show_pics();//the pictures uploaded must be more than 3 ~otherwise... ?>
	<div class="product_info">
		<div class="author"><?php the_author(); ?></div>
		<div class="date"><?php the_date('Y-m-d'); ?></div>
		<div class="cat"><?php the_category(','); ?></div>
		<div class="clr"></div>
	</div>
	<div class="pre_view">
		<div id="preview">
			<div class="jqzoom" id="spec-n1" onClick=""><IMG height=350
			src="images/img04.jpg" jqimg="images/img04.jpg" width=350>
			</div>
			<div id="spec-n5">
				<div class="control" id="spec-left">
					<img src="images/left.gif" />
				</div>
				<div id="spec-list">
					<ul class="list-h">
						<li><img src="<?php echo $ret[0];?>"> </li>
						<li><img src="<?php echo $ret[1];?>"> </li>
						<li><img src="<?php echo $ret[2];?>"> </li>
						
					</ul>
				</div>
				<div class="control" id="spec-right">
					<img src="images/right.gif" />
				</div>
				
			</div>
		</div>
<SCRIPT type=text/javascript>
	$(function(){			
	   $(".jqzoom").jqueryzoom({
			xzoom:400,
			yzoom:400,
			offset:10,
			position:"right",
			preload:1,
			lens:1
		});
		$("#spec-list").jdMarquee({
			deriction:"left",
			width:350,
			height:56,
			step:2,
			speed:4,
			delay:10,
			control:true,
			_front:"#spec-right",
			_back:"#spec-left"
		});
		$("#spec-list img").bind("mouseover",function(){
			var src=$(this).attr("src");
			$("#spec-n1 img").eq(0).attr({
				src:src.replace("\/n5\/","\/n1\/"),
				jqimg:src.replace("\/n5\/","\/n0\/")
			});
			$(this).css({
				"border":"2px solid #ff6600",
				"padding":"1px"
			});
		}).bind("mouseout",function(){
			$(this).css({
				"border":"1px solid #ccc",
				"padding":"2px"
			});
		});				
	})
	</SCRIPT>
	</div><!--pre view-->
	<div class="product_cont"><?php the_content(); ?></div>
		
	<?php endwhile; ?>
	<?php else:?>
	<div class="nothing">没有找到相关内容~</div>
	<?php endif; ?>
</div>



