<?php
session_start();

include("connections.php");
include("functions.php");

// Check if the product ID is provided in the URL
if(isset($_GET['id'])) {
    $product_id = $_GET['id'];
    // Fetch product details based on the provided ID
    $product = getAllProductDetails($product_id, $connection);
} else {
    // Redirect or handle the case when the product ID is not provided
    // For example, you can redirect the user to another page or show an error message
    header("Location: index.php");
    exit(); // Ensure script execution stops after redirection
}
?>

<!DOCTYPE html>
<html lang="en">
  
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title> Sole Haven | Product</title>
  <link rel="stylesheet" href="styles.css">
  <script src="https://kit.fontawesome.com/7623f015c6.js" crossorigin="anonymous"></script>                
</head>

<style>
*{
  padding:0;
  margin:0;
  box-sizing:border-box;
}
img{
  width:100%;
  display: block;
}
.main-wrapper{
  max-height: 100%;
  background-color: rgb(240,240,230);
  display: flex;
  align-items:center;
  justify-content: center;
}
  .container{
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 16px;
  }
.product-div{
  margin: 1rem 0;
  padding: 2rem 0;
  display: grid;
  grid-template-columns: repeat(2, 1fr);
        background-color: rgb(240,250,240);
        border-radius: 15px;
        column-gap: 10px;
    }
    .product-div-left{
        padding: 20px;
    }
    .product-div-right{
        padding: 20px;
    }
    .img-container img{
        width: 350px;
        margin: 0 auto;
    }
    .hover-container{
        display: flex; 
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
        margin-top: 32px;
    }
    .hover-container div{
        border: 2px solid rgb(180,180,180);
        padding: 1rem;
        border-radius: 3px;
        margin: 0 4px 8px 4px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .active{
        border-color: rgb(180,180,180) !important;
    }
    .hover-container div:hover{
        border-color: rgb(180,180,180) !important;
    }
    .hover-container div img{
        width: 50px;
        cursor: pointer;
    }
    .product-div-right span{
        display: block;
    }
    .product-name{
        font-size: 26px;
        margin-bottom: 22px;
        font-weight: 700;
        letter-spacing: 1px;
        opacity: 0.9; 
    }
    .product-price{
        font-weight: 700;
        font-size: 24px;
        opacity: 0.9;
        font-weight: 500;
    }
    .product-rating{
        display: flex;
        align-items: center;
        margin-top: 12px;
    }
    .product-rating:hover{
      box-shadow: 5px, 5px, 5px, 0.15;
    }
    .product-rating span{
        margin-right: 6px;
    }
    .product-description{
        font-weight: 18px;
        line-height: 1.6;
        font-weight: 300;
        opacity: 0.9;
        margin-top: 22px;
    }
    .btn-groups{
        margin-top: 22px;
    }
    .btn-groups button{
        display: inline-block;
        font-size: 16px;
        font-family: inherit;
        text-transform: uppercase;
        padding: 15px 16px;
        color: rgb(0,0,0);
        cursor:pointer;
        transition: all 0.3s ease;
    }
    .btn-groups button .fas{
        margin-right: 8px;
    }
    .add-cart-btn{
        background-color: rgb(180,180,180);
        border: 2px solid rgb(0,0,0);
        margin-right: 8px;    
        transition: background-color 0.15s, color 0.15s, opacity 0.15s;
    }
    .add-cart-btn:hover{
        background-color: rgb(170,170,170);
        color: rgb(240,240,240);
    }
    .add-cart-btn:active{
      opacity: 0.3;
    }
    .buy-now-btn{
        background-color: rgb(0,0,0);
        border: 2px solid rgb(0,0,0);
        transition: background-color 0.15s, color 0.15s, opacity 0.15s;
    }
    .buy-now-btn:hover{
        background-color: rgb(20,180,0);
        color: rgb(240,240,240);
        opacity: 0.7;
    }
    .buy-now-btn:active{
      opacity: 0.2;
    }

    .select-size{
      font-size: 20px;
      margin-top: 15px;
      
    }

.size-group{
  border-color:red;
  border: 2px solid rgb(0,0,0);
  display: flex;
  align-items:center;
  justify-content: center;
  color: rgb(0,0,0);
  margin-top: 10px;
  padding-bottom: 1px;
  padding-top:1px;
  height: 70px;
}
.size-btn{
  margin-right: 25px;
  margin-top: 25px;
  margin-left: 10px;
  margin-right: 10px;
  margin-bottom: 20px;
  padding-left: 10px;
  padding-right: 10px;
  padding-top: 10px;
  padding-bottom:10px;
  font-size: 22px;
  font-weight: bold;
  transition:font-size 0.3s, opacity 0.15s, margin 0.2s;
}
.size-btn:hover{
  opacity: 0.5;
  font-size: 30px;
  margin-left: 5px;

}
.size-btn:active{
  opacity: 0.3;
  color: red;
}


@media screen and (max-width: 992px){
    .product-div{
        grid-template-columns:100%;
    }
    .product-div-right{
        text-align:center;
    }
    .product-rating{
        justify-content: center;
    }
    .product-description{
        max-width: 400;
        margin-right: auto;
        margin-left: auto;
    }
}
@media screen and (max-width: 400px){
    .btn-groups button{
        width: 100%;
        margin-bottom: 10px;
    }
}

</style>

<script>
    const allHoverImages = document.querySelectorAll('.hover-container div img')
    const imgContainer = document.querySelector('.img-container');

    window.addEventListener('DOMContentLoaded', () =>{
        allHoverImages[0].parentElement.classList.add('active');
    });

    allHoverImages.forEach((image) =>{
        image.addEventListener('mouseover',() =>{
            imgContainer.querySelector('img').src = image.src;
            resetActiveImg();
            image.parentElement.classList.add('active');
        });
    })

    function resetActiveImg(){
        allHoverImages.forEach((img) => {
            img.parentElement.classList.remove('active');
        });
    }
</script>


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
              <li><a class="hover:text-gray-300" href="#">New Arrivals</a></li>
              <li><a class="hover:text-gray-300" href="best_sellers.php">Best Sellers</a></li>
              <!-- Sneakers Hover Menu -->
              <li class="relative group">
                <a class="hover:text-gray-300" href="./sneakers.html">Sneakers
                  <svg aria-hidden="true" class="w-5 inline-block origin-center rotate-90" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-arrow-right">
                    <path d="m9 18 6-6-6-6"/>
                  </svg>
                </a>
                <ul class="absolute hidden space-y-2 bg-white text-black py-2 rounded-md">
                  <li><a href="./sneakers_men.html">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Men</a></li>
                  <li><a href="./sneakers_women.html">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Women</a></li>
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


    <!-- <section> 
        <div class = "main-wrapper">
            <div class = "container">
                <div class = "product-div">
                    <div class = "product-div-left">
                        <div class = "img-container">
                            <img src = "images/blackcatsneaker 1.png" alt = "jordan 4">
                        </div>
                        <div class = "hover-container">
                            <div>
                                <img src = "images/blackcatsneaker 1.png">
                            </div>  
                            <div>
                                <img src = "images/blackcatsneaker 1.png">
                            </div>  
                            <div>
                                <img src = "images/sneakersmol2.png">
                            </div>  
                            <div>
                                <img src = "images/blackcatsneaker 1.png">
                            </div> 
                            <div>
                                <img src = "images/blackcatsneaker 1.png">
                            </div>     
                        </div>
                    </div>

                    <div class = "product-div-right">
                        <span class = "product-name">
                            Jordan 4 Black Cat</span>
                        <span class = "product-price"> £ 379.99</span>
                        <div class = "product-rating">
                            <span><i class = "fas fa-star"></i></span>
                            <span><i class = "fas fa-star"></i></span>
                            <span><i class = "fas fa-star"></i></span>
                            <span><i class = "fas fa-star-half-alt"></i></span>
                            <span><i class = "far fa-star"></i></span>
                            <span>(1942 Ratings)</span>
                        </div>
                        <p class = "product-description">
                        Here are our state of the art shoes from Jordan 
                        These are made with deluxe material and high grade 
                        cushioning.
                        </p>
                        <div class = "Shoe-size">
                          <p class = "select-size">Select Size:</p>
                          <div class = "size-group">
                            <button type = "button" class = "size-btn">3</button>
                            <button type = "button" class = "size-btn"> 4</button>
                            <button type = "button" class = "size-btn"> 5</button>
                            <button type = "button" class = "size-btn"> 6</button>
                            <button type = "button" class = "size-btn"> 7</button>
                            <button type = "button" class = "size-btn"> 8</button>
                            <button type = "button" class = "size-btn"> 9</button>
                            <button type = "button" class = "size-btn"> 10</button>
                            <button type = "button" class = "size-btn"> 11</button>
                            <button type = "button" class = "size-btn"> 12</button>
                            <button type = "button" class = "size-btn"> 13</button>                          
                          </div>
                        </div>

                        <div class = "btn-groups">
                            <button type = "button" class = "add-cart-btn">
                                <i class = "fas fa-shopping-cart"></i> Add To Cart
                            </button>
                            <button type = "button" class = "buy-now-btn">
                                <i class = "fas fa-wallet"></i> Buy Now
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </section> -->

<!--CHANGE THIS PART BELOW TO MAKE IT WORK-->

<section> 
  <div class="main-wrapper">
    <div class="container">
      <div class="product-div">
        <div class="product-div-left">
          <div class="img-container">
            <!-- Display the product image from the fetched product details -->
            <img src="<?php echo $product['product_img']; ?>" alt="<?php echo $product['product_name']; ?>">
          </div>
          <!-- Hover container content remains unchanged -->
        </div>
        <div class="product-div-right">
          <span class="product-name"><?php echo $product['product_name']; ?></span>
          <span class="product-price">£ <?php echo $product['price']; ?></span>
          <br>
          <!-- Product description and release date -->
          <div class="product-info">
            <p><?php echo $product['product_desc']; ?></p>
            <br>
            <p>Release Date: <?php echo $product['release_date']; ?></p>
          </div>
          <!-- Button groups and buttons content remains unchanged -->
        </div>
      </div>
    </div>
  </div>
</section>



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
        
      <div class="bg-zinc-950 p-5 md:col-span-2 lg:col-auto grow">
        <h3 class="mb-2 text-base text-white text-sm font-bold pb-5 pt-6">JOIN OUR NEWSLETTER 🤫</h3>
        <div>
          <div>
            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Enter your email" required="">        </div>
            
            <ul class="flex mt-9">
              <li class="grow">
                <a>
                  <svg width="25" height="25" viewBox="0 0 1792 1792" fill="#ffffff">
                    <path d="M1152 896q0-106-75-181t-181-75-181 75-75 181 75 181 181 75 181-75 75-181zm138 0q0 164-115 279t-279 115-279-115-115-279 115-279 279-115 279 115 115 279zm108-410q0 38-27 65t-65 27-65-27-27-65 27-65 65-27 65 27 27 65zM896 266q-7 0-76.5-.5t-105.5 0-96.5 3-103 10T443 297q-50 20-88 58t-58 88q-11 29-18.5 71.5t-10 103-3 96.5 0 105.5.5 76.5-.5 76.5 0 105.5 3 96.5 10 103T297 1349q20 50 58 88t88 58q29 11 71.5 18.5t103 10 96.5 3 105.5 0 76.5-.5 76.5.5 105.5 0 96.5-3 103-10 71.5-18.5q50-20 88-58t58-88q11-29 18.5-71.5t10-103 3-96.5 0-105.5-.5-76.5.5-76.5 0-105.5-3-96.5-10-103T1495 443q-20-50-58-88t-88-58q-29-11-71.5-18.5t-103-10-96.5-3-105.5 0-76.5.5zm768 630q0 229-5 317-10 208-124 322t-322 124q-88 5-317 5t-317-5q-208-10-322-124t-124-322q-5-88-5-317t5-317q10-208 124-322t322-124q88-5 317-5t317 5q208 10 322 124t124 322q5 88 5 317z"/>
                  </svg>
                </a>
              </li>
  
              <li class="grow">
                <a>
                  <svg width="25" height="25" viewBox="0 0 1792 1792" fill="#ffffff">
                    <path d="M1684 408q-67 98-162 167 1 14 1 42 0 130-38 259.5T1369.5 1125 1185 1335.5t-258 146-323 54.5q-271 0-496-145 35 4 78 4 225 0 401-138-105-2-188-64.5T285 1033q33 5 61 5 43 0 85-11-112-23-185.5-111.5T172 710v-4q68 38 146 41-66-44-105-115t-39-154q0-88 44-163 121 149 294.5 238.5T884 653q-8-38-8-74 0-134 94.5-228.5T1199 256q140 0 236 102 109-21 205-78-37 115-142 178 93-10 186-50z"/>
                  </svg>          
                </a>
  
              </li>
  
              <li class="grow">
                <a>
                  <svg width="25" height="25" viewBox="0 0 1792 1792" fill="#ffffff">
                    <path d="M1376 128q119 0 203.5 84.5T1664 416v960q0 119-84.5 203.5T1376 1664h-188v-595h199l30-232h-229V689q0-56 23.5-84t91.5-28l122-1V369q-63-9-178-9-136 0-217.5 80T948 666v171H748v232h200v595H416q-119 0-203.5-84.5T128 1376V416q0-119 84.5-203.5T416 128h960z"/>
                  </svg>                
                </a>
  
              </li>
  
              <li>
                <a>
                  <svg width="25" height="25" viewBox="0 0 1792 1792" fill="#ffffff">
                    <path d="m711 1128 484-250-484-253v503zm185-862q168 0 324.5 4.5T1450 280l73 4q1 0 17 1.5t23 3 23.5 4.5 28.5 8 28 13 31 19.5 29 26.5q6 6 15.5 18.5t29 58.5 26.5 101q8 64 12.5 136.5T1792 788v176q1 145-18 290-7 55-25 99.5t-32 61.5l-14 17q-14 15-29 26.5t-31 19-28 12.5-28.5 8-24 4.5-23 3-16.5 1.5q-251 19-627 19-207-2-359.5-6.5T336 1512l-49-4-36-4q-36-5-54.5-10t-51-21-56.5-41q-6-6-15.5-18.5t-29-58.5T18 1254q-8-64-12.5-136.5T0 1004V828q-1-145 18-290 7-55 25-99.5T75 377l14-17q14-15 29-26.5t31-19.5 28-13 28.5-8 23.5-4.5 23-3 17-1.5q251-18 627-18z"/>
                  </svg>
                </a>
  
              </li>
  
            </ul>
        </div>
  
      </div>
  
    </footer>



</body>
</html>