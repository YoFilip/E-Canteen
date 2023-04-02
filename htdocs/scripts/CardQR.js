const wrapper = document.querySelector(".wrapper"),
    generateBtn = wrapper.querySelector(".form button"),
    qrImg = wrapper.querySelector(".qr-code img"),
    numTickets = document.getElementById("numTickets");
let preValue;

// Nasłuchiwanie zdarzenia kliknięcia przycisku generującego kod QR
generateBtn.addEventListener("click", () => {
    const numTicketsValue = numTickets.value.trim();
    if (!numTicketsValue || isNaN(numTicketsValue) || parseInt(numTicketsValue) < 1) {
        return;
    }

    // Generowanie wartość kodu QR na podstawie liczby kartek
    let qrValue = `Liczba kartek: ${numTicketsValue}`;

    if (!qrValue || preValue === qrValue) return;

    // Przypisanie nowej wartości kodu QR i generowanie nowego obrazka kodu QR
    preValue = qrValue;
    qrImg.src = `https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=${qrValue}`;

    // Nasłuchiwanie zdarzenia wczytania obrazka kodu QR i zmieniamy tekst przycisku
    qrImg.addEventListener("load", () => {
        wrapper.classList.add("active");
        generateBtn.innerText = "⭣QR KOD DO ZESKANOWANIA⭣";
    });
});

// Nasłuchiwanie zdarzenia wpisywania liczby kartek i ukrywamy obrazek kodu QR
numTickets.addEventListener("input", () => {
    wrapper.classList.remove("active");
    preValue = "";
});
