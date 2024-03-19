/* DATABASE CREATION */

CREATE TABLE users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    forename VARCHAR(255) NOT NULL,
    surname VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    pass VARCHAR(255) NOT NULL,
    is_admin INT NOT NULL DEFAULT 0 
);

CREATE TABLE products (
    product_id INT PRIMARY KEY AUTO_INCREMENT,
    product_name VARCHAR(255) NOT NULL,
    colour VARCHAR(255) NOT NULL,
    brand VARCHAR(255) NOT NULL,
    product_collection VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    release_date DATE NOT NULL,
    stock_quantity INT NOT NULL,
    category VARCHAR(255) NOT NULL,
    product_img VARCHAR(255) NOT NULL,
    product_desc TEXT NOT NULL
);

-- table to be implemented in later variations where shoes sizes etc. are used

-- CREATE TABLE product_stock (
--     stock_id INT PRIMARY KEY AUTO_INCREMENT,
--     product_id INT,
--     shoe_size VARCHAR(10) NOT NULL,
--     stock_quantity INT NOT NULL,
--     FOREIGN KEY (product_id) REFERENCES products(product_id)
-- );

CREATE TABLE user_orders (
    order_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    product_id INT,
    -- stock_id INT,
    order_date DATE NOT NULL,
    quantity INT NOT NULL,
    total_price DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (product_id) REFERENCES products(product_id)
    -- FOREIGN KEY (stock_id) REFERENCES product_stock(stock_id)
);

