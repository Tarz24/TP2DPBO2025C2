**Saya Muhammad Akhtar Rizki Ramadha dengan NIM 2304742 mengerjakan soal Tugas Praktikum 2 dalam mata 
kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan 
kecurangan seperti yang telah dispesifikasikan. Aamiin.**

# Pet Shop Management System

Aplikasi ini merupakan program berbasis OOP yang menggunakan konsep multi-level inheritance untuk mengelola produk-produk di pet shop.

## Struktur Kelas
Program ini menggunakan 3 level kelas dengan hierarki sebagai berikut:

![Image](https://github.com/user-attachments/assets/916e423c-c501-4ec0-b50a-b002aa7283d3)

**1. PetShop (Kelas Dasar)**

Atribut:

- id - Nomor identifikasi unik untuk produk
- name - Nama produk
- price - Harga produk (dalam Rupiah)
- stock - Jumlah stok yang tersedia
- photo - Nama file foto produk
- category - Kategori produk (misalnya: Makanan, Aksesoris, Pakaian)

Method:
- setData() - Mengatur data produk
- getId() - Mendapatkan ID produk
- getName() - Mendapatkan nama produk
- getCategory() - Mendapatkan kategori produk
- getPrice() - Mendapatkan harga produk
- getStock() - Mendapatkan stok produk
- getPhoto() - Mendapatkan foto produk
    
**2. Aksesoris (Turunan dari PetShop)**

Atribut Tambahan:
- type - Jenis aksesoris (misalnya: Kalung, Tali, dll)
- material - Bahan pembuatan aksesoris
- color - Warna aksesoris

Method Tambahan:
- setAksesorisData() - Mengatur data aksesoris
- getType() - Mendapatkan jenis aksesoris
- getMaterial() - Mendapatkan bahan aksesoris
- getColor() - Mendapatkan warna aksesoris 

**3. Baju (Turunan dari Aksesoris)**

Atribut Tambahan:
- forwho - Untuk hewan apa (Anjing, Kucing, dll)
- size - Ukuran baju (dalam angka)
- brand - brand baju

Method Tambahan:
- setBajuData() - Mengatur data baju
- getForwho() - Mendapatkan untuk siapa baju tersebut
- getSize() - Mendapatkan ukuran baju
- getBrand() - Mendapatkan merk baju

## Fitur Program
Program ini menggunakan 3 level kelas dengan hierarki sebagai berikut:

**1. Menampilkan Data**

- Menampilkan seluruh data dari semua kelas dalam satu tabel yang lengkap.
- Tabel menampilkan semua atribut dari setiap kelas.
    
**2. Menambahkan Data)**

- Menambahkan data untuk PetShop, Aksesoris, atau Baju.
- Input dilakukan melalui terminal/command line.

**3. Data Awal**

Program telah diinisialisasi dengan 5 objek awal:
- 1 objek PetShop
- 2 objek Aksesoris
- 2 objek Baju
