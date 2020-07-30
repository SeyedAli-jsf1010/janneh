<?php
/**
 * The template part for displaying the post contents
 *
 * This template can be overridden by copying it to your-child-theme/templates/single-post/content.php.
 *
 * HOWEVER, on occasion TieLabs will need to update template files and you
 * will need to copy the new files to your child theme to maintain compatibility.
 *
 * @author   TieLabs
 * @version  2.1.0
 */

defined('ABSPATH') || exit; // Exit if accessed directly

?>

    <div <?php tie_content_column_attr(); ?>>

        <?php
        /**
         * TieLabs/before_the_article hook.
         *
         * @hooked tie_above_post_ad - 5
         */
        do_action('TieLabs/before_the_article');
        ?>

        <article id="the-post" <?php tie_post_class('container-wrapper post-content'); ?>>

            <?php
            /**
             * TieLabs/before_single_post_title hook.
             *
             * @hooked tie_post_index_shortcode - 10
             * @hooked tie_show_post_head_featured - 20
             */
            do_action('TieLabs/before_single_post_title');
            ?>

            <div class="entry-content entry clearfix">

                <?php
                /**
                 * TieLabs/before_post_content hook.
                 *
                 * @hooked tie_before_post_content_ad - 10
                 * @hooked tie_story_highlights - 20
                 */
            //    do_action('TieLabs/before_post_content');
                ?>
                <?php
                $podcast_array = get_field('podcast', get_the_id());
                $post_videos_array = get_field('post_videos', get_the_id()); ?>

                <?php if ($post_videos_array and has_post_thumbnail()) { ?>
                    <div class="container123"
                         style=" display:flex ; width: 100% ; align-content: center ;padding-bottom: 5%;">
                        <div class="content123"
                             style="width: 100% ; background: #dbdddf; border-radius: 45px 5px 44px 5px; ">
                            <div class="comparecontainer" style="width: 50% ; float: left; height: auto; padding: 2%;">
                                <h2 style="text-align: center;"> ویدئوی مقاله</h2>

                                <div style="padding: 0 3% 0 3%">
                                    <video controls style="width: 100%;height: auto;">
                                        <source src="<?php if ($post_videos_array) echo $post_videos_array['url'] ?>"
                                                type="video/mp4">
                                    </video>
                                </div>
                            </div>
                            <div class="comparecontainer" style="width: 50% ; float: left ;height: auto; padding: 2%;">

                                <h2 style="text-align: center;"> صوت مقاله</h2>
                                <div style="padding: 0 3% 0 0px;">
                                    <?php if (has_post_thumbnail()) {
                                        $featured_image = get_the_post_thumbnail();
                                        echo $featured_image;
                                    } ?>
                                    <audio controls style="width: 100% ; margin-top: 10%;">
                                        <source src="<?php if ($podcast_array) echo $podcast_array['url'] ?>"
                                                type="audio/mpeg">
                                        Your browser does not support the audio element.
                                    </audio>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php the_content(); ?>

                <?php
                /**
                 * TieLabs/after_post_content hook.
                 *
                 * @hooked tie_after_post_content_ad - 5
                 * @hooked tie_post_multi_pages - 10
                 * @hooked tie_post_source_via - 20
                 * @hooked tie_post_tags - 30
                 * @hooked tie_edit_post_button - 40
                 */
                do_action('TieLabs/after_post_content');
                ?>

            </div><!-- .entry-content /-->

            <?php
            /**
             * TieLabs/after_post_entry hook.
             *
             * @hooked tie_mobile_toggle_content_button - 10
             * @hooked tie_article_schemas - 10
             * @hooked tie_post_share_bottom - 20
             */
            do_action('TieLabs/after_post_entry');
            ?>

        </article><!-- #the-post /-->

        <?php
        /**
         * TieLabs/before_post_components hook.
         *
         * @hooked tie_after_post_entry_ad - 5
         */
        do_action('TieLabs/before_post_components');
        ?>

        <div class="post-components">

            <?php
            /**
             * TieLabs/post_components hook.
             *
             * @hooked tie_post_about_author - 10
             * @hooked tie_post_newsletter - 20
             * @hooked tie_post_next_prev - 30
             * @hooked tie_related_posts - 40
             * @hooked tie_post_comments - 50
             * @hooked tie_related_posts - 60
             */
            do_action('TieLabs/post_components');
            ?>

        </div><!-- .post-components /-->

        <?php
        /**
         * TieLabs/after_post_components hook.
         */
        do_action('TieLabs/after_post_components');
        ?>

    </div><!-- .main-content -->

<?php
/**
 * TieLabs/after_post_column hook.
 *
 * @hooked tie_post_fly_box - 10
 */
do_action('TieLabs/after_post_column');

