<?php 
require 'reel.php';
add_action( 'vc_before_init', 'shortcodeVisualComposer' );
function shortcodeVisualComposer(){
 // REEL
vc_map( array(
	'name' => __( 'YTC_REEL', 'franticbit' ),
	'base' => 'reel',
	'icon' => 'icon-wpb-images-carousel',
	'category' => __( 'My shortcodes', 'franticbit' ),
	'description' => __( 'Animated carousel with images', 'franticbit' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Widget title', 'franticbit' ),
			'param_name' => 'title',
			'description' => __( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'franticbit' )
		),
		array(
            'type' => 'param_group',
            'value' => '',
            'param_name' => 'color',
            'description' => __( 'Create group image for reel', 'franticbit' ),
            'params' => array(
            	array(
					'type' => 'textfield',
					'heading' => __( 'Color Name', 'franticbit' ),
					'param_name' => 'color_name',
					'description' => __( 'Name of Color', 'franticbit' )
				),
            	array(
				'type' => 'attach_image',
				'heading' => __( 'Background Color', 'franticbit'),
				'param_name' => 'background_color',
				'description' => __( 'Select background image of Color from media library.', 'franticbit' )
				),
	            array(
				'type' => 'attach_images',
				'heading' => __( 'Images', 'franticbit' ),
				'param_name' => 'images',
				'value' => '',
				'description' => __( 'Select images for reel from media library.', 'franticbit' )
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Frames', 'franticbit' ),
					'param_name' => 'frames',
					'value'=> 36,
					'description' => __( 'Total number of frames.', 'franticbit' )
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Frame', 'franticbit' ),
					'param_name' => 'frame',
					'value'=> 1,
					'description' => __( 'Initial frame. Plugin instance starts with this frame. Frame 1 is the top left corner of the image. Thus loaded with the highest priority (as all frames in the top row not matter if horizontal or vertical). ', 'franticbit' )
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Left', 'franticbit' ),
					'param_name' => 'left',
					'value'=> 0,
					'description' => __( 'X coordinates of color button in the reel', 'franticbit' )
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Top', 'franticbit' ),
					'param_name' => 'top',
					'value'=> 460,
					'description' => __( 'X coordinates of color button in the reel', 'franticbit' )
				),
	       	)
        ),
        array(
			'type' => 'textfield',
			'heading' => __( 'Left of Color Name', 'franticbit' ),
			'param_name' => 'left_color',
			'value'=> 0,
			'description' => __( 'X coordinates of color button in the reel', 'franticbit' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Top of Color Name', 'franticbit' ),
			'param_name' => 'top_color',
			'value'=> 400,
			'description' => __( 'X coordinates of color button in the reel', 'franticbit' )
		),
        array(
			'type' => 'textfield',
			'heading' => __( 'Width', 'franticbit' ),
			'param_name' => 'width',
			'value'=>900,
			'description' => __( 'Width of Image Reel', 'franticbit' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Height', 'franticbit' ),
			'param_name' => 'height',
			'value'=>416,
			'description' => __( 'Height of Image Reel', 'franticbit' )
		),
        array(
			'type' => 'textfield',
			'heading' => __( 'Speed', 'franticbit' ),
			'param_name' => 'speed',
			'value'=>0.2,
			'description' => __( 'Animated rotation speed in revolutions per second (Hz). Animation is disabled by default (0). ".', 'franticbit' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Delay', 'franticbit' ),
			'param_name' => 'delay',
			'value'=>3,
			'description' => __( 'Delay before Reel starts playing by itself (in seconds). ', 'franticbit' )
		),		
		array(
			'type' => 'dropdown',
			'heading' => __( 'Responsive', 'franticbit' ),
			'param_name' => 'responsive',
			'value' => array(
				__( 'True', 'franticbit' ) => 'true',
				__( 'False', 'franticbit' ) => 'false'
			),
			'description' => __( 'If switched to responsive mode, Reel will obey dimensions of its parent container, will grow to fit and will adjust the interaction and UI accordingly (and also on resize)', 'franticbit' )
		),	
	)
));

}
?>