<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Salarmehr\Cosmopolitan\Cosmo;
use Symfony\Component\HttpFoundation\Request;
class ApiController extends AbstractController
{
    #[Route('/api/convert', name: 'app_api')]
    public function index( Request $request): Response
    {
        $data=json_decode($request->getContent(),true);
      
        $result=Cosmo::create($data['language'])->spellout($data['number']); // five million - English
        return $this->json([ 'spellout' => $result ,'dfd'=>'dd'], 200, ["Content-Type" => "application/json"]);
    }
}
