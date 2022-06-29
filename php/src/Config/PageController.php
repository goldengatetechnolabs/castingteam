<?php

class Config_PageController
{
    const CONFIG = [
        Enum_Site::CASTINGTEAM =>
            [
                'partner-nederland' =>
                    [
                        'class' => Controller_StaticPage::class,
                        'template' => 'templates/site/partner-nederland.tpl',
                        'title' => 'Partner Nederland',
                    ],
                'partner-promo-hostessen' =>
                    [
                        'class' => Controller_StaticPage::class,
                        'template' => 'templates/site/partner-promo-hostessen.tpl',
                        'title' => 'Partner Promo Hostessen'
                    ],
                'partner-bruxelles-wallonie' =>
                    [
                        'class' => Controller_StaticPage::class,
                        'template' => 'templates/site/partner-bruxelles-wallonie.tpl',
                        'title' => 'Partner Bruxelles Wallonie',
                    ],
                'partner-fashion' =>
                    [
                        'class' => Controller_StaticPage::class,
                        'template' => 'templates/site/partner-fashion.tpl',
                        'title' => 'Partner Fashion',
                    ],
                'partner-casting-director' =>
                    [
                        'class' => Controller_StaticPage::class,
                        'template' => 'templates/site/partner-casting-director.tpl',
                        'title' => 'Partner Casting Director',
                    ]
            ],
        Enum_Site::BORDERFIELD =>
            [
                '^\/([a-zA-Z]{2})?(\/)?$' =>
                    [
                        'class' => Controller_Borderfield_Homepage::class,
                        'template' => 'templates/borderfield/homepage_new.tpl',
                        'title' => 'Homepage',
                        'method' => 'show',
                    ],
                '^\/[a-zA-Z]{2}\/homepage(\/)?$' =>
                    [
                        'class' => Controller_Borderfield_Homepage::class,
                        'template' => 'templates/borderfield/homepage.tpl',
                        'title' => 'Homepage',
                        'method' => 'show',
                    ],
                '^\/[a-zA-Z]{2}\/(overview|new_talent_models|models-boys-men|models-girls-women|models-gentlemen|models-ladies|models-sports-athletes|models-fashion-kids-teens|models-plus-size-curvy|models-hands-legs-feet|models-real-families-couples|models-seniors)(\/)?$' =>
                    [
                        'class' => Controller_Borderfield_Overview::class,
                        'template' => 'templates/borderfield/overview.tpl',
                        'title' => 'Overview',
                        'method' => 'show',
                    ],
                '\/[a-zA-Z]{2}\/(overview|new_talent_models|models-boys-men|models-girls-women|models-gentlemen|models-ladies|models-sports-athletes|models-fashion-kids-teens|models-plus-size-curvy|models-hands-legs-feet|models-real-families-couples|models-seniors)\/(\d+)$' =>
                    [
                        'class' => Controller_Borderfield_SingleModel::class,
                        'template' => 'templates/borderfield/single_model_page.tpl',
                        'title' => 'Model page',
                        'method' => 'show',
                    ],
                '^\/[a-zA-Z]{2}\/selection(\/)?$' =>
                    [
                        'class' => Controller_Borderfield_Selection::class,
                        'template' => 'templates/borderfield/selection.tpl',
                        'title' => 'Selections',
                        'method' => 'show',
                    ],
                '^\/[a-zA-Z]{2}\/creative_trials(\/)?$' =>
                    [
                        'class' => Controller_Borderfield_StaticPage::class,
                        'template' => 'templates/borderfield/trials.tpl',
                        'title' => 'Creative Trials',
                        'method' => 'show',
                    ],
                '^\/[a-zA-Z]{2}\/register\/0$' =>
                    [
                        'class' => Registreren::class,
                        'template' => '',
                        'title' => 'Model Registration',
                        'method' => 'stap0',
                    ],
                '^\/[a-zA-Z]{2}\/register\/1$' =>
                    [
                        'class' => Registreren::class,
                        'template' => '',
                        'title' => 'Model Registration',
                        'method' => 'stap1',
                    ],
                '^\/[a-zA-Z]{2}\/register\/2$' =>
                    [
                        'class' => Registreren::class,
                        'template' => '',
                        'title' => 'Model Registration',
                        'method' => 'stap2',
                    ],
                '^\/[a-zA-Z]{2}\/register\/3$' =>
                    [
                        'class' => Registreren::class,
                        'template' => '',
                        'title' => 'Model Registration',
                        'method' => 'stap3',
                    ],
                '^\/[a-zA-Z]{2}\/register\/4$' =>
                    [
                        'class' => Registreren::class,
                        'template' => '',
                        'title' => 'Model Registration',
                        'method' => 'stap4',
                    ],
                '^\/[a-zA-Z]{2}\/register\/5$' =>
                    [
                        'class' => Registreren::class,
                        'template' => '',
                        'title' => 'Model Registration',
                        'method' => 'stap5',
                    ],
                '^\/[a-zA-Z]{2}\/register\/6$' =>
                    [
                        'class' => Registreren::class,
                        'template' => '',
                        'title' => 'Model Registration',
                        'method' => 'stap6',
                    ],
                '^\/[a-zA-Z]{2}\/register\/ajax_naar_stap_2$' =>
                    [
                        'class' => Registreren::class,
                        'template' => '',
                        'title' => 'Model Registration',
                        'method' => 'ajax_naar_stap_2',
                    ],
                '^\/[a-zA-Z]{2}\/register\/ajax_naar_stap_3$' =>
                    [
                        'class' => Registreren::class,
                        'template' => '',
                        'title' => 'Model Registration',
                        'method' => 'ajax_naar_stap_3',
                    ],
                '^\/[a-zA-Z]{2}\/register\/ajax_naar_stap_4$' =>
                    [
                        'class' => Registreren::class,
                        'template' => '',
                        'title' => 'Model Registration',
                        'method' => 'ajax_naar_stap_4',
                    ],
                '^\/[a-zA-Z]{2}\/register\/ajax_naar_stap_5$' =>
                    [
                        'class' => Registreren::class,
                        'template' => '',
                        'title' => 'Model Registration',
                        'method' => 'ajax_naar_stap_5',
                    ],
                '^\/[a-zA-Z]{2}\/register\/ajax_naar_stap_6$' =>
                    [
                        'class' => Registreren::class,
                        'template' => '',
                        'title' => 'Model Registration',
                        'method' => 'ajax_naar_stap_6',
                    ],
                '^\/[a-zA-Z]{2}\/register\/ajax_get_fotos$' =>
                    [
                        'class' => Registreren::class,
                        'template' => '',
                        'title' => 'Model Registration',
                        'method' => 'ajax_get_fotos',
                    ],
                '^\/[a-zA-Z]{2}\/register\/ajax_delete_foto$' =>
                    [
                        'class' => Registreren::class,
                        'template' => '',
                        'title' => 'Model Registration',
                        'method' => 'ajax_delete_foto',
                    ],
                '^\/[a-zA-Z]{2}\/register\/ajax_foto_upload' =>
                    [
                        'class' => Registreren::class,
                        'template' => '',
                        'title' => 'Model Registration',
                        'method' => 'ajax_foto_upload',
                    ],
                '^\/[a-zA-Z]{2}\/register\/ajax_modelcode' =>
                    [
                        'class' => Registreren::class,
                        'template' => '',
                        'title' => 'Model Registration',
                        'method' => 'ajax_modelcode',
                    ],
                '^\/[a-zA-Z]{2}\/register\/ajax_vergeten' =>
                    [
                        'class' => Registreren::class,
                        'template' => '',
                        'title' => 'Model Registration',
                        'method' => 'ajax_vergeten',
                    ],
            ],
    ];
}
