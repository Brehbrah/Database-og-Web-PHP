 function showHide(id) {

   var show = document.getElementById(id);

   if(show.style.display == 'none')
      show.style.display = 'block';
   else
      show.style.display = 'none';
}

function hide(el) {
    el.style.display = 'none';
}

function show(el, value) {
    el.style.display = value;
}
