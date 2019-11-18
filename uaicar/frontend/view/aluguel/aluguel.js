// Inicia ao carregar a página
$().ready(function(){

    listaCliente();
    listaVeiculo();
    listaAluguel();

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

function listaCliente(){

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
                if(obj[i].Ativo == 1) {
                    conteudo += `<option value=${obj[i].ID}>${obj[i].Nome}</option>`;
                }
            }
            $('#id_cliente').append(conteudo);
        }
    });
    
}

function listaVeiculo(){

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
            let preco;
            for(let i = 0; i < obj.length; i++){
                if(obj[i].Ativo == 1) {
                    preco = parseFloat(obj[i].Preco_Diario);
                    preco = preco.toFixed(2);
                    conteudo += `<option value=${obj[i].ID}>${obj[i].Marca} - ${obj[i].Modelo} - ${obj[i].Placa} - R$${preco}</option>`;
                }
            }
            $('#id_veiculo ').append(conteudo);
        }
    });
    
}


// Ao clicar no botão do modal de cadastrar Veículo
$('#btn_Cadastra_Aluguel').click(function(){

    event.preventDefault();

    let ID_Cliente = $('#id_cliente').val();
    let ID_Veiculo = $('#id_veiculo').val();
    let Dias = $('#id_dias').val();
    let Data_Aluguel = $('#id_data_aluguel').val();
    let Data_Entrega = $('#id_data_entrega').val();
    let Preco = $('#id_preco').val();
    if(Preco){
        Preco = Preco.split('$');
        Preco = Preco[1].trim();
    }
    let Pagamento = $('#id_pagamento').val();
    let controller = 'Aluguel';
    let Usuario = $('#usuario').text();

    if(ID_Cliente && ID_Veiculo && Dias && Data_Aluguel && Data_Entrega && Preco && Pagamento){
        $.ajax({
            url: '../../../backend/index.php',
            data: {
                insert: 1,
                controller: controller,
                ID_Cliente: ID_Cliente,
                ID_Veiculo: ID_Veiculo,
                Dias: Dias,
                Data_Aluguel: Data_Aluguel,
                Data_Entrega: Data_Entrega,
                Preco: Preco,
                Pagamento: Pagamento,
                Usuario: Usuario
            },
            type: 'POST',
            success: function(data){
                let obj = JSON.parse(data);

                if(obj[0].RETORNO == 1) {
                    alertaRetorno('Cadastro de Aluguel', `${obj[0].MENSAGEM}`, 'success',3000,false);
                    listaAluguel();
                    
                }else if (obj[0].RETORNO == 0){
                    alertaRetorno('Cadastro de Aluguel', `${obj[0].MENSAGEM}`,'error',3000,false);
                }

                $('.bd-example-modal-md').modal('hide');

            },
            error: function(){
                alertaRetorno('Cadastro de Aluguel', 'Erro, tente novamente.','error',3000,false);
            }
        });
    }else{
        alertaRetorno('Cadastro de Aluguel', 'Preencha todos os campos!','error',3000,false);
    }
   
});
   

$('#id_dias').focusout(function(){
    let veiculo = $('#id_veiculo option:selected').text().split('$');
    veiculo = veiculo[1];
    let preco = veiculo * this.value;
    preco = preco.toFixed(2);
    $('#id_preco').val(`R$ ${preco}`);
    
});

$('#id_dias_finaliza').focusout(function(){

    let veiculo = $('#id_veiculo_finaliza').val().split('$');
    veiculo1 = veiculo[1];
    let dias_atraso = $('#id_dias_atraso_finaliza').val();
    let preco = veiculo1 * (eval(this.value) + eval(dias_atraso));
    preco = preco.toFixed(2)
    $('#id_preco_finaliza').val(`R$ ${preco}`);
    
});

$('#id_dias_atraso_finaliza').focusout(function(){

    let veiculo = $('#id_veiculo_finaliza').val().split('$');
    veiculo1 = veiculo[1];
    let dias_atraso = $('#id_dias_finaliza').val();
    let preco = veiculo1 * (eval(this.value) + eval(dias_atraso));
    preco = preco.toFixed(2)
    $('#id_preco_finaliza').val(`R$ ${preco}`);
    
});

$('#id_data_aluguel').focusout(function(){
    let dias = $('#id_dias').val();
    var splitDate = this.value.split('-');

    var day = splitDate[0];
    var month = splitDate[1];
    var year = splitDate[2]; 

    let data =  month + '-' + day + '-' + year;
    let date = new Date(data);

    date = moment(date).add(dias, 'days').format('DD-MM-YYYY');
    $('#id_data_entrega').val(date);
    
});


