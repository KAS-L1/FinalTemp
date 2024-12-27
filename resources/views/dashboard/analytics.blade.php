<x-layout>
    <div class="container">
        <div class="row justify-content-center mb-3">
            <div class="col-4">
                <div class="card ">
                    <div class="card-header">
                        <h5>Card 1</h5>
                    </div>
                    <div class="card-body">
                        <p>Content 1</p>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Card 2</h5>
                    </div>
                    <div class="card-body">
                        <p>Content 2</p>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Card 3</h5>
                    </div>
                    <div class="card-body">
                        <p>Content 3</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col"> <!-- Adjust the column size as needed -->
                <div class="card" style="height: 500px;"> <!-- Set a fixed height for the chart card -->
                    <div class="card-header">
                        <h5>Analytics</h5>
                    </div>
                    <div class="card-body">
                        <div id="container" style="height: 100%;"></div> <!-- Set height to 100% -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>

<script>
    // Create a chart for displaying product prices
    var options = {
        chart: {
            type: 'area',
            height: '100%', // Make the chart responsive to the container height
        },
        colors: ['#00e272'],
        series: [],
        xaxis: {
            categories: []
        },
        title: {
            text: 'Product Prices'
        },
        dataLabels: {
            enabled: false
        },

        stroke: {
            curve: 'smooth',
            width: 2,
            colors: ['#00e272']
        }
    }

    var chart = new ApexCharts(document.querySelector('#container'), options);
    chart.render();

    // Function to fetch data dynamically
    function loadData() {
        // Example of an AJAX call to fetch data
        fetch('api/products')
            .then(response => response.json())
            .then(data => {
                // Assuming 'data' is an array of product objects
                const categories = data.map(product => product.name); // Extract product names
                const seriesData = data.map(product => product.unit_price); // Extract unit prices

                // Update the chart with new data
                chart.updateOptions({
                    series: [{
                        name: 'Product Prices',
                        data: seriesData
                    }],
                    xaxis: {
                        categories: categories
                    }
                });
            })
            .catch(error => console.error('Error loading data:', error));
    }

    // Call loadData to fetch data
    loadData();
</script>
