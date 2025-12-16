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
    document.getElementById('information').style.display = (formType === 'information') ? 'block' : 'none';
    document.getElementById('modification').style.display = (formType === 'modification') ? 'block' : 'none';
}