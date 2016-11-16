
$(document).ready(function(){	
	$('#submitForm').click(function(e){
		var link = document.getElementById('link_url').value;

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
			
			var CSRF_TOKEN = $('meta[name="_token"]').attr('content');
			var data = {_token: CSRF_TOKEN, orig_url: link};
			
			
			$.ajax({
			  url: "/call-request/create",
			  type: "POST",
			  data: data,
			  dataType: 'JSON',
			  success: function(html){
				
				var obj = html;
				$('#shortlink').remove();
				$('#shortlinkForm').append('<div id="shortlink" class="">'+ obj.short_url +'</div>');
				
				document.getElementById('link_url').value = "";
				
			  }
			});
		}
		return false;
	});
});