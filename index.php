<?php
define('API_KEY','Your Token');
//----######------
function makereq($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($datas));
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
//##############=--API_REQ
function apiRequest($method, $parameters) {
  if (!is_string($method)) {
    error_log("Method name must be a string\n");
    return false;
  }
  if (!$parameters) {
    $parameters = array();
  } else if (!is_array($parameters)) {
    error_log("Parameters must be an array\n");
    return false;
  }
  foreach ($parameters as $key => &$val) {
    // encoding to JSON array parameters, for example reply_markup
    if (!is_numeric($val) && !is_string($val)) {
      $val = json_encode($val);
    }
  }
  $url = "https://api.telegram.org/bot".API_KEY."/".$method.'?'.http_build_query($parameters);
  $handle = curl_init($url);
  curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 5);
  curl_setopt($handle, CURLOPT_TIMEOUT, 60);
  return exec_curl_request($handle);
}
//----######------
//---------
$update = json_decode(file_get_contents('php://input'));
var_dump($update);
//=========
$chat_id = $update->message->chat->id;
$message_id = $update->message->message_id;
$from_id = $update->message->from->id;
$name = $update->message->from->first_name;
$username = $update->message->from->username;
$textmessage = isset($update->message->text)?$update->message->text:'';
$txtmsg = $update->message->text;
$reply = $update->message->reply_to_message->forward_from->id;
$stickerid = $update->message->reply_to_message->sticker->file_id;
$admin = 100096055;
$admin2 = file_get_contents('admin2.txt');
$channel = "-1001062859892";
$toupdate = file_get_contents("toupdate.txt");
$type = file_get_contents("data/".$from_id."/type.txt");
$type2 = file_get_contents("data/".$from_id."/type2.txt");
$step = file_get_contents("data/".$from_id."/step.txt");
$ban = file_get_contents('data/banlist.txt');
$code = file_get_contents('code.txt');
$code2 = file_get_contents('code2.txt');
$code3 = file_get_contents('codecoins.txt');
$tedadcoins = file_get_contents('tedadcoins.txt');
//-------
function SendHTML($ChatId, $TextMsg)
{
 makereq('sendMessage',[
        	'chat_id'=>$ChatId,
        	'text'=>$TextMsg,
            	'parse_mode'=>'HTML',
                
            	]);
}
function SendMessage($ChatId, $TextMsg)
{
 makereq('sendMessage',[
'chat_id'=>$ChatId,
'text'=>$TextMsg,
'parse_mode'=>"MarkDown"
]);
}
function SendSticker($ChatId, $sticker_ID)
{
 makereq('sendSticker',[
'chat_id'=>$ChatId,
'sticker'=>$sticker_ID
]);
}
function Forward($KojaShe,$AzKoja,$KodomMSG)
{
makereq('ForwardMessage',[
'chat_id'=>$KojaShe,
'from_chat_id'=>$AzKoja,
'message_id'=>$KodomMSG
]);
}
function save($filename,$TXTdata)
	{
	$myfile = fopen($filename, "w") or die("Unable to open file!");
	fwrite($myfile, "$TXTdata");
	fclose($myfile);
	}
//===========
$inch = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@PvResanFather&user_id=".$from_id);

