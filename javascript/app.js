
/** Event Click Button to the login */
var btn = document.getElementById('btn');

btn.addEventListener('click', () => {
    const form = document.getElementById('displayForm');

    if (form.style.display === 'none') {
        form.style.display = 'block';
    } else {
        form.style.display = 'none';
    }
});


