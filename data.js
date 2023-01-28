$(document).ready(function () {
  url = "http://localhost/chat/select.php";
  url_insert = "http://localhost/chat/insert.php";

  setInterval(function(){
    $.ajax({
        type: "GET",
        url: url,
        dataType: "json",  
        success: function (result) {
          $("#contenu").empty();
          if (result.items) {
            result.items.forEach((item) => {
              $("#contenu").append(chat(item));
            });
          }
        },
        error: function () {
        //   alert("Erreur, merci de contacter l'administrateur .");
        },
      });
  },1000);
 
  $("form").submit(function (e) {
    $.post(url_insert, {
      message: $(".message").val(),
      pseudo: $(".id").val(),
    });
    $(".message").val("");
    $.ajax({
        type: "GET",
        url: url,
        dataType: "json",   
        success: function (result) {
            
          $("#contenu").empty();
          if (result.items) {
            result.items.forEach((item) => {
                
              $("#contenu").append(chat(item));
            });
          }
        },
        error: function () {
        //   alert("Erreur, merci de contacter l'administrateur .");
        },
      });
  
    return false;
  });

  function chat(item) {
    if (item.pseudo == $(".pseudo").val()) {
      chaine =
        '<div class="msg_me"><p><img src="' +item.image + '"/>'+
        // '<div class="msg_me"><p><img src="person-icon.png" alt="avatar">' +
        item.pseudo +
        "<span>" +
        item.date_message.slice(10, 16) +
        "</span><p> " +
        item.message +
        "</p><div>";
    } else {
      chaine =
        '<div class="msg"><p><img src="' +item.image + '"/>'+
        // '<div class="msg"><p><img src="person-icon.png" alt="avatar">' +
        item.pseudo  
         +
        "<span>" +
        item.date_message.slice(10, 16) +
        "</span><p> " +
        item.message +
        "<div>";
    }
    return chaine;
  }
});
