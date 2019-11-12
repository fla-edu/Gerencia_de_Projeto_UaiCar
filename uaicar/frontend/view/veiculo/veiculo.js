// Inicia ao carregar a página
$().ready(function(){

    consultaVeiculos();

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

// Ao clicar no botão do modal de cadastrar Veículo
$('#btn_Cadastra_Veiculo').click(function(){

    event.preventDefault();

    let marca = $('#marca').val();
    let modelo = $('#modelo').val();
    let placa = $('#placa').val();
    let ano = $('#ano').val();
    let km_inicial = $('#km_inicial').val();
    let preco = $('#preco').val();
    let data_aquisicao = $('#data_aquisicao').val();
    let controller = 'Veiculo';

    if(marca && modelo && placa && ano && km_inicial && preco && data_aquisicao){
        $.ajax({
            url: '../../../backend/index.php',
            data: {
                insert: 1,
                controller: controller,
                marca: marca,
                modelo: modelo,
                placa: placa,
                ano: ano,
                km_inicial: km_inicial,
                preco: preco,
                data_aquisicao: data_aquisicao
            },
            type: 'POST',
            success: function(data){
                let obj = JSON.parse(data);

                if(obj[0].RETORNO == 1) {
                    alertaRetorno('Cadastro de Veículo', `${obj[0].MENSAGEM}`, 'success',3000,false);
                    
                }else if (obj[0].RETORNO == 0){
                    alertaRetorno('Cadastro de Veículo', `${obj[0].MENSAGEM}`,'error',3000,false);
                }

                $('.bd-example-modal-md').modal('hide');
                consultaVeiculos();
                listaVeiculos();
            },
            error: function(){
                alertaRetorno('Cadastro de Veículo', 'Erro, tente novamente.','error',3000,false);
            }
        });
    }else{
        alertaRetorno('Cadastro de Veículo', 'Preencha todos os campos!','error',3000,false);
    }
   
});

function consultaVeiculos(){

    let controller = 'Veiculo';
    $.ajax({
        url: '../../../backend/index.php',
        data: {
            read: 1,
            controller: controller,
        },
        type: 'POST',
        success: function(data){

            let obj = JSON.parse(data);
            let conteudo = "";

            for(let i = 0; i < obj.length; i++){
                conteudo += `<option value=${obj[i].ID}>${obj[i].Marca} - ${obj[i].Modelo} - ${obj[i].Placa}</option>`;
            }
            $('#id_veiculo').append(conteudo);
        }
    });
    
}   

$(document).on('change', '#id_veiculo', function(){
    let ID = this.value;
    console.log(ID);
    listaVeiculos(ID);
    $('#tabelaVeiculo').val(ID);
    $('#tabelaVeiculo').removeClass('d-none');
});

const listaVeiculos = (ID) =>{
    fetch(`../../../backend/index.php`, {
        credentials: 'same-origin',
        method: `POST`,
        body: `read=2&controller=Veiculo&id=${ID}`,
        headers: {'Content-type':'application/x-www-form-urlencoded'}
    })
    .then(function(response) {
        response.json().then(data =>{
            $("#marca_veiculo").val(data[0].Marca);
            $("#modelo_veiculo").val(data[0].Modelo);
            $("#placa_veiculo").val(data[0].Placa);
            $("#ano_veiculo").val(data[0].Ano);
            $("#km_inicial_veiculo").val(data[0].KM_Inicial);
            $("#km_atual_veiculo").val(data[0].KM_Atual);
            $("#preco_veiculo").val(data[0].Preco_Diario);
            $("#data_aquisicao_veiculo").val(data[0].Data_Aquisicao);
            let conteudo = '';
            if(data[0].Ativo == 1) {
                conteudo +=
                    `<option selected="true" value="1">Ativo</option>
                    <option value="0">Inativo</option>
                `
            } else {
                conteudo +=
                `   <option selected="true" value="0">Inativo</option>
                    <option value="1">Ativo</option>
                `
            }
            $('#ativo_veiculo').append(conteudo);
        })
    })
    .catch (function(err) {
        throw err;
    })
}

// Atualiza Funcionário e Ativo
$(document).on('click', '#btn_atualiza_veiculo', function(){

    let controller = 'Veiculo'
    let ID = $('#tabelaVeiculo').val();
    let marca = $('#marca_veiculo').val();
    let modelo = $('#modelo_veiculo').val();
    let placa = $('#placa_veiculo').val();
    let ano = $('#ano_veiculo').val();
    let km_inicial = $('#km_inicial_veiculo').val();
    let km_atual = $('#km_atual_veiculo').val();
    let preco = $('#preco_veiculo').val();
    let data_aquisicao = $('#data_aquisicao_veiculo').val();
    let ativo = $('#ativo_veiculo').val();

    $.ajax({
        url: '../../../backend/index.php',
        data: {
            update: 1,
            controller: controller,
            ID: ID,
            marca: marca,
            modelo: modelo,
            placa: placa,
            ano: ano,
            km_inicial: km_inicial,
            km_atual: km_atual,
            preco: preco,
            data_aquisicao: data_aquisicao,
            ativo: ativo
        },
        type: 'POST',
        success: function(data){

            let obj = JSON.parse(data);

            if(obj[0].RETORNO == 1) {
                alertaRetorno('Atualização de Veículo', `${obj[0].MENSAGEM}`, 'success',3000,false);
                
            }else if (obj[0].RETORNO == 0){
                alertaRetorno('Atualização de Veículo', `${obj[0].MENSAGEM}`,'error',3000,false);
            }
        },
        error: function(){
            alertaRetorno('Atualização de Veículo', 'Erro, tente novamente.','error',3000,false);
        }
        
    });
});



$("#modal-cadastra-veiculo").on("hidden.bs.modal", function(){
    $("#marca").val('');
    $("#modelo").val('');
    $("#placa").val('');
    $("#ano").val('');
    $("#km_inicial").val('');
    $("#preco").val('');
    $("#data_aquisicao").val('');
});