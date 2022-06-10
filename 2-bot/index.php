<?php 
    //header('Content-Type: text/html; charset=utf-8);
    date_default_timezone_set('Asia/Tashkent');
    $admin = 1020678098;

    define('API_KEY', '5360412803:AAE_BG4axg3Jup6x7CsrVnS5LscrZPBvhco');
    function dump($what) {
      echo '<pre>';
        print_r($what);
      echo '</pre>';
    };

    function bot($method = "getMe", $params = []) {
      $url = "https://api.telegram.org/bot".API_KEY."/" . $method;
      $curl = curl_init();
      curl_setopt_array($curl, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POSTFIELDS => $params,
        CURLOPT_HTTPHEADER =>['Content_Type: multipart/form/data'],
      ]);
      $res = curl_exec($curl);
      //dump(curl_getinfo($curl));
      curl_close($curl);
      if (!curl_error($curl)) return json_encode(json_decode($res, true), JSON_PRETTY_PRINT);
    };

    file_put_contents("log.json", json_encode(json_decode(file_get_contents('php://input'), true),));

    echo bot();
    echo bot('sendMessage', [
        'chat_id' => "1020678098",
        'text' => "Bot Ishlayapti!"
    ]);

    //sendmessage
    //markdown mode
    // $mess_text = "
    ///// *To'yintirilgan matn bold*\n
    // _Yotiq yozuv italic_\n
    // __ostki chiziqli matn strikethrough__\n
    // ~inkor qilingan matn strikethrough~\n
    // ||yashirin matn spoiler||\n
    // `kochirib olish mumkin bolgan matn code`\n
    // [biriktirilgan  havola inline link](http://www.example.com)\n
    // [tgram foydalanuvchisiga havola user link](tg://user?id=1020678098)\n
    // ```
    // ko'rsatmalar yoki codelar uchun maxsus formatlash turidagi matn... lorem
    // ```
    // ";
    // echo bot('sendMessage', [
    //   'chat_id' => "1020678098",
    //   'text' => $mess_text,
    //   'parse_mode' => 'MarkdownV2' 
    // ]);

    // $mess_text = "
    // <b>to'yintirilgan matn bold</b>\n
    // <i>yotiq yozuvli italic</i>\n
    // <u>ostki chiziqli matn underline</u>\n
    // <s>inkor qilingan matn strikethrough</s>\n
    // <tg-spoiler>yashirin matn spoiler</tg-spoiler>\n
    // <code>ko'chirib olish mumkin bo'lgan matn</code>\n
    // <a href='http://www.example.com'>havola inline link</a>\n
    // <a href='tg://user?id=1020678098'>user link</a>\n
    // <pre>
    // ko'rsatmalar yoki codelar uchun maxsus formatlash turidagi matn... lorem
    // </pre>
    // ";
    // echo bot('sendMessage', [
    //   'chat_id' => "1020678098",
    //   'text' => $mess_text,
    //   'parse_mode' => 'HTML'
    // ]);

    // echo bot('sendMessage', [
    //   'chat_id' => "1020678098",
    //   'text' => "https://www.youtube.com/watch?v=uaEAn5AB2Jw. (protect_content)",
    //   'disable_web_page_preview' => true,
    //   // 'disable_notification' => true,
    //   'protect_content' => true,
    //   // 'reply_to_message_id' => 10?,
    //   // 'allow_sending_without_reply' => true
    // ]);

    // echo bot('sendMessage', [
    //   'chat_id' => "1020678098",
    //   'text' => 'Bu inline reply markup',
    //   'disable_web_page_preview' => true,
    //   'reply_markup' => json_encode([
    //     'inline_keyboard' => [
    //       [['text' => "textbtn1", 'callback_data' => 'btn1'],['text' => "textbtn2", 'callback_data' => 'btn2'], ['text' => "textbtn3", 'callback_data' => 'btn3']],
    //       [['text' => "saytga havola", 'url' => 'https://www.example.com']],
    //       [['text' => "Videoni ko'rish", 'url' => 'https://www.youtube.com/']],
    //       [['text' => "Sherzod", 'url' => 'tg://user?id=1020678098']],
    //       [['text' => "kanalga havola", 'url' => 'https://t.me/infomiruz']],
    //       [['text' => "share tugmasi", 'url' => 'https://t.me/share/url?url=https://www.youtube.com/']],
    //     ]
    //   ])
    // ]);

    // echo bot('sendMessage', [
    //   'chat_id' => '1020678098',
    //   'text' => "bu menu markup",
    //   'disable_web_page_preview' => true,
    //   'reply_markup' => json_encode([
    //     'resize_keyboard' => true,
    //     // 'one_time_keyboard' => true,
    //     // 'input_field_placeholder' => "raqamingizni kiriting...",
    //     'keyboard' => [
    //       [['text' => "textbtn1"],['text' => "textbtn2"],['text' => "textbtn3"]],
    //       [['text' => "raqamni yuborish", 'request_contact' => true]],
    //       [['text' => "manzilni yuborish", 'request_location' => true]],
    //       [
    //         ['text' = "Quiz", 'request_poll' => ['type' => 'quiz']],
    //         ['text' = "Regular", 'request_poll' => ['type' => 'regular']],
    //         ['text' = "Quiz + Regular", 'request_poll' => ['type' => 'regular, quiz']],
    //       ],
    //     ]
    //   ])
    // ]);

    //remove + force_reply
      // echo bot('sendMessage', [
      //   'chat_id' => "1020678098",
      //   'text' => "bu forsereply va remove keyboard",
      //   'disable_web_page_preview' => true,
      //   'reply_markup' => json_encode([
      //     // 'remove_keyboard' => true,
      //     'force_reply' => true,
      //     'input_field_placeholder' => "8600 **** **** ****"
      //   ])
      // ])

      //forward message
      // echo bot('forwardMessage', [
      //   'chat_id' => "1020678098",
      //   'from_chat_id' => 1020678098,
      //   'massage_id' => 195
      // ]);

      // echo bot('copyMessage', [
      //   'chat_id' => "1020678098",
      //   'from_chat_id' => 1020678098,
      //   'message_id' => 195
      // ])

      // echo bot('sendPhoto', [
      //   'chat_id' => $admin,
      //   'photo' => "https://u6178.xvest4.ru/infomiruz/2-bot/rasm.JPG",
      //   'caption' => "Bu internetdan url bilan yuborilgan rasm",
      // ]);

      // echo bot('sendPhoto', [
      //   'chat_id' => $admin,
      //   'photo' => new CURLFile('rasm.JPG'),
      //   'caption' => "local yuborilgan rasm",
      // ]);

      // echo bot('sendPhoto', [
      //   'chat_id' => $admin,
      //   'photo' => "AgACAgIAAxkDAAICjWKVjTWRL_yGHwhqn1krX8RJAXQ8AAJSuTEbX1SwSPM1GELUTkqWAQADAgADcwADJAQ",
      //   'caption' => "telegram serveridan file id bn yuborilgan rasm"
      // ]);

      // echo bot('sendAudio', [
      //   'chat_id' => $admin,
      //   'audio' => "https://u6178.xvest4.ru/infomiruz/2-bot/audio.mp3",
      //   'caption' => "bu internetdan url bn yuborilgan audio file",
      // ]);
      // echo bot('sendAudio', [
      //   'chat_id' => $admin,
      //   'audio' => new CURLFile("audio.mp3"),
      //   'caption' => "local yuborilgan audio file",
      //   'performer' => "notanish amerikos",
      //   'title' => "mening amerikam",
      //   'thumb' => new CURLFile('rasm.JPG'),
      // ]);
      // echo bot('sendAudio', [
      //   'chat_id' => $admin,
      //   'audio' => "CQACAgIAAxkDAAICtWKVlFWro3pahfnQgLUeuC1aM_k9AALBFQACX1SwSMOjvyzvpMrQJAQ",
      //   'caption' => "telegram serveridan file id bn yuborilgan audio file",
      //   'performer' => "notanish amerikos",
      //   'title' => "mening amerikam :)",
      //   'thumb' => "AAMCAgADGQMAAgK1YpWUVaujelqF-dCAtR64LVoz-T0AAsEVAAJfVLBIw6O_LO-kytABAAdtAAMkBA",
      // ]);

      //send video
      // echo bot('sendVideo', [
      //   'chat_id' => $admin,
      //   'video' => "https://u6178.xvest4.ru/infomiruz/2-bot/video.mp4",
      //   'caption' => "url bn yuborilgan video file",
      //   'supports_streaming' => true,
      // ]);
      // echo bot('sendVideo', [
      //   'chat_id' => $admin,
      //   'video' => new CURLFile("video.mp4"),
      //   'caption' => "local yuborilgan video file",
      //   'thumb' => new CURLFile("thumb.JPG"),
      //   'supports_streaming' => true,
      // ]);
      // echo bot('sendVideo', [
      //   'chat_id' => $admin,
      //   'video' => "BAACAgIAAxkDAAICxWKVmaYVb8Ffv8-jcsj6eLkUUH6WAALkFQACX1SwSK5CVrGy0C2tJAQ",
      //   'caption' => "telegram serveridan file id bn yuborilgan video file",
      //   'thumb' => "AAMCAgADGQMAAgLFYpWZphVvwV-_z6NyyPp4uRRQfpYAAuQVAAJfVLBIrkJWsbLQLa0BAAdtAAMkBA",
      //   'supports_streaming' => true,
      // ]);

      //send animation
      // echo bot('sendAnimation', [
      //   'chat_id' => $admin,
      //   'animation' => "https://u6178.xvest4.ru/infomiruz/2-bot/animation.mp4",
      //   'caption' => "url bn yuborilgan animation file",
      //   // 'duration' => 10
      // ]);
      // echo bot('sendAnimation', [
      //   'chat_id' => $admin,
      //   'animation' => new CURLFile("animation.mp4"),
      //   'caption' => "local yuborilgan animation file",
      //   'thumb' => new CURLFile("thumb.JPG")
      //   // 'duration' => 10
      // ]);
      // echo bot('sendAnimation', [
      //   'chat_id' => $admin,
      //   'animation' => "BAACAgQAAxkDAAICz2KVnTagQKURvd_EtGA1UN7a9FtFAAIgAwACpOy0UIh8KksbPiC5JAQ",
      //   'caption' => "telegram serveridan file id bn yuborilgan animation file",
      //   // 'duration' => 10
      // ]);

      //send Voice 
      // echo bot('sendVoice', [
      //   'chat_id' => $admin,
      //   'voice' => "https://u6178.xvest4.ru/infomiruz/2-bot/voice.ogg",
      //   'caption' => "url bn yuborilgan voice file",
      // ]);
      // echo bot('sendVoice', [
      //   'chat_id' => $admin,
      //   'voice' => new CURLFile("voice.ogg"),
      //   'caption' => "local yuborilgan voice file",
      // ]);
      // echo bot('sendVoice', [
      //   'chat_id' => $admin,
      //   'voice' => "BQACAgQAAxkDAAIC3WKVo_dSkmPfllj72W36xOT6nWVLAAI1AwACVv2sUErgJ6XIMyf4JAQ",
      //   'caption' => "file id bn yuborilgna voice file",
      // ]);

      //send video note
      // echo bot('sendVideoNote', [
      //   'chat_id' => $admin,
      //   'video_note' => new CURLFile("note.mp4");
      //   'caption' => "local yuborilgan video note file",
      //   // 'thumb' => new CURLFile("rasm.JPG"),
      // ]);
      // echo bot('sendVideoNote', [
      //   'chat_id' => $admin,
      //   'video_note' => "",
      //   'caption' => "tg serveridan file id bn yuborilgan video note file",
      //   'thumb' => ""
      // ]);

      //send document
      // echo bot('sendDocument', [
      //   'chat_id' => $admin,
      //   'document' => "",
      //   'caption' => "url bn yuborilgan document file",
      // ]);
      // echo bot('sendDocument', [
      //   'chat_id' => $admin,
      //   'document' => "http://u6178.xvest4.ru/infomiruz/2-bot/document.pdf",
      //   'caption' => "url bn yuborilgan document file unknown format",
      //   'disable_content_type_detection' => true,
      // ]);
      // echo bot('sendDocument', [
      //   'chat_id' => $admin,
      //   'document' => new CURLFile("document.pdf"),
      //   'caption' => "local yuborilgan document file",
      //   'thumb' => new CURLFile("rasm.JPG"),
      // ]);
      // echo bot('sendDocument', [
      //   'chat_id' => $admin,
      //   'document' => "BQACAgIAAxkDAAIDBWKVqZPDItuqOSEmRgKqJSjRsmVaAAIsFgACX1SwSPKDXfGzm59aJAQ",
      //   'caption' => "file id bn yuborilgan document file",
      //   'thumb' => new CURLFile("rasm.JPG"),
      // ]);

      //sendmediagroup
      // echo bot('sendMediaGroup', [
      //   'chat_id' => $admin,
      //   'media' => json_encode(
      //     [
      //       [
      //         'type' => 'audio',
      //         'caption' => 'url bn yuborilgan audio file',
      //         'media' => "https://u6178.xvest4.ru/infomiruz/2-bot/audio.mp3",
      //         'thumb' => "AAMCAgADGQMAAgLFYpWZphVvwV-_z6NyyPp4uRRQfpYAAuQVAAJfVLBIrkJWsbLQLa0BAAdtAAMkBA",
      //       ],
      //       [
      //         'type' => 'audio',
      //         'caption' => 'file id bn yuborilgan audio file',
      //         'media' => "CQACAgQAAxkDAAIDJWKVrYJfshBC6ibM7uXg-nwOukcYAAI3AwACHDa1UBD2qGh2bx29JAQ",
      //       ]
      //     ]
      //   )
      //       ]);

      //video + photo
      // echo bot('sendMediaGroup', [
      //   'chat_id' => $admin,
      //   'media' => json_encode(
      //     [
      //       [
      //         'type' => 'photo',
      //         'caption' => 'url bn yuborilgan rasm',
      //         'media' => "https://u6178.xvest4.ru/infomiruz/2-bot/rasm.JPG",
      //       ],
      //       [
      //         'type' => 'photo',
      //         'caption' => 'file id bn yuborilgan rasm',
      //         'media' => "AgACAgQAAxkDAAIDMGKVrtuY4rg701Y_GNPIjpLIrju-AAJErjEbpB2sUJuO0dWHkFZXAQADAgADeAADJAQ"
      //       ],
      //       [
      //         'type' => 'photo',
      //         'caption' => 'url bn yuborilgan rasm',
      //         'media' => "https://u6178.xvest4.ru/infomiruz/2-bot/thumb.JPG"
      //       ],
      //       [ 
      //         'type' => 'photo',
      //         'caption' => 'file id bn yuborilgan rasm',
      //         'media' => "AgACAgQAAxkDAAIDOWKVr1XZt37-2vTHe2H7LjZRFzEYAAL_rTEboUK0UCDcB4B2kjDMAQADAgADeQADJAQ"
      //       ],
      //       [ 
      //         'type' => 'video',
      //         'caption' => 'url bn yuborilgan video',
      //         'media' => "https://u6178.xvest4.ru/infomiruz/2-bot/video.mp4",
      //         'supports_streaming' => true
      //       ],
      //       [ 
      //         'type' => 'video',
      //         'caption' => 'file id bn yuborilgan video',
      //         'media' => "BAACAgQAAxkDAAIDUmKVsBkYMrJfJBnqtOZIUMDVKOyCAAIGAwACSkm0UMre5SsxY7hKJAQ",
      //         'supports_streaming' => true
      //       ],
      //     ]
      //   )
      // ]);

      // echo bot('sendMediaGroup', [
      //   'chat_id' => $admin,
      //   'media' => json_encode(
      //     [
      //       [
      //         'type' => 'document',
      //         'caption' => 'url bn yuborilgan document',
      //         'media' => "http://u6178.xvest4.ru/infomiruz/2-bot/document.pdf",
      //         'thumb' => "AgACAgQAAxkDAAIDOWKVr1XZt37-2vTHe2H7LjZRFzEYAAL_rTEboUK0UCDcB4B2kjDMAQADAgADeQADJAQ"
      //       ],
      //       [
      //         'type' => 'document',
      //         'caption' => 'file id bn yuborilgan document',
      //         'media' => "BQACAgQAAxkDAAIDX2KVsWAcGXjubH_auG0XwEn_UZVqAAJqAwACbkCsUJQ1BQ6O5fDjJAQ",
      //       ]
      //     ]
      //   )
      //       ]);

      //sendLocation
      // echo bot('sendLocation', [
      //   'chat_id' => $admin,
      //   'latitude' => 41.311514,
      //   'longitude' => 69.2400093,
      //   'horizontal_accuracy' => 50
      // ]);

      //sendSticker 
      // echo bot('sendSticker', [
      //   'chat_id' => $admin,
      //   'sticker' => "CAACAgIAAxkBAAIEZ2KV84uvwGEGF9Ux-SL5A34HuX8bAAICAAO_ydM3gkBWBqKaLPYkBA",
      // ]);

      //sendVenue
      // echo bot('sendVenue', [
      //   'chat_id' => $admin,
      //   'latitude' => 41.311514,
      //   'longitude' => 69.2400093,
      //   'title' => "xalqlar dostligi sanat saroyi",
      //   'address' => "islom karimov st. 00 a uy"
      // ]);

      //sendContact
      // echo bot('sendContact', [
      //   'chat_id' => $admin,
      //   "phone_number" => "+998330007749",
      //   "first_name" => "Sherzod",
      //   "last_name" => "Mirzanazarov",
      //   // "vcard" => ""
      // ])

      // sendpool
      // echo bot('sendPoll', [
      //   'chat_id' => $admin,
      //   "question" => "savol regular",
      //   "options" => json_encode([
      //     "javob0",
      //     "javob1+",
      //     "javob2",
      //     "javob3",
      //   ])
      //   ]);
      //   echo bot('sendPoll', [
      //     'chat_id' => $admin,
      //     "question" => "savol regular multiply",
      //     "options" => json_encode([
      //       "javob0",
      //       "javob1+",
      //       "javob2",
      //       "javob3",
      //     ]),
      //     'allows_multiple_answers' => true,
      //     'is_anonymous' =>  false,
      //   ]);
      //   echo bot('sendPoll', [
      //     'chat_id' => $admin,
      //     "question" => "savol regular y",
      //     "options" => json_encode([
      //       "javob0",
      //       "javob1+",
      //       "javob2",
      //       "javob3",
      //     ]),
      //     'is_anonymous' => false,
      //     'open_period' => 300,
      //     'correct_option_id' => 1,
      //   ]);
      //   echo bot('sendPoll', [
      //     'chat_id' => $admin,
      //     "question" => "savol quiz",
      //     "options" => json_encode([
      //       "javob0",
      //       "javob1+",
      //       "javob2",
      //       "javob3",
      //     ]),
      //     'is_anonymous' => true,
      //     'type' => 'quiz',
      //     'explanation' => "oylab kor osonku",
      //     'correct_option_id' => 1,
      //     'close_date' => time() + 550
      //   ]);

        //send dice
        // score 1-6
        // echo bot('sendDice', [
        //   'chat_id' => $admin,
        //   'emoji' => '🎲'
        // ]);
        // echo bot('sendDice', [
        //   'chat_id' => $admin,
        //   'emoji' => '🎯'
        // ]);
        // echo bot('sendDice', [
        //   'chat_id' => $admin,
        //   'emoji' => '🎳'
        // ]);
        // //score 1-5
        // echo bot('sendDice', [
        //   'chat_id' => $admin,
        //   'emoji' => '🏀'
        // ]);
        // echo bot('sendDice', [
        //   'chat_id' => $admin,
        //   'emoji' => '⚽️'
        // ]);
        // //score 1-64
        // echo bot('sendDice', [
        //   'chat_id' => $admin,
        //   'emoji' => '🎰'
        // ]);

        //endChatAction
        // echo bot('sendChatAction', [
        //   'chat_id' => $admin,
        //   'action' => 'typing'
        // ]);
        // echo bot('sendChatAction', [
        //   'chat_id' => $admin,
        //   'action' => 'upload_photo'
        // ]);
        // echo bot('sendChatAction', [
        //   'chat_id' => $admin,
        //   'action' => 'record_video'
        // ]);
        // echo bot('sendChatAction', [
        //   'chat_id' => $admin,
        //   'action' => 'upload_video'
        // ]);
        // echo bot('sendChatAction', [
        //   'chat_id' => $admin,
        //   'action' => 'record_voice'
        // ]);
        // echo bot('sendChatAction', [
        //   'chat_id' => $admin,
        //   'action' => 'upload_voice'
        // ]);
        // echo bot('sendChatAction', [
        //   'chat_id' => $admin,
        //   'action' => 'upload_document'
        // ]);
        // echo bot('sendChatAction', [
        //   'chat_id' => $admin,
        //   'action' => 'choose_sticker'
        // ]);
        // echo bot('sendChatAction', [
        //   'chat_id' => $admin,
        //   'action' => 'typing'
        // ]);
        // echo bot('sendChatAction', [
        //   'chat_id' => $admin,
        //   'action' => 'typing'
        // ]);
        // echo bot('sendChatAction', [
        //   'chat_id' => $admin,
        //   'action' => 'typing'
        // ]);


        // 3-video

        // setMycommands
        // echo bot('setMyCommands', [
        //   'commands' => json_encode([
        //     ["command" => "/start", "description" => "Start bot"],
        //     ["command" => "/info", "description" => "Bot haqida"],
        //     ["command" => "/buy", "description" => "Buyurtma berish"]
        //   ])
        //   ]);
        // echo bot('setMyCommands', [
        //   'commands' => json_encode([
        //     ["command" => "/start", "description" => "Старт бота"],
        //     ["command" => "/info", "description" => "Информация"],
        //     ["command" => "/buy", "description" => "Заказ"]
        //   ]),
        //   'language_code' => "ru"
        //   ]);
        // echo bot('setMyCommands', [
        //   'commands' => json_encode([
        //     ["command" => "/start", "description" => "start bot"],
        //     ["command" => "/info", "description" => "About us"],
        //     ["command" => "/buy", "description" => "Buy new product"]
        //   ]),
        //   'language_code' => "en",
        //   'scope' => json_encode([
        //     'type' => "all_private_chats"
        //   ])
        //   ]);
        // echo bot('getMyCommands');
        // echo bot('getMyCommands', [
        //   'scope' => json_encode([
        //     'type' => "all_private_chats"
        //   ]),
        //   'language_code' => 'ru',
        //   'language_code' => 'en',
        // ]);

          //  echo bot('deleteMyCommands', [
        //   'scope' => json_encode([
        //     'type' => "all_private_chats"
        //   ]),
          // 'language_code' => 'ru',
        //   'language_code' => 'en',
        // ]);

        //setChatMenuButton
        // echo bot('sendChatMenuButton', [
        //   'chat_id' => $admin,
        //   'menu_button' => json_encode([
        //     'type' => "default",
        //     'type' => "commands",
        //   ])
        // ])

        // echo bot('getChatMenuButton', [
        //   'chat_id' => $admin,
        // ])

        //friend user
        // echo bot('getChat', [
        //   'chat_id' => $admin,
        // ]);

        // //aliense user
        // echo bot('getChat', [
        //   'chat_id' => $admin
        // ])

        // //bot
        // echo bot('getChat', [
        //   'chat_id' => 5360412803
        // ])

        // //joined channel
        // echo bot('getChat', [
        //   'chat_id' => "",
        // ])

        // echo bot('getUserProfilePhotos', [
        //   'user_id' => $admin,
          // 'offset' => 1,
          // 'limit' => 1,
        // ])

        // echo bot('sendPhoto', [
        //   'chat_id' => $admin,
        //   'photo' => "AgACAgIAAxUAAWKYRe-qLb1KYflujiRSREYoa3wpAAILqDEb0k_WPLrvJuO1tQhVAQADAgADYwADJAQ"
        // ])

        //adminlikdagi kanal
        // echo bot('getChatAdministrators', [
        //   'chat_id' => -1001744766815
        // ])

        // //adminlikdagi guruh
        // echo bot('getChatAdministrators', [
        //   'chat_id' => -1001624814365
        // ])

        // //begona kanal
        // echo bot('getChatAdministrators', [
        //   'chat_id' => -1001624814365
        // ])

        // //begona guruh
        // echo bot('getChatAdministrators', [
        //   'chat_id' => -1001624814365
        // ])

        // echo bot('getChatMember', [
        //   'chat_id' => "-1001744766815",
        //   'user_id' => $admin,
        // ])

        // echo bot('getChatMemberCount', [
        //   'chat_id' => -1001744766815
        // ])

        // setChatPhoto
        //adminlikdagi kanal
        // echo bot('setChatPhoto', [
        //   'chat_id' => -1001744766815,
        //   'photo' => new CURLFile("rasm.JPG")
        // ])

        // echo bot('deleteChatPhoto', [
        //   'chat_id' => -1001744766815,
        // ])

        // echo bot('setChatTitle', [
        //   'chat_id' => -1001744766815,
        //   'title' => "bu kanal title"
        // ])

        // echo bot('setChatDescription', [
        //   'chat_id' => -1001744766815,
        //   'description' => "bu kanal description",
        // ])

        // echo bot('pinChatMessage', [
        //   'chat_id' => -1001744766815,
        //   'message_id' => 7,
        // ])
      
        // echo bot('unpinAllChatMessages', [
        //   'chat_id' => -1001744766815,
        // ]);
      
        // echo bot('leaveChat', [
        //   'chat_id' => -1001744766815,
        // ])
        


?>