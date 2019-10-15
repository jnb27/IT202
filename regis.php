<html>
<head>
<script>

function myValidation(inputEle, checkValue){
	let name = inputEle.name;
	let vid = "validation." + name;
	let vele = document.getElementById(vid);
	let value = inputEle.value;
	if(value === checkValue){
		if(vele){
			vele.remove();
		}
	}
	else{
		if(!vele){
			vele = document.createElement("span");
			vele.id = vid;
			document.body.appendChild(vele);
		}
		vele.innerText = name + " has an invalid value";
	}
	return false;
}

</script>
</head>

<body>


<form onsubmit="return false;">

 
<input name="email" type="email" placeholder="Enter your email" onchange="myValidation(this,emailconfirm);"/>
<input name="emailconfirm" type="email" placeholder="Confirm your email"/>
<input name="password" type="password" placeholder="Enter your password"/>
<input name="passwordconfirm" type="password" placeholder="Confirm password"/>
<input name="username" placeholder="Create username"/>

<input type="submit" value="Submit"/>

</form>

</body>
</html>
