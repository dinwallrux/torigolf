var cstmzr_multicat_js_run = true;
  
jQuery(document).ready(function($){
    /**
     * Script for switch option
     */
    $('.switch_options').each(function() {
        //This object
        var obj = $(this);

        var enb = obj.children('.switch_enable'); //cache first element, this is equal to ON
        var dsb = obj.children('.switch_disable'); //cache first element, this is equal to OFF
        var input = obj.children('input'); //cache the element where we must set the value
        var input_val = obj.children('input').val(); //cache the element where we must set the value

        /* Check selected */
        if ('disable' == input_val) {
            dsb.addClass('selected');
        }
        else if ('enable' == input_val) {
            enb.addClass('selected');
        }

        //Action on user's click(ON)
        enb.on('click', function() {
            $(dsb).removeClass('selected'); //remove "selected" from other elements in this object class(OFF)
            $(this).addClass('selected'); //add "selected" to the element which was just clicked in this object class(ON) 
            $(input).val('enable').change(); //Finally change the value to 1
        });

        //Action on user's click(OFF)
        dsb.on('click', function() {
            $(enb).removeClass('selected'); //remove "selected" from other elements in this object class(ON)
            $(this).addClass('selected'); //add "selected" to the element which was just clicked in this object class(OFF) 
            $(input).val('disable').change(); // //Finally change the value to 0
        });

    });
    
    /**
     * Script for switch option Yes/No
     */
    $('.yes_no_switch_options').each(function() {
        //This object
        var obj = $(this);

        var enb = obj.children('.switch_enable'); //cache first element, this is equal to ON
        var dsb = obj.children('.switch_disable'); //cache first element, this is equal to OFF
        var input = obj.children('input'); //cache the element where we must set the value
        var input_val = obj.children('input').val(); //cache the element where we must set the value

        /* Check selected */
        if ('no' == input_val) {
            dsb.addClass('selected');
        }
        else if ('yes' == input_val) {
            enb.addClass('selected');
        }

        //Action on user's click(ON)
        enb.on('click', function() {
            $(dsb).removeClass('selected'); //remove "selected" from other elements in this object class(OFF)
            $(this).addClass('selected'); //add "selected" to the element which was just clicked in this object class(ON) 
            $(input).val('yes').change(); //Finally change the value to 1
        });

        //Action on user's click(OFF)
        dsb.on('click', function() {
            $(enb).removeClass('selected'); //remove "selected" from other elements in this object class(ON)
            $(this).addClass('selected'); //add "selected" to the element which was just clicked in this object class(OFF) 
            $(input).val('no').change(); // //Finally change the value to 0
        });

    });
    
    /**
     * Script for image selected from radio option
     */
     $('.controls#the-monday-img-container li img').click(function(){
		$('.controls#the-monday-img-container li').each(function(){
			$(this).find('img').removeClass ('the-monday-radio-img-selected') ;
		});
		$(this).addClass ('the-monday-radio-img-selected') ;
	});
    
     $('.layout-thmub-section #the-monday-img-container li img').click(function(){
		$('.layout-thmub-section #the-monday-img-container li').each(function(){
			$(this).find('img').removeClass ('the-monday-radio-img-selected') ;
		});
		$(this).addClass ('the-monday-radio-img-selected') ;
	});
  
    //Display option for Featured Product details
    /*$('#customize-control-featured_product_details_option').on('change',function(){
        var radioOption = $(this).find('input[type="radio"]:checked').val();
        if(radioOption == 'enable'){
            $('#customize-control-featured_details_text').show('swing');
        } else {
            $('#customize-control-featured_details_text').hide('swing');
        }
    }).change();*/
    
    //Display option for Posts option in our team section
    
     /*var radioOption = $('#customize-control-team_posts_option').find('input[type="radio"]:checked').val();
     //alert(radioOption);
     if( radioOption == 'countposts' ){
         $('#customize-control-team_posts_count').show();
     } else{
        $('#customize-control-team_posts_count').hide();
     }
    $('#customize-control-team_posts_option').on('change',function(){
        var radioOption = $(this).find('input[type="radio"]:checked').val();
        //alert(radioOption);
        if(radioOption == 'countposts'){
            $('#customize-control-team_posts_count').show('swing');
        } else {
            $('#customize-control-team_posts_count').hide('swing');
        }
    });*/
    
    
    //Display option for Posts option in our testimonials section
    /*$('#customize-control-testimonials_posts_option').on('change',function(){
        var radioOption = $(this).find('input[type="radio"]:checked').val();
        if(radioOption == 'countposts'){
            $('#customize-control-tesimonials_posts_count').show('swing');
        } else {
            $('#customize-control-tesimonials_posts_count').hide('swing');
        }
    }).change();*/
    
    //Display option for Posts option in our clients section
    /*$('#customize-control-clients_posts_option').on('change',function(){
        var radioOption = $(this).find('input[type="radio"]:checked').val();
        if(radioOption == 'countposts'){
            $('#customize-control-clients_posts_count').show('swing');
        } else {
            $('#customize-control-clients_posts_count').hide('swing');
        }
    }).change();*/
    
    // Control order from orderby in services section
    /*$('#customize-control-services_posts_orderby').on('change',function(){
        var selectOption = $(this).find('option:selected').val();
        if(selectOption == 'rand'){
            $('#customize-control-services_posts_order').hide('swing');
        } else {
            $('#customize-control-services_posts_order').show('swing');
        }
    }).change();*/
    
     // Control order from orderby in latest blog section
    /*$('#customize-control-blog_posts_orderby').on('change',function(){
        var selectOption = $(this).find('option:selected').val();
        if(selectOption == 'rand'){
            $('#customize-control-blog_posts_order').hide('swing');
        } else {
            $('#customize-control-blog_posts_order').show('swing');
        }
    }).change();*/
    
    /**
     * Page sidebar hide for home page
     */
    $('#page_template').on('change',function(){
       var pageValue = $(this).val();
       //alert(pageValue);
       if( pageValue == 'template-parts/template-home.php' ){
            $('#the_monday_page_sidebar_settings').hide('swing');
       } else {
            $('#the_monday_page_sidebar_settings').show('swing');
       } 
    }).change();
    
     
     // Prevents code from running twice due to live preview window.load firing in addition to the main customizer window.
    if( true == cstmzr_multicat_js_run ) {
        cstmzr_multicat_js_run = false;
    } else {
        return;
    }
 
    var api = wp.customize;
 
    // Loops through each instance of the category checkboxes control.
    $('.cstmzr-hidden-categories').each(function(){
 
        var id = $(this).prop('id');
        var categoryString = api.instance(id).get();
        var categoryArray = categoryString.split(',');
 
        // Checks/unchecks category checkboxes based on saved data.
        $('#' + id).closest('li').find('.cstmzr-category-checkbox').each(function() {
 
            var elementID = $(this).prop('id').split('-');
 
            if( $.inArray( elementID[1], categoryArray ) < 0 ) {
                $(this).prop('checked', false);
            } else {
                $(this).prop('checked', true);
            }
 
        });     
 
    });
 
    // Sets listeners for checkboxes
    $('.cstmzr-category-checkbox').live('change', function(){
 
        var id = $(this).closest('li').find('.cstmzr-hidden-categories').prop('id');
        var elementID = $(this).prop('id').split('-');
 
        if( $(this).prop('checked' ) == true ) {
            addCategory(elementID[1], id);
        } else {
            removeCategory(elementID[1], id);
        }
 
    });
 
    // Adds category ID to hidden input.
    function addCategory( catID, controlID ) {
 
        var categoryString = api.instance(controlID).get();
        var categoryArray = categoryString.split(',');
 
        if ( '' == categoryString ) {
            var delimiter = '';
        } else {
            var delimiter = ',';
        }
 
        // Updates hidden field value.
        if( $.inArray( catID, categoryArray ) < 0 ) {
            api.instance(controlID).set( categoryString + delimiter + catID );
        }
    }
 
    // Removes category ID from hidden input.
    function removeCategory( catID, controlID ) {
 
        var categoryString = api.instance(controlID).get();
        var categoryArray = categoryString.split(',');
        var catIndex = $.inArray( catID, categoryArray );
 
        if( catIndex >= 0 ) {
 
            // Removes element from array.
            categoryArray.splice(catIndex, 1);
 
            // Creates new category string based on remaining array elements.
            var newCategoryString = '';
            $.each( categoryArray, function() {
                if ( '' == newCategoryString ) {
                    var delimiter = '';
                } else {
                    var delimiter = ',';
                }
                newCategoryString = newCategoryString + delimiter + this;
            });
 
            // Updates hidden field value.
            api.instance(controlID).set( newCategoryString );
        }
    }
    
    /*Sticky user note*/    
    $('#accordion-panel-the_monday_general_settings').prepend(
            '<div class="user_sticky_note">'+
            '<h3 class="sticky_title">Need help?</h3>'+
            '<span class="sticky_info_row"><label class="row-element">View demo: </label> <a href="http://demo.accesspressthemes.com/the-monday/" target="_blank">here</a>'+
            '<span class="sticky_info_row"><label class="row-element">View documentation: </label><a href="http://doc.accesspressthemes.com/the-monday/" target="_blank">here</a></span>'+
            '<span class="sticky_info_row"><label class="row-element">Support forum: </label><a href="https://accesspressthemes.com/support/forum/themes/free-themes/theme-the-monday/" target="_blnak">here</a></span>'+
            '<span class="sticky_info_row"><label class="row-element">Email us: </label><a href="mailto:support@accesspressthemes.com">support@accesspressthemes.com<a/></span>'+
            '<span class="sticky_info_row"><label class="row-element">More Details: </label><a href="https://accesspressthemes.com/wordpress-themes/" target="_blank">here</a></span>'+
            '</div>'
            );
});