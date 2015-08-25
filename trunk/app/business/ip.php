<?php
class IpBusiness extends CommonBusiness{
	public static function calcIp($ip){
		$ipList = IpModel::getList();
		$ipArray = explode('.', $ip);
		$ret = array();
		foreach ($ipList as $item){
			if ($item['s_01']>$ipArray[0] || $item['s_02']>$ipArray[1] || $item['s_03']>$ipArray[2] || $item['s_04']>$ipArray[3] ||
				$item['e_01']<$ipArray[0] || $item['e_02']<$ipArray[1] || $item['e_03']<$ipArray[2] || $item['s_04']>$ipArray[3] 
			) continue;
			$ret = $item;
		}
		return $ret;
	}
}