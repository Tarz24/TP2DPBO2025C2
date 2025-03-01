from PetShop import PetShop
from Aksesoris import Aksesoris
from Baju import Baju

product_list = [
    PetShop(101, "Pet Food", "Makanan", 150000, 20),
    Aksesoris(201, "Pet Collar", "Aksesoris", 75000, 15, "Kalung", "Kulit", "Hitam"),
    Aksesoris(202, "Pet Harness", "Aksesoris", 120000, 10, "Tali", "Nilon", "Merah"),
    Baju(301, "Dog Sweater", "Pakaian", 85000, 8, "Sweater", "Wol", "Biru", "Anjing", 3, "PetStyle"),
    Baju(302, "Cat Raincoat", "Pakaian", 95000, 7, "Jas Hujan", "Plastik", "Kuning", "Kucing", 2, "CatFashn")
]

def print_table():
    headers = ["ID", "Nama Produk", "Kategori", "Harga", "Stok", "Jenis", "Bahan", "Warna", "Untuk", "Size", "Merk"]
    widths = [5, 15, 10, 10, 8, 10, 10, 10, 10, 6, 10]
    
    def print_row(data):
        print("| " + " | ".join(f"{str(data[i]):<{widths[i]}}" for i in range(len(data))) + " |")
    
    def print_border():
        print("+" + "+".join("-" * (w + 2) for w in widths) + "+")
    
    print_border()
    print_row(headers)
    print_border()
    
    for item in product_list:
        row_data = [
            str(item.get_id()), item.get_name(), item.get_category(), 
            f"Rp{item.get_price()}", str(item.get_stock())
        ]
        
        if isinstance(item, Baju):
            row_data.extend([
                item.get_type(), item.get_material(), item.get_color(), 
                item.get_forwho(), str(item.get_size()), item.get_brand()
            ])
        elif isinstance(item, Aksesoris):
            row_data.extend([item.get_type(), item.get_material(), item.get_color(), "-", "-", "-"])
        else:
            row_data.extend(["-"] * 6)
        
        print_row(row_data)
    
    print_border()

def main():
    while True:
        print("\n=== MENU PETSHOP ===")
        print("1. Tampilkan Data")
        print("2. Tambah Data PetShop")
        print("3. Tambah Data Aksesoris")
        print("4. Tambah Data Baju")
        print("5. Keluar")
        menu = input("Pilih Menu: ")
        
        if menu == "5":
            print("\nTerima Kasih Telah Menggunakan Program Pet Shop")
            break
        
        if menu == "1":
            print_table()
        elif menu == "2":
            id = int(input("Masukkan ID: "))
            name = input("Masukkan Nama: ")
            category = input("Masukkan Kategori: ")
            price = int(input("Masukkan Harga: "))
            stock = int(input("Masukkan Stok: "))
            product_list.append(PetShop(id, name, category, price, stock))
            print("Data PetShop berhasil ditambahkan!")
        elif menu == "3":
            id = int(input("Masukkan ID: "))
            name = input("Masukkan Nama: ")
            category = input("Masukkan Kategori: ")
            price = int(input("Masukkan Harga: "))
            stock = int(input("Masukkan Stok: "))
            type = input("Jenis Aksesoris: ")
            material = input("Bahan Aksesoris: ")
            color = input("Warna Aksesoris: ")
            product_list.append(Aksesoris(id, name, category, price, stock, type, material, color))
            print("Data Aksesoris berhasil ditambahkan!")
        elif menu == "4":
            id = int(input("Masukkan ID: "))
            name = input("Masukkan Nama: ")
            category = input("Masukkan Kategori: ")
            price = int(input("Masukkan Harga: "))
            stock = int(input("Masukkan Stok: "))
            type = input("Jenis Baju: ")
            material = input("Bahan Baju: ")
            color = input("Warna Baju: ")
            for_who = input("Untuk (Anjing/Kucing): ")
            size = int(input("Ukuran (angka): "))
            brand = input("Merk Baju: ")
            product_list.append(Baju(id, name, category, price, stock, type, material, color, for_who, size, brand))
            print("Data Baju berhasil ditambahkan!")
        else:
            print("Pilihan tidak valid.")

if __name__ == "__main__":
    main()