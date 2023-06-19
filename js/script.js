/**
 * This function handles form submission validation.
 * It prevents the default form submission behavior and performs various validation checks on form fields.
 * If any validation fails, it displays an error message next to the corresponding field and prevents form submission.
 */
document.addEventListener("DOMContentLoaded", function () {
  var form = document.getElementById("regForm");
  var submitBtn = document.getElementById("submitBtn");

  /**
   * Event listener for the submit button click event.
   * It prevents the default form submission and performs validation checks.
   */
  submitBtn.addEventListener("click", function (event) {
    event.preventDefault(); // Prevent the default form submission

    // Retrieve form data
    var formData = new FormData(form);
    var name = formData.get("name");
    var vorname = formData.get("vorname");
    var dat1 = formData.get("dat1");
    var versicherung = formData.get("versicherung");
    var beschwerde = formData.get("beschwerde");
    var anfangsdatum = formData.get("anfangsdatum");

    // Validation checks for each field
    if (name == "") {
      document.getElementById("errorname").innerHTML =
        "Enter a valid name";
      name.focus();
      return false;
    } else {
      document.getElementById("errorname").innerHTML = "";
    }

    if (vorname == "") {
      document.getElementById("errorvorname").innerHTML =
        "Enter your first name";
      vorname.focus();
      return false;
    } else {
      document.getElementById("errorvorname").innerHTML = "";
    }

    if (dat1 == "") {
      document.getElementById("errordat1").innerHTML = "Select a birth date";
      dat1.focus();
      return false;
    } else {
      document.getElementById("errordat1").innerHTML = "";
    }

    if (versicherung == "") {
      document.getElementById("errorversicherung").innerHTML =
        "Enter insurance number";
      versicherung.focus();
      return false;
    } else {
      document.getElementById("errorversicherung").innerHTML = "";
    }

    if (beschwerde == "") {
      document.getElementById("errorbeschwerde").innerHTML =
        "Enter today's complaint";
      beschwerde.focus();
      return false;
    } else {
      document.getElementById("errorbeschwerde").innerHTML = "";
    }

    if (anfangsdatum == "") {
      document.getElementById("errordatum").innerHTML = "When did it start";
      anfangsdatum.focus();
      return false;
    } else {
      document.getElementById("errordatum").innerHTML = "";
    }
  });
});
