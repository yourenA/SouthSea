﻿<?php 
//$fileInfo=$_FILES['myFile'];
function uploadFile($fileInfo,$uploadPath = 'uploads',$flag=true,$allowExt=array('jpeg','jpg','gif','png'),$maxSize = 2097152,$cutNum=6){
	// 判断错误号
	if ($fileInfo ['error'] > 0) {
		switch ($fileInfo ['error']) {
			case 1 :
				$mes = '上传文件超过了PHP配置文件中upload_max_filesize选项的值';
				break;
			case 2 :
				$mes = '超过了表单MAX_FILE_SIZE限制的大小';
				break;
			case 3 :
				$mes = '文件部分被上传';
				break;
			case 4 :
				$mes = '没有选择上传文件';
				break;
			case 6 :
				$mes = '没有找到临时目录';
				break;
			case 7 :
			case 8 :
				$mes = '系统错误';
				break;
		}
		echo ( $mes );
		return false;
	}
	$ext = pathinfo ( $fileInfo ['name'], PATHINFO_EXTENSION );

	if(!is_array($allowExt)){
		exit('系统错误');
	}
	// 检测上传文件的类型
	if (! in_array ( $ext, $allowExt )) {
		exit ( '非法文件类型' );
	}
	//$maxSize = 2097152; // 2M
	                  // 检测上传文件大小是否符合规范
	if ($fileInfo ['size'] > $maxSize) {
		exit ( '上传文件过大' );
	}
	//检测图片是否为真实的图片类型
	//$flag=true;	
	if($flag){
		if(!getimagesize($fileInfo['tmp_name'])){
			exit('不是真实图片类型');
		}
	}
	// 检测文件是否是通过HTTP POST方式上传上来
	if (! is_uploaded_file ( $fileInfo ['tmp_name'] )) {
		exit ( '文件不是通过HTTP POST方式上传上来的' );
	}
	//$uploadPath = 'uploads';
	if (! file_exists ( $uploadPath )) {
		mkdir ( $uploadPath, 0777, true );
		chmod ( $uploadPath, 0777 );
	}
	$uniName = md5 ( uniqid ( microtime ( true ), true ) ) . '.' . $ext;
	$destination_tmp =$uploadPath . '/' . $uniName ;
	$destination=substr($destination_tmp,$cutNum);
	if (! @move_uploaded_file ( $fileInfo ['tmp_name'], $destination_tmp )) {
		exit ( '文件移动失败' );
	}

	return $destination;
}





