<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/userposts.css">
    <link rel="stylesheet" href="/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <title>Aboutus</title>
    <style>
         .contanier{
            display: flex;
            flex-direction: row;
            justify-content: center;
            margin: 10px;
           gap: 4px;
        }
        img{
            width: 400px;
            margin: 30px;
        }
        #text{
            width: 550px;
            position: relative;
            top: 70px;
            font-size: 19px;
            padding: 10px;
            padding-right: 32px;
            text-align: justify;
        }
        #text:hover{
   
        cursor: pointer;
        }
        span{
            font-weight: bold;
            color: #1a5e8b;
        }
    </style>
</head>
<body>
    <?php
     include('includes/header.php');
    ?>
   
   
   <div class="contanier">
<p id="text">At BelongingBack, we are dedicated to bringing together a community of individuals passionate about helping others.<br><span> Our mission </span> is to facilitate the reunification of lost items with their rightful owners while fostering a culture of support and kindness. Our team, comprised of experienced professionals in technology and community-building, is committed to providing a platform that empowers users to make a meaningful impact. Together, we celebrate every successful reunion and cherish the connections forged within our community. Join us in our journey to make a difference - sign up today and be a part of our growing network of helpers!" </p>
<img src="/img/aboutus.jpg" alt="">
</div>
   
  
    <?php
    include('includes/footer.php');
    ?>
</body>
</html>
