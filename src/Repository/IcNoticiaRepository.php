<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;
use App\IcUtils\IcConfig;
use Symfony\Component\Form\Extension\Core\ChoiceList\ObjectChoiceList;

class IcNoticiaRepository extends EntityRepository{

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
            ->from('FrontendBundle:IcTraduccion', 'nt')
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
    public function getNewByLocale($id_noticia, $locale = 'es'){
        $em = $this->getEntityManager();
        $query = $em->createQuery('
				SELECT nt FROM FrontendBundle:IcTraduccion nt
				    JOIN nt.idNoticia n
				    JOIN nt.idLocale l
					WHERE l.locale =:locale	AND n.id =:id_noticia
				')
            ->setParameter('locale', $locale)
            ->setParameter('id_noticia', $id_noticia);

        return $query->getOneOrNullResult();
    }



    public function getNewsByCategoryIndex($category, $locale = 'es'){
        $em = $this->getEntityManager();
        $query = $em->createQuery('
				SELECT nt FROM FrontendBundle:IcTraduccion nt
				    JOIN nt.idNoticia n
				    JOIN nt.idLocale l
				    JOIN nt.idCategoria cc
					WHERE l.locale =:locale	AND cc.id =:categoria
					ORDER BY nt.id DESC
				')
            ->setParameter('locale', $locale)
            ->setParameter('categoria', $category)
            ->setMaxResults(IcConfig::LIMITE_NOTICIAS_INDEX);

        return $query->getResult();
    }

    /**
     * Metodo para obtener todas las noticias, opcional <categoria> <limite>
     *
     * @param integer $categoria
     * @param integer $limite
     * @return Array object
     */

    public function getNoticias($idioma = null, $esGlobal = null)
    {
        $em = $this->getEntityManager();
        $q = $em->createQueryBuilder();
        $q->select('n,nt')
            ->from('FrontendBundle:IcTraduccion', 'nt')
            ->join('nt.idNoticia', 'n')
            ->join('nt.idLocale', 'l')
            ->where('l.locale = :idioma')
            ->orderBy('nt.id', 'desc')
            ->setParameter('idioma', $idioma)
	    	->setMaxResults(IcConfig::LIMITE_NOTICIAS_INDEX);

        if($esGlobal == true)
            $q->andWhere('nt.esGlobal = true');


        return $q->getQuery()->getResult();

    }
    
    public function getNoticiasRest($idioma = null, $limite = null)
    {
    	$em = $this->getEntityManager();
    	$q = $em->createQueryBuilder();
    	$q->select('n,nt')
    	->from('FrontendBundle:IcTraduccion', 'nt')
    	->join('nt.idNoticia', 'n')
    	->where('nt.idLocale = :idioma')
    	->orderBy('nt.id', 'desc')
    	->setParameter('idioma', $idioma);

    	if($limite)
    	    $q->setMaxResults($limite);

    	return $q->getQuery()->getResult();
    
    }
    
    public function getNoticiaIdioma($noticia = null, $idioma = null)
    {
        $em = $this->getEntityManager();
        $q = $em->createQuery('
            SELECT nt, l
            FROM FrontendBundle:IcTraduccion nt
            JOIN nt.idLocale l
            WHERE nt.idNoticia = :noticia
            AND   nt.idLocale = :idioma
        ')->setParameter('noticia', $noticia)->setParameter('idioma', $idioma);

        return $q->getOneOrNullResult();

    }



}
