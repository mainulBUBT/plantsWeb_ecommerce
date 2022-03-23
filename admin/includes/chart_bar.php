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
      label: 'Monthly Orders',
      data: <?php echo json_encode($orderz) ?>,
      backgroundColor: [
      'rgba(255, 99, 132, 0.2)',
      'rgba(255, 159, 64, 0.2)',
      'rgba(255, 205, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(201, 203, 207, 0.2)'
      ],
      borderColor: [
      'rgb(255, 99, 132)',
      'rgb(255, 159, 64)',
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)',
      'rgb(54, 162, 235)',
      'rgb(153, 102, 255)',
      'rgb(201, 203, 207)'
      ],
      borderWidth: 1
    }]
  };

  const config = {
    type: 'bar',
    data: data,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    },
  };

  var myChart = new Chart(
    document.getElementById('BarChart'),
    config
    );
  </script>

