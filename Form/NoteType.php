<?php
declare(strict_types=1);

namespace PurrmannWebsolutions\RouteNoteBundle\Form;

use PurrmannWebsolutions\RouteNoteBundle\Entity\Note;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use function Sodium\add;

class NoteType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('route', HiddenType::class)
            ->add('uri', HiddenType::class)
            ->add('note', TextareaType::class, [
                'required' => true,
                'label' => 'pws.routenotebundle.note.note'
            ])
            ->add('priority', CheckboxType::class, [
                'required' => false,
                'label' => 'pws.routenotebundle.note.priority'
            ])
        ;

    }

    public function configureOptions(\Symfony\Component\OptionsResolver\OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Note::class
        ]);
    }
}
