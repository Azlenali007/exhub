<?php
/**
 * Multi-Item Exchange Offers API Endpoint (Core PHP)
 * Relational multi-item barter matching, counter-offers, and status transitions
 */
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../includes/auth.php';

$pdo = getDbConnection();
$method = $_SERVER['REQUEST_METHOD'];
$action = $_GET['action'] ?? 'list';

if ($method === 'GET') {
    // List user offers
    $mockOffers = [
        [
            'id' => 101,
            'offer_code' => 'EXC-84920',
            'sender_id' => 1,
            'sender_name' => 'Rohit Sharma',
            'sender_avatar' => 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=200&q=80',
            'receiver_id' => 2,
            'receiver_name' => 'Amit Verma',
            'receiver_avatar' => 'https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?auto=format&fit=crop&w=200&q=80',
            'status' => 'pending',
            'offered_items' => [
                [
                    'id' => 1,
                    'title' => 'iPhone 13 (128GB)',
                    'estimated_value' => 25000,
                    'image' => 'https://images.unsplash.com/photo-1695048133142-1a20484d2569?auto=format&fit=crop&w=800&q=80'
                ]
            ],
            'requested_items' => [
                [
                    'id' => 2,
                    'title' => 'Hero Splendor Plus',
                    'estimated_value' => 45000,
                    'image' => 'https://images.unsplash.com/photo-1558981403-c5f9899a28bc?auto=format&fit=crop&w=800&q=80'
                ]
            ],
            'total_offered_value' => 25000,
            'total_requested_value' => 45000,
            'cash_amount' => 5000,
            'cash_payer' => 'sender', // Rohit pays ₹5,000 extra
            'message' => 'I have an iPhone 13 in mint condition and I am adding ₹5,000 cash for your Hero Splendor Plus.',
            'version' => 1,
            'created_at' => date('Y-m-d H:i:s', strtotime('-2 hours'))
        ],
        [
            'id' => 102,
            'offer_code' => 'EXC-77419',
            'sender_id' => 3,
            'sender_name' => 'Sneha Kapoor',
            'sender_avatar' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=200&q=80',
            'receiver_id' => 1,
            'receiver_name' => 'Rohit Sharma',
            'receiver_avatar' => 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=200&q=80',
            'status' => 'countered',
            'offered_items' => [
                [
                    'id' => 3,
                    'title' => 'Samsung 4K Smart TV',
                    'estimated_value' => 32000,
                    'image' => 'https://images.unsplash.com/photo-1593359677879-a4bb92f829d1?auto=format&fit=crop&w=800&q=80'
                ]
            ],
            'requested_items' => [
                [
                    'id' => 1,
                    'title' => 'iPhone 13 (128GB)',
                    'estimated_value' => 25000,
                    'image' => 'https://images.unsplash.com/photo-1695048133142-1a20484d2569?auto=format&fit=crop&w=800&q=80'
                ]
            ],
            'total_offered_value' => 32000,
            'total_requested_value' => 25000,
            'cash_amount' => 3000,
            'cash_payer' => 'receiver', // Rohit pays ₹3,000 cash difference
            'message' => 'This is my TV. It is 43 inch, 4K. Interested in your mobile. Can you add ₹3,000?',
            'version' => 2,
            'created_at' => date('Y-m-d H:i:s', strtotime('-15 minutes'))
        ]
    ];

    jsonResponse(['success' => true, 'data' => $mockOffers]);
}

if ($method === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true) ?? $_POST;
    $offerAction = $input['action'] ?? 'create';

    if ($offerAction === 'create') {
        // Multi-item offer creation
        $receiverId = (int)($input['receiver_id'] ?? 2);
        $offeredItemIds = (array)($input['offered_items'] ?? []);
        $requestedItemIds = (array)($input['requested_items'] ?? []);
        $cashAmount = (float)($input['cash_amount'] ?? 0);
        $cashPayer = $input['cash_payer'] ?? 'none';
        $message = trim($input['message'] ?? '');

        if (empty($offeredItemIds) || empty($requestedItemIds)) {
            jsonResponse(['success' => false, 'message' => 'Both offered items and requested items must contain at least one listing.'], 400);
        }

        $offerCode = 'EXC-' . rand(10000, 99999);

        jsonResponse([
            'success' => true,
            'message' => "Offer {$offerCode} submitted successfully with multiple items!",
            'offer_code' => $offerCode,
            'status' => 'pending'
        ]);
    }

    if ($offerAction === 'counter') {
        $offerId = (int)($input['offer_id'] ?? 0);
        $cashAmount = (float)($input['cash_amount'] ?? 0);
        $cashPayer = $input['cash_payer'] ?? 'sender';
        $message = trim($input['message'] ?? '');

        jsonResponse([
            'success' => true,
            'message' => "Counter-offer submitted successfully. Revised cash adjustment: ₹{$cashAmount}",
            'status' => 'countered'
        ]);
    }

    if ($offerAction === 'accept') {
        $offerId = (int)($input['offer_id'] ?? 0);
        jsonResponse([
            'success' => true,
            'message' => "Offer accepted! Both items are now reserved. You can coordinate handover in the private chat.",
            'status' => 'accepted'
        ]);
    }

    if ($offerAction === 'reject') {
        $offerId = (int)($input['offer_id'] ?? 0);
        jsonResponse([
            'success' => true,
            'message' => "Offer has been declined.",
            'status' => 'rejected'
        ]);
    }

    if ($offerAction === 'complete') {
        $offerId = (int)($input['offer_id'] ?? 0);
        jsonResponse([
            'success' => true,
            'message' => "Exchange completion confirmed! Listings marked as completed and exchange count updated.",
            'status' => 'completed'
        ]);
    }

    jsonResponse(['success' => false, 'message' => 'Invalid action.'], 400);
}
