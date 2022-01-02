<?php

function getDbConnection(): ?PDO {
    try {
        $options = [
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
        ];
        $host = 'mysql:dbname=dogsdb;host=127.0.0.1';
        $user = 'root';
        $pass = '';

        return new PDO($host, $user, $pass, $options);
    } catch (PDOException $e) {
        echo $e->getMessage();

        return null;
    }
}

function getDogname(): Traversable {
    try {
        $db = getDbConnection();

        return $db->query('SELECT * FROM dogs');
    } catch (PDOException $e) {
        echo $e->getMessage();

        return [];
    }
}

function getBreed(): Traversable {
    try {
        $db = getDbConnection();

        return $db->query('SELECT * FROM breeds');
    } catch (PDOException $e) {
        echo $e->getMessage();

        return [];
    }
}

function getInfo() {

    try {

        $db = getDbConnection();

        $id = $_GET['id'];
//        var_dump($id);

        return $db->query("SELECT * FROM dogs WHERE dog_id = $id");
    } catch (\PdoException $e) {
        // log error
    }
}

function getDogid(): Traversable {
    try {
        $db = getDbConnection();

        return $db->query('SELECT dog_id FROM dogs WHERE');
    } catch (PDOException $e) {
        echo $e->getMessage();

        return [];
    }
}


function handleSubmit(): void {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            if (empty($_POST["dog_name"])) {
                return;
            }
            $Fixed = isset($_POST['isFixed']) ? 1 : 0;
            $Vax = isset($_POST['isVaccinated']) ? 1 : 0;
            $sql = "INSERT INTO dogs (dog_name,breed_id, age,is_fixed,is_vaccinated)
            VALUES ('".$_POST["dog_name"]."','".$_POST["breedlist"]."','".$_POST["age"]."','$Fixed','$Vax')";

            getDbConnection()->query($sql);
            } catch (PDOException $e) {
                // log exception
                echo $e->getMessage();
            }
    }
    header('Location: ./');
}

function deleteDogname(int $id): void {
    try {
        if ($id <= 0) {
            return;
        }
        getDbConnection()->query("DELETE FROM dogs WHERE dog_id = $id");
    } catch (PDOException $e) {
        // log exception
        echo $e->getMessage();
    }
}

function handleSubmitEdit(): void {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            if (empty($_POST["dog_name"])) {
                return;
            }

            $id = $_POST['dog_id'];

            $name = $_POST['dog_name'];
            $age = $_POST['age'];

            $Fixed = isset($_POST['isFixed']) ? 1 : 0;
            $Vax = isset($_POST['isVaccinated']) ? 1 : 0;
            $sql = "UPDATE dogs SET dog_name = '$name', age = '$age', is_fixed = '$Fixed', is_vaccinated = '$Vax' WHERE dog_id='$id' ";

            getDbConnection()->query($sql);
            } catch (PDOException $e) {
                // log exception
                echo $e->getMessage();
            }
    }
    header('Location: ./');
}
// $sql = "UPDATE dogs SET dog_name = '$name', age = '$age', is_fixed = '$isFixed', is_vaccinated = '$isVaccinated' WHERE id='$id' ";
