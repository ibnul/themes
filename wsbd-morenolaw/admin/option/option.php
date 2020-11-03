<?php

return array(
	'title' => __('Moreno Law Options', 'morenolaw'),
	'logo' => get_bloginfo('template_directory').'/images/options-logo.jpg',
	'menus' => array(
		array(
			'title' => __('General Options', 'morenolaw'),
			'name' => 'general_options',
			'icon' => 'font-awesome:fa-cogs',
			'controls' => array(
				
				array(
					'type' => 'section',
					'title' => __('General options', 'morenolaw'),
					'name' => 'general_options',
					'fields' => array(
					array(
							'type' => 'upload',
							'name' => 'upload_logo',
							'label' => __('Upload Logo', 'morenolaw'),
							'default' => get_bloginfo('template_directory').'/images/header-logo.png',
						),
					array(
						'type' => 'upload',
						'name' => 'fav_icon',
						'label' => __('Upload Favicon', 'morenolaw'),
							'default' => get_bloginfo('template_directory').'/images/favicon.png',
						),
					),
				),				
				
			),
		),
		array(
			'title' => __('Home Page', 'morenolaw'),
			'name' => 'home_page',
			'icon' => 'font-awesome:fa-home',
			'controls' => array(
				
				array(
					'type' => 'section',
					'title' => __('Home Page', 'morenolaw'),
					'name' => 'home_page',
					'fields' => array(
					array(
							'type' => 'upload',
							'name' => 'upload_banner',
							'label' => __('Upload Banner Image', 'morenolaw'),
							'default' => get_bloginfo('template_directory').'/images/home-banner.png',
						),
					array(
							'type' => 'textbox',
							'name' => 'title_text',
							'label' => __('Home Title Text', 'morenolaw'),
							'default' => 'We might just change your opinion about lawyers',
						),
					array(
							'type' => 'textbox',
							'name' => 'slogan_text',
							'label' => __('Home Slogan Text', 'morenolaw'),
							'default' => 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin ut fermentum libero, id mollis leo. Vivamus mollis aliquam mauris, ut euismod justo vehicula eget.',
						),
					array(
							'type' => 'textbox',
							'name' => 'call_phone',
							'label' => __('Call Us Number', 'morenolaw'),
							'default' => '(617) 868-5767',
						),
					array(
						'type' => 'upload',
						'name' => 'about_bg',
						'label' => __('Upload About Background', 'morenolaw'),
						'default' => '',
						),
					),
				),
				
				array(
					'type' => 'section',
					'title' => __('Styling', 'morenolaw'),
					'name' => 'home_header_link',					
					'fields' => array(
						array(
							'type' => 'textbox',
							'name' => 'button_text',
							'label' => __('Button Text', 'morenolaw'),
							'default' => 'LEARN MORE',
						),
						array(
							'type' => 'textbox',
							'name' => 'button_link',
							'label' => __('Button link', 'morenolaw'),
							'default' => '#',
						),
						array(
							'type' => 'color',
							'name' => 'button_color',
							'label' => __('Button Color', 'morenolaw'),
							'default' => '#27204e',
						),
					 ),
					
					
					
				),
				
			),
		),		
		array(
			'title' => __('Footer Options', 'morenolaw'),
			'name' => 'footer_options',
			'icon' => 'font-awesome:fa-gavel',
			'controls' => array(				
										
				array(
					'type' => 'section',
					'title' => __('Footer Main', 'morenolaw'),
					'name' => 'footer_main',
					'fields' => array(
					
					    array(
							'type' => 'upload',
							'name' => 'footer_logo',
							'label' => __('Footer Logo', 'morenolaw'),
							'default' => get_bloginfo('template_directory').'/images/footer_logo.png',
						),						
												 
					),
				),
				
			),
		
		),		
		array(
			'title' => __('Social', 'morenolaw'),
			'name' => 'social',
			'icon' => 'font-awesome:fa-share-square',
			'controls' => array(				
										
				array(
					'type' => 'section',
					'title' => __('Social Links', 'morenolaw'),
					'name' => 'social_links',
					'fields' => array(
					
					    array(
							'type' => 'textbox',
							'name' => 'facebook_link',
							'label' => __('Facebook URL', 'morenolaw'),							
						),
					    array(
							'type' => 'upload',
							'name' => 'facebook_icon',
							'label' => __('Facebook Icon', 'morenolaw'),
							'default' => get_bloginfo('template_directory').'/images/facebook.png',
						),
					
					    array(
							'type' => 'textbox',
							'name' => 'twitter_link',
							'label' => __('Twitter URL', 'morenolaw'),							
						),
					    array(
							'type' => 'upload',
							'name' => 'twitter_icon',
							'label' => __('Twitter Icon', 'morenolaw'),
							'default' => get_bloginfo('template_directory').'/images/twitter.png',
						),
					
					    array(
							'type' => 'textbox',
							'name' => 'linkedin_link',
							'label' => __('LinkedIn URL', 'morenolaw'),							
						),
					    array(
							'type' => 'upload',
							'name' => 'linkedin_icon',
							'label' => __('LinkedIn Icon', 'morenolaw'),
							'default' => get_bloginfo('template_directory').'/images/linkedin.png',
						),						
												 
					),
				),
				
			),
		
		),
		
	)
);

/**
 *EOF
 */