CREATE TABLE contactform (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE user_addresses (
    address_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    address_line_1 VARCHAR(255) NOT NULL,
    address_line_2 VARCHAR(255),
    city VARCHAR(255) NOT NULL,
    country_region VARCHAR(255) NOT NULL,
    province VARCHAR(255),
    post_code VARCHAR(20) NOT NULL,
    is_default BOOLEAN NOT NULL DEFAULT 0,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

/* INSERT BASE DATA INTO DATABASE */

/*mens shoes*/
INSERT INTO products (product_name, colour, brand, product_collection, price, release_date, stock_quantity, category, product_img, product_desc) VALUES
('Drake x Nike Air Force 1 Low Certified Lover Boy', 'White', 'Nike', 'Air Force 1', 250.00, '2022-12-10', 150, 'Mens', 'images/set1/1.png', 'The shoe is heavily informed by the classic all-white Nike Air Force 1, but swaps out the traditional “NIKE” midsole branding for “Love You Forever” text. Miniature hearts on the shoes outsole follow the lover boy theme and NOCTA branding hits up the heel tab. The shoe comes ready for personalization with an array of translucent blue beads and includes a premium set of laces with metal aglets.'),
('Nike Air Force 1 07 QS Black Skeleton', 'Black', 'Nike', 'Air Force 1', '2019-10-25', 20, 'Mens', 'images/set1/2.webp', 'The Nike Air Force 1 Low “Skeleton - Black” is a spooky rendition of the venerable low-top design. The “Skeleton” Air Force 1 in black is a follow up to the popular all-white leather colorway that was released a year earlier to celebrate Halloween in 2018. Here, the “Skeleton” Air Force 1 features the same festive glow-in-the-dark Halloween vibe with a graphic of the bones of the foot adorning the sides of the upper. Sporting a nighttime-appropriate black leather base, the stealthy upper features a tonal Swoosh that sits underneath the anatomic design. The same skeleton theme also appears on the insoles with a glow-in-the-dark outsole completing the look of the shoe.'),
('Louis Vuitton Nike Air Force 1 Low By Virgil Abloh White Green', 'Green', 'Nike', 'Air Force 1', 6999.99, -blank-, -blank-, 'Mens', 'images/set1/3.webp', 'The Nike Air Force 1, celebrating its 40th year, was designed in 1982 and is one of the most successful and iconic shoes ever created. On the occasion of the Louis Vuitton Mens Spring-Summer 2022 runway show, Virgil Abloh collaborated with Nike to design 47 pairs of bespoke Air Force 1s, fusing the trainers classic codes with the insignia and materials of Louis Vuitton in homage to the hip-hop culture that shaped him.'),
('Air Jordan 1 Mid Wmns Stealth', 'Grey', 'Nike', 'Jordan 1', 99.99, -blank-, -blank-, 'Mens', 'images/set1/4.webp', 'The Air Jordan 1 Mid Grey Sail, the sneakers opt for a greyed-out colourway thats guaranteed to act as an excellent finishing touch to your transitional outfits. Theyre crafted from supple leather all across the uppers and boast details such as Swoosh logos on the laterals and medials, the Jordan Brand wings logo on the collar and perforated toe boxes to keep them as comfortable as ever.'),
('Air Jordan 1 Retro High OG Chicago Lost & Found', 'Red', 'Nike', 'Jordan 1', 320.00, -blank-, -blank-, 'Mens', 'images/set1/5.webp',  'The Air Jordan 1 Retro High OG Chicago Lost & Found brings back the iconic silhouette that started it all. Featuring the high-cut shape of the original 1985 release, the leather upper combines a white base with a black signature Swoosh and scarlet overlays at the forefoot and heel. Cracked black leather appears on the padded collar, while a vintage pre-yellowed finish is applied to the white rubber midsole. The vintage 80s aesthetic extends to the special packaging, highlighted by a damaged box plastered with sale stickers and topped with a mismatched replacement lid. An accompanying sales invoice is emblematic of a time when the Air Jordan 1 lingered on the shelves of mom and pop stores, eventually making their way into the hands of lucky customers at a steep discount.'),
('Travis Scott x Air Jordan 1 Low OG Reverse Mocha','Brown', 'Nike', 'Jordan 1', 1280.00, -blank-, -blank-, 'Mens', 'images/set1/6.webp', 'The Travis Scott x Air Jordan 1 Low OG Reverse Mocha delivers a twist on the original Mocha AJ1 Low from 2019. The upper combines a brown suede base with ivory leather overlays and the Houston rappers signature reverse Swoosh on the lateral side, featuring oversized dimensions and a neutral cream finish. Contrasting scarlet accents distinguish a pair of woven Nike Air tongue tags, as well as mismatched Cactus Jack and retro Wings logos embroidered on each heel tab. A vintage off-white rubber midsole is bolstered with encapsulated Nike Air cushioning in the heel and a brown rubber outsole underfoot.'),
('Air Jordan 4 Retro Military Black', 'White', 'Nike', 'Jordan 4', 319.99, -blank-, -blank-, 'Mens', 'images/set1/7.webp', 'The Air Jordan 4 Retro Military Black showcases the same color blocking and materials featured on the OG Military Blue colorway from 1989. Smooth white leather is utilized on the upper, bolstered with a forefoot overlay in grey suede. Contrasting black accents make their way to the TPU eyelets, molded heel tab, and the Jumpman logo displayed on the woven tongue tag. Lightweight cushioning comes courtesy of a two-tone polyurethane midsole, enhanced with a visible Air-sole unit under the heel.'),
('Air Jordan 4 Retro Black Cat 2020', 'Black', 'Nike', 'Jordan 4', 1399.99, -blank-, -blank-, 'Mens', 'images/set1/9.webp', 'The 2020 edition of the Air Jordan 4 Retro Black Cat brings back the all-black colorway of the classic silhouette, one that draws inspiration from one of Michael Jordans various nicknames. Like the original 2006 release, this pair makes use of a monochromatic black suede upper with a matching black midsole. Jumpman branding on the woven tongue tag is rendered in Light Graphite, representing the sneakers only contrasting design element.'),
('Paris Saint-Germain x Air Jordan 4 Retro Bordeaux', 'Purple', 'Nike', 'Jordan 4', 745.00, -blank-, -blank-, 'Mens', 'images/set1/10.webp', 'Celebrating Jordan Brands partnership with the French football club, the Paris Saint-Germain x Air Jordan 4 Retro Bordeaux features color blocking that recalls the silhouettes OG Fire Red composition. The white leather upper is accented with black wings and Bordeaux detailing on the eyelets, interior tongue and heel, the latter marked with dual Jumpman and PSG branding. A black woven tab on the lateral forefoot is inscribed with Paname, a slang term for the French capital.'),
('Air Jordan 4 Retro Motorsports', 'Blue', 'Nike', 'Jordan 4', 439.99, '2017-03-01', -blank-, -blank-, 'Mens', 'images/set1/11.webp', 'The Air Jordan 4 Retro Motorsports is inspired by a 2006 friends and family colourway created for the 4th anniversary of MJs Motorsports Racing team. Released to the general public in March of 2017, the sneaker incorporates the teams white, black, and varsity royal blue colours, but removes the Mars Blackmon heel accent that graced the 2006 sneaker. An Air Jordan 4 Retro Motorsports Alternate, released a few months later in a black colourway.'),
('Nike Dunk Low Grey Fog', 'Grey', 'Nike', 'Dunk', 155.00, -blank-, -blank-, 'Mens', 'images/set1/14.webp', 'The Nike Dunk Low Grey Fog delivers a subtle two-tone colorway of the classic silhouette originally released in 1985 as a college hoops shoe. The all-leather upper is treated to a pristine white base with contrasting overlays in a light grey shade. The same neutral tone is repeated on the Swoosh, laces and woven Nike tongue tag. Additional Nike branding lands on the heel tab and padded sockliner. The low-top rests on a standard rubber cupsole that pairs white sidewalls with a grey rubber outsole.'),
('Yeezy Boost 350 V2 Black-White', 'Black', 'Yeezy', '350', 499.99, -blank-, -blank-, 'Mens', 'images/set1/15.webp', 'Having truly created his own unique vision of contemporary sportswear, Kanye West marked 2016 with the release of the eagerly-awaited Yeezy Season 3. Here, teaming with adidas once again, West delivers a fresh edition of the reworked icon that is the Yeezy 350 Boost, entitled 350 V2. The silhouette boasts a black Primeknit upper accompanied by a white accent to the side wall. Continuing the idiosyncrasies of the V2 iteration, each sneaker features SPLY-350 interwoven to the side panel, sat atop an adidas BOOST sole unit.'),
('Yeezy Boost 350 V2 Bone', 'White', 'Yeezy', '350', 269.99, -blank-, -blank-, 'Mens', 'images/set1/16.webp', 'The Yeezy Boost 350 V2 Bone treats the lifestyle runner to a refined makeover, highlighted by a breathable Primeknit upper in a subtle ivory finish. A monofilament side stripe adds a see-through element to the minimalist design, while a webbing pull tab at the heel provides easy on and off. Inside the shoe, three-stripe branding on the interior heel is accompanied by Yeezy stamped on the sockliner. Responsive cushioning comes courtesy of a TPU-wrapped full-length Boost midsole.'),
('Yeezy Boost 350 V2 Onyx', 'Black', 'Yeezy', '350', 325.00, -blank-, -blank-, 'Mens', 'images/set1/17.webp', 'The Yeezy Boost 350 V2 Onyx applies a stealthy palette to the lifestyle silhouette that merges Kanye Wests visionary aesthetic with adidas performance technology. The sneaker makes use of a one-note black Primeknit upper, secured with rope laces and equipped with a pull tab at the heel. On the lateral side, a post-dyed monofilament stripe adds a see-through element to the sock-like build. A full-length Boost midsole is surrounded by a ribbed, semi-translucent TPU cage that maintains the shoes monochrome design.'),
('Yeezy Slides Slate Marine', 'Black', 'Yeezy', 'Slides', 95.00, -blank-, -blank-, 'Mens', 'images/set1/18.webp', 'The Yeezy Slide Slate Marine pairs a minimalist design with a tonal finish in a subdued shade of blue. Built with a single piece of injected EVA foam, the slip-on boasts a wide strap upper that entirely covers the top of the foot. Exterior branding is limited to adidas three stripes logo, debossed on the soft top lay of the footbed. Underfoot, the outsole features a series of horizontal grooves for improved cushioning and traction.'),
('Yeezy Slides Slate Grey', 'Grey', 'Yeezy', 'Slides', 100.00, -blank-, -blank-, 'Mens', 'images/set1/19.webp', 'The Yeezy Slides Slate Grey is now available at Solehaven!'),
('Yeezy Slide Bone 2022', 'White', 'Yeezy', 'Slides', 134.99, -blank-, -blank-, 'Mens', 'images/set1/20.webp', 'The Yeezy Slide Bone 2022 applies a neutral hue to Kanye Wests take on an everyday sandal, constructed from EVA foam for lightweight comfort. The minimalist design is good for a sleek, contemporary look, with exterior branding limited to adidas three-stripe logo debossed at the heel of the footbed. The slip-on build rides atop a high-traction outsole, fitted with strategically placed grooves for sure footing.'),
('Yeezy Slides Granite', 'Black', 'Yeezy', 'Slides', 100.00, -blank-, -blank-, 'Mens', 'images/set1/21.webp', 'The Yeezy Slide Granite accentuates the sandals sleek, modern lines with a tonal dark grey finish. Built with a solitary piece of lightweight and durable EVA foam, the slip-on delivers a comfortable fit, thanks to the combination of a wide strap upper and soft footbed. The latter is embellished with adidas three-stripe logo, representing the only bit of exterior branding. The outsole features strategic groove placement for improved traction and a smooth, natural ride.'),
('Yeezy Slides Ochre', 'Brown', 'Yeezy', 'Slides', 89.99, -blank-, -blank-, 'Mens', 'images/set1/22.webp', 'The Yeezy Slide Ochre features a rubberized foam build in a lightly textured finish. The diffuse brown palette is marked with subtly discoloured patches for an aged aesthetic. Branding is limited to an adidas three-stripe logo debossed on the soft top layer of the footbed. The minimalist slip-on is mounted on an outsole equipped with a series deep horizontal grooves, strategically arranged for improved cushioning and traction.'),
('Yeezy Boost 700 Wave Runner', 'Grey', 'Yeezy', '700 boost', 349.99, -blank-, 'Mens', 'images/set1/23.webp', 'Ride the wave! Adding another unique sneaker to his line Kanye West introduced the adidas Yeezy Boost 700 Wave Runner in 2017. A love-it-or-hate-it shoe for many, if youre here on this page, were guessing you love its eye-catching look with a chunky sole and running inspired upper. This debut colorway in grey with black, teal, and orange accents was released without any warning on Kanyes YEEZY SUPPLY site, and many of those who would have liked to cop a pair only found out when it was too late. Luckily, weve got you covered with a pair of the Yeezy Wave Runner right here.'),
('Yeezy Boost 700 V2 Tephra', 'Grey', 'Yeezy', '700 boost', 420.00, -blank-, -blank-, 'Mens', 'images/set1/24.webp', 'Arriving in an ultra clean earthy palette that comprises of browns, blacks, greys, and whites, the Tephra is constructed of a premium combination of ultra-luxe leather, buttery smooth suede, and extremely breathable mesh for all-day wear. Down below, a blacked out midsole is present with Boost technology, and this is lined with a durable gum rubber outsole underneath. Kids and toddler sizes will also be dropping!'),
('Yeezy Boost 700 Utility Black', 'Black', 'Yeezy', '700 boost', 395.00, -blank-, -blank-, 'Mens', 'images/set1/25.webp', 'Its not hard to see the appeal with the Yeezy 700 Utility Black. When it first emerged, many fans of Kanyes adidas collaboration were quick to label this as his most striking colourway. Its a bold claim but one that might have some truth given the popularity of all-black footwear.'),
('Yeezy Boost 700 V2 Cream', 'White', 'Yeezy', '700 boost', 349.99, -blank-, -blank-, 'Mens', 'images/set1/26.webp', 'The Yeezy Boost 700 V2 Cream delivers an unassuming colorway of Kanye Wests running-inspired silhouette. The upper features rolled knit construction in a pale grey hue, reinforced with tonal no-sew skins and tan nubuck overlays. An off-white finish distinguishes the exaggerated EVA midsole, featuring sculpted sidewalls that conceal a full-length drop-in Boost unit. Underfoot, the rubber outsole uses a classic herringbone traction pattern for superior grip.'),
('Wales Bonner x Adidas Samba Pony Black', 'Black', 'Adidas', 'Samba', 460.00, -blank-, -blank-, 'Mens', 'images/set1/27.webp', 'Discover the Wales Bonner x Adidas Samba Pony Black Explore the Wales Bonner x Adidas Samba Pony Black, a product of the collaboration between esteemed British fashion designer Grace Wales Bonner and Adidas. This sleek and stylish sneaker features a clean black colour scheme, infusing the classic Samba silhouette with an air of minimalism and sophistication. Crafted with premium materials, it offers both comfort and durability, making it a stylish addition to your footwear collection. Seamlessly blending fashion and sportswear, the Wales Bonner x Adidas Samba Pony Black delivers a unique and attention-grabbing design. Step out in style with this exceptional collaboration.'),
('Adidas Samba OG x Sporty & Rich White Core Burgundy', 'Red', 'Adidas', 'Samba', 200.00, -blank-, -blank-, 'Mens', 'images/set1/28.webp', 'The adidas Samba OG x Sporty & Rich White Core Burgundy is the result of a collaboration between Emily Oberg''s sportswear brand and the classic sneaker, showcasing burgundy details for a distinctive touch. This iteration of the adidas Samba features a pristine white leather base accented by a tan suede overlay on the toe. The side displays the iconic Three Stripes logo in Core Burgundy suede, complemented by gold "Sporty and Rich" branding. The Core Burgundy suede heel tab proudly showcases dual branding with both "adidas" and "Sporty and Rich." The classic adidas Samba tongue branding is present, and the look is rounded off with a gum rubber sole for a timeless finish. This collaboration seamlessly combines the heritage of adidas with Sporty & Rich contemporary aesthetic.'),
('Adidas Samba OG x Sporty & Rich White Bold Gold', 'Yellow', 'Adidas', 'Samba', 155.00, -blank-, -blank-, 'Mens', 'images/set1/29.webp', 'Introducing the adidas Samba OG x Sporty & Rich White Bold Gold, a collaborative masterpiece between Emily Oberg''s sportswear brand and the classic Samba silhouette. This iteration showcases bold gold accents against a clean white backdrop. The sneaker features a white leather base with a tan suede overlay on the toe, embodying a timeless aesthetic. The iconic Three Stripes logo is presented in a striking Bold Gold suede on the side, accompanied by gold "Sporty and Rich" branding for a touch of luxury. The Core Bold Gold suede heel tab proudly displays dual branding with both "adidas" and "Sporty and Rich." Classic adidas Samba tongue branding and a gum rubber sole complete this collaborative design, seamlessly fusing heritage and contemporary style. Elevate your sneaker game with the adidas Samba OG x Sporty & Rich White Bold Gold.'),
('Aimé Leon Dore x New Balance 550 Red Navy', 'Red', 'New Balance', '550', 249.99, -blank-, -blank-, 'Mens', 'images/set1/30.webp', 'The Aimé Leon Dore x New Balance 550 Red Navy reunites the partner brands from New York and Boston. Dropping as part of a larger capsule collection, the retro hoops shoe carries a white leather upper with contrasting navy detailing and a signature "N" logo in a bold crimson hue. Dual Aimé Leon Dore and New Balance branding is displayed on the oversized woven tongue tag. The low-top rests on a pre-yellowed midsole that gives the shoe a vintage aesthetic.'),
('Aimé Leon Dore x New Balance 550 Purple', 'Purple', 'New Balance', '550', 295.00, -blank-, -blank-, 'Mens', 'images/set1/31.webp', 'The Aimé Leon Dore x New Balance 550 Purple dresses the retro hoops shoe in an elementary two-tone color scheme with vintage-inspired details. The low-top carries a white leather upper with a microperforated midfoot overlay and a violet-colored "N" logo in cracked leather. Mismatched ALD and NB branding is stamped on the heel of the left and right shoe. The sneaker sits atop a traditional rubber cupsole, featuring aged sidewalls and an exposed EVA wedge on the medial side.'),
('New Balance 550 x Aimé Leon Dore Masaryk Community Gym - Classic Pine', 'Green', 'New Balance', '550', 380.00, -blank-, -blank-, 'Mens', 'images/set1/32.webp', 'Elevate your sneaker game with the New Balance 550 x Aimé Leon Dore Masaryk Community Gym - Classic Pine. This unique collaboration showcases the perfect blend of classic design and contemporary style. The Classic Pine colorway adds a touch of sophistication to these sneakers, making them a versatile addition to your footwear collection. Crafted with precision and attention to detail, they offer both style and substance. From the signature design elements to the comfort they provide, these sneakers are the epitome of timeless elegance. Embrace the fusion of fashion and function and step out in style with the New Balance 550 x Aimé Leon Dore Masaryk Community Gym - Classic Pine.'),
('New Balance 550 Shifted Sport Pack - Team Red', 'Red', 'New Balance', '550', 79.99, -blank-, -blank-, 'Mens', 'images/set1/33.webp', 'Paying tribute to the 1989 original colorways worn by basketball players, these New Balance 550 styles arrive in team-inspired colour options. Each pair features a White leather upper with Black leather on the toe cap and collar. Red, Blue, and Green accents are used on the tongue, “N” logo, heel counter and rubber outsole.'),
('New Balance 550 White Blue', 'Blue', 'New Balance', '550', 89.99, -blank-, -blank-, 'Mens', 'images/set1/34.webp', 'The New Balance 550 White Blue reintroduces the vintage 80s hoops shoe initially resurrected through an Aime Leon Dore collaboration in October 2020. While the joint venture accentuated the low-tops throwback aesthetic with an aged off-white finish, this pair makes use of crisp white leather construction throughout the upper. Royal blue accents provide contrasting pops of color, including a raised "N" logo and breathable mesh collar.'),
('New Balance 2002R Protection Pack Light Arctic Grey Purple', 'Purple', 'New Balance', '2002R', 300.00, -blank-, -blank-, 'Mens', 'images/set1/35.webp', 'This New Balance 2002R Protection Pack combines asymmetrical purple and lavender suede overlays on the gray mesh base.'),
('New Balance 2002R Suede Pack - Garnet Deep Earth Red', 'Red', 'New Balance', '2002R', 235.00, -blank-, -blank-, -blank-, 'Mens' 'images/set1/36.webp', 'Launching as part of the four-piece Suede Pack, the New Balance 2002R Garnet Deep Earth Red features a rich garnet hue on an upper built with airy mesh and soft suede. Subtle NB branding decorates the tongue and heel, while a metallic silver "N" logo shines on the quarter panel. The lifestyle running shoe rides on an ABZORB midsole with shock-absorbing N-ergy technology in the heel. Flex grooves are built into the grey rubber outsole for a smooth ride, while New Balances Energy Web provides improved arch support.'),
('New Balance 2002R Suede Pack - Forest Green', 'Green', 'New Balance', '2002R', 450.00, -blank-, -blank-, 'Mens', 'images/set1/37.webp', 'Launching as part of the four-piece Suede Pack, the New Balance 2002R Forest Green showcases a lush emerald hue throughout the upper, built with a traditional blend of breathable mesh and suede. Subtle NB branding decorates the tongue and heel, while a silver "N" logo graces the quarter panel. A vintage off-white finish is applied to the ABZORB midsole, featuring N-ergy cushioning in the heel for a smooth ride. Underfoot, the rubber outsole is equipped with New Balances Stability Web for improved arch support.');

/*womens shoes*/
INSERT INTO products (product_name, colour, brand, product_collection, price, release_date, stock_quantity, category, product_img, product_desc) VALUES
('Air Jordan 4 Retro Wmns Frozen Moments', 'White', 'Nike', 'Jordan 4', 299.99, '2020-12-20', 300, 'Womens', 'images/set1/8.webp', 'The Air Jordan 4 Retro Wmns Frozen Moments features a pale grey suede upper with a color-matched forefoot overlay in glossy leather. Breathable netting is utilized on the throat and quarter panel, while the shoes molded eyelets and support wings shine in a metallic silver finish. Tonal Jumpman branding embellishes the tongue and molded heel tab. Anchoring the sneaker is a grey foam midsole with visible Air-sole cushioning in the heel.'),
('Nike Dunk Low Wmns Peach Cream', 'Yellow', 'Nike', 'Dunk', 99.99, '2021-03-19', 140, 'Womens', 'images/set1/12.webp', 'This Dunk Low Peach Cream opts for a two-toned makeover, with a crisp white base and counterparts in the titular hue like the Swooshes, shoelaces, front and rear panels, and the durable outsole.'),
('Nike Dunk Low Wmns Medium Olive', 'Green', 'Nike', 'Dunk', 120.00, '2022-06-17', 200, 'Womens', 'images/set1/13.webp', 'Nike Dunk Low Medium Olive, is two-toned but with a unique touch. This Dunk Lows overlays, including the profile Swooshes on both sides of the shoe, are in the titular muted Medium Olive green, matching the laces.')


/* Default admin account details
Email: admin@admin.com
Password: Adminuser1
*/
INSERT INTO users (forename, surname, email, pass, is_admin) VALUES 
('Default', 'User', 'default@user.com', 'Defaultuser1', 0),
('Admin', 'User', 'admin@admin.com', 'Adminuser1', 1);
