<?php
// Prevent loading this file directly
defined( 'ABSPATH' ) || exit;

if ( !class_exists( 'RWMB_Text_Number_Field' ) )
{
	class RWMB_Text_Number_Field
	{
		/**
		 * Get field HTML
		 *
		 * @param string $html
		 * @param mixed  $meta
		 * @param array  $field
		 *
		 * @return string
		 */
		static function html( $html, $meta, $field )
		{
			print_r($meta);
			$text_field = sprintf(
				'<input type="text" class="rwmb-text" name="%s" id="%s" value="%s" />',
				$field['field_name'],
				empty( $field['clone'] ) ? $field['id'] : '',
				$meta[0]
			);

			$number_field = sprintf(
				'<input type="number" class="rwmb-number" name="%s" id="%s" value="%s" step="%s" min="%s" />',
				$field['field_name'],
				empty( $field['clone'] ) ? $field['id'] : '',
				$meta[1],
				$field['step'],
				$field['min']
			);

			return $text_field . $number_field;
		}

		/**
		 * Normalize parameters for field
		 *
		 * @param array $field
		 *
		 * @return array
		 */
		static function normalize_field( $field )
		{
			$field = wp_parse_args( $field, array(
				'step' => 1,
				'min'  => 0,
			) );
			return $field;
		}
	}
}