<?php
class friends
{
   static public function readerfriendShip($member_id_one, $member_id_two, $type)
   {
     if(!empty($member_id_one) && !empty($member_id_two) )
        {

          global $mydb;	
          //render the buttons
          switch ($type) {
          	case 'isThereRequestpending':
          		$qurey=$mydb->setQuery("SELECT * `friend` WHERE `member_id_one`='".$member_id_one."' AND `member_id_two`='".$member_id_two."' AND `friend_offical`='0' OR `member_id_one`='".$member_id_two."' AND `member_id_two`='".$member_id_one."' AND `friend_offical`='0'");
                   $qurey = $mydb->loadResultList();
                  return $qurey->rowCount();

          		       break;
          	         case 'isThereFriendShip':
          		 		$qurey=$mydb->setQuery("SELECT * `friend` WHERE `member_id_one`='".$member_id_one."' AND `member_id_two`='".$member_id_two."' AND `friend_offical`='1' OR `member_id_one`='".$member_id_two."' AND `member_id_two`='".$member_id_one."' AND `friend_offical`='0'");
                      $qurey = $mydb->loadResultList();
                  return $qurey->rowCount();






          		break;
          	
                     }

          }

   }


}


?>