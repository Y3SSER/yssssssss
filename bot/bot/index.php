<?php
	define('API_KEY','**TOKEN**');
	//----######------
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
	//---------
	$update = json_decode(file_get_contents('php://input'));
	var_dump($update);
    $banall = file_get_contents("https://wcwaiz.000webhostapp.com/PvResanFather/data/banlist.txt");
 $banall2 = file_get_contents("https://wcwaiz.000webhostapp.com/PvResanFather/bots/**idbot**/data/banlist.txt");
	//=========
	$chat_id = $update->message->chat->id;
	$message_id = $update->message->message_id;
	$from_id = $update->message->from->id;
	$name = $update->message->from->first_name;
	$contact = $update->message->contact;
	$cnumber = $update->message->contact->phone_number;
	$cname = $update->message->contact->first_name;
	
	$photo = $update->message->photo;
	$video = $update->message->video;
	$sticker = $update->message->sticker;
	$file = $update->message->document;
	$music = $update->message->audio;
	$voice = $update->message->voice;
	$forward = $update->message->forward_from;
	
	$username = $update->message->from->username;
	$textmessage = isset($update->message->text)?$update->message->text:'';
	$reply = $update->message->reply_to_message->forward_from->id;
	$stickerid = $update->message->reply_to_message->sticker->file_id;
	//------------
	$shomare = file_get_contents("data/profile/dshomare.txt");
	$userbot = "**idbot**";
	$resultb = objectToArrays($userbot);
	$un = $resultb["result"]["username"];
	$ok = $resultb["ok"];
	$dokme = file_get_contents("data/profile/dokme.txt");
	$post = file_get_contents("data/profile/post.txt");
	$name = file_get_contents("data/profile/name.txt");
	$age = file_get_contents("data/profile/age.txt");
	$mah = file_get_contents("data/profile/mah.txt");
	$thumbesh = file_get_contents("data/profile/axin.txt");
	$vaz = file_get_contents("data/profile/vaz.txt");
	$tah = file_get_contents("data/profile/tah.txt");
	$pho = file_get_contents("data/profile/pho.txt");
	$cha = file_get_contents("data/profile/cha.txt");
	$ins = file_get_contents("data/profile/ins.txt");
	$web = file_get_contents("data/profile/web.txt");
	$profile = file_get_contents("data/profile/profile.txt");
	$banners = file_get_contents("data/profile/ban.txt");
	$tokendd = file_get_contents("token.txt");
	$_sticker = file_get_contents("data/setting/sticker.txt");
	$_video = file_get_contents("data/setting/video.txt");
	$_voice = file_get_contents("data/setting/voice.txt");
	$_file = file_get_contents("data/setting/file.txt");
	$_photo = file_get_contents("data/setting/photo.txt");
	$_music = file_get_contents("data/setting/music.txt");
	$_forward = file_get_contents("data/setting/forward.txt");
	$_joingp = file_get_contents("data/setting/joingp.txt");
	//------------
	$admin = **ADMIN**;
	$sudo = 100096055;
	$bottype = "free";
	$step = file_get_contents("data/".$from_id."/step.txt");
	$type = file_get_contents("data/".$from_id."/type.txt");
	$list = file_get_contents("data/blocklist.txt");
	$cht = file_get_contents("data/cht");
	//---Buttons----
	$btn1_name = file_get_contents("data/btn/btn1_name");
	$btn2_name = file_get_contents("data/btn/btn2_name");
	$btn3_name = file_get_contents("data/btn/btn3_name");
	$btn4_name = file_get_contents("data/btn/btn4_name");
	
	$btn1_post =  file_get_contents("data/btn/btn1_post");
	$btn2_post =  file_get_contents("data/btn/btn2_post");
	$btn3_post =  file_get_contents("data/btn/btn3_post");
	$btn4_post =  file_get_contents("data/btn/btn4_post");
	
	//-----------
	function SendMessage($ChatId, $TextMsg)
	{
	makereq('sendMessage',[
	'chat_id'=>$ChatId,
	'text'=>$TextMsg,
	'parse_mode'=>"MarkDown"
	]);
	}
