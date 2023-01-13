function trigger_notify(){
	Toastify({
		node: $("#notification_body").clone().removeClass("hidden")[0],
		duration: -1,
		newWindow: true,
		close: true,
		gravity: "top",
		position: "right",
		stopOnFocus: true,
	}).showToast();
}

function getUserDetails(userid){
	$.ajax({
		type: "POST",
		url: BASE_URL + "ajax/memberajax/details/"+userid,
		data: {
			access_token: TOKEN,
			userid: userid,
			language: LANGUAGE,
		},
		success: function (data) {
			$("#render_data").html(data);
			$("#modal_content").addClass("show");
		}
	});
}
