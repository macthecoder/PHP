<?php
if (!defined('ABSPATH')) {
    die('-1');
}
/*
Creating Shortcode addon for vc using Param Group with icon to generate like Service Box
*/
add_action('vc_before_init', function () {
    $service             = array(
        "name"          => __("Service", "aj"),
        "base"          => "aj_service",
        "class"         => "",
        "category"      => __("AJ", "aj"),
        "params"        => array(
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Service Section Title", "aj"),
                "param_name" => "service_section_title",
                "description" => __("Enter Service section title", "aj")
            ),
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Service Section Title Font Size", "aj"),
                "param_name" => "service_section_title_font_size",
                "description" => __("Enter Service section title font size in pixel. Enter just numeric value. Default font size: 30px", "aj")
            ),
            array(
                "type"          => "dropdown",
                "class"         => "",
                "heading"       => __("Service Section Title Font Weight", "aj"),
                "param_name"    => "service_section_title_font_weight",
                "value"         => array(
                    'Font Weight'   =>'',
                    'Light'         =>'300',
                    'Regular'       =>'400',
                    'Medium'        =>'500',
                    'Semi Bold'     =>'600',
                    'Bold'          =>'700',
                    'Extra Bold'    =>'900'
                ),
                "description"   => __("Select your Service section title font weight.", "aj"),

            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Service Section Title Primary Color", "aj"),
                "param_name" => "service_section_title_primary_color",
                "description" => __("Pick color for your Service section primary title. Default color: #4d4d4d", "aj")
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Service Section Title Secondary Color", "aj"),
                "param_name" => "service_section_title_secondary_color",
                "description" => __("Pick color for your Service section secondary title. Default color: #433a8b", "aj")
            ),
            array(
                "type"  => "attach_image",
                "class" => "",
                "heading" => __("Background Image", "aj"),
                "param_name" => "service_background_image",
                "description" => __("Upload background image for your service section.", "aj")
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Background Color", "aj"),
                "param_name" => "section_background_color",
                "description" => __("Pick background color for your service section.", "aj")
            ),

            //Params Group For Services
            array(
                'type'   =>'param_group',
                'value'   =>'',
                'param_name'   =>'aj_services',
                "heading" => __("Services", "aj"),
                'params'   =>array(
                    array(
                        "type" => "textfield",
                        "class" => "",
                        "heading" => __("Services Title", "aj"),
                        "param_name" => "service_title",
                        "description" => __("Enter your service title.", "aj"),
                    ),
                    
                    array(
                        "type"          => "dropdown",
                        "class"         => "",
                        "heading"       => __("Icon Type", "aj"),
                        "param_name"    => "icon_type",
                        "value"         => array(
                            __('Select Icon Type','aj')   =>'',
                            __('Font Aweseme','aj')         =>'fontawesome',
                            __('Open Icon','aj')         =>'openiconic',
                            __('Typicon','aj')         =>'typicons',
                            __('Entypo','aj')       =>'entypo',
                            __('Line Icon','aj')        =>'linecons',
                            __('Mono Social','aj')     =>'monosocial',
                        ),
                        "description"   => __("Select your Service skill title font weight.", "aj"),

                    ),
                    array(
                        "type" => "iconpicker",
                        "class" => "",
                        "heading" => __("Service Icon", "aj"),
                        "param_name" => "service_icon_fw",
                        "settings"   => array(
                            /*'emptyIcon' => true,*/
                            'type'      =>'fontawesome',
                            'iconPerPage'=>'1000',
                        ),
                        'dependency'       =>array(
                            'element'       =>'icon_type',
                            'value'       =>'fontawesome',
                        ),
                        "description" => __("Select your font awesome icon for service.", "aj"),
                    ),
                    array(
                        "type" => "iconpicker",
                        "class" => "",
                        "heading" => __("Service Icon", "aj"),
                        "param_name" => "service_icon_op",
                        "settings"   => array(
                            /*'emptyIcon' => true,*/
                            'type'      =>'openiconic',
                            'iconPerPage'=>'300',
                        ),
                        'dependency'       =>array(
                            'element'       =>'icon_type',
                            'value'       =>'openiconic',
                        ),
                        "description" => __("Select your openicon icon for service.", "aj"),
                    ),
                    array(
                        "type" => "iconpicker",
                        "class" => "",
                        "heading" => __("Service Icon", "aj"),
                        "param_name" => "service_icon_ty",
                        "settings"   => array(
                            /*'emptyIcon' => true,*/
                            'type'      =>'typicons',
                            'iconPerPage'=>'1000',
                        ),
                        'dependency'       =>array(
                            'element'       =>'icon_type',
                            'value'       =>'typicons',
                        ),
                        "description" => __("Select your font typicon icon for service.", "aj"),
                    ),
                    array(
                        "type" => "iconpicker",
                        "class" => "",
                        "heading" => __("Service Icon", "aj"),
                        "param_name" => "service_icon_ent",
                        "settings"   => array(
                            /*'emptyIcon' => true,*/
                            'type'      =>'entypo',
                            'iconPerPage'=>'300',
                        ),
                        'dependency'       =>array(
                            'element'       =>'icon_type',
                            'value'       =>'entypo',
                        ),
                        "description" => __("Select your entypo icon for service.", "aj"),
                    ),
                    array(
                        "type" => "iconpicker",
                        "class" => "",
                        "heading" => __("Service Icon", "aj"),
                        "param_name" => "service_icon_ln",
                        "settings"   => array(
                            /*'emptyIcon' => true,*/
                            'type'      =>'linecons',
                            'iconPerPage'=>'1000',
                        ),
                        'dependency'       =>array(
                            'element'       =>'icon_type',
                            'value'       =>'linecons',
                        ),
                        "description" => __("Select your font lineicon icon for service.", "aj"),
                    ),
                    array(
                        "type" => "iconpicker",
                        "class" => "",
                        "heading" => __("Service Icon", "aj"),
                        "param_name" => "service_icon_ms",
                        "settings"   => array(
                            /*'emptyIcon' => true,*/
                            'type'      =>'monosocial',
                            'iconPerPage'=>'300',
                        ),
                        'dependency'       =>array(
                            'element'       =>'icon_type',
                            'value'       =>'monosocial',
                        ),
                        "description" => __("Select your monosocial icon for service.", "aj"),
                    ),
                    array(
                        "type" => "colorpicker",
                        "class" => "",
                        "heading" => __("Icon Color", "aj"),
                        "param_name" => "service_icon_color",
                        "description" => __("Pick color for your service icon. Default color: #707070", "aj"),
                    ),
                    array(
                        "type" => "textarea",
                        "class" => "",
                        "heading" => __("Service Content", "aj"),
                        "param_name" => "service_content",
                        'cols'       => 20,
                        "description" => __("Enter your about content.", "aj")
                    ),

                    
                    array(
                        "type" => "checkbox",
                        "class" => "",
                        "heading" => __("Make Special", "aj"),
                        "param_name" => "service_speciality",
                        "description" => __("Want to make your service special?", "aj"),
                        'value'       => 'active',
                    ),
                ),
            ),
            array(
                "type"  => "attach_image",
                "class" => "",
                "heading" => __("Service List Background", "aj"),
                "param_name" => "service_list_background_image",
                "description" => __("Upload background image for your service list.", "aj")
            ),
//
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Service Title Font Size", "aj"),
                "param_name" => "service_title_font_size",
                "description" => __("Enter service title font size in pixel. Enter just numeric value. Default font size: 14px", "aj")
            ),
            array(
                "type"          => "dropdown",
                "class"         => "",
                "heading"       => __("Service Title Font Weight", "aj"),
                "param_name"    => "service_title_font_weight",
                "value"         => array(
                    __('Font Weight','aj')   =>'',
                    __('Light','aj')         =>'300',
                    __('Regular','aj')       =>'400',
                    __('Medium','aj')        =>'500',
                    __('Semi Bold','aj')     =>'600',
                    __('Bold','aj')          =>'700',
                    __('Extra Bold','aj')    =>'900'
                ),
                "description"   => __("Select your Service skill title font weight.", "aj"),

            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Service Title Color", "aj"),
                "param_name" => "service_title_color",
                "description" => __("Pick color for your service title. Default color: #707070", "aj"),
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Service Background Color", "aj"),
                "param_name" => "service_background_color",
                "description" => __("Pick color for your service background. Default color: #707070", "aj"),
            ),
            //
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Special Service Title Font Size", "aj"),
                "param_name" => "special_service_title_font_size",
                "description" => __("Enter service title font size  when it will be active in pixel. Enter just numeric value. Default font size: 14px", "aj")
            ),
            array(
                "type"          => "dropdown",
                "class"         => "",
                "heading"       => __("Special Service Title Font Weight", "aj"),
                "param_name"    => "special_service_title_font_weight",
                "value"         => array(
                    __('Font Weight','aj')   =>'',
                    __('Light','aj')         =>'300',
                    __('Regular','aj')       =>'400',
                    __('Medium','aj')        =>'500',
                    __('Semi Bold','aj')     =>'600',
                    __('Bold','aj')          =>'700',
                    __('Extra Bold','aj')    =>'900'
                ),
                "description"   => __("Select your service title font weight when it will be active.", "aj"),

            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Special Service Title Color", "aj"),
                "param_name" => "special_service_title_color",
                "description" => __("Pick color for your service title when it will be active. Default color: #707070", "aj"),
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Special Service Background Color", "aj"),
                "param_name" => "special_service_background_color",
                "description" => __("Pick color for your service background when it will be active. Default color: #707070", "aj"),
            ),
            //
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Service Content Font Size", "aj"),
                "param_name" => "service_content_font_size",
                "description" => __("Enter service ocntent font size in pixel. Enter just numeric value. Default font size: 16px", "aj")
            ),
            array(
                "type"          => "dropdown",
                "class"         => "",
                "heading"       => __("Service Content Font Weight", "aj"),
                "param_name"    => "service_content_font_weight",
                "value"         => array(
                    'Font Weight'   =>'',
                    'Light'         =>'300',
                    'Regular'       =>'400',
                    'Medium'        =>'500',
                    'Semi Bold'     =>'600',
                    'Bold'          =>'700',
                    'Extra Bold'    =>'900'
                ),
                "description"   => __("Select your Service content font weight.", "aj"),

            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Service Content Color", "aj"),
                "param_name" => "service_content_color",
                "description" => __("Pick color for your service content. Default color: #858585", "aj"),
            ),
        )
    );


    vc_map($service);
}
);


