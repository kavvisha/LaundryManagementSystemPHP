<?php


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ItemBatch
 *
 * @author lkmla
 */
class ItemBatch {
    
    function addBatch($cat, $brand, $qty, $qtyUnit, $exp, $supp, $unitCost, $totCost){
        //select categoeyID fkey
        
        $st = "SELECT * FROM itemcategory WHERE name ='".$cat."'";
        include 'dbConnect/connection.php';
        $query = $conn->prepare($st);
        $result = $query->execute();
        if($result){
            if($query->rowCount()>0){
                foreach ($query as $row){
                  
                    $catID = $row['catID'];
                }
            }
            else{
                echo '<script>alert("Incorrect Category!");</script>';
            }
                                               
        }
        
        //select supplierID fk
        $sts = "SELECT * FROM supplier WHERE name ='".$supp."'";
        include 'dbConnect/connection.php';
        $query2 = $conn->prepare($sts);
        $result = $query2->execute();
        if($result){
            if($query2->rowCount()>0){
                foreach ($query2 as $row){
                  
                    $suppID = $row['suppID'];
                }
            }
            else{
                echo '<script>alert("Incorrect Supplier!");</script>';
            }
                                               
        }
     
        try {
            $q = "INSERT INTO itembatch(catName,quantity,unit,brand,expDate,unitcost,totalCost,supplier,catID,suppID) VALUES(:catName,:quantity,:unit,:brand,:expDate,:unitcost,:totalCost,:supplier,:catID,:suppID)";
        include 'dbConnect/connection.php';
        $qry =  $conn->prepare($q);
        $results = $qry->execute(array(
            ":catName"=>$cat,
            ":quantity"=>$qty,
            ":unit"=>$qtyUnit,
            ":brand"=>$brand,
            ":expDate"=>$exp,
            ":unitcost"=>$unitCost,
            ":totalCost"=>$totCost,
            ":supplier"=>$supp,
            ":catID"=>$catID,
            ":suppID"=>$suppID
            
        ));
        echo '<script>alert("Record Added Successfully!");</script>';
        echo '<script>window.location.href = "AddItemBatches.php";</script>';
        } catch (Exception $ex) {
            echo '<script>alert("Fsiled to add rocord!");</script>';
        echo '<script>window.location.href = "AddItemBatches.php";</script>';
        }
        exit;
    }
    function viewBatch(){
         
        $q = "SELECT * FROM itembatch;";
        include 'dbConnect/connection.php';
        $query = $conn->prepare($q);
        $result = $query->execute();
        if($result){
            $table = new ItemBatch();
            $table->tbRows($query);
                                              
        }
                             
        exit;
           

    } 
    
    function searchBatch($key){
            
        $q = "SELECT * FROM itembatch WHERE batchID like '%".$key."%' OR catName like '%".$key."%' OR brand like '%".$key."%' OR expDate like '%".$key."%' OR supplier like '%".$key."%';";
        
        include 'dbConnect/connection.php';
        $query = $conn->prepare($q);
        $result = $query->execute();
        if($result){
            $table2 = new ItemBatch();
            $table2->tbRows($query);
        }
        exit;

    }
    function tbRows($query){
  
            if($query->rowCount()>0){
                foreach ($query as $row){
                    echo '<tr>
                    <td id="batchID">'.$row['batchID'].'</td>
                    <td>'.$row['catName'].'</td>
                    <td>'.$row['brand'].'</td>
                    <td>'.$row['expDate'].'</td>
                    <td>'.$row['quantity'].'</td>
                    <td>'.$row['unit'].'</td>
                    <td>'.$row['unitcost'].'</td>
                    <td>'.$row['totalCost'].'</td>
                    <td>'.$row['supplier'].'</td>
                    </tr>';
                }
            }
            else{
                echo '<script>alert("No Item Batch Available!");</script>';
            }
      
    }
    function editBatch($id,$cat, $brand, $qty, $qtyUnit, $exp, $supp, $unitCost, $totCost){
        
            try {

                //select categoeyID fkey

                $st = "SELECT * FROM itemcategory WHERE name ='".$cat."'";
                include 'dbConnect/connection.php';
                $query = $conn->prepare($st);
                $result = $query->execute();
                if($result){
                    if($query->rowCount()>0){
                        foreach ($query as $row){

                            $catID = $row['catID'];
                        }
                    }
                    else{
                        if($catID==NULL){
                            echo '<script>alert("The Category of this item is no longer in the system. Press OK to continue!");</script>';
                        }
                        else {
                            echo '<script>alert("Incorrect Category!");</script>';
                        }
                    }

                }
                
                //select supplierID fk
                $sts = "SELECT * FROM supplier WHERE name ='".$supp."'";
                include 'dbConnect/connection.php';
                $query2 = $conn->prepare($sts);
                $result = $query2->execute();
                if($result){
                    if($query2->rowCount()>0){
                        foreach ($query2 as $row){

                            $suppID = $row['suppID'];
                        }
                    }
                    else{
                        if($suppID==NULL){
                            echo '<script>alert("The suppier for this item is no longer in the system. Press OK to continue!");</script>';
                        }
                        else {
                            echo '<script>alert("Incorrect Supplier!");</script>';
                        }
                    }

                }
                
                
                $q = "UPDATE itembatch SET catName=:cat ,quantity=:qty, unit=:unit, brand=:brand, expDate=:exp, unitcost=:ucost, totalCost=:tcost ,supplier=:supp, catID=:cID, suppID=:sID WHERE batchID=:bID";
                include 'dbConnect/connection.php';
                
                $statement = $conn->prepare($q);
                $statement->bindValue(":cat", $cat);
                $statement->bindValue(":qty", $qty);
                $statement->bindValue(":unit", $qtyUnit);
                $statement->bindValue(":brand", $brand);
                $statement->bindValue(":exp", $exp);
                $statement->bindValue(":ucost", $unitCost);
                $statement->bindValue(":tcost", $totCost);
                $statement->bindValue(":supp", $supp);
                $statement->bindValue(":cID", $catID);
                $statement->bindValue(":sID", $suppID);
                $statement->bindValue(":bID", $id);
                $count = $statement->execute();
                echo '<script>alert("Record Successfully Updated!");</script>';
                
                echo '<script>window.location.href = "viewBatch.php";</script>';
                
                exit;

            } catch (Exception $ex) {
                echo "Update Failed!";
            }
        
           
           
    }
    function deleteBatch($bid){
       
            try {
                $q = "DELETE FROM itembatch WHERE batchID = :id";
                include 'dbConnect/connection.php';
                $statement = $conn->prepare($q);
                $statement->bindValue(":id", $bid);
                $count = $statement->execute();
                echo '<script>alert("Record Successfully Deleted!");</script>';
                echo '<script>window.location.href = "viewBatch.php";</script>';
                exit;
               
                
            } catch (Exception $ex) {
                echo "Deletion Failed";
            }
 
    }

}