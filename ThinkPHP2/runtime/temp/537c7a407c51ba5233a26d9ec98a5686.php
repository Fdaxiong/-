<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"D:\phpStudy\PHPTutorial\WWW\ThinkPHP2/application/index\view\index\payment.html";i:1546409220;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
	<script src="https://cdn.bootcss.com/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<link href="https://cdn.bootcss.com/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
	<title></title>
</head>
<style>
    .x{border: 1px solid #ccc;}

table.gridtable {
  font-family: verdana,arial,sans-serif;
  font-size:11px;
  color:#333333;
  border-width: 1px;
  border-color: #666666;
  border-collapse: collapse;
}
table.gridtable th {
  border-width: 1px;
  padding: 8px;
  border-style: solid;
  border-color: #666666;
  background-color: #dedede;
}
table.gridtable td {
  border-width: 1px;
  padding: 8px;
  border-style: solid;
  border-color: #666666;
  background-color: #ffffff;
}



td{
  /*  display: table-row;*/
    vertical-align: inherit;
   /* border-color: inherit;*/
}
</style>
<body>
	<div>
	   <li class="list-group-item list-group-item-primary">等待买家付款
    <a href="<?php echo url('index/personal'); ?>"  style="float: right; " class="btn btn-primary alert alert-danger">个人中心</a>
     </li>
		<ul class="list-group list-group-flush">
			<li class="list-group-item">收货人:
				<b><?php echo $payment_id['member_id']; ?></b> 
				<font size="1"><?php echo $payment_id['address']; ?></font>
			</li>
		  <li class="list-group-item">
		  订单编号:<font color="red"><?php echo $payment_id['order_sn']; ?> </font>  <font style="Float:right">余额:<font color="red"><?php echo $blance['balance']; ?></font></font>
		  </li>

		  <li class="list-group-item">
		  	<div class="custom-control custom-radio">
			  <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" checked=true>
			  <label class="custom-control-label" for="customRadio1" >余额支付</label>
			</div>
			<div class="custom-control custom-radio">
			  <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
			  <label class="custom-control-label" for="customRadio2">微信支付</label>
			</div>
			<div class="custom-control custom-radio">
			  <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input">
			  <label class="custom-control-label" for="customRadio3">支付宝支付</label>
			</div>

		  </li>

		  <li class="list-group-item">应付金额:<font color="red">￥<?php echo $payment_id['amount']; ?></font> </li>
		  
		  <li class="list-group-item">
		 <button type="button" class="btn btn-danger btn-lg btn-block pay" data-toggle="modal" data-target="#exampleModalCenter">立即支付</button>
		</li>
		</ul>
	</div>




<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">请输入支付密码</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="X">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        应付金额
        <h1><b>￥<?php echo $payment_id['amount']; ?> </b></h1>
      </div>
   <div class="modal-footer">
       <!--  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button> -->
        <input type="password" id="inputPassword5" class="form-control sr" aria-describedby="passwordHelpBlock" maxlength=5>
      </div>

    <div class="modal-footer">
      <table class="table table-bordered table-dark" >
        <tbody align=center>
          <tr>            
            <td class="one num">1</td>
            <td class="two num">2</td>
            <td class="three num">3</td>
          </tr>
          <tr>  
            <td class="four num">4</td>
            <td class="five num">5</td>
            <td class="six num">6</td>
          </tr>
          <tr>  
            <td class="seven num">7</td>
            <td class="eight num">8</td>
            <td class="nine num">9</td>
          </tr>
          <tr>        
            <td class="ten num">0</td>
            <td class=""></td>
            <td class="del">X</td>
          </tr>
        </tbody>
      </table>
    </div>

  </div>
</div>

</body>

<script type="text/javascript">
      var paw="";
      var order_sn="<?php echo $order_sn; ?>";
  $(".num").click(function(){
         var one=$(this).text();
         
         paw=paw+one;
          $(".sr").val(paw);  

       if (paw.length==6) {
       $.ajax({
              type:"post",
              url:"<?php echo url('index/ajxj_pay'); ?>",
              data:"paw="+paw+"&order_sn="+order_sn,
              success:function(data){
                 if (data==1) {
                  alert("支付成功")
                  location.href="<?php echo url('index/personal'); ?>";  
                 }else{
                  if (data==2) {
                      alert("密码错误,你还可以输入3次")
                  }else{
                    if (data==3) {  
                      alert("余额不足")
                    }
                  }
                 }
                }
            });

       }

  });
  $(".del").click(function(){
    // alert(paw);
     paw = paw.substring(0, paw.length - 1);
       $(".sr").val(paw); 
  });

 // if (paw.length>6) {
 //  alert(111);
 // }
 // $(".X").click(function(){
 //    var b=" ";
 //     $(".sr").val(b);
 // })
</script>
   
</html>