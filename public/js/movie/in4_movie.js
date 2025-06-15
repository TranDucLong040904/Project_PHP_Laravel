document.addEventListener("DOMContentLoaded", function() {
    const tabs = document.querySelectorAll(".tab");
    const containers = document.querySelectorAll(".time-container");

    tabs.forEach(tab => {
        tab.addEventListener("click", function() {
            const date = this.getAttribute("data-date");

            // Xóa lớp "active" từ tất cả các tab
            tabs.forEach(t => t.classList.remove("active"));

            // Thêm lớp "active" vào tab hiện tại
            this.classList.add("active");

            // Ẩn tất cả các container giờ chiếu
            containers.forEach(container => {
                container.style.display = "none";
            });

            // Hiển thị container có data-date tương ứng với tab
            document.querySelector(`.time-container[data-date="${date}"]`).style.display = "block";
        });
    });

    // Mặc định hiển thị giờ của ngày đầu tiên và đặt tab đầu tiên là active
    if (containers[0]) containers[0].style.display = "block";
    if (tabs[0]) tabs[0].classList.add("active");
});


var btnTime = document.querySelectorAll('.chair-time .time');
var close = document.querySelector('.btn-close i');
var modal = document.querySelector('.modal_small');
var selectedDateElement = document.getElementById('selectedDate');
var selectedTimeElement = document.getElementById('selectedTime');
var btnAgree = document.getElementById('btnAgree');

// Sự kiện khi chọn giờ chiếu
btnTime.forEach(btn => {
    btn.addEventListener('click', function() {
        var selectedDate = this.getAttribute('data-date');
        var selectedTime = this.getAttribute('data-time');
        var showtimeUrl = this.getAttribute('data-url');

        // Cập nhật nội dung modal với ngày và giờ đã chọn
        selectedDateElement.innerText = selectedDate;
        selectedTimeElement.innerText = selectedTime;

        // Gán URL cho nút "Đồng ý"
        const isLoggedIn = document.body.getAttribute('data-authenticated') === 'true';
        if (isLoggedIn && btnAgree) {
            btnAgree.href = showtimeUrl;
        }

        // Hiển thị modal
        modal.classList.add('active');
    });
});

// Xử lý sự kiện đóng modal
close.addEventListener('click', function() {
    modal.classList.remove('active');
})







