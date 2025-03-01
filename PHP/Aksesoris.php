<?php

class Aksesoris extends PetShop {
    private $type;
    private $material;
    private $color;

    public function __construct($id = -1, $name = "", $category = "", $price = 0, $stock = 0, $image = "", $type = "", $material = "", $color = "") {
        parent::__construct($id, $name, $category, $price, $stock, $image);
        $this->type = $type;
        $this->material = $material;
        $this->color = $color;
    }
    
    public function setAksesorisData($id, $name, $category, $price, $stock, $image, $type, $material, $color) {
        parent::setData($id, $name, $category, $price, $stock, $image);
        $this->type = $type;
        $this->material = $material;
        $this->color = $color;
    }

    public function getType() {
        return $this->type;
    }

    public function getMaterial() {
        return $this->material;
    }

    public function getColor() {
        return $this->color;
    }

}