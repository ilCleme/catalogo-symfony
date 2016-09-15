<?php

namespace IlCleme\CatalogoBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * CategoryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CategoryRepository extends EntityRepository
{
    public function countCategory($id_language = 4){
        $query = $this->getEntityManager()
            ->createQuery('SELECT COUNT (c.id) FROM IlClemeCatalogoBundle:Category c WHERE c.idTblLingua = ?1');
        $query->setParameters(array(
            1 => $id_language
        ));

        try {
            $count = $query->getSingleScalarResult();
            return $count;
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }
}
