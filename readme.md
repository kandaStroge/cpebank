# Laravel
1. After ``git clone`` run XAMPP **shell** 
2. goto directory by ``cd YOUR_DIR``
3. install depadency by ``composer install`` wait a minute
 
## Create Database
1. goto **PHPMYADMIN** create databese with ``utf8_general_ci``
2. set ``.env`` if hasn't change ``.env.example`` and edit it
3. goto commandline agin run ``php artisan migrate:fresh --seed``
4. OK

## Run server
``php artisan serve``

## Make Controller
``php artisan make:controller AdminIndexController``  
> please use SnakeCase [ตัวแรกพิมพ์ใหญ่ตัวต่อไปพิมพ์เล็ก คำต่อไปพิมพ์ใหญ่ และ ปิดด้วย **Controller** ]