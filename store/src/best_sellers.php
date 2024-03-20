<!-- best_sellers.php -->

<?php 
session_start();

include("connections.php");
include("functions.php");

?>

<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="styles.css">
    <title>Best Sellers</title>
</head>

<style>

    .title{
        font-family: 'SF Pro Display', sans-serif;
        font-size: 50px;
        text-align: center;
        margin-top: 20px;
        margin-bottom: 15px;
    }
    
    .product img {
        max-width: 100%;
            height: auto;
    }
   
    
        .product{
        vertical-align:top;
        width: 245px;
        border: 2px solid rgb(0,0,0);
        border-radius: 5px;
        padding-left: 15px;
        padding-right: 15px;
        padding-top: 10px;
        padding-bottom:10px;
        margin-left: 15px;
        margin-right: 0px;
        margin-top:15px;
        margin-bottom: 10px;
        background-color: rgb(237,237,237);
        text-align: center;
        display: inline-block;
        }

        .product h2{
            font-size: 18px;
            margin: 5px 0;
        }
        .product p {
            margin: 5px 2;
        }
        .product form{ 
            margin-top: 10px;
        }
        .product input[type="number"] {
            vertical-align: top;
            width: 80px;
            padding-top:2px;
            padding-bottom: 2px;
            text-align: center;
            margin-right: 5px;
            border: 2px solid rgb(112,112,112);
            background: rgb(251,251,251);
            font-size: 20px;
            font-weight: bold;
        }
        .product input[type="submit"]{
            vertical-align: top;
            background-color: rgb(112, 112, 112);
            color: rgb(255,255,255);
            border: 2px solid rgb(112,112,112);
            padding: 5px 10px;
            cursor: pointer;
            transition: opacity 0.15s;
        }
        .product input[type="submit"]:hover{
            opacity: 0.8;
        }
        .product input[type="submit"]:active {
            opacity: 0.5;
        }

        
    </style>

<body class="overflow-x-hidden">

  <!-- navbar -->
    <header class="items-center bg-zinc-950 md:px">
        <div class="flex flex-wrap place-items-center">
      <section class="relative mx-auto">
          <!-- navbar -->
        <nav class="flex justify-between w-screen">
          
            <div class="px-2 flex w-full py-4 items-center">
            
              <a class="" href="home.php">
              <!-- <img class="h-9" src="logo.png" alt="logo"> -->
              <img class="h-6 
               " src="./images/logowhite.png" alt="logo"/>         
              </a>

            <!-- Nav Links -->
            <ul class="hidden md:flex mx-auto space-x-12 text-l text-white">
              <li><a class="hover:text-gray-300" href="./newarrivals.php">New Arrivals</a></li>
              <li><a class="hover:text-gray-300" href="./best_sellers.php">Best Sellers</a></li>
              <!-- Sneakers Hover Menu -->
              <li class="relative group">
                <a class="hover:text-gray-300" href="./sneakers.html">Sneakers
                  <svg aria-hidden="true" class="w-5 inline-block origin-center rotate-90" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-arrow-right">
                    <path d="m9 18 6-6-6-6"/>
                  </svg>
                </a>
                <ul class="absolute hidden space-y-2 bg-white text-black py-2 rounded-md">
                  <li><a href="./sneakers_men.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Men</a></li>
                  <li><a href="./sneakers_women.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Women</a></li>
                  <li><a href="./sneakers_clearance.html">&nbsp;&nbsp;&nbsp;Clearance&nbsp;&nbsp;&nbsp;</a></li>
                  <li><a href="./sneakers_kids.html">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kids</a></li>
                </ul>
              </li>
              
              <!-- Apparel Hover Menu -->
              <li class="relative group">
                <a class="hover:text-gray-300" href="./apparel.html">Apparel
                  <svg aria-hidden="true" class="w-5 inline-block origin-center rotate-90" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-arrow-right">
                    <path d="m9 18 6-6-6-6"/>
                  </svg>
                </a>
                <ul class="absolute hidden space-y-2 bg-white text-black py-2 rounded-md">
                  <li><a href="./apparel_socks.html">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Socks&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                  <li><a href="./apparel_shoecare.html">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Shoe Care</a></li>
                  <li><a href="./apparel_kits.html">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kits</a></li>
                </ul>
                </li>
              
              <!-- Accessories Hover Menu -->
              <li class="relative group">
                <a class="hover:text-gray-300" href="./accessories.html">Accessories
                  <svg aria-hidden="true" class="w-5 inline-block origin-center rotate-90" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-arrow-right">
                    <path d="m9 18 6-6-6-6"/>
                  </svg>
                </a>
                <ul class="absolute hidden space-y-2 bg-white text-black py-2 rounded-md">
                  <li><a href="./accessories_shoelaces.html">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Shoelaces&nbsp;&nbsp;&nbsp;</a></li>
                  <li><a href="./accessories_shoeinserts.html">&nbsp;&nbsp;&nbsp;Shoe Inserts&nbsp;&nbsp;&nbsp;</a></li>
                  <li><a href="./accessories_shoebags.html">&nbsp;&nbsp;&nbsp;&nbsp;Shoe Bags&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                  <li><a href="./accessories_soles.html">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Soles&nbsp;&nbsp;&nbsp;</a></li>
                </ul>
                </li>
              <li><a class="hover:text-gray-300 pr-40" href="#">Discover
                <svg aria-hidden="true" class="w-5 inline-block origin-center rotate-90" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-arrow-right">
                  <path d="m9 18 6-6-6-6"/>
                </svg>
              </a></li>
            </ul>
            <!-- Header Icons -->
            <div class="hidden xl:flex items-center -space-x-1 pr-6 text-gray-100">
              <!-- search icon -->
              <a class="hover:text-gray-300" href="#">
                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-search w-10">
                    <circle cx="11" cy="11" r="8"/>
                    <path d="m21 21-4.35-4.35"/>
                  </svg>
              </a>
              <!-- profile -->
              <a class="flex items-center hover:text-gray-300 pr-1" href="login.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-user w-10 mx-auto"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle>
                </svg>
                
              </a>
              <!-- Cart      -->
              <a class="flex items-center hover:text-gray-300" href="cart.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-cart w-10"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                </svg>
                <!--<span class="flex absolute -mt-5 ml-4">
                    <span class="animate-ping absolute inline-flex h-3 w-3 rounded-full bg-pink-400 opacity-75"></span>
                      <span class="relative inline-flex rounded-full h-3 w-3 bg-pink-500">
                      </span>
                    </span> -->           
              </a>             
            </div>
          </div>
        </nav>
      </section>
    </div>
    </header>

    <h1 class = "title"> Best Sellers <h1>
    </body>





