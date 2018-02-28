$(document).ready(function() {

	readFlagOnDb();
	checkSensor();

});

function checkSensor() {
	setInterval(function() {
		readFlagOnDb();
	}, 1000 * 3); 
};

function readFlagOnDb() {
	$.ajax({url: "functions.php", success: function(result){
        if(result == 0) {
        	$( "#vacantDiv" ).css( "visibility", "visible" );
        	$( "#occupiedDiv" ).css( "visibility", "collapse" );
        	$("#body").css("background", "#58c496")
        } else {
        	$( "#vacantDiv" ).css( "visibility", "collapse" );
        	$( "#occupiedDiv" ).css( "visibility", "visible" );
        	$( "#body" ).css( "background", "#bf6e75" )
        }
    }});
}