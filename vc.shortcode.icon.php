<?php 
if (!defined('ABSPATH')) {
    die('-1');
}
/*
Visual Composer Addon for Feature.
*/
add_action('vc_before_init', function () {

    $feature = array(
        "name" => __("Drubo Feature", "drubo"),
        "base" => "drubo_feature",
        "class" => "",
        "category" => __("Drubo", "drubo"),
        "params" => array(
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Icon Type", "drubo"),
                "param_name" => "icon_type",
                "value" => array(
                    __('Select Icon Type', 'drubo') => '',
                    __('Font Awesome', 'drubo') => 'fontawesome',
                    __('Open Icon', 'drubo') => 'openiconic',
                    __('Typicon', 'drubo') => 'typicons',
                    __('Entypo', 'drubo') => 'entypo',
                    __('Line Icon', 'drubo') => 'linecons',
                    __('Mono Social', 'drubo') => 'monosocial',
                    __('Material', 'drubo') => 'material',
                ),
                "description" => __("Select your feature icon type.", "drubo"),

            ),
            array(
                "type" => "iconpicker",
                "class" => "",
                "heading" => __("Feature Icon", "drubo"),
                "param_name" => "feature_icon_fw",
                "settings" => array(
                    /*'emptyIcon' => true,*/
                    'type' => 'fontawesome',
                    'iconPerPage' => '1000',
                ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'fontawesome',
                ),
                "description" => __("Select your font awesome icon for feature.", "drubo"),
            ),
            array(
                "type" => "iconpicker",
                "class" => "",
                "heading" => __("Feature Icon", "drubo"),
                "param_name" => "feature_icon_op",
                "settings" => array(
                    /*'emptyIcon' => true,*/
                    'type' => 'openiconic',
                    'iconPerPage' => '300',
                ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'openiconic',
                ),
                "description" => __("Select your openicon icon for feature.", "drubo"),
            ),
            array(
                "type" => "iconpicker",
                "class" => "",
                "heading" => __("Feature Icon", "drubo"),
                "param_name" => "feature_icon_ty",
                "settings" => array(
                    /*'emptyIcon' => true,*/
                    'type' => 'typicons',
                    'iconPerPage' => '1000',
                ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'typicons',
                ),
                "description" => __("Select your font typicon icon for feature.", "drubo"),
            ),
            array(
                "type" => "iconpicker",
                "class" => "",
                "heading" => __("Feature Icon", "drubo"),
                "param_name" => "feature_icon_ent",
                "settings" => array(
                    /*'emptyIcon' => true,*/
                    'type' => 'entypo',
                    'iconPerPage' => '300',
                ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'entypo',
                ),
                "description" => __("Select your entypo icon for feature.", "drubo"),
            ),
            array(
                "type" => "iconpicker",
                "class" => "",
                "heading" => __("Feature Icon", "drubo"),
                "param_name" => "feature_icon_ln",
                "settings" => array(
                    /*'emptyIcon' => true,*/
                    'type' => 'linecons',
                    'iconPerPage' => '1000',
                ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'linecons',
                ),
                "description" => __("Select your font lineicon icon for feature.", "drubo"),
            ),
            array(
                "type" => "iconpicker",
                "class" => "",
                "heading" => __("Feature Icon", "drubo"),
                "param_name" => "feature_icon_ms",
                "settings" => array(
                    /*'emptyIcon' => true,*/
                    'type' => 'monosocial',
                    'iconPerPage' => '300',
                ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'monosocial',
                ),
                "description" => __("Select your monosocial icon for feature.", "drubo"),
            ),
            array(
                "type" => "iconpicker",
                "class" => "",
                "heading" => __("Feature Icon", "drubo"),
                "param_name" => "feature_icon_mat",
                "settings" => array(
                    /*'emptyIcon' => true,*/
                    'type' => 'material',
                    'iconPerPage' => '300',
                ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'material',
                ),
                "description" => __("Select your material icon for feature.", "drubo"),
            ),
            array(
                "type" => "textfield",
                "heading" => __("Feature Title", "drubo"),
                "param_name" => "title",
                "description" => __("Enter your feature title here.", "drubo")
            ),
            array(
                "type" => "textarea_html",
                "class" => "",
                "heading" => __("Feature Subtitle", "drubo"),
                "param_name" => "content",
                "description" => __("Enter your feature content.", "drubo")
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Border", "drubo"),
                "param_name" => "is_feature_border",
                "value" => array(
                    __('Yes', 'drubo') => 'yes',
                    __('No', 'drubo') => 'no',
                ),
                "description" => __("Select if you wish to show border of feature box.", "drubo"),
            ),
            array(
                "type" => "colorpicker",
                "dependency" => array(
                    'element' => 'is_feature_border',
                    'value' => 'yes',
                ),
                "heading" => __("Border Color", "drubo"),
                "param_name" => "border_color",
                "description" => __("Pick color for your feature box border. Default color: #ddd", "drubo"),
            ),
            
            array(
                "type" => "textfield",
                "group" => __("Icon Styling","drubo"),
                "heading" => __("Icon Size", "drubo"),
                "param_name" => "icon_size",
                "description" => __("Enter icon size. Defautl: 24px", "drubo"),
            ),
            array(
                "type" => "textfield",
                "group" => __("Icon Styling","drubo"),
                "heading" => __("Icon Height Width", "drubo"),
                "param_name" => "icon_height_width",
                "description" => __("Enter icon height and width. Enter just numeric value. Default: 50px each.", "drubo"),
            ),
            array(
                "type" => "colorpicker",
                "group" => __("Icon Styling","drubo"),
                "heading" => __("Icon Color", "drubo"),
                "param_name" => "icon_color",
                "description" => __("Pick color for your feature icon. Enter jsut numeric value. Default color: #666666", "drubo"),
            ),
            array(
                "type" => "colorpicker",
                "group" => __("Icon Styling","drubo"),
                "heading" => __("Icon Hover", "drubo"),
                "param_name" => "icon_hover_color",
                "description" => __("Pick color for your feature icon hover. Default color: #ffffff", "drubo"),
            ),
            array(
                "type" => "colorpicker",
                "group" => __("Icon Styling","drubo"),
                "heading" => __("Icon Hover Background", "drubo"),
                "param_name" => "icon_hover_bg_color",
                "description" => __("Pick color for your feature icon hover background. Default color: #666666", "drubo"),
            ),
            array(
                "type" => "textfield",
                "group" => __("Title Styling","drubo"),
                "heading" => __("Font Size", "drubo"),
                "param_name" => "title_font_size",
                "description" => __("Enter title font size. Defautl: 14px", "drubo"),
            ),
            array(
                "type" => "dropdown",
                "group" => __("Title Styling","drubo"),
                "heading" => __("Font Weight", "drubo"),
                "param_name" => "title_font_weight",
                "value" => array(
                    __('Default', 'drubo') => '',
                    __('100', 'drubo') => '100',
                    __('200', 'drubo') => '200',
                    __('300', 'drubo') => '300',
                    __('400', 'drubo') => '400',
                    __('500', 'drubo') => '500',
                    __('600', 'drubo') => '600',
                    __('700', 'drubo') => '700',
                    __('900', 'drubo') => '900',
                ),
                "description" => __("Select title font weight.", "drubo"),
            ),
            array(
                "type" => "dropdown",
                "group" => __("Title Styling","drubo"),
                "heading" => __("Font Style", "drubo"),
                "param_name" => "title_font_style",
                "value" => array(
                    __('Default', 'drubo') => '',
                    __('Normal', 'drubo') => 'normal',
                    __('Italic', 'drubo') => 'italic',
                    __('Oblique', 'drubo') => 'oblique',
                ),
                "description" => __("Select title font style.", "drubo"),
            ),
            array(
                "type" => "dropdown",
                "group" => __("Title Styling","drubo"),
                "heading" => __("Text Transform", "drubo"),
                "param_name" => "title_text_transform",
                "value" => array(
                    __('Default', 'drubo') => '',
                    __('Capitalize', 'drubo') => 'capitalize',
                    __('Uppercase', 'drubo') => 'uppercase',
                    __('Lowercase', 'drubo') => 'lowercase',
                    __('Full Width', 'drubo') => 'full-width',
                ),
                "description" => __("Select title text transform.", "drubo"),
            ),
            array(
                "type" => "colorpicker",
                "group" => __("Title Styling","drubo"),
                "heading" => __("Title Color", "drubo"),
                "param_name" => "title_color",
                "description" => __("Pick color for your feature title. Enter jsut numeric value. Default color: #666666", "drubo"),
            ),
            array(
                "type" => "colorpicker",
                "group" => __("Title Styling","drubo"),
                "heading" => __("Title Hover", "drubo"),
                "param_name" => "title_hover_color",
                "description" => __("Pick color for your feature title hover. Default color: #ffffff", "drubo"),
            ),
            array(
                "type" => "textfield",
                "group" => __("Subtitle Styling","drubo"),
                "heading" => __("Font Size", "drubo"),
                "param_name" => "subtitle_font_size",
                "description" => __("Enter subtitle font size. Defautl: 14px", "drubo"),
            ),
            array(
                "type" => "dropdown",
                "group" => __("Subtitle Styling","drubo"),
                "heading" => __("Font Weight", "drubo"),
                "param_name" => "subtitle_font_weight",
                "value" => array(
                    __('Default', 'drubo') => '',
                    __('100', 'drubo') => '100',
                    __('200', 'drubo') => '200',
                    __('300', 'drubo') => '300',
                    __('400', 'drubo') => '400',
                    __('500', 'drubo') => '500',
                    __('600', 'drubo') => '600',
                    __('700', 'drubo') => '700',
                    __('900', 'drubo') => '900',
                ),
                "description" => __("Select subtitle font weight.", "drubo"),
            ),
            array(
                "type" => "dropdown",
                "group" => __("Subtitle Styling","drubo"),
                "heading" => __("Font Style", "drubo"),
                "param_name" => "subtitle_font_style",
                "value" => array(
                    __('Default', 'drubo') => '',
                    __('Normal', 'drubo') => 'normal',
                    __('Italic', 'drubo') => 'italic',
                    __('Oblique', 'drubo') => 'oblique',
                ),
                "description" => __("Select subtitle font style.", "drubo"),
            ),
            array(
                "type" => "dropdown",
                "group" => __("Subtitle Styling","drubo"),
                "heading" => __("Text Transform", "drubo"),
                "param_name" => "subtitle_text_transform",
                "value" => array(
                    __('Default', 'drubo') => '',
                    __('Capitalize', 'drubo') => 'capitalize',
                    __('Uppercase', 'drubo') => 'uppercase',
                    __('Lowercase', 'drubo') => 'lowercase',
                    __('Full Width', 'drubo') => 'full-width',
                ),
                "description" => __("Select subtitle text transform.", "drubo"),
            ),
            array(
                "type" => "colorpicker",
                "group" => __("Subtitle Styling","drubo"),
                "heading" => __("Subtitle Color", "drubo"),
                "param_name" => "subtitle_color",
                "description" => __("Pick color for your feature subtitle. Enter jsut numeric value. Default color: #666666", "drubo"),
            ),
        ),
    );
    vc_map($feature);
}
);


