function showHide(div) {

	var target = document.getElementById(div);

	if (target.style.display == "block") {
		target.style.display = "none";
	} else {
		target.style.display = "block";
	}

}