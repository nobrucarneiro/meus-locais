@extends('template.app')

@section('content')
    
    <div class="card">
        <div class="card-body">
            <a href={{action('CrudController@create')}} class="btn btn-primary">Adicionar</a>
        </div>
    </div>

    <div class="card">

    <div class="card-body">

      @include('alerts')

      <table class="table table-striped" style="text-align: center">
        <thead>
          <tr>
            <th scope="col">Nome</th>
            {{-- <th scope="col">Cidade</th>
            <th scope="col">UF</th> --}}
            <th scope="col">Data</th>
            <th scope="col">Ação</th>
          </tr>
        </thead>
        <tbody>
          @foreach($data as $item)
          <tr>
            <th scope="row">{{ $item->nome }}</th>
            {{-- <td>{{ $item->cidade }}</td>
            <td>{{ $item->uf }}</td> --}}
            <td>{{ date("d-m-Y", strtotime($item->data)) }}</td>
            <td>
             <form action={{action('CrudController@destroy', $item->id )}} method="POST" >
              @csrf
              @method('DELETE')
              <a href="{{action('CrudController@edit', $item->id )}}" class="btn btn-primary">Editar</a>
              <button type="submit" class="btn btn-danger">Deletar</button>     
            </form> 
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
     </div>
    </div>

@endsection