/*
Shortcode output.
*/

add_shortcode('aj_service',function ($atts, $content = null){
    extract(shortcode_atts(array(
        'service_section_title' => 'BEST SERVICES',
        'service_section_title_font_size' => '30',
        'service_section_title_font_weight' => 'bold',
        'service_section_title_primary_color' => '#4d4d4d',
        'service_section_title_secondary_color' => '#433a8b',
        'service_background_image' => '',
        'section_background_color' => 'transparent',
    ), $atts));
    ?>

    <style>
        <?php
        if(!empty($atts['service_background_image']))
          $bgimg_ids =explode(',',$atts['service_background_image']);
          $bgsigle_img = wp_get_attachment_image_src($bgimg_ids[0], "large");

          if(!empty($atts['service_list_background_image']))
          $slbgimg_ids =explode(',',$atts['service_list_background_image']);
          $slbgsigle_img = wp_get_attachment_image_src($slbgimg_ids[0], "large");

         $service_section_title_font_size = $atts['service_section_title_font_size'];
         $service_section_title_font_weight = $atts['service_section_title_font_weight'];
         $service_section_title_primary_color = $atts['service_section_title_primary_color'];
         $service_section_title_secondary_color = $atts['service_section_title_secondary_color'];
         $section_background_color = $atts['section_background_color'];

         $service_title_font_size = $atts['service_title_font_size'];
         $service_title_font_weight = $atts['service_title_font_weight'];
         $service_title_color = $atts['service_title_color'];
         $service_background_color = $atts['service_background_color'];

         $special_service_title_font_size = $atts['special_service_title_font_size'];
         $special_service_title_font_weight = $atts['special_service_title_font_weight'];
         $special_service_title_color = $atts['special_service_title_color'];
         $special_service_background_color = $atts['special_service_background_color'];

         $service_content_font_size = $atts['service_content_font_size'];
         $service_content_font_weight = $atts['service_content_font_weight'];
         $service_content_color = $atts['service_content_color'];

         if(!empty($section_background_color)){
         ?>
        #service-area{
            background-color: <?php echo $section_background_color;?>;
        }
        <?php
         }
         if(!empty($bgsigle_img)){
         ?>
        #service-area{
            background-image:url("<?php echo $bgsigle_img[0];?>");
        }
        <?php
         }
         //St
         if(!empty($service_section_title_font_size)){
         ?>
        #service-area .section-title h1{
            font-size: <?php echo $service_section_title_font_size;?>px;
        }
        <?php
         }
         //en
         //St
         if(!empty($service_section_title_font_weight)){
         ?>
        #service-area .section-title h1{
            font-weight: <?php echo $service_section_title_font_weight;?>;
        }
        <?php
         }
         //en
         //St
         if(!empty($service_section_title_primary_color)){
         ?>
        #service-area .section-title h1{
            color: <?php echo $service_section_title_primary_color;?>;
        }
        <?php
         }
         if(!empty($service_section_title_secondary_color)){
         ?>
        #service-area .section-title h1 span{
            color: <?php echo $service_section_title_secondary_color;?>;
        }
        <?php
         }
         if(!empty($slbgsigle_img)){
         ?>
        #service-area .service-tab-list{
            background-image:url("<?php echo $slbgsigle_img[0];?>");
        }
        <?php
         }
         if(!empty($service_title_font_size)){
         ?>
        #service-area ul.service-tab-list li a span{
            font-size: <?php echo $service_title_font_size;?>px;
        }
        <?php
         }
         if(!empty($service_title_font_weight)){
         ?>
        #service-area ul.service-tab-list li a span{
            font-weight: <?php echo $service_title_font_weight;?>;
        }
        <?php
         }
         if(!empty($service_title_color)){
         ?>
        #service-area ul.service-tab-list li a span{
            color: <?php echo $service_title_color;?>;
        }
        <?php
         }
         if(!empty($service_background_color)){
         ?>
        #service-area ul.service-tab-list li a{
            background-color: <?php echo $service_background_color;?>;
        }
        <?php
         }
         //
         if(!empty($special_service_title_font_size)){
         ?>
        #service-area ul.service-tab-list li.active a span{
            font-size: <?php echo $special_service_title_font_size;?>px;
        }
        <?php
         }
         if(!empty($special_service_title_font_weight)){
         ?>
        #service-area ul.service-tab-list li.active a span{
            font-weight: <?php echo $special_service_title_font_weight;?>;
        }
        <?php
         }
         if(!empty($special_service_title_color)){
         ?>
        #service-area ul.service-tab-list li.active a span{
            color: <?php echo $special_service_title_color;?>;
        }
        <?php
         }
         if(!empty($special_service_background_color)){
         ?>
        #service-area ul.service-tab-list li.active a{
            background-color: <?php echo $special_service_background_color;?>;
        }
        <?php
         }
         //
         if(!empty($service_content_font_size)){
         ?>
        #service-area .service-tab-content .service-pane p{
            font-size: <?php echo $service_content_font_size;?>px;
        }
        <?php
         }
         if(!empty($service_content_font_weight)){
         ?>
        #service-area .service-tab-content .service-pane p{
            font-weight: <?php echo $service_content_font_weight;?>;
        }
        <?php
         }
         if(!empty($service_content_color)){
         ?>
        #service-area .service-tab-content .service-pane p{
            color: <?php echo $service_content_color;?>;
        }
        <?php
         }
