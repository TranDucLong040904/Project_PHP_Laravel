document.addEventListener("DOMContentLoaded", function () {
    const seats = document.querySelectorAll(".screen-item_chair");
    const seatListDisplay = document.querySelector(".ghe_text.seat-list");
    const quantityDisplay = document.querySelector(".quantity");
    const totalPriceDisplay = document.querySelector(".price");

    // Form và input hidden để gửi dữ liệu
    const seatForm = document.getElementById("seatForm");
    const selectedSeatsInput = document.getElementById("selectedSeatsInput");
    const selectedSeatPricesInput = document.getElementById("selectedSeatPricesInput"); // Input để gửi giá tiền
    const submitButton = seatForm.querySelector("button[type='submit']");

    seats.forEach((seat) => {
        seat.addEventListener("click", function () {
            // Thêm/xóa lớp "selected" cho ghế được chọn
            seat.classList.toggle("selected");

            // Cập nhật danh sách ghế đã chọn và các thông tin liên quan
            updateSelectedSeats();
        });
    });

    function updateSelectedSeats() {
        const selectedSeats = document.querySelectorAll(".screen-item_chair.selected");
    
        // 1. Lấy danh sách tên ghế đã chọn
        const seatNames = Array.from(selectedSeats).map((seat) => seat.querySelector("h5").textContent);
        seatListDisplay.innerHTML = seatNames.join(", ");
    
        // 2. Lấy giá tiền từng ghế và tính tổng
        const seatPrices = Array.from(selectedSeats).map((seat) =>
            parseFloat(seat.querySelector("h5").getAttribute("data-price"))
        );
    
        const totalPrice = seatPrices.reduce((total, price) => total + price, 0);
    
        // 3. Cập nhật số lượng ghế
        const quantity = selectedSeats.length;
        if (quantity > 0) {
            quantityDisplay.textContent = `Số lượng ghế: ${quantity}`;
        } else {
            quantityDisplay.textContent = "";
        }
    
        // 4. Cập nhật tổng tiền
        totalPriceDisplay.textContent = `${totalPrice.toLocaleString()} VNĐ`;
    
        // 5. Cập nhật input hidden với danh sách ghế
        selectedSeatsInput.value = JSON.stringify(seatNames); // Danh sách tên ghế
        selectedSeatPricesInput.value = JSON.stringify(seatPrices); // Danh sách giá từng ghế
    }

    submitButton.addEventListener("click", function (event) {
        const selectedSeats = document.querySelectorAll(".screen-item_chair.selected");
        if (selectedSeats.length === 0) {
            event.preventDefault(); // Ngăn form được gửi đi nếu không có ghế nào
            alert("Vui lòng chọn ghế trước khi tiếp tục."); // Hiển thị alert
        }
    });
});
