<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Payment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <link rel="stylesheet" href="shopping-cart.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="icon" href="./images/logowhitefav.png" type="image/x-icon">
</head>

<body>
   <!-- navbar -->
   <header class="items-center bg-zinc-950 md:px">
        <div class="flex flex-wrap place-items-center">
            <section class="relative mx-auto">
                <!-- navbar -->
                <nav class="flex justify-between w-screen">

                    <div class="px-2 flex w-full py-4 items-center">

                        <a class="" href="index.php">
                            <!-- <img class="h-9" src="logo.png" alt="logo"> -->
                            <img class="h-6 
				   " src="./images/logowhite.png" alt="logo" />
                        </a>

                        <!-- Nav Links -->
                        <ul class="hidden md:flex mx-auto space-x-12 text-l text-white">
                            <li><a class="hover:text-gray-300" href="newarrivals.php">New Arrivals</a></li>
                            <li><a class="hover:text-gray-300" href="best_sellers.php">Best Sellers</a></li>
                            <li><a class="hover:text-gray-300" href="sneakers.php">Sneakers
                                    <svg aria-hidden="true" class="w-5 inline-block origin-center rotate-90"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="icon icon-arrow-right">
                                        <path d="m9 18 6-6-6-6" />
                                    </svg>
                                </a></li>
                            <li><a class="hover:text-gray-300" href="apparel.php">Apparel
                                    <svg aria-hidden="true" class="w-5 inline-block origin-center rotate-90"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="icon icon-arrow-right">
                                        <path d="m9 18 6-6-6-6" />
                                    </svg>
                                </a></li>
                            <li><a class="hover:text-gray-300" href="accessories.php">Accessories
                                    <svg aria-hidden="true" class="w-5 inline-block origin-center rotate-90"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="icon icon-arrow-right">
                                        <path d="m9 18 6-6-6-6" />
                                    </svg>
                                </a></li>
                            <li><a class="hover:text-gray-300 pr-40" href="./discover.php">Discover
                                    <svg aria-hidden="true" class="w-5 inline-block origin-center rotate-90"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="icon icon-arrow-right">
                                        <path d="m9 18 6-6-6-6" />
                                    </svg>
                                </a></li>
                        </ul>
                        <!-- Header Icons -->
                        <div class="hidden xl:flex items-center -space-x-1 pr-6 text-gray-100">
                            <!-- search icon -->
                            <form action="search.php" method="GET" class="flex items-center">
                                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="icon icon-search w-6 h-6">
                                    <circle cx="11" cy="11" r="8" />
                                    <path d="m21 21-4.35-4.35" />
                                </svg>
                                <div class="flex-grow">
                                    <input type="search" name="search" placeholder="Search items..."
                                        class="w-full h-10 px-4 bg-transparent text-white placeholder-gray-300 rounded transition-all duration-300 focus:border-blue-300 focus:bg-white focus:text-black" />
                                </div>
                            </form>
                            <!-- profile -->
                            <a class="flex items-center hover:text-gray-300 pr-1" href="login.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon icon-user w-10 mx-auto">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>

                            </a>
                            <!-- Cart      -->
                            <a class="flex items-center hover:text-gray-300" href="cart.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon icon-cart w-10">
                                    <circle cx="9" cy="21" r="1"></circle>
                                    <circle cx="20" cy="21" r="1"></circle>
                                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
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
    <main class="page payment-page">
        <section class="payment-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2>Payment</h2>
                    <p>Complete your payment details below.</p>
                </div>
                <form action="process_payment.php" method="post">
                    <div class="products">
                        <h3 class="title">Checkout</h3>
                        <?php
                        $total = 0;
                        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $item) {
                                $total += $item['price'] * $item['quantity'];
                                echo '<div class="item">';
                                echo '<span class="price">$' . number_format($item['price'], 2) . '</span>';
                                echo '<p class="product_name">' . htmlspecialchars($item['product_name']) . '</p>';
    
                                echo '</div>';
                            }
                        } else {
                            echo '<p>Your cart is empty.</p>';
                        }
                        ?>
                        <div class="total">Total<span class="price">$<?php echo number_format($total, 2); ?></span></div>
                    </div>
                    <div class="card-details">
                        <h3 class="title">Credit Card Details</h3>
                        <div class="row">
                            <div class="form-group col-sm-7">
                                <label for="card-holder">Card Holder</label>
                                <input id="card-holder" type="text" class="form-control" placeholder="Card Holder Name" name="card_holder" required>
                            </div>
                            <div class="form-group col-sm-5">
                                <label>Expiration Date</label>
                                <div class="input-group expiration-date">
                                    <input type="text" class="form-control" placeholder="MM" name="exp_month" required>
                                    <span class="date-separator">/</span>
                                    <input type="text" class="form-control" placeholder="YY" name="exp_year" required>
                                </div>
                            </div>
                            <div class="form-group col-sm-8">
                                <label for="card-number">Card Number</label>
                                <input id="card-number" type="text" class="form-control" placeholder="Card Number" name="card_number" required>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="cvc">CVC</label>
                                <input id="cvc" type="text" class="form-control" placeholder="CVC" name="cvc" required>
                            </div>
                            <div class="form-group col-sm-12">
                                <button type="submit" class="btn btn-primary btn-block">Proceed</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

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
            <a href="privacy.html" class="hover:opacity-50">Privacy policy</a>
          </li>
          <li class="mb-1">
            <a href="refundpolicy.html" class="hover:opacity-50">Refund policy</a>
          </li>
          <li class="mb-1">
            <a href="terms_of_use.html" class="hover:opacity-50">Terms of service</a>
          </li>
          <li class="mb-1 pb-5">
            <a href="shipping_response.html" class="hover:opacity-50">Shipping policy</a>
          </li>
        </ul>
    </div>
  
    <div class="bg-zinc-950 p-5 md:col-span-2 lg:col-auto grow">
      <h3 class="mb-2 text-base text-white text-sm font-bold pb-5 pt-6">INFORMATION 💼</h3>
      <ul class="text-white space-y-3">
        <li class="mb-1">
          <a href="aboutus.html" class="hover:opacity-50">About us</a>
        </li>
        <li class="mb-1">
          <a href="FAQ.html" class="hover:opacity-50">FAQ</a>
        </li>
        <li class="mb-1">
          <a href="contactus.php" class="hover:opacity-50">Contact us</a>
        </li>
        <li class="mb-1 pb-5">
          <a href="shipping_response.html" class="hover:opacity-50">Careers</a>
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

  <!-- /footer section -->
</body>
</html>