<section id="post-categories">
	<header>
		<h1>Categorias</h1>
	</header>
	<ul>
		<?php $current_category = get_category(get_query_var('cat')) ?>
		<?php $categories = get_categories(array('orderby' => 'name', 'order' => 'ASC')) ?>
		<?php foreach($categories as $category) : ?>
			<li class="<?php echo ($current_category->name == $category->name) ? 'active' : '' ?>">
				<a href="<?php echo get_category_link($category->term_id) ?>"><?php echo $category->name ?></a>
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none">
					<polygon points="0 10, 0 0, 5 0" />
				</svg>
			</li>
		<?php endforeach; ?>
	</ul>
</section>
