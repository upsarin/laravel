
$(document).ready(function(){	
	$('#submitForm').click(function(e){
		var link = document.getElementById('link_url').value;

		if(link == "" || link == "undefined"){
			$('#error_mess').remove();
			$('#shortlink').remove();
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
			  url: "/short/create/",
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