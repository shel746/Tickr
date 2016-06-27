<?php include('dataManager.php'); ?>
<?php include('APIManager.php'); ?>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tickr - Dashboard</title>
        
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="navigation/navigation.css" rel="stylesheet">
        <link href="dashboard.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="/js/dashboard.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.1/moment.min.js"></script>
        <script src="/js/bootstrap.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-csv/0.71/jquery.csv-0.71.min.js"></script>
        
        <!--News-->
        <script src="newsbox/jquery-1.6.4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
        <script src="newsbox/jquery.rss.js"></script>
        <script>
            jQuery(function($) {
                $("#news-widget").rss("http://finance.yahoo.com/rss/headline?s=yhoo,msft,tivo", {
                    limit: 4
                })
            })
        </script>
        
        <script src="http://code.highcharts.com/highcharts.js"></script>
        <script src="http://code.highcharts.com/modules/exporting.js"></script>
        <script src="/js/grapher.js"></script>
    </head>
    
    <body>
        
        <!--Navigation-->
        <div class="container">
            <?php include('navigation/navigation.php'); ?>
        </div>
        
        <!--Page Content-->
        <div class="container">
            <div class="row">
                <!--Stock Picker-->
                <div class="col-md-3">
                    <!--Import-->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Import</h3>
                        </div>
                        
                        <div class="panel-body">
                            <button type="button" class="btn btn-default">Upload .CSV</button>
                        </div>
                    </div>
                    
                    <!--Stock Listing-->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Current Portfolio</h3>
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Symbol</th>
                                        <th>Company</th>
                                        <th>Quantity</th>
                                        <th>Current Price</th>
                                        <th>Visibility</th>
                                    </tr>
                                </thead>
                                <?php printStockInformationList(); ?>
                            </table>
                        </div>
                    </div>

                    <!--Buy/Sell Stocks-->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Stock Actions</h3>
                        </div>
                        
                        <div class="panel-body">
                            <form>
                                <div class="form-group">
                                    <label for="bs_tickerSymbol">Ticker Symbol</label>
                                    <input type="text" class="form-control" id="bs_tickerSymbol" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="bs_companyName">Company Name</label>
                                    <input type="text" class="form-control" id="bs_companyName" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="bs_quantity">Quantity</label>
                                    <input type="text" class="form-control" id="bs_quantity" placeholder="">
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Buy</button>
                                <button type="submit" class="btn btn-success">Sell</button>
                            </form>
                        </div>
                    </div>
                </div>
                
                <!--Center Content-->
                <div class="col-md-6">
                    <!--Search-->
                    <form>
                        <div class="form-group">
                            <label class="sr-only">Search</label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">Go!</button>
                                </span>
                            </div>
                        </div>
                    </form>
                    
                    <!--Graph-->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Graph</h3>
                        </div>
                        
                        <div class="panel-body">
                            <div id="container" style="width:100%; height:400px;"></div>
                            
                            <div class="btn-group" role="group" aria-label="graph-span-picker">
                                <button type="button" class="btn btn-default">1 Day</button>
                                <button type="button" class="btn btn-default">5 Days</button>
                                <button type="button" class="btn btn-default">1 Month</button>
                                <button type="button" class="btn btn-default">3 Months</button>
                                <button type="button" class="btn btn-default">6 Months</button>
                                <button type="button" class="btn btn-default">All</button>
                            </div>
                        </div>
                    </div>

                    <!--Stock Detailed Information-->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Stock Information</h3>
                        </div>
                        <?php printCurrentStockInformation(); ?>
                    </div>
                    
                    <!--News Widget-->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">News</h3>
                        </div>
                        <div class="panel-body">
                            <div id="news-widget"></div>
                        </div>
                    </div>
                </div>
                
                <!--Right Content-->
                <div class="col-md-3">
                    <!--Information-->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Information</h3>
                        </div>
                        <div class="panel-body">
                            <h4>
                                <div id="time" style="color: #000000;"></div>
                                <small><div id="date"></div></small>
                            </h4>
                            <hr>
                            
                            <h4>
                            <?php printCurrentBalance(); ?>
                            <small>in funds remaining</small>
                            </h4>
                            
                            <h4>
                            $0
                            <small>current portfolio value</small>
                            </h4>
                        </div>
                    </div>
                    
                    <!--User Manual-->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"> User Manual</h3>
                        </div>
                        
                        <div class="panel-body">
                            <button type="button" class="btn btn-default">
                                <a href="manual/helpmanual.pdf" download>Download User Manual </a></button>
                        </div>
                    </div>
                    
                    <!--Legend-->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Legend</h3>
                        </div>
                        
                        <table class="table">
                            <?php printGraphLegend(); ?>
                        </table>
                    </div>
                    
                    <!--Watchlist-->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Watchlist</h3>
                        </div>
                        
                        <table class="table table-hover">
                            <?php printWatchlist(); ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </body>
</html>