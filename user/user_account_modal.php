<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="update_profile.php" method="post" enctype="multipart/form-data" id="update_user_form">
        <?php
include "conn.php";

$sql = "SELECT * FROM users_acc where id=" . $_SESSION['user_id'];

$result = $conn->query($sql);
$i = 1;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
  
        ?>
        <div class="form-group" style="margin-left:35%;">
           <img src="../user_images/<?php echo $row['image']; ?>" alt="" id="latest_image" height="100" width="100" id="image" style="border-radius:15px;">
          <br>
          <input type="file" id="new_file_image" name="new_image" accept="image/*">

            </div>

          <div class="form-group">
            <label for="username" class="col-form-label">Username:</label>
            <input type="text" class="form-control" id="username" name="user_name" value="<?php echo $row['user_name']; ?>">
          </div>

          <div class="form-group">
            <label for="phone" class="col-form-label">Phone #:</label>
            <input type="number" class="form-control" id="phone" name="phone" value="<?php echo $row['phone']; ?>">
          </div>

          <div class="form-group">
            <input type="hidden" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>">
          </div>
          <br>
          <div class="input-container">

          <div class="input-field2">
    <i class="fas fa-location"></i>
    <select name="municipality" id="municipality" required class="municipality" style="border:none; background:transparent">
        <option value="" disabled <?php echo empty($_SESSION['municipality']) ? 'selected' : ''; ?>>Select Municipality</option>
        <option value="Bansud" class="Bansud" <?php echo $_SESSION['municipality'] == 'Bansud' ? 'selected' : ''; ?>>Bansud</option>
        <option value="Gloria" class="Gloria" <?php echo $_SESSION['municipality'] == 'Gloria' ? 'selected' : ''; ?>>Gloria</option>
        <option value="Pinamalayan" class="Pinamalayan" <?php echo $_SESSION['municipality'] == 'Pinamalayan' ? 'selected' : ''; ?>>Pinamalayan</option>
    </select>
</div>

<div class="input-field2">
    <i class="fas fa-location"></i>
    <select name="barangay" id="barangay" class="barangay" required style="border:none; background:transparent">
        <!-- Barangay options will be populated dynamically here -->
    </select>
</div>

<script>
document.getElementById("municipality").addEventListener("change", function () {
    const selectedMunicipality = this.value; // Get the selected municipality
    const barangaySelect = document.getElementById("barangay");

    // Hide all barangay options initially
    const allBarangays = barangaySelect.querySelectorAll("option");
    allBarangays.forEach(option => option.style.display = "none");

    // Show barangays based on selected municipality
    let barangays = [];

    if (selectedMunicipality === "Bansud") {
        barangays = [
            "Alcadesma", "Bato", "Conrazon", "Malo", "Manihala", "Pag-asa", "Poblacion", "Proper Bansud", 
            "Proper Tiguisan", "Rosacara", "Salcedo", "Sumagui", "Villa Pag-asa"
        ];
    } else if (selectedMunicipality === "Gloria") {
        barangays = [
            "Agos", "Agsalin", "Alma Villa", "Andres Bonifacio", "Balete", "Banus", "Banutan", "Bulaklakan", 
            "Buong Lupa", "Gaudencio Antonino", "Guimbonan", "Kawit", "Lucio Laurel", "Macario Adriatico", 
            "Malamig", "Malayong", "Maligaya", "Malubay", "Manguyang", "Maragooc", "Mirayan", "Narra", 
            "Papandungin", "San Antonio", "Santa Maria", "Santa Theresa", "Tambong"
        ];
    } else if (selectedMunicipality === "Pinamalayan") {
        barangays = [
            "Anoling", "Bacungan", "Bangbang", "Banilad", "Buli", "Cacawan", "Calingag", "Del Razon", 
            "Guinhawa", "Inclanay", "Lumangbayan", "Malaya", "Maliangcog", "Maningcol", "Marayos", "Marfrancisco", 
            "Nabuslot", "Pagalagala", "Palayan", "Pambisan Malaki", "Pambisan Munti", "Panggulayan", "Papandayan", 
            "Pili", "Quinabigan", "Ranzo", "Rosario", "Sabang", "Santa Isabel", "Santa Maria", "Santa Rita", 
            "Santo Niño", "Wawa", "Zone I", "Zone II", "Zone III", "Zone IV"
        ];
    } else {
        barangaySelect.innerHTML = `<option value="" disabled selected>Select Barangay</option>`;
        return;
    }

    // Create the HTML for the barangay options
    let optionsHTML = `<option value="" disabled selected>Select Barangay</option>`;
    barangays.forEach(barangay => {
        optionsHTML += `<option value="${barangay}" ${barangay === "<?php echo htmlspecialchars($_SESSION['barangay']); ?>" ? 'selected' : ''}>${barangay}</option>`;
    });

    barangaySelect.innerHTML = optionsHTML;
});

