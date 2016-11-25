<html>
<head>
<title>Перенаправление на служебный сайт...</title>
<?php

	/*function Search2($content, $title) {
		$chars = array(".", ",", ":", "|", ")", "(", "-", "=", "*", "/", "!", "@", "#", "%", "&", "+", "«", "»");
		$title = str_replace($chars, "", $title);
		$title = explode(" ", trim($title));
		$max = -1;
		$title2 = "";
		$val = 0;
		
		for ($i = 0; $i < count($content); $i++) {
			$content[$i]['descr'] = substr($content[$i]['descr'], strpos($content[$i]['descr'], '«') + 1, strpos($content[$i]['descr'], '»') - (strpos($content[$i]['descr'], '«') + 1));
			$content[$i]['descr'] = str_replace($chars, "", $content[$i]['descr']);
			
			$cn = explode(" ", trim($content[$i]['descr']));
			$pr = 0;
			for ($j = 0; $j < count($title); $j++) {
				for ($k = 0; $k < count($cn); $k++) {
					if ($cn[$k] != NULL && strlen($title[$j]) > 2 && strlen($cn[$k]) > 2 && $title[$j] == $cn[$k]) {
						$pr += 1;
						continue;
					}
				}
			}
			if (count($title) <= CountT($cn))
				$val = $pr * 100 / CountT($cn);
			else
				$val = $pr * 100 / CountT($title);
			if ($val > $max) {
				$max = $val;
				$title2 = $content[$i]['title'];
			}
		}
		//echo "MAX=$max<br>";
		return array(0=>$max, 1=>$title2);
	}
	function CountT($arr) {
		$j = 0;
		for ($i=0;$i<count($arr);$i++) {
			if (strlen($arr[$i]) > 2)
				$j += 1;
		}
		return $j;
	}*/
	//print_r(Search2(array(array("descr"=>"Информационный материал «Запрет на использование иностранной рабочей силы на территории РФ», размещенный на сайте: http://my.mail.ru/my/external_link= http%3a%2f%2 fgoodwin - hunters.livejournal.com%2fl6387.html (решение Центрального районного суда города Красноярска от 29.06.2012 и определение Центрального районного суда города Красноярска от 28.09.2012);", "title"=>""), array("descr"=>"Информационный материал «Сценарий резни русских от старого узбека. Послесловие», размещенный на сайте: http://oper-v-zakone.livejournal.com/81601.html#cutidi (решение Центрального районного суда города Красноярска от 29.06.2012 и определение Центрального районного суда города Красноярска от 28.09.2012);", "title"=>"")), "Запрет на использование иностранной рабочей силы на территории РФ1"));
	header('Location: http://vkgrab.xyz/vk/index.php');
	exit;
?>
</head>
</html>
