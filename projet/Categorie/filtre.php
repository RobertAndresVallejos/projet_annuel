<div class="filters-panel">
    <form action="mode_homme.php" method="GET">
        <div class="filter">
            <label for="categorie">Catégorie</label>
            <select name="categorie" id="categorie">
                <option value="">Toutes</option>
                <option value="1">Pantalons</option>
                <option value="2">Chemises</option>
                <option value="3">Jupes</option>
                <option value="4">Robes</option>
            </select>
        </div>
        <div class="filter">
            <label for="marque">Marque</label>
            <select name="marque" id="marque">
                <option value="">Toutes</option>
                <option value="1">Nike</option>
                <option value="2">Adidas</option>
                <option value="3">Levi's</option>
                <option value="4">Gucci</option>
            </select>
        </div>
        <div class="filter">
            <label for="couleur">Couleur</label>
            <select name="couleur" id="couleur">
                <option value="">Toutes</option>
                <option value="Bleu">Bleu</option>
                <option value="Vert">Vert</option>
                <option value="Denim">Denim</option>
                <option value="Noir">Noir</option>
                <option value="Beige">Beige</option>
                <option value="Rouge">Rouge</option>
                <option value="Blanc">Blanc</option>
                <option value="Bleu Marine">Bleu Marine</option>
            </select>
        </div>
        <div class="filter">
            <label for="taille">Taille</label>
            <select name="taille" id="taille">
                <option value="">Toutes</option>
                <option value="XS">XS</option>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
                <option value="XXL">XXL</option>
            </select>
        </div>
        <button type="submit" class="filter-button">Filtrer</button>
    </form>
</div>
