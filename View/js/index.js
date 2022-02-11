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
                setTimeout(() => {document.getElementById('departement-select').innerHTML += "<option value='" + tab[1]  + "'>"+ tab[2] + "</option>";}, 100);

            })
            //initialisation du tableau
        }, error: function () {}
    }) 
}


