# Kosmos: Bitrix Localization

Расширение стандартного функционала локализации Bitrix.

## Конфигурация

Конфигурацию рекомендуется указывать в файле /bitrix/.settings_extra.php.

* _default_language_ — (опционально) язык по умолчанию.

```php
return [
    'default_language' => [
        'value' => 'ru',
    ],
];
```

## Использование

### Kosmos\Bitrix\Localization\Loc

Класс расширяет функционал стандартного класса `Bitrix\Main\Localization\Loc`.

#### getMessage

```php
public static function getMessage(
        string $code,
        ?array $replace = null,
        ?string $language = null,
        ?string $defaultLanguage = null
    ): ?string
```

* _defaultLanguage_ — (опционально) язык по умолчанию. если не найдена языковая фраза на запрашиваемом языке, будет выполнен поиск на языке по умолчанию. если параметр не передан, будет использоваться значение из конфигурации.