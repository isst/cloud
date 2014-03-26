<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=7" />
		<title>浙江大学软件学院信息化云平台</title>

		<link href="themes/default/style.css" rel="stylesheet" type="text/css" media="screen"/>
		<link href="themes/css/core.css" rel="stylesheet" type="text/css" media="screen"/>
		<link href="themes/css/print.css" rel="stylesheet" type="text/css" media="print"/>
		<link href="uploadify/css/uploadify.css" rel="stylesheet" type="text/css" media="screen"/>
		<!--[if IE]>
		<link href="themes/css/ieHack.css" rel="stylesheet" type="text/css" media="screen"/>
		<![endif]-->
		<style type="text/css">
			#header{height:85px}
			#leftside, #container, #splitBar, #splitBarProxy{top:90px}
		</style>

		<script src="js/speedup.js" type="text/javascript"></script>
		<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
		<script src="js/jquery.cookie.js" type="text/javascript"></script>
		<script src="js/jquery.validate.js" type="text/javascript"></script>
		<script src="js/jquery.bgiframe.js" type="text/javascript"></script>
		<script src="xheditor/xheditor-1.1.14-zh-cn.min.js" type="text/javascript"></script>
		<script src="uploadify/scripts/swfobject.js" type="text/javascript"></script>
		<script src="uploadify/scripts/jquery.uploadify.v2.1.0.js" type="text/javascript"></script>

		<script src="js/dwz.min.js" type="text/javascript"></script>
		<script src="js/dwz.regional.zh.js" type="text/javascript"></script>

		<script type="text/javascript">
			// 为修改密码定制对话框Ajax回调函数
			function changepwdAjaxDone(json) {
				if (json.statusCode == DWZ.statusCode.ok) {
					if (alertMsg) {
						alertMsg.correct(json.message || DWZ.msg("sessionTimout"), {okCall: DWZ.loadLogin});
						setTimeout(DWZ.loadLogin, 3500);
					} else {
						DWZ.loadLogin();
					}
					if ("closeCurrent" == json.callbackType) {
						$.pdialog.closeCurrent();
					}
				} else {
					DWZ.ajaxDone(json);
				}
			}
			$(function() {
				$('#navMenu').load('menu.html', function() {
					//$("#sidebar").find(".accordion").load($('#navMenu li.selected>a').attr("href"));
					// 加载主菜单数据完成后再初始化DWZ
					DWZ.init("dwz.frag.xml", {
						//		loginUrl:"login_dialog.html", loginTitle:"登录",	// 弹出登录对话框
						loginUrl: "login.html", // 跳到登录页面
						statusCode: {ok: 200, error: 300, timeout: 301}, //【可选】
						pageInfo: {pageNum: "pageNum", numPerPage: "numPerPage", orderField: "orderField", orderDirection: "orderDirection"}, //【可选】
						debug: false, // 调试模式 【true|false】
						callback: function() {
							initEnv();
							setTimeout(function() {
								$('#navMenu li.selected>a').click();
							}, 10);
						}
					});
				});
			});
		</script>
	</head>

	<body scroll="no">
		<div id="layout">
			<div id="header">
				<div class="headerNav">
					<a class="logo" href="./">标志</a>
					<ul class="nav">
						<li><span style="color:#FFF;"><?php echo "欢迎您： " . $_SESSION['username']; ?></span></li>
						<li><a href="http://www.yoncc.com" target="_blank">技术支持</a></li>
						<li><a href="user/changepwd.html" target="dialog" width="600" mask="true">修改密码</a></li>
						<li><a href="user/logout.html">退出</a></li>
					</ul>
				</div>

				<div id="navMenu">
				</div>
			</div>

			<div id="leftside">
				<div id="sidebar_s">
					<div class="collapse">
						<div class="toggleCollapse"><div></div></div>
					</div>
				</div>
				<div id="sidebar">
					<div class="toggleCollapse"><h2>主菜单</h2><div>收缩</div></div>

					<div class="accordion" fillSpace="sidebar">

					</div>

				</div>
			</div>
			<div id="container">
				<div id="navTab" class="tabsPage">
					<div class="tabsPageHeader">
						<div class="tabsPageHeaderContent"><!-- 显示左右控制时添加 class="tabsPageHeaderMargin" -->
							<ul class="navTab-tab">
								<li tabid="main" class="main"><a href="javascript:;"><span><span class="home_icon">欢迎使用</span></span></a></li>
							</ul>
						</div>
						<div class="tabsLeft">left</div><!-- 禁用只需要添加一个样式 class="tabsLeft tabsLeftDisabled" -->
						<div class="tabsRight">right</div><!-- 禁用只需要添加一个样式 class="tabsRight tabsRightDisabled" -->
						<div class="tabsMore">more</div>
					</div>
					<ul class="tabsMoreList">
						<li><a href="javascript:;">欢迎使用</a></li>
					</ul>
					<div class="navTab-panel tabsPageContent layoutBox">
						<div class="page unitBox">
							<div class="pageFormContent" layoutH="80">
								<h1>欢迎使用浙江大学软件学院 信息管理云平台</h1>
								<p>balabalabala一大堆介绍什么的</p>
							</div>
						</div>

					</div>
				</div>
			</div>

		</div>

		<div id="footer">Copyright &copy; 2012 <a href="http://www.yoncc.com/" target="_blank">杭州银信文化创意有限公司</a></div>

	</body>
</html>