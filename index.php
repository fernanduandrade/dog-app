<?php

$baseURI = "https://dog.ceo/api/breeds/list/all";
$dataApi = file_get_contents($baseURI);
$dogsBreed = json_decode($dataApi);

$dogImg;  
$randomDogImg;

if(isset($_GET["breed"])) {
    $breedName = $_GET["breed"];
    $dogImg = file_get_contents("https://dog.ceo/api/breed/$breedName/images/random");
    $randomDogImg = json_decode($dogImg);
}


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
                <img height="300" src="<?= $randomDogImg->message ?? './assets/img/defaultDog.jpg' ?>"
                     class="card-img-middle" alt="dog padrão">
                <div class="card-body">
                    <form >
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
                            <div class="text-center">
                                <button class="btn btn-primary">Gerar Imagem</button>
                            </div>

                            <div class="form-group ">
                                <label for="city" class="col-sm-12 col-form-label text-center">Selecione uma
                                    cor</label>
                                <select class="col-sm-12 col-form-label text-center" name="color" id="color">
                                    <option value="green">Verde</option>
                                    <option value="red">Vermelho</option>
                                    <option value="yellow">Amarelo</option>
                                    <option value="purple">Roxo</option>
                                    <option value="">Laranja</option>
                                </select>
                            </div>

                            <div class="form-group ">
                                <label for="city" class="col-sm-12 col-form-label text-center">Selecione uma
                                    fonte</label>
                                <select class="col-sm-12 col-form-label text-center" name="font" id="font">
                                    <option value="Roboto">Roboto</option>
                                    <option value="Open Sans">Open Sans</option>
                                    <option value="Lato">Lato</option>
                                    <option value="Oswald">Oswald</option>
                                    <option value="Montserrat">Montserrat</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="city" class="col-sm-12 col-form-label text-center">Escolha um nome do cachorro</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control text-center" id="dog" name="dog"
                                        placeholder="Exemplo: Apollo">
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary">Salvar</button>
                            </div>

                           
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {    
        $("#submit").click(function(event) {            
            event.preventDefault();
            alert("ACTION IS PREVENTED");
        });
    });
</script>
</html>