if (strpos($textmessage , "/start ") !== false ) {
if ($from_id != $ban) {
$text = str_replace("/start ","",$textmessage);
if (!file_exists("data/$text/coins.txt")) {
	save("data/$text/coins.txt", "");
}
	$file2 = file_get_contents("data/$text/coins.txt");
	if ($file2 != "$from_id") {
$myfile2 = fopen("data/$text/coins.txt", "a") or die("Unable to open file!"); 
fwrite($myfile2, "$from_id\n");
fclose($myfile2);
}
		$coins = -1;
	$fp = fopen( "data/$from_id/coins.txt", 'r');
	while( !feof( $fp)) {
    		fgets( $fp);
    		$coins ++;
	save("data/$from_id/coins2.txt", "$coins");
		
	}
	fclose( $fp);
if (!file_exists("data/$from_id/step.txt")) {
mkdir("data/$from_id");
save("data/$from_id/step.txt","none");
save("data/$from_id/tedadvip.txt","0");
save("data/$from_id/tedad.txt","0");
save("data/$from_id/bots.txt","");
$myfile2 = fopen("data/users.txt", "a") or die("Unable to open file!"); 
fwrite($myfile2, "$from_id\n");
fclose($myfile2);
}
var_dump(makereq('sendMessage',[
         'chat_id'=>$update->message->chat->id,
         'text'=>"سلام کاربرگرامی به ربات پدر پیوی رسان ساز خوش امدی
	لطفا زبان خود را انتخاب کنید
	🇮🇷🇮🇷🇮🇷🇮🇷🇮🇷🇮🇷🇮🇷🇮🇷
	➖➖➖➖➖➖➖➖➖➖
	🇦🇺🇦🇺🇦🇺🇦🇺🇦🇺🇦🇺🇦🇺🇦🇺
	Hello Dear, Welcome To Father PvResan Maker
Please choose your language",
  'parse_mode'=>'MarkDown',
         'reply_markup'=>json_encode([
             'keyboard'=>[
[
                   ['text'=>"فارسی 🇮🇷"],['text'=>"English 🇦🇺"]          
]
             ],
             'resize_keyboard'=>true
         ])
      ]));
}
 }

	elseif (strpos($inch ,'"status":"left"') !== false ) {
SendMessage($chat_id,"برای استفاده از ربات اول در کانال ما عضو شوید.
@PvResanFather

To use the first robot subscribe to our channel.
@PvResanFather");
}

elseif ($toupdate == "on" && $admin != "$from_id" ) {
SendMessage($chat_id,"The robot is being updated to take full notifications under your channel
@PvResanFather

➖➖➖➖➖➖➖➖➖➖

ربات در حال اپدیت شدن است برای گرفتن اطلاعیه کامل وارد کانال زیر شوید
@PvResanFather");
	}


elseif (strpos($ban , "$from_id") !== false  ) {
SendMessage($chat_id,"You Are Banned From Server.🤓
Don't Message Again...😎

➖➖➖➖➖➖➖➖➖➖

دسترسی شما به این سرور مسدود شده است.🤓
لطفا پیام ندهید...😎");
	}

	elseif(isset($update->callback_query)){
    $callbackMessage = '';
    var_dump(makereq('answerCallbackQuery',[
        'callback_query_id'=>$update->callback_query->id,
        'text'=>$callbackMessage
    ]));
    $chat_id = $update->callback_query->message->chat->id;
    
    $message_id = $update->callback_query->message->message_id;
    $data = $update->callback_query->data;
    if (strpos($data, "del") !== false ) {
    $botun = str_replace("del ","",$data);
    unlink("bots/".$botun."/index.php");
    save("data/$chat_id/bots.txt","");
    save("data/$chat_id/tedad.txt","0");
    var_dump(
        makereq('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$message_id,
            'text'=>"ربات شما با موفقیت حذف شد !\n Robot has been deleted!",
            'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                    [
                        ['text'=>"به کانال ما بپیوندید - Pease join to my channel",'url'=>"https://telegram.me/PvResanFather"]
                    ]
                ]
            ])
        ])
    );
 }
 else {
    var_dump(
        makereq('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$message_id,
            'text'=>"خطا-Error",
            'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                    [
                        ['text'=>"به کانال ما بپیوندید - Pleas join to my channel",'url'=>"https://telegram.me/PvResanFather"]
                    ]
                ]
            ])
        ])
    );
 }
}
elseif ($textmessage == '🔙 Back') {
save("data/$from_id/step.txt","none");
var_dump(makereq('sendMessage',[
         'chat_id'=>$update->message->chat->id,
         'text'=>"🔃You return to the main menu",
  'parse_mode'=>'MarkDown',
         'reply_markup'=>json_encode([
             'keyboard'=>[
                [
                   ['text'=>"🔄 Create a Robot"],['text'=>"🚀 my robots"],['text'=>"☢ Delete a Robot"]
                ],
		                [
                   ['text'=>"Update Your robot⚙️"],
                ],
			                [
                   ['text'=>"Rise building Robat🛠"],
                ],
				                [
                   ['text'=>"⚜️Coins⚜️"],
                ],
		                [
                   ['text'=>"Update RoBot to Vip⚜️"],['text'=>"Update Account to VIP⚜️"],
                ],
                [
                   ['text'=>"ℹ️ help"],['text'=>"🔰 rules"]
                ],
                     [
                   ['text'=>"✅ Send Comment"],['text'=>"⚠️ Robot Report"]
                ],
		              [
                   ['text'=>"ℹ️my infoℹ️"],
                ],
[
                   ['text'=>"🇦🇺 Language 🇮🇷"]          
]
             ],
             'resize_keyboard'=>true
         ])
      ]));
}
elseif ($textmessage == '🔙 برگشت') {
save("data/$from_id/step.txt","none");
var_dump(makereq('sendMessage',[
         'chat_id'=>$update->message->chat->id,
         'text'=>"🔃به صفحه ی اصلی برگشتید",
  'parse_mode'=>'MarkDown',
         'reply_markup'=>json_encode([
             'keyboard'=>[
                [
                   ['text'=>"🔄 ساخت ربات"],['text'=>"🚀 ربات های من"],['text'=>"☢ حذف ربات"]
                ],
	                [
                   ['text'=>"افزایش ساخت ربات🛠"],
                ],
		                [
                   ['text'=>"کردن ربات VIP⚜️"],['text'=>"کردن اکانت VIP⚜️"],
                ],
					                [
                   ['text'=>"⚜️سکه ها⚜️"],
                ],
                [
                   ['text'=>"ℹ️ راهنما"],['text'=>"🔰 قوانین"]
                ],
                [
                   ['text'=>"✅ ارسال نظر"],['text'=>"⚠️ گزارش تخلف"]
                ],
	                [
                   ['text'=>"ℹ️مشخصات منℹ️"],
                ],
           [
                ['text'=>"🇦🇺 تغییر زبان 🇮🇷"]
            ]
                
             ],
             'resize_keyboard'=>true
         ])
      ]));
}
elseif ($textmessage == '🔙 برگشت - Back') {
save("data/$from_id/step.txt","none");
var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"🔃 به منوی اصلی خوش آمدید
🔃 Welcome To Main Menu",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
  [
                   ['text'=>"فارسی 🇮🇷"],['text'=>"English 🇦🇺"]          
]
                
            	],
            	'resize_keyboard'=>true
       		])
    		]));
}
elseif ($textmessage == '🔙 برگشت به منو ادمین' && $from_id == $admin) {
save("data/$from_id/step.txt","none");
var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"سلام ادمین به بخش مدیریت بات خوش امدید.	",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                  [
                   ['text'=>"ارسال به همه📡"],['text'=>"آمار ربات👥"],
                ], 
	                [
                   ['text'=>"⚙️ادمین کردن کسی⚜️"],['text'=>"⚙️در اوردن ادمین⚜️"],
                ], 
		                [
                   ['text'=>"بن کردن🚫"],['text'=>"⛔️لیست گلوبال بن⛔️"],['text'=>"خارج کردن از بن✅"]
                ],   
	                [
                   ['text'=>"🗑پاک کردن ربات🗑"]
                ],
		                [
                   ['text'=>"🎁کد سکه"],['text'=>"🎁فروش سکه"]
                ],
		                [
                   ['text'=>"افزایش ساخت ربات🔖"],['text'=>"کد vip کردن🎁"]
                ],
			                [
                   ['text'=>"VIP کردن شخصی🏆"],['text'=>"افزایش ساخت ربات🎁"]
                ],
                [
                   ['text'=>"رفتن به حالت اپدیت"],['text'=>"خارج شدن از حالت اپدیت"]
                ],
		                [
                   ['text'=>"/create on"],['text'=>"/create off"]
                ],
	                [
                   ['text'=>"🔙 برگشت"]
                ]
                
            	],
            	'resize_keyboard'=>true
       		])
    		]));
}
elseif ($textmessage == '🔙 برگشت به منو ادمین' && $type2 == "admin") {
save("data/$from_id/step.txt","none");
var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"سلام ادمین به بخش مدیریت بات خوش امدید.	",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>"ارسال به همه📡"],['text'=>"آمار ربات👥"],
                ],   
		                [
                   ['text'=>"بن کردن🚫"],['text'=>"⛔️لیست گلوبال بن⛔️"],['text'=>"خارج کردن از بن✅"]
                ],   
	                [
                   ['text'=>"🗑پاک کردن ربات🗑"]
                ],
		                [
                   ['text'=>"افزایش ساخت ربات🔖"],
                ],
	                [
                   ['text'=>"🔙 برگشت"]
                ]
                
            	],
            	'resize_keyboard'=>true
       		])
    		]));
}
elseif ($step == 'delete') {
$botun = $txtmsg ;
if (file_exists("bots/".$botun."/index.php")) {
$src = file_get_contents("bots/".$botun."/index.php");
if (strpos($src , $from_id) !== false ) {
save("data/$from_id/step.txt","none");
unlink("bots/".$botun."/index.php");
var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"🚀 ربات شما با موفقیت پاک شده است 
یک ربات جدید بسازید 😄
Your Robot has been deleted 
Please create new bot",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>"/start"]
                ]
                
            	],
            	'resize_keyboard'=>true
       		])
    		]));
}
else {
SendMessage($chat_id,"خطا!
شما نمی توانید این ربات را پاک کنید !
Error 
You cant delete this bot");
}
}
else {
SendMessage($chat_id,"یافت نشد.\n Not found");
}
}
elseif ($step == 'create fa bot') {
$token = $textmessage ;
			$userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));
			//==================
			function objectToArrays( $object ) {
				if( !is_object( $object ) && !is_array( $object ) )
				{
				return $object;
				}
				if( is_object( $object ) )
				{
				$object = get_object_vars( $object );
				}
			return array_map( "objectToArrays", $object );
			}
	$resultb = objectToArrays($userbot);
	$un = $resultb["result"]["username"];
	$ok = $resultb["ok"];
		if($ok != 1) {
			//Token Not True
			SendMessage($chat_id,"توکن نا معتبر!");
		}
		else
		{
		SendMessage($chat_id,"در حال ساخت ربات ...");
		SendHTML($channel,"یه ربات ساخته شد مشخصات:\nlang: fa\n*Name:* $name\n*UserName:* @$username\n*ID:* `$from_id`\n*Bot Username:* @$un");
		if (file_exists("bots/$un/index.php")) {
		$source = file_get_contents("bot/index.php");
		$source = str_replace("**TOKENSS**",$token,$source);
		$source = str_replace("**ADMINSS**",$from_id,$source);
		$source = str_replace("**idbot**",$un,$source);
		save("bots/$un/index.php",$source);	
		$source2 = file_get_contents("bot/bot/index.php");
		$source2 = str_replace("**idbot**",$un,$source2);
		save("bots/$un/bot/index.php",$source2);
		save("data/$from_id/step.txt","none");
		file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=ADRES/bots/$un/index.php");
var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"🚀 ربات شما با موفقیت آپدیت شده است 
					برای مدیریت ربات خود دستور /admin را در ربات خود ارسال کنید
					
[برای ورود به ربات خود کلیک کنید 😃](https://telegram.me/$un)",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>"🔄 ساخت ربات"],['text'=>"🚀 ربات های من"],['text'=>"☢ حذف ربات"]
                ],
	                [
                   ['text'=>"افزایش ساخت ربات🛠"],
                ],
		                [
                   ['text'=>"کردن ربات VIP⚜️"],['text'=>"کردن اکانت VIP⚜️"],
                ],
					                [
                   ['text'=>"⚜️سکه ها⚜️"],
                ],
                [
                   ['text'=>"ℹ️ راهنما"],['text'=>"🔰 قوانین"]
                ],
                [
                   ['text'=>"✅ ارسال نظر"],['text'=>"⚠️ گزارش تخلف"]
                ],
	                [
                   ['text'=>"ℹ️مشخصات منℹ️"],
                ],
           [
                ['text'=>"🇦🇺 تغییر زبان 🇮🇷"]
            ]
                
            	],
            	'resize_keyboard'=>true
       		])
    		]));
		}
		else {
$tedaddel = file_get_contents("data/$from_id/tedad.txt");
$settedad = $tedaddel + 1;
			save("data/$from_id/tedad.txt","$settedad");
		save("data/$from_id/step.txt","none");
save("data/$from_id/bots.txt","$un");
		
		mkdir("bots/$un");
		mkdir("bots/$un/data");
		mkdir("bots/$un/bot");
		mkdir("bots/$un/bot/data");
		mkdir("bots/$un/bots");
		mkdir("bots/$un/data/words");
		save("bots/$un/bottype.txt","free");
		save("bots/$un/token.txt",$token);
		save("bots/$un/idbot.txt","$un");
		save("bots/$un/admin.txt",$from_id);
	    $myfile2 = fopen("data/bots.txt", "a") or die("Unable to open file!"); 
        fwrite($myfile2, "$un\n");
        fclose($myfile2);
		save("bots/$un/data/last_word.txt","");
		save("bots/$un/data/banlist.txt","");
		save("bots/$un/data/users.txt","$from_id\n");
    save("bots/$un/data/pishfarz.txt","پیام شما پیدا نشد❌\n Your command could not be found❌");
    save("bots/$un/data/channel.txt","نامشخص");
    save("bots/$un/data/startbot.txt","Hello World!");
    save("bots/$un/data/sendbot.txt","Message Sent!");
		save("bots/$un/data/startch.txt","نامشخص");
		save("bots/$un/data/schannel.txt","نامشخص");
    save("bots/$un/data/backfa.txt","به منوی اصلی برگشتید");
    save("bots/$un/data/backen.txt","You return to the main menu");
    save("bots/$un/data/starten.txt","Hello👋😉\n🔹 WellCome To PvResan Robot 🌹\n🔸 with this Service you can Provide Support  your Robot Mmbers , Channel , Groups and  Websites \n🔹 To Create Robot Select '🔄 Create a Robot' Button!");
    save("bots/$un/data/startfa.txt","سلــام 👋😉\n🔹 به سرویس پیام رسان تلگرام خوش آمدید 🌹.\n🔸 با استفاده از این سرویس شما میتوانید رباتی جهت ارائه پشتیبانی به کاربران ربات، کانال، گروه یا وبسایت خود ایجاد کنید.\n🔹برای ساخت ربات از دکمه ی 🔄 ساخت ربات استفاده نمایید.");
	  save("bots/$un/data/change.txt","Please Select your Language.\n➖➖➖➖➖\nلطفا زبان خود را انتخاب کنید.");
    save("bots/$un/data/start.txt","Please Select your Language.\n➖➖➖➖➖\nلطفا زبان خود را انتخاب کنید.");
    save("bots/$un/data/banned.txt","You Are Banned From Server.🤓\nDon't Message Again...😎\n➖➖➖➖➖➖➖➖➖➖\nدسترسی شما به این سرور مسدود شده است.🤓\nلطفا پیام ندهید...😎");
	        save("bots/$un/booleans.txt","false");
	        save("bots/$un/data/ban.txt","");

		
		$source = file_get_contents("bot/index.php");
		$source = str_replace("**TOKENSS**",$token,$source);
		$source = str_replace("**ADMINSS**",$from_id,$source);
		$source = str_replace("**idbot**",$un,$source);
		save("bots/$un/index.php",$source);
		$source2 = file_get_contents("bot/bot/index.php");
		$source2 = str_replace("**idbot**",$un,$source2);
		save("bots/$un/bot/index.php",$source2);
								save("data/$from_id/step.txt","none");
		file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=ADRES/bots/$un/index.php");
var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"🚀 ربات شما با موفقیت نصب شده است
					برای مدیریت ربات خود دستور /admin را در ربات خود ارسال کنید
										
[برای ورود به ربات خود کلیک کنید 😃](https://telegram.me/$un)",		
                'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>"🔄 ساخت ربات"],['text'=>"🚀 ربات های من"],['text'=>"☢ حذف ربات"]
                ],
	                [
                   ['text'=>"افزایش ساخت ربات🛠"],
                ],
		                [
                   ['text'=>"کردن ربات VIP⚜️"],['text'=>"کردن اکانت VIP⚜️"],
                ],
					                [
                   ['text'=>"⚜️سکه ها⚜️"],
                ],
                [
                   ['text'=>"ℹ️ راهنما"],['text'=>"🔰 قوانین"]
                ],
                [
                   ['text'=>"✅ ارسال نظر"],['text'=>"⚠️ گزارش تخلف"]
                ],
	                [
                   ['text'=>"ℹ️مشخصات منℹ️"],
                ],
           [
                ['text'=>"🇦🇺 تغییر زبان 🇮🇷"]
            ]
                
            	],
            	'resize_keyboard'=>true
       		])
    		]));
		}
}
}

