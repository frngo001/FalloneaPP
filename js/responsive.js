/**
 * Updates the language options based on the window width.
 */
function updateOptions() {
  var langSelect = document.getElementById("lang-select");
  var langOptions = langSelect.options;
  var width =
    window.innerWidth ||
    document.documentElement.clientWidth ||
    document.body.clientWidth;

  if (width < 420) {
    // Truncate the text to two characters
    for (var i = 0; i < langOptions.length; i++) {
      var option = langOptions[i];
      var text = option.textContent;
      option.textContent = text.substring(0, 2);
    }
  } else {
    // Restore the full text
    for (var i = 0; i < langOptions.length; i++) {
      var option = langOptions[i];
      var value = option.value;
      option.textContent = value;
    }
  }
}

/**
 * Event listener for the DOMContentLoaded event.
 */
window.addEventListener("DOMContentLoaded", function () {
  // Call the updateOptions function when the DOM is loaded
  updateOptions();
});

/**
 * Event listener for the window resize event.
 */
window.addEventListener("resize", function () {
  // Call the updateOptions function when the window is resized
  updateOptions();
});
