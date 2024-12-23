<?php

include_once("./connexion.php");

if (isset($_POST["submit"])) {
    if (!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["role"])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $role = $_POST['role'];
        $sql = "INSERT INTO Users (name, email, role_id)VALUES (?, ?, ?)";
        $result = $conn->prepare($sql);
        $result->bind_param("ssi", $name, $email, $role);
        $result->execute();
        $result->close();
    } else {
        echo "error!";
    }
}

$req = "SELECT * FROM Role";
$result1 = mysqli_query($conn, $req);

$req1 = "SELECT * FROM Users";
$result2 = mysqli_query($conn, $req1);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            text-align: center;
        }
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
    </style>
</head>

<body>
    <form action="" method="POST">
        <input type="text" name="name">
        <input type="email" name="email">
        <select name="role" id="">
            <?php while ($res = mysqli_fetch_assoc($result1)): ?>
                <option value="<?php echo $res['id']; ?>"><?php echo $res['name']; ?></option>
            <?php endwhile; ?>
        </select>
        <input type="submit" name="submit">
    </form>

    <table border="1">
        <tr>
            <th>id</th>
            <th>name</th>
            <th>email</th>
            <th>role_id</th>
        </tr>
        <?php while ($res1 = mysqli_fetch_assoc($result2)): ?>
            <tr>
                <td><?php echo $res1['id']; ?></td>
                <td><?php echo $res1['name']; ?></td>
                <td><?php echo $res1['email']; ?></td>
                <td><?php echo $res1['role_id']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

</body>

</html>