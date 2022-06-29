<?php

class Enum_Language extends Core_Enum
{
    const NL = 'nl';
    const FR = 'fr';
    const EN = 'en';
    const DE = 'de';
    const BE = 'be';    
    const DEFAULT_LANGUAGE = 'nl';

    protected static $labels = [
        Enum_Language::DEFAULT_LANGUAGE => 'Localization_Nl',
        Enum_Language::NL => 'Localization_Nl',
        Enum_Language::FR => 'Localization_Fr',
        Enum_Language::EN => 'Localization_En',
        Enum_Language::DE => 'Localization_De',
        Enum_Language::BE => 'Localization_Be',        
    ];
}