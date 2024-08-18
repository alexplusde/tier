<?php

/* Tablesets aktualisieren */
$addon = rex_addon::get('tier');

if (rex_addon::get('yform')->isAvailable() && !rex::isSafeMode()) {
    rex_yform_manager_table_api::importTablesets(rex_file::get(__DIR__ . '/install/rex_tier_entry.tableset.json'));
    rex_yform_manager_table_api::importTablesets(rex_file::get(__DIR__ . '/install/rex_tier_category.tableset.json'));
    rex_yform_manager_table::deleteCache();
}
