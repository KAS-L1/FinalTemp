    <x-layout>
        <div class="container">
            <div class="row justify-content-center mb-3">
                <div class="col-4">
                    <div class="card ">
                        <div class="card-header">
                            <h5>Orders</h5>
                        </div>
                        <div class="card-body">
                            <p>{{ $purchaseItemCount }}</p>
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
        document.addEventListener('DOMContentLoaded', function() {
            initializeChart();
            loadPurchaseItems();
        });

        function initializeChart() {
            var options = {
                chart: {
                    type: 'area',
                    height: '100%',
                    toolbar: {
                        show: true,
                        tools: {
                            download: true,
                            selection: true,
                            zoom: true,
                            zoomin: true,
                            zoomout: true,
                            pan: true,
                            reset: true
                        },
                        autoSelected: 'zoom'
                    },
                },
                colors: ['#00e272'],
                series: [],
                xaxis: {
                    categories: [],
                    title: {
                        text: 'Products'
                    }
                },
                yaxis: {
                    title: {
                        text: 'Costs'
                    }
                },
                title: {
                    text: 'Purchase Order Costs',
                    align: 'center'
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth',
                    width: 2
                },
                tooltip: {
                    y: {
                        formatter: function(value) {
                            return "₱" + value.toFixed(2);
                        }
                    }
                },
                legend: {
                    position: 'top',
                    horizontalAlign: 'right',
                    floating: true,
                    offsetY: -25,
                    offsetX: -5,
                    markers: {
                        width: 12,
                        height: 12,
                        strokeWidth: 0,
                        strokeColor: '#fff',
                        fillColors: undefined, // Add specific colors if needed
                        radius: 12,
                        customHTML: undefined,
                        onClick: undefined,
                        offsetX: 0,
                        offsetY: 0
                    },
                    itemMargin: {
                        horizontal: 0,
                        vertical: 20
                    }
                }
            };

            window.chart = new ApexCharts(document.querySelector('#container'), options);
            chart.render();
        }

        function loadPurchaseItems() {
            fetch('/api/items')
                .then(response => response.json())
                .then(data => {
                    const categories = data.map(item => item.product.name);
                    const seriesData = data.map(item => item.cost);

                    chart.updateOptions({
                        series: [{
                            name: '<i class="fa fa-chart-line"></i> Purchase Costs', // Simulated icon with FontAwesome
                            data: seriesData
                        }],
                        xaxis: {
                            categories: categories
                        }
                    });
                })
                .catch(error => console.error('Error loading purchase items:', error));
        }
    </script>
