/**
 * Encrypts a PIN using the SHA256 hashing algorithm.
 *
 * @param {string} pin - The PIN to be encrypted.
 * @returns {string} - The encrypted PIN.
 */
function encryptPIN(pin) {
  // We use a hashing function to encrypt the PIN
  // Here, we are using SHA256
  var sha256 = new jsSHA("SHA-256", "TEXT");
  sha256.update(pin);
  var encryptedPIN = sha256.getHash("HEX");
  return encryptedPIN;
}

/**
 * Saves the encrypted PIN locally using the Web Storage API.
 *
 * @param {string} encryptedPIN - The encrypted PIN to be saved.
 */
function saveEncryptedPIN(encryptedPIN) {
  // We use the Web Storage API to store the encrypted PIN locally
  // Here, we are using localStorage
  localStorage.setItem("encryptedPIN", encryptedPIN);
}

/**
 * Checks if the entered PIN matches the stored encrypted PIN.
 *
 * @param {string} pin - The PIN to be checked.
 * @returns {boolean} - True if the PIN matches, false otherwise.
 */
function checkPIN(pin) {
  // Retrieve the locally stored encrypted PIN
  var encryptedPIN = localStorage.getItem("encryptedPIN");

  // Encrypt the PIN entered by the user
  var inputEncryptedPIN = encryptPIN(pin);

  // Compare the two encrypted PINs
  if (encryptedPIN === inputEncryptedPIN) {
    return true;
  } else {
    return false;
  }
}