// Initialize barangay options when the page loads based on the selected municipality
document.addEventListener("DOMContentLoaded", function() {
    const selectedMunicipality = document.getElementById("municipality").value;
    const barangaySelect = document.getElementById("barangay");

    // Hide all barangay options initially
    const allBarangays = barangaySelect.querySelectorAll("option");
    allBarangays.forEach(option => option.style.display = "none");

    let barangays = [];

    if (selectedMunicipality === "Bansud") {
        barangays = ["Alcadesma", "Bato", "Conrazon", "Malo", "Manihala", "Pag-asa", "Poblacion", "Proper Bansud", 
            "Proper Tiguisan", "Rosacara", "Salcedo", "Sumagui", "Villa Pag-asa"];
    } else if (selectedMunicipality === "Gloria") {
        barangays = ["Agos", "Agsalin", "Alma Villa", "Andres Bonifacio", "Balete", "Banus", "Banutan", "Bulaklakan", 
            "Buong Lupa", "Gaudencio Antonino", "Guimbonan", "Kawit", "Lucio Laurel", "Macario Adriatico", 
            "Malamig", "Malayong", "Maligaya", "Malubay", "Manguyang", "Maragooc", "Mirayan", "Narra", 
            "Papandungin", "San Antonio", "Santa Maria", "Santa Theresa", "Tambong"];
    } else if (selectedMunicipality === "Pinamalayan") {
        barangays = ["Anoling", "Bacungan", "Bangbang", "Banilad", "Buli", "Cacawan", "Calingag", "Del Razon", 
            "Guinhawa", "Inclanay", "Lumangbayan", "Malaya", "Maliangcog", "Maningcol", "Marayos", "Marfrancisco", 
            "Nabuslot", "Pagalagala", "Palayan", "Pambisan Malaki", "Pambisan Munti", "Panggulayan", "Papandayan", 
            "Pili", "Quinabigan", "Ranzo", "Rosario", "Sabang", "Santa Isabel", "Santa Maria", "Santa Rita", 
            "Santo Niño", "Wawa", "Zone I", "Zone II", "Zone III", "Zone IV"];
    }

    // Create the HTML for the barangay options
    let optionsHTML = `<option value="" disabled selected>Select Barangay</option>`;
    barangays.forEach(barangay => {
        optionsHTML += `<option value="${barangay}" ${barangay === "<?php echo htmlspecialchars($_SESSION['barangay']); ?>" ? 'selected' : ''}>${barangay}</option>`;
    });

    barangaySelect.innerHTML = optionsHTML;
});
</script>

         

    </div>
    <div class="form-group">
            <label for="details" class="col-form-label">Details:</label>
            <input type="text" class="form-control" id="details" name="details" value="<?php echo htmlspecialchars($_SESSION['details']); ?>">
          </div>
          <div class="form-group">
            <label for="pass_word" class="col-form-label">Password (Optional if you want to change)</label>
            <input type="text" class="form-control" id="pass_word" name="pass_word">
            <input type="hidden" class="form-control" id="user_id" name="user_id" value="<?php echo $row['id']; ?>">
          </div>
          <div class="modal-footer">
          <a href="logout.php" class="btn btn-danger">Log out</a>  
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn" style="background:#E88A1A;">Save</button>
      </div>
 
      <?php
    }
} else {
    ?>
    <tr>
        <td colspan="4">No data found</td>
    </tr>
    <?php
}


?>     
        </form>
      </div>
      
    </div>
  </div>
</div>

<script>
    // Function to handle file input change event
    document.getElementById('new_file_image').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('latest_image').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>


<script>
  
