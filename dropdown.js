const dropdownBtn = document.querySelector('.fas fa-angle-down');
const dropdownContent = document.querySelector('.notifications');

dropdownBtn.addEventListener('click', () => {
  dropdownContent.classList.toggle('show');
});

window.addEventListener('click', (event) => {
  if (!event.target.matches('.user-notifications .fas fa-angle-down')) {
    dropdownContent.classList.remove('show');
  }
});