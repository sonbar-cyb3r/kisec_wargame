<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Welcome to KISEC 2020</title>
    <link href="css/bootstrap.css" rel="stylesheet">
  </head>

<script type="text/javascript">

    function lhook(id) {

       var e = document.getElementById(id);

       if(e.style.display == 'block')

          e.style.display = 'none';

       else

          e.style.display = 'block';

    }
</script>

		
<div id="title" align=center><h1>[ 불충분한 인증 및 인가 by Hackerfactory]</h1></div>
<br>

<br>
<table width="90%"><tr><td>
<b><h3>1. 쇼핑몰 자체 결제 프로세스의 결함: </h3></td></tr>
<tr><td>
<div><a href="#" onclick="lhook('info1');" style="border:1px;background:white;">Show Info</a>
</div>
<div id="info1" style="display:none;">
A사 쇼핑몰은 10주년을 맞이하여 고가의 상품들을 각 회원들의 포인트를 통하여 구매할 수 있는 
<br>이벤트를 열었다. 상품을 구매하고 싶지만 현재 나의 포인트는 "0" 포인트이다.
<br>목표 : 상품 구매에 성공하여서 인증키를 획득하여라.</div></td></tr>
<br><br>
<tr><td>문제 접속 :
<a href="war1/index.php" target="_blank">war1.php</a></td></tr></table>
<br><br>

<table  width="90%" ><tr><td>
<b><h3>2. 외부 결제 모듈의 결함: </h3></td></tr>
<tr><td>
<div><a href="#" onclick="lhook('info2');" style="border:1px;background:white;">Show Info</a>
</div>
<div id="info2" style="display:none;">
Hacktory Shopping 쇼핑몰은 HACKTORY PAY 결제 시스템을 도입하였다. 이를 통하여 "휴대폰 간편결제",
<br>"신용카드 간편결제" 등의 결제가 이루어 진다. 현재는 "휴대폰 간편결제" 시스템만 이용가능하다.
<br>목표 : 상품 구매에 성공하여서 인증키를 획득하여라.
<br><br>
</div></td></tr>
<tr><td>문제 접속 :
<a href="war2/index.php" target="_blank">war2.php</a></td></tr></table>
<br><br>

<table  width="90%" ><tr><td>
<b><h3>3. 보안된 외부 결제 모듈: </h3></td></tr>
<tr><td>
<div><a href="#" onclick="lhook('info3');" style="border:1px;background:white;">Show Info</a>
</div>
<div id="info3" style="display:none;">
Hacktory Shopping 쇼핑몰은 HACKTORY PAY 결제 시스템을 도입하였다. 이를 통하여 "휴대폰 간편결제", 
<br>"신용카드 간편결제" 등의 결제가 이루어 진다. 현재는 "휴대폰 간편결제" 시스템만 이용가능하다.
<br>목표 : 상품 구매에 성공하여서 인증키를 획득하여라.
<br><br>
</div></td></tr>
<tr><td>문제 접속 :
<a href="war3/index.php" target="_blank">war3.php</a></td></tr></table>

<script src="http://code.jquery.com/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>

</html>
