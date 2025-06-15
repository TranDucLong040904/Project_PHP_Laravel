// Hiện avt nếu đã đăng nhập
document.getElementById("openUI_userModal").onclick = function () {          // Hiển thị modal login khi nhấn nút LOGIN
    document.getElementById("UI_userModal").classList.add('show');
}

window.onclick = function (event) {              // Khi nhấn ra ngoài modal, đóng modal hiện tại
    if (event.target === document.getElementById("UI_userModal")) {
        document.getElementById("UI_userModal").classList.remove('show');
    }
}