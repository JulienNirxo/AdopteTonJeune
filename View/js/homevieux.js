$(function() {
    getDemande();
})

function getDemande(){
    var mesDemandesVieux = 1;
    $.ajax({
        type: "POST",
        url: "functions.php",
        dataType:"json",
        data:{mesDemandesVieux:mesDemandesVieux},
        success: function (responseText) {
            var string1 = JSON.stringify(responseText);
            let responseJson = JSON.parse(string1);
            console.log(responseJson);
            responseJson.forEach((tab) => {
                if(tab['ETAT'] === "En attente"){
                    document.getElementById("enattente").innerHTML += "<div class='card text-left' style='background-color:lightgrey;'>" +
                        tab['NOM']+" "+tab['PRENOM']+", "+tab['AGE']+"ans <br> " +
                        "</div>";
                }else if(tab['ETAT'] === "Valider"){
                    document.getElementById("valider").innerHTML += "<div class='card text-left' style='background-color:lightgrey;'>" +
                            "<form method='post' action='connexion.php'>" +
                                tab['NOM']+" "+tab['PRENOM']+", "+tab['AGE']+"ans <br> " +
                                "Veuillez le contacter par mail : "+ tab['MAIL'] +
                            "</form>" +
                        "</div>";
                }else{
                    document.getElementById("refuser").innerHTML += "<div class='card text-left' style='background-color:lightgrey;'>" +
                        tab['NOM']+" "+tab['PRENOM']+", "+tab['AGE']+"ans <br> " +
                        "</div>";
                }
            })
        }, error: function () {}
    })
}
