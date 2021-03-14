<?php include "app/views/layout/header1.inc.php";?>
<?php include "app/views/layout/sidebar.inc.php";?>


<main>
    <div class="container-fluid">
        <h1 class="mt-4"> <a href="infinityregalito/indexfront.php"></a>Regalito Dessert</h1>
        <ol class="breadcrumb mb-4">
            
            <li class="breadcrumb-item active">Tableau de bord</li>
        </ol>

    

        <div class="card-body">
        <?php flash_display(); ?>
            <div class="card mb-4">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <form action="?module=articles&action=editArticle" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $_GET["id"]?>">
                                     <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="form-group mx-4">
                                                    <label class="small mb-1" for="title">Titre</label>
                                                    <input class="form-control py-4" id="title" name="title" type="text" placeholder="Entrer un titre"  value="<?=$article["title"]?>" required>
                                                </div>
                                            </div>
                                        </div>
                                       
                                       <!--input caché
                                        <input type="hidden" name="post_author" value=""> -->

                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="form-group mx-4">
                                                    <label class="small mb-1" for="post_category">Catégorie</label>
                                                    <select class="form-control" id="category_id" name="category_id">
                                                    <?php foreach ($categories as $category) {?>
                                                    <option value="<?=$category["cat_id"]?>" <?= ($category["cat_id"]== $article["category_id"])?"selected":"" ?> ><?=$category["name"]?></option>
                                                    <?php }?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="form-group px-4">
                                                    <label class="small mb-1" for="post_content">description</label>
                                                    <textarea class="center form-control" id="descr" name="descr"  cols="80" rows="15" type="text"> <?=$article["descr"]?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="form-group mx-4">
                                                    <label class="small mb-1" for="price">prix</label>
                                                    <input class="form-control py-4" id="price" name="price" type="text" placeholder="Entrer un prix"  value="<?=$article["price"]?>" required>€
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="small mb-1" for="new-img">Choisissez une nouvelle image si vous souhaitez modifier l'image de votre article</label>
                                                    <input class="form-control-file col-md-6" id="img" name="new_img" type="file" placeholder="choisissez une image" />
                                                        <input type="hidden" value="<?= $article["img"] ?>" name="img"/>
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
<?php include "app/views/layout/footer.inc.php";?>