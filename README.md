<center><img src="public/assets/images/logo-sm.png"></center>
## Guide

-   Install git, code editor, postgresql, dan composer
-   Masuk ke pgadmin lalu buat database bernama db_monev_pajak
-   Lakukan perintah "git clone https://github.com/fajarmagsyar/monev-pajak.git"
-   Lakukan perintah "cd monev-pajak"
-   Lakukan update dependecies dengan perintah "composer update"
-   Setelah semua dependency terupdate, lakukan migrasi database dengan perintah "php artisan migrate:fresh --seed"
-   Setelah migrasi dilakukan semua table dalam database yang dibuat akan muncul
-   Start server laravel dengan perintah "php artisan serve"
