# E-Canteen

E-Canteen to system zastępujący system kartek w kantynie ZSEII w Sosnowcu na wersję cyfrową.
System jest bardzo prosty każdy urzytkownik ma swoje konto na którym ma możliwość doładowania kuponów w formie elektronicznej a następnie zagospodarować je na jedzenie w kantynie. 

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
Pulpit\E-Canteen\database
```
a następnie jak już go wybierzesz naciśnij otwórz.

4.2 Po wybraniu odpowiedniego pliku ```canteen.sql``` przekieruje cię do poprzedniej strony, więc zjedz na sam dół i naciśnij przycisk Inport

Brawo właśnie zaimportowałeś bazę danych do naszego systemu:)

5. Wejdź do eksploratora plików i w górnej części wyszukiwania ścieżki wpisz  
```python
C:\xampp\htdocs
```
5.2 Usuń całą zawartość folderu htdocs do którego cię przekierowało a następnie wklej tam całą zawartość folderu htdocs z folderu z pliku wyodrębnionego na twoim pulpicie ```E-Canteen```

6. Wejdź do eksploratora plików i w górnej części wyszukiwania ścieżki wpisz  
```python
C:\xampp\php
```
6.2 A następnie wklej tam plik ```php.ini``` z folderu ```ini``` wyodrębnionego na twoim pulpicie w folderze ```E-Canteen```. W przypadku jeżeli taki plik już istnieje wybierz opcję ```Zamień plik w miejscu docelowym``` 

7. Wejdź do eksploratora plików i w górnej części wyszukiwania ścieżki wpisz  
```python
C:\xampp\sendmail
```
7.2 A następnie wklej tam plik ```sendmail.ini``` z folderu ```ini``` wyodrębnionego na twoim pulpicie w folderze ```E-Canteen```. W przypadku jeżeli taki plik już istnieje wybierz opcję ```Zamień plik w miejscu docelowym``` 

``Brawo System E-Canteen jest gotowy do twojego urzytku``

Aby użyć naszego Systemu E-Canteen musisz w swojej przeglądarce wpisać w polu wyszukiwania
```python
/localhost/
```


## Opcje 

### Nadanie Roli Administratora

1. Aby nadać na konto rolę administratora należy wejść w przedlądarkę i wpisać w pasek  
```python
http://localhost/phpmyadmin/ lub localhost/phpmyadmin/
```
a następnie wejść w bazę canteen i tabelę users i w zakładce zmienić wartość ```is_admin``` danego urzytkownika na ```1``` 
!!!Jeżeli nie będziesz posiadać roli administratora nie będziesz mógł ```odejmować (skanować zamównia)``` lub ```oddawać (dodawać kartki urzytkowniką)```!!!.

### Uwaga

Aby skanować kod muszisz posiadać ```localhost```na telefonie lub posiadać ```kamerkę internetową``` podłączoną i skalibrowaną sterownikami do komputera.


## Technologie

### Related projects

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
