<?
	include_once("../include/CommonConfig.php");
	include_once("../include/MemberSession.php");
	include("../Encryption/EncryptionModule.php");
	header("Content-Type: text/html; charset=UTF-8");
	$GoodsCode = $_POST["GoodsCode"];
	$OriginalCost = $_POST["OriginalCost"];
	$CostDC = $_POST["CostDC"];
	$GoodsCnt = $_POST["GoodsCnt"];
	$DeliveryCost = $_POST["DeliveryCost"];
	$DeliveryFreeFlag = $_POST["DeliveryFreeFlag"];
	$TotalCost = $_POST["TotalCost"];
	$EncTotalCost = PaymentCostEncryption($TotalCost);
	if ($GoodsCode == "3012383") {
		if ($TotalCost == 5000000 ) {
			echo "<form name=\"GoodsInfoPaymentPageTrans\" action=\"PaymentStep1.php\" method=\"POST\">\n";
			echo "<input type=\"hidden\" name=\"GoodsCode\" value=\"$GoodsCode\">\n";
			echo "<input type=\"hidden\" name=\"OriginalCost\" value=\"$OriginalCost\">\n";
			echo "<input type=\"hidden\" name=\"CostDC\" value=\"$CostDC\">\n";
			echo "<input type=\"hidden\" name=\"GoodsCnt\" value=\"$GoodsCnt\">\n";
			echo "<input type=\"hidden\" name=\"DeliveryCost\" value=\"$DeliveryCost\">\n";
			echo "<input type=\"hidden\" name=\"DeliveryFreeFlag\" value=\"$DeliveryFreeFlag\">\n";
			echo "<input type=\"hidden\" name=\"TotalCost\" value=\"$EncTotalCost\">\n";
			echo "<input type=\"hidden\" name=\"PaymentFailed\" value=\"N\">\n";
			echo "<input type=\"hidden\" name=\"CostCheck\" value=\"Y\">\n";
			echo "</form>\n";
			echo "<script>document.GoodsInfoPaymentPageTrans.submit()</script>\n";
		} else {
			echo "<form name=\"GoodsInfoPaymentPageTrans\" action=\"PaymentStep1.php\" method=\"POST\">\n";
			echo "<input type=\"hidden\" name=\"GoodsCode\" value=\"$GoodsCode\">\n";
			echo "<input type=\"hidden\" name=\"OriginalCost\" value=\"$OriginalCost\">\n";
			echo "<input type=\"hidden\" name=\"CostDC\" value=\"$CostDC\">\n";
			echo "<input type=\"hidden\" name=\"GoodsCnt\" value=\"$GoodsCnt\">\n";
			echo "<input type=\"hidden\" name=\"DeliveryCost\" value=\"$DeliveryCost\">\n";
			echo "<input type=\"hidden\" name=\"DeliveryFreeFlag\" value=\"$DeliveryFreeFlag\">\n";
			echo "<input type=\"hidden\" name=\"TotalCost\" value=\"$EncTotalCost\">\n";
			echo "<input type=\"hidden\" name=\"PaymentFailed\" value=\"Y\">\n";
			echo "<input type=\"hidden\" name=\"CostCheck\" value=\"N\">\n";
			echo "</form>\n";
			echo "<script>alert(\"상품 금액이 일치하지 않습니다.\");history.back(-1);</script>\n";
		}
	} else {
		echo "<script>alert(\"해당 상품이 존재하지 않습니다.\");history.back(-1);</script>";
		exit;	
	}
?>
