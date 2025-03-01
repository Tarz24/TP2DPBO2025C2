from PetShop import PetShop

class Aksesoris(PetShop):
    
    __type = ""    
    __material = ""
    __color = ""

    def __init__(self,id = -1, name = "", category = "", price = 0, stock = 0, type="", material="", color=""):
        
        super().__init__(id, name, category, price, stock)
        
        self.__type = type
        self.__material = material
        self.__color = color
    
    def set_aksesoris_data(self, id, name, category, price, stock, type, material, color):
        super().set_data(id, name, category, price, stock)
        self.__type = type
        self.__material = material
        self.__color = color

    def get_type(self):
        return self.__type
    
    def get_material(self):
        return self.__material
    
    def get_color(self):
        return self.__color