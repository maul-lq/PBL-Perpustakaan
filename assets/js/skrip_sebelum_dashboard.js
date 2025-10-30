document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('btn-login').addEventListener('click', (event) => {
        event.preventDefault();
        window.location.href = 'index.php?page=login';
    });
    document.getElementById('btn-register').addEventListener('click', (event) => {
        event.preventDefault();
        window.location.href = 'index.php?page=register';
    });
    document.getElementById('btn-guest').addEventListener('click', (event) => {
        event.preventDefault();
        window.location.href = 'index.php?page=guest';
    });
});