// Get the modal
var modal = document.getElementById("wtz-modal");
// Get the button that opens the modal
var wtzBtn = document.getElementById("wtz-button");

// Get the element that closes the modal
var closeModal = document.getElementById('close-modal');

// When the user clicks on the button, open the modal
wtzBtn.onclick = function() {
  modal.style.display = "grid";
}

// When the user clicks on <span> (x), close the modal
closeModal.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
} 