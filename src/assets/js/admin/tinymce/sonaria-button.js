( function( $ ) {
    
    /**
     * Take our Localized Choices and turn them into something TinyMCE Listbox understands
     * 
     * @param       {object} choices Choices Object from our Localized JSON
     *                               
     * @since       {{VERSION}}
     * @returns     {Array}  Array of TinyMCE Listbox Choices
     */
    function sonaria_generate_tinymce_listbox( choices ) {

        var result = [];
        
        for ( var key in choices ) {
            
            result.push( {
                text: choices[key],
                value: key
            } );
            
        }
        
        return result;
        
    }

    $( document ).ready( function() {
        
        tinymce.PluginManager.add( 'sonaria_button_shortcode_script', function( editor, url ) {
            editor.addButton( 'sonaria_button_shortcode', {
                text: sonaria_tinymce_l10n.sonaria_button_shortcode.tinymce_title,
                icon: false,
                onclick: function() {
                    editor.windowManager.open( {
                        title: sonaria_tinymce_l10n.sonaria_button_shortcode.tinymce_title,
                        body: [
                            {
                                type: 'textbox',
                                name: 'text',
                                label: sonaria_tinymce_l10n.sonaria_button_shortcode.button_text.label
                            },
                            {
                                type: 'textbox',
                                name: 'url',
                                label: sonaria_tinymce_l10n.sonaria_button_shortcode.button_url.label
                            },
                            {
                                type: 'listbox',
                                name: 'color',
                                label: sonaria_tinymce_l10n.sonaria_button_shortcode.colors.label,
                                values: sonaria_generate_tinymce_listbox( sonaria_tinymce_l10n.sonaria_button_shortcode.colors.choices ),
                                value: sonaria_tinymce_l10n.sonaria_button_shortcode.colors.default,
                            },
                            {
                                type: 'listbox',
                                name: 'size',
                                label: sonaria_tinymce_l10n.sonaria_button_shortcode.size.label,
                                values: sonaria_generate_tinymce_listbox( sonaria_tinymce_l10n.sonaria_button_shortcode.size.choices ),
                            },
                            {
                                type: 'checkbox',
                                name: 'hollow',
                                label: sonaria_tinymce_l10n.sonaria_button_shortcode.hollow.label,
                            },
                            {
                                type: 'checkbox',
                                name: 'expand',
                                label: sonaria_tinymce_l10n.sonaria_button_shortcode.expand.label,
                            },
                            {
                                type: 'checkbox',
                                name: 'newTab',
                                label: sonaria_tinymce_l10n.sonaria_button_shortcode.new_tab.label,
                            },
                        ],
                        onsubmit: function( e ) {
                            editor.insertContent( '[sonaria_button' + 
                                                     ( e.data.url !== undefined && e.data.url !== '' ? ' url="' + e.data.url + '"' : '' ) + 
                                                     ( e.data.color !== undefined ? ' color="' + e.data.color + '"' : '' ) + 
                                                     ( e.data.size !== undefined && e.data.size !== '' ? ' size="' + e.data.size + '"' : '' ) + 
                                                     ( e.data.hollow !== undefined && e.data.hollow !== false ? ' hollow="' + e.data.hollow + '"' : '' ) + 
                                                     ( e.data.expand !== undefined && e.data.expand !== false ? ' expand="' + e.data.expand + '"' : '' ) + 
                                                     ( e.data.newTab !== undefined && e.data.newTab !== false ? ' new_tab="' + e.data.newTab + '"' : '' ) + 
                                                 ']' + 
                                                     ( e.data.text !== undefined ? e.data.text : '' ) + 
                                                 '[/sonaria_button]' );
                        }

                    } ); // Editor

                } // onclick

            } ); // addButton

        } ); // Plugin Manager

    } ); // Document Ready

} )( jQuery );