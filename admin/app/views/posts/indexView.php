<?php include("app/views/layout/header1.inc.php"); ?> 
<?php include("app/views/layout/sidebar.inc.php"); ?>      

                <main>
                   
                <div class="container-fluid">
                        <h1 class="mt-4"> <a href="infinityregalito/indexfront.php"></a>Regalito Dessert</h1> 
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Tableau de bord</li> 
                        </ol>
                        <?php flash_display(); ?>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body"><?= $counts["articlesCount"] ?> <?=pluralize($counts["articlesCount"], "Article") ?>  </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="?module=articles&action=articles">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body"><?= $counts["usersCount"]?> <?=pluralize($counts["usersCount"], "Client") ?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="?module=users&action=usersList">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Commandes </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="">View Details</a>
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
                                DataTable Example
                            </div>
                            <div class="card-body">
                           
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Catégorie</th>
                                                <th>Titre</th>
                                                <th>Description</th>
                                                <th>image</th>
                                                <th>prix</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        <?php foreach($articles as $article) { ?>
                                            <tr>
                                                <td><?= $article["name"]?></td>
                                                <td><?= $article["title"]?></td>
                                                <td><?= $article["descr"]?></td>
                                                <td><img src="static/image/<?= $article["img"]?>"></td>
                                                <td><?= $article["price"]?>€</td>
                                            </tr>
                                        <?php } ?>  
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
               
<?php include("app/views/layout/footer.inc.php"); ?> 