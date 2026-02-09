<?php

use app\controllers\ApiExampleController;
use app\controllers\FrontController;
use app\controllers\AdminController;
use app\middlewares\SecurityHeadersMiddleware;
use flight\Engine;
use flight\net\Router;

/** @var Router $router */
/** @var Engine $app */

$router->group('', function(Router $router) use ($app) {

    
    $router->get('/', [FrontController::class, 'welcome']);                 
    $router->get('/login', [FrontController::class, 'loginForm']);         
    $router->post('/login', [FrontController::class, 'login']);            
    $router->get('/register', [FrontController::class, 'registerForm']);   
    $router->post('/register', [FrontController::class, 'register']);      
    $router->get('/objets', [FrontController::class, 'listeObjets']);      
    $router->get('/objets/@id:[0-9]+', [FrontController::class, 'ficheObjet']);
    $router->get('/historique/@objet_id:[0-9]+', [FrontController::class, 'historiqueObjet']); 

    
    $router->group('/api', function() use ($router) {
        $router->get('/users', [ApiExampleController::class, 'getUsers']);                  
        $router->get('/users/@id:[0-9]+', [ApiExampleController::class, 'getUser']);       
        $router->post('/users/@id:[0-9]+', [ApiExampleController::class, 'updateUser']);  
    });

    
    $router->get('/admin', [AdminController::class, 'dashboard']);                   
    $router->get('/admin/categories', [AdminController::class, 'listeCategories']);  
    $router->post('/admin/categories', [AdminController::class, 'ajouterCategorie']); 
    $router->get('/admin/statistiques', [AdminController::class, 'statistiques']);   

    
    $router->get('/echanges', [FrontController::class, 'listeEchanges']);           
    $router->post('/echanges/proposer', [FrontController::class, 'proposerEchange']); 
    $router->post('/echanges/@id:[0-9]+/repondre', [FrontController::class, 'repondreEchange']); 

}, [SecurityHeadersMiddleware::class]);
