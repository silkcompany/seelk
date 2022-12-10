<?php
/**
 * @var $args
 */
?>
<p>
	<label for="<?php echo esc_attr( $args['name'] ); ?>"><?php echo wp_kses( $args['label'], array( 'strong' => array() ) ); ?></label>
	<input type="text" class="sgg-autocomplete <?php echo esc_attr( $args['class'] ?? '' ); ?>" size="50"
			data-target="<?php echo esc_attr( $args['name'] ); ?>"
			placeholder="<?php echo esc_attr__( 'Type to Search...', 'xml-sitemap-generator-for-google' ); ?>">
	<input type="hidden" id="<?php echo esc_attr( $args['name'] ); ?>"
			name="<?php echo esc_attr( $args['name'] ); ?>"
			value="<?php echo esc_attr( stripslashes( $args['value'] ) ); ?>">
	<span class="sgg-autocomplete-terms"></span>
</p>
