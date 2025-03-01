public class PetShop {
    
    private int id;         
    private String name;    
    private String category;
    private int price;      
    private int stock;      
    
    public PetShop() {
        
        this.id = -1;
        this.name = "";
        this.category = "";
        this.price = 0;
        this.stock = 0;
    }
    
    public PetShop(int id, String name, String category, int price, int stock) {
        
        this.id = id;
        this.name = name;
        this.category = category;
        this.price = price;
        this.stock = stock;
    }
    
    public void setData(int newId, String newName, String newCategory, int newPrice, int newStock) {
        this.id = newId;
        this.name = newName;
        this.category = newCategory;
        this.price = newPrice;
        this.stock = newStock;
    }
    
    public int getId() {
        return this.id;
    }
    
    public String getName() {
        return this.name;
    }
    
    public String getCategory() {
        return this.category;
    }
    
    public int getPrice() {
        return this.price;
    }

    public int getStock() {
        return this.stock;
    }
}