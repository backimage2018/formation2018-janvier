<?php
namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextType::class)
            ->add('price', MoneyType::class, array(
            'currency' => ''
        ))
            ->add('old_price', MoneyType::class, array(
            'currency' => ''
        ))
            ->add('image', ImageType::class)
            ->add('notation', IntegerType::class)
            ->add('sale', TextType::class)
            ->add('new', ChoiceType::class, array(
            'choices' => array(
                'None' => null,
                'New' => 'new'
            )
        ))
            ->add('description', TextType::class)
            ->add('detail', TextType::class)
            ->add('availability', ChoiceType::class, array(
            'choices' => array(
                'In stock' => 'In stock',
                'Not in stock' => 'Not in stock',
                'One week' => 'One week',
                'Two week' => 'Two week'
            )
        ))
            ->add('brand', TextType::class)
            ->add('hour', IntegerType::class)
            ->add('minute', IntegerType::class)
            ->add('second', IntegerType::class)
            ->add('category', ChoiceType::class, array(
            'choices' => array(
                'Women\'s clothing' => 'clothing',
                'Men\'s clothing' => 'clothing',
                'Bags & shoes' => 'bags_and_shoes',
                'Jewelry & watches' => 'jewelry_and_watches',
                'Phone\'s & accessories' => 'phones_and_accessories',
                'Computer & office' => 'computer_and_office',
                'Consumer electronics' => 'consumer_electronics'
            )
        ))
            ->add('sex', ChoiceType::class, array(
            'choices' => array(
                'Women' => 'women',
                'Men' => 'men',
                'Mixte' => 'mixte'
            )
        ))
            ->add('isActive', CheckboxType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Product::class
        ));
    }
}
?>