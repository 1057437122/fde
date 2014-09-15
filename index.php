<?php
#
get_header();
?>


<div class="clr"></div>

<div class="slider">
<?php $sliderspost=get_posts('meta_key=slider&numberposts=10');?><!-- get slider posts-->
<?php if($sliderspost):?>
	<div class="slider_frame">
		<div class="slides">
			<div class="slides_container">
			<?php foreach($sliderspost as $post):?>
			<?php if(has_post_thumbnail()):?>
					<div class="slide"><!-- repeat-->
					<a href="<?php the_permalink();?>" rel="bookmark" target="_blank"><?php the_post_thumbnail();?></a><!--main pictures-->
						<div class="caption">
							<div class="cap">
								<h2><span><?php $cat=get_the_category();echo $cat[0]->cat_name;?></span><a href="<?php the_permalink();?>" target="_blank"><?php echo $post->post_title; ?></a></h2>
								<p><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 150,"..."); ?></p>
							</div><!--cap-->
						</div><!--caption-->
					</div><!--slide-->
			<?php endif;?>
			<?php endforeach;?>
			</div><!-- slides_container-->
			
		</div><!--slides-->
	</div><!--slider_frame-->
<?php endif;?>
</div><!--slider -->


<div class="clr"></div>

<div class="mbody">
	<div class="box">
		<div class="news">
			<div class="n_header"><div class="time_new">公司动态</div><div class="more">+</div></div>
			<div class="n_body">
				<div class="pic">
					<img src="<?php bloginfo('template_directory'); ?>/img/npic.jpg" alt="" width="130" height="130" class="picborder" /><!-- get one post from the news -->
				</div>
				<div class="info">
					<ul>
						<?php query_posts('cat=1&posts_per_page=7'); while(have_posts()): the_post(); ?>   
						<li><a href="<?php the_permalink();?>"><div class="dot">-</div><?php the_title();?></a></li>   
						<?php endwhile; wp_reset_query(); ?>   
					</ul>
				</div>
			</div>
		</div><!--news -->
	</div><!-- company things -->
	<div class="box">
		<div class="produ">
			<div class="n_header"><div class="time_new">产品展示</div><div class="more">+</div></div>
			<div class="n_body">
				<div class="pic">
					<?php query_posts('cat=6&posts_per_page=3'); while(have_posts()): the_post(); ?>
					<a href="<?php the_permalink(); ?>" >
						<?php the_post_thumbnail('thumbnail');  ?>
					</a>
					<?php endwhile; wp_reset_query(); ?>
				</div><!-- pic -->
			</div><!-- nbody -->
		</div><!-- produ -->
	</div><!-- product -->
</div><!-- show body -->

<div class="clr"></div>
<?php 
get_footer();
?>
<script>
// Slides
$(document).ready(function(){
	$(".slides").slides({
		play:7000,
		pause:500,
		slideSpeed:1200,
		hoverPause:true,
		animationStart:function(current){
			$(".caption").animate({
				bottom:-90
			},200);
			if(window.console&&console.log){
				console.log("animationStart on slide:",current);
			};
		},animationComplete:function(current){
			$(".caption").animate({
				bottom:0
			},500);
			if(window.console&&console.log){
				console.log("animationComplete on slide:",current);
			};
		},slidesLoaded:function(){
			$(".caption").animate({
				bottom:0
			},200);
		}
	});
});
</script>