<?php

class Enc {

    public function start_enc($text) {
        $m = strlen($text);
        $b = 7;
        $faktor_m = array_unique($this->factor($m));
        $a = 1;
        foreach ($faktor_m as $f) {
            $a = $a * $f;
        }
        $a = $a + 1;
        $default_number = rand(0, $m - 1);
        if ($default_number > 9) {
            $default_number = 1;
        }

        $numbers[0] = $default_number;

        $i = 1;
        while ($i < $m) {
            $numbers[$i] = (($a * $numbers[$i - 1]) + $b) % $m;
            $i++;
        }

        $result = "";

        foreach ($numbers as $num) {
            $result .= substr($text, $num, 1);
        }

        $enc = $numbers[0] . base64_encode($result);
        return str_replace('==', '', $enc);
    }

    public function start_dec($text) {
        $default_number = substr($text, 0, 1);
        $text = base64_decode(substr($text, 1, strlen($text)));

        $m = strlen($text);
        $b = 7;
        $faktor_m = array_unique($this->factor($m));
        $a = 1;
        foreach ($faktor_m as $f) {
            $a = $a * $f;
        }
        $a = $a + 1;

        $numbers[0] = (int) $default_number;
        $abjads[$default_number] = substr($text, $default_number, 1);

        $i = 1;
        while ($i < $m) {
            $n = (($a * $numbers[$i - 1]) + $b) % $m;
            $t = substr($text, $n, 1);
            $numbers[$i] = $n;
            $abjads[$n] = $t;
            $i++;
        }

        for ($i = 0; $i < sizeof($numbers) - 1; $i++) {
            $min = $i;
            for ($j = $i + 1; $j < sizeof($numbers); $j++) {
                if ($numbers[$j] < $numbers[$min]) {
                    $min = $j;
                }
            }
            $numbers = $this->swap_position($numbers, $i, $min);
            $abjads = $this->swap_position($abjads, $i, $min);
        }

        $sort_result = "";
        for ($j = 0; $j < sizeof($abjads); $j++) {
            if(isset($abjads[$j]))
                $sort_result .= $abjads[$j];
            else
                $sort_result .= "_";
        }

        return $sort_result;
    }

    public function isPrime($a) {
        if ($a == 1) {
            return 0;
        }

        for ($i = 2; $i <= $a / 2; $i++) {
            if ($a % $i == 0) {
                return 0;
            }
        }
        return 1;
    }

    public function factor($a) {
        $arr = array();
        $i = 2;
        while (true) {
            $f = $a / $i;
            if (floor($f) != $f) {
                $i++;
            } else {
                $a = $f;
                array_push($arr, $i);
            }
            if ($this->isPrime($a) == 1) {
                array_push($arr, $a);
                break;
            }
        }
        return $arr;
    }

    public function short_number($num) {
        for ($i = 0; $i < sizeof($num) - 1; $i++) {
            $min = $i;
            for ($j = $i + 1; $j < sizeof($num); $j++) {
                if ($num[$j] < $num[$min]) {
                    $min = $j;
                }
            }
            $num = $this->swap_position($num, $i, $min);
        }
        return $num;
    }

    public function swap_position($data, $i, $min) {
        if(isset($data[$i]) && isset($data[$min])){
            $backup_data = $data[$min];
            $data[$min] = $data[$i];
            $data[$i] = $backup_data;
        }
        return $data;
    }
}

?>