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

// Insert into role table
$SQL = "INSERT INTO role (libelle, permissions) VALUES (:libelle, :permissions)";
$stmt = $cnx->prepare($SQL);
$stmt->execute([
    'libelle' => 'admin',
    'permissions' => 4095
]);
$stmt->execute([
    'libelle' => 'secretaire',
    'permissions' => 255
]);
$stmt->execute([
    'libelle' => 'consultant',
    'permissions' => 34
]);

// Insert into profil table
$SQL = "INSERT INTO profil (tel, email, datecreation, address) VALUES (:tel, :email, :datecreation, :address)";
for ($i = 245; $i < 248; $i++) {
    $stmt = $cnx->prepare($SQL);
    $stmt->execute([
        "tel" => $faker->phoneNumber(),
        "email" => $faker->unique()->safeEmail(),
        "datecreation" => $faker->dateTimeThisDecade->format('Y-m-d H:i:s'),
        "address" => $faker->address()
    ]);
}

// Insert into user table
$SQL = "INSERT INTO user (login, passwdHash, name, username, status, dateclosure, profil_id, role_id) VALUES (:login, :passwdHash, :name, :username, :status, :dateclosure, :profil_id, :role_id)";
$stmt = $cnx->prepare($SQL);
$stmt->execute([
    "login" => "admin",
    "passwdHash" => hash('sha256', "123+aze"),
    "name" => $faker->name(),
    "username" => $faker->userName(),
    "status" => 'active',
    "dateclosure" => $faker->date(),
    "profil_id" => 3,
    "role_id" => 1
]);
$stmt->execute([
    "login" => "secretaire",
    "passwdHash" => hash('sha256', "123+aze"),
    "name" => $faker->name(),
    "username" => $faker->userName(),
    "status" => 'active',
    "dateclosure" => $faker->date(),
    "profil_id" => 2,
    "role_id" => 2
]);
$stmt->execute([
    "login" => "consultant",
    "passwdHash" => hash('sha256', "123+aze"),
    "name" => $faker->name(),
    "username" => $faker->userName(),
    "status" => 'active',
    "dateclosure" => $faker->date(),
    "profil_id" => 1,
    "role_id" => 3
]);
