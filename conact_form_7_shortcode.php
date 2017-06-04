//Creating Shortcode For Contact form Seven 
/* Contact form seven text field, 
[text* name_of_the_field class:first_custom_class class:second_custom_class class:third_custom_class placeholder "Placeholder Name"]
NOTE: You must follow this sequence.Oherwise you will face error which leads no output.
[email* name_of_the_field class:first_custom_class class:second_custom_class class:third_custom_class placeholder "Placeholder Name"]
NOTE: You must follow this sequence.Oherwise you will face error which leads no output.
[submit class:first_custom_class class:second_custom_class class:third_custom_class "Button Label"]
NOTE: You must follow this sequence.Oherwise you will face error which leads no output.

Do not enter break befor and after your input field. It will generate br tag in html.

*/This is Request a Demo form sample of Inova theme for contact form-7 plugin START/*
/*********************START of Request a Demo******************/
<div class="features-content">
  <div class="request-form">[text* u_name class:form-control placeholder "Name"][email* u_email class:form-control placeholder "Email"][submit class:btn class:thm-btn "Request Demo"]
  </div>
</div>
/*********************END of Request a Demo******************/

/* This is Get In Touch form sample of Inova theme for contact form-7 plugin */
/*********************START of GET IN TOUCH******************/
<div class="container">
  <div class="right_inner_content">
    <div class="row m0 contact-form">
        <div class="row">
            <div class="col-sm-6 form-group">[text* first_name class:form-control class:contact-fname placeholder "First Name"]   
            </div>
            <div class="col-sm-6 form-group">[text* last_name class:form-control class:contact-lname placeholder "Last Name"]
            </div>
            <div class="col-sm-6 form-group">[email* user_email class:form-control class:contact-mail placeholder "Email"]
            </div>
            <div class="col-sm-6 form-group">[text* website class:form-control class:contact-website placeholder "Website"]
            </div>
            <div class="col-sm-12 form-group">[textarea message class:form-control class:contact-message placeholder "Message"]
            </div>
            <div class="col-sm-12 form-group">[submit class:btn class:thm-btn "Send Message"]
            </div>
        </div>
    </div>
  </div>
</div>
/*********************END of GET IN TOUCH******************/
