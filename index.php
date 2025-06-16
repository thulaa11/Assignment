<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Pet Care</title>
    <style>
        /* General Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color:rgb(246, 244, 242);
            color: #333;
            line-height: 1.6;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* Topbar */
        .topbar {
            background: linear-gradient(to right,#38a3a5,#57cc99, #80ed99);
            color: white;
            padding: 15px 0;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .topbar nav .menu {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
            gap: 30px;
        }

        .topbar nav .menu li {
            display: inline;
        }

        .topbar nav .menu a {
            color: white;
            font-weight: 600;
            font-size: 16px;
            transition: color 0.3s ease;
        }

        .topbar nav .menu a:hover {
            color:#c7f9cc;
            background-color:#22577a; 
        }

        /* Main Content */
        .middle {
            padding: 50px 20px;
            text-align: center;
        }

        .welcome {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 50px;
            background:#c7f9cc;
            border-radius: 10px;
            box-shadow: 0 4px 15px #000000;
            padding: 20px;
        }

        .welcome-text {
            flex: 1;
            padding-right: 20px;
           
        }

        .welcome img {
            max-width: 80%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2.5em;
            color:#432818;
            margin-bottom: 10px;
        }

        p {
            font-size: 1.2em;
            color: #99582a;
        }

        h2 {
            font-size: 2em;
            margin-top: 50px;
            color: #333;
        }

        .titlestyle {
            display: inline;
        }

        /* Services and Products Sections */
        .products {
            display: flex;
            justify-content: space-around;
            margin: 40px 0;
            gap: 20px;
        }

        .services {
            display: flex;
            justify-content: space-around;
            margin: 40px 0;
            gap: 20px;
        }

        .service-item, .product-item {
            width: 28%;
            background:#ebdbce;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            padding: 20px;
        }

        .service-item:hover, .product-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
        }

        .service-item img, .product-item img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .service-item h3, .product-item h3 {
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        .service-item p, .product-item p {
            font-size: 1em;
            color: #666;
        }

        /* Footer */
        footer {
            color: white;
            text-align: center;
            padding: 20px;
            position: relative;
            bottom: 0;
            margin-top: 50px;
            background: linear-gradient(to right,#38a3a5,#57cc99, #80ed99);
        }

        footer p {
            color: #fff;
            margin: 0;
             font-size: 1em;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .welcome {
                flex-direction: column;
                text-align: center;
            }

            .welcome img {
                margin-top: 20px;
                max-width: 80%;
            }

            .service-item, .product-item {
                width: 100%;
                margin: 10px 0;
            }

            .topbar nav .menu {
                flex-direction: column;
                gap: 10px;
            }

            h1 {
                font-size: 2em;
            }

            p {
                font-size: 1em;
            }

            .services, .products {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>
<body>
    <header class="topbar">
        <nav>
            <ul class="menu" aria-label="Main Navigation">
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Sign Up</a></li>
            </ul>
        </nav>
    </header>
    <main class="middle">
        <section class="welcome">
            <div class="welcome-text">
                <h1>Welcome to Pet Care</h1>
                <p>Find the best products and services for your pets</p>
            </div>
            <img src="assets/images/1.jpg" alt="Happy pets enjoying care">
        </section>
        <h2 class="titlestyle">Our Products</h2>
        <section class="products">
            <div class="product-item">
                <h3>Pet Foods</h3>
                <p>High-quality food for your furry friends.</p>
                <a href="products/foods.php">
                    <img src="assets/images/2.jpg" alt="Variety of Pet Foods">
                </a>
            </div>
            <div class="product-item">
                <h3>Pet Tools</h3>
                <p>Essential tools for pet care and grooming.</p>
                <a href="products/tools.php">
                    <img src="assets/images/4.jpg" alt="Pet Care Tools">
                </a>
            </div>
        </section>
        <h2 class="titlestyle">Our Services</h2>
        <section class="services">
            <div class="service-item">
                <h3>Boarding Services</h3>
                <p>Safe and comfortable boarding for your pets.</p>
                <a href="services/pet_boarding.php">
                    <img src="assets/images/petboarding.jpg" alt="Pet Boarding Service">
                </a>
            </div>
            <div class="service-item">
                <h3>Grooming Services</h3>
                <p>Professional grooming to keep your pets looking their best.</p>
                <a href="services/pet_grooming.php">
                    <img src="assets/images/petgrooming.jpg" alt="Pet Grooming Service">
                </a>
            </div>
            <div class="service-item">
                <h3>Health Services</h3>
                <p>Comprehensive health check-ups and treatments.</p>
                <a href="services/pet_health.php">
                    <img src="assets/images/pethealth.webp" alt="Pet Health Services">
                </a>
            </div>
        </section>
      
    </main>
    
    <footer>
         <p><i class="fas fa-phone"></i> +94 70 232 3567</p>
                <p><i class="fas fa-envelope"></i> petsheaven@gmail.com</p>
                <p><i class="fas fa-map-marker-alt"></i> 2nd Street, town, srilanka</p>
        <p>&copy; 2025 Pet Care. All rights reserved.</p>
    </footer>
</body>
</html>