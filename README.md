# Aplikasi Travel build with PHP and Framework CodeIgniter by [https://github.com/jeriko13](https://jeriko13.w3spaces.com/)#

tools ini dibangun atas 5 komponen utama yaitu : <br>
1. framework codeigniter 3<br>
2. Library DataTables<br>
3. ION auth library<br>
4. template AdminLTE<br>
5. menu management<br><br>


<br>

# Aplikasi ini terdiri dari 
Struktur aplikasi pada CodeIgniter untuk aplikasi travel cenderung sama dengan struktur aplikasi pada CodeIgniter secara umum. Namun, ada beberapa bagian yang mungkin perlu ditambahkan atau diubah sesuai dengan kebutuhan aplikasi travel tersebut.

Application: Merupakan folder utama yang berisi semua kode sumber aplikasi. Terdapat beberapa subfolder di dalamnya, seperti:
Controllers: Berisi semua file controller yang digunakan untuk mengatur alur aplikasi dan mengatur interaksi antara model dan view.
Models: Berisi semua file model yang digunakan untuk mengakses dan mengelola data.
Views: Berisi semua file view yang digunakan untuk menampilkan data ke pengguna.
Libraries: Berisi semua file library yang digunakan untuk menambahkan fitur tambahan pada aplikasi.
Helper: Berisi semua file helper yang digunakan untuk membantu proses pemrograman.
Config: Berisi semua file konfigurasi yang digunakan untuk mengatur pengaturan aplikasi.
Language: Berisi semua file bahasa yang digunakan untuk mengubah tampilan aplikasi sesuai dengan bahasa yang dipilih.
System: Merupakan folder yang berisi semua kode sumber yang digunakan oleh CodeIgniter untuk menjalankan aplikasi. Anda tidak perlu mengubah isi folder ini kecuali jika Anda ingin mengubah kode sumber CodeIgniter itu sendiri.

Public: Merupakan folder yang berisi semua file yang dapat diakses oleh pengguna, seperti gambar, CSS, dan JavaScript.

Assets : Merupakan folder yang berisi semua file yang dapat diakses oleh pengguna, seperti gambar, CSS, dan JavaScript.

.htaccess : File ini digunakan untuk mengatur pengaturan web server dan dapat digunakan untuk mengatur redirect atau mengatur hak akses pada aplikasi.

index.php : Merupakan file utama yang digunakan untuk menjalankan aplikasi. File ini digunakan untuk mengatur pengaturan dan menyediakan akses ke kode sumber aplikasi.

Database : Merupakan file yang digunakan untuk mengkonfigurasi database aplikasi.

Ion_Auth : Merupakan library yang digunakan untuk mengatur autentikasi dan otorisasi pada aplikasi.


# DataTables
Datatables adalah sebuah plugin JavaScript yang digunakan untuk menampilkan data dalam bentuk tabel yang interaktif dan dapat dikonfigurasi dengan berbagai fitur seperti pagination, sorting, dan searching. Dalam aplikasi travel, Datatables dapat digunakan untuk menampilkan data pemesanan, kendaraan, transaksi, dan user. 

Struktur data yang digunakan oleh DataTables adalah sebagai berikut:

Thead (Table Head) : Bagian ini berisi kolom-kolom dari tabel yang akan ditampilkan.
Tbody (Table Body) : Bagian ini berisi data yang akan ditampilkan dalam tabel.
Tfoot (Table Foot) : Bagian ini digunakan untuk menambahkan elemen tambahan seperti tombol aksi pada tabel.
DataTables juga menyediakan fitur-fitur seperti pencarian, pengurutan, pagination, dan lain-lain yang memudahkan dalam mengelola dan menampilkan data dalam tabel.

# Cara Install
1. Masuk ke phpmyadmin, buat database dengan nama travel<br>
2. Copy paste isi travel.sql ke dalam database travel<br>
3. Setting database password di application/config/database.php<br>
4. Setting base_uri di application/config/config.php<br><br>

# User Login
Jika anda mengalami masalah login, gunakan email dan password default
> email: admin@admin.com
>
> password "123456"

# ujikom-travel
