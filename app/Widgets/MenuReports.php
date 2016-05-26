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


class MenuReports extends Widget
{


	public function handle()
	{

dd('MenuReports');

		$activeTheme = Theme::getActive();

// 		Menu::handler('reports')->hydrate(function()
// 			{
//
// 			$main_menu_id = LMenu::where('name', '=', 'reports')->pluck('id');
// //			return Menulink::where('menu_id', '=', $main_menu_id)->orderBy('position')->get();
// 			return Menulink::where('menu_id', '=', $main_menu_id)->IsEnabled()->orderBy('position')->get();
//
// 			},
// 			function($children, $item)
// 			{
// 				$children->add($item->translate(App::getLocale())->url, $item->translate(App::getLocale())->title, Menu::items($item->as));
// 			});
//
// 		return Theme::View($activeTheme . '::' . 'widgets.menu_reports');
// 	}


		$menus = Cache::get('widget_reports', null);
// $menus = null;
// Cache::forget('widget_reports');

		if ($menus == null) {
			$menus = Cache::rememberForever('widget_reports', function() {
				$main_menu_id = LMenu::where('name', '=', 'reports')->pluck('id');
//				return Menulink::where('menu_id', '=', $main_menu_id)->orderBy('position')->get();
				return Menulink::where('menu_id', '=', $main_menu_id)->IsEnabled()->orderBy('position')->get();
			});
		}

		if (count($menus)) {
		Menu::handler('widget_reports')->hydrate(function()
			{
			$menus = Cache::get('widget_reports');
			return $menus;
			},

			function($children, $item)
			{
				$children->add($item->translate(App::getLocale())->url, $item->translate(App::getLocale())->title, Menu::items($item->as));
			});

		return Theme::View($activeTheme . '::' . 'widgets.menu_reports');
		}


	}
}
