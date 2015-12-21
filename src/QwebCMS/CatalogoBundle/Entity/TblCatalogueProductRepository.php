<?php

namespace QwebCMS\CatalogoBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * TblCatalogueProductRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TblCatalogueProductRepository extends EntityRepository
{
    public function findFeaturevaluesProductByLanguage($id_product, $id_language = null)
    {
        $query = $this->getEntityManager()
            ->createQuery('SELECT p, f FROM QwebCMSCatalogoBundle:TblCatalogueProduct p JOIN p.featurevalues f WHERE f.idTblLingua = ?1 AND p.idTblLingua = ?1 AND p.idTblCatalogueProduct = ?2');
        $query->setParameters(array(
            1 => $id_language,
            2 => $id_product));

        try {
            $product = $query->getSingleResult();
            return $product->getFeaturevalues();
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }
}
