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
                data: [5, 19, 3, 5, 2, 3, 65, 9, 9, 45, 25, 56],
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
                beginAtZero:true
            }
        }]
    }
};
