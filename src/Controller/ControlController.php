<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;


/**
 * Control Controller
 *
 * @property \App\Model\Table\ControlTable $Control
 */
class ControlController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {

      $conn = ConnectionManager::get('default');
      $stmt = $conn->execute("SELECT * from control ORDER BY id DESC LIMIT 1");
      $modearray = $stmt->fetch('assoc');

      $country_id = $modearray['country'];
      $mode = $modearray['mode'];
      return(print($mode));

        # Return current state

        // $this->set(compact('dash'));
        // $this->set('_serialize', ['dash']);
    }

	public function initialize()
	{
	  parent::initialize();
		$this->Auth->allow(['index', 'view']);
	}
    /**
     * God mode method
     *
     * @param string|null $id Control id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function godmode()
    {

      # Get current mode

      $conn = ConnectionManager::get('default');
  		$stmt = $conn->execute("SELECT * from control ORDER BY id DESC LIMIT 1");
  		$mode = $stmt->fetchAll('assoc');

        $this->set(compact('mode'));
        $this->set('_serialize', ['mode']);
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
