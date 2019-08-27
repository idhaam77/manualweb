<?php
/**
 * WP BTPM Img Attachment
 *
 * @package WP-BTPM-Img-Attachment
 */
/*
 * Class Name: WP_BTPM_Img_Attachment
 * Plugin Name: WP BTPM Img Attachment
 * Plugin URI:  https://www.30menit.com
 * Description: A custom WordPress thumbnail for post attachment
 * Author: Modified by Masyhuri Jamil
 * Version: 1.0.0
 * Author URI: https://www.30menit.com
 * License: GPL-3.0+
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
*/

remove_action('wp_head','wp_generator');
function btpm_get_thumb($postid=0, $size='thumbnail') { /* can change for thumbnails or full */
    if ($postid<1)
    $postid = get_the_ID();
    $thumb = get_post_meta($postid, "thumb", TRUE); /* place custom field for image */
    if ($thumb != '') {
        echo $thumb;
    }
    elseif ($images = get_children(array( /* if you upload some images, this function put the first image */
        'post_parent' => $postid,
        'post_type' => 'attachment',
        'numberposts' => '1',
                'orderby' => 'menu_order',
                'order' => 'ASC', /* if you want to reverse, change the ASC to DESC */
        'post_mime_type' => 'image', )))
        foreach($images as $image) {
            $thumbnail=wp_get_attachment_image_src($image->ID, $size);
            echo $thumbnail[0];
                        }
        else { /* if you don't upload anythink, default image can use*/
        echo get_image();
    }
}
function get_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];
  return $first_img;
}