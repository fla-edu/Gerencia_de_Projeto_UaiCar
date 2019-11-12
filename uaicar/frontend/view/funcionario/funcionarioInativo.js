// Inicia ao carregar a página
$().ready(function(){

    listaFuncionarios();

});


// Listar os Funcionários na Table
const listaFuncionarios = () =>{

    fetch(`../../../backend/index.php`, {
        credentials: 'same-origin',
        method: `POST`,
        body: `read=2&controller=Funcionario`,
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
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Nome</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Tipo</th>
                                    <th class="text-center">Ativo</th>
                                    <th class="text-center">Salvar</th>
                                </tr>
                            </thead>                                      
                            <tbody>`
                            for (let i = 0; i < data.length; i++) {
                                conteudo += 
                                `<tr>
                                    <td class="text-center">${data[i].ID}</td>
                                    <td class="text-center">${data[i].Nome}</td>
                                    <td class="text-center" onkeypress="return (this.innerText.length < 100)" id="email_${data[i].ID}" contenteditable="true">${data[i].Email}</td>`
                                    if(data[i].Tipo == 'Administrador') {
                                        conteudo +=
                                        `<td><div class="form-material">
                                         <select id="tipo_${data[i].ID}" name="status_" class="form-control">
                                            <option selected="true" value="Administrador">Administrador</option>
                                            <option value="Atendente">Atendente</option>
                                         </select> 
                                         </div> </td>
                                        `
                                    } else {
                                        conteudo +=
                                        `<td><div class="form-material">
                                         <select id="tipo_${data[i].ID}" name="status_" class="form-control">
                                            <option selected="true" value="0">Atendente</option>
                                            <option value="Administrador">Administrador</option>
                                         </select> 
                                         </div> </td>
                                        `
                                    }
                                    if(data[i].Ativo == 1) {
                                        conteudo +=
                                        `<td><div class="form-material">
                                         <select id="ativo_${data[i].ID}" name="status_" class="form-control">
                                            <option selected="true" value="1">Ativo</option>
                                            <option value="0">Inativo</option>
                                         </select> 
                                         </div> </td>
                                        `
                                    } else {
                                        conteudo +=
                                        `<td><div class="form-material">
                                         <select id="ativo_${data[i].ID}" name="status_" class="form-control">
                                            <option selected="true" value="0">Inativo</option>
                                            <option value="1">Ativo</option>
                                         </select> 
                                         </div> </td>
                                        `
                                    }

                                    conteudo +=
                                    `<td class="text-center"><button type="button" class="btn btn-info btn-sm sombra-btn-entrar" onclick="alterarFuncionario(${data[i].ID})"><i class="fas fa-save"></i></button></td>
                                </tr>`
                            }
                        conteudo +=
                        `</tbody>
                        </table>
                    </div>
                </div>`

                $('#tabelaFuncionario').html('');
                $('#tabelaFuncionario').html(conteudo);

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

// Atualiza Funcionário e Ativo
function alterarFuncionario(ID){

    let controller = 'Funcionario'
    let email = $(`#email_${ID}`).text();
    let tipo = $(`#tipo_${ID}`).val();
    let ativo = $(`#ativo_${ID}`).val();

    $.ajax({
        url: '../../../backend/index.php',
        data: {
            update: 1,
            controller: controller,
            ID: ID,
            email: email,
            tipo: tipo,
            ativo: ativo
        },
        type: 'POST',
        success: function(data){

            let obj = JSON.parse(data);

            if(obj[0].RETORNO == 1) {
                alertaRetorno('Atualização de Funcionário', `${obj[0].MENSAGEM}`, 'success',3000,false);
                
            }else if (obj[0].RETORNO == 0){
                alertaRetorno('Atualização de Funcionário', `${obj[0].MENSAGEM}`,'error',3000,false);
            }
            listaFuncionarios();
        },
        error: function(){
            alertaRetorno('Atualização de Funcionário', 'Erro, tente novamente.','error',3000,false);
        }
    });

}
