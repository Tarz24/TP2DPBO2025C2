#include <iostream>
#include <string>

using namespace std;

class PetShop {
    
    private:
    int id;            
    string name;       
    string category;   
    int price;         
    int stock;         
    
    
    public:
    PetShop() {
        this->id = -1;         
        this->name = "";       
        this->category = "";   
        this->price = 0;       
        this->stock = 0;       
    }

    
    PetShop(int id, string name, string category, int price, int stock) {
        this->id = id;               
        this->name = name;           
        this->category = category;   
        this->price = price;         
        this->stock = stock;         
    }

    
    void setData(int newId, string newName, string newCategory, int newPrice, int newStock) {
        this->id = newId;               
        this->name = newName;           
        this->category = newCategory;   
        this->price = newPrice;         
        this->stock = newStock;         
    }
    
    
    int getId() {
        return this->id;
    }
    
    string getName() {
        return this->name;
    }

    string getCategory() {
        return this->category;
    }
    
    int getPrice() {
        return this->price;
    }

    
    int getStock() {
        return this->stock;
    }

    ~PetShop() {
    }
};