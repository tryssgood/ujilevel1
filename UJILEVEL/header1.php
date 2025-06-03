<?php
if (session_status() === PHP_SESSION_NONE) session_start();
?>
<style>
    .header {
        background-color: #fff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 0.5rem 1rem;
    }

    .header-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        max-width: 1200px;
        margin: 0 auto;
    }

    .logo-title {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .logo-container img {
        height: 60px;
    }

    .title-text .sekolah {
        font-size: 1.25rem;
        font-weight: bold;
        line-height: 1.2;
        color: #111827;
    }

    .navigation {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .nav-link {
        text-decoration: none;
        color: #1f2937;
        padding: 0.5rem 1rem;
        font-weight: 500;
        border-radius: 8px;
        transition: all 0.2s ease-in-out;
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
    }

    .nav-link:hover {
        background-color: #f3f4f6;
    }

    .nav-link.admin {
        background: linear-gradient(135deg, #059669 0%, #047857 100%);
        color: white;
        padding: 0.75rem 1.25rem;
        font-weight: bold;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(5, 150, 105, 0.3);
    }

    .nav-link.logout {
        background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
        color: white;
        padding: 0.75rem 1.25rem;
        font-weight: bold;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(220, 38, 38, 0.3);
    }

    .nav-link.admin:hover,
    .nav-link.logout:hover {
        transform: translateY(-2px);
    }
</style>

<div class="header">
    <div class="header-container">
        <div class="logo-title">
            <div class="logo-container">
                <img src="igasar.png" alt="Logo SMK Igasar Pindad">
            </div>
            <div class="title-text">
                <div class="sekolah">PPDB</div>
                <div class="sekolah">SMK IGASAR PINDAD</div>
            </div>
        </div>

            <?php if (isset($_SESSION['user_level']) && $_SESSION['user_level'] === 'admin'): ?>

                <a href="contoh.php" class="nav-link">
                    <i class="fas fa-cog"></i> Pendaftar
                </a>
                <a href="admin_panel.php" class="nav-link admin">
                    <i class="fas fa-tools"></i> Admin Panel
                </a>
                <a href="logout.php" class="nav-link logout">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            <?php endif; ?>
        </nav>
    </div>
</div>
