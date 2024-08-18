# Die Klasse `Entry`

Kind-Klasse von `rex_yform_manager_dataset`, damit stehen alle Methoden von YOrm-Datasets zur Verfügung. Greift auf die Tabelle `rex_tier_entry` zu.

> Es werden nachfolgend zur die durch dieses Addon ergänzte Methoden beschrieben. Lerne mehr über YOrm und den Methoden für Querys, Datasets und Collections in der [YOrm Doku](https://github.com/yakamara/yform/blob/master/docs/04_yorm.md)

## Alle Einträge erhalten

```php
$tier_entries_collection = Entry::query()->find(); // YOrm-Standard-Methode zum Finden von Einträgen, lässt sich mit where(), Limit(), etc. einschränken und Filtern.
$tier_entries_collection = Entry::findOnline(); // Sucht nur nach Einträgen mit dem Status "online" oder "vermittelt"
```

## Methoden und Beispiele

### `findOnline(int $category_id)`

Gibt alle Tiere zurück, die den Status "online" oder "vermittelt" haben.

```php
$tier_entries_collection = Entry::findOnline();
```

### `getUrl()`

Gibt die URL zur Detail-Ansicht eines Tiers zurück.

Beispiel:

```php
$dataset = tier_entry::get($id);
$url = $dataset->getUrl();
```

### `getCategory()`

Gibt den Wert für das Feld `category_id` (Kategorie) zurück:

Beispiel:

```php
$dataset = tier_entry::get($id);
$beziehung = $dataset->getCategory();
```

### `getName()`

Gibt den Wert für das Feld `name` (Name) zurück:

Beispiel:

```php
$dataset = tier_entry::get($id);
echo $dataset->getName();
```

### `setName(mixed $value)`

Setzt den Wert für das Feld `name` (Name).

```php
$dataset = tier_entry::create();
$dataset->setName($value);
$dataset->save();
```

### `getStatus()`

Gibt den Wert für das Feld `status` (Status) zurück:

Beispiel:

```php
$dataset = tier_entry::get($id);
$auswahl = $dataset->getStatus();
```

### `setStatus(mixed $param)`

Setzt den Wert für das Feld `status` (Status).

```php
$dataset = tier_entry::create();
$dataset->setStatus($param);
$dataset->save();
```

### `getTeaser(bool $asPlaintext = false)`

Gibt den Wert für das Feld `teaser` (Teaser) zurück:

Beispiel:

```php
$dataset = tier_entry::get($id);
$text = $dataset->getTeaser(true);
```

### `setTeaser(mixed $value)`

Setzt den Wert für das Feld `teaser` (Teaser).

```php
$dataset = tier_entry::create();
$dataset->setTeaser($value);
$dataset->save();
```

### `getText(bool $asPlaintext = false)`

Gibt den Wert für das Feld `text` (Beschreibung) zurück:

Beispiel:

```php
$dataset = tier_entry::get($id);
$text = $dataset->getText(true);
```

### `setText(mixed $value)`

Setzt den Wert für das Feld `text` (Beschreibung).

```php
$dataset = tier_entry::create();
$dataset->setText($value);
$dataset->save();
```

### `getImage(bool $asMedia = false)`

Gibt den Wert für das Feld `image` (Bild) zurück: Hauptbild des Tiers

Beispiel:

```php
$dataset = tier_entry::get($id);
$media = $dataset->getImage(true);
```

### `setImage(string $filename)`

Setzt den Wert für das Feld `image` (Bild).

```php
$dataset = tier_entry::create();
$dataset->setImage($filename);
$dataset->save();
```

### `getImages(bool $asMedia = false)`

Gibt den Wert für das Feld `images` (Galerie) zurück: Weitere Bilder

Beispiel:

```php
$dataset = tier_entry::get($id);
$media = $dataset->getImages(true);
```

### `setImages(string $filenames)`

Setzt den Wert für das Feld `images` (Galerie).

```php
$dataset = tier_entry::create();
$dataset->setImages($filename);
$dataset->save();
```

### `getUrl()`

Gibt den Wert für das Feld `url` (URL) zurück: Link zu weiteren Informationen

Beispiel:

```php
$dataset = tier_entry::get($id);
echo $dataset->getUrl();
```

### `setUrl(mixed $value)`

Setzt den Wert für das Feld `url` (URL).

```php
$dataset = tier_entry::create();
$dataset->setUrl($value);
$dataset->save();
```

### `getCreateuser()`

Gibt folgenden Wert zurück: Erstellt von

Beispiel:

```php
$dataset = tier_entry::get($id);
$benutzer = $dataset->getCreateuser();
```

### `setCreateuser(mixed $value)`

Setzt den Wert für das Feld `createuser` (Erstellt von).

```php
$dataset = tier_entry::create();
$dataset->setCreateuser($value);
$dataset->save();
```

### `getCreatedate()`

Gibt den Wert für das Feld `createdate` (Erstellt am) zurück:

Beispiel:

```php
$dataset = tier_entry::get($id);
$datestamp = $dataset->getCreatedate();
```

### `setCreatedate(string $value)`

Setzt den Wert für das Feld `createdate` (Erstellt am).

```php
$dataset = tier_entry::create();
$dataset->setCreatedate($value);
$dataset->save();
```

### `getUpdateuser()`

Gibt folgenden Wert zurück: Zuletzt bearbeitet von

Beispiel:

```php
$dataset = tier_entry::get($id);
$benutzer = $dataset->getUpdateuser();
```

### `setUpdateuser(mixed $value)`

Setzt den Wert für das Feld `updateuser` (Zuletzt bearbeitet von).

```php
$dataset = tier_entry::create();
$dataset->setUpdateuser($value);
$dataset->save();
```

### `getUpdatedate()`

Gibt den Wert für das Feld `updatedate` (Zuletzt bearbeitet am) zurück:

Beispiel:

```php
$dataset = tier_entry::get($id);
$datestamp = $dataset->getUpdatedate();
```

### `setUpdatedate(string $value)`

Setzt den Wert für das Feld `updatedate` (Zuletzt bearbeitet am).

```php
$dataset = tier_entry::create();
$dataset->setUpdatedate($value);
$dataset->save();
```
