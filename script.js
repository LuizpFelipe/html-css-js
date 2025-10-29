const slides = document.querySelector('.slides');
const slideItems = document.querySelectorAll('.slides div');

slideItems.forEach(item => {
  const clone = item.cloneNode(true);
  slides.appendChild(clone);
});
