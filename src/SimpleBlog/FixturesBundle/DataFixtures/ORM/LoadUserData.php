<?php

namespace SimpleBlog\FixturesBundle\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAware;
use SimpleBlog\UserBundle\Entity\User;
use SimpleBlog\UserBundle\Entity\Group;

class LoadUserData extends ContainerAware implements FixtureInterface, OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $encoder = $this->container->get('security.encoder_factory')->getEncoder(new User());

        $group_team = new Group('team', ['ROLE_TEAM']);
        $manager->persist($group_team);

        $group_admin = new Group('admin', ['ROLE_ADMIN']);
        $manager->persist($group_admin);

        $user = new User();
        $user->setUsername('root')
            ->setPassword($encoder->encodePassword('123', $user->getSalt()))
            ->setEmail('root@mail.ru')
            ->setEnabled(true) // @todo убрать на продакшине.
            ->addGroup($group_admin);
        $manager->persist($user);

        $user = new User();
        $user->setUsername('digi')
            ->setPassword($encoder->encodePassword('123', $user->getSalt()))
            ->setEmail('digi@mail.ru')
            ->setEnabled(true) // @todo убрать на продакшине.
            ->addGroup($group_team);
        $manager->persist($user);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1;
    }
}
