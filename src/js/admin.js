function openTab(evt, tabName) {
  var i, tabcontent, tablinks;

  // Hide all tab content
  tabcontent = document.getElementsByClassName("tab-content");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Remove the "active" class from all tab links
  tablinks = document.getElementsByClassName("tab-link");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the specific tab content
  document.getElementById(tabName).style.display = "block";

  // Add the "active" class to the button that opened the tab
  evt.currentTarget.className.add("active");
}
document.addEventListener("DOMContentLoaded", function () {
  // Function to hide the custom alert after 1 second with fadeout
  function hideCustomAlert() {
    var customAlert = document.querySelector(".alert");
    if (customAlert) {
      customAlert.style.transition = "opacity 3s";
      customAlert.style.opacity = "0";
      setTimeout(function () {
        customAlert.style.display = "none";
      }, 2000); // Hide the element after 0.5 seconds
    }
  }

  // Set the timeout to call the hideCustomAlert function after 1 second
  setTimeout(hideCustomAlert, 2000);
});
