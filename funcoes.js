function sonumeros(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}

function apenasletras(evt) {

    evt = (evt) ? evt : event;
    var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode :
            ((evt.which) ? evt.which : 0));
    if (charCode > 32 && (charCode < 65 || charCode > 90) &&
            (charCode < 97 || charCode > 122)) {
        return false;
    }
    return true;
}

function admin_procura_uti_vazio() {
    if ((document.forms['utilizadores'].nif.value === "") && (document.forms['utilizadores'].nome.value === ""))
    {
        alert("Tem de preencher um campo.");
        return false;
    }
    else {
        if ((document.forms['utilizadores'].nif.value !== "") && (document.forms['utilizadores'].nome.value !== ""))
            alert("Nao pode utilizar ambos os campos.");
    }
    return true;
}


function admin_procura_setor_vazio() {
    if (document.forms['setor1'].setor.value === "")
    {
        alert("Tem de preencher um campo.");
        return false;
    }

}

function validar_admin_procurar_uti(form) {

    if (form.nome.value === "") {
    }
    else {
        //Valida o campo Nome
        var letters = /^[A-Za-z\s]+$/;
        if (form.nome.value.match(letters)) {
        }
        else {
            alert('No campo Nome apenas pode introduzir letras!');
            form.nome.focus();
            return false;
        }
    }
//Valida o NIF
    if (form.nif.value === "") {
    }
    else {
        var regra = /^[0-9]+$/;
        var nif = form.nif.value;
        if (nif.match(regra)) {
            if (nif.length !== 9) {
                alert("O campo NIF tem de ter 9 digitos!");
                return false;
            }
        }
        else {
            alert('No campo NIF apenas pode introduzir numeros!');
            form.nif.focus();
            return false;
        }
    }
}


function validar_letras(evt)
{
    if (evt.value !== "") {
        var letters = /^[A-Za-z\s]+$/;
        if (evt.value.match(letters)) {
        }
        else {
            alert('No campo Nome apenas pode introduzir letras!');
            evt.focus();
            return false;
        }
    }
}

function validar_numeros(evt) {
    if (evt.value !== "") {
        var regra = /^[0-9]+$/;
        var nif = evt.value;
        if (nif.match(regra)) {
            if (nif.length !== 9) {
                alert("O campo NIF tem de ter 9 digitos!");
                return false;
            }
        }
        else {
            alert('No campo NIF apenas pode introduzir numeros!');
            return false;
        }
    }
}


function validar_registo(form) {


//Valida o campo Nome
    if (form.nome.value === "") {
        alert("Este campo é de preenchimento obrigatório!.");
        form.nome.focus();
        return false;
    }
    else {
        var letters = /^[A-Za-z\s]+$/;
        if (form.nome.value.match(letters)) {
        }
        else {
            alert('No campo Nome apenas pode introduzir letras!');
            form.nome.focus();
            return false;
        }
    }
//Valida o NIF
    if (form.nif.value === "") {
        alert("Este campo é de preenchimento obrigatório!.");
        form.nif.focus();
        return false;
    }
    else {
        var regra = /^[0-9]+$/;
        var nif = form.nif.value;
        if (nif.match(regra)) {
            if (nif.length !== 9) {
                alert("O campo NIF tem de ter 9 digitos!");
                return false;
            }
        }
        else {
            alert('No campo NIF apenas pode introduzir numeros!');
            form.nif.focus();
            return false;
        }
    }
//Valida o e-mail
    if (form.mail.value === "") {
        alert("Este campo é de preenchimento obrigatório!.");
        form.mail.focus();
        return false;
    }
    else {
        var x = form.mail.value;
        var atpos = x.indexOf("@");
        var dotpos = x.lastIndexOf(".");
        if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= x.length)
        {
            alert("Endereço de email inválido!");
            form.mail.focus();
            return false;
        }
    }
    //Validar o telefone
    if (form.telefone.value === "") {
        alert("Este campo é de preenchimento obrigatório!.");
        form.telefone.focus();
        return false;
    }
    else {
        var regra = /^[0-9]+$/;
        var tel = form.telefone.value;
        if (tel.match(regra)) {
            if (tel.length !== 9) {
                alert("O campo telefone tem de ter 9 digitos!");
                form.telefone.focus();
                return false;
            }
        }
        else {
            alert('No campo telefone apenas pode introduzir numeros!');
            form.telefone.focus();
            return false;
        }
    }
