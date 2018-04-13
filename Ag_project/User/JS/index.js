$(document).ready(function(){
    $("#select").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue == "all"){
                $("#div1").hide();
            } else{
                $("#div1").show();
            }
        });
    }).change(); 
	  
     $("#div1").hide();
    
	$('select[name="select"]').on('change',function(){
	var name = $('select[name="select"]').val();
	if($.trim(name) !=''){
		console.log(name);
		$.post('fetch_subcategory.php', { name: name }, function(data){
		$('#doll').html(data);
		});
	}
});
});

