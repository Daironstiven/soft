@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="float-left"> <h4>Documents</h4>
                </div>
                </div>
                <div class="card-body">

                <button class="btn btn-success"><i class="fas fa-plus"></i></button>
                <hr>
                    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Documento</th>
      <th scope="col">Carpeta</th>
      <th scope="col">Palabras Claves Incluidas</th>
      <th scope="col">Palabras Claves Excluidas</th>
      <th scope="col">Palabras Claves Excluidas</th>
    </tr>
  </thead>
  <tbody>
      @foreach($documents as $document)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$document->name}}</td>
      <td>{{$document->folder}}</td>
      <td>{{$document->keywords_in}}</td>
      <td>{{$document->keywords_out}}</td>
      <td>
          <button class="btn btn-info"><i class="fas fa-eye"></i></button>
          <button class="btn btn-warning"><i class="fas fa-edit"></i></button>
          <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
      </td>

      </tr>
      @endforeach
  </tbody>
</table>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
@endsection