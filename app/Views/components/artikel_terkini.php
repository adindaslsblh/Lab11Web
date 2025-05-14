<div style="margin: 10px; padding: 5px;">
    <h3>Artikel Terkini</h3>
    <ul style="margin: 5px; 10px;">
        <?php foreach ($artikel as $row): ?>
        <li><a href="<?= base_url('/artikel/' . $row['slug'])?>"> <?= $row['judul'] ?> </a></li>
        <?php endforeach; ?>
    </ul>
</div>
