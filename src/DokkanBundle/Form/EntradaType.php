<?php

namespace DokkanBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class EntradaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('titol', TextType::class,array(
				"label" => "Títol:",
				"attr" =>array("class" => "form-control")
			))
            ->add('contingut', TextareaType::class,array(
				"label" => "Contingut:",
				"attr" =>array("class" => "form-control")
			))
            ->add('categoria', EntityType::class,array(
				"class" => "DokkanBundle:Categoria",
				"label" => "Categoria:",
				"attr" =>array("class" => "form-control")
			))
//            ->add('user', TextType::class,array(
//				"label" => "Titulo",
//				"class" => "form-control"
//			))
            ->add('Guardar', SubmitType::class, array("attr" =>array(
				"class" => "form-submit btn btn-success",
			)))
        ;   
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DokkanBundle\Entity\Entrada'
        ));
    }
}
