const balancefield = document.querySelector('.user-balance .balance');
const eye = document.querySelector('.fa-eye');

eye.addEventListener('click', () => {
    if (balancefield.style.display === 'none') {
       balancefield.style.display = 'block';
       eye.classList.remove("fa-eye-slash");
       eye.classList.add("fa-eye");
    } else {
       balancefield.style.display = 'none';
       eye.classList.remove("fa-eye");
    eye.classList.add("fa-eye-slash");
    }
 });