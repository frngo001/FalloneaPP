//Run the Jest tests using the following command:
//jest

const functions = require("../js/formular");

test("Test generateGrosOptions function", () => {
  document.body.innerHTML = `
    <select id="größe"></select>
  `;

  const expectedOptions =
    '<option value="150cm">150cm</option><option value="151cm">151cm</option>';
  functions.generateGrosOptions();
  const actualOptions = document.getElementById("größe").innerHTML;

  expect(actualOptions).toBe(expectedOptions);
});

test("Test generateSizeOptions function", () => {
  document.body.innerHTML = `
    <select id="gewicht"></select>
  `;

  const expectedOptions =
    '<option value="40Kg">40Kg</option><option value="41Kg">41Kg</option>';
  functions.generateSizeOptions();
  const actualOptions = document.getElementById("gewicht").innerHTML;

  expect(actualOptions).toBe(expectedOptions);
});

test("Test addRow function", () => {
  document.body.innerHTML = `
    <div class="all-medications"></div>
  `;

  functions.addRow();
  const rowElements = document.getElementsByClassName("medication");

  expect(rowElements.length).toBe(1);
});

test("Test removeRow function", () => {
  document.body.innerHTML = `
    <div class="all-medications">
      <table>
        <tr class="medication">
          <td><button onclick="removeRow(this)">-</button></td>
        </tr>
      </table>
    </div>
  `;

  const rowElement = document.getElementsByClassName("medication")[0];

  functions.removeRow(rowElement.querySelector("button"));
  const rowElements = document.getElementsByClassName("medication");

  expect(rowElements.length).toBe(0);
});
