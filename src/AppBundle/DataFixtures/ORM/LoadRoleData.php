<?php

namespace DataFixtures\ORM;


use AppBundle\Entity\Role;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadRoleData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $roles_data = [
            ['label' => 'Usuari', 'role' => 'ROLE_USER'],
            ['label' => 'Professor', 'role' => 'ROLE_TEACHER'],
            ['label' => 'Administrador', 'role' => 'ROLE_ADMIN'],
        ];

        foreach ($roles_data as $role_data) {
            $role =  new Role();
            $role
                ->setLabel($role_data['label'])
                ->setRole($role_data['role']);
            $manager->persist($role);
        }

        $manager->flush();
    }
}