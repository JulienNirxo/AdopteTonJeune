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
    var actuville = document.getElementById("ville-select").value;
    var depart = document.getElementById('departement-select').value;
    var city = 1;
    $.ajax({
        type: "POST",
        url: "functions.php",
        dataType:"json",
        data:{city:city, depart: depart},
        success: function (responseText) {
            console.log(responseText);
            document.getElementById('ville-select').innerHTML = "<option> "+ actuville + " (actuellement)</option>"
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

function sendModif(){
    //input classique
    var Mail = document.getElementById("Mail").value;
    var Nom = document.getElementById("Nom").value;
    var Prenom = document.getElementById("Prenom").value;
    var Age = document.getElementById("Age").value;
    var Adresse = document.getElementById("Adresse").value;
    var departementselect = document.getElementById("departement-select").value;
    var villeselect = document.getElementById("ville-select").value;

    //checkbox
    var Cuisine = document.getElementById("Cuisine").checked;
    var Menage = document.getElementById("Menage").checked;
    var Animaux = document.getElementById("Animaux").checked;
    var Jardinage = document.getElementById("Jardinage").checked;
    var Courses = document.getElementById("Courses").checked;
    var Jeuxdesociete = document.getElementById("Jeuxdesociete").checked;
    var Bricolage = document.getElementById("Bricolage").checked;
    var Livraisonderepas = document.getElementById("Livraisonderepas").checked;
    var Accompagnementvehicule = document.getElementById("Accompagnementvehicule").checked;

    var lesmodifs = 1;

   $.ajax({
        type: "POST",
        url: "functions.php",
        dataType:"json",
        data:{lesmodifs: lesmodifs, Mail: Mail, Nom: Nom, Prenom: Prenom, Age: Age, Adresse: Adresse, departementselect: departementselect, villeselect: villeselect, Cuisine: Cuisine, Menage: Menage, Animaux: Animaux, Jardinag: Jardinage, Courses: Courses, Jeuxdesociete: Jeuxdesociete, Bricolage: Bricolage, Livraisonderepas: Livraisonderepas, Accompagnementvehicule: Accompagnementvehicule},
        success: function (responseText) {
            console.log(responseText);
            document.getElementById('ville-select').innerHTML = "<option> "+ actuville + " (actuellement)</option>"
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