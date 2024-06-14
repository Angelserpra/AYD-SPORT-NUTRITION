function selectOption(element) {
    var pricingCards = document.querySelectorAll('.pricing-card');
    pricingCards.forEach(function(card) {
      card.classList.remove('selected');
    });
    element.classList.add('selected');
  }
  
