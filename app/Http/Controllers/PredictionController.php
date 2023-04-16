<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PredictionController extends Controller{

public function csvPrediction(){
      // SplFileObjectの作成
      $file_1 = new \SplFileObject(storage_path('app/train.csv'));

      // 読み込み設定
      $file_1->setFlags(
        \SplFileObject::READ_CSV | // CSVを配列形式で読み込む
        \SplFileObject::READ_AHEAD |
        \SplFileObject::SKIP_EMPTY | // 前の行と合わせて、空行があったら読み飛ばす
        \SplFileObject::DROP_NEW_LINE // 改行コードは無視する
      );
      // 1行ずつ読み込んで配列に保存
      $trains = [];
      foreach($file_1 as $train){
        $trains[] = $train;
      }
      
    //   $trains = array_slice($trains, 1); // ヘッダー行を削除
    //   DB::table('trains')->insert($trains); // DBに格納
      
      
      $file_2 = new \SplFileObject(storage_path('app/test.csv'));

      // 読み込み設定
      $file_2->setFlags(
        \SplFileObject::READ_CSV | // CSVを配列形式で読み込む
        \SplFileObject::READ_AHEAD |
        \SplFileObject::SKIP_EMPTY | // 前の行と合わせて、空行があったら読み飛ばす
        \SplFileObject::DROP_NEW_LINE // 改行コードは無視する
      );
      // 1行ずつ読み込んで配列に保存
        $tests = [];
        foreach($file_2 as $test){
          $tests[] = $test;
          }
      
      
        DB::table('prediction')->truncate();
        foreach($file_2 as $test) {
        // $test[0]はtest_Xカラム、$test[1]はtest_Yカラムの値に対応する
        $test_X = $test[0];
        $test_Y = $test[1];
      
        DB::table('prediction')->insert([
            'test_X' => $test_X,
            'test_Y' => $test_Y,
            ]);
        }
  
        return view('/prediction', [
        'trains' => $trains,
        'tests' => $tests,
        ]);
      
      
        }
    }
    ?>
    
    