document.addEventListener('DOMContentLoaded', function () {
    const links = document.querySelectorAll('.group');
    console.log(links[0]);

    links.forEach(function (link) {
        link.addEventListener('click', function (event) {
            event.preventDefault(); // デフォルトのリンク動作を無効化

            let text = link.querySelector('.text').textContent;
            text = text.trim();

            let element = document.querySelector('textarea');
            element.value = text;

        });
    });
});


const speakBtn = document.querySelector('#speak-btn')
const stopBtn = document.querySelector('#stop-btn')

speakBtn.addEventListener('click', () => {
    let textElement = document.querySelector('#text')
    let text = textElement.value;

    if (text.match(/[^\x01-\x7E\uFF61-\uFF9F]+/)) {
        //全角文字
        console.log(text.match(/[^\x01-\x7E\uFF61-\uFF9F]+/))
        console.log("全角文字です");
        alert('全角文字は入力できません。');
    } else {
        //全角文字以外
        console.log("全角文字ではありません");
    }
});


