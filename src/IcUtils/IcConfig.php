<?php
namespace  App\IcUtils;

class IcConfig {
	
/**
 * 
* Varables globales de categoria
* 

const CATEGORIA_PRIMER_EQUIPO 			= 1;
const CATEGORIA_FUERZAS_BASICAS 		= 24;
const CATEGORIA_PROMOCIONES 			= 45;
const CATEGORIA_SOCIAL 						= 21;
const EQUIPO_LOCAL								= 21;
const PRIMER_EQUIPO_FEMENIL				= 6;
*/

    const CATEGORIA_NOTICIA_PRIMER_EQUIPO 	= 1;
    const CATEGORIA_NOTICIA_FUERZAS_BASICAS	= 24;
    const CATEGORIA_NOTICIA_PROMOCIONES 	= 45;
    const CATEGORIA_NOTICIA_SOCIAL 			= 21;
    const CATEGORIA_NOTICIAS_EQUIPO_FEMENIL	= 56;
    const EQUIPO_LOCAL						= 33;
    const CATEGORIA_EQUIPO_FEMENIL          = 7;
    const LIMITE_NOTICIAS_PAGINADO          = 6;
    const LIMITE_NOTICIAS_PORTADA           = 4;
    const IC_IMAGENES_NOTICIA               = 'https://admin.xolos.com.mx/uploads/galeria/noticias/';
    const IC_IMAGENES_JUGADORES             = 'https://admin.xolos.com.mx/uploads/galeria/foto_jugador/';
    const IC_IMAGENES_EQUIPOS               = 'https://admin.xolos.com.mx/uploads/galeria/equipos/';
    const IC_IMAGENES_REVISTA               = 'https://admin.xolos.com.mx/uploads/galeria/revista/';
    const IC_LOCALE_ES                      = 'es';
    const IC_LOCALE_EN                      = 'en';
    const IC_JUGADOR_CATEGORIA_PRIMER       = 1;
    const IC_TIPO_CAMPANA                   = 6;
    const CATEGORIA_NOTICIA_CIX             = 30;
    const CATEGORIA_NOTICIA_FUT7            = 33;
    const IC_TIPO_INFORMACION_XOLOPASS      = 1;
    const IC_TIPO_INFORMACION_MARKETPLACE   = 2;
    const IC_LIMITE_GALERIAS_PORTADA        = 4;

    /**
     * Martin Ibarra Cervantes
     * 23 Octubre 2018
     * Se agregan constantes para los torneos
     */

    const IC_LIGA                           = 'LIGA';
    const IC_ALTERNO                        = 'ALTERNO';
    const IC_FEMENIL                        = 'FEMENIL';

    const IC_MAIL_FROM                      = 'contacto@xolos.com.mx';
    const IC_MAIL_TO                        = 'martin.ibarra@xolos.com.mx';

    const IC_LIMITE_INDEX_PARTIDOS          = 3;
    const IC_FASE_2                         = 2;


    const IC_MAIL_NEWSLETTER_FROM           = 'contacto@xolos.com.mx';
    const IC_IMAGE_TOP_NEWSLETTER           = 10; //10
    const IC_IMAGE_PROMO_NEWSLETTER         = 11; //11

    const IC_INFORMACION                    = 'Xolopass'; //contenido del campo titulo
    const IC_IMAGEN_BENEFICIO               = 'https://admin.xolos.com.mx/uploads/galeria/socios_xolopass/';
    const IC_IMAGEN_APP                     = 'https://admin.xolos.com.mx/uploads/galeria/App/';
    const IC_IMAGE_MAPA                     = 5; //Imagen del mapa
    const IC_IMAGE_BOLETOS                  = 9; //Imagen para seccion boletos individuales
    const IC_IMAGE_XOLOPASS                 = 12; //Imagen para seccion Xolopass
    const IC_IMAGE_SECCION_MAPA             = 13; //Imagen para seccion Mapa
    const IC_IMAGE_CONTACTANOS              = 14; //Imagen para seccion contactanos atencion al aficionado

}