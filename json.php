<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body onload="gerarRelatorio()">

<script >
    $d = document;
    function gerarRelatorio(){
        
        $.get("http://localhost/sepex/banco.php", function($atividades){
            var obj = JSON.parse(JSON.stringify($atividades));
            for(var atividade of obj.atividades){
                console.log(atividade.nome_atividade, atividade.data);
            }

            console.log(obj);
        });
    //     $.get( "https://clienteweb2017.000webhostapp.com/loja/categoria/getCategorias.php?loja=bugigangas", function(data){
    //         var obj = JSON.parse(data);
    //         console.log(obj);
    //         for(var categoria of obj.categorias){
    //               $item = $("<a />").attr({"href": "./lista.html?codigo="+ categoria.codigo, "class": "collection-item"}).html(categoria.nome);
    //               $('.collection').append($item);
    //         }
    //   });
    }
    //{"categorias":[{"codigo":"40","nome":"Carros"},{"codigo":"42","nome":"Servi\u00e7os"}]}
    //{"atividades":[{"nome_atividade":"work","data":"2019-08-22","inicio":"13:00:00","termino":"14:30:00"},{"nome_atividade":"Caseiro","data":"2019-08-22","inicio":"13:00:00","termino":"14:30:00"}]}

</script>


<script src="public/assets/js/jquery.min.js"></script>

</body>
</html>