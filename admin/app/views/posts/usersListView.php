<?php include("app/views/layout/header1.inc.php"); ?> 
<?php include("app/views/layout/sidebar.inc.php"); ?>     

<main>
                    <div class="container-fluid">
                        <h1 class="mt-4"> <a href="infinityregalito/index.php"></a>Regalito Dessert</h1> 
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Tableau de bord</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Catalogue </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="?module=articles&action=articles">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Utilisateurs</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="/infinityregalito/admin/usersListView.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Commandes </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="category.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       <!-- <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area mr-1"></i>
                                        Area Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar mr-1"></i>
                                        Bar Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>-->
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Utilisateurs
                                <a href="userNew.php" class="btn btn-primary"> Ajouter</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                <?php flash_display(); ?>
                                   <!--  <form action="newCat.php" method="post"> 
                                       <label for="category">créer une nouvelle catégorie</label>
                                        <input type="text"  id="category" name="cat_descr">
                                        <input type="submit" value="créer la catégorie">
                                    </form>-->
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Supprimer</th>
                                                 <th>Login</th>
                                                 <th>Email</th>
                                                 <th>Modifier</th>
                                                 </tr>
                                        </thead>     
                   
                                        <tbody>
                                        <?php foreach ($users as $user) {?>
                                            <tr>
                                                <td><a href="?module=users&action=usersDelete&id=<?= $user["id"] ?>"class="suppr"><i class="far fa-trash-alt"></i>supprimer</a></td>
                                                <td><?=$user["user_name"]?></td>
                                                <td><?=$user["user_mail"]?></td>
                                                <td><i class="far fa-edit"></i>Modifier</a></td>
                                            </tr>
                                        <?php }?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                 <th>Supprimer</th>
                                                 <th>Login</th>
                                                 <th>Email</th>
                                                 <th>Modifier</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>

                

                <?php include("app/views/layout/footer.inc.php"); ?> 

               