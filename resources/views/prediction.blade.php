<x-app-layout>

<html>
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<body>
    <div>
        <canvas id="myLineChart"></canvas>
        <canvas id="myLineChart_2"></canvas>
    </div>
    
      <?php
      //phpでのデータ
      $j_trains = json_encode($trains);
      $j_tests = json_encode($tests);
      
      $j_trains = str_replace('\t', ' ', $j_trains);
      $j_tests = str_replace('\t', ' ', $j_tests);
      ?>
      
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
        <script>
        //phpから値を受け取る
        let trains = JSON.parse('<?php echo $j_trains; ?>');
        let tests = JSON.parse('<?php echo $j_tests; ?>');
        
        const train_X = trains.map(function(value, index) {
            return value[0];
        });
        
        const train_Y = trains.map(function(value, index) {
            return value[1];
        });
        
        const test_X = tests.map(function(value, index) {
            return value[0];
        });
        
        const test_Y = tests.map(function(value, index) {
            return value[1];
        });
        
        //以下，グラフを表示
        var ctx = document.getElementById("myLineChart");
          var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
              labels:Array.from({ length: train_X.length }, (_, i) => i + 1),
              datasets: [
                {
                  label: 'Yの値',
                  data: train_X,
                  borderColor: "rgba(255,0,0,1)",
                  backgroundColor: "rgba(0,0,0,0)"
                },
                {
                  label: 'Zの値',
                  data: train_Y,
                  borderColor: "rgba(0,0,255,1)",
                  backgroundColor: "rgba(0,0,0,0)"
                }
              ],
            },
            options: {
              title: {
                display: true,
                text: 'trains'
              },
              scales: {
                yAxes: [{
                  ticks: {
                    suggestedMax: 40,
                    suggestedMin: 0,
                    stepSize: 10,
                    callback: function(value, index, values){
                      <!--return  value +  'cm'-->
                      return  value
                    }
                  }
                }]
              },
            }
          });
    
        var ctx_2 = document.getElementById("myLineChart_2");
              var myLineChart_2 = new Chart(ctx_2, {
                type: 'line',
                data: {
                  labels:Array.from({ length: test_X.length }, (_, i) => i + 1),
                  datasets: [
                    {
                      label: 'Yの値',
                      data: test_X,
                      borderColor: "rgba(255,0,0,1)",
                      backgroundColor: "rgba(0,0,0,0)"
                    },
                    {
                      label: 'Zの値',
                      data: test_Y,
                      borderColor: "rgba(0,0,255,1)",
                      backgroundColor: "rgba(0,0,0,0)"
                    }
                  ],
                },
                options: {
                  title: {
                    display: true,
                    text: 'trains'
                  },
                  scales: {
                    yAxes: [{
                      ticks: {
                        suggestedMax: 40,
                        suggestedMin: 0,
                        stepSize: 10,
                        callback: function(value, index, values){
                          <!--return  value +  'cm'-->
                          return  value
                        }
                      }
                    }]
                  },
                }
              });      
  
     </script>
</body>
</html>

</x-app-layout>
