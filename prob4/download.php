<?
	header("Content-Type: text/html; charset=UTF-8");

	$filename = $_POST["filename"];
	
	if ($filename == null) {
		print("<script>alert(\"값이 입력되지 않았습니다.\");history.back(-1);</script>");
		exit;
	}

	$filename = base64_decode($filename);

	$filepath = "upload/{$filename}";
	$fn = explode("/", $filename);
		
	if(is_file($filepath)) {	
		header("Content-Type: application/octet-stream");
		header("Content-Disposition: attachment; filename=\"{$fn[1]}\"");
		header("Content-Transfer-Encoding: binary");
		readfile($filepath);
	} else {
		print("<script>alert(\"해당 파일이 존재 하지 않습니다.\");history.back(-1);</script>");
		exit;
	}

?>

