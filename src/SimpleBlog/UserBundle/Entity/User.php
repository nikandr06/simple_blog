<?php

namespace SimpleBlog\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Assert\Email(
     *     message = "Данный email '{{ value }}' не корректен",
     *     checkMX = true,
     *     checkHost = true
     * )
     */
    protected $email;

    /**
     * @ORM\ManyToMany(targetEntity="Group")
     * @ORM\JoinTable(name="users_group_relations",
     *      joinColumns={@ORM\JoinColumn(name="user_id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="group_id")}
     * )
     */
    protected $groups;

    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}
