const wrapper = document.querySelector(".wrapper"),
    generateBtn = wrapper.querySelector(".form button"),
    qrImg = wrapper.querySelector(".qr-code img");
let preValue;

// Nasłuchiwanie zdarzenia kliknięcia przycisku generującego kod QR
generateBtn.addEventListener("click", () => {
    const checkboxes = document.querySelectorAll('.form input[type="checkbox"]:checked');
    if (checkboxes.length === 0) {
        return;
    }
    let qrValue = "Zamówienie: ";
    checkboxes.forEach((checkbox, index) => {
        qrValue += checkbox.value;
        if (index !== checkboxes.length - 1) {
            qrValue += ", ";
        }
    });
    if (!qrValue || preValue === qrValue) return;
    preValue = qrValue;
    qrImg.src = `https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=${qrValue}`;

    // Nasłuchiwanie zdarzenia wczytania obrazka kodu QR i zmieniamy tekst przycisku
    qrImg.addEventListener("load", () => {
        wrapper.classList.add("active");
        generateBtn.innerText = "⭣QR KOD DO ZESKANOWANIA⭣";
    });
});

// Nasłuchiwanie zdarzenia zmiany stanu opcji formularza i ukrywamy obrazek kodu QR, jeśli żadna opcja nie jest wybrana
document.querySelectorAll('.form input[type="checkbox"]').forEach((checkbox) => {
    checkbox.addEventListener("change", () => {
        if (!document.querySelector('.form input[type="checkbox"]:checked')) {
            wrapper.classList.remove("active");
            preValue = "";
        }
    });
});
