# 🎬 WebCinema - Hệ Thống Đặt Vé Xem Phim Trực Tuyến

![Banner](image.png)

<div align="center">

<div align="center">

![Repo Size](https://img.shields.io/github/repo-size/TranDucLong040904/Project_PHP_Laravel?style=flat-square&label=Size&color=orange)
![Last Commit](https://img.shields.io/github/last-commit/TranDucLong040904/Project_PHP_Laravel?style=flat-square&label=Last%20Commit&color=blue)
![Commit Activity](https://img.shields.io/github/commit-activity/y/TranDucLong040904/Project_PHP_Laravel?style=flat-square&label=Commits/Year&color=red)
![Stars](https://img.shields.io/github/stars/TranDucLong040904/Project_PHP_Laravel?style=flat-square&color=yellow)
[![Ask Me Anything !](https://img.shields.io/badge/Ask%20me-anything-1abc9c.svg?style=flat-square)](https://github.com/TranDucLong040904)

</div>

</div>

---

## 📖 Giới Thiệu

**WebCinema** là một nền tảng đặt vé xem phim trực tuyến được xây dựng nhằm hiện đại hóa quy trình vận hành rạp chiếu phim. Dự án mô phỏng quy trình thực tế từ việc tìm kiếm phim, xem trailer, chọn suất chiếu, chọn ghế ngồi thời gian thực (Real-time) đến thanh toán hóa đơn.

## 👨‍💻 Về Tác Giả

Dự án được phát triển và duy trì bởi:

| Avatar | Thông tin | Liên hệ |
| :---: | :--- | :--- |
| <img src="public\images\github.png" width="80" height="80" style="border-radius:50%; object-fit:cover;"/> | **Trần Đức Long** | [![GitHub](https://img.shields.io/badge/GitHub-100000?style=flat-square&logo=github&logoColor=white)](https://github.com/TranDucLong040904)<br>[![Email](https://img.shields.io/badge/Email-D14836?style=flat-square&logo=gmail&logoColor=white)](mailto:22010139@st.phenikaa-uni.edu.vn) |

---

## 📑 Mục Lục

- [Giới thiệu](#-giới-thiệu)
- [Về Tác Giả](#-về-tác-giả)
- [Công Nghệ Sử Dụng](#-công-nghệ-sử-dụng)
- [Tính Năng Chính](#-tính-năng-chính)
- [Cài Đặt & Khởi Chạy](#-cài-đặt--khởi-chạy)
- [Cấu Trúc Thư Mục](#-cấu-trúc-thư-mục)
- [Kiến Trúc Hệ Thống](#-kiến-trúc--thiết-kế-hệ-thống)
- [Demo Giao Diện](#-demo-giao-diện)

---

## 🛠️ Công Nghệ Sử Dụng

Dự án được phát triển dựa trên kiến trúc **MVC** và các công nghệ hiện đại:

| Phần | Công nghệ |
| :--- | :--- |
| **Backend** | ![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=flat-square&logo=laravel&logoColor=white) ![PHP](https://img.shields.io/badge/PHP-777BB4?style=flat-square&logo=php&logoColor=white) |
| **Frontend** | ![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=flat-square&logo=html5&logoColor=white) ![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=flat-square&logo=css3&logoColor=white) ![Bootstrap](https://img.shields.io/badge/Bootstrap-563D7C?style=flat-square&logo=bootstrap&logoColor=white) |
| **Database** | ![MySQL](https://img.shields.io/badge/MySQL-005C84?style=flat-square&logo=mysql&logoColor=white) |
| **Tools** | ![Composer](https://img.shields.io/badge/Composer-885630?style=flat-square&logo=composer&logoColor=white) ![XAMPP](https://img.shields.io/badge/XAMPP-FB7A24?style=flat-square&logo=xampp&logoColor=white) ![Git](https://img.shields.io/badge/Git-F05032?style=flat-square&logo=git&logoColor=white) |

---

## 🚀 Tính Năng Chính

### 🔐 Dành Cho Admin (Quản Trị Viên)
* ✅ **Quản lý phim:** Thêm, sửa, xóa, kích hoạt/ẩn phim.
* ✅ **Quản lý lịch chiếu:** Sắp xếp suất chiếu, phòng chiếu logic.
* ✅ **Quản lý tài nguyên:** Phòng chiếu, loại ghế (VIP/Thường), giá vé.
* ✅ **Quản lý dịch vụ:** Combo bắp nước, đồ uống.
* ✅ **Hệ thống:** Quản lý phương thức thanh toán, tài khoản người dùng.
* 📊 **Thống kê:** Báo cáo doanh thu trực quan.

### 👤 Dành Cho Người Dùng (Khách Hàng)
* ✅ **Tài khoản:** Đăng ký, Đăng nhập, Bảo mật, Đổi mật khẩu.
* ✅ **Tra cứu:** Tìm kiếm phim, xem trailer, nội dung, suất chiếu.
* ✅ **Đặt vé:** Chọn ghế ngồi trực quan (sơ đồ ghế), chọn Combo.
* ✅ **Thanh toán:** Tích hợp demo thanh toán online.
* ✅ **Lịch sử:** Xem lại vé đã đặt.

---

## ⚙️ Cài Đặt & Khởi Chạy

Đảm bảo máy bạn đã cài: `PHP >= 8.x`, `MySQL`, `Composer`.

```bash
# 1. Clone repository
git clone [https://github.com/TranDucLong040904/Project_PHP_Laravel.git](https://github.com/TranDucLong040904/Project_PHP_Laravel.git)

# 2. Di chuyển vào thư mục
cd Project_PHP_Laravel

# 3. Cài đặt thư viện
composer install

# 4. Cấu hình môi trường
cp .env.example .env
# (Lưu ý: Mở file .env và chỉnh sửa DB_DATABASE, DB_USERNAME, DB_PASSWORD)

# 5. Tạo key & Migration
php artisan key:generate
php artisan migrate

# 6. Chạy server
php artisan serve
```

---

## 📂 Cấu Trúc Thư Mục
Một cái nhìn tổng quan về cấu trúc mã nguồn của dự án:
```Plaintext
WebCinema/
├── app/
│   ├── Http/Controllers/   # Xử lý logic (Admin, User, Auth)
│   ├── Models/             # Các model tương tác CSDL (Phim, Ve, Ghe...)
│   └── ...
├── database/
│   ├── migrations/         # Khởi tạo cấu trúc bảng
│   └── seeders/            # Dữ liệu mẫu
├── public/
│   ├── images/             # Hình ảnh poster, banner
│   └── css/                # Custom Styles
├── resources/
│   └── views/              # Giao diện (Blade templates)
│       ├── admin/          # Giao diện quản trị
│       └── user/           # Giao diện khách hàng
├── routes/
    └── web.php             # Định tuyến đường dẫn

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

## 📜 License (Bản Quyền)

Đây là dự án cá nhân được chia sẻ với mục đích chính là **học tập và tham khảo**.

* ✅ **Được phép:** Xem mã nguồn, clone về máy để nghiên cứu, học hỏi kiến thức.
* ❌ **Không được phép:** Sử dụng mã nguồn này cho mục đích thương mại, buôn bán hoặc kiếm lợi nhuận dưới mọi hình thức khi chưa có sự đồng ý của tác giả.

Hiện tại dự án chưa có file LICENSE chính thức. Mọi quyền sở hữu trí tuệ thuộc về tác giả.

---

## 🔗 Liên Kết Tham Khảo

* **GitHub Profile:** [TranDucLong040904](https://github.com/TranDucLong040904)
* **GitHub Project:** [Project_PHP_Laravel](https://github.com/TranDucLong040904/Project_PHP_Laravel_Test.git)
* **Demo Video:** [YouTube Channel](https://www.youtube.com/@leo.tran.04)

---
<div align="center">
  
  **⭐ Nếu thấy dự án hữu ích, hãy để lại 1 Star nhé! ⭐**
  
  Copyright © 2025 Tran Duc Long
</div>