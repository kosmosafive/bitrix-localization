<?php

declare(strict_types=1);

namespace Kosmos\Bitrix\Localization;

use Bitrix\Main\Localization\Loc as BaseLoc;
use Bitrix\Main\Config\Configuration;

/**
 * @method static void loadMessages(string $file)
 * @method static string getCurrentLang()
 * @method static void setCurrentLang(string $language)
 * @method static array loadLanguageFile(string $file, string $language = null, bool $normalize = true)
 * @method static void loadCustomMessages(string $file, ?string $language = null)
 * @method static string getDefaultLang(string $lang)
 * @method static array getIncludedFiles()
 * @method static int getPluralForm($value, ?string $language = '') *
 */
class Loc
{
    protected static ?string $defaultLanguage = null;

    public function __call($name, $arguments)
    {
        return call_user_func_array([BaseLoc::class, $name], $arguments);
    }

    public static function __callStatic($name, $arguments)
    {
        return call_user_func_array([BaseLoc::class, $name], $arguments);
    }

    public static function getMessage(
        string $code,
        ?array $replace = null,
        ?string $language = null,
        ?string $defaultLanguage = null
    ): ?string {
        $message = BaseLoc::getMessage($code, $replace, $language);
        if ($message === null) {
            $defaultLanguage ??= static::getDefaultLanguage();

            if ($defaultLanguage !== $language) {
                $message = BaseLoc::getMessage($code, $replace, $defaultLanguage);
            }
        }

        return $message;
    }

    protected static function getDefaultLanguage(): ?string
    {
        if (static::$defaultLanguage === null) {
            $configValue = Configuration::getValue('default_language');
            static::$defaultLanguage = $configValue ?: 'ru';
        }

        return static::$defaultLanguage;
    }

    public static function getMessagePlural(
        string $code,
        int $value,
        ?array $replace = null,
        ?string $language = null,
        ?string $defaultLanguage = null
    ): ?string
    {
        $message = BaseLoc::getMessagePlural($code, $value, $replace, $language);
        if ($message === null) {
            $defaultLanguage ??= static::getDefaultLanguage();

            if ($defaultLanguage !== $language) {
                $message = BaseLoc::getMessagePlural($code, $value, $replace, $defaultLanguage);
            }
        }

        return $message;
    }
}
