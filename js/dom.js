function recherche() {
	var num = document.getElementById("numeroCompte").value;
	console.log(num);
    window.location.href = "../controller/compteController.php?num="+num;
}

/*
var fielset = document.getElementById("nouveauCompteF");
var btn = document.getElementsByName("nouveauCompteB");
btn.onclick =function(){
	alert("ok");
}



	
	var fieldset = document.getElementById("nouveauCompteF");
var btn = document.getElementsByName("nouveauCompteB");
console.log(btn);
//alert("ok")

for (let i=0; i < btn.length; i++) {
	btn[i].onclick = function(){
		fieldset.removeAttribute("hidden"); 
	}
}

btn.onclick =function(){
	alert("ok");
}*/
