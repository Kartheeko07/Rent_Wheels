
  $(#"btn-submit").click(function(){
	
	$.post( $("#register-form").attr("action"),
	$("#register-form :input").serializeArray(),
	function(info){
		$("#ack").empty();
		$("#ack").html(info);
		clear();
	});
	
	$("#register-form").submit(function(){
	return false;
  });
  
});
function clear(){
	$("#register-form :input").each(function(){
		$(this).val("");
	})
	
}