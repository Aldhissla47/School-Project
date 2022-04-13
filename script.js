$(document).ready(function() {
	
	$(".search_box").keyup(function() {
		$(".search_result").show();
		
		var input = $(this).val();
		
		if (input.length > 0) {
			$.ajax({
				type:'GET', 
				url:'search.php',
				data:'q=' + input,
				success:function(data) {
					$(".search_result").html(data);
				}
			});
		}
	});
});

	