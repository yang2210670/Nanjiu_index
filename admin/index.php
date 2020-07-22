<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>南玖主页后台管理</title>
<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<?php
error_reporting(0);
include './config.php';
if($token=$_COOKIE["admin_token"]){
	$session = md5($conf['admin_user'].md5($conf['admin_pwd']));
	if($session==$token){
		require('tool.php');
		if(isset($_POST['id'])&&$_POST['id']==1){
			updateconfig("../config.php", "title",urlencode($_POST['title'])); 
			updateconfig("../config.php", "logo",urlencode($_POST['logo'])); 
			updateconfig("../config.php", "right_top_title_1",urlencode($_POST['right_top_title_1'])); 
			updateconfig("../config.php", "right_top_url_1",urlencode($_POST['right_top_url_1'])); 
			//updateconfig("../config.php", "right_top_title_2",urlencode($_POST['right_top_title_2'])); 
			//updateconfig("../config.php", "right_top_url_2",urlencode($_POST['right_top_url_2'])); 
			updateconfig("../config.php", "music",urlencode($_POST['music'])); 
			updateconfig("../config.php", "email",urlencode($_POST['email'])); 
			updateconfig("../config.php", "footewm",urlencode($_POST['footewm'])); 
			updateconfig("../config.php", "right_foot",urlencode($_POST['right_foot'])); 
			updateconfig("../config.php", "liuyan",urlencode($_POST['liuyan'])); 
			updateconfig("../config.php", "tonji",urlencode($_POST['tonji'])); 
			updateconfig("../config.php", "tencent",urlencode($_POST['tencent'])); 
			echo '<script language="javascript"> alert("修改成功，请到前台刷新查看效果。");</script>';
		}
		if(isset($_POST['id'])&&$_POST['id']==2){
			updateconfig("../config.php", "titletop1",urlencode($_POST['titletop1'])); 
      updateconfig("../config.php", "titletop2",urlencode($_POST['titletop2'])); 
      updateconfig("../config.php", "titletop3",urlencode($_POST['titletop3'])); 
			updateconfig("../config.php", "tdimg1",urlencode($_POST['tdimg1'])); 
			updateconfig("../config.php", "tdimg2",urlencode($_POST['tdimg2'])); 
			updateconfig("../config.php", "tdimg3",urlencode($_POST['tdimg3'])); 
			updateconfig("../config.php", "tdimg4",urlencode($_POST['tdimg4'])); 
			updateconfig("../config.php", "tdimg5",urlencode($_POST['tdimg5'])); 
			updateconfig("../config.php", "tdimg6",urlencode($_POST['tdimg6'])); 
			updateconfig("../config.php", "tdimg10",urlencode($_POST['tdimg10'])); 
			updateconfig("../config.php", "tdtext1",urlencode($_POST['tdtext1'])); 
			updateconfig("../config.php", "tdtext2",urlencode($_POST['tdtext2'])); 
			updateconfig("../config.php", "tdtext3",urlencode($_POST['tdtext3'])); 
			updateconfig("../config.php", "tdtext4",urlencode($_POST['tdtext4'])); 
			updateconfig("../config.php", "tdtext5",urlencode($_POST['tdtext5'])); 
			updateconfig("../config.php", "tdtext6",urlencode($_POST['tdtext6'])); 
			updateconfig("../config.php", "tdwm1",urlencode($_POST['tdwm1'])); 
			updateconfig("../config.php", "tdwm2",urlencode($_POST['tdwm2'])); 
			updateconfig("../config.php", "tdwm3",urlencode($_POST['tdwm3'])); 
			updateconfig("../config.php", "tdwm4",urlencode($_POST['tdwm4'])); 
			updateconfig("../config.php", "tdwm5",urlencode($_POST['tdwm5'])); 
			updateconfig("../config.php", "tdwm6",urlencode($_POST['tdwm6'])); 
			if(@$_POST['hzpd1']=='on') updateconfig("../config.php", "hzpd1",urlencode('true')); else updateconfig("../config.php", "hzpd1",urlencode('false')); 
			if(@$_POST['hzpd2']=='on') updateconfig("../config.php", "hzpd2",urlencode('true')); else updateconfig("../config.php", "hzpd2",urlencode('false')); 
			if(@$_POST['hzpd3']=='on') updateconfig("../config.php", "hzpd3",urlencode('true')); else updateconfig("../config.php", "hzpd3",urlencode('false')); 
			if(@$_POST['hzpd4']=='on') updateconfig("../config.php", "hzpd4",urlencode('true')); else updateconfig("../config.php", "hzpd4",urlencode('false')); 
      if(@$_POST['hzpd5']=='on') updateconfig("../config.php", "hzpd5",urlencode('true')); else updateconfig("../config.php", "hzpd5",urlencode('false')); 
      if(@$_POST['hzpd6']=='on') updateconfig("../config.php", "hzpd6",urlencode('true')); else updateconfig("../config.php", "hzpd6",urlencode('false')); 
			echo '<script language="javascript"> alert("修改成功，请到前台刷新查看效果。");</script>';
		}
    if(isset($_POST['id'])&&$_POST['id']==3){
      updateconfig("../config.php", "flyall",urlencode($_POST['flyall'])); 
      updateconfig("../config.php", "airspeed",urlencode($_POST['airspeed'])); 
      if(@$_POST['hzpd7']=='on') updateconfig("../config.php", "hzpd7",urlencode('true')); else updateconfig("../config.php", "hzpd7",urlencode('false')); 
      echo '<script language="javascript"> alert("修改成功，请到前台刷新查看效果。");</script>';
    }
	}else{
		echo '<script language="javascript">window.location.href=\'login.php\';</script>';
	}
}else{
	echo '<script language="javascript">window.location.href=\'login.php\';</script>';
}
$file='../config.php';
$type='string';

