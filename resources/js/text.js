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
});


