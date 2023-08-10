Technical Test Result
by Puteri Aulia Fahlia

github : https://github.com/PuteriAulia/transportationLoan.git
Version
    - php : 8.1
    - framework : laravel 10.10
    - database: mySQL

Panduan penggunaan aplikasi:
1. Membuat database pada database lokal dengan nama “transportation.loan”
2. Melakukan migrasi database (ketik “php artisan migrate”)
3. Menjalankan seeder data dengan urutan 
    - DepartementSeeder
    - PositionSeeder
    - CompanyLocSeeder
    - EmployeeSeeder
    - TransportationSeeder
    - UserSeeder
4. Menjalankan aplikasi dengan ketik “php artisan serve”

Penjelasan aplikasi
1. Aplikasi merupakan aplikasi peminjaman kendaraan perusahaan. Proses peminjaman akan melalui tahap input oleh admin yang merupakan kepala departemen umum, lalu menunggu konfirmasi dari kepala departemen peminjam dan kepala cabang/kepala pusat.
2. Berikut beberapa fitur yang dimiliki aplikasi
    - Login & logout
    - CRUD data peminjaman kendaraan
    - CRUD service kendaraan
    - CRUD pengusuan bahan bakar 
3 Proses peminjaman kendaraan (proses input dan konfirmasi)
4. Export data peminjaman kendaraan ke dalam bentuk excel sesuai dengan rentang tanggal yang diinputkan
Pada halam dashboard terdapat total pengeluaran biaya service dan pembelian BBM, jumlah kendaraan serta grafik jumlah penggunaan kendaraan pada setiap bulannya
Data kendaraan, data karyawan, riwayat service, riwayat pembelian BBM dan riwayat peminjaman kendaraan yang ditampilkan sesuai dengan lokasi (position) pengguna yang melakukan login. 
Semisaml yang melakukan login adalah Joko sebagai kepala departemen umum yang berada di kantor cabang, maka data yang ditampilkan adalah aktivitas yang ada di kantor cabang
Yang bisa melakukan penambahan data pinjaman kendaraan hanyalah kepala departemen umum (dalam data dummy aplikasi adalah Joko)

Daftar akun
1. Admin (kepala departemen umum)
email : joko@gmail.com
password : kepaladepartemenumum123
2. Kepala cabang
email : gunawan@gmail.com
password : kepalacabang123
3. Kepala departemen pemasaran
email : annisa@gmail.com
password: kepaladepartemenpemasaran123
Note: data akun lebih lengkap, dapat dilihat pada file UserSeeder

Langkah menggunakan fitur pemesanan kendaraan sesuai data dummy:
1. Silakhan login sebagai kepala departemen umum (joko) 
2. Melakukan input pemesanan barang dengan memilih gunawan selaku penyetuju1 dan annisa selaku kepala departemen pemasaran 
3. Lakukan login pada akun gunawan dan annisa untuk melakukan konfirmasi
Note: status konfirmasi pada halaman riwayat peminjaman akan berubah jika data telah di konfirmasi oleh kedua penyetuju.
Jika sedang login sebagai admin (joko) maka anda dapat melakukan konfirmasi pengembalian kedaraan hingga status ketersediaan kedaraan dapat berubah.
