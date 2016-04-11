<?php
/*
*	File:   index.php
*	By:     Shaelyn Ellis
*	Date:   03.15.2014
*
*	This script is still used with task_list.php  
*       to modify the now present session array 
*       and set to hold array items for a year until expiry
*
*=====================================
*/

$lifetime = 3.15569e7; //setting lifetime variable to a year, in seconds
session_name('TLM');    //name the session to assist with debugging/locating
ini_set('session.cookie_lifetime',  $lifetime); //cookie session set for a year
ini_set('session.gc_maxlifetime',  $lifetime); //"garbage collection" set at least a year
session_set_cookie_params($lifetime);   //set parameters of session cookie to accept a year
session_start();

//if session has already started and array isn't present, then create it
if(isset($_COOKIE['TLM']) && !isset($_SESSION['tasks'])){
    $_SESSION['tasks'] = array();
}
    //if form is submitted...
    if (($_SERVER['REQUEST_METHOD'] == 'POST')) {
        //if session array is set, run methods
        if(isset($_SESSION['tasks'])){
            switch( $_POST['action'] ) {
                case 'add':
                    $new_task = $_POST['newtask'];
                    if (empty($new_task)) {
                        $errors[] = 'The new task cannot be empty.';
                    } else {
                        $_SESSION['tasks'][] = $new_task;
                        //print_r ($_SESSION['tasks']); TESTING
                    }
                    break;
                    case 'delete':
                        $task_index = $_POST['taskid'];
                        unset($_SESSION['tasks'][$task_index]);
                        $_SESSION['tasks'] = array_values($_SESSION['tasks']);
                        //print_r ($_SESSION['tasks']); TESTING
                        break;
                 }
           }    
    }
   include('task_list.php');
?>