elseif ($step == 'create en bot') {
$token = $textmessage ;
			$userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));
			//==================
			function objectToArrays( $object ) {
				if( !is_object( $object ) && !is_array( $object ) )
				{
				return $object;
				}
				if( is_object( $object ) )
				{
				$object = get_object_vars( $object );
				}
			return array_map( "objectToArrays", $object );
			}
	$resultb = objectToArrays($userbot);
	$un = $resultb["result"]["username"];
	$ok = $resultb["ok"];
		if($ok != 1) {
			//Token Not True
			SendMessage($chat_id,"Your token is invalid");
		}
		else
		{
		SendMessage($chat_id,"Are making robot...");
		SendHTML($channel,"یه ربات ساخته شد مشخصات:\nlang: en\n*Name:* $name\n*UserName:* @$username\n*ID:* `$from_id`\n*Bot Username:* @$un");
		if (file_exists("bots/$un/index.php")) {
		$source = file_get_contents("bot/index.php");
		$source = str_replace("**TOKENSS**",$token,$source);
		$source = str_replace("**ADMINSS**",$from_id,$source);
		$source = str_replace("**idbot**",$un,$source);
		save("bots/$un/index.php",$source);
		$source2 = file_get_contents("bot/bot/index.php");
		$source2 = str_replace("**idbot**",$un,$source2);
		save("bots/$un/bot/index.php",$source2);
					save("data/$from_id/step.txt","none");
		file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=ADRES/bots/$un/index.php");
var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"Your Robot Has been Created🚀
					pls send /admin in your robot
					
[Click to start Bot](https://telegram.me/$un)",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>"🔄 Create a Robot"],['text'=>"🚀 my robots"],['text'=>"☢ Delete a Robot"]
                ],
		                [
                   ['text'=>"Update Your robot⚙️"],
                ],
			                [
                   ['text'=>"Rise building Robat🛠"],
                ],
		                [
                   ['text'=>"Update RoBot to Vip⚜️"],['text'=>"Update Account to VIP⚜️"],
                ],
				                [
                   ['text'=>"⚜️Coins⚜️"],
                ],
                [
                   ['text'=>"ℹ️ help"],['text'=>"🔰 rules"]
                ],
                     [
                   ['text'=>"✅ Send Comment"],['text'=>"⚠️ Robot Report"]
                ],
		              [
                   ['text'=>"ℹ️my infoℹ️"],
                ],
[
                   ['text'=>"🇦🇺 Language 🇮🇷"]          
]
                
            	],
            	'resize_keyboard'=>true
       		])
    		]));
		}
		else {
$tedaddel = file_get_contents("data/$from_id/tedad.txt");
$settedad = $tedaddel + 1;
			save("data/$from_id/tedad.txt","$settedad");
		save("data/$from_id/step.txt","none");
		save("data/$from_id/bots.txt","$un");
		
		mkdir("bots/$un");
		mkdir("bots/$un/data");
		mkdir("bots/$un/bot");
		mkdir("bots/$un/bot/data");
		mkdir("bots/$un/bots");
		mkdir("bots/$un/data/words");
				save("bots/$un/bottype.txt","free");
		save("bots/$un/data/banlist.txt","");
		save("bots/$un/data/last_word.txt","");
		save("bots/$un/token.txt",$token);
		save("bots/$un/admin.txt",$from_id);
		save("bots/$un/idbot.txt","$un");
	    $myfile2 = fopen("data/bots.txt", "a") or die("Unable to open file!"); 
        fwrite($myfile2, "$un\n");
        fclose($myfile2);
		save("bots/$un/data/users.txt","$from_id\n");
    save("bots/$un/data/pishfarz.txt","پیام شما پیدا نشد❌\n Your command could not be found❌");
    save("bots/$un/data/channel.txt","نامشخص");
    save("bots/$un/data/startbot.txt","Hello World!");
    save("bots/$un/data/sendbot.txt","Message Sent!");
		save("bots/$un/data/startch.txt","نامشخص");
	  save("bots/$un/data/schannel.txt","نامشخص");
    save("bots/$un/data/backfa.txt","به منوی اصلی برگشتید");
    save("bots/$un/data/backen.txt","You return to the main menu");
    save("bots/$un/data/starten.txt","Hello👋😉\n🔹 WellCome To PvResan Robot 🌹\n🔸 with this Service you can Provide Support  your Robot Mmbers , Channel , Groups and  Websites \n🔹 To Create Robot Select '🔄 Create a Robot' Button!");
    save("bots/$un/data/startfa.txt","سلــام 👋😉\n🔹 به سرویس پیام رسان تلگرام خوش آمدید 🌹.\n🔸 با استفاده از این سرویس شما میتوانید رباتی جهت ارائه پشتیبانی به کاربران ربات، کانال، گروه یا وبسایت خود ایجاد کنید.\n🔹برای ساخت ربات از دکمه ی 🔄 ساخت ربات استفاده نمایید.");
    save("bots/$un/data/change.txt","Please Select your Language.\n➖➖➖➖➖\nلطفا زبان خود را انتخاب کنید.");
    save("bots/$un/data/start.txt","Please Select your Language.\n➖➖➖➖➖\nلطفا زبان خود را انتخاب کنید.");
    save("bots/$un/data/banned.txt","You Are Banned From Server.🤓\nDon't Message Again...😎\n➖➖➖➖➖➖➖➖➖➖\nدسترسی شما به این سرور مسدود شده است.🤓\nلطفا پیام ندهید...😎");
	  save("bots/$un/booleans.txt","false");
	  save("bots/$un/data/ban.txt","");

		
		$source = file_get_contents("bot/index.php");
		$source = str_replace("**TOKENSS**",$token,$source);
		$source = str_replace("**ADMINSS**",$from_id,$source);
		$source = str_replace("**idbot**",$un,$source);
		save("bots/$un/index.php",$source);
		$source2 = file_get_contents("bot/bot/index.php");
		$source2 = str_replace("**idbot**",$un,$source2);
		save("bots/$un/bot/index.php",$source2);
		save("data/$from_id/step.txt","none");
		file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=ADRES/bots/$un/index.php");
var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"Your Robot Has been Created 🚀
					pls send /admin in your robot
					
[Click to start Bot](https://telegram.me/$un)",		
                'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>"🔄 Create a Robot"],['text'=>"🚀 my robots"],['text'=>"☢ Delete a Robot"]
                ],
		                [
                   ['text'=>"Update Your robot⚙️"],
                ],
		                [
                   ['text'=>"Rise building Robat🛠"],
                ],
		                [
                   ['text'=>"Update RoBot to Vip⚜️"],['text'=>"Update Account to VIP⚜️"],
                ],
			                [
                   ['text'=>"⚜️Coins⚜️"],
                ],
                [
                   ['text'=>"ℹ️ help"],['text'=>"🔰 rules"]
                ],
                     [
                   ['text'=>"✅ Send Comment"],['text'=>"⚠️ Robot Report"]
                ],
		              [
                   ['text'=>"ℹ️my infoℹ️"],
                ],
[
                   ['text'=>"🇦🇺 Language 🇮🇷"]          
]
                
            	],
            	'resize_keyboard'=>true
       		])
    		]));
		}
}
}

elseif (strpos($textmessage, "/setvips ") !== false) {
$text = str_replace("/setvips ","",$textmessage);
save("bots/$text/bottype.txt", "vip");
SendMessage($chat_id,"Updated!");
}

elseif (strpos($textmessage , "/toall") !== false ) {
if ($from_id == $admin) {
$text = str_replace("/toall","",$textmessage);
$fp = fopen( "data/users.txt", 'r');
while( !feof( $fp)) {
 $users = fgets( $fp);
SendMessage($users,"$text");
}
}
else {
SendMessage($chat_id,"You Are Not Admin");
}
}
elseif (strpos($textmessage , "/tolog") !== false ) {
if ($from_id == $admin) {
$text = str_replace("/tolog ","",$textmessage);
SendMessage($channel,"$text");
}
else {
SendMessage($chat_id,"You Are Not Admin");
}
}


