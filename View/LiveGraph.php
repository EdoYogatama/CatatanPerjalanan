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
        var canvas = document.getElementById('chart');
        var data = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
                {
                    label: "My First dataset",
                    fill: false,
                    lineTension: 0.0,
                    backgroundColor: "rgba(75,192,192,0.4)",
                    borderColor: "rgba(75,192,192,1)",
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    pointBorderColor: "rgba(75,192,192,1)",
                    pointBackgroundColor: "#fff",
                    pointBorderWidth: 1,
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "rgba(75,192,192,1)",
                    pointHoverBorderColor: "rgba(220,220,220,1)",
                    pointHoverBorderWidth: 2,
                    pointRadius: 5,
                    pointHitRadius: 10,
                    data: [65, 59, 80, 0, 56, 55, 40],
                }
            ]
        };
        var option = {
            showLines: true,
            scales: {
                yAxes: [{
                display: true,
                ticks: {
                    beginAtZero:true,
                    min: 0,
                    max: 100  
                }
                }]
            }
        };
        var zero = 7;
        function adddata(){

        var value = Math.floor((Math.random() * 10) + 1);;
            myLineChart.data.labels.push(zero);
            myLineChart.data.labels.splice(0, 1);
        myLineChart.data.datasets[0].data.splice(0, 1);
        myLineChart.data.datasets[0].data.push(value); 


        myLineChart.update();
        zero++;
        }



        setInterval(function(){
        adddata();
            },1000);

        var option = {
            showLines: true
        };
        var myLineChart = Chart.Line(canvas,{
            data:data,
        options:option
        });
    </script>
</body>
</html>