    let id = 0;
    
    let conteudo = document.getElementById('conteudo');
    let registro = '<div id="div'+id+'"class="form-group form-row">';
    registro += '<div class="col">';
    registro += '<label for="data">Data</label>';
    registro += '<input type="date" class="form-control" id="data" name="data">';
    registro += '</div>';
    registro += '<div class="col">';
    registro += '<label for="hora_inicio">Hora de início</label>';
    registro += '<input type="time" class="form-control" id="hora_inicio" name="hora_inicio">';
    registro += '</div>';
    registro += '<div class="col">';
    registro += '<label for="hora_termino">Hora de término</label>';
    registro += '<input type="time" class="form-control" id="hora_termino" name="hora_termino">';
    registro += '</div>';
    
    registro += '<div class="col"><label for=excluir>Excluir</label>';
    registro += '<input type="button" class="btn btn-primary form-control" value="excluir" id=0 onclick="remove('+id+')" name="excluir">';
    registro += '</div></div>';
    conteudo.innerHTML = registro;
  
    
    function adicionar(){
        id++;
        let conteudo = document.getElementById('conteudo');
        let registro = '<div id="div'+id+'"class="form-group form-row">';
        registro += '<div class="col">';
        registro += '<label for="data">Data</label>';
        registro += '<input type="date" class="form-control" id="data" name="data">';
        registro += '</div>';
        registro += '<div class="col">';
        registro += '<label for="hora_inicio">Hora de início</label>';
        registro += '<input type="time" class="form-control" id="hora_inicio" name="hora_inicio">';
        registro += '</div>';
        registro += '<div class="col">';
        registro += '<label for="hora_termino">Hora de término</label>';
        registro += '<input type="time" class="form-control" id="hora_termino" name="hora_termino">';
        registro += '</div>';
        
        registro += '<div class="col"><label for=excluir>Excluir</label>';
        registro += '<input type="button" class="btn btn-primary form-control" value="excluir" id="'+id+'" onclick="remove('+id+')" name="excluir">';
        // registro += '<input type="button" class="btn btn-primary form-control" value="excluir" onclick="remover('+id+')" id="'+id+'" name="excluir">';
        registro += '</div></div>';
        conteudo.innerHTML += registro;
        
    };

    function remove(x){
        let remover = 'div'+x;
        let excluir = document.getElementById(remover);
        excluir.remove();
    }
    

    

// function dados(){

// }