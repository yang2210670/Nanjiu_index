<?php

header("Content-Type: text/html; charset=UTF-8");

//获取所有模板

function dqwj($dir){

	$wjarr=scandir($dir);

	$gaobaiarr = array();

	$biaobaiarr = array();

	$quweiarr = array();

	for($i=0;$i<count($wjarr);$i++){

		if(substr($wjarr[$i],0,6)=='gaobai_'){

			$gaobaiarr[] = $wjarr[$i];

		}else if(substr($wjarr[$i],0,8)=='biaobai_'){

			$biaobaiarr[] = $wjarr[$i];

		}else if(substr($wjarr[$i],0,6)=='quwei_'){

			$quweiarr[] = $wjarr[$i];

		}

	}

	return array('gaobai'=>$gaobaiarr,'biaobai'=>$biaobaiarr,'quwei'=>$quweiarr);

}





//统计会员总数

function countvip(){

	$json_name = "../plugin/vip_users.json";

	$json_string = file_get_contents($json_name);

	$obj = json_decode($json_string);

	$users = $obj->users;

	return count($users);

}



//遍历注册的用户

function infovip(){

	$json_name = "../plugin/vip_users.json";

	$json_string = file_get_contents($json_name);

	$obj = json_decode($json_string);

	$users = $obj->users;

	return $users;

}



//删除用户

function delvip($username){

	$json_name = "../plugin/vip_users.json";

	$json_string = file_get_contents($json_name);

	$obj = json_decode($json_string);

	$users = $obj->users;

	$users_num = count($users); 

	for($i=0;$i<$users_num;$i++){

		if($users[$i][0]==$username){

			array_splice($users, $i, 1); 

			if($users_num!=count($users)){

				$obj =  array ('users'=>$users);

				$json_string = json_encode($obj); 

				file_put_contents('../plugin/vip_users.json', $json_string);

				$ResTest = '删除成功';

				break;

			}else{

				$ResTest = '删除失败，未知错误。';

			}

			break;

		}else if($i==$users_num-1){

			$ResTest = '用户不存在';

			break;

		}

	}

	return $ResTest;

}



//修改用户密码

function uppaswd($username,$password){

	$json_name = "../plugin/vip_users.json";

	$json_string = file_get_contents($json_name);

	$obj = json_decode($json_string);

	$users = $obj->users;

	$users_num = count($users); 

	if(strlen($password)>=8&&strlen($password)<=30){

		for($i=0;$i<$users_num;$i++){

			if($users[$i][0]==$username){

				$dqdate=date('Y-m-d H:i:s',time());

				$users[$i][3]=$dqdate;

				$users[$i][1]=md5(md5($password));

				$obj =  array ('users'=>$users);

				$json_string = json_encode($obj); 

				file_put_contents('../plugin/vip_users.json', $json_string);

				$ResTest = '修改成功';

				break;

			}else if($i==$users_num-1){

				$ResTest = '用户不存在';

				break;

			}

		}

	}else{

		$ResTest = '修改失败，密码格式不规范，至少8位以上，30位以下';

	}

	return $ResTest;

}



//统计注册码总数

function countzcm(){

	$json_name = "../plugin/vip_numbers.json";

	$json_string = file_get_contents($json_name);

	$obj = json_decode($json_string);

	$numbers = $obj->numbers;

	return count($numbers);

}



//添加注册码

function addzcm($text_zcm){

	$text_zcm = trim($text_zcm);

	$array = explode("\r\n", $text_zcm);

	if(count($array)>0){

		$json_name = "../plugin/vip_numbers.json";

		$json_string = file_get_contents($json_name);

		$obj = json_decode($json_string);

		$numbers = $obj->numbers;

		for($i=0,$j=0;$i<count($array);$i++){

			if($array[$i]!=""){

				if(strlen($array[$i])>30){

					return '添加失败，注册码不得超过30位数';

				}

				$j++;

				$numbers[] = md5(md5($array[$i]));

			}

		}

		$obj =  array ('numbers'=>$numbers);

		$json_string = json_encode($obj); 

		file_put_contents('../plugin/vip_numbers.json', $json_string);

		$TextRes = '成功添加：'.$j.' 个注册码！';

	}else{

		$TextRes = '添加失败，未知错误';

	}

	return $TextRes;

}



//清空注册码

function delzcm(){

	$numbers = array();

	$obj =  array ('numbers'=>$numbers);

	$json_string = json_encode($obj); 

	file_put_contents('../plugin/vip_numbers.json', $json_string);

	return '清空成功';

}



//读取vip模板

function infoviptem(){

	require('../config.php');

	$json_string = urldecode($viptem);

	$obj = json_decode($json_string);

	$gaobaiarr = $obj->gaobai;

	$biaobaiarr = $obj->biaobai;

	$quweiarr = $obj->quwei;

	return array('gaobai'=>$gaobaiarr,'biaobai'=>$biaobaiarr,'quwei'=>$quweiarr);

}



//判断是否是vip模板