?>
    </style>

    <!-- Service Area Start -->
    <div id="service-area" class="service-area bg-pattern pb-100 pt-100">
        <div class="container">
            <!-- Section Title Start -->
            <div class="row">
                <div class="section-title text-center mb-60 col-xs-12">
                    <h1><?php if(!empty($service_section_title)) echo removing_last_word($service_section_title);?> <span><?php if(!empty($service_section_title)) echo find_last_word($service_section_title);?></span></h1>
                </div>
            </div>
            <!-- Section Title End -->
            <div class="row">
                <div class="col-md-10 col-md-offset-1 col-xs-12">
                    <!-- Service Tabs List -->
                    <ul class="service-tab-list text-center mb-70">
                        <?php
                        $aj_services = vc_param_group_parse_atts( $atts['aj_services'] );
                        if(is_array($aj_services) && !empty($aj_services)):
                            $counter = 0;
                            $active = '';
                            foreach ($aj_services as $aj_service):
                                $counter++;
                                if(!empty($aj_service['service_speciality'])){
                                    $active = 'active';
                                }
                                $icon = '';
                                if(!empty($aj_service['icon_type'])){

                                   if($aj_service['icon_type'] == 'fontawesome' && !empty($aj_service['service_icon_fw']))
                                   {
                                       vc_icon_element_fonts_enqueue($atts['icon_type']);
                                       $icon = $aj_service['service_icon_fw'];
                                       
                                   }
                                   else if($aj_service['icon_type'] == 'openiconic' && !empty($aj_service['service_icon_op']))
                                   {
                                       vc_icon_element_fonts_enqueue($atts['icon_type']);
                                       $icon = $aj_service['service_icon_op'];

                                   }
                                   else if($aj_service['icon_type'] == 'typicons' && !empty($aj_service['service_icon_ty']))
                                   {
                                       vc_icon_element_fonts_enqueue($atts['icon_type']);
                                       $icon = $aj_service['service_icon_ty'];

                                   }
                                   else if($aj_service['icon_type'] == 'entypo' && !empty($aj_service['service_icon_ent']))
                                   {
                                       vc_icon_element_fonts_enqueue($atts['icon_type']);
                                       $icon = $aj_service['service_icon_ent'];

                                   }
                                   else if($aj_service['icon_type'] == 'linecons' && !empty($aj_service['service_icon_ln']))
                                   {
                                       vc_icon_element_fonts_enqueue($atts['icon_type']);
                                       $icon = $aj_service['service_icon_ln'];

                                   }
                                   else
                                   {
                                       vc_icon_element_fonts_enqueue($atts['icon_type']);
                                       $icon = $aj_service['service_icon_ms'];

                                   }
                                }
                                ?>
                                <li class="<?php echo $active;?>"><a href="#ser-<?php echo $counter;?>" data-toggle="tab"><i class="<?php echo $icon;?>"></i><span><?php if(!empty($aj_service['service_title'])){echo $aj_service['service_title'];}?></span></a></li>
                                <?php
                                $active = '';
                                $icon = '';
                            endforeach;
                        endif;
                        ?>
                    </ul>
                    <!-- Service Tab Panes -->
                    <div class="service-tab-content tab-content text-center">
                        <?php
                        if(!empty($aj_services)):
                            $counter = 0;
                            $active = '';
                            foreach ($aj_services as $aj_service):
                                $counter++;
                                if(!empty($aj_service['service_speciality'])){
                                    $active = 'active';
                                }
                                ?>
                                <!-- Service Tab Pane -->
                                <div class="service-pane tab-pane <?php echo $active;?>" id="ser-<?php echo $counter;?>">
                                    <p><?php if(!empty($aj_service['service_content'])){echo $aj_service['service_content'];}?></p>
                                </div>
                                <?php
                                $active = '';
                            endforeach;
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service Area End -->
    <?php
});
?>
