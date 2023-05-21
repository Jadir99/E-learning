<div>
  <canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  // Retrieve the data from the server-side variable

  // Create the chart
  const ctx = document.getElementById('myChart').getContext('2d');
  new Chart(ctx, {
      type: 'bar',
      data: {
          labels: ['January', 'February', 'March', 'April', 'May', 'June','July','August','September','October','November','December'],
          datasets: [{
              label: ['dashbord','tresytf','ihihb'],
              data: [{{$courses[1]}}, {{$courses[2]}},{{$courses[3]}}+0, {{$courses[4]}}, {{$courses[5]}}, {{$courses[6]}},{{$courses[7]}}, {{$courses[8]}}, {{$courses[9]}}, {{$courses[10]}}, {{$courses[11]}}, {{$courses[12]}}],
              backgroundColor: [
                  'rgba(255, 99, 132, 0.5)',
                  'rgba(54, 162, 235, 0.5)',
                  'rgba(255, 206, 86, 0.5)',
                  'rgba(75, 192, 192, 0.5)',
                  'rgba(153, 102, 255, 0.5)',
                  'rgba(255, 159, 64, 0.5)',
              ],
              borderColor: [
                'rgb(75, 192, 192)',
                  'rgba(255, 99, 132, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)',
              ],
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          }
      }
  });
</script>