<?php 

$query = "SELECT * FROM products";
$result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($result)) {
    echo '<div class = "product">';
    echo '<img src="' . $row['product_img'] . '" alt="' . $row['product_name'] . '">';
    echo '<h2>' . $row['product_name'] . '</h2>';
    echo '<p>Brand: ' . $row['brand'] . '</p>';
    echo '<p>Price: $' . $row['price'] . '</p>';
    echo '<form action="cart.php" method="post">';
    echo '<input type="hidden" name="product_id" value="' . $row['product_id'] . '">';
    echo '<input type="number" name="quantity" value="1" min="1">';
    echo '<input type="submit" value="Add to Cart">';
    echo '</form>';
    echo '</div>';
}

mysqli_close($connection);
?>

<br><br>
    <!-- footer section -->
    <footer class="bg-zinc-950 px-24 mt-auto">
    
      <div class="flex gap-x-12">
        
        <div class="">
          <div class=" bg-zinc-950 p-5 md:col-span-2 lg:col-auto">
            <h3 class="mb-2 text-base text-white text-sm font-bold pb-5 pt-6 grow">FIND US 🗺️</h3>
          <div class="">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2429.5812611345723!2d-1.8908227230241506!3d52.48671703869282!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4870bc9ae4f2e4b3%3A0x9a670ba18e08a084!2sAston%20University!5e0!3m2!1sen!2suk!4v1701019587175!5m2!1sen!2suk" width="370" height="130" class="rounded-xl" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade""></iframe>     
        </div>
      </div>
      </div>
      
  
      <div class="bg-zinc-950 p-5 md:col-span-2 lg:col-auto grow">
        <h3 class="mb-2 text-base text-white text-sm font-bold pb-5 pt-6">CUSTOMER SERVICE 🛎️</h3>
        <ul class="text-white space-y-3">
          <li class="mb-1">
            <a href="/privacy-policy" class="hover:opacity-50">Privacy policy</a>
          </li>
          <li class="mb-1">
            <a href="/refund-policy" class="hover:opacity-50">Refund policy</a>
          </li>
          <li class="mb-1">
            <a href="/tos" class="hover:opacity-50">Terms of service</a>
          </li>
          <li class="mb-1 pb-5">
            <a href="/shipping" class="hover:opacity-50">Shipping policy</a>
          </li>
        </ul>
    </div>
  
    <div class="bg-zinc-950 p-5 md:col-span-2 lg:col-auto grow">
      <h3 class="mb-2 text-base text-white text-sm font-bold pb-5 pt-6">INFORMATION 💼</h3>
      <ul class="text-white space-y-3">
        <li class="mb-1">
          <a href="/privacy-policy" class="hover:opacity-50">About us</a>
        </li>
        <li class="mb-1">
          <a href="/refund-policy" class="hover:opacity-50">Meet the team</a>
        </li>
        <li class="mb-1">
          <a href="contactus.php" class="hover:opacity-50">Contact us</a>
        </li>
        <li class="mb-1 pb-5">
          <a href="/shipping" class="hover:opacity-50">Careers</a>
        </li>
      </ul>
  </div>