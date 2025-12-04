<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WordsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('words')->delete();
        
        \DB::table('words')->insert(array (
            0 => 
            array (
                'id' => 1,
                'word_hiragana' => 'おはよう',
                'word_kanji' => NULL,
                'romaji' => 'ohayou',
                'meaning' => 'Good morning',
                'created_at' => '2025-09-14 21:09:09',
                'updated_at' => '2025-09-14 21:09:09',
            ),
            1 => 
            array (
                'id' => 2,
                'word_hiragana' => 'こんにちは',
                'word_kanji' => NULL,
                'romaji' => 'konnichiwa',
                'meaning' => 'Hello / Good afternoon',
                'created_at' => '2025-09-14 21:09:09',
                'updated_at' => '2025-09-14 21:09:09',
            ),
            2 => 
            array (
                'id' => 3,
                'word_hiragana' => 'こんばんは',
                'word_kanji' => NULL,
                'romaji' => 'konbanwa',
                'meaning' => 'Good evening',
                'created_at' => '2025-09-14 21:09:09',
                'updated_at' => '2025-09-14 21:09:09',
            ),
            3 => 
            array (
                'id' => 4,
                'word_hiragana' => 'ありがとう',
                'word_kanji' => NULL,
                'romaji' => 'arigatou',
                'meaning' => 'Thank you',
                'created_at' => '2025-09-14 21:09:09',
                'updated_at' => '2025-09-14 21:09:09',
            ),
            4 => 
            array (
                'id' => 5,
                'word_hiragana' => 'さようなら',
                'word_kanji' => NULL,
                'romaji' => 'sayounara',
                'meaning' => 'Goodbye',
                'created_at' => '2025-09-14 21:09:09',
                'updated_at' => '2025-09-14 21:09:09',
            ),
            5 => 
            array (
                'id' => 6,
                'word_hiragana' => 'すみません',
                'word_kanji' => NULL,
                'romaji' => 'sumimasen',
                'meaning' => 'Excuse me / I\'m sorry',
                'created_at' => '2025-09-14 21:09:09',
                'updated_at' => '2025-09-14 21:09:09',
            ),
            6 => 
            array (
                'id' => 7,
                'word_hiragana' => 'わたし',
                'word_kanji' => NULL,
                'romaji' => 'watashi',
                'meaning' => 'I / me',
                'created_at' => '2025-09-14 21:09:09',
                'updated_at' => '2025-09-14 21:09:09',
            ),
            7 => 
            array (
                'id' => 8,
                'word_hiragana' => 'あなた',
                'word_kanji' => NULL,
                'romaji' => 'anata',
                'meaning' => 'you',
                'created_at' => '2025-09-14 21:09:09',
                'updated_at' => '2025-09-14 21:09:09',
            ),
            8 => 
            array (
                'id' => 9,
                'word_hiragana' => 'これ',
                'word_kanji' => NULL,
                'romaji' => 'kore',
                'meaning' => 'this',
                'created_at' => '2025-09-14 21:09:09',
                'updated_at' => '2025-09-14 21:09:09',
            ),
            9 => 
            array (
                'id' => 10,
                'word_hiragana' => 'それ',
                'word_kanji' => NULL,
                'romaji' => 'sore',
                'meaning' => 'that',
                'created_at' => '2025-09-14 21:09:09',
                'updated_at' => '2025-09-14 21:09:09',
            ),
            10 => 
            array (
                'id' => 11,
                'word_hiragana' => 'あれ',
                'word_kanji' => NULL,
                'romaji' => 'are',
            'meaning' => 'that (over there)',
                'created_at' => '2025-09-14 21:09:09',
                'updated_at' => '2025-09-14 21:09:09',
            ),
            11 => 
            array (
                'id' => 12,
                'word_hiragana' => 'なに',
                'word_kanji' => NULL,
                'romaji' => 'nani',
                'meaning' => 'what',
                'created_at' => '2025-09-14 21:09:09',
                'updated_at' => '2025-09-14 21:09:09',
            ),
            12 => 
            array (
                'id' => 13,
                'word_hiragana' => 'はい',
                'word_kanji' => NULL,
                'romaji' => 'hai',
                'meaning' => 'yes',
                'created_at' => '2025-09-14 21:09:09',
                'updated_at' => '2025-09-14 21:09:09',
            ),
            13 => 
            array (
                'id' => 14,
                'word_hiragana' => 'いいえ',
                'word_kanji' => NULL,
                'romaji' => 'iie',
                'meaning' => 'no',
                'created_at' => '2025-09-14 21:09:09',
                'updated_at' => '2025-09-14 21:09:09',
            ),
            14 => 
            array (
                'id' => 15,
                'word_hiragana' => 'いぬ',
                'word_kanji' => NULL,
                'romaji' => 'inu',
                'meaning' => 'dog',
                'created_at' => '2025-09-14 21:09:09',
                'updated_at' => '2025-09-14 21:09:09',
            ),
            15 => 
            array (
                'id' => 16,
                'word_hiragana' => 'ねこ',
                'word_kanji' => NULL,
                'romaji' => 'neko',
                'meaning' => 'cat',
                'created_at' => '2025-09-14 21:09:09',
                'updated_at' => '2025-09-14 21:09:09',
            ),
            16 => 
            array (
                'id' => 17,
                'word_hiragana' => 'さかな',
                'word_kanji' => NULL,
                'romaji' => 'sakana',
                'meaning' => 'fish',
                'created_at' => '2025-09-14 21:09:09',
                'updated_at' => '2025-09-14 21:09:09',
            ),
            17 => 
            array (
                'id' => 18,
                'word_hiragana' => 'みず',
                'word_kanji' => NULL,
                'romaji' => 'mizu',
                'meaning' => 'water',
                'created_at' => '2025-09-14 21:09:09',
                'updated_at' => '2025-09-14 21:09:09',
            ),
            18 => 
            array (
                'id' => 19,
                'word_hiragana' => 'ごはん',
                'word_kanji' => NULL,
                'romaji' => 'gohan',
                'meaning' => 'rice / meal',
                'created_at' => '2025-09-14 21:09:09',
                'updated_at' => '2025-09-14 21:09:09',
            ),
            19 => 
            array (
                'id' => 20,
                'word_hiragana' => 'えもじ',
                'word_kanji' => NULL,
                'romaji' => 'emoji',
            'meaning' => 'emoji (picture character)',
                'created_at' => '2025-09-14 21:09:09',
                'updated_at' => '2025-09-14 21:09:09',
            ),
            20 => 
            array (
                'id' => 21,
                'word_hiragana' => 'おねがいします',
                'word_kanji' => NULL,
                'romaji' => 'onegaishimasu',
                'meaning' => 'Please',
                'created_at' => '2025-09-14 21:09:09',
                'updated_at' => '2025-09-14 21:09:09',
            ),
            21 => 
            array (
                'id' => 22,
                'word_hiragana' => 'はじめまして',
                'word_kanji' => NULL,
                'romaji' => 'hajimemashite',
                'meaning' => 'Nice to meet you',
                'created_at' => '2025-09-14 21:09:09',
                'updated_at' => '2025-09-14 21:09:09',
            ),
            22 => 
            array (
                'id' => 23,
                'word_hiragana' => 'おいしい',
                'word_kanji' => NULL,
                'romaji' => 'oishii',
                'meaning' => 'delicious / tasty',
                'created_at' => '2025-09-14 21:09:09',
                'updated_at' => '2025-09-14 21:09:09',
            ),
            23 => 
            array (
                'id' => 24,
                'word_hiragana' => 'たのしい',
                'word_kanji' => NULL,
                'romaji' => 'tanoshii',
                'meaning' => 'fun / enjoyable',
                'created_at' => '2025-09-14 21:09:09',
                'updated_at' => '2025-09-14 21:09:09',
            ),
            24 => 
            array (
                'id' => 25,
                'word_hiragana' => 'かわいい',
                'word_kanji' => NULL,
                'romaji' => 'kawaii',
                'meaning' => 'cute',
                'created_at' => '2025-09-14 21:09:09',
                'updated_at' => '2025-09-14 21:09:09',
            ),
            25 => 
            array (
                'id' => 26,
                'word_hiragana' => 'すごい',
                'word_kanji' => NULL,
                'romaji' => 'sugoi',
                'meaning' => 'amazing / awesome',
                'created_at' => '2025-09-14 21:09:09',
                'updated_at' => '2025-09-14 21:09:09',
            ),
            26 => 
            array (
                'id' => 27,
                'word_hiragana' => 'あたらしい',
                'word_kanji' => NULL,
                'romaji' => 'atarashii',
                'meaning' => 'new',
                'created_at' => '2025-09-14 21:09:09',
                'updated_at' => '2025-09-14 21:09:09',
            ),
            27 => 
            array (
                'id' => 28,
                'word_hiragana' => 'ふるい',
                'word_kanji' => NULL,
                'romaji' => 'furui',
                'meaning' => 'old',
                'created_at' => '2025-09-14 21:09:09',
                'updated_at' => '2025-09-14 21:09:09',
            ),
            28 => 
            array (
                'id' => 29,
                'word_hiragana' => 'おおきい',
                'word_kanji' => NULL,
                'romaji' => 'ookii',
                'meaning' => 'big',
                'created_at' => '2025-09-14 21:09:09',
                'updated_at' => '2025-09-14 21:09:09',
            ),
            29 => 
            array (
                'id' => 30,
                'word_hiragana' => 'ちいさい',
                'word_kanji' => NULL,
                'romaji' => 'chiisai',
                'meaning' => 'small',
                'created_at' => '2025-09-14 21:09:09',
                'updated_at' => '2025-09-14 21:09:09',
            ),
        ));
        
        
    }
}