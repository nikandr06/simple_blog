<?php

namespace Dmitxe\SiteBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class SiteMenu extends ContainerAware
{
    public function main(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('site_main');

        if (isset($options['class'])) {
            $menu->setChildrenAttribute('class', $options['class']);
        } else {
            $menu->setChildrenAttribute('class', 'nav');
        }

        $menu->addChild('Homepage',     ['route' => 'dmitxe_site_index']);
        $title = 'Blog';
        if (true === $this->container->get('security.context')->isGranted('ROLE_BLOGGER'))
        {
           $menu->addChild($title,         array('route' => 'smart_blog_index', 'attributes' => array('class' => 'dropdown')));
           $menu[$title]->addChild(NULL, array('attributes' => array('class' => 'divider')));
           $menu[$title]->setLinkAttributes(array('class' => 'dropdown-toggle', 'data-toggle' => 'dropdown', 'role'=>'button', 'id'=>'mmi_finance'));
//        $menu[$title]->setLabel($title. ' <b class="caret"></b>')->setExtra('safe_label', TRUE);
            $menu[$title]->setLabel($title, TRUE);
            $menu[$title]->setChildrenAttributes(array('class' => 'dropdown-menu','role'=>'menu', 'aria-labelledby'=>'mmi_finance'));
            $menu[$title]->addChild('Все записи', array('route' => 'smart_blog_index'));
            $menu[$title]->addChild('Новая запись', array('route' => 'smart_blog_article_new'));
        }
        else
        {
            $menu->addChild($title,        ['route' => 'smart_blog_index']);
        }
        $menu->addChild('Forum',        ['uri'   => 'http://forum.timedev.net/']);

        return $menu;
    }
}
