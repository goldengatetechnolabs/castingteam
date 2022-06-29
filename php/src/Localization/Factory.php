<?php

class Localization_Factory
{
    /**
     * @return static
     */
    public static function create()
    {
        return new static();
    }

    /**
     * @param string $lang
     * @return Localization_Language
     * @throws Localization_Exception_UnsupportedLanguage
     */
    public function createLocalization($lang = Enum_Language::DEFAULT_LANGUGE)
    {
        if (Enum_Language::create($lang)->getId()) {
            $class = Enum_Language::create($lang)->getLabel();

            return new $class();
        } else {
            throw new Localization_Exception_UnsupportedLanguage();
        }
    }
}