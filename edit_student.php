<?php
include 'includes/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM students WHERE id=$id";
    $result = $conn->query($sql);
    $student = $result->fetch_assoc();

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $course = $_POST['course'];

        $sql = "UPDATE students SET name='$name', age='$age', gender='$gender', course='$course' WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            header("Location: view_students.php");
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
</head>
<body>
    <h1>Edit Student</h1>
    <form method="POST">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $student['name']; ?>" required><br>

        <label>Age:</label>
        <input type="number" name="age" value="<?php echo $student['age']; ?>" required><br>

        <label>Gender:</label>
        <select name="gender">
            <option value="Male" <?php if ($student['gender'] == 'Male') echo 'selected'; ?>>Male</option>
            <option value="Female" <?php if ($student['gender'] == 'Female') echo 'selected'; ?>>Female</option>
            <option value="Other" <?php if ($student['gender'] == 'Other') echo 'selected'; ?>>Other</option>
        </select><br>

        <label>Course:</label>
        <input type="text" name="course" value="<?php echo $student['course']; ?>" required><br>

        <button type="submit" name="submit">Update</button>
    </form>
</body>
</html>
