<?php // ACF Repeater ?>
<?php if ( have_rows( 'blocks' ) ) : ?>
	<?php while ( have_rows( 'blocks' ) ) : the_row(); ?>
		<?php
			$header = get_sub_field( 'header' );
			$text = get_sub_field( 'text' );
			$image = get_sub_field( 'image' );
		?>
		<?php if ( $header || $text || $image ) : ?>
			<!-- Your markup here -->
		<?php endif; ?>
	<?php endwhile; ?>
<?php endif; ?>

<?php // ACF Flexible Content ?>
<?php if ( have_rows( 'sections' ) ) : ?>
	<?php while ( have_rows( 'sections' ) ) : the_row(); ?>
		<?php get_template_part( 'blocks/sections/' . get_row_layout() ); ?>
	<?php endwhile; ?>
<?php endif; ?>

<?php // ACF Gallery ?>
<?php if ( $images = get_field( 'gallery' ) ) : ?>
	<?php foreach ( $images as $image ) : ?>
		<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
	<?php endforeach; ?>
<?php endif; ?>

<?php // ACF Theme options ?>
<?php if ( $footer_copyright = get_field( 'footer_copyright', 'option' ) ) : ?>
	<div class="copy">
		<p><?php echo str_replace( '[year]', date( 'Y' ), $footer_copyright ); ?></p>
	</div>
<?php endif; ?>

<?php if ( have_rows( 'social_links', 'option' ) ) : ?>
	<ul class="social-links">
		<?php while ( have_rows( 'social_links', 'option' ) ) : the_row(); ?>
			<?php
				$link_class = get_sub_field( 'link_class' );
				$link = get_sub_field( 'link' );
			?>
			<?php if ( $link_class && $link ) : ?>
				<li><a href="<?php echo esc_url( $link ); ?>" class="icon-<?php echo sanitize_html_class( $link_class ); ?>" target="_blank"></a></li>
			<?php endif; ?>
		<?php endwhile; ?>
	</ul>
<?php endif; ?>

<?php // ACF Relationship ?>
<?php if ( $posts_objects = get_field( 'posts_objects' ) ) : ?>
	<ul>
		<?php foreach ( $posts_objects as $post ) : setup_postdata( $post ); ?>
			<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
		<?php endforeach; wp_reset_postdata(); ?>
	</ul>
<?php endif; ?>
