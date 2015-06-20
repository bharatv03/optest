<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/*
 * This class is used as the index class which is called first when the site is loaded
 */
class UsersController extends AppController {
    public $uses = array('User');
    public $components = array('Session');
    
    /*
     * this function is used to make user login and check its credentials
     */
    function login(){
            if($this->request->data)
            {
                $email = $this->request->data['u_er'];
                $password = md5($this->request->data['pass']);
                if (preg_match("/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,4}/", $email))
                {
                    if($password != "")
                    {
                        $userData = $this->User->find('all', array('conditions' => array('email' => $email, 'password'=>$password)));
                        if(sizeof($userData))
                        {
                            if($userData[0]['User']['status'] == 1)
                            {
                                $this->Session->write('userLog',$userData[0]['User']);
                                return $this->redirect(array('controller' => 'optest', 'action' => 'home'));
                            }
                            else
                            {
                                $this->Session->write('errorMsg',"Please activate your account.");
                            }
                        }
                        else
                        {
                            $this->Session->write('errorMsg',"Email / Password incorrect.");
                        }
                    }
                    else
                    {
                        $this->Session->write('errorMsg',"Please enter password");
                    }
                }
                else
                {
                    $this->Session->write('errorMsg',"Please enter valid email");
                }
            }
        return $this->redirect(array('controller' => 'optest', 'action' => 'index'));
    }

    /*
     *this function is used to make user signup in differenct categories of institute, individual students and  students under institutes
     */
    function signup(){
        $this->layout = false;
        if($this->request->data)
        {
            $email = $this->request->data['u_e'];
            $password = $this->request->data['password'];
            $cpassword = $this->request->data['cpassword'];
            if($this->Session->read('answer') == $this->request->data['captcha_box'])
            {
                if (preg_match("/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,4}/", $email))
                {
                    if( $password == $cpassword )
                    {
                        $userData = $this->User->find('all', array('conditions' => array('email' => $email)));
                        if(!sizeof($userData))
                        {
                            $saveData['email'] = $email;
                            $saveData['activation_link'] = md5($email);
                            $saveData['password'] = md5($password);
                            $saveData['user_type'] = $this->request->data['user_type'];
                            $this->User->save($saveData);
                            $this->Session->setFlash('Please check your email to activate your account');
                            $subject = ACTIVATION_SUBJECT;
                            $mesage = "Hello user, <br /> please click on the link ".BASE_URL.$this->webroot."users/activateaccount/".md5($email)." to activate your account.";
                            $mesage .= "<br /><br />From Optest";
                            $Email = new CakeEmail('smtp');
                            $Email->to($email);
                            $Email->subject($subject);
                            $Email->replyTo('the_mail_you_want_to_receive_replies@yourdomain.com');
                            $Email->from ('no-reply@optest.com');
                            $Email->send($mesage);
                            echo 'yes';
                            die;
                        }
                        else
                        {
                            echo "This email is already in use please select different email";
                            die;
                        }
                    }
                    else
                    {
                        echo "Please enter same password";
                        die;
                    }
                }
                else
                {
                    echo "Please enter valid email";
                    die;
                }
            }
            else
            {
                echo 'Please enter correct captcha value';
                die;
            }
        }
    }
    
    /*
     *this function is used to make user signup in differenct categories of institute, individual students and  students under institutes
     */
    function logout(){
        if($this->Session->check('userLog'))
        {
            $this->Session->delete('userLog');
            $this->Session->delete('language');
            $this->Session->delete('paperId');
            $this->Session->delete('time');
            $this->Session->delete('paperSetMaster');
            $this->Session->delete('sectionMenu');
            $this->Session->delete('paperData');
            $this->Session->delete('activeQue');
            $this->Session->delete('queNo');
            $this->Session->delete('currentTab');
        }
        return $this->redirect(array('controller' => 'optest', 'action' => 'index'));
    }
    
    /*
     *this function is used to activate account
     */
    function activateaccount($email){
        $this->layout = "optest";
        $this->set('title','Optest Activation');
        $activationCheck = $this->User->find('all', array('conditions' => array('activation_link' => $email)));
        
        if( isset($activationCheck[0]['User']['status']) && $activationCheck[0]['User']['status'] == 0)
        {
            $this->User->updateAll(array('status'=>1), array('activation_link' => $email));
            $this->set('activation','sucess');
        }
        elseif( isset($activationCheck[0]['User']['status']) && $activationCheck[0]['User']['status'] == 1)
        {
            $this->set('activation','Your account is already active.');
        }
        else
        {
            $this->set('activation','Your account has been deactivated due to some reasons, please drop us a message.');
        }
    }
    
    /*
     * the login page for students
     */
    function successlogin(){
        
    }
    
    /*
     * function for timer session
     */
    function updatetimer(){
        $timeData = $this->request->data;
        $newTime = array();
        $newTime[] = $timeData['ht'];
        $newTime[] = ($timeData['mt']+1)/10;
        $newTime[] = $timeData['st'];
        $this->Session->delete('time');
        $this->Session->write('time',$newTime);
        die;
    }
}
?>