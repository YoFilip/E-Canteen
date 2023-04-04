# E-Canteen

E-Canteen to system zastępujący system kartek w kantynie ZSEII w Sosnowcu na wersję cyfrową.
System jest bardzo prosty każdy urzytkownik ma swoje konto na którym ma możliwość doładowania kuponów w formie elektronicznej a następnie zamiany ich na danie obiadowe
zamieszczone w danym dniu w menu naszej [kantyny](https://zse.edu.pl/kantyna/).

## Instalacja

1. Zainstaluj pakiet xampp ze strony [xampp](https://www.apachefriends.org/pl/index.html) dla swojej wersji komputera podążając za instrukcjami instalatora
2. Uruchom xampp i naciśnij przycisk start obok opcji Apache oraz MySQL.

3.Pobierz plik zip z naszego [repozytorium](https://github.com/YoFilip/E-Canteen) oraz wyodrębnij pliki (wypakuj plikii) na swój pulpit.

4.Wejdz w przeglądarkę i wpisz w pasek wyszukiwania 
```python
http://localhost/phpmyadmin/ lub localhost/phpmyadmin/
```
4.1 Na górnym pasku narzędzi strony znajduje się zakładka ```Inport``` wejdź w nią i w kolejnej zakładce ```Plik do inportu``` wybierz opcję ```Wybierz plik```. Wybranym plikiem powinien być plik ```canteen.sql``` z pliku wyodrębnionego na twoim pulpicie w folderze 
```python
Pulpit\E-Canteen-Projekt\E-Canteen\database
```
a następnie jak już go wybierzesz naciśnij otwórz.

4.2 Po wybraniu odpowiedniego pliku ```canteen.sql``` przekieruje cię do poprzedniej strony, więc zjedz na sam dół i naciśnij przycisk Inport

Brawo właśnie zaimportowałeś bazę danych do naszego systemu:)

5. Wejdź do eksploratora plików (dokumentów twojego komputera) i w górnej części wyszukiwania ścieżki wpisz  
```python
C:\xampp\htdocs
```
5.2 Usuń całą zawartość folderu htdocs do którego cię przekierowało a następnie wklej tam całą zawartość folderu htdocs z folderu z pliku wyodrębnionego na twoim pulpicie ```E-Canteen```

6. Wejdź do eksploratora plików (dokumentów twojego komputera) i w górnej części wyszukiwania ścieżki wpisz  
```python
C:\xampp\php
```
6.2 Następnie wklej tam plik ```php.ini``` z folderu ```ini``` wyodrębnionego na twoim pulpicie w folderze ```E-Canteen```. W przypadku jeżeli taki plik już istnieje wybierz opcję ```Zamień plik w miejscu docelowym``` 

7. Wejdź do eksploratora plików i w górnej części wyszukiwania ścieżki wpisz  
```python
C:\xampp\sendmail
```
7.2 Następnie wklej tam plik ```sendmail.ini``` z folderu ```ini``` wyodrębnionego na twoim pulpicie w folderze ```E-Canteen```. W przypadku jeżeli taki plik już istnieje wybierz opcję ```Zamień plik w miejscu docelowym``` 

``Brawo System E-Canteen jest gotowy do twojego urzytku``

Aby użyć naszego Systemu E-Canteen musisz w swojej przeglądarce wpisać w polu wyszukiwania
```python
/localhost/
```


### ! Uwaga !

* Przez pośpiech z wysłaniem pracy popełniliśmy błąd a mianowicie źle wywołaliśmy plik ```order.js``` w pliku ```order.php``` przez co kod QR potrzeby do zeskanowania zamównieia i odjęcia kuponów urzytkownikowi się nie generuje aby to naprawić muszisz wejść w plik np. za pomocą notatnika:
```javascript
C:\xampp\htdocs/sites/order.php/
```
a tam skopiować a następnie usunąć linijkę 73 lub jeżeli używasz notatnika to linijkę:
```javascript
<script src="../scripts/order.js"></script>
```
a następnie wkleić ją nad linijką 71 
```javascript
<script src="../scripts/QR.js"></script>
```
Poprawiawiona końcówka pliku powina wyglądać tak:
```javascript
<script src="../scripts/order.js"></script>
<script src="../scripts/QR.js"></script>
<script src="../scripts/app.js"></script>
```
zamiast tak:
```javascript
<script src="../scripts/QR.js"></script>
<script src="../scripts/app.js"></script>
<script src="../scripts/order.js"></script>
```


* Aby skanować kod muszisz posiadać projekt na  ```localhost``` w telefonie z kamera przednią lub tylną (ponieważ strona nie jest na hostingu więc nie możemy korzystać na obu urządzeniach PC i Phone) lub posiadać projekt na  ```localhost``` w komuterze z  ```kamerkę internetową``` podłączoną i skalibrowaną sterownikami do komputera.

* Scrypt dzięki któremu Administrator może skanować kod QR ze względu na ograniczony czas realizacji projektu został zaciągnięty od zagranicznego twórcy [MashTecha](https://www.youtube.com/@mashtech5092). Następnie został zmodyfikowany tak aby spełniał nasze oczekiwania względem projektu. Aktulanie autorski scrypt który zastąpi 
użyty scrypt [MashTecha](https://www.youtube.com/@mashtech5092) jest w fazie pisania (obecne wykonanie 60%). Po ukończeniu autorskiego scryptu zostanie on użyty w projekcjie.



## Opcje 

### Nadanie Roli Administratora

1. Aby nadać na konto rolę administratora należy wejść w przedlądarkę i wpisać w pasek  
```python
http://localhost/phpmyadmin/ lub localhost/phpmyadmin/
```
a następnie wejść w bazę canteen i tabelę users i w zakładce zmienić wartość ```is_admin``` danego urzytkownika na ```1```

!!!Jeżeli nie będziesz posiadać roli administratora nie będziesz mógł ```odejmować``` i ```dodawać kuponów urzytkowniką```!!!.

## Zmiana jadłospisu

1. Aby zmienić jadłospis musisz wejść w folder:
```javascript
htdocs/scripts/order.js
```
A następnie zmienić kod tak jak w instrukcji na górze pliku:
```javascript
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
```

## Technologie

* PHP
* JS
* HMTL
* CSS
* MySQLi
* HTML5 QR Code Scanner
* AJAX
* TYPESCRIPT CORE
* MEDIA STREAM API
* DOM (Document Object Model)
* API PROMISES
* NODE JS
* ECMAScript 6 (ES6)

### Author

**Filip Świątek** - Front-end , Back-End (ALL)

**Kacper Kmiecik** - Back-End

* [YoFilip - GitHub](https://github.com/YoFilip)
* [Kabel Bezprzewodowy#0313 - Discord]()

### License

Copyright © 2023, [YoFilip - GitHub](https://github.com/YoFilip)
