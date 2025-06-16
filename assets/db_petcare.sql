CREATE DATABASE IF NOT EXISTS petcare;

USE petcare;

CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL,
  email VARCHAR(100) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL,
  role ENUM('user', 'admin') NOT NULL DEFAULT 'user',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  price DECIMAL(10, 2) NOT NULL,
  description TEXT,
  category ENUM('Food', 'Tools') NOT NULL,
  image_url VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE services (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  description TEXT NOT NULL,
  category VARCHAR(100) NOT NULL,
  image_url VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS cart (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  product_id INT NOT NULL,
  quantity INT DEFAULT 1,
  added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
  FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

INSERT INTO  users (id, username, email, password, role) VALUES
(1, 'admin', 'admin@pet.com', 'admin123', 'admin'),
(2, 'user', 'user@pet.com', 'user1234', 'user');

INSERT INTO products (name, price, description, category, image_url) VALUES
('Pet Veggie Snack', 1050.00, 'Delicious veggie snack for pets', 'Food', "foods/1.jpg"),
('Cat Meals', 900.00, 'Nutritious meals for cats', 'Food', "foods/2.jpg"),
('Milk for Dogs', 850.00, 'Healthy milk drink for dogs', 'Food', "foods/3.jpg"),
('Milk for Cats', 850.00, 'Healthy milk drink for cats', 'Food', "foods/4.jpg"),
('High Meat', 1300.00, 'High protein meat for pets', 'Food', "foods/5.jpg"),
('Salmon Fish', 700.00, 'Fresh salmon treats for pets', 'Food', "foods/6.jpg"),
('Doggy Biscuits', 1200.00, 'Tasty biscuits for dogs', 'Food', "foods/7.jpg"),
('Shrimp Pellets', 1000.00, 'Shrimp-based pellets for pets', 'Food', "foods/8.jpg"),
('Fish Flake Food', 700.00, 'Premium flake food for fish', 'Food', "foods/9.jpg"),
('FruitBlend for Birds', 950.00, 'Fruits blend for birds', 'Food', "foods/10.jpg"),
('Birds Nutrition', 950.00, 'Balanced nutrition for birds', 'Food', "foods/11.jpg");

INSERT INTO products (name, price, description, category, image_url) VALUES
('Pets Hair Trimmer', 900.00, 'Efficient trimmer for pet grooming', 'Tools', "tools/1.jpeg"),
('Pets Feet Shaper', 1050.00, 'Special tool to shape pet feet', 'Tools', "tools/2.jpeg"),
('Bath Glow Brush', 850.00, 'Brush for enhanced grooming during bath', 'Tools', "tools/3.jpeg"),
('Nail Remover', 1400.00, 'Tool for safe nail removal', 'Tools', "tools/4.jpg"),
('Pet Hair Cutting Set', 1800.00, 'Complete set for cutting pet hair', 'Tools', "tools/5.jpeg"),
('Pets Fashion Ropes', 750.00, 'Stylish ropes for fashionable pets', 'Tools', "tools/6.jpeg"),
('Grooming Set', 1200.00, 'All-in-one grooming kit for pets', 'Tools', "tools/7.jpeg"),
('Comb and Brushes', 1000.00, 'High-quality comb and brush set', 'Tools', "tools/8.jpeg"),
('Dental Liquid', 1200.00, 'Dental care liquid for pets', 'Tools', "tools/9.jpeg"),
('Born Boost', 1050.00, 'Health supplement for pets', 'Tools', "tools/10.jpeg"),
('Safety Belt', 950.00, 'Safety belt for pet travel', 'Tools', "tools/11.jpeg"),
('Pets Basket', 1500.00, 'Comfortable basket for pet travel', 'Tools', "tools/12.jpg");

INSERT INTO services (name, description, category, image_url) VALUES
('Nail Trimming', 'Expert nail trimming for your pets.', 'Grooming', 'grooming/1.jpeg'),
('Breed Hair Cutting', 'Stylish breed-specific haircuts.', 'Grooming', 'grooming/2.jpeg'),
('Conditioning Treatment', 'Gentle conditioning for healthy coats.', 'Grooming', 'grooming/3.jpg'),
('Custom Styling', 'Tailored styling to suit pet needs.', 'Grooming', 'grooming/4.jpeg'),
('Ear Cleaning', 'Effective ear cleaning service.', 'Grooming', 'grooming/5.jpeg'),
('Spa Treatments', 'Pampering spa sessions for pets.', 'Grooming', 'grooming/6.jpeg');

INSERT INTO services (name, description, category, image_url) VALUES
('Pet Sitting', 'Reliable care while you are away.', 'Boarding', 'boarding/1.jpeg'),
('Special Trainings', 'Behavioral and agility training.', 'Boarding', 'boarding/2.jpg'),
('Play Times', 'Supervised fun playtimes.', 'Boarding', 'boarding/3.jpg'),
('Yoga Practices', 'Relaxation sessions for pets.', 'Boarding', 'boarding/4.jpeg'),
('Pet Parties', 'Fun social events for pets.', 'Boarding', 'boarding/5.jpg'),
('Breeding Programs', 'Professional breeding management.', 'Boarding', 'boarding/6.jpg');

INSERT INTO services (name, description, category, image_url) VALUES
('Monthly Checkups', 'Regular health assessments.', 'Health', 'health/1.jpeg'),
('Vaccinations', 'Essential vaccinations for pets.', 'Health', 'health/2.jpeg'),
('Nutrition Consultants', 'Dietary advice for better health.', 'Health', 'health/3.jpg'),
('Surgeries', 'Professional surgical care.', 'Health', 'health/5.jpeg');