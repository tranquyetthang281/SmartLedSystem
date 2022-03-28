var ctx = document.getElementById("myChart").getContext("2d");
var myChart = new Chart(ctx, {
    type: "line",
    data: {
        labels: [
            "1",
            "10",
            "15",
            "20",
            "25",
            "30"
        ],
        datasets: [{
            label: "Lượng điện tiêu thụ (kWh)",
            data: [2, 9, 3, 17, 8, 20],
            backgroundColor: "rgba(83, 199, 70, 0.5)",
        },
        ],
    },
});

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
