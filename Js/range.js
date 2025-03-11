const rangeSlide = document.querySelector(".range-slide");
const tooltip = document.querySelector(".tooltip");
const maxVal = parseInt(rangeSlide.max);

function slidePrice() {
  let progress = (rangeSlide.value / maxVal) * 100;

  // Forzar el uso de coma como separador de miles
  tooltip.innerHTML = "$" + parseInt(rangeSlide.value).toLocaleString("en-US");

  tooltip.style.left = progress + "%";
  rangeSlide.style.background = `linear-gradient(to right, #BE1622 ${progress}%, #ddd ${progress}%)`;
}

window.onload = function () {
  slidePrice();
};




