<?php

namespace QwebCMS\CatalogoBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * TblCatalogueFeatureRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TblCatalogueFeatureRepository extends EntityRepository
{
    public function findAllByLanguage($id_language = null)
    {
        if (null !== $id_language){
            return $this->getEntityManager()
                ->createQuery(
                    'SELECT f FROM CatalogueBundle:TblCatalogueFeature f WHERE f.idTblLingua = ?1'
                )
                ->setParameter(1, $id_language)
                ->getResult();
        }

        return $this->getEntityManager()
            ->createQuery(
                'SELECT f FROM CatalogueBundle:TblCatalogueFeature f WHERE f.idTblLingua = ?1'
            )
            ->setParameter(1, $this->get('language.manager')->getSessionLanguage())
            ->getResult();
    }
}
