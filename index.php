<?php
require('./services/DogService.php');

$dogApi = new DogService();

$dogRandomImg;

if (isset($_GET['breed'])) {
    $dogBreed = $_GET['breed'];
    $dogRandomImg = $dogApi->getDogImage($dogBreed);

}

$baseURI = "https://dog.ceo/api/breeds/list/all";
$dataApi = file_get_contents($baseURI);
$dogsBreed = json_decode($dataApi);
?>

<!DOCTYPE html>
<html lang="ptbr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Dog App</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">DOG APP</a>
        </nav>
    </header>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <h5 class="card-title text-center">Dog-App</h5>
                <p><?php echo $dogRandomImg, "23213";?></p>
                <img height="300" src="<?= $dogRandomImg ?? './assets/img/defaultDog.jpg' ?>"
                     class="card-img-middle" alt="dog padrão">
                <div class="card-body">
                    <form>
                        <fieldset>
                            <div class="form-group ">
                                <label for="city" class="col-sm-12 col-form-label text-center">Selecione uma
                                    raça</label>
                                <select class="col-sm-12 col-form-label text-center" name="breed" id="breed">
                                    <?php foreach ($dogsBreed->message as $breed => $value) { ?>
                                        <option value="<?php echo $breed; ?>"><?php echo $breed; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group ">
                                <label for="city" class="col-sm-12 col-form-label text-center">Selecione uma
                                    cor</label>
                                <select class="col-sm-12 col-form-label text-center" name="color" id="color">
                                    <option value="">Verde</option>
                                    <option value="">Open Sans</option>
                                    <option value="">Amarelo</option>
                                    <option value="">Oswald</option>
                                    <option value="">Montserrat</option>
                                </select>
                            </div>

                            <div class="form-group ">
                                <label for="city" class="col-sm-12 col-form-label text-center">Selecione uma
                                    fonte</label>
                                <select class="col-sm-12 col-form-label text-center" name="font" id="font">
                                    <option value="">Roboto</option>
                                    <option value="">Open Sans</option>
                                    <option value="">Lato</option>
                                    <option value="">Oswald</option>
                                    <option value="">Montserrat</option>
                                </select>
                            </div>

                            <div class="form-group ">
                                <label for="city" class="col-sm-12 col-form-label text-center">Escolha um nome do cachorro</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control text-center" id="dog" name="dog"
                                        placeholder="Exemplo: Apollo">
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary ">Salvar</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>