elseif (strpos($textmessage , "/setvip") !== false ) {
if ($from_id == $admin) {
$text = str_replace("/setvip ","",$textmessage);
		save("data/$text/type.txt","vip");
SendMessage($admin,"*Vip Set: $text*");
}
else {
SendMessage($chat_id,"You Are Not Admin");
}
}
elseif (strpos($textmessage , "/delvip") !== false ) {
if ($from_id == $admin) {
$text = str_replace("/delvip ","",$textmessage);
		save("data/$text/type.txt","free");
SendMessage($admin,"*Delete Vip: $text*");
}
else {
SendMessage($chat_id,"You Are Not Admin");
}
}
elseif (strpos($textmessage , "/create") !== false ) {
if ($from_id == $admin) {
$text = str_replace("/create ","",$textmessage);
		save("data/create.txt","$text");
SendMessage($admin,"*Create: $text*");
}
else {
SendMessage($chat_id,"You Are Not Admin");
}
}
elseif($textmessage == '🚀 ربات های من')
{
$botname = file_get_contents("data/$from_id/bots.txt");
if ($botname == "") {
SendMessage($chat_id,"شما هنوز هیچ رباتی نساخته اید !");
return;
}
 	var_dump(makereq('sendMessage',[
	'chat_id'=>$update->message->chat->id,
	'text'=>"لیست ربات های شما : ",
	'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
	[
	['text'=>"👉 @".$botname,'url'=>"https://telegram.me/".$botname]
	]
	]
	])
	]));
}
elseif($textmessage == '🚀 my robots')
{
$botname = file_get_contents("data/$from_id/bots.txt");
if ($botname == "") {
SendMessage($chat_id,"You still have not robots!");
return;
}
 	var_dump(makereq('sendMessage',[
	'chat_id'=>$update->message->chat->id,
	'text'=>"Your Bot Lists : ",
	'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
	[
	['text'=>"👉 @".$botname,'url'=>"https://telegram.me/".$botname]
	]
	]
	])
	]));
}
elseif($textmessage == '/start' )
{
if (!file_exists("data/$from_id/step.txt")) {
mkdir("data/$from_id");
save("data/$from_id/type.txt", "free");
save("data/$from_id/type2.txt", "member");
save("data/$from_id/coinsfree.txt", "0");
save("data/$from_id/coinsdel.txt", "0");
save("data/$from_id/coins.txt", "0");
save("data/$from_id/step.txt","none");
save("data/$from_id/tedadvip.txt","0");
save("data/$from_id/tedad.txt","0");
save("data/$from_id/bots.txt","");
$myfile2 = fopen("data/users.txt", "a") or die("Unable to open file!"); 
fwrite($myfile2, "$from_id\n");
fclose($myfile2);
}
var_dump(makereq('sendMessage',[
         'chat_id'=>$update->message->chat->id,
         'text'=>"سلام کاربرگرامی به ربات پدر پیوی رسان ساز خوش امدی
	لطفا زبان خود را انتخاب کنید
	🇮🇷🇮🇷🇮🇷🇮🇷🇮🇷🇮🇷🇮🇷🇮🇷
	➖➖➖➖➖➖➖➖➖➖
	🇦🇺🇦🇺🇦🇺🇦🇺🇦🇺🇦🇺🇦🇺🇦🇺
	Hello Dear, Welcome To Father PvResan Maker
Please choose your language",
  'parse_mode'=>'MarkDown',
         'reply_markup'=>json_encode([
             'keyboard'=>[
[
                   ['text'=>"فارسی 🇮🇷"],['text'=>"English 🇦🇺"]          
]
             ],
             'resize_keyboard'=>true
         ])
      ]));
}
elseif($textmessage == '🇦🇺 تغییر زبان 🇮🇷' )
{
if (!file_exists("data/$from_id/step.txt")) {
mkdir("data/$from_id");
save("data/$from_id/type.txt", "free");
save("data/$from_id/type2.txt", "member");
save("data/$from_id/coinsfree.txt", "0");
save("data/$from_id/coinsdel.txt", "0");
save("data/$from_id/coins.txt", "0");
save("data/$from_id/step.txt","none");
save("data/$from_id/tedad.txt","0");
save("data/$from_id/tedadvip.txt","0");
save("data/$from_id/bots.txt","");
$myfile2 = fopen("data/users.txt", "a") or die("Unable to open file!"); 
fwrite($myfile2, "$from_id\n");
fclose($myfile2);
}
var_dump(makereq('sendMessage',[
         'chat_id'=>$update->message->chat->id,
         'text'=>"Please Select your Language.
➖➖➖➖➖
لطفا زبان خود را انتخاب کنید.",
  'parse_mode'=>'MarkDown',
         'reply_markup'=>json_encode([
             'keyboard'=>[
[
                   ['text'=>"فارسی 🇮🇷"],['text'=>"English 🇦🇺"]          
]
             ],
             'resize_keyboard'=>true
         ])
      ]));
}
elseif($textmessage == '🇦🇺 Language 🇮🇷' )
{
if (!file_exists("data/$from_id/step.txt")) {
mkdir("data/$from_id");
save("data/$from_id/type.txt", "free");
save("data/$from_id/type2.txt", "member");
save("data/$from_id/coinsfree.txt", "0");
save("data/$from_id/coinsdel.txt", "0");
save("data/$from_id/coins.txt", "0");
save("data/$from_id/step.txt","none");
save("data/$from_id/tedad.txt","0");
save("data/$from_id/tedadvip.txt","0");
save("data/$from_id/bots.txt","");
$myfile2 = fopen("data/users.txt", "a") or die("Unable to open file!"); 
fwrite($myfile2, "$from_id\n");
fclose($myfile2);
}
var_dump(makereq('sendMessage',[
         'chat_id'=>$update->message->chat->id,
         'text'=>"Please Select your Language.
➖➖➖➖➖
لطفا زبان خود را انتخاب کنید.",
  'parse_mode'=>'MarkDown',
         'reply_markup'=>json_encode([
             'keyboard'=>[
[
                   ['text'=>"فارسی 🇮🇷"],['text'=>"English 🇦🇺"]          
]
             ],
             'resize_keyboard'=>true
         ])
      ]));
}
elseif($textmessage == 'English 🇦🇺')
{
if (!file_exists("data/$from_id/step.txt")) {
mkdir("data/$from_id");
save("data/$from_id/type.txt", "free");
save("data/$from_id/type2.txt", "member");
save("data/$from_id/coinsfree.txt", "0");
save("data/$from_id/coinsdel.txt", "0");
save("data/$from_id/coins.txt", "0");
save("data/$from_id/step.txt","none");
save("data/$from_id/tedad.txt","0");
save("data/$from_id/tedadvip.txt","0");
save("data/$from_id/bots.txt","");
$myfile2 = fopen("data/users.txt", "a") or die("Unable to open file!"); 
fwrite($myfile2, "$from_id\n");
fclose($myfile2);
}
var_dump(makereq('sendMessage',[
         'chat_id'=>$update->message->chat->id,
         'text'=>"Hello👋😉
🔹 WellCome To PvResan Robot 🌹
🔸 with this Service you can Provide Support  your Robot Mmbers , Channel , Groups and  Websites 
🔹 To Create Robot Select '🔄 Create a Robot' Button!",
  'parse_mode'=>'MarkDown',
         'reply_markup'=>json_encode([
             'keyboard'=>[
                [
                   ['text'=>"🔄 Create a Robot"],['text'=>"🚀 my robots"],['text'=>"☢ Delete a Robot"]
                ],
	                [
                   ['text'=>"Update Your robot⚙️"],
                ],
		                [
                   ['text'=>"Rise building Robat🛠"],
                ],
		                [
                   ['text'=>"Update RoBot to Vip⚜️"],['text'=>"Update Account to VIP⚜️"],
                ],
				                [
                   ['text'=>"⚜️Coins⚜️"],
                ],
                [
                   ['text'=>"ℹ️ help"],['text'=>"🔰 rules"]
                ],
                     [
                   ['text'=>"✅ Send Comment"],['text'=>"⚠️ Robot Report"]
                ],
	              [
                   ['text'=>"ℹ️my infoℹ️"],
                ],    
[
                   ['text'=>"🇦🇺 Language 🇮🇷"]          
]
             ],
             'resize_keyboard'=>true
         ])
      ]));
}
elseif($textmessage == 'فارسی 🇮🇷' )
{
if (!file_exists("data/$from_id/step.txt")) {
mkdir("data/$from_id");
save("data/$from_id/type.txt", "free");
save("data/$from_id/type2.txt", "member");
save("data/$from_id/coinsfree.txt", "0");
save("data/$from_id/coinsdel.txt", "0");
save("data/$from_id/coins.txt", "0");
save("data/$from_id/step.txt","none");
save("data/$from_id/tedad.txt","0");
save("data/$from_id/tedadvip.txt","0");
save("data/$from_id/bots.txt","");
$myfile2 = fopen("data/users.txt", "a") or die("Unable to open file!"); 
fwrite($myfile2, "$from_id\n");
fclose($myfile2);
}
var_dump(makereq('sendMessage',[
         'chat_id'=>$update->message->chat->id,
         'text'=>"سلــام 👋😉
🔹 به سرویس پیام رسان تلگرام خوش آمدید 🌹.
🔸 با استفاده از این سرویس شما میتوانید رباتی جهت ارائه پشتیبانی به کاربران ربات، کانال، گروه یا وبسایت خود ایجاد کنید.
🔹برای ساخت ربات از دکمه ی 🔄 ساخت ربات استفاده نمایید.",
  'parse_mode'=>'MarkDown',
         'reply_markup'=>json_encode([
             'keyboard'=>[
                [
                   ['text'=>"🔄 ساخت ربات"],['text'=>"🚀 ربات های من"],['text'=>"☢ حذف ربات"]
                ],
	                [
                   ['text'=>"افزایش ساخت ربات🛠"],
                ],
		                [
                   ['text'=>"کردن ربات VIP⚜️"],['text'=>"کردن اکانت VIP⚜️"],
                ],
				                [
                   ['text'=>"⚜️سکه ها⚜️"],
                ],
                [
                   ['text'=>"ℹ️ راهنما"],['text'=>"🔰 قوانین"]
                ],
                [
                   ['text'=>"✅ ارسال نظر"],['text'=>"⚠️ گزارش تخلف"]
                ],
       	                [
                   ['text'=>"ℹ️مشخصات منℹ️"],
                ],    
	[
                ['text'=>"🇦🇺 تغییر زبان 🇮🇷"]
            ]
                
             ],
             'resize_keyboard'=>true
         ])
      ]));
}
	

	elseif ($textmessage ==  "Rise building Robat🛠" ) {
	if (!file_exists("data/$from_id/coinsfree.txt")) {
	save("data/$from_id/coinsfree.txt", "0");
}
	if (!file_exists("data/$from_id/coinsdel.txt")) {
	save("data/$from_id/coinsdel.txt", "0");
}
		$coins = -1;
	$fp = fopen( "data/$from_id/coins.txt", 'r');
	while( !feof( $fp)) {
    		fgets( $fp);
    		$coins ++;
	save("data/$from_id/coins2.txt", "$coins");
		
	}
	fclose( $fp);
		$coinsfree = file_get_contents("data/$from_id/coinsfree.txt");
		$coinsdel = file_get_contents("data/$from_id/coinsdel.txt");
		$coinsall = $coins + $coinsfree + $coinsdel ;
if ($coinsall <= 15 ) {
SendMessage($chat_id,"To create another robot must collect 15 coins \n coins you: $coinsall");
return;
}
if ($tedad != "0" || $coinsall >= 15 ) {
	fclose( $fp);
$coinsdel = file_get_contents("data/$from_id/coinsdel.txt");
$setcoin = $coinsdel - 15;
save("data/$from_id/coinsdel.txt","$setcoin");
$tedaddel = file_get_contents("data/$from_id/tedad.txt");
$settedad = $tedaddel - 1;
save("data/$from_id/tedad.txt","$tedad");
var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"You can also create other robots",
		'parse_mode'=>'MarkDown',
    		]));
}
}
		
	elseif ($textmessage ==  "افزایش ساخت ربات🛠" ) {
	if (!file_exists("data/$from_id/coinsfree.txt")) {
	save("data/$from_id/coinsfree.txt", "0");
}
	if (!file_exists("data/$from_id/coinsdel.txt")) {
	save("data/$from_id/coinsdel.txt", "0");
}
		$coins = -1;
	$fp = fopen( "data/$from_id/coins.txt", 'r');
	while( !feof( $fp)) {
    		fgets( $fp);
    		$coins ++;
	save("data/$from_id/coins2.txt", "$coins");
		
	}
	fclose( $fp);
		$coinsfree = file_get_contents("data/$from_id/coinsfree.txt");
		$coinsdel = file_get_contents("data/$from_id/coinsdel.txt");
		$coinsall = $coins + $coinsfree + $coinsdel ;
if ($coinsall <= 15 ) {
SendMessage($chat_id,"برای اینکه یک ربات دیگه هم بسازید باید ۱۵ سکه جمع کنید\n سکه های شما: $coinsall");
return;
}
if ($tedad != "0" || $coinsall >= 15 ) {
	fclose( $fp);
$coinsdel = file_get_contents("data/$from_id/coinsdel.txt");
$setcoin = $coinsdel - 15;
save("data/$from_id/coinsdel.txt","$setcoin");
$tedaddel = file_get_contents("data/$from_id/tedad.txt");
$settedad = $tedaddel - 1;
save("data/$from_id/tedad.txt","$tedad");
var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"شما میتوانید یک ربات دیگه هم بسازید",
		'parse_mode'=>'MarkDown',
    		]));
}
}

