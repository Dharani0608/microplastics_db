<?php
include 'db_connect.php';
$query = "SELECT * FROM microplastics_data WHERE ecosystem_type = 'airborne'";
$result = mysqli_query($conn, $query);
?>

<table>
    <tr>
        <th>ID</th>
        <th>Ecosystem Type</th>
        <th>Ecosystem Zone</th>
        <th>Microplastic Category</th>
        <th>Microplastic Type</th>
        <th>Enzyme</th>
        <th>Protein</th>
        <th>Temperature</th>
        <th>pH Range</th>
        <th>Toxicity Level</th>
        <th>Degradation Mechanism</th>
        <th>Pollution Cause</th>
        <th>Half Life (Days)</th>
        <th>Degradation Efficiency</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['ecosystem_type']; ?></td>
            <td><?php echo $row['ecosystem_zone']; ?></td>
            <td><?php echo $row['microplastic_category']; ?></td>
            <td><?php echo $row['microplastic_type']; ?></td>
            <td><?php echo $row['enzyme']; ?></td>
            <td><?php echo $row['protein']; ?></td>
            <td><?php echo $row['temperature']; ?>°C</td>
            <td><?php echo $row['pH_range']; ?></td>
            <td><?php echo $row['toxicity_level']; ?></td>
            <td><?php echo $row['degradation_mechanism']; ?></td>
            <td><?php echo $row['pollution_cause']; ?></td>
            <td><?php echo $row['half_life_days']; ?></td>
            <td><?php echo $row['degradation_efficiency']; ?>%</td>
        </tr>
    <?php } ?>
</table>