<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CharactersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('characters')->delete();
        
        \DB::table('characters')->insert(array (
            0 => 
            array (
                'idcharacters' => 1,
                'character' => 'あ',
                'romaji' => 'a',
                'type' => 'hiragana',
                'updated_at' => '2025-09-07 09:35:03',
                'created_at' => '2025-09-07 09:35:03',
            ),
            1 => 
            array (
                'idcharacters' => 2,
                'character' => 'い',
                'romaji' => 'i',
                'type' => 'hiragana',
                'updated_at' => '2025-09-07 09:36:57',
                'created_at' => '2025-09-07 09:36:57',
            ),
            2 => 
            array (
                'idcharacters' => 3,
                'character' => 'う',
                'romaji' => 'u',
                'type' => 'hiragana',
                'updated_at' => '2025-09-07 09:37:24',
                'created_at' => '2025-09-07 09:37:24',
            ),
            3 => 
            array (
                'idcharacters' => 4,
                'character' => 'え',
                'romaji' => 'e',
                'type' => 'hiragana',
                'updated_at' => '2025-09-07 09:37:32',
                'created_at' => '2025-09-07 09:37:32',
            ),
            4 => 
            array (
                'idcharacters' => 5,
                'character' => 'お',
                'romaji' => 'o',
                'type' => 'hiragana',
                'updated_at' => '2025-09-07 09:37:42',
                'created_at' => '2025-09-07 09:37:42',
            ),
            5 => 
            array (
                'idcharacters' => 6,
                'character' => 'か',
                'romaji' => 'ka',
                'type' => 'hiragana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            6 => 
            array (
                'idcharacters' => 7,
                'character' => 'き',
                'romaji' => 'ki',
                'type' => 'hiragana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            7 => 
            array (
                'idcharacters' => 8,
                'character' => 'く',
                'romaji' => 'ku',
                'type' => 'hiragana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            8 => 
            array (
                'idcharacters' => 9,
                'character' => 'け',
                'romaji' => 'ke',
                'type' => 'hiragana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            9 => 
            array (
                'idcharacters' => 10,
                'character' => 'こ',
                'romaji' => 'ko',
                'type' => 'hiragana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            10 => 
            array (
                'idcharacters' => 11,
                'character' => 'さ',
                'romaji' => 'sa',
                'type' => 'hiragana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            11 => 
            array (
                'idcharacters' => 12,
                'character' => 'し',
                'romaji' => 'shi',
                'type' => 'hiragana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            12 => 
            array (
                'idcharacters' => 13,
                'character' => 'す',
                'romaji' => 'su',
                'type' => 'hiragana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            13 => 
            array (
                'idcharacters' => 14,
                'character' => 'せ',
                'romaji' => 'se',
                'type' => 'hiragana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            14 => 
            array (
                'idcharacters' => 15,
                'character' => 'そ',
                'romaji' => 'so',
                'type' => 'hiragana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            15 => 
            array (
                'idcharacters' => 16,
                'character' => 'た',
                'romaji' => 'ta',
                'type' => 'hiragana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            16 => 
            array (
                'idcharacters' => 17,
                'character' => 'ち',
                'romaji' => 'chi',
                'type' => 'hiragana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            17 => 
            array (
                'idcharacters' => 18,
                'character' => 'つ',
                'romaji' => 'tsu',
                'type' => 'hiragana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            18 => 
            array (
                'idcharacters' => 19,
                'character' => 'て',
                'romaji' => 'te',
                'type' => 'hiragana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            19 => 
            array (
                'idcharacters' => 20,
                'character' => 'と',
                'romaji' => 'to',
                'type' => 'hiragana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            20 => 
            array (
                'idcharacters' => 21,
                'character' => 'な',
                'romaji' => 'na',
                'type' => 'hiragana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            21 => 
            array (
                'idcharacters' => 22,
                'character' => 'に',
                'romaji' => 'ni',
                'type' => 'hiragana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            22 => 
            array (
                'idcharacters' => 23,
                'character' => 'ぬ',
                'romaji' => 'nu',
                'type' => 'hiragana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            23 => 
            array (
                'idcharacters' => 24,
                'character' => 'ね',
                'romaji' => 'ne',
                'type' => 'hiragana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            24 => 
            array (
                'idcharacters' => 25,
                'character' => 'の',
                'romaji' => 'no',
                'type' => 'hiragana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            25 => 
            array (
                'idcharacters' => 26,
                'character' => 'は',
                'romaji' => 'ha',
                'type' => 'hiragana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            26 => 
            array (
                'idcharacters' => 27,
                'character' => 'ひ',
                'romaji' => 'hi',
                'type' => 'hiragana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            27 => 
            array (
                'idcharacters' => 28,
                'character' => 'ふ',
                'romaji' => 'fu',
                'type' => 'hiragana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            28 => 
            array (
                'idcharacters' => 29,
                'character' => 'へ',
                'romaji' => 'he',
                'type' => 'hiragana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            29 => 
            array (
                'idcharacters' => 30,
                'character' => 'ほ',
                'romaji' => 'ho',
                'type' => 'hiragana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            30 => 
            array (
                'idcharacters' => 31,
                'character' => 'ま',
                'romaji' => 'ma',
                'type' => 'hiragana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            31 => 
            array (
                'idcharacters' => 32,
                'character' => 'み',
                'romaji' => 'mi',
                'type' => 'hiragana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            32 => 
            array (
                'idcharacters' => 33,
                'character' => 'む',
                'romaji' => 'mu',
                'type' => 'hiragana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            33 => 
            array (
                'idcharacters' => 34,
                'character' => 'め',
                'romaji' => 'me',
                'type' => 'hiragana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            34 => 
            array (
                'idcharacters' => 35,
                'character' => 'も',
                'romaji' => 'mo',
                'type' => 'hiragana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            35 => 
            array (
                'idcharacters' => 36,
                'character' => 'や',
                'romaji' => 'ya',
                'type' => 'hiragana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            36 => 
            array (
                'idcharacters' => 37,
                'character' => 'ゆ',
                'romaji' => 'yu',
                'type' => 'hiragana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            37 => 
            array (
                'idcharacters' => 38,
                'character' => 'よ',
                'romaji' => 'yo',
                'type' => 'hiragana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            38 => 
            array (
                'idcharacters' => 39,
                'character' => 'ら',
                'romaji' => 'ra',
                'type' => 'hiragana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            39 => 
            array (
                'idcharacters' => 40,
                'character' => 'り',
                'romaji' => 'ri',
                'type' => 'hiragana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            40 => 
            array (
                'idcharacters' => 41,
                'character' => 'る',
                'romaji' => 'ru',
                'type' => 'hiragana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            41 => 
            array (
                'idcharacters' => 42,
                'character' => 'れ',
                'romaji' => 're',
                'type' => 'hiragana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            42 => 
            array (
                'idcharacters' => 43,
                'character' => 'ろ',
                'romaji' => 'ro',
                'type' => 'hiragana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            43 => 
            array (
                'idcharacters' => 44,
                'character' => 'わ',
                'romaji' => 'wa',
                'type' => 'hiragana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            44 => 
            array (
                'idcharacters' => 45,
                'character' => 'を',
                'romaji' => 'wo',
                'type' => 'hiragana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            45 => 
            array (
                'idcharacters' => 46,
                'character' => 'ん',
                'romaji' => 'n',
                'type' => 'hiragana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            46 => 
            array (
                'idcharacters' => 47,
                'character' => 'ア',
                'romaji' => 'a',
                'type' => 'katakana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            47 => 
            array (
                'idcharacters' => 48,
                'character' => 'イ',
                'romaji' => 'i',
                'type' => 'katakana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            48 => 
            array (
                'idcharacters' => 49,
                'character' => 'ウ',
                'romaji' => 'u',
                'type' => 'katakana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            49 => 
            array (
                'idcharacters' => 50,
                'character' => 'エ',
                'romaji' => 'e',
                'type' => 'katakana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            50 => 
            array (
                'idcharacters' => 51,
                'character' => 'オ',
                'romaji' => 'o',
                'type' => 'katakana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            51 => 
            array (
                'idcharacters' => 52,
                'character' => 'カ',
                'romaji' => 'ka',
                'type' => 'katakana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            52 => 
            array (
                'idcharacters' => 53,
                'character' => 'キ',
                'romaji' => 'ki',
                'type' => 'katakana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            53 => 
            array (
                'idcharacters' => 54,
                'character' => 'ク',
                'romaji' => 'ku',
                'type' => 'katakana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            54 => 
            array (
                'idcharacters' => 55,
                'character' => 'ケ',
                'romaji' => 'ke',
                'type' => 'katakana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            55 => 
            array (
                'idcharacters' => 56,
                'character' => 'コ',
                'romaji' => 'ko',
                'type' => 'katakana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            56 => 
            array (
                'idcharacters' => 57,
                'character' => 'サ',
                'romaji' => 'sa',
                'type' => 'katakana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            57 => 
            array (
                'idcharacters' => 58,
                'character' => 'シ',
                'romaji' => 'shi',
                'type' => 'katakana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            58 => 
            array (
                'idcharacters' => 59,
                'character' => 'ス',
                'romaji' => 'su',
                'type' => 'katakana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            59 => 
            array (
                'idcharacters' => 60,
                'character' => 'セ',
                'romaji' => 'se',
                'type' => 'katakana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            60 => 
            array (
                'idcharacters' => 61,
                'character' => 'ソ',
                'romaji' => 'so',
                'type' => 'katakana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            61 => 
            array (
                'idcharacters' => 62,
                'character' => 'タ',
                'romaji' => 'ta',
                'type' => 'katakana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            62 => 
            array (
                'idcharacters' => 63,
                'character' => 'チ',
                'romaji' => 'chi',
                'type' => 'katakana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            63 => 
            array (
                'idcharacters' => 64,
                'character' => 'ツ',
                'romaji' => 'tsu',
                'type' => 'katakana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            64 => 
            array (
                'idcharacters' => 65,
                'character' => 'テ',
                'romaji' => 'te',
                'type' => 'katakana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            65 => 
            array (
                'idcharacters' => 66,
                'character' => 'ト',
                'romaji' => 'to',
                'type' => 'katakana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            66 => 
            array (
                'idcharacters' => 67,
                'character' => 'ナ',
                'romaji' => 'na',
                'type' => 'katakana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            67 => 
            array (
                'idcharacters' => 68,
                'character' => 'ニ',
                'romaji' => 'ni',
                'type' => 'katakana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            68 => 
            array (
                'idcharacters' => 69,
                'character' => 'ヌ',
                'romaji' => 'nu',
                'type' => 'katakana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            69 => 
            array (
                'idcharacters' => 70,
                'character' => 'ネ',
                'romaji' => 'ne',
                'type' => 'katakana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            70 => 
            array (
                'idcharacters' => 71,
                'character' => 'ノ',
                'romaji' => 'no',
                'type' => 'katakana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            71 => 
            array (
                'idcharacters' => 72,
                'character' => 'ハ',
                'romaji' => 'ha',
                'type' => 'katakana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            72 => 
            array (
                'idcharacters' => 73,
                'character' => 'ヒ',
                'romaji' => 'hi',
                'type' => 'katakana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            73 => 
            array (
                'idcharacters' => 74,
                'character' => 'フ',
                'romaji' => 'fu',
                'type' => 'katakana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            74 => 
            array (
                'idcharacters' => 75,
                'character' => 'ヘ',
                'romaji' => 'he',
                'type' => 'katakana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            75 => 
            array (
                'idcharacters' => 76,
                'character' => 'ホ',
                'romaji' => 'ho',
                'type' => 'katakana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            76 => 
            array (
                'idcharacters' => 77,
                'character' => 'マ',
                'romaji' => 'ma',
                'type' => 'katakana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            77 => 
            array (
                'idcharacters' => 78,
                'character' => 'ミ',
                'romaji' => 'mi',
                'type' => 'katakana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            78 => 
            array (
                'idcharacters' => 79,
                'character' => 'ム',
                'romaji' => 'mu',
                'type' => 'katakana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            79 => 
            array (
                'idcharacters' => 80,
                'character' => 'メ',
                'romaji' => 'me',
                'type' => 'katakana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            80 => 
            array (
                'idcharacters' => 81,
                'character' => 'モ',
                'romaji' => 'mo',
                'type' => 'katakana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            81 => 
            array (
                'idcharacters' => 82,
                'character' => 'ヤ',
                'romaji' => 'ya',
                'type' => 'katakana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            82 => 
            array (
                'idcharacters' => 83,
                'character' => 'ユ',
                'romaji' => 'yu',
                'type' => 'katakana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            83 => 
            array (
                'idcharacters' => 84,
                'character' => 'ヨ',
                'romaji' => 'yo',
                'type' => 'katakana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            84 => 
            array (
                'idcharacters' => 85,
                'character' => 'ラ',
                'romaji' => 'ra',
                'type' => 'katakana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            85 => 
            array (
                'idcharacters' => 86,
                'character' => 'リ',
                'romaji' => 'ri',
                'type' => 'katakana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            86 => 
            array (
                'idcharacters' => 87,
                'character' => 'ル',
                'romaji' => 'ru',
                'type' => 'katakana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            87 => 
            array (
                'idcharacters' => 88,
                'character' => 'レ',
                'romaji' => 're',
                'type' => 'katakana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            88 => 
            array (
                'idcharacters' => 89,
                'character' => 'ロ',
                'romaji' => 'ro',
                'type' => 'katakana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            89 => 
            array (
                'idcharacters' => 90,
                'character' => 'ワ',
                'romaji' => 'wa',
                'type' => 'katakana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            90 => 
            array (
                'idcharacters' => 91,
                'character' => 'ヲ',
                'romaji' => 'wo',
                'type' => 'katakana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            91 => 
            array (
                'idcharacters' => 92,
                'character' => 'ン',
                'romaji' => 'n',
                'type' => 'katakana',
                'updated_at' => '2025-09-07 09:40:00',
                'created_at' => '2025-09-07 09:40:00',
            ),
            92 => 
            array (
                'idcharacters' => 999,
                'character' => 'wrong',
                'romaji' => 'wrong input',
                'type' => 'wrong',
                'updated_at' => '2025-09-14 17:31:24',
                'created_at' => NULL,
            ),
        ));
        
        
    }
}