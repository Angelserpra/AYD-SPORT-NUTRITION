// script.js
function selectOption(element) {
    // Remover la clase 'selected' de todos los elementos
    var pricingCards = document.querySelectorAll('.pricing-card');
    pricingCards.forEach(function(card) {
      card.classList.remove('selected');
    });
  
    // Agregar la clase 'selected' al elemento seleccionado
    element.classList.add('selected');
  }
  