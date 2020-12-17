<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre.min.css">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-exp.min.css">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-icons.min.css">
    <link rel="stylesheet" href="Style/myLayout.css">
    <title>Tugas</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
</head>
<body>
    <div class="card-header myNav">
        <header class="navbar">
            <section class="navbar-section">
                <a href="index.php" class="navbar-brand mr-2"><span class="text-bold">ODiaries</span></a>
                <a href="#" class="btn btn-link">Graph</a>
                <a href="./History.php" class="btn btn-link">History</a>
            </section>
            <section class="navbar-section">
                <button class="btn btn-primary" onclick="location.href='SignIn.php';">Sign In</button>
            </section>
        </header>
    </div>
    <section class="flex-centered hero">
        <div class="bg-secondary card col-9 landingTitle">
            <div class="text-primary text-bold text-center"> 
                <canvas id="chart" class="card col-10"></canvas> 
                Source : <a href="https://data.giss.nasa.gov/gistemp/">https://data.giss.nasa.gov/gistemp/</a>
            </div>
        </div>
        <br>
        <div class="col-9">
            <button class="btn btn-primary btn-block" onclick="location.href='LiveGraph.php';">Todays Temp</button>
        </div>
    </section>
    <script>
        
        makeChart();
        async function makeChart() {
            const data = await getData();
            const ctx = document.getElementById('chart').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: data.xs,
                    datasets: [{
                        label: 'Combined Land-Surface Air and Sea-Surface Water Temperature in C°',
                        data: data.ys,
                        fill: false,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function(value, index, values){
                                    return value + "°";
                                }
                            }
                        }]
                    }
                }
            });
        }

        getData();

        async function getData() {
            const xs = [];
            const ys = [];
            
            const response = await fetch("Dataset/ZonAnn.Ts+dSST.csv");
            const data = await response.text()

            const table = data.split('\n').slice(1);
            table.forEach(row => {
                const cols = row.split(',');
                const year = cols[0];
                xs.push(year);
                const temp = cols[1];
                ys.push(parseFloat(temp)+14)
                console.log(year, temp)
            });
            return {xs, ys};
        }
    </script>
</body>
</html>