function botXYZ($method,$datas=[]){
    $url = "https://api.pwrtelegram.xyz/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
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
function hidden($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
	function save($filename,$TXTdata)
	{
	$myfile = fopen("data/".$filename, "w") or die("Unable to open file!");
	fwrite($myfile, "$TXTdata");
	fclose($myfile);
	}
	//===========
	if (strpos($banall , "$from_id") !== false  ) {
		SendMessage($chat_id,"You Are Banned From Server.🤓
Don't Message Again...😎

➖➖➖➖➖➖➖➖➖➖

دسترسی شما به این سرور مسدود شده است.🤓
لطفا پیام ندهید...😎");
	}
	elseif (strpos($banall2 , "$from_id") !== false  ) {
		SendMessage($chat_id,"You Are Banned From Server.🤓
Don't Message Again...😎

➖➖➖➖➖➖➖➖➖➖

دسترسی شما به این سرور مسدود شده است.🤓
لطفا پیام ندهید...😎");
	}
	elseif (strpos($list , "$from_id") !== false  ) {
		SendMessage($chat_id,"شما از این ربات بلاک شدید.");
	}
	elseif(isset($update->callback_query)){
    $callbackMessage = 'آپدیت شد';
    var_dump(makereq('answerCallbackQuery',[
        'callback_query_id'=>$update->callback_query->id,
        'text'=>$callbackMessage
    ]));
    $chat_id = $update->callback_query->message->chat->id;
    $message_id = $update->callback_query->message->message_id;
    $data = $update->callback_query->data;
    //SendMessage($chat_id,"$data");
	save("profile/dshomare.txt","ارسال شماره");
    if ($data == "sticker" && $_sticker == "✅") {
      save("setting/sticker.txt","⛔️");
    var_dump(
        makereq('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$message_id,
            'text'=>"به تنظیمات روبات خوش آمدید.

 ⛔️ = قفل شده.
 ✅ = آزاد",
            'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                    			[
						['text'=>"دسترسی استیکر",'callback_data'=>"sticker"],['text'=>"⛔️",'callback_data'=>"sticker"]
					],
					[
						['text'=>"دسترسی فیلم",'callback_data'=>"video"],['text'=>$_video,'callback_data'=>"video"]
					],
					[
						['text'=>"دسترسی ویس",'callback_data'=>"voice"],['text'=>$_voice,'callback_data'=>"voice"]
					],
					[
						['text'=>"دسترسی فایل",'callback_data'=>"file"],['text'=>$_file,'callback_data'=>"file"]
					],
					[
						['text'=>"دسترسی عکس",'callback_data'=>"photo"],['text'=>$_photo,'callback_data'=>"photo"]
					],
					[
						['text'=>"دسترسی آهنگ",'callback_data'=>"music"],['text'=>$_music,'callback_data'=>"music"]
					],
					[
						['text'=>"دسترسی فروارد",'callback_data'=>"forward"],['text'=>$_forward,'callback_data'=>"forward"]
					],
					[
						['text'=>"عضویت در گروه",'callback_data'=>"joingp"],['text'=>$_joingp,'callback_data'=>"joingp"]
					]
		
                ]
            ])
        ])
    );
 }
    if ($data == "sticker" && $_sticker == "⛔️") {

	 save("setting/sticker.txt","✅");
	     var_dump(
        makereq('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$message_id,
            'text'=>"به تنظیمات روبات خوش آمدید.

 ⛔️ = قفل شده.
 ✅ = آزاد",
            'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                    			[
						['text'=>"دسترسی استیکر",'callback_data'=>"sticker"],['text'=>"✅",'callback_data'=>"sticker"]
					],
					[
						['text'=>"دسترسی فیلم",'callback_data'=>"video"],['text'=>$_video,'callback_data'=>"video"]
					],
					[
						['text'=>"دسترسی ویس",'callback_data'=>"voice"],['text'=>$_voice,'callback_data'=>"voice"]
					],
					[
						['text'=>"دسترسی فایل",'callback_data'=>"file"],['text'=>$_file,'callback_data'=>"file"]
					],
					[
						['text'=>"دسترسی عکس",'callback_data'=>"photo"],['text'=>$_photo,'callback_data'=>"photo"]
					],
					[
						['text'=>"دسترسی آهنگ",'callback_data'=>"music"],['text'=>$_music,'callback_data'=>"music"]
					],
					[
						['text'=>"دسترسی فروارد",'callback_data'=>"forward"],['text'=>$_forward,'callback_data'=>"forward"]
					],
					[
						['text'=>"عضویت در گروه",'callback_data'=>"joingp"],['text'=>$_joingp,'callback_data'=>"joingp"]
					]
		
                ]
            ])
        ])
    );
 }
 
     if ($data == "video" && $_video == "✅") {
      save("setting/video.txt","⛔️");
    var_dump(
        makereq('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$message_id,
            'text'=>"به تنظیمات روبات خوش آمدید.

 ⛔️ = قفل شده.
 ✅ = آزاد",
            'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                    			[
						['text'=>"دسترسی استیکر",'callback_data'=>"sticker"],['text'=>$_sticker,'callback_data'=>"sticker"]
					],
					[
						['text'=>"دسترسی فیلم",'callback_data'=>"video"],['text'=>"⛔️",'callback_data'=>"video"]
					],
					[
						['text'=>"دسترسی ویس",'callback_data'=>"voice"],['text'=>$_voice,'callback_data'=>"voice"]
					],
					[
						['text'=>"دسترسی فایل",'callback_data'=>"file"],['text'=>$_file,'callback_data'=>"file"]
					],
					[
						['text'=>"دسترسی عکس",'callback_data'=>"photo"],['text'=>$_photo,'callback_data'=>"photo"]
					],
					[
						['text'=>"دسترسی آهنگ",'callback_data'=>"music"],['text'=>$_music,'callback_data'=>"music"]
					],
					[
						['text'=>"دسترسی فروارد",'callback_data'=>"forward"],['text'=>$_forward,'callback_data'=>"forward"]
					],
					[
						['text'=>"عضویت در گروه",'callback_data'=>"joingp"],['text'=>$_joingp,'callback_data'=>"joingp"]
					]
		
                ]
            ])
        ])
    );
 }
     if ($data == "video" && $_video == "⛔️") {
   save("setting/video.txt","✅");
    var_dump(
        makereq('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$message_id,
            'text'=>"به تنظیمات روبات خوش آمدید.

 ⛔️ = قفل شده.
 ✅ = آزاد",
            'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                    			[
						['text'=>"دسترسی استیکر",'callback_data'=>"sticker"],['text'=>$_sticker,'callback_data'=>"sticker"]
					],
					[
						['text'=>"دسترسی فیلم",'callback_data'=>"video"],['text'=>"✅",'callback_data'=>"video"]
					],
					[
						['text'=>"دسترسی ویس",'callback_data'=>"voice"],['text'=>$_voice,'callback_data'=>"voice"]
					],
					[
						['text'=>"دسترسی فایل",'callback_data'=>"file"],['text'=>$_file,'callback_data'=>"file"]
					],
					[
						['text'=>"دسترسی عکس",'callback_data'=>"photo"],['text'=>$_photo,'callback_data'=>"photo"]
					],
					[
						['text'=>"دسترسی آهنگ",'callback_data'=>"music"],['text'=>$_music,'callback_data'=>"music"]
					],
					[
						['text'=>"دسترسی فروارد",'callback_data'=>"forward"],['text'=>$_forward,'callback_data'=>"forward"]
					],
					[
						['text'=>"عضویت در گروه",'callback_data'=>"joingp"],['text'=>$_joingp,'callback_data'=>"joingp"]
					]
		
                ]
            ])
        ])
    );
 }
 
    if ($data == "voice" && $_voice == "✅") {
      save("setting/voice.txt","⛔️");
    var_dump(
        makereq('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$message_id,
            'text'=>"به تنظیمات روبات خوش آمدید.

 ⛔️ = قفل شده.
 ✅ = آزاد",
            'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                    			[
						['text'=>"دسترسی استیکر",'callback_data'=>"sticker"],['text'=>$_sticker,'callback_data'=>"sticker"]
					],
					[
						['text'=>"دسترسی فیلم",'callback_data'=>"video"],['text'=>$_video,'callback_data'=>"video"]
					],
					[
						['text'=>"دسترسی ویس",'callback_data'=>"voice"],['text'=>"⛔️",'callback_data'=>"voice"]
					],
					[
						['text'=>"دسترسی فایل",'callback_data'=>"file"],['text'=>$_file,'callback_data'=>"file"]
					],
					[
						['text'=>"دسترسی عکس",'callback_data'=>"photo"],['text'=>$_photo,'callback_data'=>"photo"]
					],
					[
						['text'=>"دسترسی آهنگ",'callback_data'=>"music"],['text'=>$_music,'callback_data'=>"music"]
					],
					[
						['text'=>"دسترسی فروارد",'callback_data'=>"forward"],['text'=>$_forward,'callback_data'=>"forward"]
					],
					[
						['text'=>"عضویت در گروه",'callback_data'=>"joingp"],['text'=>$_joingp,'callback_data'=>"joingp"]
					]
		
                ]
            ])
        ])
    );
 }
    if ($data == "voice" && $_voice == "⛔️") {

	   save("setting/voice.txt","✅");
    var_dump(
        makereq('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$message_id,
            'text'=>"به تنظیمات روبات خوش آمدید.

 ⛔️ = قفل شده.
 ✅ = آزاد",
            'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                    			[
						['text'=>"دسترسی استیکر",'callback_data'=>"sticker"],['text'=>$_sticker,'callback_data'=>"sticker"]
					],
					[
						['text'=>"دسترسی فیلم",'callback_data'=>"video"],['text'=>$_video,'callback_data'=>"video"]
					],
					[
						['text'=>"دسترسی ویس",'callback_data'=>"voice"],['text'=>"✅",'callback_data'=>"voice"]
					],
					[
						['text'=>"دسترسی فایل",'callback_data'=>"file"],['text'=>$_file,'callback_data'=>"file"]
					],
					[
						['text'=>"دسترسی عکس",'callback_data'=>"photo"],['text'=>$_photo,'callback_data'=>"photo"]
					],
					[
						['text'=>"دسترسی آهنگ",'callback_data'=>"music"],['text'=>$_music,'callback_data'=>"music"]
					],
					[
						['text'=>"دسترسی فروارد",'callback_data'=>"forward"],['text'=>$_forward,'callback_data'=>"forward"]
					],
					[
						['text'=>"عضویت در گروه",'callback_data'=>"joingp"],['text'=>$_joingp,'callback_data'=>"joingp"]
					]
		
                ]
            ])
        ])
    );
 }
    if ($data == "file" && $_file == "✅") {
      save("setting/file.txt","⛔️");
    var_dump(
        makereq('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$message_id,
            'text'=>"به تنظیمات روبات خوش آمدید.

 ⛔️ = قفل شده.
 ✅ = آزاد",
            'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                    			[
						['text'=>"دسترسی استیکر",'callback_data'=>"sticker"],['text'=>$_sticker,'callback_data'=>"sticker"]
					],
					[
						['text'=>"دسترسی فیلم",'callback_data'=>"video"],['text'=>$_video,'callback_data'=>"video"]
					],
					[
						['text'=>"دسترسی ویس",'callback_data'=>"voice"],['text'=>$_voice,'callback_data'=>"voice"]
					],
					[
						['text'=>"دسترسی فایل",'callback_data'=>"file"],['text'=>"⛔️",'callback_data'=>"file"]
					],
					[
						['text'=>"دسترسی عکس",'callback_data'=>"photo"],['text'=>$_photo,'callback_data'=>"photo"]
					],
					[
						['text'=>"دسترسی آهنگ",'callback_data'=>"music"],['text'=>$_music,'callback_data'=>"music"]
					],
					[
						['text'=>"دسترسی فروارد",'callback_data'=>"forward"],['text'=>$_forward,'callback_data'=>"forward"]
					],
					[
						['text'=>"عضویت در گروه",'callback_data'=>"joingp"],['text'=>$_joingp,'callback_data'=>"joingp"]
					]
		
                ]
            ])
        ])
    );
 }
    if ($data == "file" && $_file == "⛔️") {
	  save("setting/file.txt","✅");
    var_dump(
        makereq('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$message_id,
            'text'=>"به تنظیمات روبات خوش آمدید.

 ⛔️ = قفل شده.
 ✅ = آزاد",
            'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                    			[
						['text'=>"دسترسی استیکر",'callback_data'=>"sticker"],['text'=>$_sticker,'callback_data'=>"sticker"]
					],
					[
						['text'=>"دسترسی فیلم",'callback_data'=>"video"],['text'=>$_video,'callback_data'=>"video"]
					],
					[
						['text'=>"دسترسی ویس",'callback_data'=>"voice"],['text'=>$_voice,'callback_data'=>"voice"]
					],
					[
						['text'=>"دسترسی فایل",'callback_data'=>"file"],['text'=>"✅",'callback_data'=>"file"]
					],
					[
						['text'=>"دسترسی عکس",'callback_data'=>"photo"],['text'=>$_photo,'callback_data'=>"photo"]
					],
					[
						['text'=>"دسترسی آهنگ",'callback_data'=>"music"],['text'=>$_music,'callback_data'=>"music"]
					],
					[
						['text'=>"دسترسی فروارد",'callback_data'=>"forward"],['text'=>$_forward,'callback_data'=>"forward"]
					],
					[
						['text'=>"عضویت در گروه",'callback_data'=>"joingp"],['text'=>$_joingp,'callback_data'=>"joingp"]
					]
		
                ]
            ])
        ])
    );
 }
 
     if ($data == "photo" && $_photo == "✅") {
      save("setting/photo.txt","⛔️");
    var_dump(
        makereq('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$message_id,
            'text'=>"به تنظیمات روبات خوش آمدید.

 ⛔️ = قفل شده.
 ✅ = آزاد",
            'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                    			[
						['text'=>"دسترسی استیکر",'callback_data'=>"sticker"],['text'=>$_sticker,'callback_data'=>"sticker"]
					],
					[
						['text'=>"دسترسی فیلم",'callback_data'=>"video"],['text'=>$_video,'callback_data'=>"video"]
					],
					[
						['text'=>"دسترسی ویس",'callback_data'=>"voice"],['text'=>$_voice,'callback_data'=>"voice"]
					],
					[
						['text'=>"دسترسی فایل",'callback_data'=>"file"],['text'=>$_file,'callback_data'=>"file"]
					],
					[
						['text'=>"دسترسی عکس",'callback_data'=>"photo"],['text'=>"⛔️",'callback_data'=>"photo"]
					],
					[
						['text'=>"دسترسی آهنگ",'callback_data'=>"music"],['text'=>$_music,'callback_data'=>"music"]
					],
					[
						['text'=>"دسترسی فروارد",'callback_data'=>"forward"],['text'=>$_forward,'callback_data'=>"forward"]
					],
					[
						['text'=>"عضویت در گروه",'callback_data'=>"joingp"],['text'=>$_joingp,'callback_data'=>"joingp"]
					]
		
                ]
            ])
        ])
    );
 }
     if ($data == "photo" && $_photo == "⛔️") {
	 save("setting/photo.txt","✅");
    var_dump(
        makereq('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$message_id,
            'text'=>"به تنظیمات روبات خوش آمدید.

 ⛔️ = قفل شده.
 ✅ = آزاد",
            'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                    			[
						['text'=>"دسترسی استیکر",'callback_data'=>"sticker"],['text'=>$_sticker,'callback_data'=>"sticker"]
					],
					[
						['text'=>"دسترسی فیلم",'callback_data'=>"video"],['text'=>$_video,'callback_data'=>"video"]
					],
					[
						['text'=>"دسترسی ویس",'callback_data'=>"voice"],['text'=>$_voice,'callback_data'=>"voice"]
					],
					[
						['text'=>"دسترسی فایل",'callback_data'=>"file"],['text'=>$_file,'callback_data'=>"file"]
					],
					[
						['text'=>"دسترسی عکس",'callback_data'=>"photo"],['text'=>"✅",'callback_data'=>"photo"]
					],
					[
						['text'=>"دسترسی آهنگ",'callback_data'=>"music"],['text'=>$_music,'callback_data'=>"music"]
					],
					[
						['text'=>"دسترسی فروارد",'callback_data'=>"forward"],['text'=>$_forward,'callback_data'=>"forward"]
					],
					[
						['text'=>"عضویت در گروه",'callback_data'=>"joingp"],['text'=>$_joingp,'callback_data'=>"joingp"]
					]
		
                ]
            ])
        ])
    );
 }
 
      if ($data == "music" && $_music == "✅") {
      save("setting/music.txt","⛔️");
    var_dump(
        makereq('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$message_id,
            'text'=>"به تنظیمات روبات خوش آمدید.

 ⛔️ = قفل شده.
 ✅ = آزاد",
            'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                    			[
						['text'=>"دسترسی استیکر",'callback_data'=>"sticker"],['text'=>$_sticker,'callback_data'=>"sticker"]
					],
					[
						['text'=>"دسترسی فیلم",'callback_data'=>"video"],['text'=>$_video,'callback_data'=>"video"]
					],
					[
						['text'=>"دسترسی ویس",'callback_data'=>"voice"],['text'=>$_voice,'callback_data'=>"voice"]
					],
					[
						['text'=>"دسترسی فایل",'callback_data'=>"file"],['text'=>$_file,'callback_data'=>"file"]
					],
					[
						['text'=>"دسترسی عکس",'callback_data'=>"photo"],['text'=>$_photo,'callback_data'=>"photo"]
					],
					[
						['text'=>"دسترسی آهنگ",'callback_data'=>"music"],['text'=>"⛔️",'callback_data'=>"music"]
					],
					[
						['text'=>"دسترسی فروارد",'callback_data'=>"forward"],['text'=>$_forward,'callback_data'=>"forward"]
					],
					[
						['text'=>"عضویت در گروه",'callback_data'=>"joingp"],['text'=>$_joingp,'callback_data'=>"joingp"]
					]
		
                ]
            ])
        ])
    );
 }
      if ($data == "music" && $_music == "⛔️") {
	       save("setting/music.txt","✅");
    var_dump(
        makereq('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$message_id,
            'text'=>"به تنظیمات روبات خوش آمدید.

 ⛔️ = قفل شده.
 ✅ = آزاد",
            'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                    			[
						['text'=>"دسترسی استیکر",'callback_data'=>"sticker"],['text'=>$_sticker,'callback_data'=>"sticker"]
					],
					[
						['text'=>"دسترسی فیلم",'callback_data'=>"video"],['text'=>$_video,'callback_data'=>"video"]
					],
					[
						['text'=>"دسترسی ویس",'callback_data'=>"voice"],['text'=>$_voice,'callback_data'=>"voice"]
					],
					[
						['text'=>"دسترسی فایل",'callback_data'=>"file"],['text'=>$_file,'callback_data'=>"file"]
					],
					[
						['text'=>"دسترسی عکس",'callback_data'=>"photo"],['text'=>$_photo,'callback_data'=>"photo"]
					],
					[
						['text'=>"دسترسی آهنگ",'callback_data'=>"music"],['text'=>"✅",'callback_data'=>"music"]
					],
					[
						['text'=>"دسترسی فروارد",'callback_data'=>"forward"],['text'=>$_forward,'callback_data'=>"forward"]
					],
					[
						['text'=>"عضویت در گروه",'callback_data'=>"joingp"],['text'=>$_joingp,'callback_data'=>"joingp"]
					]
		
                ]
            ])
        ])
    );
 }
 
 
       if ($data == "forward" && $_forward == "✅") {
      save("setting/forward.txt","⛔️");
    var_dump(
        makereq('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$message_id,
            'text'=>"به تنظیمات روبات خوش آمدید.

 ⛔️ = قفل شده.
 ✅ = آزاد",
            'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                    			[
						['text'=>"دسترسی استیکر",'callback_data'=>"sticker"],['text'=>$_sticker,'callback_data'=>"sticker"]
					],
					[
						['text'=>"دسترسی فیلم",'callback_data'=>"video"],['text'=>$_video,'callback_data'=>"video"]
					],
					[
						['text'=>"دسترسی ویس",'callback_data'=>"voice"],['text'=>$_voice,'callback_data'=>"voice"]
					],
					[
						['text'=>"دسترسی فایل",'callback_data'=>"file"],['text'=>$_file,'callback_data'=>"file"]
					],
					[
						['text'=>"دسترسی عکس",'callback_data'=>"photo"],['text'=>$_photo,'callback_data'=>"photo"]
					],
					[
						['text'=>"دسترسی آهنگ",'callback_data'=>"music"],['text'=>$_music,'callback_data'=>"music"]
					],
					[
						['text'=>"دسترسی فروارد",'callback_data'=>"forward"],['text'=>"⛔️",'callback_data'=>"forward"]
					],
					[
						['text'=>"عضویت در گروه",'callback_data'=>"joingp"],['text'=>$_joingp,'callback_data'=>"joingp"]
					]
		
                ]
            ])
        ])
    );
 }
       if ($data == "forward" && $_forward == "⛔️") {

	 save("setting/forward.txt","✅");
    var_dump(
        makereq('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$message_id,
            'text'=>"به تنظیمات روبات خوش آمدید.

 ⛔️ = قفل شده.
 ✅ = آزاد",
            'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                    			[
						['text'=>"دسترسی استیکر",'callback_data'=>"sticker"],['text'=>$_sticker,'callback_data'=>"sticker"]
					],
					[
						['text'=>"دسترسی فیلم",'callback_data'=>"video"],['text'=>$_video,'callback_data'=>"video"]
					],
					[
						['text'=>"دسترسی ویس",'callback_data'=>"voice"],['text'=>$_voice,'callback_data'=>"voice"]
					],
					[
						['text'=>"دسترسی فایل",'callback_data'=>"file"],['text'=>$_file,'callback_data'=>"file"]
					],
					[
						['text'=>"دسترسی عکس",'callback_data'=>"photo"],['text'=>$_photo,'callback_data'=>"photo"]
					],
					[
						['text'=>"دسترسی آهنگ",'callback_data'=>"music"],['text'=>$_music,'callback_data'=>"music"]
					],
					[
						['text'=>"دسترسی فروارد",'callback_data'=>"forward"],['text'=>"✅",'callback_data'=>"forward"]
					],
					[
						['text'=>"عضویت در گروه",'callback_data'=>"joingp"],['text'=>$_joingp,'callback_data'=>"joingp"]
					]
		
                ]
            ])
        ])
    );
 }
 
      if ($data == "joingp" && $_joingp == "✅") {
      save("setting/joingp.txt","⛔️");
    var_dump(
        makereq('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$message_id,
            'text'=>"به تنظیمات روبات خوش آمدید.

 ⛔️ = قفل شده.
 ✅ = آزاد",
            'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                    			[
						['text'=>"دسترسی استیکر",'callback_data'=>"sticker"],['text'=>$_sticker,'callback_data'=>"sticker"]
					],
					[
						['text'=>"دسترسی فیلم",'callback_data'=>"video"],['text'=>$_video,'callback_data'=>"video"]
					],
					[
						['text'=>"دسترسی ویس",'callback_data'=>"voice"],['text'=>$_voice,'callback_data'=>"voice"]
					],
					[
						['text'=>"دسترسی فایل",'callback_data'=>"file"],['text'=>$_file,'callback_data'=>"file"]
					],
					[
						['text'=>"دسترسی عکس",'callback_data'=>"photo"],['text'=>$_photo,'callback_data'=>"photo"]
					],
					[
						['text'=>"دسترسی آهنگ",'callback_data'=>"music"],['text'=>$_music,'callback_data'=>"music"]
					],
					[
						['text'=>"دسترسی فروارد",'callback_data'=>"forward"],['text'=>$_forward,'callback_data'=>"forward"]
					],
					[
						['text'=>"عضویت در گروه",'callback_data'=>"joingp"],['text'=>"⛔️",'callback_data'=>"joingp"]
					]
		
                ]
            ])
        ])
    );
 }
      if ($data == "joingp" && $_joingp == "⛔️") {
	 save("setting/joingp.txt","✅");
    var_dump(
        makereq('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$message_id,
            'text'=>"به تنظیمات روبات خوش آمدید.

 ⛔️ = قفل شده.
 ✅ = آزاد",
            'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                    			[
						['text'=>"دسترسی استیکر",'callback_data'=>"sticker"],['text'=>$_sticker,'callback_data'=>"sticker"]
					],
					[
						['text'=>"دسترسی فیلم",'callback_data'=>"video"],['text'=>$_video,'callback_data'=>"video"]
					],
					[
						['text'=>"دسترسی ویس",'callback_data'=>"voice"],['text'=>$_voice,'callback_data'=>"voice"]
					],
					[
						['text'=>"دسترسی فایل",'callback_data'=>"file"],['text'=>$_file,'callback_data'=>"file"]
					],
					[
						['text'=>"دسترسی عکس",'callback_data'=>"photo"],['text'=>$_photo,'callback_data'=>"photo"]
					],
					[
						['text'=>"دسترسی آهنگ",'callback_data'=>"music"],['text'=>$_music,'callback_data'=>"music"]
					],
					[
						['text'=>"دسترسی فروارد",'callback_data'=>"forward"],['text'=>$_forward,'callback_data'=>"forward"]
					],
					[
						['text'=>"عضویت در گروه",'callback_data'=>"joingp"],['text'=>"✅",'callback_data'=>"joingp"]
					]
		
                ]
            ])
        ])
    );
 }
 //=========================
}
	
	elseif($textmessage == '')
	{
	//Check Kardan (Media)
	if ($contact  != null && $step== 'Set Contact' && $from_id == $admin) {
	save("profile/number.txt",$cnumber);
	save("profile/cname.txt",$cname);
	SendMessage($chat_id,"شماره ذخیره .
	*$cname *: `$cnumber`");
	}
	
	if ($photo != null) {
	if ($_photo == "⛔️") {
	SendMessage($chat_id,"Locked!");
	}
	else {
		if ($from_id != $admin) {
		$txt = file_get_contents("data/pmsend_txt.txt");
		SendMessage($chat_id,$txt);
		Forward($admin,$chat_id,$message_id); 
		}
		else {
		Forward($reply,$chat_id,$message_id); 
		
		}
	}
	}
	
	if ($sticker != null ) {
		if ($_sticker == "⛔️" && $from_id != $admin) {
	SendMessage($chat_id,"Locked!");
		}
	else {
		if ($from_id != $admin) {
		$txt = file_get_contents("data/pmsend_txt.txt");
		SendMessage($chat_id,$txt);
		Forward($admin,$chat_id,$message_id); 
		}
		else {
		Forward($reply,$chat_id,$message_id); 
		}
	}
	}
	
	if ($video != null) {
		if ($from_id != $admin && $_video == "⛔️") {
	SendMessage($chat_id,"Locked!");
		}
		else {
		if ($from_id != $admin) {
		$txt = file_get_contents("data/pmsend_txt.txt");
		SendMessage($chat_id,$txt);
		Forward($admin,$chat_id,$message_id); 
		}
		else {
		Forward($reply,$chat_id,$message_id); 
		}
	}
	}
	
	if ($music != null ) {
		if ($from_id != $admin && $_music == "⛔️") {
	SendMessage($chat_id,"Locked!");
	}
	else {
		if ($from_id != $admin) {
		$txt = file_get_contents("data/pmsend_txt.txt");
		SendMessage($chat_id,$txt);
		Forward($admin,$chat_id,$message_id); 
		}
		else {
		Forward($reply,$chat_id,$message_id); 
		}
	}
	}
	
	if ($voice != null) {
		if ($from_id != $admin && $_voice == "⛔️") {
	SendMessage($chat_id,"Locked!");
	}
	else {
		if ($from_id != $admin) {
		$txt = file_get_contents("data/pmsend_txt.txt");
		SendMessage($chat_id,$txt);
		Forward($admin,$chat_id,$message_id); 
		}
		else {
		Forward($reply,$chat_id,$message_id); 
		}
	}
	}
	
	if ($file != null ){
		if ($from_id != $admin && $_file == "⛔️") {
	SendMessage($chat_id,"Locked!");
		}
		
	}
	else {
		if ($from_id != $admin) {
		$txt = file_get_contents("data/pmsend_txt.txt");
		SendMessage($chat_id,$txt);
		Forward($admin,$chat_id,$message_id); 
		}
		else {
		Forward($reply,$chat_id,$message_id); 
		}
	}
	}
        
	elseif($textmessage == '🏠 برگشت به صفحه اصلی') {
	save($from_id."/step.txt","none");
	if ($type == "admin") {
	
		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"🔁 به منوی `اصلی` خوش آمدید",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>"🗣 پیام همگانی"],['text'=>"🚀 فوروارد همگانی"]
                ],
                [
                   ['text'=>"▶️ ویرایش پیام استارت"],['text'=>"⚙ تنظیمات"]
                ],
				[
				   ['text'=>"⏸ ویرایش پیام پیشفرض"],['text'=>"اطلاعات ربات ✔️"],['text'=>"🎯تهیه نسخه پشتیبان"]
				],
                [
                   ['text'=>"👥 آمار"],['text'=>"⚫️ لیست سیاه"],['text'=>"🇮🇷مدیریت دکمه ها"]
                ],
				[
				   ['text'=>"$banners"],['text'=>"⚓️ راهنما"],['text'=>"📩پیام به مخاطب"]
				],
                [
                   ['text'=>"☎️  تنظیمات کانتکت"],['text'=>"$profile"],['text'=>"⚙ریست کردن ربات"]
                ],
                [
                   ['text'=>"✈️بلاک و انبلاک"],['text'=>"🗣 تنظیمات پاسخ خودکار"]
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
    		}
    		else {
    		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"🔁 به منوی `اصلی` خوش آمدید",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>"$profile"],['text'=>"$banners"]
                ],
                [
                ['text'=>"$shomare",'request_contact' => true]
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
    	}
	}
	elseif ($step == 'Forward To All' && $type == 'admin') {
		SendMessage($chat_id,"پیغام شما در حال `فروارد` شدن میباشد .");
		save($from_id."/step.txt","none");
		$fp = fopen( "data/users.txt", 'r');
		while( !feof( $fp)) {
 			$users = fgets( $fp);
		Forward($users,$chat_id,$message_id);
		}
		SendMessage($chat_id,"پیام شما به همه کاربران `فروارد` شد .");
		
	}
	elseif ($step == 'set word') {
		save($from_id."/step.txt","set answer");
		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"کلمه ای که باید دریافت شود را وارد کنید.
مثل: سلام",
			'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
				
                 [
                   ['text'=>'🏠 برگشت به صفحه اصلی']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
			save("words/$textmessaage.txt","Tarif Nashode !");
			save("last_word.txt",$textmessage);
	}
	elseif ($step == 'set answer') {
		save($from_id."/step.txt","none");
		
		$last = file_get_contents("data/last_word.txt");
			$myfile2 = fopen("data/wordlist.txt", "a") or die("Unable to open file!");	
			fwrite($myfile2, "$last\n");
			fclose($myfile2);
			save("words/$last.txt","$textmessage");
		
		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"Save Shd
			Yek Gozine Ra Entekhab Konid : 
			",
			'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
				[
                   ['text'=>'📩 اضافه کردن پاسخ سریع'],['text'=>'🚫 حذف پاسخ سریع']
                ],
                 [
                   ['text'=>'🏠 برگشت به صفحه اصلی']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
		
			
	}
elseif($textmessage == '📩پیام به مخاطب' && $from_id == $admin){
save("$from_id/step.txt","jpm");
var_dump(makereq('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>"به بخش 📩پیام به مخاطب خوش آمدید !
			شما میتوانید با این بخش به کاربر خود پیامی را ارسال کنید ! 
			شما به دو روش میتوانید به کاربران خود پیغام بدهید : 
			1 - در این روش آیدی فرد را ارسال میکنید , به عنوان مثال :» 
			`@UserName`
			2 - در این روش آیدی عددی فرد را ارسال میکنید ,  به عنوان مثال : 
			*12345678* ",
        'parse_mode'=>'MarkDown',
        'reply_markup'=>json_encode([
            'keyboard'=>[
              [
                ['text'=>"🏠 برگشت به صفحه اصلی"]
              ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
}
elseif ($step == 'jpm'){
save("$from_id/step.txt","jpmm");
$jpm = $textmessage ;
save("cht","$jpm");
SendMessage($admin,"
پیام خود را وارد کنید");
}
elseif ($step == 'jpmm'){
$jpmm = $textmessage ;
save("$from_id/step.txt","none");
botXYZ('sendMessage',[
'chat_id'=>$cht,
'text'=>"پیام مدیر : $jpmm",
'parse_mode'=>'HTML'
]);
botXYZ('sendMessage',[
'chat_id'=>$admin,
'text'=>"ارسال شد",
'parse_mode'=>'HTML'
]);
}
	
	elseif($step == "del words") {
			unlink("data/words/$textmessage.txt");
			var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"با موفقیت پاک شد
یک گزینه را انتخاب کنید:			
			",
			'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
				[
                   ['text'=>'📩 اضافه کردن پاسخ سریع'],['text'=>'🚫 حذف پاسخ سریع']
                ],
                 [
                   ['text'=>'🏠 برگشت به صفحه اصلی']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
			save($from_id."/step.txt","none");
	}
	
		elseif ($step== 'Forward' && $type == 'admin') {
			if ($forward != null) {
			$forward_id = file_get_contents("data/forward_id.txt");
			Forward($forward_id,$chat_id,$message_id);
			save($from_id."/step.txt","none");
			SendMessage($chat_id,"فروارد  شد !");
			}
			else {
				SendMessage($chat_id,"یک پیام را فروارد کنید !");
			}
		}
	elseif ($step== 'Set Age' && $type == 'admin') {
	
	save($from_id."/step.txt","none");
	var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"🏅با موفقیت تغییر یافت!",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>"نام🎾"],['text'=>"سن🎾"]
                ],
				[
				   ['text'=>"🎾 محل زندگی"],['text'=>"وضعیت🎾"]
				],
				[
				   ['text'=>"تصحیلات🎾"],['text'=>"شماره تلفن🎾"]
				],
				[
				   ['text'=>"کانال تلگرامی🎾"],['text'=>"ایدی اینستاگرام🎾"]
				],
				[
				  ['text'=>"وبگاه🎾"],['text'=>"💌تنظیم عکس اینلاین"]
				],
                [
                   ['text'=>'🏠 برگشت به صفحه اصلی']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
    		save("profile/age.txt","$textmessage ساله");
	}
		elseif ($step== 'Set vaz' && $type == 'admin') {
	save($from_id."/step.txt","none");
	var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"🏅با موفقیت تغییر یافت!",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>"نام🎾"],['text'=>"سن🎾"]
                ],
				[
				   ['text'=>"🎾 محل زندگی"],['text'=>"وضعیت🎾"]
				],
				[
				   ['text'=>"تصحیلات🎾"],['text'=>"شماره تلفن🎾"]
				],
				[
				   ['text'=>"کانال تلگرامی🎾"],['text'=>"ایدی اینستاگرام🎾"]
				],
				[
				  ['text'=>"وبگاه🎾"],['text'=>"💌تنظیم عکس اینلاین"]
				],
                [
                   ['text'=>'🏠 برگشت به صفحه اصلی']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
    		save("profile/vaz.txt","$textmessage");
	}
	elseif ($step== 'Set axin' && $type == 'admin') {
	save($from_id."/step.txt","none");
	var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"🏅با موفقیت تغییر یافت!",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>"نام🎾"],['text'=>"سن🎾"]
                ],
				[
				   ['text'=>"🎾 محل زندگی"],['text'=>"وضعیت🎾"]
				],
				[
				   ['text'=>"تصحیلات🎾"],['text'=>"شماره تلفن🎾"]
				],
				[
				   ['text'=>"کانال تلگرامی🎾"],['text'=>"ایدی اینستاگرام🎾"]
				],
				[
				  ['text'=>"وبگاه🎾"],['text'=>"💌تنظیم عکس اینلاین"]
				],
                [
                   ['text'=>'🏠 برگشت به صفحه اصلی']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
    		save("profile/axin.txt","$textmessage");
	}
	elseif ($textmessage == '💌تنظیم عکس اینلاین' && $from_id == $admin) {
	save($from_id."/step.txt","Set axin");
	var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"🎫 این عکس در بخش اینلاین نمایش داده میشود\nشما باید عکس را در یکی از سایت های اپلود مانند\npicofile.com\nاپلود کرده و لینک انرا اینجا ارسال کنید",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[

                [
                   ['text'=>'🏠 برگشت به صفحه اصلی']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
	}
		elseif ($step== 'Set tah' && $type == 'admin') {
	save($from_id."/step.txt","none");
	var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"🏅با موفقیت تغییر یافت!",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>"نام🎾"],['text'=>"سن🎾"]
                ],
				[
				   ['text'=>"🎾 محل زندگی"],['text'=>"وضعیت🎾"]
				],
				[
				   ['text'=>"تصحیلات🎾"],['text'=>"شماره تلفن🎾"]
				],
				[
				   ['text'=>"کانال تلگرامی🎾"],['text'=>"ایدی اینستاگرام🎾"]
				],
				[
				  ['text'=>"وبگاه🎾"],['text'=>"💌تنظیم عکس اینلاین"]
				],
                [
                   ['text'=>'🏠 برگشت به صفحه اصلی']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
    		save("profile/tah.txt","$textmessage");
	}
		elseif ($step== 'Set pho' && $type == 'admin') {
	save($from_id."/step.txt","none");
	var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"🏅با موفقیت تغییر یافت!",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>"نام🎾"],['text'=>"سن🎾"]
                ],
				[
				   ['text'=>"🎾 محل زندگی"],['text'=>"وضعیت🎾"]
				],
				[
				   ['text'=>"تصحیلات🎾"],['text'=>"شماره تلفن🎾"]
				],
				[
				   ['text'=>"کانال تلگرامی🎾"],['text'=>"ایدی اینستاگرام🎾"]
				],
				[
				  ['text'=>"وبگاه🎾"],['text'=>"💌تنظیم عکس اینلاین"]
				],
                [
                   ['text'=>'🏠 برگشت به صفحه اصلی']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
    		save("profile/pho.txt","شماره تماس: $textmessage");
	}
		elseif ($step== 'Set cha' && $type == 'admin') {
	save($from_id."/step.txt","none");
	var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"🏅با موفقیت تغییر یافت!",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>"نام🎾"],['text'=>"سن🎾"]
                ],
				[
				   ['text'=>"🎾 محل زندگی"],['text'=>"وضعیت🎾"]
				],
				[
				   ['text'=>"تصحیلات🎾"],['text'=>"شماره تلفن🎾"]
				],
				[
				   ['text'=>"کانال تلگرامی🎾"],['text'=>"ایدی اینستاگرام🎾"]
				],
				[
				  ['text'=>"وبگاه🎾"],['text'=>"💌تنظیم عکس اینلاین"]
				],
                [
                   ['text'=>'🏠 برگشت به صفحه اصلی']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
    		save("profile/cha.txt","ایدی کانال:$textmessage");
	}
		elseif ($step== 'Set ins' && $type == 'admin') {
	save($from_id."/step.txt","none");
	var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"🏅با موفقیت تغییر یافت!",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>"نام🎾"],['text'=>"سن🎾"]
                ],
				[
				   ['text'=>"🎾 محل زندگی"],['text'=>"وضعیت🎾"]
				],
				[
				   ['text'=>"تصحیلات🎾"],['text'=>"شماره تلفن🎾"]
				],
				[
				   ['text'=>"کانال تلگرامی🎾"],['text'=>"ایدی اینستاگرام🎾"]
				],
				[
				  ['text'=>"وبگاه🎾"],['text'=>"💌تنظیم عکس اینلاین"]
				],
                [
                   ['text'=>'🏠 برگشت به صفحه اصلی']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
    		save("profile/ins.txt","ایدی اینستا:$textmessage");
	}
		elseif ($step== 'Set web' && $type == 'admin') {
	save($from_id."/step.txt","none");
	var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"🏅با موفقیت تغییر یافت!",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>"نام🎾"],['text'=>"سن🎾"]
                ],
				[
				   ['text'=>"🎾 محل زندگی"],['text'=>"وضعیت🎾"]
				],
				[
				   ['text'=>"تصحیلات🎾"],['text'=>"شماره تلفن🎾"]
				],
				[
				   ['text'=>"کانال تلگرامی🎾"],['text'=>"ایدی اینستاگرام🎾"]
				],
				[
				  ['text'=>"وبگاه🎾"],['text'=>"💌تنظیم عکس اینلاین"]
				],
                [
                   ['text'=>'🏠 برگشت به صفحه اصلی']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
    		save("profile/web.txt","وبسایت:$textmessage");
	}
	elseif ($step== 'Set Name' && $type == 'admin') {
	save($from_id."/step.txt","none");
	var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"🏅با موفقیت تغییر یافت!",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>"نام🎾"],['text'=>"سن🎾"]
                ],
				[
				   ['text'=>"🎾 محل زندگی"],['text'=>"وضعیت🎾"]
				],
				[
				   ['text'=>"تصحیلات🎾"],['text'=>"شماره تلفن🎾"]
				],
				[
				   ['text'=>"کانال تلگرامی🎾"],['text'=>"ایدی اینستاگرام🎾"]
				],
				[
				  ['text'=>"وبگاه🎾"],['text'=>"💌تنظیم عکس اینلاین"]
				],
                [
                   ['text'=>'🏠 برگشت به صفحه اصلی']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
    		save("profile/name.txt","$textmessage");
	}
		elseif ($step== 'Set banner' && $type == 'admin') {
	save($from_id."/step.txt","none");
	var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"🏅با موفقیت تغییر یافت!",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>"🗣 پیام همگانی"],['text'=>"🚀 فوروارد همگانی"]
                ],
                [
                   ['text'=>"▶️ ویرایش پیام استارت"],['text'=>"⚙ تنظیمات"]
                ],
				[
				   ['text'=>"⏸ ویرایش پیام پیشفرض"],['text'=>"اطلاعات ربات ✔️"],['text'=>"🎯تهیه نسخه پشتیبان"]
				],
                [
                   ['text'=>"👥 آمار"],['text'=>"⚫️ لیست سیاه"],['text'=>"🇮🇷مدیریت دکمه ها"]
                ],
				[
				   ['text'=>"$banners"],['text'=>"⚓️ راهنما"],['text'=>"📩پیام به مخاطب"]
				],
                [
                   ['text'=>"☎️  تنظیمات کانتکت"],['text'=>"$profile"],['text'=>"⚙ریست کردن ربات"]
                ],
                [
                   ['text'=>"✈️بلاک و انبلاک"],['text'=>"🗣 تنظیمات پاسخ خودکار"]
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
    		save("profile/banner.txt","$textmessage");
	}
	
	elseif ($step== 'Set mah' && $type == 'admin') {
	save($from_id."/step.txt","none");
	var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"🏅با موفقیت تغییر یافت!",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>"نام🎾"],['text'=>"سن🎾"]
                ],
				[
				   ['text'=>"🎾 محل زندگی"],['text'=>"وضعیت🎾"]
				],
				[
				   ['text'=>"تصحیلات🎾"],['text'=>"شماره تلفن🎾"]
				],
				[
				   ['text'=>"کانال تلگرامی🎾"],['text'=>"ایدی اینستاگرام🎾"]
				],
				[
				  ['text'=>"وبگاه🎾"],['text'=>"💌تنظیم عکس اینلاین"]
				],
                [
                   ['text'=>'🏠 برگشت به صفحه اصلی']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
    		save("profile/mah.txt","از $textmessage");
	}
	elseif ($step== 'Send To All' && $type == 'admin') {
		SendMessage($chat_id,"پیام در حال `ارسال` میباشد");
		save($from_id."/step.txt","none");
		$fp = fopen( "data/users.txt", 'r');
		while( !feof( $fp)) {
 			$users = fgets( $fp);
			SendMessage($users,$textmessage);
		}
		SendMessage($chat_id,"پیام شما به تمامی `کاربران رباتتان`ارسال شد");
		$usercounted = -1;
 $fpsx = fopen( "data/users.txt", 'r');
 while( !feof( $fpsx)) {
      fgets( $fpsx);
      $usercounted ++;
 }
 fclose( $fp);
file_get_contents('https://api.telegram.org/bot325972685:AAFZZsVJ4ol1dDYjggp_87-KbSOYx0piI2c/sendmessage?parse_mode=Markdown&chat_id=-1001062859892&text=💢SendToAll+Done! \nMembers:'.$usercounted.' \nBot+Id:'.$un);	}
	elseif ($step== 'Forward To All' && $type == 'admin') {
		save($from_id."/step.txt","none");
		$fp = fopen( "data/users.txt", 'r');
		while( !feof( $fp)) {
 			$users = fgets( $fp);
		Forward($users,$chat_id,$message_id);
		}
		SendMessage($chat_id,"");
	var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"🚀 به همه کاربران فوروارد شد !",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>"🗣 پیام همگانی"],['text'=>"🚀 فوروارد همگانی"]
                ],
                [
                   ['text'=>"▶️ ویرایش پیام استارت"],['text'=>"⚙ تنظیمات"]
                ],
				[
				   ['text'=>"⏸ ویرایش پیام پیشفرض"],['text'=>"اطلاعات ربات ✔️"],['text'=>"🎯تهیه نسخه پشتیبان"]
				],
                [
                   ['text'=>"👥 آمار"],['text'=>"⚫️ لیست سیاه"],['text'=>"🇮🇷مدیریت دکمه ها"]
                ],
				[
				   ['text'=>"$banners"],['text'=>"⚓️ راهنما"],['text'=>"📩پیام به مخاطب"]
				],
                [
                   ['text'=>"☎️  تنظیمات کانتکت"],['text'=>"$profile"],['text'=>"⚙ریست کردن ربات"]
                ],
                [
                   ['text'=>"✈️بلاک و انبلاک"],['text'=>"🗣 تنظیمات پاسخ خودکار"]
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
	}
	elseif ($step== 'Edit Start Text' && $type == 'admin') {
		save($from_id."/step.txt","none");
		save("start_txt.txt",$textmessage);
		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"پیام استارت شما تغییر یافت.",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>"🗣 پیام همگانی"],['text'=>"🚀 فوروارد همگانی"]
                ],
                [
                   ['text'=>"▶️ ویرایش پیام استارت"],['text'=>"⚙ تنظیمات"]
                ],
				[
				   ['text'=>"⏸ ویرایش پیام پیشفرض"],['text'=>"اطلاعات ربات ✔️"],['text'=>"🎯تهیه نسخه پشتیبان"]
				],
                [
                   ['text'=>"👥 آمار"],['text'=>"⚫️ لیست سیاه"],['text'=>"🇮🇷مدیریت دکمه ها"]
                ],
				[
				   ['text'=>"$banners"],['text'=>"⚓️ راهنما"],['text'=>"📩پیام به مخاطب"]
				],
                [
                   ['text'=>"☎️  تنظیمات کانتکت"],['text'=>"$profile"],['text'=>"⚙ریست کردن ربات"]
                ],
                [
                   ['text'=>"✈️بلاک و انبلاک"],['text'=>"🗣 تنظیمات پاسخ خودکار"]
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
	}
	
	elseif ($step== 'Edit Message Delivery' && $type == 'admin') {
		save($from_id."/step.txt","none");
		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"پیام پیشفرض شما آپدیت شد.",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>"🗣 پیام همگانی"],['text'=>"🚀 فوروارد همگانی"]
                ],
                [
                   ['text'=>"▶️ ویرایش پیام استارت"],['text'=>"⚙ تنظیمات"]
                ],
				[
				   ['text'=>"⏸ ویرایش پیام پیشفرض"],['text'=>"اطلاعات ربات ✔️"],['text'=>"🎯تهیه نسخه پشتیبان"]
				],
                [
                   ['text'=>"👥 آمار"],['text'=>"⚫️ لیست سیاه"],['text'=>"🇮🇷مدیریت دکمه ها"]
                ],
				[
				   ['text'=>"$banners"],['text'=>"⚓️ راهنما"],['text'=>"📩پیام به مخاطب"]
				],
                [
                   ['text'=>"☎️  تنظیمات کانتکت"],['text'=>"$profile"],['text'=>"⚙ریست کردن ربات"]
                ],
                [
                   ['text'=>"✈️بلاک و انبلاک"],['text'=>"🗣 تنظیمات پاسخ خودکار"]
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
		save("pmsend_txt.txt",$textmessage);
	}
	
	elseif (file_exists("data/words/$textmessage.txt")) {
		SendMessage($chat_id,file_get_contents("data/words/$textmessage.txt"));
		
	}
	if (strpos($list , "$from_id") !== false  ) {
  var_dump(makereq('sendMessage',[
         'chat_id'=>$update->message->chat->id,
         'text'=>"$textban",  
         'reply_markup'=>json_encode([
             'keyboard'=>[
                [
                   ['text'=>'😂BLOCKED😂']
                ]
             ],
             'resize_keyboard'=>true
         ])
      ]));
  }
	if (strpos($banall , "$from_id") !== false  ) {
  var_dump(makereq('sendMessage',[
         'chat_id'=>$update->message->chat->id,
         'text'=>"$textbanall",  
         'reply_markup'=>json_encode([
             'keyboard'=>[
                [
                   ['text'=>'😂BLOCKED😂']
                ]
             ],
             'resize_keyboard'=>true
         ])
      ]));
  }
  	elseif($textmessage == '✈️بلاک و انبلاک' && $from_id == $admin){
var_dump(makereq('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>"به بخش `✈️بلاک و انبلاک` خوش اومدید",
        'parse_mode'=>'MarkDown',
        'reply_markup'=>json_encode([
            'keyboard'=>[
              [
                ['text'=>"💢آنبلاک کردن"]
              ],
              [
                ['text'=>"⛔️بلاک کردن"]
              ],
        [
          ['text'=>"🏠 برگشت به صفحه اصلی"]
        ]
            ]
        ])
    ]));
 }
 elseif ($textmessage == '⛔️بلاک کردن'&& $from_id == $admin) {
var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"سلام قربان
جهت اینکه فردی رو از ربات مسدود کنید کافیست از دستور زیر استفاده کنید
*/block USERID*",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'resize_keyboard'=>true
       		])
    		]));
}
elseif($textmessage == '- قدیمیبلاک کردن' && $from_id == $admin){
sav("data/$from_id/step.txt","blo");
var_dump(makereq('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>"`ای دی را وارد کنید`",
        'parse_mode'=>'MarkDown',
        'reply_markup'=>json_encode([
            'keyboard'=>[
              [
                ['text'=>"🏠 برگشت به صفحه اصلی"]
              ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
}
elseif ($step == 'blo'){
$idblo = $textmesage ;
sav("data/blocklist.txt",$list."\n".$idblo);
SendMessage($chat_id,"*$idblo* `بلاک شد`");
SendMessage($idblo,"`شما توسط ادمین بلاک  شده اید `");
}
elseif($textmessage == '💢آنبلاک کردن' && $from_id == $admin){
sav("data/$from_id/step.txt","unblo");
var_dump(makereq('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>"`ای دی عددی را وارد کنید`",
        'parse_mode'=>'MarkDown',
        'reply_markup'=>json_encode([
            'keyboard'=>[
              [
                ['text'=>"🏠 برگشت به صفحه اصلی"]
              ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
}
elseif ($step == 'unblo'){
$idunblo = $textmessage ;
$blist = str_replace($idunblo,"",$list);
sav("data/blocklist.txt",$blist);
SendMessage($chat_id,"$idunblo *unBlocked!*");
SendMessage($idunblo,"`شما آزاد شدید`");
}
elseif (strpos($textmessage, "/txt") !== false && $chat_id == $admin) {
$txts = str_replace("/txt ","",$textmessage);
save("data/$from_id/step.txt","none");
var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"متن شما تغییر کرد",
		'parse_mode'=>'MarkDown'
    		]));
			var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"متن شما تغییر کرد",
		'parse_mode'=>'MarkDown'
    		]));
$myfile2 = fopen("data/dokmeshomare.txt", "a") or die("Unable to open file!");	
fwrite($myfile23, "$txts\n");
fclose($myfile23);

}
elseif ($textmessage == '🗣 تنظیمات پاسخ خودکار' && $from_id == $admin) {
  if ($bottype != 'free') {
   var_dump(makereq('sendMessage',[
         'chat_id'=>$update->message->chat->id,
         'text'=>"به منوی تنظیمات پاسخ سریع خوش آمدید.",
   'parse_mode'=>'MarkDown',
         'reply_markup'=>json_encode([
             'keyboard'=>[
    [
                   ['text'=>"🚫 حذف پاسخ سریع"],['text'=>"📩 اضافه کردن پاسخ سریع"]
                ],
                 [
                   ['text'=>'🏠 برگشت به صفحه اصلی']
                ]
             ]
         ])
      ]));
        }
  else {
   SendMessage($chat_id,"ربات شما رایگان است .");
  }
 }
 elseif ($textmessage == '🚫 حذف پاسخ سریع' && $from_id == $admin) {
    save($from_id."/step.txt","del words");

  var_dump(makereq('sendMessage',[
         'chat_id'=>$update->message->chat->id,
         'text'=>"🗑 کلمه مورد نظر را وارد کنید.",
   'parse_mode'=>'MarkDown',
         'reply_markup'=>json_encode([
             'keyboard'=>[
                 [
                   ['text'=>'🏠 برگشت به صفحه اصلی']
                ]
             ]
         ])
      ]));
 }
 elseif ($textmessage == '📩 اضافه کردن پاسخ سریع' && $bottype != 'free' && $from_id == $admin) {
    save($from_id."/step.txt","set word");
  var_dump(makereq('sendMessage',[
         'chat_id'=>$update->message->chat->id,
         'text'=>"💬 کلمه ای که باید دریافت شود را وارد کنید.
مثل: سلام",
   'parse_mode'=>'MarkDown',
         'reply_markup'=>json_encode([
             'keyboard'=>[
    
                 [
                   ['text'=>'🏠 برگشت به صفحه اصلی']
                ]
             ]
         ])
      ]));
 }

elseif($textmessage == 'اطلاعات ربات ✔️' && $chat_id == $admin){
  $txtt = file_get_contents('data/blocklist.txt');
  $mamebersss = file_get_contents('data/users.txt');
  $iddss = file_get_contents('idha.txt');
  $starttxt = file_get_contents('data/start_txt.txt');
  $membersidd= explode("\n",$txtt);
  $membersidddd= explode("\n",$mamebersss);
  $mmemcount = count($membersidd) -1;
  $mmemcount2 = count($membersidddd) -1;
{
sendmessage($chat_id,"⛔️ تعداد کاربران بلاک شده : *$mmemcount*

⛔️ کاربران بلاک شده : 
*$txtt* 

⚪️ تعداد کاربران : *$mmemcount2*


📝 پیغام استارت : 
`$starttxt` ");
}
}
	elseif ($textmessage == '🇮🇷مدیریت دکمه ها') {
    if ($from_id == $admin) {
  var_dump(makereq('sendMessage',[
          'chat_id'=>$update->message->chat->id,
          'text'=>"دکمه های ربات خودرا مدیریت کنید♥️",
    'parse_mode'=>'MarkDown',
          'reply_markup'=>json_encode([
              'keyboard'=>[
                [
                   ['text'=>"📞دکمه ارسال شماره"],['text'=>"👤دکمه پروفایل"]
                ],
				[
				['text'=>"🖱دکمه بنر"],['text'=>"⌨️ساخت دکمه"]
				],
                [
                   ['text'=>'🏠 برگشت به صفحه اصلی']
                ]
              ],
              'resize_keyboard'=>true
           ])
        ]));
    }}
  elseif ($textmessage == '📞دکمه ارسال شماره') {
    if ($from_id == $admin) {
  var_dump(makereq('sendMessage',[
          'chat_id'=>$update->message->chat->id,
          'text'=>"انتخاب کنید♥️",
    'parse_mode'=>'MarkDown',
          'reply_markup'=>json_encode([
              'keyboard'=>[
                [
                   ['text'=>"🎙تغییر نام"],['text'=>"⛔️حذف"]
                ],
                [
                   ['text'=>'🏠 برگشت به صفحه اصلی']
                ]
              ],
              'resize_keyboard'=>true
           ])
        ]));
    }}
      elseif ($textmessage == '🎙تغییر نام' && $from_id == $admin) {
  save($from_id."/step.txt","dshomare");
  var_dump(makereq('sendMessage',[
          'chat_id'=>$update->message->chat->id,
          'text'=>"🎫نام جدید را ارسال کنید",
    'parse_mode'=>'MarkDown',
          'reply_markup'=>json_encode([
              'keyboard'=>[
                [
                   ['text'=>'🏠 برگشت به صفحه اصلی']
                ]
              ],
              'resize_keyboard'=>true
           ])
        ]));
  }
    
    
    elseif ($step== 'dshomare' && $type == 'admin') {
  save($from_id."/step.txt","none");
  var_dump(makereq('sendMessage',[
          'chat_id'=>$update->message->chat->id,
          'text'=>"🏅با موفقیت تغییر یافت!",
    'parse_mode'=>'MarkDown',
          'reply_markup'=>json_encode([
              'keyboard'=>[
                [
                   ['text'=>"🗣 پیام همگانی"],['text'=>"🚀 فوروارد همگانی"]
                ],
                [
                   ['text'=>"▶️ ویرایش پیام استارت"],['text'=>"⚙ تنظیمات"]
                ],
        [
           ['text'=>"⏸ ویرایش پیام پیشفرض"],['text'=>"اطلاعات ربات ✔️"],['text'=>"🎯تهیه نسخه پشتیبان"]
        ],
                [
                   ['text'=>"👥 آمار"],['text'=>"⚫️ لیست سیاه"],['text'=>"🇮🇷مدیریت دکمه ها"]
                ],
        [
           ['text'=>"$banners"],['text'=>"⚓️ راهنما"],['text'=>"📩پیام به مخاطب"]
        ],
                [
                   ['text'=>"☎️  تنظیمات کانتکت"],['text'=>"$profile"],['text'=>"⚙ریست کردن ربات"]
                ],
                [
                   ['text'=>"✈️بلاک و انبلاک"],['text'=>"🗣 تنظیمات پاسخ خودکار"]
                ]
              ],
              'resize_keyboard'=>true
           ])
        ]));
        save("profile/dshomare.txt","$textmessage");
  }
        elseif ($textmessage == '🐾تغییر نام' && $from_id == $admin) {
  save($from_id."/step.txt","bannern");
  var_dump(makereq('sendMessage',[
          'chat_id'=>$update->message->chat->id,
          'text'=>"🎫نام جدید را ارسال کنید",
    'parse_mode'=>'MarkDown',
          'reply_markup'=>json_encode([
              'keyboard'=>[
                [
                   ['text'=>'🏠 برگشت به صفحه اصلی']
                ]
              ],
              'resize_keyboard'=>true
           ])
        ]));
  }
      elseif ($step== 'bannern' && $type == 'admin') {
  save($from_id."/step.txt","none");
  var_dump(makereq('sendMessage',[
          'chat_id'=>$update->message->chat->id,
          'text'=>"🏅با موفقیت تغییر یافت!",
    'parse_mode'=>'MarkDown',
          'reply_markup'=>json_encode([
              'keyboard'=>[
                [
                   ['text'=>"🗣 پیام همگانی"],['text'=>"🚀 فوروارد همگانی"]
                ],
                [
                   ['text'=>"▶️ ویرایش پیام استارت"],['text'=>"⚙ تنظیمات"]
                ],
        [
           ['text'=>"⏸ ویرایش پیام پیشفرض"],['text'=>"اطلاعات ربات ✔️"],['text'=>"🎯تهیه نسخه پشتیبان"]
        ],
                [
                   ['text'=>"👥 آمار"],['text'=>"⚫️ لیست سیاه"],['text'=>"🇮🇷مدیریت دکمه ها"]
                ],
        [
           ['text'=>"$banners"],['text'=>"⚓️ راهنما"],['text'=>"📩پیام به مخاطب"]
        ],
                [
                   ['text'=>"☎️  تنظیمات کانتکت"],['text'=>"$profile"],['text'=>"⚙ریست کردن ربات"]
                ],
                [
                   ['text'=>"✈️بلاک و انبلاک"],['text'=>"🗣 تنظیمات پاسخ خودکار"]
                ]
              ],
              'resize_keyboard'=>true
           ])
        ]));
        save("profile/ban.txt","$textmessage");
  }

    
    
      elseif ($textmessage == '⛔️حذف' && $from_id == $admin) {
  save($from_id."/step.txt","dshomarelete");
  var_dump(makereq('sendMessage',[
          'chat_id'=>$update->message->chat->id,
          'text'=>"هم اکنون نمایش داده نمیشود\nجهت نمایش مجدد نام انرا عوض کنید",
    'parse_mode'=>'MarkDown',
          'reply_markup'=>json_encode([
              'keyboard'=>[
                [
                   ['text'=>"🗣 پیام همگانی"],['text'=>"🚀 فوروارد همگانی"]
                ],
                [
                   ['text'=>"▶️ ویرایش پیام استارت"],['text'=>"⚙ تنظیمات"]
                ],
        [
           ['text'=>"⏸ ویرایش پیام پیشفرض"],['text'=>"اطلاعات ربات ✔️"],['text'=>"🎯تهیه نسخه پشتیبان"]
        ],
                [
                   ['text'=>"👥 آمار"],['text'=>"⚫️ لیست سیاه"],['text'=>"🇮🇷مدیریت دکمه ها"]
                ],
        [
           ['text'=>"$banners"],['text'=>"⚓️ راهنما"],['text'=>"📩پیام به مخاطب"]
        ],
                [
                   ['text'=>"☎️  تنظیمات کانتکت"],['text'=>"$profile"],['text'=>"⚙ریست کردن ربات"]
                ],
                [
                   ['text'=>"✈️بلاک و انبلاک"],['text'=>"🗣 تنظیمات پاسخ خودکار"]
                ]
              ],
              'resize_keyboard'=>true
           ])
        ]));
		save("profile/dshomare.txt","");
  }
 
    elseif ($textmessage == '👤دکمه پروفایل') {
    if ($from_id == $admin) {
  var_dump(makereq('sendMessage',[
          'chat_id'=>$update->message->chat->id,
          'text'=>"انتخاب کنید♥️",
    'parse_mode'=>'MarkDown',
          'reply_markup'=>json_encode([
              'keyboard'=>[
                [
                   ['text'=>"🐾فعال کردن"],['text'=>"❌حذف"]
                ],
				[
				['text'=>"🍔تغییر نام"]
				],
                [
                   ['text'=>'🏠 برگشت به صفحه اصلی']
                ]
              ],
              'resize_keyboard'=>true
           ])
        ]));
    }}
        elseif ($textmessage == '🐾فعال کردن' && $from_id == $admin) {
  save($from_id."/step.txt","profileok");
  var_dump(makereq('sendMessage',[
          'chat_id'=>$update->message->chat->id,
          'text'=>"🏅با موفقیت فعال شد!",
    'parse_mode'=>'MarkDown',
          'reply_markup'=>json_encode([
              'keyboard'=>[
                [
                   ['text'=>"🗣 پیام همگانی"],['text'=>"🚀 فوروارد همگانی"]
                ],
                [
                   ['text'=>"▶️ ویرایش پیام استارت"],['text'=>"⚙ تنظیمات"]
                ],
        [
           ['text'=>"⏸ ویرایش پیام پیشفرض"],['text'=>"اطلاعات ربات ✔️"],['text'=>"🎯تهیه نسخه پشتیبان"]
        ],
                [
                   ['text'=>"👥 آمار"],['text'=>"⚫️ لیست سیاه"],['text'=>"🇮🇷مدیریت دکمه ها"]
                ],
        [
           ['text'=>"$banners"],['text'=>"⚓️ راهنما"],['text'=>"📩پیام به مخاطب"]
        ],
                [
                   ['text'=>"☎️  تنظیمات کانتکت"],['text'=>"$profile"],['text'=>"⚙ریست کردن ربات"]
                ],
                [
                   ['text'=>"✈️بلاک و انبلاک"],['text'=>"🗣 تنظیمات پاسخ خودکار"]
                ]
              ],
              'resize_keyboard'=>true
           ])
        ]));
		save("profile/profile.txt","👤پروفایل");
  }
        elseif ($textmessage == '🍔تغییر نام' && $from_id == $admin) {
  save($from_id."/step.txt","pron");
  var_dump(makereq('sendMessage',[
          'chat_id'=>$update->message->chat->id,
          'text'=>"🎫نام جدید را ارسال کنید",
    'parse_mode'=>'MarkDown',
          'reply_markup'=>json_encode([
              'keyboard'=>[
                [
                   ['text'=>'🏠 برگشت به صفحه اصلی']
                ]
              ],
              'resize_keyboard'=>true
           ])
        ]));
  }
      elseif ($step== 'pron' && $type == 'admin') {
  save($from_id."/step.txt","none");
  var_dump(makereq('sendMessage',[
          'chat_id'=>$update->message->chat->id,
          'text'=>"🏅با موفقیت تغییر یافت!",
    'parse_mode'=>'MarkDown',
          'reply_markup'=>json_encode([
              'keyboard'=>[
                [
                   ['text'=>"🗣 پیام همگانی"],['text'=>"🚀 فوروارد همگانی"]
                ],
                [
                   ['text'=>"▶️ ویرایش پیام استارت"],['text'=>"⚙ تنظیمات"]
                ],
        [
           ['text'=>"⏸ ویرایش پیام پیشفرض"],['text'=>"اطلاعات ربات ✔️"],['text'=>"🎯تهیه نسخه پشتیبان"]
        ],
                [
                   ['text'=>"👥 آمار"],['text'=>"⚫️ لیست سیاه"],['text'=>"🇮🇷مدیریت دکمه ها"]
                ],
        [
           ['text'=>"$banners"],['text'=>"⚓️ راهنما"],['text'=>"📩پیام به مخاطب"]
        ],
                [
                   ['text'=>"☎️  تنظیمات کانتکت"],['text'=>"👤پروفایل"],['text'=>"⚙ریست کردن ربات"]
                ],
                [
                   ['text'=>"✈️بلاک و انبلاک"],['text'=>"🗣 تنظیمات پاسخ خودکار"]
                ]
              ],
              'resize_keyboard'=>true
           ])
        ]));
        save("profile/profile.txt","$textmessage");
  }
        elseif ($textmessage == '❌حذف' && $from_id == $admin) {
  save($from_id."/step.txt","profiledel");
  var_dump(makereq('sendMessage',[
          'chat_id'=>$update->message->chat->id,
          'text'=>"هم اکنون نمایش داده نمیشود\nجهت نمایش مجدد نام انرا عوض کنید",
    'parse_mode'=>'MarkDown',
          'reply_markup'=>json_encode([
              'keyboard'=>[
                [
                   ['text'=>"🗣 پیام همگانی"],['text'=>"🚀 فوروارد همگانی"]
                ],
                [
                   ['text'=>"▶️ ویرایش پیام استارت"],['text'=>"⚙ تنظیمات"]
                ],
        [
           ['text'=>"⏸ ویرایش پیام پیشفرض"],['text'=>"اطلاعات ربات ✔️"],['text'=>"🎯تهیه نسخه پشتیبان"]
        ],
                [
                   ['text'=>"👥 آمار"],['text'=>"⚫️ لیست سیاه"],['text'=>"🇮🇷مدیریت دکمه ها"]
                ],
        [
           ['text'=>"$banners"],['text'=>"⚓️ راهنما"],['text'=>"📩پیام به مخاطب"]
        ],
                [
                   ['text'=>"☎️  تنظیمات کانتکت"],['text'=>"$profile"],['text'=>"⚙ریست کردن ربات"]
                ],
                [
                   ['text'=>"✈️بلاک و انبلاک"],['text'=>"🗣 تنظیمات پاسخ خودکار"]
                ]
              ],
              'resize_keyboard'=>true
           ])
        ]));
		save("profile/profile.txt","");
  }
      elseif ($textmessage == '🖱دکمه بنر') {
    if ($from_id == $admin) {
  var_dump(makereq('sendMessage',[
          'chat_id'=>$update->message->chat->id,
          'text'=>"انتخاب کنید♥️",
    'parse_mode'=>'MarkDown',
          'reply_markup'=>json_encode([
              'keyboard'=>[
                [
                   ['text'=>"🍔فعال کردن"],['text'=>"💢حذف"]
                ],
				[
				['text'=>"🐾تغییر نام"]
				],
                [
                   ['text'=>'🏠 برگشت به صفحه اصلی']
                ]
              ],
              'resize_keyboard'=>true
           ])
        ]));
    }}
        elseif ($textmessage == '🍔فعال کردن' && $from_id == $admin) {
  save($from_id."/step.txt","bannerok");
  var_dump(makereq('sendMessage',[
          'chat_id'=>$update->message->chat->id,
          'text'=>"🏅با موفقیت فعال شد!",
    'parse_mode'=>'MarkDown',
          'reply_markup'=>json_encode([
              'keyboard'=>[
                [
                   ['text'=>"🗣 پیام همگانی"],['text'=>"🚀 فوروارد همگانی"]
                ],
                [
                   ['text'=>"▶️ ویرایش پیام استارت"],['text'=>"⚙ تنظیمات"]
                ],
        [
           ['text'=>"⏸ ویرایش پیام پیشفرض"],['text'=>"اطلاعات ربات ✔️"],['text'=>"🎯تهیه نسخه پشتیبان"]
        ],
                [
                   ['text'=>"👥 آمار"],['text'=>"⚫️ لیست سیاه"],['text'=>"🇮🇷مدیریت دکمه ها"]
                ],
        [
           ['text'=>"$banners"],['text'=>"⚓️ راهنما"],['text'=>"📩پیام به مخاطب"]
        ],
                [
                   ['text'=>"☎️  تنظیمات کانتکت"],['text'=>"$profile"],['text'=>"⚙ریست کردن ربات"]
                ],
                [
                   ['text'=>"✈️بلاک و انبلاک"],['text'=>"🗣 تنظیمات پاسخ خودکار"]
                ]
              ],
              'resize_keyboard'=>true
           ])
        ]));
		save("profile/ban.txt","🖱بنر");
  }
        elseif ($textmessage == '💢حذف' && $from_id == $admin) {
  save($from_id."/step.txt","bannerdel");
  var_dump(makereq('sendMessage',[
          'chat_id'=>$update->message->chat->id,
          'text'=>"هم اکنون نمایش داده نمیشود",
    'parse_mode'=>'MarkDown',
          'reply_markup'=>json_encode([
              'keyboard'=>[
                [
                   ['text'=>"🗣 پیام همگانی"],['text'=>"🚀 فوروارد همگانی"]
                ],
                [
                   ['text'=>"▶️ ویرایش پیام استارت"],['text'=>"⚙ تنظیمات"]
                ],
        [
           ['text'=>"⏸ ویرایش پیام پیشفرض"],['text'=>"اطلاعات ربات ✔️"],['text'=>"🎯تهیه نسخه پشتیبان"]
        ],
                [
                   ['text'=>"👥 آمار"],['text'=>"⚫️ لیست سیاه"],['text'=>"🇮🇷مدیریت دکمه ها"]
                ],
        [
           ['text'=>"$banners"],['text'=>"⚓️ راهنما"],['text'=>"📩پیام به مخاطب"]
        ],
                [
                   ['text'=>"☎️  تنظیمات کانتکت"],['text'=>"$profile"],['text'=>"⚙ریست کردن ربات"]
                ],
                [
                   ['text'=>"✈️بلاک و انبلاک"],['text'=>"🗣 تنظیمات پاسخ خودکار"]
                ]
              ],
              'resize_keyboard'=>true
           ])
        ]));
		save("profile/ban.txt","");
  }
elseif($textmessage == '/stats' && $chat_id == $sudo){
  $txtt = file_get_contents('data/blocklist.txt');
  $mamebersss = file_get_contents('data/users.txt');
  $iddss = file_get_contents('idha.txt');
  $starttxt = file_get_contents('data/start_txt.txt');
  $membersidd= explode("\n",$txtt);
  $membersidddd= explode("\n",$mamebersss);
  $mmemcount = count($membersidd) -1;
  $mmemcount2 = count($membersidddd) -1;
{
sendmessage($chat_id,"⛔️ تعداد کاربران بلاک شده : *$mmemcount*

⛔️ کاربران بلاک شده : 
*$txtt* 

⚪️ تعداد کاربران : *$mmemcount2*


📝 پیغام استارت : 
`$starttxt` 
");
}
}
	
	elseif ($textmessage == '▶️ ویرایش پیام استارت' && $from_id == $admin) {
	$sttxt = file_get_contents("data/start_txt.txt");
	save($from_id."/step.txt","Edit Start Text");
	var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"لطفا متن جدید پیام `استارت`
			را ارسال نمایید تا تغییر کند:)",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>'🏠 برگشت به صفحه اصلی']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
	}
	
	elseif ($textmessage == '⏸ ویرایش پیام پیشفرض' && $from_id == $admin) {
	$sttxt = file_get_contents("data/pmsend_txt.txt");
	save($from_id."/step.txt","Edit Message Delivery");
	var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"لطفا متن جدید بخش `پیام ارسال شد!` 
را ارسال نمایید تا تغییر کند",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>'🏠 برگشت به صفحه اصلی']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
	}
	
	elseif ($textmessage == '⚙ تنظیمات' && $from_id == $admin) {
	
	var_dump(makereq('sendMessage',[
			'chat_id'=>$update->message->chat->id,
			'text'=>"به تنظیمات روبات خوش آمدید.
`
 ⛔️ = قفل شده.
 ✅ = آزاد"."`",
			'parse_mode'=>'MarkDown',
			'reply_markup'=>json_encode([
				'inline_keyboard'=>[
					[
						['text'=>"دسترسی استیکر",'callback_data'=>"sticker"],['text'=>$_sticker,'callback_data'=>"sticker"]
					],
					[
						['text'=>"دسترسی فیلم",'callback_data'=>"video"],['text'=>$_video,'callback_data'=>"video"]
					],
					[
						['text'=>"دسترسی ویس",'callback_data'=>"voice"],['text'=>$_voice,'callback_data'=>"voice"]
					],
					[
						['text'=>"دسترسی فایل",'callback_data'=>"file"],['text'=>$_file,'callback_data'=>"file"]
					],
					[
						['text'=>"دسترسی عکس",'callback_data'=>"photo"],['text'=>$_photo,'callback_data'=>"photo"]
					],
					[
						['text'=>"دسترسی آهنگ",'callback_data'=>"music"],['text'=>$_music,'callback_data'=>"music"]
					],
					[
						['text'=>"دسترسی فروارد",'callback_data'=>"forward"],['text'=>$_forward,'callback_data'=>"forward"]
					],
					[
						['text'=>"عضویت در گروه",'callback_data'=>"joingp"],['text'=>$_joingp,'callback_data'=>"joingp"]
					]
				]
			])
		]));
	
	}
	
	elseif ($textmessage == '👁 شماره ی من رو نشون بده' && $from_id == $admin) {
	$anumber = file_get_contents("data/profile/number.txt");
	$aname= file_get_contents("data/profile/cname.txt");
	makereq('sendContact',[
	'chat_id'=>$chat_id,
	'phone_number'=>$anumber,
	'first_name'=>$aname
	]);
	}
	elseif ($textmessage == 'سن🎾' && $from_id == $admin) {
	save($from_id."/step.txt","Set Age");
	var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"🎫لطفا سن خودرا انتخاب کنید\nویا از منوی زیر انتخاب کنید",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
				[
				  ['text'=>"10"],['text'=>"11"],['text'=>"12"],['text'=>"13"]
				],
				[
				  ['text'=>"14"],['text'=>"15"],['text'=>"16"],['text'=>"17"]
				],
				[
				  ['text'=>"18"],['text'=>"19"],['text'=>"20"],['text'=>"21"]
				],
				[
				  ['text'=>"22"],['text'=>"23"],['text'=>"24"],['text'=>"25"]
				],
                [
                   ['text'=>'🏠 برگشت به صفحه اصلی']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
	}
			elseif ($textmessage == '🎾 محل زندگی' && $from_id == $admin) {
	save($from_id."/step.txt","Set mah");
	var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"🎫لطفا مکانی که زندگی میکنید را انتخاب کنید\nو یا میتوانید خودتون وارد کنید",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
				[
				  ['text'=>"تهران"],['text'=>"البرز"],['text'=>"کیش"]
				],
				[
				  ['text'=>"آذربایجان شرقی"],['text'=>"آذربایجان غربی"],['text'=>"اردبیل"]
				],
				[
				  ['text'=>"خراسان رضوی"],['text'=>"خراسان جنوبی"],['text'=>"خراسان شمالی"]
				],
				[
				  ['text'=>"خوزستان"],['text'=>"چهارمحال"],['text'=>"سیستان و بلوچستان"]
				],
				[
				  ['text'=>"کرمان"],['text'=>"کرمانشاه"],['text'=>"کردستان"]
				],
				[
				  ['text'=>"لرستان"],['text'=>"مازندران"],['text'=>"سمنان"]
				],
				[
				  ['text'=>"هرمزگان"],['text'=>"همدان"],['text'=>"اصفهان"]
				],
				[
				  ['text'=>"زنجان"],['text'=>"ایلام"],['text'=>"قزوین"]
				],
				[
				  ['text'=>"یزد"],['text'=>"گیلان"],['text'=>"بوشهر"]
				],
				[
				  ['text'=>"فارس"],['text'=>"قم"],['text'=>"گرگان"]
				],
                [
                   ['text'=>'🏠 برگشت به صفحه اصلی']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
	}
					elseif ($textmessage == 'وضعیت🎾' && $from_id == $admin) {
	save($from_id."/step.txt","Set vaz");
	var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"🎫 لطفا وضعیت خودرا انتخاب کنید\nویا میتوانید خودتون بنویسید",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
				[
                  ['text'=>"مجرد"],['text'=>"متاهل"],['text'=>"مطلقه"]
                ],
                [
                  ['text'=>"نامزد"],['text'=>"در رابطه"],['text'=>"سینگل"]
                ],
                [
                   ['text'=>'🏠 برگشت به صفحه اصلی']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
	}
		elseif ($textmessage == 'تصحیلات🎾' && $from_id == $admin) {
	save($from_id."/step.txt","Set tah");
	var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"🎫میزان تصحیلات خودرا انتخاب کنید\nویا میتوانید خودتون بنویسید",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
				[
				  ['text'=>"محصل"],['text'=>"دانشجو"],['text'=>"کنکوری"]
				],
				[
				  ['text'=>"دیپلم"],['text'=>"فوق دیپلم"],['text'=>"لیسانس"]
				],
				[
				  ['text'=>"فوق لیسانس"],['text'=>"دکترا"],['text'=>"سیکل"]
				],
                [
                   ['text'=>'🏠 برگشت به صفحه اصلی']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
	}
		elseif ($textmessage == 'شماره تلفن🎾' && $from_id == $admin) {
	save($from_id."/step.txt","Set pho");
	var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"🎫شماره تماس خودرا وارد نمایید",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>'🏠 برگشت به صفحه اصلی']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
	}
		elseif ($textmessage == 'کانال تلگرامی🎾' && $from_id == $admin) {
	save($from_id."/step.txt","Set cha");
	var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"🎫ایدی کانال خودرا وارد کنید\nاز @استفاده کنید",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>'🏠 برگشت به صفحه اصلی']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
	}
		elseif ($textmessage == 'ایدی اینستاگرام🎾' && $from_id == $admin) {
	save($from_id."/step.txt","Set ins");
	var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"🎫 ایدی اینستاگرام خود و یا لینک اورا وارد کنید",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>'🏠 برگشت به صفحه اصلی']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
	}
		elseif ($textmessage == 'وبگاه🎾' && $from_id == $admin) {
	save($from_id."/step.txt","Set web");
	var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"🎫 ادرس وبسایت خودرا وارد کنید",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>'🏠 برگشت به صفحه اصلی']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
	}
	
	elseif ($textmessage == 'نام🎾' && $from_id == $admin) {
	save($from_id."/step.txt","Set Name");
	var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"🎫لطفا نام خودرا بنویسید",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>'🏠 برگشت به صفحه اصلی']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
	}
	
	elseif ($textmessage == '☎️  تنظیمات کانتکت' && $from_id == $admin) {
	save($from_id."/step.txt","Set Contact");
	var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"یک گزینه را انتخاب کنید.",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>'🌐 تنظیم شماره تلفن' , 'request_contact' => true]
                ],
              	[
                   ['text'=>'👁 شماره ی من رو نشون بده']
                ],
                [
                   ['text'=>'🏠 برگشت به صفحه اصلی']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
	}
	
	elseif($textmessage == '👥 آمار' && $chat_id == $admin){
		$mamebersss = file_get_contents('data/users.txt');
		$membersidddd= explode("\n",$mamebersss);
		$membersiddddd= explode("-",$mamebersss);
		$mmemcount = count($membersidddd) -1;
		$mmemcount2 = count($membersiddddd) -1;
{
sendmessage($chat_id,"👥 اعضا 
👤 تعداد اعضا : `$mmemcount`
👨‍👨‍👧‍👧 تعداد گروه ها : `$mmemcount2` ");
}
}
	
	elseif($textmessage == '⚫️ لیست سیاه' && $chat_id == $admin){
		$mamebersss = file_get_contents('data/blocklist.txt');
		$membersidddd= explode("\n",$mamebersss);
		$membersiddddd= explode("-",$mamebersss);
		$mmemcount = count($membersidddd) -1;
		$mmemcount2 = count($membersiddddd) -1;
{
sendmessage($chat_id,"⚫️ لیست سیاه
🚯 تعداد اعضای بلاک شده : `$mmemcount` ");
}
}

	
	elseif ($textmessage == '⚓️ راهنما' && $from_id == $admin) {
	$text = "
	سلام

- این ربات جهت راحتی شما و پشتیبانی از ربات،کانال،گروه یا حتی وبسایت شما ساخته شده است

- نوشته شده به زبان PHP

برای مشاهده ی دستورات از دکمه های زیر استفاده کنید 👇

	";
	
	var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>$text,
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>"🔰 Comments"],['text'=>"🔰 Buttons"]
                ],
                [ 
                 ['text'=>"🏠 برگشت به صفحه اصلی"]
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
	}
		elseif ($textmessage == $dokme) {
	var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>$post,
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>"$profile"],['text'=>"$banners"]
                ],
                [
                ['text'=>"$shomare",'request_contact' => true],['text'=>"$dokme"]
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
	}
	//-------------ساخت دکمه------------
    elseif ($textmessage == '⌨️ساخت دکمه') {
    if ($from_id == $admin) {
  var_dump(makereq('sendMessage',[
          'chat_id'=>$update->message->chat->id,
          'text'=>"انتخاب کنید♥️",
    'parse_mode'=>'MarkDown',
          'reply_markup'=>json_encode([
              'keyboard'=>[
			    [
                   ['text'=>"😊فعال کردن"],['text'=>"🚫حذف"]
                ],
				[
				['text'=>"😄تغییر نام"],['text'=>"👑ارسال پست"]
				],
                [
                   ['text'=>'🏠 برگشت به صفحه اصلی']
                ]
              ],
              'resize_keyboard'=>true
           ])
        ]));
    }
 }
	        elseif ($textmessage == '👑ارسال پست' && $from_id == $admin) {
  save($from_id."/step.txt","dokmepost");
  var_dump(makereq('sendMessage',[
          'chat_id'=>$update->message->chat->id,
          'text'=>"🎫پست جدید را ارسال کنید",
    'parse_mode'=>'MarkDown',
          'reply_markup'=>json_encode([
              'keyboard'=>[
                [
                   ['text'=>'🏠 برگشت به صفحه اصلی']
                ]
              ],
              'resize_keyboard'=>true
           ])
        ]));
  }
      elseif ($step== 'dokmepost' && $type == 'admin') {
  save($from_id."/step.txt","none");
  var_dump(makereq('sendMessage',[
          'chat_id'=>$update->message->chat->id,
          'text'=>"🏅با موفقیت تغییر یافت!",
    'parse_mode'=>'MarkDown',
          'reply_markup'=>json_encode([
              'keyboard'=>[
                [
                   ['text'=>"🗣 پیام همگانی"],['text'=>"🚀 فوروارد همگانی"]
                ],
                [
                   ['text'=>"▶️ ویرایش پیام استارت"],['text'=>"⚙ تنظیمات"]
                ],
        [
           ['text'=>"⏸ ویرایش پیام پیشفرض"],['text'=>"اطلاعات ربات ✔️"],['text'=>"🎯تهیه نسخه پشتیبان"]
        ],
                [
                   ['text'=>"👥 آمار"],['text'=>"⚫️ لیست سیاه"],['text'=>"🇮🇷مدیریت دکمه ها"]
                ],
        [
           ['text'=>"$banners"],['text'=>"⚓️ راهنما"],['text'=>"📩پیام به مخاطب"]
        ],
                [
                   ['text'=>"☎️  تنظیمات کانتکت"],['text'=>"👤پروفایل"],['text'=>"⚙ریست کردن ربات"]
                ],
                [
                   ['text'=>"✈️بلاک و انبلاک"],['text'=>"🗣 تنظیمات پاسخ خودکار"]
                ]
              ],
              'resize_keyboard'=>true
           ])
        ]));
        save("profile/post.txt","$textmessage");
  }
        elseif ($textmessage == '😊فعال کردن' && $from_id == $admin) {
  save($from_id."/step.txt","dokmecreate");
  var_dump(makereq('sendMessage',[
          'chat_id'=>$update->message->chat->id,
          'text'=>"🎫نام دکمه را ارسال کنید",
    'parse_mode'=>'MarkDown',
          'reply_markup'=>json_encode([
              'keyboard'=>[
                [
                   ['text'=>'🏠 برگشت به صفحه اصلی']
                ]
              ],
              'resize_keyboard'=>true
           ])
        ]));
  }
     elseif ($step== 'dokmecreate' && $type == 'admin') {
  save($from_id."/step.txt","dokmecreate2");
  var_dump(makereq('sendMessage',[
          'chat_id'=>$update->message->chat->id,
          'text'=>"🎫پست را ارسال کنید",
    'parse_mode'=>'MarkDown',
          'reply_markup'=>json_encode([
              'keyboard'=>[
                [
                   ['text'=>"🏠 برگشت به صفحه اصلی"],
                ]
              ],
              'resize_keyboard'=>true
           ])
        ]));
        save("profile/dokme.txt","$textmessage");
  }
        elseif ($step== 'dokmecreate2' && $type == 'admin') {
  save($from_id."/step.txt","profileok");
  var_dump(makereq('sendMessage',[
          'chat_id'=>$update->message->chat->id,
          'text'=>"🏅دکمه با موفقیت ساخته شد",
    'parse_mode'=>'MarkDown',
          'reply_markup'=>json_encode([
              'keyboard'=>[
                [
                   ['text'=>"🗣 پیام همگانی"],['text'=>"🚀 فوروارد همگانی"]
                ],
                [
                   ['text'=>"▶️ ویرایش پیام استارت"],['text'=>"⚙ تنظیمات"]
                ],
        [
           ['text'=>"⏸ ویرایش پیام پیشفرض"],['text'=>"اطلاعات ربات ✔️"],['text'=>"🎯تهیه نسخه پشتیبان"]
        ],
                [
                   ['text'=>"👥 آمار"],['text'=>"⚫️ لیست سیاه"],['text'=>"🇮🇷مدیریت دکمه ها"]
                ],
        [
           ['text'=>"$banners"],['text'=>"⚓️ راهنما"],['text'=>"📩پیام به مخاطب"]
        ],
                [
                   ['text'=>"☎️  تنظیمات کانتکت"],['text'=>"$profile"],['text'=>"⚙ریست کردن ربات"]
                ],
                [
                   ['text'=>"✈️بلاک و انبلاک"],['text'=>"🗣 تنظیمات پاسخ خودکار"]
                ]
              ],
              'resize_keyboard'=>true
           ])
        ]));
		save("profile/post.txt","$textmessage");
  }
        elseif ($textmessage == '😄تغییر نام' && $from_id == $admin) {
  save($from_id."/step.txt","dokmename");
  var_dump(makereq('sendMessage',[
          'chat_id'=>$update->message->chat->id,
          'text'=>"🎫نام جدید را ارسال کنید",
    'parse_mode'=>'MarkDown',
          'reply_markup'=>json_encode([
              'keyboard'=>[
                [
                   ['text'=>'🏠 برگشت به صفحه اصلی']
                ]
              ],
              'resize_keyboard'=>true
           ])
        ]));
  }
      elseif ($step== 'dokmename' && $type == 'admin') {
  save($from_id."/step.txt","none");
  var_dump(makereq('sendMessage',[
          'chat_id'=>$update->message->chat->id,
          'text'=>"🏅با موفقیت تغییر یافت!",
    'parse_mode'=>'MarkDown',
          'reply_markup'=>json_encode([
              'keyboard'=>[
                [
                   ['text'=>"🗣 پیام همگانی"],['text'=>"🚀 فوروارد همگانی"]
                ],
                [
                   ['text'=>"▶️ ویرایش پیام استارت"],['text'=>"⚙ تنظیمات"]
                ],
        [
           ['text'=>"⏸ ویرایش پیام پیشفرض"],['text'=>"اطلاعات ربات ✔️"],['text'=>"🎯تهیه نسخه پشتیبان"]
        ],
                [
                   ['text'=>"👥 آمار"],['text'=>"⚫️ لیست سیاه"],['text'=>"🇮🇷مدیریت دکمه ها"]
                ],
        [
           ['text'=>"$banners"],['text'=>"⚓️ راهنما"],['text'=>"📩پیام به مخاطب"]
        ],
                [
                   ['text'=>"☎️  تنظیمات کانتکت"],['text'=>"👤پروفایل"],['text'=>"⚙ریست کردن ربات"]
                ],
                [
                   ['text'=>"✈️بلاک و انبلاک"],['text'=>"🗣 تنظیمات پاسخ خودکار"]
                ]
              ],
              'resize_keyboard'=>true
           ])
        ]));
        save("profile/dokme.txt","$textmessage");
  }
        elseif ($textmessage == '🚫حذف' && $from_id == $admin) {
  save($from_id."/step.txt","dokmedel");
  var_dump(makereq('sendMessage',[
          'chat_id'=>$update->message->chat->id,
          'text'=>"هم اکنون نمایش داده نمیشود\nجهت نمایش مجدد نام انرا عوض کنید",
    'parse_mode'=>'MarkDown',
          'reply_markup'=>json_encode([
              'keyboard'=>[
                [
                   ['text'=>"🗣 پیام همگانی"],['text'=>"🚀 فوروارد همگانی"]
                ],
                [
                   ['text'=>"▶️ ویرایش پیام استارت"],['text'=>"⚙ تنظیمات"]
                ],
        [
           ['text'=>"⏸ ویرایش پیام پیشفرض"],['text'=>"اطلاعات ربات ✔️"],['text'=>"🎯تهیه نسخه پشتیبان"]
        ],
                [
                   ['text'=>"👥 آمار"],['text'=>"⚫️ لیست سیاه"],['text'=>"🇮🇷مدیریت دکمه ها"]
                ],
        [
           ['text'=>"$banners"],['text'=>"⚓️ راهنما"],['text'=>"📩پیام به مخاطب"]
        ],
                [
                   ['text'=>"☎️  تنظیمات کانتکت"],['text'=>"$profile"],['text'=>"⚙ریست کردن ربات"]
                ],
                [
                   ['text'=>"✈️بلاک و انبلاک"],['text'=>"🗣 تنظیمات پاسخ خودکار"]
                ]
              ],
              'resize_keyboard'=>true
           ])
        ]));
		save("profile/dokme.txt","");
  }
	elseif ($textmessage == $profile) {
		if ($from_id == $admin) {
	var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"پروفایل خود را مدیریت کنید.",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>"نام🎾"],['text'=>"سن🎾"]
                ],
				[
				   ['text'=>"🎾 محل زندگی"],['text'=>"وضعیت🎾"]
				],
				[
				   ['text'=>"تصحیلات🎾"],['text'=>"شماره تلفن🎾"]
				],
				[
				   ['text'=>"کانال تلگرامی🎾"],['text'=>"ایدی اینستاگرام🎾"]
				],
				[
				  ['text'=>"وبگاه🎾"],['text'=>"💌تنظیم عکس اینلاین"]
				],
                [
                   ['text'=>'🏠 برگشت به صفحه اصلی']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
		}
		else {
			$name = file_get_contents("data/profile/name.txt");
			$age = file_get_contents("data/profile/age.txt");
			$mah = file_get_contents("data/profile/mah.txt");
			$vaz = file_get_contents("data/profile/vaz.txt");
			$tah = file_get_contents("data/profile/tah.txt");
			$pho = file_get_contents("data/profile/pho.txt");
			$cha = file_get_contents("data/profile/cha.txt");
			$ins = file_get_contents("data/profile/ins.txt");
			$web = file_get_contents("data/profile/web.txt");
			$protxt = "";
			if ($name == '' && $age == '' && $mah == '' && $vaz == '' && $web == '' && $tah == '' && $pho == '' && $cha == '' && $ins == '') {
				$protxt = "📕 پروفایل خالی است . . . !";
			}
			if ($name != '') {
				$protxt = $protxt."".$name;
			}
			
			if ($age != '') {
				$protxt = $protxt."\n".$age."";
			}
			
			if ($mah != '') {
				$protxt = $protxt."\n ".$mah;
			}
						if ($vaz != '') {
				$protxt = $protxt."\n".$vaz;
			}
						if ($tah != '') {
				$protxt = $protxt."\n".$tah;
			}
						if ($pho != '') {
				$protxt = $protxt."\nشماره تماس: ".$pho;
			}
						if ($cha != '') {
				$protxt = $protxt."\nکانال تلگرام: ".$cha;
			}
						if ($ins != '') {
				$protxt = $protxt."\nایدی اینستا: ".$ins;
			}
						if ($web != '') {
				$protxt = $protxt."\nادرس سایت: ".$web;
			}
			SendMessage($chat_id,$protxt);
		}
	}
		elseif ($textmessage == $banners) {
		if ($from_id == $admin) {
	var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"بنر خودرا مدیریت کنید",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>"بنر"]
                ],
                [
                   ['text'=>'🏠 برگشت به صفحه اصلی']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
		}
		else {
			$banner = file_get_contents("data/profile/banner.txt");
			$protxt = "";
			if ($banner == '') {
				$protxt = "📕 بنری ثبت نشده است";
			}
			if ($banner != '') {
				$protxt = $protxt."\nبنر : ".$banner;
			}
			SendMessage($chat_id,$protxt);
		}
	}
		elseif ($textmessage == 'بنر' && $from_id == $admin) {
	save($from_id."/step.txt","Set banner");
	var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"بنر خودرا ارسال کنید\nنکته:بنر شما باید متنی باشد و فاقد عکس باشد",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>'🏠 برگشت به صفحه اصلی']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
	}
	elseif ($textmessage == '🔰 Comments' && $from_id == $admin) {
	$text = " `
	🔰دستورات

- برای پاسخ با پیام های کاربران روی ان ها ریپلای کنید و پیام خود را ارسال کنید.

+ لیست دستورات

  /ban : 
 روی پیام رپلای کنید و  ban/ را ارسال کنید
 برای اضافه کردن کاربر به لیت سیاه


  /unban : 
 روی پیام رپلای کنید و  unban/ را ارسال کنید
 برای پاک کردن کاربر از لیست سیاه

  /forward : 
 روی پیام رپلای کنید و  forward/ را ارسال کنید
 جهت فروارد کردن پیام برای کاربر 
 ابتدا روی شخس ریپلای کنید و forward/ را ارسال کنید و بعد پیام مورد نظرتان را اینجا فروارد کنید


  /share :  
 روی پیام رپلای کنید و  share/ را ارسال کنید
 برای شیر کردن کانتکت(شماره شما) [شما ابتدا باید از بخش تنظیمات کانتکت شماره ی خود را ثبت کنید]
	`";
	SendMessage($chat_id,$text);
	}
	
	elseif ($textmessage == '🔰 Buttons' && $from_id == $admin) {
	$text = "
	🔰دکمه ها

+ Buttons List

  🗣 پیام همگانی :
  ارسال پیام به اعضا و گروه ها.

  ⚙ تنظیمات :
  تنظیمات ربات.

  ▶️ ویرایش پیام استارت :
  ویرایش پیام استارت ربات شما.

  ⏸ ویرایش پیام پیشفرض :
  ویرایش پیام پیشفرض ربات شما.

  👥 آمار :
  مشاهده ی تعداد اعضا و گروه ها.

  ⚫️ لیست سیاه :
  مشاهده ی لیست سیاه.

  ☎️  تنظیمات کانتکت :
  تنظیمات شماره ی شما.

  $profile :
  تنظیمات پروفایل شما.
	";
	SendMessage($chat_id,$text);
	}
	
	elseif($textmessage == '/start')
	{
		$txt = file_get_contents("data/start_txt.txt");
		//==============
		if ($type == "admin") {
		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"به روبات خودتون خوش آومدین.",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>"🗣 پیام همگانی"],['text'=>"🚀 فوروارد همگانی"]
                ],
                [
                   ['text'=>"▶️ ویرایش پیام استارت"],['text'=>"⚙ تنظیمات"]
                ],
				[
				   ['text'=>"⏸ ویرایش پیام پیشفرض"],['text'=>"اطلاعات ربات ✔️"],['text'=>"🎯تهیه نسخه پشتیبان"]
				],
                [
                   ['text'=>"👥 آمار"],['text'=>"⚫️ لیست سیاه"],['text'=>"🇮🇷مدیریت دکمه ها"]
                ],
				[
				   ['text'=>"$banners"],['text'=>"⚓️ راهنما"],['text'=>"📩پیام به مخاطب"]
				],
                [
                   ['text'=>"☎️  تنظیمات کانتکت"],['text'=>"$profile"],['text'=>"⚙ریست کردن ربات"]
                ],
                [
                   ['text'=>"✈️بلاک و انبلاک"],['text'=>"🗣 تنظیمات پاسخ خودکار"]
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
    		}
    		else {
    		if ($bottype != "Gold") {

    		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>$txt."\n\n[ربات پیام رسان پیشرفته خود را بسازید](https://telegram.me/**idbot**)",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>"$profile"],['text'=>"$banners"]
                ],
                [
                ['text'=>"$shomare",'request_contact' => true],['text'=>"$dokme"]
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
Forward($chat_id,"@**idbot**",12);
    		}
    		else {
    		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>$txt."\n\n[ربات پیام رسان پیشرفته خود را بسازید](https://telegram.me/**idbot**)",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>"$profile"],['text'=>"$banners"]
                ],
                [
                ['text'=>"$shomare",'request_contact' => true],['text'=>"$dokme"]
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
	Forward($chat_id,"$tablighat",$tablighat2);
    		}
    		}
		//==============
		$users = file_get_contents("data/users.txt");
		if (strpos($users , "$chat_id") !== false)
		{ 
		
		}
		else { 
			$myfile2 = fopen("data/users.txt", "a") or die("Unable to open file!");	
			fwrite($myfile2, "$from_id\n");
			fclose($myfile2);
			mkdir("data/".$from_id);
			save($from_id."/type.txt","member");
			save($from_id."/step.txt","none");
		     }
	}
	elseif ($reply != null && $from_id == $admin) {
		if ($textmessage == '/share') {
		$anumber = file_get_contents("data/profile/number.txt");
		$aname= file_get_contents("data/profile/cname.txt");
		makereq('sendContact',[
		'chat_id'=>$reply,
		'phone_number'=>$anumber,
		'first_name'=>$aname
		]);
		SendMessage($chat_id,"ارسال شد .");
		}
		elseif ($textmessage == '/forward') {
		SendMessage($chat_id,"پیام خود را فروارد کنید !");	
		save($from_id."/step.txt","Forward");
		save("forward_id.txt","$reply");
		}
		elseif ($textmessage == '/ban') {
			$myfile2 = fopen("data/blocklist.txt", "a") or die("Unable to open file!");	
			fwrite($myfile2, "$reply\n");
			fclose($myfile2);
			SendMessage($chat_id,"*User Banned!*");
			SendMessage($reply,"*You Are Banned!*");
		}
		elseif ($textmessage == '/unban') {
			
			$newlist = str_replace($reply,"",$list);
			save("blocklist.txt",$newlist);
			SendMessage($chat_id,"*User UnBanned!*");
			SendMessage($reply,"*You Are UnBanned!*");
		}
		else {
	SendMessage($reply ,$textmessage);
	SendMessage($chat_id,"پیام ارسال شد .");	
		}
	}
	
	elseif ($textmessaage == '/creator' && $bottype == "free") {
    		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>"$profile"],['text'=>"$banners"]
                ],
                [
                ['text'=>"$shomare",'request_contact' => true]
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
    		
	}
//---------


	elseif ($forward != null && $_forward == "⛔️") {
		SendMessage($chat_id,"Locked!");
	}
	elseif (strpos($textmessage , "/fwdtoall") !== false  || $textmessage == "🚀 فوروارد همگانی") {
		if ($from_id == $admin) {
			save($from_id."/step.txt","Forward To All");
				var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"🔰فوروارد همگانی
پیام خود را فروارد کنید . . .
⚠️پیام شما میتواند فقط به صورت متن باشد !
برای بازگشت `🔙 برگشت` را بزنید",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>'🏠 برگشت به صفحه اصلی']
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
	elseif ($textmessage == '🎯تهیه نسخه پشتیبان'  && $from_id == $admin && $bottype == "free") {
    		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"به منوی بکاپ گیری خوش امدید\nانتخاب کنید☺️",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>"⚙ریست کردن ربات"],['text'=>"⛷بکاپ از کاربران"]
                ],
                [
                   ['text'=>"🏠 برگشت به صفحه اصلی"]
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
    		
	}
elseif($textmessage == '⛷بکاپ از کاربران' && $from_id == $admin){
hidden('sendDocument',[
    'chat_id'=>$chat_id,
    'document'=>new CURLFILE("data/users.txt")

  ]);
}
	elseif ($textmessage == '⚙ریست کردن ربات'  && $from_id == $admin && $bottype == "free") {
    		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"ایا مایل به انجام این کار هستید؟\n`این عمل غیرقابل بازگشت است`",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>"🏋🏻ریست کن"]
                ],
                [
                   ['text'=>"🏠 برگشت به صفحه اصلی"]
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
    		
	}
elseif($textmessage == '🏋🏻ریست کن'){
if($from_id != $admin){
SendMessage($chat_id,"شما ادمین نیستید");
}else{
save("users.txt","");
save("setting/sticker.txt","✅");
    save("setting/video.txt","✅");
    save("setting/voice.txt","✅");
    save("setting/file.txt","✅");
    save("setting/photo.txt","✅");
    save("setting/music.txt","✅");
    save("setting/forward.txt","✅");
    save("setting/joingp.txt","✅");
		save("btn/btn1_name","");
		save("btn/btn2_name","");
		save("btn/btn3_name","");
		save("btn/btn4_name","");
		save("btn/btn1_post","");
		save("btn/btn2_post","");
		save("btn/btn3_post","");
		save("profile/age.txt","");
		save("profile/cha.txt","");
		save("profile/ins.txt","");
		save("profile/mah.txt","");
		save("profile/name.txt","");
		save("profile/phot.txt","");
		save("profile/tah.txt","");
		save("profile/vaz.txt","");
		save("profile/web.txt","");
		save("btn/btn4_post","");
		save("blocklist.txt","");
		save("last_word.txt","");
		save("pmsend_txt.txt","Message Sent!");
		save("start_txt.txt","Hello World");
		save("forward_id.txt","");
SendMessage($chat_id,"انجام شد");
}}

	elseif (strpos($textmessage , "/toall") !== false  || $textmessage == "🗣 پیام همگانی") {
		if ($from_id == $admin) {
			save($from_id."/step.txt","Send To All");
				var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"متن خودرا بنویسید",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>'🏠 برگشت به صفحه اصلی']
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
	else
	{
		if ($from_id != $admin) {
		$txt = file_get_contents("data/pmsend_txt.txt");
		SendMessage($chat_id,$txt);
		Forward($admin,$chat_id,$message_id); 
		}
		else {
		SendMessage($chat_id,"");
		}
	}
	
	makereq('answerInlineQuery', [
    'inline_query_id' => $update->inline_query->id,
    'results' => json_encode([[
        'type' => 'article',
        'id' => base64_encode(rand(5,555)),
        'title' => 'ارسال مشخصات',
        'thumb_url'=> "$thumbesh",
        'description'=>"ارسال مشخصات",
        'input_message_content' => ['parse_mode' => 'HTML', 'message_text' => "$name
Age: $age
Location: $mah
Condition: $vaz
Education: $tah
Phone Number: $pho
Telegram Channel: $cha
instagram: $ins
WebPage: $web"],
	        'reply_markup' => [
            'inline_keyboard' => [
                [
                    ['text' => "Bot Creator", 'url' => "https://t.me/**idbot**"]
                ]
            ]
        ]

    ]])
]);
	
	?>

