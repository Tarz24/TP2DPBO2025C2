#include <iostream>
#include "Aksesoris.cpp"

using namespace std;

class Baju : public Aksesoris {
private:
    string forwho;  
    int size;       
    string brand;   

public:
    Baju() : Aksesoris() {
        this->forwho = "";
        this->size = 0;
        this->brand = "";
    }

    Baju(int id, string name, string category, int price, int stock,
         string type, string material, string color,
         string forwho, int size, string brand) 
         : Aksesoris(id, name, category, price, stock, type, material, color) {
        this->forwho = forwho;
        this->size = size;
        this->brand = brand;
    }

    void setBajuData(int id, string name, string category, int price, int stock,
                     string type, string material, string color,
                     string newForwho, int newSize, string newBrand) {
        Aksesoris::setAksesorisData(id, name, category, price, stock, type, material, color);
        this->forwho = newForwho;
        this->size = newSize;
        this->brand = newBrand;
    }

    string getForwho() {
        return this->forwho;
    }

    int getSize() {
        return this->size;
    }
    
    string getBrand() {
        return this->brand;
    }

    ~Baju() {
    }
};