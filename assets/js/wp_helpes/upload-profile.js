jQuery(function($){
    $('body').on( 'click', '.upload_button', function(e){
 
        e.preventDefault();
 
        var button = $(this),
        custom_uploader = wp.media({
            title: 'Insert File',
            library : {
                type : 'image'
            },
            button: {
                text: 'Use this file'
            },
            multiple: false
        }).on('select', function() {
            var attachment = custom_uploader.state().get('selection').first().toJSON();
            $('.upload_preview').html('<img src="' + attachment.url + '" style="">').next().show();
            $('.upload_field').val(attachment.url).next().show();
        }).open();
 
    });
 
    // on remove button click
    $('body').on('click', '.upload_clear', function(e){
        e.preventDefault();
        var button = $(this);
        button.next().val(''); // emptying the hidden field
        button.hide().prev().html('Upload image');
    });
 
});