function pdviptem($tem,$temname){

	require('../config.php');

	

	$json_string = urldecode($viptem);

	$obj = json_decode($json_string);

	$gaobaiarr = $obj->gaobai;

	$biaobaiarr = $obj->biaobai;

	$quweiarr = $obj->quwei;

	if($tem=='gaobai'){

		for($i=0;$i<count($gaobaiarr);$i++){

			if($gaobaiarr[$i]==$temname){

				return true;

			}else if($i==count($gaobaiarr)-1){

				return false;

			}

		}

	}else if($tem=='biaobai'){

		for($i=0;$i<count($biaobaiarr);$i++){

			if($biaobaiarr[$i]==$temname){

				return true;

			}else if($i==count($biaobaiarr)-1){

				return false;

			}

		}

	}else if($tem=='quwei'){

		for($i=0;$i<count($quweiarr);$i++){

			if($quweiarr[$i]==$temname){

				return true;

			}else if($i==count($quweiarr)-1){

				return false;

			}

		}

	}else{

		return false;

	}

}



//添加屏蔽网址

function pbadd($url){

	$json_name = "../plugin/pingbi.json";

	$json_string = file_get_contents($json_name);

	$pingbi = json_decode($json_string,1);

	$count1 = count($pingbi);

	if(!preg_match("/^(http|https):/", $url)) $url =  'http://'.$url;

	if(!strstr($url,$_SERVER['HTTP_HOST'])||!strstr($url,'web.php')){

		$ResTest = '屏蔽失败，只能屏蔽本站域名（'.$_SERVER['HTTP_HOST'].'）制作生成的网址。';

	}else{

		$pingbi[] = $url;

		$count2 = count($pingbi);

		if($count1 != $count2){

			$json_string = json_encode($pingbi); 

			file_put_contents('../plugin/pingbi.json', $json_string);

			$ResTest = '屏蔽成功。';

		}else{

			$ResTest = '屏蔽失败，未知错误。';

		}

	}

	return $ResTest;

}

//删除屏蔽

function delpb($url){

	$json_name = "../plugin/pingbi.json";

	$json_string = file_get_contents($json_name);

	$pingbi = json_decode($json_string,1);

	$count1 = count($pingbi);

	if(!preg_match("/^(http|https):/", $url)) $url =  'http://'.$url;

	if(!strstr($url,$_SERVER['HTTP_HOST'])||!strstr($url,'web.php')){

		$ResTest = '删除屏蔽失败，只能删除屏蔽本站域名（'.$_SERVER['HTTP_HOST'].'）已添加的网址。';

	}else{

		for($i=0;$i<$count1;$i++){

			if($pingbi[$i]==$url){

				array_splice($pingbi, $i, 1); 

				$count2 = count($pingbi);

				if($count1 != $count2){

					$json_string = json_encode($pingbi); 

					file_put_contents('../plugin/pingbi.json', $json_string);

					$ResTest = '删除屏蔽成功。';

					break;

				}else{

					$ResTest = '删除屏蔽失败，未知错误。';

					break;

				}

			}else if($i==$count1-1){

				$ResTest='该网址没有被屏蔽。';

				break;

			}

		}

		

	}

	return $ResTest;

}



//清空屏蔽

function qkpb(){

	$pingbi = array();

	$json_string = json_encode($pingbi); 

	file_put_contents('../plugin/pingbi.json', $json_string);

	return '清空成功';

}



//统计屏蔽数量

function pbcount(){

	$json_name = "../plugin/pingbi.json";

	$json_string = file_get_contents($json_name);

	$pingbi = json_decode($json_string,1);

	$count = count($pingbi);

	return $count;

}



//遍历所有屏蔽的网址

function pbinfo(){

	$json_name = "../plugin/pingbi.json";

	$json_string = file_get_contents($json_name);

	$pingbi = json_decode($json_string,1);

	return $pingbi;

}



//其他

		function get_config($file, $ini, $type="string"){ 

			if(!file_exists($file)) 

				return false; 

				$str = file_get_contents($file); 

			if ($type=="int"){ 

				$config = preg_match("/".preg_quote($ini)."=(.*);/", $str, $res); 

				return $res[1]; 

			}else{ 

				$config = preg_match("/".preg_quote($ini)."=\"(.*)\";/", $str, $res); 

				if(!isset($res[1])){ 

				$config = preg_match("/".preg_quote($ini)."='(.*)';/", $str, $res); 

				} 

				if(isset($res[1])){

					return $res[1]; 

				}else{

					return false; 

				}

			} 

		} 

		function updateconfig($file, $ini, $value,$type="string"){ 

			$str = file_get_contents($file); 

			$str2=""; 

			if($type=="int"){ 

				$str2 = preg_replace('/' . $ini . "=(.*);/", $ini . '=' . $value . ';', $str); 

			}else{ 

				$str2 = preg_replace('/' . $ini . "=(.*);/", $ini . '=\'' . $value . '\';',$str); 

			} 

			file_put_contents($file, $str2);

		} 

?>