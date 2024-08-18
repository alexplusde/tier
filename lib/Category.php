<?php

namespace Alexplusde\Tier;

use rex_yform_manager_dataset;
use rex_user;

class Category extends rex_yform_manager_dataset
{

    public const STATUS = [
        '-1' => 'translate:tier_status_disabled',
        '1' => 'translate:tier_status_published',
    ];

    public static function getStatusOptions(): array
    {
        return self::STATUS;
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
            
    /* Status */
    /** @api */
    public function getStatus() : int {
        return $this->getValue("status");
    }
    /** @api */
    public function setStatus(int $param) : self {
        $this->setValue("status", $param);
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

}
