<?php
// Step One

/*Mapping The container in which we wish to put another n number of shortcodes
Her I am going to mapping a container extension for a product slider to hold my different types of products*/

add_action('vc_before_init',
        function(){
            vc_map(
                    array(
                            "name" => __("Product Slider", "inova"),
                            "base" => "inova_product_slider",
                            "as_parent" => array('only' => 'inova_single_product'),
                            "content_element" => true,
                            "show_settings_on_create" => false,
                            "is_container" => true,
                            "js_view" => 'VcColumnView',
                            "category" =>array('Inova'),
                        )
                );
        }
);

/*I am gonna make shortcode for this extension
First I make shortcode for it.*/

if(!function_exists('inova_product_slider')){
        function inova_product_slider( $atts, $content = null ) {
                return '<div class="products-slider owl-carousel">'.do_shortcode($content).'</div>';
    }
    add_shortcode('inova_product_slider', 'inova_product_slider');
}

/*Next I am gonna make visual composer understand that it is a shortcode for Visual composer to be held within
visula composer's default containers. And make treat this shortcode as container also. To do this we need to
desclare a class which name should be "WPBakeryShortCodesContainer_Shortcode_Name" and it should be extended
WPBakeryShortCodesContainer. You need to just declare the class nothing else.  Here is my class is:*/

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_Inova_Product_Slider extends WPBakeryShortCodesContainer {
        
    }
}

/*After that your shortcode extension and shortcode itself is created.

Step Two
Now I am gonna create shortcode which is put within my previous shotcode conatiner.
I am gonna maping the shortcode extension first*/

add_action('vc_before_init', 
    function(){
        vc_map(
            array(
                "name" => __("Single Product", "inova"),
                "base" => "inova_single_product",
                "category" => __("Inova", "inova"),
                "content_element" => true,
                "as_child" => array('only' => 'inova_product_slider'), // Use only|except attributes to limit parent (separate multiple values with comma)
                "show_settings_on_create" => true,
                "params" => array(
                    array(
                        "type" => "textfield",
                        "heading" => __("Title", "mozel"),
                        "param_name" => "product_title"
                    ),
                    array(
                        "type" => "textarea",
                        "heading" => __("Description", "mozel"),
                        "param_name" => "product_description"
                    ),
                    array(
                        'type' => 'vc_link',
                        'heading' => __( 'Button', 'mozel' ),
                        'param_name' => 'porduct_url',
                    ),
                    array(
                        'type' => 'attach_image',
                        'heading' => __( 'Add Image', 'mozel' ),
                        'param_name' => 'product_img',
                    )
                ),
            )
        );
    }
);

/*After mapping I am gonna make the shrtcode. Here I am going to follow tow ways. You can choose any of the two.
Way One
Create the shortcode and declare a class for your shortcode extending WPBakeryShortCode*/
if(!function_exists('inova_single_product')) {
    function inova_single_product( $atts, $content =  null) {
        extract(shortcode_atts(array(
            'product_title' => 'Flexible & Customizable',
            'product_description' => '',
            'product_url' => '',
            'product_img' => ''
        ), $atts));

	if (!empty($atts['product_img'])){
            $image_ids = explode(',', $atts['product_img']);
	}
        $sigle_img = wp_get_attachment_image_src($image_ids[0], "large");

        $output = '<div class="item">
                        <div class="product-img">
                            <img src="'.$sigle_img[0].'" alt="">
                            </div>
                    </div>';

        return $output;
    }
    add_shortcode('inova_single_product', 'inova_single_product');
}

if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_Inova_Single_Product extends WPBakeryShortCode
    {
        
    }

}

//Way Two
//

if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_Inova_Single_Product extends WPBakeryShortCode
    {
        protected function content( $atts, $content = null )
        {

            $atts = shortcode_atts(
             array(
             	'product_title' => 'Flexible & Customizable',
            	'product_description' => '',
            	'product_url' => '',
            	'product_img' => ''
        ), $atts);

	if (!empty($atts['product_img'])){
            $image_ids = explode(',', $atts['product_img']);
	}
        $sigle_img = wp_get_attachment_image_src($image_ids[0], "large");

            ob_start();
            ?>

            <div class="item">
                <div class="product-img">
                    <img src="<?php echo $sigle_img[0];?>" alt="">
                </div>
            </div>

            <?php return ob_get_clean();
        }
    }

}
//For shortcode you can choose any of two ways

