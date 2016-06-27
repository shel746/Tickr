<?php
use Ghunti\HighchartsPHP\Highchart;
use Ghunti\HighchartsPHP\HighchartJsExpr;

// $chart = new Highchart();
// $stocks = 0;

// $chart->chart = array(
//     'renderTo' => 'container',
//     'type' => 'line',
//     'marginRight' => 130,
//     'marginBottom' => 25
// );
// $chart->title = array(
//     'text' => 'Portfolio Graph',
//     'x' => - 20
// );
// $chart->subtitle = array(
//     'x' => - 20
// );
// $chart->legend = array(
//     'layout' => 'vertical',
//     'align' => 'right',
//     'verticalAlign' => 'top',
//     'x' => - 10,
//     'y' => 100,
//     'borderWidth' => 0
// );

// function addToGraph($data) {
// 	global $stocks;

// 	// if($stocks == 0) {
// 		$chart->xAxis->categories = array();
// 		$chart->yAxis = array(
// 		    'title' => array(
// 		        'text' => 'Price ($)'
// 		    ),
// 		    'plotLines' => array(
// 		        array(
// 		            'value' => 0,
// 		            'width' => 1,
// 		            'color' => '#808080'
// 		        )
// 		    )
// 		);

// 		$chart->series[] = $chart->series[] = array(
// 		    'name' => 'New York',
// 		    'data' => $data
// 		);
// 	// } else if($stocks == 3){

// 	// } else {

// 	// }
// }

$chart = new Highchart();
$chart->chart->renderTo = "container";
$chart->chart->type = "scatter";
$chart->chart->margin = array(
    70,
    50,
    60,
    80
);
$chart->chart->events->click = new HighchartJsExpr(
    "function(e) {
        var x = e.xAxis[0].value,
            y = e.yAxis[0].value,
            series = this.series[0];
            series.addPoint([x, y]);
    }"
);
$chart->title->text = "User supplied data";
$chart->subtitle->text = "Click the plot area to add a point. Click a point to remove it.";
$chart->xAxis->minPadding = 0.2;
$chart->xAxis->maxPadding = 0.2;
$chart->xAxis->maxZoom = 60;
$chart->yAxis->title->text = "Value";
$chart->yAxis->minPadding = 0.2;
$chart->yAxis->maxPadding = 0.2;
$chart->yAxis->maxZoom = 60;
$chart->yAxis->plotLines[] = array(
    'value' => 0,
    'width' => 1,
    'color' => "#808080"
);
$chart->legend->enabled = false;
$chart->exporting->enabled = true;
$chart->exporting->buttons->contextButton->enabled = true;
$chart->exporting->enabled = true;
$chart->exporting->enabled = true;

$chart->plotOptions->series->lineWidth = 1;
$chart->plotOptions->series->point->events->click = new HighchartJsExpr(
    "function() {
    if (this.series.data.length > 1) this.remove(); }");
$chart->series[]->data = array(
    array(
        20,
        20
    ),
    array(
        80,
        80
    )
);
?>