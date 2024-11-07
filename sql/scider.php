<?php

require './vendor/autoload.php';


$faker = Faker\Factory::create('fr_FR');
$cnx = \piment\utils\SingletonDatabaseMariaDB::getInstance()->getCnx();

$SQL = "insert into typecasernes values (:codeTypeC, :nomType);";
for($i = 1; $i <= 7; $i++){
    $preparedStatement = $cnx->prepare($SQL);
    $preparedStatement->execute(array(
        ":codeTypeC" => $i,
        ":nomType" => $faker->word()
    ));
}

$SQL = "insert into casernes values (:id, :address, :cp, :ville, :codeTypeC);";
for($i = 1; $i <= 15; $i++){
    $preparedStatement = $cnx->prepare($SQL);
    $preparedStatement->execute(array(
        "id" => $i,
        "address" => $faker->address(),
        "cp" => $faker->postcode(),
        "ville" => $faker->word(),
        "codeTypeC" => $faker->numberBetween(1,7)
    ));
}

$SQL = "insert into grades value (:CodeGrade, :nomGrade, :CoefIndem);";
for($i = 1; $i <= 5; $i++){
    $preparedStatement = $cnx->prepare($SQL);
    $preparedStatement->execute(array(
        "CodeGrade" => "C" . "$i",
        "nomGrade" => $faker->lastName(),
        "CoefIndem" => $faker->randomDigit()
    ));
}

$SQL = "insert into pompiers values (:matricule, :prenom, :nom, :chefAgret, :dateNaissance, :numCaserne, :codeGrade, :matriculeRespo);";
for($i = 1; $i <= 100; $i++){
    $preparedStatement = $cnx->prepare($SQL);
    $preparedStatement->execute(array(
        "matricule" => "$i",
        "prenom" => $faker->firstName(),
        "nom" => $faker->lastName(),
        "chefAgret" => $faker->randomLetter(),
        "dateNaissance" => $faker->date(),
        "numCaserne" => $faker->numberBetween(1,15),
        "codeGrade" => "C".$faker->numberBetween(1,5),
        "matriculeRespo" => "RSP-".$faker->randomNumber(3)
    ));
}

$SQL = "insert into pompiers_dispos value (:matricule, :jjmmaaaa, :heure);";
for($i = 1; $i <= 70; $i++){
    $preparedStatement = $cnx->prepare($SQL);
    $preparedStatement->execute(array(
        "matricule" => "$i",
        "jjmmaaaa" => $faker->date(),
        "heure" => $faker->randomDigit()
    ));
}

$SQL = "INSERT INTO role VALUES (:id, :libelle, :permissions)";
$roles = [];
for ($i = 0; $i < 4; $i++) {
    $libelle = $faker->word;
    $permissions = $faker->randomElement([4,15]);
    $stmt = $cnx->prepare($SQL);
    $stmt->execute([$i, $libelle, $permissions]);
}

$SQL = "INSERT INTO profil VALUES (:id, :tel, :email, :datecreation, :address)";
for ($i = 0; $i < 5; $i++) {
    $stmt = $cnx->prepare($SQL);
    $stmt->execute([
        "id" => $i,
        "tel" => $faker->phoneNumber,
        "email" => $faker->unique()->safeEmail,
        "datecreation" => $faker->dateTimeThisDecade->format('Y-m-d H:i:s'),
        "address" => $faker->address
    ]);
}

$SQL = "INSERT INTO users VALUES (:login, :passwdHash, :name, :username, :status, :profil_id)";
for ($i = 0; $i < 5; $i++) {
    $stmt = $cnx->prepare($SQL);
    $stmt->execute([
        "login" => $faker->unique()->userName,
        "passwdHash" => password_hash($faker->password, PASSWORD_DEFAULT),
        "name" => $faker->name,
        "username" => $faker->userName,
        "status" => 'active'
    ]);
}