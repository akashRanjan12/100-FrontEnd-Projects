function computeCost() {
  var rice = document.getElementById("rice").value;
  var pulse = document.getElementById("pulse").value;
  var vej = document.getElementById("vej").value;
  var masala = document.getElementById("masala").value;
  var ghee = document.getElementById("ghee").value;
  var snak = document.getElementById("snak").value;
  document.getElementById("print").value = totalCost =
    rice * 52 + pulse * 108 + vej * 100 + masala * 50 + ghee * 200 + snak * 100;
}
