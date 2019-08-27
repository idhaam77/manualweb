<?php
/**
 * WP Bootstrap Pagination for Bootstrap 4.0
 *
 * @package WP-Bootstrap-Pagination
 */
/*
 * Class Name: WP_Bootstrap_Pagination
 * Plugin Name: WP Bootstrap Pagination
 * Plugin URI:  https://www.30menit.com
 * Description: A custom WordPress page navigation class to implement the Bootstrap 4.0 navigation style in a custom theme. Specific modifications for Bootstrap 4.0
 * Author: Modified by Masyhuri Jamil
 * Version: 1.0.0
 * Author URI: https://www.30menit.com
 * License: GPL-3.0+
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
*/

function wp_bootstrap_pagination() {
    if( is_singular() )
        return;
    global $wp_query;
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
    echo '<div><ul class="pagination pagination-sm justify-content-center mt-3">' . "\n";
    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li class="page-item">%s</li>' . "\n", get_previous_posts_link() );
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active page-item"' : '';
        printf( '<li%s class="page-item"><a href="%s" class="page-link">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
        if ( ! in_array( 2, $links ) )
            echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
    }
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active page-item"' : '';
        printf( '<li%s class="page-item"><a href="%s"class="page-link">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li class="page-item disabled"><span class="page-link">...</span></li>' . "\n";
        $class = $paged == $max ? ' class="active page-item"' : '';
        printf( '<li%s class="page-item"><a href="%s"class="page-link">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li class="page-item">%s</li>' . "\n", get_next_posts_link() );
    echo '</ul></div>' . "\n";
}
add_filter('next_posts_link_attributes', 'posts_link_previousornext');
add_filter('previous_posts_link_attributes', 'posts_link_previousornext');
function posts_link_previousornext (){
	return 'class="page-link"';
}