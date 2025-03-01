<?php

require_once 'PetShop.php';
require_once 'Aksesoris.php';
require_once 'Baju.php';

$output = "";


if (!isset($_SESSION['petshop_data']) || !isset($_SESSION['initialized']) || $_SESSION['initialized'] == false) {
    
    $_SESSION['petshop_data'] = array();
    $_SESSION['item_count'] = 0;
    
    
    $item1 = new PetShop();
    $item1->setData(1, "Dog Food Premium", "Makanan", 75000, 50, "uploads/dogfood.jpg");
    $_SESSION['petshop_data'][$_SESSION['item_count']++] = serialize($item1);
    
    
    $item2 = new Aksesoris(-1, "", "", 0, 0, "");
    $item2->setAksesorisData(2, "Dog Collar", "Aksesoris", 45000, 10, "uploads/collar.jpg", "Collar", "Leather", "Black");
    $_SESSION['petshop_data'][$_SESSION['item_count']++] = serialize($item2);
    
    $item3 = new Aksesoris(-1, "", "", 0, 0, "");
    $item3->setAksesorisData(3, "Cat Toy Mouse", "Aksesoris", 25000, 15, "uploads/cattoy.jpg", "Toy", "Fabric", "Grey");
    $_SESSION['petshop_data'][$_SESSION['item_count']++] = serialize($item3);
    
    
    $item4 = new Baju(-1, "", "", 0, 0, "", "", "", "");
    $item4->setBajuData(4, "Dog Sweater", "Baju", 85000, 8, "uploads/dogsweater.jpg", "Sweater", "Cotton", "Red", "Dog", "M", "PetStyle");
    $_SESSION['petshop_data'][$_SESSION['item_count']++] = serialize($item4);
    
    $item5 = new Baju(-1, "", "", 0, 0, "", "", "", "");
    $item5->setBajuData(5, "Cat Costume", "Baju", 95000, 12, "uploads/catcostume.jpg", "Costume", "Polyester", "Blue", "Cat", "S", "Pawfashion");
    $_SESSION['petshop_data'][$_SESSION['item_count']++] = serialize($item5);
    
    $_SESSION['initialized'] = true;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $menu = isset($_POST['menu']) ? intval($_POST['menu']) : 0;
    
    if ($menu == 1) { 
        
    }
    else if ($menu == 2) { 
        
        if ($_SESSION['item_count'] >= 100) {
            $output .= "Penyimpanan penuh!\n";
        } else if (isset($_POST['add_confirm'])) {
            
            $id = intval($_POST['id']);
            $name = $_POST['name'];
            $category = $_POST['category'];
            $price = intval($_POST['price']);
            $stock = intval($_POST['stock']);
            
            
            $image_path = "";
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $target_dir = "uploads/";
                
                $file_extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
                
                $image_path = $target_dir . $id . "." . $file_extension;
                
                
                move_uploaded_file($_FILES["image"]["tmp_name"], $image_path);
            }
            
            
            if ($_POST['object_type'] == 'petshop') {
                
                $newItem = new PetShop();
                $newItem->setData($id, $name, $category, $price, $stock, $image_path);
            } 
            else if ($_POST['object_type'] == 'aksesoris') {
                $type = $_POST['type'];
                $material = $_POST['material'];
                $color = $_POST['color'];
                
                
                $newItem = new Aksesoris(-1, "", "", 0, 0, "");
                $newItem->setAksesorisData($id, $name, $category, $price, $stock, $image_path, $type, $material, $color);
            }
            else if ($_POST['object_type'] == 'baju') {
                $type = $_POST['type'];
                $material = $_POST['material'];
                $color = $_POST['color'];
                $forwho = $_POST['forwho'];
                $size = $_POST['size'];
                $brand = $_POST['brand'];
                
                
                $newItem = new Baju(-1, "", "", 0, 0, "", "", "", "");
                $newItem->setBajuData($id, $name, $category, $price, $stock, $image_path, $type, $material, $color, $forwho, $size, $brand);
            }
            
            
            $_SESSION['petshop_data'][$_SESSION['item_count']] = serialize($newItem);
            $_SESSION['item_count']++;
            
            $output .= "Data berhasil ditambahkan!\n";
        }
    }
}


