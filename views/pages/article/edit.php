<h1><?= ucfirst($title) ?></h1>

<?php if(!empty($content->id)): ?>
    <form action="/articles/edit" method="post">
        <input type="hidden" name="id" value="<?= $content->id ?>">

        <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?= $content->name ?>" required>
        <br><br>

        <!-- Article Price -->
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" step="0.01" placeholder="0.00" value="<?= $content->price ?>" required pattern="^\d+(\.\d{1,2})?$" title="Voer een geldige prijs in">
        <br><br>
        
        <input type="submit" value="Bijwerken">
    </form>
<?php else: ?>
    No article selected    
<?php endif; ?>
