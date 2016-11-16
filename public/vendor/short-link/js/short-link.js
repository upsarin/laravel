	
	
$(document).ready(function(){	
	$('#submitForm').click(function(e){
		$("#shortlink").remove();
		var link = document.getElementById('link_url').value;
		var token = document.getElementById('token').value;

		if(link == "" || link == "undefined"){
			$('#error_mess').remove();
			$('#shortlinkForm').append('<div id="error_mess" class="alert alert-success">Please fill in this field the original URL link</div>');
			setTimeout(function(){
				$('#error_mess').animate({
					opacity: 1,
				}, 5000)
				$('#error_mess').remove();
			}, 10000);
			
		} else {
			var data = "orig_url=" + link;
			
			
			$.ajax({
			  url: "http://localhost:8000/short-link/create",
			  headers: {
				'X-CSRF-TOKEN': token
			  },
			  type: "POST",
			  data: data,
			  success: function(html){
				
				var obj = JSON.parse(html);
				
				
				$('#shortlinkForm').append('<div id="shortlink" class="">'+ obj.short_url +'</div>');
				
				document.getElementById('orig_url').value = "";
				
			  }
			});
		}
		return false;
	});
});