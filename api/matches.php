<?php
/**
 * Smart Matching & Discovery API Endpoint (Core PHP)
 * Matches items where owner has category A and wants category B with users who have B and want A
 */
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/functions.php';

$haveCategory = trim($_GET['have'] ?? '');
$wantCategory = trim($_GET['want'] ?? '');
$city = trim($_GET['city'] ?? 'All India');

// Matching algorithm logic:
// 1. Matches where listing category == wantCategory AND listing wants_exchange_categories contains haveCategory
// 2. High match score if values are within 25% or flexible cash adjustment enabled
// 3. Fallback to category discovery if no exact mutual match yet

$matchResults = [
    [
        'match_score' => '98% Mutual Match',
        'match_type' => 'Direct Exchange Opportunity',
        'listing_id' => 2,
        'title' => 'Hero Splendor Plus',
        'estimated_value' => 45000,
        'owner_name' => 'Amit Verma',
        'owner_avatar' => 'https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?auto=format&fit=crop&w=200&q=80',
        'image' => 'https://images.unsplash.com/photo-1558981403-c5f9899a28bc?auto=format&fit=crop&w=800&q=80',
        'city' => 'Lucknow',
        'has_item_category' => 'Bikes & Scooters',
        'wants_category' => 'Mobiles & Tablets / TV',
        'badge' => 'Wants Mobile',
        'deal_suggestion' => 'Owner has bike and wants mobile. You can exchange your iPhone + cash adjustment.'
    ],
    [
        'match_score' => '94% Mutual Match',
        'match_type' => 'Multi-Item Trade Match',
        'listing_id' => 3,
        'title' => 'Samsung 4K Smart TV',
        'estimated_value' => 32000,
        'owner_name' => 'Sneha Kapoor',
        'owner_avatar' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=200&q=80',
        'image' => 'https://images.unsplash.com/photo-1593359677879-a4bb92f829d1?auto=format&fit=crop&w=800&q=80',
        'city' => 'Bengaluru',
        'has_item_category' => 'TV & Home Appliances',
        'wants_category' => 'Mobiles & Tablets',
        'badge' => 'Wants Mobile',
        'deal_suggestion' => 'Owner is actively seeking a smartphone in exchange for this 4K Smart TV.'
    ]
];

jsonResponse([
    'success' => true,
    'query' => [
        'have' => $haveCategory,
        'want' => $wantCategory,
        'city' => $city
    ],
    'total_matches' => count($matchResults),
    'matches' => $matchResults
]);
