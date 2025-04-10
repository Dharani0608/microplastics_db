<?php
// marine.php - Marine Microplastic Data
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marine Microplastic Data</title>
    <link rel="stylesheet" href="styles.css">
    <script>
        function filterData() {
            var polymerType = document.getElementById("polymer").value;
            var rows = document.querySelectorAll("table tbody tr");
            rows.forEach(row => {
                var polymer = row.getAttribute("data-polymer");
                if (polymerType === "" || polymer === polymerType) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        }
    </script>
</head>
<body>
    <header>
        <h1>Marine Microplastic Data</h1>
    </header>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="marine.php">Marine Microplastic</a></li>
            <li><a href="freshwater.php">Freshwater Microplastic</a></li>
            <li><a href="terrestrial.php">Terrestrial Microplastic</a></li>
            <li><a href="airborne.php">Airborne Microplastic</a></li>
        </ul>
    </nav>
    <main>
        <h2>Marine Microplastic Data</h2>
        <label for="polymer">Filter by Polymer Type:</label>
        <select id="polymer" onchange="filterData()">
            <option value="">All</option>
            <option value="PE">PE</option>
            <option value="PET">PET</option>
            <option value="PP">PP</option>
            <option value="PVC">PVC</option>
        </select>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Microplastic Type</th>
                    <th>Polymer Type</th>
                    <th>Size</th>
                    <th>Color</th>
                    <th>Detection Method</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                </tr>
            </thead>
            <tbody>
                <tr data-polymer="PE">
                    <td>1</td>
                    <td>Fragment</td>
                    <td>PE</td>
                    <td>100μm</td>
                    <td>Blue</td>
                    <td>FTIR</td>
                    <td>-45.0</td>
                    <td>120.5</td>
                </tr>
            </tbody>
        </table>
    </main>
    <footer>
        <p>&copy; 2025 Microplastic Research Initiative</p>
    </footer>
</body>
</html>
