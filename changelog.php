<?php
/*
Template Name: Changelog
*/
?>

<?php get_header(); ?>

<?php if (have_posts()) { while (have_posts()) { the_post(); ?>

    <div class="primary">
        <?php @include('/var/www/tarskitheme.com/public/changelog.html'); ?>
    </div>

<?php } } ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
