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
                                Articles
                            </div>
                            <div class="card-body">
                          
                                <div class="table-responsive">
                                <?php flash_display(); ?>
                                    
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Supprimer</th>
                                                <th>Catégorie</th>
                                                <th>Titre</th>
                                                <th>Description</th>
                                                <th>image</th>
                                                <th>prix</th>
                                                <th>Modifier</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        <?php foreach($articles as $article) { ?>
                                            <tr>
                                                <td><a href="?module=articles&action=deleteArticle&id=<?= $article["id"] ?>"class="suppr"><i class="far fa-trash-alt"></i>supprimer</a></td>
                                                <td><?= $article["name"]?></td>
                                                <td><?= $article["title"]?></td>
                                                <td><?= $article["descr"]?></td>
                                                <td><img src="static/image/<?= $article["img"]?>"></td>
                                                <td><?= $article["price"]?></td>
                                                <td><a href="?module=articles&action=editArticleForm&id=<?= $article["id"] ?>"><i class="far fa-edit"></i>Modifier</a></td>
                                            </tr>
                                        <?php } ?>  
                                        
                                        </tbody>

                                        <tfoot>
                                            <tr>
                                                <th>Supprimer</th>
                                                <th>Catégorie</th>
                                                <th>Titre</th>
                                                <th>Description</th>
                                                <th>image</th>
                                                <th>prix</th>
                                                <th>Modifier</th>
                                             </tr>
                                        </tfoot>
                                    </table>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-pencil-alt mr-1"></i>
                                    Ajouter un nouveau produit
                                </div>
                        
                              <div class="card-body">
                        
                                
                             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <form action="?module=articles&action=newArticle" method="post" enctype="multipart/form-data"> 
                                         <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="post_title">Titre</label>
                                                        <input class="form-control py-4" id="title" name="title" type="text" placeholder="Entrer un titre" value="" required>
                                                    </div>
                                                </div>
                                            </div>
                                           <!--input caché
                                            <input type="hidden" name="post_author" value=""> -->

                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="post_category">Catégorie</label>
                                                        <select class="form-control" id="category_id" name="category_id">
                                                        <?php foreach ($categories as $category) { ?>
                                                        <option value="<?= $category["cat_id"]?>"><?= $category["name"]?></option>
                                                        <?php } ?>  
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="post_content">description</label>
                                                        <textarea class="center form-control" id="descr" name="descr" cols="80" rows="15" type="text"></textarea>
                                                    </div> 
                                                </div>
                                            </div>
                                            <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="form-group mx-4">
                                                    <label class="small mb-1" for="price">prix</label>
                                                    <input class="form-control py-4" id="title" name="price" type="text" placeholder="Entrer un prix"  value="<?=$article["price"]?>" required>€
                                                </div>
                                            </div>
                                        </div>
                                            
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input class="form-control-file col-md-6" id="img" name="img" type="file" placeholder="Choisissez une image" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                    <input class="btn btn-primary" type="submit" value="Publier">
                                            </div>
                                    </form>
                               
                                </table>
                            </div>
                         </div>
                   
                </div>
             </main>
<?php include("app/views/layout/footer.inc.php"); ?>   