<?php

namespace Poppy\Utils;

class ACF
{
    /**
     * @param $prefix
     * @param $fields
     * @return array
     */
    public static function slug_handler($prefix, $fields)
    {

        $acf_fields = [];
        foreach ($fields as $field) {
            $new_field = [
                'key'  => "{$prefix}/{$field['slug']}",
                'name' => $field['slug'],
            ];

            if (array_key_exists('sub_fields', $field)) {
                $new_field['sub_fields'] = self::slug_handler($prefix, $field['sub_fields']);
            }


            if (array_key_exists('conditional_logic', $field)) {
                $new_field['conditional_logic'] = self::conditional_logic_keys($prefix, $field['conditional_logic']);
            }

            $acf_fields[] = array_merge($field, $new_field);
        }

        return $acf_fields;
    }

    public static function conditional_logic_keys($prefix, $condition_group)
    {
        $new_condition_group = [];

        foreach ($condition_group as $condition_set) {
            $new_set = [];

            foreach ($condition_set as $condition) {
                $adjusted_condition = [];

                if (General::has_key('field', $condition)) {
                    $adjusted_condition = array_merge($condition, [
                        'field' => "{$prefix}/{$condition['field']}",
                    ]);
                }

                $new_set[] = $adjusted_condition;
            }

            $new_condition_group[] = $new_set;
        }

        return $new_condition_group;
    }
}