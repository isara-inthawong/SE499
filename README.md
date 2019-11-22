# SE499
Software Engineering Project by Laravel.

# Software Engineering Project
  - เว็บแอพพลิเคชันสำหรับบริหารกิจกรรมสโมสรนักศึกษาคณะวิทยาศาสตร์ (Activity Management For Student Science Club)
  - ....


### Installation & Setting
- ติดตั้ง composer

### สร้างฐานข้อมูล
 - Databases name = se499_db
 - Collation = utf8mb4_unicode_ci

สร้าง & แก้ไขไฟล์ .env

```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=se499_db
DB_USERNAME=root
DB_PASSWORD=
```

Install the dependencies and devDependencies and start the server.

```sh
$ cd /ที่อยู่โฟลเดอร์ SE499
$ composer update
$ php artisan key:generate
```

เข้าเว็บผ่าน

```sh
127.0.0.1:8000
```
