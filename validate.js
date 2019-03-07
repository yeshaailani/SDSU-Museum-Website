/*
    Yesha Ailani
    823351783
    CS545 Assignment #4
*/


function lastModified() {
    var modiDate = new Date(document.lastModified);
    var showAs = modiDate.getDate() + "-" + (modiDate.getMonth() + 1) + "-" + modiDate.getFullYear();
    return showAs
}

function GetTime() {
    var modiDate = new Date();
    var Seconds

    if (modiDate.getSeconds() < 10) {
        Seconds = "0" + modiDate.getSeconds();
    } else {
        Seconds = modiDate.getSeconds();
    }

    var modiDate = new Date();
    var CurTime = modiDate.getHours() + ":" + modiDate.getMinutes() + ":" + Seconds
    return CurTime
}

function updatePage() {
	console.log(document.getElementById('lastUpdated'));
	document.getElementById('lastUpdated').innerHTML = "Last updated on: Date - " + lastModified() + " ,Time - " + GetTime();
	document.getElementById('total_attendees').value = 0;
}

//function used to caluclate the total attendees
function updateTotal()
{
	var id1 = +document.getElementById("id1").value;
	var id2 = +document.getElementById("id2").value;
	var id3 = +document.getElementById("id3").value;
	var id4 = +document.getElementById("id4").value;
	
	document.getElementById('total_attendees').value = id1 + id2 + id3 + id4;
}

// function for capitalising the first letter for first name and last name
String.prototype.capitalize = function(){ return this.toLowerCase().replace( /\b\w/g, function (m) { return m.toUpperCase(); }); };

function setFirstLetterCapital(){
var fname=document.getElementById("firstName").innerHTML;
document.getElementById("firstName").innerHTML = "First Name is:" + String.prototype.capitalize.call(fname);
var lname=document.getElementById("lastName").innerHTML;
document.getElementById("lastName").innerHTML = "Last Name is:" + String.prototype.capitalize.call(lname);

}

//implementing extra functionality of disabling righ click for the users for preventing copying.
var message="Function Disabled!";			

function clickIE() {if (document.all) {alert(message);return false;}}
function clickNS(e) {
	if (document.layers||(document.getElementById&&!document.all)) 
	{
		if (e.which==2||e.which==3) {alert(message);return false;}}
		
	}
		
		if (document.layers) 
		{document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;}
		else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;}

		document.oncontextmenu=new Function("return false")

