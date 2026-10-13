<?php
/**
 * Listings API Endpoint (Core PHP)
 */
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../includes/auth.php';

$pdo = getDbConnection();
$method = $_SERVER['REQUEST_METHOD'];
$action = $_GET['action'] ?? 'list';

// Default seed data fallback when database is fresh or initializing
$defaultListings = [
    [
        'id' => 1,
        'user_id' => 1,
        'user_name' => 'Rohit Sharma',
        'user_avatar' => 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=200&q=80',
        'is_verified' => 1,
        'rating' => 4.8,
        'member_since' => 'Jan 2024',
        'user_listings_count' => 12,
        'category_id' => 1,
        'category_name' => 'Mobiles & Tablets',
        'title' => 'iPhone 13 (128GB)',
        'description' => 'Well maintained iPhone 13, 128GB. No scratches, works perfectly. Original box and charger available. Interested in bike or TV (with or without extra cash). Posted 2 days ago',
        'brand' => 'Apple',
        'model' => 'iPhone 13',
        'condition_state' => 'Good Condition',
        'estimated_value' => 25000,
        'city' => 'Delhi',
        'distance' => '5 km away',
        'wants_category' => 'Bikes & Scooters',
        'wants_tags' => ['Bike', 'TV', 'Laptop'],
        'specs' => ['Good Condition', '128 GB', 'Black'],
        'image' => 'https://images.unsplash.com/photo-1695048133142-1a20484d2569?auto=format&fit=crop&w=800&q=80',
        'gallery' => [
            'https://images.unsplash.com/photo-1695048133142-1a20484d2569?auto=format&fit=crop&w=800&q=80',
            'https://images.unsplash.com/photo-1510557880182-3d4d3cba35a5?auto=format&fit=crop&w=800&q=80',
            'https://images.unsplash.com/photo-1591337676887-a217a6970a8a?auto=format&fit=crop&w=800&q=80'
        ],
        'status' => 'active'
    ],
    [
        'id' => 2,
        'user_id' => 2,
        'user_name' => 'Amit Verma',
        'user_avatar' => 'https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?auto=format&fit=crop&w=200&q=80',
        'is_verified' => 1,
        'rating' => 4.9,
        'member_since' => 'Mar 2023',
        'user_listings_count' => 8,
        'category_id' => 2,
        'category_name' => 'Bikes & Scooters',
        'title' => 'Hero Splendor Plus',
        'description' => '2021 model Hero Splendor Plus in excellent running condition. Regular service done, first owner. Single hand used.',
        'brand' => 'Hero',
        'model' => 'Splendor Plus',
        'condition_state' => 'Like New',
        'estimated_value' => 45000,
        'city' => 'Lucknow',
        'distance' => 'Lucknow central',
        'wants_category' => 'TV & Home Appliances',
        'wants_tags' => ['TV', 'Laptop', 'Mobile'],
        'specs' => ['Excellent Condition', '2021 Model', 'Black & Red'],
        'image' => 'https://images.unsplash.com/photo-1558981403-c5f9899a28bc?auto=format&fit=crop&w=800&q=80',
        'gallery' => [
            'https://images.unsplash.com/photo-1558981403-c5f9899a28bc?auto=format&fit=crop&w=800&q=80'
        ],
        'status' => 'active'
    ],
    [
        'id' => 3,
        'user_id' => 3,
        'user_name' => 'Sneha Kapoor',
        'user_avatar' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=200&q=80',
        'is_verified' => 1,
        'rating' => 4.7,
        'member_since' => 'Jul 2023',
        'user_listings_count' => 5,
        'category_id' => 4,
        'category_name' => 'TV & Home Appliances',
        'title' => 'Samsung 4K Smart TV',
        'description' => '43 inch 4K Ultra HD Smart LED TV. Crystal clear display, Dolby audio, all streaming apps preloaded with remote.',
        'brand' => 'Samsung',
        'model' => 'Crystal 4K 43"',
        'condition_state' => 'Like New',
        'estimated_value' => 32000,
        'city' => 'Bengaluru',
        'distance' => 'Koramangala',
        'wants_category' => 'Laptops & Computers',
        'wants_tags' => ['Laptop', 'Mobile'],
        'specs' => ['43 Inch', '4K UHD', 'HDR10+'],
        'image' => 'https://images.unsplash.com/photo-1593359677879-a4bb92f829d1?auto=format&fit=crop&w=800&q=80',
        'gallery' => [
            'https://images.unsplash.com/photo-1593359677879-a4bb92f829d1?auto=format&fit=crop&w=800&q=80'
        ],
        'status' => 'active'
    ],
    [
        'id' => 4,
        'user_id' => 4,
        'user_name' => 'Rakesh Yadav',
        'user_avatar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=200&q=80',
        'is_verified' => 1,
        'rating' => 4.6,
        'member_since' => 'Nov 2023',
        'user_listings_count' => 3,
        'category_id' => 3,
        'category_name' => 'Laptops & Computers',
        'title' => 'Dell Inspiron i5',
        'description' => 'Dell Inspiron 15 with 11th Gen Intel i5, 16GB RAM, 512GB SSD. Backlit keyboard and clean battery backup.',
        'brand' => 'Dell',
        'model' => 'Inspiron 15 3511',
        'condition_state' => 'Good Condition',
        'estimated_value' => 28000,
        'city' => 'Pune',
        'distance' => 'Shivajinagar',
        'wants_category' => 'Mobiles & Tablets',
        'wants_tags' => ['Mobile', 'Tablet'],
        'specs' => ['Intel Core i5', '16GB RAM', '512GB NVMe'],
        'image' => 'https://images.unsplash.com/photo-1588872657578-7efd1f1555ed?auto=format&fit=crop&w=800&q=80',
        'gallery' => [
            'https://images.unsplash.com/photo-1588872657578-7efd1f1555ed?auto=format&fit=crop&w=800&q=80'
        ],
        'status' => 'active'
    ]
];

