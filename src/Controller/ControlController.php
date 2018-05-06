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


      //get current counter
      $data['current'] = $modearray['id'];
      //set initial value of update to false
      $data['update'] = false;
      //check if it's ajax call with POST containing current (for user) counter;
      //and check if that counter is diffrent from the one in database
      if(isset($_POST) && !empty($_POST['counter']) && (int)$_POST['counter']!=$data['current']){
      	//the counters are diffrent so get new message list
      	$data['update'] = true;
      }

        # Return current state
        $this->set(compact('dash'));
        $this->set('_serialize', ['dash']);
        $this->layout = 'ajax';
        $this->render();

    }

	public function initialize()
	{
	  parent::initialize();
    $this->loadComponent('RequestHandler');
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
      $modearray = $stmt->fetch('assoc');
      $country_id = $modearray['country'];
      $mode = $modearray['mode'];

        $this->set(compact('modearray'));
        $this->set('_serialize', ['modearray']);
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
