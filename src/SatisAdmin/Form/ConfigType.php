<?php

namespace SatisAdmin\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * @author Yohan Giarelli <yohan@frequence-web.fr>
 */
class ConfigType extends AbstractType
{
    /**
     * {@inheritDoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('homepage')
            ->add('requireAll', 'checkbox', ['required' => false])
            ->add(
                'repositories',
                'collection',
                [
                    'allow_add'    => true,
                    'allow_delete' => true,
                    'type'         => new RepositoryType,
                ]
            );
    }

    /**
     * {@inheritDoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(['data_class' => 'SatisAdmin\Model\Config']);
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'config';
    }
}
