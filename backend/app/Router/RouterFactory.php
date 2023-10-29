<?php

declare(strict_types=1);

namespace App\Router;

use Nette;
use Nette\Application\Routers\RouteList;


final class RouterFactory
{
	use Nette\StaticClass;

    const NON_ALLOWED_PAGES_TITLES = [
        "prihlaseni", "registrace", "clanky"
    ];

	public static function createRouter(): RouteList
	{
		$router = new RouteList;
		$router->addRoute('/', 'Home:default')
            ->addRoute("/<page>", "")
            ->addRoute("/clanky/<article>")
            ->addRoute("/prihlaseni")
            ->addRoute("/prihlaseni/odhlasit-se")
            ->addRoute("/zapomenute-heslo")
            ->addRoute("/registrace")
        ;

        $router->withModule("admin")
            ->addRoute("/redaktorsky-panel", "Overview:home")

            ->addRoute("/redaktorsky-panel/nastaveni-webu", "Settings:Main:overview")

            ->addRoute("/redaktorsky-panel/nastaveni-webu/zalozky", "Settings:NavItem:list")
            ->addRoute("/redaktorsky-panel/nastaveni-webu/zalozky/vytvorit", "Settings:NavItem:new")
            ->addRoute("/redaktorsky-panel/nastaveni-webu/zalozky/zobrazit/<id>", "Settings:NavItem:view")
            ->addRoute("/redaktorsky-panel/nastaveni-webu/zalozky/odstranit/<id>", "Settings:NavItem:remove")

            ->addRoute("/redaktorsky-panel/nastaveni-webu/sidebar", "Settings:Sidebar:list")
            ->addRoute("/redaktorsky-panel/nastaveni-webu/sidebar/vytvorit", "Settings:Sidebar:new")
            ->addRoute("/redaktorsky-panel/nastaveni-webu/sidebar/zobrazit/<id>", "Settings:Sidebar:view")
            ->addRoute("/redaktorsky-panel/nastaveni-webu/sidebar/odstranit/<id>", "Settings:Sidebar:remove")

            ->addRoute("/redaktorsky-panel/stranky/vytvorit", "Page:new")
            ->addRoute("/redaktorsky-panel/stranky/zobrazit/<id>", "Page:view")
            ->addRoute("/redaktorsky-panel/stranky/odstranit/<id>", "Page:delete")
            ->addRoute("/redaktorsky-panel/stranky", "Page:list")

            ->addRoute("/redaktorsky-panel/clanky/vytvorit", "Article:new")
            ->addRoute("/redaktorsky-panel/clanky/zobrazit/<id>", "Article:view")
            ->addRoute("/redaktorsky-panel/clanky/odstranit/<id>", "Article:delete")
            ->addRoute("/redaktorsky-panel/clanky[/<page>]", "Article:list")

            ->addRoute("/redaktorsky-panel/clanky/zobrazit/<id>/komentare", "ArticleComments:listByArticle")
            ->addRoute("/redaktorsky-panel/clanky/zobrazit/<id>/komentare/zobrazit/<id>", "ArticleComments:viewComment")
            ->addRoute("/redaktorsky-panel/clanky/zobrazit/<id>/komentare/odstranit/<id>", "ArticleComments:removeComment")

            ->addRoute("/redaktorsky-panel/tagy/vytvorit", "Tag:new")
            ->addRoute("/redaktorsky-panel/tagy/zobrazit/<id>", "Tag:view")
            ->addRoute("/redaktorsky-panel/tagy/odstranit/<id>", "Tag:delete")
            ->addRoute("/redaktorsky-panel/tagy", "Tag:list")

            ->addRoute("/redaktorsky-panel/repertoar-cviku/svaly", "ExerciseInventory:Muscle:list")
            ->addRoute("/redaktorsky-panel/repertoar-cviku/svaly/vytvorit", "ExerciseInventory:Muscle:new")
            ->addRoute("/redaktorsky-panel/repertoar-cviku/svaly/odstranit/<id>", "ExerciseInventory:Muscle:remove")
            ->addRoute("/redaktorsky-panel/repertoar-cviku/svaly/<id>", "ExerciseInventory:Muscle:view")

            ->addRoute("/redaktorsky-panel/repertoar-cviku", "ExerciseInventory:Exercise:list")
            ->addRoute("/redaktorsky-panel/repertoar-cviku/pridat/<id>", "ExerciseInventory:Exercise:new")
            ->addRoute("/redaktorsky-panel/repertoar-cviku/zobrazit/<id>", "ExerciseInventory:Exercise:view")
            ->addRoute("/redaktorsky-panel/repertoar-cviku/odstranit/<id>", "ExerciseInventory:Exercise:remove")

            ->addRoute("/redaktorsky-panel/uzivatele", "User:list")
            ->addRoute("/redaktorsky-panel/uzivatele/<id>", "User:id")
            ->addRoute("/redaktorsky-panel/uzivatele/redaktori", "UserRedactor:list")
            ->addRoute("/redaktorsky-panel/uzivatele/redaktori/pristupy", "UserRedactor:accessLog")
        ;
		return $router;
	}
}
