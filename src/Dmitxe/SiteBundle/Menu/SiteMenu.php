<?php

namespace Dmitxe\SiteBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class SiteMenu extends ContainerAware
{
    /**
     * @param FactoryInterface $factory
     * @param array $options
     * @return \Knp\Menu\ItemInterface
     */
    public function main(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('site_main');

        if (isset($options['class'])) {
            $menu->setChildrenAttribute('class', $options['class']);
        } else {
            $menu->setChildrenAttribute('class', 'nav');
        }

        $menu->addChild('Homepage', ['route' => 'dmitxe_site_index']);
        $menu->addChild('Blog', ['route' => 'smart_blog_index']);
        if (true === $this->container->get('security.context')->isGranted('ROLE_BLOGGER')) {
            $menu->addChild('Create Article', ['route' => 'smart_blog_article_new']);
        }

        return $menu;
    }
}
