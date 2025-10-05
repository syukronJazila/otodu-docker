<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Rethink+Sans:ital,wght@0,400..800;1,400..800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            font-family: "Rethink Sans", sans-serif;
        }

        .custom-navbar {
            background-color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 1rem;
        }

        .nav-menu {
            text-decoration: none;
            color: #4D62A5;
            margin: 0 0.5rem;
            padding: 4px 24px;
            transition: all 0.3s ease;
            font-weight : 20vw;
        }

        .nav-menu:hover, .nav-menu.highlight {
            background-color: #4D62A5;
            color: white;
            border-radius: 0px;
            font-weight : 20vw;
        }

        .navbar-separator {
            color: #4D62A5;
            margin: 0 2vw;
            font-size : 25px;
        }

        /* Mobile Responsiveness */
        @media (max-width: 991px) {
            .navbar-nav {
                flex-direction: column;
                align-items: center;
            }

            .nav-menu {
                width: 100%;
                text-align: center;
                margin: 0.5rem 0;
            }

            .navbar-separator {
                display: none;
            }

            .logo img {
                max-width: 100px;
            }
        }

        .navbar-toggler {
            border: none;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='%234D62A5' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg custom-navbar">
        <div class="container"">
            <div class="logo navbar-brand">
                <img src="image/logo otodu2.png" alt="logo" width = "120px">
            </div>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <div class="navbar-nav align-items-center">
                    <a class="nav-menu" id="nlp" href="dashboard.php">NLP OTODU</a>
                    <span class="navbar-separator">|</span>
                    <a class="nav-menu mentor" href="mentor.php">Mentor OTODU</a>
                    <span class="navbar-separator">|</span>
                    <a class="nav-menu jasa" href="jasa.php">Desain Web & App</a>
                </div>
            </div>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const currentPage = window.location.pathname;
        const navMenu = document.querySelectorAll('.nav-menu');
        
        navMenu.forEach(link => {
            if (link.getAttribute('href') === currentPage.split('/').pop()) {
                link.classList.add('highlight');
            }
        });
    </script>
</body>
</html>