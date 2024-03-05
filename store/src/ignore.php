<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Sole Haven | Product</title>
    <link rel="stylesheet" href="styles.css">
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/7623f015c6.js" crossorigin="anonymous"></script>
    <link href="https://fonts.cdnfonts.com/css/sf-pro-display" rel="stylesheet">
    <style>
      *{
        padding:0;
        margin: 0;
        box-sizing:border-box;
      }
      

      img{
        width:100%;
        display: block;
        }
      .container{
        width: 88vw;
         margin: 0 auto;
         
      }
      
      .lg-title,
     .md-title,
     .sm-title{
       font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
       padding:0.6rem 0;
      text-transform:capitalize;
      }
     .lg-title{
        font-size:2.5rem;
        font-weight:500;
        text-align: center;
        opacity: 0.9;
       padding: 1.3rem 0;
     }

     .md-title{
      font-size:2rem;
     }
     .sm-title{
      font-weight: 300;
      font-size:1rem;
      text-transform:uppercase;
     }
      .text-light{
       font-size:1rem;
       font-weight:600;
       line-height:1.5;
        opacity: 0.5;
        margin: 0.4rem 0;
     }
     /*product section*/
      .products{
       background: rgb(247, 247, 247);
       padding: 3.2rem 0;
       
    }
    .products.text-light{
      text-align: center;
      width: 70%;
      margin: 0.9rem auto;
    }
.product{
   margin:2rem;
   position: relative;
   
}
.product-content{
   background: rgb(241,241,241);
   box-shadow:0 0 20px 10px rgb(230,230,230);
   cursor: pointer;
}
.product-img{
   background:rgb(244,244,244);
   box-shadow: 0 0 20px 10px rgb(250,250,250);
   width: 200px;
   height:200px;
   margin: 0 auto;
   border-radius: 50%;
   transition: background 0.5s ease;
}
.product-btns{
   display: flex;
   justify-content: center;
   margin-top:1.4rem;
   opacity: 1;
   transition: opacity 0.6s ease;
}

.btn-cart, .btn-buy{
  background: transparent;
  border:1px solid rgb(255,255,255);
  padding: 0.8rem 0;
  width: 125px;
  font-family:inherit;
  text-transform: uppercase;
  cursor: pointer;
  border: none;
  transition: all 0.6s ease;
}
.btn-cart{
  background: rgb(0,0,0);;
}
.btn-cart:hover{
  background: rgb(0,0,150);
  color: #fff;
}
.btn-buy{
  background: rgb(0,0,0);
  
}
.btn-buy:hover{
  background: rgb(0,0,150);
  color: #fff;
}

.product-info{
  background: rgb(253,253,253);
  padding: 2rem;
}
.product-info-top{
  display:flex;
  justify-content:space-between;
  align-items: center; 
}
.rating span{
  color:rgb(25,50,180);
}
.product-name{
  color: rgb(0,0,0);
  display:block;
  text-decoration: none;
  font-size:1rem;
  text-transform:uppercase;
  font-weight: bold;
  opacity: 80%
}
.product-price{
  padding-top:0.6rem;
  padding-right:0.6rem;
  display:inline-block;
}
.product-price:first-of-type{
  text-decoration:line-through;
  color: rgb(25,227,79);
  opacity: 80%;
}

.product-img img{
  transition: transform 0.6s ease;
}

.product:hover .product-img img{
  transform:scale(1.1);
}
.product:hover .product-img{
  background:rgb(0,0,150);
}

.product:hover .product-btns{
  opacity:1;
}

.off-info .sm-title{
  background: rgb(0,0,150);
  color: rgb(255,255,255);
  display:inline-block;
  padding:0.5rem;
  position:absolute;
  top:0;
  left:0;
  writing-mode:vertical-lr;
  transform: rotate(180deg);
  z-index:1;
  letter-spacing:3px;
  cursor:pointer;
}
/*Item section */

