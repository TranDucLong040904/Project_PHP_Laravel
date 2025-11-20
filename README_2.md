# 🎬 WebCinema - Hệ Thống Đặt Vé Xem Phim Trực Tuyến


![alt text](image-1.png)


**WebCinema** là một nền tảng đặt vé xem phim trực tuyến được xây dựng nhằm hiện đại hóa quy trình vận hành rạp chiếu phim, giúp người dùng dễ dàng tìm kiếm phim, đặt vé, chọn chỗ ngồi và thanh toán trực tuyến một cách nhanh chóng.

---


## 🛠️ Công Nghệ Sử Dụng

Dự án được phát triển dựa trên kiến trúc MVC và các công nghệ hiện đại:

* **Backend:** ![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=flat-square&logo=laravel&logoColor=white) ![PHP](https://img.shields.io/badge/PHP-777BB4?style=flat-square&logo=php&logoColor=white)
* **Frontend:** ![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=flat-square&logo=html5&logoColor=white) ![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=flat-square&logo=css3&logoColor=white) ![Bootstrap](https://img.shields.io/badge/Bootstrap-563D7C?style=flat-square&logo=bootstrap&logoColor=white)
* **Database:** ![MySQL](https://img.shields.io/badge/MySQL-005C84?style=flat-square&logo=mysql&logoColor=white)
* **Tools:** ![Composer](https://img.shields.io/badge/Composer-885630?style=flat-square&logo=composer&logoColor=white) ![XAMPP](https://img.shields.io/badge/XAMPP-FB7A24?style=flat-square&logo=xampp&logoColor=white)

---

## 🚀 Tính Năng Chính

### 🔐 Dành Cho Admin (Quản Trị Viên)
* **Quản lý phim:** Thêm, sửa, xóa, kích hoạt/ẩn phim.
* **Quản lý lịch chiếu:** Sắp xếp suất chiếu, phòng chiếu.
* **Quản lý tài nguyên rạp:** Quản lý phòng chiếu, loại ghế, giá ghế.
* **Quản lý dịch vụ:** Thêm/sửa/xóa đồ uống (bắp, nước).
* **Hệ thống:** Quản lý phương thức thanh toán, tài khoản người dùng.
* **Thống kê:** Xem báo cáo doanh thu.

### 👤 Dành Cho Người Dùng (Khách Hàng)
* **Tài khoản:** Đăng ký, Đăng nhập, Đổi mật khẩu.
* **Tra cứu:** Xem danh sách phim đang chiếu, sắp chiếu, chi tiết phim.
* **Đặt vé:** Chọn suất chiếu, chọn ghế ngồi trực quan (Real-time).
* **Thanh toán:** Tích hợp demo thanh toán.
* **Lịch sử:** Xem lại lịch sử đặt vé.

---

## ⚙️ Cài Đặt & Khởi Chạy

Yêu cầu môi trường: `PHP >= 8.x`, `MySQL`, `Composer`.

```bash
# 1. Clone repository về máy
git clone https://github.com/TranDucLong040904/Project_PHP_Laravel.git
# 2. Di chuyển vào thư mục dự án
cd Project_PHP_Laravel

# 3. Cài đặt các gói phụ thuộc
composer install

# 4. Cấu hình môi trường (Copy .env.example thành .env và chỉnh sửa DB)
cp .env.example .env

# 5. Tạo key và chạy migration
php artisan key:generate
php artisan migrate

# 6. Khởi chạy server
php artisan serve

```
## 📐 Kiến Trúc & Thiết Kế Hệ Thống

<details>
<summary><b>1. Sơ đồ khối tổng quan (Click để xem)</b></summary>
<br>

![image](https://github.com/user-attachments/assets/df8747f2-d454-473b-afcd-35e4fa816f7c)
</details>

<details>
<summary><b>2. Phân rã chức năng - Use Case (Click để xem)</b></summary>
<br>

**Admin:**
![image](https://github.com/user-attachments/assets/44d19e96-6cd5-4c89-935c-c9282106288c)

**User (Thành viên):**
![image](https://github.com/user-attachments/assets/152fe61a-502c-4cd4-bd5a-cefc9662386f)

**Guest (Khách vãng lai):**
![image](https://github.com/user-attachments/assets/d89621d8-3359-4229-8f2a-3b63ba3df540)
</details>

<details>
<summary><b>3. Luồng thuật toán - Flowcharts (Click để xem)</b></summary>
<br>

| Đăng ký | Đăng nhập |
| :---: | :---: |
| ![image](https://github.com/user-attachments/assets/2afdad27-95c8-4830-b378-a0c8882c5df0) | ![image](https://github.com/user-attachments/assets/382f3fbb-4ac1-4d16-aa10-566cc0b791fc) |

</details>

<details>
<summary><b>4. Cơ chế Bảo mật (Click để xem)</b></summary>
<br>

* **Data Validation:** Kiểm tra dữ liệu đầu vào.
    ![image](https://github.com/user-attachments/assets/848702d6-4e36-426a-aaa3-e4603270c31a)

* **Authentication & Authorization:** Xác thực và Phân quyền.
    ![image](https://github.com/user-attachments/assets/cfff8689-b67d-4cad-9af0-33f9804f1d53)
    ![image](https://github.com/user-attachments/assets/404c8c29-87b8-4e4d-b779-da6b335b7c19)
</details>


## 🖼️ Demo Giao Diện

<details>
<summary>🔐 <b>Giao diện Admin (Quản Trị) - Bấm để xem</b></summary>

<br>

**1. Đăng nhập Admin**
![image](https://github.com/user-attachments/assets/6f7322ae-85f8-4e69-8545-6e2e8b879887)

**2. Quản lý Phim & Thể loại**
![image](https://github.com/user-attachments/assets/bd8eba6e-e689-487e-82d8-63918c1a8c09)
![image](https://github.com/user-attachments/assets/6608ddc4-eb84-4253-b12a-850113f4bbec)

**3. Quản lý Lịch chiếu & Phòng chiếu**
![image](https://github.com/user-attachments/assets/9101ace5-663e-429f-84b1-e0ba861523ad)
![image](https://github.com/user-attachments/assets/96a1f827-d669-4b7f-a8e3-734b1f1de0cd)

**4. Quản lý Dịch vụ & Tài nguyên khác**
(Đồ uống, Ghế, Phương thức thanh toán, Tài khoản User)
![image](https://github.com/user-attachments/assets/72f47f88-3516-41f4-8b33-8647c5cf4510)
![image](https://github.com/user-attachments/assets/fbca5a14-25eb-40a8-bcf4-0e2dc2ab12a8)
![image](https://github.com/user-attachments/assets/b2b47b9c-7fa8-493f-8e31-4808e8ba2d16)
![image](https://github.com/user-attachments/assets/5c049302-eac9-4724-8660-51a72c44e880)

</details>

<details>
<summary>👤 <b>Giao diện Người dùng (User Client) - Bấm để xem</b></summary>

<br>

**1. Trang chủ & Đăng nhập**
![image](https://github.com/user-attachments/assets/7ce9b688-8e8f-4ab2-8407-891e6f8b16ac)
![image](https://github.com/user-attachments/assets/b2698862-d83c-4686-a04f-7dbbdf946b4b)

**2. Xem lịch chiếu & Giá vé**
![image](https://github.com/user-attachments/assets/2a9146ed-b8c7-4348-a42c-b6748e568272)
![image](https://github.com/user-attachments/assets/50d3ae01-625e-495a-9659-a487ce70b2f8)

**3. Tin tức khuyến mãi**
![image](https://github.com/user-attachments/assets/312878d5-9e9f-43ca-a2bb-12f17b19957f)

**4. Quy trình Đặt vé & Chọn ghế**
![image](https://github.com/user-attachments/assets/ed2593e1-e8d2-4ce0-aa58-9d6e946fff96)
![image](https://github.com/user-attachments/assets/6d8fdfbb-2e0c-4fc8-a140-a06da04f5725)

**5. Đổi mật khẩu**
![image](https://github.com/user-attachments/assets/931bf0fd-c22d-43ef-ab3e-f09900f0cabf)

</details>

---

## 🔗 Liên Kết Tham Khảo

* **GitHub Profile:** [TranDucLong040904](https://github.com/TranDucLong040904)
* **GitHub Project:** [Project_PHP_Laravel](https://github.com/TranDucLong040904/Project_PHP_Laravel_Test.git)
* **Demo Video:** [YouTube Channel](https://www.youtube.com/@leo.tran.04)

---
<div align="center">
  Copyright © 2025 WebCinema Team - Phenikaa University
</div>