DOMAIN = 'http://localhost/SmartLedSystem/SourceMVC/client/';
var ctx = document.getElementById('myChart').getContext('2d');
var myChart;

$.ajax({
    url: DOMAIN + 'Statistics/getData',
    type: 'post',
    dataType: 'json',
    success: function (result) {
        var i_labels = [];
        var i_datasets = [];
        $.each(result, function (key, value) {
            $.each(value, function (key, value) {
                i_labels.push(key.toString());
                i_datasets.push(parseFloat(value.energy));
            });
        });
        myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: i_labels,
                datasets: [
                    {
                        label: 'Lượng điện tiêu thụ (Wh)',
                        data: i_datasets,
                        backgroundColor: 'rgba(83, 199, 70, 0.5)',
                    },
                ],
            },
        });
    },
});
function updateChart(label, data) {
    myChart.data.labels = label;
    myChart.data.datasets[0].data = data;
    myChart.update();
}

function changeStatistics() {
    ledId = $('#slc-led option:selected').val().split('led')[1];
    time = $('#slc-time option:selected').val();
    $.ajax({
        url: DOMAIN + 'Statistics/getData',
        type: 'post',
        data: {
            led_id: ledId,
            time: time,
        },
        dataType: 'json',
        success: function (result) {
            var labels = [];
            var datasets = [];
            $.each(result, function (key, value) {
                $.each(value, function (key, value) {
                    labels.push(key.toString());
                    datasets.push(parseFloat(value.energy));
                });
            });
            updateChart(labels, datasets);
        },
    });
}

// const labels = [
//     "1",
//     "10",
//     "15",
//     "20",
//     "25",
//     "30"
// ];

// const data = {
//     labels: labels,
//     datasets: [{
//         label: 'Lượng điện tiêu thụ (kWh)',
//         backgroundColor: 'rgb(83, 199, 70, 0.5)',
//         borderColor: 'rgb(83, 199, 70)',
//         fill: true,
//         data: [10, 21, 32, 23, 40, 25],
//     }]
// };

// const config = {
//     type: 'line',
//     data: data,
//     options: {}
// };

// const myChart = new Chart(
//     document.getElementById('myChart'),
//     config
// );
