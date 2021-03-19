
const loadReports = () => {
    return new Promise(resolve => {
        $.ajax({
            method: 'post',
            url: 'helpers/api/BarReportHelper/reportHelper.php',
            data: {
                action: 'bargraph'
            },
            success: function(response){
                resolve(response);
            }
        })
    }).then(response => {
        console.log(response);
        chartData = response;
        var chartProperties = {
            "caption" : "Report for course list",
            "xAxisName" : "Course name",
            "yAxisName" : "Counts",
            "rotatevalues" : "1",
            "theme": "fusion"
        };
        apichart = new FusionCharts({
            type: 'column2d',
            renderAt: 'chart-container-contain',
            width: '100%',
            height: '400',
            dataFormat: 'json',
            dataSource: {
                "chart": chartProperties,
                "data": chartData
            }
        });
        apichart.render();
    })
}
loadReports();