//Valida o Setor
    if (form.setor.value === "") {
        alert("O campo Setor é de preenchimento obrigatório!.");
        form.setor.focus();
        return false;
    }
}

function admin_guardar_alteracoes()
{

    //dados a enviar, vai buscar os valores dos campos que queremos enviar para a BD
    var dadosajax = {
        'email': $("#email").val(),
        'morada': $("#morada").val(),
        'telefone': $("#telefone").val(),
        'tipo': $("#tipo").val(),
        'nif': $("#nif").val()
    };
    pageurl = 'admin_procurar_uti_guardaralteracoes.php';

    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        error: function() {
            alert('Erro: Inserir Registo!!');
        },
        //retorna o resultado da pagina para onde enviamos os dados
        success: function(result)
        {

            //INCOMPLETO --- ERRO AOS PASSAR O RESULT DO PHP
            //se foi inserido com sucesso
            if ((result.val) === 1)
            {
                alert("O seu registo foi inserido com sucesso!");
            }
            //se foi um erro
            else
            {
                alert("Ocorreu um erro ao inserir o seu registo!");
            }

        }
    });
}


function admin_encerrar_atividade()
{

    //dados a enviar, vai buscar os valores dos campos que queremos enviar para a BD
    var dadosajax = {
        'nif': $("#nif").val()
    };
    pageurl = 'admin_procurar_uti_encerraratividade.php';

    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        error: function() {
            alert('Erro: Inserir Registo!!');
        },
        //retorna o resultado da pagina para onde enviamos os dados
        success: function(result)
        {

            //INCOMPLETO --- ERRO AOS PASSAR O RESULT DO PHP
            //se foi inserido com sucesso
            if ((result.val) == "1")
            {
                alert("Ocorreu um erro ao inserir o seu registo!");
            }
            //se foi um erro
            else
            {
                alert("O seu registo foi introduzido com sucesso!");
            }

        }
    });
}

function admin_guardar_alteracoes_setor()
{

    //dados a enviar, vai buscar os valores dos campos que queremos enviar para a BD
    var dadosajax = {
        'id': $("#setor").val(),
        'nome': $("#nome").val(),
        'percentagem_iva': $("#perc_iva").val(),
        'beneficio': $("#beneficio").val()
    };
    pageurl = 'admin_procurar_setor_guardaralteracoes.php';

    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        error: function() {
            alert('Erro: Inserir Registo!!');
        },
        //retorna o resultado da pagina para onde enviamos os dados
        success: function(result)
        {

            //INCOMPLETO --- ERRO AOS PASSAR O RESULT DO PHP
            //se foi inserido com sucesso
            if ((result.val) == "1")
            {
                alert("Ocorreu um erro ao inserir o seu registo!");
            }
            //se foi um erro
            else
            {
                alert("O seu registo foi inserido com sucesso!");
            }

        }
    });
}

/*
function verificar_uti_reg(){
    $ajax({
       type: 'POST',
       url: 'admin_registar_comerciante_verificar.php',
       data: { nif : $('#nif').val()},
       error: function() { alert('Erro!!');},
       success: function(result){ 
                if ((result.val) === 1 ) {alert("O seu registo foi inserido com sucesso!");
                return false;}
                else { alert("Ocorreu um erro ao inserir o seu registo! MAS TA A DAR, TENHO DE MUDAR ISTO");}
                }
       
    });

}
*/

