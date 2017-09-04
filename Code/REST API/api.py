from flask import Flask, request
from Connection import  Connection
import json
 
app=Flask(__name__)
DBConnection=Connection()

@app.route('/')
def index():
    return "<h3>Welcome to API Service for Content Management System.</h3>"

@app.route('/page',methods=['GET'])
def getPage():
    if request.method == 'GET':
    	cursor=DBConnection.select('page',' * ',' 1 ');
	results = [{'PageID': row[0], 'Name': row[1] , 
		    'Description':row[2],
                    'created_at':str(row[3])} 
                    for row in cursor.fetchall()
                  ]  
	return json.dumps(results)

@app.route('/post/<int:post_id>',methods=['GET'])
def getPost(post_id):
    if request.method == 'GET':
    	cursor=DBConnection.select('post',' * ',' PageID='+str(post_id));
	results = [{'PostID': row[0],
		    'PostTitle': row[2],
		    'PostBody':row[3],
                    'created_at':str(row[4])} 
                    for row in cursor.fetchall()
		  ]  
	return json.dumps(results)
if __name__=='__main__':
    app.run(host='0.0.0.0',debug=True)
