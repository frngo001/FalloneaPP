// Event listener for DOMContentLoaded event
document.addEventListener(
  "DOMContentLoaded",
  function () {
    // Call checkInputs function when the DOM is loaded
    checkInputs();
  },
  false
);

// Get references to various elements
const slidePage = document.querySelector(".slidepage");
const firstNextBtn = document.querySelector(".nextBtn");
const prevBtnSec = document.querySelector(".prev-1");
const nextBtnSec = document.querySelector(".next-1");

const prevBtnThird = document.querySelector(".prev-2");
const nextBtnThird = document.querySelector(".next-2");

const prevBtnFourth = document.querySelector(".prev-3");
const submitBtn = document.querySelector(".submit");

const progressText = document.querySelectorAll(".step p");
const progressCheck = document.querySelectorAll(".step .check");
const bullet = document.querySelectorAll(".step .bullet");

let max = 4;
let current = 1;

// Function to check inputs and enable/disable the next button
function checkInputs() {
  var input1 = document.getElementById("name").value;
  var input2 = document.getElementById("vorname").value;
  var input3 = document.getElementById("dat1").value;
  var input4 = document.getElementById("versicherung").value;
  var nextButton = document.getElementById("submitBtn");

  if (input1 !== "" && input2 !== "" && input3 !== "" && input4 !== "") {
    nextButton.disabled = false;
  } else {
    nextButton.disabled = true;
  }
}

// Event listener for firstNextBtn click event
firstNextBtn.addEventListener("click", function (event) {
  event.preventDefault();
  slidePage.style.marginLeft = "-25%";
  bullet[current - 1].classList.add("active");
  progressText[current - 1].classList.add("active");
  progressCheck[current - 1].classList.add("active");
  current += 1;

  // Get input values
  var input1 = document.getElementById("name").value;
  var input2 = document.getElementById("vorname").value;
  var input3 = document.getElementById("dat1").value;
  var input4 = document.getElementById("straße").value;
  var input5 = document.getElementById("hausnummer").value;
  var input6 = document.getElementById("postleitzahl").value;
  var input7 = document.getElementById("stadt").value;
  var input8 = document.getElementById("tel").value;
  var input9 = document.getElementById("email").value;
  var input10 = document.getElementById("versicherung").value;
  var input11 = document.getElementById("beruf").value;
  var input12 = document.getElementById("größe").value;
  var input13 = document.getElementById("gewicht").value;
  var input14 = document.getElementById("geschlecht").value;
  var input15 = document.getElementById("id_user").value;

  // Perform an AJAX request
  $.ajax({
    type: "POST",
    url: "../generer.php?id=" + input15,
    data: {
      name: input1,
      vorname: input2,
      dat1: input3,
      straße: input4,
      hausnummer: input5,
      postleitzahl: input6,
      stadt: input7,
      tel: input8,
      email: input9,
      versicherung: input10,
      beruf: input11,
      größe: input12,
      gewicht: input13,
      geschlecht: input14,
      step: "01",
    },
    success: function (response) {
      // Handle successful response
    },
    error: function (response) {
      // Handle error response
    },
  });
});

// Event listener for nextBtnSec click event
nextBtnSec.addEventListener("click", function (event) {
  event.preventDefault();
  slidePage.style.marginLeft = "-50%";
  bullet[current - 1].classList.add("active");
  progressText[current - 1].classList.add("active");
  progressCheck[current - 1].classList.add("active");
  current += 1;

  // Get input values
  var input1 = document.getElementsByName("beschwerde[]");
  var input2 = document.getElementById("anfangsdatum").value;
  var input3 = document.getElementById("stark").value;
  var input4 = document.getElementById("veränderung").value;
  var input5 = document.getElementById("vorschreibung").value;
  var input6 = document.getElementById("periode").value;
  var input15 = document.getElementById("id_user").value;
  var input7 = "";

  // Create a comma-separated string from the checked input values
  for (i = 0; i < input1.length; i++) {
    if (input1[i].checked) {
      if (input7 == "") {
        input7 += input1[i].value;
      } else {
        input7 += "," + input1[i].value;
      }
    }
  }

  // Perform an AJAX request
  $.ajax({
    type: "POST",
    url: "../generer.php?id=" + input15,
    data: {
      beschwerde: input7,
      anfangsdatum: input2,
      stark: input3,
      veränderung: input4,
      vorschreibung: input5,
      periode: input6,
      step: "02",
    },
    success: function (response) {
      // Handle successful response
    },
    error: function (response) {
      // Handle error response
    },
  });
});

