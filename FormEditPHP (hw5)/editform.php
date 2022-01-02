<?php require_once 'include/functions.php';
$names = getDogname();
$breeds = getBreed();
$info = getInfo();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dog DB Edit</title>
</head>
<body>
    <h1>Dog DB Edit</h1>
    <form name="adddog" action="submitedit.php" method="post">
        <fieldset>
            <legend>Enter Dog Information</legend>
            <label for="name">Dog Name:</label>
            <?php foreach($info as $dog): ?>
            <input type="hidden" name="dog_id" value="<?= $dog?->dog_id ?>" />
            <input type="text" name="dog_name" maxlength="255" required value = "<?= $dog?->dog_name ?>" />
        </br></br>
            <label for="age">Dog Age:</label>
            <input type="number" name="age" min="1" max="30" value = "<?= $dog?->age ?>" />
        </br></br>
            <label for="fix">Is Your Dog Fixed?</label>
            <input type="checkbox" name="isFixed" value = "" />
        </br></br>
            <label for="vac">Is Your Dog Vaccinated?</label>
            <input type="checkbox" name="isVaccinated" value = "" />
        </br></br>
             <?php endforeach; ?>
        <label for="breed">Dog Breed:</label>
        <select name="breedlist">
            <?php foreach($breeds as $row): ?>
            <option value="<?=$row->breed_id?>"><?=$row->breed_name?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Save</button>
        </fieldset>
    </form>
