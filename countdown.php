<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<!-- 响应式viewport,获取设备的宽度 -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>事项倒计时</title>
	<link rel="Shortcut Icon" href="img/favicon.ico">
	<!-- Bootstrap的基本css文件 -->
	<link rel="stylesheet" media="screen" href="css/bootstrap.min.css">
	<!-- 倒计时样式文件 -->
	<link rel="stylesheet" href="countdown/jquery.countdown.css" />
	<style type="text/css">
      body {
        padding: 30px 15% 30px;
      }
      .bgTimeUp{
      	background: #3A3A3A;
      }
    </style>
</head>
<body>
	<?php
	//用SECSSION里面的值就要这句，要放在第一行
	session_start();

	include('conn.php');

	$username = $_SESSION['username'];
	$query_result = mysql_query("select * from cdlist where username ='$username'");

	//编号
	$counter = 1;
	$count=0;

	//时间操作
    //$t=time();
    //这句可以设置时区
	date_default_timezone_set("asia/chongqing");
	//$nowTime = date("Y-m-d H:i:s",$t);
	//nowTime转化为秒
	//$nowTimeSec = strtotime($nowTime);

	//$ary = array();
	?>
<!-- 页面的开始 -->
	<!-- 固定位置的导航条 -->
	<div class="navbar">
		<div class="navbar-inner">
			<!-- 左侧导航【首页】【关于我们】-->
			<a class="brand">事项倒计时</a>
			<ul class="nav ">
				<li class="divider-vertical">
					<a href="#"><i class="icon-home"></i>首页</a>
				</li>
				<li class="divider-vertical">
					<!-- 添加【关于我们】 -->
					<a href="#us" role="button" data-toggle="modal" data-toggle="modal"><i class="icon-book"></i>关于我们</a>
					<!-- 添加【关于我们】弹出窗口 -->
					<div id="us" class="modal hide fade" tabindex="-1" role="dialog"  aria-hidden="true">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h3 id="myModalLabel">关于我们</h3>
						</div>
						<div class="modal-body">
							<table class="table table-bordered table-hover ">
								<thead>
									<tr>
										<td></td>
										<td>
											<h4 class="text-center">姓名</h4>
										</td>
										<td>
											<h4 class="text-center">学号</h4>
										</td>
										<td>
											<h4 class="text-center">负责任务</h4>
										</td>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td> <strong>组长</strong>
										</td>
										<td>
											<a href="http://pigerla.com/" alt="吴建杰" title="进入吴建杰个人Blog"> <strong>吴建杰</strong>
											</a>
										</td>
										<td>
											<strong>20102100035</strong>
										</td>
										<td>
											<strong>前端界面设计与后台逻辑的实现</strong>
										</td>
									</tr>
									<tr>
										<td>
											<strong>成员</strong>
										</td>
										<td>
											<strong>王名朗</strong>
										</td>
										<td>
											<strong>20102100030</strong>
										</td>
										<td>
											<strong>Android平台界面设计与后台逻辑的实现</strong>
										</td>
									</tr>
									<tr>
										<td>
											<strong>成员</strong>
										</td>
										<td>
											<strong>邓校新</strong>
										</td>
										<td>
											<strong>20102100036</strong>
										</td>
										<td>
											<strong>Android平台界面设计与实现</strong>
										</td>
									</tr>
									<tr>
										<td>
											<strong>成员</strong>
										</td>
										<td>
											<strong>谭洪杰</strong>
										</td>
										<td>
											<strong>20102100033</strong>
										</td>
										<td>
											<strong>MySQL数据表设计与实现</strong>
										</td>
									</tr>
									<tr>
										<td>
											<strong>成员</strong>
										</td>
										<td>
											<strong>陈培伟</strong>
										</td>
										<td>
											<strong>20102100028</strong>
										</td>
										<td>
											<strong>软件测试与文档说明</strong>
										</td>
									</tr>
								</tbody>
							</table>
							<h4>联系及反馈邮箱：474957860@qq.com </h4>
						</div>
						<div class="modal-footer">
							<button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">确定</button>
						</div>
					</div>
				</li>
			</ul>

			<!--右侧导航【用户名】-->
			<ul class="nav pull-right">
				<li>
					<?php $username = $_SESSION['username']; ?>
					<!-- 用户名 -->
					<a href="#me" role="button" data-toggle="modal" data-toggle="modal" class="navbar-link "><i class="icon-user"></i><strong><?php echo $username;?></strong></a>
					<!-- 添加【关于我们】弹出窗口 -->
					<div id="me" class="modal hide fade" tabindex="-1" role="dialog"  aria-hidden="true">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h3 id="myModalLabel">欢迎您，亲爱的</h3>
						</div>
						<div class="modal-body">
							<h2 class="text-center"><?php echo $username;?></h2>
						</div>
						<div class="modal-footer">
							<button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">确定</button>
						</div>
					</div>
				</li>
				<li>
					<!-- action=logout url传值 -->
					 <a href="logout.php?action=logout" class="navbar-link"><i class="icon-off"></i>退出</a>
				</li>
			</ul>
		</div>
	</div>

