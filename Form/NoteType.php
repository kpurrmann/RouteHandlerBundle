<?php
declare(strict_types=1);

namespace PurrmannWebsolutions\RouteNoteBundle\Form;

use PurrmannWebsolutions\RouteNoteBundle\Entity\Note;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NoteType extends AbstractType
{

    public const FORM_NAME = 'note_route_form';

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('uri', HiddenType::class)
            ->add('note', TextareaType::class, [
                'required' => true,
                'label' => 'pws.routenotebundle.note.note',
                'attr' => [
                    'rows' => 10
                ]
            ])
            ->add('priority', CheckboxType::class, [
                'required' => false,
                'label' => 'pws.routenotebundle.note.priority'
            ]);

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Note::class,
            'translation_domain' => 'PurrmannWebsolutionsRouteNote'
        ]);
    }

    /**
     * getBlockPrefix.
     * @return string
     */
    public function getBlockPrefix(): string
    {
        return self::FORM_NAME;
    }
}
