<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Monitoring Stock</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="bg-body-secondary">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <header class="navbar navbar-dark bg-dark text-light p-2" style="height: fit-content">
      <div class="container-fluid">
        <span class="navbar-brand mb-0 font-italic fw-border">Bima Sakti Group</span>
        <div class="d-flex gap-4" id="group-link">
          <a class="text-decoration-none text-light" onclick="pageLink('{{url('/customer')}}')" href="#">CUSTOMER</a>
          <a class="text-decoration-none text-light" onclick="pageLink('{{url('/stock')}}')" href="#">STOCK</a>
          <a class="text-decoration-none text-light" href="">ORDER</a>
        </div>
      </div>
    </header>
    

    <div id="content" class="p-3">
      
    </div>
    
    <footer class="position-absolute bottom-0 text-center" style="background-color: DarkSlateGray; color: AliceBlue; width: 100%">
      <span>&copy;</span>2024 Lutvi.Dev
    </footer>

@include('App/script')
  </body>
</html>