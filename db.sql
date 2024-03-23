-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2024 at 02:16 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `team_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `contactform`
--

CREATE TABLE `contactform` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `colour` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `product_collection` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `release_date` date NOT NULL,
  `stock_quantity` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `product_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `colour`, `brand`, `product_collection`, `price`, `release_date`, `stock_quantity`, `category`, `product_img`, `product_desc`) VALUES
(1, 'Drake x Nike Air Force 1 Low Certified Lover Boy', 'White', 'Nike', 'Air Force 1', '250.00', '2022-12-10', 150, 'Mens', './images/set1/1.png', 'The shoe is heavily informed by the classic all-white Nike Air Force 1, but swaps out the traditional “NIKE” midsole branding for “Love You Forever” text. Miniature hearts on the shoes outsole follow the lover boy theme and NOCTA branding hits up the heel tab. The shoe comes ready for personalization with an array of translucent blue beads and includes a premium set of laces with metal aglets.'),
(2, 'Nike Air Force 1 07 QS Black Skeleton', 'Black', 'Nike', 'Air Force 1', '700.00', '2019-10-25', 20, 'Mens', './images/set1/2.webp', 'The Nike Air Force 1 Low “Skeleton - Black” is a spooky rendition of the venerable low-top design. The “Skeleton” Air Force 1 in black is a follow up to the popular all-white leather colorway that was released a year earlier to celebrate Halloween in 2018. Here, the “Skeleton” Air Force 1 features the same festive glow-in-the-dark Halloween vibe with a graphic of the bones of the foot adorning the sides of the upper. Sporting a nighttime-appropriate black leather base, the stealthy upper features a tonal Swoosh that sits underneath the anatomic design. The same skeleton theme also appears on the insoles with a glow-in-the-dark outsole completing the look of the shoe.'),
(3, 'Louis Vuitton Nike Air Force 1 Low By Virgil Abloh', 'Green', 'Nike', 'Air Force 1', '6999.99', '2018-07-10', 15, 'Mens', './images/set1/3.webp', 'The Nike Air Force 1, celebrating its 40th year, was designed in 1982 and is one of the most successful and iconic shoes ever created. On the occasion of the Louis Vuitton Mens Spring-Summer 2022 runway show, Virgil Abloh collaborated with Nike to design 47 pairs of bespoke Air Force 1s, fusing the trainers classic codes with the insignia and materials of Louis Vuitton in homage to the hip-hop culture that shaped him.'),
(4, 'Air Jordan 1 Retro High OG Chicago Lost & Found', 'Red', 'Nike', 'Jordan 1', '320.00', '2012-10-10', 25, 'Mens', './images/set1/5.webp', 'The Air Jordan 1 Retro High OG Chicago Lost & Found brings back the iconic silhouette that started it all. Featuring the high-cut shape of the original 1985 release, the leather upper combines a white base with a black signature Swoosh and scarlet overlays at the forefoot and heel. Cracked black leather appears on the padded collar, while a vintage pre-yellowed finish is applied to the white rubber midsole. The vintage 80s aesthetic extends to the special packaging, highlighted by a damaged box plastered with sale stickers and topped with a mismatched replacement lid. An accompanying sales invoice is emblematic of a time when the Air Jordan 1 lingered on the shelves of mom and pop stores, eventually making their way into the hands of lucky customers at a steep discount.'),
(5, 'Travis Scott x Air Jordan 1 Low OG Reverse Mocha', 'Brown', 'Nike', 'Jordan 1', '1280.00', '2022-08-12', 100, 'Mens', './images/set1/6.webp', 'The Travis Scott x Air Jordan 1 Low OG Reverse Mocha delivers a twist on the original Mocha AJ1 Low from 2019. The upper combines a brown suede base with ivory leather overlays and the Houston rappers signature reverse Swoosh on the lateral side, featuring oversized dimensions and a neutral cream finish. Contrasting scarlet accents distinguish a pair of woven Nike Air tongue tags, as well as mismatched Cactus Jack and retro Wings logos embroidered on each heel tab. A vintage off-white rubber midsole is bolstered with encapsulated Nike Air cushioning in the heel and a brown rubber outsole underfoot.'),
(6, 'Air Jordan 4 Retro Military Black', 'White', 'Nike', 'Jordan 4', '319.99', '2017-09-14', 350, 'Mens', './images/set1/7.webp', 'The Air Jordan 4 Retro Military Black showcases the same color blocking and materials featured on the OG Military Blue colorway from 1989. Smooth white leather is utilized on the upper, bolstered with a forefoot overlay in grey suede. Contrasting black accents make their way to the TPU eyelets, molded heel tab, and the Jumpman logo displayed on the woven tongue tag. Lightweight cushioning comes courtesy of a two-tone polyurethane midsole, enhanced with a visible Air-sole unit under the heel.'),
(7, 'Air Jordan 4 Retro Black Cat 2020', 'Black', 'Nike', 'Jordan 4', '1399.99', '2020-07-17', 500, 'Mens', './images/set1/9.webp', 'The 2020 edition of the Air Jordan 4 Retro Black Cat brings back the all-black colorway of the classic silhouette, one that draws inspiration from one of Michael Jordans various nicknames. Like the original 2006 release, this pair makes use of a monochromatic black suede upper with a matching black midsole. Jumpman branding on the woven tongue tag is rendered in Light Graphite, representing the sneakers only contrasting design element.'),
(8, 'Paris Saint-Germain x Air Jordan 4 Retro Bordeaux', 'Purple', 'Nike', 'Jordan 4', '745.00', '2023-03-01', 125, 'Mens', './images/set1/10.webp', 'Celebrating Jordan Brands partnership with the French football club, the Paris Saint-Germain x Air Jordan 4 Retro Bordeaux features color blocking that recalls the silhouettes OG Fire Red composition. The white leather upper is accented with black wings and Bordeaux detailing on the eyelets, interior tongue and heel, the latter marked with dual Jumpman and PSG branding. A black woven tab on the lateral forefoot is inscribed with Paname, a slang term for the French capital.'),
(9, 'Air Jordan 4 Retro Motorsports', 'Blue', 'Nike', 'Jordan 4', '439.99', '2017-03-01', 300, 'Mens', './images/set1/11.webp', 'The Air Jordan 4 Retro Motorsports is inspired by a 2006 friends and family colourway created for the 4th anniversary of MJs Motorsports Racing team. Released to the general public in March of 2017, the sneaker incorporates the teams white, black, and varsity royal blue colours, but removes the Mars Blackmon heel accent that graced the 2006 sneaker. An Air Jordan 4 Retro Motorsports Alternate, released a few months later in a black colourway.'),
(10, 'Nike Dunk Low Grey Fog', 'Grey', 'Nike', 'Dunk', '155.00', '2022-11-25', 600, 'Mens', './images/set1/14.webp', 'The Nike Dunk Low Grey Fog delivers a subtle two-tone colorway of the classic silhouette originally released in 1985 as a college hoops shoe. The all-leather upper is treated to a pristine white base with contrasting overlays in a light grey shade. The same neutral tone is repeated on the Swoosh, laces and woven Nike tongue tag. Additional Nike branding lands on the heel tab and padded sockliner. The low-top rests on a standard rubber cupsole that pairs white sidewalls with a grey rubber outsole.'),
(11, 'Yeezy Boost 350 V2 Black-White', 'Black', 'Yeezy', '350', '499.99', '2020-09-30', 750, 'Mens', './images/set1/15.webp', 'Having truly created his own unique vision of contemporary sportswear, Kanye West marked 2016 with the release of the eagerly-awaited Yeezy Season 3. Here, teaming with adidas once again, West delivers a fresh edition of the reworked icon that is the Yeezy 350 Boost, entitled 350 V2. The silhouette boasts a black Primeknit upper accompanied by a white accent to the side wall. Continuing the idiosyncrasies of the V2 iteration, each sneaker features SPLY-350 interwoven to the side panel, sat atop an adidas BOOST sole unit.'),
(12, 'Yeezy Boost 350 V2 Bone', 'White', 'Yeezy', '350', '269.99', '2020-09-30', 700, 'Mens', './images/set1/16.webp', 'The Yeezy Boost 350 V2 Bone treats the lifestyle runner to a refined makeover, highlighted by a breathable Primeknit upper in a subtle ivory finish. A monofilament side stripe adds a see-through element to the minimalist design, while a webbing pull tab at the heel provides easy on and off. Inside the shoe, three-stripe branding on the interior heel is accompanied by Yeezy stamped on the sockliner. Responsive cushioning comes courtesy of a TPU-wrapped full-length Boost midsole.'),
(13, 'Yeezy Boost 350 V2 Onyx', 'Black', 'Yeezy', '350', '325.00', '2020-09-30', 800, 'Mens', './images/set1/17.webp', 'The Yeezy Boost 350 V2 Onyx applies a stealthy palette to the lifestyle silhouette that merges Kanye Wests visionary aesthetic with adidas performance technology. The sneaker makes use of a one-note black Primeknit upper, secured with rope laces and equipped with a pull tab at the heel. On the lateral side, a post-dyed monofilament stripe adds a see-through element to the sock-like build. A full-length Boost midsole is surrounded by a ribbed, semi-translucent TPU cage that maintains the shoes monochrome design.'),
(14, 'Yeezy Slides Slate Marine', 'Black', 'Yeezy', 'Slides', '95.00', '2022-08-22', 400, 'Mens', './images/set1/18.webp', 'The Yeezy Slide Slate Marine pairs a minimalist design with a tonal finish in a subdued shade of blue. Built with a single piece of injected EVA foam, the slip-on boasts a wide strap upper that entirely covers the top of the foot. Exterior branding is limited to adidas three stripes logo, debossed on the soft top lay of the footbed. Underfoot, the outsole features a series of horizontal grooves for improved cushioning and traction.'),
(15, 'Yeezy Slides Slate Grey', 'Grey', 'Yeezy', 'Slides', '100.00', '2022-08-22', 500, 'Mens', './images/set1/19.webp', 'The Yeezy Slides Slate Grey is now available at Solehaven!'),
(16, 'Yeezy Slides Bone 2022', 'White', 'Yeezy', 'Slides', '134.99', '2022-08-22', 200, 'Mens', './images/set1/20.webp', 'The Yeezy Slide Bone 2022 applies a neutral hue to Kanye Wests take on an everyday sandal, constructed from EVA foam for lightweight comfort. The minimalist design is good for a sleek, contemporary look, with exterior branding limited to adidas three-stripe logo debossed at the heel of the footbed. The slip-on build rides atop a high-traction outsole, fitted with strategically placed grooves for sure footing.'),
(17, 'Yeezy Slides Granite', 'Black', 'Yeezy', 'Slides', '100.00', '2023-10-01', 300, 'Mens', './images/set1/21.webp', 'The Yeezy Slide Granite accentuates the sandals sleek, modern lines with a tonal dark grey finish. Built with a solitary piece of lightweight and durable EVA foam, the slip-on delivers a comfortable fit, thanks to the combination of a wide strap upper and soft footbed. The latter is embellished with adidas three-stripe logo, representing the only bit of exterior branding. The outsole features strategic groove placement for improved traction and a smooth, natural ride.'),
(18, 'Yeezy Slides Ochre', 'Brown', 'Yeezy', 'Slides', '89.99', '2022-08-22', 400, 'Mens', './images/set1/22.webp', 'The Yeezy Slide Ochre features a rubberized foam build in a lightly textured finish. The diffuse brown palette is marked with subtly discoloured patches for an aged aesthetic. Branding is limited to an adidas three-stripe logo debossed on the soft top layer of the footbed. The minimalist slip-on is mounted on an outsole equipped with a series deep horizontal grooves, strategically arranged for improved cushioning and traction.'),
(19, 'Yeezy Boost 700 Wave Runner', 'Grey', 'Yeezy', '700 boost', '349.99', '2021-07-13', 300, 'Mens', './images/set1/23.webp', 'Ride the wave! Adding another unique sneaker to his line Kanye West introduced the adidas Yeezy Boost 700 Wave Runner in 2017. A love-it-or-hate-it shoe for many, if youre here on this page, were guessing you love its eye-catching look with a chunky sole and running inspired upper. This debut colorway in grey with black, teal, and orange accents was released without any warning on Kanyes YEEZY SUPPLY site, and many of those who would have liked to cop a pair only found out when it was too late. Luckily, weve got you covered with a pair of the Yeezy Wave Runner right here.'),
(20, 'Yeezy Boost 700 V2 Tephra', 'Grey', 'Yeezy', '700 boost', '420.00', '2021-06-13', 120, 'Mens', './images/set1/24.webp', 'Arriving in an ultra clean earthy palette that comprises of browns, blacks, greys, and whites, the Tephra is constructed of a premium combination of ultra-luxe leather, buttery smooth suede, and extremely breathable mesh for all-day wear. Down below, a blacked out midsole is present with Boost technology, and this is lined with a durable gum rubber outsole underneath. Kids and toddler sizes will also be dropping!'),
(21, 'Yeezy Boost 700 Utility Black', 'Black', 'Yeezy', '700 boost', '395.00', '2022-08-18', 145, 'Mens', './images/set1/25.webp', 'Its not hard to see the appeal with the Yeezy 700 Utility Black. When it first emerged, many fans of Kanyes adidas collaboration were quick to label this as his most striking colourway. Its a bold claim but one that might have some truth given the popularity of all-black footwear.'),
(22, 'Yeezy Boost 700 V2 Cream', 'White', 'Yeezy', '700 boost', '349.99', '2021-06-13', 175, 'Mens', './images/set1/26.webp', 'The Yeezy Boost 700 V2 Cream delivers an unassuming colorway of Kanye Wests running-inspired silhouette. The upper features rolled knit construction in a pale grey hue, reinforced with tonal no-sew skins and tan nubuck overlays. An off-white finish distinguishes the exaggerated EVA midsole, featuring sculpted sidewalls that conceal a full-length drop-in Boost unit. Underfoot, the rubber outsole uses a classic herringbone traction pattern for superior grip.'),
(23, 'Wales Bonner x Adidas Samba Pony Black', 'Black', 'Adidas', 'Samba', '460.00', '2024-01-23', 670, 'Mens', './images/set1/27.webp', 'Discover the Wales Bonner x Adidas Samba Pony Black Explore the Wales Bonner x Adidas Samba Pony Black, a product of the collaboration between esteemed British fashion designer Grace Wales Bonner and Adidas. This sleek and stylish sneaker features a clean black colour scheme, infusing the classic Samba silhouette with an air of minimalism and sophistication. Crafted with premium materials, it offers both comfort and durability, making it a stylish addition to your footwear collection. Seamlessly blending fashion and sportswear, the Wales Bonner x Adidas Samba Pony Black delivers a unique and attention-grabbing design. Step out in style with this exceptional collaboration.'),
(24, 'Adidas Samba OG x Sporty & Rich White Core Burgundy', 'Red', 'Adidas', 'Samba', '200.00', '2023-03-20', 850, 'Mens', './images/set1/28.webp', 'The adidas Samba OG x Sporty & Rich White Core Burgundy is the result of a collaboration between Emily Oberg\s sportswear brand and the classic sneaker, showcasing burgundy details for a distinctive touch. This iteration of the adidas Samba features a pristine white leather base accented by a tan suede overlay on the toe. The side displays the iconic Three Stripes logo in Core Burgundy suede, complemented by gold \"Sporty and Rich\" branding. The Core Burgundy suede heel tab proudly showcases dual branding with both \"adidas\" and \"Sporty and Rich.\" The classic adidas Samba tongue branding is present, and the look is rounded off with a gum rubber sole for a timeless finish. This collaboration seamlessly combines the heritage of adidas with Sporty & Rich contemporary aesthetic.'),
(25, 'Adidas Samba OG x Sporty & Rich White Bold Gold', 'Yellow', 'Adidas', 'Samba', '155.00', '2023-03-20', 700, 'Mens', './images/set1/29.webp', 'Introducing the adidas Samba OG x Sporty & Rich White Bold Gold, a collaborative masterpiece between Emily Oberg\s sportswear brand and the classic Samba silhouette. This iteration showcases bold gold accents against a clean white backdrop. The sneaker features a white leather base with a tan suede overlay on the toe, embodying a timeless aesthetic. The iconic Three Stripes logo is presented in a striking Bold Gold suede on the side, accompanied by gold \"Sporty and Rich\" branding for a touch of luxury. The Core Bold Gold suede heel tab proudly displays dual branding with both \"adidas\" and \"Sporty and Rich.\" Classic adidas Samba tongue branding and a gum rubber sole complete this collaborative design, seamlessly fusing heritage and contemporary style. Elevate your sneaker game with the adidas Samba OG x Sporty & Rich White Bold Gold.'),
(26, 'Aimé Leon Dore x New Balance 550 Red Navy', 'Red', 'New Balance', '550', '249.99', '2021-05-14', 600, 'Mens', './images/set1/30.webp', 'The Aimé Leon Dore x New Balance 550 Red Navy reunites the partner brands from New York and Boston. Dropping as part of a larger capsule collection, the retro hoops shoe carries a white leather upper with contrasting navy detailing and a signature \"N\" logo in a bold crimson hue. Dual Aimé Leon Dore and New Balance branding is displayed on the oversized woven tongue tag. The low-top rests on a pre-yellowed midsole that gives the shoe a vintage aesthetic.'),
(27, 'Aimé Leon Dore x New Balance 550 Purple', 'Purple', 'New Balance', '550', '295.00', '2021-05-15', 450, 'Mens', './images/set1/31.webp', 'The Aimé Leon Dore x New Balance 550 Purple dresses the retro hoops shoe in an elementary two-tone color scheme with vintage-inspired details. The low-top carries a white leather upper with a microperforated midfoot overlay and a violet-colored \"N\" logo in cracked leather. Mismatched ALD and NB branding is stamped on the heel of the left and right shoe. The sneaker sits atop a traditional rubber cupsole, featuring aged sidewalls and an exposed EVA wedge on the medial side.'),
(28, 'New Balance 550 x Aimé Leon Dore Masaryk', 'Green', 'New Balance', '550', '380.00', '2023-10-23', 15, 'Mens', './images/set1/32.webp', 'Elevate your sneaker game with the New Balance 550 x Aimé Leon Dore Masaryk Community Gym - Classic Pine. This unique collaboration showcases the perfect blend of classic design and contemporary style. The Classic Pine colorway adds a touch of sophistication to these sneakers, making them a versatile addition to your footwear collection. Crafted with precision and attention to detail, they offer both style and substance. From the signature design elements to the comfort they provide, these sneakers are the epitome of timeless elegance. Embrace the fusion of fashion and function and step out in style with the New Balance 550 x Aimé Leon Dore Masaryk Community Gym - Classic Pine.'),
(29, 'New Balance 550 Shifted Sport Pack - Team Red', 'Red', 'New Balance', '550', '79.99', '2024-01-14', 240, 'Mens', './images/set1/33.webp', 'Paying tribute to the 1989 original colorways worn by basketball players, these New Balance 550 styles arrive in team-inspired colour options. Each pair features a White leather upper with Black leather on the toe cap and collar. Red, Blue, and Green accents are used on the tongue, “N” logo, heel counter and rubber outsole.'),
(30, 'New Balance 550 White Blue', 'Blue', 'New Balance', '550', '89.99', '2022-11-11', 850, 'Mens', './images/set1/34.webp', 'The New Balance 550 White Blue reintroduces the vintage 80s hoops shoe initially resurrected through an Aime Leon Dore collaboration in October 2020. While the joint venture accentuated the low-tops throwback aesthetic with an aged off-white finish, this pair makes use of crisp white leather construction throughout the upper. Royal blue accents provide contrasting pops of color, including a raised \"N\" logo and breathable mesh collar.'),
(31, 'New Balance 2002R Protection Pack Purple', 'Purple', 'New Balance', '2002R', '300.00', '2022-11-30', 760, 'Mens', './images/set1/35.webp', 'This New Balance 2002R Protection Pack combines asymmetrical purple and lavender suede overlays on the gray mesh base.'),
(32, 'New Balance 2002R Suede Pack - Garnet Deep Earth Red', 'Red', 'New Balance', '2002R', '235.00', '2023-12-31', 350, 'Mens', './images/set1/36.webp', 'Launching as part of the four-piece Suede Pack, the New Balance 2002R Garnet Deep Earth Red features a rich garnet hue on an upper built with airy mesh and soft suede. Subtle NB branding decorates the tongue and heel, while a metallic silver \"N\" logo shines on the quarter panel. The lifestyle running shoe rides on an ABZORB midsole with shock-absorbing N-ergy technology in the heel. Flex grooves are built into the grey rubber outsole for a smooth ride, while New Balances Energy Web provides improved arch support.'),
(33, 'New Balance 2002R Suede Pack - Forest Green', 'Green', 'New Balance', '2002R', '450.00', '2023-12-31', 600, 'Mens', './images/set1/37.webp', 'Launching as part of the four-piece Suede Pack, the New Balance 2002R Forest Green showcases a lush emerald hue throughout the upper, built with a traditional blend of breathable mesh and suede. Subtle NB branding decorates the tongue and heel, while a silver \"N\" logo graces the quarter panel. A vintage off-white finish is applied to the ABZORB midsole, featuring N-ergy cushioning in the heel for a smooth ride. Underfoot, the rubber outsole is equipped with New Balances Stability Web for improved arch support.'),
(34, 'Air Jordan 4 Retro Wmns Frozen Moments', 'White', 'Nike', 'Jordan 4', '299.99', '2020-12-20', 300, 'Womens', './images/set1/8.webp', 'The Air Jordan 4 Retro Wmns Frozen Moments features a pale grey suede upper with a color-matched forefoot overlay in glossy leather. Breathable netting is utilized on the throat and quarter panel, while the shoes molded eyelets and support wings shine in a metallic silver finish. Tonal Jumpman branding embellishes the tongue and molded heel tab. Anchoring the sneaker is a grey foam midsole with visible Air-sole cushioning in the heel.'),
(35, 'Air Jordan 1 Mid Wmns Stealth', 'Grey', 'Nike', 'Jordan 1', '99.99', '2019-06-12', 400, 'Womens', './images/set1/4.webp', 'The Air Jordan 1 Mid Grey Sail, the sneakers opt for a greyed-out colourway thats guaranteed to act as an excellent finishing touch to your transitional outfits. Theyre crafted from supple leather all across the uppers and boast details such as Swoosh logos on the laterals and medials, the Jordan Brand wings logo on the collar and perforated toe boxes to keep them as comfortable as ever.'),
(36, 'Nike Dunk Low Wmns Peach Cream', 'Yellow', 'Nike', 'Dunk', '99.99', '2021-03-19', 140, 'Womens', './images/set1/12.webp', 'This Dunk Low Peach Cream opts for a two-toned makeover, with a crisp white base and counterparts in the titular hue like the Swooshes, shoelaces, front and rear panels, and the durable outsole.'),
(37, 'Nike Dunk Low Wmns Medium Olive', 'Green', 'Nike', 'Dunk', '120.00', '2022-06-17', 200, 'Womens', './images/set1/13.webp', 'Nike Dunk Low Medium Olive, is two-toned but with a unique touch. This Dunk Lows overlays, including the profile Swooshes on both sides of the shoe, are in the titular muted Medium Olive green, matching the laces.'),
(38, 'Broken Planet Monochrome Hoodie Fuchsia Pink', 'Pink', 'Broken Planet', 'Tops&Sweatshirts', '185.00', '2023-07-08', 564, 'womens', './images/apparel/1.webp', 'The Broken Planet Monochrome Hoodie is now available at Solehaven!'),
(39, 'Fear of God Essentials Crewneck Sweatshirt Stretch Limo', 'Black', 'Fear of God', 'Tops&Sweatshirts', '155.00', '2018-12-29', 654, 'mens', './images/apparel/2.webp', 'The Fear of God Essentials Crewneck Sweatshirt in Stretch Limo is a timeless addition to your casual wardrobe. Crafted from premium materials, this sweatshirt offers both style and comfort for everyday wear. Featuring a classic crewneck design, this Stretch Limo sweatshirt is perfect for layering or wearing on its own. The soft fabric provides a comfortable fit, while the subtle Fear of God Essentials branding adds a touch of understated elegance.'),
(40, 'Broken Planet Market Hoodie Heartless Love Hoodie', 'White', 'Broken Planet', 'Tops&Sweatshirts', '155.00', '2021-05-13', 216, 'womens', './images/apparel/3.webp', 'Introducing the \"Heartless Love Hoodie\" from the Broken Planet Market collection – where comfort meets bold style. This hoodie, crafted from a premium cotton-polyester blend, offers a soft touch for cool days and casual outings. The design features a striking heart with a \"heartless\" inscription, making it a unique and edgy expression of love. More than just clothing, this hoodie is a statement piece that effortlessly combines comfort and style. Perfect for those who appreciate fashion with attitude, the \"Heartless Love Hoodie\" is your go-to for making a bold impression wherever you go. Break away from the ordinary, redefine your style, and let this hoodie be your fearless symbol of love and individuality.'),
(41, 'Broken Planet Market Basics Hoodie - Olive Green', 'Green', 'Broken Planet', 'Tops&Sweatshirts', '190.00', '2021-07-31', 337, 'mens', './images/apparel/4.webp', 'The Broken Planet Market Basics Hoodie in Olive Green is a versatile and essential addition to any wardrobe. Crafted from premium materials, this hoodie offers both comfort and style for everyday wear. Featuring a timeless design, this hoodie in Olive Green is perfect for effortless streetwear looks. The high-quality construction ensures durability, while the soft fabric provides warmth and comfort in cooler weather.'),
(42, 'Broken Planet Market Hoodie Far Side of the Moon', 'Black', 'Broken Planet', 'Tops&Sweatshirts', '230.00', '2020-05-27', 307, 'mens', './images/apparel/5.webp', 'The Broken Planet Market Hoodie in Far Side of the Moon is a must-have addition to your wardrobe. Crafted with high-quality materials, this hoodie offers both comfort and style for everyday wear. Featuring a captivating design inspired by the mysteries of the universe, this hoodie showcases the beauty of the Far Side of the Moon. The premium construction ensures durability, while the soft fabric provides warmth and comfort.'),
(43, 'Fear of God Essentials hoodie Coral', 'Pink', 'Fear of God', 'Tops&Sweatshirts', '220.00', '2019-02-24', 349, 'womens', './images/apparel/6.webp', 'Fear of God Essentials hoodie is flocked and appliquéd with logos at the front, back and hood. Its made from cotton-blend jersey with a fluffy fleece backing, so you will reach for it on days when comfort is key.'),
(44, 'Supreme Bling Box Logo Hooded Sweatshirt Light Pink', 'Pink', 'Supreme', 'Tops&Sweatshirts', '495.00', '2021-01-14', 240, 'womens', './images/apparel/7.webp', 'The Supreme Bling Box Logo Hooded Sweatshirt Light Pink from the SS22 Season. Now available at Solehaven!'),
(45, 'Broken Planet Market Into the Abyss Hoodie Navy', 'Blue', 'Broken Planet', 'Tops&Sweatshirts', '170.00', '2023-07-22', 14, 'mens', './images/apparel/8.webp', 'The Broken Planet Market Into the Abyss Hoodie in Navy is a must-have addition to your wardrobe, offering both style and comfort. Crafted with premium materials and attention to detail, this hoodie is perfect for those who appreciate quality streetwear.'),
(46, 'Supreme Box Logo Hoodie FW23 Dark Purple', 'Purple', 'Supreme', 'Tops&Sweatshirts', '280.00', '2023-05-13', 341, 'womens', './images/apparel/9.webp', 'Upgrade your streetwear collection with the Supreme Box Logo Hoodie FW23 in Dark Purple. This iconic piece from the Fall/Winter 2023 collection seamlessly blends comfort and style, making it a must-have for fashion enthusiasts. Shop now to own a symbol of streetwear excellence and showcase your commitment to urban authenticity.'),
(47, 'Broken Planet Market Hoodie Space Trails - Olive Green', 'Green', 'Broken Planet', 'Tops&Sweatshirts', '265.00', '2022-11-08', 251, 'mens', './images/apparel/10.webp', 'Explore the vastness of the universe with the Broken Planet Market Hoodie in Space Trails - Olive Green. This hoodie is an ode to the mysteries of outer space, featuring a captivating design in a rich olive green hue. Meticulously crafted and designed with attention to detail, its an essential addition to your wardrobe. Whether youre staying cozy indoors or venturing into the great outdoors, this hoodie seamlessly combines style and comfort. Join the cosmic expedition and make a bold statement with the Broken Planet Market Hoodie Space Trails in Olive Green.'),
(48, 'Broken Planet Market Hoodie Brighter Days Are Ahead', 'Red', 'Broken Planet', 'Tops&Sweatshirts', '270.00', '2020-10-20', 228, 'mens', './images/apparel/11.webp', 'Welcome the future with open arms in the Broken Planet Market Hoodie Brighter Days Are Ahead. This hoodie exudes an optimistic outlook, reminding you that the best is yet to come. Designed with meticulous care and featuring a captivating design, this hoodie is an essential addition to your wardrobe. Whether youre staying warm indoors or venturing into the world, this hoodie seamlessly blends style and comfort. Join the movement and make a positive statement with the Broken Planet Market Hoodie Brighter Days Are Ahead.'),
(49, 'Broken Planet Market Zip Up Hoodie Bone White', 'White', 'Broken Planet', 'Tops&Sweatshirts', '250.00', '2023-03-14', 405, 'womens', './images/apparel/12.webp', 'Elevate your style with the Broken Planet Market Zip Up Hoodie in Bone White. This minimalist masterpiece seamlessly blends contemporary design with urban edge. Crafted for comfort and durability, the Bone White hoodie is your key to versatile street style. Shop now for a timeless look that stands out effortlessly!'),
(50, 'Supreme Corteiz Rules The World Tee Black', 'Black', 'Supreme', 'tshirts', '125.00', '2022-04-18', 357, 'mens', './images/apparel/13.webp', 'The Supreme Corteiz Rules The World Tee Black is a stylish and comfortable t-shirt that is perfect for any casual occasion. This t-shirt is part of the Supreme/Corteiz collaboration and features a printed graphic on the front and back. The graphic on the front reads Supreme Rules The World, which is a playful nod to Corteizs usual tagline Corteiz Rules The World. The t-shirt is made from 100% cotton, which makes it soft and comfortable to wear.'),
(51, 'Nike x NOCTA Distant Regards Jersey Blue Glow/White', 'Blue', 'Nike', 'tshirts', '125.00', '2021-06-14', 7, 'mens', './images/apparel/14.webp', 'Part of rapper Drakes NOCTA range, this blue Nike tee draws inspiration from basketball and performance sports. Crafted from premium heavyweight cotton and featuring a range of contrasting signatures including the Nike Swoosh logo and a NOCTA text imprint.'),
(52, 'Fear of God Essentials T-shirt Dark Oatmeal', 'Grey', 'Fear of God', 'tshirts', '85.00', '2022-03-03', 105, 'mens', './images/apparel/15.webp', 'The Fear of God Essentials T-shirt Dark Oatmeal from spring/summer 2022'),
(53, 'Nike x NOCTA Basketball T-shirt', 'Black', 'Nike', 'tshirts', '250.00', '2021-12-30', 158, 'mens', './images/apparel/16.webp', 'The Nike x Nocta Basketball T shirt Black is one of the latest collaborations between the shoe manufacturing giant Nike and mens fashion designers and manufacturers NOCTA.'),
(54, 'FEAR OF GOD ESSENTIALS Cream Drawstring Sweatshort Jet Black', 'Black', 'Fear of God', 'Sweatpants', '180.00', '2023-03-04', 276, 'mens', './images/apparel/17.webp', 'The FEAR OF GOD ESSENTIALS Cream Drawstring Sweatshort in Jet Black offers a stylish and comfortable option for your casual summer wardrobe. Crafted from premium materials, these sweatshorts provide both style and comfort for everyday wear.'),
(55, 'FEAR OF GOD ESSENTIALS Sweatpants Wheat', 'White', 'Fear of God', 'Sweatpants', '180.00', '2023-03-25', 607, 'mens', './images/apparel/18.webp', 'The FEAR OF GOD ESSENTIALS Sweatpants in Wheat offer a stylish and comfortable option for your casual attire. Crafted from premium materials, these sweatpants provide both style and comfort for everyday wear.'),
(56, 'FEAR OF GOD ESSENTIALS Sweatpants Seafoam', 'Green', 'Fear of God', 'Sweatpants', '180.00', '2019-06-10', 431, 'womens', './images/apparel/19.webp', 'The FEAR OF GOD ESSENTIALS Sweatpants in Seafoam offer a stylish and comfortable addition to your casual wardrobe. Crafted from premium materials, these sweatpants provide both style and comfort for everyday wear.'),
(57, 'Fear of God Essentials Sweatpants Stretch Limo (SS22)', 'Black', 'Fear of God', 'Sweatpants', '179.99', '2018-12-16', 465, 'mens', './images/apparel/20.webp', 'In signature stretch limo, these sweat pants hail from Fear of God ESSENTIALS latest line up of sought-after staples. Crafted from soft fleeceback jersey, theyre cut with an extended drawstring waist and cuffed hems for contemporary appeal, then stamped with a double dose of branding for a fuse of authentic flair.'),
(58, 'Drake x Nike NOCTA Puffer Jacket Yellow', 'Yellow', 'Nike', 'Jackets', '1450.00', '2018-11-06', 405, 'mens', './images/apparel/21.webp', 'Nike and Drake partner to create the NOCTA collection, inspired by the street uniforms of cities around the world. This golden yellow puffer jacket is case in point, despite being a departure from the cultures favourite black. Its ready for those cold winter days, with a lustrous polyester shell and goose down insulation, but theres a nod to the Canadian rappers past, too. He grew up idolising anybody, and anything, that wore a Swoosh, so theres a super-sized one right across the shoulders.'),
(59, 'Trapstar Decoded Hooded Puffer 2.0 -Ice Blue', 'Blue', 'Trapstar', 'Jackets', '375.00', '2023-07-26', 630, 'womens', './images/apparel/22.webp', 'Decoded Logo embroidery on back'),
(60, 'Supreme x Stone Island Reversible Down Puffer Jacket Black', 'Black', 'Stone Island', 'Jackets', '1465.00', '2023-06-17', 57, 'mens', './images/apparel/23.webp', 'Explore the Supreme x Stone Island Reversible Down Puffer Jacket in Black - an exceptional collaboration uniting style and craftsmanship. Crafted from top-tier material, this reversible jacket offers warmth and versatility. The Black shade exudes sophistication, amplifying the dual-sided design, providing two distinct styles in a single jacket. Supremes streetwear aesthetic combined with Stone Islands innovation results in an unparalleled outerwear piece. Elevate your fashion statement with this exclusive reversible puffer, a fusion of high-end fashion and practicality.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `forename` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `is_admin` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `forename`, `surname`, `email`, `pass`, `is_admin`) VALUES
(1, 'Default', 'User', 'default@user.com', 'Defaultuser1', 0),
(2, 'Admin', 'User', 'admin@admin.com', 'Adminuser1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_addresses`
--

CREATE TABLE `user_addresses` (
  `address_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address_line_1` varchar(255) NOT NULL,
  `address_line_2` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `country_region` varchar(255) NOT NULL,
  `province` varchar(255) DEFAULT NULL,
  `post_code` varchar(20) NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `order_date` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contactform`
--
ALTER TABLE `contactform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactform`
--
ALTER TABLE `contactform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_addresses`
--
ALTER TABLE `user_addresses`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD CONSTRAINT `user_addresses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD CONSTRAINT `user_orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `user_orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
