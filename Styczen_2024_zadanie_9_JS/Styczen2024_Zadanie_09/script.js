
//Funkcja obsługująca skrypt
function komunikat()
{
    //pobranie wartosci z pol edycyjnych do zmiennych
    let imie = document.querySelector('#imie').value;
    let nazwisko = document.querySelector('#nazwisko').value;
    let email = document.querySelector('#email').value;
    let emailMaleLitery = email.toLowerCase();
    let zgloszenie = document.querySelector('#zgloszenie').value;

    //wyswietlenie zawartosci zmiennych w paragrafach pod linia pozioma
    document.querySelector('#wynik').innerHTML = `${imie} ${nazwisko}<br>${emailMaleLitery}<br>Usługa: ${zgloszenie}</p>`;
}

//przypisanie do przycisku zdarzenia click
document.querySelector('#wyslij').addEventListener('click',komunikat);