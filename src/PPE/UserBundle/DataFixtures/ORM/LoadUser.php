<?php
namespace PPE\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUser extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @property  ContainerInterface
     */
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
    public function load(ObjectManager $manager)
    {
        $manager = $this->container->get('fos_user.user_manager');

            $user = $manager->createUser();
            $user->setUsername('admin5');
            $user->setPlainPassword('admin1234');
            $user->setRoles(array('ROLE_ADMIN'));
            $user->setGender($this->getReference('Mr'));
            $user->setAge(20);
            $user->setFirstName('malick');
            $user->setLastName('malick');
            $user->setPhone('0666666666');
            $user->setEmail('mizzouzi@efficom-lille.com');
            $user->setEnabled(true);

            $manager->updateUser($user, true);

    }
    public function getOrder()
    {
        return 6;
    }
}
?>