const monthNames = [
    'January', 'February', 'March', 'April', 'May', 'June',
    'July', 'August', 'September', 'October', 'November', 'December'
];


let myChart; // Declare a variable to hold the chart instance

function createChart(type, data, options) {

    // Get chart canvas element
    const ctx = document.getElementById('myChart').getContext('2d');
    // Destroy the existing chart if it exists
    if (myChart) {
        myChart.destroy();
    }

    op = options;
    if (options == null) {
        // Configure chart options
        op = {
            responsive: false,
            maintainAspectRatio: false, // Set to true to maintain aspect ratio
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 5 // Adjust the step size to make the scale smaller
                    }
                }
            }
        };
    }

    // Create the new chart
    myChart = new Chart(ctx, {
        type: type,
        data: data,
        options: op
    });

}

function productsChart(year) {

    if (year == null) {
        year = selectedYear
    }

    document.getElementById('yearButtonNegative').onclick = function () {
        changeYearProducts(-1);
    };
    document.getElementById('yearButtonPositive').onclick = function () {
        changeYearProducts(1);
    };
    document.getElementById('refreshButton').onclick = function () {
        changeYearProducts("refresh");
    };

    const productsData = products;

    // Assuming you have monthNames containing the names of the months
    const monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    // Initialize an object to hold the count of tickets for each month
    const productsByMonth = {
        '01': 0, // January
        '02': 0, // February
        '03': 0, // March
        '04': 0, // April
        '05': 0, // May
        '06': 0, // June
        '07': 0, // July
        '08': 0, // August
        '09': 0, // September
        '10': 0, // October
        '11': 0, // November
        '12': 0  // December
    };

    // Convert the grouped data into an array of objects for charting
    const chartData = Object.keys(productsByMonth).map(month => {
        return {
            month: monthNames[Number(month) - 1], // Get month name from an array of month names
            count: productsByMonth[month]
        };
    });

    const productChartData = {
        labels: chartData.map(data => data.month), // Will contain the months
        datasets: [
            {
                label: 'Total Quantity Sold',
                data: [], // Will contain the total quantity sold for each month
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 2,
                fill: false
            },
            {
                label: 'Total Orders',
                data: [], // Will contain the total orders for each month
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 2,
                fill: false
            },
            {
                label: 'Discount',
                data: [], // Will contain the discount for each month
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 2,
                fill: false
            }
        ]
    };


    for (const key in productsData) {
        if (productsData.hasOwnProperty(key)) {
            const product = productsData[key];
            const createdAt = new Date(product.created_at);
            const productYear = createdAt.getFullYear();
            if (productYear === year) {
                const month = String(createdAt.getMonth() + 1).padStart(2, '0'); // Adding 1 because getMonth() returns zero-based index
                productsByMonth[month]++;
            }
            // Update the corresponding dataset values
            productChartData.datasets[0].data.push(product.total_quantity_sold);
            productChartData.datasets[1].data.push(product.total_orders);
            productChartData.datasets[2].data.push(product.discount);
        }
    }

    // Configure chart options
    const options = {
        responsive: false,
        maintainAspectRatio: true, // Set to true to maintain aspect ratio
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    stepSize: 5 // Adjust the step size to make the scale smaller
                }
            }
        }
    };

    createChart('line', productChartData, options);
}

