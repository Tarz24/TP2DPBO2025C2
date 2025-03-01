public class Aksesoris extends PetShop {
    private String type;
    private String material;
    private String color;

    public Aksesoris() {
        super();
        this.type = "";
        this.material = "";
        this.color = "";
    }

    public Aksesoris(int id, String name, String category, int price, int stock, String type, String material, String color) {
        super(id, name, category, price, stock);
        this.type = type;
        this.material = material;
        this.color = color;
    }

    public void setAksesorisData(int id, String name, String category, int price, int stock, String newType, String newMaterial, String newColor) {
        super.setData(id, name, category, price, stock);
        this.type = newType;
        this.material = newMaterial;
        this.color = newColor;
    }

    public String getType() {
        return type;
    }

    public String getMaterial() {
        return material; 
    }

    public String getColor() {
        return color;
    }
}
