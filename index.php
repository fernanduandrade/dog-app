<?php

$dataApi = file_get_contents("https://dog.ceo/api/breeds/list/all");
$dogsBreed = json_decode($dataApi);

$randomDogImg;
$dogImg;
$inputsText;
$defaultText = "<p class='text-center' id='text'>Nome do cachorro</p>";

if(isset($_GET["breed"])) {
    $chosenDogName = $_GET["dogName"];
    $chosenColor = $_GET["color"];
    $chosenFont = $_GET["font"];
    $breedName = $_GET["breed"];
    $randomDogImg = file_get_contents("https://dog.ceo/api/breed/$breedName/images/random");
    $dogImg = json_decode($randomDogImg);
    $inputsText = "<p style='color: $chosenColor; font-family: $chosenFont; font-weight: bold; font-size: 40px;' class='text-center' id='text'>$chosenDogName</p>";
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet"> 
    <title>Dog App</title>
</head>

<body>
<style>
body {
    font-family: 'Helvetica Neue';
}
</style>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">DOG APP</a>
        </nav>
    </header>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
            <hr>
                <h5 class="card-title text-center">Dog-App</h5>
                <div class="card-body">
                    <form id="form-submit">
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
                                    <option value="#009900">Verde</option>
                                    <option value="#FF0000">Vermelho</option>
                                    <option value="#0000FF">Azul</option>
                                    <option value="#660066">Roxo</option>
                                    <option value="#FF6600">Laranja</option>
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
                                    <input type="text" class="form-control text-center" id="dogName" name="dogName"
                                        placeholder="Exemplo: Apollo">
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary" onclick="generate()">Gerar</button>
                                <button type="button" class="btn btn-primary" onclick="saveData()">Salvar</button>
                            </div>
                        </fieldset>
                    </form>
                    <hr>
                    <div id="wrapper-field">
                        <?=$inputsText ?? $defaultText?>
                        <img height="300" width="500" id="dogImg" src="<?=$dogImg->message ?? "./assets/img/defaultDog.jpg"?>"
                        alt="dogImg">   
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script type="text/javascript">

    const generatedInfo = JSON.parse(localStorage.getItem("generatedImg"));

    const dogInfo = JSON.parse(localStorage.getItem("dogData"));
    console.log(dogInfo);

    if(dogInfo) {
        document.getElementById("breed").value = dogInfo.breed;
        document.getElementById("color").value = dogInfo.color;
        document.getElementById("font").value = dogInfo.font;
        document.getElementById("dogName").value = dogInfo.name;
        document.getElementById("dogImg").src = dogInfo.img;
    } else if(generatedInfo){
        document.getElementById("breed").value = generatedInfo.breed;
        document.getElementById("color").value = generatedInfo.color;
        document.getElementById("font").value = generatedInfo.font;
        document.getElementById("dogName").value = generatedInfo.name;
    }
                    
    function generate() {
        const colorInput = document.getElementById("color").value;
        const fontInput = document.getElementById("font").value;
        const dogInput = document.getElementById("dogName").value;
        const dogBreed = document.getElementById("breed").value;
;

        let info = {
            "color": colorInput,
            "font": fontInput,
            "name": dogInput,
            "breed": dogBreed,
        }
        
        return window.localStorage.setItem("generatedImg", JSON.stringify(info));
    }

    function saveData() {

        const colorInput = document.getElementById("color").value;
        const fontInput = document.getElementById("font").value;
        const dogInput = document.getElementById("dogName").value;
        const dogBreed = document.getElementById("breed").value;
        const dogImg = document.getElementById("dogImg").src;

        let currentTime = new Date();

        let info = {
            "color": colorInput,
            "font": fontInput,
            "name": dogInput,
            "breed": dogBreed,
            "img": dogImg,
            "date": currentTime
        }
        
        swal("Dados salvos!");
        return window.localStorage.setItem("dogData", JSON.stringify(info));        
    }
</script>
</html>