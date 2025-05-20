function scrollCarousel(direction, id) {
  const carousel = document.getElementById(id);
  const card = carousel.querySelector('.flex-shrink-0');
  if (!card) return;

  const cardStyles = window.getComputedStyle(card);
  const gap = parseFloat(cardStyles.marginRight) || 16; // fallback para gap padrão
  const cardWidth = card.offsetWidth + gap;

  carousel.scrollBy({
    left: direction * cardWidth * 3, // rola 3 cards por vez
    behavior: 'smooth'
  });
}