<?php

namespace App\Repository;

use App\Entity\Guardian;
use App\Entity\LoginInfo;
use App\Entity\Student;
use App\Entity\Teacher;
use App\Service\LiveService;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;

/**
 * @method LoginInfo|null find($id, $lockMode = null, $lockVersion = null)
 * @method LoginInfo|null findOneBy(array $criteria, array $orderBy = null)
 * @method LoginInfo[]    findAll()
 * @method LoginInfo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LoginInfoRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{
    private LiveService $liveService;

    public function __construct(ManagerRegistry $registry, LiveService $liveService)
    {
        parent::__construct($registry, LoginInfo::class);
        $this->liveService = $liveService;
    }

    /**
     * Used to upgrade (rehash) the user's password automatically over time.
     */
    public function upgradePassword(PasswordAuthenticatedUserInterface $user, string $newHashedPassword): void
    {
        if (!$user instanceof LoginInfo) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', \get_class($user)));
        }

        $user->setPassword($newHashedPassword);
        $this->_em->persist($user);
        $this->_em->flush();
    }

    public function info(LoginInfo $user){
        if($user->getUserTableName() == 'guardian'){
            return $this->_em->getRepository(Guardian::class)->find($user->getUserId());
        }
        if($user->getUserTableName() == 'student') {
            return $this->_em->getRepository(Student::class)->find($user->getUserId());
        }
        if($user->getUserTableName() == 'teacher') {
            return $this->_em->getRepository(Teacher::class)->find($user->getUserId());
        }
        if($user->getUserTableName() == 'admin') {
            $admin = new Teacher;
            $admin->setProfilePicture($this->liveService->settings->LOGO);
            return $admin;
        }

    }

    // /**
    //  * @return LoginInfo[] Returns an array of LoginInfo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LoginInfo
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