elseif($textmessage == '🔰 قوانین') {
SendMessage($chat_id, "1⃣ اطلاعات ثبت شده در ربات های ساخته شده توسط پیوی رسان از قبیل اطلاعات پروفایل نزد مدیران پیوی رسان محفوظ است و در اختیار اشخاص حقیقی یا حقوقی قرار نخواهد گرفت.\n\n2⃣ ربات هایی که اقدام به انشار تصاویر یا مطالب مستهجن کنند و یا به مقامات ایران ، ادیان و اقوام و نژادها توهین کنند مسدود خواهند شد.\n\n3⃣ ایجاد ربات با عنوان های مبتذل و خارج از عرف جامعه که برای جذب آمار و فروش محصولات غیر متعارف باشند ممنوع می باشد و در صورت مشاهده ربات مورد نظر حذف و مسدود میشود.\n\n4⃣ مسئولیت پیام های رد و بدل شده در هر ربات با مدیر آن ربات میباشد و پیوی رسان هیچ گونه مسئولیتی قبول نمیکند.\n\n5⃣ رعایت حریم خصوصی و حقوقی افراد از جمله، عدم اهانت به شخصیت های مذهبی، سیاسی، حقیقی و حقوقی کشور و به ویژه کاربران ربات ضروری می باشد.\n\n6⃣ ساخت هرگونه ربات و فعالیت در ضمینه های Hacking و Sexology خلاف قوانین است در صورت برخورد دستری مدیر ربات و ربات ساخته شده به سرور ما مسدود خواهد شد.\n\n7⃣ در صورت مشاهده استفاده از قابلیت های ربات در جهات منفی مانند Spam یا Hack کاربران تلگرام شدیدا بخورد میشود و تمامی اطلاعات شخص مورد نظر گزارش میشود.\n\n8⃣ اگر تعداد درخواست های ربات شما به سرور ما بیش از حد معمول باید و همچنین ربات شما VIP نباشد چند بار به شما اخطاری جهت VIP کردن ربات نمایش داده میشود اگر این اخطار نادیده گرفته شود، ربات شما به صورت اتوماتیک به حالت تعلیغ در.");
}
elseif($textmessage == '🔰 rules') {
SendMessage($chat_id, "1⃣ Recorded data in robots made by PvResan such as profile data , are preserved to PvResan's managers and will not be available for real or juridical people.\n\n 2⃣ Robots that publish obscene pictures or subjects and insult the officials , religions and nations and races , will be blocked.\n\n3⃣ Creating a robot with vulgar titles and out of norm of society which absorbs the statistics and selling offbeat products are prohibited and in case of witnessing  intended robot will be deleted and blocked.\n\n4⃣ The responsibility of exchanged messages in each robot is with the manager of that robot and PvResan does not accept any responsibilities.\n\n5⃣ Respecting the privacy and rights of individuals is necessary. Including no offense to religious , political and juridical figures of the country specially robot users.");
}
elseif($textmessage == 'ℹ️ راهنما') {
SendMessage($chat_id, "ربات پیام رسان چیست؟ 🤔\n\n🔶 ربات پیام رسان این امکان را به شما میدهد تا با مخاطب هایتان که ریپورت شده ایند یا به هر دلایلی نمیتواننید به شما به صورت خصوصی پیام دهند صحبت کنید.\n\nبرخی از ویژگی های ربات پیام رسان :\n\n🚀سرعت بـــــالــا\n1⃣ ارسال مطلب به تمام کاربران یا تمام گروه ها\n2⃣ قفل کردن ارسال عکس ، فیلم ، استیکر ، فایل ، وویس ، آهنگ به صورت مجزا\n3⃣ قفل کردن فروارد در ربات\n4⃣ قفل کردن عضویت ربات در گروه ها\n5⃣مشاهده تعداد اعضا و گروه ها و یوزرنیم 10 کاربر تازه عضو شده\n6⃣مشاهده تعداد اعضا در لیست سیاه و یوزرنیم 10 کاربر جدید در لیست سیاه\n7⃣ قرار دادن افراد در لیست سیاه و بن کردن آنها\n8⃣ قابلیت شیر کردن شماره ی شما به صورت سریع\n9⃣تغییر متن استارت و پیام پیشفرض\nو چندین ویژگی دیگر...");
}
elseif($textmessage == 'ℹ️ help') {
SendMessage($chat_id, "What PvResan do?🤔\n\n🔶 With this Service you can Provide Support  your Robot Mmbers , Channel , Groups and  Websites\n\nSome of this Service Features :\n\n🚀 Fast Server\n\n1⃣ Send Mesage To Members Or Groups Or Both\n2⃣ Lock Sending Photos , Videos , Stickers , Documents , Voices and Audios Separately\n3⃣ Lock Forward To your Robot\n4⃣ Lock Adding Your Robots To Groups\n5⃣ Check Robot Membes And Groups\n6⃣ Check Your Black List\n7⃣ Put Members To Black List\n8⃣ Fast Share Your Contact\n9⃣ Change Your Start Text\nAnd several other features ...\n\n🔴 For information about how to get a token from @botFather use");
}
	elseif($textmessage == 'گرفتن لینک⚜️' ) {
	if (!file_exists("data/$from_id/coinsfree.txt")) {
	save("data/$from_id/coinsfree.txt", "0");
}
	if (!file_exists("data/$from_id/coinsdel.txt")) {
	save("data/$from_id/coinsdel.txt", "0");
}
			if (!file_exists("data/$from_id/coins.txt")) {
	save("data/$from_id/coins.txt", "");
}
SendMessage($chat_id, "کد تبلیغ شما : \n https://t.me/PvResanFatherBot?start=$from_id");
}

	elseif($textmessage == 'My Link⚜️' ) {
	if (!file_exists("data/$from_id/coinsfree.txt")) {
	save("data/$from_id/coinsfree.txt", "0");
}
	if (!file_exists("data/$from_id/coinsdel.txt")) {
	save("data/$from_id/coinsdel.txt", "0");
}
			if (!file_exists("data/$from_id/coins.txt")) {
	save("data/$from_id/coins.txt", "");
}
SendMessage($chat_id, "Your Link : \n https://t.me/PvResanFatherBot?start=$from_id");
}

	elseif($textmessage == 'My Coins⚜️' ) {
	if (!file_exists("data/$from_id/coinsfree.txt")) {
	save("data/$from_id/coinsfree.txt", "0");
}
	if (!file_exists("data/$from_id/coinsdel.txt")) {
	save("data/$from_id/coinsdel.txt", "0");
}
			if (!file_exists("data/$from_id/coins.txt")) {
	save("data/$from_id/coins.txt", "");
}
		$coins = -1;
	$fp = fopen( "data/$from_id/coins.txt", 'r');
	while( !feof( $fp)) {
    		fgets( $fp);
    		$coins ++;
	save("data/$from_id/coins2.txt", "$coins");
		
	}
	fclose( $fp);
		$coinsfree = file_get_contents("data/$from_id/coinsfree.txt");
		$coinsdel = file_get_contents("data/$from_id/coinsdel.txt");
		$coinsall = $coins + $coinsfree + $coinsdel;
SendMessage($chat_id, "Your Coins: $coinsall ");
}


	elseif($textmessage == 'سکه های من⚜️' ) {
	if (!file_exists("data/$from_id/coinsfree.txt")) {
	save("data/$from_id/coinsfree.txt", "0");
}
	if (!file_exists("data/$from_id/coinsdel.txt")) {
	save("data/$from_id/coinsdel.txt", "0");
}
			if (!file_exists("data/$from_id/coins.txt")) {
	save("data/$from_id/coins.txt", "");
}
		$coins = -1;
	$fp = fopen( "data/$from_id/coins.txt", 'r');
	while( !feof( $fp)) {
    		fgets( $fp);
    		$coins ++;
	save("data/$from_id/coins2.txt", "$coins");
		
	}
	fclose( $fp);
		$coinsfree = file_get_contents("data/$from_id/coinsfree.txt");
		$coinsdel = file_get_contents("data/$from_id/coinsdel.txt");
		$coinsall = $coins + $coinsfree + $coinsdel;
SendMessage($chat_id, "سکه های شما: $coinsall ");
}

elseif ($textmessage == '☢ حذف ربات' ) {
if (file_exists("data/$from_id/step.txt")) {
}
$botname = file_get_contents("data/$from_id/bots.txt");
if ($botname == "") {
SendMessage($chat_id,"شما هنوز هیچ رباتی نساخته اید !");
}
else {
//save("data/$from_id/step.txt","delete");
 	var_dump(makereq('sendMessage',[
	'chat_id'=>$update->message->chat->id,
	'text'=>"یکی از ربات های خود را انتخاب کنید :",
	'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
	[
	['text'=>"👉 @".$botname,'callback_data'=>"del ".$botname]
	]
	]
	])
	]));
/*
var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"یکی از ربات های خود را جهت پاک کردن انتخاب کنید : ",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
            	[
            	['text'=>$botname]
            	],
                [
                   ['text'=>"🔙 برگشت"]
                ]
                
            	],
            	'resize_keyboard'=>true
       		])
    		])); */
}
}
elseif ($textmessage == '☢ Delete a Robot' ) {
if (file_exists("data/$from_id/step.txt")) {
}
$botname = file_get_contents("data/$from_id/bots.txt");
if ($botname == "") {
SendMessage($chat_id,"Do robots have not");
}
else {
//save("data/$from_id/step.txt","delete");
 	var_dump(makereq('sendMessage',[
	'chat_id'=>$update->message->chat->id,
	'text'=>"Select one of your robots:",
	'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
	[
	['text'=>"👉 @".$botname,'callback_data'=>"del ".$botname]
	]
	]
	])
	]));
/*
var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"یکی از ربات های خود را جهت پاک کردن انتخاب کنید : ",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
            	[
            	['text'=>$botname]
            	],
                [
                   ['text'=>"🔙 برگشت"]
                ]
                
            	],
            	'resize_keyboard'=>true
       		])
    		])); */
}
}

elseif ($textmessage == 'Update RoBot to Vip⚜️' ) {
$create = file_get_contents("data/create.txt");
if ($type != "vip") {
SendMessage($chat_id,"Your account is not vip");
return;
}
$botname = file_get_contents("data/$from_id/bots.txt");
if ($botname == "") {
SendMessage($chat_id,"Make your own robot first, and then press the button.");
return;
}
save("data/$from_id/step.txt","set vipen bot");
var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"send robot id without @ ",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>"🔙 Back"]
                ]
                
            	],
            	'resize_keyboard'=>true
       		])
    		]));
}

elseif ($step == 'set vipen bot') {
$botname = file_get_contents("data/$from_id/bots.txt");
	if($textmessage != $botname){
SendMessage($chat_id,"It's not your Bots");
	}
	if($textmessage == $botname){
		save("data/$from_id/step.txt","none");
		save("bots/$textmessage/bottype.txt","vip");
SendHTML($channel,"یه ربات vip شد:\nlang: en\n*Name:* $name\n*UserName:* @$username\n*ID:* `$from_id` \n bot: $textmessage");
var_dump(makereq('sendMessage',[
         'chat_id'=>$update->message->chat->id,
         'text'=>"Robot @$textmessage was successfully vip",
  'parse_mode'=>'MarkDown',
         'reply_markup'=>json_encode([
             'keyboard'=>[
               [
                   ['text'=>"🔄 Create a Robot"],['text'=>"🚀 my robots"],['text'=>"☢ Delete a Robot"]
                ],
	                [
                   ['text'=>"Update Your robot⚙️"],
                ],
		                [
                   ['text'=>"Rise building Robat🛠"],
                ],
		                [
                   ['text'=>"Update RoBot to Vip⚜️"],['text'=>"Update Account to VIP⚜️"],
                ],
				                [
                   ['text'=>"⚜️Coins⚜️"],
                ],
                [
                   ['text'=>"ℹ️ help"],['text'=>"🔰 rules"]
                ],
                     [
                   ['text'=>"✅ Send Comment"],['text'=>"⚠️ Robot Report"]
                ],
	              [
                   ['text'=>"ℹ️my infoℹ️"],
                ],    
[
                   ['text'=>"🇦🇺 Language 🇮🇷"]          
]
                
             ],
             'resize_keyboard'=>true
         ])
      ]));
	}
}
	
elseif ($textmessage == 'کردن ربات VIP⚜️' ) {
$create = file_get_contents("data/create.txt");
if ($type != "vip") {
SendMessage($chat_id,"اکانت شما vip نیست");
return;
}
$botname = file_get_contents("data/$from_id/bots.txt");
if ($botname == "") {
SendMessage($chat_id,"اول ربات خود را بسازید و بعد این دکمه را بزنید");
return;
}
save("data/$from_id/step.txt","set vip bot");
var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"ایدی ربات را بدون @ بفرستید",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>"🔙 برگشت"]
                ]
                
            	],
            	'resize_keyboard'=>true
       		])
    		]));
}

elseif ($step == 'set vip bot') {
$botname = file_get_contents("data/$from_id/bots.txt");
	if($textmessage != $botname){
SendMessage($chat_id,"این ربات مال شما نیست");
	}
	if($textmessage == $botname){
		save("data/$from_id/step.txt","none");
		save("bots/$textmessage/bottype.txt","vip");
SendHTML($channel,"یه ربات vip شد:\nlang: fa\n*Name:* $name\n*UserName:* @$username\n*ID:* `$from_id` \n bot: $textmessage");
var_dump(makereq('sendMessage',[
         'chat_id'=>$update->message->chat->id,
         'text'=>"ربات @$textmessage با موفقیت vip شد",
  'parse_mode'=>'MarkDown',
         'reply_markup'=>json_encode([
             'keyboard'=>[
                [
                   ['text'=>"🔄 ساخت ربات"],['text'=>"🚀 ربات های من"],['text'=>"☢ حذف ربات"]
                ],
	                [
                   ['text'=>"افزایش ساخت ربات🛠"],
                ],
		                [
                   ['text'=>"کردن ربات VIP⚜️"],['text'=>"کردن اکانت VIP⚜️"],
                ],
				                [
                   ['text'=>"⚜️سکه ها⚜️"],
                ],
                [
                   ['text'=>"ℹ️ راهنما"],['text'=>"🔰 قوانین"]
                ],
                [
                   ['text'=>"✅ ارسال نظر"],['text'=>"⚠️ گزارش تخلف"]
                ],
       	                [
                   ['text'=>"ℹ️مشخصات منℹ️"],
                ],    
	[
                ['text'=>"🇦🇺 تغییر زبان 🇮🇷"]
            ]
                
             ],
             'resize_keyboard'=>true
         ])
      ]));
	}
}

