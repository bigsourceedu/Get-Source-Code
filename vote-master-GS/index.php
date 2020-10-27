<?php
// koneksi database
require 'config.php';
require 'vote-count.php';
require 'functions.php';
?>

<html>
<head>
  <title>Sistem Vote</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="vote-container">
    <table>
      <tr>
        <th colspan="2">Cantik Yang Mana ?</th>
      </tr>
      <tr>
      <?php
      $sql = "SELECT * FROM vote_opsi";
      $query = $connect->query($sql);

      while ( $row = $query->fetch_assoc() ) : ?>
        <td>
          <div class="persentase"><?php echo getPolling( $row['id_opsi'] );?></div>
          <a href="vote-count.php?nomer=<?php echo $row['id_opsi'];?>">
            <img src="<?php echo $row['thumbnail'];?>" width="150" alt=""/>
            <p><?php echo $row['nama_opsi'];?></p>
          </a>
        </td>
      <?php endwhile; ?>

      </tr>
    </table>
  </div>
</body>
</html>
