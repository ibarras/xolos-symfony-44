<?php

namespace App\Repository;

use App\Entity\IcTraduccion;
use App\IcUtils\IcConfig;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;


class IcTraduccionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IcTraduccion::class);
    }

    /**
     * Metodo para obtener todas las noticias, opcional <categoria> <limite>
     *
     * @param integer $categoria
     * @param integer $limite
     * @return Array object
     */


    public function getNews($idioma = null, $esGlobal = null, $limit = null)
    {
        $em = $this->getEntityManager();
        $q = $em->createQueryBuilder();
        $q->select('n,nt')
            ->from('App\Entity\IcTraduccion', 'nt')
            ->join('nt.idNoticia', 'n')
            ->join('nt.idLocale', 'l')
            ->where('l.locale = :idioma')
            ->orderBy('nt.id', 'desc')
            ->setParameter('idioma', $idioma);


        if($esGlobal)
            $q->andWhere('nt.esGlobal = true');

        if($limit)
            $q->setMaxResults($limit);

        return $q->getQuery()->getResult();

    }

    /**
     * Martin Ibarra C
     * mic@unixmexico.org
     * 25 - oct - 2018
     * Se cambia de DQL a QueryBuilder para poder parametrizar el SQL con setMaxResults()
     * @param $category
     * @param string $locale
     * @param null $limit
     * @return array
     */
    public function getNewsByCategory($category, $locale = 'es', $limit = null )
    {

        $em = $this->getEntityManager();

        $q = $em->createQueryBuilder();
        $q->select('nt')
            ->from('App\Entity\IcTraduccion', 'nt')
            ->join('nt.idNoticia', 'n')
            ->join('nt.idLocale', 'l')
            ->join('nt.idCategoria', 'c')
            ->where('l.locale = :locale')
            ->andWhere('c.id = :categoria')
            ->orderBy('nt.id', 'desc')
            ->setParameters(array('locale' => $locale, 'categoria' => $category));

        if ($limit)
            $q->setMaxResults($limit);

        return $q->getQuery()->getResult();
        /*
         implementar el index cuando sea necesario
        ->setMaxResults(IcConfig::LIMITE_NOTICIAS_INDEX);
         para refactorizar
         public function getNewsByCategoryIndex($category, $locale = 'es'){}

         */
    }



    /**
     * 24 - octubre 2018
     * Martin Ibarra C.
     * @mic@unixmexico.org
     *
     * Modificacion para que regrese solo un objecto en lugar de un Array
     * @param $id_noticia
     * @param string $locale
     * @return mixed
     * @throws \Doctrine\ORM\NonUniqueResultException
     *
     */
    public function getNewsByLocale($id, $locale = 'es'){
        $em = $this->getEntityManager();
        $query = $em->createQuery('
				SELECT nt FROM App\Entity\IcTraduccion nt
				    JOIN nt.idNoticia n
				    JOIN nt.idLocale l
					WHERE l.locale =:locale	AND n.id =:id_noticia
				')
            ->setParameter('locale', $locale)
            ->setParameter('id_noticia', $id);

        return $query->getOneOrNullResult();
    }

}