<?php

function pagination($range = 2, $wp_query = null) {
	$pages = '';
	$showitems = ( $range * 2 ) + 1;

	global $paged;
	if ( empty($paged) ) $paged = 1;

	if ( $pages == '' ) {
		if ($wp_query == null) {
			global $wp_query;
		}
		$pages = $wp_query->max_num_pages;
		if(!$pages) {
			$pages = 1;
		}
	}

	if ( 1 != $pages ) {
		echo '<div class="pagination">';

		if ( $paged > 2 && $paged > $range+1 && $showitems < $pages ) {
			echo '<a href="'.get_pagenum_link(1).'" class="pagination__arrow">&laquo;</a>';
		}

		if ( $paged > 1 && $showitems < $pages ) {
			echo '<a href="'.get_pagenum_link($paged - 1).'" class="pagination__arrow">&lsaquo;</a>';
		}

		for ( $i = 1; $i <= $pages; $i++ ) {
			if ( 1 != $pages && ( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ) ) {
				echo ($paged == $i)? '<span class="pagination__page current">'.$i.'</span>' : '<a href="'.get_pagenum_link($i).'" class="pagination__page" >'.$i.'</a>';
			}
		}

		if ( $paged < $pages && $showitems < $pages ) {
			echo '<a href="'.get_pagenum_link($paged + 1).'" class="pagination__arrow">&rsaquo;</a>';
		}

		if ( $paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages ) {
			echo '<a href="'.get_pagenum_link($pages).'" class="pagination__arrow">&raquo;</a>';
		}

		echo '</div>';
	}
}
