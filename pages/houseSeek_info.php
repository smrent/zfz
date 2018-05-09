<?php
  //求租详情页houseSeek_info.php
	error_reporting(E_ALL & ~E_NOTICE);
	$house_seek_id=$_GET['house_seek_id'];
	$from=$_GET['from'];
	$house_seek_id_houseSeek_info=$_GET['house_seek_id_houseSeek_info'];
	$house_seek_id_original=$house_seek_id;
	$keyword_get=$_GET['keyword_get'];
	$rent_type_get=$_GET['rent_type_get'];
	$district_get=$_GET['district_get'];
	$subway_get=$_GET['subway_get'];
	$room_type_get=$_GET['room_type_get'];
	if($keyword_get=="null"){
			$keyword_get="";
	}
	if($rent_type_get=="null"){
			$rent_type_get="不限";
	}
	if($district_get=="null"){
			$district_get="不限";
	}
	if($subway_get=="null"){
			$subway_get="不限";
	}
	if($room_type_get=="null"){
			$room_type_get="不限";
	}
	$headtitle="水木租房子-求租详情-Q".$house_seek_id;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $headtitle; ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link href="../css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/rent_info_main.css">
    <link rel="stylesheet" href="../css/houseSeek_info_main.css">
		<script type="text/javascript" src="../js/jquery.min.js"></script>
		<script type="text/javascript" src="../js/jquery.more.seek_follow.js"></script>
		<script type="text/javascript">
		$(function(){
			var house_seek_id=$(" input[ name='house_seek_id' ] ").val();
			//var rent_type=$(" input[ name='rent_type' ] ").val();
			//alert(rent_type);
			$('#more').more({'address': '../php/data_seek_follow.php?house_seek_id='+house_seek_id})
			//alert('111');
		});
		function PostFM(){
			document.getElementById('frm').submit();	
		}
//		function GoSameNeed(){
//			var house_seek_id_sameneed=$(" input[ name='house_seek_id_sameneed' ] ").val();
//			var house_seek_id_houseSeek_info=$(" input[ name='house_seek_id_houseSeek_info' ] ").val();
//			var href_for_sameneed="houseSeek_info.php?house_seek_id="+house_seek_id_sameneed+"&from=houseSeek_info&house_seek_id_houseSeek_info="+$house_seek_id_houseSeek_info;
//			window.location.href=href_for_sameneed;
//		}
		
		function ReminderYanZheng(){
			alert("是否做过需求验证，做了验证置顶推荐");
		}
    function ReminderYanZhengRentWant(){
			alert("是否做过需求验证，做了验证排在前面哦");
		}
		function ReminderXueYe(){
			alert("是否填写了学业信息，毕业大学或所在行业");
		}
		function Check_AddSeekFollow(){
			 var w_or_m_addseekfollow_value = document.getElementById("w_or_m_addseekfollow").value;//微信号or手机号
			 var contact_addseekfollow_value = document.getElementById("contact_addseekfollow").value;//联系方式内容
			  var contact_addseekfollow = document.getElementById("contact_addseekfollow");
			 if(contact_addseekfollow_value==""){//联系方式为空
			 	 if(w_or_m_addseekfollow_value=="微信号"){
			 			alert ("请输入微信号");
			   		document.form.contact_addseekfollow.focus();
			   		return false;
			 	 }else if (w_or_m_addseekfollow_value=="手机号"){
			 			alert ("请输入手机号");
			   		document.form.contact_addseekfollow.focus();
			   		return false;
			 	 }
			 }else{//联系方式不为空
			 	 if(w_or_m_addseekfollow_value=="微信号"){
			 	 	  //alert(contact_addseekfollow_value);
			 	 	  if(contact_addseekfollow_value.length > 20){//微信6-20的字母、数字、下划线或减号，以字母开头
						 	 alert ("20字以内");
						   document.form.contact_addseekfollow.focus();
						   return false;
						}
			 	 		if(contact_addseekfollow_value.indexOf("@") != -1){//含有@
			 	 			  //alert('有at');
			 	 				var myreg=/^([a-z0-9A-Z]+[-|.]?)+[a-z0-9A-Z]@([a-z0-9A-Z]+(-[a-z0-9A-Z]+)?.)+[a-zA-Z]{2,}$/;
			 	 				if(!myreg.test(contact_addseekfollow_value)) {
								    alert('请输入有效的微信号！'); 
								    document.form.contact_addseekfollow.focus();
								    return false; 
							  }else{
							   	  document.form.submit();
							  }
					 	}else{//不含有@
					 		   //alert('无at');
					 		   var reg1 = "[1-9]\\d{5,19}";  //qq号 6 - 20
                 var reg2 = "1[3-9]\\d{9}";  //qq号或者手机号 11
                 var reg3 = "[a-zA-Z][-_a-zA-Z0-9]{5,19}"; //微信号带字母的 6-20
                 if(reg1.test(contact_addseekfollow_value)){
                 		document.form.submit();
                 }else if(reg2.test(contact_addseekfollow_value)){
                 		document.form.submit();
                 }else  if(reg3.test(contact_addseekfollow_value)){
                 		document.form.submit();
                 }else{
                 		alert('请输入有效的微信号！'); 
								    document.form.contact_addseekfollow.focus();
								    return false; 
                 }
					 	} 	
			 	 }else if (w_or_m_addseekfollow_value=="手机号"){
						//var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 
						//var myreg = /1[3-9]\\d{9}/; 
						/**
						 * 验证手机号码
						 * 
						 * 移动号码段:139、138、137、136、135、134、150、151、152、157、158、159、182、183、187、188、147
						 * 联通号码段:130、131、132、136、185、186、145
						 * 电信号码段:133、153、180、189
						 */
						//var myreg = /^((13[0-9])|(14[5|7])|(15([0-3]|[5-9]))|(18[0,5-9]))\\d{8}$/;
						var myreg = /^(1[3-9])+\d{9}$/;
					  if(contact_addseekfollow_value.length != 11) { 
						    alert('请输入有效的手机号！'); 
						    document.form.contact_addseekfollow.focus();
						    return false; 
					  }else if(!myreg.test(contact_addseekfollow_value)) { 
						    alert('请输入有效的手机号！'); 
						    document.form.contact_addseekfollow.focus();
						    return false; 
					  }else{
					   	  document.form.submit();
					  }
			   }
			 }
				// if(jianjie.length>20){//微信6-20的字母、数字、下划线或减号，以字母开头
				// 	 alert ("50字以内");
				//   document.form.jianjie.focus();
				//   return false;
				// }
		}
		</script>
