<?php

namespace ITC\CMS;

require_once('core/mvc/model/entities/User.php');

class c_rightsControl extends controller {

    public function __construct() {
        parent::__construct("rightscontrol");
        $this->setIsPublic(FALSE);
    }

    public function start() {
        $isUsernameSet = isset($_GET["username"]);
        $isEmailSet = isset($_GET["email"]);
        $isApplyRightIDSet = isset($_POST["rightID"]);
        $isRightValueSet = isset($_POST["rightValue"]);

        if ($isUsernameSet || $isEmailSet) {
            if(isset($_POST['cms-rights#name'])){
                $user = new User();
                $user->loadByUsername($_POST['cms-rights#name']);
                foreach($_POST['cms-rights'] as $id => $right){
                    if($right == "on"){
                        $rightbool = 1;
                    } else {
                        $rightbool = 0;
                    }
                    $user->setRight($id, $rightbool);
                }
                header('Location: '.BACKENDURL.'index.php?page=rightscontrol');
                die();
            }
            $user = new User();

            if ($isUsernameSet) {
                $user->loadByUsername($_GET["username"]);
            } else {
                $user->loadByEmail($_GET["email"]);
            }
//             if ($isRightValueSet && $isApplyRightIDSet) {
//                 $user->setRight($_POST["rightId"], $_POST["rightValue"]);
//             }

            $allRights = $user->getRights();
            $result = array();
            for ($i = 0; $i < count($allRights); $i++) {
                $result[$i] = array(
                    'id' => $allRights[$i],
                    'bezeichnung' => $user->getRightName($allRights[$i]),
                    'wert' => $user->checkRight($allRights[$i])
                );
            }
            $result['user'] = $user->getUsername();

            $this->view->setData($result);
        } else {
            new Model(); //q+d
            $this->view->setData(array('users' => Model::getUsers()));
        }

        $this->view->out();
    }

}
