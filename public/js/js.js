	
$(document).ready(function(){	
	$(".form-horizontal").submit(function(){
		var data = $(".form-horizontal").serialize();
		console.log(data);
		console.log($("#task-name").val());
		return false;
	});
});