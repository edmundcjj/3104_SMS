@include('partials._header') <!-- _head is located in partials folder / _header.blade.php file -->

  <body>
  <!-- Default Bootstrap NavBar -->

@include('partials._nav')

  <div class="container">
 
 <!-- @ include('partials._messages') -->
@include('partials._alertmessage')

      @yield('content')
        <!-- the yield is like the php layout that is include in other php files -->

@include('partials._footer')
         
        </div> <!-- end of .container -->

     
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
  <!--  <script src="js/bootstrap.min.js"></script> -->

  <!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

 @yield('scripts')

  </body>
</html>

