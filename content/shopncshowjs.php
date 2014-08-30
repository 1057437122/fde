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
		<aside class="nc-gallery">
			<div class="zoom-section">
				<div class="zoom-small-image">
					<span class="thumb size310">
						<a href="" class="nc-zoom" id="zoom1" rel="position:'inside',showTitle:false"><img src="<?php echo $ret[0]; ?>" alt="" title=""></a>
					</span>
				</div><!-- zoom-small-image-->
				<nav class="zoom-desc">
					<ul>
					<!-- foreach -->
					<?php foreach($ret as $key=>$pic): ?>
						<li>
							<a href="<?php echo $pic; ?>" class="nc-zoom-gallery " title="" rel="useZoom:'zoom1',smallImage:'<?php echo $pic; ?>'" >
								<span class="thumb size40">
								<i></i>
								<img src="<?php echo $pic; ?>" alt="" onload="javascript:DrawImage(this,40,40);">
								</span><b></b>
							</a>
						</li>
					<?php endforeach; ?>
					</ul>
				</nav><!-- zoom desc -->
			</div><!-- zoom section -->
		</aside><!-- nc gallery-->
	</div><!--pre view-->
	<div class="product_cont"><?php the_content(); ?></div>
		
	<?php endwhile; ?>
	<?php else:?>
	<div class="nothing">没有找到相关内容~</div>
	<?php endif; ?>
</div>



