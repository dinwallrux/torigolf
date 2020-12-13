jQuery(document).ready(function($) {
    
    var the_monday_upload;
    var the_monday_selector;

    function the_monday_add_file(event, selector) {

        var upload = $(".uploaded-file"), frame;
        var $el = $(this);
        the_monday_selector = selector;

        event.preventDefault();

        // If the media frame already exists, reopen it.
        if (the_monday_upload) {
            the_monday_upload.open();
        } else {
            // Create the media frame.
            the_monday_upload = wp.media.frames.the_monday_upload = wp.media({
                // Set the title of the modal.
                title: $el.data('choose'),
                // Customize the submit button.
                button: {
                    // Set the text of the button.
                    text: $el.data('update'),
                    // Tell the button not to close the modal, since we're
                    // going to refresh the page when the image is selected.
                    close: false
                }
            });

            // When an image is selected, run a callback.
            the_monday_upload.on('select', function() {
                // Grab the selected attachment.
                var attachment = the_monday_upload.state().get('selection').first();
                the_monday_upload.close();                
                the_monday_selector.find('.upload').val(attachment.attributes.url);                
                if (attachment.attributes.type == 'image') {
                    the_monday_selector.find('.screenshot').empty().hide().append('<img src="' + attachment.attributes.url + '"><a class="remove-image">Remove</a>').slideDown('fast');
                }
                the_monday_selector.find('.upload-button').unbind().addClass('remove-file').removeClass('upload-button').val(the_monday_l10n.remove);
                the_monday_selector.find('.of-background-properties').slideDown();
                the_monday_selector.find('.remove-image, .remove-file').on('click', function() {
                    the_monday_remove_file($(this).parents('.sub-option'));
                });
            });

        }

        // Finally, open the modal.
        the_monday_upload.open();
    }

    function the_monday_remove_file(selector) {
        selector.find('.remove-image').hide();
        selector.find('.upload').val('');
        selector.find('.of-background-properties').slideUp();
        selector.find('.screenshot').slideUp();
        selector.find('.remove-file').unbind().addClass('upload-button').removeClass('remove-file').val(the_monday_l10n.upload);
        // We don't display the upload button if .upload-notice is present
        // This means the user doesn't have the WordPress 3.5 Media Library Support
        if ($('.section-upload .upload-notice').length > 0) {
            $('.upload-button').remove();
        }
        selector.find('.upload-button').on('click', function(event) {
            the_monday_add_file(event, $(this).parents('.sub-option'));
        });
    }

    $(document).on('click', '.remove-image, .remove-file', function() {
        the_monday_remove_file($(this).parents('.sub-option'));
    });

    $(document).on('click', '.upload-button', function(event) {
        the_monday_add_file(event, $(this).parents('.sub-option'));
    });

});