$('#id_data_aluguel_finaliza').focusout(function(){
    let dias = $('#id_dias_finaliza').val();
    let dias_atraso = $('#id_dias_atraso_finaliza').val();

    var splitDate = this.value.split('-');

    var day = splitDate[0];
    var month = splitDate[1];
    var year = splitDate[2]; 

    let data =  month + '-' + day + '-' + year;
    let date = new Date(data);

    date = moment(date).add(dias, 'days')
    date = moment(date).add(dias_atraso, 'days').format('DD-MM-YYYY');
    $('#id_data_entrega_finaliza').val(date);
    
});

// Listar os Funcionários na Table
const listaAluguel = () =>{

    fetch(`../../../backend/index.php`, {
        credentials: 'same-origin',
        method: `POST`,
        body: `read=1&controller=Aluguel`,
        headers: {'Content-type':'application/x-www-form-urlencoded'}
    })
    .then(function(response) {
        response.json().then(data =>{

            let conteudo = 
                `<div class="col-md-12">
                    <div class="table-responsive m-t-40">
                        <table id="tblFuncionario" class="display nowrap table table-striped table-sm" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center">Cliente</th>
                                    <th class="text-center">Veículo</th>
                                    <th class="text-center">Placa</th>
                                    <th class="text-center">Data do Aluguel</th>
                                    <th class="text-center">Data Esperada</th>
                                    <th class="text-center">Finalizar</th>
                                    <th class="text-center">Cancelar</th>
                                </tr>
                            </thead>                                      
                            <tbody>`
                            for (let i = 0; i < data.length; i++) {
                                conteudo += 
                                `<tr>
                                    <td class="text-center">${data[i].Nome_Cliente}</td>
                                    <td class="text-center">${data[i].Marca} - ${data[i].Modelo}</td>
                                    <td class="text-center">${data[i].Placa}</td>
                                    <td class="text-center">${inverteData(data[i].Data_Aluguel)}</td>
                                    <td class="text-center">${inverteData(data[i].Data_Entrega)}</td>
                                    <td class="text-center"><button type="button" class="btn btn-info btn-sm sombra-btn-entrar" onclick="buscaAluguel(${data[i].ID})"><i class="fas fa-clipboard-list"></i></button></td>
                                    <td class="text-center"><button type="button" class="btn btn-info btn-sm sombra-btn-entrar" onclick="cancelarAluguel(${data[i].ID})"><i class="fas fa-window-close"></i></button></td>
                                </tr>`
                            }
                        conteudo +=
                        `</tbody>
                        </table>
                    </div>
                </div>`

                $('#tabelaAluguel').html('');
                $('#tabelaAluguel').html(conteudo);

                //DATA TABLE
                $('#tblFuncionario').DataTable({
                    dom: 'Bfrtip',
                    "language": {
                            "url": "../../js/Portuguese-Brasil.json"
                        },
                    bAutoWidth: false,
                    aoColumns: [
                        { sWidth: '5%' },
                        { sWidth: '25%' },
                        { sWidth: '20%' },
                        { sWidth: '20%' },
                        { sWidth: '10%' },
                        { sWidth: '10%' },
                        { sWidth: '10%' }
                    ]
                    
                });
        })
    })
    .catch (function(err) {
        throw err;
    })
}

// Abre modal de finalização
const buscaAluguel = (ID) =>{

    fetch(`../../../backend/index.php`, {
        credentials: 'same-origin',
        method: `POST`,
        body: `read=2&controller=Aluguel&ID=${ID}`,
        headers: {'Content-type':'application/x-www-form-urlencoded'}
    })
    .then(function(response) {
        response.json().then(data =>{
            $('#modal-finaliza-Aluguel').modal('show');
            $('#id_cliente_finaliza').val(`${data[0].Nome_Cliente}`);
            $('#id_veiculo_finaliza').val(`${data[0].Marca} - ${data[0].Modelo} - ${data[0].Placa} - R$${data[0].Preco_Diario}`);
            $('#id_dias_finaliza').val(`${data[0].Dias_Aluguel}`);
            $('#id_dias_atraso_finaliza').val(`${data[0].Dias_Atraso}`);
            $('#id_preco_finaliza').val(`R$ ${data[0].Preco_Aluguel}`);
            $('#id_aluguel').val(ID);
            var splitDate = data[0].Data_Aluguel.split('-');

            var year = splitDate[0];
            var month = splitDate[1];
            var day = splitDate[2];

            let Data_Aluguel =  day + '-' + month + '-' + year;

            //
            var splitDate2 = data[0].Data_Entrega.split('-');

            var year2 = splitDate2[0];
            var month2 = splitDate2[1];
            var day2 = splitDate2[2];

            let Data_Entrega =  day2 + '-' + month2 + '-' + year2;

            $('#id_data_aluguel_finaliza').val(`${Data_Aluguel}`);
            $('#id_data_entrega_finaliza').val(`${Data_Entrega}`);
            $('#id_km_entrega_finaliza').val(`${data[0].KM_Entrega}`);

            let conteudo;
            if(data[0].Pagamento == 'Pago'){
                conteudo += `<option value="Pago" selected>Pago</option>
                             <option value="Pendente">Pendente</option>`;
            }else{
                conteudo += `<option value="Pendente" selected>Pendente</option>
                             <option value="Pago">Pago</option>`;
            }
            $('#id_pagamento_finaliza').find('option').remove().end().append(conteudo);

        })
    });

}

