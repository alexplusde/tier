<?php

/* Tablesets aktualisieren */
$addon = rex_addon::get('tier');

rex_sql_table::get(rex::getTable('tier_entry'))
    ->ensurePrimaryIdColumn()
    ->ensureColumn(new rex_sql_column('category_id', 'int(10) unsigned'))
    ->ensureColumn(new rex_sql_column('name', 'varchar(191)', false, ''))
    ->ensureColumn(new rex_sql_column('status', 'int(11)'))
    ->ensureColumn(new rex_sql_column('teaser', 'text'))
    ->ensureColumn(new rex_sql_column('text', 'text'))
    ->ensureColumn(new rex_sql_column('image', 'text'))
    ->ensureColumn(new rex_sql_column('images', 'text'))
    ->ensureColumn(new rex_sql_column('url', 'varchar(191)', false, ''))
    ->ensureColumn(new rex_sql_column('createuser', 'varchar(191)'))
    ->ensureColumn(new rex_sql_column('createdate', 'datetime'))
    ->ensureColumn(new rex_sql_column('updateuser', 'varchar(191)'))
    ->ensureColumn(new rex_sql_column('updatedate', 'datetime'))
    ->ensureIndex(new rex_sql_index('category_id', ['category_id']))
    ->ensureIndex(new rex_sql_index('status', ['status']))
    ->ensure();

rex_sql_table::get(rex::getTable('tier_category'))
    ->ensurePrimaryIdColumn()
    ->ensureColumn(new rex_sql_column('name', 'varchar(191)', false, ''))
    ->ensureColumn(new rex_sql_column('teaser', 'text'))
    ->ensureColumn(new rex_sql_column('status', 'int(11)'))
    ->ensureColumn(new rex_sql_column('createdate', 'datetime'))
    ->ensureColumn(new rex_sql_column('createuser', 'varchar(191)'))
    ->ensureColumn(new rex_sql_column('updatedate', 'datetime'))
    ->ensureColumn(new rex_sql_column('updateuser', 'varchar(191)'))
    ->ensureIndex(new rex_sql_index('status', ['status']))
    ->ensure();

if (rex_addon::get('yform')->isAvailable() && !rex::isSafeMode()) {
    rex_yform_manager_table_api::importTablesets(rex_file::get(__DIR__ . '/install/rex_tier_entry.tableset.json'));
    rex_yform_manager_table_api::importTablesets(rex_file::get(__DIR__ . '/install/rex_tier_category.tableset.json'));
    rex_yform_manager_table::deleteCache();
}


/* URL-Profile installieren */
if (rex_addon::get('url') && rex_addon::get('url')->isAvailable()) {
    if (false === rex_config::get('tier', 'url_profile', false)) {
        
        $rex_tier_category = array_filter(rex_sql::factory()->getArray("SELECT * FROM rex_url_generator_profile WHERE `table_name` = '1_xxx_rex_tier_category'"));
        if (!$rex_tier_category) {
            $query = str_replace('999999', rex_article::getSiteStartArticleId(), rex_file::get(__DIR__ . '/install/rex_url_profile_tier_category.sql'));
            rex_sql::factory()->setQuery($query);
        }

        rex_dir::deleteFiles(rex_path::addonCache('url'), true);

        $rex_tier_entry = array_filter(rex_sql::factory()->getArray("SELECT * FROM rex_url_generator_profile WHERE `table_name` = '1_xxx_rex_tier_entry'"));
        if (!$rex_tier_entry) {
            $query = str_replace('999999', rex_article::getSiteStartArticleId(), rex_file::get(__DIR__ . '/install/rex_url_profile_tier_entry.sql'));
            rex_sql::factory()->setQuery($query);
        }
        
        rex_dir::deleteFiles(rex_path::addonCache('url'), true);

        /* URL-Profile wurden bereits einmal installiert, daher nicht nochmals installieren und Entwickler-Einstellungen respektieren */
        rex_config::set('tier', 'url_profile', true);
    }
}
