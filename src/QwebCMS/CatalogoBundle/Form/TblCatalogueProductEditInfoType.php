<?php

namespace QwebCMS\CatalogoBundle\Form;

use QwebCMS\CatalogoBundle\Form\Type\AllegatoType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class TblCatalogueProductEditInfoType extends AbstractType
{
    private $lingua;

    public function __construct($lingua)
    {
        $this->lingua = $lingua;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idTblLingua', 'hidden')
            ->add('title')
            ->add('description')
            ->add('cod')
            ->add('allegatiProgetto', 'collection', array(
                'type' => new AllegatoType(),
                'allow_add'    => true,
                'allow_delete'  => true,
                'by_reference' => false,
                'label' => false,
            ))
            ->add('imageFile', 'vich_image', array(
                'required'      => false,
                'label'         => 'Logo',
                'allow_delete'  => false, // not mandatory, default is true
                'download_link' => false, // not mandatory, default is true
            ))
            ->add('logoPath', 'hidden')
            ->add('position')
            ->add('featured', 'checkbox', array(
                'required'  => false,
            ))
            ->add('idTblPhotoCat', 'hidden')
            ->add('pub', 'checkbox', array(
                'required'  => false,
            ))
            ->add('categories', 'entity', array(
                'class'     => 'QwebCMS\CatalogoBundle\Entity\Category',
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->where('u.idTblLingua = '.$this->lingua);
                },
                'property'  => 'title',
                'multiple'  => true,
                'expanded'  => false,
                'required'  => true,
                'mapped'    => true
            ))
            ->add('save', 'submit', array('label' => 'Salva ed Esci'))
            ->add('saveAndContinue', 'submit', array('label' => 'Salva e Continua'))
        ;
    }


    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'QwebCMS\CatalogoBundle\Entity\Product'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'product_edit';
    }
}
