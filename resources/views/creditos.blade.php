@extends('layouts.app')


                
 <style>


  

.col-6{ 
  text-align:center;
  margin-top:30px;
  margin-left:auto;
  margin-right: auto;
  box-shadow: 0 8px 15px 5px white;
}
.card{
  
}

.col-4{
  margin-top:30px;
  margin-left:auto;
  margin-right: auto;
  box-shadow: 0 15px 20px 5px white;
}
.float-left h4{
    text-align:center;
}


</style>


<body>
@section('content')
<div class="container" style="box-shadow:0 10px 10px 10px black">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-left"> <h4>CREDITOS</h4>
                </div>
                </div>
                <div class="card-body">
  <div class="container" >
    <div class="row">
    <div class="col-6">

<!-- card 1 -->
<div class="card" >
  <img class="card-img-top" src="img/foto.jpg" alt="Card image cap" >
  <div class="card-body">
    <h3>RETO SENASOFT</h3>
    <p class="card-text"><h4>Tecnologo en Analisis y Desarrollo de Sistemas de Informacion  ADSI-2165780<h4></p>
  </div>
   <ul class="list-group list-group-flush">
    <li class="list-group-item">José Milton Perdomo López</li>
    <li class="list-group-item">Mirian Yanet Brand Hernandez</li>
    <li class="list-group-item">Dairon Stiven Espinosa Ramirez</li>
   </ul>
  </div>
</div>
<!-- card 2 -->
<div class="col-4">
    <div class="row">
        <div class="col-12">
         <h5><b>Framework</b></h5>
         <p>Se utlizo el framework como de lavarel y bootstrap como base de realizacion del proyecto</p>
         </div>

        <!-- card 3 -->
        <div class="col-12">
          <h5><b>Librerias Utilizadas</b></h5>
          <p>Packagist repository</p>
          <p>Extraer texto e imágenes de PDF con PHP.</p>
          <p>File manager</p>
         </div>
    </div>
</div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
