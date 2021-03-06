<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;


/**
 * Screen Controller
 *
 * @property \App\Model\Table\ScreenTable $Screen
 */
class ScreenController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {

        # Pre-load: Get Control ID & Mode as well as settings

        $conn = ConnectionManager::get('default');
        $stmt = $conn->execute("SELECT * from control ORDER BY id DESC LIMIT 1");
        $modearray = $stmt->fetch('assoc');
        $stmt2 = $conn->execute("SELECT * from settings");
        $settings_indexed = $stmt2->fetchAll('assoc');
        $settings = [];
        foreach ($settings_indexed as $value) {
            $settings[$value['name']] = $value['value'];
        }
        $country_id = $modearray['country'];
        $mode = $modearray['mode'];

        # Method 1: If Control ID is 0, set loading screen.

        if ($country_id == 0) {

          # Return current state
          $this->set(compact('modearray', 'settings'));
          $this->set('_serialize', ['modearray', 'settings']);
          $this->viewBuilder()->setLayout('screen');
          $this->render('loading');

        }

        # Method 2: Countdown to leaderboard (5 mins...)

        elseif ($country_id == 27 && $mode == 1) {

          $this->set(compact('modearray', 'settings'));
          $this->set('_serialize', ['modearray', 'settings']);
          $this->viewBuilder()->setLayout('screen');
          $this->render('countdown');

        }

        # Method 3: Leaderboard


        elseif ($country_id == 27 && $mode == 2) {

          $conn = ConnectionManager::get('default');

          $stmt = $conn->execute("SELECT countries.id as country_id, countries.name, countries.flag, countries.position, ROUND( AVG(votes.overall_score),1 ) as ave_overall, ROUND( AVG(votes.song_score),1 ) as ave_song, ROUND( AVG(votes.singer_score),1 ) as ave_singer, ROUND( AVG(votes.staging_score),1 ) as ave_staging, ROUND((AVG(votes.overall_score)+AVG(votes.song_score)+AVG(votes.singer_score)+AVG(votes.staging_score))/4,1) as final_score FROM `countries` LEFT JOIN `votes` ON votes.country_id = countries.id WHERE countries.position IS NOT NULL GROUP BY countries.id ORDER BY final_score DESC LIMIT 10");

          $leaderboard = $stmt->fetchAll('assoc');

          $this->set(compact('modearray', 'settings', 'leaderboard'));
          $this->set('_serialize', ['modearray', 'settings', 'leaderboard']);
          $this->viewBuilder()->setLayout('screen');
          $this->render('leaderboard');

        }

        # Method 4: If Control ID > 0 and Control Mode = vote, set vote screen.

        elseif ($country_id > 0 && $mode == 1) {

          $stmt3 = $conn->execute("SELECT * FROM `countries` WHERE position = ".$country_id." ORDER BY position ASC");
          $countrydetails = $stmt3->fetch('assoc');

          $this->set(compact('modearray', 'settings', 'countrydetails'));
          $this->set('_serialize', ['modearray', 'settings', 'countrydetails']);
          $this->viewBuilder()->setLayout('screen');
          $this->render('voting');

        }

        # Method 5: If Control ID > 0 and Control Mode = results, set results screen.

        elseif ($country_id > 0 && $mode == 2) {

          $stmt4 = $conn->execute("SELECT votes.comments FROM `countries` LEFT JOIN `votes` ON votes.country_id = countries.id AND votes.comments<>'' WHERE countries.position = ".$country_id." AND votes.comments IS NOT NULL ORDER BY votes.modified ASC");
      		$comments = $stmt4->fetchAll('assoc');

      		$stmt5 = $conn->execute("SELECT ROUND( AVG(votes.overall_score),1 ) as ave_overall, ROUND( AVG(votes.song_score),1 ) as ave_song, ROUND( AVG(votes.singer_score),1 ) as ave_singer, ROUND( AVG(votes.staging_score),1 ) as ave_staging FROM `countries` LEFT JOIN `votes` ON votes.country_id = countries.id WHERE countries.position = ".$country_id." ORDER BY position ASC");
      		$scores = $stmt5->fetch('assoc');

      		$stmt6 = $conn->execute("SELECT * FROM `countries` WHERE position = ".$country_id." ORDER BY position ASC");
      		$countrydetails = $stmt6->fetch('assoc');

          $this->set(compact('modearray', 'settings', 'comments', 'scores', 'countrydetails'));
          $this->set('_serialize', ['modearray', 'settings', 'comments', 'scores', 'countrydetails']);
          $this->viewBuilder()->setLayout('screen');
          $this->render('results');

        }


        else {
          throw new NotFoundException();
        }
    }

	public function initialize()
	{
	  parent::initialize();
		$this->Auth->allow(['index', 'view']);
	}
    /**
     * View method
     *
     * @param string|null $id Screen id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {

		$conn = ConnectionManager::get('default');

		$stmt = $conn->execute("SELECT votes.comments FROM `countries` LEFT JOIN `votes` ON votes.country_id = countries.id AND votes.comments<>'' WHERE countries.position = ".$id." AND votes.comments IS NOT NULL ORDER BY votes.modified ASC");



		$votecomments = $stmt->fetchAll('assoc');

		$stmt2 = $conn->execute("SELECT ROUND( AVG(votes.overall_score),1 ) as ave_overall, ROUND( AVG(votes.song_score),1 ) as ave_song, ROUND( AVG(votes.singer_score),1 ) as ave_singer, ROUND( AVG(votes.staging_score),1 ) as ave_staging FROM `countries` LEFT JOIN `votes` ON votes.country_id = countries.id WHERE countries.position = ".$id." ORDER BY position ASC");

		$scores = $stmt2->fetchAll('assoc');

		$stmt3 = $conn->execute("SELECT * FROM `countries` WHERE position = ".$id." ORDER BY position ASC");

		$countries = $stmt3->fetchAll('assoc');

        $this->set(compact('votecomments', 'scores', 'countries'));
        $this->set('_serialize', ['votecomments', 'scores', 'countries']);
    }

    public function isAuthorized($user)
	{
	    $action = $this->request->getParam('action');

	    // The add and index actions are always allowed.
	    if (in_array($action, ['index', 'view', 'tags'])) {
	        return true;
	    }
	}


    }
