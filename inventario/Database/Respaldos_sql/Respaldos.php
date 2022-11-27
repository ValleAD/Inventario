            <?php

$connection = mysqli_connect('localhost','root','','hospital');
$tables = array();

$result = mysqli_query($connection,"SHOW TABLES");
while($rowqqqq = mysqli_fetch_row($result)){
  $tables[] = $rowqqqq[0];
}
$return = 'CREATE DATABASE IF NOT EXISTS `hospital` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `hospital` ;

';


  $result16 = mysqli_query($connection,"SELECT * FROM tb_productos");
  $result1 = mysqli_query($connection,"SELECT * FROM tb_usuarios");
  $result2 = mysqli_query($connection,"SELECT * FROM tb_vale");
  $result3 = mysqli_query($connection,"SELECT * FROM tb_bodega");
  $result4 = mysqli_query($connection,"SELECT * FROM tb_circulante");
  $result5 = mysqli_query($connection,"SELECT * FROM tb_compra");
  $result6 = mysqli_query($connection,"SELECT * FROM tb_almacen");
  $result7 = mysqli_query($connection,"SELECT * FROM selects_departamento");
  $result8 = mysqli_query($connection,"SELECT * FROM selects_unidad_medida");
  $result9 = mysqli_query($connection,"SELECT * FROM selects_categoria");
  $result10 = mysqli_query($connection,"SELECT * FROM selects_dependencia");
  $result11 = mysqli_query($connection,"SELECT * FROM detalle_vale");
  $result12 = mysqli_query($connection,"SELECT * FROM detalle_bodega");
  $result13 = mysqli_query($connection,"SELECT * FROM detalle_compra");
  $result14 = mysqli_query($connection,"SELECT * FROM detalle_almacen");
  $result15 = mysqli_query($connection,"SELECT * FROM detalle_circulante");
  $result17 = mysqli_query($connection,"SELECT * FROM historial");

  $num_fields = mysqli_num_fields($result16);
  $num_fields1 = mysqli_num_fields($result1);
  $num_fields2 = mysqli_num_fields($result2);
  $num_fields3 = mysqli_num_fields($result3);
  $num_fields4 = mysqli_num_fields($result4);
  $num_fields5 = mysqli_num_fields($result5);
  $num_fields6 = mysqli_num_fields($result6);
  $num_fields7 = mysqli_num_fields($result7);
  $num_fields8 = mysqli_num_fields($result8);
  $num_fields9 = mysqli_num_fields($result9);
  $num_fields10 = mysqli_num_fields($result10);
  $num_fields11 = mysqli_num_fields($result11);
  $num_fields12 = mysqli_num_fields($result12);
  $num_fields13 = mysqli_num_fields($result13);
  $num_fields14 = mysqli_num_fields($result14);
  $num_fields15 = mysqli_num_fields($result15);
  $num_fields16 = mysqli_num_fields($result17);

  $row1 = mysqli_fetch_row(mysqli_query($connection,"SHOW CREATE TABLE tb_almacen"));
  $return .= "\n\n".$row1[1].";\n\n";
  
  for($i=0;$i<$num_fields;$i++){
    while($row = mysqli_fetch_row($result6)){
      $return .= "INSERT INTO tb_almacen VALUES(";
      for($j=0;$j<$num_fields;$j++){
        $row[$j] = addslashes($row[$j]);
        if(isset($row[$j])){ $return .= '"'.$row[$j].'"';}
        else{ $return .= '""';}
        if($j<$num_fields-1){ $return .= ',';}
      }
      $return .= ");\n";
    }
  }

  $row2 = mysqli_fetch_row(mysqli_query($connection,"SHOW CREATE TABLE tb_bodega"));
    $return .= "\n\n".$row2[1].";\n\n";
  for($i2=0;$i2<$num_fields3;$i2++){
    while($row22 = mysqli_fetch_row($result12)){
      $return .= "INSERT INTO tb_bodega VALUES(";
      for($j1=0;$j1<$num_fields3;$j1++){
        $row22[$j1] = addslashes($row22[$j1]);
        if(isset($row22[$j1])){ $return .= '"'.$row22[$j1].'"';}
        else{ $return .= '""';}
        if($j1<$num_fields3-1){ $return .= ',';}
      }
      $return .= ");\n";
    }
  }



  $row3 = mysqli_fetch_row(mysqli_query($connection,"SHOW CREATE TABLE tb_circulante"));
  $return .= "\n\n".$row3[1].";\n\n";
  
  for($ic=0;$ic<$num_fields4;$ic++){
    while($row_c = mysqli_fetch_row($result4)){
      $return .= "INSERT INTO tb_circulante VALUES(";
      for($c=0;$c<$num_fields4;$c++){
        $row_c[$c] = addslashes($row_c[$c]);
        if(isset($row_c[$c])){ $return .= '"'.$row_c[$c].'"';}
        else{ $return .= '""';}
        if($c<$num_fields4-1){ $return .= ',';}
      }
      $return .= ");\n";
    }
  }

  $row4 = mysqli_fetch_row(mysqli_query($connection,"SHOW CREATE TABLE tb_compra"));
  $return .= "\n\n".$row4[1].";\n\n";
  
  for($id=0;$id<$num_fields5;$id++){
    while($row_d = mysqli_fetch_row($result5)){
      $return .= "INSERT INTO tb_compra VALUES(";
      for($d=0;$d<$num_fields5;$d++){
        $row_d[$d] = addslashes($row_d[$d]);
        if(isset($row_d[$d])){ $return .= '"'.$row_d[$d].'"';}
        else{ $return .= '""';}
        if($d<$num_fields5-1){ $return .= ',';}
      }
      $return .= ");\n";
    }
  }


  $row5 = mysqli_fetch_row(mysqli_query($connection,"SHOW CREATE TABLE tb_productos"));
  $return .= "\n\n".$row5[1].";\n\n";
  
  for($ie=0;$ie<$num_fields;$ie++){
    while($row_e = mysqli_fetch_row($result16)){
      $return .= "INSERT INTO tb_productos VALUES(";
      for($e=0;$e<$num_fields;$e++){
        $row_e[$e] = addslashes($row_e[$e]);
        if(isset($row_e[$e])){ $return .= '"'.$row_e[$e].'"';}
        else{ $return .= '""';}
        if($e<$num_fields-1){ $return .= ',';}
      }
      $return .= ");\n";
    }
  }



  $row6 = mysqli_fetch_row(mysqli_query($connection,"SHOW CREATE TABLE tb_usuarios"));
  $return .= "\n\n".$row6[1].";\n\n";
  
  for($f=0;$f<$num_fields1;$f++){
    while($row_f = mysqli_fetch_row($result1)){
      $return .= "INSERT INTO tb_usuarios VALUES(";
      for($f=0;$f<$num_fields1;$f++){
        $row_f[$f] = addslashes($row_f[$f]);
        if(isset($row_f[$f])){ $return .= '"'.$row_f[$f].'"';}
        else{ $return .= '""';}
        if($f<$num_fields1-1){ $return .= ',';}
      }
      $return .= ");\n";
    }
  }
  $row7 = mysqli_fetch_row(mysqli_query($connection,"SHOW CREATE TABLE tb_vale"));
  $return .= "\n\n".$row7[1].";\n\n";
  
  for($ig=0;$ig<$num_fields2;$ig++){
    while($row_g = mysqli_fetch_row($result2)){
      $return .= "INSERT INTO tb_vale VALUES(";
      for($g=0;$g<$num_fields2;$g++){
        $row_g[$g] = addslashes($row_g[$g]);
        if(isset($row_g[$g])){ $return .= '"'.$row_g[$g].'"';}
        else{ $return .= '""';}
        if($g<$num_fields2-1){ $return .= ',';}
      }
      $return .= ");\n";
    }
  }

  $row8 = mysqli_fetch_row(mysqli_query($connection,"SHOW CREATE TABLE detalle_compra"));
  $return .= "\n\n".$row8[1].";\n\n";
  
  for($h=0;$h<$num_fields13;$h++){
    while($row_h = mysqli_fetch_row($result13)){
      $return .= "INSERT INTO detalle_compra VALUES(";
      for($h=0;$h<$num_fields13;$h++){
        $row_h[$h] = addslashes($row_h[$h]);
        if(isset($row_h[$h])){ $return .= '"'.$row_h[$h].'"';}
        else{ $return .= '""';}
        if($h<$num_fields13-1){ $return .= ',';}
      }
      $return .= ");\n";
    }
  }


  $row9 = mysqli_fetch_row(mysqli_query($connection,"SHOW CREATE TABLE detalle_almacen"));
  $return .= "\n\n".$row9[1].";\n\n";
  
  for($ii=0;$ii<$num_fields14;$ii++){
    while($row_i = mysqli_fetch_row($result14)){
      $return .= "INSERT INTO detalle_almacen VALUES(";
      for($i=0;$i<$num_fields14;$i++){
        $row_i[$i] = addslashes($row_i[$i]);
        if(isset($row_i[$i])){ $return .= '"'.$row_i[$i].'"';}
        else{ $return .= '""';}
        if($i<$num_fields14-1){ $return .= ',';}
      }
      $return .= ");\n";
    }
  }



  $row10 = mysqli_fetch_row(mysqli_query($connection,"SHOW CREATE TABLE detalle_bodega"));
  $return .= "\n\n".$row10[1].";\n\n";
  
  for($ij=0;$ij<$num_fields12;$ij++){
    while($row_j = mysqli_fetch_row($result12)){
      $return .= "INSERT INTO detalle_bodega VALUES(";
      for($j=0;$j<$num_fields12;$j++){
        $row_j[$j] = addslashes($row_j[$j]);
        if(isset($row_j[$j])){ $return .= '"'.$row_j[$j].'"';}
        else{ $return .= '""';}
        if($j<$num_fields12-1){ $return .= ',';}
      }
      $return .= ");\n";
    }
  }
    $row11 = mysqli_fetch_row(mysqli_query($connection,"SHOW CREATE TABLE detalle_vale"));
  $return .= "\n\n".$row11[1].";\n\n";
  
  for($ik=0;$ik<$num_fields11;$ik++){
    while($row_k = mysqli_fetch_row($result11)){
      $return .= "INSERT INTO detalle_vale VALUES(";
      for($k=0;$k<$num_fields11;$k++){
        $row_k[$k] = addslashes($row_k[$k]);
        if(isset($row_k[$k])){ $return .= '"'.$row_k[$k].'"';}
        else{ $return .= '""';}
        if($k<$num_fields11-1){ $return .= ',';}
      }
      $return .= ");\n";
    }
  }


  $row12 = mysqli_fetch_row(mysqli_query($connection,"SHOW CREATE TABLE detalle_circulante"));
  $return .= "\n\n".$row12[1].";\n\n";
  
  for($il=0;$il<$num_fields15;$il++){
    while($row_l = mysqli_fetch_row($result15)){
      $return .= "INSERT INTO detalle_circulante VALUES(";
      for($l=0;$l<$num_fields15;$l++){
        $row_l[$l] = addslashes($row_l[$l]);
        if(isset($row_l[$l])){ $return .= '"'.$row_l[$l].'"';}
        else{ $return .= '""';}
        if($l<$num_fields15-1){ $return .= ',';}
      }
      $return .= ");\n";
    }
  }


  $row13 = mysqli_fetch_row(mysqli_query($connection,"SHOW CREATE TABLE selects_dependencia"));
  $return .= "\n\n".$row13[1].";\n\n";
  
  for($im=0;$im<$num_fields12;$im++){
    while($row_m = mysqli_fetch_row($result12)){
      $return .= "INSERT INTO selects_dependencia VALUES(";
      for($m=0;$m<$num_fields12;$m++){
        $row_m[$m] = addslashes($row_m[$m]);
        if(isset($row_m[$m])){ $return .= '"'.$row_m[$m].'"';}
        else{ $return .= '""';}
        if($m<$num_fields12-1){ $return .= ',';}
      }
      $return .= ");\n";
    }
  }
    $row14 = mysqli_fetch_row(mysqli_query($connection,"SHOW CREATE TABLE selects_categoria"));
  $return .= "\n\n".$row14[1].";\n\n";
  
  for($in=0;$in<$num_fields9;$in++){
    while($row_n = mysqli_fetch_row($result9)){
      $return .= "INSERT INTO selects_categoria VALUES(";
      for($n=0;$n<$num_fields9;$n++){
        $row_n[$n] = addslashes($row_n[$n]);
        if(isset($row_n[$n])){ $return .= '"'.$row_n[$n].'"';}
        else{ $return .= '""';}
        if($n<$num_fields9-1){ $return .= ',';}
      }
      $return .= ");\n";
    }
  }


  $row15 = mysqli_fetch_row(mysqli_query($connection,"SHOW CREATE TABLE selects_unidad_medida"));
  $return .= "\n\n".$row15[1].";\n\n";
  
  for($oi=0;$oi<$num_fields8;$oi++){
    while($row_o = mysqli_fetch_row($result8)){
      $return .= "INSERT INTO selects_unidad_medida VALUES(";
      for($o=0;$o<$num_fields8;$o++){
        $row_o[$o] = addslashes($row_o[$o]);
        if(isset($row_o[$o])){ $return .= '"'.$row_o[$o].'"';}
        else{ $return .= '""';}
        if($o<$num_fields8-1){ $return .= ',';}
      }
      $return .= ");\n";
    }
  }



  $row16 = mysqli_fetch_row(mysqli_query($connection,"SHOW CREATE TABLE selects_departamento"));
  $return .= "\n\n".$row16[1].";\n\n";
  
  for($ip=0;$ip<$num_fields7;$ip++){
    while($row_p = mysqli_fetch_row($result7)){
      $return .= "INSERT INTO selects_departamento VALUES(";
      for($p=0;$p<$num_fields7;$p++){
        $row_p[$p] = addslashes($row_p[$p]);
        if(isset($row_p[$p])){ $return .= '"'.$row_p[$p].'"';}
        else{ $return .= '""';}
        if($p<$num_fields7-1){ $return .= ',';}
      }
      $return .= ");\n";
    }
  }
  $row17 = mysqli_fetch_row(mysqli_query($connection,"SHOW CREATE TABLE historial"));
  $return .= "\n\n".$row16[1].";\n\n";
  
  for($iq=0;$iq<$num_fields16;$iq++){
    while($row_q = mysqli_fetch_row($result17)){
      $return .= "INSERT INTO historial VALUES(";
      for($q=0;$q<$num_fields7;$q++){
        $row_q[$q] = addslashes($row_q[$q]);
        if(isset($row_q[$q])){ $return .= '"'.$row_q[$q].'"';}
        else{ $return .= '""';}
        if($q<$num_fields7-1){ $return .= ',';}
      }
      $return .= ");\n";
    }
  }

//save file
$handle = fopen("hospital_backup.sql","w+");
header('location: hospital_backup.sql');
fwrite($handle,$return);
fclose($handle);
?>
