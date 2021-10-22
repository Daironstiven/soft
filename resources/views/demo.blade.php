<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Laravel Filemanager</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('vendor/laravel-filemanager/img/72px color.png') }}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>
<body>
  <div class="container">
    
    <div class="row">
      <div class="col-md-12">
        <h2 class="mt-4">Embed file manager</h2>
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
  
</body>
</html>
