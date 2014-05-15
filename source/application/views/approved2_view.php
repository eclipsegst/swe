

<script type="text/javascript" src="http://static.zephyrcharts.com/bs_caro/jquery-1.9.1.min.js"></script>
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>



<div id="container" style="height: 400px"></div>
<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'pie',
            options3d: {
				enabled: true,
                alpha: 45
            }
        },
        title: {
            text: 'Hourly portions charts'
        },

        plotOptions: {
            pie: {
                innerSize: 100,
                depth: 45
            }
        },
        series: [{
            name: 'Total hours worked',
            data: [ 
				// <?php 
				// foreach ($stack as $user)
				// {
				// echo "['" . $user[1] . "', " . $user[2] . "],";
    //         }
				// ?>
                ['Incorrect1',       2],
                ['Incorrect2',       3],
                ['Incorrect3',       4],  
            ]

        }]
    });
});


</script>