elseif ($textmessage == '🔄 ساخت ربات' ) {
$create = file_get_contents("data/create.txt");
if ($create != "on") {
SendMessage($chat_id,"به دلایلی ساخت ربات توسط ادمین غیر فعال شده است برای گرفتن اطلاعات در کانال ما عضو شوید
@PvResanFather");
return;
}
$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 1) {
SendMessage($chat_id,"تعداد ربات های ساخته شده شما زیاد است !
اول باید یک ربات را پاک کنید ! $tedad");
return;
}
save("data/$from_id/step.txt","create fa bot");
var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"توکن را وارد کنید :",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>"🔙 برگشت"]
                ]
                
            	],
            	'resize_keyboard'=>true
       		])
    		]));
}

elseif ($textmessage == '⚜️سکه ها⚜️' ) {
var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"سلام کاربرگرامی به بخش سکه ها خوش امدید
					دکمه گرفتن لینک:
					شما با این دکمه میتوانید لینک خود را بگیرید و به دیگران دهید تا روی دکمه بزنند و سکه کسب کنید
					
					دکمه گرفتن سکه رایگان این دکمه هر هفته یک بار کار میکند",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
	
	                [
                   ['text'=>"گرفتن لینک⚜️"],['text'=>"سکه رایگان⚜️"]
                ],
		                [
                   ['text'=>"سکه های من⚜️"],
                ],
                [
                   ['text'=>"🔙 برگشت"]
                ]
                
            	],
            	'resize_keyboard'=>true
       		])
    		]));
}
	
elseif ($textmessage == 'سکه رایگان⚜️' ) {
if (!file_exists("data/$from_id/co.txt")) {
	save("data/$from_id/co.txt","0");
}
$free = file_get_contents("data/$from_id/co.txt");
	
if ($free != "0" ){
SendMessage($chat_id,"شما قبلا از این بخش استفاده کرده اید");
}
	
if ($free == "0" ){
$free2 = file_get_contents("data/$from_id/coinsfree.txt");
$free3 = $free2 + 2;
save("data/$from_id/coinsfree.txt","$free3");
save("data/$from_id/co.txt","1");
var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"شما دو سکه دریافت کردید",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
	
	                [
                   ['text'=>"گرفتن لینک⚜️"],['text'=>"سکه رایگان⚜️"]
                ],
		                [
                   ['text'=>"سکه های من⚜️"],
                ],
                [
                   ['text'=>"🔙 برگشت"]
                ]
                
            	],
            	'resize_keyboard'=>true
       		])
    		]));
}
}

elseif ($textmessage == '⚜️coins⚜️' ) {
var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"Hi Dear Welcome to the coin
Link button:
With this button, you can get your link and others to the buttons and coins they earn

Press this button to get free coins once a week works.",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
	
	                [
                   ['text'=>"My Link⚜"],['text'=>"Free Coins⚜️"]
                ],
		                [
                   ['text'=>"My Coins⚜️"],
                ],
                [
                   ['text'=>"🔙 Back"]
                ]
                
            	],
            	'resize_keyboard'=>true
       		])
    		]));
}
	
elseif ($textmessage == 'Free Coins⚜️' ) {
if (!file_exists("data/$from_id/co.txt")) {
	save("data/$from_id/co.txt","0");
}
$free = file_get_contents("data/$from_id/co.txt");
	
if ($free != "0" ){
SendMessage($chat_id,"You've previously used this section");
}
	
if ($free == "0" ){
$free2 = file_get_contents("data/$from_id/coinsfree.txt");
$free3 = $free2 + 2;
save("data/$from_id/coinsfree.txt","$free3");
save("data/$from_id/co.txt","1");
var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"You will receive two coins",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
	
	                [
                   ['text'=>"My Link⚜"],['text'=>"Free Coins⚜️"]
                ],
		                [
                   ['text'=>"My Coins⚜️"],
                ],
                [
                   ['text'=>"🔙 Back"]
                ]
                
            	],
            	'resize_keyboard'=>true
       		])
    		]));
}
}
	
elseif ($textmessage == '🔄 Create a Robot') {
$create = file_get_contents("data/create.txt");
if ($create != "on") {
SendMessage($chat_id,"For some reason robots have been disabled by an administrator subscribe to our channel to get information.
@PvResanFather");
return;
}
$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 1) {
SendMessage($chat_id," The number of robots you $tedad
Each person can only build other robots you can build a robot");
return;
}
save("data/$from_id/step.txt","create en bot");
var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"Please send your token ",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>"🔙 Back"]
                ]
                
            	],
            	'resize_keyboard'=>true
       		])
    		]));
}

elseif ($textmessage == 'کردن اکانت VIP⚜️' ) {
	if (!file_exists("data/$from_id/coinsfree.txt")) {
	save("data/$from_id/coinsfree.txt", "0");
}
	if (!file_exists("data/$from_id/coinsdel.txt")) {
	save("data/$from_id/coinsdel.txt", "0");
}
		$coins = -1;
	$fp = fopen( "data/$from_id/coins.txt", 'r');
	while( !feof( $fp)) {
    		fgets( $fp);
    		$coins ++;
	save("data/$from_id/coins2.txt", "$coins");
		
	}
	fclose( $fp);
		$coinsfree = file_get_contents("data/$from_id/coinsfree.txt");
		$coinsdel = file_get_contents("data/$from_id/coinsdel.txt");
		$coinsall = $coins + $coinsfree + $coinsdel;
if ($type == "vip") {
SendMessage($chat_id,"اکانت شما vip است");
return;
}
if ($coinsall <= 29) {
SendMessage($chat_id,"اکانت شما vip نیست \n برای ساخت ربات شما نیاز به ۳۰ سکه دارید\n\nسکه های شما:$coinsall");
return;
}
if ($coinsall >= 30 ) {
	fclose( $fp);
$coinsdel = file_get_contents("data/$from_id/coinsdel.txt");
$setcoin = $coinsdel - 30;
save("data/$from_id/coinsdel.txt","$setcoin");
save("data/$from_id/type.txt","vip");
		SendHTML($channel,"اکانت زیر vip شد:\nlang: fa\n*Name:* $name\n*UserName:* @$username\n*ID:* `$from_id`");
SendMessage($chat_id,"اکانت شما vip شد");
return;
}
}

elseif ($textmessage == 'Update Account to VIP⚜️' ) {
	if (!file_exists("data/$from_id/coinsfree.txt")) {
	save("data/$from_id/coinsfree.txt", "0");
}
	if (!file_exists("data/$from_id/coinsdel.txt")) {
	save("data/$from_id/coinsdel.txt", "0");
}
		$coins = -1;
	$fp = fopen( "data/$from_id/coins.txt", 'r');
	while( !feof( $fp)) {
    		fgets( $fp);
    		$coins ++;
	save("data/$from_id/coins2.txt", "$coins");
		
	}
	fclose( $fp);
		$coinsfree = file_get_contents("data/$from_id/coinsfree.txt");
		$coinsdel = file_get_contents("data/$from_id/coinsdel.txt");
		$coinsall = $coins + $coinsfree + $coinsdel ;
if ($type == "vip") {
SendMessage($chat_id,"Your account is vip");
return;
}
if ($coinsall <= 29) {
SendMessage($chat_id,"Your account is not vip\n30 coins you need to update your avvount\n\nYour coins: $coinsall");
return;
}
if ($coinsall >= 30 ) {
	fclose( $fp);
$coinsdel = file_get_contents("data/$from_id/coinsdel.txt");
$setcoin = $coinsdel - 30;
save("data/$from_id/coinsdel.txt","$setcoin");
save("data/$from_id/type.txt","vip");
SendHTML($channel,"یه اکانت vip شد:\nlang: en\n*Name:* $name\n*UserName:* @$username\n*ID:* `$from_id`");
SendMessage($chat_id,"Your account has been to vip");
return;
}
}


elseif (strpos($textmessage , 'بن کردن🚫') !== false ) {
if ($from_id == $admin || $type2 == "admin") {
var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"`برای اینکه یک شخصیو بن کنید از دستور زیر استفاده کنید`
/ban @Username 
/ban id
",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'resize_keyboard'=>true
       		])
    		]));
}
else {
SendMessage($chat_id,"⛔️ شما ادمین نیستید.");
}
}

elseif (strpos($textmessage , 'VIP کردن شخصی🏆') !== false ) {
if ($from_id == $admin || $type2 == "admin") {
var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"`برای اینکه یک شخصیو VIP کنید از دستور زیر استفاده کنید`
/setvip @Username 
/setvip id
",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'resize_keyboard'=>true
       		])
    		]));
}
else {
SendMessage($chat_id,"⛔️ شما ادمین نیستید.");
}
}

elseif (strpos($textmessage , 'خارج کردن از بن✅') !== false ) {
if ($from_id == $admin || $type2 == "admin") {
var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"`برای اینکه یک شخصیو از بن خارج کنید از دستور زیر استفاده کنید`
/unban @Username 
/unban id
",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'resize_keyboard'=>true
       		])
    		]));
}
else {
SendMessage($chat_id,"⛔️ شما ادمین نیستید.");
}
}

elseif ($textmessage == '⛔️لیست گلوبال بن⛔️' && $from_id == $admin || $textmessage == '⛔️لیست گلوبال بن⛔️' && $type2 == "admin") {
	$banname = file_get_contents("data/banlist.txt");
  $bcount = -1;
  $fp = fopen( "data/banlist.txt", 'r');
  while( !feof( $fp)) {
        fgets( $fp);
        $bcount ++;
  }
  fclose( $fp);
  SendMessage($chat_id,"🔮Banlist🔮 \n$banname\n\n number: *".$bcount."*");
}

elseif (strpos($textmessage , "/ban" ) !== false ) {
if ($from_id == $admin || $type2 == "admin") {
$text = str_replace("/ban","",$textmessage);
$myfile2 = fopen("data/banlist.txt", 'a') or die("Unable to open file!");	
fwrite($myfile2, "$text\n");
fclose($myfile2);
SendMessage($admin,"شما کاربر $text را در لیست بن لیست قرار دادید!\n برای در اوردن این کاربر از بن از دستور زیر استفاده کنید\n/unban $text");
}
else {
SendMessage($chat_id,"⛔️ شما ادمین نیستید.");
}
}