?>
<body>
<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse"
                data-target="#example-navbar-collapse"> <span class="sr-only">切换导航</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="">后台管理</a> </div>
    <div class="collapse navbar-collapse" id="example-navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="upadmin.php"><span class="glyphicon glyphicon-user"></span>管理账户修改</a></li>
        <li class="active"><a href="#"><span class="glyphicon glyphicon-list-alt"></span>网站信息管理</a></li>
        <li><a href="exit.php"><span class="glyphicon glyphicon-off"></span>安全退出</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
<div class="row">

<!--网站信息修改-->
<div class="panel panel-success form-group">
  <div class="panel-heading">
    <h3 class="panel-title">网站信息</h3>
  </div>
  <div class="panel-body"> 
    <!--全局信息修改 分类一-->
    <div class="form-group">
      <div class="page-header">
        <h3>全局</h3>
      </div>
      <form action="index.php" method="post">
        <input type="hidden" name="id"  value="1">
        <div class="form-group">
          <label>网站标题：</label>
          <input type="text" name="title" class="form-control" placeholder="请输入网站标题" value="<?php echo htmlspecialchars(urldecode(get_config($file, 'title', $type))) ?>">
        </div>
        <div class="form-group">
          <label>LOGO头像：</label>
          <input type="text" name="logo" class="form-control" placeholder="请输入LOGO文字" value="<?php echo htmlspecialchars(urldecode(get_config($file, 'logo', $type))) ?>">
        </div>
        <div class="form-group">
          <label>背景音乐：</label>
          <input type="text" name="music" class="form-control" placeholder="请输入背景音乐链接" value="<?php echo htmlspecialchars(urldecode(get_config($file, 'music', $type))) ?>">
        </div>
        <div class="form-group">
          <label>底部版权：</label>
          <input type="text" name="right_foot" class="form-control" placeholder="请输入底部信息" value="<?php echo htmlspecialchars(urldecode(get_config($file, 'right_foot', $type))) ?>">
        </div>
        <div class="form-group">
          <label>第三方统计代码：</label>
          <textarea style="max-width:100%;" type="text" name="tonji" class="form-control textarea animate-box" rows="8" placeholder="请输入统计代码"><?php echo htmlspecialchars(urldecode(get_config($file, 'tonji', $type))) ?></textarea>
        </div>
        <button type="submit" class="btn btn-success btn-block">确定修改</button>
      </form>
    </div>
    <!--首页信息修改 分类二-->
    <div class="form-group">
      <div class="page-header">
        <h3>首页</h3>
      </div>
      <form action="index.php" method="post">
        <input type="hidden" name="id"  value="2">
        <div class="form-group">
          <label>大标题：</label>
          <input type="text" name="titletop1" class="form-control" placeholder="头像下方的标题" value="<?php echo htmlspecialchars(urldecode(get_config($file, 'titletop1', $type))) ?>">
        </div>
        <div class="form-group">
          <label>名言名句：</label>
          <input type="text" name="titletop2" class="form-control" placeholder="名言名句或个人简介" value="<?php echo htmlspecialchars(urldecode(get_config($file, 'titletop2', $type))) ?>">
        </div>
        <div class="form-group">
          <label>心情说说：</label>
          <input type="text" name="titletop3" class="form-control" placeholder="填入说说" value="<?php echo htmlspecialchars(urldecode(get_config($file, 'titletop3', $type))) ?>">
        </div>
        <div class="form-group">
          <label>导航： </label>
          <div class="form-group">
            <div class="col-md-5 col-sm-5 col-xs-5 duolie">
           <input type="text" name="tdtext1" class="form-control" placeholder="网址" value="<?php echo htmlspecialchars(urldecode(get_config($file, 'tdtext1', $type))) ?>">
            </div>
            <div class="col-md-3 col-sm-2 col-xs-4 duolie">
              <input type="text" name="tdwm1" class="form-control" placeholder="名称" value="<?php echo htmlspecialchars(urldecode(get_config($file, 'tdwm1', $type))) ?>">
            </div>
             <div class="col-md-2 col-sm-2 col-xs-3 duolie" style="float: left;">
              <label class="checkbox">
                <input type="checkbox" name="hzpd1" <?php if(get_config($file, 'hzpd1', $type)=='true') echo 'checked="checked"';  ?> >
                开启 </label>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-5 col-sm-5 col-xs-5 duolie">
              <input type="text" name="tdtext2" class="form-control" placeholder="网址" value="<?php echo htmlspecialchars(urldecode(get_config($file, 'tdtext2', $type))) ?>">
            </div>
            <div class="col-md-3 col-sm-2 col-xs-4 duolie">
              <input type="text" name="tdwm2" class="form-control" placeholder="名称" value="<?php echo htmlspecialchars(urldecode(get_config($file, 'tdwm2', $type))) ?>">
            </div>
            <div class="col-md-2 col-sm-2 col-xs-3 duolie" style="float: left;">
              <label class="checkbox">
                <input type="checkbox" name="hzpd2" <?php if(get_config($file, 'hzpd2', $type)=='true') echo 'checked="checked"';  ?> >
                开启 </label>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-5 col-sm-5 col-xs-5 duolie">
              <input type="text" name="tdtext3" class="form-control" placeholder="网址" value="<?php echo htmlspecialchars(urldecode(get_config($file, 'tdtext3', $type))) ?>">
            </div>
            <div class="col-md-3 col-sm-2 col-xs-4 duolie">
              <input type="text" name="tdwm3" class="form-control" placeholder="名称" value="<?php echo htmlspecialchars(urldecode(get_config($file, 'tdwm3', $type))) ?>">
            </div>
            <div class="col-md-2 col-sm-2 col-xs-3 duolie" style="float: left;">
              <label class="checkbox">
                <input type="checkbox" name="hzpd3" <?php if(get_config($file, 'hzpd3', $type)=='true') echo 'checked="checked"';  ?> >
                开启 </label>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-5 col-sm-5 col-xs-5 duolie">
              <input type="text" name="tdtext4" class="form-control" placeholder="网址" value="<?php echo htmlspecialchars(urldecode(get_config($file, 'tdtext4', $type))) ?>">
            </div>
            <div class="col-md-3 col-sm-2 col-xs-4 duolie">
              <input type="text" name="tdwm4" class="form-control" placeholder="名称" value="<?php echo htmlspecialchars(urldecode(get_config($file, 'tdwm4', $type))) ?>">
            </div>
            <div class="col-md-2 col-sm-2 col-xs-3 duolie" style="float: left;">
              <label class="checkbox">
                <input type="checkbox" name="hzpd4" <?php if(get_config($file, 'hzpd4', $type)=='true') echo 'checked="checked"';  ?> >
                开启 </label>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-5 col-sm-5 col-xs-5 duolie">
              <input type="text" name="tdtext5" class="form-control" placeholder="网址" value="<?php echo htmlspecialchars(urldecode(get_config($file, 'tdtext5', $type))) ?>">
            </div>
            <div class="col-md-3 col-sm-2 col-xs-4 duolie">
              <input type="text" name="tdwm5" class="form-control" placeholder="名称" value="<?php echo htmlspecialchars(urldecode(get_config($file, 'tdwm5', $type))) ?>">
            </div>
            <div class="col-md-2 col-sm-2 col-xs-3 duolie" style="float: left;">
              <label class="checkbox">
                <input type="checkbox" name="hzpd5" <?php if(get_config($file, 'hzpd5', $type)=='true') echo 'checked="checked"';  ?> >
                开启 </label>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-5 col-sm-5 col-xs-5 duolie">
              <input type="text" name="tdtext6" class="form-control" placeholder="网址" value="<?php echo htmlspecialchars(urldecode(get_config($file, 'tdtext6', $type))) ?>">
            </div>
            <div class="col-md-3 col-sm-2 col-xs-4 duolie">
              <input type="text" name="tdwm6" class="form-control" placeholder="名称" value="<?php echo htmlspecialchars(urldecode(get_config($file, 'tdwm6', $type))) ?>">
            </div>
            <div class="col-md-2 col-sm-2 col-xs-3 duolie" style="float: left;">
              <label class="checkbox">
                <input type="checkbox" name="hzpd6" <?php if(get_config($file, 'hzpd6', $type)=='true') echo 'checked="checked"';  ?> >
                开启 </label>
            </div>
          </div>
        </div>
        
        <button type="submit" class="btn btn-success btn-block">确定修改</button>
      </form>
    </div>
   
