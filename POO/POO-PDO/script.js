//Função validar dados clientes

function validarDadosCliente(){

    if(formulario.nome.value.length < 3 || formulario.nome.value.length == "" ){
        formulario.nome.focus();
        alert("Preencha o campo nome corretamente\n Verifique se o nome possui mais do que 3 caracteres");
        return false;
    }

    if(formulario.email.value.indexOf('@') == -1 || formulario.email.value.indexOf('.') == -1){
        formulario.nome.focus();
        alert("preencha o campo email corretamente");
        return false;
    }

    if(formulario.observacao.value.length > 1000){
        formulario.nome.focus();
        alert("excedeu a capacidade de caracteres\nNo momento possui "+ formulario.observacao.value.length);
    }
}