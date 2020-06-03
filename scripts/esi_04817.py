import json
esi_info = {
	'file': "esi_04817.py",
	'name': "Esi Dan", 
	'output': 'Hello World, this  is Esi FiDannch with HNGi7 ID  HNG-04817 using Python for stage 2 task',
	'id': "HNG-04817",
	'email': "esiFiDannch@mail.com",
	'language': "Pyhton", 
	'status': ""
}

data = json.dumps(esi_info)
print(data)