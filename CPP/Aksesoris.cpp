#include <iostream>
#include "PetShop.cpp"

using namespace std;

class Aksesoris : public PetShop {
    private:
    string type;     
    string material; 
    string color;    

    public:
    Aksesoris() : PetShop() {
        this->type = "";
        this->material = "";
        this->color = "";
    }

    Aksesoris(int id, string name, string category, int price, int stock,
              string type, string material, string color) 
              : PetShop(id, name, category, price, stock) {
        this->type = type;
        this->material = material;
        this->color = color;
    }

    void setAksesorisData(int id, string name, string category, int price, int stock,
                          string newType, string newMaterial, string newColor) {
        PetShop::setData(id, name, category, price, stock);
        this->type = newType;
        this->material = newMaterial;
        this->color = newColor;
    }

    string getType() {
        return this->type;
    }
    
    string getMaterial() {
        return this->material;
    }
    
    string getColor() {
        return this->color;
    }
    
    ~Aksesoris() {
    }
};