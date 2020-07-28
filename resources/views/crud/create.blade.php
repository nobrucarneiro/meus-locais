@extends('template.app')

@section('content')



<script type="text/javascript">

function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('logradouro').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
            // document.getElementById('ibge').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('logradouro').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
            // document.getElementById('ibge').value=(conteudo.ibge);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {



        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('logradouro').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";
                // document.getElementById('ibge').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            alert('Favor informar o CEP para a consulta.');
            limpa_formulário_cep();
        }
    };

</script>


<div class="card">
  <div class="card-header">
    <h6 style="text-align: center">Adicionar lugares visitados</h6>
  </div>
  <div class="card-body">

    <form action={{action('CrudController@store')}} method="POST">
        @csrf
        <div class="form-row">
          <div class="form-group col-md-4 offset-md-1">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" required>
          </div>
          <div class="form-group col-md-2">
            <label for="cep">Cep</label>
            <input type="text" class="form-control" name="cep" id="cep" placeholder="Cep" value="" onblur="pesquisacep(this.value);" required>
          </div>
          <div class="form-group col-md-4">
            <label for="logradouro">Logradouro</label>
            <input type="text" class="form-control" name="logradouro" id="logradouro" placeholder="Logradouro" required>
          </div> 
        </div>
       
        <div class="form-row">
            <div class="form-group col-md-4 offset-md-1">
                <label for="complemento">Complemento</label>
                <input type="text" class="form-control" name="complemento" id="complemento" placeholder="Complemento" required>
            </div>

            <div class="form-group col-md-2">
                <label for="numero">Número</label>
                <input type="text" class="form-control" name="numero" id="numero" placeholder="Nº" required>
            </div>        

            <div class="form-group col-md-4">
              <label for="bairro">Bairro</label>
              <input type="text" class="form-control" name="bairro" id="bairro" placeholder="Bairro" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-2 offset-md-1">
                <label for="uf">UF</label>
                <input type="text" class="form-control" name="uf" id="uf" placeholder="UF" required>
            </div>        
            <div class="form-group col-md-4">
                <label for="cidade">Cidade</label>
                <input type="text" class="form-control" name="cidade" id="cidade" placeholder="Cidade" required>
            </div>
            <div class="form-group col-md-4">
              <label for="data">Data</label>
              <input type="date" class="form-control" name="data" required>
            </div>
        </div>
        <div class="form-group offset-md-1">
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>
    </form>
  </div>
</div>

@endsection