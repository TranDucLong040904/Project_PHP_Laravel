document.addEventListener("DOMContentLoaded", () => {
    const items = document.querySelectorAll(".list .item");
    const containers = document.querySelectorAll(".main_container > div");

    items.forEach((item, index) => {
        item.addEventListener("click", () => {
            // Xóa lớp 'active' của tất cả các container
            containers.forEach(container => {
                container.classList.remove("active");
            });

            // Thêm lớp 'active' vào container tương ứng với item được click
            containers[index].classList.add("active");
        });
    });
});



var items = document.querySelectorAll('.top_container .item')
var commingSoon = document.querySelector('.comming-soon')
var isShowing = document.querySelector('.is-showing')
var Special = document.querySelector('.special')

items.forEach(item => {
    commingSoon.addEventListener('click', function() {
        commingSoon.classList.add('active')
        isShowing.classList.remove('active')
        Special.classList.remove('active')
    })

    isShowing.addEventListener('click', function() {
        commingSoon.classList.remove('active')
        isShowing.classList.add('active')
        Special.classList.remove('active')
    })

    // Special.addEventListener('click', function() {
    //     commingSoon.classList.remove('active')
    //     isShowing.classList.remove('active')
    //     Special.classList.add('active')
    // })
})