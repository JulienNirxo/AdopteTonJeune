$(function() {
    SelectDepart();
})

function SelectDepart(){
    var depart = 1;
    $.ajax({
        type: "POST",
        url: "functions.php",
        dataType:"json",
        data:{depart:depart},
        success: function (responseText) {
            console.log(responseText);
            var string1 = JSON.stringify(responseText);
            let responseJson = JSON.parse(string1);
            responseJson.forEach((tab) =>{
                document.getElementById('departement-select').innerHTML += "<option value='" + tab[1]  + "'>(" + tab[1]  + ") "+ tab[2] + "</option>";
            })
            SelectVille();
            //initialisation du tableau
        }, error: function () {}
    })
}

function SelectVille(){
    var depart = document.getElementById('departement-select').value;
    var city = 1;
    $.ajax({
        type: "POST",
        url: "functions.php",
        dataType:"json",
        data:{city:city, depart: depart},
        success: function (responseText) {
            console.log(responseText);
            document.getElementById('ville-select').innerHTML = ""
            var string1 = JSON.stringify(responseText);
            let responseJson = JSON.parse(string1);
            responseJson.forEach((tab) =>{
                document.getElementById('ville-select').innerHTML += "<option value='" + tab[0]  + "'> "+ tab[4] + "</option>";
            })
            //initialisation du tableau
        }, error: function () {
        }
    })
}




function inscriptionUsers() {
    var email = document.getElementById('email').value;
    var mdp = document.getElementById('mdp').value;
    var mdp2 = document.getElementById('mdp2').value;
    var nom = document.getElementById('nom').value;
    var prenom = document.getElementById('prenom').value;
    var age = document.getElementById('age').value;
    var ville = document.getElementById('ville-select').value;
    var adresse = document.getElementById('adresse').value;
    var radios = document.getElementsByName('type');
    for(var i = 0; i < radios.length; i++){
        if(radios[i].checked){
            var type = radios[i].value;
        }
    }

    var inscription = 1;


    $.ajax({
        type: "POST",
        url: "functions.php",
        data:{inscription: inscription, email: email, mdp: mdp, mdp2: mdp2, nom: nom, prenom: prenom, age: age, ville: ville, adresse: adresse, type: type},
        success: function () {
            document.location.href="connexion.php";
        }, error: function () {}
    })
}