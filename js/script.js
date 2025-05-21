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

function buscar(event) {
    event.preventDefault(); // Impede o envio do formulário

    const termo = document.getElementById('searchInput').value.toLowerCase();
    const cards = document.querySelectorAll('.card');

    for (let card of cards) {
        const titulo = card.querySelector('.card-title')?.textContent.toLowerCase();
        const genero = card.getAttribute('data-genero')?.toLowerCase();
        const genero2 = card.getAttribute('data-genero2')?.toLowerCase();

        if (
            (titulo && titulo.includes(termo)) ||
            (genero && genero.includes(termo)) ||
            (genero2 && genero2.includes(termo))
        ) {
            card.scrollIntoView({ behavior: 'smooth', block: 'center' });
            card.classList.add('border', 'border-warning');
            setTimeout(() => card.classList.remove('border', 'border-warning'), 2000);
            return;
        }
    }

    alert("Nenhum resultado encontrado.");
}