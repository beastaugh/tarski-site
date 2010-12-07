<?php
/*
Template Name: Clean Archives
*/

// Filter function which removes the sidebar
function hide_sidebar_for_clean_archives($sidebar) {
    return false;
}

add_filter('tarski_sidebar', 'hide_sidebar_for_clean_archives');

?>

<?php get_header(); ?>

<?php if (have_posts()) { while (have_posts()) { the_post(); ?>
    <div class="primary-span entry">
        <div class="meta">
            <h1 class="title"><?php the_title(); ?></h1>
            
            <?php edit_post_link(__('edit page','tarski'), '<p class="metadata">(', ')</p>'); ?>
        </div>
        
        <?php if (get_the_content()) { ?>
            <div class="content">
                <?php the_content(); ?>
            </div>
        <?php } ?>
    </div>
    
    <div class="primary">
        <h3><?php _e('Monthly Archives', 'tarski'); ?></h3>
        
        <?php if (function_exists('srg_clean_archives')) { ?>
            <?php srg_clean_archives(); ?>
        <?php } else { ?>
            <ul class="archivelist xoxo">
                <?php get_archives('monthly', '', 'html', '', '', 'TRUE'); ?>
            </ul>
        <?php } ?>
        
        <?php th_postend(); ?>
    </div>
<?php } } ?>

<div class="secondary"> 
    <?php if (get_tarski_option('show_categories')) { ?>
        <h3><?php _e('Category Archives', 'tarski'); ?></h3>
        
        <ul class="archivelist xoxo">
            <?php wp_list_cats('sort_column=name&sort_order=desc'); ?>
        </ul>
    <?php } ?>
    
    <?php th_sidebar(); ?>
</div>

<?php get_footer(); ?>
