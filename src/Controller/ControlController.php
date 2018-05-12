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
        $this->set(compact('data'));
        $this->set('_serialize', ['data']);
        $this->viewBuilder()->setLayout('ajax');
        $this->render();

    }

    public function next()
    {

      $conn = ConnectionManager::get('default');
      $stmt = $conn->execute("SELECT * from control ORDER BY id DESC LIMIT 1");
      $modearray = $stmt->fetch('assoc');
      $country_id = $modearray['country'];
      $mode = $modearray['mode'];

      # If we're at the loading stage, set country to 1 and mode to 1

        if ($country_id == 0) {

          $stmt2 = $conn->execute("INSERT INTO control (country, mode) VALUES (1, 1)");

        }

      # If we're at the voting stage for a country, set the mode to 2

        elseif ($mode == 1) {

          $stmt2 = $conn->execute("INSERT INTO control (country, mode) VALUES (".$country_id.", 2)");

        }

      # If we're at the results stage, increment the country and set the mode to 1

      elseif ($mode == 2) {

        $next_country = $country_id + 1;

        $stmt2 = $conn->execute("INSERT INTO control (country, mode) VALUES (".$next_country.", 1)");

      }

      $this->viewBuilder()->setLayout('ajax');
      $this->render(false);

    }

    public function god() {


      
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
	    if (in_array($action, ['index', 'view', 'next'])) {
	        return true;
	    }
	}


    }
