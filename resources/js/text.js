document.addEventListener('DOMContentLoaded', function () {
    const links = document.querySelectorAll('.group');
    console.log(links[0]);

    links.forEach(function (link) {
        link.addEventListener('click', function (event) {
            event.preventDefault(); // デフォルトのリンク動作を無効化

            const text = link.querySelector('.text').textContent;
            console.log(text);

        });
    });
});