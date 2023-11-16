<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <link rel="shortcut icon" href="{{URL::to('./img/favicon2.png')}}" />

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

  <title>Agro System</title>

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{URL::to('/css/app.css')}}">

  <!--sweetalert -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!--/.sweetalert -->

  <!-- Scripts do Bootstrap-->
  <script type="text/javascript" src="{{URL::to('js/jquery.min.js')}}"></script>
  <script type="text/javascript" src="{{URL::to('dist/js/bootstrap.min.js')}}"></script>
  <!-- ./Scripts do Bootstrap-->

<!-- mostrar/esconder logo -->
<script type="text/javascript">
  $(function(){
    var status = 0;
      $(document).ready(function () {
            $('#ck').click(function(){
              if(status == 0){
                $('#lg').fadeOut('slow');
                status=1;
              }else if(status == 1){
                $('#lg').fadeIn('slow');
                status=0;
              }
            });
        });
  });
</script>
<!-- fim -->

</head>
<body class="hold-transition sidebar-mini">

<div class="wrapper" id="app">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" id="ck"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
          <a href="{{url('alerts/notifications')}}" class="button-badge c">
            <i class="icon2 fa fa-bell"></i>
            <span class="badge_alert alert">
              @if(isset($alerts_count))
                {{$alerts_count}}
              @endif
            </span>
          </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Brand Logo -->
    <a href="{{url('home/')}}" id="lg" class="brand-link">
       <img src="{{URL::to('./img/logo41.png')}}" class="img" >
    </a>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <li class="nav-item">
            <a href="{{url('home/')}}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt blue"></i>
                <p>
                    Dashboard
                </p>
            </a>
            </li>

          <li class="nav-item">
                <a class="nav-link" href="{{ url('produtos') }}">
                    <i class="nav-icon fas fa-box yellow"></i>
                    <p>Estoque</p>
                </a>
         </li>

         <li class="nav-item has-treeview">
           <a href="#" class="nav-link">
             <i class="nav-icon fas fa-dolly green"></i>
             <p>Movimentações
               <i class="right fa fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="{{url('produtos_entries/')}}" class="nav-link">
                 <i class="nav-icon fas fa-cart-plus"></i>
                 <p>Entrada</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="{{url('produtos_outputs/')}}" class="nav-link">
                 <i class="fas fa-cart-arrow-down nav-icon"></i>
                 <p>Saída</p>
               </a>
             </li>
           </ul>
         </li>

         <li class="nav-item has-treeview">
           <a href="#" class="nav-link">
             <i class="nav-icon fas fa-clipboard-list purple"></i>
             <p>
               Cadastros
               <i class="right fa fa-angle-left "></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="{{url('/categories')}}" class="nav-link">
                 <i class="nav-icon fas fa-list-ul"></i>
                 <p>Categorias</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="{{url('/supplier')}}" class="nav-link">
                 <i class="fas fa-shipping-fast nav-icon"></i>
                 <p>Fornecedores</p>
               </a>
             </li>
           </ul>
         </li>

         <li class="nav-item has-treeview">
           <a href="#" class="nav-link">
             <i class="nav-icon fa fa-cog teal"></i>
             <p>
               Administração
               <i class="right fa fa-angle-left"></i>
             </p>
           </a>

           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="{{url('/users')}}" class="nav-link">
                 <i class="fas fa-users nav-icon"></i>
                 <p>Usuários</p>
               </a>
             </li>
               <li class="nav-item">
                 <a href="{{url('/logs')}}" class="nav-link">
                   <i class="fas fa-user-clock nav-icon"></i>
                   <p>Logs</p>
                 </a>
               </li>
           </ul>
         </li>

         <li class="nav-item has-treeview">
           <a href="#" class="nav-link">
             <i class="nav-icon fas fa-exclamation-triangle nav-icon orange"></i>
             <p>
               Alertas
               <i class="right fa fa-angle-left"></i>
             </p>
           </a>

           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="{{url('alerts/rules')}}" class="nav-link">
                 <i class="fas fa-pencil-ruler nav-icon"></i>
                 <p>Regras</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="{{url('alerts/notifications')}}" class="nav-link">
                 <i class="fas fa-bullhorn nav-icon"></i>
                 <p>Notificações</p>
               </a>
             </li>
           </ul>
         </li>

          <li class="nav-item">
                <a href="{{url('/profile')}}" class="nav-link">
                    <i class="nav-icon fas fa-user perfil"></i>
                    <p>Perfil</p>
                </a>
         </li>

          <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                    <i class="nav-icon fa fa-power-off red"></i>
                    <p>
                        {{ __('Sair') }}
                    </p>
                 </a>

             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                 @csrf
             </form>
        </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <br>
        @yield('content')
      </div><!-- /.container-fluid -->
    </div>

    <!-- /.content -->
  </div
  <!-- /.content-wrapper -->


  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">

    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2023 EquipeSisagroRR
  </footer>
</div>
<!-- ./wrapper -->

@auth
<script>
    window.user = @json(auth()->user())
</script>
@endauth

<!-- sweetalert (alertas)-->
  @if ($message = Session::get('alert-success'))
    <script type='text/javascript'>
    var msg = "<?php echo $message; ?>";
    swal({
      title: msg,
      icon: "success",
    });
    </script>
  @elseif ($message = Session::get('alert-error'))
    <script type="text/javascript">
      var msg = "<?php echo $message; ?>";
      swal({
        title: msg,
        icon: "error",
        buttons: false,
        timer: 4000,
      });
    </script>
  @endif
<!-- /.sweetalert -->
<script src="{{URL::to('/js/app.js')}}"></script>

<!-- scripts bootstrap -->
<script type="text/javascript">

  $(function () {
     $('[data-toggle="tooltip"]').tooltip()
  })

  $(function () {
    $('[data-toggle="popover"]').popover()
  })

</script>
<!-- /.scripts bootstrap -->

 <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

@if ($message = Session::get('alert-toastr'))
  <script type='text/javascript'>
    var msg = "<?php echo $message; ?>";
    var delay=2000; //1 seconds
    setTimeout(function(){
      toastr.warning(msg);
    },delay);
  </script>
@endif
</body>
</html>
