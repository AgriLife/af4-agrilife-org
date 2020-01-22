<?php
/**
 * The file that defines the Home Page custom fields
 *
 * @link       https://github.com/AgriLife/af4-agrilife-org/blob/master/fields/home-fields.php
 * @since      1.2.3
 * @package    af4-agrilife-org
 * @subpackage af4-agrilife-org/fields
 */

if ( function_exists( 'acf_add_local_field_group' ) ) :

	acf_add_local_field_group(
		array(
			'key'                   => 'group_5c19364f3060b',
			'title'                 => 'Home',
			'fields'                => array(
				array(
					'key'               => 'field_5c193654e8711',
					'label'             => 'Action Items',
					'name'              => 'action_items',
					'type'              => 'group',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'layout'            => 'row',
					'sub_fields'        => array(
						array(
							'key'               => 'field_5dd80f88efee9',
							'label'             => 'Item 1',
							'name'              => 'item_1',
							'type'              => 'group',
							'instructions'      => '',
							'required'          => 0,
							'conditional_logic' => 0,
							'wrapper'           => array(
								'width' => '',
								'class' => '',
								'id'    => '',
							),
							'layout'            => 'row',
							'sub_fields'        => array(
								array(
									'key'               => 'field_5dd80f88efeea',
									'label'             => 'Image',
									'name'              => 'image',
									'type'              => 'image',
									'instructions'      => 'Must be 300px or wider and 200px or taller.',
									'required'          => 0,
									'conditional_logic' => 0,
									'wrapper'           => array(
										'width' => '',
										'class' => '',
										'id'    => '',
									),
									'return_format'     => 'array',
									'preview_size'      => 'medium',
									'library'           => 'all',
									'min_width'         => 300,
									'min_height'        => 200,
									'min_size'          => '',
									'max_width'         => '',
									'max_height'        => '',
									'max_size'          => '',
									'mime_types'        => 'jpg,png',
								),
								array(
									'key'               => 'field_5dd80f88efeec',
									'label'             => 'Link',
									'name'              => 'link',
									'type'              => 'link',
									'instructions'      => '',
									'required'          => 0,
									'conditional_logic' => 0,
									'wrapper'           => array(
										'width' => '',
										'class' => '',
										'id'    => '',
									),
									'return_format'     => 'url',
								),
								array(
									'key'               => 'field_5e20bab8041cb',
									'label'             => 'Background Color',
									'name'              => 'background_color',
									'type'              => 'color_picker',
									'instructions'      => '',
									'required'          => 0,
									'conditional_logic' => 0,
									'wrapper'           => array(
										'width' => '',
										'class' => '',
										'id'    => '',
									),
									'default_value'     => '',
								),
								array(
									'key'               => 'field_5e20c316ca320',
									'label'             => 'Background Size',
									'name'              => 'background_size',
									'type'              => 'select',
									'instructions'      => '',
									'required'          => 0,
									'conditional_logic' => 0,
									'wrapper'           => array(
										'width' => '',
										'class' => '',
										'id'    => '',
									),
									'choices'           => array(
										'auto'    => 'auto',
										'contain' => 'contain',
										'cover'   => 'cover',
									),
									'default_value'     => array(
										0 => 'auto',
									),
									'allow_null'        => 0,
									'multiple'          => 0,
									'ui'                => 0,
									'return_format'     => 'value',
									'ajax'              => 0,
									'placeholder'       => '',
								),
							),
						),
						array(
							'key'               => 'field_5c63307d81a9e',
							'label'             => 'Item 2',
							'name'              => 'item_2',
							'type'              => 'group',
							'instructions'      => '',
							'required'          => 0,
							'conditional_logic' => 0,
							'wrapper'           => array(
								'width' => '',
								'class' => '',
								'id'    => '',
							),
							'layout'            => 'row',
							'sub_fields'        => array(
								array(
									'key'               => 'field_5c6330d981a9f',
									'label'             => 'Image',
									'name'              => 'image',
									'type'              => 'image',
									'instructions'      => 'Must be 300px or wider and 200px or taller.',
									'required'          => 0,
									'conditional_logic' => 0,
									'wrapper'           => array(
										'width' => '',
										'class' => '',
										'id'    => '',
									),
									'return_format'     => 'array',
									'preview_size'      => 'medium',
									'library'           => 'all',
									'min_width'         => 300,
									'min_height'        => 200,
									'min_size'          => '',
									'max_width'         => '',
									'max_height'        => '',
									'max_size'          => '',
									'mime_types'        => 'jpg,png',
								),
								array(
									'key'               => 'field_5c63314581aa0',
									'label'             => 'Heading',
									'name'              => 'heading',
									'type'              => 'text',
									'instructions'      => '',
									'required'          => 0,
									'conditional_logic' => 0,
									'wrapper'           => array(
										'width' => '',
										'class' => '',
										'id'    => '',
									),
									'default_value'     => '',
									'placeholder'       => '',
									'prepend'           => '',
									'append'            => '',
									'maxlength'         => '',
								),
								array(
									'key'               => 'field_5c63318781aa1',
									'label'             => 'Link',
									'name'              => 'link',
									'type'              => 'link',
									'instructions'      => '',
									'required'          => 0,
									'conditional_logic' => 0,
									'wrapper'           => array(
										'width' => '',
										'class' => '',
										'id'    => '',
									),
									'return_format'     => 'url',
								),
							),
						),
						array(
							'key'               => 'field_5c19366ee8712',
							'label'             => 'Item 3',
							'name'              => 'item_3',
							'type'              => 'group',
							'instructions'      => '',
							'required'          => 0,
							'conditional_logic' => 0,
							'wrapper'           => array(
								'width' => '',
								'class' => '',
								'id'    => '',
							),
							'layout'            => 'row',
							'sub_fields'        => array(
								array(
									'key'               => 'field_5c19368de8713',
									'label'             => 'Image',
									'name'              => 'image',
									'type'              => 'image',
									'instructions'      => 'Must be 500px or wider.',
									'required'          => 0,
									'conditional_logic' => 0,
									'wrapper'           => array(
										'width' => '',
										'class' => '',
										'id'    => '',
									),
									'return_format'     => 'array',
									'preview_size'      => 'medium',
									'library'           => '',
									'min_width'         => 500,
									'min_height'        => '',
									'min_size'          => '',
									'max_width'         => '',
									'max_height'        => '',
									'max_size'          => '',
									'mime_types'        => '',
								),
								array(
									'key'               => 'field_5c194640e8714',
									'label'             => 'Heading',
									'name'              => 'heading',
									'type'              => 'text',
									'instructions'      => '',
									'required'          => 0,
									'conditional_logic' => 0,
									'wrapper'           => array(
										'width' => '',
										'class' => '',
										'id'    => '',
									),
									'default_value'     => 'Impacts',
									'placeholder'       => '',
									'prepend'           => '',
									'append'            => '',
									'maxlength'         => '',
								),
								array(
									'key'               => 'field_5c19488de8715',
									'label'             => 'Link',
									'name'              => 'link',
									'type'              => 'link',
									'instructions'      => '',
									'required'          => 0,
									'conditional_logic' => 0,
									'wrapper'           => array(
										'width' => '',
										'class' => '',
										'id'    => '',
									),
									'return_format'     => '',
								),
								array(
									'key'               => 'field_5c1948b3e8716',
									'label'             => 'Description',
									'name'              => 'description',
									'type'              => 'textarea',
									'instructions'      => '',
									'required'          => 0,
									'conditional_logic' => 0,
									'wrapper'           => array(
										'width' => '',
										'class' => '',
										'id'    => '',
									),
									'default_value'     => '',
									'placeholder'       => '',
									'maxlength'         => '',
									'rows'              => '',
									'new_lines'         => '',
								),
								array(
									'key'               => 'field_5e274772d22a9',
									'label'             => 'Modal Content',
									'name'              => 'modal_content',
									'type'              => 'wysiwyg',
									'instructions'      => '',
									'required'          => 0,
									'conditional_logic' => 0,
									'wrapper'           => array(
										'width' => '',
										'class' => '',
										'id'    => '',
									),
									'default_value'     => '',
									'tabs'              => 'all',
									'toolbar'           => 'full',
									'media_upload'      => 1,
									'delay'             => 0,
								),
							),
						),
						array(
							'key'               => 'field_5c194945e8717',
							'label'             => 'Item 4',
							'name'              => 'item_4',
							'type'              => 'group',
							'instructions'      => '',
							'required'          => 0,
							'conditional_logic' => 0,
							'wrapper'           => array(
								'width' => '',
								'class' => '',
								'id'    => '',
							),
							'layout'            => 'row',
							'sub_fields'        => array(
								array(
									'key'               => 'field_5c194945e8718',
									'label'             => 'Image',
									'name'              => 'image',
									'type'              => 'image',
									'instructions'      => 'Must be 500px or wider.',
									'required'          => 0,
									'conditional_logic' => 0,
									'wrapper'           => array(
										'width' => '',
										'class' => '',
										'id'    => '',
									),
									'return_format'     => 'array',
									'preview_size'      => 'medium',
									'library'           => '',
									'min_width'         => 500,
									'min_height'        => '',
									'min_size'          => '',
									'max_width'         => '',
									'max_height'        => '',
									'max_size'          => '',
									'mime_types'        => '',
								),
								array(
									'key'               => 'field_5c194945e871a',
									'label'             => 'Link',
									'name'              => 'link',
									'type'              => 'link',
									'instructions'      => '',
									'required'          => 0,
									'conditional_logic' => 0,
									'wrapper'           => array(
										'width' => '',
										'class' => '',
										'id'    => '',
									),
									'return_format'     => 'url',
								),
								array(
									'key'               => 'field_5c194945e871b',
									'label'             => 'Description',
									'name'              => 'description',
									'type'              => 'textarea',
									'instructions'      => '',
									'required'          => 0,
									'conditional_logic' => 0,
									'wrapper'           => array(
										'width' => '',
										'class' => '',
										'id'    => '',
									),
									'default_value'     => '',
									'placeholder'       => '',
									'maxlength'         => '',
									'rows'              => '',
									'new_lines'         => '',
								),
							),
						),
						array(
							'key'               => 'field_5e2091489bca3',
							'label'             => 'Item 5',
							'name'              => 'item_5',
							'type'              => 'group',
							'instructions'      => '',
							'required'          => 0,
							'conditional_logic' => 0,
							'wrapper'           => array(
								'width' => '',
								'class' => '',
								'id'    => '',
							),
							'layout'            => 'row',
							'sub_fields'        => array(
								array(
									'key'               => 'field_5e2091489bca4',
									'label'             => 'Image',
									'name'              => 'image',
									'type'              => 'image',
									'instructions'      => 'Must be 300px or wider and 200px or taller.',
									'required'          => 0,
									'conditional_logic' => 0,
									'wrapper'           => array(
										'width' => '',
										'class' => '',
										'id'    => '',
									),
									'return_format'     => 'array',
									'preview_size'      => 'medium',
									'library'           => 'all',
									'min_width'         => 300,
									'min_height'        => 200,
									'min_size'          => '',
									'max_width'         => '',
									'max_height'        => '',
									'max_size'          => '',
									'mime_types'        => 'jpg,png',
								),
								array(
									'key'               => 'field_5e2091489bca5',
									'label'             => 'Link',
									'name'              => 'link',
									'type'              => 'link',
									'instructions'      => '',
									'required'          => 0,
									'conditional_logic' => 0,
									'wrapper'           => array(
										'width' => '',
										'class' => '',
										'id'    => '',
									),
									'return_format'     => 'url',
								),
								array(
									'key'               => 'field_5e20ba5e041ca',
									'label'             => 'Background Color',
									'name'              => 'background_color',
									'type'              => 'color_picker',
									'instructions'      => '',
									'required'          => 0,
									'conditional_logic' => 0,
									'wrapper'           => array(
										'width' => '',
										'class' => '',
										'id'    => '',
									),
									'default_value'     => '',
								),
								array(
									'key'               => 'field_5e20c0c7ca31f',
									'label'             => 'Background Size',
									'name'              => 'background_size',
									'type'              => 'select',
									'instructions'      => '',
									'required'          => 0,
									'conditional_logic' => 0,
									'wrapper'           => array(
										'width' => '',
										'class' => '',
										'id'    => '',
									),
									'choices'           => array(
										'auto'    => 'auto',
										'contain' => 'contain',
										'cover'   => 'cover',
									),
									'default_value'     => array(
										0 => 'auto',
									),
									'allow_null'        => 0,
									'multiple'          => 0,
									'ui'                => 0,
									'return_format'     => 'value',
									'ajax'              => 0,
									'placeholder'       => '',
								),
							),
						),
					),
				),
			),
			'location'              => array(
				array(
					array(
						'param'    => 'page_template',
						'operator' => '==',
						'value'    => 'home.php',
					),
				),
			),
			'menu_order'            => 0,
			'position'              => 'normal',
			'style'                 => 'default',
			'label_placement'       => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen'        => array(
				0 => 'the_content',
			),
			'active'                => true,
			'description'           => '',
		)
	);

endif;
