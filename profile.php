<?php
session_start();
include 'conx.php';

if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] === false) {
    header("Location: login.php?er=errr");
    exit();
}

// Check if the user is logged in
if (isset($_SESSION['user_info'])) {
    $user_info = explode(',', $_SESSION['user_info']);
    $user_id = $user_info[0];
    $first_name = $user_info[1];
    $last_name = $user_info[2];

    // Check if the user is a publisher
    $is_publisher = false;
    $publisher_query = "SELECT publisher FROM User WHERE id = ?";
    $stmt = $conn->prepare($publisher_query);
    $stmt->bind_param("i", $user_id);

    if (!$stmt->execute()) {
        // Handle query execution error
        die("Error executing query: " . $stmt->error);
    }

    $stmt->bind_result($publisher);
    $stmt->fetch();

    if ($publisher !== null) {
        $is_publisher = (bool)$publisher;
    }

    $stmt->close();

    // Get the user's favorite properties
    $favorite_properties_query = "
    SELECT p.property_id, p.city, p.location, p.status, p.property_type, p.payment_type,
           i.image_link
    FROM Property p
    INNER JOIN FavoriteProperty fp ON p.property_id = fp.property_id
    LEFT JOIN PropertyImages i ON p.property_id = i.property_id
    WHERE fp.user_id = ?
";

    $stmt = $conn->prepare($favorite_properties_query);
    $stmt->bind_param("i", $user_id);

    if (!$stmt->execute()) {
        // Handle query execution error
        die("Error executing query: " . $stmt->error);
    }

    $stmt->bind_result($property_id, $city, $location, $status, $property_type, $payment_type, $image_link);

    $favorite_properties = array();

    while ($stmt->fetch()) {
        $favorite_properties[] = array(
            'property_id' => $property_id,
            'city' => $city,
            'location' => $location,
            'status' => $status,
            'property_type' => $property_type,
            'payment_type' => $payment_type,
            'image_link' => $image_link,
        );
    }

    $stmt->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title>Your Favorite Properties</title>
</head>
<body>
<nav class='nav'>

    <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</nav>

<h1>Welcome, <?php echo $first_name . ' ' . $last_name; ?>!</h1>

<?php if ($is_publisher): ?>
    <p>You are a publisher.</p>
<?php else: ?>
    <p>You are not a publisher.</p>
<?php endif; ?>

<h2>Your Favorite Properties:</h2>
    <?php if (!empty($favorite_properties)): ?>
        <ul>
            <?php foreach ($favorite_properties as $property): ?>
                <li>
                    <strong>Property ID:</strong> <?php echo $property['property_id']; ?><br>
                    <strong>City:</strong> <?php echo $property['city']; ?><br>
                    <strong>Location:</strong> <?php echo $property['location']; ?><br>
                    <strong>Status:</strong> <?php echo $property['status']; ?><br>
                    <strong>Property Type:</strong> <?php echo $property['property_type']; ?><br>
                    <strong>Payment Type:</strong> <?php echo $property['payment_type']; ?><br>

                    <?php if ($property['image_link']): ?>
                        <img class="favorite" src="<?php echo $property['image_link']; ?>" alt="Property Image">
                    <?php else: ?>
                        <p>No image available</p>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>You have no favorite properties.</p>
    <?php endif; ?>
</body>
</html>