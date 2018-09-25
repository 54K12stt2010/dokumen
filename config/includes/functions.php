<?php
//Srinivas Tamada http://9lessons.info
//Wall_Updates
include_once 'includes/sqlfilter2.php';






class Wall_Updates {


    
     // Updates   	
	  public function Updates($uid) 
	{
	    /*$query = pg_query("SELECT M.msg_id, M.uid_fk, M.message,M.tentang, M.created, U.username FROM messages M, users U  WHERE M.uid_fk=U.uid and M.uid_fk='$uid' order by M.msg_id desc ") or die(pg_error()); */


	    $query = pg_query("select hasil.*,(select nama from sdm.karyawan where sdm.karyawan.nid=hasil.username)as username,(select gbidang from sdm.karyawan where sdm.karyawan.nid=hasil.username)as bidang from (SELECT M.msg_id, M.uid_fk, M.message,M.tentang, M.created,(select username from comment.users where users.uid=M.uid_fk) as username,(select status from comment.users where users.uid=M.uid_fk) as status FROM comment.messages M )as hasil order by hasil.msg_id desc") or die(pg_error());

         while($row=pg_fetch_array($query))
		$data[]=$row;
	    return $data;
		
    }
	//Comments
	   public function Comments($msg_id) 
	{
	    /*$query = pg_query("SELECT C.com_id, C.uid_fk, C.comment, C.created, U.username FROM comment.comments C, comment.users U WHERE C.uid_fk=U.uid and C.msg_id_fk='$msg_id' order by C.com_id asc ") or die(pg_error()); */
	    $query = pg_query("select hasil.*,K.nama nama,K.gbidang bidang from(SELECT C.com_id, C.uid_fk, C.comment, C.created, U.username FROM comment.comments C, comment.users U WHERE C.uid_fk=U.uid and C.msg_id_fk='$msg_id') as hasil,sdm.karyawan K where hasil.username=K.nid order by hasil.com_id asc") or die(pg_error());

	   while($row=pg_fetch_array($query))
	    $data[]=$row;
        if(!empty($data))
		{
       return $data;
         }
	}
	
	//Avatar Image
	public function Gravatar($uid) 
	{
	    $query = pg_query("SELECT '$host_gallery/sms/user/'||K.foto as foto FROM sdm.karyawan K,comment.users U WHERE U.uid=$uid and K.nid=U.username") or die(pg_error());
		
//	    $query = pg_query("SELECT 'http://localhost/sms/user/'||K.foto as foto FROM sdm.karyawan K,comment.users U WHERE U.uid=$uid and K.nid=U.username") or die(pg_error());		
	   $row=pg_fetch_array($query);
	   if(!empty($row))
	   {
	    /*$email=$row['email'];
        $imagecode = md5( $lowercase ); */
		;
		$data=$row["foto"];
//        $lowercase = strtolower($email);
		return $data;
         }
		 else
		 {
		 $data="default.jpg";
		return $data;
		 }
	}
	
	//Insert Update
	public function Insert_Update($uid,$tentang,$update) 
	{
    //$pswd = sqlfilter($_POST['password']);
	//$update=htmlentities($update);
	//$tentang=htmlentities($tentang);	
	$update=sqlfilter2(htmlentities($update));
	$tentang=sqlfilter2(htmlentities($tentang));	
	   $time=time();
	   $ip=$_SERVER['REMOTE_ADDR'];
        $query = pg_query("SELECT msg_id,tentang,message FROM comment.messages WHERE uid_fk='$uid' order by msg_id desc limit 1") or die(pg_error());
        $result = pg_fetch_array($query);
		
        if ($update!=$result['message']) {
            $query = pg_query("INSERT INTO comment.messages (tentang,message, uid_fk, ip,created) VALUES ('$tentang','$update', '$uid', '$ip','$time')") or die(pg_error());
            $newquery = pg_query("SELECT M.msg_id, M.uid_fk, M.tentang,M.message, M.created, U.username FROM comment.messages M, comment.users U where M.uid_fk=U.uid and M.uid_fk='$uid' order by M.msg_id desc limit 1 ");
            $result = pg_fetch_array($newquery);
			 return $result;
        } 
		else
		{
				 return false;
		}
		
       
    }
	
	//Delete update
		public function Delete_Update($uid, $msg_id) 
	{
	    $query = pg_query("DELETE FROM comment.comments WHERE msg_id_fk = '$msg_id' ") or die(pg_error());
        $query = pg_query("DELETE FROM comment.messages WHERE msg_id = '$msg_id' and uid_fk='$uid'") or die(pg_error());
        return true;
      	       
    }
	
	//Insert Comments
	public function Insert_Comment($uid,$msg_id,$comment) 
	{
	$comment=sqlfilter2(htmlentities($comment));
	   	    $time=time();
	   $ip=$_SERVER['REMOTE_ADDR'];
        $query = pg_query("SELECT com_id,comment FROM comment.comments WHERE uid_fk='$uid' and msg_id_fk='$msg_id' order by com_id desc limit 1 ") or die(pg_error());
        $result = pg_fetch_array($query);
    
		if ($comment!=$result['comment']) {
            $query = pg_query("INSERT INTO comment.comments (comment, uid_fk,msg_id_fk,ip,created) VALUES ('$comment', '$uid','$msg_id', '$ip','$time')") or die(pg_error());
            $newquery = pg_query("select hasil.* from (SELECT C.com_id, C.uid_fk, C.comment, C.msg_id_fk, C.created, U.username FROM comment.comments C, comment.users U where C.uid_fk=U.uid and C.uid_fk='$uid' and C.msg_id_fk='$msg_id' order by C.com_id desc limit 1 ) as hasil");
            $result = pg_fetch_array($newquery);
         
		   return $result;
        } 
		else
		{
		return false;
		}
       
    }
	
	//Delete Comments
		public function Delete_Comment($uid, $com_id) 
	{
	    $query = pg_query("DELETE FROM comment.comments WHERE com_id='$com_id'") or die(pg_error());
        return true;
      	       
    }

    

}

?>
