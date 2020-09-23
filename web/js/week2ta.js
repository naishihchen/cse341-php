function alert_click() {
	alert("Clicked!");
}

$(document).ready(function(){
	$("#button").click(function() {
		var str = $("#color").val();
		$("#red").css("background-color", str);
	});
});

// function change_color() {
// 	var newcolor = document.getElementById("color").value;

// 	document.getElementById("red").style.backgroundColor = newcolor;
// }