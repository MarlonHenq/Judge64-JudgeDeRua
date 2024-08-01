
const textarea = document.querySelector('textarea');
const highlight = document.querySelector('.highlight');

const keywords = ['module', 'endmodule', 'input', 'output', 'reg', 'wire', 'always', 'if', 'else', 'begin', 'end', 'assign', 'initial'];
const keywordRegex = new RegExp(`\\b(${keywords.join('|')})\\b`, 'g');
const commentRegex = /\/\/[^\n]*/g;
const moduleNameRegex = /\bmodule\s+(\w+)\b/g;

//Operators = | ^ & ~ + == != && || ? : - * % <= >=
const operatorRegex = /(\||\^|&|~|\+|==|!=|&&|\|\||\?|:|-|\*|%|<=|>=)/g;
const numberRegex = /\b(\d+)\b/g;
//Parentheses and []
const parenthesesRegex = /(\(|\)|\[|\])/g;

textarea.addEventListener('input', updateHighlight);
textarea.addEventListener('scroll', syncScroll);

function updateHighlight() {
    const code = textarea.value
        .replace(keywordRegex, '<span class="keyword">$1</span>')
        .replace(commentRegex, '<span class="comment">$&</span>')
        .replace(moduleNameRegex, '<span class="module-name">$1</span>')
        .replace(operatorRegex, '<span class="operator">$1</span>')
        .replace(numberRegex, '<span class="number">$1</span>')
        .replace(parenthesesRegex, '<span class="parentheses">$1</span>');

    highlight.innerHTML = code + '<br>';
}

function syncScroll() {
    highlight.scrollTop = textarea.scrollTop;
    highlight.scrollLeft = textarea.scrollLeft;
}

updateHighlight();
//Gambi pra caralho
