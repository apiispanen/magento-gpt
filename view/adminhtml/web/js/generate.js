require([
    'jquery'
], function ($) {
    'use strict';

    $(document).on('click', '.generate-chatgpt-short-content', function () {
        var descriptionField = $(this).parent().parent().find('iframe').contents().find('body');
        var sku = $("input[name='product[sku]']").val();
        var type = 'short';
        if($(this).attr('id') == 'product_form_description_chatgpt') {
            type = 'full';
        }
        $.ajax({
            url: window.chatGptAjaxUrl,
            type: 'POST',
            showLoader: true,
            data: {
                'form_key': FORM_KEY,
                'sku': sku,
                'type': type
            },
            success: function(response) {
                if (response.error == false) {
                    var descriptionContent = '<p>' + response.data + '</p>';
                    descriptionField.html(descriptionContent).change();
                } else {
                    alert({
                        title: $.mage.__('API Error'),
                        content: response.data
                    });
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });
    });
});
