<?php

namespace App\Widgets;

use Caffeinated\Widgets\Widget;

use App\Modules\Menus\Http\Models\Menu as LMenu;
use App\Modules\Menus\Http\Models\Menulink;

use App;
use Cache;
use Config;
//use DB;
use Menu;
use Session;
use Theme;


class MenuOther extends Widget
{


	public function handle()
	{

dd('MenuOther');

		$activeTheme = Theme::getActive();

// 		Menu::handler('other')->hydrate(function()
// 			{
//
// 			$main_menu_id = LMenu::where('name', '=', 'other')->pluck('id');
// //			return Menulink::where('menu_id', '=', $main_menu_id)->orderBy('position')->get();
// 			return Menulink::where('menu_id', '=', $main_menu_id)->IsEnabled()->orderBy('position')->get();
//
// 			},
// 			function($children, $item)
// 			{
// 				$children->add($item->translate(App::getLocale())->url, $item->translate(App::getLocale())->title, Menu::items($item->as));
// 			});
//
// 		return Theme::View($activeTheme . '::' . 'widgets.menu_other');
// 	}



		$menus = Cache::get('widget_other', null);

		if ($menus == null) {
			$menus = Cache::rememberForever('widget_other', function() {
				$main_menu_id = LMenu::where('name', '=', 'other')->pluck('id');
//				return Menulink::where('menu_id', '=', $main_menu_id)->orderBy('position')->get();
				return Menulink::where('menu_id', '=', $main_menu_id)->IsEnabled()->orderBy('position')->get();
			});
		}

		if (count($menus)) {
		Menu::handler('widget_other')->hydrate(function()
			{
			$menus = Cache::get('widget_other');
			return $menus;
			},

			function($children, $item)
			{
				$children->add($item->translate(App::getLocale())->url, $item->translate(App::getLocale())->title, Menu::items($item->as));
			});

		return Theme::View($activeTheme . '::' . 'widgets.menu_other');
		}


	}
}
