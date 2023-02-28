// Get the modal
const modal = document.getElementById("modal");

// Get the button that opens the modal
const btn = document.getElementById("open-modal-btn");

// Get the <span> element that closes the modal
const closeBtn = modal.querySelector(".close");

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
closeBtn.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

//This will remove non-numeric characters bitches!
const numberInput = document.getElementById("contact");
numberInput.addEventListener("input", function(event) {
  // Remove non-numeric characters
  const newValue = event.target.value.replace(/[^0-9]/g, '');
  event.target.value = newValue;
});
