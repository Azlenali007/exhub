// Server runner for ExchangeHub on port 3000 (Pure Vanilla JavaScript - Zero TypeScript)
import express from 'express';
import path from 'path';
import fs from 'fs';
import { fileURLToPath } from 'url';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

const app = express();
const PORT = process.env.PORT || 3000;

app.use(express.json());
app.use(express.urlencoded({ extended: true }));

// Serve static assets
app.use('/assets', express.static(path.join(__dirname, 'assets')));
app.use('/uploads', express.static(path.join(__dirname, 'uploads')));

// Simple API mock responses matching the Core PHP API
app.get('/api/listings', (req, res) => {
  const listings = [
    {
      id: 1,
      title: 'iPhone 13 (128GB)',
      category: 'Mobiles & Tablets',
      estimated_value: 25000,
      city: 'Delhi',
      wants: 'Bike',
      image: 'https://images.unsplash.com/photo-1695048133142-1a20484d2569?auto=format&fit=crop&w=800&q=80',
      status: 'active'
    },
    {
      id: 2,
      title: 'Hero Splendor Plus',
      category: 'Bikes & Scooters',
      estimated_value: 45000,
      city: 'Lucknow',
      wants: 'TV',
      image: 'https://images.unsplash.com/photo-1558981403-c5f9899a28bc?auto=format&fit=crop&w=800&q=80',
      status: 'active'
    },
    {
      id: 3,
      title: 'Samsung 4K Smart TV',
      category: 'TV & Home Appliances',
      estimated_value: 32000,
      city: 'Bengaluru',
      wants: 'Laptop',
      image: 'https://images.unsplash.com/photo-1593359677879-a4bb92f829d1?auto=format&fit=crop&w=800&q=80',
      status: 'active'
    },
    {
      id: 4,
      title: 'Dell Inspiron i5',
      category: 'Laptops & Computers',
      estimated_value: 28000,
      city: 'Pune',
      wants: 'Mobile',
      image: 'https://images.unsplash.com/photo-1588872657578-7efd1f1555ed?auto=format&fit=crop&w=800&q=80',
      status: 'active'
    }
  ];
  res.json({ success: true, data: listings });
});

app.get('/api/offers', (req, res) => {
  res.json({
    success: true,
    data: [
      {
        id: 101,
        code: 'EXC-84920',
        sender: 'Rohit Sharma',
        receiver: 'Amit Verma',
        offered: 'iPhone 13 + iPad',
        requested: 'Hero Splendor Plus',
        cash_difference: 2000,
        status: 'pending'
      }
    ]
  });
});

// Serve PHP pages as static/download or fallback to index.html
app.get('/:page.php', (req, res) => {
  const filePath = path.join(__dirname, `${req.params.page}.php`);
  if (fs.existsSync(filePath)) {
    // If client requested via browser, redirect to frontend view or send file
    res.sendFile(path.join(__dirname, 'index.html'));
  } else {
    res.sendFile(path.join(__dirname, 'index.html'));
  }
});

// Root & all other routes serve index.html
app.get('*', (req, res) => {
  res.sendFile(path.join(__dirname, 'index.html'));
});

app.listen(PORT, '0.0.0.0', () => {
  console.log(`ExchangeHub server running on http://0.0.0.0:${PORT}`);
});
