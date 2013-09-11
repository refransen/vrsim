YUI.add('progressbar-aria-plugin', function (Y) {
    Y.Plugin.ProgressBarARIA = Y.Base.create('pbARIA', Y.Plugin.Base, [], {
        initializer: function () {
            var host = this.get('host'),
                box  = host.get('boundingBox');
                
            if (host.get('rendered')) {
                this.addStaticARIA();
            } else {
                this.afterHostMethod('render', this.addStaticARIA);                
            }

            this.addDynamicARIA();
        },
        addStaticARIA: function () {
            var host   = this.get('host'),
                box    = host.get('boundingBox'),
                descBy = box.one('.yui3-progressbar-label').get('id')
                
            if (box.getAttribute('role') !== 'progressbar' ) {
                box.setAttrs({
                    'role': 'progressbar',
                    'aria-valuemin': 0,
                    'aria-valuemax': 100,
                    'aria-valuenow': host.get('progress'),
                    'aria-describedby': descBy
                });
            }
        },
        addDynamicARIA: function () {
            var box = this.get('host').get('boundingBox');
            
            this.afterHostEvent('progressChange', function (ev) {
                box.setAttribute('aria-valuenow', ev.newVal);
            });
        },
        destructor: function () {
            this.get('host').get('boundingBox')
                .removeAttribute('role')
                .removeAttribute('aria-valuemin')
                .removeAttribute('aria-valuemax')
                .removeAttribute('aria-valuenow')
                .removeAttribute('aria-describedby');
        }
    }, {
        NS: 'aria',
    });
}, '1.0', { requires: ['base-build', 'plugin'] });

YUI().use('gallery-progress-bar', 'progressbar-aria-plugin', function (Y) {
    var progressBar = new Y.ProgressBar({ 
        width: '300px', 
        layout: '<div class="{labelClass}" id="' + Y.guid() + '">'
            + '</div><div class="{sliderClass}"></div>'
    });
    progressBar.plug(Y.Plugin.ProgressBarARIA);
    progressBar.render('#demo');
    
    Y.one('#increment').on('click', function (ev) {
        progressBar.increment(25);
    });
});