// Evento do botao de finalizar
$('#btn_finaliza_aluguel').click(function(){
    let ID = $('#id_aluguel').val();
    let Dias = $('#id_dias_finaliza').val();
    let Dias_Atraso = $('#id_dias_atraso_finaliza').val();
    let Preco = $('#id_preco_finaliza').val();
    if(Preco){
        Preco = Preco.split('$');
        Preco = Preco[1].trim();
    }
    let Data_Aluguel = $('#id_data_aluguel_finaliza').val();
    let Data_Entrega = $('#id_data_entrega_finaliza').val();
    let KM_Entrega = $('#id_km_entrega_finaliza').val();
    let Pagamento = $('#id_pagamento_finaliza option:selected').val();
    let Finalizado = $('#checkbox33').is(':checked');
    Finalizado == true ? Finalizado = "1" : Finalizado = "0";
    let controller = 'Aluguel';

    if(Pagamento == 'Pendente' && Finalizado == '1'){
        alertaRetorno('Finalizar Aluguel', `Não pode finalizar um aluguel com o pagamento pendente!`,'error',3000,false);
    } else if(Finalizado == '1' && KM_Entrega == '0.0'){
        alertaRetorno('Finalizar Aluguel', `Não pode finalizar um aluguel sem fornecer a Kilometragem!`,'error',3000,false);
    } else {
        $.ajax({
            url: '../../../backend/index.php',
            data: {
                update: 1,
                controller: controller,
                ID: ID,
                Dias: Dias,
                Dias_Atraso: Dias_Atraso,
                Preco: Preco,
                Data_Aluguel: Data_Aluguel,
                Data_Entrega: Data_Entrega,
                KM_Entrega: KM_Entrega,
                Pagamento: Pagamento,
                Finalizado: Finalizado
            },
            type: 'POST',
            success: function (data) {
                let obj = JSON.parse(data);
                if (obj[0].RETORNO == 1) {
                    alertaRetorno('Cadastro de Aluguel', `${obj[0].MENSAGEM}`, 'success', 3000, false);
                    listaAluguel();

                } else if (obj[0].RETORNO == 0) {
                    alertaRetorno('Cadastro de Aluguel', `${obj[0].MENSAGEM}`, 'error', 3000, false);
                }

                $('#modal-finaliza-Aluguel').modal('hide');

            },
            error: function () {
                alertaRetorno('Cadastro de Aluguel', 'Erro, tente novamente.', 'error', 3000, false);
            }
        });
    }
});

function cancelarAluguel(ID){
    let controller = 'Aluguel';
    $.ajax({
        url: '../../../backend/index.php',
        data: {
            update: 2,
            controller: controller,
            ID: ID
        },
        type: 'POST',
        success: function (data) {
            let obj = JSON.parse(data);
            if (obj[0].RETORNO == 1) {
                alertaRetorno('Cadastro de Aluguel', `${obj[0].MENSAGEM}`, 'success', 3000, false);
                listaAluguel();
            } else if (obj[0].RETORNO == 0) {
                alertaRetorno('Cadastro de Aluguel', `${obj[0].MENSAGEM}`, 'error', 3000, false);
            }
        },
        error: function () {
            alertaRetorno('Cadastro de Aluguel', 'Erro, tente novamente.', 'error', 3000, false);
        }
    })
}


$("#modal-cadastra-Aluguel").on("hidden.bs.modal", function(){
    $("#id_cliente").select2('val','#');
    $("#id_veiculo").select2('val','#');
    $("#id_dias").val('');
    $("#id_data_aluguel").val('');
    $("#id_data_entrega").val('');
    $("#id_preco").val('');
    $("#id_pagamento").select2('val','#');
});

function inverteData(data){
    var splitDate = data.split('-');

    var year = splitDate[0];
    var month = splitDate[1];
    var day = splitDate[2];

    let nova_data =  day + '-' + month + '-' + year;
    return nova_data;
}