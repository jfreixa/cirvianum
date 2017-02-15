<?php

namespace DataFixtures\ORM;


use AppBundle\Entity\Role;
use AppBundle\Entity\User;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUserData implements FixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        for ($i=1; $i<=10; $i++) {
            $user = new User();
            $encoder = $this->container->get('security.encoder_factory')
                ->getEncoder($user);
            $plainPassword = 'user'.$i;
            $password = $encoder->encodePassword($plainPassword, null);
            $user->setPassword($password);
            $user->setEmail('user'.$i.'@test.com');
            $user->setName('user'.$i);
            $manager->persist($user);
        }

        $manager->flush();
    }
}