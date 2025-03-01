<?php

class Baju extends Aksesoris {
    private $forwho;
    private $size;
    private $brand;

    public function __construct($id = -1, $name = "", $category = "", $price = 0, $stock = 0, $image = "", $type = "", $material = "", $color = "", $forwho = "", $size = "", $brand = "") {
        parent::__construct($id, $name, $category, $price, $stock, $image, $type, $material, $color);
        $this->forwho = $forwho;
        $this->size = $size;
        $this->brand = $brand;
    }
    
    public function setBajuData($id, $name, $category, $price, $stock, $image, $type, $material, $color, $forwho, $size, $brand) {
        parent::setAksesorisData($id, $name, $category, $price, $stock, $image, $type, $material, $color);
        $this->forwho = $forwho;
        $this->size = $size;
        $this->brand = $brand;
    }
        
    public function getForwho() {
        return $this->forwho;
    }

    public function getSize() {
        return $this->size;
    }

    public function getBrand() {
        return $this->brand;
    }
}