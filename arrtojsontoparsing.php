<?php

// Read JSON file
$json_file_path = 'biodata.json';
$json_data = file_get_contents($json_file_path);

// Convert JSON data to PHP array
$biodata = json_decode($json_data, true);

// Check if the decoding was successful
if ($biodata !== null) {
    // Display each biodata entry
    foreach ($biodata as $data) : ?>
        <div style="display: flex; margin-bottom: 20px; background-color:bisque;">
        
        <div style="margin-right: 20px;">
        <img src="<?= $data['foto']?>" alt="Profile Picture" style="width: 100px; height: 100px; border-radius: 50%;">
        </div>
        
        <div style="flex: 2;">
            <ul>
                <li>
                    <strong>NIM : <?= $data['nim']?></strong><br>
                </li>
                <li>
                    <strong>Nama : <?= $data['nama_lengkap']?></strong><br>
                </li>
                <li>
                    <strong>Alamat : <?= $data['alamat']?></strong><br>
                </li>
                <li>
                    <strong>No HP : <?= $data['no_telepon']?></strong><br>
                </li>
                <li>
                    <strong>Agama : <?= $data['agama']?></strong><br>
                </li>
            </ul>
        </div>
        
        </div>
    <?php
    endforeach;
    
} else {
    echo "Error decoding JSON data";
}

?>
