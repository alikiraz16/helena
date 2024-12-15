<?php
session_start();
date_default_timezone_set('Europe/Istanbul');

if (!isset($_SESSION['user_id'])) {
    header('Location: ./musteriGiris.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rezervasyon Yap</title>
    <link rel="stylesheet" href="../css/rezervasyonYap.css">
</head>

<body>
    <div class="container">
        <h1 class="sessiz">Sessiz Alan</h1>
        <div class="layout layout-sessiz">
            <div class="table table-14">14
                <div class="chair chair-14 left-1" data-sandalye-id="71"></div>
                <div class="chair chair-14 left-2" data-sandalye-id="72"></div>
                <div class="chair chair-14 left-3" data-sandalye-id="73"></div>
                <div class="chair chair-14 left-4" data-sandalye-id="74"></div>
                <div class="chair chair-14 right-1" data-sandalye-id="75"></div>
                <div class="chair chair-14 right-2" data-sandalye-id="76"></div>
                <div class="chair chair-14 right-3" data-sandalye-id="77"></div>
                <div class="chair chair-14 right-4" data-sandalye-id="78"></div>
            </div>
            <div class="table table-15">15
                <div class="chair chair-15 left-1" data-sandalye-id="79"></div>
                <div class="chair chair-15 left-2" data-sandalye-id="80"></div>
                <div class="chair chair-15 left-3" data-sandalye-id="81"></div>
                <div class="chair chair-15 left-4" data-sandalye-id="82"></div>
                <div class="chair chair-15 right-1" data-sandalye-id="83"></div>
                <div class="chair chair-15 right-2" data-sandalye-id="84"></div>
                <div class="chair chair-15 right-3" data-sandalye-id="85"></div>
                <div class="chair chair-15 right-4" data-sandalye-id="86"></div>
            </div>
            <div class="table table-16">16
                <div class="chair chair-16 left-1" data-sandalye-id="87"></div>
                <div class="chair chair-16 left-2" data-sandalye-id="88"></div>
                <div class="chair chair-16 left-3" data-sandalye-id="89"></div>
                <div class="chair chair-16 left-4" data-sandalye-id="90"></div>
                <div class="chair chair-16 right-1" data-sandalye-id="91"></div>
                <div class="chair chair-16 right-2" data-sandalye-id="92"></div>
                <div class="chair chair-16 right-3" data-sandalye-id="93"></div>
                <div class="chair chair-16 right-4" data-sandalye-id="94"></div>
            </div>
            <div class="table table-17">17
                <div class="chair chair-17 left-1" data-sandalye-id="95"></div>
                <div class="chair chair-17 left-2" data-sandalye-id="96"></div>
                <div class="chair chair-17 left-3" data-sandalye-id="97"></div>
                <div class="chair chair-17 left-4" data-sandalye-id="98"></div>
                <div class="chair chair-17 right-1" data-sandalye-id=99"></div>
                <div class="chair chair-17 right-2" data-sandalye-id="100"></div>
                <div class="chair chair-17 right-3" data-sandalye-id="101"></div>
                <div class="chair chair-17 right-4" data-sandalye-id="102"></div>
            </div>
            <div class="table table-18">18
                <div class="chair chair-18 left-1" data-sandalye-id="103"></div>
                <div class="chair chair-18 left-2" data-sandalye-id="104"></div>
                <div class="chair chair-18 left-3" data-sandalye-id="105"></div>
                <div class="chair chair-18 left-4" data-sandalye-id="106"></div>
                <div class="chair chair-18 right-1" data-sandalye-id="107"></div>
                <div class="chair chair-18 right-2" data-sandalye-id="108"></div>
                <div class="chair chair-18 right-3" data-sandalye-id="109"></div>
                <div class="chair chair-18 right-4" data-sandalye-id="110"></div>
            </div>
            <div class="table table-19">19
                <div class="chair chair-19 right-1" data-sandalye-id="111"></div>
                <div class="chair chair-19 bottom-1" data-sandalye-id="112"></div>
            </div>
            <div class="table table-20">20
                <div class="chair chair-20 bottom-1" data-sandalye-id="113"></div>
                <div class="chair chair-20 bottom-2" data-sandalye-id="114"></div>
            </div>
            <div class="table table-21">21
                <div class="chair chair-21 left-1" data-sandalye-id="115"></div>
                <div class="chair chair-21 left-2" data-sandalye-id="116"></div>
                <div class="chair chair-21 right-1" data-sandalye-id="117"></div>
                <div class="chair chair-21 right-2" data-sandalye-id="118"></div>
            </div>
            <div class="table table-22">22
                <div class="chair chair-22 left-1" data-sandalye-id="119"></div>
                <div class="chair chair-22 left-2" data-sandalye-id="120"></div>
            </div>
        </div>
        <h1 class="sesli">Sesli Alan</h1>
        <div class="layout layout-sesli">

            <div class="table table-1" id="table1-1">
                <div class="chair chair-1-1 top-1" data-sandalye-id="1"></div>
                <div class="chair chair-1-1 top-2" data-sandalye-id="2"></div>
                <div class="chair chair-1-1 top-3" data-sandalye-id="3"></div>
            </div>
            <div class="table table-1" id="table1-2">1
                <div class="chair chair-1-2 left-1" data-sandalye-id="4"></div>
                <div class="chair chair-1-2 left-2" data-sandalye-id="5"></div>
            </div>
            <div class="table table-1" id="table1-3">
                <div class="chair chair-1-3 bottom-1" data-sandalye-id="6"></div>
                <div class="chair chair-1-3 bottom-2" data-sandalye-id="7"></div>
                <div class="chair chair-1-3 bottom-3" data-sandalye-id="8"></div>
            </div>
            <div class="table table-2">2
                <div class="chair chair-2 left-1" data-sandalye-id="9"></div>
                <div class="chair chair-2 left-2" data-sandalye-id="10"></div>
            </div>
            <div class="table table-3">3
                <div class="chair chair-3 right-1" data-sandalye-id="11"></div>
                <div class="chair chair-3 right-2" data-sandalye-id="12"></div>
                <div class="chair chair-3 right-3" data-sandalye-id="13"></div>
                <div class="chair chair-3 left-1" data-sandalye-id="14"></div>
                <div class="chair chair-3 left-2" data-sandalye-id="15"></div>
                <div class="chair chair-3 left-3" data-sandalye-id="16"></div>
            </div>
            <div class="table table-4">4
                <div class="chair chair-4 right-1" data-sandalye-id="17"></div>
                <div class="chair chair-4 right-2" data-sandalye-id="18"></div>
                <div class="chair chair-4 right-3" data-sandalye-id="19"></div>
                <div class="chair chair-4 left-1" data-sandalye-id="20"></div>
                <div class="chair chair-4 left-2" data-sandalye-id="21"></div>
                <div class="chair chair-4 left-3" data-sandalye-id="22"></div>
            </div>
            <div class="table table-5">5
                <div class="chair chair-5 right-1" data-sandalye-id="23"></div>
                <div class="chair chair-5 right-2" data-sandalye-id="24"></div>
                <div class="chair chair-5 left-1" data-sandalye-id="25"></div>
                <div class="chair chair-5 left-2" data-sandalye-id="26"></div>
            </div>
            <div class="table table-6">6
                <div class="chair chair-6 left-1" data-sandalye-id="27"></div>
                <div class="chair chair-6 left-2" data-sandalye-id="28"></div>
                <div class="chair chair-6 left-3" data-sandalye-id="29"></div>
                <div class="chair chair-6 left-4" data-sandalye-id="30"></div>
                <div class="chair chair-6 left-5" data-sandalye-id="31"></div>
                <div class="chair chair-6 left-6" data-sandalye-id="32"></div>
                <div class="chair chair-6 left-7" data-sandalye-id="33"></div>
                <div class="chair chair-6 left-8" data-sandalye-id="34"></div>
                <div class="chair chair-6 right-1" data-sandalye-id="35"></div>
                <div class="chair chair-6 right-2" data-sandalye-id="36"></div>
                <div class="chair chair-6 right-3" data-sandalye-id="37"></div>
                <div class="chair chair-6 right-4" data-sandalye-id="38"></div>
                <div class="chair chair-6 right-5" data-sandalye-id="39"></div>
                <div class="chair chair-6 right-6" data-sandalye-id="40"></div>
                <div class="chair chair-6 right-7" data-sandalye-id="41"></div>
                <div class="chair chair-6 right-8" data-sandalye-id="42"></div>
            </div>
            <div class="table table-7">7
                <div class="chair chair-7 right-1" data-sandalye-id="43"></div>
                <div class="chair chair-7 right-2" data-sandalye-id="44"></div>
                <div class="chair chair-7 right-3" data-sandalye-id="45"></div>
                <div class="chair chair-7 left-1" data-sandalye-id="46"></div>
                <div class="chair chair-7 left-2" data-sandalye-id="47"></div>
                <div class="chair chair-7 left-3" data-sandalye-id="48"></div>
            </div>
            <div class="table table-8">8
                <div class="chair chair-8 right-1" data-sandalye-id="49"></div>
                <div class="chair chair-8 right-2" data-sandalye-id="50"></div>
                <div class="chair chair-8 right-3" data-sandalye-id="51"></div>
                <div class="chair chair-8 left-1" data-sandalye-id="52"></div>
                <div class="chair chair-8 left-2" data-sandalye-id="53"></div>
                <div class="chair chair-8 left-3" data-sandalye-id="54"></div>
            </div>
            <div class="table table-9">9
                <div class="chair chair-9 right-1" data-sandalye-id="55"></div>
                <div class="chair chair-9 right-2" data-sandalye-id="56"></div>
                <div class="chair chair-9 right-3" data-sandalye-id="57"></div>
                <div class="chair chair-9 left-1" data-sandalye-id="58"></div>
                <div class="chair chair-9 left-2" data-sandalye-id="59"></div>
                <div class="chair chair-9 left-3" data-sandalye-id="60"></div>
            </div>
            <div class="table table-10">10
                <div class="chair chair-10 right-1" data-sandalye-id="61"></div>
                <div class="chair chair-10 right-2" data-sandalye-id="62"></div>
                <div class="chair chair-10 right-3" data-sandalye-id="63"></div>
                <div class="chair chair-10 left-1" data-sandalye-id="64"></div>
                <div class="chair chair-10 left-2" data-sandalye-id="65"></div>
                <div class="chair chair-10 left-3" data-sandalye-id="66"></div>
            </div>
            <div class="table table-11">11
                <div class="chair chair-11 top" data-sandalye-id="67"></div>
                <div class="chair chair-11 bottom" data-sandalye-id="68"></div>
            </div>
            <div class="table table-12">12
                <div class="chair chair-12 top" data-sandalye-id="69"></div>
                <div class="chair chair-12 bottom" data-sandalye-id="70"></div>
            </div>
            <div class="bar">Bar</div>
            <div class="entrance">Giriş</div>
        </div>
    </div>
    <div class="reservation-container">
        <div class="reservation-time" style="display: none;">
            <label for="reservation-duration">Rezervasyon Süresi (saat):</label>
            <select id="reservation-duration">
                <option value="2">2 Saat</option>
                <option value="3">3 Saat</option>
                <option value="4">4 Saat</option>
                <option value="5">5 Saat</option>
            </select>
            <button id="reserve-button">Rezervasyon Yap</button>
        </div>
    </div>

    <script src="../js/rezervasyonYap.js"></script>
</body>

</html>