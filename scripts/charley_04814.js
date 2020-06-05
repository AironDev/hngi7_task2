// samplesScript format in JS
const charley_info = {
	file: "charley_04815.js",
	name: "Charles Finch", 
	output: 'Hello World, this  is Charles Finch with HNGi7 ID  HNG-04817 using Javascript for stage 2 task',
	id: "HNG-04815",
	email: "charles@mail.com",
	language: "Javascript", 
	status: ""
} //Backend dev should have a way of modifying the status key after exec
const data = JSON.stringify(charley_info);
console.log(data);