<?php
    
namespace translator\functions;

function menu_translate($fieldKey)
{
    return generic_translate('menu', $fieldKey);
}


function title_translate($fieldKey)
{
    return generic_translate('title', $fieldKey);
}


function generic_translate($fieldType, $fieldKey)
{
    global $wpdb;
    
    $response = $wpdb->get_row($wpdb->prepare("SELECT * FROM " . TRANSLATOR_TABLE_TRAN_MAP . " WHERE field_type = %s AND field_key = %s",  $fieldType, $fieldKey ));

    if(!$response) return $fieldKey;

    return $response->field_value;
}