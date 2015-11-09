<?php

namespace Learn\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * Description of User
 *
 * @author frwartel
 */

/**
 * @ORM\Entity
 * @ORM\Table(name="learn_user")
 */
class User extends BaseUser {
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
       
    }
}
