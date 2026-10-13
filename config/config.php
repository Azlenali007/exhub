<?php
/**
 * General Application Configuration for ExchangeHub
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

return [
    'app_name' => 'ExchangeHub',
    'app_tagline' => 'Apna Samaan Do, Pasand Ka Samaan Lo!',
    'app_url' => getenv('APP_URL') ?: 'http://localhost:3000',
    'currency' => '₹',
    'currency_code' => 'INR',
    'default_city' => 'Delhi',
    'supported_cities' => ['All India', 'Delhi', 'Mumbai', 'Bengaluru', 'Pune', 'Lucknow', 'Hyderabad', 'Chennai', 'Kolkata', 'Ahmedabad', 'Jaipur', 'Chandigarh'],
    'upload_dir' => __DIR__ . '/../uploads',
    'max_upload_size' => 5 * 1024 * 1024, // 5MB
    'allowed_image_types' => ['image/jpeg', 'image/png', 'image/webp'],
    'session_lifetime' => 86400 * 7, // 7 days
    'csrf_token_key' => '_csrf_token',
];
