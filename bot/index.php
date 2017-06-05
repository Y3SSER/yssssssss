<?php
define('API_KEY','**TOKENSS**');
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
$bottype = file_get_contents('bottype.txt');
$chat_id = $update->message->chat->id;
$message_id = $update->message->message_id;
$from_id = $update->message->from->id;
$name = $update->message->from->first_name;
$username = $update->message->from->username;
$textmessage = isset($update->message->text)?$update->message->text:'';
$txtmsg = $update->message->text;
$reply = $update->message->reply_to_message->forward_from->id;
$stickerid = $update->message->reply_to_message->sticker->file_id;
$admin = **ADMINSS**;
$idbotd = "**idbot**";
$step = file_get_contents("data/".$from_id."/step.txt");
$ban = file_get_contents('data/banlist.txt');
$pishfarz = file_get_contents('data/pishfarz.txt');
$channel = file_get_contents('data/channel.txt');
$backen = file_get_contents('data/bachen.txt');
$backfa = file_get_contents('data/bachfa.txt');
$change = file_get_contents('data/change.txt');
$start = file_get_contents('data/start.txt');
$startfa = file_get_contents('data/startfa.txt');
$starten = file_get_contents('data/starten.txt');
$banned = file_get_contents('data/banned.txt');
$startch = file_get_contents('data/startch.txt');
$schannel = file_get_contents('data/schannel.txt');
$startbot = file_get_contents('data/startbot.txt');
$sendbot = file_get_contents('data/sendbot.txt');
$type = file_get_contents("data/$from_id/type.txt");
//-------
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
$inch = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$startch&user_id=".$from_id);

$inch2 = file_get_contents("https://api.telegram.org/bot325972685:AAFZZsVJ4ol1dDYjggp_87-KbSOYx0piI2c/getChatMember?chat_id=@PvResanFather&user_id=".$from_id);

if (strpos($inch2 ,'"status":"left"' && $from_id == $admin) !== false ) {
SendMessage($chat_id,"برای استفاده از ربات اول در کانال ما عضو شوید.
@PvResanFather
این متن فقط برای ادمین نمایش داده میشود

To use the first robot subscribe to our channel.
@PvResanFather
this text just show for admins");
}

	elseif (strpos($inch ,'"status":"left"') !== false ) {
SendMessage($chat_id,"$schannel");
}

elseif (strpos($ban , "$from_id") !== false  ) {
SendMessage($chat_id,"$banned");
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
                        ['text'=>"به کانال ما بپیوندید - Pease join to my channel",'url'=>"https://telegram.me/$channel"]
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
                        ['text'=>"به کانال ما بپیوندید - Pleas join to my channel",'url'=>"https://telegram.me/$channel"]
                    ]
                ]
            ])
        ])
    );
 }
}
elseif ($textmessage == '🔙 برگشت - Back') {
save("data/$from_id/step.txt","none");
var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"$change",
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
elseif ($textmessage == '🔙 برگشت') {
save("data/$from_id/step.txt","none");
var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"$backfa",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>"🔄 ساخت ربات"],['text'=>"🚀 ربات های من"],['text'=>"☢ حذف ربات"]
                ],
                [
                   ['text'=>"ℹ️ راهنما"],['text'=>"🔰 قوانین"]
                ],
                [
                   ['text'=>"✅ ارسال نظر"],['text'=>"⚠️ گزارش تخلف"]
                ],
           [
                ['text'=>"🇦🇺 تغییر زبان 🇮🇷"]
            ]
                
            	],
            	'resize_keyboard'=>true
       		])
    		]));
}
elseif ($textmessage == '🔙 Back') {
save("data/$from_id/step.txt","none");
var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"$backen",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>"🔄 Create a Robot"],['text'=>"🚀 my robots"],['text'=>"☢ Delete a Robot"]
                ],
                [
                   ['text'=>"ℹ️ help"],['text'=>"🔰 rules"]
                ],
                     [
                   ['text'=>"✅ Send Comment"],['text'=>"⚠️ Robot Report"]
                ],