<!-- 页面主要内容 -->
	<div class="container-fluid">
	<!-- 中间大标语 banner -->
		<hr>
		<div class="hero-unit">
			<blockquote>
				<h1 class="text-center">我们共同开发的“倒计时”!!</h1>
				<br>
				<p class="text-center">
					华南师范大学 计算机学院 软件工程9班 【高级软件实做】
				</p>
				<p class="text-center">
					<small>By：吴建杰 谭洪杰 王名朗 邓校新 陈培伟</small>
				</p>
			</blockquote>
		</div>

<!-- 倒计时的事项列表 -->
		<table class="table table-bordered table-hover ">
			<caption>
				<hr>
				<h1>每一件事都在倒计时...</h1>
				<hr>
				<br>
			</caption>

	<!-- 表头 -->
			<thead>
				<tr>
					<td >
						<h3 class="text-center">编号</h3>
					</td>
					<td>
						<h3 class="text-center">备注</h3>
					</td>
					<td>
						<h3 class="text-center">剩余时间 [ 天:时:分:秒 ]</h3>
					</td>
				</tr>
			</thead>

	<!-- 表主题列表部分 -->
			<tbody id="tbody">
				<?php while ($result = mysql_fetch_assoc($query_result)) { 
					//array_push($ary, strtotime($result['endtime']) - $nowTimeSec);
					?>
				<tr>
					<td>
						<h4 class="text-center" id="<?php echo $counter;?>">
							<?php echo $counter; ?>
						</h4>
					</td>
					<td><!-- 输出note-->
						<h4 class="text-center">
							<?php echo $result['note']; ?>
						</h4>
					</td>

					<!-- 输出结束的时间 -->
					<td class="countdown" data-ts="<?php echo strtotime($result['endtime'])*1000;?>" style="text-align:center;line-height:30px;padding-top:15px;padding-bottom:5px;">
					</td>
					<td style="text-align:center">
						<button data-value="<?php echo $result['id'];?>" class="btn btn-danger btn-large">删除</button>
					</td>
				</tr>
				<?php
					$counter++;
					//echo $ary[$count++];
					//$count;
				}
				?>
			</tbody>
		</table>

<!-- 添加事项按钮与实现 -->
		<hr>
		<a href="addevent.html" class="btn btn-large btn-block btn-primary">添加自定义事项</a>
		<hr>
		<a href="fetchevent.html" class="btn btn-large btn-block btn-primary">添加网页事项</a>
		<hr>
	</div><!--the end of .container-fluid -->

	

	<script src="js/jquery-2.0.2.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="countdown/jquery.countdown.js"></script>
	<script type="text/javascript" src="js/script.js"></script>

<!-- 删除按钮的响应 -->
	<script>
        $(document).ready(function () {
	        $(".btn-danger").click(function () {
							
				var that = $(this);
				var id = that.attr("data-value");
				if (!confirm("确定删除此事项？")) {
					return;
				};
				$.ajax({
					url: "delete.php",
					data: {
						id: id
					},
					type: 'get',
					success: function (data) {
						console.log(data);
						that.parents("tr").remove();

						}
					});
				});				  
            });
    </script>
</body>
</html>