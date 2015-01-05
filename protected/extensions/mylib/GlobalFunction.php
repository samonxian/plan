<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Function
 *
 * @author Administrator
 */
define('DATE', date("Y-m-d"));
define('DATETIME', date("Y-m-d H:i:s"));

class GlobalFunction {

//put your code here
    public static $date = DATE;
    public static $datetime = DATETIME;

    /**
     * 中转赋值
     */
    public static $temp = '';

    /**
     * 	中文转拼音
     * @param String $_string 目标字符串
     * @param String ￥——code 编码设置
     */
    public static function cn2pinyin($_string, $_code='utf-8') {
        $_datakey = "a|ai|an|ang|ao|ba|bai|ban|bang|bao|bei|ben|beng|bi|bian|biao|bie|bin|bing|bo|bu|ca|cai|can|cang|cao|ce|ceng|cha" .
                "|chai|chan|chang|chao|che|chen|cheng|chi|chong|chou|chu|chuai|chuan|chuang|chui|chun|chuo|ci|cong|cou|cu|" .
                "cuan|cui|cun|cuo|da|dai|dan|dang|dao|de|deng|di|dian|diao|die|ding|diu|dong|dou|du|duan|dui|dun|duo|e|en|er" .
                "|fa|fan|fang|fei|fen|feng|fo|fou|fu|ga|gai|gan|gang|gao|ge|gei|gen|geng|gong|gou|gu|gua|guai|guan|guang|gui" .
                "|gun|guo|ha|hai|han|hang|hao|he|hei|hen|heng|hong|hou|hu|hua|huai|huan|huang|hui|hun|huo|ji|jia|jian|jiang" .
                "|jiao|jie|jin|jing|jiong|jiu|ju|juan|jue|jun|ka|kai|kan|kang|kao|ke|ken|keng|kong|kou|ku|kua|kuai|kuan|kuang" .
                "|kui|kun|kuo|la|lai|lan|lang|lao|le|lei|leng|li|lia|lian|liang|liao|lie|lin|ling|liu|long|lou|lu|lv|luan|lue" .
                "|lun|luo|ma|mai|man|mang|mao|me|mei|men|meng|mi|mian|miao|mie|min|ming|miu|mo|mou|mu|na|nai|nan|nang|nao|ne" .
                "|nei|nen|neng|ni|nian|niang|niao|nie|nin|ning|niu|nong|nu|nv|nuan|nue|nuo|o|ou|pa|pai|pan|pang|pao|pei|pen" .
                "|peng|pi|pian|piao|pie|pin|ping|po|pu|qi|qia|qian|qiang|qiao|qie|qin|qing|qiong|qiu|qu|quan|que|qun|ran|rang" .
                "|rao|re|ren|reng|ri|rong|rou|ru|ruan|rui|run|ruo|sa|sai|san|sang|sao|se|sen|seng|sha|shai|shan|shang|shao|" .
                "she|shen|sheng|shi|shou|shu|shua|shuai|shuan|shuang|shui|shun|shuo|si|song|sou|su|suan|sui|sun|suo|ta|tai|" .
                "tan|tang|tao|te|teng|ti|tian|tiao|tie|ting|tong|tou|tu|tuan|tui|tun|tuo|wa|wai|wan|wang|wei|wen|weng|wo|wu" .
                "|xi|xia|xian|xiang|xiao|xie|xin|xing|xiong|xiu|xu|xuan|xue|xun|ya|yan|yang|yao|ye|yi|yin|ying|yo|yong|you" .
                "|yu|yuan|yue|yun|za|zai|zan|zang|zao|ze|zei|zen|zeng|zha|zhai|zhan|zhang|zhao|zhe|zhen|zheng|zhi|zhong|" .
                "zhou|zhu|zhua|zhuai|zhuan|zhuang|zhui|zhun|zhuo|zi|zong|zou|zu|zuan|zui|zun|zuo";
        $_datavalue = "-20319|-20317|-20304|-20295|-20292|-20283|-20265|-20257|-20242|-20230|-20051|-20036|-20032|-20026|-20002|-19990" .
                "|-19986|-19982|-19976|-19805|-19784|-19775|-19774|-19763|-19756|-19751|-19746|-19741|-19739|-19728|-19725" .
                "|-19715|-19540|-19531|-19525|-19515|-19500|-19484|-19479|-19467|-19289|-19288|-19281|-19275|-19270|-19263" .
                "|-19261|-19249|-19243|-19242|-19238|-19235|-19227|-19224|-19218|-19212|-19038|-19023|-19018|-19006|-19003" .
                "|-18996|-18977|-18961|-18952|-18783|-18774|-18773|-18763|-18756|-18741|-18735|-18731|-18722|-18710|-18697" .
                "|-18696|-18526|-18518|-18501|-18490|-18478|-18463|-18448|-18447|-18446|-18239|-18237|-18231|-18220|-18211" .
                "|-18201|-18184|-18183|-18181|-18012|-17997|-17988|-17970|-17964|-17961|-17950|-17947|-17931|-17928|-17922" .
                "|-17759|-17752|-17733|-17730|-17721|-17703|-17701|-17697|-17692|-17683|-17676|-17496|-17487|-17482|-17468" .
                "|-17454|-17433|-17427|-17417|-17202|-17185|-16983|-16970|-16942|-16915|-16733|-16708|-16706|-16689|-16664" .
                "|-16657|-16647|-16474|-16470|-16465|-16459|-16452|-16448|-16433|-16429|-16427|-16423|-16419|-16412|-16407" .
                "|-16403|-16401|-16393|-16220|-16216|-16212|-16205|-16202|-16187|-16180|-16171|-16169|-16158|-16155|-15959" .
                "|-15958|-15944|-15933|-15920|-15915|-15903|-15889|-15878|-15707|-15701|-15681|-15667|-15661|-15659|-15652" .
                "|-15640|-15631|-15625|-15454|-15448|-15436|-15435|-15419|-15416|-15408|-15394|-15385|-15377|-15375|-15369" .
                "|-15363|-15362|-15183|-15180|-15165|-15158|-15153|-15150|-15149|-15144|-15143|-15141|-15140|-15139|-15128" .
                "|-15121|-15119|-15117|-15110|-15109|-14941|-14937|-14933|-14930|-14929|-14928|-14926|-14922|-14921|-14914" .
                "|-14908|-14902|-14894|-14889|-14882|-14873|-14871|-14857|-14678|-14674|-14670|-14668|-14663|-14654|-14645" .
                "|-14630|-14594|-14429|-14407|-14399|-14384|-14379|-14368|-14355|-14353|-14345|-14170|-14159|-14151|-14149" .
                "|-14145|-14140|-14137|-14135|-14125|-14123|-14122|-14112|-14109|-14099|-14097|-14094|-14092|-14090|-14087" .
                "|-14083|-13917|-13914|-13910|-13907|-13906|-13905|-13896|-13894|-13878|-13870|-13859|-13847|-13831|-13658" .
                "|-13611|-13601|-13406|-13404|-13400|-13398|-13395|-13391|-13387|-13383|-13367|-13359|-13356|-13343|-13340" .
                "|-13329|-13326|-13318|-13147|-13138|-13120|-13107|-13096|-13095|-13091|-13076|-13068|-13063|-13060|-12888" .
                "|-12875|-12871|-12860|-12858|-12852|-12849|-12838|-12831|-12829|-12812|-12802|-12607|-12597|-12594|-12585" .
                "|-12556|-12359|-12346|-12320|-12300|-12120|-12099|-12089|-12074|-12067|-12058|-12039|-11867|-11861|-11847" .
                "|-11831|-11798|-11781|-11604|-11589|-11536|-11358|-11340|-11339|-11324|-11303|-11097|-11077|-11067|-11055" .
                "|-11052|-11045|-11041|-11038|-11024|-11020|-11019|-11018|-11014|-10838|-10832|-10815|-10800|-10790|-10780" .
                "|-10764|-10587|-10544|-10533|-10519|-10331|-10329|-10328|-10322|-10315|-10309|-10307|-10296|-10281|-10274" .
                "|-10270|-10262|-10260|-10256|-10254";
        $_tdatakey = explode('|', $_datakey);
        $_tdatavalue = explode('|', $_datavalue);
        // $_data = (php_version >= '5.0') ? array_combine($_tdatakey, $_tdatavalue) : _array_combine($_tdatakey, $_tdatavalue);
        $_data = array_combine($_tdatakey, $_tdatavalue);
        arsort($_data);
        reset($_data);
        if ($_code != 'gb2312')
            $_string = GlobalFunction::_u2_utf8_gb($_string);
        $_res = '';
        for ($i = 0; $i < strlen($_string); $i++) {
            $_p = ord(substr($_string, $i, 1));
            if ($_p > 160) {
                $_q = ord(substr($_string, ++$i, 1));
                $_p = $_p * 256 + $_q - 65536;
            }
            $_res .= GlobalFunction::_pinyin($_p, $_data);
        }
        return preg_replace("/[^a-z0-9]*/", '', $_res);
    }
    /**
     * 上面cn2pinyin使用的
     */
    public static function _pinyin($_num, $_data) {
        if ($_num > 0 && $_num < 160)
            return chr($_num);
        elseif ($_num < -20319 || $_num > -10247)
            return '';
        else {
            foreach ($_data as $k => $v) {
                if ($v <= $_num)
                    break;
            }
            return $k;
        }
    }
    /**
     * 上面cn2pinyin使用的
     */
    public static function _u2_utf8_gb($_c) {
        $_string = '';
        if ($_c < 0x80)
            $_string .= $_c;
        elseif ($_c < 0x800) {
            $_string .= chr(0xc0 | $_c >> 6);
            $_string .= chr(0x80 | $_c & 0x3f);
        } elseif ($_c < 0x10000) {
            $_string .= chr(0xe0 | $_c >> 12);
            $_string .= chr(0x80 | $_c >> 6 & 0x3f);
            $_string .= chr(0x80 | $_c & 0x3f);
        } elseif ($_c < 0x200000) {
            $_string .= chr(0xf0 | $_c >> 18);
            $_string .= chr(0x80 | $_c >> 12 & 0x3f);
            $_string .= chr(0x80 | $_c >> 6 & 0x3f);
            $_string .= chr(0x80 | $_c & 0x3f);
        }
        $return = iconv('utf-8', 'gb2312//ignore', $_string);
        if ($return == '')
            $return = 0;
        return $return;
    }
    /**
     * 中文字符截断函数
     * @param String $str 目标字符串
     * @param Int $len 保留的中文字数，两个英文为一个中文
     * @param String $dot 被截断后替换的字符串
     */
    public static function substrcn($str, $len, $dot = '...') {
        $patten = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/"; //正则表达式条件
        preg_match_all($patten, $str, $regs);
        $v = 0;
        $s = '';
        for ($i = 0; $i < count($regs[0]); $i++) {
            (ord($regs[0][$i]) > 129) ? $v += 2 : $v++;
            $s .= $regs[0][$i];
            if ($v >= $len * 2) {
                $s .= $dot;
                break;
            }
        }
        return $s;
    }
    /**
     * 随机字符串
     * @param String $length 长度设置
     * @param Bloolean $max 最大限制
     */
    function random_string($length, $max=FALSE) {
        if (is_int($max) && $max > $length) {
            $length = mt_rand($length, $max);
        }
        $output = '';

        for ($i = 0; $i < $length; $i++) {
            $which = mt_rand(0, 2);

            if ($which === 0) {
                $output .= mt_rand(0, 9);
            } elseif ($which === 1) {
                $output .= chr(mt_rand(65, 90));
            } else {
                $output .= chr(mt_rand(97, 122));
            }
        }
        return $output;
    }
    public static function setCookie($name,$value,$expire=259200){
        $cookie = new CHttpCookie($name,$value);
        $cookie->expire = time() + $expire;  //默认为30天
        Yii::app()->request->cookies['$name']=$cookie;
    }
    public static function getCookie($name){
        $cookie = Yii::app()->request->getCookies();
        if(!isset($cookie[$name]->value)) {
            return "";
        }else {
            return $cookie[$name]->value;
        }
    }
    public static function delCookie($name){
        $cookie = Yii::app()->request->getCookies();
        unset($cookie[$name]);
    }
    /**
     * 获取全部$_GET请求并循环输出符合网址要求
     */
	
    public static function getAllGetRequest(){
        $get = "";
        $i = 0;
        foreach($_GET as $key=>$g){
            if($i==0) $get = "{$key}={$g}";
            else $get .= "&{$key}={$g}";
            $i++;
        }
        return $get;
    }
    /**
     * 获取时间格式字符串（2014-05-03 22:00:00）中的“时”
     * @param <string> $dateStirng 
     * @return <string> “时”     
	 * */
	
	public static function getHourByDate($dateStirng){
		$hour = '';
		$time = explode(' ',$dateStirng);
		$time2 = explode(':',$time[1]);
		$hour = $time2[0];
		// var_dump($time2);
		return $hour;
	}
	
	
	

}
?>
