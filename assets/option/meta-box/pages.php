<?php
  

/**
 * Initialize the custom Meta Boxes. 
 */
add_action( 'admin_init', 'ST_Pages_meta_boxes' );

/**
 * Meta Boxes demo code.
 *
 * You can find all the available option types in theme-options.php.
 *
 * @return    void
 * @since     2.3.0
 */
 
 
 
function ST_Pages_meta_boxes() {
  $Page_Title_Bar_Height = ot_get_option('Page_Title_Bar_Height');
  			if(!empty($Page_Title_Bar_Height)){
				 $Page_Title_Bar_Height =  array(
						'0'=> $Page_Title_Bar_Height['0'],
						'1'=> $Page_Title_Bar_Height['1'],
					);
					
			}


	$Display_Custom_Background = ot_get_option('Display_Custom_Background');
	
	if(!empty($Display_Custom_Background))
		$Display_Custom_Background = $Display_Custom_Background;
  
  $page_title_bar = ot_get_option('page_title_bar');
  $title_background_page = ot_get_option('Title_Background');
  			if(!empty($title_background_page)){
					 $title_background_page = array(
								'background-color' =>$title_background_page['background-color'],
								'background-repeat' =>$title_background_page['background-repeat'],
								'background-attachment' =>$title_background_page['background-attachment'],
								'background-position' =>$title_background_page['background-position'],
								'background-size' =>$title_background_page['background-size'],
								'background-image' =>$title_background_page['background-image'],
							);
			}
  
  
  
  
  $Heading_Color = ot_get_option('Heading_Color');
  $Text_Color = ot_get_option('Text_Color');
  $header_bg = ot_get_option('bg_header');
		  if(!empty($header_bg)){
				  $header_bg = array(
								'background-color' =>$header_bg['background-color'],
								'background-repeat' =>$header_bg['background-repeat'],
								'background-attachment' =>$header_bg['background-attachment'],
								'background-position' =>$header_bg['background-position'],
								'background-size' =>$header_bg['background-size'],
								'background-image' => $header_bg['background-image'],
					);
		  }
  
  
  $header_border_top = ot_get_option('header_border_top');
  if(!empty($header_border_top)){
   $header_border_top_width 	= ( $header_border_top['width'] ) ? $header_border_top['width'] : ' ';
   $header_border_top_unit 	= ( $header_border_top['unit'] ) ? $header_border_top['unit'] : ' ';
   $header_border_top_style 	= ( $header_border_top['style'] ) ? $header_border_top['style'] : ' ';
   $header_border_top_color 	= ( $header_border_top['color'] ) ? $header_border_top['color'] : ' ';
  }
								

  
  $header_border_bottom = ot_get_option('header_border_bottom');
  
  if(!empty($header_border_bottom)){
	  $header_border_bottom = array(
												'width' =>$header_border_bottom['width'],
												'unit' =>$header_border_bottom['unit'],
												'style' =>$header_border_bottom['style'],
												'color' =>$header_border_bottom['color'],
								);
								
  }

  
  
  
  $Display_Header_Top = ot_get_option('header_top');
  if($Display_Header_Top=='show'){
	  $Display_Header_Top = 'on';
	  }else{
	  $Display_Header_Top = 'off';
	}
	
  $Transparent_Header = ot_get_option('Transparent_Header');
	$menu_font_size = ot_get_option('menu_font_size');
	$bg_body = ot_get_option('bg_body');
	
	
			if(!empty($bg_body)){
			$bg_body =  array(
								'background-color' =>$bg_body['background-color'],
								'background-repeat' =>$bg_body['background-repeat'],
								'background-attachment' =>$bg_body['background-attachment'],
								'background-position' =>$bg_body['background-position'],
								'background-size' =>$bg_body['background-size'],
								'background-image' => $bg_body['background-image'],
							);
			}
	
  
  /**
   * Create a custom meta boxes array that we pass to 
   * the OptionTree Meta Box API Class.
   */
  $ST_Pages_meta_boxes = array(
    'id'          => 'SimThemes_meta_box',
    'title'       => __( 'ST Options', 'SimThemes' ),
    'desc'        => '',
    'pages'       => array('page' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
		array(
						'label'       => __( 'Slider or Featured Section', 'SimThemes' ),
						'id'          => 'slider-featured-section',
						'type'        => 'tab'
					  ),
			  array(
				'label'       => __( 'Show Slider or Featured Area Section', 'SimThemes' ),
				'id'          => 'show_or_hide_slider_featured',
				'type'        => 'on-off',
				'desc'        => sprintf( __( 'Shows the Show Slider or Featured Area Section when set to %s.', 'SimThemes' ), '<code>on</code>' ),
				'std'         => 'off'
			  ),

			array(
					'id'          => 'select_featured_section_or_slider',
					'label'       => __( 'Choice Featured Section or Slider Section', 'SimThemes' ),
					'desc'        => __( 'Please select it according to your need.', 'SimThemes' ),
					'std'         => 'slider',
					'type'        => 'radio',
					'section'     => 'option_types',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'min_max_step'=> '',
					'class'       => '',
					'condition'   => 'show_or_hide_slider_featured:is(on),show_or_hide_slider_featured:not()',
					'operator'    => 'and',
					'choices'     => array( 
					  array(
						'value'       => 'featured',
						'label'       => __( 'Featured Section', 'SimThemes' ),
						'src'         => ''
					  ),
					  array(
						'value'       => 'slider',
						'label'       => __( 'Slider Section', 'SimThemes' ),
						'src'         => ''
					  )
					)
				  ),


			  array(
				'label'       => __( 'Slider Shortcode', 'SimThemes' ),
				'id'          => 'select_slider',
				'desc'        => __( 'Please provide you slider shortcode here.', 'SimThemes' ),
				'type'        => 'text',
				'section'     => 'option_types',
				'rows'        => '',
				'post_type'   => 'slider',
				'taxonomy'    => '',
				'min_max_step'=> '',
				'class'       => '',
				'condition'   => 'show_or_hide_slider_featured:is(on),show_or_hide_slider_featured:not()',
				'operator'    => 'and',
			),



			  array(
				'label'       => __( 'Featured Area Title', 'SimThemes' ),
				'id'          => 'featured_title',
				'type'        => 'text',
				'section'     => 'option_types',
				'rows'        => '',
				'taxonomy'    => '',
				'min_max_step'=> '',
				'class'       => '',
				'condition'   => 'show_or_hide_slider_featured:is(on),show_or_hide_slider_featured:not()',
				'operator'    => 'and'
			),

			  array(
				'label'       => __( 'Featured Area Title Size', 'SimThemes' ),
				'id'          => 'featured_size',
				'type'        => 'text',
				'section'     => 'option_types',
				'rows'        => '',
				'taxonomy'    => '',
				'min_max_step'=> '',
				'class'       => '',
				'condition'   => 'show_or_hide_slider_featured:is(on),show_or_hide_slider_featured:not()',
				'operator'    => 'and'
			),


			  array(
				'label'       => __( 'Featured Area Title Color', 'SimThemes' ),
				'id'          => 'featured_title_color',
				'type'        => 'colorpicker',
				'section'     => 'option_types',
				'rows'        => '',
				'taxonomy'    => '',
				'min_max_step'=> '',
				'class'       => '',
				'condition'   => 'show_or_hide_slider_featured:is(on),show_or_hide_slider_featured:not()',
				'operator'    => 'and'
			),


		  
			  array(
				'label'       => __( 'Featured Area Text', 'SimThemes' ),
				'id'          => 'featured_text',
				'type'        => 'textarea',
				'section'     => 'option_types',
				'rows'        => '',
				'taxonomy'    => '',
				'min_max_step'=> '',
				'class'       => '',
				'condition'   => 'show_or_hide_slider_featured:is(on),show_or_hide_slider_featured:not()',
				'operator'    => 'and'
			),
			
			  array(
				'label'       => __( 'Featured Area Height', 'SimThemes' ),
				'id'          => 'featured_height',
				'desc'        => __( 'Please use px at the end', 'SimThemes' ),
				'type'        => 'text',
				'section'     => 'option_types',
				'rows'        => '',
				'taxonomy'    => '',
				'min_max_step'=> '',
				'class'       => '',
				'condition'   => 'show_or_hide_slider_featured:is(on),show_or_hide_slider_featured:not()',
				'operator'    => 'and'
			),
			

      array(
        'label'       => __( 'Page', 'SimThemes' ),
        'id'          => 'page',
        'type'        => 'tab'
      ),
	  

	array(
		'id'          => 'enable_page_comments',
        'label'       => __('Enable Comments', 'SimThemes' ),
        'desc'        => __('Globally Enable or Disable Comments on Pages. <span style="color:#690;">Default status is off.</span>', 'SimThemes' ),
        'std'         => 'off',
        'type'        => 'on_off',
		'choices'     => array(
         
		 $the_array[] = 
		 array(
            'value'   => 'on',
            'label'   => __( 'On', 'SimThemes' ),
          ), 
		 array(
            'value'   => 'off',
            'label'   => __( 'off', 'SimThemes' ),
          )
        ),
		
        'section'     => 'option_types',
	),

	  
	  
	  
	  
	array(
		'id'          => 'sidebar',
        'label'       => __('Sidebar Position', 'SimThemes' ),
        'desc'        => __('Please select the sidebar position', 'SimThemes' ),
        'std'         => 'no',
        'type'        => 'select',
		'choices'     => array(
         
		 $the_array[] = 
		 array(
            'value'   => 'no',
            'label'   => __( 'No Sidebar', 'SimThemes' ),
          ), 
		 array(
            'value'   => 'left',
            'label'   => __( 'Left Sidebar', 'SimThemes' ),
          ),
		 array(
            'value'   => 'right',
            'label'   => __( 'Right Sidebar', 'SimThemes' ),
          )
        ),
		
        'section'     => 'option_types',
	),

	  
	  
	  
	  
	  array(
        'id'          => 'sidebar_select',
        'label'       => __( 'Sidebar Select', 'theme-text-domain' ),
        'desc'        => '<p>' . sprintf(  __( 'Please select the sidebar you want to view here.', 'SimThemes' ), '<code>footer-sidebar-$i</code>' ) . '</p>',
        'std'         => 'sidebar1',
        'type'        => 'sidebar-select',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  
	  
		  array(
			'label'       => __( 'Page Content Top Margin', 'SimThemes' ),
			'id'          => 'page_margin_top',
			'type'        => 'text',
			'desc'        => __( 'In pixels ex: 20px. Leave empty for default value.', 'SimThemes' ),
			'std'         => '40px'
		  ),
		  array(
			'label'       => __( 'Page Content Bottom Margin', 'SimThemes' ),
			'id'          => 'page_margin_bottom',
			'type'        => 'text',
			'desc'        => __( 'In pixels ex: 20px. Leave empty for default value.', 'SimThemes' ),
			'std'         => '40px'
		  ),

		  
		  
		  
		  array(
			'label'       => __( 'Page Content Top Padding', 'SimThemes' ),
			'id'          => 'page_padding_top',
			'type'        => 'text',
			'desc'        => __( 'In pixels ex: 10px. Leave empty for default value.', 'SimThemes' ),
			'std'         => '10px'
		  ),
		  array(
			'label'       => __( 'Page Content Bottom Padding', 'SimThemes' ),
			'id'          => 'page_padding_bottom',
			'type'        => 'text',
			'desc'        => __( 'In pixels ex: 10px. Leave empty for default value.', 'SimThemes' ),
			'std'         => '10px'
		  ),

		  
		  
		  
		  
		  
		  
		  
		  
		  

      array(
        'label'       => __( 'Header', 'SimThemes' ),
        'id'          => 'header',
        'type'        => 'tab'
      ),

		  array(
						'id'          => 'Display_Header',
						'label'       => __( 'Display Header', 'SimThemes' ),
						'desc'        => __( 'Choose to show or hide the header.', 'SimThemes' ),
						'type'        => 'on-off',
						'std'         => 'on'
					  ),
					  


	array(
		'id'          => 'Transparent_Header',
        'label'       => __('Transparent Header', 'SimThemes' ),
        'desc'        => __('', 'SimThemes' ),
        'std'         => $Transparent_Header,
        'type'        => 'on-off',
		
        'section'     => 'option_types',
		'condition'   => 'Display_Header:is(on),Display_Header:not()',
	),





					  
					  
					  
					  
	
		  array(
						'id'          => 'header_border_top',
						'label'       => __('Header Border Top', 'simthemes' ),
						'desc'        => __('', 'simthemes' ),
						'type'        => 'border',
						'section'     => 'option_types',
						'std'        => 
								array(
												'width' =>$header_border_top_width,
												'unit' =>$header_border_top_unit,
												'style' =>$header_border_top_style,
												'color' =>$header_border_top_color,
								),
						'rows'        => '',
						'post_type'   => '',
						'taxonomy'    => '',
						'class'       => '',
		  				'condition'   => 'Display_Header:is(on),Display_Header:not()',

		  
		  ),	
		
		
		  array(
						'id'          => 'header_border_bottom',
						'label'       => __('Header Border Bottom', 'simthemes' ),
						'desc'        => __('', 'simthemes' ),
						'type'        => 'border',
						'section'     => 'option_types',
						'std'        => $header_border_bottom,
						'rows'        => '',
						'post_type'   => '',
						'taxonomy'    => '',
						'class'       => '',
		  				'condition'   => 'Display_Header:is(on),Display_Header:not()',

		  
		  ),	
		
		
		  array(
						'id'          => 'Background_header',
						'label'       => __( 'Background', 'SimThemes' ),
						'desc'        => __( '', 'SimThemes' ),
						'type'        => 'background',
						'section'     => 'option_types',
						'rows'        => '',
						'post_type'   => '',
						'taxonomy'    => '',
						'min_max_step'=> '',
						'class'       => '',
						'condition'   => '',
						'std'        => $header_bg,
						'operator'    => 'and',
						'condition'   => 'Display_Header:is(on),Display_Header:not()',
						
					  ),
	
					  array(
						'label'       => __( 'Main Navigation Menu', 'SimThemes' ),
						'id'          => 'main_navigation_menu',
						'type'        => 'text',
						'desc'        => __( 'Provide the name of menu displays on this page.', 'SimThemes' ),
						'std'         => '',
						'condition'   => 'Display_Header:is(on),Display_Header:not()',
					  ),
					  
					  
					  array(
						'label'       => __( 'Show Header Top', 'SimThemes' ),
						'id'          => 'show_header_top',
						'type'        => 'on-off',
						'desc'        => sprintf( __( 'Shows the Slider when set to %s.', 'SimThemes' ), '<code>on</code>' ),
						'std'         => $Display_Header_Top,
						'condition'   => 'Display_Header:is(on),Display_Header:not()',
					  ),
					  





      array(
        'label'       => __( 'Menu', 'SimThemes' ),
        'id'          => 'menu',
        'type'        => 'tab'
      ),


	array(
	
		'label'       => __('Important Note', 'SimThemes' ),
        'id'          => 'header_setting',
        'type'        => 'textblock',
        'desc'        => __('Menu Setting', 'SimThemes' ),
        'class'       => 'theme_option_notice',
		'section'     => 'option_types',

		
	),


	
	array(
		'label'       => __('Menu section Backgroun Color', 'SimThemes' ),
        'id'          => 'menu_background_color',
        'type'        => 'colorpicker-opacity',
        'desc'        => __('Change menu item color', 'SimThemes' ),
        'class'          => 'menu_background_color',
		'section'     => 'option_types',
		'std'		=> ot_get_option('menu_background_color')
	),


	array(
		'label'       => __('Menu Item Color', 'SimThemes' ),
        'id'          => 'menu_item_color',
        'type'        => 'colorpicker',
        'desc'        => __('Change menu item color', 'SimThemes' ),
        'class'          => '',
		'section'     => 'option_types',
		'std'		=> ot_get_option('menu_item_color')
	),


	array(
		'label'       => __('Menu Item Hover Color', 'SimThemes' ),
        'id'          => 'menu_item_hover_color',
        'type'        => 'colorpicker',
        'desc'        => __('Change menu item color hover', 'SimThemes' ),
        'class'          => '',
		'section'     => 'option_types',
		'std'		=> ot_get_option('menu_item_hover_color')
	),

	array(
		'label'       => __('Menu Item Hover Background', 'SimThemes' ),
        'id'          => 'menu_item_hover_background',
        'type'        => 'colorpicker-opacity',
        'desc'        => __('Change menu item hover background color', 'SimThemes' ),
        'section'     => 'option_types',
        'class'          => '',
		'std'		=> ot_get_option('menu_item_hover_background')
	),


	array(
		'label'       => __('Menu Item Active Background', 'SimThemes' ),
        'id'          => 'menu_item_active_background',
        'type'        => 'colorpicker-opacity',
        'desc'        => __('Change menu item active background color', 'SimThemes' ),
        'section'     => 'option_types',
        'class'          => '',
		'std'		=> ot_get_option('menu_item_active_background')
	),


	array(
		'label'       => __('Dropdown Background', 'SimThemes' ),
        'id'          => 'dropdown_background',
        'type'        => 'colorpicker-opacity',
        'desc'        => __('', 'SimThemes' ),
        'section'     => 'option_types',
        'class'          => '',
		'std'		=> ot_get_option('dropdown_background')
	),

	array(
		'label'       => __('Dropdown Item Hover Background Color', 'SimThemes' ),
        'id'          => 'dropdown_item_hover_background',
        'type'        => 'colorpicker-opacity',
        'desc'        => __('', 'SimThemes' ),
       'section'     => 'option_types',
        'class'          => '',
		'std'		=> ot_get_option('dropdown_item_hover_background')
	),


	array(
		'label'       => __('Dropdown Item Active Background Color', 'SimThemes' ),
        'id'          => 'dropdown_item_active_background',
        'type'        => 'colorpicker-opacity',
        'desc'        => __('', 'SimThemes' ),
       'section'     => 'option_types',
        'class'          => '',
		'std'		=> ot_get_option('dropdown_item_active_background')
	),

	array(
		'label'       => __('Dropdown Item Color', 'SimThemes' ),
        'id'          => 'dropdown_item_color',
        'type'        => 'colorpicker',
        'desc'        => __('', 'SimThemes' ),
       'section'     => 'option_types',
        'class'          => '',
		'std'		=> ot_get_option('dropdown_item_color')
	),


	array(
		'label'       => __('Dropdown Item Hover Color', 'SimThemes' ),
        'id'          => 'dropdown_item_hover_color',
        'type'        => 'colorpicker',
        'desc'        => __('', 'SimThemes' ),
        'section'     => 'option_types',
        'class'          => '',
		'std'		=> ot_get_option('dropdown_item_hover_color')
	),


	array(
		'label'       => __('Dropdown Item Active Color', 'SimThemes' ),
        'id'          => 'dropdown_item_active_color',
        'type'        => 'colorpicker',
        'desc'        => __('', 'SimThemes' ),
        'section'     => 'option_types',
        'class'          => '',
		'std'		=> ot_get_option('dropdown_item_active_color')
	),




	array(
					'label'       => __( 'Menu Font Size', 'SimThemes' ),
					'id'          => 'menu_font_size',
					'desc'        => __('Please provide the menu font size.', 'simthemes' ),
					'std'         => array(
											'0'=> $menu_font_size['0'],
											'1'=> $menu_font_size['1'],
										),
					'type'        => 'measurement',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					 'section'     => 'option_types',
	),


	array(
					'label'       => __( 'Menu Dropdown Font Size', 'SimThemes' ),
					'id'          => 'menu_font_size_dropdown',
					'desc'        => __('Please provide the menu dropdown font size.', 'simthemes' ),
					'std'         => array(
											'0'=> $menu_font_size_dropdown['0'],
											'1'=> $menu_font_size_dropdown['1'],
										),
					'type'        => 'measurement',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'section'     => 'option_types',
	),
	
	
	







					  
	  
					  
					  

      array(
        'label'       => __( 'Footer', 'SimThemes' ),
        'id'          => 'footer',
        'type'        => 'tab'
      ),

		  array(
						'id'          => 'Display_footer_widget_area',
						'label'       => __( 'Display Footer Widget Area', 'SimThemes' ),
						'desc'        => __( 'Choose to show or hide the footer.', 'SimThemes' ),
						'type'        => 'on-off',
						'std'         => 'on'
					  ),
		  array(
						'id'          => 'Display_footer_widget_area',
						'label'       => __( 'Display Copyright Area', 'SimThemes' ),
						'desc'        => __( 'Choose to show or hide the copyright area.', 'SimThemes' ),
						'type'        => 'on-off',
						'std'         => 'on'
					  ),





      array(
        'label'       => __( 'Background', 'SimThemes' ),
        'id'          => 'background',
        'type'        => 'tab'
      ),

		  array(
						'id'          => 'Display_Custom_Background',
						'label'       => __( 'Display Custom Background', 'SimThemes' ),
						//'desc'        => __( 'Choose to show or hide the header.', 'SimThemes' ),
						'type'        => 'on-off',
						'std'         => $Display_Custom_Background
					  ),
	
		  array(
						'id'          => 'bg_body',
						'label'       => __( 'Background', 'SimThemes' ),
						'desc'        => __( '', 'SimThemes' ),
						'type'        => 'background',
						'section'     => 'option_types',
						'rows'        => '',
						'post_type'   => '',
						'taxonomy'    => '',
						'min_max_step'=> '',
						'class'       => '',
						'condition'   => '',
						'operator'    => 'and',
						'condition'   => 'Display_Custom_Background:is(on),Display_Custom_Background:not()',
						'std'        => $bg_body,

						
						
						
					  ),


      array(
        'label'       => __( 'Page Title Bar', 'SimThemes' ),
        'id'          => 'page_title',
        'type'        => 'tab'
      ),

		  array(
						'id'          => 'page_title_bar',
						'label'       => __( 'Page Title Bar', 'SimThemes' ),
						//'desc'        => __( 'Choose to show or hide the header.', 'SimThemes' ),
						'type'        => 'on-off',
						'std'         => $page_title_bar
					  ),
	
		  array(
						'id'          => 'page_title_bar_custom_text',
						'label'       => __( 'Custom Title', 'SimThemes' ),
						'desc'        => __( 'On to show custom title', 'SimThemes' ),
						'type'        => 'on-off',
						'std'         => 'off'
					  ),
	

		  array(
					'label'       => __( 'Custom Title', 'SimThemes' ),
					'id'          => 'Custom_Title_Text',
					'type'        => 'text',
					'desc'        => __( 'Insert custom text for the page title bar.', 'SimThemes' ),
					'std'         => ''
				  ),




		  array(
					'label'       => __( 'Custom Subheader Text', 'SimThemes' ),
					'id'          => 'Page_Title_Bar_Custom_Subheader_Text',
					'type'        => 'text',
					'desc'        => __( 'Insert custom subhead text for the page title bar.', 'SimThemes' ),
					'std'         => ''
				  ),



		  array(
					'label'       => __( 'Page Title Bar Height', 'SimThemes' ),
					'id'          => 'Page_Title_Bar_Height',
					'desc'        => __('Example: 87px', 'simthemes' ),
					'std'         => $Page_Title_Bar_Height ,
					'type'        => 'measurement',
					'section'     => 'header',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
				  ),



		  array(
						'id'          => 'title_background_page',
						'label'       => __( 'Title Background', 'SimThemes' ),
						'desc'        => __( '', 'SimThemes' ),
						'type'        => 'background',
						'std'        =>$title_background_page, 
						'section'     => 'option_types',
						'rows'        => '',
						'post_type'   => '',
						'taxonomy'    => '',
						'min_max_step'=> '',
						'class'       => '',
						'condition'   => '',
						'operator'    => 'and',
						
					  ),



		array(
							'label'       => __('Heading Color', 'SimThemes' ),
							'id'          => 'heading_color_m',
							'type'        => 'colorpicker',
							'desc'        => __('', 'SimThemes' ),
							'section'     => 'page_title',
							'std'		  => $Heading_Color
						),
		
		
		
		array(
							'label'       => __('Text Color', 'SimThemes' ),
							'id'          => 'Text_Color',
							'type'        => 'colorpicker',
							'desc'        => __('', 'SimThemes' ),
							'section'     => 'page_title',
							'std'		  => $Text_Color
						),				












    )
  );
  
  /**
   * Register our meta boxes using the 
   * ot_register_meta_box() function.
   */
  if ( function_exists( 'ot_register_meta_box' ) )
    ot_register_meta_box( $ST_Pages_meta_boxes );

}

