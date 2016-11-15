	
	
$(document).ready(function(){	
	$('#submitForm').click(function(e){
		var link = document.getElementById('link_url').value;

		if(link == "" || link == "undefined"){
			$('error_mess').remove();
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
				$('#noResult').remove();
				
				if($(linkList.children[0]).attr("class", "new_link")){
					$(linkList.children[0]).attr("class", "");
				}
				
				$('#shortlinkForm').append('<div id="shortlink" class="">'+ obj.short_url +'</div>');
				
				if(obj.repeat != "Y"){
					var newLi = document.createElement('tr');
					newLi.className = "new_link";
					newLi.innerHTML = '<td><a href="' + obj.orig_url + '" target="_blank">'  + obj.short_url + '</a></td><td>&nbsp; -- > &nbsp;</td><td>' + obj.orig_url + '</td>';
					
					inkList.insertBefore(newLi, linkList.children[0]);
				}
				
				
				l
				
				document.getElementById('orig_url').value = "";
				
			  }
			});
		}
		return false;
	});
});