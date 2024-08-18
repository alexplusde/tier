<?php

rex_config::removeNamespace("tier");

// YForm-Tabellen löschen (die YForm-Tabellendefinition wird gelöscht, nicht die Datenbank-Tabellen)
if (rex_addon::get('yform')->isAvailable() && !rex::isSafeMode()) {
    rex_yform_manager_table_api::removeTable('rex_tier_entry');
    rex_yform_manager_table_api::removeTable('rex_tier_category');
}
