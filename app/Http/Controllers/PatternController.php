<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatternController extends Controller
{
  /**
   * Handle the incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function __invoke(Request $request)
  {
    //
  }

  public function starPattern()
  {
    for ($i = 0; $i <= 5; $i++) {
      for ($j = 0; $j < $i; $j++) {
        echo "* &nbsp;&nbsp";
      }
      echo "<br>";
    }
  }
  public function nestedPattern()
  {
    $k = 1;

    for ($i = 0; $i < 8; $i++) {
      for ($j = 0; $j < $k; $j++) {
        echo "* &nbsp;&nbsp";
      }
      if ($i <= 2) {
        $k++;
      } else if ($i == 3) {
        $k;
      } else {
        $k--;
      }
      echo "<br>";
    }
  }
  public function factorialNumber()
  {
    $number = $factorial = 4;
    if (is_numeric($number)) {
      for ($i = ($number - 1); $i > 0; $i--) {
        $factorial = $factorial * $i;
        // print_r($i);
      }
      print_r($factorial);
    }
  }

  public function chessBoardPattern()
  {
    return view('pattern/chessboard');
  }
}
