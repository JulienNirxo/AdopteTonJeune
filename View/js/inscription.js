$(function() {
    document.getElementById('btnInscription').addEventListener('click', function(){
        inscriptionUsers();
    })
})




function inscriptionUsers() {
    var email = document.getElementById('email').value;
    var mdp = document.getElementById('mdp').value;
    var mdp2 = document.getElementById('mdp2').value;
    var nom = document.getElementById('nom').value;
    var prenom = document.getElementById('prenom').value;
    var age = document.getElementById('age').value;
    var ville = document.getElementById('ville').value;
    var adresse = document.getElementById('adresse').value;
    var cp = document.getElementById('cp').value;
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
        dataType:"json",
        data:{inscription: inscription, email: email, mdp: mdp, mdp2: mdp2, nom: nom, prenom: prenom, age: age, ville: ville, adresse: adresse, cp : cp, type: type},
        success: function (responseText) {
            //let responseJson = JSON.parse(responseText);
            //initialisation du tableau
        }, error: function () {}
    })
}