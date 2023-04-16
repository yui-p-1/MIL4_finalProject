<x-app-layout>

  <h1>{{ $title }}</h1>
      @foreach($employees as $employee)
    
    <div id = employee_button>
          @foreach($employee as $key => $id)
            <!--<a href="/predict/{{ $id }}" class="btn">{{ $employee[$key] }}</a>-->
            <a href="/predict" class="btn">{{ $employee[$key] }}</a>
          @endforeach

      <style>
          #employee_button{
              /*コレ*/border: 1px solid #333;
              padding: 10px 30px;
              background: #e4fdff;
              cursor: pointer;
          }
      </style>
      
    </div>
      @endforeach

</x-app-layout>