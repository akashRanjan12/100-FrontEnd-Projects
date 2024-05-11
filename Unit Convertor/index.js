const unitOptions = document.querySelectorAll(".options");
const boxes = document.querySelectorAll(".boxes");
unitOptions.forEach((option) => {
  option.addEventListener("click", () => {
    const selectedunit = option.getAttribute("data-unit");
    boxes.forEach((box) => {
      if (box.id === `${selectedunit}Box`) {
        box.style.display = "block";
      } else {
        box.style.display = "none";
      }
    });
  });
});
// calculation part
function currency_fun() {
  let input_no = parseFloat(
    document.getElementById("input-first-val-curr").value
  );
  let from_input = document.getElementById("from-currency").value;
  let to_input = document.getElementById("to-currency").value;
  let result;
  if (from_input === "Indian" && to_input === "us") {
    result = input_no / 83.4573;
    // console.log(result);
  } else if (from_input === "us" && to_input === "Indian") {
    result = input_no * 83.4573;
  } else if (from_input === "Indian" && to_input === "GBP") {
    result = input_no / 104.4004;
  } else if (from_input === "GBP" && to_input === "Indian") {
    result = input_no * 104.4004;
  } else if (from_input === "Indian" && to_input === "EUR") {
    result = input_no / 89.3552;
  } else if (from_input === "EUR" && to_input === "Indian") {
    result = input_no * 89.3552;
  } else if (from_input === "Indian" && to_input === "JPY") {
    result = input_no / 0.5438;
  } else if (from_input === "JPY" && to_input === "Indian") {
    result = input_no * 0.5438;
  } else if (from_input === "us" && to_input === "GBP") {
    result = input_no / 1.252;
  } else if (from_input === "GBP" && to_input === "us") {
    result = input_no * 1.252;
  } else if (from_input === "us" && to_input === "EUR") {
    result = input_no / 1.072;
  } else if (from_input === "EUR" && to_input === "us") {
    result = input_no * 1.072;
  } else if (from_input === "us" && to_input === "JPY") {
    result = input_no / 0.0065;
  } else if (from_input === "JPY" && to_input === "us") {
    result = input_no * 0.0065;
  } else if (from_input === "GBP" && to_input === "EUR") {
    result = input_no / 0.856;
  } else if (from_input === "EUR" && to_input === "GBP") {
    result = input_no * 0.856;
  } else if (from_input === "GBP" && to_input === "JPY") {
    result = input_no / 0.0052;
  } else if (from_input === "JPY" && to_input === "GBP") {
    result = input_no * 0.0052;
  } else if (from_input === "EUR" && to_input === "JPY") {
    result = input_no / 0.0061;
  } else if (from_input === "JPY" && to_input === "EUR") {
    result = input_no * 0.0061;
  } else {
    result = input_no;
    // console.log(result);
  }
  document.getElementById("curr-result").value = `Result: ${result.toFixed(4)}`;
}
// length part js
function length_fun() {
  let input_no = parseFloat(
    document.getElementById("input-first-val-len").value
  );
  let from_input = document.getElementById("from-length").value;
  let to_input = document.getElementById("to-length").value;
  let result;
  if (from_input === "mm" && to_input === "cm") {
    result = input_no / 10;
  } else if (from_input === "cm" && to_input === "mm") {
    result = input_no * 10;
  } else if (from_input === "mm" && to_input === "m") {
    result = input_no / 100;
  } else if (from_input === "m" && to_input === "mm") {
    result = input_no * 100;
  } else if (from_input === "mm" && to_input === "km") {
    result = input_no / 1000;
  } else if (from_input === "m" && to_input === "mm") {
    result = input_no * 1000;
  } else if (from_input === "mm" && to_input === "in") {
    result = input_no / 25.4;
  } else if (from_input === "in" && to_input === "mm") {
    result = input_no * 25.4;
  } else if (from_input === "mm" && to_input === "ft") {
    result = input_no / 304.8;
  } else if (from_input === "ft" && to_input === "mm") {
    result = input_no * 304.8;
  } else if (from_input === "cm" && to_input === "m") {
    result = input_no / 100;
  } else if (from_input === "m" && to_input === "cm") {
    result = input_no * 100;
  } else if (from_input === "cm" && to_input === "km") {
    result = input_no / 100000;
  } else if (from_input === "km" && to_input === "cm") {
    result = input_no * 100000;
  } else if (from_input === "cm" && to_input === "in") {
    result = input_no / 2.54;
  } else if (from_input === "in" && to_input === "cm") {
    result = input_no * 2.54;
  } else if (from_input === "cm" && to_input === "ft") {
    result = input_no / 30.48;
  } else if (from_input === "ft" && to_input === "cm") {
    result = input_no * 30.48;
  } else if (from_input === "m" && to_input === "km") {
    result = input_no / 1000;
  } else if (from_input === "km" && to_input === "m") {
    result = input_no * 1000;
  } else if (from_input === "m" && to_input === "in") {
    result = input_no / 0.0254;
  } else if (from_input === "in" && to_input === "m") {
    result = input_no * 0.0254;
  } else if (from_input === "m" && to_input === "ft") {
    result = input_no / 0.3048;
  } else if (from_input === "ft" && to_input === "m") {
    result = input_no * 0.3048;
  } else if (from_input === "in" && to_input === "ft") {
    result = input_no / 12;
  } else if (from_input === "ft" && to_input === "in") {
    result = input_no * 12;
  } else if (from_input === "m" && to_input === "mi") {
    result = input_no / 1609.34;
  } else if (from_input === "mi" && to_input === "m") {
    result = input_no * 1609.34;
  } else if (from_input === "km" && to_input === "mi") {
    result = input_no / 1.609;
  } else if (from_input === "mi" && to_input === "km") {
    result = input_no * 1.609;
  } else {
    result = input_no;
    // console.log(result);
  }
  document.getElementById("len-result").value = `Result: ${result}`;
}
// volume part js
function volume() {
  let input_no = parseFloat(
    document.getElementById("input-first-val-volume").value
  );
  var from_input = document.getElementById("from-vol").value;
  var to_input = document.getElementById("to-vol").value;
  var result;
  if (from_input === "ml" && to_input === "l") {
    result = input_no / 1000;
  } else if (from_input === "l" && to_input === "ml") {
    result = input_no * 1000;
  } else if (from_input === "ml" && to_input === "gal") {
    result = input_no / 3785.41;
  } else if (from_input === "gal" && to_input === "ml") {
    result = input_no * 3785.41;
  } else if (from_input === "l" && to_input === "gal") {
    result = input_no / 3.78541;
  } else if (from_input === "gal" && to_input === "l") {
    result = input_no * 3.78541;
  } else if (from_input === "cm3" && to_input === "m3") {
    result = input_no / Math.pow(10, 6);
  } else if (from_input === "m3" && to_input === "cm3") {
    result = input_no * Math.pow(10, 6);
  } else {
    result = input_no;
  }
  document.getElementById("vol-result").value = `Result: ${result}`;
}

// weight
function weight_fun() {
  let input_no = parseFloat(
    document.getElementById("input-first-val-weigh").value
  );
  var from_input = document.getElementById("from-weight").value;
  var to_input = document.getElementById("to-weight").value;
  var result;
  if (from_input === "kg" && to_input === "g") {
    result = input_no * 1000;
  } else if (from_input === "g" && to_input === "kg") {
    result = input_no / 1000;
  } else if (from_input === "kg" && to_input === "mg") {
    result = input_no * 10000000;
  } else if (from_input === "mg" && to_input === "kg") {
    result = input_no / 10000000;
  } else if (from_input === "kg" && to_input === "tonne") {
    result = input_no * 0.001;
  } else if (from_input === "tonne" && to_input === "kg") {
    result = input_no / 0.001;
  }

  // else part
  else {
    result = input_no;
  }
  document.getElementById("weight-result").value = `Result: ${result}`;
}
