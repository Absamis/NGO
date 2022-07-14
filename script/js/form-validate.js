function printErr(elem,msg){
		document.getElementById(elem).innerHTML=msg;
	}
	function validateForm(){
		var name=document.getElementById("name").value;
		var email=document.getElementById("email").value;
		var phone=document.getElementById("tel").value;
		//var text=document.getElementById("text").value;
		var nameErr=emailErr=phoneErr=true;
		alert("jjjjjjj");
		if(name==""){
			printErr("nameErr","Enter a name");		
		}
		else{
			var regex=/^[a-zA-Z\s]+$/;
			if(regex.test(name)==false){
				printErr("nameErr","Enter a valid name");
			}
			else{
				printErr("nameErr","");
				nameErr=false;
			}
		}
		if(email==""){
			printErr("emailErr","Enter your email address");		
		}
		else{
			var regex=/^\S+@\S+\.\S+$/;
			if(regex.test(email)==false){
				printErr("emailErr","Enter a valid email Address");
			}
			else{
				printErr("emailErr","");
				emailErr=false;
			}
		}
		if(phone==""){
			printErr("phoneErr","Enter your phone number");		
		}
		else{
			var regex=/^[0-9]\d{10}$/;
			if(regex.test(phone)==false){
				printErr("phoneErr","Enter a valid phone number");
			}
			else{
				printErr("phoneErr","");
				phoneErr=false;
			}
		}
		if(text==""){
			printErr("textErr","This field is required");		
		}
		else{
			printErr("textErr","");
			textErr=false;
		}
		if(nameErr||emailErr||phoneErr==true){
			return false;
		}
	}