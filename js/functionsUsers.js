function acceptUser(e){
	htmlEl = document.getElementById("button"+e);
	htmlEl.setAttribute("value","accepted");
	htmlForm = document.getElementById("formUser"+e);
	htmlForm.setAttribute("action","acceptUsers.php");
}

function refuseUser(e){
	htmlEl = document.getElementById("button"+e);
	htmlEl.setAttribute("value","refused");
	htmlForm = document.getElementById("formUser"+e);
	htmlForm.setAttribute("action","refuseUsers.php");
}