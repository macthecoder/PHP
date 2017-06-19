<?
/* This is the basic example of override Visual Composer's row element for our theme. Here I am going to demostrate the up and running about it.
First: create a file with any any name related to your work (shortcode_name.php) and within it call vc_add_params() or vc_add_param() function within
'vc_after_init' hook. Here is the example:
*/
add_action('vc_after_init',
    function () {
        vc_add_params("vc_row", array(
                array(
                    "type" => "dropdown",
                    "group" => __('Design Options', 'inova'),
                    "heading" => __("Overlay Color", "inova"),
                    "param_name" => "is_row_overlay",
                    "value" => array(
                        'No Overlay' => 'no_overlay',
                        'Overlay' => 'overlay',
                    ),
                    "description" => __("Select whether you use overlay or not.", "inova"),
                ),
                array(
                    "type" => "dropdown",
                    "group" => __('Design Options', 'inova'),
                    "heading" => __("Overlay Type", "inova"),
                    "param_name" => "row_overlay_type",
                    "value" => array(
                        'Gradient' => 'gradient',
                        'Solid' => 'solid',
                    ),
                    'dependency' => array(
                        'element' => 'is_row_overlay',
                        'value' => 'overlay',
                    ),
                    "description" => __("Select background type.", "inova"),
                ),
                array(
                    "type" => "colorpicker",
                    "group" => __('Design Options', 'inova'),
                    "heading" => __("Overlay Solid Color", "inova"),
                    "param_name" => "row_overlay_solid",
                    'dependency' => array(
                        'element' => 'row_overlay_type',
                        'value' => 'solid',
                    ),
                    'value' => '#1aabec',
                    "description" => __("Pick solid color for overlay.", "inova")
                ),
                array(
                    "type" => "colorpicker",
                    "group" => __('Design Options', 'inova'),
                    "heading" => __("Overlay Primary Color", "inova"),
                    "param_name" => "row_overlay_primary_gradient",
                    'dependency' => array(
                        'element' => 'row_overlay_type',
                        'value' => 'gradient',
                    ),
                    'value' => '#1aabec',
                    "description" => __("Pick primary color for gradient.", "inova")
                ),
                array(
                    "type" => "colorpicker",
                    "group" => __('Design Options', 'inova'),
                    "heading" => __("Overlay Secondary Color", "inova"),
                    "param_name" => "row_overlay_secondary_gradient",
                    'dependency' => array(
                        'element' => 'row_overlay_type',
                        'value' => 'gradient',
                    ),
                    'value' => '#3a7bd5',
                    "description" => __("Pick secondary color for overlay.", "inova")
                ),
            )
        );
    }
);

/* OR */
add_action('vc_after_init',
    function () {
        vc_add_param("vc_row",
            array(
                "type" => "colorpicker",
                "group" => __('Design Options', 'inova'),
                "heading" => __("Overlay Secondary Color", "inova"),
                "param_name" => "row_overlay_secondary_gradient",
                'dependency' => array(
                    'element' => 'row_overlay_type',
                    'value' => 'gradient',
                ),
                'value' => '#3a7bd5',
                "description" => __("Pick secondary color for overlay.", "inova")
            )
        );
    }
);

/*
This file must be required or included the theme's functions.php file.
*/

/*
After that create folder named 'vc_templates on the theme root. You can create the folder with any name. Visual Composer follow
'theme>vc_templates' directory rules. Then you need to go 'plugins->js_composer->include->templates' and copy the file named vc_row.php
(here I am overridding vc_row that's why I need to copy that file) and paste it on vc_templates folder. Now apply custom things what are
override. Here is my code
*/

