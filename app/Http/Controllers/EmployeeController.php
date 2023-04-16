<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller{

public function csvEmployee(){
  // SplFileObjectの作成
  $file = new \SplFileObject(storage_path('app/employees.csv'));

  // 読み込み設定
  $file->setFlags(
    \SplFileObject::READ_CSV | // CSVを配列形式で読み込む
    \SplFileObject::READ_AHEAD |
    \SplFileObject::SKIP_EMPTY | // 前の行と合わせて、空行があったら読み飛ばす
    \SplFileObject::DROP_NEW_LINE // 改行コードは無視する
  );
  // 1行ずつ読み込んで配列に保存
  $employees = [];
  foreach($file as $employee){
    $employees[] = $employee;
    
  }

  $employees = array_slice($employees, 1); // remove the header row
  $headers = array_shift($employees);

    foreach ($employees as &$employee) {
      foreach ($employee as &$value) {
          if (empty($value)) {
              $value = null;
          }
      }
    }

    foreach ($employees as &$employee) {
        $date = \DateTime::createFromFormat('m/d/y', $employee[15]);
        if ($date === false) {
            // エラー処理
        } else {
            $employee[15] = $date->format('Y-m-d');
        }
    }
    
        foreach ($employees as &$employee) {
        $date = \DateTime::createFromFormat('m/d/Y', $employee[21]);
        if ($date === false) {
            // エラー処理
        } else {
            $employee[21] = $date->format('Y-m-d');
        }
    }
    
            foreach ($employees as &$employee) {
        $date = \DateTime::createFromFormat('m/d/Y', $employee[22]);
        if ($date === false) {
            // エラー処理
        } else {
            $employee[22] = $date->format('Y-m-d');
        }
    }
    
        foreach ($employees as &$employee) {
        $date = \DateTime::createFromFormat('m/d/Y', $employee[33]);
        if ($date === false) {
            // エラー処理
        } else {
            $employee[33] = $date->format('Y-m-d');
        }
    }
    
        // 確認用
        $file = fopen('employees_rev.csv', 'w');
        
        // Write the header row
        fputcsv($file, $headers);
        
        // Write the data rows
        foreach ($employees as $employee) {
            fputcsv($file, $employee);
        }
        
        fclose($file);
        //確認用終わり
        
  foreach($employees as $employee){
    $emp_id = $employee[1];
    $existing_record = DB::table('employees')->where('EmpID', $emp_id)->first();
    
    if(!$existing_record)  
    $data = [
      'EmployeeName' => $employee[0],
      'EmpID' => $employee[1],
      'MarriedID' => $employee[2],
      'MaritalStatusID' => $employee[3],
      'GenderID' => $employee[4],
      'EmpStatusID' => $employee[5],
      'DeptID' => $employee[6],
      'PerfScoreID' => $employee[7],
      'FromDiversityJobFairID' => $employee[8],
      'Salary' => $employee[9],
      'Termd' => $employee[10],
      'PositionID' => $employee[11],
      'Position' => $employee[12],
      'State' => $employee[13],
      'Zip' => $employee[14],
      'DOB' => $employee[15],
      'Sex' => $employee[16],
      'MaritalDesc' => $employee[17],
      'CitizenDesc' => $employee[18],
      'HispanicLatino' => $employee[19],
      'RaceDesc' => $employee[20],
      'DateofHire' => $employee[21],
      'DateofTermination' => $employee[22],
      'TermReason' => $employee[23],
      'EmploymentStatus' => $employee[24],
      'Department' => $employee[25],
      'ManagerName' => $employee[26],
      'ManagerID' => $employee[27],
      'RecruitmentSource' => $employee[28],
      'PerformanceScore' => $employee[29],
      'EngagementSurvey' => $employee[30],
      'EmpSatisfaction' => $employee[31],
      'SpecialProjectsCount' => $employee[32],
      'LastPerformanceReviewDate' => $employee[33],
      'DaysLateLast30' => $employee[34],
      'Absences' => $employee[35],
    ];
    
    DB::table('employees')->insert($data);

}
 
  
  return view('/employee', [
    'title' => 'CSV読み込みのサンプル',
    'employees' => $employees,
  ]);

}
}
