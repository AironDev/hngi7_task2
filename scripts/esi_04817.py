import json
esi_info = {
	'file': "esi_04817.js",
	'name': "Esi Dan", 
	'message': 'Hello World, this  is Esi FiDannch with HNGi7 ID  HNG-04817 using Javascript for stage 2 task',
	'id': "HNG-04817",
	'email': "esiFiDannch@mail.com",
	'language': "Javascript", 
	'status': ""
}

data = json.dumps(esi_info)
print(data)