</head>
<body>
<header>
    <!--搜索链接跳转-->
    <div class="nav-btn nav-return">
    		<form id='frm' action="seekhouse_search.php" method="get">
				<input name="keyword" value="<?php echo $keyword_get;?>" type="hidden">
				<input name="rent_type" value="<?php echo $rent_type_get;?>" type="hidden">
				<input name="district" value="<?php echo $district_get;?>" type="hidden">
				<input name="subway" value="<?php echo $subway_get;?>" type="hidden">
				<input name="room_type" value="<?php echo $room_type_get;?>" type="hidden">
				</form>
        <?php 
        if($from=="houseSeek"){
        	echo " <a href='houseSeek.html' style='float:left;'>";
        }else if($from=="houseSeek_info"){//UC等分享
        	if($house_seek_id_houseSeek_info==""){
        		echo " <a href='houseSeek.html' style='float:left;'>";
        	}else{
        		$href="houseSeek_info.php?house_seek_id=$house_seek_id_houseSeek_info&from=houseSeek_info";
        		echo " <a href='$href' style='float:left;'>";
        	}
        }else if($from=="seekhouse_search"){
        	//echo " <a onclick='window.history.back()' style='float:left;'>";
        	echo " <a onclick='PostFM()' style='float:left;'>";
        }else if($from=="groupmessage"){//UC等分享
        	echo " <a href='houseSeek.html' style='float:left;'>";
        }else if($from=="singlemessage"){//UC等分享
        	echo " <a href='houseSeek.html' style='float:left;'>";
        }else if($from==""){
        	echo " <a href='houseSeek.html' style='float:left;'>";
        }
        ?>
            <i class="fa fa-chevron-left fa-2x" aria-hidden="true"></i>
            <div class="return">返回</div>
        </a>
        <div class="nav-btn nav-logo">
        	<img class="logo" src="../images/logo.jpg" alt="水木租房子">
    		</div>
    </div>
</header>

