<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Microplastic Database</title>
    <style>
        /* General Styles */
        body {
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }

        /* Navigation Menu */
        .nav {
            text-align: center;
            padding: 20px;
            background: #333;
            color: white;
            position: relative;
            z-index: 10;
        }

        .nav-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .nav a {
            display: inline-block;
            color: white;
            text-decoration: none;
            padding: 10px;
            margin: 0 5px;
        }

        .nav a:hover {
            background: #555;
        }

        /* Image Banner (Ensures full visibility) */
        .image-container {
            width: 100%;
            height: 50vh;
            background: url('../background.jpg') no-repeat center center fixed;
            background-size: cover;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Main Content */
        .content {
            padding: 20px;
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: white;
        }

        /* Search Bar */
        .search-container {
            margin-bottom: 20px;
            text-align: center;
        }

        .search-container input {
            padding: 8px;
            width: 50%;
            margin-right: 5px;
        }

        .search-container button {
            padding: 8px 15px;
            background: #333;
            color: white;
            border: none;
            cursor: pointer;
        }

        .search-container button:hover {
            background: #555;
        }
    </style>
</head>
<body>

    <!-- Navigation Menu -->
    <div class="nav">
        <h1 class="nav-title">MICROPLASTIC DATABASE</h1>
        <a href="index.php">Home</a>
        <a href="#" onclick="showAbout()">About</a>
        <a href="index.php?category=marine">Marine Microplastic</a>
        <a href="index.php?category=freshwater">Freshwater Microplastic</a>
        <a href="index.php?category=terrestrial">Terrestrial Microplastic</a>
        <a href="index.php?category=airborne">Airborne Microplastic</a>
    </div>

    <!-- Image Banner -->
    <div class="image-container"></div>

    <!-- Main Content -->
    <div class="content" id="content">
        <?php
        // Connect to MySQL
        $conn = new mysqli("localhost", "root", "", "microplastics_db");

        // Check connection
        if ($conn->connect_error) {
            die("<p style='color: red;'>Database Connection Failed: " . $conn->connect_error . "</p>");
        }

        // Check if a category is selected
        if (isset($_GET['category'])) {
            $category = $conn->real_escape_string($_GET['category']);

            // Query based on category
            $valid_categories = ['marine', 'freshwater', 'terrestrial', 'airborne'];
            if (in_array($category, $valid_categories)) {
                $sql = "SELECT * FROM microplastics_backup WHERE ecosystem_type='" . ucfirst($category) . "' ORDER BY ID ASC";
            } else {
                echo "<p>Invalid category selected.</p>";
                exit();
            }

            // Display search bar
            echo "<div class='search-container'>
                    <input type='text' id='searchInput' placeholder='Search Microplastic Name...'>
                    <button onclick='searchMicroplastic()'>Search</button>
                  </div>";

            // Execute query
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<h2>" . ucfirst($category) . " Microplastic Data</h2>";
                echo "<table id='microplasticTable'>
                        <tr>
                            <th>ID</th>
                            <th>Ecosystem Type</th>
                            <th>Ecosystem Zone</th>
                            <th>Microplastic Category</th>
                            <th>Microplastic Name</th>
                            <th>Enzyme Involved</th>
                            <th>Protein Involved</th>
                            <th>Temperature (°C)</th>
                            <th>pH Range</th>
                            <th>Toxicity Level</th>
                            <th>Degradation Mechanism</th>
                            <th>Cause of Pollution</th>
                            <th>Half Life (Days)</th>
                            <th>Degradation Efficiency</th>
                            <th>Detection Method</th>
                            <th>Bioavailability Index</th>
                            <th>Carbon Release Form</th>
                            <th>Microplastic Particle Size</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                        </tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['ID']}</td>
                            <td>{$row['Ecosystem_Type']}</td>
                            <td>{$row['Ecosystem_Zone']}</td>
                            <td>{$row['Microplastic_Category']}</td>
                            <td>{$row['Microplastic_Name']}</td>
                            <td>{$row['Enzyme_Involved']}</td>
                            <td>{$row['Protein_Involved']}</td>
                            <td>{$row['Temperature_C']}</td>
                            <td>{$row['pH_Range']}</td>
                            <td>{$row['Toxicity_Level']}</td>
                            <td>{$row['Degradation_Mechanism']}</td>
                            <td>{$row['Cause_of_Pollution']}</td>
                            <td>{$row['Half_Life_Days']}</td>
                            <td>{$row['Degradation_Efficiency']}</td>
                            <td>{$row['Detection_Method']}</td>
                            <td>{$row['Bioavailability_Index']}</td>
                            <td>{$row['Carbon_Release_Form']}</td>
                            <td>{$row['Microplastic_Particle_Size']}</td>
                            <td>{$row['Latitude']}</td>
                            <td>{$row['Longitude']}</td>
                          </tr>";
                }
                echo "</table>";
            } else {
                echo "<p>No data found for " . ucfirst($category) . " microplastics.</p>";
            }
        }

        // Close connection
        $conn->close();
        ?>
    </div>

    <!-- JavaScript for About Page and Search Function -->
    <script>
    function showAbout() {
        document.getElementById("content").innerHTML = `
            <h2>About Microplastic Database</h2>
            <p>This database provides researchers with essential data on microplastics in various ecosystems, aiding in environmental studies.</p>
        `;
    }

    function searchMicroplastic() {
        let input = document.getElementById("searchInput").value.toLowerCase();
        let table = document.getElementById("microplasticTable");
        let rows = table.getElementsByTagName("tr");

        for (let i = 1; i < rows.length; i++) {
            let cell = rows[i].getElementsByTagName("td")[4]; 
            if (cell) {
                let txtValue = cell.textContent || cell.innerText;
                rows[i].style.display = txtValue.toLowerCase().includes(input) ? "" : "none";
            }
        }
    }
    </script>

</body>
</html>