@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left"> <h4>Administrador de archivos</h4></div>
                  <div class="float-right"><a href="{{ route('clasificar')}}" class ="btn btn-success"><h4>Clasificar Archivo</h4></a></div>
                </div>

                <div class="card-body">
                @if(isset($nf))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <strong>Archivos procesados!</strong> 
                          <ul>
                              <li>Cedulas: {{ $nc }}</li>
                              <li>Facturas: {{ $nf }}</li>
                              <li>Ilegibles: {{ $ni }}</li>
                              <li>Ordenes: {{ $no }}</li>
                          </ul>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
    
    <div class="row">
      <div class="col-md-12">
                <iframe src="/filemanager" style="width: 100%; height: 500px; overflow: hidden; border: none;"></iframe>
      </div>
    </div>
  </div>

 
  <script>
   var route_prefix = "/filemanager";
  </script>

       <script>
    //$('#lfm').filemanager('image', {prefix: route_prefix});
    $('#lfm').filemanager('file', {prefix: route_prefix});
  </script>
  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
