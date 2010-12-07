<?php
/*
Template Name: Theme Hooks
*/
?>

<?php get_header(); ?>

<?php if (have_posts()) { while(have_posts()) { the_post(); ?>

    <div class="primary">
        <div <?php post_class('entry'); ?>>
            <div class="meta">
                <h1 class="title entry-title"><?php the_title(); ?></h1>
                <p class="metadata"><?php
                    edit_post_link(__('edit','tarski'),' <span class="edit">(',')</span>');
                ?></p>
            </div>
            <div class="content">
                <?php the_content(); ?>
                <?php @include('/var/www/tarskitheme.com/public/hooks.html'); ?>
            </div>
        </div>
    </div>
    
<?php } } ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
