<?php
/**
 * @package ttf-one
 */
?>

<article class="no-results not-found">
	<header class="entry-header">
		<h1 class="entry-title">
			<?php _e( 'Nothing Found', 'ttf-one' ); ?>
		</h1>
	</header>

	<div class="entry-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
		<p>
			<?php
			printf(
				__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'ttf-one' ),
				esc_url( admin_url( 'post-new.php' ) )
			);
			?>
		</p>
		<?php elseif ( is_search() ) : ?>
		<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'ttf-one' ); ?></p>
		<?php else : ?>
		<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'ttf-one' ); ?></p>
		<?php endif; ?>

		<?php get_search_form(); ?>
	</div>
</article>