google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {
    var data = google.visualization.arrayToDataTable(donnees);

    var options = {
        title: 'Consommation Electrique de l\'Habitation',
        chartArea: {width: '50%'},
        hAxis: {
            title: 'Jours',
            minValue: 0,
            textStyle: {
                bold: true,
                fontSize: 12,
                color: '#4d4d4d'
            },
            titleTextStyle: {
                bold: true,
                fontSize: 11,
                color: '#4d4d4d'
            }
        },
        vAxis: {
            title: 'KwH',
            textStyle: {
                fontSize: 14,
                bold: true,
                color: '#848484'
            },
            titleTextStyle: {
                fontSize: 14,
                bold: true,
                color: '#848484'
            }
        }
    };
    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
    chart.draw(data, options);
}