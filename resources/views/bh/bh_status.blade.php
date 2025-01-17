@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1>;lkajsdf;lkj</h1>
    <div style="width: 600px; margin: 50px auto;">
        <canvas id="myChart"></canvas>
    </div>
</div> @endsection
<script>
    const ctx = document.getElementById('myChart').getContext('2d');

// Create the chart
const myChart = new Chart(ctx, {
    type: 'bar', // Chart type: bar, line, pie, etc.
    data: {
        labels: ['January', 'February', 'March', 'April', 'May'], // X-axis labels
        datasets: [{
            label: 'Monthly Sales', // Label for the dataset
            data: [12, 19, 3, 5, 2], // Data points
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)', // Bar colors
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)', // Border colors
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)'
            ],
            borderWidth: 1 // Border width
        }]
    },
    options: {
        responsive: true, // Makes the chart responsive
        scales: {
            y: {
                beginAtZero: true // Ensures the y-axis starts at 0
            }
        }
    }
});
</script>