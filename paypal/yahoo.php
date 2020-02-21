<?php

function gogo($data)
{
    $arr = array("\r", "	");
    $url = "https://mail.yahoo.com/ws/v3/batch?name=settings.addAccount&hash=735454ec&appId=YMailNorrin&ymreqid=2c91870d-c1bd-8946-1c5c-f8000801e300&wssid=QcDzW2NqD82";
    $h = explode("\n", str_replace($arr, "", ":authority: mail.yahoo.com
:method: POST
:path: /ws/v3/batch?name=settings.addAccount&hash=735454ec&appId=YMailNorrin&ymreqid=2c91870d-c1bd-8946-1c5c-f8000801e300&wssid=QcDzW2NqD82
:scheme: https
accept: application/json
accept-language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7
content-type: multipart/form-data; boundary=----WebKitFormBoundarymkrLHuEabYPG1IAe
cookie: APID=UP01d2b656-374c-11ea-b886-028fe5c4035c; AO=u=1; cmp=t=1582225187&j=0; APIDTS=1582225273; T=af=JnRzPTE1ODIyMjYzODkmcHM9TVkuX1ZMLnBQb3l2X2xLakw4TlBfdy0t&d=bnMBeWFob28BZwFYQzRQMlhEN0E0MjRKR0dGSk5IS0VNNjY3VQFzbAFOVEF4TkFFME5qTTROekEzTmpjMU56RTROVGswTVRZLQFhYwFBSXhkeVJwVQFhbAFzaXJodWthMgFzYwFkZXNrdG9wX3dlYgFmcwFuU1RieWlsZUx0ZFABenoBVnZ0VGVCQTdFAWEBUUFFAWxhdAFWdnRUZUI-&sk=DAAPlRUutwMsr5&ks=EAAwEOoz6Eu88HOY7SQKDvLmA--~G&kt=EAAupYNrQ5aS_aIGBQtemZi9g--~I&ku=FAAu9WvPWXsmLlVpTV2RGUiByKFhPsDTChFUBlZRM2IEiXWBlzwjSaI4jR2.w3GAIreVGYR9Mpr6aDeAg_lqgnbEjzMqIuAfvFcvuYson03UHxKz4LPUfW3yRG3dBi.y.OmdmeZtP8A.fMZruV5dMg6rYNKYMvSzEOitPI8gd74Oac-~A; F=d=Tp2wY7c9vvuasZptWC.t0422RgSv8iJ9JM0HxSidA.LtajAoqnRhztBgz.vPnmxCSFVo6ex7G_nBwGXdKD5KeNFsqrkh; PH=fn=98F1z_yisekQk6xZnQ--&l=id-ID&i=id; Y=v=1&n=5o0kgv4te949s&l=4faeg9ub5o67kja2nt8os444b7wmhuxg6vt3ah40/o&p=033vvid00000000&r=15t&intl=id; GUCS=AfnEaq6d; A1=d=AQABBEDXLl4CEEdCSM59glLRgXvS9L1FyVYFEgEAAQIrUF4kX1r0yiMA_SMAAAcIGoseXh4sP48ID4YeJryiZyQ_GgMjQbhtBQkBBwoBoA&S=AQAAAtBksBqtMHqQ4JCLYIUnPAM; A3=d=AQABBEDXLl4CEEdCSM59glLRgXvS9L1FyVYFEgEAAQIrUF4kX1r0yiMA_SMAAAcIGoseXh4sP48ID4YeJryiZyQ_GgMjQbhtBQkBBwoBoA&S=AQAAAtBksBqtMHqQ4JCLYIUnPAM; A1S=d=AQABBEDXLl4CEEdCSM59glLRgXvS9L1FyVYFEgEAAQIrUF4kX1r0yiMA_SMAAAcIGoseXh4sP48ID4YeJryiZyQ_GgMjQbhtBQkBBwoBoA&S=AQAAAtBksBqtMHqQ4JCLYIUnPAM; GUC=AQEAAQJeUCtfJEIgVASn; B=8ufpc3pf1t2oq&b=4&d=yTv0rVttYFnZ.hMBxEdp&s=on&i=hh4mvKJnJD8aAyNBuG0F
origin: https://mail.yahoo.com
referer: https://mail.yahoo.com/
sec-fetch-mode: cors
sec-fetch-site: same-origin
user-agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36"));
    $body = "$data";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $h);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $x = curl_exec($ch);
    curl_close($ch);
    return $x;
}


function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$kata = generateRandomString(10);
gogo('------WebKitFormBoundarymkrLHuEabYPG1IAe
Content-Disposition: form-data; name="batchJson"

{"requests":[{"id":"AddAccount","uri":"/ws/v3/mailboxes/@.id==VjN-v0JuC7Z0TwQd98ef4H0Os-W_Y14rYHOA2onUqQKR_tq1BauQATg72qh_ldnAN-qjBmBxuc2UTjmHlmQVvjcwMQ/accounts","method":"POST","payload":{"account":{"type":"DEA","email":"siruki-' . $kata . '@yahoo.com"}},"requests":[{"id":"GetAccounts","uri":"/ws/v3/mailboxes/@.id==VjN-v0JuC7Z0TwQd98ef4H0Os-W_Y14rYHOA2onUqQKR_tq1BauQATg72qh_ldnAN-qjBmBxuc2UTjmHlmQVvjcwMQ/accounts","method":"GET"}]}],"responseType":"json"}
------WebKitFormBoundarymkrLHuEabYPG1IAe--');

echo "OK \n";
