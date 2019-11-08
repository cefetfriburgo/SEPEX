    let id = 0;
    
    let conteudo = document.getElementById('conteudo');
    let registro = '<div id="div'+id+'"class="form-group form-row">';
    registro += '<div class="col">';
    registro += '<label for="data">Data</label>';
    registro += '<input type="date" class="form-control" id="data" name="data'+id+'">';
    registro += '</div>';
    registro += '<div class="col">';
    registro += '<label for="hora_inicio">Hora de início</label>';
    registro += '<input type="time" class="form-control" id="hora_inicio" name="hora_inicio'+id+'">';
    registro += '</div>';
    registro += '<div class="col">';
    registro += '<label for="hora_termino">Hora de término</label>';
    registro += '<input type="time" class="form-control" id="hora_termino" name="hora_termino'+id+'">';
    registro += '</div>';
    
    registro += '<div class="col"><label for=excluir>Excluir</label>';
    registro += '<input type="button" class="btn btn-primary form-control" value="excluir" id=0 onclick="remove('+id+')" name="excluir">';
    registro += '<input type="hidden" name=hide value='+id+'>';
    registro += '</div></div>';
    conteudo.innerHTML = registro;
  
    
    function adicionar(){
        id++;
        let conteudo = document.getElementById('conteudo');
        let div = document.createElement('div');
        registro = '<div class="col">';
        registro += '<label for="data">Data</label>';
        registro += '<input type="date" class="form-control" id="data" name="data'+id+'">';
        registro += '</div>';
        registro += '<div class="col">';
        registro += '<label for="hora_inicio">Hora de início</label>';
        registro += '<input type="time" class="form-control" id="hora_inicio" name="hora_inicio'+id+'">';
        registro += '</div>';
        registro += '<div class="col">';
        registro += '<label for="hora_termino">Hora de término</label>';
        registro += '<input type="time" class="form-control" id="hora_termino" name="hora_termino'+id+'">';
        registro += '</div>';
        
        registro += '<div class="col"><label for=excluir>Excluir</label>';
        registro += '<input type="button" class="btn btn-primary form-control" value="excluir" id="'+id+'" onclick="remove('+id+')" name="excluir">';
        registro += '<input type="hidden" name=hide value='+id+'>';
        registro += '</div>';
        div.id = "div"+id;
        div.classList = "form-group form-row";
        div.innerHTML += registro;        
        conteudo.append(div);
        
    };

    function remove(x){
        let remover = 'div'+x;
        let excluir = document.getElementById(remover);
        excluir.remove();
    }
    

   