document.getElementById("municipality").addEventListener("change", function () {
    const selectedMunicipality = this.value; // Get the selected municipality
    const barangaySelect = document.getElementById("barangay");

    // Hide all barangay options
    const allBarangays = barangaySelect.querySelectorAll("option");
    allBarangays.forEach(option => option.style.display = "none");

    // Show only the barangays for the selected municipality
    if (selectedMunicipality === "Bansud") {
        barangaySelect.innerHTML = `
            <option value="" disabled selected>Select Barangay</option>
            <option value="Alcadesma">Alcadesma</option>
            <option value="Bato">Bato</option>
            <option value="Conrazon">Conrazon</option>
            <option value="Malo">Malo</option>
            <option value="Manihala">Manihala</option>
            <option value="Pag-asa">Pag-asa</option>
            <option value="Poblacion">Poblacion</option>
            <option value="Proper Bansud">Proper Bansud</option>
            <option value="Proper Tiguisan">Proper Tiguisan</option>
            <option value="Rosacara">Rosacara</option>
            <option value="Salcedo">Salcedo</option>
            <option value="Sumagui">Sumagui</option>
            <option value="Villa Pag-asa">Villa Pag-asa</option>
        `;
    } else if (selectedMunicipality === "Gloria") {
        barangaySelect.innerHTML = `
            <option value="" disabled selected>Select Barangay</option>
            <option value="Agos">Agos</option>
            <option value="Agsalin">Agsalin</option>
            <option value="Alma Villa">Alma Villa</option>
            <option value="Andres Bonifacio">Andres Bonifacio</option>
            <option value="Balete">Balete</option>
            <option value="Banus">Banus</option>
            <option value="Banutan">Banutan</option>
            <option value="Bulaklakan">Bulaklakan</option>
            <option value="Buong Lupa">Buong Lupa</option>
            <option value="Gaudencio Antonino">Gaudencio Antonino</option>
            <option value="Guimbonan">Guimbonan</option>
            <option value="Kawit">Kawit</option>
            <option value="Lucio Laurel">Lucio Laurel</option>
            <option value="Macario Adriatico">Macario Adriatico</option>
            <option value="Malamig">Malamig</option>
            <option value="Malayong">Malayong</option>
            <option value="Maligaya">Maligaya</option>
            <option value="Malubay">Malubay</option>
            <option value="Manguyang">Manguyang</option>
            <option value="Maragooc">Maragooc</option>
            <option value="Mirayan">Mirayan</option>
            <option value="Narra">Narra</option>
            <option value="Papandungin">Papandungin</option>
            <option value="San Antonio">San Antonio</option>
            <option value="Santa Maria">Santa Maria</option>
            <option value="Santa Theresa">Santa Theresa</option>
            <option value="Tambong">Tambong</option>
        `;
    } else if (selectedMunicipality === "Pinamalayan") {
        barangaySelect.innerHTML = `
            <option value="" disabled selected>Select Barangay</option>
            <option value="Anoling">Anoling</option>
            <option value="Bacungan">Bacungan</option>
            <option value="Bangbang">Bangbang</option>
            <option value="Banilad">Banilad</option>
            <option value="Buli">Buli</option>
            <option value="Cacawan">Cacawan</option>
            <option value="Calingag">Calingag</option>
            <option value="Del Razon">Del Razon</option>
            <option value="Guinhawa">Guinhawa</option>
            <option value="Inclanay">Inclanay</option>
            <option value="Lumangbayan">Lumangbayan</option>
            <option value="Malaya">Malaya</option>
            <option value="Maliangcog">Maliangcog</option>
            <option value="Maningcol">Maningcol</option>
            <option value="Marayos">Marayos</option>
            <option value="Marfrancisco">Marfrancisco</option>
            <option value="Nabuslot">Nabuslot</option>
            <option value="Pagalagala">Pagalagala</option>
            <option value="Palayan">Palayan</option>
            <option value="Pambisan Malaki">Pambisan Malaki</option>
            <option value="Pambisan Munti">Pambisan Munti</option>
            <option value="Panggulayan">Panggulayan</option>
            <option value="Papandayan">Papandayan</option>
            <option value="Pili">Pili</option>
            <option value="Quinabigan">Quinabigan</option>
            <option value="Ranzo">Ranzo</option>
            <option value="Rosario">Rosario</option>
            <option value="Sabang">Sabang</option>
            <option value="Santa Isabel">Santa Isabel</option>
            <option value="Santa Maria">Santa Maria</option>
            <option value="Santa Rita">Santa Rita</option>
            <option value="Santo Niño">Santo Niño</option>
            <option value="Wawa">Wawa</option>
            <option value="Zone I">Zone I</option>
            <option value="Zone II">Zone II</option>
            <option value="Zone III">Zone III</option>
            <option value="Zone IV">Zone IV</option>
        `;
    } else {
        barangaySelect.innerHTML = `<option value="" disabled selected>Select Municipality first</option>`;
    }
});
</script>