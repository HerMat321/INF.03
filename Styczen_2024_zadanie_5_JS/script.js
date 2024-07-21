function cena()
{
    var suma = 0;

    document.querySelectorAll(".checkbox:checked").forEach(checkbox => {
        cenaZabiegu = parseInt(checkbox.value);
        suma += cenaZabiegu;
    });

    document.querySelector("#wynik").innerHTML = `Cena zabiegów: ${suma}`;
}

document.querySelector("#przycisk").addEventListener("click",cena);