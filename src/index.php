<?php require_once 'include/functions.php';
$names = getDogname();
$breeds = getBreed();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dog DB</title>
</head>
<body>
    <h1>Dog DB</h1>
    <form name="adddog" action="submit.php" method="post">
        <fieldset>
            <legend>Enter Dog Information</legend>
            <label for="name">Dog Name:</label>
            <input type="text" name="dog_name" maxlength="255" required/>
        </br></br>
            <label for="age">Dog Age:</label>
            <input type="number" name="age" min="1" max="30" />
        </br></br>
            <label for="fix">Is Your Dog Fixed?</label>
            <input type="checkbox" name="isFixed" />
        </br></br>
            <label for="vac">Is Your Dog Vaccinated?</label>
            <input type="checkbox" name="isVaccinated" />
        </br></br>

        <label for="breed">Dog Breed:</label>
        <select name="breedlist">
            <?php foreach($breeds as $row): ?>
            <option value="<?=$row->breed_id?>"><?=$row->breed_name?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Save</button>
        </fieldset>
    </form>


    <ul><h2>Dog List:</h2>
        <?php foreach($names as $row): ?>
            <li>Name: <?=$row->dog_name?></li>
            <li>Age: <?=$row->age?></li>
            <li>Is Fixed? <?=$row->is_fixed?></li>
            <li>Is Vaccinated? <?=$row->is_vaccinated?></li>
            <li>Breed Id: <?=$row->breed_id?></li>
            <a onclick="" href="editform.php?id=<?=$row->dog_id?>">Edit</a></li>
            <a onclick="" href="delete.php?id=<?=$row->dog_id?>">Quick Delete</a></li>
            <a onclick="return confirm('Are you sure?')" href="delete.php?id=<?=$row->dog_id?>">Delete</a></li>
            </br></br>
            <hr>

        <?php endforeach; ?>
    </ul>


</body>
</html>