$(function() {
    mesDemandes();
})

function mesDemandes() {
    var mesDemandes = 1;
    $.ajax({
        type: "POST",
        url: "functions.php",
        dataType:"json",
        data:{mesDemandes:mesDemandes},
        success: function (responseText) {
            var string1 = JSON.stringify(responseText);
            let responseJson = JSON.parse(string1);
            responseJson.forEach((tab) => {
                document.getElementById("demande").innerHTML += "<div id='mesDemandes-"+tab['ID']+"' class='card text-left' style='background-color:lightgrey;'>" +
                                                                        tab['NOM']+" "+tab['PRENOM']+", "+tab['AGE']+"ans <br> " +
                                                                        "Habite à "+tab['name']+", "+tab['ADRESSE']+" ("+tab['zip_code']+") <br>" +
                                                                        "<button onclick='mesDemandesValide("+tab['ID']+")'>Valider</button>" +
                                                                        "<button onclick='mesDemandesInvalide("+tab['ID']+")'>Annuler</button>" +
                                                                        "</div>";
            })
        }, error: function () {}
    })
}

function mesDemandesValide(ID){
    var mesDemandesValide = 1;
    $.ajax({
        type: "POST",
        url: "functions.php",
        dataType:"json",
        data:{mesDemandesValide:mesDemandesValide},
        success: function (reponse) {
            document.getElementById("mesDemandes-"+ID).style.display = "none";
            alert("Merci d'avoir accepté la demande ! Attendez que le vieux vous contacte par mail.")
        }, error: function () {
            alert("error");
        }
    })

}

function mesDemandesInvalide(ID){
    var mesDemandesInvalide = 1;
    $.ajax({
        type: "POST",
        url: "functions.php",
        dataType:"json",
        data:{mesDemandesInvalide:mesDemandesInvalide},
        success: function (reponse) {
            document.getElementById("mesDemandes-"+ID).style.display = "none";
        }, error: function () {
            alert("error");
        }
    })
}