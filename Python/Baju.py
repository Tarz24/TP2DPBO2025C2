from Aksesoris import Aksesoris

class Baju(Aksesoris):
    
    __forwho = ""
    __size = 0
    __brand = ""

    def __init__(self,id = -1, name = "", category = "", price = 0, stock = 0, type="", material="", color="", forwho="", size=0, brand=""):
        super().__init__(id, name, category, price, stock, type, material, color)
        self.__forwho = forwho
        self.__size = size
        self.__brand = brand

    def set_baju_data(self, id, name, category, price, stock, type, material, color, forwho, size, brand):
        super().set_aksesoris_data(id, name, category, price, stock, type, material, color)
        self.__forwho = forwho
        self.__size = size
        self.__brand = brand

    def get_forwho(self):
        return self.__forwho
    
    def get_size(self):
        return self.__size
    
    def get_brand(self):
        return self.__brand