import pymysql

HOST='localhost'
UserName='root'
PassWord='root'
Database='cms'
class Connection:

    def __init__(self):
        try:
            self.connection=pymysql.connect(HOST,UserName,PassWord,Database)
        except:
            print ("Connection Error!!!!")

    def select(self,table,column,filters):

        try:
            self.cursor = self.connection.cursor()
            self.cursor.execute("select "+ column +" from "+table+"  where "+filters)
            return self.cursor
        except IOError as e:
            print  format(e.errno, e.strerror)    
