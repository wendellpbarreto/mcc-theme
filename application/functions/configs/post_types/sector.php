<?php

/**
 * Register post type
 */
add_action('init', 'sector_register');

function sector_register() {
  $labels = array(
	'name'                  => _x('Setores', 'post type general name'),
	'singular_name'         => _x('Setores', 'post type singular name'),
	'add_new'               => _x('Adicionar Novo', 'Item'),
	'add_new_item'          => __('Adicionar Novo Item'),
	'edit_item'             => __('Editar Item'),
	'new_item'              => __('Novo Item'),
	'all_items'             => __('Todos os Items'),
	'view_item'             => __('Ver Item'),
	'search_items'          => __('Procurar Item'),
	'not_found'             => __('Nenhum Item Encontrado'),
	'not_found_in_trash'    => __('Nenhum Item Encontrado na Lixeira'),
	'parent_item_colon'     => ''
  );

  $args = array(
	'labels'                => $labels,
	'public'                => true,
	'publicly_queryable'    => true,
	'show_ui'               => true,
	'query_var'             => true,
	'hierarchical'			=> true,
	'menu_icon'             => 'dashicons-networking',
	'rewrite'               => true,
	'capability_type'       => 'page',
	'supports'              => array('title', 'editor', 'page-attributes', 'thumbnail',),
	'has_archive'           => true,
  );

  register_post_type('sector', $args);
}

/**
 * Create custom fields
 */
// $metabox['sector'] = array(
//   'id' => 'post-meta-details',
//   'title' => 'Opcões Adicionais',
//   'context' => 'normal',
//   'priority' => 'high',
//   'fields' => array(
// 	array(
// 	 'name' => 'Descrição',
// 	 'placeholder' => 'Entre a descrição aqui',
// 	 'desc' => '',
// 	 'id' => 'post_description',
// 	 'type' => 'textarea',
// 	 'default' => '',
// 	),
// 	array(
// 	 'name' => 'Largura',
// 	 'placeholder' => 'Entre a largura aqui',
// 	 'desc' => '',
// 	 'id' => 'post_width',
// 	 'type' => 'text',
// 	 'default' => '',
// 	),
// 	array(
// 	 'name' => 'Comprimeiro',
// 	 'placeholder' => 'Entre o comprimento aqui',
// 	 'desc' => '',
// 	 'id' => 'post_length',
// 	 'type' => 'text',
// 	 'default' => '',
// 	),
// 	array(
// 	 'name' => 'Profundidade',
// 	 'placeholder' => 'Entre a profundidade aqui',
// 	 'desc' => '',
// 	 'id' => 'post_depth',
// 	 'type' => 'text',
// 	 'default' => '',
// 	),
// 	array(
// 	 'name' => 'Borda',
// 	 'placeholder' => 'Entre a borda aqui',
// 	 'desc' => '',
// 	 'id' => 'post_border',
// 	 'type' => 'text',
// 	 'default' => '',
// 	),
//   )
// );