// Event listener for nextBtnThird click event
nextBtnThird.addEventListener("click", function (event) {
  event.preventDefault();
  slidePage.style.marginLeft = "-75%";
  bullet[current - 1].classList.add("active");
  progressText[current - 1].classList.add("active");
  progressCheck[current - 1].classList.add("active");
  current += 1;

  // Get input values
  // var input1 = document.getElementById("rauchen").value;
  // var input2 = document.getElementById("alkohol").value;
  // var input3 = document.getElementById("drogen").value;
  // var input4 = document.getElementById("medikamente").value;
  // var input5 = document.getElementsByName("name_medikament[]");
  // var input6 = document.getElementsByName("stärke[]");
  // var input7 = document.getElementsByName("gestalt[]");
  // var input8 = document.getElementsByName("morgens[]");
  // var input9 = document.getElementsByName("mittags[]");
  // var input10 = document.getElementsByName("abends[]");
  // var input11 = document.getElementsByName("nachts[]");
  // var input12 = document.getElementsByName("einheit[]");
  // var input13 = document.getElementsByName("hinweis[]");
  // var input14 = document.getElementsByName("grund[]");
  // var input16 = document.getElementById("operation").value;
  // var input17 = document.getElementsByName("allergien[]");
  // var input15 = document.getElementById("id_user").value;

  // Perform an AJAX request
  // $.ajax({
  //   type: 'POST',
  //   url: '../generer.php?id='+ input15,
  //   data: {
  //     rauchen: input1,
  //     alkohol: input2,
  //     drogen: input3,
  //     medikamente: input4,
  //     name_medikament: input5,
  //     stärke: input6,
  //     gestalt: input7,
  //     morgens: input8,
  //     mittags: input9,
  //     abends: input10,
  //     nachts: input11,
  //     einheit: input12,
  //     hinweis: input13,
  //     grund: input14,
  //     operation: input16,
  //     allergien: input17,
  //     step: "03"
  //   },
  //   success: function(response) {
  //     // Handle successful response
  //   },
  //   error: function(response) {
  //     // Handle error response
  //   },
  // });
});

// Event listener for submitBtn click event
submitBtn.addEventListener("click", function () {
  bullet[current - 1].classList.add("active");
  progressText[current - 1].classList.add("active");
  progressCheck[current - 1].classList.add("active");
  current += 1;
  // setTimeout(function () {
  //   alert("merci pour votre confiance");
  //   location.reload();
  // }, 800);
});

// Event listener for prevBtnSec click event
prevBtnSec.addEventListener("click", function (event) {
  event.preventDefault();
  slidePage.style.marginLeft = "0%";
  bullet[current - 2].classList.remove("active");
  progressText[current - 2].classList.remove("active");
  progressCheck[current - 2].classList.remove("active");
  current -= 1;
});

// Event listener for prevBtnThird click event
prevBtnThird.addEventListener("click", function (event) {
  event.preventDefault();
  slidePage.style.marginLeft = "-25%";
  bullet[current - 2].classList.remove("active");
  progressText[current - 2].classList.remove("active");
  progressCheck[current - 2].classList.remove("active");
  current -= 1;
});

// Event listener for prevBtnFourth click event
prevBtnFourth.addEventListener("click", function (event) {
  event.preventDefault();
  slidePage.style.marginLeft = "-50%";
  bullet[current - 2].classList.remove("active");
  progressText[current - 2].classList.remove("active");
  progressCheck[current - 2].classList.remove("active");
  current -= 1;
});

// Event listeners for input change events
// document.getElementById("name").addEventListener("input", checkInputs);
// document.getElementById("vorname").addEventListener("input", checkInputs);
// document.getElementById("dat1").addEventListener("input", checkInputs);
// document.getElementById("versicherung").addEventListener("input", checkInputs);
