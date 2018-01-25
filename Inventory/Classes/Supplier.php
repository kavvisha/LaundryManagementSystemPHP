<?php

   
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Supplier
 *
 * @author lkmla
 */
class Supplier {
    private $suppName, $suppContact, $suppAddress;
  


    function addSupplier($name,$contact,$address){
        $this->suppName = $name;
        $this->suppContact = $contact;
        $this->suppAddress = $address;
        
        $q = "INSERT INTO supplier(name,telephone,address) VALUES(:name, :telephone, :address);";
        include 'dbConnect/connection.php';
        $qry =  $conn->prepare($q);
        $results = $qry->execute(array(
            ":name" => $this->suppName,
            ":telephone" => $this->suppContact,
            ":address" => $this->suppAddress
        ));
        echo '<script>alert("Record Added Successfully!");</script>';
        echo '<script>window.location.href = "addSupplier.php";</script>';
        
        exit;
    }
    
    function viewSupp(){
         
        $q = "SELECT * FROM supplier;";
        include 'dbConnect/connection.php';
        $query = $conn->prepare($q);
        $result = $query->execute();
        if($result){
            $table = new Supplier();
            $table->tbRows($query);
                                              
        }
                             
        exit;
           

    } 
    
    function searchSupp($key){
            
        $q = "SELECT * FROM supplier WHERE suppID like '%".$key."%' OR name like '%".$key."%' OR telephone like '%".$key."%' OR address like '%".$key."%';";
        include 'dbConnect/connection.php';
        $query = $conn->prepare($q);
        $result = $query->execute();
        if($result){
            $table2 = new Supplier();
            $table2->tbRows($query);
        }
        exit;

    }
    function tbRows($query){
  
            if($query->rowCount()>0){
                foreach ($query as $row){
                    echo '<tr>
                    <td id="suppID">'.$row['suppID'].'</td>
                    <td>'.$row['name'].'</td>
                    <td>0'.$row['telephone'].'</td>
                    <td>'.$row['address'].'</td>
                    </tr>';
                }
            }
            else{
                echo '<script>alert("No Supplier Information Available!");</script>';
            }
      
    }
    function editSupplier($sid,$sname,$scontact,$saddress){
       
            try {
                $q = "UPDATE supplier SET name = :nm, telephone = :tp, address = :add WHERE suppID = :id";
                include 'dbConnect/connection.php';
                $statement = $conn->prepare($q);
                $statement->bindValue(":nm", $sname);
                $statement->bindValue(":tp", $scontact);
                $statement->bindValue(":add", $saddress);
                $statement->bindValue(":id", $sid);
                $count = $statement->execute();
                echo '<script>alert("Record Updated Successfully!");</script>';
                echo '<script>window.location.href = "viewSupplier.php";</script>';
                exit;
                
               
                
            } catch (Exception $ex) {
                echo '<script>alert("Record Update Failed!");</script>';
            }
        
           
           
    }
    function deleteSupplier($sid){
       
            try {
 
                $q = "DELETE FROM supplier WHERE suppID = :id";
                include 'dbConnect/connection.php';
                $statement = $conn->prepare($q);
                $statement->bindValue(":id", $sid);
                $count = $statement->execute();
                 echo '<script>alert("Record Deleted Successfully!");</script>';
       
                echo '<script>window.location.href = "viewSupplier.php";</script>';
                exit;
               
                
            } catch (Exception $ex) {
                echo "Deletion Failed";
                echo '<script>window.location.href = "viewSupplier.php";</script>';
            }
        
           
           
    }
    
    
}
 
