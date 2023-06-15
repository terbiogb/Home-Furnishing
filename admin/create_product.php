<?php include('header.php'); ?>

<?php
include('../server/connection.php');

if(isset($_POST['create_product'])) {

    $product_name = $_POST['name'];
    $product_description = $_POST['description'];
    $product_price = $_POST['price'];
    $product_special_offer = $_POST['offer'];
    $product_category = $_POST['category'];

    //this is the file itself
    $image1 =$_FILES['image1']['tmp_name'];
    $image2 =$_FILES['image2']['tmp_name'];
    $image3 =$_FILES['image3']['tmp_name'];
    $image4 =$_FILES['image4']['tmp_name'];
    $image5 =$_FILES['image5']['tmp_name'];
    // $file_name = $_FILES['image1']['name'];


    //this is the image name
    $image_name1 = $product_name."1.jpeg"; //wooden table1.jpeg
    $image_name2 = $product_name."2.jpeg"; //wooden table2.jpeg
    $image_name3 = $product_name."3.jpeg";
    $image_name4 = $product_name."4.jpeg";
    $image_name5 = $product_name."5.jpeg";

    //upload images
    move_uploaded_file($image1,"../assets/images/".$image_name1);
    move_uploaded_file($image2,"../assets/images/".$image_name2);
    move_uploaded_file($image3,"../assets/images/".$image_name3);
    move_uploaded_file($image4,"../assets/images/".$image_name4);
    move_uploaded_file($image5,"../assets/images/".$image_name5);

    //create a new user
    $stmt = $conn->prepare("INSERT INTO products (product_name,product_description,product_price,product_special_offer,product_image,product_image1,product_image2,product_image3,product_image4,product_category)
    VALUES (?,?,?,?,?,?,?,?,?,?)");

    $stmt->bind_param('ssssssssss',$product_name,$product_description,$product_price,$product_special_offer,$image_name1,$image_name2,$image_name3,$image_name4,$image5,$product_category);

    if($stmt->execute()) {
        header('location: admin_products.php?product_created=Product has been created successfully');
    }else{
        header('location: admin_products.php?product_failed=Error occurred. Try again.');
    }
}

?>