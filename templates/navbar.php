<div class= "container-fluid" id="navbar">
    <nav class="navbar fixed-top navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="./dashboard.php">MusicData</a>

            <li class="dropdown order-1">
                <button type="button" id="dropdownMenu1" data-toggle="dropdown" class="btn btn-light dropdown-toggle"> </button>
                <ul class="dropdown-menu dropdown-menu-right mt-2">
                    <li class="px-3 py-2">
                        <form action="dashboard.php" method="post">
                            <input type="submit" value="Dashboard"  class="btn btn-light">
                        </form>
                    </li>
                    <li class="px-3 py-2">
                        <form action="settings.php" method="post">
                            <input type="submit" value="Settings"  class="btn btn-light">
                        </form>
                    </li>

                    <li class="px-3 py-2">
                        <form action="backEnd/logout.php" method="post">
                            <input type="submit" value="Log Out"  class="btn btn-light">
                        </form>
                    </li>
                </ul>
            </li>

        </div>
    </nav>
</div>
