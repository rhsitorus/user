<?php

namespace Rofil\Admin\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', null, [
                'attr'  => [ 'class' => 'form-control', 'placeholder' => 'Masukan data username' ],
                'label' => '',
            ])
            ->add('password', null, [
                'attr'  => [ 'class' => 'form-control', 'placeholder' => 'Masukan data password' ],
                'label' => '',
            ])
            ->add('role', 'choice', [
                'attr'  => [ 'class' => 'form-control', 'placeholder' => 'Masukan data role' ],
                'label' => '', 'choices' => [ 'ROLE_ADMIN'=>'ROLE ADMIN', 'ROLE_MANAGER' => 'MANAGER', 'ROLE_USER' => 'USER' ]
            ])
            ->add('actived', 'choice', [
                'attr'  => [ 'class' => 'form-control', 'placeholder' => 'Masukan data actived' ],
                'label' => '', 'choices' => [ '1' => 'Active', 0 => 'Non Active', 2 => 'Banned' ]
            ])
            
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Rofil\Admin\UserBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'rofil_admin_userbundle_user';
    }
}
