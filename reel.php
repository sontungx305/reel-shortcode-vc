<?php 
/**
 * Gallery
**/
class Reel_Shortcode{
    private $addScript = false;
	private $TypeScriptColumn = false;
	private $TypeScriptSlide =false;
	private $TypeScriptFlex =false;
		
	function __construct(){
		add_action( 'wp_footer', array( $this, 'Reel_Script' ) );
		add_shortcode('reel', array($this, 'reel'));
	}
	function reel( $attr ){
		extract(shortcode_atts(array(
				'delay'      => 3,
				'responsive' => true,
				'speed'    	 => 0.2,
				'title'      =>'Reel',
				'color'		 => array(),
				'width'		=> 900,
				'height'	=> 416,
				'left_color' => 10,
				'top_color' => 410,
			), $attr)
		);
		$colors = vc_param_group_parse_atts( $color );
		if(is_array($colors) && !empty($colors)) {
			$img_id = "img_reel_".time();
			$_inline_style = "#colorname {color:#fff;}";
			$html = '<div class="reel-images">';
			foreach ($colors as $color_key => $color) {
				$images = explode(',', $color['images']);
				$_first_img_src = wp_get_attachment_image_src($images[0],'full');
				$_all_images_src = "";
				foreach ($images as $key => $image) {
					$_image = wp_get_attachment_image_src($image,'full');
					if($_image) {
						$_all_images_src .= $_image[0].',';
					}
				}
				$_all_images_src = trim($_all_images_src,',');
				$_frames = (count($images) > 0)?count($images):$color['frames'];
				if($color_key == 0) {
					$html .= '
						<img src="'.trim($_first_img_src[0]).'" width="'.$width.'" height="'.$height.'"
						class="reel" id="'.$img_id.'"
						data-images="'.$_all_images_src.'"
			        	data-frames="'.$_frames.'"
						data-frame="'.$color['frame'].'"
						data-responsive="'.$responsive.'"
						data-steppable="false"
						data-delay="'.$delay.'"
						data-speed="'.$speed.'">
					';
					$color_name = $color['color_name'];
				}
				$left = (!empty($color['left']))?$color['left']:10;
				$top = (!empty($color['top']))?$color['top']:400;
				$html .= '<div class="reel-annotation choose-color" id="color'.str_pad(($color_key+1), 2, "0", STR_PAD_LEFT).'"	data-x="'.$left.'" data-y="'.$top.'" data-for="'.$img_id.'" data-colorname="'.$color['color_name'].'" data-preimage="'.$_all_images_src.'"></div>';
				$_bg_color = wp_get_attachment_image_src($color['background_color'],'full');
				$_inline_style .= '
					#color'.str_pad(($color_key+1), 2, "0", STR_PAD_LEFT).' {
						width:80px;
						height:25px;
						background-image:url("'.$_bg_color[0].'");
						background-repeat:no-repeat;
						position:absolute;
					}
				';
			}
			$color_name = ($color_name)?$color_name:'';
			$html .= '<div class="reel-annotation hidden-xs" id="colorname" data-x="'.$left_color.'" data-y="'.$top_color.'" data-for="'.$img_id.'">'.$color_name.'</div>';
			$html .= "</div> <!-- .reel-images -->";
			$html .= "<style>".$_inline_style."</style>";
			$html .="<script>jQuery(document).ready(function($){
				var choose_color = jQuery('.choose-color');
				if(choose_color.length > 0) {
					old_name = $('#colorname').text();
					choose_color.each(function(){
						$(this).hover(function(){
							$(this).css('cursor', 'pointer');
							old_name = $('#colorname').text();
							$('#colorname').text($(this).data('colorname'));
						},function(){
							$('#colorname').text(old_name);	
						});
						$(this).click(function(){
							old_name = $(this).data('colorname');
							$('#colorname').text(old_name);
							var preimg = $(this).data('preimage').split(',');
							$('#".$img_id."').reel('images',preimg);
						});
					});
				}
			});</script>";
			return $html;
		}
	}
	function Reel_Script(){
		wp_register_script( 'reel_js', plugins_url( '/js/jquery.reel.js', __FILE__ ),array(), null, true );
		wp_enqueue_script('reel_js');		
	}
}
new Reel_Shortcode();