<!--首页信息修改 分类三-->
<div class="form-group">
      <div class="page-header">
        <h3>漂浮</h3>
      </div>
      <form action="index.php" method="post">
        <input type="hidden" name="id"  value="3">
        <div class="col-md-5 col-sm-5 col-xs-5 duolie">
              <input type="text" name="flyall" class="form-control" placeholder="漂浮数量建议10-500" value="<?php echo htmlspecialchars(urldecode(get_config($file, 'flyall', $type))) ?>">
            </div>
            <div class="col-md-3 col-sm-2 col-xs-4 duolie">
              <input type="text" name="airspeed" class="form-control" placeholder="飞行时间建议10-100,数值越大飞行越慢" value="<?php echo htmlspecialchars(urldecode(get_config($file, 'airspeed', $type))) ?>">
            </div>
            <div class="col-md-2 col-sm-2 col-xs-3 duolie" style="float: left;">
              <label class="checkbox">
                <input type="checkbox" name="hzpd7" <?php if(get_config($file, 'hzpd7', $type)=='true') echo 'checked="checked"';  ?> >
                开启 </label>
            </div>
        <button type="submit" class="btn btn-success btn-block">确定修改</button>
      </form>
    </div>



  </div>
</div>
  </div>
<div class="panel panel-success row" style="margin-bottom: 20px;">
  <div class="panel-heading">
    <span class="panel-title">开发者：<a href="https://wpa.qq.com/msgrd?v=3&uin=376073351&site=qq&menu=yes" style="color: #3c763d;font-size: 14px;">清风竹野</a></span><span style="background: #ffffff;padding: 5px 10px;float: right;margin-top: -4px;font-size: 14px;">版本：v2.1-200324 </span>
  </div>
</div>
</body>
</html>


