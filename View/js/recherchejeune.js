function sendContrat(id){
    var contrat = 1;
    $.ajax({
        type: "POST",
        url: "functions.php",
        dataType:"json",
        data:{contrat:contrat, id:id},
        success: function (responseText) {
            console.log(responseText);
            var string1 = JSON.stringify(responseText);
            let responseJson = JSON.parse(string1);
            if(responseJson != null){
                alert(responseJson);
            }else{
                alert("Demande bien envoyé !");
            }

            //initialisation du tableau
        }, error: function () {}
    })
}