function afficheChat(){
  $.ajax({
    method: "GET",
    url: "chatAjax.php",
  }).done(function(e) {
    //console.log(e);
    const obj = JSON.parse(e);
    let message = "";
    obj.forEach(element => message += element.nom + " : " + element.msg + "<br/>");
    //console.log(message);
    $("#msg").html(message);
  }).fail(function(e) {
    console.log("prout");
  });
  setTimeout(afficheChat,2000);
}

function ecrireChat(name='inconnu'){
  let msg = document.getElementById("chat").value;
  //console.log(name);
  $.ajax({
      method: "GET",
      url: "ecritureChat.php",
      data:{"nom" : name, "message" : msg}
    }).done(function(e){
        console.log(e);
    }).fail(function(e){
        console.log("prout2");
   });
}
