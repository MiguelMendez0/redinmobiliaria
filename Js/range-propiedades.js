const presupuestoRange = document.getElementById('presupuesto-range');
const presupuestoValor = document.getElementById('presupuesto-valor');

presupuestoRange.addEventListener('input', function() {
    presupuestoValor.textContent = '$' + presupuestoRange.value.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
});
