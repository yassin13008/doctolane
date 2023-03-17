<?php

namespace App\Repository;

use App\Entity\Appointment;
use App\Entity\Professionnals;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Appointment>
 *
 * @method Appointment|null find($id, $lockMode = null, $lockVersion = null)
 * @method Appointment|null findOneBy(array $criteria, array $orderBy = null)
 * @method Appointment[]    findAll()
 * @method Appointment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AppointmentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Appointment::class);
    }

    public function save(Appointment $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Appointment $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findByProfessionalId($professionalId)
    {
        $qb = $this->createQueryBuilder('app'); // Ici je crée la requête avec l'alias app (raccourci appointment ) pour dire que c'est la table appointment
        $qb->select('app') // ici du coup je selection ma table appointment (ne pas oublié que l'on app nommé a)
           ->leftJoin('app.professionnal', 'pro') // ici je vais joins l'id au professionnel id de ma table professionnal que je vais dénommé pro (avec l'alias )
           ->where('pro.id = :professionalId') // Ici la condition de ma jointure se fait lorsque l'id de ma table pro = l'id de la table professionnal
           ->setParameter('professionalId', $professionalId); // Ici j'insère la valeur qui lui correspondra et lors de l'appel de ma fonction je mettrai l'id en param de la fct
    
        return $qb->getQuery()->getResult(); // je recupère la requete et j'affiche le résultat
    }
//    /**
//     * @return Appointment[] Returns an array of Appointment objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }
// public function getAppointmentsByProfessionalId($professionalId)
// {
//     return $this->createQueryBuilder('appointment')
//         ->andWhere('id = :id')
//         ->setParameter('id', $professionalId)
//         ->getQuery()
//         ->getResult();
// }

    // public function findByProfessionnalId($id,): array {

    //         return $this->createQueryBuilder('p')
    //         ->select('p')
    //         ->from
    //         ->where('p.id = p:id')
    //         ->setParameter('p.id', $id)
    //         ->getQuery()
    //         ->getResult();
    //    ;
    // }

//    public function findOneBySomeField($value): ?Appointment
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
