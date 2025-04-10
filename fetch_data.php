<?php
// fetch_data.php
include 'db_connect.php'; // Include the database connection

// Check if a category is selected
if (isset($_GET['category'])) {
    $category = $_GET['category'];

    // Prepare the SQL query based on the selected category
    $sql = "SELECT * FROM microplastics_backup WHERE Ecosystem_Type=?";
    $stmt = $conn->prepare($sql);
    $categoryName = ucfirst($category); // Create a variable for the category
    $stmt->bind_param("s", $categoryName); // Bind the category parameter
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if there are results
    if ($result->num_rows > 0) {
        echo "<h2>" . ucfirst($category) . " Microplastic Data</h2>";
        echo "<table>
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
        echo "<p>No data found for $category microplastics.</p>";
    }

    // Close the statement
    $stmt->close();
}
?>