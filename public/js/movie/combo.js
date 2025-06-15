document.addEventListener("DOMContentLoaded", function () {
    var totalAmountInput = document.getElementById('totalAmount');
    console.log(totalAmountInput);
    var totalPrice = parseInt(totalAmountInput?.value) || 0;
    console.log(totalPrice);
    var totalDisplay = document.querySelectorAll('.price');
    var btnPlusList = document.querySelectorAll('.increase');
    var btnSubList = document.querySelectorAll('.decrease');
    var selectedFoods = new Map();

    function updateTotalDisplay() {
        totalDisplay.forEach(function (display) {
            display.textContent = totalPrice > 0 ? totalPrice.toLocaleString() + ' VNĐ' : '0 VNĐ';
        });
    }

    function updateSelectedFoodsDisplay() {
        var selectedFoodsDisplay = document.querySelector('.selected-foods');
        let foodsText = '';
        selectedFoods.forEach((data, name) => {
            if (data.quantity > 0) {
                foodsText += `${name} x ${data.quantity}, `;
            }
        });
        selectedFoodsDisplay.textContent = foodsText ? foodsText.slice(0, -2) : 'Không có';
        if (totalPrice === 0) {
            selectedFoodsDisplay.textContent = 'Không có';
        }
    }

    function updateQuantity(quantityElement, value, price, foodName, foodId, maxQuantity = null) {
        let currentQuantity = parseInt(quantityElement.textContent);
        let newQuantity = currentQuantity + value;

        // Kiểm tra số lượng không vượt quá giới hạn
        if (maxQuantity !== null && newQuantity > maxQuantity) {
            alert(`Số lượng tối đa của ${foodName} là ${maxQuantity}. Bạn không thể chọn thêm!`);
            return;
        }

        // Không cho giảm dưới 0
        if (newQuantity < 0) {
            newQuantity = 0;
        }
        
        // Cập nhật tổng tiền chỉ khi giá trị thay đổi
        if (currentQuantity !== newQuantity) {
            totalPrice += price * (newQuantity - currentQuantity);
        }
        

        // Cập nhật giao diện số lượng và tổng tiền
        quantityElement.textContent = newQuantity;
        if (newQuantity === 0) {
            selectedFoods.delete(foodName);
        } else {
            selectedFoods.set(foodName, { quantity: newQuantity, price: price });
        }

        console.log(`Giá trị totalPrice hiện tại: ${totalPrice}`);

        updateTotalDisplay();
        updateSelectedFoodsDisplay();
        sendFoodToSession(foodId, newQuantity, price);
    }

    function sendFoodToSession(foodId, quantity, price) {
        const foodsInput = document.getElementById('foods');
        let currentFoods = JSON.parse(foodsInput.value || '{}');
        currentFoods[foodId] = { quantity, price };
        if (quantity === 0) {
            delete currentFoods[foodId];
        }
        foodsInput.value = JSON.stringify(currentFoods);

        fetch('/update-combo-session', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ foodId, quantity, price, totalPrice })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                console.log('Combo đã được cập nhật trong session.');
            } else {
                console.error('Lỗi khi lưu vào session:', data.message);
            }
        })
        .catch(error => {
            console.error('Lỗi khi gửi dữ liệu:', error);
        });
    }

    btnPlusList.forEach((btnPlus) => {
        
        btnPlus.addEventListener('click', function () {
            let price = parseInt(btnPlus.getAttribute('data-price'));
            let maxQuantity = parseInt(btnPlus.getAttribute('data-quantity')); // Lấy số lượng tối đa từ database
            let quantityElement = btnPlus.closest('.combo_list').querySelector('.quantity p');
            let foodName = btnPlus.closest('.combo_list').querySelector('.combo_item h3').textContent;
            let foodId = btnPlus.closest('.combo_list').querySelector('input[type="hidden"]').value;
            updateQuantity(quantityElement, 1, price, foodName, foodId, maxQuantity);
        });
    });

    btnSubList.forEach((btnSub) => {
        let price = parseInt(btnSub.getAttribute('data-price'));
        let foodName = btnSub.closest('.combo_list').querySelector('.combo_item h3').textContent;
        let quantityElement = btnSub.closest('.combo_list').querySelector('.quantity p');
        let foodId = btnSub.closest('.combo_list').querySelector('input[type="hidden"]').value;

        btnSub.addEventListener('click', function () {
            updateQuantity(quantityElement, -1, price, foodName, foodId);
        });
    });

    // Hiển thị mặc định khi trang được tải
    updateTotalDisplay();
    updateSelectedFoodsDisplay();
});
