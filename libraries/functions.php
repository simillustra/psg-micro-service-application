<?php
/*
SIMILLUSTRA  PHP CODE GENERATOR
Author: Simillustra Limited (http://simillustra.com) info@simillustra.com
COPYRIGHT 2014 ALL RIGHTS RESERVED
FILE NAME functions.php 

You must have purchased a valid license from CodeCanyon.com in order to have 
access this file.

You may only use this file according to the respective licensing terms 
you agreed to when purchasing this item.
*/
if (!defined('VALID_DIR'))
    die('You are not allowed to execute this file directly');

require_once('../vendor/autoload.php');

use \Curl\Curl;

//post
function post($var)
{
    if (isset($_POST[$var]))
        return $_POST[$var];
}

//get
function get($var)
{
    if (isset($_GET[$var]))
        return $_GET[$var];
}

//send headers
function send_to($direction)
{
    if (!headers_sent()) {
        header('Location: ' . $direction);
        exit;
    } else
        print '<script type="text/javascript">';
    print 'window.location.href="' . $direction . '";';
    print '</script>';
    print '<noscript>';
    print '<meta http-equiv="refresh" content="0;url=' . $direction . '" />';
    print '</noscript>';
}

//msgs
function success_msg($dmsg)
{
    print ('<div class="heze-notify progress-bar-success">
  <p>' . $dmsg . '</p>
  </div>
	');
}

function error_msg($dmsg)
{
    print ('<div class="heze-notify progress-bar-danger">
  <p>' . $dmsg . '</p>
  </div>
	');
}

function json_notice($success)
{
    print('<div class="alert alert-warning alert-dismissible" role="alert">
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
            <strong>Warning!</strong>' . $success . '</div>');
}

//TinyMCE editor
function HezecomEditor($txteditor)
{
    print ('
<script>
tinymce.init({
    selector: "textarea.' . $txteditor . '",
    theme: "modern",
    width: "auto",
    height: 200,
    plugins: [
         "advlist autolink link image lists charmap  preview hr anchor pagebreak spellchecker",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         "save table contextmenu directionality   paste textcolor jbimages"
   ],
   toolbar: "styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink  jbimages | print preview ", 
  
		relative_urls: false
 }); 
</script>
	');
}

//File
function delete_files($folder)
{
    if (is_file($folder))
        unlink($folder);
}

//dir
function app_dir($folder = null)
{
    $base = str_replace($folder, '', dirname(__file__));
    return str_replace('\\', '/', $base);
}

//paging
function pagination($query, $per_page = 10, $url = null, $page = 1)
{
    $page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
    $total = $query;
    $splitter = "2";
    $url1 = $url . "&page=";
    $page = ($page == 0 ? 1 : $page);
    $start = ($page - 1) * $per_page;

    $firstPage = 1;
    $prev = ($page == 1) ? 1 : $page - 1;

    $prev = $page - 1;
    $next = $page + 1;
    $lastpage = ceil($total / $per_page);
    $lpm1 = $lastpage - 1;
    $hezpaging = "";
    if ($lastpage > 1) {
        $hezpaging .= "<ul class='hezpaging'>";
        $hezpaging .= "<li class='details'>" . LANG_PAGE . " $page of $lastpage</li>";

        if ($page == 1) {
            $hezpaging .= "<li><a class='current'>" . LANG_FIRST . "</a></li>";
            $hezpaging .= "<li><a class='current'>" . LANG_PREVIOUS . "</a></li>";
        } else {
            $hezpaging .= "<li><a href='" . $url1 . "$firstPage'>" . LANG_FIRST .
                "</a></li>";
            $hezpaging .= "<li><a href='" . $url1 . "$prev'>" . LANG_PREVIOUS . "</a></li>";
        }

        if ($lastpage < 7 + ($splitter * 2)) {
            for ($counter = 1; $counter <= $lastpage; $counter++) {
                if ($counter == $page)
                    $hezpaging .= "<li><a class='current'>$counter</a></li>";
                else
                    $hezpaging .= "<li><a href='" . $url1 . "$counter'>$counter</a></li>";
            }
        } elseif ($lastpage > 5 + ($splitter * 2)) {
            if ($page < 1 + ($splitter * 2)) {
                for ($counter = 1; $counter < 4 + ($splitter * 2); $counter++) {
                    if ($counter == $page)
                        $hezpaging .= "<li><a class='current'>$counter</a></li>";
                    else
                        $hezpaging .= "<li><a href='" . $url1 . "$counter'>$counter</a></li>";
                }
                $hezpaging .= "<li class='dot'>...</li>";
                $hezpaging .= "<li><a href='" . $url1 . "$lpm1'>$lpm1</a></li>";
                $hezpaging .= "<li><a href='" . $url1 . "$lastpage'>$lastpage</a></li>";
            } elseif ($lastpage - ($splitter * 2) > $page && $page > ($splitter * 2)) {
                $hezpaging .= "<li><a href='" . $url1 . "1'>1</a></li>";
                $hezpaging .= "<li><a href='" . $url1 . "2'>2</a></li>";
                $hezpaging .= "<li class='dot'>...</li>";
                for ($counter = $page - $splitter; $counter <= $page + $splitter; $counter++) {
                    if ($counter == $page)
                        $hezpaging .= "<li><a class='current'>$counter</a></li>";
                    else
                        $hezpaging .= "<li><a href='" . $url1 . "$counter'>$counter</a></li>";
                }
                $hezpaging .= "<li class='dot'>..</li>";
                $hezpaging .= "<li><a href='" . $url1 . "$lpm1'>$lpm1</a></li>";
                $hezpaging .= "<li><a href='" . $url1 . "$lastpage'>$lastpage</a></li>";
            } else {
                $hezpaging .= "<li><a href='" . $url1 . "1'>1</a></li>";
                $hezpaging .= "<li><a href='" . $url1 . "2'>2</a></li>";
                $hezpaging .= "<li class='dot'>..</li>";
                for ($counter = $lastpage - (2 + ($splitter * 2)); $counter <= $lastpage; $counter++) {
                    if ($counter == $page)
                        $hezpaging .= "<li><a class='current'>$counter</a></li>";
                    else
                        $hezpaging .= "<li><a href='" . $url1 . "$counter'>$counter</a></li>";
                }
            }
        }
        if ($page < $counter - 1) {
            $hezpaging .= "<li><a href='" . $url1 . "$next'>" . LANG_NEXT . "</a></li>";
            $hezpaging .= "<li><a href='" . $url1 . "$lastpage'>" . LANG_LAST . "</a></li>";
        } else {
            $hezpaging .= "<li><a class='current'>" . LANG_NEXT . "</a></li>";
            $hezpaging .= "<li><a class='current'>" . LANG_NEXT . "</a></li>";
        }
        $hezpaging .= "</ul>\n";
    }
    return $hezpaging;
}

function pageparam($limit)
{
    $page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
    return ($page * $limit) - $limit;
}

//Form Messages
function form_errors($errors)
{
    if (empty($errors) === false) {
        echo '<div class="alert alert-danger">' . implode($errors) . '</div>';
    }
}

//Password Hashing
function hezecom_crypt($post_password, $encrypted_data = false)
{

    if ($encrypted_data) {

        $pepper = ORANGE_CREDIT_PASSWORD_HASH;
        $pwd_peppered = hash_hmac("sha256", $post_password, $pepper);

        if (password_verify($pwd_peppered, $encrypted_data)) {
            return true;
        } else {
            return false;
        }
    } else {
        $pepper = ORANGE_CREDIT_PASSWORD_HASH;
        $pwd_peppered = hash_hmac("sha256", $post_password, $pepper);
        $pwd_hashed = password_hash($pwd_peppered, PASSWORD_DEFAULT);
        return $pwd_hashed;
    }
}

/**
 * @param $date
 * @return string
 */
function timeAgo($date)
{
    $timestamp = strtotime($date);

    $strTime = array("second", "minute", "hour", "day", "month", "year");
    $length = array("60", "60", "24", "30", "12", "10");

    $currentTime = time();
    if ($currentTime >= $timestamp) {
        $diff = time() - $timestamp;
        for ($i = 0; $diff >= $length[$i] && $i < count($length) - 1; $i++) {
            $diff = $diff / $length[$i];
        }

        $diff = round($diff);
        return $diff . " " . $strTime[$i] . "(s) ago ";
    }
}


/*
* Generate a secure hash for a given password. The cost is passed
* to the blowfish algorithm. Check the PHP manual page for crypt to
* find more information about this setting.
*/
function generate_hash($password, $cost = 11)
{
    /* To generate the salt, first generate enough random bytes. Because
    * base64 returns one character for each 6 bits, the we should generate
    * at least 22*6/8=16.5 bytes, so we generate 17. Then we get the first
    * 22 base64 characters
    */
    $salt = substr(base64_encode(openssl_random_pseudo_bytes(17)), 0, 22);
    /* As blowfish takes a salt with the alphabet ./A-Za-z0-9 we have to
    * replace any '+' in the base64 string with '.'. We don't have to do
    * anything about the '=', as this only occurs when the b64 string is
    * padded, which is always after the first 22 characters.
    */
    $salt = str_replace("+", ".", $salt);
    /* Next, create a string that will be passed to crypt, containing all
    * of the settings, separated by dollar signs
    */
    $param = '$' . implode('$', array(
            "2y", //select the most secure version of blowfish (>=PHP 5.3.7)
            str_pad($cost, 2, "0", STR_PAD_LEFT), //add the cost in two digits
            $salt //add the salt
        ));

    //now do the actual hashing
    return crypt($password, $param);
}

/*
* Check the password against a hash generated by the generate_hash
* function.
*/
function validate_pw($password, $hash)
{
    /* Regenerating the with an available hash as the options parameter should
    * produce the same hash if the same password is passed.
    */
    return crypt($password, $hash) == $hash;
}

//user position
function check_position($val)
{
    $result = '';
    if ($val == 1) {
        $result .= 'SUPER ADMINISTRATOR';
    } elseif ($val == 2) {
        $result .= 'CREDIT MANAGER';
    } elseif ($val == 3) {
        $result .= 'KYC OFFICER';
    } elseif ($val == 4) {
        $result .= 'VERIFICATION OFFICER';
    } elseif ($val == 5) {
        $result .= 'USER';
    }
    return $result;
}

//status
function check_status($val)
{
    $result = '';
    if ($val == 1) {
        $result .= '<a class="btn btn-success btn-sm">Active</a>';
    } elseif ($val == 0) {
        $result .= '<a class="btn btn-danger btn-sm">Inactive</a>';
    }
    return $result;
}

//CSV EXPORT
/*
USAGE
DownloadSentHeaders('filename.csv');
echo SendRecord2CSV($array);
die();
*/
function SendRecord2CSV(array &$array)
{
    if (count($array) == 0) {
        return null;
    }
    ob_start();
    $hezfile = fopen("php://output", 'w');
    fputcsv($hezfile, array_keys(reset($array)));
    foreach ($array as $row) {
        fputcsv($hezfile, $row);
    }
    fclose($hezfile);
    return ob_get_clean();
}

function DownloadSentHeaders($filename)
{
    // disable caching
    $now = gmdate("D, d M Y H:i:s");
    header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
    header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
    header("Last-Modified: {$now} GMT");
    // force download
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");
    // disposition / encoding on response body
    header("Content-Disposition: attachment;filename={$filename}");
    header("Content-Transfer-Encoding: binary");
}

//MESSAGES
function json_error($errors)
{
    die('<div class="alert alert-danger">' . $errors . '</div>');
}

function json_success($success)
{
    die('<div class="alert alert-success"><i class="fa fa-check-circle"></i> ' . $success .
        '</div>');
}

function json_send($success)
{
    echo '<script>window.location.replace("' . $success . '");</script>';
}

//QUICK SEARCH
function AjaxSearchSuggest($url)
{
    $jss = "
	<script>
//	search.load();
//	search.setOnLoadCallback(function()
//	{
//		// Fade out the suggestions box when not active
//		 $('input').blur(function(){
//			$('#suggestions').fadeOut();
//		 });
//	});
	function lookupQuery(inputString) {
		if(inputString.length == 0) {
			$('#suggestions').fadeOut(); // Hide the suggestions box
	} else {		
	$.post('" . $url . "', {qstring:inputString}, function(data) { 
		$('#suggestions').fadeIn();
		$('#suggestions').html(data);
			});
		}
	}
	</script>
    ";
    print ($jss);
}

//pass generator
function Password_Generator($limit = 6)
{
    $generator = "";
    for ($i = 0; $i < $limit; $i++) {
        $generator .= substr("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789",
            mt_rand(0, 63), 1);
    }
    return $generator;
}

function random_str($type = 'alphanum', $length = 8)
{
    switch ($type) {
        case 'basic':
            return mt_rand();
            break;
        case 'alpha':
        case 'alphanum':
        case 'num':
        case 'nozero':
            $seedings = array();
            $seedings['alpha'] = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $seedings['alphanum'] =
                '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $seedings['num'] = '0123456789';
            $seedings['nozero'] = '123456789';

            $pool = $seedings[$type];

            $str = '';
            for ($i = 0; $i < $length; $i++) {
                $str .= substr($pool, mt_rand(0, strlen($pool) - 1), 1);
            }
            return $str;
            break;
        case 'unique':
        case 'md5':
            return md5(uniqid(mt_rand()));
            break;
    }
}

function get_ip_address()
{
    $ip_keys = array(
        'HTTP_CLIENT_IP',
        'HTTP_X_FORWARDED_FOR',
        'HTTP_X_FORWARDED',
        'HTTP_X_CLUSTER_CLIENT_IP',
        'HTTP_FORWARDED_FOR',
        'HTTP_FORWARDED',
        'REMOTE_ADDR');
    foreach ($ip_keys as $key) {
        if (array_key_exists($key, $_SERVER) === true) {
            foreach (explode(',', $_SERVER[$key]) as $ip) {
                // trim for safety measures
                $ip = trim($ip);
                // attempt to validate IP
                if (validate_ip($ip)) {
                    return $ip;
                }
            }
        }
    }
    return isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : false;
}

/**
 * Ensures an ip address is both a valid IP and does not fall within
 * a private network range.
 */
function validate_ip($ip)
{
    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 |
            FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false) {
        return false;
    }
    return true;
}

function get_timeago($ptime)
{
    $estimate_time = time() - $ptime;

    if ($estimate_time < 1) {
        return 'less than 1 second ago';
    }

    $condition = array(
        12 * 30 * 24 * 60 * 60 => 'year',
        30 * 24 * 60 * 60 => 'month',
        24 * 60 * 60 => 'day',
        60 * 60 => 'hour',
        60 => 'minute',
        1 => 'second');

    foreach ($condition as $secs => $str) {
        $d = $estimate_time / $secs;

        if ($d >= 1) {
            $r = round($d);
            return 'about ' . $r . ' ' . $str . ($r > 1 ? 's' : '') . ' ago';
        }
    }
}

function generate_password($length = 12, $special_chars = true)
{
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    if ($special_chars)
        $chars .= '!@#$%^&*()';
    $password = '';
    for ($i = 0; $i < $length; $i++)
        $password .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
    return $password;
}

function create_orange_credit_plan($param_customer_email, $params_amount)
{
    $data = array(
        'name' => 'Monthly School Fees contribution - ' . $param_customer_email,
        'interval' => 'monthly',
        'description' => 'Orange Credit Monthly School Fees contribution for ' . $param_customer_email,
        'send_invoices' => true,
        'send_sms' => false,
        'currency' => 'NGN',
        'amount' => $params_amount,
    );

    $curl = new Curl();
    $curl->setDefaultJsonDecoder($assoc = true);
    $curl->setHeader('Authorization',
        'Bearer ' . PAYSTACK_SECRET_KEY);
    $curl->setHeader('Content-Type', 'application/json');
    $curl->post('https://api.paystack.co/plan', $data);

    if ($curl->error) {
        echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
        return 'false';
    } else {
        echo 'Response:' . "\n";
        return json_encode($curl->response);

    }

}

function create_orange_credit_user_subscription($customer_emaail, $subscrption_plan,
                                                $date_to_start)
{
    $data = array(
        'customer' => $customer_emaail,
        'plan' => $subscrption_plan,
        'start_date' => $date_to_start);

    $curl = new Curl();
    $curl->setDefaultJsonDecoder($assoc = true);
    $curl->setHeader('Authorization',
        'Bearer ' . PAYSTACK_SECRET_KEY);
    $curl->setHeader('Content-Type', 'application/json');
    $curl->post('https://api.paystack.co/subscription', $data);

    if ($curl->error) {
        echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
        return 'false';
    } else {
        echo 'Response:' . "\n";
        return json_encode($curl->response);
    }

}

/**
 * time ago
 */
function time_elapsed_string($datetime, $full = false)
{
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

function IsInjected($str)
{
    $injections = array(
        '(\n+)',
        '(\r+)',
        '(\t+)',
        '(%0A+)',
        '(%0D+)',
        '(%08+)',
        '(%09+)');
    $inject = join('|', $injections);
    $inject = "/$inject/i";
    if (preg_match($inject, $str)) {
        return true;
    } else {
        return false;
    }
}

?>


