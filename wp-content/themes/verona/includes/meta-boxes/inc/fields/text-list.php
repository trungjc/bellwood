<?php
// Prevent loading this file directly
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'RWMB_Text_List_Field' ) )
{
  class RWMB_Text_List_Field
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
			$meta = (array) $meta;
			$html = array();
			$tpl = array();
			$tpl['text'] = '<label>%s <input type="text" class="rwmb-text-list" name="%s" id="%s" value="%s" /></label>';
			$tpl['number'] = '<label>%s <input type="number" class="rwmb-text-list" name="%s" id="%s" value="%s" step="%s" min="%s" max="%s" /></label>';

			$i = 0;
			foreach ( $field['options'] as $type => $label )
			{
				$tpl_type = $tpl[$type];

				$html[] = sprintf(
					$tpl_type,
					$label,
					$field['field_name'],
					$field['id'],
					$meta[$i],
					$field['step'],
					$field['min'],
					$field['max']
				);

				$i++;
			}
			return implode( ' ', $html );
		}

		/**
		 * Get meta value
		 * If field is cloneable, value is saved as a single entry in DB
		 * Otherwise value is saved as multiple entries (for backward compatibility)
		 *
		 * @see "save" method for better understanding
		 *
		 * TODO: A good way to ALWAYS save values in single entry in DB, while maintaining backward compatibility
		 *
		 * @param $meta
		 * @param $post_id
		 * @param $saved
		 * @param $field
		 *
		 * @return array
		 */
		static function meta( $meta, $post_id, $saved, $field )
		{
			$meta = get_post_meta( $post_id, $field['id'], $field['clone'] );
			$meta = ( !$saved && '' === $meta || array() === $meta ) ? $field['std'] : $meta;

			//$meta = array_map( 'esc_attr', (array) $meta );

			return $meta;
		}

		/**
		 * Save meta value
		 * If field is cloneable, value is saved as a single entry in DB
		 * Otherwise value is saved as multiple entries (for backward compatibility)
		 *
		 * TODO: A good way to ALWAYS save values in single entry in DB, while maintaining backward compatibility
		 *
		 * @param $new
		 * @param $old
		 * @param $post_id
		 * @param $field
		 */
		static function save( $new, $old, $post_id, $field )
		{
			if ( !$field['clone'] )
			{
				RW_Meta_Box::save( $new, $old, $post_id, $field );
				return;
			}

			if ( empty( $new ) )
				delete_post_meta( $post_id, $field['id'] );
			else
				update_post_meta( $post_id, $field['id'], $new );
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
			$field['multiple']   = true;
			$field['field_name'] = $field['id'];
			if ( !$field['clone'] )
				$field['field_name'] .= '[]';
			return $field;
		}
	}
}
