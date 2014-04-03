<?php
global $ttf_one_section_data, $ttf_one_is_js_template, $ttf_one_slide_id;
$section_name = 'ttf-one-section';
if ( true === $ttf_one_is_js_template ) {
	$section_name .= '[{{{ parentID }}}][banner-slides][{{{ id }}}]';
} else {
	$section_name .= '[' . $ttf_one_section_data['data']['id'] . '][banner-slides][' . $ttf_one_slide_id . ']';
}

$content          = ( isset( $ttf_one_section_data['data']['banner-slides'][ $ttf_one_slide_id ]['content'] ) ) ? $ttf_one_section_data['data']['banner-slides'][ $ttf_one_slide_id ]['content'] : '';
$background_color = ( isset( $ttf_one_section_data['data']['banner-slides'][ $ttf_one_slide_id ]['background-color'] ) ) ? $ttf_one_section_data['data']['banner-slides'][ $ttf_one_slide_id ]['background-color'] : '#ffffff';
$image_id         = ( isset( $ttf_one_section_data['data']['banner-slides'][ $ttf_one_slide_id ]['image-id'] ) ) ? $ttf_one_section_data['data']['banner-slides'][ $ttf_one_slide_id ]['image-id'] : 0;
$alignment        = ( isset( $ttf_one_section_data['data']['banner-slides'][ $ttf_one_slide_id ]['alignment'] ) ) ? $ttf_one_section_data['data']['banner-slides'][ $ttf_one_slide_id ]['alignment'] : 'left';
?>
<?php if ( true !== $ttf_one_is_js_template ) : ?>
<div class="ttf-one-banner-slide" id="ttf-one-banner-slide-<?php echo esc_attr( $ttf_one_slide_id ); ?>" data-id="<?php echo esc_attr( $ttf_one_slide_id ); ?>">
<?php endif; ?>
	<div title="<?php esc_attr_e( 'Drag-and-drop this column into place', 'ttf-one' ); ?>" class="ttf-one-sortable-handle">
		<div class="sortable-background"></div>
	</div>

	<?php
	$editor_settings = array(
		'tinymce'       => array(
			'toolbar1' => 'bold,italic,link',
			'toolbar2' => '',
			'toolbar3' => '',
			'toolbar4' => '',
		),
		'quicktags'     => array(
			'buttons' => 'strong,em,link',
		),
		'textarea_name' => $section_name . '[content]'
	);

	if ( true === $ttf_one_is_js_template ) : ?>
		<?php ttf_one_get_builder_base()->wp_editor( '', 'ttfoneeditorbannerslidetemp', $editor_settings ); ?>
	<?php else : ?>
		<?php ttf_one_get_builder_base()->wp_editor( $content, 'ttfoneeditorbannerslide' . $ttf_one_slide_id, $editor_settings ); ?>
	<?php endif; ?>

	<div class="ttf-one-banner-slide-background-color-wrapper">
		<label><?php _e( 'Background color', 'ttf-one' ); ?></label>
		<input type="text" name="<?php echo $section_name; ?>[background-color]" class="ttf-one-banner-slide-background-color" value="<?php echo ttf_one_maybe_hash_hex_color( $background_color ); ?>" />
	</div>

	<div class="ttf-one-banner-slide-background-image-wrapper">
		<?php
		ttf_one_get_builder_base()->add_uploader(
			$section_name,
			$image_id,
			array(
				'add'    => __( 'Set background image', 'ttf-one' ),
				'remove' => __( 'Remove background image', 'ttf-one' ),
				'title'  => __( 'Background image', 'ttf-one' ),
				'button' => __( 'Use as Background Image', 'ttf-one' ),
			)
		);
		?>
	</div>

	<div class="ttf-one-banner-slide-alignment-wrapper">
		<label><?php _e( 'Content position', 'ttf-one' ); ?></label>
		<select name="<?php echo $section_name; ?>[alignment]">
			<option value="left"<?php selected( 'left', $alignment ); ?>><?php _e( 'Left', 'ttf-one' ); ?></option>
			<option value="center"<?php selected( 'center', $alignment ); ?>><?php _e( 'Center', 'ttf-one' ); ?></option>
			<option value="right"<?php selected( 'right', $alignment ); ?>><?php _e( 'Right', 'ttf-one' ); ?></option>
		</select>
	</div>

	<a href="#" class="ttf-one-banner-slide-remove">
		<?php _e( 'Remove this slide', 'ttf-one' ); ?>
	</a>
<?php if ( true !== $ttf_one_is_js_template ) : ?>
</div>
<?php endif; ?>