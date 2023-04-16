<x-app-layout>
  
<html>
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!--<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>-->
    </head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!--ヘッダー[START]-->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

            <form action='employees' method="GET" class="w-full max-w-lg">
                <x-button class="bg-gray-100 text-gray-900">{{ __('all employees') }}</x-button>
            </form>
            <form action='home' method="GET" class="w-full max-w-lg">
                <x-button class="bg-gray-100 text-gray-900">{{ __('employee dashboard') }}</x-button>
            </form>
            <form action='map' method="GET" class="w-full max-w-lg">
                <x-button class="bg-gray-100 text-gray-900">{{ __('map') }}</x-button>
            </form>
            
        </h2>
    </x-slot>
    <!--ヘッダー[END]-->


<body>
    <div>
        <div id="empChart_11"></div>
        <canvas id="empChart_9"></canvas>
        <div id="empChart_10"></div>
        <div id="empChart_12"></div>
        
    </div>
    
      <?php
      //phpでのデータ
      // データベースに接続
      $mysqli = new mysqli("localhost", "root", "root", "c9");
      
      // 接続エラーのチェック
      if ($mysqli->connect_error) {
          error_log($mysqli->connect_error);
          exit;
      }
      
      // SQLクエリの作成と実行
      $sql = "SELECT * FROM employees";
      $result = mysqli_query($mysqli, $sql);
      
      // 行を配列に変換する
      $rows = array();
      while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
      }
      
      // データベースの切断
      $mysqli->close();
      
      // JSON形式に変換する
      $j_employees = json_encode($rows);
      
      ?>
      
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
        //phpから値を受け取る
        let employees = JSON.parse("<?php echo addslashes($j_employees); ?>");

        // Salary
        let salaries = employees.map((employee) => employee.Salary);
        let engagementSurvey = employees.map((employee) => employee.EngagementSurvey);
        
        //ABC順でのline
        var ctx = document.getElementById("empChart_9");
          var empChart_9 = new Chart(ctx, {
            type: 'line',
            data: {
              labels:Array.from({ length: salaries.length }, (_, i) => i + 1),
              datasets: [
                {
                  label: 'Salary',
                  data: salaries,
                  borderColor: "rgba(255,0,0,1)",
                  backgroundColor: "rgba(0,0,0,0)"
                },
              ],
            },
            options: {
              title: {
                display: true,
                text: 'Salary_Information'
              },
            }
          });
          
        //ヒストグラム
        // 同じ値を持つデータをグループ化する
        var trace = {
            x: salaries,
            type: 'histogram',
          };
        var data = [trace];
        Plotly.newPlot('empChart_10', data);
        
        var trace_1 = {
            x: engagementSurvey,
            type: 'histogram',
          };
        var data_1 = [trace_1];
        Plotly.newPlot('empChart_11', data_1);
        
 
        var trace1 = {
          x: salaries,
          y: engagementSurvey,
          mode: 'markers',
          type: 'scatter'
        };
        
        var data_2 = [trace1];
        
        Plotly.newPlot('empChart_12', data_2);
          
     </script>
     
     
</body>
</html>

</x-app-layout>
