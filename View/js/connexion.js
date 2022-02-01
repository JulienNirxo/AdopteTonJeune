alert("heheho");

function connexionUsers() {
    alert("test");
    $.ajax({
        type: "POST",
        url: "/PlanningVisualisation/getCollaborateur",
        data:  {service: service, collaborateurs: collaborateurs},
        success: function (responseText) {
            document.getElementById('table-responsive').innerHTML = null;
            let responseJson = JSON.parse(responseText);
            //initialisation du tableau
            for(var i = 1; i <= number; i++ ){
                init(responseJson, i);
            }
        }, error: function () {}
    })
}