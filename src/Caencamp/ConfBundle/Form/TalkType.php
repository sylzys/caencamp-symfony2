<?php

namespace Caencamp\ConfBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TalkType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', "text", array("label" => "Titre de la conférence"))
            ->add('date', 'date', array(
            'data' => new \DateTime("now"),
            'widget' => 'single_text',
            'input' => 'datetime',
            'format' => 'yyyy-MM-dd',
            'empty_value' => array('year' => 'Année', 'month' => 'Mois', 'day' => 'Jour'),
            'pattern' => "{{ day }}/{{ month }}/{{ year }}",
            ))
            ->add('speaker', new SpeakerType())
            ->add('save', 'submit', array("label" => "Enregistrer", 'attr' => array('class' => 'btn btn-primary')));
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Caencamp\ConfBundle\Entity\Talk'
        ));
    }

    public function getName()
    {
        return 'caencamp_confbundle_talktype';
    }
}
