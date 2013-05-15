// ----------------------------------------------------------------------------
// markItUp!
// ----------------------------------------------------------------------------
// Copyright (C) 2008 Jay Salvat
// http://markitup.jaysalvat.com/
// ----------------------------------------------------------------------------
myMarkdownSettings = {
    nameSpace:          'markdown', // Useful to prevent multi-instances CSS conflict
    resizeHandle:       false,
    onShiftEnter:       {keepDefault:false, openWith:'\n\n'},
    markupSet: [
        {name:'Bold', key:"B", openWith:'**', closeWith:'**', className: 'editor-bold'},
        {name:'Italic', key:"I", openWith:'_', closeWith:'_', className: 'editor-italic'},
        {name:'Link', key:"L", openWith:'[', closeWith:']([![Url:!:http://]!] "[![Title]!]")', placeHolder:'Your text to link here...', className: 'editor-link'},
        {separator:'---------------' },
        {name:'Bulleted List', openWith:'- ', className: 'editor-bullet-list'},
        {name:'Numeric List', openWith:function(markItUp) {
            return markItUp.line+'. ';
        }, className: 'editor-numeric-list'},
        {separator:'---------------' },
        {name:'Picture', key:"P", replaceWith:'![[![Alternative text]!]]([![Url:!:http://]!] "[![Title]!]")', className: 'editor-picture'},  
        {name:'Quotes', openWith:'> ', className: 'editor-quotes'},
        {name:'Code Block / Code', openWith:'(!(\t|!|`)!)', closeWith:'(!(`)!)', className: 'editor-code'}
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