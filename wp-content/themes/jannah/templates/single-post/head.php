<?php
/**
 * Post Head Area
 *
 * This template can be overridden by copying it to your-child-theme/templates/single-post/head.php.
 *
 * HOWEVER, on occasion TieLabs will need to update template files and you
 * will need to copy the new files to your child theme to maintain compatibility.
 *
 * @author   TieLabs
 * @version  3.1.0
 */

defined('ABSPATH') || exit; // Exit if accessed directly


/**
 * TieLabs/before_post_head hook.
 *
 */
do_action('TieLabs/before_post_head'); ?>

    <header class="entry-header-outer">

        <?php do_action('TieLabs/before_entry_head'); ?>

        <div class="entry-header">

            <?php

            // Categories
            if ((tie_get_option('mpost_cat') && !tie_get_postdata('tie_hide_categories')) || tie_get_postdata('tie_hide_categories') == 'no') {
                tie_the_category('<span class="post-cat-wrap">', '</span>', false);
            }
            ?>
            <?php
            if (get_post_type() == 'modernpost') {
                $get_categories = get_the_terms(get_the_id(), 'mpost_cat');
                if (!empty($get_categories)){  foreach ($get_categories as $cate) {

                    echo '<span class="post-cat-wrap" style=" display: inline-block; margin-right: 2px; "><a href="' . get_home_url() . '/mpost_cat/' . $cate->slug . '" class="post-cat tie-cat-21">' . $cate->name . '</a></span>';

                }}


            }

            ?>


            <?php
            // Trending
            tie_the_trending_icon('', '<div class="post-is-trending">', ' ' . esc_html__('Trending', TIELABS_TEXTDOMAIN) . '</div>');

            ?>

            <h1 class="post-title entry-title"><?php the_title(); ?></h1>

            <?php

            if (tie_get_postdata('tie_post_sub_title')) { ?>

                <h2 class="entry-sub-title"><?php echo tie_get_postdata('tie_post_sub_title') ?></h2>
                <?php
            }


            if ((tie_get_option('post_meta') && !tie_get_postdata('tie_hide_meta')) || tie_get_postdata('tie_hide_meta') == 'no') {

                $args = array(
                    'author' => tie_get_option('post_author'),
                    'avatar' => tie_get_option('post_author_avatar'),
                    'twitter' => tie_get_option('post_author_twitter'),
                    'email' => tie_get_option('post_author_email'),
                    'date' => tie_get_option('post_date'),
                    'comments' => tie_get_option('post_comments'),
                    'views' => tie_get_option('post_views'),
                    'reading' => tie_get_option('reading_time'),
                );

                tie_the_post_meta($args);
            }

            ?>
        </div><!-- .entry-header /-->

        <?php
        $post_layout = tie_get_object_option('post_layout', 'cat_post_layout', 'tie_post_layout');

        if (!empty($post_layout) && ($post_layout == 4 || $post_layout == 5 || $post_layout == 8)) { ?>

            <a id="go-to-content" href="#go-to-content"><span class="fa fa-angle-down"></span></a>
            <?php
        }
        ?>

        <?php do_action('TieLabs/after_entry_head'); ?>

    </header><!-- .entry-header-outer /-->

<?php
/**
 * TieLabs/after_post_head hook.
 *
 */
do_action('TieLabs/after_post_head');

