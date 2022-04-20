<!-- header -->
<div class="main">
    <div class="top-header">
        <!-- toggle -->
        <div class="toggle-header">
            <div>
                <span class="line-1"></span>
                <span class="line-2"></span>
                <span class="line-3"></span>
            </div>

        </div>
        <!-- user -->
        <div class="user-header">
            <div class="welcome-user">
                Xin chào, <?php
                            echo $_SESSION['nameLogin'];
                            ?>.
            </div>
            <a href="<?= BASE_URL ?>indexController">
                <div class="avt-user">
                    <img src="<?= BASE_URL ?>public/images/<?= $_SESSION['imageLogin'] ?>" alt="Rosé">
                </div>
            </a>

        </div>
    </div>