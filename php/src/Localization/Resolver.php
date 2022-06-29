<?php

class Localization_Resolver
{
    /**
     * @param string $lang
     * @return string[]
     */
    public function resolve($lang)
    {
        try {
            $languageContent = Localization_Factory::create()->createLocalization($lang)->getContent();
        } catch (Localization_Exception_UnsupportedLanguage $e) {
            $languageContent = Localization_Factory::create()->createLocalization(Enum_Language::DEFAULT_LANGUAGE)->getContent();
        }

        return $languageContent;
    }

    /**
     * @return static
     */
    public static function create()
    {
        return new static();
    }
}