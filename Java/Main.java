import java.util.LinkedList;
import java.util.Scanner;
import java.util.function.Consumer;
import java.util.Arrays;

public class Main {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        LinkedList<PetShop> productList = new LinkedList<>();
        
        productList.add(new PetShop(101, "Pet Food", "Makanan", 150000, 20));
        productList.add(new Aksesoris(201, "Pet Collar", "Aksesoris", 75000, 15, "Kalung", "Kulit", "Hitam"));
        productList.add(new Aksesoris(202, "Pet Harness", "Aksesoris", 120000, 10, "Tali", "Nilon", "Merah"));
        productList.add(new Baju(301, "Dog Sweater", "Pakaian", 85000, 8, "Sweater", "Wol", "Biru", "Anjing", 3, "PetStyle"));
        productList.add(new Baju(302, "Cat Raincoat", "Pakaian", 95000, 7, "Jas Hujan", "Plastik", "Kuning", "Kucing", 2, "CatFashn"));
        
        while (true) {
            System.out.println("\n=== MENU PETSHOP ===");
            System.out.println("1. Tampilkan Data");
            System.out.println("2. Tambah Data PetShop");
            System.out.println("3. Tambah Data Aksesoris");
            System.out.println("4. Tambah Data Baju");
            System.out.println("5. Keluar");
            System.out.print("Pilih Menu: ");
            int menu = scanner.nextInt();
            scanner.nextLine();
            
            if (menu == 5) {
                System.out.println("\nTerima Kasih Telah Menggunakan Program Pet Shop");
                break;
            }
            
            switch (menu) {
                 case 1:
                    int[] widths = {5, 15, 10, 10, 8, 10, 10, 10, 10, 6, 10}; 

                    
                    Consumer<String[]> printRow = (texts) -> {
                        System.out.print("| ");
                        for (int i = 0; i < texts.length; i++) {
                            System.out.printf("%-" + widths[i] + "s | ", texts[i]);
                        }
                        System.out.println();
                    };

                    
                    Runnable printBorder = () -> {
                        System.out.print("+");
                        for (int width : widths) {
                            System.out.print("-".repeat(width + 2) + "+");
                        }
                        System.out.println();
                    };

                    
                    printBorder.run();
                    printRow.accept(new String[]{"ID", "Nama Produk", "Kategori", "Harga", "Stok", "Jenis", "Bahan", "Warna", "Untuk", "Size", "Merk"});
                    printBorder.run();

                    
                    for (PetShop item : productList) {
                        String[] rowData = new String[11];

                        rowData[0] = String.valueOf(item.getId());
                        rowData[1] = item.getName().length() > widths[1] ? item.getName().substring(0, widths[1] - 3) + "..." : item.getName();
                        rowData[2] = item.getCategory();
                        rowData[3] = "Rp" + item.getPrice();
                        rowData[4] = String.valueOf(item.getStock());

                        if (item instanceof Baju) { 
                            Baju baju = (Baju) item;
                            rowData[5] = baju.getType();
                            rowData[6] = baju.getMaterial();
                            rowData[7] = baju.getColor();
                            rowData[8] = baju.getForwho();
                            rowData[9] = String.valueOf(baju.getSize());
                            rowData[10] = baju.getBrand();
                        } else if (item instanceof Aksesoris) { 
                            Aksesoris aks = (Aksesoris) item;
                            rowData[5] = aks.getType();
                            rowData[6] = aks.getMaterial();
                            rowData[7] = aks.getColor();
                            rowData[8] = "-";
                            rowData[9] = "-";
                            rowData[10] = "-";
                        } else {
                            Arrays.fill(rowData, 5, 11, "-"); 
                        }

                        printRow.accept(rowData);
                    }

                    
                    printBorder.run();
                    break;
                
                case 2:
                    System.out.print("Masukkan ID: ");
                    int id = scanner.nextInt();
                    scanner.nextLine();
                    System.out.print("Masukkan Nama: ");
                    String name = scanner.nextLine();
                    System.out.print("Masukkan Kategori: ");
                    String category = scanner.nextLine();
                    System.out.print("Masukkan Harga: ");
                    int price = scanner.nextInt();
                    System.out.print("Masukkan Stok: ");
                    int stock = scanner.nextInt();
                    productList.add(new PetShop(id, name, category, price, stock));
                    System.out.println("Data PetShop berhasil ditambahkan!");
                    break;
                
                case 3:
                    System.out.print("Masukkan ID: ");
                    id = scanner.nextInt();
                    scanner.nextLine();
                    System.out.print("Masukkan Nama: ");
                    name = scanner.nextLine();
                    System.out.print("Masukkan Kategori: ");
                    category = scanner.nextLine();
                    System.out.print("Masukkan Harga: ");
                    price = scanner.nextInt();
                    System.out.print("Masukkan Stok: ");
                    stock = scanner.nextInt();
                    scanner.nextLine();
                    System.out.print("Jenis Aksesoris: ");
                    String type = scanner.nextLine();
                    System.out.print("Bahan Aksesoris: ");
                    String material = scanner.nextLine();
                    System.out.print("Warna Aksesoris: ");
                    String color = scanner.nextLine();
                    productList.add(new Aksesoris(id, name, category, price, stock, type, material, color));
                    System.out.println("Data Aksesoris berhasil ditambahkan!");
                    break;
                
                case 4:
                    System.out.print("Masukkan ID: ");
                    id = scanner.nextInt();
                    scanner.nextLine();
                    System.out.print("Masukkan Nama: ");
                    name = scanner.nextLine();
                    System.out.print("Masukkan Kategori: ");
                    category = scanner.nextLine();
                    System.out.print("Masukkan Harga: ");
                    price = scanner.nextInt();
                    System.out.print("Masukkan Stok: ");
                    stock = scanner.nextInt();
                    scanner.nextLine();
                    System.out.print("Jenis Baju: ");
                    type = scanner.nextLine();
                    System.out.print("Bahan Baju: ");
                    material = scanner.nextLine();
                    System.out.print("Warna Baju: ");
                    color = scanner.nextLine();
                    System.out.print("Untuk (Anjing/Kucing): ");
                    String forWho = scanner.nextLine();
                    System.out.print("Ukuran (angka): ");
                    int size = scanner.nextInt();
                    scanner.nextLine();
                    System.out.print("Merk Baju: ");
                    String brand = scanner.nextLine();
                    productList.add(new Baju(id, name, category, price, stock, type, material, color, forWho, size, brand));
                    System.out.println("Data Baju berhasil ditambahkan!");
                    break;
                
                default:
                    System.out.println("Pilihan tidak valid.");
            }
        }
        scanner.close();
    }
}