elseif (strpos($textmessage , "/unban" ) !== false ) {
if ($from_id == $admin || $type2 == "admin") {
$text = str_replace("/unban","",$textmessage);
			$newlist = str_replace($text,"",$ban);
			save("data/banlist.txt",$newlist);
SendMessage($admin,"شما کاربر $text را از لیست بن ها در اوردید!");
}
else {
typing($chat_id);
SendMessage($chat_id,"⛔️ شما ادمین نیستید.");
}
}
	elseif ($textmessage == 'آمار ربات👥' && $from_id == $admin || $textmessage == 'آمار ربات👥' && $type2 == "admin") {
	$usercount = -1;
	$fp = fopen( "data/users.txt", 'r');
	while( !feof( $fp)) {
    		fgets( $fp);
    		$usercount ++;
	}
	fclose( $fp);
	SendMessage($chat_id,"`👤 اعضای ربات`: `".$usercount."`\n");
	}

	 elseif (strpos($textmessage , "/adminmenu") !== false ) {
if ($from_id == $admin) {
{
if (!file_exists("data/$from_id/step.txt")) {
mkdir("data/$from_id");
save("data/$from_id/type.txt", "vip");
save("data/$from_id/type2.txt", "sudo");
save("data/$from_id/coinsfree.txt", "0");
save("data/$from_id/coinsdel.txt", "0");
save("data/$from_id/coins.txt", "0");
save("data/$from_id/step.txt","none");
save("data/$from_id/tedad.txt","0");
$myfile2 = fopen("data/users.txt", "a") or die("Unable to open file!");	
fwrite($myfile2, "$from_id\n");
fclose($myfile2);
}
var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"سلام ادمین به بخش مدیریت بات خوش امدید.	",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                 [
                   ['text'=>"ارسال به همه📡"],['text'=>"آمار ربات👥"],
                ], 
	                [
                   ['text'=>"⚙️ادمین کردن کسی⚜️"],['text'=>"⚙️در اوردن ادمین⚜️"],
                ], 
		                [
                   ['text'=>"بن کردن🚫"],['text'=>"⛔️لیست گلوبال بن⛔️"],['text'=>"خارج کردن از بن✅"]
                ],   
	                [
                   ['text'=>"🗑پاک کردن ربات🗑"]
                ],
		                [
                   ['text'=>"🎁کد سکه"],['text'=>"🎁فروش سکه"]
                ],
		                [
                   ['text'=>"افزایش ساخت ربات🔖"],['text'=>"کد vip کردن🎁"]
                ],
			                [
                   ['text'=>"VIP کردن شخصی🏆"],['text'=>"افزایش ساخت ربات🎁"]
                ],
                [
                   ['text'=>"رفتن به حالت اپدیت"],['text'=>"خارج شدن از حالت اپدیت"]
                ],
		                [
                   ['text'=>"/create on"],['text'=>"/create off"]
                ],
	                [
                   ['text'=>"🔙 برگشت"]
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
}
	}
else {
typing($chat_id);
SendMessage($chat_id,"شما ادمین ربات نیستید⛔️");
}
}

	 elseif (strpos($textmessage , "/menu") !== false ) {
if ($type2 == "admin") {
{
if (!file_exists("data/$from_id/step.txt")) {
mkdir("data/$from_id");
save("data/$from_id/coinsfree.txt", "0");
save("data/$from_id/coinsdel.txt", "0");
save("data/$from_id/coins.txt", "0");
save("data/$from_id/step.txt","none");
save("data/$from_id/tedad.txt","0");
$myfile2 = fopen("data/users.txt", "a") or die("Unable to open file!");	
fwrite($myfile2, "$from_id\n");
fclose($myfile2);
}
var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>"ارسال به همه📡"],['text'=>"آمار ربات👥"],
                ], 
		                [
                   ['text'=>"بن کردن🚫"],['text'=>"⛔️لیست گلوبال بن⛔️"],['text'=>"خارج کردن از بن✅"]
                ],   
	                [
                   ['text'=>"🗑پاک کردن ربات🗑"]
                ],
		                [
                   ['text'=>"افزایش ساخت ربات🔖"],
                ],
	                [
                   ['text'=>"🔙 برگشت"]
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
}
	}
else {
typing($chat_id);
SendMessage($chat_id,"شما ادمین ربات نیستید⛔️");
}
}

	elseif ($step== 'deladmin') {
				save("data/$from_id/step.txt","none");
save("data/$textmessage/type2.txt","member");
		save("admin2.txt",$newlist);
var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"با موفقیت ادمین حذف شد\n ایدی عددی ادمین : $textmessage",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                 [
                   ['text'=>"ارسال به همه📡"],['text'=>"آمار ربات👥"],
                ], 
	                [
                   ['text'=>"⚙️ادمین کردن کسی⚜️"],['text'=>"⚙️در اوردن ادمین⚜️"],
                ], 
		                [
                   ['text'=>"بن کردن🚫"],['text'=>"⛔️لیست گلوبال بن⛔️"],['text'=>"خارج کردن از بن✅"]
                ],   
	                [
                   ['text'=>"🗑پاک کردن ربات🗑"]
                ],
		                [
                   ['text'=>"🎁کد سکه"],['text'=>"🎁فروش سکه"]
                ],
		                [
                   ['text'=>"افزایش ساخت ربات🔖"],['text'=>"کد vip کردن🎁"]
                ],
			                [
                   ['text'=>"VIP کردن شخصی🏆"],['text'=>"افزایش ساخت ربات🎁"]
                ],
                [
                   ['text'=>"رفتن به حالت اپدیت"],['text'=>"خارج شدن از حالت اپدیت"]
                ],
		                [
                   ['text'=>"/create on"],['text'=>"/create off"]
                ],
	                [
                   ['text'=>"🔙 برگشت"]
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
}
	elseif ($textmessage == "⚙️در اوردن ادمین⚜️" && $from_id = $admin) {
			save("data/$from_id/step.txt","deladmin");
				var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"ایدی عددی کسیو که میخواید از ادمینی ریموو کنید را بفرستید",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>'🔙 برگشت به منو ادمین']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
		}


	elseif ($step== 'setadmin') {
				save("data/$from_id/step.txt","none");
save("data/$textmessage/type2.txt","admin");
var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"با موفقیت ادمین تعیین شد\n ایدی عددی ادمین : $textmessage",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                   [
                   ['text'=>"ارسال به همه📡"],['text'=>"آمار ربات👥"],
                ], 
	                [
                   ['text'=>"⚙️ادمین کردن کسی⚜️"],['text'=>"⚙️در اوردن ادمین⚜️"],
                ], 
		                [
                   ['text'=>"بن کردن🚫"],['text'=>"⛔️لیست گلوبال بن⛔️"],['text'=>"خارج کردن از بن✅"]
                ],   
	                [
                   ['text'=>"🗑پاک کردن ربات🗑"]
                ],
		                [
                   ['text'=>"🎁کد سکه"],['text'=>"🎁فروش سکه"]
                ],
		                [
                   ['text'=>"افزایش ساخت ربات🔖"],['text'=>"کد vip کردن🎁"]
                ],
			                [
                   ['text'=>"VIP کردن شخصی🏆"],['text'=>"افزایش ساخت ربات🎁"]
                ],
	                [
                   ['text'=>"رفتن به حالت اپدیت"],['text'=>"خارج شدن از حالت اپدیت"]
                ],
		                [
                   ['text'=>"/create on"],['text'=>"/create off"]
                ],
	                [
                   ['text'=>"🔙 برگشت"]
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
}
elseif ($textmessage == 'رفتن به حالت اپدیت' && $from_id == $admin) {
save("toupdate.txt","on");
SendMessage($chat_id,"ربات به حالت اپدیت رفت");
}
elseif ($textmessage == 'خارج شدن از حالت اپدیت' && $from_id == $admin) {
save("toupdate.txt","off");
SendMessage($chat_id,"ربات از حالت اپدیت خارج شد");
}
	

	elseif ($textmessage == "⚙️ادمین کردن کسی⚜️" && $from_id = $admin) {
			save("data/$from_id/step.txt","setadmin");
				var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"ایدی عددی کسیو که میخواید ادمین کنید را ارسال کنید
					توجه داشته باشید که ادمینی که ست میکنید نمیتواند شمارا ریموو کند
					و نمیتواند ربات vip بدهد
					و نمیتواند بخش های ربات را on و off کنن",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>'🔙 برگشت به منو ادمین']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
		}


	elseif ($step== 'reportfa') {
		save("data/$from_id/step.txt","none");
			SendHTML($admin,"Report:\n name: $name \n Username: @$username \n id: $from_id\n`Text: \n$textmessage`");
						var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"✅ پیام شما برای ادمین ارسال شد.",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>"🔄 ساخت ربات"],['text'=>"🚀 ربات های من"],['text'=>"☢ حذف ربات"]
                ],
	                [
                   ['text'=>"افزایش ساخت ربات🛠"],
                ],
		                [
                   ['text'=>"کردن ربات VIP⚜️"],['text'=>"کردن اکانت VIP⚜️"],
                ],
											                [
                   ['text'=>"⚜️سکه ها⚜️"],
                ],
                [
                   ['text'=>"ℹ️ راهنما"],['text'=>"🔰 قوانین"]
                ],
                [
                   ['text'=>"✅ ارسال نظر"],['text'=>"⚠️ گزارش تخلف"]
                ],
			                [
                   ['text'=>"ℹ️مشخصات منℹ️"],
                ],
           [
                ['text'=>"🇦🇺 تغییر زبان 🇮🇷"]
            ]
                
             ],
             'resize_keyboard'=>true
         ])
      ]));
}
	elseif ($textmessage == "⚠️ گزارش تخلف") {
			save("data/$from_id/step.txt","reportfa");
				var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"⚠️اگر رباتی تخلف انجام شده ایدی ربات را با ذکر تخلف ارسال کنید",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>'🔙 برگشت']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
		}

	elseif ($step== 'feedbackfa') {
		save("data/$from_id/step.txt","none");
			SendHTML($admin,"FeedBack:\n name: $name \n Username: @$username \n id: $from_id\n`Text: \n$textmessage`");
				var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"✅ پیام شما برای ادمین ارسال شد.",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[		                [
                   ['text'=>"🔄 ساخت ربات"],['text'=>"🚀 ربات های من"],['text'=>"☢ حذف ربات"]
                ],
	                [
                   ['text'=>"افزایش ساخت ربات🛠"],
                ],
		                [
                   ['text'=>"کردن ربات VIP⚜️"],['text'=>"کردن اکانت VIP⚜️"],
                ],
													 				                [
                   ['text'=>"⚜️سکه ها⚜️"],
                ],
                [
                   ['text'=>"ℹ️ راهنما"],['text'=>"🔰 قوانین"]
                ],
                [
                   ['text'=>"✅ ارسال نظر"],['text'=>"⚠️ گزارش تخلف"]
                ],
		                [
                   ['text'=>"ℹ️مشخصات منℹ️"],
                ],
           [
                ['text'=>"🇦🇺 تغییر زبان 🇮🇷"]
            ]
                
             ],
             'resize_keyboard'=>true
         ])
      ]));
}

	elseif ($textmessage == "✅ ارسال نظر") {
			save("data/$from_id/step.txt","feedbackfa");
				var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"✅اگه نظر و یا عقیده ای دارید اینجا بفرستید",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>'🔙 برگشت']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
		}


	elseif ($step== 'reporten') {
		save("data/$from_id/step.txt","none");
			SendMessage($admin,"Report:\n name: $name \n Username: @$username \n id: $from_id\n`Text: \n$textmessage`");
var_dump(makereq('sendMessage',[
         'chat_id'=>$update->message->chat->id,
         'text'=>"✅ Your message was sent to administrator.",
  'parse_mode'=>'MarkDown',
         'reply_markup'=>json_encode([
             'keyboard'=>[
                [
                   ['text'=>"🔄 Create a Robot"],['text'=>"🚀 my robots"],['text'=>"☢ Delete a Robot"]
                ],
	                [
                   ['text'=>"Update Your robot⚙️"],
                ],
		                [
                   ['text'=>"Rise building Robat🛠"],
                ],
		                [
                   ['text'=>"Update RoBot to Vip⚜️"],['text'=>"Update Account to VIP⚜️"],
                ],
				                [
                   ['text'=>"⚜️Coins⚜️"],
                ],
                [
                   ['text'=>"ℹ️ help"],['text'=>"🔰 rules"]
                ],
                     [
                   ['text'=>"✅ Send Comment"],['text'=>"⚠️ Robot Report"]
                ],
		              [
                   ['text'=>"ℹ️my infoℹ️"],
                ],
[
                   ['text'=>"🇦🇺 Language 🇮🇷"]          
]
             ],
             'resize_keyboard'=>true
         ])
      ]));
}
	elseif ($textmessage == "⚠️ Robot Report") {
			save("data/$from_id/step.txt","reporten");
				var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"If the robot with the robot Idi violation for abuse⚠️",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>'🔙 Back']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
		}

	elseif ($step== 'feedbacken') {
		save("data/$from_id/step.txt","none");
			SendMessage($admin,"FeedBack:\n name: $name \n Username: @$username \n id: $from_id\n`Text: \n$textmessage`");
var_dump(makereq('sendMessage',[
         'chat_id'=>$update->message->chat->id,
         'text'=>"✅ Your message was sent to administrator.",
  'parse_mode'=>'MarkDown',
         'reply_markup'=>json_encode([
             'keyboard'=>[
                [
                   ['text'=>"🔄 Create a Robot"],['text'=>"🚀 my robots"],['text'=>"☢ Delete a Robot"]
                ],
	                [
                   ['text'=>"Update Your robot⚙️"],
                ],
		                [
                   ['text'=>"Rise building Robat🛠"],
                ],
		                [
                   ['text'=>"Update RoBot to Vip⚜️"],['text'=>"Update Account to VIP⚜️"],
                ],
				                [
                   ['text'=>"⚜️Coins⚜️"],
                ],
                [
                   ['text'=>"ℹ️ help"],['text'=>"🔰 rules"]
                ],
                     [
                   ['text'=>"✅ Send Comment"],['text'=>"⚠️ Robot Report"]
                ],
		              [
                   ['text'=>"ℹ️my infoℹ️"],
                ],
[
                   ['text'=>"🇦🇺 Language 🇮🇷"]          
]
             ],
             'resize_keyboard'=>true
         ])
      ]));
}
	elseif ($textmessage == "✅ Send Comment") {
			save("data/$from_id/step.txt","feedbacken");
				var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"If you believe you have a comment or send it here ✅",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>'🔙 Back']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
		}



	elseif ($step== 'Send To All') {
		SendMessage($chat_id,"پیام در حال `ارسال` میباشد");
		save("data/$from_id/step.txt","none");
		$fp = fopen( "data/users.txt", 'r');
		while( !feof( $fp)) {
 			$users = fgets( $fp);
			SendMessage($users,$textmessage);
		}
		SendMessage($chat_id,"✅ پیام شما به تمامی `کاربران رباتتان`ارسال شد.");
		
	}
	elseif (strpos($textmessage , "ارسال به همه📡") !== false ) {
		if ($from_id == $admin || $type2 == "admin") {
			save("data/$from_id/step.txt","Send To All");
				var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"💠 متن خود را بنویسید :",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>'🔙 برگشت به منو ادمین']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
		}
		else {
			SendMessage($chat_id,"You Are Not Admin");
		}
	}

	elseif ($step == 'del bots' ) {
		save("data/$from_id/step.txt","none");
		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"ربات با موفقیت حذف شد.",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>'🔙 برگشت به منو ادمین']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
		unlink("bots/$textmessage/index.php");
	}

