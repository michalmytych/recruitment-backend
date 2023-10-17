# Zadanie rekrutacyjne

**Cel:**
Stworzenie prostego systemu do zarządzania książkami w bibliotece.

## Specyfikacja:
1. **Aplikacja:**
    - Użyj Laravela jako frameworka oraz MySQL jako bazy danych.
2. **Interfejs użytkownika:**
    - Prosty interfejs, który pozwoli użytkownikowi na dodawanie, edycję, usuwanie oraz przeglądanie książek.
3. **Model książki:**
	Książka powinna zawierać następujące informacje:
	- Tytuł
	- Autor
	- Rok wydania
	- Krótki opis
	- Ilość dostępnych egzemplarzy
4. **Walidacja:**
	- Upewnij się, że wszystkie pola są odpowiednio walidowane przed zapisaniem do bazy danych.
5. **Wyszukiwanie:**
	- Użytkownik powinien być w stanie wyszukać książkę po tytule lub autorze.
6. **Paginacja:**
    - Jeśli w bazie jest więcej niż 10 książek, użyj paginacji do wyświetlania wyników.
7. **Relacje:**
    - Dodaj funkcjonalność, która pozwoli na przypisanie książki do kategorii (np. literatura, historia, nauka). Użytkownik powinien być w stanie przeglądać książki według kategorii.

## Dodatkowe punkty za:
1. Użycie migracji i seederów w Laravelu do stworzenia przykładowych danych.
2. Stworzenie API do zarządzania książkami.
3. Użycie autoryzacji i autentykacji w aplikacji, tak aby tylko zalogowani użytkownicy mogli zarządzać książkami.
4. Responsywność interfejsu użytkownika.

## Instrukcje:
1. Utwórz fork repozytorium udostępnionego przez nas na GitHub [pod tym linkiem](https://github.com/Dentametr/recruitment-backend).
2. Po zakończeniu zadania, wyślij link do Twojego forka na adres: info@avalio.io.
3. Upewnij się, że zawarłeś/aś wszystkie niezbędne instrukcje w README, abyśmy mogli uruchomić Twoją aplikację lokalnie (możesz nadpisać ten plik).

## Ocenianie:
Przy ocenie będziemy zwracać uwagę na:
- Jakość kodu.
- Przestrzeganie standardów i najlepszych praktyk programowania w PHP i Laravelu.
- Funkcjonalność i spełnienie wymagań.
- Zrozumienie relacji i struktury bazy danych.

**Powodzenia!** 