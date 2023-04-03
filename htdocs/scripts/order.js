//Instrukcja aby zmienić menu w danym dniu wystarczy że w linijce np:
//
// <label><input type="checkbox" id="Barszcz biały" value="Barszcz biały" spellcheck="false">Barszcz biały</label>
//
//Zmienisz nazwę potrawy w id="Danie" , value ="Danie" oraz między zamknięciem inputa a zamknięciem labela wpiszesz danie [spellcheck="false">Danie</label>]: 

//id="Danie" 
//value="Danie" 
//spellcheck="false">Danie</label>
//Zrób to dla wszystkich labelów jakie masz w danej funkcji!!



//Menu dla poniedziałku
function showMenuForMonday() {
    const formDiv = document.querySelector(".form");
    formDiv.innerHTML = `
        <label><input type="checkbox" id="Barszcz biały" value="Barszcz biały" spellcheck="false">Barszcz biały</label>
        <label><input type="checkbox" id="Kotlet schabowy panierowany" value="Kotlet schabowy panierowany" spellcheck="false">Kotlet schabowy panierowany</label>
        <label><input type="checkbox" id="Stek w jajku" value="Stek w jajku" spellcheck="false">Stek w jajku</label>
        <label><input type="checkbox" id="Kopytka z sosem pieczarkowym" value="Kopytka z sosem pieczarkowym" spellcheck="false">Kopytka z sosem pieczarkowym</label>
        <label><input type="checkbox" id="Ziemniaki" value="Ziemniaki" spellcheck="false">Ziemniaki</label>
        <label><input type="checkbox" id="Surówka" value="Surówka" spellcheck="false">Surówka</label>
        <label><input type="checkbox" id="Kompot" value="Kompot" spellcheck="false">Kompot</label>
        <button id="btn">Generuj kod QR</button>
    `;
}
//Menu dla wtorku
function showMenuForTuesday() {
    const formDiv = document.querySelector(".form");
    formDiv.innerHTML = `
        <label><input type="checkbox" id="Koperkowa z ryżem" value="Koperkowa z ryżem" spellcheck="false">Koperkowa z ryżem</label>
        <label><input type="checkbox" id="Bitka wieprzowa w sosie" value="Bitka wieprzowa w sosie" spellcheck="false">Bitka wieprzowa w sosie</label>
        <label><input type="checkbox" id="Sznycel z żółtym serem" value="Sznycel z żółtym serem" spellcheck="false">Sznycel z żółtym serem</label>
        <label><input type="checkbox" id="Risotto z kurczakiem i jarzynami" value="Risotto z kurczakiem i jarzynami" spellcheck="false">Risotto z kurczakiem i jarzynami</label>
        <label><input type="checkbox" id="Ziemniaki" value="" spellcheck="false">Ziemniaki</label>
        <label><input type="checkbox" id="Kasza" value="Kasza" spellcheck="false">Kasza</label>
        <label><input type="checkbox" id="Surówka" value="Surówka" spellcheck="false">Surówka</label>
        <label><input type="checkbox" id="Kompot" value="Kompot" spellcheck="false">Kompot</label>
        <button id="btn">Generuj kod QR</button>
    `;
}
//Menu dla środy
function showMenuForWednesday() {
    const formDiv = document.querySelector(".form");
    formDiv.innerHTML = `
        <label><input type="checkbox" id="Pomidorowa z makaronem" value="Pomidorowa z makaronem" spellcheck="false">Pomidorowa z makaronem</label>
        <label><input type="checkbox" id="Kurczak po meksykańsku" value="Kurczak po meksykańsku" spellcheck="false">Kurczak po meksykańsku</label>
        <label><input type="checkbox" id="Kotlet mielony" value="Kotlet mielony" spellcheck="false">Kotlet mielony</label>
        <label><input type="checkbox" id="Naleśniki na słodko" value="Naleśniki na słodko" spellcheck="false">Naleśniki na słodko</label>
        <label><input type="checkbox" id="Ziemniaki" value="Ziemniaki" spellcheck="false">Ziemniaki</label>
        <label><input type="checkbox" id="Ryż" value="Ryż" spellcheck="false">Ryż</label>
        <label><input type="checkbox" id="Surówka" value="Surówka" spellcheck="false">Surówka</label>
        <label><input type="checkbox" id="Kompot" value="Kompot" spellcheck="false">Kompot</label>
        <button id="btn">Generuj kod QR</button>
    `;
}

//Menu dla czwartku
function showMenuForThursday() {
    const formDiv = document.querySelector(".form");
    formDiv.innerHTML = `
    <label><input type="checkbox" id="Porowa z ziemniakami" value="Porowa z ziemniakami" spellcheck="false">Porowa z ziemniakami</label>
    <label><input type="checkbox" id="Gulasz wieprzowy" value="Gulasz wieprzowy" spellcheck="false">Gulasz wieprzowy</label>
    <label><input type="checkbox" id="Kotlet pożarski" value="Kotlet pożarski" spellcheck="false">Kotlet pożarski</label>
    <label><input type="checkbox" id="Łazanki z kapustą i pieczarkami" value="Łazanki z kapustą i pieczarkami" spellcheck="false">Łazanki z kapustą i pieczarkami</label>
    <label><input type="checkbox" id="Ziemniaki" value="" spellcheck="false">Ziemniaki</label>
    <label><input type="checkbox" id="Kasza" value="Kasza" spellcheck="false">Kasza</label>
    <label><input type="checkbox" id="Surówka" value="Surówka" spellcheck="false">Surówka</label>
    <label><input type="checkbox" id="Kompot" value="Kompot" spellcheck="false">Kompot</label>
    <button id="btn">Generuj kod QR</button>
`;
}
//Menu dla piątku

function showMenuForFriday() {
    const formDiv = document.querySelector(".form");
    formDiv.innerHTML = `
        <label><input type="checkbox" id="Szczawiowa z ryżem" value="Szczawiowa z ryżem" spellcheck="false">Szczawiowa z ryżem</label>
        <label><input type="checkbox" id="Ryba po grecku" value="Ryba po grecku" spellcheck="false">Ryba po grecku</label>
        <label><input type="checkbox" id="Rumsztyk z cebulą" value="Rumsztyk z cebulą" spellcheck="false">Rumsztyk z cebulą</label>
        <label><input type="checkbox" id="Jajka sadzone + ziemniaki opiekane + kefir" value="Jajka sadzone + ziemniaki" spellcheck="false">Jajka sadzone + ziemniaki</label>
        <label><input type="checkbox" id="Ziemniaki" value="" spellcheck="false">Ziemniaki</label>
        <label><input type="checkbox" id="Surówka" value="Surówka" spellcheck="false">Surówka</label>
        <label><input type="checkbox" id="Kompot" value="Kompot" spellcheck="false">Kompot</label>
        <button id="btn">Generuj kod QR</button>
    `;
}



function showMenuForToday() {
    const today = new Date();
    const dayOfWeek = today.getDay();

    switch (dayOfWeek) {
        case 1: // Poniedziałek
            showMenuForMonday();
            break;
        case 2: // Wtorek
            showMenuForTuesday()
            break;
        case 3: // Środa
            showMenuForWednesday()
            break;
        case 4: // Czwartek
            showMenuForThursday()
            break;
        case 5: // Piątek
            showMenuForFriday();
            break;

        default:
            const formDiv = document.querySelector(".form");
            formDiv.innerHTML = "Menu niedostępne";
    }
}

// Wywołaj funkcję, aby wyświetlić menu na dzisiaj
showMenuForToday();