function getObjectType($item) {
    if ($item instanceof Baju) {
        return "Baju";
    } else if ($item instanceof Aksesoris) {
        return "Aksesoris";
    } else if ($item instanceof PetShop) {
        return "PetShop";
    }
    return "Unknown";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PetShop Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            line-height: 1.6;
        }
        h1, h2, h3 {
            color: 
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid 
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: 
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: 
        }
        .menu {
            margin: 20px 0;
            padding: 10px;
            background: 
            border-radius: 5px;
        }
        .form {
            margin: 20px 0;
            padding: 15px;
            background: 
            border-radius: 5px;
        }
        input[type="text"], input[type="number"], select {
            padding: 8px;
            margin: 5px 0;
            border: 1px solid 
            border-radius: 4px;
            width: 250px;
        }
        input[type="submit"], button {
            padding: 8px 15px;
            background: 
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover, button:hover {
            background: 
        }
        .product-image img {
            max-width: 100px;
            max-height: 100px;
            border: 1px solid 
        }
    </style>
</head>
<body>
    <h1>PetShop Management System</h1>
    
    <div class="menu">
        <pre>
=== MENU PETSHOP ===
1. Menampilkan Data
2. Menambahkan Data
        </pre>
    </div>

    <?php if (!empty($output)): ?>
        <pre><?php echo $output; ?></pre>
    <?php endif; ?>

    <div class="form">
        <form method="post" action="">
            <label>Pilih Menu (1-2): </label>
            <input type="number" name="menu" min="1" max="2" required>
            <input type="submit" value="Pilih">
        </form>
    </div>

    <?php if (isset($_POST['menu']) && $_POST['menu'] == 2): ?>
        <div class="form">
            <h3>Tambah Data Baru</h3>
            <form method="post" action="" enctype="multipart/form-data">
                <input type="hidden" name="menu" value="2">
                <input type="hidden" name="add_confirm" value="1">
                
                <p>Tipe Objek: 
                    <select name="object_type" id="object_type" onchange="showFields()">
                        <option value="petshop">PetShop</option>
                        <option value="aksesoris">Aksesoris</option>
                        <option value="baju">Baju</option>
                    </select>
                </p>
                
                <!-- Field Dasar (PetShop) -->
                <div id="petshop_fields">
                    <p>ID: <input type="number" name="id" required></p>
                    <p>Nama: <input type="text" name="name" required></p>
                    <p>Kategori: <input type="text" name="category" required></p>
                    <p>Harga: <input type="number" name="price" required></p>
                    <p>Stock: <input type="number" name="stock" required></p>
                    <p>Gambar: <input type="file" name="image" accept="image/*"></p>
                </div>
                
                <!-- Field Aksesoris -->
                <div id="aksesoris_fields" style="display:none">
                    <p>Jenis: <input type="text" name="type"></p>
                    <p>Bahan: <input type="text" name="material"></p>
                    <p>Warna: <input type="text" name="color"></p>
                </div>
                
                <!-- Field Baju -->
                <div id="baju_fields" style="display:none">
                    <p>Untuk: <input type="text" name="forwho"></p>
                    <p>Ukuran: <input type="text" name="size"></p>
                    <p>Merk: <input type="text" name="brand"></p>
                </div>
                
                <input type="submit" value="Tambah Data">
            </form>
        </div>
        
        <script>
            function showFields() {
                var objType = document.getElementById('object_type').value;
                
                
                document.getElementById('petshop_fields').style.display = 'block';
                
                
                if (objType === 'petshop') {
                    document.getElementById('aksesoris_fields').style.display = 'none';
                    document.getElementById('baju_fields').style.display = 'none';
                } 
                else if (objType === 'aksesoris') {
                    document.getElementById('aksesoris_fields').style.display = 'block';
                    document.getElementById('baju_fields').style.display = 'none';
                } 
                else if (objType === 'baju') {
                    document.getElementById('aksesoris_fields').style.display = 'block';
                    document.getElementById('baju_fields').style.display = 'block';
                }
            }
            
            
            window.onload = showFields;
        </script>
    <?php endif; ?>

    <!-- Tampilkan data dalam satu tabel -->
    <h2>Daftar Produk PetShop</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipe</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stock</th>
                <!-- Aksesoris fields -->
                <th>Jenis</th>
                <th>Bahan</th>
                <th>Warna</th>
                <!-- Baju fields -->
                <th>Untuk</th>
                <th>Ukuran</th>
                <th>Merk</th>
                <th>Gambar</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            for ($i = 0; $i < $_SESSION['item_count']; $i++) {
                $item = unserialize($_SESSION['petshop_data'][$i]);
                $objType = getObjectType($item);
                
                echo "<tr>";
                echo "<td>".$item->getId()."</td>";
                echo "<td>".$objType."</td>";
                echo "<td>".$item->getName()."</td>";
                echo "<td>".$item->getCategory()."</td>";
                echo "<td>Rp".$item->getPrice()."</td>";
                echo "<td>".$item->getStock()."</td>";
                
                
                if ($objType == "Aksesoris" || $objType == "Baju") {
                    echo "<td>".$item->getType()."</td>";
                    echo "<td>".$item->getMaterial()."</td>";
                    echo "<td>".$item->getColor()."</td>";
                } else {
                    echo "<td>-</td><td>-</td><td>-</td>";
                }
                
                
                if ($objType == "Baju") {
                    echo "<td>".$item->getForwho()."</td>";
                    echo "<td>".$item->getSize()."</td>";
                    echo "<td>".$item->getBrand()."</td>";
                } else {
                    echo "<td>-</td><td>-</td><td>-</td>";
                }
                
                
                echo "<td>";
                if ($item->getImage() && file_exists($item->getImage())) {
                    echo "<div class='product-image'><img src='".$item->getImage()."' alt='Product Image'></div>";
                } else {
                    echo "No Image";
                }
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>