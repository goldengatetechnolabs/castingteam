<?php

class Map_SmartSearch implements Interface_IAnalyzable
{
    const MAP = [
        [
            'regex' => '/(vrouw|woman|women|vrouwen|girl|vrouwelijke)/ui',
            'key' => 'sex',
            'value' => 'V'
        ],
        [
            'regex' => '/(mannen|man)/ui',
            'key' => 'sex',
            'value' => 'M'
        ],
        [
            'regex' => '/(family|gezin|fam|family|families)/ui',
            'key' => 'sex',
            'value' => 'F'
        ],
        [
            'regex' => '/(actrice|acteur)/ui',
            'key' => 'category',
            'value' => '203'
        ],
        [
            'regex' => '/(model|modellen)/ui',
            'key' => 'category',
            'value' => '202'
        ],
        [
            'regex' => '/(kid|teen|jongens|meisjes|girl|child|kids)/ui',
            'key' => 'category',
            'value' => '204'
        ],
        [
            'regex' => '/(people)/ui',
            'key' => 'category',
            'value' => '201'
        ],
        [
            'regex' => '/(old|senioren)/ui',
            'key' => 'category',
            'value' => '205'
        ],
        [
            'regex' => '/(all|alle)/ui',
            'key' => 'category',
            'value' => '206'
        ],

        [
            'regex' => '/blond/ui',
            'key' => 'hair_color_filter',
            'value' => '32'
        ],
        [
            'regex' => '/Bruin/ui',
            'key' => 'hair_color_filter',
            'value' => '33'
        ],
        [
            'regex' => '/Zwart/ui',
            'key' => 'hair_color_filter',
            'value' => '34'
        ],
        [
            'regex' => '/Rood/ui',
            'key' => 'hair_color_filter',
            'value' => '35'
        ],
        [
            'regex' => '/Speciaal/ui',
            'key' => 'hair_color_filter',
            'value' => '36'
        ],
        [
            'regex' => '/Grijs/ui',
            'key' => 'hair_color_filter',
            'value' => '37'
        ],
        [
            'regex' => '/Wit/ui',
            'key' => 'hair_color_filter',
            'value' => '0'
        ],



        [
            'regex' => '/Europees/ui',
            'key' => 'skin_filter',
            'value' => '27'
        ],
        [
            'regex' => '/(Afrikaans|(zwarte|black)\s(skin|man))/ui',
            'key' => 'skin_filter',
            'value' => '28'
        ],
        [
            'regex' => '/Oost-Aziatisch/ui',
            'key' => 'skin_filter',
            'value' => '29'
        ],
        [
            'regex' => '/Arabisch/ui',
            'key' => 'skin_filter',
            'value' => '30'
        ],
        [
            'regex' => '/SpaansLatin/ui',
            'key' => 'skin_filter',
            'value' => '31'
        ],
        [
            'regex' => '/Noord-Afrikaans/ui',
            'key' => 'skin_filter',
            'value' => '207'
        ],
        [
            'regex' => '/Zuid-Aziatisch/ui',
            'key' => 'skin_filter',
            'value' => '208'
        ],
        [
            'regex' => '/Noord-Aziatisch/ui',
            'key' => 'skin_filter',
            'value' => '209'
        ],
        [
            'regex' => '/Scandinavisch/ui',
            'key' => 'skin_filter',
            'value' => '210'
        ],


        [
            'regex' => '/(hair|haar)?\s+Lang\s+(hair|haar)/ui',
            'key' => 'hair_length_filter',
            'value' => '38'
        ],
        [
            'regex' => '/Kort\s+(hair|haar)/ui',
            'key' => 'hair_length_filter',
            'value' => '39'
        ],
        [
            'regex' => '/Midden\s+(hair|haar)/ui',
            'key' => 'hair_length_filter',
            'value' => '40'
        ],
        [
            'regex' => '/Kaal\s+(hair|haar)/ui',
            'key' => 'hair_length_filter',
            'value' => '41'
        ],


        [
            'regex' => '/Stijl/ui',
            'key' => 'hair_filter',
            'value' => '42'
        ],
        [
            'regex' => '/krullen|curly/ui',
            'key' => 'hair_filter',
            'value' => '43'
        ],
        [
            'regex' => '/Speciaal.+(haar|hair)/ui',
            'key' => 'hair_filter',
            'value' => '44'
        ],
        [
            'regex' => '/piekjes/ui',
            'key' => 'hair_filter',
            'value' => '45'
        ],

        [
            'regex' => '/jeans(\s+)?(van|tussen|from)?\s+(\d+)/ui',
            'key' => 'jeans_start',
            'value' => ''
        ],
        [
            'regex' => '/jeans(\s+)?(van|tussen|from|between)?\s+\d+(\s+)?(en|to|and|-|tot)(\s+)?(\d+)/ui',
            'key' => 'jeans_end',
            'value' => ''
        ],
        [
            'regex' => '/Kleding(\s+)?(van|tussen|from)?\s+(\d+)/ui',
            'key' => 'kleding_start',
            'value' => ''
        ],
        [
            'regex' => '/Kleding(\s+)?(van|tussen|from|between)?\s+\d+(\s+)?(en|to|and|-|tot)(\s+)?(\d+)/ui',
            'key' => 'kleding_end',
            'value' => ''
        ],
        [
            'regex' => '/Schoen(\s+)?(van|tussen|from)?\s+(\d+)/ui',
            'key' => 'schoenmaat_start',
            'value' => ''
        ],
        [
            'regex' => '/Schoen(\s+)?(van|tussen|from|between)?\s+\d+(\s+)?(en|to|and|-|tot)(\s+)?(\d+)/ui',
            'key' => 'schoenmaat_end',
            'value' => ''
        ],
        [
            'regex' => '/Kostuum(\s+)?(van|tussen|from)?\s+(\d+)/ui',
            'key' => 'kostuum_start',
            'value' => ''
        ],
        [
            'regex' => '/Kostuum(\s+)?(van|tussen|from|between)?\s+\d+(\s+)?(en|to|and|-|tot)(\s+)?(\d+)/ui',
            'key' => 'kostuum_end',
            'value' => ''
        ],
        [
            'regex' => '/(bust|borst|Borstomtrek)(\s+)?(van|tussen|from)?\s+(\d+)/ui',
            'key' => 'borst_start',
            'value' => ''
        ],
        [
            'regex' => '/(bust|borst|Borstomtrek)(\s+)?(van|tussen|from|between)?\s+\d+(\s+)?(en|to|and|-|tot)(\s+)?(\d+)/ui',
            'key' => 'borst_end',
            'value' => ''
        ],
        [
            'regex' => '/(waist|Taille)(\s+)?(van|tussen|from)?\s+(\d+)/ui',
            'key' => 'taille_start',
            'value' => ''
        ],
        [
            'regex' => '/(waist|Taille)(\s+)?(van|tussen|from|between)?\s+\d+(\s+)?(en|to|and|-|tot)(\s+)?(\d+)/ui',
            'key' => 'taille_end',
            'value' => ''
        ],
        [
            'regex' => '/(Heupomtrek|hips|heupen)(\s+)?(van|tussen|from)?\s+(\d+)/ui',
            'key' => 'heupen_start',
            'value' => ''
        ],
        [
            'regex' => '/(bust|borst|Borstomtrek)(\s+)?(van|tussen|from|between)?\s+\d+(\s+)?(en|to|and|-|tot)(\s+)?(\d+)/ui',
            'key' => 'heupen_end',
            'value' => ''
        ],
        [
            'regex' => '/(age(\s+)?(van|tussen|from)\s+(\d+)|(\s+)?(van|tussen|from|between)\s+(\d+)(\s+)?((en|to|and|-|tot)(\s+)?\d+)?(\s+)?(jaar|year)|age(\s+)?(\d+)(\s+)?-(\s+)?\d+|(\s+)?(\d+)(\s+)?-(\s+)?\d+(\s+)(year|age|jaar))/ui',
            'key' => 'age_start',
            'value' => ''
        ],
        [
            'regex' => '/(age(\s+)?(van|tussen|from|between)?\s+\d+(\s+)?(en|to|and|-|tot)(\s+)?(\d+)|(\s+)?(van|tussen|from|between)?\s+\d+(\s+)?(en|to|and|-|tot)(\s+)?(\d+)(\s+)?(jaar|year))/ui',
            'key' => 'age_end',
            'value' => ''
        ],
        [
            'regex' => '/(age(\s+)?(van|tussen|from)\s+(\d+)|(\s+)?(van|tussen|from|between)\s+(\d+)(\s+)?((en|to|and|-|tot)(\s+)?\d+)?(\s+)?(tall)|lengte(\s+)?(\d+)(\s+)?-(\s+)?\d+|(\s+)?(\d+)(\s+)?-(\s+)?\d+(\s+)tall)/ui',
            'key' => 'lengte_start',
            'value' => ''
        ],
        [
            'regex' => '/((lengte|length|height)(\s+)?(van|tussen|from|between)?\s+\d+(\s+)?(en|to|and|-|tot)(\s+)?(\d+)|(\s+)?(van|tussen|from|between)?\s+\d+(\s+)?(en|to|and|-|tot)(\s+)?(\d+)(\s+)?(tall))/ui',
            'key' => 'lengte_end',
            'value' => ''
        ],
        [
            'regex' => '/jeans(\s+|-)?(\d+)/ui',
            'key' => 'jeans_size',
            'value' => ''
        ],
        [
            'regex' => '/(Heupomtrek|hips|heupen)(\s+|-)?(\d+)/ui',
            'key' => 'hips',
            'value' => ''
        ],
        [
            'regex' => '/(bust|borst|Borstomtrek)(\s+|-)?(\d+)/ui',
            'key' => 'bust',
            'value' => ''
        ],
        [
            'regex' => '/(waist|Taille)(\s+|-)?(\d+)/ui',
            'key' => 'waist',
            'value' => ''
        ],
        [
            'regex' => '/Kleding(\s+|-)?(\d+)/ui',
            'key' => 'clothing_size',
            'value' => ''
        ],
        [
            'regex' => '/Schoen(\s+|-)?(\d+)/ui',
            'key' => 'shoe_size',
            'value' => ''
        ],
        [
            'regex' => '/Kostuum(\s+|-)?(\d+)/ui',
            'key' => 'costum_size',
            'value' => ''
        ],
        [
            'regex' => '/(\d+)(\s+|-)?(cm|tall)/ui',
            'key' => 'lengte_exactly',
            'value' => ''
        ],
        [
            'regex' => '/(\d+)(\s+|-)?(jaar|year)/ui',
            'key' => 'age_exactly',
            'value' => ''
        ],
        [
            'regex' => '/(\d+)/ui',
            'key' => 'age_exactly',
            'value' => ''
        ]
    ];
}