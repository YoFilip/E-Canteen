// Blokujemy menu kontekstowe
document.addEventListener('contextmenu', event => event.preventDefault());

// Blokujemy kliknięcia prawym przyciskiem myszy
document.addEventListener('mousedown', event => {
    if (event.button === 2) {
        event.preventDefault();
    }
});