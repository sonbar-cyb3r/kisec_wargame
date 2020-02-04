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
	
	if (empty($GoodsCode) or empty($OriginalCost) or empty($CostDC) or empty($GoodsCnt) or empty($DeliveryCost) or empty($DeliveryFreeFlag) or empty($TotalCost)) {
		echo "<script>alert(\"정상적으로 값이 전송되지 않았습니다.\");history.back(-1);</script>";
		exit;
	}
	
	if ($GoodsCode == "3012383") {
		if () {
			echo "<form name=\"GoodsInfoPaymentPageTrans\" action=\"PaymentStep1.php\" method=\"POST\">";
			echo "<input type=\"hidden\" name=\"GoodsCode\" value=\"$GoodsCode\">";
			echo "<input type=\"hidden\" name=\"OriginalCost\" value=\"$OriginalCost\">";
			echo "<input type=\"hidden\" name=\"CostDC\" value=\"$CostDC\">";
			echo "<input type=\"hidden\" name=\"GoodsCnt\" value=\"$GoodsCnt\">";
			echo "<input type=\"hidden\" name=\"DeliveryCost\" value=\"$DeliveryCost\">";
			echo "<input type=\"hidden\" name=\"DeliveryFreeFlag\" value=\"$DeliveryFreeFlag\">";
			echo "<input type=\"hidden\" name=\"TotalCost\" value=\"$TotalCost\">";
			echo "<input type=\"hidden\" name=\"PaymentFailed\" value=\"Y\">";
			echo "<input type=\"hidden\" name=\"CostCheck\" value=\"Y\">";
			echo "</form>";
			echo "<script>document.GoodsInfoPaymentPageTrans.submit()</script>";
		} else {
			echo "<form name=\"GoodsInfoPaymentPageTrans\" action=\"PaymentStep1.php\" method=\"POST\">";
			echo "<input type=\"hidden\" name=\"GoodsCode\" value=\"$GoodsCode\">";
			echo "<input type=\"hidden\" name=\"OriginalCost\" value=\"$OriginalCost\">";
			echo "<input type=\"hidden\" name=\"CostDC\" value=\"$CostDC\">";
			echo "<input type=\"hidden\" name=\"GoodsCnt\" value=\"$GoodsCnt\">";
			echo "<input type=\"hidden\" name=\"DeliveryCost\" value=\"$DeliveryCost\">";
			echo "<input type=\"hidden\" name=\"DeliveryFreeFlag\" value=\"$DeliveryFreeFlag\">";
			echo "<input type=\"hidden\" name=\"TotalCost\" value=\"$TotalCost\">";
			echo "<input type=\"hidden\" name=\"PaymentFailed\" value=\"Y\">";
			echo "<input type=\"hidden\" name=\"CostCheck\" value=\"N\">";
			echo "</form>";
			echo "<script>alert(\"상품에 대한 결제 금액이 일치하지 않습니다.\");history.back(-1);</script>";
		}
	} else {
		echo "<script>alert(\"해당 상품은 존재하지 않습니다.\");history.back(-1);</script>";
		exit;	
	}
?>
