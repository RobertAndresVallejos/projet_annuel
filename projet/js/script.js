
    document.querySelectorAll('.tab').forEach(function(tab) {
        tab.addEventListener('click', function() {
            console.log('Tab clicked:', this.getAttribute('data-form')); // Pour voir quel onglet est cliqué
            document.querySelectorAll('.tab').forEach(function(innerTab) {
                innerTab.classList.remove('active');
            });
            this.classList.add('active');
            showForm(this.getAttribute('data-form'));
        });
    });
    
    function showForm(formType) {
        console.log('Form to show:', formType); // Pour vérifier quel formulaire doit être affiché
        document.getElementById('login').style.display = (formType === 'login') ? 'block' : 'none';
        document.getElementById('register').style.display = (formType === 'register') ? 'block' : 'none';
    }

    document.addEventListener('DOMContentLoaded', function () {
        var menuToggle = document.querySelector('.menu-toggle');
        var menu = document.querySelector('.nav-list');
    
        menuToggle.addEventListener('click', function () {
            if (menu.classList.contains('active')) {
                menu.classList.remove('active');
            } else {
                menu.classList.add('active');
            }
        });
    });
    


document.addEventListener("DOMContentLoaded", function() {
    function updateSubtotal() {
        let total = 0;
        document.querySelectorAll('.cart-item').forEach(item => {
            const price = parseFloat(item.getAttribute('data-price'));
            const quantity = parseInt(item.querySelector('input[type=number]').value, 10);
            total += price * quantity;
        });

        // Récupérer les frais de livraison depuis l'attribut de données du résumé du panier
        const deliveryCharge = parseFloat(document.querySelector('.cart-summary').getAttribute('data-delivery'));

        // Calculer le total incluant les frais de livraison
        const grandTotal = total + deliveryCharge;

        // Mettre à jour le sous-total et le total final
        document.querySelector('.cart-container .cart-summary p:nth-of-type(1)').textContent = `Total articles: ${total.toFixed(2)}€`;
        document.querySelector('.cart-container .cart-summary p:nth-of-type(2)').textContent = `Livraison: ${deliveryCharge.toFixed(2)}€`;
        document.querySelector('.cart-container .cart-summary p:nth-of-type(3)').textContent = `Sous total: ${grandTotal.toFixed(2)}€`;
    }

    // Attacher l'écouteur d'événements à chaque input
    document.querySelectorAll('.cart-item input[type=number]').forEach(input => {
        input.addEventListener('change', updateSubtotal);
    });

    // Mise à jour initiale du total
    updateSubtotal();
    console.log('Page chargée et prête !');
});

function removeItemFromCart(productId) {
    fetch('/remove_from_cart.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `id=${productId}`
    })
    .then(response => response.json())
    .then(data => {
        if(data.success) {
            // Mettre à jour la page ou afficher un message
            window.location.reload(); // Recharge la page pour refléter le changement
        }
    })
    .catch(error => console.error('Error:', error));
}
