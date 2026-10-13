<?php
/**
 * ExchangeHub Web-Based Database Installer
 */
error_reporting(E_ALL);
ini_set('display_errors', 1);

$error = null;
$success = null;
$step = isset($_GET['step']) ? (int)$_GET['step'] : 1;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] === 'install_db') {
        $host = trim($_POST['db_host'] ?? '127.0.0.1');
        $port = trim($_POST['db_port'] ?? '3306');
        $dbname = trim($_POST['db_name'] ?? 'exchangehub');
        $user = trim($_POST['db_user'] ?? 'root');
        $pass = trim($_POST['db_pass'] ?? '');

        $adminEmail = trim($_POST['admin_email'] ?? 'admin@exchangehub.local');
        $adminName = trim($_POST['admin_name'] ?? 'ExchangeHub Admin');
        $adminPass = trim($_POST['admin_pass'] ?? 'Admin@123456');

        try {
            // First connect without dbname to create database if not exists
            $pdo = new PDO("mysql:host={$host};port={$port};charset=utf8mb4", $user, $pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
            $pdo->exec("CREATE DATABASE IF NOT EXISTS `{$dbname}` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
            $pdo->exec("USE `{$dbname}`");

            // Read schema.sql
            $schemaFile = __DIR__ . '/../database/schema.sql';
            if (file_exists($schemaFile)) {
                $sql = file_get_contents($schemaFile);
                $pdo->exec($sql);
            }

            // Create admin user with secure hash
            $hash = password_hash($adminPass, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("REPLACE INTO users (name, email, password_hash, city, is_verified, role, status) VALUES (?, ?, ?, 'Delhi', 1, 'admin', 'active')");
            $stmt->execute([$adminName, $adminEmail, $hash]);

            // Save config/database.php
            $configContent = "<?php\nreturn [\n"
                . "    'host' => '" . addslashes($host) . "',\n"
                . "    'port' => '" . addslashes($port) . "',\n"
                . "    'dbname' => '" . addslashes($dbname) . "',\n"
                . "    'user' => '" . addslashes($user) . "',\n"
                . "    'password' => '" . addslashes($pass) . "',\n"
                . "    'charset' => 'utf8mb4',\n"
                . "    'options' => [\n"
                . "        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,\n"
                . "        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,\n"
                . "        PDO::ATTR_EMULATE_PREPARES => false,\n"
                . "    ]\n];\n";
            file_put_contents(__DIR__ . '/../config/database.php', $configContent);

            $success = "ExchangeHub has been successfully installed! Database tables created and administrator configured.";
            $step = 3;
        } catch (Exception $e) {
            $error = "Installation failed: " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>ExchangeHub - Web Installer</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 min-h-screen text-slate-800">
  <div class="max-w-2xl mx-auto py-12 px-4">
    <div class="bg-white rounded-2xl shadow-xl border border-slate-100 overflow-hidden">
      <div class="bg-blue-600 px-8 py-6 text-white flex items-center justify-between">
        <div>
          <h1 class="text-2xl font-bold flex items-center gap-2">
            <span>🔄</span> ExchangeHub Installer
          </h1>
          <p class="text-blue-100 text-sm mt-1">Setup MySQL Database & Initial Administrator</p>
        </div>
        <span class="text-xs font-semibold bg-blue-500/80 px-3 py-1 rounded-full border border-blue-400">v1.0 Core PHP</span>
      </div>

      <div class="p-8">
        <?php if ($error): ?>
          <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-700 rounded-xl text-sm">
            <strong>Error:</strong> <?= htmlspecialchars($error) ?>
          </div>
        <?php endif; ?>

        <?php if ($success): ?>
          <div class="mb-6 p-6 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl">
            <h3 class="font-bold text-lg mb-2">🎉 Installation Complete!</h3>
            <p class="text-sm mb-4"><?= htmlspecialchars($success) ?></p>
            <div class="flex gap-4">
              <a href="../login.php" class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-5 py-2.5 rounded-lg text-sm transition">Go to Login</a>
              <a href="../index.php" class="bg-slate-100 hover:bg-slate-200 text-slate-700 font-medium px-5 py-2.5 rounded-lg text-sm transition">Browse Homepage</a>
            </div>
          </div>
        <?php else: ?>
          <form method="POST" action="index.php" class="space-y-6">
            <input type="hidden" name="action" value="install_db">
            
            <div class="border-b border-slate-200 pb-4">
              <h2 class="text-lg font-bold text-slate-800 mb-4">1. Database Connection</h2>
              <div class="grid grid-cols-2 gap-4">
                <div>
                  <label class="block text-xs font-semibold text-slate-600 mb-1">Host</label>
                  <input type="text" name="db_host" value="127.0.0.1" required class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 outline-none">
                </div>
                <div>
                  <label class="block text-xs font-semibold text-slate-600 mb-1">Port</label>
                  <input type="text" name="db_port" value="3306" required class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 outline-none">
                </div>
                <div class="col-span-2">
                  <label class="block text-xs font-semibold text-slate-600 mb-1">Database Name</label>
                  <input type="text" name="db_name" value="exchangehub" required class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 outline-none">
                </div>
                <div>
                  <label class="block text-xs font-semibold text-slate-600 mb-1">Username</label>
                  <input type="text" name="db_user" value="root" required class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 outline-none">
                </div>
                <div>
                  <label class="block text-xs font-semibold text-slate-600 mb-1">Password</label>
                  <input type="password" name="db_pass" placeholder="Database password" class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 outline-none">
                </div>
              </div>
            </div>

            <div>
              <h2 class="text-lg font-bold text-slate-800 mb-4">2. Admin Account Setup</h2>
              <div class="space-y-4">
                <div>
                  <label class="block text-xs font-semibold text-slate-600 mb-1">Admin Name</label>
                  <input type="text" name="admin_name" value="ExchangeHub Admin" required class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 outline-none">
                </div>
                <div>
                  <label class="block text-xs font-semibold text-slate-600 mb-1">Admin Email</label>
                  <input type="email" name="admin_email" value="admin@exchangehub.local" required class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 outline-none">
                </div>
                <div>
                  <label class="block text-xs font-semibold text-slate-600 mb-1">Admin Password</label>
                  <input type="password" name="admin_pass" value="Admin@123456" required class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 outline-none">
                </div>
              </div>
            </div>

            <div class="pt-4 flex justify-end">
              <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-xl text-sm shadow-md shadow-blue-500/20 transition">
                Start Installation &rarr;
              </button>
            </div>
          </form>
        <?php endif; ?>
      </div>
    </div>
  </div>
</body>
</html>
