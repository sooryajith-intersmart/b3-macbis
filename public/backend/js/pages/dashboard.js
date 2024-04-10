// Sales chart
var salesChartCanvas = document
    .getElementById("revenue-chart-canvas")
    .getContext("2d");
var salesChartData = {
    labels: sales_chart_label,
    datasets: [
        {
            label: "Sales",
            backgroundColor: "rgba(60,141,188,0.9)",
            borderColor: "rgba(60,141,188,0.8)",
            pointRadius: false,
            pointColor: "#3b8bba",
            pointStrokeColor: "rgba(60,141,188,1)",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(60,141,188,1)",
            data: sales_chart_data,
        },
    ],
};

var salesChartOptions = {
    maintainAspectRatio: false,
    responsive: true,
    legend: {
        display: false,
    },
    scales: {
        xAxes: [
            {
                gridLines: {
                    display: false,
                },
            },
        ],
        yAxes: [
            {
                gridLines: {
                    display: false,
                },
            },
        ],
    },
};

var salesChart = new Chart(salesChartCanvas, {
    type: "line",
    data: salesChartData,
    options: salesChartOptions,
});
