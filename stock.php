<!DOCTYPE html>
<html>
<head>
    <title>Chart</title>
</head>
<body>

 <script src="https://code.highcharts.com/stock/highstock.js"></script>
<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
<script src="https://code.highcharts.com/stock/modules/export-data.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<div style="text-align: center;">
    
Bạn hãy chọn data :
    <select name="" id="log">
        <option value="1">1 data từ csdl (data_tem.php)</option>
        <option value="2">1 data mẫu (data_a.json)</option>                            
        <option value="3">3 data mẫu (data_a_b_c.json)</option>   
        
    </select>
</div>    
<div id="container" style="height: 400px; min-width: 600px"></div>



</body>
<script >
    
var seriesOptions = [],
    seriesCounter = 0,name=[];

/**
 * Create the chart when all data is loaded
 * @returns {undefined}
 */
function createChart() {

    Highcharts.stockChart('container', {

        rangeSelector: {
            selected: 4
        },

        yAxis: {
            labels: {
                formatter: function () {
                    return (this.value > 0 ? ' + ' : '') + this.value + '%';
                }
            },
            plotLines: [{
                value: 0,
                width: 2,
                color: 'silver'
            }]
        },

        xAxis: {
                type: 'datetime',
                dateTimeLabelFormats: {
                   day: '%d %b %Y'    //ex- 01 Jan 2016
                }
        },


        legend: {
            enabled: true
        },
        plotOptions: {
            series: {
                compare: 'percent',
                showInNavigator: true
            }
        },

        tooltip: {
            pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.change}%)<br/>',
            valueDecimals: 2,
            split: true
        },

        series: seriesOptions
    });
}

$('select').change(function(event) {
    var value =$(this).val();
    if(value=='1')
        names = ['tem'];
    if(value=='2')
        names = ['a'];    
    if(value=='3')
        names = ['a','b','c'];   });
$('select').change(function(event) {
    var value =$(this).val();
    $.each(names, function (i, name) {
    if(value=='2'||value=='3')
        var urls='data_'+name.toLowerCase()+'.json';
     if(value=='1')
       var urls='data_'+name.toLowerCase()+'.php';
        console.log(urls);
         $.ajax({
            type : 'POST', //kiểu post
            url  : urls,
            dataType:'json',  
            success : function(data){
            console.log(data);
          
            seriesOptions[i] = {
                name: name,
                data:data        };      
         seriesCounter += 1;

        if (seriesCounter === names.length) {
             createChart();
            seriesCounter=0;
            seriesOptions = [];
         }
     }
    });
});

});

</script>
</html>
