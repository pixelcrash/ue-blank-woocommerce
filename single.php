<?php get_header(); ?>

<section class="uk-section">

		<?php the_post(); ?>
		<h2><?php the_title(); ?></h2>
	  <?php the_content(); ?>

</section><!-- #primary -->

<?php get_footer();