<?php

include "connection.php";

$pageno = 0;
$page = $_POST["pg"];
$product = $_POST["p"];
//echo($product);

if(0 != $page) {
    $pageno = $page;
}else{
    $pageno = 1;
}

$q = "SELECT * FROM `stock` INNER JOIN `product` ON `stock`.`product_id` =
`product`.`id` WHERE `product`.`name` LIKE '%$product%'";
$rs = Database::search($q);
$num = $rs->num_rows;
//echo($num);

$results_per_page = 8;
$num_of_pages = ceil($num / $results_per_page);
//echo($num_of_pages);

$page_results = ($pageno - 1) * $results_per_page;

$q2 = $q . " LIMIT $results_per_page OFFSET $page_results";
$rs2 = Database::search($q2);
$num2 = $rs2->num_rows;
//echo($num2);

if($num2 == 0){
    //search no results
?>
   <div class="d-flex flex-column align-items-center mt-5">
          <h5>Search No Result</h5>
          <p>We're Sorry, We cannot find any matches for your search term..</p>  
    </div>      
<?php

}else{
    //load results
    for ($i = 0; $i < $num2; $i++) {
        $d = $rs2->fetch_assoc();
        ?>
     
            
    
     <div class="col-3 mt-5 d-flex justify-content-center">
        
        <div class="card" style="width: 300px;">
        <a href="singleProductView.php?s=<?php echo $d["id"] ?>"><img src="<?php echo $d["path"] ?>" class="card-img-top" /></a>
             <div class="card-body">
               <h5 class="card-title"><?php echo $d["name"] ?></h5>
               <p class="card-text"><?php echo $d["description"] ?></p>
                 <p class="card-text">Rs: <?php echo $d["price"] ?></p>
                 <div class="d-flex justify-content-center">
                     <button class="btn btn-outline-primary col-6">Add To Cart</button>
                     <button class="btn btn-outline-warning col-6 ms-2">Buy Now</button>
                 </div>
 
             </div>
         </div>
     </div>
    <?php

    }
    ?>
    <div class="d-flex justify-content-center mt-5">
         <nav aria-label="Page navigation example">
             <ul class="pagination">
                 <li class="page-item"><a class="page-link" <?php 
                                                            if ($pageno <= 1) {
                                                                echo("#");
                                                            }else{
                                                            ?> onclick="searchProduct(<?php echo ($pageno - 1) ?>);"<?php  
                                                                                       }
                 
                                                                                       ?>>Previous</a></li>


                 <?php
                 for ($y = 1; $y <= $num_of_pages; $y++) {
                     
                    if($y == $pageno) {
                        ?>
                           <li class="page-item active">
                            <a class="page-link" onclick="searchProduct(<?php echo $y ?>);"><?php echo $y ?></a>
                           </li>
  
                        <?php
                        
                     }else{
                        ?>
                           <li class="page-item">
                            <a class="page-link" onclick="searchProduct(<?php echo $y ?>);"><?php echo $y ?></a>
                           </li>
  
                        <?php
                        
                     }
                 }
                 ?>

              
  


                 <li class="page-item"><a class="page-link" <?php 
                                                            if ($pageno >= $num_of_pages) {
                                                                echo("#");
                                                            }else{
                                                            ?> onclick="loadProduct(<?php echo ($pageno + 1) ?>);"<?php  
                                                                                       }
                 
                                                                                       ?>>Next</a></li>
             </ul>
         </nav>
     </div>






    <?php

}



?>