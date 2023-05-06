import { marked } from 'marked';
import { mangle } from 'marked-mangle';
import { markedHighlight } from 'marked-highlight';
import hljs from 'highlight.js';

marked.use(
    markedHighlight({
        langPrefix: 'hljs language-',
        highlight(code, lang) {
            const language = hljs.getLanguage(lang) ? lang : 'plaintext';
            return hljs.highlight(code, { language }).value;
        },
    })
);
marked.use(mangle());
marked.use({
    'headerIds': false,
});

export default marked;
