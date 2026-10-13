<?php
/**
 * Messages & Conversations API Endpoint (Core PHP)
 */
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../includes/auth.php';

$method = $_SERVER['REQUEST_METHOD'];
$action = $_GET['action'] ?? 'list';

$conversations = [
    [
        'id' => 1,
        'user_name' => 'Amit Verma',
        'user_avatar' => 'https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?auto=format&fit=crop&w=200&q=80',
        'online' => false,
        'last_message' => 'Is this still available?',
        'time' => '2m ago',
        'unread' => 1,
        'item_title' => 'iPhone 13 (128GB)',
        'messages' => [
            ['sender' => 'them', 'text' => 'Hi, I saw your iPhone 13 listing. Is this still available?', 'time' => '10:20 AM'],
            ['sender' => 'me', 'text' => 'Yes, it is available! What do you have for exchange?', 'time' => '10:22 AM'],
            ['sender' => 'them', 'text' => 'I have a Hero Splendor Plus in excellent condition.', 'time' => '10:24 AM']
        ]
    ],
    [
        'id' => 2,
        'user_name' => 'Sneha Kapoor',
        'user_avatar' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=200&q=80',
        'online' => true,
        'last_message' => 'I can give you my TV + ₹3k',
        'time' => '15m ago',
        'unread' => 1,
        'item_title' => 'Samsung 4K Smart TV & iPhone 13',
        'messages' => [
            ['sender' => 'them', 'text' => "Hi, I'm interested in your iPhone 13. I have a bike or TV.", 'time' => '10:24 AM'],
            ['sender' => 'me', 'text' => "Hello! Yes, I'm interested. Can you share photos and details?", 'time' => '10:32 AM'],
            ['sender' => 'them', 'image' => 'https://images.unsplash.com/photo-1593359677879-a4bb92f829d1?auto=format&fit=crop&w=800&q=80', 'text' => "This is my TV. It's 43 inch, 4K. Interested in your mobile. Can you add ₹3k?", 'time' => '3:45 PM'],
            ['sender' => 'me', 'text' => "Yes, I can do that. I'll share photos of the mobile and we can finalize.", 'time' => '3:52 PM']
        ]
    ],
    [
        'id' => 3,
        'user_name' => 'Rakesh Yadav',
        'user_avatar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=200&q=80',
        'online' => false,
        'last_message' => 'Can you share more photos?',
        'time' => '1h ago',
        'unread' => 0,
        'item_title' => 'Dell Inspiron i5',
        'messages' => [
            ['sender' => 'them', 'text' => 'Can you share more photos of the keyboard and sides?', 'time' => '1:15 PM'],
            ['sender' => 'me', 'text' => 'Sure, uploading shortly!', 'time' => '1:20 PM']
        ]
    ],
    [
        'id' => 4,
        'user_name' => 'Pooja Singh',
        'user_avatar' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=200&q=80',
        'online' => false,
        'last_message' => 'Deal done! Thanks',
        'time' => '3h ago',
        'unread' => 0,
        'item_title' => 'Sony PlayStation 5',
        'messages' => [
            ['sender' => 'them', 'text' => 'Deal done! Thanks for the smooth trade.', 'time' => '11:00 AM']
        ]
    ],
    [
        'id' => 5,
        'user_name' => 'Vikram Patel',
        'user_avatar' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=200&q=80',
        'online' => false,
        'last_message' => 'Interested in your laptop',
        'time' => '5h ago',
        'unread' => 0,
        'item_title' => 'MacBook Air M1',
        'messages' => [
            ['sender' => 'them', 'text' => 'Interested in your laptop. Would you trade for a camera?', 'time' => '9:30 AM']
        ]
    ],
    [
        'id' => 6,
        'user_name' => 'Neha Joshi',
        'user_avatar' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?auto=format&fit=crop&w=200&q=80',
        'online' => false,
        'last_message' => 'Is the condition good?',
        'time' => '1d ago',
        'unread' => 0,
        'item_title' => 'Apple iPad 9th Gen',
        'messages' => [
            ['sender' => 'them', 'text' => 'Is the condition good? Battery health?', 'time' => 'Yesterday']
        ]
    ]
];

if ($method === 'GET') {
    if ($action === 'conversations') {
        jsonResponse(['success' => true, 'data' => $conversations]);
    }

    $id = (int)($_GET['id'] ?? 2);
    foreach ($conversations as $conv) {
        if ($conv['id'] === $id) {
            jsonResponse(['success' => true, 'data' => $conv]);
        }
    }
    jsonResponse(['success' => true, 'data' => $conversations[1]]);
}

if ($method === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true) ?? $_POST;
    $text = trim($input['text'] ?? '');
    $image = $input['image'] ?? null;
    $convId = (int)($input['conversation_id'] ?? 2);

    if (empty($text) && empty($image)) {
        jsonResponse(['success' => false, 'message' => 'Message text or attachment required.'], 400);
    }

    $newMsg = [
        'id' => time(),
        'sender' => 'me',
        'text' => $text,
        'image' => $image,
        'time' => date('h:i A')
    ];

    jsonResponse([
        'success' => true,
        'message' => 'Message sent successfully',
        'data' => $newMsg
    ]);
}
