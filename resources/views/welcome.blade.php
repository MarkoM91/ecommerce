<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'ShoeFit') }} - Find Your Perfect Gym Shoe</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        header {
            background-color: #000;
            color: #fff;
            padding: 1rem 0;
        }
        nav ul {
            list-style-type: none;
            padding: 0;
        }
        nav ul li {
            display: inline;
            margin-right: 20px;
        }
        nav ul li a {
            color: #fff;
            text-decoration: none;
        }
        .hero {
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('/images/hero-bg.jpg');
            background-size: cover;
            color: #fff;
            text-align: center;
            padding: 100px 0;
        }
        .search-bar {
            margin: 20px 0;
        }
        .search-bar input {
            padding: 10px;
            width: 60%;
            border: none;
        }
        .search-bar button {
            padding: 10px 20px;
            background-color: #ff4500;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        .categories {
            display: flex;
            justify-content: space-around;
            margin: 40px 0;
        }
        .category {
            text-align: center;
        }
        .featured-products {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin: 40px 0;
        }
        .product {
            border: 1px solid #ddd;
            padding: 20px;
            text-align: center;
        }
        .cta {
            background-color: #ff4500;
            color: #fff;
            text-align: center;
            padding: 60px 0;
        }
        .cta-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #fff;
            color: #ff4500;
            text-decoration: none;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <nav>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Shop</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="container">
                <h1>Find Your Perfect Fit</h1>
                <p>Discover the best gym shoes for your workout</p>
                <div class="search-bar">
                    <input type="text" placeholder="Search for shoes...">
                    <button>Search</button>
                </div>
            </div>
        </section>

        <section class="container">
            <h2>Popular Categories</h2>
            <div class="categories">
                <div class="category">
                    <img src="/images/running.jpg" alt="Running Shoes">
                    <h3>Running</h3>
                </div>
                <div class="category">
                    <img src="/images/weightlifting.jpg" alt="Weightlifting Shoes">
                    <h3>Weightlifting</h3>
                </div>
                <div class="category">
                    <img src="/images/crosstraining.jpg" alt="Cross Training Shoes">
                    <h3>Cross Training</h3>
                </div>
            </div>
        </section>

        <section class="container">
      <h2>Featured Products</h2>
      <div class="featured-products">
          @foreach($featuredProducts as $product)
              <div class="product-card">
                  <img src="{{ $product->image }}" alt="{{ $product->name }}">
                  <h3>{{ $product->name }}</h3>
                  <p>${{ $product->price }}</p>
                  <a href="{{ route('products.show', $product->id) }}" class="cta-button">View Details</a>
              </div>
          @endforeach
      </div>
  </section>

        <section class="cta">
            <div class="container">
                <h2>Get 10% Off Your First Order</h2>
                <p>Sign up for our newsletter and receive exclusive offers</p>
                <a href="#" class="cta-button">Sign Up Now</a>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2023 ShoeFit. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
