document.addEventListener('DOMContentLoaded', function () {
    const links = document.querySelectorAll('.group');
    console.log(links[0]);

    links.forEach(function (link) {
        link.addEventListener('click', function (event) {
            let text = link.querySelector('.text').textContent;
            text = text.trim();

            let element = document.querySelector('textarea');
            element.value = text;
        });
    });
});