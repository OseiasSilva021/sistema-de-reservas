<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Controle - Admin</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            height: 100vh;
            background-color: #f4f4f9;
            color: #333;
        }

        .container {
            display: flex;
            width: 100%;
            height: 100%;
        }

        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            color: #fff;
            padding: 30px 20px;
            height: 100vh;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
        }

        .sidebar-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .sidebar-header h2 {
            font-size: 22px;
            font-weight: 600;
        }

        .sidebar-menu {
            list-style: none;
            padding-left: 0;
        }

        .sidebar-menu li {
            margin-bottom: 20px;
        }

        .sidebar-menu a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            display: block;
            padding: 12px 20px;
            border-radius: 5px;
            transition: background-color 0.3s, padding-left 0.2s;
        }

        .sidebar-menu a:hover {
            background-color: #1abc9c;
            padding-left: 30px;
        }

        .main-content {
            flex-grow: 1;
            padding: 20px;
            margin-left: 250px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
        }

        .section {
            display: none;
        }

        .section h1 {
            margin-bottom: 20px;
            font-size: 26px;
            color: #2c3e50;
            font-weight: bold;
        }

        .section p {
            font-size: 18px;
            line-height: 1.6;
            color: #7f8c8d;
        }

        #home {
            display: block;
        }

        form {
            background-color: #ecf0f1;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        form label {
            font-size: 16px;
            margin-bottom: 8px;
            display: block;
        }

        form input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
        }

        form input[type="date"] {
            max-width: 200px;
        }

        form button {
            padding: 12px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        form button:hover {
            background-color: #45a049;
        }

        h2 {
            font-size: 22px;
            margin-bottom: 20px;
            color: #2c3e50;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 15px;
            text-align: left;
            font-size: 16px;
            color: #34495e;
        }

        th {
            background-color: #2c3e50;
            color: white;
        }

        button {
            padding: 10px 15px;
            background-color: #3498db;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 14px;
            margin-right: 10px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #2980b9;
        }

        button:active {
            background-color: #1abc9c;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                position: relative;
                height: auto;
                box-shadow: none;
            }

            .main-content {
                margin-left: 0;
                margin-top: 20px;
            }

            .sidebar-menu a {
                font-size: 16px;
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <div class="sidebar-header">
                <h2>Admin Panel</h2>
            </div>
            <ul class="sidebar-menu">
                <li><a href="#" onclick="showSection('home')">Início</a></li>
                <li><a href="#" onclick="showSection('reservations')">Reservas</a></li>
            </ul>
        </div>
        <div class="main-content">
            <div class="section" id="home">
                <h1>Bem-vindo ao painel de controle!</h1>
                <p>Aqui você pode gerenciar o sistema.</p>
            </div>
            <div class="section" id="reservations">
                <form action="processa_reserva.php" method="POST">
                    <label for="checkin">Data de Check-in:</label>
                    <input type="date" id="checkin" name="checkin" required>
                    <br>

                    <label for="checkout">Data de Check-out:</label>
                    <input type="date" id="checkout" name="checkout" required>
                    <br>

                    <label for="rooms">Número de Quartos:</label>
                    <input type="number" id="rooms" name="rooms" min="1" required>
                    <br>

                    <label for="guests">Número de Convidados:</label>
                    <input type="number" id="guests" name="guests" min="1" required>
                    <br>

                    <button type="submit">Salvar Reserva</button>
                </form>

                <h2>Reservas Existentes</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Check-in</th>
                            <th>Check-out</th>
                            <th>Quartos</th>
                            <th>Convidados</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Aqui serão listadas as reservas existentes -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function showSection(sectionId) {
            const sections = document.querySelectorAll('.section');
            sections.forEach((section) => {
                section.style.display = 'none';
            });
            document.getElementById(sectionId).style.display = 'block';
        }
    </script>
</body>
</html>