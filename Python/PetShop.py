class PetShop:
    
    __id = -1          
    __name = ""        
    __category = ""    
    __price = 0        
    __stock = 0        

    def __init__(self, id = -1, name = "", category = "", price = 0, stock = 0):
        
        self.__id = id
        self.__name = name
        self.__category = category
        self.__price = price
        self.__stock = stock
    
    def set_data(self, id, name, category, price, stock):
        self.__id = id
        self.__name = name
        self.__category = category
        self.__price = price
        self.__stock = stock
    
    def get_id(self):
        return self.__id
    
    def get_name(self):
        return self.__name
    
    def get_category(self):
        return self.__category
    
    def get_price(self):
        return self.__price
    
    def get_stock(self):
        return self.__stock