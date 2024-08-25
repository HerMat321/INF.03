function kontakt()
{
    //Pobranie wartosci kontrolek do zmiennych
    var imie = document.querySelector("#imie").value;
    var nazwisko = document.querySelector("#nazwisko").value;

    var email = document.querySelector("#email").value;
    var emailMalymi = email.toLowerCase();

    var usluga = document.querySelector("#usluga").value;

    //Wyswietlenie komunikatu w paragrafie wynik
    document.querySelector("#wynik").innerHTML = `${imie} ${nazwisko} <br> ${emailMalymi} <br> Usługa: ${usluga}`;
}

//Obsluga przycisku
document.querySelector("#przycisk").addEventListener("click",kontakt);