/*
Shortcode for that Addon
*/

add_shortcode('drubo_feature', function($atts, $content){


	$atts = shortcode_atts( array(
		'title'					=> 'Feature',
		'icon_type'				=> '',
		'feature_icon_fw'		=> '',
		'feature_icon_op'		=> '',
		'feature_icon_ty'		=> '',
		'feature_icon_ent'		=> '',
		'feature_icon_ln'		=> '',
		'feature_icon_ms'		=> '',
		'feature_icon_mat'		=> '',
		'is_feature_border'		=> 'yes',
		'border_color'		=> '#ddd',
		'icon_size'		=> '24',
		'icon_height_width'		=> '50',
		'icon_color'	=> '#666666',
		'icon_hover_color'	=> '#ffffff',
		'icon_hover_bg_color'		=> '#14b1bb',
		'title_font_size'		=> '14',
		'title_font_weight'		=> '700',
		'title_font_style'		=> 'normal',
		'title_text_transform'		=> 'uppercase',
		'title_color'		=> '#666666',
		'title_hover_color'		=> '#14b1bb',
		'subtitle_font_size'		=> '14',
		'subtitle_font_weight'		=> '400',
		'subtitle_font_style'		=> 'normal',
		'subtitle_text_transform'		=> '',
		'subtitle_color'		=> '#666666',
	) ,$atts);
	$atts['content'] = $content;

	$random_class = strtolower(find_first_word($atts['title']));
	$icon_class = '';
	if(!empty($atts['icon_type'])){
		if($atts['icon_type'] == 'fontawesome' && !empty($atts['feature_icon_fw'])){
			vc_icon_element_fonts_enqueue($atts['icon_type']);
			$icon_class = $atts['feature_icon_fw'];

		}
		elseif($atts['icon_type'] == 'openiconic' && !empty($atts['feature_icon_op'])){
			vc_icon_element_fonts_enqueue($atts['icon_type']);
			$icon_class = $atts['feature_icon_op'];

		}
		elseif($atts['icon_type'] == 'typicons' && !empty($atts['feature_icon_ty'])){
			vc_icon_element_fonts_enqueue($atts['icon_type']);
			$icon_class = $atts['feature_icon_ty'];

		}
		elseif($atts['icon_type'] == 'entypo' && !empty($atts['feature_icon_ent'])){
			vc_icon_element_fonts_enqueue($atts['icon_type']);
			$icon_class = $atts['feature_icon_ent'];

		}
		elseif($atts['icon_type'] == 'linecons' && !empty($atts['feature_icon_ln'])){
			vc_icon_element_fonts_enqueue($atts['icon_type']);
			$icon_class = $atts['feature_icon_ln'];

		}
		elseif($atts['icon_type'] == 'monosocial' && !empty($atts['feature_icon_ms'])){
			vc_icon_element_fonts_enqueue($atts['icon_type']);
			$icon_class = $atts['feature_icon_ms'];

		}else{
			vc_icon_element_fonts_enqueue($atts['icon_type']);
			$icon_class = $atts['feature_icon_mat'];
		}
	}
	?>
	<style>
		.icon-titel i{
			height: <?php echo $atts['icon_height_width'];?>px;
			width: <?php echo $atts['icon_height_width'];?>px;
			font-size: <?php echo $atts['icon_size'];?>px;
			color: <?php echo $atts['icon_color'];?>;
		}
		.specialty-single.two:hover .icon-titel i{
			color: <?php echo $atts['icon_hover_color'];?>;

		}
		.specialty-single.two:hover .icon-titel i::after{
			background-color: <?php echo $atts['icon_hover_bg_color'];?>;
		}
		.icon-titel h6{
			font-weight: <?php echo $atts['title_font_weight'];?>;
			font-size: <?php echo $atts['title_font_size'];?>px;
			color: <?php echo $atts['title_color'];?>;
			font-style: <?php echo $atts['title_font_style'];?>;
			text-transform: <?php echo $atts['title_text_transform'];?>;
		}
		.specialty-single.two:hover .icon-titel h6{
			color: <?php echo $atts['title_hover_color'];?>;

		}
		.spe-discribe > p{
			font-weight: <?php echo $atts['subtitle_font_weight'];?>;
			font-size: <?php echo $atts['subtitle_font_size'];?>px;
			color: <?php echo $atts['subtitle_color'];?>;
			font-style: <?php echo $atts['subtitle_font_style'];?>;
			text-transform: <?php echo $atts['subtitle_text_transform'];?>;
		}
		<?php if (($atts['is_feature_border'] == 'yes')){?>
		.specialty-single.two.<?php echo $random_class;?>{
			border-color: <?php echo $atts['border_color'];?>;
			border-style: solid solid solid none;
			border-width:1px 1px 1px 0;
		}
		<?php }else{?>
		.specialty-single.two.<?php echo $random_class;?>{
			border-color: #ddd;
			border-style: none none none none;
			border-width:0px 0px 10px 0px;
		}
		<?php }?>
	</style>
	<?php
	ob_start();
	?>
	<div class="specialty-single two <?php echo $random_class;?>">
		<div class="icon-titel">
			<i class="<?php echo $icon_class;?>" aria-hidden="true"></i>
			<h6><?php echo $atts['title'];?></h6>
		</div>
		<div class="spe-discribe">
			<p><?php if(!empty($content)){ echo $content;}?></p>
		</div>
	</div>
	
	<?php
	return ob_get_clean();
});

if (class_exists('WPBakeryShortCode')){
	class WPBakeryShortCode_Drubo_Feature extends WPBakeryShortCode{}
}
