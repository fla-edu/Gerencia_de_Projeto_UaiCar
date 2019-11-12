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

$(document).off('focusout').on('focusout', '#id_data_aluguel', function(){
    let dias = $('#id_dias').val();
    var splitDate = this.value.split('-');
    if(splitDate.count == 0){
        return null;
    }

    var month = splitDate[0];
    var day = splitDate[1];
    var year = splitDate[2]; 

    let data =  day + '-' + month + '-' + year;
    let date = new Date(data);
    date = moment(date).add(dias, 'days').format('DD/MM/YYYY');
    $('#id_data_entrega').val(date);
    
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
                                </tr>
                            </thead>                                      
                            <tbody>`
                            for (let i = 0; i < data.length; i++) {
                                conteudo += 
                                `<tr>
                                    <td class="text-center">${data[i].Nome_Cliente}</td>
                                    <td class="text-center">${data[i].Marca} - ${data[i].Modelo}</td>
                                    <td class="text-center">${data[i].Placa}</td>
                                    <td class="text-center">${data[i].Data_Aluguel}</td>
                                    <td class="text-center">${data[i].Data_Entrega}</td>
                                    <td class="text-center"><button type="button" class="btn btn-info btn-sm sombra-btn-entrar" onclick="alterarFuncionario(${data[i].ID})"><i class="fas fa-save"></i> Finalizar</button></td>
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
                        { sWidth: '25%' },
                        { sWidth: '25%' },
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


$("#modal-cadastra-Aluguel").on("hidden.bs.modal", function(){
    $("#id_cliente").val('#');
    $("#id_veiculo").val('#');
    $("#id_dias").val('');
    $("#id_data_aluguel").val('');
    $("#id_data_entrega").val('');
    $("#id_preco").val('');
    $("#id_pagamento").val('#');
});