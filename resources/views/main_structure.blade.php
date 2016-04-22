<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        </head>
    <body>
            <nav class="navbar navbar-default">
              <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{route('dashboard.home')}}">Home</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Items <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Add Item</a></li>
                                <li><a href="#">View Items</a></li>
                            </ul>
                        </li>
                        
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Rent <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Add Rent</a></li>
                                <li><a href="#">View Rents</a></li>
                                <li><a href="#">Return Item</a></li>
                            </ul>
                        </li>
                        
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Customers <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Add Customer</a></li>
                                <li><a href="#">View Customers</a></li>
                            </ul>
                        </li>
                        
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reports <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Rent Report</a></li>
                                <li><a href="#">Item Report</a></li>
                                <li><a href="#">Customer Report</a></li>
                            </ul>
                        </li>
                    </ul>
                 </div>
              </div>
            </nav>
       
        @yield('content')
        <footer>
            <hr>
            Rent It
        </footer>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
       
</html>