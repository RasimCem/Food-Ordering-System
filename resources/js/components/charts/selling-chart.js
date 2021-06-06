export const sellingChart = {
    type: "line",
    data: {
        labels: [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December"
        ],
        datasets: [
            {
                label: "# of Orders",
                data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                backgroundColor: "#ffffcc",
                borderColor: "#fbbf24",
                fill: true,
                borderWidth: 2
            }
        ]
    },
    responsive: true,
    maintainAspectRatio: false,
    scales: {
        yAxes: [{
            ticks: {
                beginAtZero:true,
                precision: 0,
                stepSize: 1,
            }
        }]
    }
};
