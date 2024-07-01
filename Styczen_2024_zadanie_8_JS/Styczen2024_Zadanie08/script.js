function promocja()
{
    //pobranie cen fryzur
    let cenaKrotkie = parseInt(document.getElementById('1').value);
    let cenaSrednie = document.getElementById('2').value;
    let cenaPolDlugie = document.getElementById('3').value;
    let cenaDlugie = document.getElementById('4').value;

    //pobranie zaznaczonych zmiennych
    let krotkie = document.getElementById('1').checked;
    let srednie = document.getElementById('2').checked;
    let polDlugie = document.getElementById('3').checked;
    let dlugie = document.getElementById('4').checked;
    
    //odkrycie ceny promocyjnej
    if(krotkie == true)
        {
            document.querySelector("#wynik").innerHTML = `cena promocyjna: ${cenaKrotkie - 10}`;
        }
    else if(srednie == true)
        {
            document.querySelector("#wynik").innerHTML = `cena promocyjna: ${cenaSrednie - 10}`;
        }
    else if(polDlugie == true)
        {
            document.querySelector("#wynik").innerHTML = `cena promocyjna: ${cenaPolDlugie - 10}`;
        }
    else if(dlugie == true)
        {
            document.querySelector("#wynik").innerHTML = `cena promocyjna: ${cenaDlugie - 10}`;
        }

}
document.querySelector('#przycisk').addEventListener('click',promocja)