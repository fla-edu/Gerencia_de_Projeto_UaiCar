// Inicia ao carregar a página
$().ready(function(){

    listaVeiculos();

});


// Listar os Veiculos na Table
const listaVeiculos = () =>{

    fetch(`../../../backend/index.php`, {
        credentials: 'same-origin',
        method: `POST`,
        body: `read=3&controller=Veiculo`,
        headers: {'Content-type':'application/x-www-form-urlencoded'}
    })
    .then(function(response) {
        response.json().then(data =>{
            let dt_aqui;
            let dt_final;
            let conteudo = 
                `<div class="col-md-12">
                    <div class="table-responsive m-t-40">
                        <table id="tblVeiculo" class="display nowrap table table-striped table-sm" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center">Marca</th>
                                    <th class="text-center">Modelo</th>
                                    <th class="text-center">Placa</th>
                                    <th class="text-center">Data de Aquisição</th>
                                    <th class="text-center">Data Final</th>
                                    <th class="text-center">Ativo</th>
                                    <th class="text-center">Salvar</th>
                                </tr>
                            </thead>                                      
                            <tbody>`
                            for (let i = 0; i < data.length; i++) {
                                conteudo += 
                                `<tr>
                                    <td class="text-center">${data[i].Marca}</td>
                                    <td class="text-center">${data[i].Modelo}</td>
                                    <td class="text-center">${data[i].Placa}</td>`
                                    dt_aqui = data[i].Data_Aquisicao.split('-').reverse().join('-');
                                    dt_final = data[i].Data_Final.split('-').reverse().join('-');
                                    conteudo +=
                                    `
                                    <td class="text-center">${dt_aqui}</td>
                                    <td class="text-center">${dt_final}</td>
                                    `
                                    if(data[i].Ativo == '0') {
                                        conteudo +=
                                        `<td><div class="form-material">
                                         <select id="ativo_${data[i].ID}" name="status_" class="form-control">
                                            <option selected="true" value="0">Inativo</option>
                                            <option value="1">Ativo</option>
                                         </select> 
                                         </div> </td>
                                        `
                                    } else {
                                        conteudo +=
                                        `<td><div class="form-material">
                                         <select id="ativo_${data[i].ID}" name="status_" class="form-control">
                                            <option selected="true" value="1">Ativo</option>
                                            <option value="0">Inativo</option>
                                         </select> 
                                         </div> </td>
                                        `
                                    }
                                    conteudo +=
                                    `<td class="text-center"><button type="button" class="btn btn-info btn-sm sombra-btn-entrar" onclick="alterarVeiculo(${data[i].ID})"><i class="fas fa-save"></i></button></td>
                                </tr>`
                            }
                        conteudo +=
                        `</tbody>
                        </table>
                    </div>
                </div>`

                $('#tabelaVeiculos').html('');
                $('#tabelaVeiculos').html(conteudo);

                //DATA TABLE
                $('#tblVeiculo').DataTable({
                    dom: 'Bfrtip',
                    "language": {
                            "url": "../../js/Portuguese-Brasil.json"
                        },
                    bAutoWidth: false,
                    aoColumns: [
                        { sWidth: '20%' },
                        { sWidth: '20%' },
                        { sWidth: '20%' },
                        { sWidth: '10%' },
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

// Atualiza Veiculo e Ativo
function alterarVeiculo(ID){

    let controller = 'Veiculo'
    let ativo = $(`#ativo_${ID}`).val();
    console.log(ID);
    $.ajax({
        url: '../../../backend/index.php',
        data: {
            update: 2,
            controller: controller,
            ID: ID,
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
            listaVeiculos();
        },
        error: function(){
            alertaRetorno('Atualização de Veículo', 'Erro, tente novamente.','error',3000,false);
        }
    });

}
