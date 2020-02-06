<?
	include_once("../include/CommonConfig.php");
	include_once("../include/MemberSession.php");
	$GoodsCode = $_GET['GoodsCode'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>HACKTORY SHOPPING</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron-narrow.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
      <div class="header">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="#">Home</a></li>
            <li role="presentation"><a href="#">About</a></li>
            <li role="presentation"><a href="#">Contact</a></li>
          </ul>
        </nav>
        <h3 class="text-muted">Hacktory Shopping</h3>
      </div>

      <div class="jumbotron">
			<h1>파격할인</h1>
			<p class="lead">40% 이상의 할인가로 판매합니다!</p>
      </div>

      <div class="row marketing">
	  <?if ($GoodsCode == "3012383") {?>
			<h3 class="media-heading">슈퍼 파워 컴퓨터</h3>
			<br>
			<table class="table">
			<tr>
			<td><b>제조사 :</b> Hacker Factory</td>
			</tr>
			<tr>
			<td><b>성능 :</b> 세계 최강</td>
			</tr>
			<tr>
			<td><b>구성 :</b> 모니터 & 데스크탑(일체형), 키보드, 마우스, 각종 케이블</td>
			</tr>			
			<tr>
			<td><b>원가 :</b> 10,000,000 원</td>
			</tr>
			<tr>
			<td><b>판매가 :</b> 5,000,000 원 (<font color="red">50% 할인</font>)</td>
			</tr>
			<tr>
			<td><b>배송비 :</b> 0 원</td>
			</tr>
			<tr>
			<td></td>
			</tr>
			</table> 
			<p align="center"><a class="btn btn-info" onclick="document.GoodsInfoForm.submit()">구매하기</a>&nbsp;&nbsp;<a class="btn btn-default" href="index.php">목록</a></p>
			<form name="GoodsInfoForm" action="PaymentCheckAction.php" method="POST" >
			<input type="hidden" name="GoodsCode" value="3012383">
			<input type="hidden" name="OriginalCost" value="10000000">
			<input type="hidden" name="CostDC" value="5000000">
			<input type="hidden" name="GoodsCnt" value="1">
			<input type="hidden" name="DeliveryCost" value="0">
			<input type="hidden" name="DeliveryFreeFlag" value="Y">
			<input type="hidden" name="TotalCost" value="5000000">
			</form>
		
	  <?} else {?>
		  <div class="row">
			<div class="col-lg-8">
			<div class="media">
			<a class="pull-left" href="#">
			<img src="img/goods1.png" alt="상품1" class="img-thumbnail">
			</a>
			<form name="goods1" action="test" method="GET">
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
				<td><li>가격 : 5,000,000원</li></td>
				</tr>
				<tr>
				<td></td>
				</tr>
				</table> 
			</div>
			</div>
			  <p align="right"><a class="btn btn-info" href="index.php?GoodsCode=3012383">상세보기</a></p>
			 </form>
		  </div>
			<div class="col-lg-8">
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
				<td><li>가격 : 5,000,000원</li></td>
				</tr>
				<tr>
				<td></td>
				</tr>
				</table> 
			</div>
			</div>
			<p align="right"><a class="btn btn-danger" href="#" disabled="disabled">품  절</a></p>
		   </div>

      </div>
	  <?}?>

    </div>
	


      <footer class="footer">
        <p>&copy; Company 2020</p>
      </footer>

    </div> <!-- /container -->
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
      </div>
	  </div>
	  </div>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../js/ie10-viewport-bug-workaround.js"></script>
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="2ee502b38968084de0440df2-|49" defer=""></script>
  </body>
</html>
