<?php

namespace DokkanBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UsuariType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
             ->add('nom',TextType::class, array("label"=>"Nom","required"=>"required", "attr" =>array(
				"class" => "form-name form-control",
			)))
            ->add('email',EmailType::class, array("label"=>"Email","required"=>"required", "attr" =>array(
				"class" => "form-email form-control",
			)))
            ->add('password',PasswordType::class, array("label"=>"Password","required"=>"required", "attr" =>array(
				"class" => "form-password form-control",
			)))
            ->add('Guardar', SubmitType::class, array("attr" =>array(
				"class" => "form-submit btn btn-success",
			)))
        ;
    }
}