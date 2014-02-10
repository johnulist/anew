<?php

/*  Initialize the options before anything else. 
/* ------------------------------------ */
add_action( 'admin_init', 'custom_theme_options', 1 );


/*  Build the custom settings & update OptionTree.
/* ------------------------------------ */
function custom_theme_options() {
	
	// Get a copy of the saved settings array.
	$saved_settings = get_option( 'option_tree_settings', array() );

	// Custom settings array that will eventually be passed to the OptionTree Settings API Class.
	$custom_settings = array(

/*  Help pages
/* ------------------------------------ */	
	'contextual_help' => array(
      'content'       => array( 
        array(
          'id'        => 'general_help',
          'title'     => 'Documentation',
          'content'   => '
			<h1>Anew</h1>
			<p>Thanks for using this theme! Enjoy.</p>
			<ul>
				<li>Read the theme documentation <a target="_blank" href="'.get_template_directory_uri().'/functions/documentation/documentation.html">here</a></li>
				<li>Download the sample child theme <a href="https://github.com/AlxMedia/anew-child/archive/master.zip">here</a></li>
				<li>Download or contribute translations <a target="_blank" href="https://github.com/AlxMedia/anew-languages">here</a></li>
				<li>Anew is on <a target="_blank" href="https://github.com/AlxMedia/anew">GitHub</a></li>
			</ul>
			<hr />
			<p>You can support the theme author by donating <a target="_blank" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=C5J7JHMSHW9T8">here</a> – any amount is always appreciated.</p>
		'
        )
      )
    ),
	
/*  Admin panel sections
/* ------------------------------------ */	
	'sections'        => array(
		array(
			'id'		=> 'general',
			'title'		=> 'General'
		),
		array(
			'id'		=> 'blog',
			'title'		=> 'Blog'
		),
		array(
			'id'		=> 'header',
			'title'		=> 'Header'
		),
		array(
			'id'		=> 'footer',
			'title'		=> 'Footer'
		),
		array(
			'id'		=> 'layout',
			'title'		=> 'Layout'
		),
		array(
			'id'		=> 'sidebars',
			'title'		=> 'Sidebars'
		),
		array(
			'id'		=> 'social-links',
			'title'		=> 'Social Links'
		),
		array(
			'id'		=> 'styling',
			'title'		=> 'Styling'
		),
	),
	
/*  Theme options
/* ------------------------------------ */
	'settings'        => array(
		
		// General: Custom CSS
		array(
			'id'		=> 'custom',
			'label'		=> 'Custom Stylesheet',
			'desc'		=> 'Load custom stylesheet [ <strong>custom.css</strong> ]<br /><i>Note: You must backup this file before a theme update. Consider using a <a target="_blank" href="http://codex.wordpress.org/Child_Themes">child theme</a> instead. A sample child theme is available in the help dropdown.</i>',
			'std'		=> 'off',
			'type'		=> 'on-off',
			'section'	=> 'general'
		),
		// General: Responsive Layout
		array(
			'id'		=> 'responsive',
			'label'		=> 'Responsive Layout',
			'desc'		=> 'Mobile and tablet optimizations [ <strong>responsive.css</strong> ]',
			'std'		=> 'on',
			'type'		=> 'on-off',
			'section'	=> 'general'
		),
		// General: Mobile Sidebar
		array(
			'id'		=> 'mobile-sidebar-hide',
			'label'		=> 'Mobile Sidebar Content',
			'desc'		=> 'Sidebar content on low-resolution mobile devices (320px)',
			'std'		=> 'on',
			'type'		=> 'on-off',
			'section'	=> 'general'
		),
		// General: Favicon
		array(
			'id'		=> 'favicon',
			'label'		=> 'Favicon',
			'desc'		=> 'Upload a 16x16px Png/Gif image that will be your favicon',
			'type'		=> 'upload',
			'section'	=> 'general'
		),
		// General: RSS Feed
		array(
			'id'		=> 'rss-feed',
			'label'		=> 'FeedBurner URL',
			'desc'		=> 'Enter your full FeedBurner URL (or any other preferred feed URL) if you wish to use FeedBurner over the standard WordPress feed e.g. http://feeds.feedburner.com/yoururlhere ',
			'type'		=> 'text',
			'section'	=> 'general'
		),
		// General: Tracking Code
		array(
			'id'		=> 'tracking-code',
			'label'		=> 'Tracking Code',
			'desc'		=> 'Paste your Google Analytics (or other) tracking code here. It will be inserted before the closing body tag of your theme.',
			'type'		=> 'textarea-simple',
			'section'	=> 'general',
			'rows'		=> '3'
		),
		// General: Comments
		array(
			'id'		=> 'page-comments',
			'label'		=> 'Page Comments',
			'desc'		=> 'Comments on pages',
			'std'		=> 'off',
			'type'		=> 'on-off',
			'section'	=> 'general'
		),
		// Blog: Single - Content or Excerpt
		array(
			'id'		=> 'post-text',
			'label'		=> 'Entry Text',
			'desc'		=> 'More link appears at the bottom of both excerpt and content',
			'std'		=> 'excerpt',
			'type'		=> 'radio',
			'section'	=> 'blog',
			'choices'	=> array(
				array( 
					'value' => 'excerpt',
					'label' => 'Show Excerpt'
				),
				array( 
					'value' => 'content',
					'label' => 'Show Content'
				)
			)
		),
		// Blog: Excerpt Length
		array(
			'id'			=> 'excerpt-length',
			'label'			=> 'Excerpt Length',
			'desc'			=> 'Max number of words',
			'std'			=> '34',
			'type'			=> 'numeric-slider',
			'section'		=> 'blog',
			'min_max_step'	=> '0,100,1'
		),
		// Blog: Single - Sharrre
		array(
			'id'		=> 'sharrre',
			'label'		=> 'Single &mdash; Share Bar',
			'desc'		=> 'Social sharing buttons for each article',
			'std'		=> 'on',
			'type'		=> 'on-off',
			'section'	=> 'blog'
		),
		// Blog: Twitter Username
		array(
			'id'		=> 'twitter-username',
			'label'		=> 'Twitter Username',
			'desc'		=> 'Your @username will be added to share-tweets of your posts (optional)',
			'type'		=> 'text',
			'section'	=> 'blog'
		),
		// Blog: Single - Authorbox
		array(
			'id'		=> 'author-bio',
			'label'		=> 'Single &mdash; Author Bio',
			'desc'		=> 'Shows post author description, if it exists',
			'std'		=> 'on',
			'type'		=> 'on-off',
			'section'	=> 'blog'
		),
		// Blog: Single - Post Navigation
		array(
			'id'		=> 'post-nav',
			'label'		=> 'Single &mdash; Post Navigation',
			'desc'		=> 'Shows links to the next and previous article',
			'std'		=> 'on',
			'type'		=> 'on-off',
			'section'	=> 'blog'
		),
		// Header: Custom Logo
		array(
			'id'		=> 'custom-logo',
			'label'		=> 'Custom Logo',
			'desc'		=> 'Upload your custom logo image. Set logo max-height in styling options.',
			'type'		=> 'upload',
			'section'	=> 'header'
		),
		// Header: Site Description
		array(
			'id'		=> 'site-description',
			'label'		=> 'Site Description',
			'desc'		=> 'The description that appears next to your logo',
			'std'		=> 'on',
			'type'		=> 'on-off',
			'section'	=> 'header'
		),
		// Header: Header Image
		array(
			'id'		=> 'header-image',
			'label'		=> 'Header Image',
			'desc'		=> 'Upload a header image. This will disable header title/logo, description and social links.',
			'type'		=> 'upload',
			'section'	=> 'header'
		),
		// Footer: Widget Columns
		array(
			'id'		=> 'footer-widgets',
			'label'		=> 'Footer Widget Columns',
			'desc'		=> 'Select columns to enable footer widgets<br /><i>Recommended number: 3</i>',
			'std'		=> '0',
			'type'		=> 'radio-image',
			'section'	=> 'footer',
			'class'		=> '',
			'choices'	=> array(
				array(
					'value'		=> '0',
					'label'		=> 'Disable',
					'src'		=> get_template_directory_uri() . '/functions/images/layout-off.png'
				),
				array(
					'value'		=> '1',
					'label'		=> '1 Column',
					'src'		=> get_template_directory_uri() . '/functions/images/footer-widgets-1.png'
				),
				array(
					'value'		=> '2',
					'label'		=> '2 Columns',
					'src'		=> get_template_directory_uri() . '/functions/images/footer-widgets-2.png'
				),
				array(
					'value'		=> '3',
					'label'		=> '3 Columns',
					'src'		=> get_template_directory_uri() . '/functions/images/footer-widgets-3.png'
				),
				array(
					'value'		=> '4',
					'label'		=> '4 Columns',
					'src'		=> get_template_directory_uri() . '/functions/images/footer-widgets-4.png'
				)
			)
		),
		// Footer: Custom Logo
		array(
			'id'		=> 'footer-logo',
			'label'		=> 'Footer Logo',
			'desc'		=> 'Upload your custom logo image',
			'type'		=> 'upload',
			'section'	=> 'footer'
		),
		// Footer: Copyright
		array(
			'id'		=> 'copyright',
			'label'		=> 'Footer Copyright',
			'desc'		=> 'Replace the footer copyright text',
			'type'		=> 'text',
			'section'	=> 'footer'
		),
		// Footer: Credit
		array(
			'id'		=> 'credit',
			'label'		=> 'Footer Credit',
			'desc'		=> 'Footer credit text',
			'std'		=> 'on',
			'type'		=> 'on-off',
			'section'	=> 'footer'
		),
		// Layout : Global
		array(
			'id'		=> 'layout-global',
			'label'		=> 'Global Layout',
			'desc'		=> 'Other layouts will override this option if they are set',
			'std'		=> 'col-2cl',
			'type'		=> 'radio-image',
			'section'	=> 'layout',
			'choices'	=> array(
				array(
					'value'		=> 'col-1c',
					'label'		=> '1 Column',
					'src'		=> get_template_directory_uri() . '/functions/images/col-1c.png'
				),
				array(
					'value'		=> 'col-2cl',
					'label'		=> '2 Column Left',
					'src'		=> get_template_directory_uri() . '/functions/images/col-2cl.png'
				),
				array(
					'value'		=> 'col-2cr',
					'label'		=> '2 Column Right',
					'src'		=> get_template_directory_uri() . '/functions/images/col-2cr.png'
				)
			)
		),
		// Layout : Home
		array(
			'id'		=> 'layout-home',
			'label'		=> 'Home',
			'desc'		=> '[ <strong>is_home</strong> ] Posts homepage layout',
			'std'		=> 'inherit',
			'type'		=> 'radio-image',
			'section'	=> 'layout',
			'choices'	=> array(
				array(
					'value'		=> 'inherit',
					'label'		=> 'Inherit Global Layout',
					'src'		=> get_template_directory_uri() . '/functions/images/layout-off.png'
				),
				array(
					'value'		=> 'col-1c',
					'label'		=> '1 Column',
					'src'		=> get_template_directory_uri() . '/functions/images/col-1c.png'
				),
				array(
					'value'		=> 'col-2cl',
					'label'		=> '2 Column Left',
					'src'		=> get_template_directory_uri() . '/functions/images/col-2cl.png'
				),
				array(
					'value'		=> 'col-2cr',
					'label'		=> '2 Column Right',
					'src'		=> get_template_directory_uri() . '/functions/images/col-2cr.png'
				)
			)
		),
		// Layout : Single
		array(
			'id'		=> 'layout-single',
			'label'		=> 'Single',
			'desc'		=> '[ <strong>is_single</strong> ] Single post layout - If a post has a set layout, it will override this.',
			'std'		=> 'inherit',
			'type'		=> 'radio-image',
			'section'	=> 'layout',
			'choices'	=> array(
				array(
					'value'		=> 'inherit',
					'label'		=> 'Inherit Global Layout',
					'src'		=> get_template_directory_uri() . '/functions/images/layout-off.png'
				),
				array(
					'value'		=> 'col-1c',
					'label'		=> '1 Column',
					'src'		=> get_template_directory_uri() . '/functions/images/col-1c.png'
				),
				array(
					'value'		=> 'col-2cl',
					'label'		=> '2 Column Left',
					'src'		=> get_template_directory_uri() . '/functions/images/col-2cl.png'
				),
				array(
					'value'		=> 'col-2cr',
					'label'		=> '2 Column Right',
					'src'		=> get_template_directory_uri() . '/functions/images/col-2cr.png'
				)
			)
		),
		// Layout : Archive
		array(
			'id'		=> 'layout-archive',
			'label'		=> 'Archive',
			'desc'		=> '[ <strong>is_archive</strong> ] Category, date, tag and author archive layout',
			'std'		=> 'inherit',
			'type'		=> 'radio-image',
			'section'	=> 'layout',
			'choices'	=> array(
				array(
					'value'		=> 'inherit',
					'label'		=> 'Inherit Global Layout',
					'src'		=> get_template_directory_uri() . '/functions/images/layout-off.png'
				),
				array(
					'value'		=> 'col-1c',
					'label'		=> '1 Column',
					'src'		=> get_template_directory_uri() . '/functions/images/col-1c.png'
				),
				array(
					'value'		=> 'col-2cl',
					'label'		=> '2 Column Left',
					'src'		=> get_template_directory_uri() . '/functions/images/col-2cl.png'
				),
				array(
					'value'		=> 'col-2cr',
					'label'		=> '2 Column Right',
					'src'		=> get_template_directory_uri() . '/functions/images/col-2cr.png'
				)
			)
		),
		// Layout : Archive - Category
		array(
			'id'		=> 'layout-archive-category',
			'label'		=> 'Archive &mdash; Category',
			'desc'		=> '[ <strong>is_category</strong> ] Category archive layout',
			'std'		=> 'inherit',
			'type'		=> 'radio-image',
			'section'	=> 'layout',
			'choices'	=> array(
				array(
					'value'		=> 'inherit',
					'label'		=> 'Inherit Global Layout',
					'src'		=> get_template_directory_uri() . '/functions/images/layout-off.png'
				),
				array(
					'value'		=> 'col-1c',
					'label'		=> '1 Column',
					'src'		=> get_template_directory_uri() . '/functions/images/col-1c.png'
				),
				array(
					'value'		=> 'col-2cl',
					'label'		=> '2 Column Left',
					'src'		=> get_template_directory_uri() . '/functions/images/col-2cl.png'
				),
				array(
					'value'		=> 'col-2cr',
					'label'		=> '2 Column Right',
					'src'		=> get_template_directory_uri() . '/functions/images/col-2cr.png'
				)
			)
		),
		// Layout : Search
		array(
			'id'		=> 'layout-search',
			'label'		=> 'Search',
			'desc'		=> '[ <strong>is_search</strong> ] Search page layout',
			'std'		=> 'inherit',
			'type'		=> 'radio-image',
			'section'	=> 'layout',
			'choices'	=> array(
				array(
					'value'		=> 'inherit',
					'label'		=> 'Inherit Global Layout',
					'src'		=> get_template_directory_uri() . '/functions/images/layout-off.png'
				),
				array(
					'value'		=> 'col-1c',
					'label'		=> '1 Column',
					'src'		=> get_template_directory_uri() . '/functions/images/col-1c.png'
				),
				array(
					'value'		=> 'col-2cl',
					'label'		=> '2 Column Left',
					'src'		=> get_template_directory_uri() . '/functions/images/col-2cl.png'
				),
				array(
					'value'		=> 'col-2cr',
					'label'		=> '2 Column Right',
					'src'		=> get_template_directory_uri() . '/functions/images/col-2cr.png'
				)
			)
		),
		// Layout : Error 404
		array(
			'id'		=> 'layout-404',
			'label'		=> 'Error 404',
			'desc'		=> '[ <strong>is_404</strong> ] Error 404 page layout',
			'std'		=> 'inherit',
			'type'		=> 'radio-image',
			'section'	=> 'layout',
			'choices'	=> array(
				array(
					'value'		=> 'inherit',
					'label'		=> 'Inherit Global Layout',
					'src'		=> get_template_directory_uri() . '/functions/images/layout-off.png'
				),
				array(
					'value'		=> 'col-1c',
					'label'		=> '1 Column',
					'src'		=> get_template_directory_uri() . '/functions/images/col-1c.png'
				),
				array(
					'value'		=> 'col-2cl',
					'label'		=> '2 Column Left',
					'src'		=> get_template_directory_uri() . '/functions/images/col-2cl.png'
				),
				array(
					'value'		=> 'col-2cr',
					'label'		=> '2 Column Right',
					'src'		=> get_template_directory_uri() . '/functions/images/col-2cr.png'
				)
			)
		),
		// Layout : Default Page
		array(
			'id'		=> 'layout-page',
			'label'		=> 'Default Page',
			'desc'		=> '[ <strong>is_page</strong> ] Default page layout - If a page has a set layout, it will override this.',
			'std'		=> 'inherit',
			'type'		=> 'radio-image',
			'section'	=> 'layout',
			'choices'	=> array(
				array(
					'value'		=> 'inherit',
					'label'		=> 'Inherit Global Layout',
					'src'		=> get_template_directory_uri() . '/functions/images/layout-off.png'
				),
				array(
					'value'		=> 'col-1c',
					'label'		=> '1 Column',
					'src'		=> get_template_directory_uri() . '/functions/images/col-1c.png'
				),
				array(
					'value'		=> 'col-2cl',
					'label'		=> '2 Column Left',
					'src'		=> get_template_directory_uri() . '/functions/images/col-2cl.png'
				),
				array(
					'value'		=> 'col-2cr',
					'label'		=> '2 Column Right',
					'src'		=> get_template_directory_uri() . '/functions/images/col-2cr.png'
				)
			)
		),
		// Sidebars: Create Areas
		array(
			'id'		=> 'sidebar-areas',
			'label'		=> 'Create Sidebars',
			'desc'		=> 'You must save changes for the new areas to appear below. <br /><i>Warning: Make sure each area has a unique ID.</i>',
			'type'		=> 'list-item',
			'section'	=> 'sidebars',
			'choices'	=> array(),
			'settings'	=> array(
				array(
					'id'		=> 'id',
					'label'		=> 'Sidebar ID',
					'desc'		=> 'This ID must be unique, for example "sidebar-about"',
					'std'		=> 'sidebar-',
					'type'		=> 'text',
					'choices'	=> array()
				)
			)
		),
		// Sidebar 1 & 2
		array(
			'id'		=> 's1-home',
			'label'		=> 'Home',
			'desc'		=> '[ <strong>is_home</strong> ]',
			'type'		=> 'sidebar-select',
			'section'	=> 'sidebars'
		),
		array(
			'id'		=> 's1-single',
			'label'		=> 'Single',
			'desc'		=> '[ <strong>is_single</strong> ] If a single post has a unique sidebar, it will override this.',
			'type'		=> 'sidebar-select',
			'section'	=> 'sidebars'
		),
		array(
			'id'		=> 's1-archive',
			'label'		=> 'Archive',
			'desc'		=> '[ <strong>is_archive</strong> ]',
			'type'		=> 'sidebar-select',
			'section'	=> 'sidebars'
		),
		array(
			'id'		=> 's1-archive-category',
			'label'		=> 'Archive &mdash; Category',
			'desc'		=> '[ <strong>is_category</strong> ]',
			'type'		=> 'sidebar-select',
			'section'	=> 'sidebars'
		),
		array(
			'id'		=> 's1-search',
			'label'		=> 'Search',
			'desc'		=> '[ <strong>is_search</strong> ]',
			'type'		=> 'sidebar-select',
			'section'	=> 'sidebars'
		),
		array(
			'id'		=> 's1-404',
			'label'		=> 'Error 404',
			'desc'		=> '[ <strong>is_404</strong> ]',
			'type'		=> 'sidebar-select',
			'section'	=> 'sidebars'
		),
		array(
			'id'		=> 's1-page',
			'label'		=> 'Default Page',
			'desc'		=> '[ <strong>is_page</strong> ] If a page has a unique sidebar, it will override this.',
			'type'		=> 'sidebar-select',
			'section'	=> 'sidebars'
		),
		// Social Links : List
		array(
			'id'		=> 'social-links',
			'label'		=> 'Social Links',
			'desc'		=> 'Create and organize your social links',
			'type'		=> 'list-item',
			'section'	=> 'social-links',
			'choices'	=> array(),
			'settings'	=> array(
				array(
					'id'		=> 'social-icon',
					'label'		=> 'Icon Name',
					'desc'		=> 'Font Awesome icon names [<a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank"><strong>View all</strong>]</a>  ',
					'std'		=> 'fa-',
					'type'		=> 'text',
					'choices'	=> array()
				),
				array(
					'id'		=> 'social-link',
					'label'		=> 'Link',
					'desc'		=> 'Enter the full url for your icon button',
					'std'		=> 'http://',
					'type'		=> 'text',
					'choices'	=> array()
				),
				array(
					'id'		=> 'social-color',
					'label'		=> 'Icon Color',
					'desc'		=> 'Set a unique color for your icon (optional)',
					'std'		=> '',
					'type'		=> 'colorpicker',
					'section'	=> 'styling'
				),
				array(
					'id'		=> 'social-target',
					'label'		=> 'Link Options',
					'desc'		=> '',
					'std'		=> '',
					'type'		=> 'checkbox',
					'choices'	=> array(
						array( 
							'value' => '_blank',
							'label' => 'Open in new window'
						)
					)
				)
			)
		),
		// Styling: Enable
		array(
			'id'		=> 'dynamic-styles',
			'label'		=> 'Dynamic Styles',
			'desc'		=> 'Turn on to use the styling options below',
			'std'		=> 'on',
			'type'		=> 'on-off',
			'section'	=> 'styling'
		),
		// Styling: Boxed Layout
		array(
			'id'		=> 'boxed',
			'label'		=> 'Boxed Layout',
			'desc'		=> 'Use a boxed layout',
			'std'		=> 'off',
			'type'		=> 'on-off',
			'section'	=> 'styling'
		),
		// Styling: Font
		array(
			'id'		=> 'font',
			'label'		=> 'Font',
			'desc'		=> 'Select font for the theme',
			'type'		=> 'select',
			'std'		=> '30',
			'section'	=> 'styling',
			'choices'	=> array(
				array( 
					'value' => 'lato',
					'label' => 'Lato, Latin (Self-hosted)'
				),
				array( 
					'value' => 'titillium-web',
					'label' => 'Titillium Web, Latin-Ext (Google Fonts)'
				),
				array( 
					'value' => 'droid-serif',
					'label' => 'Droid Serif, Latin (Google Fonts)'
				),
				array( 
					'value' => 'source-sans-pro',
					'label' => 'Source Sans Pro, Latin-Ext (Google Fonts)'
				),
				array( 
					'value' => 'ubuntu',
					'label' => 'Ubuntu, Latin-Ext (Google Fonts)'
				),
				array( 
					'value' => 'ubuntu-cyr',
					'label' => 'Ubuntu, Latin / Cyrillic-Ext (Google Fonts)'
				),
				array( 
					'value' => 'roboto-condensed',
					'label' => 'Roboto Condensed, Latin-Ext (Google Fonts)'
				),
				array( 
					'value' => 'roboto-condensed-cyr',
					'label' => 'Roboto Condensed, Latin / Cyrillic-Ext (Google Fonts)'
				),
				array( 
					'value' => 'open-sans',
					'label' => 'Open Sans, Latin-Ext (Google Fonts)'
				),
				array( 
					'value' => 'open-sans-cyr',
					'label' => 'Open Sans, Latin / Cyrillic-Ext (Google Fonts)'
				),
				array( 
					'value' => 'pt-serif',
					'label' => 'PT Serif, Latin-Ext (Google Fonts)'
				),
				array( 
					'value' => 'pt-serif-cyr',
					'label' => 'PT Serif, Latin / Cyrillic-Ext (Google Fonts)'
				),
				array( 
					'value' => 'arial',
					'label' => 'Arial'
				),
				array( 
					'value' => 'georgia',
					'label' => 'Georgia'
				)
			)
		),
		// Styling: Container Width
		array(
			'id'			=> 'container-width',
			'label'			=> 'Website Max-width',
			'desc'			=> 'Max-width of the container. <br /><i>Note: For 680px media, 600px content (default) use <strong>1080px</strong> with sidebar active. If you use no sidebars anywhere, use <strong>740px</strong> (or more).</i>',
			'std'			=> '1080',
			'type'			=> 'numeric-slider',
			'section'		=> 'styling',
			'min_max_step'	=> '740,1600,1'
		),
		// Styling: Primary Color
		array(
			'id'		=> 'color-accent',
			'label'		=> 'Primary Accent Color',
			'std'		=> '#e8554e',
			'type'		=> 'colorpicker',
			'section'	=> 'styling'
		),
		// Styling: Topbar Background
		array(
			'id'		=> 'color-topbar',
			'label'		=> 'Topbar Background',
			'std'		=> '#222222',
			'type'		=> 'colorpicker',
			'section'	=> 'styling'
		),
		// Styling: Header Background
		array(
			'id'		=> 'color-header',
			'label'		=> 'Header Background',
			'std'		=> '#f2f2f2',
			'type'		=> 'colorpicker',
			'section'	=> 'styling'
		),
		// Styling: Header Light Text
		array(
			'id'		=> 'light-header-text',
			'label'		=> 'Header Text Color',
			'desc'		=> '',
			'std'		=> '',
			'type'		=> 'checkbox',
			'section'	=> 'styling',
			'choices'	=> array(
				array( 
					'value' => '1',
					'label' => 'Use light header text'
				)
			)
		),
		// Styling: Footer Background
		array(
			'id'		=> 'color-footer',
			'label'		=> 'Footer Background',
			'std'		=> '#222222',
			'type'		=> 'colorpicker',
			'section'	=> 'styling'
		),
		// Styling: Footer Toplink Color
		array(
			'id'		=> 'color-footer-toplink',
			'label'		=> 'Footer Toplink Color',
			'desc'		=> 'Suggestion - use the same color as your primary accent color',
			'std'		=> '#333333',
			'type'		=> 'colorpicker',
			'section'	=> 'styling'
		),
		// Styling: Header Logo Max-height
		array(
			'id'			=> 'logo-max-height',
			'label'			=> 'Header Logo Image Max-height',
			'desc'			=> 'Your logo image should have the double height of this to be high resolution',
			'std'			=> '80',
			'type'			=> 'numeric-slider',
			'section'		=> 'styling',
			'min_max_step'	=> '40,200,1'
		),
			// Styling: Formats
			array(
				'id'		=> 'color-audio',
				'label'		=> 'Format: Audio',
				'std'		=> '#69bac8',
				'type'		=> 'colorpicker',
				'section'	=> 'styling'
			),
			array(
				'id'		=> 'color-chat',
				'label'		=> 'Format: Chat',
				'std'		=> '#69bac8',
				'type'		=> 'colorpicker',
				'section'	=> 'styling'
			),
			array(
				'id'		=> 'color-gallery',
				'label'		=> 'Format: Gallery',
				'std'		=> '#7eb66f',
				'type'		=> 'colorpicker',
				'section'	=> 'styling'
			),
			array(
				'id'		=> 'color-image',
				'label'		=> 'Format: Image',
				'std'		=> '#7eb66f',
				'type'		=> 'colorpicker',
				'section'	=> 'styling'
			),
			array(
				'id'		=> 'color-link',
				'label'		=> 'Format: Link',
				'std'		=> '#e8554e',
				'type'		=> 'colorpicker',
				'section'	=> 'styling'
			),
			array(
				'id'		=> 'color-quote',
				'label'		=> 'Format: Quote',
				'std'		=> '#e7ba3a',
				'type'		=> 'colorpicker',
				'section'	=> 'styling'
			),
			array(
				'id'		=> 'color-status',
				'label'		=> 'Format: Status',
				'std'		=> '#ffa500',
				'type'		=> 'colorpicker',
				'section'	=> 'styling'
			),
			array(
				'id'		=> 'color-video',
				'label'		=> 'Format: Video',
				'std'		=> '#e8554e',
				'type'		=> 'colorpicker',
				'section'	=> 'styling'
			),			
		// Styling: Body Background
		array(
			'id'		=> 'body-background',
			'label'		=> 'Body Background',
			'desc'		=> 'Set background color and/or upload your own background image',
			'type'		=> 'background',
			'section'	=> 'styling'
		)
	)
);

/*  Settings are not the same? Update the DB
/* ------------------------------------ */
	if ( $saved_settings !== $custom_settings ) {
		update_option( 'option_tree_settings', $custom_settings ); 
	} 
}
