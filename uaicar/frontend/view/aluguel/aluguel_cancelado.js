// Inicia ao carregar a página
$().ready(function(){

    listaAluguel();

});


// Listar os Funcionários na Table
const listaAluguel = () =>{

    fetch(`../../../backend/index.php`, {
        credentials: 'same-origin',
        method: `POST`,
        body: `read=1&controller=AluguelCancelado`,
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
                        { sWidth: '10%' }
                    ]
                    
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