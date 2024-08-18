# Die Klasse `Category`

Kind-Klasse von `rex_yform_manager_dataset`, damit stehen alle Methoden von YOrm-Datasets zur Verfügung. Greift auf die Tabelle `rex_tier_category` zu.

> Es werden nachfolgend zur die durch dieses Addon ergänzte Methoden beschrieben. Lerne mehr über YOrm und den Methoden für Querys, Datasets und Collections in der [YOrm Doku](https://github.com/yakamara/yform/blob/master/docs/04_yorm.md)

## Alle Einträge erhalten

```php
$tier_category_collection = Category::query()->find(); // YOrm-Standard-Methode zum Finden von Einträgen, lässt sich mit where(), Limit(), etc. einschränken und Filtern.
$tier_category_collection = Category::findOnline(); // Sucht nur nach Einträgen mit dem Status "online"
```

## Methoden und Beispiele

### `findOnline()`

Gibt alle Kategorien zurück, die den Status "online" haben.

```php
$tier_category_collection = Category::findOnline();
```

### `getName()`

Gibt den Wert für das Feld `name` (Name) zurück:

Beispiel:

```php
$dataset = tier_category::get($id);
echo $dataset->getName();
```

### `setName(mixed $value)`

Setzt den Wert für das Feld `name` (Name).

```php
$dataset = tier_category::create();
$dataset->setName($value);
$dataset->save();
```

### `getTeaser(bool $asPlaintext = false)`

Gibt den Wert für das Feld `teaser` (Teaser) zurück: Teaser

Beispiel:

```php
$dataset = tier_category::get($id);
$text = $dataset->getTeaser(true);
```

### `setTeaser(mixed $value)`

Setzt den Wert für das Feld `teaser` (Teaser).

```php
$dataset = tier_category::create();
$dataset->setTeaser($value);
$dataset->save();
```

### `getStatus()`

Gibt den Wert für das Feld `status` (Status) zurück:

Beispiel:

```php
$dataset = tier_category::get($id);
$auswahl = $dataset->getStatus();
```

### `setStatus(mixed $param)`

Setzt den Wert für das Feld `status` (Status).

```php
$dataset = tier_category::create();
$dataset->setStatus($param);
$dataset->save();
```

### `getcreateDate()`

Gibt den Wert für das Feld `createdate` (Erstellt am) zurück:

Beispiel:

```php
$dataset = tier_category::get($id);
$datestamp = $dataset->getcreateDate();
```

### `setcreateDate(string $value)`

Setzt den Wert für das Feld `createdate` (Erstellt am).

```php
$dataset = tier_category::create();
$dataset->setcreateDate($value);
$dataset->save();
```

### `getcreateUser()`

Gibt folgenden Wert

    zurück

: Erstellt von

Beispiel:

```php
$dataset = tier_category::get($id);
$benutzer = $dataset->getcreateUser();
```

### `setcreateUser(mixed $value)`

Setzt den Wert für das Feld `createuser` (Erstellt von).

```php
$dataset = tier_category::create();
$dataset->setcreateUser($value);
$dataset->save();
```

### `getupdateDate()`

Gibt den Wert für das Feld `updatedate` (Zuletzt bearbeitet am) zurück:

Beispiel:

```php
$dataset = tier_category::get($id);
$datestamp = $dataset->getupdateDate();
```

### `setupdateDate(string $value)`

Setzt den Wert für das Feld `updatedate` (Zuletzt bearbeitet am).

```php
$dataset = tier_category::create();
$dataset->setupdateDate($value);
$dataset->save();
```

### `getupdateUser()`

Gibt folgenden Wert

    zurück

: Zuletzt bearbeitet von

Beispiel:

```php
$dataset = tier_category::get($id);
$benutzer = $dataset->getupdateUser();
```

### `setupdateUser(mixed $value)`

Setzt den Wert für das Feld `updateuser` (Zuletzt bearbeitet von).

```php
$dataset = tier_category::create();
$dataset->setupdateUser($value);
$dataset->save();
```
