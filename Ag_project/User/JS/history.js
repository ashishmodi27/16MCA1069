 $('.item-content').hide();
$(document).on('click','.item-title', function(e){
   e.preventDefault();
   $(this).next('.item-content').toggle();
});