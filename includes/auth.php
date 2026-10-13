<?php
/**
 * Authentication and Session Management
 */

require_once __DIR__ . '/db.php';
require_once __DIR__ . '/functions.php';

function getCurrentUser(): ?array {
    if (empty($_SESSION['user_id'])) {
        return null;
    }

    $pdo = getDbConnection();
    if (!$pdo) {
        // Return dummy session if in demo mode
        return [
            'id' => $_SESSION['user_id'] ?? 1,
            'name' => $_SESSION['user_name'] ?? 'Rohit Sharma',
            'email' => $_SESSION['user_email'] ?? 'rohit@example.com',
            'city' => $_SESSION['user_city'] ?? 'Delhi',
            'is_verified' => 1,
            'role' => $_SESSION['user_role'] ?? 'user',
            'avatar' => 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=200&q=80'
        ];
    }

    $stmt = $pdo->prepare("SELECT id, name, email, phone, city, locality, avatar, is_verified, rating, exchange_count, role FROM users WHERE id = ? AND status = 'active'");
    $stmt->execute([$_SESSION['user_id']]);
    $user = $stmt->fetch();

    return $user ?: null;
}

function isLoggedIn(): bool {
    return !empty($_SESSION['user_id']);
}

function isAdmin(): bool {
    $user = getCurrentUser();
    return $user && ($user['role'] === 'admin');
}

function requireLogin(): void {
    if (!isLoggedIn()) {
        header('Location: /login.php');
        exit;
    }
}

function requireAdmin(): void {
    if (!isAdmin()) {
        header('Location: /login.php?error=unauthorized');
        exit;
    }
}
