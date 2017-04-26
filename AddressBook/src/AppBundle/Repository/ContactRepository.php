<?php

namespace AppBundle\Repository;
use AppBundle\Entity\Contact;
use AppBundle\Entity\Societe;
use Doctrine\ORM\Query\ResultSetMapping;
use Doctrine\ORM\Query\ResultSetMappingBuilder;

/**
 * ContactRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ContactRepository extends \Doctrine\ORM\EntityRepository
{
    public function findWithSociete($id)
    {
        $dql = 'SELECT c, s FROM AppBundle\Entity\Contact c 
                LEFT JOIN c.societe s
                WHERE c.id = :id';

        return $this->getEntityManager()
            ->createQuery($dql)
            ->setParameter('id', $id)
            ->getSingleResult();
    }

    public function findWithSocieteInSql($id)
    {
        $sql = 'SELECT c.*, s.nom as societe_nom, s.id as societe_id, s.ville 
                FROM contact c 
                LEFT JOIN societe s ON s.id = societe_id
                WHERE c.id = :id';

        $entityManager = $this->getEntityManager();

        $rsm = new ResultSetMapping();
        $rsm->addEntityResult(Contact::class, 'c');
        $rsm->addFieldResult('c', 'id', 'id');
        $rsm->addFieldResult('c', 'prenom', 'prenom');
        $rsm->addFieldResult('c', 'nom', 'nom');
        $rsm->addFieldResult('c', 'date_naissance', 'dateNaissance');
        $rsm->addJoinedEntityResult(Societe::class , 's', 'c', 'societe');
        $rsm->addFieldResult('s', 'societe_id', 'id');
        $rsm->addFieldResult('s', 'societe_nom', 'nom');
        $rsm->addFieldResult('s', 'ville', 'ville');

        return $this->getEntityManager()
            ->createNativeQuery($sql, $rsm)
            ->setParameter('id', $id)
            ->getSingleResult();
    }
}
