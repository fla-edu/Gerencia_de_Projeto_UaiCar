// Inicia ao carregar a página
$().ready(function(){

    consultaClientes();

});

// Select 2
$('.select2').select2();

$(document).ready(function domReady() {
    $(".select2-material").select2({
        theme: "material" });


    $(".select2-selection__arrow").
    addClass("material-icons").
    html("arrow_drop_down");
});


function consultaClientes(){

    let controller = 'Cliente';
    $.ajax({
        url: '../../../backend/index.php',
        data: {
            read: 2,
            controller: controller,
        },
        type: 'POST',
        success: function(data){

            let obj = JSON.parse(data);
            let conteudo = "";

            for(let i = 0; i < obj.length; i++){
                conteudo += `<option value=${obj[i].ID}>${obj[i].Nome}</option>`;
            }
            $('#id_cliente').append(conteudo);
        }
    });
    
}

// Ao clicar no botão do modal de cadastrar funcionário
$('#btn_Cadastra_Cliente').click(function(){

    event.preventDefault();

    let nome = $('#nome').val();
    let email = $('#email').val();
    let rg = $('#rg').val();
    let cnh = $('#cnh').val();
    let nascimento = $('#nascimento').val();
    let estado = $('#estado').val();
    let cidade = $('#cidade').val();
    let endereco = $('#endereco').val();
    let controller = 'Cliente';


    if(nome && email && rg && cnh && nascimento && estado && cidade && endereco){
        $.ajax({
            url: '../../../backend/index.php',
            data: {
                insert: 1,
                controller: controller,
                nome: nome,
                email: email,
                rg: rg,
                cnh: cnh,
                nascimento: nascimento,
                estado: estado,
                cidade: cidade,
                endereco: endereco
            },
            type: 'POST',
            success: function(data){
                let obj = JSON.parse(data);

                if(obj[0].RETORNO == 1) {
                    alertaRetorno('Cadastro de Cliente', `${obj[0].MENSAGEM}`, 'success',3000,false);
                    
                }else if (obj[0].RETORNO == 0){
                    alertaRetorno('Cadastro de Cliente', `${obj[0].MENSAGEM}`,'error',3000,false);
                }

                $('.bd-example-modal-md').modal('hide');
                consultaClientes();
                listaclientes();
            },
            error: function(){
                alertaRetorno('Cadastro de Cliente', 'Erro, tente novamente.','error',3000,false);
            }
        });
    }else{
        alertaRetorno('Cadastro de Cliente', 'Preencha todos os campos!','error',3000,false);
    }
   
    
});

// Listar os Funcionários na Table

$(document).on('change', '#id_cliente', function(){
    let ID = this.value;
    listacliente(ID);
    $('#tabelaCliente').val(ID);
    $('#tabelaCliente').removeClass('d-none');
});



const listacliente = (ID) =>{
    fetch(`../../../backend/index.php`, {
        credentials: 'same-origin',
        method: `POST`,
        body: `read=1&controller=Cliente&id=${ID}`,
        headers: {'Content-type':'application/x-www-form-urlencoded'}
    })
    .then(function(response) {
        response.json().then(data =>{
            $("#nome_cliente").val(data[0].Nome);
            $("#email_cliente").val(data[0].Email);
            $("#rg_cliente").val(data[0].RG);
            $("#cnh_cliente").val(data[0].CNH);
            $("#nascimento_cliente").val(data[0].Nascimento);
            $("#estado_cliente").val(data[0].Estado);
            $("#cidade_cliente").val(data[0].Cidade);
            $("#endereco_cliente").val(data[0].Endereco);
 
        })
    })
    .catch (function(err) {
        throw err;
    })
}

// Atualiza Funcionário e Ativo
$(document).on('click', '#btn_Atualiza_Cliente', function(){

    let ID = $('#tabelaCliente').val();
    let controller = 'Cliente'
    let nome = $('#nome_cliente').val();
    let email = $('#email_cliente').val();
    let rg = $('#rg_cliente').val();
    let cnh = $('#cnh_cliente').val();
    let nascimento = $('#nascimento_cliente').val();
    let estado = $('#estado_cliente').val();
    let cidade = $('#cidade_cliente').val();
    let endereco = $('#endereco_cliente').val();


    $.ajax({
        url: '../../../backend/index.php',
        data: {
            update: 1,
            controller: controller,
            id: ID,
            nome: nome,
            email: email,
            rg: rg,
            cnh: cnh,
            nascimento: nascimento,
            estado: estado,
            cidade: cidade,
            endereco: endereco
        },
        type: 'POST',
        success: function(data){

            let obj = JSON.parse(data);

            if(obj[0].RETORNO == 1) {
                alertaRetorno('Atualização de Cliente', `${obj[0].MENSAGEM}`, 'success',3000,false);
                
            }else if (obj[0].RETORNO == 0){
                alertaRetorno('Atualização de Cliente', `${obj[0].MENSAGEM}`,'error',3000,false);
            }
        },
        error: function(){
            alertaRetorno('Atualização de Cliente', 'Erro, tente novamente.','error',3000,false);
        }
        
    });
});


$("#modal-cadastra-cliente").on("hidden.bs.modal", function(){
    $("#nome").val('');
    $("#email").val('');
    $("#rg").val('');
    $("#cnh").val('');
    $("#nascimento").val('');
    $("#estado").val('');
    $("#cidade").val('');
    $("#endereco").val('');
});