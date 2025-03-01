public class Baju extends Aksesoris {
    private String forwho;
    private int size;
    private String brand;

    public Baju() {
        super();
        this.forwho = "";
        this.size = 0;
        this.brand = "";
    }

    public Baju(int id, String name, String category, int price, int stock, String type, String material, String color, String forwho, int size, String brand) {
        super(id, name, category, price, stock, type, material, color);
        this.forwho = forwho;
        this.size = size;
        this.brand = brand;
    }

    public void setBajuData(int id, String name, String category, int price, int stock, String type, String material, String color, String newForwho, int newSize, String newBrand) {
        super.setAksesorisData(id, name, category, price, stock, type, material, color);
        this.forwho = newForwho;
        this.size = newSize;
        this.brand = newBrand;
    }

    public String getForwho() {
        return forwho;
    }

    public int getSize() {
        return size;
    }

    public String getBrand() {
        return brand;
    }
}
