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
    event.preventDefault(); // Impede envio padrão do formulário

    const termo = document.getElementById("searchInput").value.toLowerCase();

    if (!termo) return;

    // Seleciona todos os cards (ajuste a classe se necessário)
    const elementos = document.querySelectorAll('.card');

    for (let el of elementos) {
        const titulo = el.querySelector('.card-title')?.innerText.toLowerCase() || "";
        const genero = el.dataset.genero?.toLowerCase() || "";

        if (titulo.includes(termo) || genero.includes(termo)) {
            el.scrollIntoView({ behavior: "smooth", block: "center" });
            el.classList.add("border", "border-success", "border-3");

            setTimeout(() => {
                el.classList.remove("border", "border-success", "border-3");
            }, 2000);

            return;
        }
    }

    alert("Nenhum resultado encontrado.");
}

