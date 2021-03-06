// ----------------------------------------------------------------------------
// markItUp!
// ----------------------------------------------------------------------------
// Copyright (C) 2008 Jay Salvat
// http://markitup.jaysalvat.com/
// ----------------------------------------------------------------------------
myMarkdownSettings = {
    nameSpace:          'cometEditor', // Useful to prevent multi-instances CSS conflict
    resizeHandle:       false,
    onShiftEnter:       {keepDefault:false, openWith:'\n\n'},
    markupSet: [
        {name:'Bold', key:"B", openWith:'**', closeWith:'**', className: 'editorSprite editor-bold'},
        {name:'Italic', key:"I", openWith:'_', closeWith:'_', className: 'editorSprite editor-italic'},
        {name:'Link', key:"L", openWith:'[', closeWith:']([![Url:!:http://]!] "[![Title]!]")', placeHolder:'Your text to link here...', className: 'editorSprite editor-link'},
        {separator:'---------------' },
        {name:'Bulleted List', openWith:'- ', className: 'editorSprite editor-bullet-list'},
        {name:'Numeric List', openWith:function(markItUp) {
            return markItUp.line+'. ';
        }, className: 'editorSprite editor-numeric-list'},
        {separator:'---------------' },
        {name:'Picture', key:"P", replaceWith:'![[![Alternative text]!]]([![Url:!:http://]!])', className: 'editorSprite editor-picture'},  
        {name:'Quotes', openWith:'> ', className: 'editorSprite editor-quotes'},
        {name:'Code Block / Code', openWith:'(!(\t|!|`)!)', closeWith:'(!(`)!)', className: 'editorSprite editor-code'}
    ]
}

comments = {
    nameSpace:          'markdown', // Useful to prevent multi-instances CSS conflict
    resizeHandle:       false,
    onShiftEnter:       {keepDefault:false, openWith:'\n\n'},
    markupSet: [
        {name:'Bold', key:"B", openWith:'**', closeWith:'**', className: 'editor-bold'},
        {name:'Italic', key:"I", openWith:'_', closeWith:'_', className: 'editor-italic'},
        {name:'Link', key:"L", openWith:'[', closeWith:']([![Url:!:http://]!] "[![Title]!]")', placeHolder:'Your text to link here...', className: 'editor-link'},
        {separator:'---------------' },
        {name:'Picture', key:"P", replaceWith:'![[![Alternative text]!]]([![Url:!:http://]!] "[![Title]!]")', className: 'editor-picture'},  
        {name:'Quotes', openWith:'> ', className: 'editor-quotes'}
    ]
}

// mIu nameSpace to avoid conflict.
miu = {
    markdownTitle: function(markItUp, char) {
        heading = '';
        n = $.trim(markItUp.selection||markItUp.placeHolder).length;
        for(i = 0; i < n; i++) {
            heading += char;
        }
        return '\n'+heading+'\n';
    }
}