<div class=" body">
  <!--求租信息-->
  <!--<a href="../pages/rent_info.html" class="content-box">-->
	<a class="content-box">
    <?php
		$mysqli = new mysqli('localhost', 'root', '674jdEddCF', 'demo');
		$rs=$mysqli->query("SELECT * FROM `house_seek` where id='$house_seek_id' and is_show = 1");
		if ($rs){//$rs为true才去取
			$numrows=mysqli_num_rows($rs);
			if($numrows == 0){
				echo "<script>alert('无该求租信息');window.location.href='houseSeek.html';</script>";
				exit;
		  }
		}
		
		$rs_seek=$mysqli->query("SELECT * FROM seek_follow where house_seek_id='$house_seek_id'");
		if ($rs_seek){//$rs为true才去取
			$follow=mysqli_num_rows($rs_seek);
		}
		
		$sql = "SELECT * FROM house_seek where id='$house_seek_id' and is_show = 1";
		$rst = $mysqli->query($sql);
		while ($row = $rst->fetch_array(MYSQLI_ASSOC)){
			//求租信息
			//$title=$row["title"];
			$content=$row["content"];
			//$title=mb_substr($content,0,26,'utf-8');
			if($row['title']==""){
				$title=mb_substr($content,0,26,'utf-8');
			}else{
				$title=$row['title'];
			}
			$set_top=$row['set_top'];
			if($set_top == 1 ){
				$title="<i class='fa fa-arrow-up' aria-hidden='true' style='color:red;'></i><span>".$title."</span>";	
			}
			
			$district=$row["district"];
			$district_original=$row["district"];
			$room_type=$row["room_type"];
			$rent_type=$row["rent_type"];
			if($rent_type=="求整租"){
				 $guanzhu_title="关注该需请留下微信号，方便相互联系";
				 $guanzhu_button="我也关注";
				 $yiyou="关注该需求的用户已有：";
			}else if($rent_type=="求合租"){
				 $guanzhu_title="想合租请留下微信号，方便相互联系";
				 $guanzhu_button="我想合租";
				 $yiyou="想合租的用户已有：";
			}
			
			
			//$follow=$row["follow"];
			$rs_want=$mysqli->query("SELECT * FROM rent_want where house_rent_id='$house_rent_id'");
			if ($rs_want){//$rs为true才去取
				$want=mysqli_num_rows($rs_want);
			}
			$subway=$row["subway"];
			$content=$row["content"];
			$xueye=$row["xueye"];
			if($xueye=="学业未填"){
				$xueye="<span style='color:red'>未填写</span>";
			}
			$headimg=$row["headimg"];
			$district=$district."/".$room_type."/".$rent_type;
			$time0=$row['addtime'];
			$time1=format_date($time0);
			$passtime=$time1;
			//用户头像 float
			//echo "<div class='pic-wrapper float-left pic-footer'>";
			//echo "<img class='room-pic' src='$headimg' alt='求租人' style='width:100%;height:100%;'>";
			//echo "</div>";
			echo "<div class='image-pic-float' alt='求租人' style='background-image: url(".$headimg.");'></div>";//padding-bottom: 30%;background-size: 100% 100%;float: left;width: 30%;
			
			//求租标题 float
			echo "<div class='content-wrapper float-left'>";
			echo "<h4>$title</h4>";
			//求租属性简介 block 垂直排列
			echo "<div class='abstract'>";
			echo "<ul class='room-info'>";
			echo "<li id='district' style='width:auto;'>$district</li>";
			echo "<li id='rent-type' style='float:right;'>";
      echo "<span class='passtime'>$passtime</span>";
      echo "</li>";
			//echo "<li id='house-type' class='text-center'>$room_type</li>";
			//echo "<li id='rent-type' class='text-right'>$rent_type</li>";
			echo "</ul>";
			echo "</div>";
			echo "<div class='state'>";
			echo "<ul class='state-info'>";
			//求租状态描述
			echo "<li>";
			//echo "<i class='fa fa-eye' aria-hidden='true'></i>";
			echo "<span id='watcher'>Q".$house_seek_id."</span>";////浏览量 改为ID  编号
			echo "</li>";
			echo "<li class='text-center'>";
			echo "<i class='fa fa-heart' aria-hidden='true'></i>";
			echo "<span class='follow'>$follow</span>";
			echo "</li>";
			echo "<li id='price' class='text-right'>$subway</li>";
			echo "</ul>";
			echo "</div>";
			echo "</div>";
			echo "</a>";//<a class="content-box">
			//echo "<hr>";
			//根据发出租帖的房东的联系方式，取出Ta的出租和Ta的求租
			$w_or_m=$row['w_or_m'];
			$contact=$row['contact'];
//			$xueye1=$row['xueye'];
			
//			$sql2="select * from verify where contact = '$contact'";	
//			$result2=$mysqli->query($sql2);
//			$row2=$result2->fetch_assoc();
//			$xueye2=$row2['xueye'];
			
//			if($xueye1 != ""){
//				$xueye=$xueye1;
//			}
//			if($xueye2 != ""){//验证的优先级高于自己填写
//				$xueye=$xueye2;
//			}
//			if($xueye1 == "未填写" && $xueye2 == ""){//都未填写
//				$xueye="未填写";
//			}
			
			//是否验证，从verify里取出star_sum，如果大于零则已验证
			$sql_verify = "SELECT * FROM verify where contact='$contact'";
			$rst_verify = $mysqli->query($sql_verify);
			while ($row_verify = $rst_verify->fetch_array(MYSQLI_ASSOC)){
				$gender=$row_verify["gender"];
				$star_sum=$row_verify["star_sum"];
			}
			
			if($gender == "男" ){
				$his_rent="他的出租";
				$his_seek="他的求租";
			}else if($gender == "女" ){
				$his_rent="她的出租";
				$his_seek="她的求租";
			}else{
				$his_rent="Ta的出租";
				$his_seek="Ta的求租";
			}
			
			if($star_sum >0 ){
				$yanzheng="<a style='color:blue;'>已验证</a>";
				$yanzheng_pic="../images/yz.jpg";
			}else{
				$yanzheng="<a style='color:red;'>未验证</a>";
				$yanzheng_pic="../images/wyz.jpg";
			}
			
			//Get user rent house numbers from table house_rent
			$rs=$mysqli->query("SELECT * FROM `house_rent` WHERE contact='$contact'");
			if ($rs){//$rs为true才去取
				$numrows_user_rent=mysqli_num_rows($rs);
			}
			
			//Get user seek house numbers from table house_seek
			$rs=$mysqli->query("SELECT * FROM `house_seek` WHERE contact='$contact'");
			if ($rs){//$rs为true才去取
				$numrows_user_seek=mysqli_num_rows($rs);
			}
			
			//双tab
			echo "<div id='tab-bar' class='tab-bar'>";
			echo "<a href='#' data-content='tab-content-1' class='tab-btn active'>求租详情</a>";//此注释不可删除！！ 两个a标签不可调整，不可换行！
			echo "<a href='#' data-content='tab-content-2' class='tab-btn'>联系求租人</a>";
			echo "</div>";
			echo "<a style='display: inline-block;' id='tab-content-1' class='content-box'>";
			//房源标题 float
			echo "<div class='room-desc float-left'>";
			echo "<p>$content</p>";
			echo "</div>";
			
			echo "</a>";
			echo "<div style='display: none;' id='tab-content-2' class='owner-info'>";
			echo "<div class='pic-wrapper'>";
			//echo "<img src='$headimg' alt='房东' style='width:70%;height:70%;'>";
			echo "<img src='$yanzheng_pic' alt='租户' style='width:70%;height:70%;'>";
			echo "<div class='verify'>";
			echo "<div class='star-box'>";
			echo "<div class='star_sum'>";
			//$star_sum=2;
			if($star_sum==0){
				echo "<div class='star'><i class='fa fa-star-o'></i></div><div class='star'><i class='fa fa-star-o'></i></div><div class='star'><i class='fa fa-star-o'></i></div><div class='star'><i class='fa fa-star-o'></i></div>";
			}
			if($star_sum==1){
				echo "<div class='star'><i class='fa fa-star'></i></div><div class='star'><i class='fa fa-star-o'></i></div><div class='star'><i class='fa fa-star-o'></i></div><div class='star'><i class='fa fa-star-o'></i></div>";
			}
			if($star_sum==2){
				echo "<div class='star'><i class='fa fa-star'></i></div><div class='star'><i class='fa fa-star'></i></div><div class='star'><i class='fa fa-star-o'></i></div><div class='star'><i class='fa fa-star-o'></i></div>";
			}
			if($star_sum==3){
				echo "<div class='star'><i class='fa fa-star'></i></div><div class='star'><i class='fa fa-star'></i></div><div class='star'><i class='fa fa-star'></i></div><div class='star'><i class='fa fa-star-o'></i></div>";
			}
			if($star_sum==4){
				echo "<div class='star'><i class='fa fa-star'></i></div><div class='star'><i class='fa fa-star'></i></div><div class='star'><i class='fa fa-star'></i></div><div class='star'><i class='fa fa-star'></i></div>";
			}
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "<div class='info-box float-left'>";
			echo "<ul>";
			echo "<li>".$w_or_m."码：<span>".$contact."</span></li>";
			
			//Ta的出租 租户
			if($numrows_user_rent==0){
				echo "<li>".$his_rent."：<span>$numrows_user_rent</span></li>";
			}else{
				$href="user_rent.php?w_or_m=".$w_or_m."&contact=".$contact."&house_seek_id=".$house_seek_id."&gender=".$gender;
				echo "<li>".$his_rent."：<span><a style='color:blue;text-decoration:underline;' href='$href'>".$numrows_user_rent."</a></span></li>";
			}
			//Ta的求租 租户
			if($numrows_user_seek==0){
				echo "<li>".$his_seek."：<span>$numrows_user_seek</span></li>";
			}else{
				$href="user_seek.php?w_or_m=".$w_or_m."&contact=".$contact."&house_seek_id=".$house_seek_id."&gender=".$gender;
				echo "<li>".$his_seek."：<span><a style='color:blue;text-decoration:underline;' href='$href'>".$numrows_user_seek."</a></span></li>";
			}
			//echo "<li><a style='color:#000;' onclick='ReminderYanZheng()'>需求验证</a>：<span onclick='ReminderYanZheng()'>$yanzheng</span></li>";
			//echo "<li><a style='color:blue;text-decoration:underline;' onclick='alert("123");'>全网最低</a>：<span>$zuidi</span></li>";
			echo "<li><a style='color:#000;' onclick='ReminderZuidi()'>学业信息</a>：<span onclick='ReminderXueYe()'>$xueye</span></li>";
			echo "<li><a style='color:#999;font-size:10px;'>需求验证请移步公众号或微博'水木租房'</a></li>";
			echo "</ul>";
			echo "</div>";
			echo "</div>"; 
		}
    ?>
	
	<?php
    $rs=$mysqli->query("SELECT * FROM `seek_follow` WHERE house_seek_id = '$house_seek_id'");
		if ($rs){//$rs为true才去取
			$numrows=mysqli_num_rows($rs);
		}
		//mysqli_free_result($rs);
		function format_date($time){
				if(!is_numeric($time)){
					$time=strtotime($time);
				}
		    $t=time()-$time;
		    $f=array(
		        '31536000'=>'年',
		        '2592000'=>'个月',
		        '604800'=>'星期',
		        '86400'=>'天',
		        '3600'=>'小时',
		        '60'=>'分钟',
		        '1'=>'秒'
		    );
		    foreach ($f as $k=>$v)    {
		        if (0 !=$c=floor($t/(int)$k)) {
		            //return '<span class="pink">'.$c.'</span>'.$v.'前';//&nbsp;
		            return $c.$v.'前';//&nbsp;
		        }
		    }
		}
    ?>

    <br><br>
	  <!--匹配-->
	  <div class="roomer-want"> 
	  	<div>
		  <?php 
