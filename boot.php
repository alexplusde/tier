<?php

namespace Alexplusde\Tier;

use rex;
use rex_addon;
use rex_csrf_token;
use rex_url;
use rex_yform_manager_dataset;
use rex_yform_manager_table;

if (rex_addon::get('yform')->isAvailable() && !rex::isSafeMode()) {
    rex_yform_manager_dataset::setModelClass(
        'rex_tier_entry',
        Entry::class
    );
    rex_yform_manager_dataset::setModelClass(
        'rex_tier_entry',
        Category::class
    );
}

if (rex::isBackend() && \rex_addon::get('tier') && \rex_addon::get('tier')->isAvailable() && !rex::isSafeMode()) {
    $addon = rex_addon::get('tier');
    $page = $addon->getProperty('page');

    if (rex::isBackend() && !empty($_REQUEST)) {
        $_csrf_key = rex_yform_manager_table::get('rex_tier_entry')->getCSRFKey();

        $token = rex_csrf_token::factory($_csrf_key)->getUrlParams();

        $params = [];
        $params['table_name'] = 'rex_tier_entry'; 
        $params['rex_yform_manager_popup'] = '0';
        $params['_csrf_token'] = $token['_csrf_token'];
        $params['func'] = 'add';

        $href = rex_url::backendPage('tier/entry', $params);

        $page['title'] .= ' <a class="label label-primary tex-primary" style="position: absolute; right: 18px; top: 10px; padding: 0.2em 0.6em 0.3em; border-radius: 3px; color: white; display: inline; width: auto;" href="' . $href . '">+</a>';
        $addon->setProperty('page', $page);
    }
}
