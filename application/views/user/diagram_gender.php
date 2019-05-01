<div class="container mt-5">
    <div class="row bg-white rounded shadow">
        <div class="col px-0">            
            <div class="row px-3">
                <div class="col">
                    <div id="gender_chart" style="height: 370px; width: 100%;"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    window.onload = function() {
        var chart = new CanvasJS.Chart("gender_chart", {
            exportEnabled: true,
            animationEnabled: true,
            title:{
                text: "Gender di Tiap Blok"
            },
            axisX: {
                title: "Blok"
            },
            axisY: {
                title: "Laki - laki",
                titleFontColor: "#4F81BC",
                lineColor: "#4F81BC",
                labelFontColor: "#4F81BC",
                tickColor: "#4F81BC"
            },
            axisY2: {
                title: "Perempuan",
                titleFontColor: "#C0504E",
                lineColor: "#C0504E",
                labelFontColor: "#C0504E",
                tickColor: "#C0504E"
            },
            toolTip: {
                shared: true
            },
            legend: {
                cursor: "pointer",
                itemclick: toggleDataSeries
            },
            data: [{
                type: "column",
                name: "Laki - laki",
                showInLegend: true,      
                yValueFormatString: "#,##0.# Units",
                dataPoints: <?php echo json_encode($dataPoints_cowok, JSON_NUMERIC_CHECK); ?>
            },
            {
                type: "column",
                name: "Perempuan",
                axisYType: "secondary",
                showInLegend: true,
                yValueFormatString: "#,##0.# Units",
                dataPoints: <?php echo json_encode($dataPoints_cewek, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();

        function toggleDataSeries(e) {
            if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                e.dataSeries.visible = false;
            } else {
                e.dataSeries.visible = true;
            }
            e.chartGender.render();
        }
    }
</script>