//		  $rs=$mysqli->query("SELECT * FROM `house_seek` WHERE district = '$district_original' and room_type = '$room_type' and rent_type = '$rent_type'");
//			if ($rs){//$rs为true才去取
//				$numrows=mysqli_num_rows($rs);
//			}
//		  //echo $district."的有".$numrows."位";
//		  echo "最新<span style='color:#3f98ff'>".$district."</span>";
//		  echo "<br><br>";
//		  $sql="SELECT * FROM `house_seek` WHERE district = '$district_original' and room_type = '$room_type' and rent_type = '$rent_type'";
//			$result=$mysqli->query($sql);
//			while ($row=$result->fetch_array(MYSQLI_ASSOC)) {
//		  	$house_seek_id=$row['id'];
//		  	//$href_for_sameneed="houseSeek_info.php?house_seek_id=".$house_seek_id."&from=houseSeek_info&house_seek_id_houseSeek_info=".$house_seek_id_original;
//		  	$content=$row['content'];
//				if($set_top == 0){//未置顶，截取
//					$title=mb_substr($content,0,20,'utf-8');
//				}else{//置顶，显示title
//					$title=$row['title'];
//				}
//				$set_top=$row['set_top'];
//				if($set_top == 1 ){
//					$title="<i class='fa fa-arrow-up' aria-hidden='true' style='color:red;'></i><span>".$title."</span>";	
//				}
//				if($house_seek_id != $house_seek_id_original){//自己不能在列表里
//					echo "<input name='house_seek_id_sameneed' value='$house_seek_id' type='text'>";
//					echo "<input name='house_seek_id_houseSeek_info' value='$house_seek_id_houseSeek_info' type='text'>";
//					echo "<span style='color:blue;text-decoration:underline;'  onclick='GoSameNeed()'>$title</span>";
//					
//					echo "<hr>";
//					echo "<br>";
//				}
//				
//		  }
		  ?>
	  	</div>
	  </div>
	  <!--匹配end-->
  </div>


</div>
<script src="../js/showTab.js"></script>
</body>
</html>