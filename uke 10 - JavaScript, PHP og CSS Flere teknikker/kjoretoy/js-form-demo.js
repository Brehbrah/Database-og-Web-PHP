function registrert(verdi) {
  return (verdi.length != 0);
}

function kunBokstaver(verdi) {
  var ptn = /^[a-zA-Z]+$/;
  return ptn.test(verdi);
}

function lengde(verdi, min, max) {
  return (verdi.length >= min && verdi.length <= max);
}

function lovligHeltall(verdi) {
  return !isNaN(parseInt(verdi, 10));
}

function mellom(verdi, min, max) {
  return (verdi >= min && verdi <= max);
}

function gyldigRegNr(verdi) {
  var ptn = /^[A-Z][A-Z][A-Z][A-Z][A-Z][0-9][0-9]$/;
  return ptn.test(verdi);
}

function sjekkSkjema() {

  // For å teste PHP-validering:
  // return true;

  var regnr = document.getElementById('regnr').value;
  var merke = document.getElementById('merke').value;
  var modell = document.getElementById('modell').value;
  var aar = document.getElementById('aar').value;
	
  var feilmld = "";
  
  if (!registrert(regnr) || !registrert(aar))
    feilmld += "Du må fylle ut samtlige felt!";
  
  else {
  
    if (!gyldigRegNr(regnr))
      feilmld += "<p>Regnr må ha 5 bokstaver og så 2 sifre!</p>";
 
    if (lovligHeltall(aar)) {
      if (!mellom(aar, 1950, 2050))
        feilmld += "<p>Årstall må være mellom 1950 og 2050!</p>";
	  }
	  else
	    feilmld += "<p>Årstall må være et heltall!</p>";
    }
  
  if (feilmld != "") {
    var melding = document.getElementById('melding');
	  melding.innerHTML = feilmld;
	  return false;
  }
  else  
    return true;
}
