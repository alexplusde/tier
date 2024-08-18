<?php

namespace Alexplusde\Tier;

use rex_media;
use rex_user;
use rex_yform_manager_dataset;

class Entry extends rex_yform_manager_dataset
{

    public const STATUS = [
        '-1' => 'translate:tier_status_disabled',
        '0' => 'translate:tier_status_draft',
        '1' => 'translate:tier_status_published',
        '2' => 'translate:tier_status_adopted',
    ];

    public static function getStatusOptions(): array
    {
        return self::STATUS;
    }

    
    /* Kategorie */
    /** @api */
    public function getCategoryId() : ?rex_yform_manager_dataset {
        return $this->getRelatedDataset("category_id");
    }

    /* Name */
    /** @api */
    public function getName() : ?string {
        return $this->getValue("name");
    }
    /** @api */
    public function setName(mixed $value) : self {
        $this->setValue("name", $value);
        return $this;
    }

    /* Status */
    /** @api */
    public function getStatus() : mixed {
        return $this->getValue("status");
    }
    /** @api */
    public function setStatus(int $status) : mixed {
        $this->setValue("status", $status);
        return $this;
    }

    /* Teaser */
    /** @api */
    public function getTeaser(bool $asPlaintext = false) : ?string {
        if($asPlaintext) {
            return strip_tags($this->getValue("teaser"));
        }
        return $this->getValue("teaser");
    }
    /** @api */
    public function setTeaser(mixed $value) : self {
        $this->setValue("teaser", $value);
        return $this;
    }
            
    /* Beschreibung */
    /** @api */
    public function getText(bool $asPlaintext = false) : ?string {
        if($asPlaintext) {
            return strip_tags($this->getValue("text"));
        }
        return $this->getValue("text");
    }
    /** @api */
    public function setText(mixed $value) : self {
        $this->setValue("text", $value);
        return $this;
    }
            
    /* Bild */
    /** @api */
    public function getImage(bool $asMedia = false) : mixed {
        if($asMedia) {
            return rex_media::get($this->getValue("image"));
        }
        return $this->getValue("image");
    }
    /** @api */
    public function setImage(string $filename) : self {
        if(rex_media::get($filename)) {
            $this->setValue("image", $filename);
        }
        return $this;
    }
            
    /* Galerie */
    /** @api */
    public function getImages(bool $asMedia = false) : mixed {
        $media = explode(",", $this->getValue("images"));
        if($asMedia) {
            foreach($media as $key => $value) {
                $return[$key] = rex_media::get($value);
            }
            return $return;
        }
        return $media;
    }
    /** @api */
    public function setImages(string $filenames) : self {
        $this->setValue("images", $filenames);
        return $this;
    }
            
    /* URL */
    /** @api */
    public function getUrl() : ?string {
        return $this->getValue("url");
    }
    /** @api */
    public function setUrl(mixed $value) : self {
        $this->setValue("url", $value);
        return $this;
    }

    /* Erstellt von */
    /** @api */
    public function getCreateUser() : ?rex_user {
        return rex_user::get($this->getValue("createuser"));
    }
    /** @api */
    public function setCreateUser(mixed $value) : self {
        $this->setValue("createuser", $value);
        return $this;
    }

    /* Erstellt am */
    /** @api */
    public function getCreateDate() : ?string {
        return $this->getValue("createdate");
    }
    /** @api */
    public function setCreateDate(string $value) : self {
        $this->setValue("createdate", $value);
        return $this;
    }

    /* Zuletzt bearbeitet von */
    /** @api */
    public function getUpdateUser() : ?rex_user {
        return rex_user::get($this->getValue("updateuser"));
    }
    /** @api */
    public function setUpdateUser(mixed $value) : self {
        $this->setValue("updateuser", $value);
        return $this;
    }

    /* Zuletzt bearbeitet am */
    /** @api */
    public function getUpdateDate() : ?string {
        return $this->getValue("updatedate");
    }
    /** @api */
    public function setUpdateDate(string $value) : self {
        $this->setValue("updatedate", $value);
        return $this;
    }

}
?>
