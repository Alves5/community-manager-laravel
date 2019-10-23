//JS da página de trocar senha
function validarSenhas(){
    var valida = true;
    var novaSenha = document.forms['formTrocarSenha'].novaSenha.value.length;
    if(novaSenha < 6 || novaSenha > 12){
            Swal.fire(
                'Nova senha',
                'A senha deve conter entre 6 e 12 caracteres',
                'warning'
            )
        valida = false
    }else{
        var repitaSenha = document.forms['formTrocarSenha'].repitaSenha.value.length;
        if(repitaSenha < 6 || repitaSenha > 12){
            Swal.fire(
                'Repita senha',
                'A senha deve conter entre 6 e 12 caracteres',
                'warning'
            )
            valida = false
        }else{
            if(repitaSenha != novaSenha){
                Swal.fire(
                    'Senhas',
                    'As senhas devem ser iguais.',
                    'warning'
                )
                valida = false
            }
        }
    }
    
    if(valida == true){
        Swal.fire({
            title: 'Nova senha',
            text: 'A sua senha foi alterada com sucesso.',
            type: 'success',
        }).then((result) => {
            if(result.value){
                document.forms['formTrocarSenha'].submit();    
            }
        })
        
    }
    
}

//JS da página de Editais
function detailEdital(id){
    window.location.href = "/DetailEdital/"+id;
}
function enviarPesquisa(){
    document.forms['formSearch'].submit();
}
function editalRemove(id){
    Swal.fire({
        title: 'Deseja mesmo excluir?',
        text: "Realmente deseja remover o edital",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, remover!'
      }).then((result) => {
        if (result.value) {
          window.location.href = "/RemoveEdital/"+id;
        }
      })
}