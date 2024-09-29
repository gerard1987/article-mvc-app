<h1><?= ucfirst($title) ?></h1>

<form action="/articles/create" method="post">
    <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="" placeholder="Apple" required>
    <br><br>

    <!-- Article Price -->
    <label for="price">Price:</label>
    <input type="number" id="price" name="price" step="0.01" placeholder="0.00" value="" placeholder="1.99" required pattern="^\d+(\.\d{1,2})?$" title="Voer een geldige prijs in">
    <br><br>
    
    <input type="submit" value="Bijwerken">
</form>