// Function to create the chart based on the selected year
function ticketsChart(year) {
    if (year == null) {
        year = selectedYear
    }

    document.getElementById('yearButtonNegative').onclick = function () {
        changeYearTickets(-1);
    };
    document.getElementById('yearButtonPositive').onclick = function () {
        changeYearTickets(1);
    };
    document.getElementById('refreshButton').onclick = function () {
        changeYearTickets("refresh");
    };


    const ticketsData = tickets;

    // Initialize an object to hold the count of tickets for each month
    const ticketsByMonth = {
        '01': 0, // January
        '02': 0, // February
        '03': 0, // March
        '04': 0, // April
        '05': 0, // May
        '06': 0, // June
        '07': 0, // July
        '08': 0, // August
        '09': 0, // September
        '10': 0, // October
        '11': 0, // November
        '12': 0  // December
    };


    // Iterate over each ticket object and group them by month within the selected year
    for (const key in ticketsData) {
        if (ticketsData.hasOwnProperty(key)) {
            const ticket = ticketsData[key];
            const createdAt = new Date(ticket.created_at);
            const ticketYear = createdAt.getFullYear();
            if (ticketYear === year) {
                const month = String(createdAt.getMonth() + 1).padStart(2, '0'); // Adding 1 because getMonth() returns zero-based index
                ticketsByMonth[month]++;
            }
        }
    }

    // Convert the grouped data into an array of objects for charting
    const chartData = Object.keys(ticketsByMonth).map(month => {
        return {
            month: monthNames[Number(month) - 1], // Get month name from an array of month names
            count: ticketsByMonth[month]
        };
    });

    const data = {
        labels: chartData.map(data => data.month),
        datasets: [{
            label: 'Number of Tickets',
            data: chartData.map(data => data.count),
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    }

    // Configure chart options
    const options = {
        responsive: false,
        maintainAspectRatio: true, // Set to true to maintain aspect ratio
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    stepSize: 5 // Adjust the step size to make the scale smaller
                }
            }
        }
    };

    createChart('bar', data, options);
}

// Function to create the chart based on the selected year
function usersChart(year) {
    if (year == null) {
        year = selectedYear
    }

    document.getElementById('yearButtonNegative').onclick = function () {
        changeYearUser(-1);
    };
    document.getElementById('yearButtonPositive').onclick = function () {
        changeYearUser(1);
    };
    document.getElementById('refreshButton').onclick = function () {
        changeYearUser("refresh");
    };


    const usersData = users;

    // Initialize an object to hold the count of tickets for each month
    const usersByMonth = {
        '01': 0, // January
        '02': 0, // February
        '03': 0, // March
        '04': 0, // April
        '05': 0, // May
        '06': 0, // June
        '07': 0, // July
        '08': 0, // August
        '09': 0, // September
        '10': 0, // October
        '11': 0, // November
        '12': 0  // December
    };


    // Iterate over each ticket object and group them by month within the selected year
    for (const key in usersData) {
        if (usersData.hasOwnProperty(key)) {
            const user = usersData[key];
            const createdAt = new Date(user.created_at);
            const userYear = createdAt.getFullYear();
            if (userYear === year) {
                const month = String(createdAt.getMonth() + 1).padStart(2, '0'); // Adding 1 because getMonth() returns zero-based index
                usersByMonth[month]++;
            }
        }
    }

    // Convert the grouped data into an array of objects for charting
    const chartData = Object.keys(usersByMonth).map(month => {
        return {
            month: monthNames[Number(month) - 1], // Get month name from an array of month names
            count: usersByMonth[month]
        };
    });

    const data = {
        labels: chartData.map(data => data.month),
        datasets: [{
            label: 'Users',
            data: chartData.map(data => data.count),
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    }

    // Configure chart options
    const options = {
        responsive: false,
        maintainAspectRatio: true, // Set to true to maintain aspect ratio
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    stepSize: 5 // Adjust the step size to make the scale smaller
                }
            }
        }
    };

    createChart('bar', data, options);
}


var selectedYear = new Date().getFullYear();

// Function to handle year change
function changeYearTickets(change) {

    selectedYear += change;

    if (change == "refresh") {
        selectedYear = new Date().getFullYear();
    }
    // Create new chart with the selected year
    ticketsChart(selectedYear);
}

// Function to handle year change
function changeYearProducts(change) {

    selectedYear += change;

    if (change == "refresh") {
        selectedYear = new Date().getFullYear();
    }
    // Create new chart with the selected year
    productsChart(selectedYear);
}

// Function to handle year change
function changeYearUsers(change) {

    selectedYear += change;

    if (change == "refresh") {
        selectedYear = new Date().getFullYear();
    }
    // Create new chart with the selected year
    UsersChart(selectedYear);
}


document.addEventListener('DOMContentLoaded', function () {


    // Initial chart creation with the current year
    const currentYear = new Date().getFullYear();
    productsChart(currentYear);
});
