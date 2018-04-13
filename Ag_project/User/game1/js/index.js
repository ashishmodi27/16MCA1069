$( ".nextBtn" ).click(function(e) {
	goRight();
});
$( ".backBtn" ).click(function(e) {
	goLeft();
});
function goRight(){ // inner stuff slides left
	var initalLeftMargin = $( ".innerLiner" ).css('margin-left').replace("px", "")*1;
	var newLeftMargin = (initalLeftMargin - 934); // extra 2 for border
	$( ".innerLiner" ).animate({marginLeft: newLeftMargin}, 500);
}
function goLeft(){ // inner stuff slides right
	var initalLeftMargin = $( ".innerLiner" ).css('margin-left').replace("px", "")*1;
	var newLeftMargin = (initalLeftMargin + 934*9); // extra 2 for border
	$( ".innerLiner" ).animate({marginLeft: newLeftMargin}, 500);
}
function qwerty(a,b){
if(a==b){
swal("Good Job!","Congratulations Your answer is correct !","success");
goRight();
}
else{
swal("Sorry !"," Try Again !","error");
}
}
