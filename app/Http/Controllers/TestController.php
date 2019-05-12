<?php 
while ($input_line = fgets(STDIN)) {
    $tmp[] = trim($input_line);
}
$count = $tmp[0];

// 指定回数繰り返し
for ($i = 1; $i <= $count; $i++) {

    $N = $tmp[$i];

    // 約数を求める
    $S = 0;
    for ($divisor = 1; $divisor < $N; $divisor++) {
        if ($N % $divisor === 0) {
            $S += $divisor;
        }
    }

}

?>

<?php
    // 標準入力の取り出し
    while ($input_line = fgets(STDIN)) {
        $tmp[] = trim($input_line);
    }

    // 繰り返しの数を取得
    $number = $tmp[0];

     // 3つストライクでアウト4つボールでフォアボール
    $count_array = array_count_values($tmp);
    
    // $tmp = str_replace('ball', 'ball!', $tmp);
    // $tmp = str_replace('strike', 'strike!', $tmp);
    
    $strike_count = 0;
    $ball_count　 = 0;
    for ($i = 1; $i <= $number; $i++) {
        if ($tmp[$i] == 'strike') {
            $strike_count++;
            
            if ($strike_count == 3) {
                echo 'out!' . "\n";
            } else {
                echo 'strike!'. "\n";
            }
        }

        if ($tmp[$i] == 'ball') {
            $ball_count++;
            if ($ball_count == 4) {
                echo 'fourball!'. "\n";
            } else {
                echo 'ball!'. "\n";
            }
        }
    }
?>