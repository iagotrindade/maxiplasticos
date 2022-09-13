<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\CategorieHandler;
use \src\handlers\AboutHandler;

class AboutController extends Controller {

    public function aboutP() {

        $categorieFab = CategorieHandler::getCategorieByName('Fabricação');
        $categorieEsc = CategorieHandler::getCategorieByName('Escritório');
        $categorieEscol = CategorieHandler::getCategorieByName('Escolar');

        $this->render('about', [
            'categorieFab' => $categorieFab,
            'categorieEsc' => $categorieEsc,
            'categorieEscol' => $categorieEscol
        ]);
    }

    public function contactEmail () {
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email');
        $phone = filter_input(INPUT_POST, 'phone');
        $cc = filter_input(INPUT_POST, 'cc');
        $msg = filter_input(INPUT_POST, 'msg');

        if($name && $email && $phone && $cc && $msg) {
            if (AboutHandler::sendEmail($name, $email, $phone, $cc, $msg)) {
                $_SESSION['flash'] = 'Sua mensagem foi enviada, em breve entraremos em contato!';

                $this->redirect('/about', [
                'flash' => $_SESSION['flash']
                ]);
            }
        }

        else {
            $_SESSION['flash'] = 'Preencha todas informações!';
            $this->redirect('/about', [
                'flash' => $_SESSION['flash']
            ]);
        }
    }

}