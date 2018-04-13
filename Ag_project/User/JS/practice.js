// 	document.cd.disp.value = dis(mins,secs); 
// 	if((mins ==1) && (secs == 0)) 
//  		window.alert("Only 1 minute remains...\nSpeed Up"); 
  	
// 	if((mins == 0) && (secs == 0)) {
//  		window.alert("Time is up. Press OK to continue."); 
//  		answers.submit();
//  		console.log("submitted");
// 	} else {
 //		cd = setTimeout("redo()",1000);
 //	}
//}

var numQuestions,
    navs;
function init() {
  numQuestions = document.getElementsByClassName("qButton").length;
  navs = document.getElementsByClassName('navbutton');
  show(0);
}
window.onload = init;
var currentQuestion = 0;
document.getElementsByClassName("qPanel")[0].className+=" active";
document.getElementsByClassName("qButton")[0].className+=" current";

function show(i)
{
    document.getElementsByClassName("current")[0].className="qButton";
    document.getElementsByClassName("active")[0].className="qPanel";
    
    document.getElementsByClassName("qPanel")[i].className+=" active";
    document.getElementsByClassName("qButton")[i].className+=" current";
    
    navs[0].style.display = i===0 ? 'none' : '';
    navs[1].style.display = i===numQuestions-1 ? 'none' : '';
    
    currentQuestion=i;
    
}
function nav(offset)
{
    var targetQuestion = currentQuestion + offset;
    if ( targetQuestion>=0 && targetQuestion< document.getElementsByClassName("qButton").length)
        show(targetQuestion);
    
}