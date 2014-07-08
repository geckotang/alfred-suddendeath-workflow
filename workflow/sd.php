<?php
#＿人人人人人人人＿
#＞ 突然のAlfred ＜
#￣Y^Y^Y^Y^Y^Y^Y^￣
require_once('workflows.php');
$wf = new Workflows();
$strByte = strlen(mb_convert_encoding($query, "SJIS", "UTF-8"));
$strLen = floor($strByte/2);

#
# 1行目の文字
#
if ($strLen >= 10) {
	$strLen = $strLen-1;
}
$firstLine = str_repeat("人", $strLen+2);

#
# 3行目の文字
#
if ($strLen >= 20) {
	$strLen = $strLen-3;
} elseif ($strLen >= 10) {
	$strLen = $strLen-2;
}
$lastLine = str_repeat("^Y", $strLen);
if ($strByte == 1) {
	#半角1文字
	$lastLine = $lastLine."^Y";
} elseif ($strByte == 2) {
	#全角1文字
	$lastLine = $lastLine."^";
}

#
# AA作成
#
$word = array(
	"＿".$firstLine."＿",
	"＞　".$query."　＜",
	"￣Y".$lastLine."￣"
);
$wf_url = implode("\n", $word);
$wf_title = "「".$query."」でAAを作る";
$wf_description = "Enterを押すと、クリップボードに入ります";
$wf_icon = 'icon.png';

#
# 出力
#
$wf->result(
	time(),
	$wf_url,
	$wf_title,
	$wf_description,
	$wf_icon
);

echo $wf->toxml();
?>
