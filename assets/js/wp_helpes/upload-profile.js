window.addEventListener ? 
window.addEventListener("load",call_functions,false) : 
window.attachEvent && window.attachEvent("onload",call_functions);

function call_functions() {
    upload_files(
        'upload_button',
        'upload_preview',
        'upload_field',
        'upload_clear',
    );
    
    upload_files(
        'upload_logo_button',
        'upload_logo_preview',
        'upload_logo_field',
        'upload_logo_clear',
    );
    
    upload_files(
        'upload_site_banner_button',
        'upload_site_banner_preview',
        'upload_site_banner_field',
        'upload_site_banner_clear',
    );
}

function upload_files(upl_btn, file_preview, file_url, del_upl_btrn) {
    jQuery(function($){
        $('body').on( 'click', `.${upl_btn}`, function(e){
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
                $(`.${file_preview}`).html('<img src="' + attachment.url + '" style="">').next().show();
                $(`.${file_url}`).val(attachment.url).next().show();
            }).open();
     
        });
     
        // on remove button click
        $('body').on('click', `.${del_upl_btrn}`, function(e){
            e.preventDefault();
            var button = $(this);
            button.next().val(''); // emptying the hidden field
            button.hide().prev().html('Upload image');
        });
     
    });
}