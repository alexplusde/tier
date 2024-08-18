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
