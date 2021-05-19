<?php
function pg_connection_string_from_database_url(){
				extract(parse_url($_ENV["DATABASE_URL"]));
				return "user=$user password=$pass host=$host dbname=".substr($path,1);
			}
			$db = pg_connect(pg_connection_string_from_database_url());
			if(!$db){
				echo "Eror : Unable to open database\n";
			}else{
				echo "Opened database successfully\n";
			}
  $sql = "CREATE TABLE XE_OTO (ID INT PRIMARY KEY     NOT NULL, soXe CHAR(50), nhanhieu CHAR(50))";
  $ret = pg_query($db,$sql);
  if(!$ret){
     echo pg_last_error($db);
  }else {
      echo "Table create student successfully\n";
  }
  pg_close($db);
?>
