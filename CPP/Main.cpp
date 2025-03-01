#include <iostream>
#include "Baju.cpp"

using namespace std;

void printAligned(string text, int width) {
    cout << text;
    for (int i = text.length(); i < width; i++) {
        cout << " ";
    }
}

void displayTableBorder(int widths[], int size) {
    cout << "+";
    for (int i = 0; i < size; i++) {
        for (int j = 0; j < widths[i] + 2; j++) cout << "-";
        cout << "+";
    }
    cout << endl;
}

void displayTableHeader(int widths[]) {
    displayTableBorder(widths, 11);
    cout << "| "; printAligned("ID", widths[0]); cout << " | ";
    printAligned("Nama Produk", widths[1]); cout << " | ";
    printAligned("Kategori", widths[2]); cout << " | ";
    printAligned("Harga", widths[3]); cout << " | ";
    printAligned("Stok", widths[4]); cout << " | ";
    printAligned("Jenis", widths[5]); cout << " | ";
    printAligned("Bahan", widths[6]); cout << " | ";
    printAligned("Warna", widths[7]); cout << " | ";
    printAligned("Untuk", widths[8]); cout << " | ";
    printAligned("Size", widths[9]); cout << " | ";
    printAligned("Merk", widths[10]); cout << " |" << endl;
    displayTableBorder(widths, 11);
}

void displayBasicData(PetShop* item, int widths[]) {
    cout << "| "; printAligned(to_string(item->getId()), widths[0]); cout << " | ";
    string name = item->getName();
    if (name.length() > widths[1]) name = name.substr(0, widths[1] - 3) + "...";
    printAligned(name, widths[1]); cout << " | ";
    printAligned(item->getCategory(), widths[2]); cout << " | ";
    printAligned(to_string(item->getPrice()), widths[3]); cout << " | ";
    printAligned(to_string(item->getStock()), widths[4]); cout << " | ";
}

void displayDataInTable(PetShop* item, int type, int widths[]) {
    displayBasicData(item, widths);
    
    if (type == 0) {
        for (int i = 5; i < 11; i++) {
            printAligned("-", widths[i]); cout << " | ";
        }
    } 
    else if (type == 1) {
        Aksesoris* aks = (Aksesoris*)item;
        printAligned(aks->getType(), widths[5]); cout << " | ";
        printAligned(aks->getMaterial(), widths[6]); cout << " | ";
        printAligned(aks->getColor(), widths[7]); cout << " | ";
        printAligned("-", widths[8]); cout << " | ";
        printAligned("-", widths[9]); cout << " | ";
        printAligned("-", widths[10]); cout << " |";
    }
    else if (type == 2) {
        Baju* baju = (Baju*)item;
        printAligned(baju->getType(), widths[5]); cout << " | ";
        printAligned(baju->getMaterial(), widths[6]); cout << " | ";
        printAligned(baju->getColor(), widths[7]); cout << " | ";
        printAligned(baju->getForwho(), widths[8]); cout << " | ";
        printAligned(to_string(baju->getSize()), widths[9]); cout << " | ";
        printAligned(baju->getBrand(), widths[10]); cout << " |";
    }
    cout << endl;
}

void displayTableFooter(int widths[]) {
    displayTableBorder(widths, 11);
}



