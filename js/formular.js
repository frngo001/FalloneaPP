// Generates size options for the 'größe' select element
function generateGrosOptions() {
  let sizeOptions = document.getElementById('größe');
  for (let i = 150; i <= 220; i++) {
    let option = document.createElement('option');
    option.value = i + 'cm';
    option.text = i + 'cm';
    sizeOptions.add(option);
  }
}

// Generates weight options for the 'gewicht' select element
function generateSizeOptions() {
  let sizeOptions = document.getElementById('gewicht');
  for (let i = 40; i <= 300; i++) {
    let option = document.createElement('option');
    option.value = i + 'Kg';
    option.text = i + 'Kg';
    sizeOptions.add(option);
  }
}

// Event listener for the 'input' event on the 'stark' input element
document.getElementById('stark').addEventListener("input", function() {
  let value = this.value;
  console.log(value);
});

// Adds a new row to the table
function addRow() {
  event.preventDefault();
  let container = document.getElementsByClassName('all-medications')[0];
  let newIndex = container.getElementsByClassName('medication').length;
  
  let newClient = document.createElement('tr');
  newClient.className = 'medication';
  newClient.innerHTML = `
    <td><input type="text" name="name_medikament[]" placeholder=""></td>
    <td><input type="text" name="stärke[]" placeholder=""></td>
    <td><input type="text" name="gestalt[]" placeholder=""></td>
    <td><input type="text" name="morgens[]" placeholder=""></td>
    <td><input type="text" name="mittags[]" placeholder=""></td>
    <td><input type="text" name="abends[]" placeholder=""></td>
    <td><input type="text" name="nachts[]" placeholder=""></td>
    <td><input type="text" name="einheit[]" placeholder=""></td>
    <td><input type="text" name="hinweis[]" placeholder=""></td>
    <td><input type="text" name="grund[]" placeholder=""></td>
    <td><button onclick="removeRow(this)">-</button></td>
  `;
  
  container.appendChild(newClient);
}

// Removes the row containing the specified button
function removeRow(button) {
  event.preventDefault();
  let row = button.parentNode.parentNode;
  row.parentNode.removeChild(row);
}

// Export the functions for use in other files
module.exports = {
  generateGrosOptions,
  generateSizeOptions,
  addRow,
  removeRow
};
