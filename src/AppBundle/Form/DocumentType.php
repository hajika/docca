<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type;
use Doctrine\Common\Persistence\ObjectManager;

class DocumentType extends AbstractType {
    
    private $manager;

    public function __construct(ObjectManager $manager) {
        
        $this->manager = $manager;
    }
    
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) { 
        
        $isEdit = !$options['data']->getFiles()->isEmpty();
        
        $builder->add('title')
                ->add('sourceTime', Type\DateType::class, ['widget' => 'single_text', 'format' => 'dd.MM.yyy'])
                ->add('comment', Type\TextareaType::class, ['required' => false])
                ->add('tags', Type\TextType::class, ['required' => false])
                #->add('files_new', Type\FileType::class, ['mapped' => false, 'multiple' => true, 'required' => !$isEdit])
                ->add('files', Type\CollectionType::class, ['entry_type' => Type\FileType::class])
                ->add('save', Type\SubmitType::class)
                ->get('tags')->addModelTransformer(new DataTransformer\TagsToStringTransformer($this->manager))
                ;
        
        if ($isEdit) {
            
            $builder
                ->add('files', Type\CollectionType::class, ['entry_type' => FileType::class, 'allow_add' => true, 'allow_delete' => true])
                ->add('delete', Type\SubmitType::class);
        }
        
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Document'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_document';
    }


}
