<?
	header("Content-Type: text/html; charset=UTF-8");

	$path = $_POST["path"];
	$filename = $_POST["filename"];
	
	if ($filename == null || $path == null) {
		print("<script>alert(\"값이 입력되지 않았습니다.\");history.back(-1);</script>");
		exit;
	}

	$filename = str_replace("\\", "/", $filename);

	if(strpos($filename, "/") !== false) {
		print("<script>alert(\"허용되지 않은 문자가 포함되어있습니다.\");history.back(-1);</script>");
		exit;
	}

	if(strpos($path, "upload/images") !== 0) {
		print("<script>alert(\"경로가 잘못되었습니다.\");history.back(-1);</script>");
		exit;
	}

	$filepath = "{$path}/{$filename}";
		
	if(is_file($filepath)) {	
		header("Content-Type: application/octet-stream");
		header("Content-Disposition: attachment; filename=\"{$filename}\"");
		header("Content-Transfer-Encoding: binary");
		readfile($filepath);
	} else {
		print("<script>alert(\"해당 파일이 존재 하지 않습니다.\");history.back(-1);</script>");
		exit;
	}

?>

