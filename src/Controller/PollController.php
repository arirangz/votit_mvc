<?php
namespace App\Controller;

use App\Repository\PollRepository;
use App\Repository\PollItemRepository;
use App\Repository\UserPollItemRepository;
use App\Entity\Poll;
use App\Entity\PollItem;
use App\Entity\UserPollItem;

class PollController extends Controller {
    public function list() {
        // TODO : récupérer tous les sondages
        $polls = [];
        $this->render('poll/list', ['polls' => $polls]);
    }
    public function show() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: /');
            exit;
        }
        $repo = new PollRepository();
        $poll = $repo->find($id);
        $itemRepo = new PollItemRepository();
        $items = $itemRepo->findByPollId($id);
        $voteRepo = new UserPollItemRepository();
        $results = $voteRepo->countVotes($id);
        $this->render('poll/show', ['poll' => $poll, 'items' => $items, 'results' => $results]);
    }
    public function create() {
        $this->render('poll/create');
        if (empty($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // TODO : enregistrer le sondage et ses items

        }
    }
  
    public function vote() {
       // TODO : enregistrer le vote de l'utilisateur
    }
}
