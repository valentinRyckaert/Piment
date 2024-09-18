<?php

require '../vendor/autoload.php';


$faker = Faker\Factory::create('fr_FR');
$cnx = \piment\utils\SingletonDatabaseMariaDB::getInstance()->getCnx();

$SQL = "insert into typecasernes values (:codeTypeC, :nomType);";
for($i = 20; $i < 50; $i++){
    $preparedStatement = $cnx->prepare($SQL);
    $preparedStatement->execute(array(
        ":codeTypeC" => $i,
        ":nomType" => $faker->word()
    ));
}

$SQL = "insert into casernes values (:id, :address, :cp, :ville, :codeTypeC);";
for($i = 20; $i < 80; $i++){
    $preparedStatement = $cnx->prepare($SQL);
    $preparedStatement->execute(array(
        "id" => $i,
        "address" => $faker->address(),
        "cp" => $faker->postcode(),
        "ville" => $faker->word(),
        "codeTypeC" => $faker->numberBetween(20,40)
    ));
}

$SQL = "insert into pompiers values (:matricule, :prenom, :nom, :chefAgret, :dateNaissance, :numCaserne, :codeGrade, :matriculeRespo);";
for($i = 20; $i < 80; $i++){
    $preparedStatement = $cnx->prepare($SQL);
    $preparedStatement->execute(array(
        "matricule" => "$i",
        "prenom" => $faker->firstName(),
        "nom" => $faker->lastName(),
        "chefAgret" => $faker->randomLetter(),
        "dateNaissance" => $faker->date(),
        "numCaserne" => $faker->numberBetween(20,40),
        "codeGrade" => null,
        "matriculeRespo" => null
    ));
}

$SQL = "insert into grades value (:CodeGrade, :nomGrade, :CoefIndem);";
for($i = 20; $i < 80; $i++){
    $preparedStatement = $cnx->prepare($SQL);
        $preparedStatement->execute(array(
            "CodeGrade" => "$i",
            "nomGrade" => $faker->lastName(),
            "CoefIndem" => $faker->randomDigit()
        ));
}

$SQL = "insert into pompiers_dispos value (:matricule, :jjmmaaaa, :heure);";
for($i = 20; $i < 80; $i++){
    $preparedStatement = $cnx->prepare($SQL);
    $preparedStatement->execute(array(
        "matricule" => "$i",
        "jjmmaaaa" => $faker->date(),
        "heure" => $faker->randomDigit()
    ));
}