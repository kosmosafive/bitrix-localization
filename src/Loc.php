<?php

declare(strict_types=1);

namespace Kosmos\Bitrix\Localization;

use Bitrix\Main\Localization\Loc as BaseLoc;
use Bitrix\Main\Config\Configuration;

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
            $config = Configuration::getValue('localization');
            static::$defaultLanguage = $config['defaultLanguage'] ?: 'ru';
        }

        return static::$defaultLanguage;
    }
}
