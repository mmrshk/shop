<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 19.12.2017
 * Time: 19:28
 */

namespace App\Menu;

use Knp\Menu\FactoryInterface;

class MenuBuilder
{
    private $factory;

    /**
     * @param FactoryInterface $factory
     *
     * Add any other dependency you need
     */
    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function createMainMenu(array $options)
    {
        $menu = $this->factory->createItem('root');

        $menu->addChild('Главная', array('route' => 'about_show'));
        // ... add more children

        return $menu;
    }
}