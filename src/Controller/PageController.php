<?php
namespace App\Controller;
use App\Repository\PollRepository;

class PageController extends Controller {
    public function home() {
        // TODO : récupérer les derniers sondages (limit 3)
        $polls = [];
        $this->render('page/home', [
            'polls' => $polls
        ]);
    }

    public function legal() {
        $this->render('page/legal');
    }
}
