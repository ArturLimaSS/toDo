<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
  <?php
  ?>
<canvas id="myChart"></canvas>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>
    
      // unica diferença é que você receberá o json dinamicamente
      // valor que chegará da requisição            
      let json = JSON.parse('{ "jose":1 , "maria":2, "joão":3 , "pedro":4}')

      // cria uma array para nomes e valore
      let nomes = [];
      let valores = [];

      // percorre o json
      for(let i in json){
         // adiciona na array nomes a key do campo do json
         nomes.push(i);
         // adiciona na array de valore o value do campo do json
         valores.push(json[i]);
      }

      var ctx = document.getElementById('myChart').getContext('2d');
      var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          //labels são cada uma das barrinhas. Basta adicionar a array abaixo:
          labels: nomes,
          datasets: [{
              label: '# of Votes',
              //data serve para adicionar o valor de cada barrinha. Basta adicionar a array abaixo:
              data: valores,
              backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(255, 159, 64, 0.2)'
              ],
              borderColor: [
                  'rgba(255, 99, 132, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)'
              ],
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero: true
                  }
              }]
          }
      }
  });
   

</script>
</body>