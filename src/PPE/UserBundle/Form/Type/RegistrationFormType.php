<?php

/*
 * IZZOUZI Malick
 *20/12/2017
 * Class RegistrationFormType
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PPE\UserBundle\Form\Type;

use FOS\UserBundle\Form\Type\RegistrationFormType as Register;
use PPE\UserBundle\Form\AddressType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;


class RegistrationFormType extends Register
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {       $builder
                ->add('firstName', TextType::class, array(
                    'label' => 'Prénom'))
            ->add('lastName', TextType::class, array(
                'label' => 'Nom'))
            ->add('phone', TextType::class, array(
                'label' => 'Numéro de téléphone'))
            ->add('age', IntegerType::class, array(
                'label' => 'Âge'))
            ->add('gender', EntityType::class, array(
                'class' => 'PPEUserBundle:Gender',
                'choice_label' => 'name',
                'label' => 'Civilité',
                'multiple' => false,
                'expanded' => false
            ));


    }

    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);
        $resolver->setDefaults(array(
            'data_class' => 'PPE\UserBundle\Entity\User',
        ));
    }


    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getBlockPrefix()
    {
        return 'ppe_user_registration';
    }

    public function getName()
    {
        return $this->getBlockPrefix();
    }

}
