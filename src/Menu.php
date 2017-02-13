<?php

namespace Luba;

use URL;

class Menu
{
	protected $items = [];

	protected $menuclass = "menu";

	public function __construct(array $items = [])
	{
		$this->items = $items;
	}

	public function menuClass($name)
	{
		$this->menuclass = $name;
	}

	public function __toString()
	{
		$menu = "<ul class=\"{$this->menuclass}\">";

		foreach ($this->items as $url => $name)
		{
			if (url($url) == URL::withoutParams())
				$active = "class=\"active\"";
			else
				$active = "";

			$menu .= "<li><a href=\"" . url($url) . "\" $active>$name</a></li>";
		}

		$menu .= "</ul>";

		return $menu;
	}
}