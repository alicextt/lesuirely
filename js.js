function changeImage(){
	var button = document.getElementById("id");
	document.getElementById("imageChange").src = "img2.jpg";
}

function signin(){
	var text = document.getElementById("sign");
	if(text.innerHTML == "Sign In"){
		text.innerHTML = "Sign Up";
	}
	else if(text.innerHTML == "Sign Up"){
		text.innerHTML = "Sign In";
	}
}