var monthEl = document.querySelector(".month");
var weekEl = document.querySelector(".week");
var dateEl = document.querySelector(".date");
var yearEl = document.querySelector(".year");

var date = new Date();
var month = date.getMonth();
monthEl.innerHTML = date.toLocaleString("eng", {
  month: "long",
});
weekEl.innerHTML = date.toLocaleString("eng", {
  weekday: "long",
});
dateEl.innerHTML = date.getDate();
yearEl.innerHTML = date.getFullYear();
