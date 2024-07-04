<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Monitoring Stock</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="bg-body-secondary">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Import Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Import Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="main.js"></script>
    
    <div class="d-flex" style="width: 100vw; height: 100vh;">
      <header class="bg-dark text-light p-2" style="height: 100%; width:15%">
        <div class="navbar-brand mb-0 font-italic fw-border text-center d-flex align-items-center fw-bold" style="font-size: 24px; height:10%">ERP WAREHOUSE</div>
        <div style="height:90%">
          <div class="d-flex flex-column gap-2" id="group-link">
            <a id="link-sidebar" class="text-decoration-none" onclick="pageLink('{{url('/stock')}}')" href="#">STOCK</a>
            <a id="link-sidebar" onclick="pageLink('{{url('/customer')}}')" href="#">CUSTOMER</a>
            <a id="link-sidebar" onclick="pageLink('{{url('/product')}}')" class="text-decoration-none" href="#">PRODUCT</a>
            <a id="link-sidebar" class="text-decoration-none" href="">TRUCK</a>
            <a id="link-sidebar" class="text-decoration-none" href="">TRANSACTION</a>
            <a id="link-sidebar" class="text-decoration-none" href="">MATERIAL</a>
            <a id="link-sidebar" class="text-decoration-none" href="">REVERSE</a>
          </div>
        </div>
      </header>
      
      <div style="height: 100%; width: 85%">
        <div id="alert_success"></div>
        <div id="content" class="p-3" >
          
        </div>
      </div>
      
    </div>
    
    <footer class="position-absolute bottom-0 text-center" style="background-color: DarkSlateGray; color: AliceBlue; width: 100%">
      <span>&copy;</span>2024 Lutvi.Dev
    </footer>

  </body>
</html>