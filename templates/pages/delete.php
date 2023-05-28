<div class="delete">
<?php $note = $params['note'] ?? null; ?> <?php if ($note): ?>
<ul>
<li> Id: <?php echo (int) $note['id']?> </li> <li>
Tytuł: <?php echo htmlentities (Snote['title']) ?>
</li>
<li>
Opis: <?php echo htmlentities (Snote["description']) ?>
</li>
<11>Utworzono: <?php echo htmlentities ($note['created']) ?> </li>
<li>
<a href="/">
</a>
</li>
<button>Powrót do listy notatek</button>
<li>
<form method="POST" action="/?action=delete">
<input type="text" name="id" value="<?php echo $note['id']?>" hidden> <input type="submit" value="Usun">
</form>
</li>
</ul>
<?php else: ?>
<div>Brak notatki do wyświetlenia</div>
<?php endif; ?>
</div>