function verificar_setor(form){
    if (form.nome.value === "") {
        alert("Este campo é de preenchimento obrigatório!.");
        form.nome.focus();
        return false;
    }
    else {
        var letters = /^[A-Za-z\s]+$/;
        if (form.nome.value.match(letters)) {
        }
        else {
            alert('No campo Nome apenas pode introduzir letras!');
            form.nome.focus();
            return false;
        }
    }
    
    if(form.iva.value === ""){
        alert("O campo de IVA é de preenchimento obrigatório");
        form.iva.focus();
        return false;
    }
    else{ if(form.iva.value > -1 && form.iva.value < 101){
                       
    } else {
        alert("Os valores introduzidos do IVA apenas podem ser entre 0 e 100");
        return false;
    }
    }
    
    if(form.percentagem.value === ""){
        alert("O preenchimento da Percentagem de Beneficio é obrigatório");
        return false;
    
        } else{
            
            if(form.percentagem.value > -1 && form.percentagem.value < 101){
                
        } else {
            
            alert("Os valores introduzidos da Percentagem de Benefício apenas podem ser entre 0 e 100 ");
            return false;
        }
    }

}

        function iva(){     
                 
        var total = document.getElementById("total");
        var taxa = document.getElementById("taxa");
                                        
        var valor_iva = parseFloat(total.value) * parseFloat(taxa.value);
        
        var iva = valor_iva.toFixed(2);
        
        var baseTributavel = parseFloat(total.value) - valor_iva;
        var base = baseTributavel.toFixed(2);
                    
        document.getElementById("valor_iva").value = iva;
        document.getElementById("base_tributavel").value = base;
        }
        
        
        
        
        
function comerciante_guardar()
{

    //dados a enviar, vai buscar os valores dos campos que queremos enviar para a BD
    var dadosajax = {
        'email': $("#email").val(),
        'morada': $("#morada").val(),
        'telefone': $("#telefone").val(),
        'tipo': $("#tipo").val(),
        'nif': $("#nif").val(),
        'password': $("#password").val()
    };
    pageurl = 'comerciante_consultar_guardar.php';

    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        error: function() {
            alert('Erro: Inserir Registo!!');
        },
        //retorna o resultado da pagina para onde enviamos os dados
        success: function(result)
        {

            //INCOMPLETO --- ERRO AOS PASSAR O RESULT DO PHP
            //se foi inserido com sucesso
            if ((result.val) === 1)
            {
                alert("Ocorreu um erro ao inserir o seu registo!");
            }
            //se foi um erro
            else
            {
                alert("O seu registo foi inserido com sucesso!");
            }

        }
    });
}

function comerciante_encerrar_atividade()
{

    //dados a enviar, vai buscar os valores dos campos que queremos enviar para a BD
    var dadosajax = {
        'nif': $("#nif").val()
    };
    pageurl = 'comerciante_consultar_encerrar.php';

    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        error: function() {
            alert('Erro: Inserir Registo!!');
        },
        //retorna o resultado da pagina para onde enviamos os dados
        success: function(result)
        {

            //INCOMPLETO --- ERRO AOS PASSAR O RESULT DO PHP
            //se foi inserido com sucesso
            if ((result.val) == "1")
            {
                alert("Ocorreu um erro ao inserir o seu registo!");
            }
            //se foi um erro
            else
            {
                alert("A atividade foi encerrada com sucesso!");
            }

        }
    });
}

function alterar_pass() {
    if (document.forms['pass'].password.value === "")
    {
        alert("Tem de preencher um campo.");
        return false;
    }
    else {
       
    }
    return true;
}

function consumidor_guardar()
{

    //dados a enviar, vai buscar os valores dos campos que queremos enviar para a BD
    var dadosajax = {
        'email': $("#email").val(),
        'morada': $("#morada").val(),
        'telefone': $("#telefone").val(),
        'tipo': $("#tipo").val(),
        'nif': $("#nif").val(),
        'password': $("#password").val()
    };
    pageurl = 'consumidor_consultar_guardar.php';

    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        error: function() {
            alert('Erro: Inserir Registo!!');
        },
        //retorna o resultado da pagina para onde enviamos os dados
        success: function(result)
        {

            //INCOMPLETO --- ERRO AOS PASSAR O RESULT DO PHP
            //se foi inserido com sucesso
            if ((result.val) === 1)
            {
                alert("Ocorreu um erro ao inserir o seu registo!");
            }
            //se foi um erro
            else
            {
                alert("O seu registo foi inserido com sucesso!");
            }

        }
    });
}