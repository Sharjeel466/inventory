function toggle(){
	var x = document.getElementById("password");
	if (x.type === "password") {
		x.type = "text";
		$(this).attr('class', 'fa fa-eye');
	} else {
		x.type = "password";
		$(this).attr('class', 'fa fa-eye-slash');
	}
}