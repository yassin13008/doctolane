<?php

namespace App\Repository;

use App\Entity\Professionnals;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;

/**
 * @extends ServiceEntityRepository<Professionals>
 *
 * @method Professionals|null find($id, $lockMode = null, $lockVersion = null)
 * @method Professionals|null findOneBy(array $criteria, array $orderBy = null)
 * @method Professionals[]    findAll()
 * @method Professionals[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProfessionnalsRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Professionnals::class);
    }

    public function save(Professionnals $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Professionnals $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
    public function upgradePassword(PasswordAuthenticatedUserInterface $user, string $newHashedPassword): void
    {
        if (!$user instanceof Professionnals) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', \get_class($user)));
        }

        $user->setPassword($newHashedPassword);

        $this->save($user, true);
    }

//    /**
//     * @return Professionals[] Returns an array of Professionals objects
//     */

    // Requête qui permet de trouver un professionnel par sa ville ou code postal 
   public function findByCodePostalOuVille($postalCodeOrCity): array
   {
       return $this->createQueryBuilder('p') // ici je selectionnes tout les données du professionnels
       ->where('p.postalCode = :postalCodeOrCity OR p.city = :postalCodeOrCity') // la condition c'est soi par le code postal ou la ville
       ->setParameter('postalCodeOrCity', $postalCodeOrCity) // en paramettre on mettra les données que l'utilisateur aura saisie 
       ->getQuery()
       ->getResult();
   }

   // Requete qui permet de trouver un professionnel par sa spécialité
   public function findBySpeciality($specialityId): array
   {
       return $this->createQueryBuilder('p')
       ->where('p.speciality = :specialityId')
       ->setParameter('specialityId', $specialityId)
       ->getQuery()
       ->getResult();
   }

   // Requete qui permet de trouver un professionnel par sa spécialité et son code postal ou sa ville 
   public function findBySpecialityAndCityPostalCode($spe, $cityPost){
    return $this->createQueryBuilder('p')
    ->where('p.speciality = :specialityId and p.postalCode = :postalCodeOrCity OR p.city = :postalCodeOrCity')
    ->setParameters(['specialityId' => $spe,
                    'postalCodeOrCity' => $cityPost
    ])
    ->getQuery()
    ->getResult();
   }

// $professionals = $this->getDoctrine()->getRepository(Professionnals::class)
// ->createQueryBuilder('p')
// ->where('p.postal_code = :postalCodeOrCity OR p.city = :postalCodeOrCity')
// ->setParameter('postalCodeOrCity', $postalCodeOrCity)
// ->getQuery()
// ->getResult();

//    public function findOneBySomeField($value): ?Professionals
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
