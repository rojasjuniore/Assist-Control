<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'menu', 'ruta', 'padre', 'nivel','icono'
    ];


    public function getChildren($data, $line)
    {
        $children = [];
        foreach ($data as $line1) {
            if ($line['id'] == $line1['padre']) {
                $children = array_merge($children, [ array_merge($line1, ['submenu' => $this->getChildren($data, $line1) ]) ]);
            }
        }
        return $children;
    }

    public static function menus()
    {
        $menus = new Menu();
        $data = Menu::all()->sortBy('nivel')->toArray();

        if(!empty($data)) {
            $menuAll = [];
            foreach ($data as $line) {

                $item = [array_merge($line, ['submenu' => $menus->getChildren($data, $line)])];
                $menuAll = array_merge($menuAll, $item);
            }
            return $menus->menuAll = $menuAll;
        }
    }
}
