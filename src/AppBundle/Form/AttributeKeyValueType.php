<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class AttributeKeyValueType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
//        $keyValue = $options['data'];
//        #ich brauche an dieser stelle eigentlich alle möglichen values, das heißt eigentlich den entitymanager, oder noch ein anderes formType includen?
//        $builder->add('key', ChoiceType::class, [
//            'choices' => $keyValue->getKeyValue()->getValues(), 
//            'choice_label' => 
//                function ($attributeValue, $key, $index) {
//
//                        return $attributeValue->getValue()->getLabel();
//                }]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\AttributeKeyValue'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_attributekeyvalue';
    }


}
