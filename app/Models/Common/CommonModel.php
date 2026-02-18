<?php

namespace App\Models\Common;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class CommonModel extends Model
{

    public static function getDataByOneCondition($table, $select, $column, $value)
    {
       
        return DB::table($table)
            ->select($select)
            ->where($column, $value)
            ->first();
    }

    public static function getAllRowData($table, $select, $where = [], $orderBy = '')
    {
        $query = DB::table($table)->select($select);

        if (!empty($where)) {
            foreach ($where as $key => $val) {
                $query->where($key, $val);
            }
        }

        if (!empty($orderBy)) {
            $parts = explode(' ', $orderBy);
            $column = $parts[0];
            $direction = $parts[1] ?? 'desc';
            $query->orderBy($column, $direction);
        }
        

        return $query->get();
    }

    public static function insertData($table, $data)
    {
        return DB::table($table)->insertGetId($data);
    }

    public static function updateData($table, $where, $data)
    {
        $query = DB::table($table);

        foreach ($where as $key => $val) {
            $query->where($key, $val);
        }

        return $query->update($data);
    }

    public static function deleteData($table, $where)
    {
        $query = DB::table($table);

        foreach ($where as $key => $val) {
            $query->where($key, $val);
        }

        return $query->update(['status' => 2]);
    }

    public static function getAllRowByUsingCityStateCountry($country_id, $state_id, $city_id)
    {
        return DB::table('users')
            ->join('cities', 'users.city', '=', 'cities.id')
            ->join('states', 'users.state', '=', 'states.id')
            ->join('countries', 'users.country', '=', 'countries.id')
            ->select(
                'cities.cities_name as cities_name',
                'states.state_name as state_name',
                'countries.country_name as country_name'
            )
            ->where('users.city', $city_id)
            ->where('users.state', $state_id)
            ->where('users.country', $country_id)
            ->get();
    }
}
