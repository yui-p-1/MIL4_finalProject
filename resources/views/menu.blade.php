<x-app-layout>

    <!--ヘッダー[START]-->
    <x-slot name="header">
    </x-slot>
    <!--ヘッダー[END]-->
    
<!--全エリア[START]-->
    <link href="{{ asset('dist/css/dashboard.css') }}" rel="stylesheet">
    <div class="button-container">
        <a href="dataViz">
          <img src="{{ asset('dist/img/img_1.jpg') }}" alt="Button Image" title="img_1" height="300" width="320">
        </a>
        <a href="predict">
          <img src="{{ asset('dist/img/img_2.jpg') }}" alt="Button Image" title="img_2" height="300" width="400">
        </a>
        <a href="dashboard">
          <img src="{{ asset('dist/img/img_3.jpg') }}" alt="Button Image" title="img_3" height="250" width="270">
        </a>
    </div>
    

 <!--全エリア[END]-->

</x-app-layout>



        
