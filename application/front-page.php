<?php get_header() ?>

<?php include 'includes/topbar.php' ?>

<?php
	$args = array(
		//Type & Status Parameters
		'post_type'   => 'banner',
		'posts_per_page'         => 5,
	);

	$banner_query = new WP_Query( $args );
 ?>
<section id="carousel" class="container show-for-medium-up">
	<?php
		if ($banner_query->have_posts()) :
		    while ($banner_query->have_posts()) :
		        $banner_query->the_post();
		        $current_post = get_post();
		        $current_post->thumbnail = preg_replace('/(.*)src="(.*)" class(.*)/', "$2", get_the_post_thumbnail($current_post->ID, 'galeria'));
	            $current_post->image = aq_resize( $current_post->thumbnail, 2000, 850, true );
	 ?>
		<img data-src="<?php echo $current_post->image ?>" alt="<?php echo $current_post->post_title ?>" class="owl-lazy">
	<?php
			endwhile;
		endif;
	 ?>
</section>

<?php
	$args = array(
		//Type & Status Parameters
		'post_type'   => 'post',
		'posts_per_page'         => 5,
	);

	$post_query = new WP_Query( $args );
 ?>

<div class="posts__wrapper aside__wrapper row">
	<section id="posts" class="container small-20 medium-13 columns">
		<div class="posts__featured-carousel animated fade-in-left">
			<?php
				if ($post_query->have_posts()) :
				    while ($post_query->have_posts()) :
				        $post_query->the_post();
				        $current_post = get_post();
				        $current_post->permalink = get_permalink();
				        $current_post->thumbnail = preg_replace('/(.*)src="(.*)" class(.*)/', "$2", get_the_post_thumbnail($current_post->ID, 'galeria'));
			            $current_post->image = aq_resize( $current_post->thumbnail, 800, 400, true );
			            if ($current_post->post_featured == "true"):
			 ?>
			<div class="post__featured" data-href="<?php echo $current_post->permalink ?>">
			 	<img data-src="<?php echo $current_post->image ?>" alt="<?php echo $current_post->post_title ?>" class="post__featured-image owl-lazy">
			 	<header class="post__featured-header">
			 		<h6 class="post__featured-header-heading"><?php echo $current_post->post_title ?></h6>
			 	</header>
			</div>
			<?php
						endif;
					endwhile;
				endif;
			 ?>
		</div>

		<?php
			if ($post_query->have_posts()) :
			    while ($post_query->have_posts()) :
			        $post_query->the_post();
			        $current_post = get_post();
			        $current_post->permalink = get_permalink();
			        $current_post->thumbnail = preg_replace('/(.*)src="(.*)" class(.*)/', "$2", get_the_post_thumbnail($current_post->ID, 'galeria'));
		            $current_post->image = aq_resize( $current_post->thumbnail, 400, 240, true );
		            if ($current_post->thumbnail):
		 ?>
		<div class="post animated fade-in-left">
			<div class="row collapse">
				<div class="small-8 columns">
					<div class="post__img-crop" data-href="<?php echo $current_post->permalink ?>">
						<img src="<?php echo $current_post->image ?>" alt="<?php echo $current_post->post_title ?>" class="post__img">
					</div>
				</div>
				<div class="small-12 columns">
					<h3 class="post__heading"><a href="<?php echo $current_post->permalink ?>"><?php echo $current_post->post_title ?></a></h3>
					<p class="post__subheading"><?php echo wp_trim_words($current_post->post_content, 17, '') ?> <span class="post__suspension-points">(...)</span></p>
					<div class="post__meta">
						<div class="post__meta-date"><?php echo strftime('%d de %b/%y', strtotime($current_post->post_date)); ?></div>
						<div class="post__meta-read-more"><a href="<?php echo $current_post->permalink ?>">leia mais</a></div>
					</div>
				</div>
			</div>
		</div>
		<?php 		else: ?>
		<div class="post animated fade-in-left">
			<div class="row collapse">
				<div class="small-20 columns">
					<h3 class="post__heading"><a href="<?php echo $current_post->permalink ?>"><?php echo $current_post->post_title ?></a></h3>
					<p class="post__subheading"><?php echo wp_trim_words($current_post->post_content, 25, '') ?> <span class="post__suspension-points">(...)</span></p>
					<div class="post__meta">
						<div class="post__meta-date"><?php echo strftime('%d de %b/%y', strtotime($current_post->post_date)); ?></div>
						<div class="post__meta-read-more"><a href="<?php echo $current_post->permalink ?>">leia mais</a></div>
					</div>
				</div>
			</div>
		</div>
		<?php
					endif;
				endwhile;
			endif;
		 ?>
	</section>
	<aside id="aside" class="container small-20 medium-7 p-l-xl columns">
        <?php include TEMPLATEPATH.'/search.php'; ?>

        <div class="aside__facebook-widget row">
        	<div class="fb-page" data-href="https://www.facebook.com/museucamaracascudoufrn" data-width="500" data-hide-cover="false" data-show-facepile="true" data-show-posts="true"></div>
        </div>
        <div class="row">
        	<div class="small-20">
		        <div class="aside__visit-us m-t-md animated fade-in-right" data-href="<?php echo get_permalink(get_page_by_path( 'visit-us' ))?>">
		        	<img src="<?php echo get_image('visit-us.jpg') ?>" alt="Visite Nosso Museu">
		        	<div class="aside__visit-us-title">
		        		<h3>VISITE</h3>
		        		<h2>NOSSO</h2>
		        		<h3>MUSEU</h3>
		        	</div>
		        </div>
        	</div>
        </div>
    </aside><!-- aside id='aside' class='large-5 column' -->
</div>

<section id="address" class="container">
	<div class="row">
		<div class="small-12"></div>
	</div>
</section>

<section id="map" class="container"></section>

<?php include 'includes/footer.php' ?>
<?php get_footer() ?>

<!-- scripts::animate -->
<script>
    new cbpScroller(document.getElementById('posts'));
    new cbpScroller(document.getElementById('aside'));
    new cbpScroller(document.getElementById('footer'));
</script>