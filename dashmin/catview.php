<?php
include("query.php");
include("header.php");

?>
 <div class="container p-4">
                            <h3 class="mb-4">view category</h3>
                            <table  class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">name</th>
                                        <th scope="col">image</th>
                                        <th scope="col" colspan="2">action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query=$pdo->query("select * from category");
                                    $data = $query->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($data as $cat){
                                        ?>
                                    <tr>
                                        <th scope="row"><?php echo $cat['id'];?></th>
                                        <td><?php echo $cat['name'];?></td>
                                        <td><img src="img/<?php echo $cat['image'];?>" width="140px" height="120px"></td>
                                        <td>
                                            <form action="" method="get">
                                            <button type="button" class="btn btn-warning"><a href="updatecat.php?cid=<?php echo $cat['id']?>" class="text-dark"> Edit</a></button>

                                            </form>
                                        </td> 
                                        <td>
                                      <form action="" method="get">
                                      <button type="button" class="btn btn-danger"><a href="?cid=<?php echo $cat["id"];?>" class="text-dark">Delete</a></button>
                                      </form>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                    if(isset($_GET["cid"])){
                                        $id = $_GET['cid'];
                                        $query= $pdo->prepare("delete from category where id =:pid");
                                        $query->bindParam("pid",$id);
                                        $query->execute();
                                        echo "<script>
                                        alert('delete category successfully');
                                location.assign('catview.php');
                                        </script>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                        <?php
                        include("footer.php");
                        ?>