elseif ($textmessage == '🗑پاک کردن ربات🗑' && $from_id == $admin || $textmessage == '🗑پاک کردن ربات🗑' && $type2 == "admin") {
	save("data/$from_id/step.txt","del bots");
	var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"ایدی رباتی رو که میخواید حذف کنید را بفرستید",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=> '🔙 برگشت به منو ادمین']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
	}

	elseif ($step == 'code VIP' ) {
		save("data/$from_id/step.txt","none");
		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"کد وی ای پی تغییر کرد به
$textmessage",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=> '🔙 برگشت به منو ادمین']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
		save("code.txt","$textmessage");
	}

elseif ($textmessage == 'کد vip کردن🎁' && $from_id == $admin) {
	save("data/$from_id/step.txt","code VIP");
	var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"کد را وارد کنید",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=> '🔙 برگشت به منو ادمین']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
	}

///////////کد vip

elseif (strpos($textmessage , "$code") !== false ) {
			save("code.txt","A8K653jdg83LFY873lsdnvzu8U4");
			save("data/$from_id/type.txt","vip");
			SendMessage($chat_id,"اکانت شما vip شد");
		}

elseif (strpos($textmessage , "$code2") !== false ) {
			save("code2.txt","A8K65f3jdg83LFY8a73lsdnvzu8wU4");
$tedaddel = file_get_contents("data/$from_id/tedad.txt");
$settedad = $tedaddel - 1;
			save("data/$from_id/tedad.txt","$settedad");
			SendHTML($channel,"کد زده شد:\n*Name:* $name\n*UserName:* @$username\n*ID:* `$from_id`");
				var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"تبریک🏆
					شما میتوانید یه ربات دیگر هم بسازید",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>'🔙 برگشت']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
		}

elseif (strpos($textmessage , "$code3") !== false ) {
			save("codecoins.txt","A8K65f3jdg83LFY8a73lsdnvzu8wU4");
		if (!file_exists("data/$from_id/coinsfree.txt")) {
	save("data/$from_id/coinsfree.txt", "0");
}
	if (!file_exists("data/$from_id/coinsdel.txt")) {
	save("data/$from_id/coinsdel.txt", "0");
}
			if (!file_exists("data/$from_id/coins.txt")) {
	save("data/$from_id/coins.txt", "");
}
	$free2 = file_get_contents("data/$from_id/coinsfree.txt");
$free3 = $free2 + $tedadcoins;
			save("data/$from_id/coinsfree.txt","$free3");
			save("tedadcoins.txt","0");
			SendHTML($channel,"کد زده شد:\n*Name:* $name\n*UserName:* @$username\n*ID:* `$from_id`");
				var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"تبریک🏆
				 شما $tedadcoins سکه گرفتید",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>'🔙 برگشت']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
		}


	elseif ($step == 'code tedad' ) {
		save("data/$from_id/step.txt","none");
		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"کد افزایش تعداد ساخت ربات تغییر کرد به
				$textmessage	",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>'🔙 برگشت به منو ادمین']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
		save("code2.txt","$textmessage");
	}

elseif ($textmessage == 'افزایش ساخت ربات🎁' && $from_id == $admin || $textmessage == 'افزایش ساخت ربات🎁' && $type2 == "admin") {
	save("data/$from_id/step.txt","code tedad");
	var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"کد را وارد کنید",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=> '🔙 برگشت به منو ادمین']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
	}


elseif ($step == 'set namee') {
		save("data/$from_id/step.txt","set adad");
		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"ایدی عددی شخصیو که میخواید تعداد ساخت رباتشو افزایش بدید را بنویسید",
			'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
				
                 [
                   ['text'=>'🔙 برگشت به منو ادمین']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
			save("data/tedad.txt",$textmessage);
	}
	elseif ($step == 'set adad') {
		save("data/$from_id/step.txt","none");
		$last = file_get_contents("data/tedad.txt");
			$myfile2 = fopen("data/tedad.txt", "a") or die("Unable to open file!");	
			fwrite($myfile2, "$last\n");
			fclose($myfile2);
			save("data/$last/tedad.txt","$textmessage");
		
		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"✅ ذخیره شد.",
			'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                 [
                   ['text'=>'🔙 برگشت به منو ادمین']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
		
			
	}
	elseif ($textmessage == '🎁کد سکه' && $from_id == $admin || $textmessage == '🎁کد سکه' && $type2 == "admin") {
				save("data/$from_id/step.txt","set coins");
		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"کد را وارد کنید.",
			'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
	
                 [
                   ['text'=>'🔙 برگشت به منو ادمین']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
	}


elseif ($step == 'set coins') {
		save("data/$from_id/step.txt","set adad coins");
		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"تعداد سکه هایی که میخواید اضافه شود را یادداشت کنید",
			'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
				
                 [
                   ['text'=>'🔙 برگشت به منو ادمین']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
			save("codecoins.txt",$textmessage);
	}
	elseif ($step == 'set adad coins') {
		save("data/$from_id/step.txt","none");
		save("tedadcoins.txt","$textmessage");
		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"✅ ذخیره شد.
					کد : 
					$code3
					تعداد
					$textmessage",
			'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                 [
                   ['text'=>'🔙 برگشت به منو ادمین']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
		
			
	}
	elseif ($textmessage == 'افزایش ساخت ربات🔖' && $from_id == $admin || $textmessage == 'افزایش ساخت ربات🔖' && $type2 == "admin") {
				save("data/$from_id/step.txt","set namee");
		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>" ایدی کاربر را وارد کنید",
			'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
	
                 [
                   ['text'=>'🔙 برگشت به منو ادمین']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
	}


elseif ($textmessage == '/update' && $from_id == $admin) {
SendMessage($chat_id,"در حال اپدیت شدن...");	
$all_member = fopen( "data/bots.txt", 'r');
    while( !feof( $all_member)) {
       $user = fgets( $all_member);
      $user = str_replace("\n",'',$user);
	  $user = str_replace(" ",'',$user);
	  $token = file_get_contents("bots/$user/token.txt");
	  $admin = file_get_contents("bots/$user/admin.txt");
	  $source = file_get_contents("bot/index.php");
		$source = str_replace("**TOKENSS**",$token,$source);
		$source = str_replace("**ADMINSS**",$admin,$source);
	  $idbot = file_get_contents("bots/$user/idbot.txt");
	  $source2 = file_get_contents("bot/bot/index.php");
		$source2 = str_replace("**idbot**",$idbot,$source);
		save("bots/$user/bot/index.php",$source2);	
		save("bots/$user/index.php",$source);	
    }
	SendMessage($chat_id,"اپدیت تمام شد
	تمام ربات ها اپدیت شدند");
}

elseif ($textmessage == "ℹ️مشخصات منℹ️" ) {
SendHTML($chat_id,"
Name: $name

Username: @$username

ID: $from_id

Account: $type

Rank: $type2");
}

elseif ($textmessage == "ℹ️my infoℹ️" ) {
SendHTML($chat_id,"
Name: $name

Username: @$username

ID: $from_id

Account: $type

Rank: $type2");
}



else
{
SendMessage($chat_id,"پیام شما پیدا نشد❌\n Your command could not be found❌");
}
?>