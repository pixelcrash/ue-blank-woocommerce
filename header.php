<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header>
	<section class="uk-section uk-padding-remove-vertical">
		
		<div class="uk-grid uk-margin-remove-top">
			<div class="uk-width-auto">Beyond Tradition</div>
			<div class="uk-width-expand uk-text-right">
				<ul class="cart-menu">
					<?php
					$menu_items = ue_get_nav_by_location('cart-menu');
					if($menu_items):
						foreach($menu_items as $item):
							echo "<li><a href='". $item->url . "'>". $item->title . "</a></li>";
						endforeach;
					endif;
					?>
				</ul>
			</div>
		</div>
		
		
		
		<div class="uk-grid uk-margin-remove-top">
			<div class="uk-width-auto uk-text-left">
				<ul class="main-menu">
				<?php
				$menu_items = ue_get_nav_by_location('header-menu');
				if($menu_items):
					foreach($menu_items as $item):
						echo "<li><a href='". $item->url . "'>". $item->title . "</a></li>";
					endforeach;
				endif;
				?>
				</ul>
			</div>
		</div>
	</section>
</header>