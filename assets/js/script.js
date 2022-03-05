function toggle(){
	var x = document.getElementById("password");
	if (x.type === "password") {
		x.type = "text";
		$('i').attr('class', 'fa fa-eye');
	} else {
		x.type = "password";
		$('i').attr('class', 'fa fa-eye-slash');
	}
}