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
                        "</div><br>";
                }else if(tab['ETAT'] === "Valider"){
                    document.getElementById("valider").innerHTML += "<div class='card text-left' style='background-color:lightgrey;'>" +
                            "<form method='post' action='notejeune.php'>" +
                                tab['NOM']+" "+tab['PRENOM']+", "+tab['AGE']+"ans <br> " +
                                "<input type='hidden' name='idjeune' id='idjeune' value='"+tab['ID']+"'>" +
                                "Veuillez le contacter par mail : "+ tab['MAIL'] + "<br>"+
                                "<button type='submit'>Noter le jeune</button>" +
                            "</form>" +
                        "</div><br>";
                }else{
                    document.getElementById("refuser").innerHTML += "<div class='card text-left' style='background-color:lightgrey;'>" +
                        tab['NOM']+" "+tab['PRENOM']+", "+tab['AGE']+"ans <br> " +
                        "</div><br>";
                }
            })
        }, error: function () {}
    })
}
