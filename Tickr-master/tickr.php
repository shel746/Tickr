<!--?php include('./stocks.php'); ?-->

<html>
  <head>
    <title>Tickr</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/navbar.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Tickr</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="navbar-collapse collapse" id="navbar">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="./">Sign Out</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="well">
            <ul class="list-group">
              <li class="list-group-item">Cras justo odio</li>
              <li class="list-group-item">Dapibus ac facilisis in</li>
              <li class="list-group-item">Morbi leo risus</li>
              <li class="list-group-item">Porta ac consectetur ac</li>
              <li class="list-group-item">Vestibulum at eros</li>
            </ul>
          </div>
        </div>
        <div class="col-md-6">
          <div class="well">...</div>
          <div class="well">
            <table class="table">
            	<thead>
                <tr>
                  <th>Stock</th>
                  <th>Equity</th>
                  <th>Stock Price</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <!--?php include ('./stocks.php'); ?-->
                <!--?php populateStocks(); ?-->
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-md-3">
          <div class="well">
            <h4>Bank Information</h3>
            <h5>Current Balance: $10,000</h4>
          </div>
        </div>
      </div>  
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>