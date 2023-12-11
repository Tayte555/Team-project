<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sole Haven | Sneaker Wishlist</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.cdnfonts.com/css/sf-pro-display" rel="stylesheet">

    <style>
        body {
            font-family: 'SF Pro Display', sans-serif;
            margin: 0;
            box-sizing: border-box;
            background-color: #F9FAFB;
            color: #1F2937;
        }

        header {
            background-color: #111827;
            color: #F9FAFB;
            padding: 1rem;
            text-align: center;
        }

        header a {
            color: #F9FAFB;
            margin-right: 1rem;
            text-decoration: none;
        }

        .wishlist-container {
            padding: 2rem;
            text-align: center;
        }

        .sneaker-item {
            border: 1px solid #E5E7EB;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            background-color: #FFFFFF;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease-in-out;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .sneaker-item:hover {
            transform: translateY(-5px);
        }

        .sneaker-item img {
            max-width: 100%;
            border-radius: 8px;
            margin-bottom: 1rem;
        }

        footer {
            background-color: #111827;
            color: #F9FAFB;
            padding: 1rem;
            text-align: center;
        }
    </style>
</head>

<body>
    <header>
        <h1>Sole Haven</h1>
        <nav>
            <a href="#">Home</a>
            <a href="#">Products</a>
            <a href="#">Wishlist</a>
            <a href="#">Contact</a>
        </nav>
    </header>

    <div class="wishlist-container">
        <h2>Your Sneaker Wishlist</h2>

        <div class="sneaker-item">
            <img src="./images/wishlist1.jpg"width="100" height="100">
            <h3>Nike Air Max 90</h3>
            <p>$129.99</p>
            <button>Add to Cart</button>
        </div>

        <div class="sneaker-item">
            <img src="./images/wishlist2.jpg" width="100" height="100">
            <h3>Adidas Ultraboost</h3>
            <p>$149.99</p>
            <button>Add to Cart</button>
        </div>
    </div>

    <footer>
        &copy; 2023 Sole Haven. All rights reserved.
    </footer>
</body>

</html>