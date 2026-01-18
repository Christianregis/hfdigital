// Données formations




// Scroll animation
const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('appear');
    }
  });
}, { threshold: 0.1 });
document.querySelectorAll('.fade-in').forEach(el => observer.observe(el));

// FAQ toggle
document.querySelectorAll('.faq-question').forEach(item => {
  item.addEventListener('click', () => {
    const answer = item.nextElementSibling;
    const isOpen = answer.style.display === 'block';
    document.querySelectorAll('.faq-answer').forEach(a => a.style.display = 'none');
    if (!isOpen) answer.style.display = 'block';
  });
});

// Modals
const loginModal = document.getElementById('loginModal');
const registerModal = document.getElementById('registerModal');
const btnLogin = document.getElementById('btnLogin');
const btnRegister = document.getElementById('btnRegister');
const closeLogin = document.getElementById('closeLogin');
const closeRegister = document.getElementById('closeRegister');
const switchToRegister = document.getElementById('switchToRegister');
const switchToLogin = document.getElementById('switchToLogin');

btnLogin.onclick = () => loginModal.classList.add('active');
btnRegister.onclick = () => registerModal.classList.add('active');
closeLogin.onclick = () => loginModal.classList.remove('active');
closeRegister.onclick = () => registerModal.classList.remove('active');
switchToRegister.onclick = () => {
  loginModal.classList.remove('active');
  registerModal.classList.add('active');
};
switchToLogin.onclick = () => {
  registerModal.classList.remove('active');
  loginModal.classList.add('active');
};

// Fermer en cliquant dehors
window.onclick = (e) => {
  if (e.target === loginModal) loginModal.classList.remove('active');
  if (e.target === registerModal) registerModal.classList.remove('active');
};
