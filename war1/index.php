<?
	include_once("../include/CommonConfig.php");
	include_once("../include/MemberSession.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Welcom to Hacker Factory : 해커 공장</title>
    <link href="../css/bootstrap.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../js/html5shiv.js"></script>
      <script src="../js/respond.min.js"></script>
    <![endif]-->
  </head>
<?php
	include("../Encryption/EncryptionModule.php");
	$GoodsCode = $_POST["GoodsCode"];
	$UserPoint = $_POST["UserPoint"];
	$Mode = $_POST["Mode"];
	$PaymentCheck = "NONE";
	
	if ($GoodsCode == "11111111" && $Mode == "Buy") {
		if ((int)$UserPoint >= 1000000000) {
			$PaymentCheck = "Y";
			
		} else {
			$PaymentCheck = "N";
		}
	}
?>
  <body>


    <div class="container">
	<hr>
	<li>나의 포인트 : 0 <span class="label label-default">POINT</span></li>
	<hr>
	<? if ($PaymentCheck == "N") {?>
		<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4>경고 : 결제 금액 부족</h4>
		<p>사용자의 포인트가 부족합니다. 확인해주세요.</p>
		</div>
	<?} else if ($PaymentCheck == "Y") {?>
		<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4>정상 결제 완료</h4>
		<p>정상적으로 결제가 완료되었습니다.</p>
		<p></p>
		<div class="well well-sm">인증키 : <?=AuthenticationKeyCreate("1","1", $userid)?></div>
		</div>
	<?}?>
      <div class="row">
        <div class="col-lg-4">
		<div class="media">
		<a class="pull-left" href="#">
		<img src="img/goods1.png" alt="상품1" class="img-thumbnail">
		</a>
		<form name="goods1" action="test" method="GET">
		<input type="hidden" name="point" value="100">
		<div class="media-body">
		<h4 class="media-heading">슈퍼 파워 컴퓨터</h4>
			<table class="table table-condensed">
			<tr>
			<td><li>제조사 : Hacker Factory</li></td>
			</tr>
			<tr>
			<td><li>성능 : 세계 최강</li></td>
			</tr>
			<tr>
			<td><li>가격 : 1,000,000,000 <span class="label label-default">POINT</span></li></td>
			</tr>
			<tr>
			<td></td>
			</tr>
			</table> 
		</div>
		</div>
          <p align="right"><a class="btn btn-info" href="#" data-toggle="modal" data-target="#myModal">구매하기</a></p>
		 </form>
      </div>
        <div class="col-lg-4">
		<div class="media">
		<a class="pull-left" href="#">
		<img src="img/goods2.png" alt="상품2" class="img-thumbnail">
		</a>
		<div class="media-body">
		<h4 class="media-heading">스마트 게임기</h4>
			<table class="table table-condensed">
			<tr>
			<td><li>제조사 : Hacker Factory</li></td>
			</tr>
			<tr>
			<td><li>구성 : 게임기 1EA, 패드 2EA</li></td>
			</tr>
			<tr>
			<td><li>가격 : 5,000,000 <span class="label label-default">POINT</span></li></td>
			</tr>
			<tr>
			<td></td>
			</tr>
			</table> 
		</div>
		</div>
		<p align="right"><a class="btn btn-danger" href="#" disabled="disabled">품  절</a></p>
       </div>
	   <div class="col-lg-4">
		<div class="media">
		<a class="pull-left" href="#">
		<img src="img/goods3.png" alt="상품3" class="img-thumbnail">
		</a>
		<div class="media-body">
		<h4 class="media-heading">디바블놈7 확장팩</h4>
			<table class="table table-condensed">
			<tr>
			<td><li>제조사 : Hacker Factory</li></td>
			</tr>
			<tr>
			<td><li>구성 : Blue-Ray 2CD</li></td>
			</tr>
			<tr>
			<td><li>가격 : 1,000,000 <span class="label label-default">POINT</span></li></td>
			</tr>
			<tr>
			<td></td>
			</tr>
			</table> 
		</div>
		<p align="right"><a class="btn btn-warning" href="#"  disabled="disabled">구매대기</a></p>
		</div>
        </div>
      </div>
	<hr>
    </div>
	
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h4 class="modal-title">상품 구매 페이지</h4>
	  </div>
	  <div class="modal-body">
		<form name="Goods1" action="index.php" method="post">
		<input type="hidden" name="GoodsCode" value="11111111">
		<input type="hidden" name="UserPoint" value="0">
		<input type="hidden" name="Mode" value="Buy">
		<h4 class="media-heading">슈퍼 파워 컴퓨터</h4>
		<img src="img/goods1.png" alt="상품1" class="img-thumbnail">
		<li>제조사 : Hacker Factory</li>
		<li>성능 : 세계 최강</li>
		<li>구성 : 모니터 & 데스크탑(일체형), 키보드, 마우스, 각종 케이블</li>
		<li>원가 : 5,000,000,000 <span class="label label-default">POINT</span></li>
		<li>할인율 : <font color="red">80%</font></li>
		<li>파격 할인가 : <font color="red">1,000,000,000</font> <span class="label label-default">POINT</span></li>
		</form>
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-primary btn-sm" onclick="document.Goods1.submit()">즉시구매</button>
		<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">닫기</button>
	  </div>
	</div>
  </div>
</div>
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
