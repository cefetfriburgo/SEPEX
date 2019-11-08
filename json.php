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
  
</script>


<script src="public/assets/js/jquery.min.js"></script>

</body>
</html>