.right-box{
  width:50%;
  border: 1px solid rgb(0,0,150);
  border-radius: 10px;
}
.main-image-box{
  padding:30px 0px;
  width:100%;
  display:flex;
  align-items:center;
  justify-content:center;
}
.main-image{
  height:390px;
  width:auto;
}
.small-images{
  display:flex;
  justify-content:space-between;
  padding:8px;
  align-items:center;

}
.image-box{
  margin: 0px 8px 8px 0px;
  height:100px;
  width: 100px;
  cursor:pointer;
  border: 1px solid rgb(0,0,150);
  border-radius:5px;
  display:flex;
  align-items:center;
  justify-content:center;
}
.image{
  height:90%;
  width:auto;
}
.details-box{
  width:50%;
  padding-left:50px;
}

.details-box h2{
color:(0,0,150);
}
.inputs{
  width:100%;
  justify-content: space-between;
}
td input{
  height: 30px;
}
button{
  border:none;
  border-radius:5px;
  padding:10px 15px;
  background-color: rgb(0,0,150);
  color: rgb(255,255,255);
  margin-top:14px;
  cursor:pointer;
}

/*
@media screen and (min-width:992px){
  .product-items{
    display:grid;
    grid-template-columns:repeat(2,1fr);
  }
}
@media screen and (min-width:1200px){
  .product-items{
    display:grid;
    grid-template-columns:repeat(3,1fr);
  }
  .product{
    margin-right:1rem;
    margin-left:1rem;
  }
  .product .text-light{
    width:50%;
  }
}
@media screen and (min-width:1336px){
  .product-items{
    display:grid;
    grid-template-columns:repeat(4,1fr);
  }
}
*/
    </style>
  </head>

<style>
  .image-container {
      white-space: nowrap; 
      overflow-x: auto; 
      z-index: 1;
  }

  .image-container img {
      margin-right: 0px;
      margin-left: 0px;
      width: 465px;
      height: 107px;
      display: inline-block; 
      z-index: 1;
  }

  @media (max-width: 600px) {
      .image-container {
          white-space: initial; 
          overflow-x: initial; 
          z-index: 1;
      }

      .image-container img {
          flex-basis: auto; 
          margin-right: 0;
          margin-left: 0;
          z-index: 1;
      }
    }


  /*--Section for the "best sellers" section--*/
  .image-section {
      display: flex;
      flex-wrap: wrap;
      justify-content: flex-start;
      margin-top: 20px;
      margin-left: 17px;
      z-index: 1;
  }

  .image-section .item-container {
      margin: 5px;
      max-width: calc(20% - 10px);
      height: auto;
      float: left;
      z-index: 1;
  }

  @media (max-width: 600px) {
      .image-section img {
          flex-basis: calc(50% - 10px); 
          width: 100%;
          z-index: 1;
      }
  }


  /*--text container--*/
  .text-container {
      position: relative;
      bottom: 0;
      left: 0;
      width: 100%;
      background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
      padding: 5px;
      box-sizing: border-box;
      z-index: 1;
  }


  .shoe-name {
      font-size: 14px;
      font-weight: bold;
      margin-bottom: 5px;
      z-index: 5;
      z-index: 1;
  }

  .price {
      font-size: 12px; 
      z-index: 1;
  }

  img:hover{
    z-index: 1;
  }

  .group:hover .absolute {
display: block;
z-index: 1;
}

/* Additional styles for the sub-menus */
.absolute {
display: none;
z-index: 1;
}
  
