function kontakt()
{
    //Pobranie wartosci wprowadzonych do kontrolek
    var imie = document.querySelector('#imie').value;
    var imieDuzymi = imie.toUpperCase();

    var nazwisko = document.querySelector('#nazwisko').value;
    var nazwiskoDuzymi = nazwisko.toUpperCase();

    var email = document.querySelector('#email').value;
    var zgloszenie = document.querySelector('#zgloszenie').value;
    var checkbox = document.querySelector('#checkbox').checked;


    //Obsluga braku zaznaczenia checkboxa
    if(checkbox==false)
    {
        document.querySelector("#komunikat").innerHTML = "<span style=\"color:red\">Musisz zapoznać się z regulaminem!</span>";
    }
    else
    {
        //Wyswietlenie komunikatu pod pozioma linia
        document.querySelector("#komunikat").innerHTML = `${imieDuzymi} ${nazwiskoDuzymi} <br> Treść Twojej sprawy: ${zgloszenie}`;
    }


}

//Obsługa zdarzenia wciśnienia przycisku
document.querySelector('#przycisk').addEventListener('click',kontakt);