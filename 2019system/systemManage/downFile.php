<?php

if(isset($_GET["f"]))//是否存在"id"的参数
{
    $down = $_GET['f'];//存在
    $down=$down.'.docx';
    $downFilePath ='../files/'.$down;
}else{
    $down='downloadFile.docx';
}


downloadFile($downFilePath,$down);

//$filePath是服务器的文件地址
//$saveAsFileName是用户指定的下载后的文件名
function downloadFile($filePath,$saveAsFileName){

    // 清空缓冲区并关闭输出缓冲
    ob_end_clean();

    //r: 以只读方式打开，b: 强制使用二进制模式
    $fileHandle=fopen($filePath,"rb");
    if($fileHandle===false){
        echo "找不到该文件: $filePath\n";
        exit;
    }

    Header("Content-type: application/octet-stream");
    Header("Content-Transfer-Encoding: binary");
    Header("Accept-Ranges: bytes");
    Header("Content-Length: ".filesize($filePath));
    Header("Content-Disposition: attachment; filename=\"$saveAsFileName\"");

    while(!feof($fileHandle)) {

        //从文件指针 handle 读取最多 length 个字节
        echo fread($fileHandle, 32768);
    }
    fclose($fileHandle);
}