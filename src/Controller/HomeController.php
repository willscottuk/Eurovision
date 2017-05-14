<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;


/**
 * Home Controller
 *
 * @property \App\Model\Table\HomeTable $Home
 */
class HomeController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {

/*
		$intialjoin = TableRegistry::get('Countries')->find()
			->select(['Countries.id', 'Countries.name', 'Countries.flag', 'Votes.id', 'Countries.position', 'Votes.user_id'])
			->where([
		        'Countries.position IS NOT' => null,
		    ])
			->join([
		        'table' => 'votes',
		        'alias' => 'Votes',
		        'type' => 'RIGHT',
		        'conditions' => 'Votes.country_id = Countries.id',
		    ])
		    ->order(['Countries.position' => 'ASC']);

		$voterecord = TableRegistry::get('Countries')->find()
			->select(['Countries.id', 'Countries.name', 'Countries.flag', 'Votes.id', 'Countries.position', 'Votes.user_id'])
			->where([
		        'Countries.position IS NOT' => null,
		    ])
			->join([
		        'table' => 'votes',
		        'alias' => 'Votes',
		        'type' => 'LEFT',
		        'conditions' => 'Votes.country_id = Countries.id',
		    ])
		    ->order(['Countries.position' => 'ASC']);

			debug($voterecord->union($intialjoin)->order(['Countries.position' => 'ASC']));
*/


		$conn = ConnectionManager::get('default');
// 		$stmt = $conn->execute('(SELECT countries.id as country_id, countries.name, countries.flag, votes.id as vote_id, countries.position, votes.user_id FROM `votes` LEFT JOIN `countries` ON votes.country_id = countries.id WHERE (`position` IS NOT null AND (`user_id`='.$this->Auth->user('id').'))) UNION (SELECT countries.id as country_id, countries.name, countries.flag, votes.id as vote_id, countries.position, votes.user_id FROM `votes` RIGHT JOIN `countries` ON votes.country_id = countries.id WHERE (`position` IS NOT null AND (`user_id`='.$this->Auth->user('id').'))) ORDER BY `position` ASC');
// 		$stmt = $conn->execute('(SELECT countries.id as country_id, countries.name, countries.flag, votes.id as vote_id, countries.position, votes.user_id FROM `votes` LEFT JOIN `countries` ON votes.country_id = countries.id WHERE (`position` IS NOT null)) UNION (SELECT countries.id as country_id, countries.name, countries.flag, votes.id as vote_id, countries.position, votes.user_id FROM `votes` RIGHT JOIN `countries` ON votes.country_id = countries.id WHERE (`position` IS NOT null)) ORDER BY `position` ASC');
// 		$stmt = $conn->execute('(SELECT countries.id as country_id, countries.name, countries.flag, votes.id as vote_id, countries.position, votes.user_id FROM `votes` LEFT JOIN `countries` ON votes.country_id = countries.id WHERE (`position` IS NOT null AND (`user_id` IS NOT'.$this->Auth->user('id').'))) UNION (SELECT countries.id as country_id, countries.name, countries.flag, votes.id as vote_id, countries.position, votes.user_id FROM `votes` RIGHT JOIN `countries` ON votes.country_id = countries.id WHERE (`position` IS NOT null AND (`user_id` IS NOT'.$this->Auth->user('id').'))) ORDER BY `position` ASC');

		$stmt = $conn->execute('SELECT countries.id as country_id, countries.name, countries.flag, votes.id as vote_id, countries.position, votes.user_id, votes.overall_score, votes.song_score, votes.singer_score, votes.staging_score FROM `countries` LEFT JOIN `votes` ON votes.country_id = countries.id and `user_id`='.$this->Auth->user('id').' WHERE countries.position IS NOT NULL ORDER BY position ASC');
		
		$voterecord = $stmt->fetchAll('assoc');
		
		$user = $this->Auth->user('id');
	    
        $this->set(compact('voterecord', 'user'));
        $this->set('_serialize', ['voterecord', 'user']);
    }
    public function isAuthorized($user)
	{
	    $action = $this->request->getParam('action');
	
	    // The add and index actions are always allowed.
	    if (in_array($action, ['index', 'add', 'tags'])) {
	        return true;
	    }
	}


}
