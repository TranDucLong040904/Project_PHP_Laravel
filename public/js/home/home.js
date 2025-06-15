document.addEventListener("DOMContentLoaded", function () {
    // Xử lý slider
    const listImage = document.querySelector('.list-img');  
    const imgs = document.querySelectorAll('.list-img img');  
    const btnLeft = document.querySelector('.btn-left');  
    const btnRight = document.querySelector('.btn-right');  

    let currentIndex = 0;  
    const length = imgs.length;  
    const imgWidth = imgs[0]?.offsetWidth || 0;  

    function handleChangeSlide() {  
        currentIndex++;
        listImage.style.transition = 'transform 0.5s ease-in-out'; // Thêm hiệu ứng
        listImage.style.transform = `translateX(${-imgWidth * currentIndex}px)`;  

        if (currentIndex === length) { // Khi đến slide cuối
            setTimeout(() => {
                listImage.style.transition = 'none'; // Tắt hiệu ứng chuyển động
                currentIndex = 0; // Quay lại slide đầu
                listImage.style.transform = `translateX(0)`;  
            }, 500); // Delay để đồng bộ với thời gian hiệu ứng
        }
    }  

    let handleEventChangeSlide = setInterval(handleChangeSlide, 4000);  

    btnRight?.addEventListener('click', function () {  
        clearInterval(handleEventChangeSlide);  
        handleChangeSlide();  
        handleEventChangeSlide = setInterval(handleChangeSlide, 4000);  
    });  

    btnLeft?.addEventListener('click', function () {  
        clearInterval(handleEventChangeSlide);  
        if (currentIndex === 0) {
            listImage.style.transition = 'none'; // Tắt hiệu ứng để chuyển về slide cuối
            currentIndex = length - 1;  
            listImage.style.transform = `translateX(${-imgWidth * currentIndex}px)`;  
            setTimeout(() => {
                listImage.style.transition = 'transform 0.5s ease-in-out'; // Bật lại hiệu ứng
            }, 20);
        } else {
            currentIndex--;
            listImage.style.transform = `translateX(${-imgWidth * currentIndex}px)`;  
        }
        handleEventChangeSlide = setInterval(handleChangeSlide, 4000);  
    });

    // Hiển thị modal lớn khi bấm "Mua vé"
    const buttons = document.querySelectorAll('.buy_ticket');
    const modals = document.querySelectorAll('.modal');

    buttons.forEach(button => {
        button.addEventListener('click', function () {
            const movieId = button.getAttribute('data-id');
            const movieTitle = button.getAttribute('data-title');

            // Ẩn tất cả modal trước khi hiển thị modal mới
            modals.forEach(modal => modal.classList.remove('active'));

            // Hiển thị modal tương ứng
            const modalToShow = document.querySelector(`.modal[data-id="${movieId}"]`);
            if (modalToShow) {
                modalToShow.classList.add('active');
                modalToShow.querySelector('.schedule-name_movie h3').textContent = `LỊCH CHIẾU - ${movieTitle}`;
            }
        });
    });

    // Đóng modal lớn khi nhấn vào nút đóng
    document.querySelectorAll('.btn_close i').forEach(closeBtn => {
        closeBtn.addEventListener('click', function () {
            closeBtn.closest('.modal').classList.remove('active');
        });
    });

    // Tabs xử lý hiển thị theo ngày chiếu
    const tabs = document.querySelectorAll(".tab");
    const containers = document.querySelectorAll(".time-container");

    tabs.forEach(tab => {
        tab.addEventListener("click", function () {
            const date = tab.getAttribute("data-date");

            tabs.forEach(t => t.classList.remove("active"));
            containers.forEach(container => container.style.display = "none");

            tab.classList.add("active");
            const targetContainer = document.querySelector(`.time-container[data-date="${date}"]`);
            if (targetContainer) targetContainer.style.display = "block";
        });
    });

    if (containers[0]) containers[0].style.display = "block";
    if (tabs[0]) tabs[0].classList.add("active");

    // Xử lý sự kiện khi chọn giờ chiếu
    document.addEventListener('click', function (e) {
        const target = e.target.closest('.chair-time .time');
        if (target) {
            const selectedDate = target.getAttribute('data-date');
            const selectedTime = target.getAttribute('data-time');
            const showtimeUrl = target.getAttribute('data-url');
            const movieId = target.closest('.modal').getAttribute('data-id'); // Lấy ID phim từ modal lớn
    
            const modalSmall = document.querySelector(`.modal_small[data-id="${movieId}"]`);
            const selectedDateElement = modalSmall.querySelector('.selectedDate');
            const selectedTimeElement = modalSmall.querySelector('.selectedTime');
            const btnAgree = modalSmall.querySelector('.btn_agree');
    
            // Cập nhật thông tin modal nhỏ
            selectedDateElement.innerText = selectedDate;
            selectedTimeElement.innerText = selectedTime;
            const isLoggedIn = document.body.getAttribute('data-authenticated') === 'true';
            if (isLoggedIn && btnAgree) {
                btnAgree.href = showtimeUrl;
            }
    
            // Hiển thị modal nhỏ
            modalSmall.classList.add('active');
        }
    });

    // Đóng modal nhỏ
    document.querySelectorAll('.btn-close i').forEach(closeBtn => {
        closeBtn.addEventListener('click', function () {
            const modalSmall = closeBtn.closest('.modal_small');
            modalSmall.classList.remove('active');
        });
    });
});
