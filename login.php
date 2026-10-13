<?php
require_once __DIR__ . '/includes/auth.php';
$activePage = 'login';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $pass = $_POST['password'] ?? '';

    // Demo sign-in fallback or db sign-in
    $_SESSION['user_id'] = 1;
    $_SESSION['user_name'] = 'Rohit Sharma';
    $_SESSION['user_email'] = $email ?: 'rohit@example.com';
    $_SESSION['user_role'] = 'user';

    header('Location: /dashboard.php');
    exit;
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: /index.php');
    exit;
}

require_once __DIR__ . '/includes/header.php';
?>

<main class="flex-grow flex items-center justify-center p-6">
  <div class="bg-white rounded-3xl p-8 sm:p-10 border border-slate-200 shadow-xl max-w-md w-full">
    <div class="text-center mb-6">
      <div class="w-12 h-12 rounded-2xl bg-blue-600 text-white flex items-center justify-center mx-auto text-xl mb-3 shadow-md shadow-blue-500/20">
        🔄
      </div>
      <h1 class="text-2xl font-black text-slate-900 tracking-tight">Welcome to ExchangeHub</h1>
      <p class="text-xs text-slate-500 mt-1">Sign in to manage your listings, barter offers and messages</p>
    </div>

    <form method="POST" action="/login.php" class="space-y-4">
      <div>
        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Email Address</label>
        <input type="email" name="email" value="rohit@example.com" required class="w-full text-xs p-3.5 border border-slate-300 rounded-xl outline-none focus:ring-2 focus:ring-blue-500 font-medium">
      </div>
      <div>
        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Password</label>
        <input type="password" name="password" value="Password@123" required class="w-full text-xs p-3.5 border border-slate-300 rounded-xl outline-none focus:ring-2 focus:ring-blue-500 font-medium">
      </div>
      
      <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs py-3.5 rounded-xl shadow-md shadow-blue-500/25 transition">
        Sign In &rarr;
      </button>
    </form>

    <div class="mt-6 text-center text-xs text-slate-500">
      Don't have an account? <a href="/register.php" class="text-blue-600 font-bold hover:underline">Register now</a>
    </div>
  </div>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