</style>


    
  <!-- navbar -->
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
          <a class="hover:text-gray-300" href="#">
            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-search w-10">
                <circle cx="11" cy="11" r="8"/>
                <path d="m21 21-4.35-4.35"/>
              </svg>
          </a>
          <a class="flex items-center hover:text-gray-300 pr-1" href="login.html">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-user w-10 mx-auto"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle>
            </svg>
            
          </a>
          <!-- Cart      -->
          <a class="flex items-center hover:text-gray-300" href="cart.html">
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

 <body class="overflow-x-hidden flex flex-col min-h-screen">

  <!-- Products Section -->
  <div class = "products">
    <div class = "container">
      <h1 class = "lg-title"> Jordan 4 - Black Cats </h1>
      <!-- Product Description insert below-->
      <p class = "text-light"> Here are our state of the art shoes from Jordan 
        These are made with deluxe material and high grade cushioning.
      </p>

      <div class = "product-items">
        <!--A single product-->
        <div class="product">
          <div class="product-content">
            <!-- Picture for the product insert below-->
            <div class = "product-img">
              <img src = "images/blackcatsneaker 1.png" alt = "product image"
              >
            </div>
            <!-- Main image section-->
            <div class= "right-box">
              <div class="main-image-box">
                <img src = "images/blackcatsneaker 1.png" alt = "main-Image">
              </div>
              <div class = "small-images">
                <div class = "image-box"><img src = "images/af1.png" class= "image"></div>
                <div class = "image-box"><img src = "images/blackcatsneaker 1.png" class= "image"></div>
                <div class = "image-box"><img src = "images/af1.png" class= "image"></div>
                <div class = "image-box"><img src = "images/blackcatsneaker 1.png" class= "image"></div>
              </div>
            </div>

            <div class="details-box">
            <h1> Here is the single product name and info </h1>
            <p>Availibility (In Stock)</p>
            <h2> £359.99</h2>
            <table cellspacing = "0" class="inputs">
                <tr>
                  <td> Quantity</td>
                  <td align ="right"><input type = "number" id = "first"></td>
                </tr>
                <tr>
                  <td> Sub Total</td>
                  <td align ="right"><input type = "number" id = "second"></td>
                </tr>
                <tr>
                  <td> Sales Tax 5.7%</td>
                  <td align ="right"><input type = "number" id = "third"></td>
                </tr>
                <tr>
                  <td> Total</td>
                  <td align ="right"><input type = "number" id = "fourth"></td>
                </tr>
                <h4>Specifications</h4>
                <p>Yappa yappa yappa </p>
            </div>
<script>
    let mainImage = document.getElementById("mainImage");
    let smallImage = document.getElementsByClassName("image");
    smallImage[0].onclick = () =>{
      mainImage.src = smallImage[0].src;
    }
    smallImage[1].onclick = () =>{
      mainImage.src = smallImage[1].src;
    }
    smallImage[2].onclick = () =>{
      mainImage.src = smallImage[2].src;
    }
    smallImage[3].onclick = () =>{
      mainImage.src = smallImage[3].src;
    }
    smallImage[4].onclick = () =>{
      mainImage.src = smallImage[4].src;
    }
    </script>
    





            <!--buttons-->
            <div class = "product-btns">
              <!--Add to cart button-->
              <button type = "button" class="btn-cart" >Add to cart
                <span><i class = "fas fa-plus"></i></span>
              </button>
              <button type = "button" class="btn-buy" > Buy Now
                <span><i class = "fas fa-shopping-cart"></i></span>
              </button>
            </div>

          <div class = "product-info">
            <div class = "product-info-top">
              <h2 class = "sm-title"> Shoe Collection </h2>
              <!--Shoe Rating-->
              <div class = "rating">
                <span><i class = "far fa-star"></i></span>
                <span><i class = "far fa-star"></i></span>
                <span><i class = "fas fa-star"></i></span>
                <span><i class = "fas fa-star"></i></span>
                <span><i class = "fas fa-star"></i></span>
              </div>
            </div>
            <a href = "#" class = "product-name"> Jordan 4 Black Cats</a>
            <!-- Test-->
           <!-- <div class="w-[10px] text-right text-xs">£185.00</div> -->
            <!--How it should be-->
            <p class = "product-price">£ 379.99</p>
            <p class = "product-price">£ 299.99</p>
          </div>

          <div class = "off-info">
            <h2 class = "sm-title">15% off</h2>
          </div>
      </div>
    </div>
  </div>


 </body>

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

</html>

