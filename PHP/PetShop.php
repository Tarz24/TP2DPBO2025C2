<?php

class PetShop {
    
    private $id;         
    private $name;       
    private $category;   
    private $price;      
    private $stock;      
    private $image;      
    
    public function __construct($id = -1, $name = "", $category = "", $price = 0, $stock = 0, $image = "") {
        $this->id = $id;
        $this->name = $name;
        $this->category = $category;
        $this->price = $price;
        $this->stock = $stock;
        $this->image = $image;
    }
    
    public function setData($id, $name, $category, $price, $stock, $image) {
        $this->id = $id;                 
        $this->name = $name;             
        $this->category = $category;     
        $this->price = $price;           
        $this->stock = $stock;           
        $this->image = $image;           
    }
    
    public function getId() {
        return $this->id;        
    }
    
    public function getName() {
        return $this->name;      
    }
    
    public function getCategory() {
        return $this->category;  
    }
    
    public function getPrice() {
        return $this->price;     
    }

    public function getStock() {
        return $this->stock;     
    }

    public function getImage() { 
        return $this->image;     
    }
}

?>