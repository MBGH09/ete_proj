<?php
$cakeDescription = 'Site Louer Chalets';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $cakeDescription ?>: <?= $this->fetch('title') ?></title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake', 'custom']) ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-nav">
        <div class="nav-left">
            <button class="menu-toggle" onclick="toggleSidebar()">☰</button>
        </div>
        <div class="nav-center">
            <a href="<?= $this->Url->build('/') ?>" class="site-title">
                <span class="site-icon"></span>
                <span class="site-name"><h1>Louer Chalets</h1></span>
            </a>
        </div>
        <div class="nav-right">
            <!-- Space for future elements like user menu -->
        </div>
    </nav>
    
    <div class="layout-container">
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <h3>📋 Menu</h3>
            </div>
            <nav class="sidebar-nav">
                <?= $this->Html->link('👥 Users', ['controller' => 'Users', 'action' => 'index'], ['class' => 'sidebar-link']) ?>
                <?= $this->Html->link('🏠 Chalets', ['controller' => 'Chalets', 'action' => 'index'], ['class' => 'sidebar-link']) ?>
                <?= $this->Html->link('👤 Clients', ['controller' => 'Clients', 'action' => 'index'], ['class' => 'sidebar-link']) ?>
                <?= $this->Html->link('📅 Reservations', ['controller' => 'Reservations', 'action' => 'index'], ['class' => 'sidebar-link']) ?>
                <?= $this->Html->link('💰 Tarifs', ['controller' => 'Tarifs', 'action' => 'index'], ['class' => 'sidebar-link']) ?>
            </nav>
        </aside>
        
        <main class="main-content">
            <div class="container">
                <?= $this->Flash->render() ?>
                <div class="content">
                    <?= $this->fetch('content') ?>
                </div>
            </div>
        </main>
    </div>
    
    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 Louer Chalets. All rights reserved.</p>
        </div>
    </footer>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('sidebar-open');
        }
    </script>
</body>
</html>


