<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Hospital MS</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="{!! asset('css/materialize.css') !!}" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="{!! asset('css/style.css') !!}" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="{!! asset('css/style2.min.css') !!}" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="{!! asset('css/perfect-scrollbar.css') !!}" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="{!! asset('css/maintenance-style.css') !!}" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="shortcut icon" href="{!! asset('img/icon.png') !!}"/>

   <link href="{!! asset('css/mainStyle.css') !!}" type="text/css" rel="stylesheet" media="screen,projection"/>
   <link href="{!! asset('css/jquery.dataTables.css') !!}" type="text/css" rel="stylesheet" media="screen,projection"/>
   <link href="{!! asset('css/buttons.dataTables.css') !!}" type="text/css" rel="stylesheet" media="screen,projection"/>

  
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="{!! asset('js/materialize.js') !!}"></script>
    <script src="{!! asset('js/init.js') !!}"></script>
    <script src="{!! asset('js/jquery.dataTables.js') !!}"></script>
    <script src="{!! asset('js/addToTable.js') !!}"></script>
    <script src="{!! asset('js/highcharts.js') !!}"></script>
    <script src="{!! asset('js/exporting.js') !!}"></script>
    
<div class="navbar-fixed">
  <nav class="indigo darken-4">
      <div class="nav-wrapper">
        <a href="#!" class="brand-logo" style="margin-left: 40%; "><img src="{!! asset('img/title.png') !!}" width="70%" height="50%"></a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a href="{!! url('logout') !!}" class="indigo-text text-darken-2 btn white">Log out</a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
          <li class="active"><a href="{{ URL::to('monitor') }}" class="green-text text-darken-5 waves-effect waves-light">Monitor</a></li>
          <li><a href="{{ URL::to('statistics') }}" class="green-text text-darken-5">Statistics</a></li>
          <li><a href="{!! url('product') !!}" class="green-text text-darken-5">Product</a></li>
        </ul>
      </div>
    </nav>
</div>

</head>

<body class="blue-grey lighten-5">
  @yield('mainBody')
  <div class="wrapper">
     @yield('body')
   </div>
   
  

   <script src="{!! asset('js/dataTables.buttons.js') !!}"></script>
   <script src="{!! asset('js/buttons.html5.min.js') !!}"></script>
   <script src="{!! asset('js/jszip.min.js') !!}"></script>
   <script src="{!! asset('js/pdfmake.min.js') !!}"></script>
   <script src="{!! asset('js/vfs_fonts.js') !!}"></script>

   <script type="text/javascript">
     $(document).ready(function(){
         // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
         $('.modal-trigger').leanModal();
       });
           
   </script>

   <script type="text/javascript">
     $(document).ready(function() {
       $('select').material_select();
     });
            
   </script>
</body>
<footer class="page-footer indigo darken-2">
  <div class="container">
    <div class="row">
      <div class="col l6 s12">
        <h5 class="white-text">Company Bio</h5>
        <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>


      </div>
      <div class="col l3 s12">
        <h5 class="white-text">Settings</h5>
        <ul>
          <li><a class="white-text" href="#!">Link 1</a></li>
          <li><a class="white-text" href="#!">Link 2</a></li>
          <li><a class="white-text" href="#!">Link 3</a></li>
          <li><a class="white-text" href="#!">Link 4</a></li>
        </ul>
      </div>
      <div class="col l3 s12">
        <h5 class="white-text">Connect</h5>
        <ul>
          <li><a class="white-text" href="#!">Link 1</a></li>
          <li><a class="white-text" href="#!">Link 2</a></li>
          <li><a class="white-text" href="#!">Link 3</a></li>
          <li><a class="white-text" href="#!">Link 4</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container">
    Made by <a class="green-text text-lighten-3" href="http://materializecss.com">TarubDevs</a>
    </div>
  </div>
</footer>
  
</html>
