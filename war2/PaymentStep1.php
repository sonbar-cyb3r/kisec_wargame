<?
	include_once("../include/CommonConfig.php");
	include_once("../include/MemberSession.php");
	header("Content-Type: text/html; charset=UTF-8");
	$GoodsCode = $_POST["GoodsCode"];
	$OriginalCost = $_POST["OriginalCost"];
	$CostDC = $_POST["CostDC"];
	$GoodsCnt = $_POST["GoodsCnt"];
	$DeliveryCost = $_POST["DeliveryCost"];
	$DeliveryFreeFlag = $_POST["DeliveryFreeFlag"];
	$TotalCost = $_POST["TotalCost"];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>HACKTORY PAY</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../js/html5shiv.js"></script>
      <script src="../js/respond.min.js"></script>
    <![endif]-->
  </head>
     <body>
	<script>
	function PayAction() {
		var content = document.getElementById("content"); 
		var button = document.getElementById("button"); 
		var PaySelect = document.all("PaySelect"); 
		var PaySelectFlag = "N";
		for (var i=0; i<PaySelect.length; i++) {
			if (PaySelect[0].checked == true) {
				<!-- location.href="PaymentStep2.php"; -->
				document.GoodsInfoTrans.submit()
				PaySelectFlag = "Y";
				break;
			}
			if (PaySelect[1].checked == true) {
				var WarningContent = document.getElementById("warning"); 
				WarningContent.innerHTML = "<br><div class=\"alert alert-info\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button><p>신용카드 결제 서비스는 <b>\"점검중\"</b>입니다. ^^</p></div>";
				PaySelectFlag = "Y";
				break;
			}
		}
		
		if (PaySelectFlag =="N") {
			var WarningContent = document.getElementById("warning"); 
			WarningContent.innerHTML = "<br><div class=\"alert alert-danger\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button><p>결제 시스템을 선택하여 주세요.</p></div>";
		} else {
			button.innerHTML ="<button type=\"button\" class=\"btn btn-warning btn-sm\" data-toggle=\"modal\" data-target=\"#step2\" onclick=\"test()\">결제하기</button>&nbsp;";
			button.innerHTML += "<button type=\"button\" class=\"btn btn-default btn-sm\" onclick=\"history.back(-1);\">결제취소</button>";
		}
	}
	</script>
	<form name="GoodsInfoTrans" action="PaymentStep2.php" method="POST">
	<input type="hidden" name="GoodsCode" value="<?=$GoodsCode?>">
	<input type="hidden" name="OriginalCost" value="<?=$OriginalCost?>">
	<input type="hidden" name="CostDC" value="<?=$CostDC?>">
	<input type="hidden" name="GoodsCnt" value="<?=$GoodsCnt?>">
	<input type="hidden" name="DeliveryCost" value="<?=$DeliveryCost?>">
	<input type="hidden" name="DeliveryFreeFlag" value="<?=$DeliveryFreeFlag?>">
	<input type="hidden" name="TotalCost" value="<?=$TotalCost?>">	
	</form>
	<div class="container">
	<div class="modal fade in" id="step1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: block;"><div class="modal-backdrop fade in" style="height: 100%;"></div>
	  <div class="modal-dialog">
		<div  class="modal-content">
		  <div class="modal-header">
			<h4 class="modal-title"><img src="img/pay2.png">&nbsp;HACKTORY PAY</h4>
		  </div>
		 <div id="content"  class="modal-body">
		<div class="panel panel-default">
		  <div class="panel-heading">
			<b><img src="img/arrow.png">&nbsp;Hacktory의 간편 결제 시스템</b>
		  </div>
		  <div class="panel-body">
			저희 <code>HackerFactory</code>에서는 자체 결제 시스템을 도입하여 결제 시 간편하게 결제를 할 수 있습니다.
		  </div>
		</div>		 
		 	<ol class="breadcrumb">
			  <li  class="active">결제 선택</li>
			</ol>
			<div class="radio">
			  <label>
				<input type="radio" name="PaySelect" id="PaySelect" value="option1">
				휴대폰 간편결제
			  </label>
			</div>
			<div class="radio">
			  <label>
				<input type="radio" name="PaySelect" id="PaySelect" value="option2">
				신용카드 간편결제
			  </label>
			</div>
			<div class="radio disabled">
			  <label>
				<input type="radio" name="PaySelect" id="PaySelect" value="option3" disabled>
				무통장입금 결제
			  </label>
			</div>
			<div class="radio disabled">
			  <label>
				<input type="radio" name="PaySelect" id="PaySelect" value="option4" disabled>
				실시간 계좌이체
			  </label>
			</div>
		<div id="warning"class="center-block" style="width:550px" ></div>
		  </div>
		  <div id="button" class="modal-footer">
			<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#step2" onclick="PayAction()">다음</button>
			<button type="button" class="btn btn-default btn-sm" onclick="location.href='index.php'">결제취소</button>
		  </div>
		</div>
	  </div>
	</div>
	</div>
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="af05790638941ef3c374b672-|49" defer=""></script>
  </body>
</html>
