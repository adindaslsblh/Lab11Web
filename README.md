**Daftar Praktikum:**

* [Lihat Praktikum 1](#praktikum-1-php-framework-code-igniter)
* [Lihat Praktikum 2](#praktikum-2-framework-lanjutan-crud)
* [Lihat Praktikum 3](#praktikum-3-view-layout-dan-view-cell)
* [Lihat Praktikum 4](#praktikum-4-framework-lanjutan-modul-login)
* [Lihat Praktikum 5](#praktikum-5-pagination-dan-pencarian)
* [Lihat Praktikum 6](#praktikum-6-upload-file-gambar)
* [Lihat Praktikum 7](#praktikum-7-relasi-tabel-dan-query-builder)


# Praktikum 1: PHP Framework (code Igniter)
## Tujuan
1. Mahasiswa mampu memahami konsep dasar Framework.
2. Mahasiswa mampu memahami konsep dasar MVC.
3. Mahasaswa mampu membuat program sederhana menggunakan Framework Codeigniter4

## Instruksi Praktikum
1. Persiapkan text editor misalnya VSCode.
2. Buat folder baru dengan nama lab11_php_ci pada docroot webserver (htdocs)
3. Ikuti langkah-langkah praktikum yang akan dijelaskan berikutnya.

## Langkah-langkah Praktikum
### Persiapan
Sebelum memulai menggunakan Framework Codeigniter, perlu dilakukan konfigurasi pada webserver. Beberapa ekstensi PHP perlu diaktifkan untuk kebutuhan pengembangan Codeigniter 4.

Berikut beberapa ekstensi yang perlu diaktifkan:
* php-json ekstension untuk bekerja dengan JSON;
* php-mysqlnd native driver untuk MySQL;
* php-xml ekstension untuk bekerja dengan XML;
* php-intl ekstensi untuk membuat aplikasi multibahasa;
* libcurl (opsional), jika ingin pakai Curl.

Untuk mengaktifkan ekstentsi tersebut, melalu **XAMPP Control Panel**, pada bagian Apache klik **Config** -> **PHP.ini**.

![alt text](<screenshots/p1/p1-1.PNG>)

Pada bagian extention, hilangkan tanda ; (titik koma) pada ekstensi yang akan diaktifkan. Kemudian simpan kembali filenya dan restart Apache web server.

![alt text](<screenshots/p1/p1-2.PNG>)

### Instalasi Codeigniter 4
Untuk melakukan instalasi Codeigniter 4 dapat dilakukan dengan dua cara, yaitu cara manual dan menggunakan composer. Pada praktikum ini kita menggunakan cara manual.

Unduh Codeigniter dari website https://codeigniter.com/download
* Extrak file zip Codeigniter ke direktori htdocs/lab11_php_ci.
* Ubah nama direktory framework-4.x.xx menjadi ci4.
* Buka browser dengan alamat http://localhost/lab11_php_ci/ci4/public/

![alt text](<screenshots/p1/p1-3.PNG>)

### Menjalankan CLI (Command Line Interface)
Codeigniter 4 menyediakan CLI untuk mempermudah proses development. Untuk mengakses CLI buka terminal/command prompt. 


![alt text](<screenshots/p1/p1-4.PNG>)


Arahkan lokasi direktori sesuai dengan direktori kerja project dibuat (xampp/**htdocs/lab11_php_ci/ci4**/) 

Perintah yang dapat dijalankan untuk memanggil CLI Codeigniter adalah:

```bash
php spark
```
![alt text](<screenshots/p1/p1-5.PNG>)

Kemudian untuk menjalankan webserver dari CI adalah:

```bash
php spark serve
```
![alt text](<screenshots/p1/p1-6.PNG>)

Web server berjalan di http://localhost:8080 dan kalau dibuka di browser hasilnya akan seperti berikut:

![alt text](<screenshots/p1/p1-7.PNG>)

### Mengaktifkan Mode Debugging
Codeigniter 4 menyediakan fitur **debugging** untuk memudahkan developer untuk mengetahui pesan error apabila terjadi kesalahan dalam membuat kode program.

Sekarang mari kita membuat kodenya error. Salah satunya dengan cara mengubah kode pada file `app/Controller/Home.php` hilangkan titik koma pada akhir kode.

![alt text](<screenshots/p1/p1-8.PNG>)
Lalu jalankan buka kembali webnya.

Secara default fitur ini belum aktif. Ketika terjadi error pada aplikasi akan ditampilkan pesan kesalahan seperti berikut.

![alt text](<screenshots/p1/p1-9.PNG>)


Semua jenis error akan ditampilkan sama. Untuk memudahkan mengetahui jenis errornya, maka perlu diaktifkan mode debugging dengan mengubah nilai konfigurasi pada environment variable **CI_ENVIRINMENT** menjadi **development**.

Ubah nama file env menjadi .env kemudian buka file tersebut dan ubah nilai variable **CI_ENVIRINMENT** dari **production** menjadi **development**. Kemudian jangan lupa hapus tanda **#** (pagar) agar dapat mengaktifkan fitur ini.


| Sebelum  | sesudah |
| ------------- | ------------- |
| ![alt text](<screenshots/p1/p1-10.PNG>)  | ![alt text](<screenshots/p1/p1-11.PNG>)  |


Kemudian coba jalankan kembali. Hasilnya akan berbeda. Kali ini menampilkan log error jika memasuki mode **development**.
![alt text](<screenshots/p1/p1-12.PNG>)

Sebelum melanjutkan ke tahap selanjutnya. Perbaiki kembali kode error sebelumnya yang sudah dihapus titik koma pada akhir kode.

![alt text](<screenshots/p1/p1-13.PNG>)

### Struktur Direktori
Untuk lebih memahami Framework Codeigniter 4 perlu mengetahui struktur direktori dan file yang ada. Buka pada Windows Explorer atau dari Visual Studio Code -> Open Folder.
Terdapat beberapa direktori dan file yang perlu dipahami fungsi dan kegunaannya.
* **.github** folder ini kita butuhkan untuk konfigurasi repo github, seperti konfigurasi untuk build dengan github action;
* **app** folder ini akan berisi kode dari aplikasi yang kita kembangkan;
* **public** folder ini berisi file yang bisa diakses oleh publik, seperti file index.php, robots.txt, favicon.ico, ads.txt, dll;
* **tests** folder ini berisi kode untuk melakukan testing dengna PHPunit;
* **vendor** folder ini berisi library yang dibutuhkan oleh aplikasi, isinya juga termasuk kode core dari system CI.
* **writable** folder ini berisi file yang ditulis oleh aplikasi. Nantinya, kita bisa pakai untuk menyimpan file yang di-upload, logs, session, dll.Sedangkan file-file yang berada pada root direktori CI sebagai berikut.
* **.env** adalah file yang berisi variabel environment yang dibutuhkan oleh aplikasi.
* **.gitignore** adalah file yang berisi daftar nama file dan folder yang akan diabaikan oleh Git.
* **build** adalah script untuk mengubah versi codeigniter yang digunakan. Ada versi release (stabil) dan development (labil).
* **composer.json** adalah file JSON yang berisi informasi tentang proyek dan daftar library yang dibutuhkannya. File ini digunakan oleh Composer sebagai acuan.
* **composer.lock** adalah file yang berisi informasi versi dari libraray yang digunakan aplikasi.
* **license.txt** adalah file yang berisi penjelasan tentang lisensi Codeigniter;
* **phpunit.xml.dist** adalah file XML yang berisi konfigurasi untuk PHPunit.
* **README.md** adalah file keterangan tentang codebase CI. Ini biasanya akan dibutuhkan pada repo github atau gitlab.
* **spark** adalah program atau script yang berfungsi untuk menjalankan server, generate kode, dll.

Fokus kita pada folder **app**, dimana folder tersebut adalah area kerja kita untuk membuat aplikasi. Dan folder **public** untuk menyimpan aset web seperti css, gambar, javascript, dll.

### Memahami Konsep MVC
Codeigniter menggunakan konsep MVC. MVC meripakan singkatan dari *Model-ViewController*. MVC merupakan konsep arsitektur yang umum digunakan dalam pengembangan aplikasi. Konsep MVC adalah memisahkan kode program berdasarkan logic proses, data, dan tampilan. Untuk logic proses diletakkan pada direktori Contoller, Objek data diletakkan pada direktori Model, dan desain tampilan diletakkan pada direktori View.


Codeigniter menggunakan konsep pemrograman berorientasi objek dalam mengimplementasikan konsep MVC.


**Model** merupakan kode program yang berisi pemodelan data. Data dapat berupa database ataupun sumber lainnya.
**View** merupakan kode program yang berisi bagian yang menangani terkait tampilan user interface sebuah aplikasi. didalam aplikasi web biasanya pasti akan berhubungan dengan html dan css.
**Controller** merupakaan kode program yang berkaitan dengan logic proses yang menghubungkan antara view dan model. Controller berfungsi untuk menerima request dan data dari user kemudian diproses dengan menghubungkan bagian model dan view.
**Routing dan Controller**
Routing merupakan proses yang mengatur arah atau rute dari request untuk menentukan fungsi/bagian mana yang akan memproses request tersebut. Pada framework CI4, routing bertujuan untuk menentukan Controller mana yang harus merespon sebuah request. Controller adalah class atau script yang bertanggung jawab merespon sebuah request.

Pada Codeigniter, request yang diterima oleh file index.php akan diarahkan ke Router untuk meudian oleh router tesebut diarahkan ke Controller.
Router terletak pada file `app/config/Routes.php`.

Pada file tersebut kita dapat mendefinisikan route untuk aplikasi yang kita buat.
Contoh:
```php
$routes->get('/', 'Home::index');
```
Kode tersebut akan mengarahkan rute untuk halaman home. 
**Membuat Route Baru**.
Tambahkan kode berikut di dalam Routes.php
```php
$routes->get('/about','Page::about');
$routes->get('/contact', 'Page::contact');
$routes->get('/faqs', 'Page::faqs');
```
Untuk mengetahui route yang ditambahkan sudah benar, buka CLI dan jalankan perintah berikut.
```bash
php spark routes
```

![alt text](<screenshots/p1/p1-14.PNG>)

Selanjutnya coba akses route yang telah dibuat dengan mengakses alamat url http://localhost:8080/about

![alt text](<screenshots/p1/p1-15.PNG>)

Ketika diakses akan mucul tampilan error 404 file not found, itu artinya file/page tersebut tidak ada. Untuk dapat mengakses halaman tersebut, harus dibuat terlebih dahulu Contoller yang sesuai dengan routing yang dibuat yaitu Contoller Page.

### Membuat Controller
Selanjutnya adalah membuat Controller Page. Buat file baru dengan nama **Page.php** pada direktori Controller kemudian isi kodenya seperti berikut.

```php
<?php

namespace App\Controllers;

class Page extends BaseController {
    public function about() {
        echo "Ini halaman About";
    }
    public function contact() {
        echo "Ini halaman Contact";
    }
    public function faqs() {
        echo "Ini halaman FAQ";
    }
    public function tos() {
        echo "ini halaman Term of Services";
    }
}
```

Selanjutnya refresh Kembali browser, maka akan ditampilkan hasilnya yaotu halaman sudah dapat diakses.

![alt text](<screenshots/p1/p1-16.PNG>)

**Auto Routing**
Secara default fitur autoroute pada Codeiginiter sudah aktif. Untuk mengubah status autoroute dapat mengubah nilai variabelnya. Untuk menonaktifkan ubah nilai true menjadi false.

```php
$routes->setAutoRoute(true);
```

Tambahkan method baru pada Controller Page seperti berikut
```php
public function tos(){
    echo "ini halaman Term of Services";
}
```
Method ini belum ada pada routing, sehingga cara mengaksesnya dengan menggunakan alamat: http://localhost:8080/page/tos


![alt text](<screenshots/p1/p1-17.PNG>)

### Membuat View
Selanjutnya adalam membuat view untuk tampilan web agar lebih menarik. Buat file baru dengan nama about.php pada direktori view (`app/view/about.php`) kemudian isi kodenya seperti berikut.


```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
</head>
<body>
    <h1><?= $title; ?></h1>
    <hr>
    <p><?= $content; ?></p>
</body>
</html>
```
Ubah **method about** pada class **Controller Page** menjadi seperti berikut:
```php
public function about() {
        return view('about', [
            'title' => 'Halaman Abot',
            'content' => 'Ini adalah halaman abaut yang menjelaskan tentang isi 
            halaman ini.'
        ]);
    }
```

![alt text](<screenshots/p1/p1-18.PNG>)

### Membuat Layout Web dengan CSS
Pada dasarnya layout web dengan css dapat diimplamentasikan dengan mudah pada codeigniter. Yang perlu diketahui adalah, pada Codeigniter 4 file yang menyimpan asset css dan javascript terletak pada direktori **public**.

Buat file css pada direktori **public** dengan nama **style.css** (copy file dari praktikum **lab4_layout**). Kita akan gunakan layout yang pernah dibuat pada praktikum 4.


![alt text](<screenshots/p1/p1-A.PNG>)


Kemudian buat folder template pada direktori `View` kemudian buat file **header.php** dan **footer.php**.

File `app/view/template/header.php`

```php
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
<link rel="stylesheet" href="<?= base_url('style.css') ?>">
</head>
<body>
    <div id="container">
        <header>
            <h1>Portal Berita</h1>
        </header>
        <nav>
            <a href="<?= base_url('/');?>" class="active">Home</a>
            <a href="<?= base_url('/artikel');?>">Artikel</a>
            <a href="<?= base_url('/about');?>">About</a>
            <a href="<?= base_url('/contact');?>">Kontak</a>
        </nav>
        <section id="wrapper">
            <section id="main">
```
File `app/view/template/footer.php`

```php
            </section>
                <aside id="sidebar">
                    <div class="widget-box">
                    <h3 class="title">Widget Header</h3>
                    <ul>
                        <li><a href="#">Widget Link</a></li>
                        <li><a href="#">Widget Link</a></li>
                    </ul>
                    </div>
                    <div class="widget-box">
                        <h3 class="title">Widget Text</h3>
                        <p>Vestibulum lorem elit, iaculis in nisl volutpat, 
                        malesuada tincidunt arcu. Proin in leo fringilla, vestibulum mi porta, 
                        faucibus felis. Integer pharetra est nunc, nec pretium nunc pretium ac.</p>
                    </div>
                </aside>
            </section>
        </section>
        <footer>
            <p>&copy; 2021 - Universitas Pelita Bangsa</p>
        </footer>
    </div>
</body>
</html>
```

Kemudian ubah file `app/view/about.php` seperti berikut.
```php
<?= $this->include('template/header'); ?>

<h1><?= $title; ?></h1>

<hr>
<p><?= $content; ?></p>
<?= $this->include('template/footer'); ?>
```

Selanjutnya refresh tampilan pada alamat http://localhost:8080/about


![alt text](<screenshots/p1/p1-19.PNG>)

### Pertanyaan dan Tugas
Lengkapi kode program untuk menu lainnya yang ada pada Controller Page, sehingga semua
link pada navigasi header dapat menampilkan tampilan dengan layout yang sama.

**Membuat halaman Home**
Buat file **home.php** di `app/Views`.
```php
<?= $this->include('template/header'); ?>

<h1><?= $title; ?></h1>

<hr>
<p><?= $content; ?></p>
<?= $this->include('template/footer'); ?>
```
Kemudian ubah file Home.php pada `app/Controller/`.
```php
<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('Home', [
            'title' => 'Halaman Home',
            'content' => 'Ini adalah halaman home yang merupakan halaman utama'
        ]);
    }
}
```
Simpan dan jalankan kembali.



---
# Praktikum 2: Framework Lanjutan (CRUD)
## Tujuan
1. Mahasiswa mampu memahami konsep dasar Framework.
2. Mahasiswa mampu memahami konsep dasar MVC.
3. Mahasaswa mampu membuat program sederhana menggunakan Framework Codeigniter4.

## Instruksi Praktikum

1. Persiapkan text editor misalnya VSCode.
2. Buat folder baru dengan nama lab11_php_ci pada docroot webserver (htdocs)
3. Ikuti langkah-langkah praktikum yang akan dijelaskan berikutnya.

## Langkah-langkah Praktikum
### Persiapan.
Untuk memulai membuat aplikasi CRUD sederhana, yang perlu disiapkan adalah database server menggunakan MySQL. Pastikan MySQL Server sudah dapat dijalankan melalui XAMPP. 
### Membuat Database: Studi Kasus Data Artikel



| Field  | Tipe Data | Ukuran | Keterangan |
| ------ | --------- | ------ | ---------- |
| id     | INT       |  11    | PRIMARY KEY, auto_increment |
| judul | VARCHAR | 200 | |
| isi | TEXT | 200 | | |
| gambar | TINYINT| 1 | DEFAULT | 0
| slug | VARCHAR | 200 |  |



**Membuat Database**
```sql
CREATE DATABASE lab_ci4;
```
**Menggunakan Database**
```sql
USE lab_ci4;
```
**Membuat Tabel**
```sql
CREATE TABLE artikel (
    id INT(11) auto_increment,
    judul VARCHAR(200) NOT NULL,
    isi TEXT,
    gambar VARCHAR(200),
    status TINYINT(1) DEFAULT 0,
    slug VARCHAR(200),
    PRIMARY KEY(id)
);
```


### Konfigurasi koneksi database
Selanjutnya membuat konfigurasi untuk menghubungkan dengan database server. Konfigurasi dapat dilakukan dengan du acara, yaitu pada file `app/config/database.php` atau menggunakan file **.env**. Pada praktikum ini kita gunakan konfigurasi pada file **.env**. 

![alt text](<screenshots/p2/p2-1.PNG>)

### Membuat Model
Selanjutnya adalah membuat Model untuk memproses data Artikel. Buat file baru pada direktori `app/Models` dengan nama **ArtikelModel.php**.

```php
<?php

namespace App\Models;

use CodeIgniter\Model;
class ArtikelModel extends Model {
    protected $table = 'artikel';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['judul', 'isi', 'status', 'slug', 
    'gambar'];
}
```

### Membuat Controller
Buat Controller baru dengan nama **Artikel.php** pada direktori `app/Controllers`. 
```php
<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
class Artikel extends BaseController {
    public function index(){
        $title = 'Daftar Artikel';
        $model = new ArtikelModel();
        $artikel = $model->findAll();
        return view('artikel/index', compact('artikel', 'title'));
    }   
}
```
### Membuat View
Buat direktori baru dengan nama **artikel** pada direktori `app/views`, kemudian buat file baru dengan nama **index.php**. 
```php
<?= $this->include('template/header'); ?>

<?php if($artikel): foreach($artikel as $row): ?>

<article class="entry">
<h2><a href="<?= base_url('/artikel/' . $row['slug']);?>"><?=
$row['judul']; ?></a>
</h2>

<p><?= substr($row['isi'], 0, 200); ?></p>
</article>
<hr class="divider" />
<?php endforeach; else: ?>
<article class="entry">
<h2>Belum ada data.</h2>
</article>
<?php endif; ?>
<?= $this->include('template/footer'); ?>
```
Selanjutnya buka browser kembali, dengan mengakses url http://localhost:8080/artikel


![alt text](<screenshots/p2/p2-2.PNG>)

Belum ada data yang diampilkan. Kemudian coba tambahkan beberapa data pada database agar dapat ditampilkan datanya.
```sql
INSERT INTO artikel (judul, isi, slug) VALUE
('Artikel pertama', 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah
menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak
yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk
menjadi sebuah buku contoh huruf.', 'artikel-pertama'),
('Artikel kedua', 'Tidak seperti anggapan banyak orang, Lorem Ipsum
bukanlah teks-teks yang diacak. Ia berakar dari sebuah naskah sastra latin
klasik dari era 45 sebelum masehi, hingga bisa dipastikan usianya telah
mencapai lebih dari 2000 tahun.', 'artikel-kedua');
```

Refresh kembali browser, sehingga akan ditampilkan hasilnya.

![alt text](<screenshots/p2/p2-3.PNG>)

### Membuat Tampilan Detail Artikel
Tampilan pada saat judul berita di klik maka akan diarahkan ke halaman yang berbeda. Tambahkan fungsi baru pada **Controller Artikel** dengan nama **view()**.

```php
public function view($slug) {
    $model = new ArtikelModel();
    $artikel = $model->where([
        'slug' => $slug
        ])->first();
    if (!$artikel){
        throw PageNotFoundException::forPageNotFound();
    }
    $title = $artikel['judul'];
    return view('artikel/detail', compact('artikel', 'title'));
}
```


### Membuat View Detail
Buat view baru untuk halaman detail dengan nama `app/views/artikel/detail.php`.
```php
<?= $this->include('template/header'); ?>
<article class="entry">
    <h2><?= $artikel['judul']; ?></h2>
    <p><?= $artikel['isi']; ?></p>
</article>
<?= $this->include('template/footer'); ?>
```


### Membuat Routing untuk artikel detail
Buka Kembali file `app/config/Routes.php`, kemudian tambahkan routing untuk artikel detail.

```php
$routes->get('/artikel/(:any)', 'Artikel::view/$1');
```
![alt text](<screenshots/p2/p2-4.PNG>)

### Membuat Menu Admin
Menu admin adalah untuk proses CRUD data artikel. Buat method baru pada **Controller Artikel** dengan nama **admin_index()**. 

```php
public function admin_index() {
    $title = 'Daftar Artikel';
    $model = new ArtikelModel();
    $artikel = $model->findAll();
    return view('artikel/admin_index', compact('artikel', 'title'));
}
```
Selanjutnya buat view untuk tampilan admin dengan nama **admin_index.php**.
```php

<?= $this->include('template/admin_header'); ?>
<table class="styled-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Status</th>
            <th>AKsi</th>
        </tr>
    </thead>
    <tbody>
        <?php if($artikel): foreach($artikel as $row): ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td>
            <b><?= $row['judul']; ?></b>
            <p><small><?= substr($row['isi'], 0, 50); ?></small></p>
            </td>
            <td><?= $row['status']; ?></td>
            <td>
            <a class="btn edit" href="<?= base_url('/admin/artikel/edit/' .
            $row['id']);?>">Ubah</a>
            <a class="btn delete" onclick="return confirm('Yakin
            menghapus data?');" href="<?= base_url('/admin/artikel/delete/' .
            $row['id']);?>">Hapus</a>
            </td>
        </tr>
        <?php endforeach; else: ?>
        <tr>
            <td colspan="4">Belum ada data.</td>
        </tr>
        <?php endif; ?>
    </tbody>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Status</th>
            <th>AKsi</th>
        </tr>
    </tfoot>
</table>
<?= $this->include('template/admin_footer'); ?>

```

Buat juga **admin_header.php** dan **admin_footer.php** pada `app/Views/template`

**admin_header.php**
```php
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="<?= base_url('style.css') ?>">
</head>
<body>
    <div id="container">
        <header>
            <h1>Admin Portal Berita</h1>
        </header>
        <nav>
            <a href="<?= base_url('/');?>" class="active">Home</a>
            <a href="<?= base_url('/artikel');?>">Artikel</a>
            <a href="<?= base_url('/about');?>">About</a>
            <a href="<?= base_url('/contact');?>">Kontak</a>
        </nav>
        <section id="wrapper">
    <section id="main">

```
**admin_footer.php**
```php
            </section>
                <aside id="sidebar">
                    <div class="widget-box">
                        <h3 class="title">Widget Header</h3>
                        <ul>
                            <li><a href="#">Widget Link</a></li>
                            <li><a href="#">Widget Link</a></li>
                        </ul>
                    </div>
                    <div class="widget-box">
                        <h3 class="title">Widget Text</h3>
                        <p>Vestibulum lorem elit, iaculis in nisl volutpat, 
                        malesuada tincidunt arcu. Proin in leo fringilla, vestibulum mi porta, 
                        faucibus felis. Integer pharetra est nunc, nec pretium nunc pretium ac.</p>
                    </div>
                </aside>
            </section>
            <footer>
                <p>&copy; 2021 - Universitas Pelita Bangsa</p>
            </footer>
        </div>
    </body>
</html>
```

Tambahkan routing untuk menu admin seperti berikut:
```php
$routes->group('admin', function($routes) {
    $routes->get('artikel', 'Artikel::admin_index');
    $routes->add('artikel/add', 'Artikel::add');
    $routes->add('artikel/edit/(:any)', 'Artikel::edit/$1');
    $routes->get('artikel/delete/(:any)', 'Artikel::delete/$1');
});
```

![alt text](<screenshots/p2/p2-5.PNG>)

### Menambah Data Artikel
Tambahkan fungsi/method baru pada **Controller Artikel** dengan nama **add()**.

```php
public function add() {
    $validation = \Config\Services::validation();
    $validation->setRules(['judul' => 'required']);
    $isDataValid = $validation->withRequest($this->request)->run();
    if ($isDataValid) {
        $artikel = new ArtikelModel();
        $artikel->insert([
            'judul' => $this->request->getPost('judul'),
            'isi' => $this->request->getPost('isi'),
            'slug' => url_title($this->request->getPost('judul')),
        ]);
        return redirect('admin/artikel');
    }
    $title = "Tambah Artikel";
    return view('artikel/form_add', compact('title'));
}
```
Kemudian buat view untuk form tambah dengan nama **form_add.php**

```php
<?= $this->include('template/admin_header'); ?>
    <h2><?= $title; ?></h2>
    <form action="" method="post">
        <p><input type="text" name="judul"></p>
        <p><textarea name="isi" cols="50" rows="10"></textarea></p>
        <p><input type="submit" value="Kirim" class="btn btn-large"></p>
    </form>
<?= $this->include('template/admin_footer'); ?>
```
![alt text](<screenshots/p2/p2-6.PNG>)

### Mengubah Data
Tambahkan fungsi/method baru pada **Controller Artikel** dengan nama **edit()**.
```php
public function edit($id) {
    $artikel = new ArtikelModel();
    $validation = \Config\Services::validation();
    $validation->setRules(['judul' => 'required']);
    $isDataValid = $validation->withRequest($this->request)->run();
    if ($isDataValid) {
        $artikel->update($id, [
            'judul' => $this->request->getPost('judul'),
            'isi' => $this->request->getPost('isi'),
        ]);
        return redirect('admin/artikel');
    }
    $data = $artikel->where('id', $id)->first();
    $title = "Edit Artikel";
    return view('artikel/form_edit', compact('title', 'data'));
}
```
Kemudian buat view untuk form tambah dengan nama **form_edit.php** di `app/Views/artikel`.

```php
<?= $this->include('template/admin_header'); ?>
<h2><?= $title; ?></h2>
<form action="" method="post">
    <p><input type="text" name="judul" value="<?= $data['judul'];?>" ></p>
    <p><textarea name="isi" cols="50" rows="10"><?= $data['isi'];?></textarea></p>
    <p><input type="submit" value="Kirim" class="btn btn-large"></p>
</form>
<?= $this->include('template/admin_footer'); ?>
```

![alt text](<screenshots/p2/p2-7.PNG>)

### Menghapus Data
Tambahkan fungsi/method baru pada **Controller Artikel** dengan nama **delete()**.


```php
public function delete($id)
    {
    $artikel = new ArtikelModel();
    $artikel->delete($id);
    return redirect('admin/artikel');
}
```
---

# Praktikum 3: View Layout dan View Cell
## Tujuan
Setelah menyelesaikan praktikum ini, mahasiswa diharapkan dapat:
1. Memahami konsep View Layout di CodeIgniter 4.
2. Menggunakan View Layout untuk membuat template tampilan.
3. Memahami dan mengimplementasikan View Cell dalam CodeIgniter 4.
4. Menggunakan View Cell untuk memanggil komponen UI secara modular.
## Instruksi Praktikum
1. Persiapkan text editor misalnya VSCode.
2. Buka kembali folder dengan nama lab7_php_ci pada docroot webserver (htdocs)
3. Ikuti langkah-langkah praktikum yang akan dijelaskan berikutnya.
## Langkah-langkah Praktikum
### Persiapan.
Pada praktikum sebelumnya kita telah menggunakan template layout dengan konsep parsial atau memecah bagian template menjadi beberapa bagian untuk kemudian di include pada view yang lain.

Praktikum kali ini kita akan mengunakan konsep View Layout dan View Cell untukmemudahkan dalam penggunaan layout.

### Membuat Layout Utama
Buat folder **layout** di dalam `app/Views/`
Buat file **main.php** di dalam folder layout dengan kode berikut:


```php
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title><?= $title ?? 'My Website' ?></title>
        <link rel="stylesheet" href="<?= base_url('/style.css');?>">
    </head>
    <body>
        <div id="container">
            <header>
                <h1>Layout Sederhana</h1>
            </header>
            <nav>
                <a href="<?= base_url('/');?>" class="active">Home</a>
                <a href="<?= base_url('/artikel');?>">Artikel</a>
                <a href="<?= base_url('/about');?>">About</a>
                <a href="<?= base_url('/contact');?>">Kontak</a>
            </nav>
            <section id="wrapper">
                <section id="main">

                    <?= $this->renderSection('content') ?>
                </section>
                <aside id="sidebar">
                    <?= view_cell('App\\Cells\\ArtikelTerkini::render') ?>
                    <div class="widget-box">
                        <h3 class="title">Widget Header</h3>
                        <ul>
                            <li><a href="#">Widget Link</a></li>
                            <li><a href="#">Widget Link</a></li>
                        </ul>
                    </div>
                    <div class="widget-box">
                        <h3 class="title">Widget Text</h3>
                        <p>Vestibulum lorem elit, iaculis in nisl volutpat,
                        malesuada tincidunt arcu. Proin in leo fringilla,
                        vestibulum mi porta,
                        faucibus felis. Integer pharetra est nunc, nec pretium
                        nunc pretium ac.</p>
                    </div>
                </aside>
            </section>
            <footer>
            <p>&copy; 2021 - Universitas Pelita Bangsa</p>
            </footer>
        </div>
    </body>
</html>
```
### Modifikasi File View
Ubah `app/Views/home.php` agar sesuai dengan layout baru:
```php
<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<h1><?= $title; ?></h1>
<hr>
<p><?= $content; ?></p>
<?= $this->endSection() ?>
```

Sesuaikan juga untuk halaman lainnya yang ingin menggunakan format layout yang baru.

### Menampilkan Data Dinamis dengan View Cell
View Cell adalah fitur yang memungkinkan pemanggilan tampilan dalam bentuk komponen yang dapat digunakan ulang. Cocok digunakan untuk elemen-elemen yang sering muncul di berbagai halaman seperti **sidebar**, **widget**, atau **menu navigasi**.
### Menambahkan Kolom Baru pada Tabel
Kode berikut adalah penambahan kolom **created_at** pada tabel **Artikel**:
```sql
ALTER TABLE `artikel` ADD `created_at` TIMESTAMP NOT NULL AFTER `slug`;
```

### Membuat Class View Cell
Buat folder **Cells** di dalam `app/`
Buat file **ArtikelTerkini.php** di dalam `app/Cells/` dengan kode berikut:

```php
<?php

namespace App\Cells;

use App\Models\ArtikelModel;

class ArtikelTerkini
{
    public function render()
    {
        $model = new ArtikelModel();
        $artikel = $model->orderBy('created_at', 'DESC')->limit(5)->findAll();

        return view('components/artikel_terkini', ['artikel' => $artikel]);
    }
}
```
### Membuat View untuk View Cell
Buat folder **components** di dalam `app/Views/`
Buat file **artikel_terkini.php** di dalam `app/Views/components/` dengan kode berikut:
```php
<div style="margin: 10px; padding: 5px;">
    <h3>Artikel Terkini</h3>
    <ul style="margin: 5px; 10px;">
        <?php foreach ($artikel as $row): ?>
        <li><a href="<?= base_url('/artikel/' . $row['slug'])?>"> <?= $row['judul'] ?> </a></li>
        <?php endforeach; ?>
    </ul>
</div>
```
### Pertanyaan dan Tugas
* Sesuaikan data dengan praktikum sebelumnya, perlu melakukan perubahan field pada database dengan menambahkan tanggal agar dapat mengambil data artikel terbaru.
* Selesaikan programnya sesuai Langkah-langkah yang ada. Anda boleh melakukan improvisasi.
* Apa manfaat utama dari penggunaan View Layout dalam pengembangan aplikasi?
* Jelaskan perbedaan antara View Cell dan View biasa.
* Ubah View Cell agar hanya menampilkan post dengan kategori tertentu.

1. View Layout memberikan struktur tampilan yang konsisten dan terpusat, sehingga:
* Tidak perlu mengulangi kode HTML (header, nav, footer) di setiap halaman.
* Perubahan pada layout bisa langsung berlaku ke semua halaman.
2. Jelaskan perbedaan antara View Cell dan View biasa.

| View Biasa  | View Cell |
| ----------- | --------- | 
| Menampilkan halaman secara penuh. | Menampilkan komponen kecil (seperti widget). |
| Dipanggil dari Controller. | Dipanggil langsung dari dalam View (view_cell). |
| Tidak modular. | Modular dan dapat digunakan ulang di banyak tempat. |

3. Ubah **View Cell** agar hanya menampilkan post dengan **kategori** tertentu.
Ubah **render()** di **ArtikelTerkini.php**:

```php
public function render($kategori = null)
{
    $model = new ArtikelModel();
    $query = $model->orderBy('created_at', 'DESC')->limit(5);

    if ($kategori !== null) {
        $query->where('kategori', $kategori);
    }

    $artikel = $query->findAll();
    return view('components/artikel_terkini', ['artikel' => $artikel]);
}
```
Kemudian di main.php dipanggil dengan:
```php
<?= view_cell('App\\Cells\\ArtikelTerkini::render', ['kategori' => 'teknologi']) ?>
```

---

# Praktikum 4: Framework Lanjutan (Modul Login)
## Tujuan
1. Mahasiswa mampu memahami konsep dasar Auth dan Filter.
2. Mahasiswa mampu memahami konsep dasar Login System.
3. Mahasaswa mampu membuat modul login menggunakan Framework Codeigniter 4.
## Instruksi Praktikum
1. Persiapkan text editor misalnya VSCode.
2. Buka kembali folder dengan nama lab7_php_ci pada docroot webserver (htdocs)
3. Ikuti langkah-langkah praktikum yang akan dijelaskan berikutnya.
## Langkah-langkah Praktikum
### Persiapan.
Untuk memulai membuat modul Login, yang perlu disiapkan adalah database server menggunakan MySQL. Pastikan MySQL Server sudah dapat dijalankan melalui XAMPP.

### Membuat Tabel: User Login


| Field  | Tipe Data | Ukuran | Keterangan |
| ------ | --------- | ------ | ---------- |
| id     | INT       |  11    | PRIMARY KEY, auto_increment |
| username | VARCHAR | 200 | |
| useremail | VARCHAR | 200 | | |
| userpassword | VARCHAR| 200 | | 

**Membuat Tabel User**
```sql
CREATE TABLE user (
 id INT(11) auto_increment,
 username VARCHAR(200) NOT NULL,
 useremail VARCHAR(200),
 userpassword VARCHAR(200),
 PRIMARY KEY(id)
);
```

### Membuat Model User
Selanjutnya adalah membuat Model untuk memproses data Login. Buat file baru pada direktori `app/Models` dengan nama **UserModel.php**

```php
<?php
namespace App\Models;
use CodeIgniter\Model;
class UserModel extends Model {
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['username', 'useremail', 'userpassword'];
}
```
### Membuat Controller User
Buat Controller baru dengan nama **User.php** pada direktori `app/Controllers`. Kemudian tambahkan method **index()** untuk menampilkan daftar user, dan method **login()** untuk proses login.
```php
<?php
namespace App\Controllers;
use App\Models\UserModel;
class User extends BaseController {

    public function index() {
        $title = 'Daftar User';
        $model = new UserModel();
        $users = $model->findAll();
        return view('user/index', compact('users', 'title'));
    }
    
    public function login(){
        helper(['form']);
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        if (!$email) {
            return view('user/login');
        }
        $session = session();
        $model = new UserModel();
        $login = $model->where('useremail', $email)->first();
        if ($login){
            $pass = $login['userpassword'];
            if (password_verify($password, $pass)){
                $login_data = [
                    'user_id' => $login['id'],
                    'user_name' => $login['username'],
                    'user_email' => $login['useremail'],
                    'logged_in' => TRUE,
                ];
                $session->set($login_data);
                return redirect('admin/artikel');
            }
            else {
                $session->setFlashdata("flash_msg", "Password salah.");
                return redirect()->to('/user/login');
            }
        }
        else {
            $session->setFlashdata("flash_msg", "email tidak terdaftar.");
            return redirect()->to('/user/login');
        }
    }
}
```

### Membuat View Login
Buat direktori baru dengan nama user pada direktori app/views, kemudian buat file baru dengan nama login.php. 

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url('/style.css');?>">
</head>
<body>
    <div id="login-wrapper">
        <h1>Sign In</h1>
        <?php if(session()->getFlashdata('flash_msg')):?>
        <div class="alert alert-danger"><?= session()->getFlashdata('flash_msg'); ?></div>
        <?php endif;?>
        <form action="" method="post">
            <div class="mb-3">
                <label for="InputForEmail" class="form-label">Email
                address</label>
                <input type="email" name="email" class="form-control"
                id="InputForEmail" value="<?= set_value('email') ?>">
            </div>
            <div class="mb-3">
                <label for="InputForPassword" class="formlabel">Password</label>
                <input type="password" name="password" class="formcontrol" id="InputForPassword">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>
</html>
```

### Membuat Database Seeder
Database seeder digunakan untuk membuat data dummy. Untuk keperluan ujicoba modul login, kita perlu memasukkan data user dan password kedaalam database. Untuk itu buat database seeder untuk tabel user. Buka CLI, kemudian tulis perintah berikut:

```php
php spark make:seeder UserSeeder
```
![alt text](<screenshots/p4/p4-1.PNG>)

Selanjutnya, buka file **UserSeeder.php** yang berada di lokasi direktori `app/Database/Seeds/UserSeeder.php` kemudian isi dengan kode berikut:

```php
<?php
namespace App\Database\Seeds;
use CodeIgniter\Database\Seeder;
class UserSeeder extends Seeder {
    public function run() {
    $model = model('UserModel');
        $model->insert([
            'username' => 'admin',
            'useremail' => 'admin@email.com',
            'userpassword' => password_hash('admin123', PASSWORD_DEFAULT),
        ]);
    }
}
```
Selanjutnya buka kembali CLI dan ketik perintah berikut:
```php
php spark db:seed UserSeeder
```
![alt text](<screenshots/p4/p4-2.PNG>)
### Uji Coba Login
Selanjutnya buka url http://localhost:8080/user/login seperti berikut:
![alt text](<screenshots/p4/p4-3.PNG>)


### Menambahkan Auth Filter
Selanjutnya membuat filer untuk halaman admin. Buat file baru dengan nama **Auth.php** pada direktori `app/Filters`. 
```php
<?php namespace App\Filters;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
class Auth implements FilterInterface {
    public function before(RequestInterface $request, $arguments = null) {
        // jika user belum login
        if(! session()->get('logged_in')) {
            // maka redirct ke halaman login
            return redirect()->to('/user/login');
        }
    }
    public function after(RequestInterface $request, ResponseInterface
    $response, $arguments = null) {
        // Do something here
    }
}
```
![alt text](<screenshots/p4/p4-4.PNG>)
Selanjutnya buka file `app/Config/Routes.php` dan sesuaikan kodenya.
![alt text](<screenshots/p4/p4-5.PNG>)

### Percobaan Akses Menu Admin
Buka url dengan alamat http://localhost:8080/admin/artikel ketika alamat tersebut diakses maka, akan dimuculkan halaman login.
![alt text](<screenshots/p4/p4-3.PNG>)


## Fungsi Logout
Tambahkan method logout pada Controller User seperti berikut:
```php
public function logout() {
    session()->destroy();
    return redirect()->to('/user/login');
}
```
---
# Praktikum 5: Pagination dan Pencarian
## Tujuan
1. Mahasiswa mampu memahami konsep dasar Pagination.
2. Mahasiswa mampu memahami konsep dasar Pencarian.
3. Mahasaswa mampu membuat Paging dan Pencarian menggunakan Framework Codeigniter 4.

## Instruksi Praktikum
1. Persiapkan text editor misalnya VSCode.
2. Buka kembali folder dengan nama lab7_php_ci pada docroot webserver (htdocs)
3. Ikuti langkah-langkah praktikum yang akan dijelaskan berikutnya.


## Langkah-langkah Praktikum
### Membuat Pagination
Pagination merupakan proses yang digunakan untuk membatasi tampilan yang panjang dari data yang banyak pada sebuah website. Fungsi pagination adalah memecah tampilan menjadi beberapa halaman tergantung banyaknya data yang akan ditampilkan pada setiap halaman.

Pada Codeigniter 4, fungsi pagination sudah tersedia pada Library sehingga cukup mudah menggunakannya. Untuk membuat pagination, buka Kembali **Controller Artikel**, kemudian modifikasi kode pada method **admin_index** seperti berikut.

```php
public function admin_index() {
    $title = 'Daftar Artikel';
    $model = new ArtikelModel();
    $data = [
        'title' => $title,
        'artikel' => $model->paginate(10),
        'pager' => $model->pager,
    ];
    return view('artikel/admin_index', $data);
}
```
Kemudian buka file **views/artikel/admin_index.php** dan tambahkan kode berikut dibawah deklarasi tabel data.
```php
<?= $pager->links(); ?>
```
![alt text](<screenshots/p5/p5-1.PNG>)


### Membuat Pencarian
Pencarian data digunakan untuk memfilter data. 

Untuk membuat pencarian data, buka kembali **Controller Artikel**, pada method **admin_index** ubah kodenya seperti berikut:

```php
public function admin_index() {
    $title = 'Daftar Artikel';
    $q = $this->request->getVar('q') ?? '';
    $model = new ArtikelModel();
    $data = [
        'title' => $title,
        'q' => $q,
        'artikel' => $model->like('judul', $q)->paginate(2),
        'pager' => $model->pager,
    ];
    return view('artikel/admin_index', $data);
}
```
Kemudian buka kembali file **views/artikel/admin_index.php** dan tambahkan form pencarian sebelum deklarasi tabel seperti berikut:

```php
<form method="get" class="form-search">
    <input type="text" name="q" value="<?= $q; ?>" placeholder="Cari data">
    <input type="submit" value="Cari" class="btn btn-primary">
</form>
```
Dan pada link pager ubah seperti berikut.
```php
<?= $pager->only(['q'])->links(); ?>
```

Selanjutnya ujicoba dengan membuka kembali halaman admin artikel, masukkan kata kunci tertentu pada form pencarian.

![alt text](<screenshots/p5/p5-2.PNG>)

---

# Praktikum 6: Upload File Gambar
## Tujuan
1. Mahasiswa mampu memahami konsep dasar File Upload.
2. Mahasaswa mampu membuat File Upload menggunakan Framework Codeigniter 4.
## Instruksi Praktikum
1. Persiapkan text editor misalnya VSCode.
2. Buka kembali folder dengan nama lab7_php_ci pada docroot webserver (htdocs)
3. Ikuti langkah-langkah praktikum yang akan dijelaskan berikutnya.
## Langkah-langkah Praktikum
### Upload Gambar pada Artikel
Menambahkan fungsi unggah gambar pada tambah artikel.
Buka kembali Controller Artikel pada project sebelumnya, sesuaikan kode pada method
*add* seperti berikut:

```php
public function add() {
    $validation = \Config\Services::validation();
    $validation->setRules(['judul' => 'required']);
    $isDataValid = $validation->withRequest($this->request)->run();
    if ($isDataValid) {
        $file = $this->request->getFile('gambar');
        $file->move(ROOTPATH . 'public/gambar');
        $artikel = new ArtikelModel();
        $artikel->insert([
            'judul' => $this->request->getPost('judul'),
            'isi' => $this->request->getPost('isi'),
            'slug' => url_title($this->request->getPost('judul')),
            'gambar' => $file->getName(),
        ]);
        return redirect('admin/artikel');
    }
    $title = "Tambah Artikel";
    return view('artikel/form_add', compact('title'));
}
```
Kemudian pada file `views/artikel/form_add.php` tambahkan field input file seperti berikut.
```html
<p>
    <input type="file" name="gambar">
<p>
```
Dan sesuaikan tag form dengan menambahkan ecrypt type seperti berikut.
```html
<form action="" method="post" enctype="multipart/form-data">
```
Ujicoba file upload dengan mengakses menu tambah artikel.

![alt text](<screenshots/p6/p6-1.PNG>)


--- 
# Praktikum 7: Relasi Tabel dan Query Builder
## Tujuan
1. Mahasiswa mampu memahami konsep relasi antar tabel dalam database.
2. Mahasiswa mampu mengimplementasikan relasi One-to-Many.
3. Mahasiswa mampu melakukan query dengan join tabel menggunakan Query Builder.
4. Mahasiswa mampu menampilkan data dari tabel yang berelasi.
## Instruksi Praktikum
1. Persiapkan text editor (VSCode).
2. Buka kembali folder proyek lab7_php_ci.
3. Ikuti langkah-langkah praktikum berikut.
## Relasi Tabel dan Query Builder
Praktikum ini merupakan kelanjutan dari praktikum sebelumnya, dimana kita akan memperdalam pemahaman tentang Model, Relasi Tabel dan Joining, serta penggunaan Query Builder dalam CodeIgniter 4.
* **Model**: Dalam CodeIgniter, Model adalah bagian dari arsitektur MVC (Model-ViewController) yang bertugas untuk berinteraksi dengan database. Model menyediakan cara untuk mengambil, menyimpan, mengubah, dan menghapus data dari database.
* **Relasi Tabel**: Relasi tabel digunakan untuk menghubungkan data antar tabel dalam database. Dalam praktikum ini, kita akan fokus pada relasi One-to-Many, di mana satu kategori dapat memiliki banyak artikel.
* **Query Builder**: Query Builder adalah fitur yang disediakan oleh CodeIgniter untuk membuat query database dengan cara yang lebih mudah dan aman. Dengan Query Builder, kita dapat melakukan join tabel, memfilter data, dan mengurutkan hasil tanpa harus menulis query SQL secara manual.

Dengan memahami konsep-konsep ini, Anda akan mampu membangun aplikasi web yang lebih kompleks dan efisien.

### Langkah-langkah Praktikum
####  1. Persiapan
Pastikan MySQL Server sudah berjalan, dan buka database `lab_ci4
#### 2. Membuat Tabel Kategori
Kita akan membuat tabel baru bernama `kategori` untuk mengkategorikan artikel. Struktur Tabel `kategori`:


| Field  | Tipe Data | Ukuran | Keterangan |
| ------ | --------- | ------ | ---------- |
| id_kategori     | INT       |  11    | PRIMARY KEY, auto_increment |
| nama_kategori | VARCHAR | 100 | |
| slug_kategori | TEXT | 100 | | |


Jalankan query berikut:

```sql
CREATE TABLE kategori (
    id_kategori INT(11) AUTO_INCREMENT,
    nama_kategori VARCHAR(100) NOT NULL,
    slug_kategori VARCHAR(100),
    PRIMARY KEY (id_kategori)
);
```
#### 3. Mengubah Tabel Artikel
Tambahkan foreign key `id_kategori` pada tabel `artikel` untuk membuat relasi dengan tabel `kategori`. 
Query untuk menambahkan foreign key:

```php
ALTER TABLE artikel
ADD COLUMN id_kategori INT(11),
ADD CONSTRAINT fk_kategori_artikel
FOREIGN KEY (id_kategori) REFERENCES kategori(id_kategori);
```
#### 4. Membuat Model Kategori
Buat file model baru di `app/Models` dengan nama `KategoriModel.php`:
```php
<?php
namespace App\Models;
use CodeIgniter\Model;
class KategoriModel extends Model {
    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama_kategori', 'slug_kategori'];
}
```
#### 5. Memodifikasi Model Artikel
Modifikasi `ArtikelModel.php` untuk mendefinisikan relasi dengan `KategoriModel`:

```php
<?php
namespace App\Models;
use CodeIgniter\Model;
class ArtikelModel extends Model {
    protected $table = 'artikel';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['judul', 'isi', 'status', 'slug', 'gambar',
    'id_kategori'];
    public function getArtikelDenganKategori() {
        return $this->db->table('artikel')
            ->select('artikel.*, kategori.nama_kategori')
            ->join('kategori', 'kategori.id_kategori = artikel.id_kategori')
            ->get()
            ->getResultArray();
    }
}

```

Menambahkan method `getArtikelDenganKategori()` untuk mengambil data artikel beserta nama kategorinya menggunakan join.
#### 6. Memodifikasi Controller Artikel
Modifikasi `Artikel.php` untuk menggunakan model baru dan menampilkan data relasi:
```php
<?php
namespace App\Controllers;

use App\Models\ArtikelModel;
use App\Models\KategoriModel;

class Artikel extends BaseController
{
    public function index()
    {
        $title = 'Daftar Artikel';
        $model = new ArtikelModel();
        $artikel = $model->getArtikelDenganKategori();

        return view('artikel/index', compact('artikel', 'title'));
    }

    public function admin_index()
    {
        $title = 'Daftar Artikel (Admin)';
        $model = new ArtikelModel();
        $q = $this->request->getVar('q') ?? '';
        $kategori_id = $this->request->getVar('kategori_id') ?? '';

        $data = [
            'title' => $title,
            'q' => $q,
            'kategori_id' => $kategori_id,
        ];

        $builder = $model->table('artikel')
            ->select('artikel.*, kategori.nama_kategori')
            ->join('kategori', 'kategori.id_kategori = artikel.id_kategori');

        if ($q != '') {
            $builder->like('artikel.judul', $q);
        }

        if ($kategori_id != '') {
            $builder->where('artikel.id_kategori', $kategori_id);
        }

        $data['artikel'] = $builder->paginate(3);
        $data['pager'] = $model->pager;

        $kategoriModel = new KategoriModel();
        $data['kategori'] = $kategoriModel->findAll();

        return view('artikel/admin_index', $data);
    }

    public function add()
    {
        if ($this->request->getMethod() == 'POST' && $this->validate([
            'judul' => 'required',
            'id_kategori' => 'required|integer' 
        ])) {
            $model = new ArtikelModel();
            $model->insert([
                'judul' => $this->request->getPost('judul'),
                'isi' => $this->request->getPost('isi'),
                'slug' => url_title($this->request->getPost('judul')),
                'id_kategori' => $this->request->getPost('id_kategori')
            ]);
            return redirect()->to('/admin/artikel');
        } else {
            $kategoriModel = new KategoriModel();
            $data['kategori'] = $kategoriModel->findAll();
            $data['title'] = "Tambah Artikel";
            return view('artikel/form_add', $data);
        }
    }

    public function edit($id)
    {
        $model = new ArtikelModel();
        if (
            $this->request->getMethod() == 'POST' &&
            $this->validate([
                'judul' => 'required',
                'id_kategori' => 'required|integer'
            ])
            
        ) {
            
            $model->update($id, [
                'judul' => $this->request->getPost('judul'),
                'isi' => $this->request->getPost('isi'),
                'id_kategori' => $this->request->getPost('id_kategori')
            ]);
            return redirect()->to('/admin/artikel');
        } else {
            $data['artikel'] = $model->find($id);
            $kategoriModel = new KategoriModel();
            $data['kategori'] = $kategoriModel->findAll(); 
            $data['title'] = "Edit Artikel";
            return view('artikel/form_edit', $data);
        }
    }

    public function delete($id)
    {
        $model = new ArtikelModel();
        $model->delete($id);
        return redirect()->to('/admin/artikel');
    }

    public function view($slug)
    {
        $model = new ArtikelModel();
        $data['artikel'] = $model->where('slug', $slug)->first();

        if (empty($data['artikel'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the article.');
        }

        $data['title'] = $data['artikel']['judul'];
        return view('artikel/detail', $data);
    }
}

```
#### 7. Memodifikasi View
Buka folder `view/artikel` sesuaikan masing-masing view.

**index.php**

```php
<?= $this->include('template/header'); ?>
<?php if ($artikel): foreach ($artikel as $row): ?>
    <article class="entry">
        <h2><a href="<?= base_url('/artikel/' . $row['slug']); ?>"><?= $row['judul']; ?></a>
        </h2>
        <p>Kategori: <?= $row['nama_kategori'] ?></p>
        <p><?= substr($row['isi'], 0, 200); ?></p>
    </article>
        <hr class="divider" />
<?php endforeach; else: ?>
    <article class="entry">
        <h2>Belum ada data.</h2>
    </article>
<?php endif; ?>
<?= $this->include('template/footer'); ?>
```

**admin_index.php**
```php
<?= $this->include('template/admin_header'); ?>

<h2><?= $title; ?></h2>

<div class="row mb-3">
    <div class="col-md-6">
        <form method="get" class="form-search">
            <input type="text" name="q" value="<?= $q; ?>" placeholder="Cari judul artikel" class="form-control mr-2">

            <select name="kategori_id" >
                <option value="">Semua Kategori</option>
                <?php foreach ($kategori as $k): ?>
                    <option value="<?= $k['id_kategori']; ?>" <?= ($kategori_id == $k['id_kategori']) ? 'selected' : ''; ?>>
                        <?= $k['nama_kategori']; ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <input type="submit" value="Cari" class="btn btn-primary">
        </form>
    </div>
</div>

<table class="styled-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (count($artikel) > 0): ?>
            <?php foreach ($artikel as $row): ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td>
                    <b><?= $row['judul']; ?></b>
                    <p><small><?= substr($row['isi'], 0, 50); ?></small></p>
                </td>
                <td><?= $row['nama_kategori']; ?></td>
                <td><?= $row['status']; ?></td>
                <td>
                    <a class="btn edit" href="<?= base_url('/admin/artikel/edit/' . $row['id']); ?>">Ubah</a>
                    <a class="btn delete" onclick="return confirm('Yakin menghapus data?');" href="<?= base_url('/admin/artikel/delete/' . $row['id']); ?>">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">Tidak ada data.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?= $pager->only(['q', 'kategori_id'])->links(); ?>
<?= $this->include('template/admin_footer'); ?>
```

**form_add.php**

```php
<?= $this->include('template/admin_header'); ?>
<h2><?= $title; ?></h2>

<form method="post" action="">
    <p>
        <label for="judul">Judul</label>
        <input type="text" name="judul" id="judul" required>
    </p>
    <p>
        <label for="isi">Isi</label>
        <textarea name="isi" id="isi" cols="50" rows="10"></textarea>
    </p>
    <p>
        <label for="id_kategori">Kategori</label>
        <select name="id_kategori" id="id_kategori"  required>
            <?php foreach($kategori as $k): ?>
            <option value="<?= $k['id_kategori']; ?>"><?= $k['nama_kategori']; ?></option>
            <?php endforeach; ?>
        </select>
    </p>
    <p><input type="submit" value="Kirim" class="btn btn-large"></p>
</form>
<?= $this->include('template/admin_footer'); ?>
```

**form_edit.php**

```php
<?= $this->include('template/admin_header'); ?>
<h2><?= $title; ?></h2>
<form action="" method="post">
    <p>
        <label for="judul">Judul</label>
        <input type="text" name="judul" value="<?= $artikel['judul']; ?> "id="judul" required>
    </p>
    <p>
        <label for="isi">Isi</label>
        <textarea name="isi" id="isi" cols="50" rows="10"><?= $artikel['isi']; ?></textarea>
    </p>
    <p>
        <label for="id_kategori">Kategori</label>
        <select name="id_kategori" id="id_kategori" required>
            <?php foreach($kategori as $k): ?>
            <option value="<?= $k['id_kategori']; ?>" <?=
            ($artikel['id_kategori'] == $k['id_kategori']) ? 'selected' : ''; ?>><?=
            $k['nama_kategori']; ?></option>
            <?php endforeach; ?>
        </select>
    </p>
    <p><input type="submit" value="Kirim" class="btn btn-large"></p>
</form>
<?= $this->include('template/admin_footer'); ?>
```


#### 8. Testing
Lakukan uji coba untuk memastikan semua fungsi berjalan dengan baik:
* Menampilkan daftar artikel dengan nama kategori.
* Menambah artikel baru dengan memilih kategori.
* Mengedit artikel dan mengubah kategorinya.
* Menghapus artikel

1. Menampilkan daftar artikel dengan nama kategori.
**Semua artikel**
![alt text](<screenshots/p7/p7-1.PNG>)
**Berdasarkan kategori**
*kategori komputer*
![alt text](<screenshots/p7/p7-2.PNG>)
*kategori software*
![alt text](<screenshots/p7/p7-3.PNG>)
*kategori hardware*
![alt text](<screenshots/p7/p7-4.PNG>)

2. Menambah artikel baru dengan memilih kategori.
![alt text](<screenshots/p7/p7-5.PNG>)
![alt text](<screenshots/p7/p7-6.PNG>)

3. Mengedit artikel dengan mengubah kategorinya.
![alt text](<screenshots/p7/p7-7.PNG>)

4. Menghapus artikel
![alt text](<screenshots/p7/p7-8.PNG>)

### Pertanyaan dan Tugas
1. Selesaikan semua langkah praktikum di atas.
2. Modifikasi tampilan detail artikel `artikel/detail.php` untuk menampilkan nama kategori artikel.
3. Tambahkan fitur untuk menampilkan daftar kategori di halaman depan (opsional).
4. Buat fungsi untuk menampilkan artikel berdasarkan kategori tertentu (opsional).


### modifikasi detail.php
Modifikasi **Artikel.php** pada `app/Controllers`.


```php
public function view($slug)
{
    $model = new ArtikelModel();
    $data['artikel'] = $model
        ->select('artikel.*, kategori.nama_kategori')
        ->join('kategori', 'kategori.id_kategori = artikel.id_kategori') 
        ->where('slug', $slug)
        ->first();
    if (empty($data['artikel'])) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the article.');
    }
    $data['title'] = $data['artikel']['judul'];
    return view('artikel/detail', $data);
}
```
Memodifikasi tampilan detail.php untuk menampilkan nama kategori.
Edit file **detail.php** pada `app/Views/artikel`.
```php
<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<article class="entry">
    <h2><?= $artikel['judul']; ?></h2>
    <p><?= $artikel['isi']; ?></p>
</article>

<sub><?= $artikel['nama_kategori']; ?></sub>
<?= $this->endSection() ?>
```
![alt text](<screenshots/p7/p7-9.PNG>)
