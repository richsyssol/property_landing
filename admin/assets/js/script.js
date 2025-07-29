// Navigation bar onclick

function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('collapsed');
}

const ctx1 = document.getElementById('revenueChart').getContext('2d');
new Chart(ctx1, {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        datasets: [{
            label: 'Revenue',
            data: [12000, 15000, 13000, 17000, 16000, 18000],
            borderColor: 'rgba(75, 192, 192, 1)',
            fill: false
        }]
    },
    options: {
        responsive: true
    }
});

const ctx2 = document.getElementById('salesPieChart').getContext('2d');
new Chart(ctx2, {
    type: 'pie',
    data: {
        labels: ['Product A', 'Product B', 'Product C'],
        datasets: [{
            data: [40, 30, 30],
            backgroundColor: ['#007bff', '#28a745', '#ffc107']
        }]
    },
    options: {
        responsive: true
    }
});




document.getElementById('sidebarToggle').addEventListener('click', function () {
    // alert('Sidebar toggle clicked!');
});
// Navigation bar onclick


