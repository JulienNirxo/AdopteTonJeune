$(function() {
    inscriptionUsers();
})

function SelectCitie(){
    var cities = 1;
    $.ajax({
        type: "POST",
        url: "functions.php",
        dataType:"json",
        data:{cities:cities},
        success: function (responseText) {
            let responseJson = JSON.parse(responseText);
            responseJson.forEach((MonTableau) =>{
                document.getElementById('MonSelect').innerHTML += "<option value='"+MonTableau['key']+"'>"+MonTableau['MaVille']+"</option>"
            })
            //initialisation du tableau
        }, error: function () {}
    }) 
}
