function sum() {
  var first = Number(document.getElementById("first-no").value);
  var second = Number(document.getElementById("second-no").value);
  var s = first + second;
  document.getElementById("result-store").value = s;
}
function sub() {
  var first = Number(document.getElementById("first-no").value);
  var second = Number(document.getElementById("second-no").value);
  var s = first - second;
  document.getElementById("result-store").value = s;
}
function mult() {
  var first = Number(document.getElementById("first-no").value);
  var second = Number(document.getElementById("second-no").value);
  var s = first * second;
  document.getElementById("result-store").value = s;
}
function div() {
  var first = Number(document.getElementById("first-no").value);
  var second = Number(document.getElementById("second-no").value);
  var s = first / second;
  document.getElementById("result-store").value = s;
}
function square() {
  var first = Number(document.getElementById("first-no").value);
  var s = first * first;
  document.getElementById("result-store").value = s;
}
function root() {
  var first = Number(document.getElementById("first-no").value);
  var s = Math.sqrt(first);
  document.getElementById("result-store").value = s;
}
function fact() {
  var first = Number(document.getElementById("first-no").value);
  var i,
    f = 1;
  for (i = 1; i <= first; i++) {
    f = f * i;
  }
  document.getElementById("result-store").value = f;
}
function reset() {
  document.getElementById("first-no").value = " ";
  document.getElementById("second-no").value = " ";
  document.getElementById("result-store").value = " ";
}
