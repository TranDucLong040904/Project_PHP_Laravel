function showForm(form) {
    // Lấy các phần tử form
    const loginForm = document.getElementById('login-form');
    const registerForm = document.getElementById('register-form');

    // Lấy các tab
    const loginTab = document.getElementById('login-tab');
    const registerTab = document.getElementById('register-tab');

    if (form === 'login') {
        loginForm.style.display = 'block';
        registerForm.style.display = 'none';
        loginTab.classList.add('active');
        registerTab.classList.remove('active');
    } else {
        loginForm.style.display = 'none';
        registerForm.style.display = 'block';
        loginTab.classList.remove('active');
        registerTab.classList.add('active');
    }
}