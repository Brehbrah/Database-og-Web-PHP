function sjekkSkjema () {
    var kjønn = document.getElementById('kjønn').value;
    var feilMld = "";

    if(!(kjønn == "M")) {
        feilMld += "Må være M!";
    } else if (!(kjønn == "K")) {
        feilMld += "Må være K!";
    } else {
        feilMld += document.getElementById('melding').innerHTML = "Ugyldig! Må være M eller K!";
    }
}

document.getElementById('regskjema').addEventListener("submit", function (e) {
  if (!sjekkSkjema()) {
    e.preventDefault();
  }
});
