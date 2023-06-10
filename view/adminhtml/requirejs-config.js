var config = {
    map: {
        '*': {
            'Magento_PageBuilder/template/form/element/html-code.html':
                'Ultraplugin_ChatGpt/template/html-code.html'
        }
    },
    config: {
        mixins: {
            'Magento_PageBuilder/js/form/element/html-code': {
                'Ultraplugin_ChatGpt/js/html-code-mixin': true
            }
        }
    }
};
