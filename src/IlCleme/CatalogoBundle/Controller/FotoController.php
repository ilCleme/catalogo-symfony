<?php

namespace IlCleme\CatalogoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class FotoController extends Controller
{
    public function cancellaAction($id){

        $em = $this->getDoctrine()->getManager();
        $foto = $this->getDoctrine()
            ->getRepository('IlClemeCatalogoBundle:Photo')
            ->find($id);

        $env = $this->container->get('kernel')->getEnvironment();

        $cacheManager = $this->get('liip_imagine.cache.manager');
        $cacheManager->remove($foto->getImg());

        $root = $this->get('kernel')->getRootDir();

        if($env == 'dev'){
            $deleteStatus = unlink($root.'/../web'.$foto->getImg());
            if (!$deleteStatus){
                $this->get('session')->getFlashBag()->add(
                    'error',
                    'É stato impossibile eliminare l\'immagine dal sistema'
                );
            }
        }

        $em->remove($foto);
        $em->flush();

        $this->get('session')->getFlashBag()->add(
            'notice',
            'La foto è stata cancellata dal prodotto!'
        );

        return $this->render(
            'IlClemeCatalogoBundle:Photo:delete.html.twig'
        );
    }

    public function updatePositionAction(){

        $request = $this->container->get('request');
        $data = $request->query->get('foto');
        $data = json_decode($data, true);

        $em = $this->getDoctrine()->getManager();

        $response = array("code" => 100, "success" => true);

        foreach($data as $key=>$value){

            if($response['success']){
                $foto = $this->getDoctrine()
                    ->getRepository('IlClemeCatalogoBundle:Photo')
                    ->findOneBy(array('idTblPhoto' => $value['id'], 'idTblLingua' => $this->get('language.manager')->getSessionLanguage()));

                if (!$foto) {
                    /*$this->get('session')->getFlashBag()->add(
                        'danger',
                        'É avvenuto un errore. Non è stato possibile ordinare le foto.'
                    );*/

                    $response['success']= false;
                    return new Response(json_encode($response));
                }

                if($foto->getPosizione() != $key){
                    $foto->setPosizione($key);
                    $em->persist($foto);
                    $em->flush();
                }
            }
        }

        /*$this->get('session')->getFlashBag()->add(
            'notice',
            'Le foto sono state riordinate, le modifiche saranno visibili solo dopo aver ricaricato la pagina.'
        );*/

        $response = array("code" => 100, "success" => true, "data"=>$data);
        return new Response(json_encode($response));
    }
}
