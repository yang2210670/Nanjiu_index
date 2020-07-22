<html>
<head>
	<?php include("plugin/config.php");?>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<style type="text/css">
	@keyframes wpSuperSnow_l {
	0% {
	opacity:0;
}
25% {
	opacity:1;
}
100% {
	opacity:0;
	transform:translate3D(500px,1500px,0) rotate(250deg);
}
}@keyframes wpSuperSnow_r {
	0% {
	opacity:0;
}
25% {
	opacity:1;
}
100% {
	opacity:0;
	transform:translate3D(-500px,1500px,0) rotate(-500deg);
}
}@-webkit-keyframes wpSuperSnow_l {
	0% {
	opacity:0;
}
25% {
	opacity:1;
}
100% {
	opacity:0;
	-webkit-transform:translate3D(500px,1500px,0) rotate(250deg);
}
}@-webkit-keyframes wpSuperSnow_r {
	0% {
	opacity:0;
}
25% {
	opacity:1;
}
100% {
	opacity:0;
	-webkit-transform:translate3D(-500px,1500px,0) rotate(-500deg);
}
}@-moz-keyframes wpSuperSnow_l {
	0% {
	opacity:0;
}
25% {
	opacity:1;
}
100% {
	opacity:0;
	-moz-transform:translate3D(500px,1500px,0) rotate(250deg);
}
}@-moz-keyframes wpSuperSnow_r {
	0% {
	opacity:0;
}
25% {
	opacity:1;
}
100% {
	opacity:0;
	-moz-transform:translate3D(-500px,1500px,0) rotate(-500deg);
}
}@-ms-keyframes wpSuperSnow_l {
	0% {
	opacity:0;
}
25% {
	opacity:1;
}
100% {
	opacity:0;
	-ms-transform:translate3D(500px,1500px,0) rotate(250deg);
}
}@-ms-keyframes wpSuperSnow_r {
	0% {
	opacity:0;
}
25% {
	opacity:1;
}
100% {
	opacity:0;
	-ms-transform:translate3D(-500px,1500px,0) rotate(-500deg);
}
}@keyframes wpSuperSnowFlake_l {
	0% {
	opacity:0;
}
25% {
	opacity:1;
}
100% {
	opacity:0;
	transform:translate3D(500px,1500px,0) rotateY(720deg) rotate(250deg);
}
}@keyframes wpSuperSnowFlake_r {
	0% {
	opacity:0;
}
25% {
	opacity:1;
}
100% {
	opacity:0;
	transform:translate3D(-500px,1500px,0) rotateY(-720deg) rotate(-500deg);
}
}@-webkit-keyframes wpSuperSnowFlake_l {
	0% {
	opacity:0;
}
25% {
	opacity:1;
}
100% {
	opacity:0;
	-webkit-transform:translate3D(500px,1500px,0) rotateY(720deg) rotate(250deg);
}
}@-webkit-keyframes wpSuperSnowFlake_r {
	0% {
	opacity:0;
}
25% {
	opacity:1;
}
100% {
	opacity:0;
	-webkit-transform:translate3D(-500px,1500px,0) rotateY(-720deg) rotate(-500deg);
}
}@-moz-keyframes wpSuperSnowFlake_l {
	0% {
	opacity:0;
}
25% {
	opacity:1;
}
100% {
	opacity:0;
	-moz-transform:translate3D(500px,1500px,0) rotateY(720deg) rotate(250deg);
}
}@-moz-keyframes wpSuperSnowFlake_r {
	0% {
	opacity:0;
}
25% {
	opacity:1;
}
100% {
	opacity:0;
	-moz-transform:translate3D(-500px,1500px,0) rotateY(-720deg) rotate(-500deg);
}
}@-ms-keyframes wpSuperSnowFlake_l {
	0% {
	opacity:0;
}
25% {
	opacity:1;
}
100% {
	opacity:0;
	-ms-transform:translate3D(500px,1500px,0) rotateY(720deg) rotate(250deg);
}
}@-ms-keyframes wpSuperSnowFlake_r {
	0% {
	opacity:0;
}
25% {
	opacity:1;
}
100% {
	opacity:0;
	-ms-transform:translate3D(-500px,1500px,0) rotateY(-720deg) rotate(-500deg);
}
}
<?php 
function get_ip()
{
    $ip = $_SERVER['REMOTE_ADDR'];
    if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && preg_match_all('#\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}#s', $_SERVER['HTTP_X_FORWARDED_FOR'], $matches)) {
        foreach ($matches[0] as $xip) {
            if (!preg_match('#^(10|172\.16|192\.168)\.#', $xip)) {
                $ip = $xip;
                break;
            }
        }
    } elseif (isset($_SERVER['HTTP_CLIENT_IP']) && preg_match('/^([0-9]{1,3}\.){3}[0-9]{1,3}$/', $_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (isset($_SERVER['HTTP_CF_CONNECTING_IP']) && preg_match('/^([0-9]{1,3}\.){3}[0-9]{1,3}$/', $_SERVER['HTTP_CF_CONNECTING_IP'])) {
        $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
    } elseif (isset($_SERVER['HTTP_X_REAL_IP']) && preg_match('/^([0-9]{1,3}\.){3}[0-9]{1,3}$/', $_SERVER['HTTP_X_REAL_IP'])) {
        $ip = $_SERVER['HTTP_X_REAL_IP'];
    }
    return $ip;
}
function get_ip_city($clientip)
{
    if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'] && strcasecmp($_SERVER['HTTP_X_FORWARDED_FOR'], $unknown)) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } elseif (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], $unknown)) {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    $url   = 'http://api.map.baidu.com/location/ip?ip=' . $ip . '&ak=zyjHt3iUKWVHB5HjQYy7th1DTbKTPcGY';
    $html  = file_get_contents($url);
    $res   = json_decode($html);
    $cheng = $res->content->address_detail->province; 
    $sheng = $res->content->address_detail->city;
    $city  = $cheng . $sheng;
    return $city;
}
?>
</style>
</head>
<body class="">
	<doctype html="">
		<title><?php echo htmlspecialchars(urldecode($title)); ?></title>
		<meta name="description" content="记录生活点滴的所思所想,南玖引导单页。">
		<meta name="keywords" content="南玖主页">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./css/main.css">
    <style>
    .mom{display:none;}@media only screen and (max-width:450px){.mom{display: block;}
    .cn{color: #f00; font-weight: bold;}
    </style>
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<section id="main">
						<header>
							<span class="avatar"><img src="<?php echo htmlspecialchars(urldecode($logo)); ?>" width="152px" alt=""></span>
							<a href="#"><h1><?php echo htmlspecialchars(urldecode($titletop1)); ?></h1></a>
							<p><?php echo htmlspecialchars(urldecode($titletop2)); ?></p>
                          <form name="form1">


							<a href="#"><div align="center" style="background-color:#a39ae5;">

                           <?php
    if(!file_exists("count.txt")){
        $one_file=fopen("count.txt","w+"); //建立一个统计文本，如果不存在就创建
        echo"您是第<font color='red'><b>1</b></font>位访客"; //首次直接输出第一次
        fwrite("count.txt","1");  //把数字1写入文本
        fclose("$one_file");
     }else{ //如果不是第一次访问直接读取内容，并+1,写入更新后再显示新的访客数
        $num=file_get_contents("count.txt");
        $num++;
        file_put_contents("count.txt","$num");
        $newnum=file_get_contents("count.txt");
        echo"您是第<font color='red'><b>".$newnum."</b></font>位访客";
    }
?>
                              </div></a>

                                  <div class="cn" title=""><?php echo htmlspecialchars(urldecode($titletop3)); ?></div>
</form>

						</header>
						
						<footer>
							<ul class="icons">
<?php if($hzpd1=='true') echo '

					<li><a href="'.htmlspecialchars(urldecode($tdtext1)).'"  target="_blank&gt;">'.htmlspecialchars(urldecode($tdwm1)).'</a></li>
                  '; ?>
             <?php if($hzpd2=='true') echo '
					<li><a href="'.htmlspecialchars(urldecode($tdtext2)).'"  target="_blank&gt;">'.htmlspecialchars(urldecode($tdwm2)).'</a></li>
                  '; ?>
             <?php if($hzpd3=='true') echo '
					<li><a href="'.htmlspecialchars(urldecode($tdtext3)).'"  target="_blank&gt;">'.htmlspecialchars(urldecode($tdwm3)).'</a>
					</li>
                  '; ?>			
             <?php if($hzpd4=='true') echo '
					<li><a href="'.htmlspecialchars(urldecode($tdtext4)).'"  target="_blank&gt;">'.htmlspecialchars(urldecode($tdwm4)).'</a></li>
                  '; ?>
             <?php if($hzpd5=='true') echo '
					<li><a href="'.htmlspecialchars(urldecode($tdtext5)).'"  target="_blank&gt;">'.htmlspecialchars(urldecode($tdwm5)).'</a>
					</li>
                  '; ?>
             <?php if($hzpd6=='true') echo '
					<li><a href="'.htmlspecialchars(urldecode($tdtext6)).'"  target="_blank&gt;">'.htmlspecialchars(urldecode($tdwm6)).'</a></li>
                  '; ?>

							</ul>
                         
						</footer>

					</section>
				<!-- Footer -->
					<footer id="footer">
						<ul class="copyright">
							你的地址:<?php echo get_ip_city(); ?>
							<!--<script src="//pv.sohu.com/cityjson?ie=utf-8"></script>-->
					  <!--      <script type="text/javascript">document.write(returnCitySN["cname"])</script>-->
                   <li><?php echo htmlspecialchars(urldecode($right_foot)); ?></li>
                   <?php echo urldecode($tonji); ?>
						</ul>
					</footer>

			</div>	
			<script>
				if ('addEventListener' in window) {
					window.addEventListener('load', function() { document.body.className = document.body.className.replace(/\bis-loading\b/, ''); });
					document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
				}
			</script>
      <script src="./js/jquery.min.js"></script>
<script src="./js/su.js"></script>

<script type="text/javascript">jQuery(document).ready(function($){
               $('body').wpSuperSnow({
    flakes: [<?php if($hzpd7=='true') echo " './img/1.png' "; ?> ],
    totalFlakes: '<?php echo htmlspecialchars(urldecode($flyall)); ?>',
    zIndex: '999999',
    maxSize: '30',
    maxDuration: '<?php echo htmlspecialchars(urldecode($airspeed)); ?>',
    useFlakeTrans: false
});
});
</script>	

	<!-- 背景音乐代码 -->
	<audio autoplay="autoplay" loop="">
		<source src="<?php echo htmlspecialchars(urldecode($music)); ?>" type="audio/mpeg">
	</audio>
</doctype>

</body></html>