// Inicia ao carregar a página
$().ready(function(){

    listaCarros();

});

$('.select2').select2();

$(document).ready(function domReady() {
    $(".select2-material").select2({
        theme: "material" });


    $(".select2-selection__arrow").
    addClass("material-icons").
    html("arrow_drop_down");
});

function listaCarros(){

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
            conteudo += `<option value="#" selected disabled>Selecione o Veículo...</option>`
            for(let i = 0; i < obj.length; i++){
                conteudo += `<option value=${obj[i].ID}>${obj[i].Marca} - ${obj[i].Modelo} - ${obj[i].Placa}</option>`;
            }
            $('#id_veiculo').append(conteudo);
        }
    });

}

$(document).on('change', '#id_veiculo', function(){
    let ID = this.value;
    consultaVeiculos(ID);
});

// Listar os Funcionários na Table
const consultaVeiculos = (ID) =>{

    fetch(`../../../backend/index.php`, {
        credentials: 'same-origin',
        method: `POST`,
        body: `read=1&controller=Relatorio&ID=${ID}`,
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
                                    <th class="text-center">KM Entrega</th>
                                    <th class="text-center">Dias de Aluguel</th>
                                    <th class="text-center">Atraso</th>
                                </tr>
                            </thead>                                      
                            <tbody>`
                            for (let i = 0; i < data.length; i++) {
                                conteudo += 
                                `<tr>
                                    <td class="text-center">${data[i].Nome}</td>
                                    <td class="text-center">${data[i].Marca} - ${data[i].Modelo}</td>
                                    <td class="text-center">${data[i].Placa}</td>
                                    <td class="text-center">${inverteData(data[i].Data_Aluguel)}</td>
                                    <td class="text-center">${inverteData(data[i].Data_Entrega)}</td>
                                    <td class="text-center">${data[i].KM_Entrega}</td>
                                    <td class="text-center">${data[i].Dias_Aluguel}</td>
                                    <td class="text-center">${data[i].Dias_Atraso}</td>
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
                    buttons: [
                        'copy',  'excel', 'pdf', 'print'
                    ],
                    "language": {
                            "url": "../../js/Portuguese-Brasil.json"
                        },
                    bAutoWidth: false,
                    aoColumns: [
                        { sWidth: '20%' },
                        { sWidth: '20%' },
                        { sWidth: '10%' },
                        { sWidth: '10%' },
                        { sWidth: '10%' },
                        { sWidth: '10%' },
                        { sWidth: '10%' },
                        { sWidth: '10%' }
                    ],

                    
                });
        })
    })
    .catch (function(err) {
        throw err;
    })
}

function inverteData(data){
    var splitDate = data.split('-');

    var year = splitDate[0];
    var month = splitDate[1];
    var day = splitDate[2];

    let nova_data =  day + '-' + month + '-' + year;
    return nova_data;
}