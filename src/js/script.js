
tabcontent = document.getElementsByClassName("tabcontent");
tablinks = document.getElementsByClassName("tablinks");
var counter = 1
for (i = 0; i < tabcontent.length; i++) {
    if(tabcontent[i].className.includes("none")==false && counter != 0){
      tabcontent[i].className += " active";
      if(i!=0){
        tablinks[i].className += " active";
      }
      counter -= 1
    }
}


function openTab(evt, tabName) {
  var i, tabcontent, tablinks;

  tablinks = document.getElementsByClassName("tablinks");

  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";
}

document.addEventListener("DOMContentLoaded", function () {
  // Display the first tab by default
  document.getElementById("Tab1").style.display = "block";
});

jQuery(document).ready(function ($) {
  $("#show-payment-info").click(function () {
    $("#payment-info").slideToggle();
  });
});
function handleClick() {
  let arrowsign = document.getElementById("arrowsign");
  arrowsign.classList.toggle("rotate90");
}
