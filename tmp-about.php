<?php /* Template Name: About Template */
get_header();
the_post(); 
?>
<section class="uk-section offset-top page-content">
	<div class="uk-container uk-container-expand">
	<div class="uk-child-width-1-2@m uk-child-width-1-1 uk-flex uk-flex-top" uk-grid>
		
		<div>
				<h1 class="page-title xlarge"><?php the_title(); ?></h1>
				<img data-src="https://images.unsplash.com/photo-1439694458393-78ecf14da7f9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2700&q=80" uk-img>
		</div>
		<div>
				<div class="page-content medium">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<?php the_content(); ?></div>
		</div>
	</div>
	</div>
</section><!-- #primary -->

<?php
get_footer();
