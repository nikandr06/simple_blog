<?php

namespace SimpleBlog\SiteBundle\Menu;

use Knp\Menu\FactoryInterface;

class SiteMenu
{
    public function main(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('site_main');

        if (isset($options['class'])) {
            $menu->setChildrenAttribute('class', $options['class']);
        } else {
            $menu->setChildrenAttribute('class', 'nav');
        }

        $menu->addChild('Homepage',     ['route' => 'simpleblog_site_index']);
        $menu->addChild('Blog',         ['route' => 'smart_blog_index']);
        $menu->addChild('Forum',        ['uri'   => 'http://forum.timedev.net/']);

        return $menu;
    }
}
