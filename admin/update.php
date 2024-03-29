<?php
require "../items_req.php";
require "admin_controller.php";

// Récupérer catégories
$categories = getCategories();
// Vérifier que le Id passé en paramètre existe 
checkId($_GET["id"]);
$item = getItem($_GET["id"]);
//Vérifier que le formulaire est submit que les champs soient renseignés et nettoyés
$image = uploadImage($_FILES);
if (isset($_POST) && !empty($_POST)) {
    $name = validateFormField($_POST["name"]);
    $description = validateFormField($_POST["description"]);
    $price = validateFormField($_POST["price"]);
    $category = validateFormField($_POST["category"]);
    majItem($id, $name, $description, $price, $category, $image);
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Burger Code</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../styles.css">
</head>

<body>
    <h1 class="text-logo"> Burger Code </h1>
    <div class="container admin">
        <div class="row">
            <div class="col-md-6">
                <h1><strong>Modifier un item</strong></h1>
                <br>
                <form class="form" action="update.php" role="form" method="post">
                    <br>
                    <div>
                        <label class="form-label" for="name">Nom:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nom" value="<?= $item["name"] ?>">
                        <span class="help-inline"></span>
                    </div>
                    <br>
                    <div>
                        <label class="form-label" for="description">Description:</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Description" value="<?= $item["description"] ?>">
                        <span class="help-inline"></span>
                    </div>
                    <br>
                    <div>
                        <label class="form-label" for="price">Prix: (en €)</label>
                        <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Prix" value="<?= $item["price"] ?>">
                        <span class="help-inline"></span>
                    </div>
                    <br>
                    <div>
                        <label class="form-label" for="category">Catégorie:</label>
                        <select class="form-control" id="category" name="category">
                            <?php foreach ($categories as $category) { ?>
                                <option value="<?= $category["id"] ?>" <?= ($category["id"] === $item["category"]) ? "selected" : "" ?>>
                                    <?= $category["name"] ?>
                                </option>
                            <?php } ?>
                        </select>
                        </select>
                        <span class="help-inline"></span>
                    </div>
                    <br>
                    <div>
                        <label class="form-label" for="image">Image:</label>
                        <p></p>
                        <label for="image">Sélectionner une nouvelle image:</label>
                        <input type="file" id="image" name="image">
                        <span class="help-inline"></span>
                    </div>
                    <br>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"><span class="bi-pencil"></span> Modifier</button>
                        <a class="btn btn-primary" href="index.html"><span class="bi-arrow-left"></span> Retour</a>
                    </div>
                </form>
            </div>
            <div class="col-md-6 site">
                <div class="img-thumbnail">
                    <img src="" alt="">
                    <div class="price"></div>
                    <div class="caption">
                        <h4></h4>
                        <p></p>
                        <a href="#" class="btn btn-order" role="button"><span class="bi-cart-fill"></span> Commander</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>