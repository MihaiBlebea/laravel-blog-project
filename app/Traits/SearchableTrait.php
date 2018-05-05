<?php

namespace App\Traits;

trait SearchableTrait
{
    public static function search(String $search_term)
    {
        if(!isset(self::$search_fileds))
        {
            throw new \Exception("This model is not Searchable. Please add 'private static \$search_fileds = []' as private", 1);
        }

        $search_fileds = self::$search_fileds;
        return self::where(function($query) use ($search_fileds, $search_term) {
            foreach(self::$search_fileds as $index => $search_filed)
            {
                if($index == 0)
                {
                    $query->where(strtolower($search_filed), 'LIKE', '%' . strtolower($search_term) . '%');
                } else {
                    $query->orWhere(strtolower($search_filed), 'LIKE', '%' . strtolower($search_term) . '%');
                }
            }
        })->get();
    }
}
