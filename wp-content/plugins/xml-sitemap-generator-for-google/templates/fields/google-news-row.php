<?php
/**
 * @var $args
 */
?>
<tr>
	<td><?php echo esc_html( apply_filters( 'sanitize_text_field', $args['title'] ) ); ?></td>
	<td>
		<select name="<?php echo esc_attr( $args['name'] ); ?>_google_news" class="google-news-depended">
			<option value="1" <?php selected( $args['value'], '1' ); ?>><?php esc_html_e( 'Include', 'xml-sitemap-generator-for-google' ); ?></option>
			<option value="0" <?php selected( $args['value'], '0' ); ?>><?php esc_html_e( 'Exclude', 'xml-sitemap-generator-for-google' ); ?></option>
		</select>
	</td>
</tr>
