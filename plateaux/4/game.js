function newGame(){
	$.ajax({
      method: "GET",
      url: "nouvellePartie.php",
    }).done(function(e){
        console.log(e);
    }).fail(function(e){
        console.log("fail");
    });
}

function pointPli(name){
	$.ajax({
		method: "GET",
		url: "pointPli.php",
		data: {"name":name},
	}).done(function(e){
		console.log(e);
	}).fail(function(e){
		console.log("fail");
	});
}
