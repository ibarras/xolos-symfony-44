<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', TextType::class, [
                'label' => 'Nombre',
                'attr' => [
                    'required' => true,
                    'placeholder' => 'Escribe tu nombre'
                ]
            ])
            ->add('telefono', NumberType::class, [
                'label' => 'Teléfono',
                'invalid_message' => 'El valor ingresado no es valido',
                'attr' => [
                    'required' => true,
                    'placeholder' => 'Número de teléfono'
                ]
            ])
            ->add('correo', TextType::class, [
                'label' => 'Correo Electrónico',
                'attr' => [
                    'required' => true,
                    'placeholder' => 'Correo electrónico'
                ]
            ])
            ->add('asunto', TextType::class, [
                'label' => 'Asunto',
                'attr' => [
                    'required' => true,
                    'placeholder' => 'Motivo del correo'
                ]
            ])
            ->add('mensaje', TextareaType::class, [
                'label' => 'Mensaje',
                'attr' => [
                    'required' => true,
                    'rows' => 15,
                    'placeholder' => 'Escribe tu mensaje'
                ]
            ])
            ->add('send', SubmitType::class, [
                'label' => 'Enviar'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $collectionConstraint = new Collection([
            'nombre' => [
                new NotBlank(['message' => 'El nombre no puede estar vacío']),
                new Length([
                    'min' => 3,
                    'minMessage' => 'Este valor es demasiado corto. Debe tener 3 caracteres o más.'
                ])
            ],
            'telefono' => [
                new NotBlank(['message' => 'El teléfono no puede estar vacío']),
                new Length([
                    'min' => 10,
                    'minMessage' => 'El numero es muy corto el minimo de caracteres es 10'
                ])
            ],
            'correo' => [
                new NotBlank(['message' => 'El correo no puede estar vacío']),
                new Email(['message' => 'Correo invalído'])
            ],
            'asunto' => [
                new NotBlank(['message' => 'El asunto no puede estar vacío']),
                new Length([
                    'min' => 3,
                    'minMessage' => 'Este valor es demasiado corto. Debe tener 3 caracteres o más.'
                ])
            ],
            'mensaje' => [
                new NotBlank(['message' => 'El mensaje no puede estar vacío']),
                new Length([
                    'min' => 5,
                    'minMessage' => 'Este valor es demasiado corto. Debe tener 5 caracteres o más.'
                ])
            ],
        ]);

        $resolver->setDefaults([
            // Configure your form options here
            'constraints' => $collectionConstraint
        ]);
    }
}
