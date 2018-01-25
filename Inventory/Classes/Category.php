<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Category
 *
 * @author lkmla
 */
class Category {
    function addCat($id,$name,$orderLevel){
      
        try {
            $q = "INSERT INTO itemcategory(catID,name,orderLevel) VALUES(:catID, :name, :orderLevel);";
            include 'dbConnect/connection.php';
            $qry =  $conn->prepare($q);
            $results = $qry->execute(array(
                ":catID" => $id,
                ":name" => $name,
                ":orderLevel" => $orderLevel
            ));

            echo '<script>alert("New Category Added Successfully!");</script>';
            echo '<script>window.location.href = "AddItemCategory.php";</script>';
            
        } catch (Exception $ex) {
            echo '<script>alert("Failed! record was not added!");</script>';
        }
        
        exit;
    }
    function viewCat(){
         
        try {
            $q = "SELECT * FROM itemcategory;";
            include 'dbConnect/connection.php';
            $query = $conn->prepare($q);
            $result = $query->execute();
            if($result){
            $table = new Category();
            $table->tbRows($query);
                                              
        }
        } catch (Exception $ex) {
            echo "execution Failed!";
        }
                             
        exit;
           

    } 
    
    function searchCat($key){
            
        $q = "SELECT * FROM itemcategory WHERE catID like '%".$key."%' OR name like '%".$key."%';";
        include 'dbConnect/connection.php';
        $query = $conn->prepare($q);
        $result = $query->execute();
        if($result){
            $table2 = new Category();
            $table2->tbRows($query);
        }
        exit;

    }
    function tbRows($query){
  
            if($query->rowCount()>0){
                foreach ($query as $row){
                    echo '<tr>
                    <td id="suppID">'.$row['catID'].'</td>
                    <td>'.$row['name'].'</td>
                    <td>'.$row['orderLevel'].'</td>
                   
                    </tr>';
                }
            }
            else{
                echo '<script>alert("No Item Categories Available!");</script>';
            }
      
    }
    function editCat($cid,$cname,$orderlevel){
  
       $id = $_COOKIE["id"];
            try {
                $q = "UPDATE itemcategory SET catID = :cid, name = :name, orderLevel = :level WHERE catID = :id";
                include 'dbConnect/connection.php';
                $statement = $conn->prepare($q);
                $statement->bindValue(":cid", $cid);
                $statement->bindValue(":name", $cname);
                $statement->bindValue(":level", $orderlevel);
                $statement->bindValue(":id", $id);
               
                $count = $statement->execute();
                echo '<script>alert("Record Updated Successfully!");</script>';
                echo '<script>window.location.href = "viewCategory.php";</script>';
                exit;
                
               
                
            } catch (Exception $ex) {
                echo '<script>alert("Failed to update the record!");</script>';
            }
        
           
           
    }
    function deleteCat($sid){
       
            try {
 
                $q = "DELETE FROM itemcategory WHERE catID = :id";
                include 'dbConnect/connection.php';
                $statement = $conn->prepare($q);
                $statement->bindValue(":id", $sid);
                $count = $statement->execute();
                echo '<script>alert("Record Deleted Successfully!");</script>';
                echo '<script>window.location.href = "viewCategory.php";</script>';
                exit;
               
                
            } catch (Exception $ex) {
                echo "Deletion Failed";
                echo '<script>window.location.href = "viewCategory.php";</script>';
            }
        
           
           
    }
    
}