int main() {
    
    PetShop petshop1(101, "Pet Food", "Makanan", 150000, 20);
    
    Aksesoris aksesoris1(201, "Pet Collar", "Aksesoris", 75000, 15, "Kalung", "Kulit", "Hitam");
    Aksesoris aksesoris2(202, "Pet Harness", "Aksesoris", 120000, 10, "Tali", "Nilon", "Merah");
    
    Baju baju1(301, "Dog Sweater", "Pakaian", 85000, 8, "Sweater", "Wol", "Biru", "Anjing", 3, "PetStyle");
    Baju baju2(302, "Cat Raincoat", "Pakaian", 95000, 7, "Jas Hujan", "Plastik", "Kuning", "Kucing", 2, "CatFashn");

    
    PetShop* productArray[100];  
    int productTypes[100];       
    int productCount = 5;        
    
    
    productArray[0] = &petshop1;
    productTypes[0] = 0;  
    
    productArray[1] = &aksesoris1;
    productTypes[1] = 1;  
    
    productArray[2] = &aksesoris2;
    productTypes[2] = 1;  
    
    productArray[3] = &baju1;
    productTypes[3] = 2;  
    
    productArray[4] = &baju2;
    productTypes[4] = 2;  
    
    
    int Menu;
    int ID, Price, Stock, Size;
    string Name, Category, Type, Material, Color, ForWho, Brand;
    
    
    while (true) {
        
        cout << "\n=== MENU PETSHOP ===" << endl;
        cout << "1. Menampilkan Data" << endl;
        cout << "2. Menambahkan Data PetShop" << endl;
        cout << "3. Menambahkan Data Aksesoris" << endl;
        cout << "4. Menambahkan Data Baju" << endl;
        cout << "5. Keluar" << endl;
        cout << "Pilih Menu : ";
        cin >> Menu;
        
        
        if (Menu == 5) {
            cout << "\nTerima Kasih Telah Menggunakan Program Pet Shop" << endl;
            break;
        }

        int widths[] = {5, 20, 10, 10, 5, 10, 10, 10, 10, 5, 10}; 
        
        switch (Menu) {
            case 1: 
                cout << "\n=== DAFTAR PRODUK PETSHOP ===" << endl;
                if (productCount == 0) {
                    cout << "Belum ada data produk." << endl;
                    break;
                }

                displayTableHeader(widths);
                
                
                for (int i = 0; i < productCount; i++) {
                    displayDataInTable(productArray[i], productTypes[i], widths);
                }

                displayTableFooter(widths);

                break;

            case 2: 
                if (productCount >= 100) {
                    cout << "Penyimpanan penuh!" << endl;
                    break;
                }

                
                cout << "\nMasukkan Data PetShop Baru" << endl;
                cout << "ID: ";
                cin >> ID;
                cin.ignore();
                cout << "Nama Produk: ";
                getline(cin, Name);
                cout << "Kategori Produk: ";
                getline(cin, Category);
                cout << "Harga Produk: Rp";
                cin >> Price;
                cout << "Stok Produk: ";
                cin >> Stock;
                
                
                productArray[productCount] = new PetShop(ID, Name, Category, Price, Stock);
                productTypes[productCount] = 0;  
                productCount++;
                
                cout << "Data PetShop berhasil ditambahkan!" << endl;
                break;

            case 3: 
                if (productCount >= 100) {
                    cout << "Penyimpanan penuh!" << endl;
                    break;
                }

                
                cout << "\nMasukkan Data Aksesoris Baru" << endl;
                cout << "ID: ";
                cin >> ID;
                cin.ignore();
                cout << "Nama Produk: ";
                getline(cin, Name);
                cout << "Kategori Produk: ";
                getline(cin, Category);
                cout << "Harga Produk: Rp";
                cin >> Price;
                cout << "Stok Produk: ";
                cin >> Stock;
                cin.ignore();
                cout << "Jenis Aksesoris: ";
                getline(cin, Type);
                cout << "Bahan Aksesoris: ";
                getline(cin, Material);
                cout << "Warna Aksesoris: ";
                getline(cin, Color);
                
                
                productArray[productCount] = new Aksesoris(ID, Name, Category, Price, Stock, Type, Material, Color);
                productTypes[productCount] = 1;  
                productCount++;
                
                cout << "Data Aksesoris berhasil ditambahkan!" << endl;
                break;

            case 4: 
                if (productCount >= 100) {
                    cout << "Penyimpanan penuh!" << endl;
                    break;
                }

                
                cout << "\nMasukkan Data Baju Baru" << endl;
                cout << "ID: ";
                cin >> ID;
                cin.ignore();
                cout << "Nama Produk: ";
                getline(cin, Name);
                cout << "Kategori Produk: ";
                getline(cin, Category);
                cout << "Harga Produk: Rp";
                cin >> Price;
                cout << "Stok Produk: ";
                cin >> Stock;
                cin.ignore();
                cout << "Jenis Baju: ";
                getline(cin, Type);
                cout << "Bahan Baju: ";
                getline(cin, Material);
                cout << "Warna Baju: ";
                getline(cin, Color);
                cout << "Untuk (Anjing/Kucing): ";
                getline(cin, ForWho);
                cout << "Ukuran (angka): ";
                cin >> Size;
                cin.ignore();
                cout << "Merk Baju: ";
                getline(cin, Brand);
                
                
                productArray[productCount] = new Baju(ID, Name, Category, Price, Stock, Type, Material, Color, ForWho, Size, Brand);
                productTypes[productCount] = 2;  
                productCount++;
                
                cout << "Data Baju berhasil ditambahkan!" << endl;
                break;

            default: 
                cout << "\nMenu yang Anda pilih salah." << endl;
                break;
        }
    }

    
    for (int i = 0; i < productCount; i++) {
        
        if (i >= 5) { 
            delete productArray[i];
        }
    }

    return 0; 
}