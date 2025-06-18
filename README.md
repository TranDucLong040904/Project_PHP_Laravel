# 🎬 WebCinema - Website Đặt Vé Xem Phim

WebCinema là một hệ thống đặt vé xem phim trực tuyến, hỗ trợ người dùng tìm kiếm phim, đặt vé và quản lý suất chiếu. Dự án này được xây dựng với mục đích mô phỏng quy trình vận hành cơ bản của một rạp chiếu phim.


---
## 🚀 Tính Năng Chính
### 🔐 Admin
- Đăng kí - Đăng nhập
- Quản lý phim ( Thêm, sử, xóa, kích hoạt phim)
- Quản lý thể loại phim (Thêm, sửa, xóa thể loại phim)
- Quản lý lịch chiếu phim (Thêm, sửa, xóa lịch chiếu phim)
- Quản lý phòng chiếu phim (Thêm, sửa, xóa phòng chiếu phim)
- Quản lý đồ uống (Thêm, sửa, xóa đồ uống)
- Quản lý ghế ngồi (Sửa, thay đổi giá ghế)
- Quản lý phương thức thanh toán (Thêm, sửa, xóa phương thức thanh toán)
- Quản lý tài khoản User (Kích hoạt, khóa tài khoản người dùng)

### 👤 Người Dùng
- Đăng kí - Đăng nhập
- Xem thông tin phim đang chiếu, sắp chiếu
- Đặt vé
- Đổi mật khẩu  


---
## 🛠️ Công Nghệ Sử Dụng
- **Backend:** Laravel, PHP 8.x  
- **Frontend:** HTML/CSS, Bootstrap  
- **Cơ sở dữ liệu:** MySQL  
- **Khác:** Composer  


---
## ⚙️ Yêu Cầu Hệ Thống
- PHP >= 8.x 
- Composer  
- MySQL  
- XAMPP


---
## 🧩 Cài Đặt & Khởi Chạy

```bash
git clone https://github.com/TranDucLong040904/Project_PHP_Laravel.git
cd Project_PHP_Laravel
composer install

# Cấu hình thông tin database trong file .env
# Import file SQL nếu có, hoặc dùng migrate:

php artisan serve
```


---
## 🗃️ Sơ đồ khối
   ![image](https://github.com/user-attachments/assets/df8747f2-d454-473b-afcd-35e4fa816f7c)

   
---
## ⚙️Sơ đồ chức năng
### 🔐 Admin
  ![image](https://github.com/user-attachments/assets/44d19e96-6cd5-4c89-935c-c9282106288c)

### 👤 Người Dùng
  ![image](https://github.com/user-attachments/assets/152fe61a-502c-4cd4-bd5a-cefc9662386f)

### Guest 
  ![image](https://github.com/user-attachments/assets/d89621d8-3359-4229-8f2a-3b63ba3df540)


---
## 🧠Sơ đồ thuật toán
## Đăng kí
 ![image](https://github.com/user-attachments/assets/2afdad27-95c8-4830-b378-a0c8882c5df0)

## Đăng nhập
 ![image](https://github.com/user-attachments/assets/382f3fbb-4ac1-4d16-aa10-566cc0b791fc)

## Thêm dữ liệu
 ![image](https://github.com/user-attachments/assets/d2601c43-fb71-4f2f-b8f4-ddb9556fe528)

## Sửa dữ liệu
 ![image](https://github.com/user-attachments/assets/3520270d-005b-4342-9d77-bf01d006f021)

## Xóa dữ liệu
 ![image](https://github.com/user-attachments/assets/786b78d2-7375-4f70-95a5-66757091e359)

## Đặt vé
 ![image](https://github.com/user-attachments/assets/1fd7e709-9210-46c7-b4b1-8fac55638a89)


---
## 🔒 Bảo Mật
- Data Validation: kiểm tra xem dữ liệu người dùng nhập có hợp lệ không (email, số, không để trống,...)
  ![image](https://github.com/user-attachments/assets/848702d6-4e36-426a-aaa3-e4603270c31a)

- Authentication: Kiểm tra xem người dùng đã đăng nhập chưa
  ![image](https://github.com/user-attachments/assets/cfff8689-b67d-4cad-9af0-33f9804f1d53)

- Authorisation: Giới hạn quyền sử dụng theo vai trò (admin, users)
  ![image](https://github.com/user-attachments/assets/404c8c29-87b8-4e4d-b779-da6b335b7c19)


---
## 🖼️ Giao Diện Chức Năng
### 🔐 Admin
 - **Đăng nhập**
  ![image](https://github.com/user-attachments/assets/6f7322ae-85f8-4e69-8545-6e2e8b879887)

 - **Quản lý phim**  
  ![image](https://github.com/user-attachments/assets/bd8eba6e-e689-487e-82d8-63918c1a8c09)

 - **Quản lý thể loại phim**
  ![image](https://github.com/user-attachments/assets/6608ddc4-eb84-4253-b12a-850113f4bbec)

 - **Quản lý lịch chiếu**  
  ![image](https://github.com/user-attachments/assets/9101ace5-663e-429f-84b1-e0ba861523ad)

 - **Quản lý phòng chiếu**
  ![image](https://github.com/user-attachments/assets/96a1f827-d669-4b7f-a8e3-734b1f1de0cd)

 - **Quản lý đồ uống**
  ![image](https://github.com/user-attachments/assets/72f47f88-3516-41f4-8b33-8647c5cf4510)

 - **Danh sách & giá ghế ngồi**
  ![image](https://github.com/user-attachments/assets/fbca5a14-25eb-40a8-bcf4-0e2dc2ab12a8)

 - **Phương thức thanh toán**
  ![image](https://github.com/user-attachments/assets/b2b47b9c-7fa8-493f-8e31-4808e8ba2d16)

 - **Danh sách tài khoản user**
  ![image](https://github.com/user-attachments/assets/5c049302-eac9-4724-8660-51a72c44e880)


---
### 👤 Người Dùng

 - **Đăng nhập**  
  ![image](https://github.com/user-attachments/assets/b2698862-d83c-4686-a04f-7dbbdf946b4b)

 - **Trang chủ**  
  ![image](https://github.com/user-attachments/assets/7ce9b688-8e8f-4ab2-8407-891e6f8b16ac)

 - **Xem lịch chiếu**
  ![image](https://github.com/user-attachments/assets/2a9146ed-b8c7-4348-a42c-b6748e568272)

 - **Giá vé**
  ![image](https://github.com/user-attachments/assets/50d3ae01-625e-495a-9659-a487ce70b2f8)

 - **Tin tức**
  ![image](https://github.com/user-attachments/assets/312878d5-9e9f-43ca-a2bb-12f17b19957f)

 - **Đặt vé**
  ![image](https://github.com/user-attachments/assets/ed2593e1-e8d2-4ce0-aa58-9d6e946fff96)
  ![image](https://github.com/user-attachments/assets/6d8fdfbb-2e0c-4fc8-a140-a06da04f5725)

 - **Đổi mật khẩu**
  ![image](https://github.com/user-attachments/assets/931bf0fd-c22d-43ef-ab3e-f09900f0cabf)

  
---
## 🔗 Liên Kết
- 🔗 GitHub Page: https://github.com/TranDucLong040904
- 🔗 GitHub Project: https://github.com/TranDucLong040904/Project_PHP_Laravel_Test.git
- ▶️ YouTube Demo: https://www.youtube.com/@leo.tran.04

