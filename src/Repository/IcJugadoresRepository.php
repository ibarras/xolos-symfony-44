<?php

namespace App\Repository;

use App\Entity\IcJugadores;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Form\Extension\Core\ChoiceList\ObjectChoiceList;

class IcJugadoresRepository extends ServiceEntityRepository
{

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IcJugadores::class);
    }

    public function getPlayers($active = true, $categoria)
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery('  
				    SELECT j FROM App\Entity\IcJugadores j
				    JOIN j.idPosicionJugador pj
					WHERE j.esActivo =:status 
        			AND j.idJugadorCategoria =:categoria
					ORDER BY j.idPosicionJugador ASC
        		')
            ->setParameter('status', $active)
            ->setParameter('categoria', $categoria);

        return $query->getResult();
    }


    public function getPlayerBioByLocale($idJugador = null, $locale = 'es')
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery('
				    SELECT jb FROM App\Entity\IcJugadorBiografia jb
				    JOIN jb.idLocale l
				    JOIN jb.idJugador j
					WHERE l.locale =:locale	AND j.id =:idJugador
				')
            ->setParameter('locale', $locale)
            ->setParameter('idJugador', $idJugador);

        return $query->getResult();
    }


    public function getEstadisticaJugador($jugador, $liga)
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery('
					SELECT pj
					FROM App\Entity\IcPartidoJugadores pj
					JOIN pj.idJugador j
					JOIN pj.idCalendario c 
					WHERE pj.idJugador = :jugador
					AND c.idTorneo = :torneo
					')
            ->setParameter('jugador', $jugador)
            ->setParameter('torneo', $liga);

        return $query->getResult();

    }

    /**
     * Metodo para obtener los datos de un jugador
     *
     * @param integer $jugador
     * @return array object
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getJugador($jugador=null)
    {
    	$em = $this->getEntityManager();
    
    	$query = $em->createQuery('
					SELECT j
					FROM App\Entity\IcJugadores j
					WHERE j.id = :jugador
					')->setParameter('jugador', $jugador);
    		
    	return $query->getOneOrNullResult();
    }
    
    public function getPartidoJugadores($jornada)
    {
    		$em = $this->getEntityManager();
    			$query = $em->createQuery('
    					SELECT pj
    					FROM App\Entity\IcPartidoJugadores pj
    					JOIN pj.idJugador j
    					WHERE pj.idCalendario = :partido
    					ORDER BY j.idPosicionJugador DESC
    					')->setParameter('partido', $jornada);
    			
    			return $query->getResult();
    }


    public function getCuerpoTecnico($tipo)
    {
        $em = $this->getEntityManager();

        $query = $em->createQuery('
					SELECT ct
					FROM App\Entity\IcCuerpoTecnico ct
					WHERE ct.esActivo = :estatus
					AND ct.idCategoriaJugador = :tipo
					ORDER BY ct.idPosicion ASC
					')->setParameter('estatus', true)->setParameter('tipo', $tipo);

        return $query->getResult();

    }
}