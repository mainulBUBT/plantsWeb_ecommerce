<?php 
// include '../../config/database.php';

$query = $mysqli->query("SELECT COUNT(order_id) as orderz, MONTHNAME(date)as month FROM `orders` GROUP BY MONTHNAME(date)");

foreach($query as $data)
{
  $month[] = $data['month'];
  $orderz[] = $data['orderz'];
}

?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<canvas id="BarChart" width="100%" height="40"></canvas>


<script>
  // === include 'setup' then 'config' above ===
  const labels = <?php echo json_encode($month) ?>;
  const data = {
    labels: labels,
    datasets: [{
      label: 'My First Dataset',
      data: <?php echo json_encode($orderz) ?>,
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
    }]
  };

  const config = {
    type: 'bar',
    data: data,
    options: {
      scales: {
        xAxes: [{
          time: {
            unit: 'month'
          },
          gridLines: {
            display: false
          },
          ticks: {
            maxTicksLimit: 6
          }
        }],
        yAxes: [{
          ticks: {
            min: 0,
            max: 15000,
            maxTicksLimit: 5
          },
          gridLines: {
            display: true
          }
        }],
      },
      legend: {
        display: false
      }
    },
  };

  var myChart = new Chart(
    document.getElementById('BarChart'),
    config
    );
  </script>
