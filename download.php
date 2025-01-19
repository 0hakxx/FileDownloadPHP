<?php
// index.php로부터 GET 방식으로 전달된 filename 파라미터 값을 변수에 저장
$org_filename = $_GET["org_filename"];
$real_filename = $_GET["real_filename"];
// 실제 파일이 저장된 서버의 물리적 경로 설정 (upload 폴더 내 파일)
$filepath = "upload/{$real_filename}";
// 파일 다운로드를 위한 헤더 설정 - 모든 종류의 파일을 바이너리 데이터로 전송
header("Content-Type: application/octet-stream");
// 다운로드 시 파일명을 지정하고 브라우저가 첨부파일로 인식하도록 헤더 설정
header("Content-Disposition: attachment; filename={$org_filename}");
// 파일의 내용을 읽어서 출력 스트림으로 전송
readfile($filepath);
?>