if (!defined('ABSPATH')) {
    die('-1');
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $full_width
 * @var $full_height
 * @var $equal_height
 * @var $columns_placement
 * @var $content_placement
 * @var $parallax
 * @var $parallax_image
 * @var $css
 * @var $el_id
 * @var $video_bg
 * @var $video_bg_url
 * @var $video_bg_parallax
 * @var $parallax_speed_bg
 * @var $parallax_speed_video
 * @var $content - shortcode content
 * @var $css_animation
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Row
 */
$el_class = $full_height = $parallax_speed_bg = $parallax_speed_video = $full_width = $equal_height = $flex_row = $columns_placement = $content_placement = $parallax = $parallax_image = $css = $el_id = $video_bg = $video_bg_url = $video_bg_parallax = $css_animation = '';
$disable_element = '';
$output = $after_output = '';
$atts = vc_map_get_attributes($this->getShortcode(), $atts);
extract($atts);

wp_enqueue_script('wpb_composer_front_js');

$el_class = $this->getExtraClass($el_class) . $this->getCSSAnimation($css_animation);

$css_classes = array(
    'vc_row',
    'wpb_row',
    //deprecated
    'vc_row-fluid',
    $el_class,
    vc_shortcode_custom_css_class($css),
);

if ('yes' === $disable_element) {
    if (vc_is_page_editable()) {
        $css_classes[] = 'vc_hidden-lg vc_hidden-xs vc_hidden-sm vc_hidden-md';
    } else {
        return '';
    }
}

if (vc_shortcode_custom_css_has_property($css, array(
        'border',
        'background',
    )) || $video_bg || $parallax
) {
    $css_classes[] = 'vc_row-has-fill';
}

if (!empty($atts['gap'])) {
    $css_classes[] = 'vc_column-gap-' . $atts['gap'];
}



$wrapper_attributes = array();
// build attributes for wrapper
if (!empty($el_id)) {
    $wrapper_attributes[] = 'id="' . esc_attr($el_id) . '"';
}
if (!empty($full_width)) {
    $wrapper_attributes[] = 'data-vc-full-width="true"';
    $wrapper_attributes[] = 'data-vc-full-width-init="false"';
    if ('stretch_row_content' === $full_width) {
        $wrapper_attributes[] = 'data-vc-stretch-content="true"';
    } elseif ('stretch_row_content_no_spaces' === $full_width) {
        $wrapper_attributes[] = 'data-vc-stretch-content="true"';
        $css_classes[] = 'vc_row-no-padding';
    }
    $after_output .= '<div class="vc_row-full-width vc_clearfix"></div>';
}

if (!empty($full_height)) {
    $css_classes[] = 'vc_row-o-full-height';
    if (!empty($columns_placement)) {
        $flex_row = true;
        $css_classes[] = 'vc_row-o-columns-' . $columns_placement;
        if ('stretch' === $columns_placement) {
            $css_classes[] = 'vc_row-o-equal-height';
        }
    }
}

if (!empty($equal_height)) {
    $flex_row = true;
    $css_classes[] = 'vc_row-o-equal-height';
}

if (!empty($content_placement)) {
    $flex_row = true;
    $css_classes[] = 'vc_row-o-content-' . $content_placement;
}

if (!empty($flex_row)) {
    $css_classes[] = 'vc_row-flex';
}

$has_video_bg = (!empty($video_bg) && !empty($video_bg_url) && vc_extract_youtube_id($video_bg_url));

$parallax_speed = $parallax_speed_bg;
if ($has_video_bg) {
    $parallax = $video_bg_parallax;
    $parallax_speed = $parallax_speed_video;
    $parallax_image = $video_bg_url;
    $css_classes[] = 'vc_video-bg-container';
    wp_enqueue_script('vc_youtube_iframe_api_js');
}


if (!empty($parallax)) {
    wp_enqueue_script('vc_jquery_skrollr_js');
    $wrapper_attributes[] = 'data-vc-parallax="' . esc_attr($parallax_speed) . '"'; // parallax speed
    $css_classes[] = 'vc_general vc_parallax vc_parallax-' . $parallax;
    if (false !== strpos($parallax, 'fade')) {
        $css_classes[] = 'js-vc_parallax-o-fade';
        $wrapper_attributes[] = 'data-vc-parallax-o-fade="on"';
    } elseif (false !== strpos($parallax, 'fixed')) {
        $css_classes[] = 'js-vc_parallax-o-fixed';
    }
}
if (!empty($atts['is_row_overlay'] && $atts['is_row_overlay'] == 'overlay')) {
    //$overlay_class = 'row_'.$css_class;

    $primary = $atts['row_overlay_primary_gradient'];
    $secondary = $atts['row_overlay_secondary_gradient'];
    $solid = $atts['row_overlay_solid'];
    $opacity = $atts['row_overlay_opacity'];
    $overlay_class = inova_removing_first_character(crc32(strtolower($primary.$secondary.$solid.$opacity)));

    if (!empty($atts['row_overlay_type']) && $atts['row_overlay_type'] == 'gradient') {
        $bg = "-moz-linear-gradient(-15deg, " . esc_attr($primary) . " 0%, " . esc_attr($secondary) . " 100%); background-image: -webkit-linear-gradient(-15deg,  " . esc_attr($primary) . " 0%, " . esc_attr($secondary) . " 100%); background-image: -ms-linear-gradient(-15deg,  " . esc_attr($primary) . " 0%, " . esc_attr($secondary) . " 100%);";
    } else {
        $bg = "" . esc_attr($solid) . " none repeat scroll 0 0!important";
    }
    echo '
        <style>
            .row_'.$overlay_class.'::before {
                background-image: '.$bg.'
                content: "";
                display: block;
                height: 100%;
                left: 0;
                opacity: '.$opacity.';
                position: absolute;
                top: 0;
                width: 100%;
                z-index: 0!important;
            }
            .row_'.$overlay_class.'{
            z-index: 1;
            position: relative;
            }
        </style>
        ';
    $css_classes[] = 'row_'.$overlay_class;
}

if (!empty($parallax_image)) {
    if ($has_video_bg) {
        $parallax_image_src = $parallax_image;
    } else {
        $parallax_image_id = preg_replace('/[^\d]/', '', $parallax_image);
        $parallax_image_src = wp_get_attachment_image_src($parallax_image_id, 'full');
        if (!empty($parallax_image_src[0])) {
            $parallax_image_src = $parallax_image_src[0];
            if (!empty($atts['is_row_overlay'] && $atts['is_row_overlay'] == 'overlay')) {
                if (!empty($atts['row_overlay_type'] && $atts['row_overlay_type'] == 'gradient')) {
                    echo '
        <style>
            .row_'.$overlay_class.'::before {
                z-index: 1!important;
            }
            .row_'.$overlay_class.'{
            z-index: 1;
            position: relative;
            }
        </style>
        ';
                }else if (!empty($atts['row_overlay_type'] && $atts['row_overlay_type'] == 'solid')){
                    echo '
        <style>
            .row_'.$overlay_class.'::before {
                z-index: 1!important;
            }
            .row_'.$overlay_class.'{
            z-index: 1;
            position: relative;
            }
        </style>
        ';
                }
            }
        }
    }
    $wrapper_attributes[] = 'data-vc-parallax-image="' . esc_attr($parallax_image_src) . '"';
}
if (!$parallax && $has_video_bg) {
    $wrapper_attributes[] = 'data-vc-video-bg="' . esc_attr($video_bg_url) . '"';
}
$css_class = preg_replace('/\s+/', ' ', apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode(' ', array_filter(array_unique($css_classes))), $this->settings['base'], $atts));

$wrapper_attributes[] = 'class="' . esc_attr(trim($css_class)) . '"';

$output .= '<div ' . implode(' ', $wrapper_attributes) . '>';
$output .= wpb_js_remove_wpautop($content);
$output .= '</div>';
$output .= $after_output;

echo $output;
