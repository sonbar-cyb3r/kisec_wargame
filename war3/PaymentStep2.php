<?
	include_once("../include/CommonConfig.php");
	include_once("../include/MemberSession.php");
	include("../Encryption/EncryptionModule.php");
	header("Content-Type: text/html; charset=UTF-8");
	$PaymentAction = $_POST["PaymentAction"];
	$GoodsCode = $_POST["GoodsCode"];
	$OriginalCost = $_POST["OriginalCost"];
	$CostDC = $_POST["CostDC"];
	$GoodsCnt = $_POST["GoodsCnt"];
	$DeliveryCost = $_POST["DeliveryCost"];
	$DeliveryFreeFlag = $_POST["DeliveryFreeFlag"];
	$TotalCost = $_POST["TotalCost"];
	$UserName = $_POST["UserName"];
	$Agency = $_POST["Agency"];
	$cellphone = $_POST["cellphone"];
	
	if (isset($PaymentAction)) {
		if ($PaymentAction == "Y") {
			if (empty($UserName) or empty($Agency) or empty($cellphone)) {
				echo "<script>alert(\"정상적으로 값이 전송되지 않았습니다.\");history.back(-1);</script>";
				exit;
			}
			if ($GoodsCode == "3012383") {
				if ($GoodsCnt != 1) {
					$message = "상품 개수가 잘못되었습니다.";
					$PaymentCheck = "N";	
				}
				$Cost = PaymentCostDecryption($TotalCost);
				if ($Cost >= 0) {
					if ($OriginalCost == 0 and $CostDC == 0) {
						$PaymentCheck = "N";
					} else if ($Cost == 0) {
						$PaymentCheck = "Y";
					} else {
						$message = "결제 금액이 부족합니다.";
						$PaymentCheck = "N";
					}
				} else {
					$message = "결제 금액이 잘못되었습니다.";
					$PaymentCheck = "N";
				}
			} else {
				$message = "상품 코드가 잘못되었습니다.";
				$PaymentCheck = "N";	
			}
		}
	}
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
	function CellPhonePayment() {
		if(document.Payment.UserName.value == "") {
			alert("이름을 입력하세요.");
			document.getElementById("UserName").setAttribute("class","form-control focusedInput");
		}
		
		if(document.Payment.Agency.value == "") {
			alert("통신사를 선택하세요.");
			document.getElementById("Agency").setAttribute("class","form-control focusedInput");
		}		
		
		if(document.Payment.cellphone.value == "") {
			alert("폰번호를 입력하세요.");
			document.getElementById("cellphone").setAttribute("class","form-control focusedInput");
		}		
		document.Payment.submit();
	}
	</script>
	<div class="container">
	<div class="modal fade in" id="step1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: block;"><div class="modal-backdrop fade in" style="height: 100%;"></div>
	  <div class="modal-dialog">
		<div  class="modal-content">
		  <div class="modal-header">
			<h4 class="modal-title"><img src="img/pay2.png">&nbsp;HACKTORY PAY</h4>
		  </div>
		  <form name="Payment" action="PaymentStep2.php" method="POST">		 
			<div id="content"  class="modal-body">
			<input type="hidden" name="GoodsCode" value="<?=$GoodsCode?>">
			<input type="hidden" name="OriginalCost" value="<?=$OriginalCost?>">
			<input type="hidden" name="CostDC" value="<?=$CostDC?>">
			<input type="hidden" name="GoodsCnt" value="<?=$GoodsCnt?>">
			<input type="hidden" name="DeliveryCost" value="<?=$DeliveryCost?>">
			<input type="hidden" name="DeliveryFreeFlag" value="<?=$DeliveryFreeFlag?>">
			<input type="hidden" name="TotalCost" value="<?=$TotalCost?>">	
			<input type="hidden" name="PaymentAction" value="Y">
			<ol class="breadcrumb">
			  <li><a href="Payment.php">결제 선택</a></li>
			  <li class="active">휴대폰 간편 결제</li>
			</ol>
			<div class="form-group">
			<label>이름</label>
			<input id="UserName" type="text" name="UserName" id="focusedInput" class="form-control" placeholder="이름을 입력하세요">
			</div>
			<div class="form-group">
			<label>통신사 선택</label>
			<select id="Agency" class="form-control" name="Agency">
			  <option value="">선택</option>
			  <option value="SKT">SKT</option>
			  <option value="KT">KT</option>
			  <option value="LG">LGU+</option>
			</select>
			</div>
			<div class="form-group">
			<label>휴대폰 번호</label>
			<input id="cellphone" name="cellphone" type="text" class="form-control" placeholder="휴대폰 번호를 입력하세요">
			<span id="helpBlock" class="help-block">"-" 를 포함한 휴대폰 번호를 입력해주세요.</span>
			</div>
			<hr>
			<div class="form-group">
			<label>결제 금액</label>
			<input id="pay" name="amount" class="form-control" type="text" placeholder="<?=number_format(PaymentCostDecryption($TotalCost))?>원" readonly>
			<span id="helpBlock" class="help-block">해당 금액이 최종 결제 금액 입니다.</span>
			</div>
			<? if ($PaymentCheck == "N") {?>
				<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4>경고 : 결제 금액 부족</h4>
				<p><?=$message?></p>
				</div>
			<?} else if ($PaymentCheck == "Y") {?>
				<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4>정상 결제 완료</h4>
				<p>정상적으로 결제가 완료되었습니다.</p>
				<p></p>
				<div class="well well-sm">인증키 : <?=AuthenticationKeyCreate("1","3", $userid)?></div>
				</div>
			<?}?>			
		  </div>
		  </form>
		  <div id="button" class="modal-footer">
			<button type="button" class="btn btn-warning btn-sm" onclick="CellPhonePayment()">결제하기</button>
			<button type="button" class="btn btn-default btn-sm" onclick="location.href='PaymentStep1.php'">이전</button>
		  </div>			  
		</div>
	  </div>
	</div>
	</div>
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
