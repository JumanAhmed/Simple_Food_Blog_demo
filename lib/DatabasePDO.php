<?php  


Class Database{
	
	function __construct()
	{
        self::connectDB();
		
	}


    private function connectDB(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        global $conn;

        try {
            $conn = new PDO("mysql:host=$servername;dbname=db_foodie", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "DB CONNECTED"; 
            }
        catch(PDOException $e)
            {
            echo "Connection failed: " . $e->getMessage();
            }
               
        }



    public function insertrestaurent($rname,$location,$address,$rtime,$cuisine,$phone,$email,$fb,$parking,$ac,$uploaded_image,$mapid){

        global $conn;

        $query = $conn->prepare("INSERT INTO tbl_restaurants (rname,location,address,rtime,cuisine,phone,email,fb,parking,ac,image,mapid) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $query->execute(array($rname,$location,$address,$rtime,$cuisine,$phone,$email,$fb,$parking,$ac,$uploaded_image,$mapid));

        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function getRestaurantsAllInfo(){
        global $conn;

         $query = $conn->prepare("SELECT * FROM tbl_restaurants");
         $query ->execute();
         $allinfo = $query->fetchAll(PDO::FETCH_ASSOC);

         return $allinfo;
    }


    public function getRestaurentsById($editId){
        global $conn;

         $query = $conn-> prepare("SELECT * FROM tbl_restaurants WHERE id = ?");
         $query ->execute(array($editId));
         $info = $query->fetchAll(PDO::FETCH_ASSOC);

         return $info;
    }

    public function upRestWitNewImg($rname,$location,$address,$rtime,$cuisine,$phone,$email,$fb,$parking,$ac,$uploaded_image,$mapid,$editId){

        global $conn;

         $query = $conn->prepare("UPDATE tbl_restaurants SET 
                                  rname = ?,
                                  location = ?,
                                  address = ?,
                                  rtime= ?,
                                  cuisine = ?,
                                  phone = ?,
                                  email = ?,
                                  fb = ?,
                                  parking = ?,
                                  ac = ?,
                                  image = ?,
                                  mapid = ?
                                 WHERE  id = ?");
         $query->execute(array($rname,$location,$address,$rtime,$cuisine,$phone,$email,$fb,$parking,$ac,$uploaded_image,$mapid,$editId));

        if ($query) {
            return true;
        } else {
            return false;
        }

    }

    public function upRestWitOldImg($rname,$location,$address,$rtime,$cuisine,$phone,$email,$fb,$parking,$ac,$mapid,$editId){

        global $conn;

         $query = $conn->prepare("UPDATE tbl_restaurants SET 
                                  rname = ?,
                                  location = ?,
                                  address = ?,
                                  rtime= ?,
                                  cuisine = ?,
                                  phone = ?,
                                  email = ?,
                                  fb = ?,
                                  parking = ?,
                                  ac = ?,
                                  mapid = ?
                                 WHERE  id = ?");
         $query->execute(array($rname,$location,$address,$rtime,$cuisine,$phone,$email,$fb,$parking,$ac,$mapid,$editId));

        if ($query) {
            return true;
        } else {
            return false;
        }
    }



   public function deleterestoById($restid){
         global $conn;

         $query = $conn-> prepare("DELETE FROM tbl_restaurants WHERE id = ?");
         $query->execute(array($restid));

        if ($query) {
            return true;
        } else {
            return false;
        }

   }


   public function insertMenu($r_id,$name,$taka){
        global $conn;

        $query = $conn->prepare("INSERT INTO tbl_menu (r_id,name,tk) VALUES (?, ?,?)");
        $query->execute(array($r_id,$name,$taka));

        if ($query) {
            return true;
        } else {
            return false;
        }
   }



   public function menulist(){
         global $conn;

         $query = $conn-> prepare("SELECT tbl_menu.*, tbl_restaurants.rname FROM tbl_menu INNER JOIN tbl_restaurants ON tbl_menu.r_id = tbl_restaurants.id");
         $query ->execute();
         $info = $query->fetchAll(PDO::FETCH_ASSOC);
         //$info = $query->rowCount();

         return $info;
    }

  public function getmenuById($editid){
        global $conn;

         $query = $conn->prepare("SELECT * FROM tbl_menu  WHERE id = ?");
         $query ->execute(array($editid));
         $allinfo = $query->fetchAll(PDO::FETCH_ASSOC);

         return $allinfo;

  }


  public function updateMenu($r_id,$name,$taka,$editid){
    global $conn;

         $query = $conn->prepare("UPDATE tbl_menu SET 
                                  r_id = ?, 
                                  name = ?, 
                                  tk = ?
                                 WHERE  id = ?");
         $query->execute(array($r_id,$name,$taka,$editid));

        if ($query) {
            return true;
        } else {
            return false;
        }

  }


 public function deleteMenuitem($delid){
     global $conn;

         $query = $conn-> prepare("DELETE FROM tbl_menu WHERE id = ?");
         $query->execute(array($delid));

        if ($query) {
            return true;
        } else {
            return false;
        }
 }

 public function getmenuByRestId($restid){
     global $conn;

         $query = $conn->prepare("SELECT * FROM tbl_menu  WHERE r_id = ?");
         $query ->execute(array($restid));
         $allinfo = $query->fetchAll(PDO::FETCH_ASSOC);

         return $allinfo;
 }

public function loginFoodieAdmin($uname,$pwd){
        global $conn;

         $query = $conn->prepare("SELECT * FROM tbl_users  WHERE uname = ? AND pwd = ?");
         $query ->execute(array($uname,$pwd));
         
         return $query;
        
    }

public function becomeAfoodie($firstName, $lastName, $uname, $email, $pwd){

    global $conn;
        $query = $conn-> prepare("SELECT id FROM tbl_users WHERE uname = ? OR email = ?");
        $query ->execute(array($uname, $email));
        $num = $query->rowCount();

        if($num == 0){
            $query = $conn->prepare("INSERT INTO tbl_users (first_name,last_name,uname,email,pwd) VALUES (?, ?, ?, ?, ?)");
             $query->execute(array($firstName, $lastName, $uname, $email, $pwd));

             return true;
        }else {
            return false;
        }

}



public function userlogin($email,$pwd){
        global $conn;

         $query = $conn->prepare("SELECT * FROM tbl_users  WHERE email = ? AND pwd = ?");
         $query ->execute(array($email,$pwd));
         
         return $query;
        
    }



 public function insertFoodItemReview($rid,$mid,$uid,$sortTitle,$details){
         global $conn;

        $query = $conn->prepare("INSERT INTO tbl_fooditem_review (r_id,m_id,u_id,comment_title,commetn_details) VALUES (?, ?, ?, ?, ?)");
        $query->execute(array($rid,$mid,$uid,$sortTitle,$details));

        if ($query) {
            return true;
        } else {
            return false;
        }
    }

public function getAllReviewByRestID($restid){
    global $conn;

         $query = $conn->prepare("SELECT * FROM tbl_fooditem_review  WHERE r_id = ?");
         $query ->execute(array($restid));
         $allinfo = $query->fetchAll(PDO::FETCH_ASSOC);

         return $allinfo;
    
}

public function insertCarousel($uploaded_image,$title,$descrition){
      global $conn;

    $query = $conn->prepare("INSERT INTO tbl_carousel(image,title,cription) VALUES (?, ?, ?)");
        $query->execute(array($uploaded_image,$title,$descrition));

        if ($query) {
            return true;
        } else {
            return false;
        }
}

public function selectAllFromCarousel(){
    global $conn;

         $query = $conn->prepare("SELECT * FROM tbl_carousel");
         $query ->execute();
         $allinfo = $query->fetchAll(PDO::FETCH_ASSOC);

         return $allinfo;
}


public function getUserNameByID($uid){
        global $conn;

         $query = $conn->prepare("SELECT * FROM tbl_users  WHERE id = ?");
         $query ->execute(array($uid));
         $allinfo = $query->fetchAll(PDO::FETCH_ASSOC);

         return $allinfo;

  }



}


?>

