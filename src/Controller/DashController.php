<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;


/**
 * Dash Controller
 *
 * @property \App\Model\Table\DashTable $Dash
 */
class DashController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {

        $this->set(compact('dash'));
        $this->set('_serialize', ['dash']);
    }

	public function initialize()
	{
	    parent::initialize();
		$this->Auth->allow(['index', 'view']);
	}
    /**
     * View method
     *
     * @param string|null $id Dash id.
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