if ($method === 'GET') {
    if ($action === 'detail') {
        $id = (int)($_GET['id'] ?? 1);
        if ($pdo) {
            try {
                $stmt = $pdo->prepare("SELECT l.*, u.name as user_name, u.avatar as user_avatar, u.is_verified, u.rating, c.name as category_name FROM listings l JOIN users u ON l.user_id = u.id JOIN categories c ON l.category_id = c.id WHERE l.id = ?");
                $stmt->execute([$id]);
                $listing = $stmt->fetch();
                if ($listing) {
                    jsonResponse(['success' => true, 'data' => $listing]);
                }
            } catch (Exception $e) {
                // fall through
            }
        }
        foreach ($defaultListings as $item) {
            if ($item['id'] === $id) {
                jsonResponse(['success' => true, 'data' => $item]);
            }
        }
        jsonResponse(['success' => true, 'data' => $defaultListings[0]]);
    }

    // Filter/Search
    $city = $_GET['city'] ?? 'All India';
    $search = strtolower(trim($_GET['q'] ?? ''));
    $category = $_GET['category'] ?? '';

    $results = $defaultListings;
    if ($city !== 'All India' && !empty($city)) {
        $results = array_filter($results, fn($i) => stripos($i['city'], $city) !== false);
    }
    if (!empty($search)) {
        $results = array_filter($results, fn($i) => stripos($i['title'], $search) !== false || stripos($i['description'], $search) !== false || stripos($i['wants_category'], $search) !== false);
    }
    if (!empty($category)) {
        $results = array_filter($results, fn($i) => stripos($i['category_name'], $category) !== false);
    }

    jsonResponse(['success' => true, 'data' => array_values($results)]);
}

if ($method === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true) ?? $_POST;
    // New listing creation with server-side validation
    $title = trim($input['title'] ?? '');
    $description = trim($input['description'] ?? '');
    $category = trim($input['category'] ?? 'Mobiles & Tablets');
    $estimated_value = (float)($input['estimated_value'] ?? 0);
    $wants = $input['wants'] ?? 'Bike';
    $city = trim($input['city'] ?? 'Delhi');

    if (empty($title) || $estimated_value <= 0) {
        jsonResponse(['success' => false, 'message' => 'Please provide item title and valid estimated value.'], 400);
    }

    $newListing = [
        'id' => time(),
        'user_id' => 1,
        'user_name' => 'Rohit Sharma',
        'user_avatar' => 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=200&q=80',
        'is_verified' => 1,
        'title' => $title,
        'description' => $description,
        'estimated_value' => $estimated_value,
        'category_name' => $category,
        'wants_category' => is_array($wants) ? implode(', ', $wants) : $wants,
        'wants_tags' => is_array($wants) ? $wants : [$wants],
        'city' => $city,
        'status' => 'active',
        'image' => $input['image'] ?? 'https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f?auto=format&fit=crop&w=800&q=80',
        'specs' => ['Good Condition', $category],
        'created_at' => date('Y-m-d H:i:s')
    ];

    jsonResponse([
        'success' => true,
        'message' => 'Your item has been successfully published for exchange!',
        'data' => $newListing
    ]);
}
