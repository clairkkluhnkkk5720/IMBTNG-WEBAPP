document.addEventListener('DOMContentLoaded', function() {
    const input = document.getElementById('id_logo_url');
    const parent = input.parentElement;
    const element = document.createElement('a');

    element.setAttribute('id', 'add-logo');
    element.setAttribute('class', 'related-widget-wrapper-link add-related initialized');
    element.innerHTML = '<span class="related-widget-wrapper-icon"></span>';
    parent.appendChild(element);

    element.addEventListener('click', function () {
        const popup = document.getElementById('image-popup');

        popup.style.display = 'block';
        popup.style.left = element.offsetLeft + 'px';
        popup.style.top = element.offsetTop - popup.offsetHeight / 1.4 + 'px';

        document.addEventListener('click', function (ev) {
            const elClass = ev.toElement.getAttribute('class');
            const availableValues = ['related-widget-wrapper-icon', 'image-popup', 'list', 'author'];

            if (availableValues.indexOf(elClass) === -1) {
                popup.style.display = 'none';
                document.removeEventListener('click', function () {
                    return void 0;
                });
            }
        });
    });
});