[
                   ['text'=>"🇦🇺 Language 🇮🇷"]          
]
                
            	],
            	'resize_keyboard'=>true
       		])
    		]));
}
elseif ($textmessage == 'بازگشت به منو ادمین' && $from_id == $admin) {
save("data/$from_id/step.txt","none");
var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"به منو ادمین خوش آمدید",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
		                [
                   ['text'=>"کانال ما"],
                ],
                [
                   ['text'=>"ارسال به همه"],['text'=>"آمار"],['text'=>"فوروارد همگانی"],
                ],
	                [
                   ['text'=>"مدیریت ادمین"],
                ],
                [
                   ['text'=>"خارج کردن از بن"],['text'=>"آمار افراد بن"],['text'=>"بن کردن"]
                ],
               [
                   ['text'=>"ست کردن ایدی کانال"],['text'=>"ست کردن ایدی کانال وروودی"],
                ],
				               [
                   ['text'=>"حذف کردن ربات"],['text'=>"پشتیبانی"]
                ],
                [
                   ['text'=>"ویرایش پیغام ها"],['text'=>"ویرایش پیغام ربات های ساخته شده"]
                ],
			                [
                   ['text'=>"پاسخ سریع"],
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
}
elseif ($textmessage == 'بازگشت به منو ادمین' && $type == "admin") {
save("data/$from_id/step.txt","none");
var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"به منو ادمین خوش آمدید",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
		                [
                   ['text'=>"کانال ما"],
                ],
                [
                   ['text'=>"ارسال به همه"],['text'=>"آمار"]
                ],
				      [
                   ['text'=>"حذف کردن ربات"],['text'=>"پشتیبانی"]
                ],
                [
                   ['text'=>"ویرایش پیغام ها"],['text'=>"ویرایش پیغام ربات های ساخته شده"]
                ],
			                [
                   ['text'=>"پاسخ سریع"],
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
		if (file_exists("bots/$un/index.php")) {
		$source = file_get_contents("bot/index.php");
		$source = str_replace("**TOKEN**",$token,$source);
		$source = str_replace("**ADMIN**",$from_id,$source);
		save("bots/$un/index.php",$source);	
		file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=https://wcwaiz.000webhostapp.com/PvResanFather/bots/$idbotd/bots/$un/index.php");
var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"🚀 ربات شما با موفقیت آپدیت شده است 
					
[برای ورود به ربات خود کلیک کنید 😃](https://telegram.me/$un)",
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
		else {
		save("data/$from_id/tedad.txt","0");
		save("data/$from_id/step.txt","none");
		save("data/$from_id/bots.txt","$un");
		
		mkdir("bots/$un");
		mkdir("bots/$un/data");
		mkdir("bots/$un/data/btn");
		mkdir("bots/$un/data/words");
		mkdir("bots/$un/data/profile");
		mkdir("bots/$un/data/setting");
		
		save("bots/$un/data/blocklist.txt","");
		save("bots/$un/data/last_word.txt","");
		save("bots/$un/data/pmsend_txt.txt","$sendbot");
		save("bots/$un/data/start_txt.txt","$startbot");
		save("bots/$un/data/forward_id.txt","");
		save("bots/$un/data/users.txt","$from_id\n");
		mkdir("bots/$un/data/$from_id");
		save("bots/$un/data/$from_id/type.txt","admin");
		save("bots/$un/data/$from_id/step.txt","none");
	
		save("bots/$un/token.txt",$token);
		save("bots/$un/admin.txt",$from_id);
	    $myfile2 = fopen("data/bots.txt", "a") or die("Unable to open file!"); 
        fwrite($myfile2, "$un\n");
        fclose($myfile2);	
			
		save("bots/$un/data/btn/btn1_name","");
		save("bots/$un/data/btn/btn2_name","");
		save("bots/$un/data/btn/btn3_name","");
		save("bots/$un/data/btn/btn4_name","");
		
		save("bots/$un/data/btn/btn1_post","");
		save("bots/$un/data/btn/btn2_post","");
		save("bots/$un/data/btn/btn3_post","");
		save("bots/$un/data/btn/btn4_post","");
	
		save("bots/$un/data/setting/sticker.txt","✅");
		save("bots/$un/data/setting/video.txt","✅");
		save("bots/$un/data/setting/voice.txt","✅");
		save("bots/$un/data/setting/file.txt","✅");
		save("bots/$un/data/setting/photo.txt","✅");
		save("bots/$un/data/setting/music.txt","✅");
		save("bots/$un/data/setting/forward.txt","✅");
		save("bots/$un/data/setting/joingp.txt","✅");
		$source = file_get_contents("bot/index.php");
		$source = str_replace("**TOKEN**",$token,$source);
		$source = str_replace("**ADMIN**",$from_id,$source);
		save("bots/$un/index.php",$source);	
		file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=https://wcwaiz.000webhostapp.com/PvResanFather/bots/$idbotd/bots/$un/index.php");
var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"🚀 ربات شما با موفقیت نصب شده است
					
[برای ورود به ربات خود کلیک کنید 😃](https://telegram.me/$un)",		
                'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>"🔙 برگشت - Back"]
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
		SendMessage($chat_id,"Are making robots...");
		if (file_exists("bots/$un/index.php")) {
		$source = file_get_contents("bot/index.php");
		$source = str_replace("**TOKEN**",$token,$source);
		$source = str_replace("**ADMIN**",$from_id,$source);
		save("bots/$un/index.php",$source);	
		file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=https://wcwaiz.000webhostapp.com/PvResanFather/bots/$idbotd/bots/$un/index.php");
var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"Your Robot Has been Updated 🚀
					
[Click to start Bot](https://telegram.me/$un)",
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
		else {
		save("data/$from_id/tedad.txt","0");
		save("data/$from_id/step.txt","none");
		save("data/$from_id/bots.txt","$un");
		
		mkdir("bots/$un");
		mkdir("bots/$un/data");
		mkdir("bots/$un/data/btn");
		mkdir("bots/$un/data/words");
		mkdir("bots/$un/data/profile");
		mkdir("bots/$un/data/setting");
		
		save("bots/$un/data/blocklist.txt","");
		save("bots/$un/data/last_word.txt","");
		save("bots/$un/data/pmsend_txt.txt","$sendbot");
		save("bots/$un/data/start_txt.txt","$startbot");
		save("bots/$un/data/forward_id.txt","");
		save("bots/$un/data/users.txt","$from_id\n");
		mkdir("bots/$un/data/$from_id");
		save("bots/$un/data/$from_id/type.txt","admin");
		save("bots/$un/data/$from_id/step.txt","none");
			
		save("bots/$un/data/btn/btn1_name","");
		save("bots/$un/data/btn/btn2_name","");
		save("bots/$un/data/btn/btn3_name","");
		save("bots/$un/data/btn/btn4_name","");
		
		save("bots/$un/data/btn/btn1_post","");
		save("bots/$un/data/btn/btn2_post","");
		save("bots/$un/data/btn/btn3_post","");
		save("bots/$un/data/btn/btn4_post","");
			
			save("bots/$un/token.txt",$token);
		save("bots/$un/admin.txt",$from_id);
	    $myfile2 = fopen("data/bots.txt", "a") or die("Unable to open file!"); 
        fwrite($myfile2, "$un\n");
        fclose($myfile2);
			
		save("bots/$un/data/setting/sticker.txt","✅");
		save("bots/$un/data/setting/video.txt","✅");
		save("bots/$un/data/setting/voice.txt","✅");
		save("bots/$un/data/setting/file.txt","✅");
		save("bots/$un/data/setting/photo.txt","✅");
		save("bots/$un/data/setting/music.txt","✅");
		save("bots/$un/data/setting/forward.txt","✅");
		save("bots/$un/data/setting/joingp.txt","✅");
		$source = file_get_contents("bot/index.php");
		$source = str_replace("**TOKEN**",$token,$source);
		$source = str_replace("**ADMIN**",$from_id,$source);
		save("bots/$un/index.php",$source);	
		file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=https://wcwaiz.000webhostapp.com/PvResanFather/bots/$idbotd/bots/$un/index.php");
var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>" Your Robot Has been Created🚀 
					
[Click to start Bot](https://telegram.me/$un)",		
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
}
}

	elseif ($step== 'reportfa') {
		save("data/$from_id/step.txt","none");
			SendMessage($admin,"Report:\n name: $name \n Username: @$username \n id: $from_id\n`Text: \n$textmessage`");
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
                   ['text'=>"ℹ️ راهنما"],['text'=>"🔰 قوانین"]
                ],
                [
                   ['text'=>"✅ ارسال نظر"],['text'=>"⚠️ گزارش تخلف"]
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
			SendMessage($admin,"FeedBack:\n name: $name \n Username: @$username \n id: $from_id\n`Text: \n$textmessage`");
				var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"✅ پیام شما برای ادمین ارسال شد.",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[		                [
                   ['text'=>"🔄 ساخت ربات"],['text'=>"🚀 ربات های من"],['text'=>"☢ حذف ربات"]
                ],
                [
                   ['text'=>"ℹ️ راهنما"],['text'=>"🔰 قوانین"]
                ],
                [
                   ['text'=>"✅ ارسال نظر"],['text'=>"⚠️ گزارش تخلف"]
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
                   ['text'=>"ℹ️ help"],['text'=>"🔰 rules"]
                ],
                     [
                   ['text'=>"✅ Send Comment"],['text'=>"⚠️ Robot Report"]
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
                   ['text'=>"ℹ️ help"],['text'=>"🔰 rules"]
                ],
                     [
                   ['text'=>"✅ Send Comment"],['text'=>"⚠️ Robot Report"]
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
save("data/$from_id/step.txt","none");
save("data/$from_id/tedad.txt","0");
save("data/$from_id/bots.txt","");
$myfile2 = fopen("data/users.txt", "a") or die("Unable to open file!"); 
fwrite($myfile2, "$from_id\n");
fclose($myfile2);
}
if (!file_exists("data/$from_id/type.txt")) {
save("data/$from_id/type.txt","member");
}
var_dump(makereq('sendMessage',[
         'chat_id'=>$update->message->chat->id,
         'text'=>"$start",
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
save("data/$from_id/step.txt","none");
save("data/$from_id/tedad.txt","0");
save("data/$from_id/bots.txt","");
$myfile2 = fopen("data/users.txt", "a") or die("Unable to open file!"); 
fwrite($myfile2, "$from_id\n");
fclose($myfile2);
}
if (!file_exists("data/$from_id/type.txt")) {
save("data/$from_id/type.txt","member");
}
var_dump(makereq('sendMessage',[
         'chat_id'=>$update->message->chat->id,
         'text'=>"$change",
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
save("data/$from_id/step.txt","none");
save("data/$from_id/tedad.txt","0");
save("data/$from_id/bots.txt","");
$myfile2 = fopen("data/users.txt", "a") or die("Unable to open file!"); 
fwrite($myfile2, "$from_id\n");
fclose($myfile2);
}
if (!file_exists("data/$from_id/type.txt")) {
save("data/$from_id/type.txt","member");
}
var_dump(makereq('sendMessage',[
         'chat_id'=>$update->message->chat->id,
         'text'=>"$change",
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
save("data/$from_id/step.txt","none");
save("data/$from_id/tedad.txt","0");
save("data/$from_id/bots.txt","");
$myfile2 = fopen("data/users.txt", "a") or die("Unable to open file!"); 
fwrite($myfile2, "$from_id\n");
fclose($myfile2);
}
if (!file_exists("data/$from_id/type.txt")) {
save("data/$from_id/type.txt","member");
}
var_dump(makereq('sendMessage',[
         'chat_id'=>$update->message->chat->id,
         'text'=>"$starten",
  'parse_mode'=>'MarkDown',
         'reply_markup'=>json_encode([
             'keyboard'=>[
                [
                   ['text'=>"🔄 Create a Robot"],['text'=>"🚀 my robots"],['text'=>"☢ Delete a Robot"]
                ],
                [
                   ['text'=>"ℹ️ help"],['text'=>"🔰 rules"]
                ],
                     [
                   ['text'=>"✅ Send Comment"],['text'=>"⚠️ Robot Report"]
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
save("data/$from_id/step.txt","none");
save("data/$from_id/tedad.txt","0");
save("data/$from_id/bots.txt","");
$myfile2 = fopen("data/users.txt", "a") or die("Unable to open file!"); 
fwrite($myfile2, "$from_id\n");
fclose($myfile2);
}
if (!file_exists("data/$from_id/type.txt")) {
save("data/$from_id/type.txt","member");
}
var_dump(makereq('sendMessage',[
         'chat_id'=>$update->message->chat->id,
         'text'=>"$startfa",
  'parse_mode'=>'MarkDown',
         'reply_markup'=>json_encode([
             'keyboard'=>[
                [
                   ['text'=>"🔄 ساخت ربات"],['text'=>"🚀 ربات های من"],['text'=>"☢ حذف ربات"]
                ],
                [
                   ['text'=>"ℹ️ راهنما"],['text'=>"🔰 قوانین"]
                ],
                [
                   ['text'=>"✅ ارسال نظر"],['text'=>"⚠️ گزارش تخلف"]
                ],
           [
                ['text'=>"🇦🇺 تغییر زبان 🇮🇷"]
            ]
                
             ],
             'resize_keyboard'=>true
         ])
      ]));
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
                   ['text'=>"🔙 برگشت - Back"]
                ]
                
            	],
            	'resize_keyboard'=>true
       		])
    		])); */
}
}
elseif ($textmessage == '🔄 ساخت ربات' ) {
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
elseif ($textmessage == '🔄 Create a Robot') {
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
	elseif (strpos($textmessage , "/ban" ) !== false ) {
if ($from_id == $admin) {
$text = str_replace("/ban","",$textmessage);
$myfile2 = fopen("data/banlist.txt", 'a') or die("Unable to open file!");	
fwrite($myfile2, "$text\n");
fclose($myfile2);
SendMessage($admin,"شما کاربر $text را در لیست بن لیست قرار دادید!\n برای در اوردن این کاربر از بن از دستور زیر استفاده کنید\n/unban$text");
}
else {
SendMessage($chat_id,"⛔️ شما ادمین نیستید.");
}
}
elseif (strpos($textmessage , "/unban" ) !== false ) {
if ($from_id == $admin) {
$text = str_replace("/unban","",$textmessage);
			$newlist = str_replace($text,"",$ban);
			save("data/banlist.txt",$newlist);
SendMessage($admin,"شما کاربر $text را از لیست بن ها در اوردید!");
}
else {
SendMessage($chat_id,"⛔️ شما ادمین نیستید.");
}
}

elseif ($textmessage == "کانال ما" ) {
SendMessage($chat_id,"ایدی کانال ما:\n@PvResanFather");
}
elseif ($textmessage == "/creator" && $bottype == "free") {
SendMessage($chat_id,"ساخته شده توسط: @PvResanFatherBot\n\nMade by: @PvResanFatherBot");
}
elseif ($textmessage == "/Creator" && $bottype == "free") {
SendMessage($chat_id,"ساخته شده توسط: @PvResanFatherBot\n\nMade by: @PvResanFatherBot");
}
elseif ($textmessage == "ست کردن ایدی کانال وروودی" && $bottype == "free" ) {
SendMessage($chat_id,"ربات شما VIP نمیباشد");
}
elseif ($textmessage == "ویرایش متن شروع برای عضویت در کانال" && $bottype == "free" ) {
SendMessage($chat_id,"ربات شما VIP نمیباشد");
}
elseif ($textmessage == "پشتیبانی" ) {
SendMessage($chat_id,"برای گرفتن پشتیبانی به ربات @PvResanFatherDevBot بروید");
}
elseif ($textmessage == "VIP کردن ربات خود" && $bottype == "free" ) {
SendMessage($chat_id,"سلام کاربرگرامی \nبرای VIP کردن ربات خود به ربات\n@PvResanFatherDevBot\n بروید\nخصوصیات VIP\n آزاد شدن تمام دکمه ها\n اپدیت VIP زودتر میاید\nبرای وروود به ربات حتما باید عضو کانال شما بشوند\n دستور /creator از بین می رود\nو ...\nکانال : @PvResanFather");
}
elseif ($textmessage == "/id" ) {
SendMessage($chat_id,"*Name:* $name\n*Username:* @$username\n*ID:* $from_id");
}
elseif ($step == 'Edit Message ban' ) {
		save("data/$from_id/step.txt","none");
		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"پیام بن شدن آپدیت شد.",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
				                [
                   ['text'=>"کانال ما"],
                ],
                [
                   ['text'=>"ارسال به همه"],['text'=>"آمار"],['text'=>"فوروارد همگانی"]
                ],
		                [
                   ['text'=>"مدیریت ادمین"],
                ],
                [
                   ['text'=>"خارج کردن از بن"],['text'=>"آمار افراد بن"],['text'=>"بن کردن"]
                ],
               [
                   ['text'=>"ست کردن ایدی کانال"],['text'=>"ست کردن ایدی کانال وروودی"],
                ],
				               [
                   ['text'=>"حذف کردن ربات"],['text'=>"پشتیبانی"]
                ],
                [
                   ['text'=>"ویرایش پیغام ها"],['text'=>"ویرایش پیغام ربات های ساخته شده"]
                ],
			                [
                   ['text'=>"پاسخ سریع"],
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
		save("data/banned.txt",$textmessage);
	}

elseif ($textmessage == 'ویرایش متن بن شدن' && $from_id == $admin || $textmessage == 'ویرایش متن بن شدن' && $type == "admin") {
	$sttxt = file_get_contents("data/banned.txt");
	save("data/$from_id/step.txt","Edit Message ban");
	var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"برای تغییر پیام بن شدن 
متن جدید را ارسال کنید! 
متن حاظر:
$sttxt",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=> 'بازگشت به منو ادمین']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
	}


	elseif ($step == 'Edit Message change' ) {
		save("data/$from_id/step.txt","none");
		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"پیام عوض کردن زبان ربات آپدیت شد.",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
				                [
                   ['text'=>"کانال ما"],
                ],
                [
                   ['text'=>"ارسال به همه"],['text'=>"آمار"],['text'=>"فوروارد همگانی"]
                ],
	                [
                   ['text'=>"مدیریت ادمین"],
                ],
                [
                   ['text'=>"خارج کردن از بن"],['text'=>"آمار افراد بن"],['text'=>"بن کردن"]
                ],
               [
                   ['text'=>"ست کردن ایدی کانال"],['text'=>"ست کردن ایدی کانال وروودی"],
                ],
				               [
                   ['text'=>"حذف کردن ربات"],['text'=>"پشتیبانی"]
                ],
                [
                   ['text'=>"ویرایش پیغام ها"],['text'=>"ویرایش پیغام ربات های ساخته شده"]
                ],
			                [
                   ['text'=>"پاسخ سریع"],
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
		save("data/change.txt",$textmessage);
	}

elseif ($textmessage == 'ویرایش متن تغییر زبان' && $from_id == $admin || $textmessage == 'ویرایش متن تغییر زبان' && $type == "admin") {
	$sttxt = file_get_contents("data/change.txt");
	save("data/$from_id/step.txt","Edit Message change");
	var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"برای تغییر پیام انتخاب زبان 
متن جدید را ارسال کنید!
متن حاظر:
$sttxt",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=> 'بازگشت به منو ادمین']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
	}

	elseif ($step == 'Edit Message start' ) {
		save("data/$from_id/step.txt","none");
		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"پیام شروع شما آپدیت شد.",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
				                [
                   ['text'=>"کانال ما"],
                ],
                [
                   ['text'=>"ارسال به همه"],['text'=>"آمار"],['text'=>"فوروارد همگانی"]
                ],
		                [
                   ['text'=>"مدیریت ادمین"],
                ],
                [
                   ['text'=>"خارج کردن از بن"],['text'=>"آمار افراد بن"],['text'=>"بن کردن"]
                ],
               [
                   ['text'=>"ست کردن ایدی کانال"],['text'=>"ست کردن ایدی کانال وروودی"],
                ],
				               [
                   ['text'=>"حذف کردن ربات"],['text'=>"پشتیبانی"]
                ],
                [
                   ['text'=>"ویرایش پیغام ها"],['text'=>"ویرایش پیغام ربات های ساخته شده"]
                ],
			                [
                   ['text'=>"پاسخ سریع"],
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
		save("data/start.txt",$textmessage);
	}

elseif ($textmessage == 'ویرایش متن شروع' && $from_id == $admin || $textmessage == 'ویرایش متن شروع' && $type == "admin") {
	$sttxt = file_get_contents("data/start.txt");
	save("data/$from_id/step.txt","Edit Message start");
	var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"برای تغییر پیام شروع 
متن جدید را ارسال کنید!
متن حاظر:
$sttxt",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=> 'بازگشت به منو ادمین']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
	}


	elseif ($step == 'Edit Message Delivery' ) {
		save("data/$from_id/step.txt","none");
		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"پیام پیشفرض شما آپدیت شد.",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
				                [
                   ['text'=>"کانال ما"],
                ],
                [
                   ['text'=>"ارسال به همه"],['text'=>"آمار"],['text'=>"فوروارد همگانی"]
                ],
		                [
                   ['text'=>"مدیریت ادمین"],
                ],
                [
                   ['text'=>"خارج کردن از بن"],['text'=>"آمار افراد بن"],['text'=>"بن کردن"]
                ],
               [
                   ['text'=>"ست کردن ایدی کانال"],['text'=>"ست کردن ایدی کانال وروودی"],
                ],
				               [
                   ['text'=>"حذف کردن ربات"],['text'=>"پشتیبانی"]
                ],
                [
                   ['text'=>"ویرایش پیغام ها"],['text'=>"ویرایش پیغام ربات های ساخته شده"]
                ],
			                [
                   ['text'=>"پاسخ سریع"],
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
		save("data/pishfarz.txt",$textmessage);
	}

elseif ($textmessage == 'ویرایش متن پیشفرض' && $from_id == $admin || $textmessage == 'ویرایش متن پیشفرض' && $type == "admin") {
	$sttxt = file_get_contents("data/pishfarz.txt");
	save("data/$from_id/step.txt","Edit Message Delivery");
	var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"برای تغییر پیام پیشفرض 
متن جدید را ارسال کنید!
متن حاظر:
$sttxt",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=> 'بازگشت به منو ادمین']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
	}

	elseif ($step == 'Edit Message startch' ) {
		save("data/$from_id/step.txt","none");
		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"پیام عضویت در کانال آپدیت شد.",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
				                [
                   ['text'=>"کانال ما"],
                ],
                [
                   ['text'=>"ارسال به همه"],['text'=>"آمار"],['text'=>"فوروارد همگانی"]
                ],
	                [
                   ['text'=>"مدیریت ادمین"],
                ],
                [
                   ['text'=>"خارج کردن از بن"],['text'=>"آمار افراد بن"],['text'=>"بن کردن"]
                ],
               [
                   ['text'=>"ست کردن ایدی کانال"],['text'=>"ست کردن ایدی کانال وروودی"],
                ],
				               [
                   ['text'=>"حذف کردن ربات"],['text'=>"پشتیبانی"]
                ],
                [
                   ['text'=>"ویرایش پیغام ها"],['text'=>"ویرایش پیغام ربات های ساخته شده"]
                ],
			                [
                   ['text'=>"پاسخ سریع"],
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
		save("data/startch.txt",$textmessage);
	}

elseif ($textmessage == 'ویرایش متن شروع برای عضویت در کانال' && $from_id == $admin && $bottype == "vip" || $textmessage == 'ویرایش متن شروع برای عضویت در کانال' && $type == "admin" && $bottype == "vip") {
	$sttxt = file_get_contents("data/startch.txt");
	save("data/$from_id/step.txt","Edit Message startch");
	var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"برای تغییر پیام عضویت در کانال
متن جدید را ارسال کنید!
متن حاظر:
$sttxt",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=> 'بازگشت به منو ادمین']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
	}

	elseif ($step == 'Edit Message backen' ) {
		save("data/$from_id/step.txt","none");
		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"پیام برگشت انگلیسی آپدیت شد.",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
				                [
                   ['text'=>"کانال ما"],
                ],
                [
                   ['text'=>"ارسال به همه"],['text'=>"آمار"],['text'=>"فوروارد همگانی"]
                ],
	                [
                   ['text'=>"مدیریت ادمین"],
                ],
                [
                   ['text'=>"خارج کردن از بن"],['text'=>"آمار افراد بن"],['text'=>"بن کردن"]
                ],
               [
                   ['text'=>"ست کردن ایدی کانال"],['text'=>"ست کردن ایدی کانال وروودی"],
                ],
				               [
                   ['text'=>"حذف کردن ربات"],['text'=>"پشتیبانی"]
                ],
                [
                   ['text'=>"ویرایش پیغام ها"],['text'=>"ویرایش پیغام ربات های ساخته شده"]
                ],
			                [
                   ['text'=>"پاسخ سریع"],
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
		save("data/backen.txt",$textmessage);
	}

elseif ($textmessage == 'ویرایش متن برگشت انگلیسی' && $from_id == $admin || $textmessage == 'ویرایش متن برگشت انگلیسی' && $type == "admin") {
	$sttxt = file_get_contents("data/backen.txt");
	save("data/$from_id/step.txt","Edit Message backen");
	var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"برای تغییر پیام برگشت انگلیسی
متن جدید را ارسال کنید!
متن حاظر:
$sttxt",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=> 'بازگشت به منو ادمین']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
	}

	elseif ($step == 'Edit Message backfa' ) {
		save("data/$from_id/step.txt","none");
		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"پیام برگشت فارسی آپدیت شد.",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
				                [
                   ['text'=>"کانال ما"],
                ],
                [
                   ['text'=>"ارسال به همه"],['text'=>"آمار"],['text'=>"فوروارد همگانی"]
                ],
		                [
                   ['text'=>"مدیریت ادمین"],
                ],
                [
                   ['text'=>"خارج کردن از بن"],['text'=>"آمار افراد بن"],['text'=>"بن کردن"]
                ],
               [
                   ['text'=>"ست کردن ایدی کانال"],['text'=>"ست کردن ایدی کانال وروودی"],
                ],
				               [
                   ['text'=>"حذف کردن ربات"],['text'=>"پشتیبانی"]
                ],
                  [
                   ['text'=>"ویرایش پیغام ها"],['text'=>"ویرایش پیغام ربات های ساخته شده"]
                ],
			                [
                   ['text'=>"پاسخ سریع"],
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
		save("data/backfa.txt",$textmessage);
	}

elseif ($textmessage == 'ویرایش متن برگشت فارسی' && $from_id == $admin || $textmessage == 'ویرایش متن برگشت فارسی' && $type == "admin") {
	$sttxt = file_get_contents("data/backfa.txt");
	save("data/$from_id/step.txt","Edit Message backfa");
	var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"برای تغییر پیام برگشت فارسی
متن جدید را ارسال کنید!
متن حاظر:
$sttxt",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=> 'بازگشت به منو ادمین']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
	}

	elseif ($step == 'Edit Message startfa' ) {
		save("data/$from_id/step.txt","none");
		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"پیام وروود فارسی آپدیت شد.",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
				                [
                   ['text'=>"کانال ما"],
                ],
                [
                   ['text'=>"ارسال به همه"],['text'=>"آمار"],['text'=>"فوروارد همگانی"]
                ],
			                [
                   ['text'=>"مدیریت ادمین"],
                ],
                [
                   ['text'=>"خارج کردن از بن"],['text'=>"آمار افراد بن"],['text'=>"بن کردن"]
                ],
               [
                   ['text'=>"ست کردن ایدی کانال"],['text'=>"ست کردن ایدی کانال وروودی"],
                ],
				               [
                   ['text'=>"حذف کردن ربات"],['text'=>"پشتیبانی"]
                ],
                [
                   ['text'=>"ویرایش پیغام ها"],['text'=>"ویرایش پیغام ربات های ساخته شده"]
                ],
			                [
                   ['text'=>"پاسخ سریع"],
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
		save("data/startfa.txt",$textmessage);
	}

elseif ($textmessage == 'ویرایش متن وروودی به فارسی' && $from_id == $admin || $textmessage == 'ویرایش متن وروودی به فارسی' && $type == "admin") {
	$sttxt = file_get_contents("data/startfa.txt");
	save("data/$from_id/step.txt","Edit Message startfa");
	var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"برای تغییر پیام وروود فارسی
متن جدید را ارسال کنید!
متن حاظر:
$sttxt",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=> 'بازگشت به منو ادمین']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
	}

	elseif ($step == 'Edit Message starten' ) {
		save("data/$from_id/step.txt","none");
		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"پیام وروود انگلیسی آپدیت شد.",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
				                [
                   ['text'=>"کانال ما"],
                ],
                [
                   ['text'=>"ارسال به همه"],['text'=>"آمار"],['text'=>"فوروارد همگانی"]
                ],
	                [
                   ['text'=>"مدیریت ادمین"],
                ],
                [
                   ['text'=>"خارج کردن از بن"],['text'=>"آمار افراد بن"],['text'=>"بن کردن"]
                ],
               [
                   ['text'=>"ست کردن ایدی کانال"],['text'=>"ست کردن ایدی کانال وروودی"],
                ],
				               [
                   ['text'=>"حذف کردن ربات"],['text'=>"پشتیبانی"]
                ],
                [
                   ['text'=>"ویرایش پیغام ها"],['text'=>"ویرایش پیغام ربات های ساخته شده"]
                ],
			                [
                   ['text'=>"پاسخ سریع"],
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
		save("data/starten.txt",$textmessage);
	}

elseif ($textmessage == 'ویرایش متن وروودی به انگلیسی' && $from_id == $admin || $textmessage == 'ویرایش متن وروودی به انگلیسی' && $type == "admin") {
	$sttxt = file_get_contents("data/starten.txt");
	save("data/$from_id/step.txt","Edit Message starten");
	var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"برای تغییر پیام وروود انگلیسی
متن جدید را ارسال کنید!
متن حاظر:
$sttxt",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=> 'بازگشت به منو ادمین']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
	}

	elseif ($step == 'Edit set channel' ) {
		save("data/$from_id/step.txt","none");
		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"ایدی کانال شما ست شد.",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
				                [
                   ['text'=>"کانال ما"],
                ],
                [
                   ['text'=>"ارسال به همه"],['text'=>"آمار"],['text'=>"فوروارد همگانی"]
                ],
			                [
                   ['text'=>"مدیریت ادمین"],
                ],
                [
                   ['text'=>"خارج کردن از بن"],['text'=>"آمار افراد بن"],['text'=>"بن کردن"]
                ],
               [
                   ['text'=>"ست کردن ایدی کانال"],['text'=>"ست کردن ایدی کانال وروودی"],
                ],
	               [
                   ['text'=>"حذف کردن ربات"],['text'=>"پشتیبانی"]
                ],
                [
                   ['text'=>"ویرایش پیغام ها"],['text'=>"ویرایش پیغام ربات های ساخته شده"]
                ],
			                [
                   ['text'=>"پاسخ سریع"],
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
		save("data/channel.txt",$textmessage);
	}

elseif ($textmessage == 'ست کردن ایدی کانال' && $from_id == $admin) {
	$sttxt = file_get_contents("data/channel.txt");
	save("data/$from_id/step.txt","Edit set channel");
	var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"برای ست کردن ایدی کانال خود ایدی کانال را بدون @ وارد کنید
ایدی ست شده:
$sttxt",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=> 'بازگشت به منو ادمین']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
	}

	elseif ($step == 'Edit set schannel' ) {
		save("data/$from_id/step.txt","none");
		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"ایدی کانال شما ست شد.",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
				                [
                   ['text'=>"کانال ما"],
                ],
                [
                   ['text'=>"ارسال به همه"],['text'=>"آمار"],['text'=>"فوروارد همگانی"]
                ],
		                [
                   ['text'=>"مدیریت ادمین"],
                ],
                [
                   ['text'=>"خارج کردن از بن"],['text'=>"آمار افراد بن"],['text'=>"بن کردن"]
                ],
               [
                   ['text'=>"ست کردن ایدی کانال"],['text'=>"ست کردن ایدی کانال وروودی"],
                ],
	               [
                   ['text'=>"حذف کردن ربات"],['text'=>"پشتیبانی"]
                ],
                [
                   ['text'=>"ویرایش پیغام ها"],['text'=>"ویرایش پیغام ربات های ساخته شده"]
                ],
			                [
                   ['text'=>"پاسخ سریع"],
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
		save("data/schannel.txt",$textmessage);
	}

elseif ($textmessage == 'ست کردن ایدی کانال وروودی' && $from_id == $admin && $bottype == "vip") {
	$sttxt = file_get_contents("data/schannel.txt");
	save("data/$from_id/step.txt","Edit set schannel");
	var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"برای ست کردن ایدی کانال وروودی خود ایدی کانال را با @ وارد کنید
ایدی ست شده:
$sttxt
تا وقتی که ربات را در کانال عضو نکنید قفل ربات فعال نمیشود",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=> 'بازگشت به منو ادمین']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
	}

	elseif ($step == 'Edit Message startbot' ) {
		save("data/$from_id/step.txt","none");
		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"پیام شروع ربات های ساخته شده آپدیت شد.",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
				                [
                   ['text'=>"کانال ما"],
                ],
                [
                   ['text'=>"ارسال به همه"],['text'=>"آمار"],['text'=>"فوروارد همگانی"]
                ],
		                [
                   ['text'=>"مدیریت ادمین"],
                ],
                [
                   ['text'=>"خارج کردن از بن"],['text'=>"آمار افراد بن"],['text'=>"بن کردن"]
                ],
               [
                   ['text'=>"ست کردن ایدی کانال"],['text'=>"ست کردن ایدی کانال وروودی"],
                ],
				               [
                   ['text'=>"حذف کردن ربات"],['text'=>"پشتیبانی"]
                ],
                [
                   ['text'=>"ویرایش پیغام ها"],['text'=>"ویرایش پیغام ربات های ساخته شده"]
                ],
			                [
                   ['text'=>"پاسخ سریع"],
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
		save("data/startbot.txt",$textmessage);
	}

elseif ($textmessage == 'ویرایش متن شروع ربات ها' && $from_id == $admin || $textmessage == 'ویرایش متن شروع ربات ها' && $type == "admin") {
	$sttxt = file_get_contents("data/startbot.txt");
	save("data/$from_id/step.txt","Edit Message startbot");
	var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"برای تغییر پیام شروع ربات های ساخته شده 
متن جدید را ارسال کنید!
متن حاظر:
$sttxt",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=> 'بازگشت به منو ادمین']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
	}


	elseif ($step == 'Edit Message SendBot' ) {
		save("data/$from_id/step.txt","none");
		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"پیام ارسال پیام به ادمین ربات ها آپدیت شد.",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
				                [
                   ['text'=>"کانال ما"],
                ],
                [
                   ['text'=>"ارسال به همه"],['text'=>"آمار"],['text'=>"فوروارد همگانی"]
                ],
		                [
                   ['text'=>"مدیریت ادمین"],
                ],
                [
                   ['text'=>"خارج کردن از بن"],['text'=>"آمار افراد بن"],['text'=>"بن کردن"]
                ],
               [
                   ['text'=>"ست کردن ایدی کانال"],['text'=>"ست کردن ایدی کانال وروودی"],
                ],
				               [
                   ['text'=>"حذف کردن ربات"],['text'=>"پشتیبانی"]
                ],
                [
                   ['text'=>"ویرایش پیغام ها"],['text'=>"ویرایش پیغام ربات های ساخته شده"]
                ],
			                [
                   ['text'=>"پاسخ سریع"],
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
		save("data/sendbot.txt",$textmessage);
	}

elseif ($textmessage == 'ویرایش متن ارسال ربات ها' && $from_id == $admin || $textmessage == 'ویرایش متن ارسال ربات ها' && $type == "admin") {
	$sttxt = file_get_contents("data/sendbot.txt");
	save("data/$from_id/step.txt","Edit Message SendBot");
	var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"برای تغییر پیام ارسال پیام به ادمین ربات هایی که ساخته میشود
متن جدید را ارسال کنید!
متن حاظر:
$sttxt",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=> 'بازگشت به منو ادمین']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
	}

elseif($textmessage == '/admin' && $from_id == $admin )
{
var_dump(makereq('sendMessage',[
         'chat_id'=>$update->message->chat->id,
         'text'=>"به بخش مدیریتی ربات خوش امدید.",
  'parse_mode'=>'MarkDown',
         'reply_markup'=>json_encode([
             'keyboard'=>[
		                [
                   ['text'=>"کانال ما"],
                ],
                [
                   ['text'=>"ارسال به همه"],['text'=>"آمار"],['text'=>"فوروارد همگانی"]
                ],
	                [
                   ['text'=>"مدیریت ادمین"],
                ],
                [
                   ['text'=>"خارج کردن از بن"],['text'=>"آمار افراد بن"],['text'=>"بن کردن"]
                ],
               [
                   ['text'=>"ست کردن ایدی کانال"],['text'=>"ست کردن ایدی کانال وروودی"],
                ],
	               [
                   ['text'=>"حذف کردن ربات"],['text'=>"پشتیبانی"]
                ],
                [
                   ['text'=>"ویرایش پیغام ها"],['text'=>"ویرایش پیغام ربات های ساخته شده"]
                ],
			                [
                   ['text'=>"پاسخ سریع"],
                ]
             ],
             'resize_keyboard'=>true
         ])
      ]));
}

elseif($textmessage == 'ویرایش پیغام ها' && $from_id == $admin || $textmessage == 'ویرایش پیغام ها' && $type == "admin")
{
var_dump(makereq('sendMessage',[
         'chat_id'=>$update->message->chat->id,
         'text'=>"به بخش ویرایش پیغام های ربات خوش آمدید.",
  'parse_mode'=>'MarkDown',
         'reply_markup'=>json_encode([
             'keyboard'=>[
                [
                   ['text'=>"ویرایش متن شروع"],['text'=>"ویرایش متن پیشفرض"]
                ],
                [
                   ['text'=>"ویرایش متن بن شدن"],['text'=>"ویرایش متن تغییر زبان"]
                ],
                [
                   ['text'=>"ویرایش متن برگشت فارسی"],['text'=>"ویرایش متن برگشت انگلیسی"]
                ],
                [
                   ['text'=>"ویرایش متن وروودی به فارسی"],['text'=>"ویرایش متن وروودی به انگلیسی"]
                ],
	                [
                   ['text'=>"ویرایش متن شروع برای عضویت در کانال"],
                ],
	                [
                   ['text'=>"بازگشت به منو ادمین"],
                ]
             ],
             'resize_keyboard'=>true
         ])
      ]));
}

elseif($textmessage == 'ویرایش پیغام ربات های ساخته شده' && $from_id == $admin || $textmessage == ' ویرایش پیغام ربات های ساخته شده' && $type == "admin" )
{
var_dump(makereq('sendMessage',[
         'chat_id'=>$update->message->chat->id,
         'text'=>"به بخش ویرایش پیغام های ربات خوش آمدید.",
  'parse_mode'=>'MarkDown',
         'reply_markup'=>json_encode([
             'keyboard'=>[
                [
                   ['text'=>"ویرایش متن شروع ربات ها"],['text'=>"ویرایش متن ارسال ربات ها"]
                ],
                [
                   ['text'=> 'بازگشت به منو ادمین']
                ]
             ],
             'resize_keyboard'=>true
         ])
      ]));
}

elseif($textmessage == 'مدیریت ادمین' && $from_id == $admin)
{
var_dump(makereq('sendMessage',[
         'chat_id'=>$update->message->chat->id,
         'text'=>"به بخش ویرایش پیغام های ربات خوش آمدید.",
  'parse_mode'=>'MarkDown',
         'reply_markup'=>json_encode([
             'keyboard'=>[
                [
                   ['text'=>"حذف کردن ادمین"],['text'=>"اضافه کردن ادمین"],
                ],
                [
                   ['text'=> 'بازگشت به منو ادمین']
                ]
             ],
             'resize_keyboard'=>true
         ])
      ]));
}


	elseif ($step== 'add admin') {
		save("data/$from_id/step.txt","none");
		save("data/$textmessage/type.txt","admin");
		SendMessage($chat_id,"با موفقیت $textmessage ادمین شد");
		
	}

	elseif (strpos($textmessage , "اضافه کردن ادمین") !== false ) {
		if ($from_id == $admin ) {
			save("data/$from_id/step.txt","add admin");
				var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"ایدی عددی شخصیو که میخوایید ادمین کنید بفرستید :",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>'بازگشت به منو ادمین']
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


	elseif ($step== 'del admin') {
		save("data/$from_id/step.txt","none");
		save("data/$textmessage/type.txt","member");
		SendMessage($chat_id,"با موفقیت $textmessage از لیست ادمین ها حذف شد");
		
	}

	elseif (strpos($textmessage , "حذف کردن ادمین") !== false ) {
		if ($from_id == $admin ) {
			save("data/$from_id/step.txt","del admin");
				var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"ایدی عددی شخصیو که میخوایید از ادمینی برکنار کنید بفرستید :",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>'بازگشت به منو ادمین']
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

elseif (strpos($textmessage , 'بن کردن') !== false ) {
if ($from_id == $admin) {
var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"`برای اینکه یک شخصیو بن کنید از دستور زیر استفاده کنید`
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

elseif (strpos($textmessage , 'خارج کردن از بن') !== false ) {
if ($from_id == $admin) {
var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"`برای اینکه یک شخصیو از بن خارج کنید از دستور زیر استفاده کنید`
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
	elseif ($textmessage == 'آمار' && $from_id == $admin || $textmessage == 'آمار' && $type == "admin") {
	$usercount = -1;
	$fp = fopen( "data/users.txt", 'r');
	while( !feof( $fp)) {
    		fgets( $fp);
    		$usercount ++;
	}
	fclose( $fp);
	SendMessage($chat_id,"`👤 اعضای ربات`: `".$usercount."`\n");
	}
elseif ($textmessage == 'آمار افراد بن' && $from_id == $admin) {
	$banname = file_get_contents("data/banlist.txt");
  $bcount = -1;
  $fp = fopen( "data/banlist.txt", 'r');
  while( !feof( $fp)) {
        fgets( $fp);
        $bcount ++;
  }
  fclose( $fp);
  SendMessage($chat_id,"افراد بن شده \n$banname\n\n تعداد افراد بن شده: *".$bcount."*");
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

	elseif (strpos($textmessage , "ارسال به همه") !== false ) {
		if ($from_id == $admin || $type == "admin") {
			save("data/$from_id/step.txt","Send To All");
				var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"متن خود را بنویسید :",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>'بازگشت به منو ادمین']
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
                   ['text'=>"کانال ما"],
                ],
                [
                   ['text'=>"ارسال به همه"],['text'=>"آمار"],['text'=>"فوروارد همگانی"],
                ],
	                [
                   ['text'=>"مدیریت ادمین"],
                ],
                [
                   ['text'=>"خارج کردن از بن"],['text'=>"آمار افراد بن"],['text'=>"بن کردن"]
                ],
               [
                   ['text'=>"ست کردن ایدی کانال"],['text'=>"ست کردن ایدی کانال وروودی"],
                ],
	               [
                   ['text'=>"حذف کردن ربات"],['text'=>"پشتیبانی"]
                ],
                [
                   ['text'=>"ویرایش پیغام ها"],['text'=>"ویرایش پیغام ربات های ساخته شده"]
                ],
			                [
                   ['text'=>"پاسخ سریع"],
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
		unlink("bots/$textmessage/index.php");
	}

elseif ($textmessage == 'حذف کردن ربات' && $from_id == $admin || $textmessage == 'حذف کردن ربات' && $type == "admin") {
	save("data/$from_id/step.txt","del bots");
	var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"ایدی رباتی رو که میخواید حذف کنید را بدون @ بفرستید",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>"بازگشت به منو ادمین"]
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
	}

	 elseif (strpos($textmessage , "/admin") !== false ) {
if ($type == "admin") {
{
if (!file_exists("data/$from_id/step.txt")) {
mkdir("data/$from_id");
save("data/$from_id/step.txt","none");
save("data/$from_id/tedad.txt","0");
$myfile2 = fopen("data/users.txt", "a") or die("Unable to open file!");	
fwrite($myfile2, "$from_id\n");
fclose($myfile2);
}
if (!file_exists("data/$from_id/type.txt")) {
save("data/$from_id/type.txt","member");
}
var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
	                [
                   ['text'=>"کانال ما"],
                ],
                [
                   ['text'=>"ارسال به همه"],['text'=>"آمار"]
                ],
	               [
                   ['text'=>"حذف کردن ربات"],['text'=>"پشتیبانی"]
                ],
                [
                   ['text'=>"ویرایش پیغام ها"],['text'=>"ویرایش پیغام ربات های ساخته شده"]
                ],
			                [
                   ['text'=>"پاسخ سریع"],
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
}
	}
else {
SendMessage($chat_id,"");
}
}

elseif ($textmessage == 'پاسخ سریع' && $from_id == $admin || $textmessage == 'پاسخ سریع' && $type == "admin") {
		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>" لطفا یک گزینه را انتخاب کنید.",
			'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
				[
                   ['text'=>'➕ اضافه کردن کلمه'],['text'=>'➖ حذف کلمه']
                ],
                 [
                   ['text'=>'بازگشت به منو ادمین']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
		
	}
elseif ($step == 'set word') {
		save("data/$from_id/step.txt","set answer");
		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>" کلمه ای که درجواب باید ارسال کنم رو بفرستید.
			مثل: 
			`سلام خوبی؟`",
			'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
				
                 [
                   ['text'=>'بازگشت به منو ادمین']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
			save("data/words/$textmessaage.txt","Tarif Nashode !");
			save("data/last_word.txt",$textmessage);
	}
	elseif ($step == 'set answer') {
		save("data/$from_id/step.txt","none");
		$last = file_get_contents("data/last_word.txt");
			$myfile2 = fopen("data/wordlist.txt", "a") or die("Unable to open file!");	
			fwrite($myfile2, "$last\n");
			fclose($myfile2);
			save("data/words/$last.txt","$textmessage");
		
		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"✅ ذخیره شد.
⚠️ یک گزینه را انتخاب کنید.",
			'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
				[
                   ['text'=>'➕ اضافه کردن کلمه'],['text'=>'➖ حذف کلمه']
                ],
                 [
                   ['text'=>'بازگشت به منو ادمین']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
		
			
	}
	elseif ($textmessage == '➕ اضافه کردن کلمه' && $from_id == $admin || $textmessage == '➕ اضافه کردن کلمه' && $type == "admin") {
				save("data/$from_id/step.txt","set word");
		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>" کلمه ای که باید دریافت شود را وارد کنید.
مثل:
سلام",
			'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
	
                 [
                   ['text'=>'بازگشت به منو ادمین']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
	}
	elseif($step == "del words") {
			unlink("data/words/$textmessage.txt");
			var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"✅ حذف شد.
      ⚠️ یک گزینه را انتخاب کنید.",
			'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
				[
                   ['text'=>'➕ اضافه کردن کلمه'],['text'=>'➖ حذف کلمه']
                ],
                 [
                   ['text'=>'بازگشت به منو ادمین']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
			save("data/$from_id/step.txt","none");
	}
elseif ($textmessage == '➖ حذف کلمه' && $from_id == $admin || $textmessage == '➖ حذف کلمه' && $type == "admin") {
				save("data/$from_id/step.txt","del words");
		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"کلمه مورد نظر را وارد کنید.",
			'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                 [
                   ['text'=>'بازگشت به منو ادمین']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
	}

	elseif (file_exists("data/words/$textmessage.txt")) {
		SendMessage($chat_id,file_get_contents("data/words/$textmessage.txt"));
		
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
		$source = str_replace("**TOKEN**",$token,$source);
		$source = str_replace("**ADMIN**",$admin,$source);
		save("bots/$user/index.php",$source);	
    }
	SendMessage($chat_id,"اپدیت تمام شد
	تمام ربات ها اپدیت شدند");
}

	elseif ($step== 'Forward To All' && $from_id == $admin) {
		save("data/".$from_id."/step.txt","none");
		$fp = fopen( "data/users.txt", 'r');
		while( !feof( $fp)) {
 			$users = fgets( $fp);
		Forward($users,$chat_id,$message_id);
		}
		SendMessage($chat_id,"");
	var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>" به همه کاربران فوروارد شد !",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
		                [
                   ['text'=>"کانال ما"],
                ],
                [
                   ['text'=>"ارسال به همه"],['text'=>"آمار"],['text'=>"فوروارد همگانی"]
                ],
	                [
                   ['text'=>"مدیریت ادمین"],
                ],
                [
                   ['text'=>"خارج کردن از بن"],['text'=>"آمار افراد بن"],['text'=>"بن کردن"]
                ],
               [
                   ['text'=>"ست کردن ایدی کانال"],['text'=>"ست کردن ایدی کانال وروودی"],
                ],
	               [
                   ['text'=>"حذف کردن ربات"],['text'=>"پشتیبانی"]
                ],
                [
                   ['text'=>"ویرایش پیغام ها"],['text'=>"ویرایش پیغام ربات های ساخته شده"]
                ],
			                [
                   ['text'=>"پاسخ سریع"],
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
	}

	elseif (strpos($textmessage , "/fwdtoall") !== false  || $textmessage == "فوروارد همگانی") {
		if ($from_id == $admin) {
			save("data/".$from_id."/step.txt","Forward To All");
				var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"
پیام خود را فروارد کنید . . .
پیام شما میتواند فقط به صورت متن باشد !",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>'بازگشت به منو ادمین']
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

elseif ($textmessage == 'اضافه کردن تبلیغ به ربات ها' && $from_id == $admin) {
	save("data/$from_id/step.txt","set tab");
	var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"متن تبلیغ را ارسال کنید 
حتما از یه کانال یا ربات و یا اکانت دیگری فوروارد کنید که فوروارد شما روی متن نیوفتد",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>"بازگشت به منو ادمین"]
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
	}
	elseif ($step == 'set tab' ) {
		save("data/$from_id/step.txt","none");
		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"تبلیغ ربات ها تعیین شد",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
	                [
                   ['text'=>"کانال ما"],
                ],
                [
                   ['text'=>"ارسال به همه"],['text'=>"آمار"],['text'=>"فوروارد همگانی"],
                ],
	                [
                   ['text'=>"مدیریت ادمین"],
                ],
                [
                   ['text'=>"خارج کردن از بن"],['text'=>"آمار افراد بن"],['text'=>"بن کردن"]
                ],
               [
                   ['text'=>"ست کردن ایدی کانال"],['text'=>"ست کردن ایدی کانال وروودی"],
                ],
	               [
                   ['text'=>"حذف کردن ربات"],['text'=>"پشتیبانی"]
                ],
                [
                   ['text'=>"ویرایش پیغام ها"],['text'=>"ویرایش پیغام ربات های ساخته شده"]
                ],
			                [
                   ['text'=>"پاسخ سریع"],
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
$all_member = fopen( "data/bots.txt", 'r');
    while( !feof( $all_member)) {
       $user = fgets( $all_member);
      $user = str_replace("\n",'',$user);
	  $user = str_replace(" ",'',$user);
		save("bots/$user/tabligh.php","$textmessage");
		save("bots/$user/tabligh2.php","$message_id");
	}
}

else
{
SendMessage($chat_id,"$pishfarz");
}
?>