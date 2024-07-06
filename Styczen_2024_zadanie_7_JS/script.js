function obliczCene()
{
    //zmienna przechowująca zsumowaną cenę zabiegów
    let cenaZabiegow = 0;

    //sprawdzamy wszystkie zaznaczone checkboxy i sumujemy ich VALUE
    document.querySelectorAll(".checkbox:checked").forEach((checkbox) => {
        cenaZabiegow += parseInt(checkbox.value);
    });

    //wyswietlanie zsumowanej ceny zabiegow pod przyciskiem
    document.querySelector('#wynik').innerHTML = `Cena zabiegów: ${cenaZabiegow}`;
}

//nasluchiwacz zdarzenia click
document.querySelector('#przycisk').addEventListener('click',obliczCene);