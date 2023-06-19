// Function to read NFC data
function readNFC() {
  if ("NDEFReader" in window) {
    // Create an instance of NDEFReader
    const reader = new NDEFReader();
    reader
      .scan()
      .then((tag) => {
        // Retrieve the data from the NFC card here
        const data = tag.records[0].data;
        // Store the data in a variable
        const nfcData = data;
        // Use the data later
        console.log(nfcData);
      })
      .catch((error) => {
        console.error(error);
      });
  } else {
    // Display an error message if NFC Web API is not supported by the browser
    document.write(
      "<font color='red'>Die NFC Web API wird von diesem Browser nicht unterstützt..</font>"
    );
  }
}
